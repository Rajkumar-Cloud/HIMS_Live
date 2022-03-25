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
$view_bill_collection_summary_list = new view_bill_collection_summary_list();

// Run the page
$view_bill_collection_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_bill_collection_summary_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_bill_collection_summary_list->isExport()) { ?>
<script>
var fview_bill_collection_summarylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_bill_collection_summarylist = currentForm = new ew.Form("fview_bill_collection_summarylist", "list");
	fview_bill_collection_summarylist.formKeyCountName = '<?php echo $view_bill_collection_summary_list->FormKeyCountName ?>';
	loadjs.done("fview_bill_collection_summarylist");
});
var fview_bill_collection_summarylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_bill_collection_summarylistsrch = currentSearchForm = new ew.Form("fview_bill_collection_summarylistsrch");

	// Validate function for search
	fview_bill_collection_summarylistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_bill_collection_summary_list->createddate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_bill_collection_summarylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_bill_collection_summarylistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_bill_collection_summarylistsrch.filterList = <?php echo $view_bill_collection_summary_list->getFilterList() ?>;
	loadjs.done("fview_bill_collection_summarylistsrch");
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
<?php if (!$view_bill_collection_summary_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_bill_collection_summary_list->TotalRecords > 0 && $view_bill_collection_summary_list->ExportOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->ImportOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->SearchOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->FilterOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_bill_collection_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_bill_collection_summary_list->isExport() && !$view_bill_collection_summary->CurrentAction) { ?>
<form name="fview_bill_collection_summarylistsrch" id="fview_bill_collection_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_bill_collection_summarylistsrch-search-panel" class="<?php echo $view_bill_collection_summary_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_bill_collection_summary">
	<div class="ew-extended-search">
<?php

// Render search row
$view_bill_collection_summary->RowType = ROWTYPE_SEARCH;
$view_bill_collection_summary->resetAttributes();
$view_bill_collection_summary_list->renderRow();
?>
<?php if ($view_bill_collection_summary_list->createddate->Visible) { // createddate ?>
	<?php
		$view_bill_collection_summary_list->SearchColumnCount++;
		if (($view_bill_collection_summary_list->SearchColumnCount - 1) % $view_bill_collection_summary_list->SearchFieldsPerRow == 0) {
			$view_bill_collection_summary_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_bill_collection_summary_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_bill_collection_summary_list->createddate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_bill_collection_summary_list->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_bill_collection_summary_createddate" class="ew-search-field">
<input type="text" data-table="view_bill_collection_summary" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_bill_collection_summary_list->createddate->getPlaceHolder()) ?>" value="<?php echo $view_bill_collection_summary_list->createddate->EditValue ?>"<?php echo $view_bill_collection_summary_list->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_summary_list->createddate->ReadOnly && !$view_bill_collection_summary_list->createddate->Disabled && !isset($view_bill_collection_summary_list->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_summary_list->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_bill_collection_summarylistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_bill_collection_summarylistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_bill_collection_summary_createddate" class="ew-search-field2 d-none">
<input type="text" data-table="view_bill_collection_summary" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_bill_collection_summary_list->createddate->getPlaceHolder()) ?>" value="<?php echo $view_bill_collection_summary_list->createddate->EditValue2 ?>"<?php echo $view_bill_collection_summary_list->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_summary_list->createddate->ReadOnly && !$view_bill_collection_summary_list->createddate->Disabled && !isset($view_bill_collection_summary_list->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_summary_list->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_bill_collection_summarylistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_bill_collection_summarylistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_bill_collection_summary_list->SearchColumnCount % $view_bill_collection_summary_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_bill_collection_summary_list->SearchColumnCount % $view_bill_collection_summary_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_bill_collection_summary_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_bill_collection_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_bill_collection_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_bill_collection_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_bill_collection_summary_list->showPageHeader(); ?>
<?php
$view_bill_collection_summary_list->showMessage();
?>
<?php if ($view_bill_collection_summary_list->TotalRecords > 0 || $view_bill_collection_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_bill_collection_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_bill_collection_summary">
<?php if (!$view_bill_collection_summary_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_bill_collection_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_bill_collection_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_bill_collection_summarylist" id="fview_bill_collection_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_bill_collection_summary">
<div id="gmp_view_bill_collection_summary" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_bill_collection_summary_list->TotalRecords > 0 || $view_bill_collection_summary_list->isGridEdit()) { ?>
<table id="tbl_view_bill_collection_summarylist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_bill_collection_summary->RowType = ROWTYPE_HEADER;

// Render list options
$view_bill_collection_summary_list->renderListOptions();

// Render list options (header, left)
$view_bill_collection_summary_list->ListOptions->render("header", "left", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
<?php if ($view_bill_collection_summary_list->createddate->Visible) { // createddate ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_bill_collection_summary_list->createddate->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_createddate" type="text/html"><?php echo $view_bill_collection_summary_list->createddate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_bill_collection_summary_list->createddate->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_createddate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->createddate) ?>', 1);"><div id="elh_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->createddate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->createddate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->UserName->Visible) { // UserName ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_bill_collection_summary_list->UserName->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_UserName" type="text/html"><?php echo $view_bill_collection_summary_list->UserName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_bill_collection_summary_list->UserName->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_UserName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->UserName) ?>', 1);"><div id="elh_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->CARD->Visible) { // CARD ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CARD) == "") { ?>
		<th data-name="CARD" class="<?php echo $view_bill_collection_summary_list->CARD->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CARD" type="text/html"><?php echo $view_bill_collection_summary_list->CARD->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CARD" class="<?php echo $view_bill_collection_summary_list->CARD->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CARD" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CARD) ?>', 1);"><div id="elh_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->CARD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->CARD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->CARD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->CASH->Visible) { // CASH ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CASH) == "") { ?>
		<th data-name="CASH" class="<?php echo $view_bill_collection_summary_list->CASH->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CASH" type="text/html"><?php echo $view_bill_collection_summary_list->CASH->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CASH" class="<?php echo $view_bill_collection_summary_list->CASH->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CASH" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CASH) ?>', 1);"><div id="elh_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->CASH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->CASH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->CASH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->NEFT->Visible) { // NEFT ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->NEFT) == "") { ?>
		<th data-name="NEFT" class="<?php echo $view_bill_collection_summary_list->NEFT->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_NEFT" type="text/html"><?php echo $view_bill_collection_summary_list->NEFT->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="NEFT" class="<?php echo $view_bill_collection_summary_list->NEFT->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_NEFT" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->NEFT) ?>', 1);"><div id="elh_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->NEFT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->NEFT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->NEFT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->PAYTM->Visible) { // PAYTM ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $view_bill_collection_summary_list->PAYTM->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_PAYTM" type="text/html"><?php echo $view_bill_collection_summary_list->PAYTM->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $view_bill_collection_summary_list->PAYTM->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_PAYTM" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->PAYTM) ?>', 1);"><div id="elh_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->PAYTM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->PAYTM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->CHEQUE->Visible) { // CHEQUE ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CHEQUE) == "") { ?>
		<th data-name="CHEQUE" class="<?php echo $view_bill_collection_summary_list->CHEQUE->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CHEQUE" type="text/html"><?php echo $view_bill_collection_summary_list->CHEQUE->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CHEQUE" class="<?php echo $view_bill_collection_summary_list->CHEQUE->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CHEQUE" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CHEQUE) ?>', 1);"><div id="elh_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->CHEQUE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->CHEQUE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->CHEQUE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->RTGS->Visible) { // RTGS ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $view_bill_collection_summary_list->RTGS->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_RTGS" type="text/html"><?php echo $view_bill_collection_summary_list->RTGS->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $view_bill_collection_summary_list->RTGS->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_RTGS" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->RTGS) ?>', 1);"><div id="elh_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->RTGS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->RTGS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->NotSelected->Visible) { // NotSelected ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->NotSelected) == "") { ?>
		<th data-name="NotSelected" class="<?php echo $view_bill_collection_summary_list->NotSelected->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_NotSelected" type="text/html"><?php echo $view_bill_collection_summary_list->NotSelected->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="NotSelected" class="<?php echo $view_bill_collection_summary_list->NotSelected->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_NotSelected" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->NotSelected) ?>', 1);"><div id="elh_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->NotSelected->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->NotSelected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->NotSelected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->REFUND->Visible) { // REFUND ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->REFUND) == "") { ?>
		<th data-name="REFUND" class="<?php echo $view_bill_collection_summary_list->REFUND->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_REFUND" type="text/html"><?php echo $view_bill_collection_summary_list->REFUND->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="REFUND" class="<?php echo $view_bill_collection_summary_list->REFUND->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_REFUND" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->REFUND) ?>', 1);"><div id="elh_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->REFUND->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->REFUND->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->REFUND->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->CANCEL->Visible) { // CANCEL ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CANCEL) == "") { ?>
		<th data-name="CANCEL" class="<?php echo $view_bill_collection_summary_list->CANCEL->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CANCEL" type="text/html"><?php echo $view_bill_collection_summary_list->CANCEL->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CANCEL" class="<?php echo $view_bill_collection_summary_list->CANCEL->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CANCEL" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->CANCEL) ?>', 1);"><div id="elh_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->CANCEL->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->CANCEL->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->CANCEL->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->Total->Visible) { // Total ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $view_bill_collection_summary_list->Total->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_Total" type="text/html"><?php echo $view_bill_collection_summary_list->Total->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $view_bill_collection_summary_list->Total->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_Total" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->Total) ?>', 1);"><div id="elh_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->Total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->Total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->HospID->Visible) { // HospID ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_bill_collection_summary_list->HospID->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_HospID" type="text/html"><?php echo $view_bill_collection_summary_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_bill_collection_summary_list->HospID->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->HospID) ?>', 1);"><div id="elh_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->BillType->Visible) { // BillType ?>
	<?php if ($view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_bill_collection_summary_list->BillType->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_BillType" type="text/html"><?php echo $view_bill_collection_summary_list->BillType->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_bill_collection_summary_list->BillType->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_BillType" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bill_collection_summary_list->SortUrl($view_bill_collection_summary_list->BillType) ?>', 1);"><div id="elh_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bill_collection_summary_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_bill_collection_summary_list->ListOptions->render("header", "right", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_bill_collection_summary_list->ExportAll && $view_bill_collection_summary_list->isExport()) {
	$view_bill_collection_summary_list->StopRecord = $view_bill_collection_summary_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_bill_collection_summary_list->TotalRecords > $view_bill_collection_summary_list->StartRecord + $view_bill_collection_summary_list->DisplayRecords - 1)
		$view_bill_collection_summary_list->StopRecord = $view_bill_collection_summary_list->StartRecord + $view_bill_collection_summary_list->DisplayRecords - 1;
	else
		$view_bill_collection_summary_list->StopRecord = $view_bill_collection_summary_list->TotalRecords;
}
$view_bill_collection_summary_list->RecordCount = $view_bill_collection_summary_list->StartRecord - 1;
if ($view_bill_collection_summary_list->Recordset && !$view_bill_collection_summary_list->Recordset->EOF) {
	$view_bill_collection_summary_list->Recordset->moveFirst();
	$selectLimit = $view_bill_collection_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_bill_collection_summary_list->StartRecord > 1)
		$view_bill_collection_summary_list->Recordset->move($view_bill_collection_summary_list->StartRecord - 1);
} elseif (!$view_bill_collection_summary->AllowAddDeleteRow && $view_bill_collection_summary_list->StopRecord == 0) {
	$view_bill_collection_summary_list->StopRecord = $view_bill_collection_summary->GridAddRowCount;
}

// Initialize aggregate
$view_bill_collection_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_bill_collection_summary->resetAttributes();
$view_bill_collection_summary_list->renderRow();
while ($view_bill_collection_summary_list->RecordCount < $view_bill_collection_summary_list->StopRecord) {
	$view_bill_collection_summary_list->RecordCount++;
	if ($view_bill_collection_summary_list->RecordCount >= $view_bill_collection_summary_list->StartRecord) {
		$view_bill_collection_summary_list->RowCount++;

		// Set up key count
		$view_bill_collection_summary_list->KeyCount = $view_bill_collection_summary_list->RowIndex;

		// Init row class and style
		$view_bill_collection_summary->resetAttributes();
		$view_bill_collection_summary->CssClass = "";
		if ($view_bill_collection_summary_list->isGridAdd()) {
		} else {
			$view_bill_collection_summary_list->loadRowValues($view_bill_collection_summary_list->Recordset); // Load row values
		}
		$view_bill_collection_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_bill_collection_summary->RowAttrs->merge(["data-rowindex" => $view_bill_collection_summary_list->RowCount, "id" => "r" . $view_bill_collection_summary_list->RowCount . "_view_bill_collection_summary", "data-rowtype" => $view_bill_collection_summary->RowType]);

		// Render row
		$view_bill_collection_summary_list->renderRow();

		// Render list options
		$view_bill_collection_summary_list->renderListOptions();

		// Save row and cell attributes
		$view_bill_collection_summary_list->Attrs[$view_bill_collection_summary_list->RowCount] = ["row_attrs" => $view_bill_collection_summary->rowAttributes(), "cell_attrs" => []];
		$view_bill_collection_summary_list->Attrs[$view_bill_collection_summary_list->RowCount]["cell_attrs"] = $view_bill_collection_summary->fieldCellAttributes();
?>
	<tr <?php echo $view_bill_collection_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_bill_collection_summary_list->ListOptions->render("body", "left", $view_bill_collection_summary_list->RowCount, "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	<?php if ($view_bill_collection_summary_list->createddate->Visible) { // createddate ?>
		<td data-name="createddate" <?php echo $view_bill_collection_summary_list->createddate->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_createddate" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_createddate">
<span<?php echo $view_bill_collection_summary_list->createddate->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->createddate->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_bill_collection_summary_list->UserName->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_UserName" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_UserName">
<span<?php echo $view_bill_collection_summary_list->UserName->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->UserName->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CARD->Visible) { // CARD ?>
		<td data-name="CARD" <?php echo $view_bill_collection_summary_list->CARD->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CARD" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CARD">
<span<?php echo $view_bill_collection_summary_list->CARD->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->CARD->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CASH->Visible) { // CASH ?>
		<td data-name="CASH" <?php echo $view_bill_collection_summary_list->CASH->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CASH" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CASH">
<span<?php echo $view_bill_collection_summary_list->CASH->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->CASH->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT" <?php echo $view_bill_collection_summary_list->NEFT->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_NEFT" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_NEFT">
<span<?php echo $view_bill_collection_summary_list->NEFT->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->NEFT->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" <?php echo $view_bill_collection_summary_list->PAYTM->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_PAYTM" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_PAYTM">
<span<?php echo $view_bill_collection_summary_list->PAYTM->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->PAYTM->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE" <?php echo $view_bill_collection_summary_list->CHEQUE->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CHEQUE" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CHEQUE">
<span<?php echo $view_bill_collection_summary_list->CHEQUE->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->CHEQUE->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" <?php echo $view_bill_collection_summary_list->RTGS->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_RTGS" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_RTGS">
<span<?php echo $view_bill_collection_summary_list->RTGS->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->RTGS->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected" <?php echo $view_bill_collection_summary_list->NotSelected->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_NotSelected" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_NotSelected">
<span<?php echo $view_bill_collection_summary_list->NotSelected->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->NotSelected->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND" <?php echo $view_bill_collection_summary_list->REFUND->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_REFUND" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_REFUND">
<span<?php echo $view_bill_collection_summary_list->REFUND->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->REFUND->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL" <?php echo $view_bill_collection_summary_list->CANCEL->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CANCEL" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_CANCEL">
<span<?php echo $view_bill_collection_summary_list->CANCEL->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->CANCEL->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Total->Visible) { // Total ?>
		<td data-name="Total" <?php echo $view_bill_collection_summary_list->Total->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_Total" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_Total">
<span<?php echo $view_bill_collection_summary_list->Total->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->Total->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_bill_collection_summary_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_HospID" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_HospID">
<span<?php echo $view_bill_collection_summary_list->HospID->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_bill_collection_summary_list->BillType->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_BillType" type="text/html"><span id="el<?php echo $view_bill_collection_summary_list->RowCount ?>_view_bill_collection_summary_BillType">
<span<?php echo $view_bill_collection_summary_list->BillType->viewAttributes() ?>><?php echo $view_bill_collection_summary_list->BillType->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_bill_collection_summary_list->ListOptions->render("body", "right", $view_bill_collection_summary_list->RowCount, "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	</tr>
<?php
	}
	if (!$view_bill_collection_summary_list->isGridAdd())
		$view_bill_collection_summary_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_bill_collection_summary->RowType = ROWTYPE_AGGREGATE;
$view_bill_collection_summary->resetAttributes();
$view_bill_collection_summary_list->renderRow();
?>
<?php if ($view_bill_collection_summary_list->TotalRecords > 0 && !$view_bill_collection_summary_list->isGridAdd() && !$view_bill_collection_summary_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_bill_collection_summary_list->renderListOptions();

// Render list options (footer, left)
$view_bill_collection_summary_list->ListOptions->render("footer", "left", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	<?php if ($view_bill_collection_summary_list->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_bill_collection_summary_list->createddate->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_bill_collection_summary_list->UserName->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CARD->Visible) { // CARD ?>
		<td data-name="CARD" class="<?php echo $view_bill_collection_summary_list->CARD->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD">
		<script id="tpg_view_bill_collection_summary_CARD" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->CARD->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->CARD->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CASH->Visible) { // CASH ?>
		<td data-name="CASH" class="<?php echo $view_bill_collection_summary_list->CASH->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH">
		<script id="tpg_view_bill_collection_summary_CASH" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->CASH->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->CASH->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT" class="<?php echo $view_bill_collection_summary_list->NEFT->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT">
		<script id="tpg_view_bill_collection_summary_NEFT" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->NEFT->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->NEFT->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" class="<?php echo $view_bill_collection_summary_list->PAYTM->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM">
		<script id="tpg_view_bill_collection_summary_PAYTM" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->PAYTM->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->PAYTM->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE" class="<?php echo $view_bill_collection_summary_list->CHEQUE->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE">
		<script id="tpg_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->CHEQUE->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->CHEQUE->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" class="<?php echo $view_bill_collection_summary_list->RTGS->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS">
		<script id="tpg_view_bill_collection_summary_RTGS" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->RTGS->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->RTGS->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected" class="<?php echo $view_bill_collection_summary_list->NotSelected->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND" class="<?php echo $view_bill_collection_summary_list->REFUND->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND">
		<script id="tpg_view_bill_collection_summary_REFUND" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->REFUND->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->REFUND->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL" class="<?php echo $view_bill_collection_summary_list->CANCEL->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Total->Visible) { // Total ?>
		<td data-name="Total" class="<?php echo $view_bill_collection_summary_list->Total->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total">
		<script id="tpg_view_bill_collection_summary_Total" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary_list->Total->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary_list->Total->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_bill_collection_summary_list->HospID->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_bill_collection_summary_list->BillType->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_bill_collection_summary_list->ListOptions->render("footer", "right", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_bill_collection_summarylist" class="ew-custom-template"></div>
<script id="tpm_view_bill_collection_summarylist" type="text/html">
<div id="ct_view_bill_collection_summary_list"><?php if ($view_bill_collection_summary_list->RowCount > 0) { ?>
<table  style="width:100%">
  <thead>
	<tr>
	  <th>{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_createddate")/}}</th>
	  <th>{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_UserName")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_CARD")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_CASH")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_NEFT")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_PAYTM")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_CHEQUE")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_RTGS")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_NotSelected")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_REFUND")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_CANCEL")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_Total")/}}</th>
	  <th style="text-align:right">{{include tmpl=~getTemplate("#tpc_view_bill_collection_summary_BillType")/}}</th>
	</tr>
  </thead>
  <tbody>
<?php for ($i = $view_bill_collection_summary_list->StartRowCount; $i <= $view_bill_collection_summary_list->RowCount; $i++) { ?>
  <tr>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_createddate")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_UserName")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_CARD")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_CASH")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_NEFT")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_PAYTM")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_CHEQUE")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_RTGS")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_NotSelected")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_REFUND")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_CANCEL")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_Total")/}}</td>
	  <td style="text-align:right">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_bill_collection_summary_BillType")/}}</td>
	</tr>

<?php } ?>
</tbody>
  <?php if ($view_bill_collection_summary_list->TotalRecords > 0 && !$view_bill_collection_summary->isGridAdd() && !$view_bill_collection_summary->isGridEdit()) { ?>
<tfoot>
	<tr>
	  <td></td>
	  <td></td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_CARD")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_CASH")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_NEFT")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_PAYTM")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_CHEQUE")/}}</td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_RTGS")/}}</td>
	  <td></td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_REFUND")/}}</td>
	  <td></td>
	  <td>{{include tmpl=~getTemplate("#tpg_view_bill_collection_summary_Total")/}}</td>
	  <td></td>
	</tr>	
  </tfoot>
<?php } ?>  
</table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_bill_collection_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_bill_collection_summary_list->Recordset)
	$view_bill_collection_summary_list->Recordset->Close();
?>
<?php if (!$view_bill_collection_summary_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_bill_collection_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_bill_collection_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_bill_collection_summary_list->TotalRecords == 0 && !$view_bill_collection_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_bill_collection_summary->Rows) ?> };
	ew.applyTemplate("tpd_view_bill_collection_summarylist", "tpm_view_bill_collection_summarylist", "view_bill_collection_summarylist", "<?php echo $view_bill_collection_summary->CustomExport ?>", ew.templateData);
	$("#tpd_view_bill_collection_summarylist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_view_bill_collection_summarylist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.view_bill_collection_summarylist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_bill_collection_summary_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_bill_collection_summary_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_bill_collection_summary",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_bill_collection_summary_list->terminate();
?>