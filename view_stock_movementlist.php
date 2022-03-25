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
$view_stock_movement_list = new view_stock_movement_list();

// Run the page
$view_stock_movement_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_stock_movement_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_stock_movement->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_stock_movementlist = currentForm = new ew.Form("fview_stock_movementlist", "list");
fview_stock_movementlist.formKeyCountName = '<?php echo $view_stock_movement_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_stock_movementlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_stock_movementlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_stock_movementlistsrch = currentSearchForm = new ew.Form("fview_stock_movementlistsrch");

// Validate function for search
fview_stock_movementlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_CreatedDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_stock_movement->CreatedDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_stock_movementlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_stock_movementlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_stock_movementlistsrch.filterList = <?php echo $view_stock_movement_list->getFilterList() ?>;
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
<?php if (!$view_stock_movement->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_stock_movement_list->TotalRecs > 0 && $view_stock_movement_list->ExportOptions->visible()) { ?>
<?php $view_stock_movement_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_stock_movement_list->ImportOptions->visible()) { ?>
<?php $view_stock_movement_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_stock_movement_list->SearchOptions->visible()) { ?>
<?php $view_stock_movement_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_stock_movement_list->FilterOptions->visible()) { ?>
<?php $view_stock_movement_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_stock_movement_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_stock_movement->isExport() && !$view_stock_movement->CurrentAction) { ?>
<form name="fview_stock_movementlistsrch" id="fview_stock_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_stock_movement_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_stock_movementlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_stock_movement">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_stock_movement_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_stock_movement->RowType = ROWTYPE_SEARCH;

// Render row
$view_stock_movement->resetAttributes();
$view_stock_movement_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<div id="xsc_CreatedDate" class="ew-cell form-group">
		<label for="x_CreatedDate" class="ew-search-caption ew-label"><?php echo $view_stock_movement->CreatedDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_CreatedDate" id="z_CreatedDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_stock_movement" data-field="x_CreatedDate" data-format="7" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?php echo HtmlEncode($view_stock_movement->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $view_stock_movement->CreatedDate->EditValue ?>"<?php echo $view_stock_movement->CreatedDate->editAttributes() ?>>
<?php if (!$view_stock_movement->CreatedDate->ReadOnly && !$view_stock_movement->CreatedDate->Disabled && !isset($view_stock_movement->CreatedDate->EditAttrs["readonly"]) && !isset($view_stock_movement->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_stock_movementlistsrch", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_CreatedDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_CreatedDate style="d-none"">
<input type="text" data-table="view_stock_movement" data-field="x_CreatedDate" data-format="7" name="y_CreatedDate" id="y_CreatedDate" placeholder="<?php echo HtmlEncode($view_stock_movement->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $view_stock_movement->CreatedDate->EditValue2 ?>"<?php echo $view_stock_movement->CreatedDate->editAttributes() ?>>
<?php if (!$view_stock_movement->CreatedDate->ReadOnly && !$view_stock_movement->CreatedDate->Disabled && !isset($view_stock_movement->CreatedDate->EditAttrs["readonly"]) && !isset($view_stock_movement->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_stock_movementlistsrch", "y_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_stock_movement_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_stock_movement_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_stock_movement_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_stock_movement_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_stock_movement_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_stock_movement_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_stock_movement_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_stock_movement_list->showPageHeader(); ?>
<?php
$view_stock_movement_list->showMessage();
?>
<?php if ($view_stock_movement_list->TotalRecs > 0 || $view_stock_movement->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_stock_movement_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_stock_movement">
<?php if (!$view_stock_movement->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_stock_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_stock_movement_list->Pager)) $view_stock_movement_list->Pager = new NumericPager($view_stock_movement_list->StartRec, $view_stock_movement_list->DisplayRecs, $view_stock_movement_list->TotalRecs, $view_stock_movement_list->RecRange, $view_stock_movement_list->AutoHidePager) ?>
<?php if ($view_stock_movement_list->Pager->RecordCount > 0 && $view_stock_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_stock_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_stock_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_stock_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_stock_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_stock_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_stock_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_stock_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_stock_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_stock_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_stock_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_stock_movement_list->TotalRecs > 0 && (!$view_stock_movement_list->AutoHidePageSizeSelector || $view_stock_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_stock_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_stock_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_stock_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_stock_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_stock_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_stock_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_stock_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_stock_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_stock_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_stock_movementlist" id="fview_stock_movementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_stock_movement_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_stock_movement_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_stock_movement">
<div id="gmp_view_stock_movement" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_stock_movement_list->TotalRecs > 0 || $view_stock_movement->isGridEdit()) { ?>
<table id="tbl_view_stock_movementlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_stock_movement_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_stock_movement_list->renderListOptions();

// Render list options (header, left)
$view_stock_movement_list->ListOptions->render("header", "left", "", "block", $view_stock_movement->TableVar, "view_stock_movementlist");
?>
<?php if ($view_stock_movement->prc->Visible) { // prc ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_stock_movement->prc->headerCellClass() ?>"><div id="elh_view_stock_movement_prc" class="view_stock_movement_prc"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_prc" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->prc->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_stock_movement->prc->headerCellClass() ?>"><script id="tpc_view_stock_movement_prc" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->prc) ?>',1);"><div id="elh_view_stock_movement_prc" class="view_stock_movement_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->Product->Visible) { // Product ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_stock_movement->Product->headerCellClass() ?>"><div id="elh_view_stock_movement_Product" class="view_stock_movement_Product"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_Product" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->Product->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_stock_movement->Product->headerCellClass() ?>"><script id="tpc_view_stock_movement_Product" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->Product) ?>',1);"><div id="elh_view_stock_movement_Product" class="view_stock_movement_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_stock_movement->BATCHNO->headerCellClass() ?>"><div id="elh_view_stock_movement_BATCHNO" class="view_stock_movement_BATCHNO"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_BATCHNO" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->BATCHNO->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_stock_movement->BATCHNO->headerCellClass() ?>"><script id="tpc_view_stock_movement_BATCHNO" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->BATCHNO) ?>',1);"><div id="elh_view_stock_movement_BATCHNO" class="view_stock_movement_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->IQ->Visible) { // IQ ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_stock_movement->IQ->headerCellClass() ?>"><div id="elh_view_stock_movement_IQ" class="view_stock_movement_IQ"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_IQ" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->IQ->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_stock_movement->IQ->headerCellClass() ?>"><script id="tpc_view_stock_movement_IQ" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->IQ) ?>',1);"><div id="elh_view_stock_movement_IQ" class="view_stock_movement_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_stock_movement->GrnQuantity->headerCellClass() ?>"><div id="elh_view_stock_movement_GrnQuantity" class="view_stock_movement_GrnQuantity"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_GrnQuantity" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->GrnQuantity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_stock_movement->GrnQuantity->headerCellClass() ?>"><script id="tpc_view_stock_movement_GrnQuantity" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->GrnQuantity) ?>',1);"><div id="elh_view_stock_movement_GrnQuantity" class="view_stock_movement_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->GrnQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->GrnQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_stock_movement->FreeQty->headerCellClass() ?>"><div id="elh_view_stock_movement_FreeQty" class="view_stock_movement_FreeQty"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_FreeQty" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->FreeQty->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_stock_movement->FreeQty->headerCellClass() ?>"><script id="tpc_view_stock_movement_FreeQty" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->FreeQty) ?>',1);"><div id="elh_view_stock_movement_FreeQty" class="view_stock_movement_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_stock_movement->BRCODE->headerCellClass() ?>"><div id="elh_view_stock_movement_BRCODE" class="view_stock_movement_BRCODE"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_BRCODE" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->BRCODE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_stock_movement->BRCODE->headerCellClass() ?>"><script id="tpc_view_stock_movement_BRCODE" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->BRCODE) ?>',1);"><div id="elh_view_stock_movement_BRCODE" class="view_stock_movement_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->HospID->Visible) { // HospID ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_stock_movement->HospID->headerCellClass() ?>"><div id="elh_view_stock_movement_HospID" class="view_stock_movement_HospID"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_HospID" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_stock_movement->HospID->headerCellClass() ?>"><script id="tpc_view_stock_movement_HospID" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->HospID) ?>',1);"><div id="elh_view_stock_movement_HospID" class="view_stock_movement_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $view_stock_movement->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_stock_movement_CreatedDateTime" class="view_stock_movement_CreatedDateTime"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_CreatedDateTime" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->CreatedDateTime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $view_stock_movement->CreatedDateTime->headerCellClass() ?>"><script id="tpc_view_stock_movement_CreatedDateTime" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->CreatedDateTime) ?>',1);"><div id="elh_view_stock_movement_CreatedDateTime" class="view_stock_movement_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<?php if ($view_stock_movement->sortUrl($view_stock_movement->CreatedDate) == "") { ?>
		<th data-name="CreatedDate" class="<?php echo $view_stock_movement->CreatedDate->headerCellClass() ?>"><div id="elh_view_stock_movement_CreatedDate" class="view_stock_movement_CreatedDate"><div class="ew-table-header-caption"><script id="tpc_view_stock_movement_CreatedDate" class="view_stock_movementlist" type="text/html"><span><?php echo $view_stock_movement->CreatedDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDate" class="<?php echo $view_stock_movement->CreatedDate->headerCellClass() ?>"><script id="tpc_view_stock_movement_CreatedDate" class="view_stock_movementlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_stock_movement->SortUrl($view_stock_movement->CreatedDate) ?>',1);"><div id="elh_view_stock_movement_CreatedDate" class="view_stock_movement_CreatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_stock_movement->CreatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_stock_movement->CreatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_stock_movement->CreatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_stock_movement_list->ListOptions->render("header", "right", "", "block", $view_stock_movement->TableVar, "view_stock_movementlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_stock_movement->ExportAll && $view_stock_movement->isExport()) {
	$view_stock_movement_list->StopRec = $view_stock_movement_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_stock_movement_list->TotalRecs > $view_stock_movement_list->StartRec + $view_stock_movement_list->DisplayRecs - 1)
		$view_stock_movement_list->StopRec = $view_stock_movement_list->StartRec + $view_stock_movement_list->DisplayRecs - 1;
	else
		$view_stock_movement_list->StopRec = $view_stock_movement_list->TotalRecs;
}
$view_stock_movement_list->RecCnt = $view_stock_movement_list->StartRec - 1;
if ($view_stock_movement_list->Recordset && !$view_stock_movement_list->Recordset->EOF) {
	$view_stock_movement_list->Recordset->moveFirst();
	$selectLimit = $view_stock_movement_list->UseSelectLimit;
	if (!$selectLimit && $view_stock_movement_list->StartRec > 1)
		$view_stock_movement_list->Recordset->move($view_stock_movement_list->StartRec - 1);
} elseif (!$view_stock_movement->AllowAddDeleteRow && $view_stock_movement_list->StopRec == 0) {
	$view_stock_movement_list->StopRec = $view_stock_movement->GridAddRowCount;
}

// Initialize aggregate
$view_stock_movement->RowType = ROWTYPE_AGGREGATEINIT;
$view_stock_movement->resetAttributes();
$view_stock_movement_list->renderRow();
while ($view_stock_movement_list->RecCnt < $view_stock_movement_list->StopRec) {
	$view_stock_movement_list->RecCnt++;
	if ($view_stock_movement_list->RecCnt >= $view_stock_movement_list->StartRec) {
		$view_stock_movement_list->RowCnt++;

		// Set up key count
		$view_stock_movement_list->KeyCount = $view_stock_movement_list->RowIndex;

		// Init row class and style
		$view_stock_movement->resetAttributes();
		$view_stock_movement->CssClass = "";
		if ($view_stock_movement->isGridAdd()) {
		} else {
			$view_stock_movement_list->loadRowValues($view_stock_movement_list->Recordset); // Load row values
		}
		$view_stock_movement->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_stock_movement->RowAttrs = array_merge($view_stock_movement->RowAttrs, array('data-rowindex'=>$view_stock_movement_list->RowCnt, 'id'=>'r' . $view_stock_movement_list->RowCnt . '_view_stock_movement', 'data-rowtype'=>$view_stock_movement->RowType));

		// Render row
		$view_stock_movement_list->renderRow();

		// Render list options
		$view_stock_movement_list->renderListOptions();

		// Save row and cell attributes
		$view_stock_movement_list->Attrs[$view_stock_movement_list->RowCnt] = array("row_attrs" => $view_stock_movement->rowAttributes(), "cell_attrs" => array());
		$view_stock_movement_list->Attrs[$view_stock_movement_list->RowCnt]["cell_attrs"] = $view_stock_movement->fieldCellAttributes();
?>
	<tr<?php echo $view_stock_movement->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_stock_movement_list->ListOptions->render("body", "left", $view_stock_movement_list->RowCnt, "block", $view_stock_movement->TableVar, "view_stock_movementlist");
?>
	<?php if ($view_stock_movement->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_stock_movement->prc->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_prc" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_prc" class="view_stock_movement_prc">
<span<?php echo $view_stock_movement->prc->viewAttributes() ?>>
<?php echo $view_stock_movement->prc->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_stock_movement->Product->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_Product" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_Product" class="view_stock_movement_Product">
<span<?php echo $view_stock_movement->Product->viewAttributes() ?>>
<?php echo $view_stock_movement->Product->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view_stock_movement->BATCHNO->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_BATCHNO" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_BATCHNO" class="view_stock_movement_BATCHNO">
<span<?php echo $view_stock_movement->BATCHNO->viewAttributes() ?>>
<?php echo $view_stock_movement->BATCHNO->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_stock_movement->IQ->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_IQ" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_IQ" class="view_stock_movement_IQ">
<span<?php echo $view_stock_movement->IQ->viewAttributes() ?>>
<?php echo $view_stock_movement->IQ->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity"<?php echo $view_stock_movement->GrnQuantity->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_GrnQuantity" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_GrnQuantity" class="view_stock_movement_GrnQuantity">
<span<?php echo $view_stock_movement->GrnQuantity->viewAttributes() ?>>
<?php echo $view_stock_movement->GrnQuantity->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_stock_movement->FreeQty->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_FreeQty" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_FreeQty" class="view_stock_movement_FreeQty">
<span<?php echo $view_stock_movement->FreeQty->viewAttributes() ?>>
<?php echo $view_stock_movement->FreeQty->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_stock_movement->BRCODE->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_BRCODE" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_BRCODE" class="view_stock_movement_BRCODE">
<span<?php echo $view_stock_movement->BRCODE->viewAttributes() ?>>
<?php echo $view_stock_movement->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_stock_movement->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_HospID" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_HospID" class="view_stock_movement_HospID">
<span<?php echo $view_stock_movement->HospID->viewAttributes() ?>>
<?php echo $view_stock_movement->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $view_stock_movement->CreatedDateTime->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_CreatedDateTime" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_CreatedDateTime" class="view_stock_movement_CreatedDateTime">
<span<?php echo $view_stock_movement->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_stock_movement->CreatedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate"<?php echo $view_stock_movement->CreatedDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_CreatedDate" class="view_stock_movementlist" type="text/html">
<span id="el<?php echo $view_stock_movement_list->RowCnt ?>_view_stock_movement_CreatedDate" class="view_stock_movement_CreatedDate">
<span<?php echo $view_stock_movement->CreatedDate->viewAttributes() ?>>
<?php echo $view_stock_movement->CreatedDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_stock_movement_list->ListOptions->render("body", "right", $view_stock_movement_list->RowCnt, "block", $view_stock_movement->TableVar, "view_stock_movementlist");
?>
	</tr>
<?php
	}
	if (!$view_stock_movement->isGridAdd())
		$view_stock_movement_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_stock_movement->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_stock_movementlist" class="ew-custom-template"></div>
<script id="tpm_view_stock_movementlist" type="text/html">
<div id="ct_view_stock_movement_list"><?php if ($view_stock_movement_list->RowCnt > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $view_stock_movement_list->StartRowCnt; $i <= $view_stock_movement_list->RowCnt; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($view_stock_movement_list->TotalRecs > 0 && !$view_stock_movement->isGridAdd() && !$view_stock_movement->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Stock Movement</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_stock_movement_list->CreatedDate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_stock_movement_list->CreatedDate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_stock_movement_list->CreatedDate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{

	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}
	(int)$rowid = 0;
	(int)$CARDsum = 0;
$dataPoints = array();
?>
<?php
	 $db =& DbHelper(); // Create instance of the database helper class by DbHelper() (for main database) or DbHelper("<dbname>") (for linked databases) where <dbname> is database variable name
 ?>
 <div class="card">
	 <div class="card-body">
 <?php
 $sql = "SELECT a.prc,product,  
(CASE
	WHEN (((select sum(stock) from
ganeshkumar_bjhims.view_pharmacy_search_product where  prc = a.prc
 and brcode =  '".PharmacyID()."' and hospid = '".HospitalID()."') + sum(iq) ) - (sum(grnquantity) + sum(freeqty))) < 0 then 0
	else (((select sum(stock) from
ganeshkumar_bjhims.view_pharmacy_search_product where  prc = a.prc
 and brcode =  '".PharmacyID()."' and hospid = '".HospitalID()."') + sum(iq) ) - (sum(grnquantity) + sum(freeqty))) end)
	as OpeingStock,
	 ( sum(grnquantity) ) as GRNQuantity ,
	sum(freeqty) as FreeQuantity ,
	sum(iq) as IssueQuantity ,
 (select sum(stock) from
ganeshkumar_bjhims.view_pharmacy_search_product where  prc = a.prc
 and brcode =  '".PharmacyID()."' and hospid = '".HospitalID()."') as ClossingStock
FROM ganeshkumar_bjhims.view_stock_movement a left join
ganeshkumar_bjhims.view_pharmacy_search_product b on a.prc = b.prc where a.batchno = b.batch 
and a.brcode = b.brcode and  a.hospid = b.hospid
and a.brcode = '".PharmacyID()."' and a.hospid = '".HospitalID()."' and CreatedDate between '".$fromdte."' and '".$todate."'
group by prc,product
order by product asc
;";
 echo $db->ExecuteHtml($sql, ["fieldcaption" => TRUE, "tablename" => ["view_stock_movement", "view_pharmacy_search_product"]]); // Execute a SQL and show as HTML table
 ?>
	 </div>
 </div>
	</div>
</div>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_stock_movement_list->Recordset)
	$view_stock_movement_list->Recordset->Close();
?>
<?php if (!$view_stock_movement->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_stock_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_stock_movement_list->Pager)) $view_stock_movement_list->Pager = new NumericPager($view_stock_movement_list->StartRec, $view_stock_movement_list->DisplayRecs, $view_stock_movement_list->TotalRecs, $view_stock_movement_list->RecRange, $view_stock_movement_list->AutoHidePager) ?>
<?php if ($view_stock_movement_list->Pager->RecordCount > 0 && $view_stock_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_stock_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_stock_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_stock_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_stock_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_stock_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_stock_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_stock_movement_list->pageUrl() ?>start=<?php echo $view_stock_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_stock_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_stock_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_stock_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_stock_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_stock_movement_list->TotalRecs > 0 && (!$view_stock_movement_list->AutoHidePageSizeSelector || $view_stock_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_stock_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_stock_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_stock_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_stock_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_stock_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_stock_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_stock_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_stock_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_stock_movement_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_stock_movement_list->TotalRecs == 0 && !$view_stock_movement->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_stock_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_stock_movement->Rows) ?> };
ew.applyTemplate("tpd_view_stock_movementlist", "tpm_view_stock_movementlist", "view_stock_movementlist", "<?php echo $view_stock_movement->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_stock_movementlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_stock_movementlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_stock_movementlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_stock_movement_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_stock_movement->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_stock_movement->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_stock_movement", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_stock_movement_list->terminate();
?>