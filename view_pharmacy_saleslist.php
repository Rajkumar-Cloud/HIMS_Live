<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_saleslist = currentForm = new ew.Form("fview_pharmacy_saleslist", "list");
fview_pharmacy_saleslist.formKeyCountName = '<?php echo $view_pharmacy_sales_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_saleslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_saleslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_saleslistsrch = currentSearchForm = new ew.Form("fview_pharmacy_saleslistsrch");

// Validate function for search
fview_pharmacy_saleslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_BillDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->BillDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_saleslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_saleslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_saleslistsrch.filterList = <?php echo $view_pharmacy_sales_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_sales_list->TotalRecs > 0 && $view_pharmacy_sales_list->ExportOptions->visible()) { ?>
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
<?php if (!$view_pharmacy_sales->isExport() && !$view_pharmacy_sales->CurrentAction) { ?>
<form name="fview_pharmacy_saleslistsrch" id="fview_pharmacy_saleslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_sales_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_saleslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_sales">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_sales_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_sales->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_sales->resetAttributes();
$view_pharmacy_sales_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_sales->BillDate->Visible) { // BillDate ?>
	<div id="xsc_BillDate" class="ew-cell form-group">
		<label for="x_BillDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales->BillDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_BillDate" id="z_BillDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BillDate->EditValue ?>"<?php echo $view_pharmacy_sales->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacy_sales->BillDate->ReadOnly && !$view_pharmacy_sales->BillDate->Disabled && !isset($view_pharmacy_sales->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacy_sales->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_saleslistsrch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_BillDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_BillDate style="d-none"">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BillDate->EditValue2 ?>"<?php echo $view_pharmacy_sales->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacy_sales->BillDate->ReadOnly && !$view_pharmacy_sales->BillDate->Disabled && !isset($view_pharmacy_sales->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacy_sales->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_saleslistsrch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->Product->Visible) { // Product ?>
	<div id="xsc_Product" class="ew-cell form-group">
		<label for="x_Product" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales->Product->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Product" id="z_Product" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->Product->EditValue ?>"<?php echo $view_pharmacy_sales->Product->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_sales->OPNO->Visible) { // OPNO ?>
	<div id="xsc_OPNO" class="ew-cell form-group">
		<label for="x_OPNO" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales->OPNO->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->OPNO->EditValue ?>"<?php echo $view_pharmacy_sales->OPNO->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_sales_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_sales_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_sales_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_sales_list->showPageHeader(); ?>
<?php
$view_pharmacy_sales_list->showMessage();
?>
<?php if ($view_pharmacy_sales_list->TotalRecs > 0 || $view_pharmacy_sales->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_sales_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_sales">
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_sales->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_sales_list->Pager)) $view_pharmacy_sales_list->Pager = new NumericPager($view_pharmacy_sales_list->StartRec, $view_pharmacy_sales_list->DisplayRecs, $view_pharmacy_sales_list->TotalRecs, $view_pharmacy_sales_list->RecRange, $view_pharmacy_sales_list->AutoHidePager) ?>
<?php if ($view_pharmacy_sales_list->Pager->RecordCount > 0 && $view_pharmacy_sales_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_sales_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_sales_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_sales_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_sales_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_sales_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_sales_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_sales_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_sales_list->TotalRecs > 0 && (!$view_pharmacy_sales_list->AutoHidePageSizeSelector || $view_pharmacy_sales_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_sales">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_sales_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_sales_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_sales_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_sales_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_sales_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_sales_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_sales->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_sales_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_saleslist" id="fview_pharmacy_saleslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_sales_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_sales_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<div id="gmp_view_pharmacy_sales" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_sales_list->TotalRecs > 0 || $view_pharmacy_sales->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_saleslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_sales_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_sales_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_sales_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_sales->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacy_sales->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacy_sales->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->BillDate) ?>',1);"><div id="elh_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_sales->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BILLNO" class="view_pharmacy_sales_BILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_sales->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->BILLNO) ?>',1);"><div id="elh_view_pharmacy_sales_BILLNO" class="view_pharmacy_sales_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_sales->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_sales->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->Product) ?>',1);"><div id="elh_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacy_sales->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacy_sales->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->HSN) ?>',1);"><div id="elh_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_sales->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_sales->OPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->OPNO) ?>',1);"><div id="elh_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->OPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->OPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->OPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacy_sales->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacy_sales->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->SalRate) ?>',1);"><div id="elh_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_sales->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_sales->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->IQ) ?>',1);"><div id="elh_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_sales->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_sales->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->DAMT) ?>',1);"><div id="elh_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->DAMT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->DAMT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->Taxable->Visible) { // Taxable ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->Taxable) == "") { ?>
		<th data-name="Taxable" class="<?php echo $view_pharmacy_sales->Taxable->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Taxable" class="view_pharmacy_sales_Taxable"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->Taxable->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Taxable" class="<?php echo $view_pharmacy_sales->Taxable->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->Taxable) ?>',1);"><div id="elh_view_pharmacy_sales_Taxable" class="view_pharmacy_sales_Taxable">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->Taxable->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->Taxable->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->Taxable->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_sales->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_sales->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->SSGST) ?>',1);"><div id="elh_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_sales->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_sales->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->SCGST) ?>',1);"><div id="elh_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->SSGSTAmount->Visible) { // SSGSTAmount ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->SSGSTAmount) == "") { ?>
		<th data-name="SSGSTAmount" class="<?php echo $view_pharmacy_sales->SSGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SSGSTAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGSTAmount" class="<?php echo $view_pharmacy_sales->SSGSTAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->SSGSTAmount) ?>',1);"><div id="elh_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SSGSTAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->SSGSTAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->SSGSTAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->SCGSTAmount->Visible) { // SCGSTAmount ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->SCGSTAmount) == "") { ?>
		<th data-name="SCGSTAmount" class="<?php echo $view_pharmacy_sales->SCGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SCGSTAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGSTAmount" class="<?php echo $view_pharmacy_sales->SCGSTAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->SCGSTAmount) ?>',1);"><div id="elh_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->SCGSTAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->SCGSTAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->SCGSTAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_sales->sortUrl($view_pharmacy_sales->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_sales->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_sales->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_sales->SortUrl($view_pharmacy_sales->HosoID) ?>',1);"><div id="elh_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_sales->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
if ($view_pharmacy_sales->ExportAll && $view_pharmacy_sales->isExport()) {
	$view_pharmacy_sales_list->StopRec = $view_pharmacy_sales_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_sales_list->TotalRecs > $view_pharmacy_sales_list->StartRec + $view_pharmacy_sales_list->DisplayRecs - 1)
		$view_pharmacy_sales_list->StopRec = $view_pharmacy_sales_list->StartRec + $view_pharmacy_sales_list->DisplayRecs - 1;
	else
		$view_pharmacy_sales_list->StopRec = $view_pharmacy_sales_list->TotalRecs;
}
$view_pharmacy_sales_list->RecCnt = $view_pharmacy_sales_list->StartRec - 1;
if ($view_pharmacy_sales_list->Recordset && !$view_pharmacy_sales_list->Recordset->EOF) {
	$view_pharmacy_sales_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_sales_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_sales_list->StartRec > 1)
		$view_pharmacy_sales_list->Recordset->move($view_pharmacy_sales_list->StartRec - 1);
} elseif (!$view_pharmacy_sales->AllowAddDeleteRow && $view_pharmacy_sales_list->StopRec == 0) {
	$view_pharmacy_sales_list->StopRec = $view_pharmacy_sales->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_sales->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_sales->resetAttributes();
$view_pharmacy_sales_list->renderRow();
while ($view_pharmacy_sales_list->RecCnt < $view_pharmacy_sales_list->StopRec) {
	$view_pharmacy_sales_list->RecCnt++;
	if ($view_pharmacy_sales_list->RecCnt >= $view_pharmacy_sales_list->StartRec) {
		$view_pharmacy_sales_list->RowCnt++;

		// Set up key count
		$view_pharmacy_sales_list->KeyCount = $view_pharmacy_sales_list->RowIndex;

		// Init row class and style
		$view_pharmacy_sales->resetAttributes();
		$view_pharmacy_sales->CssClass = "";
		if ($view_pharmacy_sales->isGridAdd()) {
		} else {
			$view_pharmacy_sales_list->loadRowValues($view_pharmacy_sales_list->Recordset); // Load row values
		}
		$view_pharmacy_sales->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_sales->RowAttrs = array_merge($view_pharmacy_sales->RowAttrs, array('data-rowindex'=>$view_pharmacy_sales_list->RowCnt, 'id'=>'r' . $view_pharmacy_sales_list->RowCnt . '_view_pharmacy_sales', 'data-rowtype'=>$view_pharmacy_sales->RowType));

		// Render row
		$view_pharmacy_sales_list->renderRow();

		// Render list options
		$view_pharmacy_sales_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_sales->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_sales_list->ListOptions->render("body", "left", $view_pharmacy_sales_list->RowCnt);
?>
	<?php if ($view_pharmacy_sales->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_pharmacy_sales->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate">
<span<?php echo $view_pharmacy_sales->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $view_pharmacy_sales->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_BILLNO" class="view_pharmacy_sales_BILLNO">
<span<?php echo $view_pharmacy_sales->BILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_pharmacy_sales->Product->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product">
<span<?php echo $view_pharmacy_sales->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $view_pharmacy_sales->HSN->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN">
<span<?php echo $view_pharmacy_sales->HSN->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO"<?php echo $view_pharmacy_sales->OPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO">
<span<?php echo $view_pharmacy_sales->OPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->OPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $view_pharmacy_sales->SalRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate">
<span<?php echo $view_pharmacy_sales->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_pharmacy_sales->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ">
<span<?php echo $view_pharmacy_sales->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT"<?php echo $view_pharmacy_sales->DAMT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT">
<span<?php echo $view_pharmacy_sales->DAMT->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->DAMT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->Taxable->Visible) { // Taxable ?>
		<td data-name="Taxable"<?php echo $view_pharmacy_sales->Taxable->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_Taxable" class="view_pharmacy_sales_Taxable">
<span<?php echo $view_pharmacy_sales->Taxable->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->Taxable->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacy_sales->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST">
<span<?php echo $view_pharmacy_sales->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacy_sales->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST">
<span<?php echo $view_pharmacy_sales->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SSGSTAmount->Visible) { // SSGSTAmount ?>
		<td data-name="SSGSTAmount"<?php echo $view_pharmacy_sales->SSGSTAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount">
<span<?php echo $view_pharmacy_sales->SSGSTAmount->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->SSGSTAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SCGSTAmount->Visible) { // SCGSTAmount ?>
		<td data-name="SCGSTAmount"<?php echo $view_pharmacy_sales->SCGSTAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount">
<span<?php echo $view_pharmacy_sales->SCGSTAmount->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->SCGSTAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $view_pharmacy_sales->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCnt ?>_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID">
<span<?php echo $view_pharmacy_sales->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_sales->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_sales_list->ListOptions->render("body", "right", $view_pharmacy_sales_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_sales->isGridAdd())
		$view_pharmacy_sales_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacy_sales->RowType = ROWTYPE_AGGREGATE;
$view_pharmacy_sales->resetAttributes();
$view_pharmacy_sales_list->renderRow();
?>
<?php if ($view_pharmacy_sales_list->TotalRecs > 0 && !$view_pharmacy_sales->isGridAdd() && !$view_pharmacy_sales->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacy_sales_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacy_sales_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacy_sales->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_pharmacy_sales->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $view_pharmacy_sales->BILLNO->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_BILLNO" class="view_pharmacy_sales_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->Product->Visible) { // Product ?>
		<td data-name="Product" class="<?php echo $view_pharmacy_sales->Product->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_pharmacy_sales->HSN->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO" class="<?php echo $view_pharmacy_sales->OPNO->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_pharmacy_sales->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_sales->SalRate->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->IQ->Visible) { // IQ ?>
		<td data-name="IQ" class="<?php echo $view_pharmacy_sales->IQ->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" class="<?php echo $view_pharmacy_sales->DAMT->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->Taxable->Visible) { // Taxable ?>
		<td data-name="Taxable" class="<?php echo $view_pharmacy_sales->Taxable->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_Taxable" class="view_pharmacy_sales_Taxable">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_pharmacy_sales->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_pharmacy_sales->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SSGSTAmount->Visible) { // SSGSTAmount ?>
		<td data-name="SSGSTAmount" class="<?php echo $view_pharmacy_sales->SSGSTAmount->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_sales->SSGSTAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->SCGSTAmount->Visible) { // SCGSTAmount ?>
		<td data-name="SCGSTAmount" class="<?php echo $view_pharmacy_sales->SCGSTAmount->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_sales->SCGSTAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_sales->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" class="<?php echo $view_pharmacy_sales->HosoID->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacy_sales_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_sales->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_sales_list->Recordset)
	$view_pharmacy_sales_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_sales->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_sales_list->Pager)) $view_pharmacy_sales_list->Pager = new NumericPager($view_pharmacy_sales_list->StartRec, $view_pharmacy_sales_list->DisplayRecs, $view_pharmacy_sales_list->TotalRecs, $view_pharmacy_sales_list->RecRange, $view_pharmacy_sales_list->AutoHidePager) ?>
<?php if ($view_pharmacy_sales_list->Pager->RecordCount > 0 && $view_pharmacy_sales_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_sales_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_sales_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_sales_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_sales_list->pageUrl() ?>start=<?php echo $view_pharmacy_sales_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_sales_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_sales_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_sales_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_sales_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_sales_list->TotalRecs > 0 && (!$view_pharmacy_sales_list->AutoHidePageSizeSelector || $view_pharmacy_sales_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_sales">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_sales_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_sales_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_sales_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_sales_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_sales_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_sales_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_sales->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
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
<?php if ($view_pharmacy_sales_list->TotalRecs == 0 && !$view_pharmacy_sales->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_sales_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_sales_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_sales", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_sales_list->terminate();
?>