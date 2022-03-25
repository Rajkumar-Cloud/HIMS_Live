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
$_view_till_search_view_list = new _view_till_search_view_list();

// Run the page
$_view_till_search_view_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_view_till_search_view_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$_view_till_search_view_list->isExport()) { ?>
<script>
var f_view_till_search_viewlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	f_view_till_search_viewlist = currentForm = new ew.Form("f_view_till_search_viewlist", "list");
	f_view_till_search_viewlist.formKeyCountName = '<?php echo $_view_till_search_view_list->FormKeyCountName ?>';
	loadjs.done("f_view_till_search_viewlist");
});
var f_view_till_search_viewlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	f_view_till_search_viewlistsrch = currentSearchForm = new ew.Form("f_view_till_search_viewlistsrch");

	// Validate function for search
	f_view_till_search_viewlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_DepositDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($_view_till_search_view_list->DepositDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	f_view_till_search_viewlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	f_view_till_search_viewlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	f_view_till_search_viewlistsrch.filterList = <?php echo $_view_till_search_view_list->getFilterList() ?>;
	loadjs.done("f_view_till_search_viewlistsrch");
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
<?php if (!$_view_till_search_view_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_view_till_search_view_list->TotalRecords > 0 && $_view_till_search_view_list->ExportOptions->visible()) { ?>
<?php $_view_till_search_view_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_till_search_view_list->ImportOptions->visible()) { ?>
<?php $_view_till_search_view_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_till_search_view_list->SearchOptions->visible()) { ?>
<?php $_view_till_search_view_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_view_till_search_view_list->FilterOptions->visible()) { ?>
<?php $_view_till_search_view_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_view_till_search_view_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$_view_till_search_view_list->isExport() && !$_view_till_search_view->CurrentAction) { ?>
<form name="f_view_till_search_viewlistsrch" id="f_view_till_search_viewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="f_view_till_search_viewlistsrch-search-panel" class="<?php echo $_view_till_search_view_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_view_till_search_view">
	<div class="ew-extended-search">
<?php

// Render search row
$_view_till_search_view->RowType = ROWTYPE_SEARCH;
$_view_till_search_view->resetAttributes();
$_view_till_search_view_list->renderRow();
?>
<?php if ($_view_till_search_view_list->DepositDate->Visible) { // DepositDate ?>
	<?php
		$_view_till_search_view_list->SearchColumnCount++;
		if (($_view_till_search_view_list->SearchColumnCount - 1) % $_view_till_search_view_list->SearchFieldsPerRow == 0) {
			$_view_till_search_view_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $_view_till_search_view_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DepositDate" class="ew-cell form-group">
		<label for="x_DepositDate" class="ew-search-caption ew-label"><?php echo $_view_till_search_view_list->DepositDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_DepositDate" id="z_DepositDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $_view_till_search_view_list->DepositDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el__view_till_search_view_DepositDate" class="ew-search-field">
<input type="text" data-table="_view_till_search_view" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?php echo HtmlEncode($_view_till_search_view_list->DepositDate->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view_list->DepositDate->EditValue ?>"<?php echo $_view_till_search_view_list->DepositDate->editAttributes() ?>>
<?php if (!$_view_till_search_view_list->DepositDate->ReadOnly && !$_view_till_search_view_list->DepositDate->Disabled && !isset($_view_till_search_view_list->DepositDate->EditAttrs["readonly"]) && !isset($_view_till_search_view_list->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["f_view_till_search_viewlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("f_view_till_search_viewlistsrch", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2__view_till_search_view_DepositDate" class="ew-search-field2 d-none">
<input type="text" data-table="_view_till_search_view" data-field="x_DepositDate" data-format="7" name="y_DepositDate" id="y_DepositDate" placeholder="<?php echo HtmlEncode($_view_till_search_view_list->DepositDate->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view_list->DepositDate->EditValue2 ?>"<?php echo $_view_till_search_view_list->DepositDate->editAttributes() ?>>
<?php if (!$_view_till_search_view_list->DepositDate->ReadOnly && !$_view_till_search_view_list->DepositDate->Disabled && !isset($_view_till_search_view_list->DepositDate->EditAttrs["readonly"]) && !isset($_view_till_search_view_list->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["f_view_till_search_viewlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("f_view_till_search_viewlistsrch", "y_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($_view_till_search_view_list->SearchColumnCount % $_view_till_search_view_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->CreatedUserName->Visible) { // CreatedUserName ?>
	<?php
		$_view_till_search_view_list->SearchColumnCount++;
		if (($_view_till_search_view_list->SearchColumnCount - 1) % $_view_till_search_view_list->SearchFieldsPerRow == 0) {
			$_view_till_search_view_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $_view_till_search_view_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_CreatedUserName" class="ew-cell form-group">
		<label for="x_CreatedUserName" class="ew-search-caption ew-label"><?php echo $_view_till_search_view_list->CreatedUserName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CreatedUserName" id="z_CreatedUserName" value="LIKE">
</span>
		<span id="el__view_till_search_view_CreatedUserName" class="ew-search-field">
<input type="text" data-table="_view_till_search_view" data-field="x_CreatedUserName" name="x_CreatedUserName" id="x_CreatedUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_view_till_search_view_list->CreatedUserName->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view_list->CreatedUserName->EditValue ?>"<?php echo $_view_till_search_view_list->CreatedUserName->editAttributes() ?>>
</span>
	</div>
	<?php if ($_view_till_search_view_list->SearchColumnCount % $_view_till_search_view_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->TransferTo->Visible) { // TransferTo ?>
	<?php
		$_view_till_search_view_list->SearchColumnCount++;
		if (($_view_till_search_view_list->SearchColumnCount - 1) % $_view_till_search_view_list->SearchFieldsPerRow == 0) {
			$_view_till_search_view_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $_view_till_search_view_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_TransferTo" class="ew-cell form-group">
		<label for="x_TransferTo" class="ew-search-caption ew-label"><?php echo $_view_till_search_view_list->TransferTo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TransferTo" id="z_TransferTo" value="LIKE">
</span>
		<span id="el__view_till_search_view_TransferTo" class="ew-search-field">
<input type="text" data-table="_view_till_search_view" data-field="x_TransferTo" name="x_TransferTo" id="x_TransferTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_view_till_search_view_list->TransferTo->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view_list->TransferTo->EditValue ?>"<?php echo $_view_till_search_view_list->TransferTo->editAttributes() ?>>
</span>
	</div>
	<?php if ($_view_till_search_view_list->SearchColumnCount % $_view_till_search_view_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($_view_till_search_view_list->SearchColumnCount % $_view_till_search_view_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $_view_till_search_view_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($_view_till_search_view_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($_view_till_search_view_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $_view_till_search_view_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $_view_till_search_view_list->showPageHeader(); ?>
<?php
$_view_till_search_view_list->showMessage();
?>
<?php if ($_view_till_search_view_list->TotalRecords > 0 || $_view_till_search_view->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_view_till_search_view_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _view_till_search_view">
<?php if (!$_view_till_search_view_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$_view_till_search_view_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $_view_till_search_view_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_till_search_view_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="f_view_till_search_viewlist" id="f_view_till_search_viewlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_view_till_search_view">
<div id="gmp__view_till_search_view" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($_view_till_search_view_list->TotalRecords > 0 || $_view_till_search_view_list->isGridEdit()) { ?>
<table id="tbl__view_till_search_viewlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_view_till_search_view->RowType = ROWTYPE_HEADER;

// Render list options
$_view_till_search_view_list->renderListOptions();

// Render list options (header, left)
$_view_till_search_view_list->ListOptions->render("header", "left");
?>
<?php if ($_view_till_search_view_list->id->Visible) { // id ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $_view_till_search_view_list->id->headerCellClass() ?>"><div id="elh__view_till_search_view_id" class="_view_till_search_view_id"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_view_till_search_view_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->id) ?>', 1);"><div id="elh__view_till_search_view_id" class="_view_till_search_view_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->DepositDate->Visible) { // DepositDate ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->DepositDate) == "") { ?>
		<th data-name="DepositDate" class="<?php echo $_view_till_search_view_list->DepositDate->headerCellClass() ?>"><div id="elh__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->DepositDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepositDate" class="<?php echo $_view_till_search_view_list->DepositDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->DepositDate) ?>', 1);"><div id="elh__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->DepositDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->DepositDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->DepositDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->CreatedUserName->Visible) { // CreatedUserName ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->CreatedUserName) == "") { ?>
		<th data-name="CreatedUserName" class="<?php echo $_view_till_search_view_list->CreatedUserName->headerCellClass() ?>"><div id="elh__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->CreatedUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedUserName" class="<?php echo $_view_till_search_view_list->CreatedUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->CreatedUserName) ?>', 1);"><div id="elh__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->CreatedUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->CreatedUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->CreatedUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->TransferTo->Visible) { // TransferTo ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->TransferTo) == "") { ?>
		<th data-name="TransferTo" class="<?php echo $_view_till_search_view_list->TransferTo->headerCellClass() ?>"><div id="elh__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->TransferTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferTo" class="<?php echo $_view_till_search_view_list->TransferTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->TransferTo) ?>', 1);"><div id="elh__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->TransferTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->TransferTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->TransferTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->OpeningBalance->Visible) { // OpeningBalance ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->OpeningBalance) == "") { ?>
		<th data-name="OpeningBalance" class="<?php echo $_view_till_search_view_list->OpeningBalance->headerCellClass() ?>"><div id="elh__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->OpeningBalance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningBalance" class="<?php echo $_view_till_search_view_list->OpeningBalance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->OpeningBalance) ?>', 1);"><div id="elh__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->OpeningBalance->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->OpeningBalance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->OpeningBalance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->CashCollected->Visible) { // CashCollected ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->CashCollected) == "") { ?>
		<th data-name="CashCollected" class="<?php echo $_view_till_search_view_list->CashCollected->headerCellClass() ?>"><div id="elh__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->CashCollected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CashCollected" class="<?php echo $_view_till_search_view_list->CashCollected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->CashCollected) ?>', 1);"><div id="elh__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->CashCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->CashCollected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->CashCollected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->TotalCash->Visible) { // TotalCash ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->TotalCash) == "") { ?>
		<th data-name="TotalCash" class="<?php echo $_view_till_search_view_list->TotalCash->headerCellClass() ?>"><div id="elh__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->TotalCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCash" class="<?php echo $_view_till_search_view_list->TotalCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->TotalCash) ?>', 1);"><div id="elh__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->TotalCash->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->TotalCash->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->TotalCash->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->Cheque->Visible) { // Cheque ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->Cheque) == "") { ?>
		<th data-name="Cheque" class="<?php echo $_view_till_search_view_list->Cheque->headerCellClass() ?>"><div id="elh__view_till_search_view_Cheque" class="_view_till_search_view_Cheque"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->Cheque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cheque" class="<?php echo $_view_till_search_view_list->Cheque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->Cheque) ?>', 1);"><div id="elh__view_till_search_view_Cheque" class="_view_till_search_view_Cheque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->Cheque->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->Cheque->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->Cheque->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->Card->Visible) { // Card ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $_view_till_search_view_list->Card->headerCellClass() ?>"><div id="elh__view_till_search_view_Card" class="_view_till_search_view_Card"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $_view_till_search_view_list->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->Card) ?>', 1);"><div id="elh__view_till_search_view_Card" class="_view_till_search_view_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->Card->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->Card->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->RTGS->Visible) { // RTGS ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $_view_till_search_view_list->RTGS->headerCellClass() ?>"><div id="elh__view_till_search_view_RTGS" class="_view_till_search_view_RTGS"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->RTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $_view_till_search_view_list->RTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->RTGS) ?>', 1);"><div id="elh__view_till_search_view_RTGS" class="_view_till_search_view_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->RTGS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->RTGS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->NEFTRTGS) == "") { ?>
		<th data-name="NEFTRTGS" class="<?php echo $_view_till_search_view_list->NEFTRTGS->headerCellClass() ?>"><div id="elh__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->NEFTRTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEFTRTGS" class="<?php echo $_view_till_search_view_list->NEFTRTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->NEFTRTGS) ?>', 1);"><div id="elh__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->NEFTRTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->NEFTRTGS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->NEFTRTGS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->PAYTM->Visible) { // PAYTM ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $_view_till_search_view_list->PAYTM->headerCellClass() ?>"><div id="elh__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->PAYTM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $_view_till_search_view_list->PAYTM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->PAYTM) ?>', 1);"><div id="elh__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->PAYTM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->PAYTM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->Other->Visible) { // Other ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->Other) == "") { ?>
		<th data-name="Other" class="<?php echo $_view_till_search_view_list->Other->headerCellClass() ?>"><div id="elh__view_till_search_view_Other" class="_view_till_search_view_Other"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->Other->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Other" class="<?php echo $_view_till_search_view_list->Other->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->Other) ?>', 1);"><div id="elh__view_till_search_view_Other" class="_view_till_search_view_Other">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->Other->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->Other->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->Other->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view_list->BalanceAmount->Visible) { // BalanceAmount ?>
	<?php if ($_view_till_search_view_list->SortUrl($_view_till_search_view_list->BalanceAmount) == "") { ?>
		<th data-name="BalanceAmount" class="<?php echo $_view_till_search_view_list->BalanceAmount->headerCellClass() ?>"><div id="elh__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount"><div class="ew-table-header-caption"><?php echo $_view_till_search_view_list->BalanceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BalanceAmount" class="<?php echo $_view_till_search_view_list->BalanceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_till_search_view_list->SortUrl($_view_till_search_view_list->BalanceAmount) ?>', 1);"><div id="elh__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view_list->BalanceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view_list->BalanceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_till_search_view_list->BalanceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_view_till_search_view_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_view_till_search_view_list->ExportAll && $_view_till_search_view_list->isExport()) {
	$_view_till_search_view_list->StopRecord = $_view_till_search_view_list->TotalRecords;
} else {

	// Set the last record to display
	if ($_view_till_search_view_list->TotalRecords > $_view_till_search_view_list->StartRecord + $_view_till_search_view_list->DisplayRecords - 1)
		$_view_till_search_view_list->StopRecord = $_view_till_search_view_list->StartRecord + $_view_till_search_view_list->DisplayRecords - 1;
	else
		$_view_till_search_view_list->StopRecord = $_view_till_search_view_list->TotalRecords;
}
$_view_till_search_view_list->RecordCount = $_view_till_search_view_list->StartRecord - 1;
if ($_view_till_search_view_list->Recordset && !$_view_till_search_view_list->Recordset->EOF) {
	$_view_till_search_view_list->Recordset->moveFirst();
	$selectLimit = $_view_till_search_view_list->UseSelectLimit;
	if (!$selectLimit && $_view_till_search_view_list->StartRecord > 1)
		$_view_till_search_view_list->Recordset->move($_view_till_search_view_list->StartRecord - 1);
} elseif (!$_view_till_search_view->AllowAddDeleteRow && $_view_till_search_view_list->StopRecord == 0) {
	$_view_till_search_view_list->StopRecord = $_view_till_search_view->GridAddRowCount;
}

// Initialize aggregate
$_view_till_search_view->RowType = ROWTYPE_AGGREGATEINIT;
$_view_till_search_view->resetAttributes();
$_view_till_search_view_list->renderRow();
while ($_view_till_search_view_list->RecordCount < $_view_till_search_view_list->StopRecord) {
	$_view_till_search_view_list->RecordCount++;
	if ($_view_till_search_view_list->RecordCount >= $_view_till_search_view_list->StartRecord) {
		$_view_till_search_view_list->RowCount++;

		// Set up key count
		$_view_till_search_view_list->KeyCount = $_view_till_search_view_list->RowIndex;

		// Init row class and style
		$_view_till_search_view->resetAttributes();
		$_view_till_search_view->CssClass = "";
		if ($_view_till_search_view_list->isGridAdd()) {
		} else {
			$_view_till_search_view_list->loadRowValues($_view_till_search_view_list->Recordset); // Load row values
		}
		$_view_till_search_view->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_view_till_search_view->RowAttrs->merge(["data-rowindex" => $_view_till_search_view_list->RowCount, "id" => "r" . $_view_till_search_view_list->RowCount . "__view_till_search_view", "data-rowtype" => $_view_till_search_view->RowType]);

		// Render row
		$_view_till_search_view_list->renderRow();

		// Render list options
		$_view_till_search_view_list->renderListOptions();
?>
	<tr <?php echo $_view_till_search_view->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_view_till_search_view_list->ListOptions->render("body", "left", $_view_till_search_view_list->RowCount);
?>
	<?php if ($_view_till_search_view_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $_view_till_search_view_list->id->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_id">
<span<?php echo $_view_till_search_view_list->id->viewAttributes() ?>><?php echo $_view_till_search_view_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate" <?php echo $_view_till_search_view_list->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_DepositDate">
<span<?php echo $_view_till_search_view_list->DepositDate->viewAttributes() ?>><?php echo $_view_till_search_view_list->DepositDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName" <?php echo $_view_till_search_view_list->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_CreatedUserName">
<span<?php echo $_view_till_search_view_list->CreatedUserName->viewAttributes() ?>><?php echo $_view_till_search_view_list->CreatedUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo" <?php echo $_view_till_search_view_list->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_TransferTo">
<span<?php echo $_view_till_search_view_list->TransferTo->viewAttributes() ?>><?php echo $_view_till_search_view_list->TransferTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance" <?php echo $_view_till_search_view_list->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_OpeningBalance">
<span<?php echo $_view_till_search_view_list->OpeningBalance->viewAttributes() ?>><?php echo $_view_till_search_view_list->OpeningBalance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->CashCollected->Visible) { // CashCollected ?>
		<td data-name="CashCollected" <?php echo $_view_till_search_view_list->CashCollected->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_CashCollected">
<span<?php echo $_view_till_search_view_list->CashCollected->viewAttributes() ?>><?php echo $_view_till_search_view_list->CashCollected->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash" <?php echo $_view_till_search_view_list->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_TotalCash">
<span<?php echo $_view_till_search_view_list->TotalCash->viewAttributes() ?>><?php echo $_view_till_search_view_list->TotalCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque" <?php echo $_view_till_search_view_list->Cheque->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_Cheque">
<span<?php echo $_view_till_search_view_list->Cheque->viewAttributes() ?>><?php echo $_view_till_search_view_list->Cheque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Card->Visible) { // Card ?>
		<td data-name="Card" <?php echo $_view_till_search_view_list->Card->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_Card">
<span<?php echo $_view_till_search_view_list->Card->viewAttributes() ?>><?php echo $_view_till_search_view_list->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" <?php echo $_view_till_search_view_list->RTGS->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_RTGS">
<span<?php echo $_view_till_search_view_list->RTGS->viewAttributes() ?>><?php echo $_view_till_search_view_list->RTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS" <?php echo $_view_till_search_view_list->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_NEFTRTGS">
<span<?php echo $_view_till_search_view_list->NEFTRTGS->viewAttributes() ?>><?php echo $_view_till_search_view_list->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" <?php echo $_view_till_search_view_list->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_PAYTM">
<span<?php echo $_view_till_search_view_list->PAYTM->viewAttributes() ?>><?php echo $_view_till_search_view_list->PAYTM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Other->Visible) { // Other ?>
		<td data-name="Other" <?php echo $_view_till_search_view_list->Other->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_Other">
<span<?php echo $_view_till_search_view_list->Other->viewAttributes() ?>><?php echo $_view_till_search_view_list->Other->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->BalanceAmount->Visible) { // BalanceAmount ?>
		<td data-name="BalanceAmount" <?php echo $_view_till_search_view_list->BalanceAmount->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCount ?>__view_till_search_view_BalanceAmount">
<span<?php echo $_view_till_search_view_list->BalanceAmount->viewAttributes() ?>><?php echo $_view_till_search_view_list->BalanceAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_view_till_search_view_list->ListOptions->render("body", "right", $_view_till_search_view_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$_view_till_search_view_list->isGridAdd())
		$_view_till_search_view_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$_view_till_search_view->RowType = ROWTYPE_AGGREGATE;
$_view_till_search_view->resetAttributes();
$_view_till_search_view_list->renderRow();
?>
<?php if ($_view_till_search_view_list->TotalRecords > 0 && !$_view_till_search_view_list->isGridAdd() && !$_view_till_search_view_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$_view_till_search_view_list->renderListOptions();

// Render list options (footer, left)
$_view_till_search_view_list->ListOptions->render("footer", "left");
?>
	<?php if ($_view_till_search_view_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $_view_till_search_view_list->id->footerCellClass() ?>"><span id="elf__view_till_search_view_id" class="_view_till_search_view_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate" class="<?php echo $_view_till_search_view_list->DepositDate->footerCellClass() ?>"><span id="elf__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName" class="<?php echo $_view_till_search_view_list->CreatedUserName->footerCellClass() ?>"><span id="elf__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo" class="<?php echo $_view_till_search_view_list->TransferTo->footerCellClass() ?>"><span id="elf__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance" class="<?php echo $_view_till_search_view_list->OpeningBalance->footerCellClass() ?>"><span id="elf__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->OpeningBalance->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->CashCollected->Visible) { // CashCollected ?>
		<td data-name="CashCollected" class="<?php echo $_view_till_search_view_list->CashCollected->footerCellClass() ?>"><span id="elf__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->CashCollected->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash" class="<?php echo $_view_till_search_view_list->TotalCash->footerCellClass() ?>"><span id="elf__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->TotalCash->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque" class="<?php echo $_view_till_search_view_list->Cheque->footerCellClass() ?>"><span id="elf__view_till_search_view_Cheque" class="_view_till_search_view_Cheque">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->Cheque->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Card->Visible) { // Card ?>
		<td data-name="Card" class="<?php echo $_view_till_search_view_list->Card->footerCellClass() ?>"><span id="elf__view_till_search_view_Card" class="_view_till_search_view_Card">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->Card->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" class="<?php echo $_view_till_search_view_list->RTGS->footerCellClass() ?>"><span id="elf__view_till_search_view_RTGS" class="_view_till_search_view_RTGS">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->RTGS->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS" class="<?php echo $_view_till_search_view_list->NEFTRTGS->footerCellClass() ?>"><span id="elf__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->NEFTRTGS->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" class="<?php echo $_view_till_search_view_list->PAYTM->footerCellClass() ?>"><span id="elf__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->PAYTM->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Other->Visible) { // Other ?>
		<td data-name="Other" class="<?php echo $_view_till_search_view_list->Other->footerCellClass() ?>"><span id="elf__view_till_search_view_Other" class="_view_till_search_view_Other">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->Other->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view_list->BalanceAmount->Visible) { // BalanceAmount ?>
		<td data-name="BalanceAmount" class="<?php echo $_view_till_search_view_list->BalanceAmount->footerCellClass() ?>"><span id="elf__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view_list->BalanceAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$_view_till_search_view_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$_view_till_search_view->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_view_till_search_view_list->Recordset)
	$_view_till_search_view_list->Recordset->Close();
?>
<?php if (!$_view_till_search_view_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_view_till_search_view_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $_view_till_search_view_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_till_search_view_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_view_till_search_view_list->TotalRecords == 0 && !$_view_till_search_view->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_view_till_search_view_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_view_till_search_view_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$_view_till_search_view_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$_view_till_search_view->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp__view_till_search_view",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$_view_till_search_view_list->terminate();
?>