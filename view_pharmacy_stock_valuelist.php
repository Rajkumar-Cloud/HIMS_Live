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
$view_pharmacy_stock_value_list = new view_pharmacy_stock_value_list();

// Run the page
$view_pharmacy_stock_value_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_stock_value_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_stock_value->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_stock_valuelist = currentForm = new ew.Form("fview_pharmacy_stock_valuelist", "list");
fview_pharmacy_stock_valuelist.formKeyCountName = '<?php echo $view_pharmacy_stock_value_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_stock_valuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_stock_valuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_stock_valuelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_stock_valuelistsrch");

// Validate function for search
fview_pharmacy_stock_valuelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Stock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_stock_value->Stock->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_stock_valuelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_stock_valuelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_stock_valuelistsrch.filterList = <?php echo $view_pharmacy_stock_value_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_stock_value->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_stock_value_list->TotalRecs > 0 && $view_pharmacy_stock_value_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_stock_value_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_stock_value_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_stock_value_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_stock_value_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_stock_value_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_stock_value->isExport() && !$view_pharmacy_stock_value->CurrentAction) { ?>
<form name="fview_pharmacy_stock_valuelistsrch" id="fview_pharmacy_stock_valuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_stock_value_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_stock_valuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_stock_value">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_stock_value_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_stock_value->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_stock_value->resetAttributes();
$view_pharmacy_stock_value_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_stock_value->DES->Visible) { // DES ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_value->DES->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_value" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_value->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_value->DES->EditValue ?>"<?php echo $view_pharmacy_stock_value->DES->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_stock_value->PRC->Visible) { // PRC ?>
	<div id="xsc_PRC" class="ew-cell form-group">
		<label for="x_PRC" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_value->PRC->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_value" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_value->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_value->PRC->EditValue ?>"<?php echo $view_pharmacy_stock_value->PRC->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_stock_value->Stock->Visible) { // Stock ?>
	<div id="xsc_Stock" class="ew-cell form-group">
		<label for="x_Stock" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_value->Stock->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Stock" id="z_Stock" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_value" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_value->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_value->Stock->EditValue ?>"<?php echo $view_pharmacy_stock_value->Stock->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_stock_value->GENNAME->Visible) { // GENNAME ?>
	<div id="xsc_GENNAME" class="ew-cell form-group">
		<label for="x_GENNAME" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_value->GENNAME->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_value" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_value->GENNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_value->GENNAME->EditValue ?>"<?php echo $view_pharmacy_stock_value->GENNAME->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_stock_value_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_stock_value_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_stock_value_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_stock_value_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_value_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_value_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_value_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_stock_value_list->showPageHeader(); ?>
<?php
$view_pharmacy_stock_value_list->showMessage();
?>
<?php if ($view_pharmacy_stock_value_list->TotalRecs > 0 || $view_pharmacy_stock_value->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_stock_value_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_stock_value">
<?php if (!$view_pharmacy_stock_value->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_stock_value->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_stock_value_list->Pager)) $view_pharmacy_stock_value_list->Pager = new NumericPager($view_pharmacy_stock_value_list->StartRec, $view_pharmacy_stock_value_list->DisplayRecs, $view_pharmacy_stock_value_list->TotalRecs, $view_pharmacy_stock_value_list->RecRange, $view_pharmacy_stock_value_list->AutoHidePager) ?>
<?php if ($view_pharmacy_stock_value_list->Pager->RecordCount > 0 && $view_pharmacy_stock_value_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_stock_value_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_stock_value_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_stock_value_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_stock_value_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_stock_value_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_stock_value_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->TotalRecs > 0 && (!$view_pharmacy_stock_value_list->AutoHidePageSizeSelector || $view_pharmacy_stock_value_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_stock_value">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_stock_value->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_value_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_stock_valuelist" id="fview_pharmacy_stock_valuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_stock_value_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_stock_value_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_stock_value">
<div id="gmp_view_pharmacy_stock_value" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_stock_value_list->TotalRecs > 0 || $view_pharmacy_stock_value->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_stock_valuelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_stock_value_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_stock_value_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_stock_value_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_stock_value->id->Visible) { // id ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_stock_value->id->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_id" class="view_pharmacy_stock_value_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_stock_value->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->id) ?>',1);"><div id="elh_view_pharmacy_stock_value_id" class="view_pharmacy_stock_value_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_stock_value->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_DES" class="view_pharmacy_stock_value_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_stock_value->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->DES) ?>',1);"><div id="elh_view_pharmacy_stock_value_DES" class="view_pharmacy_stock_value_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->BATCH->Visible) { // BATCH ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_stock_value->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_BATCH" class="view_pharmacy_stock_value_BATCH"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_stock_value->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->BATCH) ?>',1);"><div id="elh_view_pharmacy_stock_value_BATCH" class="view_pharmacy_stock_value_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->BATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->BATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_stock_value->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_PRC" class="view_pharmacy_stock_value_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_stock_value->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->PRC) ?>',1);"><div id="elh_view_pharmacy_stock_value_PRC" class="view_pharmacy_stock_value_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->OQ->Visible) { // OQ ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_stock_value->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_OQ" class="view_pharmacy_stock_value_OQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_stock_value->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->OQ) ?>',1);"><div id="elh_view_pharmacy_stock_value_OQ" class="view_pharmacy_stock_value_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->Stock->Visible) { // Stock ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_stock_value->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_Stock" class="view_pharmacy_stock_value_Stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_stock_value->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->Stock) ?>',1);"><div id="elh_view_pharmacy_stock_value_Stock" class="view_pharmacy_stock_value_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->Stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->Stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_stock_value->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_RT" class="view_pharmacy_stock_value_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_stock_value->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->RT) ?>',1);"><div id="elh_view_pharmacy_stock_value_RT" class="view_pharmacy_stock_value_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->StockValue->Visible) { // StockValue ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->StockValue) == "") { ?>
		<th data-name="StockValue" class="<?php echo $view_pharmacy_stock_value->StockValue->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_StockValue" class="view_pharmacy_stock_value_StockValue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->StockValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockValue" class="<?php echo $view_pharmacy_stock_value->StockValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->StockValue) ?>',1);"><div id="elh_view_pharmacy_stock_value_StockValue" class="view_pharmacy_stock_value_StockValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->StockValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->StockValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->StockValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_stock_value->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_EXPDT" class="view_pharmacy_stock_value_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_stock_value->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->EXPDT) ?>',1);"><div id="elh_view_pharmacy_stock_value_EXPDT" class="view_pharmacy_stock_value_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->GENNAME->Visible) { // GENNAME ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_stock_value->GENNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_GENNAME" class="view_pharmacy_stock_value_GENNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_stock_value->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->GENNAME) ?>',1);"><div id="elh_view_pharmacy_stock_value_GENNAME" class="view_pharmacy_stock_value_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->UNIT->Visible) { // UNIT ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_stock_value->UNIT->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_UNIT" class="view_pharmacy_stock_value_UNIT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_stock_value->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->UNIT) ?>',1);"><div id="elh_view_pharmacy_stock_value_UNIT" class="view_pharmacy_stock_value_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->UNIT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->UNIT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_stock_value->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_SSGST" class="view_pharmacy_stock_value_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_stock_value->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->SSGST) ?>',1);"><div id="elh_view_pharmacy_stock_value_SSGST" class="view_pharmacy_stock_value_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_stock_value->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_SCGST" class="view_pharmacy_stock_value_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_stock_value->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->SCGST) ?>',1);"><div id="elh_view_pharmacy_stock_value_SCGST" class="view_pharmacy_stock_value_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_stock_value->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_MFRCODE" class="view_pharmacy_stock_value_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_stock_value->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_stock_value_MFRCODE" class="view_pharmacy_stock_value_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_stock_value->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_BRCODE" class="view_pharmacy_stock_value_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_stock_value->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->BRCODE) ?>',1);"><div id="elh_view_pharmacy_stock_value_BRCODE" class="view_pharmacy_stock_value_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_stock_value->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_HospID" class="view_pharmacy_stock_value_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_stock_value->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->HospID) ?>',1);"><div id="elh_view_pharmacy_stock_value_HospID" class="view_pharmacy_stock_value_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_value->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($view_pharmacy_stock_value->sortUrl($view_pharmacy_stock_value->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_stock_value->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_BILLDATE" class="view_pharmacy_stock_value_BILLDATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_stock_value->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_value->SortUrl($view_pharmacy_stock_value->BILLDATE) ?>',1);"><div id="elh_view_pharmacy_stock_value_BILLDATE" class="view_pharmacy_stock_value_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_value->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_value->BILLDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_value->BILLDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_stock_value_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_stock_value->ExportAll && $view_pharmacy_stock_value->isExport()) {
	$view_pharmacy_stock_value_list->StopRec = $view_pharmacy_stock_value_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_stock_value_list->TotalRecs > $view_pharmacy_stock_value_list->StartRec + $view_pharmacy_stock_value_list->DisplayRecs - 1)
		$view_pharmacy_stock_value_list->StopRec = $view_pharmacy_stock_value_list->StartRec + $view_pharmacy_stock_value_list->DisplayRecs - 1;
	else
		$view_pharmacy_stock_value_list->StopRec = $view_pharmacy_stock_value_list->TotalRecs;
}
$view_pharmacy_stock_value_list->RecCnt = $view_pharmacy_stock_value_list->StartRec - 1;
if ($view_pharmacy_stock_value_list->Recordset && !$view_pharmacy_stock_value_list->Recordset->EOF) {
	$view_pharmacy_stock_value_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_stock_value_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_stock_value_list->StartRec > 1)
		$view_pharmacy_stock_value_list->Recordset->move($view_pharmacy_stock_value_list->StartRec - 1);
} elseif (!$view_pharmacy_stock_value->AllowAddDeleteRow && $view_pharmacy_stock_value_list->StopRec == 0) {
	$view_pharmacy_stock_value_list->StopRec = $view_pharmacy_stock_value->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_stock_value->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_stock_value->resetAttributes();
$view_pharmacy_stock_value_list->renderRow();
while ($view_pharmacy_stock_value_list->RecCnt < $view_pharmacy_stock_value_list->StopRec) {
	$view_pharmacy_stock_value_list->RecCnt++;
	if ($view_pharmacy_stock_value_list->RecCnt >= $view_pharmacy_stock_value_list->StartRec) {
		$view_pharmacy_stock_value_list->RowCnt++;

		// Set up key count
		$view_pharmacy_stock_value_list->KeyCount = $view_pharmacy_stock_value_list->RowIndex;

		// Init row class and style
		$view_pharmacy_stock_value->resetAttributes();
		$view_pharmacy_stock_value->CssClass = "";
		if ($view_pharmacy_stock_value->isGridAdd()) {
		} else {
			$view_pharmacy_stock_value_list->loadRowValues($view_pharmacy_stock_value_list->Recordset); // Load row values
		}
		$view_pharmacy_stock_value->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_stock_value->RowAttrs = array_merge($view_pharmacy_stock_value->RowAttrs, array('data-rowindex'=>$view_pharmacy_stock_value_list->RowCnt, 'id'=>'r' . $view_pharmacy_stock_value_list->RowCnt . '_view_pharmacy_stock_value', 'data-rowtype'=>$view_pharmacy_stock_value->RowType));

		// Render row
		$view_pharmacy_stock_value_list->renderRow();

		// Render list options
		$view_pharmacy_stock_value_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_stock_value->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_stock_value_list->ListOptions->render("body", "left", $view_pharmacy_stock_value_list->RowCnt);
?>
	<?php if ($view_pharmacy_stock_value->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_stock_value->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_id" class="view_pharmacy_stock_value_id">
<span<?php echo $view_pharmacy_stock_value->id->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $view_pharmacy_stock_value->DES->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_DES" class="view_pharmacy_stock_value_DES">
<span<?php echo $view_pharmacy_stock_value->DES->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH"<?php echo $view_pharmacy_stock_value->BATCH->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_BATCH" class="view_pharmacy_stock_value_BATCH">
<span<?php echo $view_pharmacy_stock_value->BATCH->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_stock_value->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_PRC" class="view_pharmacy_stock_value_PRC">
<span<?php echo $view_pharmacy_stock_value->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $view_pharmacy_stock_value->OQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_OQ" class="view_pharmacy_stock_value_OQ">
<span<?php echo $view_pharmacy_stock_value->OQ->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->Stock->Visible) { // Stock ?>
		<td data-name="Stock"<?php echo $view_pharmacy_stock_value->Stock->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_Stock" class="view_pharmacy_stock_value_Stock">
<span<?php echo $view_pharmacy_stock_value->Stock->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $view_pharmacy_stock_value->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_RT" class="view_pharmacy_stock_value_RT">
<span<?php echo $view_pharmacy_stock_value->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->StockValue->Visible) { // StockValue ?>
		<td data-name="StockValue"<?php echo $view_pharmacy_stock_value->StockValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_StockValue" class="view_pharmacy_stock_value_StockValue">
<span<?php echo $view_pharmacy_stock_value->StockValue->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->StockValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_pharmacy_stock_value->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_EXPDT" class="view_pharmacy_stock_value_EXPDT">
<span<?php echo $view_pharmacy_stock_value->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $view_pharmacy_stock_value->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_GENNAME" class="view_pharmacy_stock_value_GENNAME">
<span<?php echo $view_pharmacy_stock_value->GENNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT"<?php echo $view_pharmacy_stock_value->UNIT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_UNIT" class="view_pharmacy_stock_value_UNIT">
<span<?php echo $view_pharmacy_stock_value->UNIT->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacy_stock_value->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_SSGST" class="view_pharmacy_stock_value_SSGST">
<span<?php echo $view_pharmacy_stock_value->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacy_stock_value->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_SCGST" class="view_pharmacy_stock_value_SCGST">
<span<?php echo $view_pharmacy_stock_value->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_stock_value->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_MFRCODE" class="view_pharmacy_stock_value_MFRCODE">
<span<?php echo $view_pharmacy_stock_value->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_stock_value->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_BRCODE" class="view_pharmacy_stock_value_BRCODE">
<span<?php echo $view_pharmacy_stock_value->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_stock_value->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_HospID" class="view_pharmacy_stock_value_HospID">
<span<?php echo $view_pharmacy_stock_value->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE"<?php echo $view_pharmacy_stock_value->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_value_list->RowCnt ?>_view_pharmacy_stock_value_BILLDATE" class="view_pharmacy_stock_value_BILLDATE">
<span<?php echo $view_pharmacy_stock_value->BILLDATE->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_value->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_stock_value_list->ListOptions->render("body", "right", $view_pharmacy_stock_value_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_stock_value->isGridAdd())
		$view_pharmacy_stock_value_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacy_stock_value->RowType = ROWTYPE_AGGREGATE;
$view_pharmacy_stock_value->resetAttributes();
$view_pharmacy_stock_value_list->renderRow();
?>
<?php if ($view_pharmacy_stock_value_list->TotalRecs > 0 && !$view_pharmacy_stock_value->isGridAdd() && !$view_pharmacy_stock_value->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacy_stock_value_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacy_stock_value_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacy_stock_value->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_pharmacy_stock_value->id->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_id" class="view_pharmacy_stock_value_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->DES->Visible) { // DES ?>
		<td data-name="DES" class="<?php echo $view_pharmacy_stock_value->DES->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_DES" class="view_pharmacy_stock_value_DES">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH" class="<?php echo $view_pharmacy_stock_value->BATCH->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_BATCH" class="view_pharmacy_stock_value_BATCH">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_pharmacy_stock_value->PRC->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_PRC" class="view_pharmacy_stock_value_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->OQ->Visible) { // OQ ?>
		<td data-name="OQ" class="<?php echo $view_pharmacy_stock_value->OQ->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_OQ" class="view_pharmacy_stock_value_OQ">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->Stock->Visible) { // Stock ?>
		<td data-name="Stock" class="<?php echo $view_pharmacy_stock_value->Stock->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_Stock" class="view_pharmacy_stock_value_Stock">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->RT->Visible) { // RT ?>
		<td data-name="RT" class="<?php echo $view_pharmacy_stock_value->RT->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_RT" class="view_pharmacy_stock_value_RT">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_stock_value->RT->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->StockValue->Visible) { // StockValue ?>
		<td data-name="StockValue" class="<?php echo $view_pharmacy_stock_value->StockValue->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_StockValue" class="view_pharmacy_stock_value_StockValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_stock_value->StockValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" class="<?php echo $view_pharmacy_stock_value->EXPDT->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_EXPDT" class="view_pharmacy_stock_value_EXPDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" class="<?php echo $view_pharmacy_stock_value->GENNAME->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_GENNAME" class="view_pharmacy_stock_value_GENNAME">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT" class="<?php echo $view_pharmacy_stock_value->UNIT->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_UNIT" class="view_pharmacy_stock_value_UNIT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_pharmacy_stock_value->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_SSGST" class="view_pharmacy_stock_value_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_pharmacy_stock_value->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_SCGST" class="view_pharmacy_stock_value_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_pharmacy_stock_value->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_MFRCODE" class="view_pharmacy_stock_value_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_pharmacy_stock_value->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_BRCODE" class="view_pharmacy_stock_value_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_pharmacy_stock_value->HospID->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_HospID" class="view_pharmacy_stock_value_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE" class="<?php echo $view_pharmacy_stock_value->BILLDATE->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_BILLDATE" class="view_pharmacy_stock_value_BILLDATE">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacy_stock_value_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_stock_value->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_stock_value_list->Recordset)
	$view_pharmacy_stock_value_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_stock_value->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_stock_value->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_stock_value_list->Pager)) $view_pharmacy_stock_value_list->Pager = new NumericPager($view_pharmacy_stock_value_list->StartRec, $view_pharmacy_stock_value_list->DisplayRecs, $view_pharmacy_stock_value_list->TotalRecs, $view_pharmacy_stock_value_list->RecRange, $view_pharmacy_stock_value_list->AutoHidePager) ?>
<?php if ($view_pharmacy_stock_value_list->Pager->RecordCount > 0 && $view_pharmacy_stock_value_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_stock_value_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_stock_value_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_stock_value_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_value_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_value_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_value_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_stock_value_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_stock_value_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_stock_value_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->TotalRecs > 0 && (!$view_pharmacy_stock_value_list->AutoHidePageSizeSelector || $view_pharmacy_stock_value_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_stock_value">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_stock_value_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_stock_value->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_value_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_stock_value_list->TotalRecs == 0 && !$view_pharmacy_stock_value->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_value_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_stock_value_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_stock_value->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_stock_value->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_stock_value", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_stock_value_list->terminate();
?>