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
$view_billing_transaction_list = new view_billing_transaction_list();

// Run the page
$view_billing_transaction_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_transaction_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_billing_transaction_list->isExport()) { ?>
<script>
var fview_billing_transactionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_billing_transactionlist = currentForm = new ew.Form("fview_billing_transactionlist", "list");
	fview_billing_transactionlist.formKeyCountName = '<?php echo $view_billing_transaction_list->FormKeyCountName ?>';
	loadjs.done("fview_billing_transactionlist");
});
var fview_billing_transactionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_billing_transactionlistsrch = currentSearchForm = new ew.Form("fview_billing_transactionlistsrch");

	// Validate function for search
	fview_billing_transactionlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_transaction_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_billing_transactionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_billing_transactionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_billing_transactionlistsrch.lists["x_Type[]"] = <?php echo $view_billing_transaction_list->Type->Lookup->toClientList($view_billing_transaction_list) ?>;
	fview_billing_transactionlistsrch.lists["x_Type[]"].options = <?php echo JsonEncode($view_billing_transaction_list->Type->options(FALSE, TRUE)) ?>;

	// Filters
	fview_billing_transactionlistsrch.filterList = <?php echo $view_billing_transaction_list->getFilterList() ?>;
	loadjs.done("fview_billing_transactionlistsrch");
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
<?php if (!$view_billing_transaction_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_billing_transaction_list->TotalRecords > 0 && $view_billing_transaction_list->ExportOptions->visible()) { ?>
<?php $view_billing_transaction_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_transaction_list->ImportOptions->visible()) { ?>
<?php $view_billing_transaction_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_transaction_list->SearchOptions->visible()) { ?>
<?php $view_billing_transaction_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_transaction_list->FilterOptions->visible()) { ?>
<?php $view_billing_transaction_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_billing_transaction_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_billing_transaction_list->isExport() && !$view_billing_transaction->CurrentAction) { ?>
<form name="fview_billing_transactionlistsrch" id="fview_billing_transactionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_billing_transactionlistsrch-search-panel" class="<?php echo $view_billing_transaction_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_transaction">
	<div class="ew-extended-search">
<?php

// Render search row
$view_billing_transaction->RowType = ROWTYPE_SEARCH;
$view_billing_transaction->resetAttributes();
$view_billing_transaction_list->renderRow();
?>
<?php if ($view_billing_transaction_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$view_billing_transaction_list->SearchColumnCount++;
		if (($view_billing_transaction_list->SearchColumnCount - 1) % $view_billing_transaction_list->SearchFieldsPerRow == 0) {
			$view_billing_transaction_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_transaction_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_billing_transaction_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_billing_transaction_list->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_billing_transaction_createddatetime" class="ew-search-field">
<input type="text" data-table="view_billing_transaction" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_transaction_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_transaction_list->createddatetime->EditValue ?>"<?php echo $view_billing_transaction_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_transaction_list->createddatetime->ReadOnly && !$view_billing_transaction_list->createddatetime->Disabled && !isset($view_billing_transaction_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_transaction_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_transactionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_transactionlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_billing_transaction_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="view_billing_transaction" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_transaction_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_transaction_list->createddatetime->EditValue2 ?>"<?php echo $view_billing_transaction_list->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_transaction_list->createddatetime->ReadOnly && !$view_billing_transaction_list->createddatetime->Disabled && !isset($view_billing_transaction_list->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_transaction_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_transactionlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_transactionlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_billing_transaction_list->SearchColumnCount % $view_billing_transaction_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->Type->Visible) { // Type ?>
	<?php
		$view_billing_transaction_list->SearchColumnCount++;
		if (($view_billing_transaction_list->SearchColumnCount - 1) % $view_billing_transaction_list->SearchFieldsPerRow == 0) {
			$view_billing_transaction_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_billing_transaction_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Type" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $view_billing_transaction_list->Type->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Type" id="z_Type" value="LIKE">
</span>
		<span id="el_view_billing_transaction_Type" class="ew-search-field">
<div id="tp_x_Type" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_transaction" data-field="x_Type" data-value-separator="<?php echo $view_billing_transaction_list->Type->displayValueSeparatorAttribute() ?>" name="x_Type[]" id="x_Type[]" value="{value}"<?php echo $view_billing_transaction_list->Type->editAttributes() ?>></div>
<div id="dsl_x_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_transaction_list->Type->checkBoxListHtml(FALSE, "x_Type[]") ?>
</div></div>
</span>
	</div>
	<?php if ($view_billing_transaction_list->SearchColumnCount % $view_billing_transaction_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_billing_transaction_list->SearchColumnCount % $view_billing_transaction_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_billing_transaction_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_billing_transaction_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_billing_transaction_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_billing_transaction_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_billing_transaction_list->showPageHeader(); ?>
<?php
$view_billing_transaction_list->showMessage();
?>
<?php if ($view_billing_transaction_list->TotalRecords > 0 || $view_billing_transaction->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_billing_transaction_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_transaction">
<?php if (!$view_billing_transaction_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_billing_transaction_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_billing_transaction_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_transaction_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_billing_transactionlist" id="fview_billing_transactionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_transaction">
<div id="gmp_view_billing_transaction" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_billing_transaction_list->TotalRecords > 0 || $view_billing_transaction_list->isGridEdit()) { ?>
<table id="tbl_view_billing_transactionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_billing_transaction->RowType = ROWTYPE_HEADER;

// Render list options
$view_billing_transaction_list->renderListOptions();

// Render list options (header, left)
$view_billing_transaction_list->ListOptions->render("header", "left");
?>
<?php if ($view_billing_transaction_list->id->Visible) { // id ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_billing_transaction_list->id->headerCellClass() ?>"><div id="elh_view_billing_transaction_id" class="view_billing_transaction_id"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_billing_transaction_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->id) ?>', 1);"><div id="elh_view_billing_transaction_id" class="view_billing_transaction_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_transaction_list->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_transaction_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->createddatetime) ?>', 1);"><div id="elh_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_transaction_list->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_transaction_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->BillNumber) ?>', 1);"><div id="elh_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_transaction_list->PatientId->headerCellClass() ?>"><div id="elh_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_transaction_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->PatientId) ?>', 1);"><div id="elh_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_transaction_list->PatientName->headerCellClass() ?>"><div id="elh_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_transaction_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->PatientName) ?>', 1);"><div id="elh_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_transaction_list->Mobile->headerCellClass() ?>"><div id="elh_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_transaction_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->Mobile) ?>', 1);"><div id="elh_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->IP_OP->Visible) { // IP_OP ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $view_billing_transaction_list->IP_OP->headerCellClass() ?>"><div id="elh_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $view_billing_transaction_list->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->IP_OP) ?>', 1);"><div id="elh_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->IP_OP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->IP_OP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_transaction_list->Doctor->headerCellClass() ?>"><div id="elh_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_transaction_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->Doctor) ?>', 1);"><div id="elh_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_transaction_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_transaction_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->ModeofPayment) ?>', 1);"><div id="elh_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->Amount->Visible) { // Amount ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_billing_transaction_list->Amount->headerCellClass() ?>"><div id="elh_view_billing_transaction_Amount" class="view_billing_transaction_Amount"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_billing_transaction_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->Amount) ?>', 1);"><div id="elh_view_billing_transaction_Amount" class="view_billing_transaction_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->refund->Visible) { // refund ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->refund) == "") { ?>
		<th data-name="refund" class="<?php echo $view_billing_transaction_list->refund->headerCellClass() ?>"><div id="elh_view_billing_transaction_refund" class="view_billing_transaction_refund"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->refund->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="refund" class="<?php echo $view_billing_transaction_list->refund->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->refund) ?>', 1);"><div id="elh_view_billing_transaction_refund" class="view_billing_transaction_refund">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->refund->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->refund->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->refund->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->Type->Visible) { // Type ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $view_billing_transaction_list->Type->headerCellClass() ?>"><div id="elh_view_billing_transaction_Type" class="view_billing_transaction_Type"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $view_billing_transaction_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->Type) ?>', 1);"><div id="elh_view_billing_transaction_Type" class="view_billing_transaction_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->BankName->Visible) { // BankName ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_billing_transaction_list->BankName->headerCellClass() ?>"><div id="elh_view_billing_transaction_BankName" class="view_billing_transaction_BankName"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_billing_transaction_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->BankName) ?>', 1);"><div id="elh_view_billing_transaction_BankName" class="view_billing_transaction_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction_list->UserName->Visible) { // UserName ?>
	<?php if ($view_billing_transaction_list->SortUrl($view_billing_transaction_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_billing_transaction_list->UserName->headerCellClass() ?>"><div id="elh_view_billing_transaction_UserName" class="view_billing_transaction_UserName"><div class="ew-table-header-caption"><?php echo $view_billing_transaction_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_billing_transaction_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_transaction_list->SortUrl($view_billing_transaction_list->UserName) ?>', 1);"><div id="elh_view_billing_transaction_UserName" class="view_billing_transaction_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_transaction_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_billing_transaction_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_billing_transaction_list->ExportAll && $view_billing_transaction_list->isExport()) {
	$view_billing_transaction_list->StopRecord = $view_billing_transaction_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_billing_transaction_list->TotalRecords > $view_billing_transaction_list->StartRecord + $view_billing_transaction_list->DisplayRecords - 1)
		$view_billing_transaction_list->StopRecord = $view_billing_transaction_list->StartRecord + $view_billing_transaction_list->DisplayRecords - 1;
	else
		$view_billing_transaction_list->StopRecord = $view_billing_transaction_list->TotalRecords;
}
$view_billing_transaction_list->RecordCount = $view_billing_transaction_list->StartRecord - 1;
if ($view_billing_transaction_list->Recordset && !$view_billing_transaction_list->Recordset->EOF) {
	$view_billing_transaction_list->Recordset->moveFirst();
	$selectLimit = $view_billing_transaction_list->UseSelectLimit;
	if (!$selectLimit && $view_billing_transaction_list->StartRecord > 1)
		$view_billing_transaction_list->Recordset->move($view_billing_transaction_list->StartRecord - 1);
} elseif (!$view_billing_transaction->AllowAddDeleteRow && $view_billing_transaction_list->StopRecord == 0) {
	$view_billing_transaction_list->StopRecord = $view_billing_transaction->GridAddRowCount;
}

// Initialize aggregate
$view_billing_transaction->RowType = ROWTYPE_AGGREGATEINIT;
$view_billing_transaction->resetAttributes();
$view_billing_transaction_list->renderRow();
while ($view_billing_transaction_list->RecordCount < $view_billing_transaction_list->StopRecord) {
	$view_billing_transaction_list->RecordCount++;
	if ($view_billing_transaction_list->RecordCount >= $view_billing_transaction_list->StartRecord) {
		$view_billing_transaction_list->RowCount++;

		// Set up key count
		$view_billing_transaction_list->KeyCount = $view_billing_transaction_list->RowIndex;

		// Init row class and style
		$view_billing_transaction->resetAttributes();
		$view_billing_transaction->CssClass = "";
		if ($view_billing_transaction_list->isGridAdd()) {
		} else {
			$view_billing_transaction_list->loadRowValues($view_billing_transaction_list->Recordset); // Load row values
		}
		$view_billing_transaction->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_billing_transaction->RowAttrs->merge(["data-rowindex" => $view_billing_transaction_list->RowCount, "id" => "r" . $view_billing_transaction_list->RowCount . "_view_billing_transaction", "data-rowtype" => $view_billing_transaction->RowType]);

		// Render row
		$view_billing_transaction_list->renderRow();

		// Render list options
		$view_billing_transaction_list->renderListOptions();
?>
	<tr <?php echo $view_billing_transaction->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_transaction_list->ListOptions->render("body", "left", $view_billing_transaction_list->RowCount);
?>
	<?php if ($view_billing_transaction_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_billing_transaction_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_id">
<span<?php echo $view_billing_transaction_list->id->viewAttributes() ?>><?php echo $view_billing_transaction_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_billing_transaction_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_createddatetime">
<span<?php echo $view_billing_transaction_list->createddatetime->viewAttributes() ?>><?php echo $view_billing_transaction_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_billing_transaction_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_BillNumber">
<span<?php echo $view_billing_transaction_list->BillNumber->viewAttributes() ?>><?php echo $view_billing_transaction_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_billing_transaction_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_PatientId">
<span<?php echo $view_billing_transaction_list->PatientId->viewAttributes() ?>><?php echo $view_billing_transaction_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_billing_transaction_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_PatientName">
<span<?php echo $view_billing_transaction_list->PatientName->viewAttributes() ?>><?php echo $view_billing_transaction_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_billing_transaction_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_Mobile">
<span<?php echo $view_billing_transaction_list->Mobile->viewAttributes() ?>><?php echo $view_billing_transaction_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" <?php echo $view_billing_transaction_list->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_IP_OP">
<span<?php echo $view_billing_transaction_list->IP_OP->viewAttributes() ?>><?php echo $view_billing_transaction_list->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_billing_transaction_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_Doctor">
<span<?php echo $view_billing_transaction_list->Doctor->viewAttributes() ?>><?php echo $view_billing_transaction_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_billing_transaction_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_ModeofPayment">
<span<?php echo $view_billing_transaction_list->ModeofPayment->viewAttributes() ?>><?php echo $view_billing_transaction_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_billing_transaction_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_Amount">
<span<?php echo $view_billing_transaction_list->Amount->viewAttributes() ?>><?php echo $view_billing_transaction_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->refund->Visible) { // refund ?>
		<td data-name="refund" <?php echo $view_billing_transaction_list->refund->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_refund">
<span<?php echo $view_billing_transaction_list->refund->viewAttributes() ?>><?php echo $view_billing_transaction_list->refund->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $view_billing_transaction_list->Type->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_Type">
<span<?php echo $view_billing_transaction_list->Type->viewAttributes() ?>><?php echo $view_billing_transaction_list->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $view_billing_transaction_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_BankName">
<span<?php echo $view_billing_transaction_list->BankName->viewAttributes() ?>><?php echo $view_billing_transaction_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_billing_transaction_list->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCount ?>_view_billing_transaction_UserName">
<span<?php echo $view_billing_transaction_list->UserName->viewAttributes() ?>><?php echo $view_billing_transaction_list->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_transaction_list->ListOptions->render("body", "right", $view_billing_transaction_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_billing_transaction_list->isGridAdd())
		$view_billing_transaction_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_billing_transaction->RowType = ROWTYPE_AGGREGATE;
$view_billing_transaction->resetAttributes();
$view_billing_transaction_list->renderRow();
?>
<?php if ($view_billing_transaction_list->TotalRecords > 0 && !$view_billing_transaction_list->isGridAdd() && !$view_billing_transaction_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_billing_transaction_list->renderListOptions();

// Render list options (footer, left)
$view_billing_transaction_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_billing_transaction_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_billing_transaction_list->id->footerCellClass() ?>"><span id="elf_view_billing_transaction_id" class="view_billing_transaction_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_billing_transaction_list->createddatetime->footerCellClass() ?>"><span id="elf_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" class="<?php echo $view_billing_transaction_list->BillNumber->footerCellClass() ?>"><span id="elf_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_billing_transaction_list->PatientId->footerCellClass() ?>"><span id="elf_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_billing_transaction_list->PatientName->footerCellClass() ?>"><span id="elf_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_billing_transaction_list->Mobile->footerCellClass() ?>"><span id="elf_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" class="<?php echo $view_billing_transaction_list->IP_OP->footerCellClass() ?>"><span id="elf_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" class="<?php echo $view_billing_transaction_list->Doctor->footerCellClass() ?>"><span id="elf_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_billing_transaction_list->ModeofPayment->footerCellClass() ?>"><span id="elf_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $view_billing_transaction_list->Amount->footerCellClass() ?>"><span id="elf_view_billing_transaction_Amount" class="view_billing_transaction_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_billing_transaction_list->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->refund->Visible) { // refund ?>
		<td data-name="refund" class="<?php echo $view_billing_transaction_list->refund->footerCellClass() ?>"><span id="elf_view_billing_transaction_refund" class="view_billing_transaction_refund">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_billing_transaction_list->refund->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Type->Visible) { // Type ?>
		<td data-name="Type" class="<?php echo $view_billing_transaction_list->Type->footerCellClass() ?>"><span id="elf_view_billing_transaction_Type" class="view_billing_transaction_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" class="<?php echo $view_billing_transaction_list->BankName->footerCellClass() ?>"><span id="elf_view_billing_transaction_BankName" class="view_billing_transaction_BankName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_billing_transaction_list->UserName->footerCellClass() ?>"><span id="elf_view_billing_transaction_UserName" class="view_billing_transaction_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_billing_transaction_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_billing_transaction->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_billing_transaction_list->Recordset)
	$view_billing_transaction_list->Recordset->Close();
?>
<?php if (!$view_billing_transaction_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_billing_transaction_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_billing_transaction_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_transaction_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_billing_transaction_list->TotalRecords == 0 && !$view_billing_transaction->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_billing_transaction_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_billing_transaction_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_billing_transaction_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_billing_transaction->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_billing_transaction",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_billing_transaction_list->terminate();
?>