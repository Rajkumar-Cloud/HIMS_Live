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
$view_pharmacy_report_stock_value_list = new view_pharmacy_report_stock_value_list();

// Run the page
$view_pharmacy_report_stock_value_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_report_stock_value_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_report_stock_value->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_report_stock_valuelist = currentForm = new ew.Form("fview_pharmacy_report_stock_valuelist", "list");
fview_pharmacy_report_stock_valuelist.formKeyCountName = '<?php echo $view_pharmacy_report_stock_value_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_report_stock_valuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_stock_valuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_report_stock_valuelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_stock_valuelistsrch");

// Validate function for search
fview_pharmacy_report_stock_valuelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_stock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_report_stock_value->stock->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_report_stock_valuelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_stock_valuelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_report_stock_valuelistsrch.filterList = <?php echo $view_pharmacy_report_stock_value_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_report_stock_value->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs > 0 && $view_pharmacy_report_stock_value_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_report_stock_value_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_report_stock_value_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_report_stock_value->isExport() && !$view_pharmacy_report_stock_value->CurrentAction) { ?>
<form name="fview_pharmacy_report_stock_valuelistsrch" id="fview_pharmacy_report_stock_valuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_report_stock_value_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_report_stock_valuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_report_stock_value_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_report_stock_value->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_report_stock_value->resetAttributes();
$view_pharmacy_report_stock_value_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_report_stock_value->DES->Visible) { // DES ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_stock_value->DES->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_stock_value" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_report_stock_value->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_stock_value->DES->EditValue ?>"<?php echo $view_pharmacy_report_stock_value->DES->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->stock->Visible) { // stock ?>
	<div id="xsc_stock" class="ew-cell form-group">
		<label for="x_stock" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_stock_value->stock->caption() ?></label>
		<span class="ew-search-operator"><select name="z_stock" id="z_stock" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_report_stock_value->stock->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_stock_value" data-field="x_stock" name="x_stock" id="x_stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_report_stock_value->stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_stock_value->stock->EditValue ?>"<?php echo $view_pharmacy_report_stock_value->stock->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_stock style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_stock style="d-none"">
<input type="text" data-table="view_pharmacy_report_stock_value" data-field="x_stock" name="y_stock" id="y_stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_report_stock_value->stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_stock_value->stock->EditValue2 ?>"<?php echo $view_pharmacy_report_stock_value->stock->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_report_stock_value_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_report_stock_value_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_report_stock_value_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_stock_value_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_report_stock_value_list->showPageHeader(); ?>
<?php
$view_pharmacy_report_stock_value_list->showMessage();
?>
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs > 0 || $view_pharmacy_report_stock_value->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_report_stock_value_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_stock_value">
<?php if (!$view_pharmacy_report_stock_value->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_report_stock_value->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_stock_value_list->Pager)) $view_pharmacy_report_stock_value_list->Pager = new NumericPager($view_pharmacy_report_stock_value_list->StartRec, $view_pharmacy_report_stock_value_list->DisplayRecs, $view_pharmacy_report_stock_value_list->TotalRecs, $view_pharmacy_report_stock_value_list->RecRange, $view_pharmacy_report_stock_value_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_stock_value_list->Pager->RecordCount > 0 && $view_pharmacy_report_stock_value_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_stock_value_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_stock_value_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_stock_value_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs > 0 && (!$view_pharmacy_report_stock_value_list->AutoHidePageSizeSelector || $view_pharmacy_report_stock_value_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_stock_value->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_stock_value_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_stock_valuelist" id="fview_pharmacy_report_stock_valuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_report_stock_value_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_report_stock_value_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_stock_value">
<div id="gmp_view_pharmacy_report_stock_value" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs > 0 || $view_pharmacy_report_stock_value->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_stock_valuelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_report_stock_value_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_report_stock_value_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_report_stock_value_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_report_stock_value->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_report_stock_value->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_PRC" class="view_pharmacy_report_stock_value_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_report_stock_value->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->PRC) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_PRC" class="view_pharmacy_report_stock_value_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_report_stock_value->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_DES" class="view_pharmacy_report_stock_value_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_report_stock_value->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->DES) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_DES" class="view_pharmacy_report_stock_value_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->Batch->Visible) { // Batch ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->Batch) == "") { ?>
		<th data-name="Batch" class="<?php echo $view_pharmacy_report_stock_value->Batch->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_Batch" class="view_pharmacy_report_stock_value_Batch"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->Batch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Batch" class="<?php echo $view_pharmacy_report_stock_value->Batch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->Batch) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_Batch" class="view_pharmacy_report_stock_value_Batch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->Batch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->Batch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->Batch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_report_stock_value->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_MFRCODE" class="view_pharmacy_report_stock_value_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_report_stock_value->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_MFRCODE" class="view_pharmacy_report_stock_value_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->stock->Visible) { // stock ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->stock) == "") { ?>
		<th data-name="stock" class="<?php echo $view_pharmacy_report_stock_value->stock->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_stock" class="view_pharmacy_report_stock_value_stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stock" class="<?php echo $view_pharmacy_report_stock_value->stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->stock) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_stock" class="view_pharmacy_report_stock_value_stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->Mrp->Visible) { // Mrp ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->Mrp) == "") { ?>
		<th data-name="Mrp" class="<?php echo $view_pharmacy_report_stock_value->Mrp->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_Mrp" class="view_pharmacy_report_stock_value_Mrp"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->Mrp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mrp" class="<?php echo $view_pharmacy_report_stock_value->Mrp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->Mrp) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_Mrp" class="view_pharmacy_report_stock_value_Mrp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->Mrp->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->Mrp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->Mrp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->PurValue1->Visible) { // PurValue1 ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->PurValue1) == "") { ?>
		<th data-name="PurValue1" class="<?php echo $view_pharmacy_report_stock_value->PurValue1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_PurValue1" class="view_pharmacy_report_stock_value_PurValue1"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->PurValue1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue1" class="<?php echo $view_pharmacy_report_stock_value->PurValue1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->PurValue1) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_PurValue1" class="view_pharmacy_report_stock_value_PurValue1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->PurValue1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->PurValue1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->PurValue1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->ssgst->Visible) { // ssgst ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->ssgst) == "") { ?>
		<th data-name="ssgst" class="<?php echo $view_pharmacy_report_stock_value->ssgst->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_ssgst" class="view_pharmacy_report_stock_value_ssgst"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->ssgst->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ssgst" class="<?php echo $view_pharmacy_report_stock_value->ssgst->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->ssgst) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_ssgst" class="view_pharmacy_report_stock_value_ssgst">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->ssgst->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->ssgst->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->ssgst->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->scgst->Visible) { // scgst ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->scgst) == "") { ?>
		<th data-name="scgst" class="<?php echo $view_pharmacy_report_stock_value->scgst->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_scgst" class="view_pharmacy_report_stock_value_scgst"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->scgst->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scgst" class="<?php echo $view_pharmacy_report_stock_value->scgst->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->scgst) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_scgst" class="view_pharmacy_report_stock_value_scgst">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->scgst->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->scgst->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->scgst->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->stockvalue1->Visible) { // stockvalue1 ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->stockvalue1) == "") { ?>
		<th data-name="stockvalue1" class="<?php echo $view_pharmacy_report_stock_value->stockvalue1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_stockvalue1" class="view_pharmacy_report_stock_value_stockvalue1"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->stockvalue1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stockvalue1" class="<?php echo $view_pharmacy_report_stock_value->stockvalue1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->stockvalue1) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_stockvalue1" class="view_pharmacy_report_stock_value_stockvalue1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->stockvalue1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->stockvalue1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->stockvalue1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacy_report_stock_value->sortUrl($view_pharmacy_report_stock_value->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_report_stock_value->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_PUnit" class="view_pharmacy_report_stock_value_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_report_stock_value->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_stock_value->SortUrl($view_pharmacy_report_stock_value->PUnit) ?>',1);"><div id="elh_view_pharmacy_report_stock_value_PUnit" class="view_pharmacy_report_stock_value_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_stock_value->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_stock_value->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_stock_value->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_report_stock_value_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_report_stock_value->ExportAll && $view_pharmacy_report_stock_value->isExport()) {
	$view_pharmacy_report_stock_value_list->StopRec = $view_pharmacy_report_stock_value_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_report_stock_value_list->TotalRecs > $view_pharmacy_report_stock_value_list->StartRec + $view_pharmacy_report_stock_value_list->DisplayRecs - 1)
		$view_pharmacy_report_stock_value_list->StopRec = $view_pharmacy_report_stock_value_list->StartRec + $view_pharmacy_report_stock_value_list->DisplayRecs - 1;
	else
		$view_pharmacy_report_stock_value_list->StopRec = $view_pharmacy_report_stock_value_list->TotalRecs;
}
$view_pharmacy_report_stock_value_list->RecCnt = $view_pharmacy_report_stock_value_list->StartRec - 1;
if ($view_pharmacy_report_stock_value_list->Recordset && !$view_pharmacy_report_stock_value_list->Recordset->EOF) {
	$view_pharmacy_report_stock_value_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_report_stock_value_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_report_stock_value_list->StartRec > 1)
		$view_pharmacy_report_stock_value_list->Recordset->move($view_pharmacy_report_stock_value_list->StartRec - 1);
} elseif (!$view_pharmacy_report_stock_value->AllowAddDeleteRow && $view_pharmacy_report_stock_value_list->StopRec == 0) {
	$view_pharmacy_report_stock_value_list->StopRec = $view_pharmacy_report_stock_value->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_report_stock_value->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_report_stock_value->resetAttributes();
$view_pharmacy_report_stock_value_list->renderRow();
while ($view_pharmacy_report_stock_value_list->RecCnt < $view_pharmacy_report_stock_value_list->StopRec) {
	$view_pharmacy_report_stock_value_list->RecCnt++;
	if ($view_pharmacy_report_stock_value_list->RecCnt >= $view_pharmacy_report_stock_value_list->StartRec) {
		$view_pharmacy_report_stock_value_list->RowCnt++;

		// Set up key count
		$view_pharmacy_report_stock_value_list->KeyCount = $view_pharmacy_report_stock_value_list->RowIndex;

		// Init row class and style
		$view_pharmacy_report_stock_value->resetAttributes();
		$view_pharmacy_report_stock_value->CssClass = "";
		if ($view_pharmacy_report_stock_value->isGridAdd()) {
		} else {
			$view_pharmacy_report_stock_value_list->loadRowValues($view_pharmacy_report_stock_value_list->Recordset); // Load row values
		}
		$view_pharmacy_report_stock_value->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_report_stock_value->RowAttrs = array_merge($view_pharmacy_report_stock_value->RowAttrs, array('data-rowindex'=>$view_pharmacy_report_stock_value_list->RowCnt, 'id'=>'r' . $view_pharmacy_report_stock_value_list->RowCnt . '_view_pharmacy_report_stock_value', 'data-rowtype'=>$view_pharmacy_report_stock_value->RowType));

		// Render row
		$view_pharmacy_report_stock_value_list->renderRow();

		// Render list options
		$view_pharmacy_report_stock_value_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_report_stock_value->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_report_stock_value_list->ListOptions->render("body", "left", $view_pharmacy_report_stock_value_list->RowCnt);
?>
	<?php if ($view_pharmacy_report_stock_value->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_report_stock_value->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_PRC" class="view_pharmacy_report_stock_value_PRC">
<span<?php echo $view_pharmacy_report_stock_value->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $view_pharmacy_report_stock_value->DES->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_DES" class="view_pharmacy_report_stock_value_DES">
<span<?php echo $view_pharmacy_report_stock_value->DES->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->Batch->Visible) { // Batch ?>
		<td data-name="Batch"<?php echo $view_pharmacy_report_stock_value->Batch->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_Batch" class="view_pharmacy_report_stock_value_Batch">
<span<?php echo $view_pharmacy_report_stock_value->Batch->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->Batch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_report_stock_value->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_MFRCODE" class="view_pharmacy_report_stock_value_MFRCODE">
<span<?php echo $view_pharmacy_report_stock_value->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->stock->Visible) { // stock ?>
		<td data-name="stock"<?php echo $view_pharmacy_report_stock_value->stock->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_stock" class="view_pharmacy_report_stock_value_stock">
<span<?php echo $view_pharmacy_report_stock_value->stock->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->Mrp->Visible) { // Mrp ?>
		<td data-name="Mrp"<?php echo $view_pharmacy_report_stock_value->Mrp->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_Mrp" class="view_pharmacy_report_stock_value_Mrp">
<span<?php echo $view_pharmacy_report_stock_value->Mrp->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->Mrp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->PurValue1->Visible) { // PurValue1 ?>
		<td data-name="PurValue1"<?php echo $view_pharmacy_report_stock_value->PurValue1->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_PurValue1" class="view_pharmacy_report_stock_value_PurValue1">
<span<?php echo $view_pharmacy_report_stock_value->PurValue1->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->PurValue1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->ssgst->Visible) { // ssgst ?>
		<td data-name="ssgst"<?php echo $view_pharmacy_report_stock_value->ssgst->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_ssgst" class="view_pharmacy_report_stock_value_ssgst">
<span<?php echo $view_pharmacy_report_stock_value->ssgst->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->ssgst->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->scgst->Visible) { // scgst ?>
		<td data-name="scgst"<?php echo $view_pharmacy_report_stock_value->scgst->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_scgst" class="view_pharmacy_report_stock_value_scgst">
<span<?php echo $view_pharmacy_report_stock_value->scgst->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->scgst->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->stockvalue1->Visible) { // stockvalue1 ?>
		<td data-name="stockvalue1"<?php echo $view_pharmacy_report_stock_value->stockvalue1->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_stockvalue1" class="view_pharmacy_report_stock_value_stockvalue1">
<span<?php echo $view_pharmacy_report_stock_value->stockvalue1->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->stockvalue1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_pharmacy_report_stock_value->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_stock_value_list->RowCnt ?>_view_pharmacy_report_stock_value_PUnit" class="view_pharmacy_report_stock_value_PUnit">
<span<?php echo $view_pharmacy_report_stock_value->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacy_report_stock_value->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_report_stock_value_list->ListOptions->render("body", "right", $view_pharmacy_report_stock_value_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_report_stock_value->isGridAdd())
		$view_pharmacy_report_stock_value_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacy_report_stock_value->RowType = ROWTYPE_AGGREGATE;
$view_pharmacy_report_stock_value->resetAttributes();
$view_pharmacy_report_stock_value_list->renderRow();
?>
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs > 0 && !$view_pharmacy_report_stock_value->isGridAdd() && !$view_pharmacy_report_stock_value->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacy_report_stock_value_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacy_report_stock_value_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacy_report_stock_value->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_pharmacy_report_stock_value->PRC->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_PRC" class="view_pharmacy_report_stock_value_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->DES->Visible) { // DES ?>
		<td data-name="DES" class="<?php echo $view_pharmacy_report_stock_value->DES->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_DES" class="view_pharmacy_report_stock_value_DES">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->Batch->Visible) { // Batch ?>
		<td data-name="Batch" class="<?php echo $view_pharmacy_report_stock_value->Batch->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_Batch" class="view_pharmacy_report_stock_value_Batch">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_pharmacy_report_stock_value->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_MFRCODE" class="view_pharmacy_report_stock_value_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->stock->Visible) { // stock ?>
		<td data-name="stock" class="<?php echo $view_pharmacy_report_stock_value->stock->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_stock" class="view_pharmacy_report_stock_value_stock">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->Mrp->Visible) { // Mrp ?>
		<td data-name="Mrp" class="<?php echo $view_pharmacy_report_stock_value->Mrp->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_Mrp" class="view_pharmacy_report_stock_value_Mrp">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->PurValue1->Visible) { // PurValue1 ?>
		<td data-name="PurValue1" class="<?php echo $view_pharmacy_report_stock_value->PurValue1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_PurValue1" class="view_pharmacy_report_stock_value_PurValue1">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_stock_value->PurValue1->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->ssgst->Visible) { // ssgst ?>
		<td data-name="ssgst" class="<?php echo $view_pharmacy_report_stock_value->ssgst->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_ssgst" class="view_pharmacy_report_stock_value_ssgst">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->scgst->Visible) { // scgst ?>
		<td data-name="scgst" class="<?php echo $view_pharmacy_report_stock_value->scgst->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_scgst" class="view_pharmacy_report_stock_value_scgst">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->stockvalue1->Visible) { // stockvalue1 ?>
		<td data-name="stockvalue1" class="<?php echo $view_pharmacy_report_stock_value->stockvalue1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_stockvalue1" class="view_pharmacy_report_stock_value_stockvalue1">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_stock_value->stockvalue1->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_pharmacy_report_stock_value->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_PUnit" class="view_pharmacy_report_stock_value_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacy_report_stock_value_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_report_stock_value->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_report_stock_value_list->Recordset)
	$view_pharmacy_report_stock_value_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_report_stock_value->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_report_stock_value->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_stock_value_list->Pager)) $view_pharmacy_report_stock_value_list->Pager = new NumericPager($view_pharmacy_report_stock_value_list->StartRec, $view_pharmacy_report_stock_value_list->DisplayRecs, $view_pharmacy_report_stock_value_list->TotalRecs, $view_pharmacy_report_stock_value_list->RecRange, $view_pharmacy_report_stock_value_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_stock_value_list->Pager->RecordCount > 0 && $view_pharmacy_report_stock_value_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_stock_value_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_stock_value_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_stock_value_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_stock_value_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_stock_value_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_stock_value_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs > 0 && (!$view_pharmacy_report_stock_value_list->AutoHidePageSizeSelector || $view_pharmacy_report_stock_value_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_stock_value_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_stock_value->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_stock_value_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_report_stock_value_list->TotalRecs == 0 && !$view_pharmacy_report_stock_value->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_stock_value_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_report_stock_value_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_report_stock_value->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_report_stock_value->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_report_stock_value", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_report_stock_value_list->terminate();
?>