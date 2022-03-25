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
$view_pharmacy_movement_item_list = new view_pharmacy_movement_item_list();

// Run the page
$view_pharmacy_movement_item_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_item_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_movement_itemlist = currentForm = new ew.Form("fview_pharmacy_movement_itemlist", "list");
fview_pharmacy_movement_itemlist.formKeyCountName = '<?php echo $view_pharmacy_movement_item_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_movement_itemlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_movement_itemlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_movement_itemlist.lists["x_ProductFrom"] = <?php echo $view_pharmacy_movement_item_list->ProductFrom->Lookup->toClientList() ?>;
fview_pharmacy_movement_itemlist.lists["x_ProductFrom"].options = <?php echo JsonEncode($view_pharmacy_movement_item_list->ProductFrom->lookupOptions()) ?>;
fview_pharmacy_movement_itemlist.autoSuggests["x_ProductFrom"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacy_movement_itemlist.lists["x_BRCODE"] = <?php echo $view_pharmacy_movement_item_list->BRCODE->Lookup->toClientList() ?>;
fview_pharmacy_movement_itemlist.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_movement_item_list->BRCODE->lookupOptions()) ?>;
fview_pharmacy_movement_itemlist.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_pharmacy_movement_itemlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_movement_itemlistsrch");

// Validate function for search
fview_pharmacy_movement_itemlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_ExpDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->ExpDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_movement_itemlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_movement_itemlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_movement_itemlistsrch.filterList = <?php echo $view_pharmacy_movement_item_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_movement_item_list->TotalRecs > 0 && $view_pharmacy_movement_item_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacy_movement_item->isExport() || EXPORT_MASTER_RECORD && $view_pharmacy_movement_item->isExport("print")) { ?>
<?php
if ($view_pharmacy_movement_item_list->DbMasterFilter <> "" && $view_pharmacy_movement_item->getCurrentMasterTable() == "view_pharmacy_movement") {
	if ($view_pharmacy_movement_item_list->MasterRecordExists) {
		include_once "view_pharmacy_movementmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacy_movement_item_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_movement_item->isExport() && !$view_pharmacy_movement_item->CurrentAction) { ?>
<form name="fview_pharmacy_movement_itemlistsrch" id="fview_pharmacy_movement_itemlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_movement_item_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_movement_itemlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_movement_item">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_movement_item_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_movement_item->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_movement_item->resetAttributes();
$view_pharmacy_movement_item_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
	<div id="xsc_prc" class="ew-cell form-group">
		<label for="x_prc" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_item->prc->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_prc" id="z_prc" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item->prc->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label for="x_PrName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item->PrName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
	<div id="xsc_ExpDate" class="ew-cell form-group">
		<label for="x_ExpDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_ExpDate" id="z_ExpDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemlistsrch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_ExpDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_ExpDate style="d-none"">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemlistsrch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_movement_item_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_movement_item_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_movement_item_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_movement_item_list->showPageHeader(); ?>
<?php
$view_pharmacy_movement_item_list->showMessage();
?>
<?php if ($view_pharmacy_movement_item_list->TotalRecs > 0 || $view_pharmacy_movement_item->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_movement_item_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement_item">
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_movement_item->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_movement_item_list->Pager)) $view_pharmacy_movement_item_list->Pager = new NumericPager($view_pharmacy_movement_item_list->StartRec, $view_pharmacy_movement_item_list->DisplayRecs, $view_pharmacy_movement_item_list->TotalRecs, $view_pharmacy_movement_item_list->RecRange, $view_pharmacy_movement_item_list->AutoHidePager) ?>
<?php if ($view_pharmacy_movement_item_list->Pager->RecordCount > 0 && $view_pharmacy_movement_item_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_movement_item_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_movement_item_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_movement_item_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_movement_item_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_movement_item_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_movement_item_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->TotalRecs > 0 && (!$view_pharmacy_movement_item_list->AutoHidePageSizeSelector || $view_pharmacy_movement_item_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_movement_item->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_movement_itemlist" id="fview_pharmacy_movement_itemlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_movement_item_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_movement_item_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<?php if ($view_pharmacy_movement_item->getCurrentMasterTable() == "view_pharmacy_movement" && $view_pharmacy_movement_item->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_pharmacy_movement">
<input type="hidden" name="fk_prc" value="<?php echo $view_pharmacy_movement_item->prc->getSessionValue() ?>">
<input type="hidden" name="fk_BatchNo" value="<?php echo $view_pharmacy_movement_item->BatchNo->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_pharmacy_movement_item" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_movement_item_list->TotalRecs > 0 || $view_pharmacy_movement_item->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_movement_itemlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_movement_item_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_movement_item_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_item_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->ProductFrom) == "") { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item->ProductFrom->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item->ProductFrom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->ProductFrom) ?>',1);"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->ProductFrom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->ProductFrom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->Quantity) ?>',1);"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->FreeQty) ?>',1);"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->IQ) ?>',1);"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IQ->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->MRQ) ?>',1);"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BRCODE) ?>',1);"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item->OPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->OPNO) ?>',1);"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->OPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->OPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item->IPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->IPNO) ?>',1);"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->IPNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->IPNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->PatientBILLNO) == "") { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item->PatientBILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item->PatientBILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->PatientBILLNO) ?>',1);"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->PatientBILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->PatientBILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BILLDT) ?>',1);"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item->GRNNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item->GRNNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->GRNNO) ?>',1);"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->GRNNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->GRNNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->DT) ?>',1);"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->DT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->Customername) ?>',1);"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->createdby) ?>',1);"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->createddatetime) ?>',1);"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->modifiedby) ?>',1);"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->modifieddatetime) ?>',1);"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BILLNO) ?>',1);"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->prc) ?>',1);"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->PrName) ?>',1);"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->BatchNo) ?>',1);"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->ExpDate) ?>',1);"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->hsn) == "") { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->hsn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item->hsn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->hsn) ?>',1);"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->hsn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->hsn->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->hsn->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_item->sortUrl($view_pharmacy_movement_item->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement_item->SortUrl($view_pharmacy_movement_item->HospID) ?>',1);"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_item_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_movement_item->ExportAll && $view_pharmacy_movement_item->isExport()) {
	$view_pharmacy_movement_item_list->StopRec = $view_pharmacy_movement_item_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_movement_item_list->TotalRecs > $view_pharmacy_movement_item_list->StartRec + $view_pharmacy_movement_item_list->DisplayRecs - 1)
		$view_pharmacy_movement_item_list->StopRec = $view_pharmacy_movement_item_list->StartRec + $view_pharmacy_movement_item_list->DisplayRecs - 1;
	else
		$view_pharmacy_movement_item_list->StopRec = $view_pharmacy_movement_item_list->TotalRecs;
}
$view_pharmacy_movement_item_list->RecCnt = $view_pharmacy_movement_item_list->StartRec - 1;
if ($view_pharmacy_movement_item_list->Recordset && !$view_pharmacy_movement_item_list->Recordset->EOF) {
	$view_pharmacy_movement_item_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_movement_item_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_movement_item_list->StartRec > 1)
		$view_pharmacy_movement_item_list->Recordset->move($view_pharmacy_movement_item_list->StartRec - 1);
} elseif (!$view_pharmacy_movement_item->AllowAddDeleteRow && $view_pharmacy_movement_item_list->StopRec == 0) {
	$view_pharmacy_movement_item_list->StopRec = $view_pharmacy_movement_item->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_movement_item->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_movement_item->resetAttributes();
$view_pharmacy_movement_item_list->renderRow();
while ($view_pharmacy_movement_item_list->RecCnt < $view_pharmacy_movement_item_list->StopRec) {
	$view_pharmacy_movement_item_list->RecCnt++;
	if ($view_pharmacy_movement_item_list->RecCnt >= $view_pharmacy_movement_item_list->StartRec) {
		$view_pharmacy_movement_item_list->RowCnt++;

		// Set up key count
		$view_pharmacy_movement_item_list->KeyCount = $view_pharmacy_movement_item_list->RowIndex;

		// Init row class and style
		$view_pharmacy_movement_item->resetAttributes();
		$view_pharmacy_movement_item->CssClass = "";
		if ($view_pharmacy_movement_item->isGridAdd()) {
		} else {
			$view_pharmacy_movement_item_list->loadRowValues($view_pharmacy_movement_item_list->Recordset); // Load row values
		}
		$view_pharmacy_movement_item->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_movement_item->RowAttrs = array_merge($view_pharmacy_movement_item->RowAttrs, array('data-rowindex'=>$view_pharmacy_movement_item_list->RowCnt, 'id'=>'r' . $view_pharmacy_movement_item_list->RowCnt . '_view_pharmacy_movement_item', 'data-rowtype'=>$view_pharmacy_movement_item->RowType));

		// Render row
		$view_pharmacy_movement_item_list->renderRow();

		// Render list options
		$view_pharmacy_movement_item_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_list->ListOptions->render("body", "left", $view_pharmacy_movement_item_list->RowCnt);
?>
	<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
		<td data-name="ProductFrom"<?php echo $view_pharmacy_movement_item->ProductFrom->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom">
<span<?php echo $view_pharmacy_movement_item->ProductFrom->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->ProductFrom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacy_movement_item->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity">
<span<?php echo $view_pharmacy_movement_item->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_pharmacy_movement_item->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty">
<span<?php echo $view_pharmacy_movement_item->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->FreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_pharmacy_movement_item->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ">
<span<?php echo $view_pharmacy_movement_item->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $view_pharmacy_movement_item->MRQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ">
<span<?php echo $view_pharmacy_movement_item->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_movement_item->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE">
<span<?php echo $view_pharmacy_movement_item->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO"<?php echo $view_pharmacy_movement_item->OPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO">
<span<?php echo $view_pharmacy_movement_item->OPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->OPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO"<?php echo $view_pharmacy_movement_item->IPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO">
<span<?php echo $view_pharmacy_movement_item->IPNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->IPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<td data-name="PatientBILLNO"<?php echo $view_pharmacy_movement_item->PatientBILLNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO">
<span<?php echo $view_pharmacy_movement_item->PatientBILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->PatientBILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $view_pharmacy_movement_item->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT">
<span<?php echo $view_pharmacy_movement_item->BILLDT->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO"<?php echo $view_pharmacy_movement_item->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO">
<span<?php echo $view_pharmacy_movement_item->GRNNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->GRNNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $view_pharmacy_movement_item->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT">
<span<?php echo $view_pharmacy_movement_item->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $view_pharmacy_movement_item->Customername->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername">
<span<?php echo $view_pharmacy_movement_item->Customername->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_movement_item->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby">
<span<?php echo $view_pharmacy_movement_item->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_movement_item->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime">
<span<?php echo $view_pharmacy_movement_item->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_movement_item->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby">
<span<?php echo $view_pharmacy_movement_item->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_movement_item->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime">
<span<?php echo $view_pharmacy_movement_item->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $view_pharmacy_movement_item->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO">
<span<?php echo $view_pharmacy_movement_item->BILLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_pharmacy_movement_item->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_movement_item->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName">
<span<?php echo $view_pharmacy_movement_item->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacy_movement_item->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_pharmacy_movement_item->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate">
<span<?php echo $view_pharmacy_movement_item->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_movement_item->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE">
<span<?php echo $view_pharmacy_movement_item->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
		<td data-name="hsn"<?php echo $view_pharmacy_movement_item->hsn->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn">
<span<?php echo $view_pharmacy_movement_item->hsn->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->hsn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_movement_item->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCnt ?>_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID">
<span<?php echo $view_pharmacy_movement_item->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_movement_item->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_list->ListOptions->render("body", "right", $view_pharmacy_movement_item_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_movement_item->isGridAdd())
		$view_pharmacy_movement_item_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_movement_item->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_movement_item_list->Recordset)
	$view_pharmacy_movement_item_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_movement_item->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_movement_item_list->Pager)) $view_pharmacy_movement_item_list->Pager = new NumericPager($view_pharmacy_movement_item_list->StartRec, $view_pharmacy_movement_item_list->DisplayRecs, $view_pharmacy_movement_item_list->TotalRecs, $view_pharmacy_movement_item_list->RecRange, $view_pharmacy_movement_item_list->AutoHidePager) ?>
<?php if ($view_pharmacy_movement_item_list->Pager->RecordCount > 0 && $view_pharmacy_movement_item_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_movement_item_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_movement_item_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_movement_item_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_item_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_item_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_movement_item_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_movement_item_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_movement_item_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->TotalRecs > 0 && (!$view_pharmacy_movement_item_list->AutoHidePageSizeSelector || $view_pharmacy_movement_item_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_movement_item_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_movement_item->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->TotalRecs == 0 && !$view_pharmacy_movement_item->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_movement_item_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_movement_item", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_movement_item_list->terminate();
?>