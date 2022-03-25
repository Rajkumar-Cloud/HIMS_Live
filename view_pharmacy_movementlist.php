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
$view_pharmacy_movement_list = new view_pharmacy_movement_list();

// Run the page
$view_pharmacy_movement_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_movementlist = currentForm = new ew.Form("fview_pharmacy_movementlist", "list");
fview_pharmacy_movementlist.formKeyCountName = '<?php echo $view_pharmacy_movement_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_movementlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_movementlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_movementlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_movementlistsrch");

// Validate function for search
fview_pharmacy_movementlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_ExpDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement->ExpDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_movementlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_movementlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_movementlistsrch.filterList = <?php echo $view_pharmacy_movement_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_movement_list->TotalRecs > 0 && $view_pharmacy_movement_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_movement_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_movement->isExport() && !$view_pharmacy_movement->CurrentAction) { ?>
<form name="fview_pharmacy_movementlistsrch" id="fview_pharmacy_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_movement_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_movementlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_movement">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_movement_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_movement->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_movement->resetAttributes();
$view_pharmacy_movement_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_movement->prc->Visible) { // prc ?>
	<div id="xsc_prc" class="ew-cell form-group">
		<label for="x_prc" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement->prc->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_prc" id="z_prc" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement->prc->EditValue ?>"<?php echo $view_pharmacy_movement->prc->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement->PrName->Visible) { // PrName ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label for="x_PrName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement->PrName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement->PrName->EditValue ?>"<?php echo $view_pharmacy_movement->PrName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_movement->ExpDate->Visible) { // ExpDate ?>
	<div id="xsc_ExpDate" class="ew-cell form-group">
		<label for="x_ExpDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement->ExpDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_ExpDate" id="z_ExpDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_movement->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement->ExpDate->ReadOnly && !$view_pharmacy_movement->ExpDate->Disabled && !isset($view_pharmacy_movement->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movementlistsrch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_ExpDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_ExpDate style="d-none"">
<input type="text" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement->ExpDate->ReadOnly && !$view_pharmacy_movement->ExpDate->Disabled && !isset($view_pharmacy_movement->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movementlistsrch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_movement_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_movement_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_movement_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_movement_list->showPageHeader(); ?>
<?php
$view_pharmacy_movement_list->showMessage();
?>
<?php if ($view_pharmacy_movement_list->TotalRecs > 0 || $view_pharmacy_movement->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_movement_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement">
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_movement_list->Pager)) $view_pharmacy_movement_list->Pager = new NumericPager($view_pharmacy_movement_list->StartRec, $view_pharmacy_movement_list->DisplayRecs, $view_pharmacy_movement_list->TotalRecs, $view_pharmacy_movement_list->RecRange, $view_pharmacy_movement_list->AutoHidePager) ?>
<?php if ($view_pharmacy_movement_list->Pager->RecordCount > 0 && $view_pharmacy_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_list->TotalRecs > 0 && (!$view_pharmacy_movement_list->AutoHidePageSizeSelector || $view_pharmacy_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_movementlist" id="fview_pharmacy_movementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_movement_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_movement_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement">
<div id="gmp_view_pharmacy_movement" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_movement_list->TotalRecs > 0 || $view_pharmacy_movement->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_movementlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_movement_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_movement_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_prc" class="view_pharmacy_movement_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->prc) ?>',1);"><div id="elh_view_pharmacy_movement_prc" class="view_pharmacy_movement_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_PrName" class="view_pharmacy_movement_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->PrName) ?>',1);"><div id="elh_view_pharmacy_movement_PrName" class="view_pharmacy_movement_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_BatchNo" class="view_pharmacy_movement_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->BatchNo) ?>',1);"><div id="elh_view_pharmacy_movement_BatchNo" class="view_pharmacy_movement_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_ExpDate" class="view_pharmacy_movement_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->ExpDate) ?>',1);"><div id="elh_view_pharmacy_movement_ExpDate" class="view_pharmacy_movement_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_MFRCODE" class="view_pharmacy_movement_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_movement_MFRCODE" class="view_pharmacy_movement_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->hsn) == "") { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_hsn" class="view_pharmacy_movement_hsn"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->hsn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement->hsn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->hsn) ?>',1);"><div id="elh_view_pharmacy_movement_hsn" class="view_pharmacy_movement_hsn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->hsn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->hsn->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->hsn->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement->sortUrl($view_pharmacy_movement->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_HospID" class="view_pharmacy_movement_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_movement->SortUrl($view_pharmacy_movement->HospID) ?>',1);"><div id="elh_view_pharmacy_movement_HospID" class="view_pharmacy_movement_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_movement->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_movement->ExportAll && $view_pharmacy_movement->isExport()) {
	$view_pharmacy_movement_list->StopRec = $view_pharmacy_movement_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_movement_list->TotalRecs > $view_pharmacy_movement_list->StartRec + $view_pharmacy_movement_list->DisplayRecs - 1)
		$view_pharmacy_movement_list->StopRec = $view_pharmacy_movement_list->StartRec + $view_pharmacy_movement_list->DisplayRecs - 1;
	else
		$view_pharmacy_movement_list->StopRec = $view_pharmacy_movement_list->TotalRecs;
}
$view_pharmacy_movement_list->RecCnt = $view_pharmacy_movement_list->StartRec - 1;
if ($view_pharmacy_movement_list->Recordset && !$view_pharmacy_movement_list->Recordset->EOF) {
	$view_pharmacy_movement_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_movement_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_movement_list->StartRec > 1)
		$view_pharmacy_movement_list->Recordset->move($view_pharmacy_movement_list->StartRec - 1);
} elseif (!$view_pharmacy_movement->AllowAddDeleteRow && $view_pharmacy_movement_list->StopRec == 0) {
	$view_pharmacy_movement_list->StopRec = $view_pharmacy_movement->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_movement->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_movement->resetAttributes();
$view_pharmacy_movement_list->renderRow();
while ($view_pharmacy_movement_list->RecCnt < $view_pharmacy_movement_list->StopRec) {
	$view_pharmacy_movement_list->RecCnt++;
	if ($view_pharmacy_movement_list->RecCnt >= $view_pharmacy_movement_list->StartRec) {
		$view_pharmacy_movement_list->RowCnt++;

		// Set up key count
		$view_pharmacy_movement_list->KeyCount = $view_pharmacy_movement_list->RowIndex;

		// Init row class and style
		$view_pharmacy_movement->resetAttributes();
		$view_pharmacy_movement->CssClass = "";
		if ($view_pharmacy_movement->isGridAdd()) {
		} else {
			$view_pharmacy_movement_list->loadRowValues($view_pharmacy_movement_list->Recordset); // Load row values
		}
		$view_pharmacy_movement->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_movement->RowAttrs = array_merge($view_pharmacy_movement->RowAttrs, array('data-rowindex'=>$view_pharmacy_movement_list->RowCnt, 'id'=>'r' . $view_pharmacy_movement_list->RowCnt . '_view_pharmacy_movement', 'data-rowtype'=>$view_pharmacy_movement->RowType));

		// Render row
		$view_pharmacy_movement_list->renderRow();

		// Render list options
		$view_pharmacy_movement_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_movement->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_list->ListOptions->render("body", "left", $view_pharmacy_movement_list->RowCnt);
?>
	<?php if ($view_pharmacy_movement->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_pharmacy_movement->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_prc" class="view_pharmacy_movement_prc">
<span<?php echo $view_pharmacy_movement->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_movement->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_PrName" class="view_pharmacy_movement_PrName">
<span<?php echo $view_pharmacy_movement->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacy_movement->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_BatchNo" class="view_pharmacy_movement_BatchNo">
<span<?php echo $view_pharmacy_movement->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_pharmacy_movement->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_ExpDate" class="view_pharmacy_movement_ExpDate">
<span<?php echo $view_pharmacy_movement->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_movement->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_MFRCODE" class="view_pharmacy_movement_MFRCODE">
<span<?php echo $view_pharmacy_movement->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement->hsn->Visible) { // hsn ?>
		<td data-name="hsn"<?php echo $view_pharmacy_movement->hsn->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_hsn" class="view_pharmacy_movement_hsn">
<span<?php echo $view_pharmacy_movement->hsn->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->hsn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_movement->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCnt ?>_view_pharmacy_movement_HospID" class="view_pharmacy_movement_HospID">
<span<?php echo $view_pharmacy_movement->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_movement->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_list->ListOptions->render("body", "right", $view_pharmacy_movement_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_movement->isGridAdd())
		$view_pharmacy_movement_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_movement->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_movement_list->Recordset)
	$view_pharmacy_movement_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_movement_list->Pager)) $view_pharmacy_movement_list->Pager = new NumericPager($view_pharmacy_movement_list->StartRec, $view_pharmacy_movement_list->DisplayRecs, $view_pharmacy_movement_list->TotalRecs, $view_pharmacy_movement_list->RecRange, $view_pharmacy_movement_list->AutoHidePager) ?>
<?php if ($view_pharmacy_movement_list->Pager->RecordCount > 0 && $view_pharmacy_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_movement_list->TotalRecs > 0 && (!$view_pharmacy_movement_list->AutoHidePageSizeSelector || $view_pharmacy_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_movement_list->TotalRecs == 0 && !$view_pharmacy_movement->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_movement_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_movement", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_movement_list->terminate();
?>