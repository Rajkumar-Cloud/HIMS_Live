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
$view_pharmacy_report_earning_list = new view_pharmacy_report_earning_list();

// Run the page
$view_pharmacy_report_earning_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_report_earning_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_report_earning->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_report_earninglist = currentForm = new ew.Form("fview_pharmacy_report_earninglist", "list");
fview_pharmacy_report_earninglist.formKeyCountName = '<?php echo $view_pharmacy_report_earning_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_report_earninglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_earninglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_report_earninglistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_earninglistsrch");

// Validate function for search
fview_pharmacy_report_earninglistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Date");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_report_earning->Date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_report_earninglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_earninglistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_report_earninglistsrch.filterList = <?php echo $view_pharmacy_report_earning_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_report_earning->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_report_earning_list->TotalRecs > 0 && $view_pharmacy_report_earning_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_report_earning_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_report_earning_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_report_earning_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_report_earning_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_report_earning_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_report_earning->isExport() && !$view_pharmacy_report_earning->CurrentAction) { ?>
<form name="fview_pharmacy_report_earninglistsrch" id="fview_pharmacy_report_earninglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_report_earning_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_report_earninglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_earning">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_report_earning_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_report_earning->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_report_earning->resetAttributes();
$view_pharmacy_report_earning_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_report_earning->ProductCode->Visible) { // ProductCode ?>
	<div id="xsc_ProductCode" class="ew-cell form-group">
		<label for="x_ProductCode" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_earning->ProductCode->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProductCode" id="z_ProductCode" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_earning" data-field="x_ProductCode" name="x_ProductCode" id="x_ProductCode" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_report_earning->ProductCode->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_earning->ProductCode->EditValue ?>"<?php echo $view_pharmacy_report_earning->ProductCode->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_report_earning->ProductName->Visible) { // ProductName ?>
	<div id="xsc_ProductName" class="ew-cell form-group">
		<label for="x_ProductName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_earning->ProductName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProductName" id="z_ProductName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_earning" data-field="x_ProductName" name="x_ProductName" id="x_ProductName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_report_earning->ProductName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_earning->ProductName->EditValue ?>"<?php echo $view_pharmacy_report_earning->ProductName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_report_earning->Date->Visible) { // Date ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_earning->Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Date" id="z_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_report_earning->Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_earning" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($view_pharmacy_report_earning->Date->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_earning->Date->EditValue ?>"<?php echo $view_pharmacy_report_earning->Date->editAttributes() ?>>
<?php if (!$view_pharmacy_report_earning->Date->ReadOnly && !$view_pharmacy_report_earning->Date->Disabled && !isset($view_pharmacy_report_earning->Date->EditAttrs["readonly"]) && !isset($view_pharmacy_report_earning->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_report_earninglistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Date style="d-none"">
<input type="text" data-table="view_pharmacy_report_earning" data-field="x_Date" name="y_Date" id="y_Date" placeholder="<?php echo HtmlEncode($view_pharmacy_report_earning->Date->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_earning->Date->EditValue2 ?>"<?php echo $view_pharmacy_report_earning->Date->editAttributes() ?>>
<?php if (!$view_pharmacy_report_earning->Date->ReadOnly && !$view_pharmacy_report_earning->Date->Disabled && !isset($view_pharmacy_report_earning->Date->EditAttrs["readonly"]) && !isset($view_pharmacy_report_earning->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_report_earninglistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_report_earning_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_report_earning_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_report_earning_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_report_earning_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_earning_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_earning_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_earning_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_report_earning_list->showPageHeader(); ?>
<?php
$view_pharmacy_report_earning_list->showMessage();
?>
<?php if ($view_pharmacy_report_earning_list->TotalRecs > 0 || $view_pharmacy_report_earning->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_report_earning_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_earning">
<?php if (!$view_pharmacy_report_earning->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_report_earning->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_earning_list->Pager)) $view_pharmacy_report_earning_list->Pager = new NumericPager($view_pharmacy_report_earning_list->StartRec, $view_pharmacy_report_earning_list->DisplayRecs, $view_pharmacy_report_earning_list->TotalRecs, $view_pharmacy_report_earning_list->RecRange, $view_pharmacy_report_earning_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_earning_list->Pager->RecordCount > 0 && $view_pharmacy_report_earning_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_earning_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_earning_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_earning_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_earning_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_earning_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_earning_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->TotalRecs > 0 && (!$view_pharmacy_report_earning_list->AutoHidePageSizeSelector || $view_pharmacy_report_earning_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_earning">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_earning->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_earning_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_earninglist" id="fview_pharmacy_report_earninglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_report_earning_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_report_earning_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_earning">
<div id="gmp_view_pharmacy_report_earning" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_report_earning_list->TotalRecs > 0 || $view_pharmacy_report_earning->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_earninglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_report_earning_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_report_earning_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_report_earning_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_report_earning->ProductCode->Visible) { // ProductCode ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->ProductCode) == "") { ?>
		<th data-name="ProductCode" class="<?php echo $view_pharmacy_report_earning->ProductCode->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_ProductCode" class="view_pharmacy_report_earning_ProductCode"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->ProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCode" class="<?php echo $view_pharmacy_report_earning->ProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->ProductCode) ?>',1);"><div id="elh_view_pharmacy_report_earning_ProductCode" class="view_pharmacy_report_earning_ProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->ProductCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->ProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->ProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->ProductName->Visible) { // ProductName ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->ProductName) == "") { ?>
		<th data-name="ProductName" class="<?php echo $view_pharmacy_report_earning->ProductName->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_ProductName" class="view_pharmacy_report_earning_ProductName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->ProductName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductName" class="<?php echo $view_pharmacy_report_earning->ProductName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->ProductName) ?>',1);"><div id="elh_view_pharmacy_report_earning_ProductName" class="view_pharmacy_report_earning_ProductName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->ProductName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->ProductName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->ProductName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->SaleQuantity->Visible) { // SaleQuantity ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->SaleQuantity) == "") { ?>
		<th data-name="SaleQuantity" class="<?php echo $view_pharmacy_report_earning->SaleQuantity->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_SaleQuantity" class="view_pharmacy_report_earning_SaleQuantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->SaleQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleQuantity" class="<?php echo $view_pharmacy_report_earning->SaleQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->SaleQuantity) ?>',1);"><div id="elh_view_pharmacy_report_earning_SaleQuantity" class="view_pharmacy_report_earning_SaleQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->SaleQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->SaleQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->SaleQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_report_earning->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_RT" class="view_pharmacy_report_earning_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_report_earning->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->RT) ?>',1);"><div id="elh_view_pharmacy_report_earning_RT" class="view_pharmacy_report_earning_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->SaleValue->Visible) { // SaleValue ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->SaleValue) == "") { ?>
		<th data-name="SaleValue" class="<?php echo $view_pharmacy_report_earning->SaleValue->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_SaleValue" class="view_pharmacy_report_earning_SaleValue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->SaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleValue" class="<?php echo $view_pharmacy_report_earning->SaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->SaleValue) ?>',1);"><div id="elh_view_pharmacy_report_earning_SaleValue" class="view_pharmacy_report_earning_SaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->SaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->SaleValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->SaleValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->PurRate->Visible) { // PurRate ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacy_report_earning->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_PurRate" class="view_pharmacy_report_earning_PurRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacy_report_earning->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->PurRate) ?>',1);"><div id="elh_view_pharmacy_report_earning_PurRate" class="view_pharmacy_report_earning_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->PurchaseCostValue1->Visible) { // PurchaseCostValue1 ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->PurchaseCostValue1) == "") { ?>
		<th data-name="PurchaseCostValue1" class="<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_PurchaseCostValue1" class="view_pharmacy_report_earning_PurchaseCostValue1"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->PurchaseCostValue1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseCostValue1" class="<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->PurchaseCostValue1) ?>',1);"><div id="elh_view_pharmacy_report_earning_PurchaseCostValue1" class="view_pharmacy_report_earning_PurchaseCostValue1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->PurchaseCostValue1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->PurchaseCostValue1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->PurchaseCostValue1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->MarginAmount1->Visible) { // MarginAmount1 ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->MarginAmount1) == "") { ?>
		<th data-name="MarginAmount1" class="<?php echo $view_pharmacy_report_earning->MarginAmount1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_MarginAmount1" class="view_pharmacy_report_earning_MarginAmount1"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->MarginAmount1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarginAmount1" class="<?php echo $view_pharmacy_report_earning->MarginAmount1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->MarginAmount1) ?>',1);"><div id="elh_view_pharmacy_report_earning_MarginAmount1" class="view_pharmacy_report_earning_MarginAmount1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->MarginAmount1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->MarginAmount1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->MarginAmount1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->MarginOnSale1->Visible) { // MarginOnSale1 ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->MarginOnSale1) == "") { ?>
		<th data-name="MarginOnSale1" class="<?php echo $view_pharmacy_report_earning->MarginOnSale1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_MarginOnSale1" class="view_pharmacy_report_earning_MarginOnSale1"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->MarginOnSale1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarginOnSale1" class="<?php echo $view_pharmacy_report_earning->MarginOnSale1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->MarginOnSale1) ?>',1);"><div id="elh_view_pharmacy_report_earning_MarginOnSale1" class="view_pharmacy_report_earning_MarginOnSale1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->MarginOnSale1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->MarginOnSale1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->MarginOnSale1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->MarginOnCost1->Visible) { // MarginOnCost1 ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->MarginOnCost1) == "") { ?>
		<th data-name="MarginOnCost1" class="<?php echo $view_pharmacy_report_earning->MarginOnCost1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_MarginOnCost1" class="view_pharmacy_report_earning_MarginOnCost1"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->MarginOnCost1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarginOnCost1" class="<?php echo $view_pharmacy_report_earning->MarginOnCost1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->MarginOnCost1) ?>',1);"><div id="elh_view_pharmacy_report_earning_MarginOnCost1" class="view_pharmacy_report_earning_MarginOnCost1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->MarginOnCost1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->MarginOnCost1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->MarginOnCost1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->Date->Visible) { // Date ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_pharmacy_report_earning->Date->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_Date" class="view_pharmacy_report_earning_Date"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_pharmacy_report_earning->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->Date) ?>',1);"><div id="elh_view_pharmacy_report_earning_Date" class="view_pharmacy_report_earning_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_report_earning->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_BRCODE" class="view_pharmacy_report_earning_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_report_earning->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->BRCODE) ?>',1);"><div id="elh_view_pharmacy_report_earning_BRCODE" class="view_pharmacy_report_earning_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_earning->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_report_earning->sortUrl($view_pharmacy_report_earning->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_report_earning->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_HosoID" class="view_pharmacy_report_earning_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_report_earning->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_earning->SortUrl($view_pharmacy_report_earning->HosoID) ?>',1);"><div id="elh_view_pharmacy_report_earning_HosoID" class="view_pharmacy_report_earning_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_earning->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_earning->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_earning->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_report_earning_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_report_earning->ExportAll && $view_pharmacy_report_earning->isExport()) {
	$view_pharmacy_report_earning_list->StopRec = $view_pharmacy_report_earning_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_report_earning_list->TotalRecs > $view_pharmacy_report_earning_list->StartRec + $view_pharmacy_report_earning_list->DisplayRecs - 1)
		$view_pharmacy_report_earning_list->StopRec = $view_pharmacy_report_earning_list->StartRec + $view_pharmacy_report_earning_list->DisplayRecs - 1;
	else
		$view_pharmacy_report_earning_list->StopRec = $view_pharmacy_report_earning_list->TotalRecs;
}
$view_pharmacy_report_earning_list->RecCnt = $view_pharmacy_report_earning_list->StartRec - 1;
if ($view_pharmacy_report_earning_list->Recordset && !$view_pharmacy_report_earning_list->Recordset->EOF) {
	$view_pharmacy_report_earning_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_report_earning_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_report_earning_list->StartRec > 1)
		$view_pharmacy_report_earning_list->Recordset->move($view_pharmacy_report_earning_list->StartRec - 1);
} elseif (!$view_pharmacy_report_earning->AllowAddDeleteRow && $view_pharmacy_report_earning_list->StopRec == 0) {
	$view_pharmacy_report_earning_list->StopRec = $view_pharmacy_report_earning->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_report_earning->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_report_earning->resetAttributes();
$view_pharmacy_report_earning_list->renderRow();
while ($view_pharmacy_report_earning_list->RecCnt < $view_pharmacy_report_earning_list->StopRec) {
	$view_pharmacy_report_earning_list->RecCnt++;
	if ($view_pharmacy_report_earning_list->RecCnt >= $view_pharmacy_report_earning_list->StartRec) {
		$view_pharmacy_report_earning_list->RowCnt++;

		// Set up key count
		$view_pharmacy_report_earning_list->KeyCount = $view_pharmacy_report_earning_list->RowIndex;

		// Init row class and style
		$view_pharmacy_report_earning->resetAttributes();
		$view_pharmacy_report_earning->CssClass = "";
		if ($view_pharmacy_report_earning->isGridAdd()) {
		} else {
			$view_pharmacy_report_earning_list->loadRowValues($view_pharmacy_report_earning_list->Recordset); // Load row values
		}
		$view_pharmacy_report_earning->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_report_earning->RowAttrs = array_merge($view_pharmacy_report_earning->RowAttrs, array('data-rowindex'=>$view_pharmacy_report_earning_list->RowCnt, 'id'=>'r' . $view_pharmacy_report_earning_list->RowCnt . '_view_pharmacy_report_earning', 'data-rowtype'=>$view_pharmacy_report_earning->RowType));

		// Render row
		$view_pharmacy_report_earning_list->renderRow();

		// Render list options
		$view_pharmacy_report_earning_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_report_earning->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_report_earning_list->ListOptions->render("body", "left", $view_pharmacy_report_earning_list->RowCnt);
?>
	<?php if ($view_pharmacy_report_earning->ProductCode->Visible) { // ProductCode ?>
		<td data-name="ProductCode"<?php echo $view_pharmacy_report_earning->ProductCode->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_ProductCode" class="view_pharmacy_report_earning_ProductCode">
<span<?php echo $view_pharmacy_report_earning->ProductCode->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->ProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->ProductName->Visible) { // ProductName ?>
		<td data-name="ProductName"<?php echo $view_pharmacy_report_earning->ProductName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_ProductName" class="view_pharmacy_report_earning_ProductName">
<span<?php echo $view_pharmacy_report_earning->ProductName->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->ProductName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->SaleQuantity->Visible) { // SaleQuantity ?>
		<td data-name="SaleQuantity"<?php echo $view_pharmacy_report_earning->SaleQuantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_SaleQuantity" class="view_pharmacy_report_earning_SaleQuantity">
<span<?php echo $view_pharmacy_report_earning->SaleQuantity->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->SaleQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $view_pharmacy_report_earning->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_RT" class="view_pharmacy_report_earning_RT">
<span<?php echo $view_pharmacy_report_earning->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue"<?php echo $view_pharmacy_report_earning->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_SaleValue" class="view_pharmacy_report_earning_SaleValue">
<span<?php echo $view_pharmacy_report_earning->SaleValue->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->SaleValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $view_pharmacy_report_earning->PurRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_PurRate" class="view_pharmacy_report_earning_PurRate">
<span<?php echo $view_pharmacy_report_earning->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->PurRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->PurchaseCostValue1->Visible) { // PurchaseCostValue1 ?>
		<td data-name="PurchaseCostValue1"<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_PurchaseCostValue1" class="view_pharmacy_report_earning_PurchaseCostValue1">
<span<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->MarginAmount1->Visible) { // MarginAmount1 ?>
		<td data-name="MarginAmount1"<?php echo $view_pharmacy_report_earning->MarginAmount1->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_MarginAmount1" class="view_pharmacy_report_earning_MarginAmount1">
<span<?php echo $view_pharmacy_report_earning->MarginAmount1->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->MarginAmount1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->MarginOnSale1->Visible) { // MarginOnSale1 ?>
		<td data-name="MarginOnSale1"<?php echo $view_pharmacy_report_earning->MarginOnSale1->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_MarginOnSale1" class="view_pharmacy_report_earning_MarginOnSale1">
<span<?php echo $view_pharmacy_report_earning->MarginOnSale1->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->MarginOnSale1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->MarginOnCost1->Visible) { // MarginOnCost1 ?>
		<td data-name="MarginOnCost1"<?php echo $view_pharmacy_report_earning->MarginOnCost1->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_MarginOnCost1" class="view_pharmacy_report_earning_MarginOnCost1">
<span<?php echo $view_pharmacy_report_earning->MarginOnCost1->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->MarginOnCost1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $view_pharmacy_report_earning->Date->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_Date" class="view_pharmacy_report_earning_Date">
<span<?php echo $view_pharmacy_report_earning->Date->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_report_earning->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_BRCODE" class="view_pharmacy_report_earning_BRCODE">
<span<?php echo $view_pharmacy_report_earning->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $view_pharmacy_report_earning->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_earning_list->RowCnt ?>_view_pharmacy_report_earning_HosoID" class="view_pharmacy_report_earning_HosoID">
<span<?php echo $view_pharmacy_report_earning->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_report_earning->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_report_earning_list->ListOptions->render("body", "right", $view_pharmacy_report_earning_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_report_earning->isGridAdd())
		$view_pharmacy_report_earning_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacy_report_earning->RowType = ROWTYPE_AGGREGATE;
$view_pharmacy_report_earning->resetAttributes();
$view_pharmacy_report_earning_list->renderRow();
?>
<?php if ($view_pharmacy_report_earning_list->TotalRecs > 0 && !$view_pharmacy_report_earning->isGridAdd() && !$view_pharmacy_report_earning->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacy_report_earning_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacy_report_earning_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacy_report_earning->ProductCode->Visible) { // ProductCode ?>
		<td data-name="ProductCode" class="<?php echo $view_pharmacy_report_earning->ProductCode->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_ProductCode" class="view_pharmacy_report_earning_ProductCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->ProductName->Visible) { // ProductName ?>
		<td data-name="ProductName" class="<?php echo $view_pharmacy_report_earning->ProductName->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_ProductName" class="view_pharmacy_report_earning_ProductName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->SaleQuantity->Visible) { // SaleQuantity ?>
		<td data-name="SaleQuantity" class="<?php echo $view_pharmacy_report_earning->SaleQuantity->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_SaleQuantity" class="view_pharmacy_report_earning_SaleQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->RT->Visible) { // RT ?>
		<td data-name="RT" class="<?php echo $view_pharmacy_report_earning->RT->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_RT" class="view_pharmacy_report_earning_RT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue" class="<?php echo $view_pharmacy_report_earning->SaleValue->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_SaleValue" class="view_pharmacy_report_earning_SaleValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_earning->SaleValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate" class="<?php echo $view_pharmacy_report_earning->PurRate->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_PurRate" class="view_pharmacy_report_earning_PurRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->PurchaseCostValue1->Visible) { // PurchaseCostValue1 ?>
		<td data-name="PurchaseCostValue1" class="<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_PurchaseCostValue1" class="view_pharmacy_report_earning_PurchaseCostValue1">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_earning->PurchaseCostValue1->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->MarginAmount1->Visible) { // MarginAmount1 ?>
		<td data-name="MarginAmount1" class="<?php echo $view_pharmacy_report_earning->MarginAmount1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_MarginAmount1" class="view_pharmacy_report_earning_MarginAmount1">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_earning->MarginAmount1->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->MarginOnSale1->Visible) { // MarginOnSale1 ?>
		<td data-name="MarginOnSale1" class="<?php echo $view_pharmacy_report_earning->MarginOnSale1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_MarginOnSale1" class="view_pharmacy_report_earning_MarginOnSale1">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_earning->MarginOnSale1->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->MarginOnCost1->Visible) { // MarginOnCost1 ?>
		<td data-name="MarginOnCost1" class="<?php echo $view_pharmacy_report_earning->MarginOnCost1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_MarginOnCost1" class="view_pharmacy_report_earning_MarginOnCost1">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_earning->MarginOnCost1->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->Date->Visible) { // Date ?>
		<td data-name="Date" class="<?php echo $view_pharmacy_report_earning->Date->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_Date" class="view_pharmacy_report_earning_Date">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_pharmacy_report_earning->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_BRCODE" class="view_pharmacy_report_earning_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" class="<?php echo $view_pharmacy_report_earning->HosoID->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_HosoID" class="view_pharmacy_report_earning_HosoID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacy_report_earning_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_report_earning->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_report_earning_list->Recordset)
	$view_pharmacy_report_earning_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_report_earning->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_report_earning->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_earning_list->Pager)) $view_pharmacy_report_earning_list->Pager = new NumericPager($view_pharmacy_report_earning_list->StartRec, $view_pharmacy_report_earning_list->DisplayRecs, $view_pharmacy_report_earning_list->TotalRecs, $view_pharmacy_report_earning_list->RecRange, $view_pharmacy_report_earning_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_earning_list->Pager->RecordCount > 0 && $view_pharmacy_report_earning_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_earning_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_earning_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_earning_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_earning_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_earning_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_earning_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_earning_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_earning_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_earning_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->TotalRecs > 0 && (!$view_pharmacy_report_earning_list->AutoHidePageSizeSelector || $view_pharmacy_report_earning_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_earning">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_earning_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_earning->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_earning_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_report_earning_list->TotalRecs == 0 && !$view_pharmacy_report_earning->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_earning_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_report_earning_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_report_earning->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_report_earning->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_report_earning", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_report_earning_list->terminate();
?>