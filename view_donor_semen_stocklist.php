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
$view_donor_semen_stock_list = new view_donor_semen_stock_list();

// Run the page
$view_donor_semen_stock_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_semen_stock_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_donor_semen_stocklist = currentForm = new ew.Form("fview_donor_semen_stocklist", "list");
fview_donor_semen_stocklist.formKeyCountName = '<?php echo $view_donor_semen_stock_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_donor_semen_stocklist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_donor_semen_stocklist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_donor_semen_stocklistsrch = currentSearchForm = new ew.Form("fview_donor_semen_stocklistsrch");

// Validate function for search
fview_donor_semen_stocklistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_ReceivedOn");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_semen_stock->ReceivedOn->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_donor_semen_stocklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_donor_semen_stocklistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_donor_semen_stocklistsrch.filterList = <?php echo $view_donor_semen_stock_list->getFilterList() ?>;
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
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_donor_semen_stock_list->TotalRecs > 0 && $view_donor_semen_stock_list->ExportOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->ImportOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->SearchOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->FilterOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_donor_semen_stock_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_donor_semen_stock->isExport() && !$view_donor_semen_stock->CurrentAction) { ?>
<form name="fview_donor_semen_stocklistsrch" id="fview_donor_semen_stocklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_donor_semen_stock_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_donor_semen_stocklistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_donor_semen_stock">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_donor_semen_stock_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_donor_semen_stock->RowType = ROWTYPE_SEARCH;

// Render row
$view_donor_semen_stock->resetAttributes();
$view_donor_semen_stock_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_donor_semen_stock->Agency->Visible) { // Agency ?>
	<div id="xsc_Agency" class="ew-cell form-group">
		<label for="x_Agency" class="ew-search-caption ew-label"><?php echo $view_donor_semen_stock->Agency->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Agency" id="z_Agency" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_donor_semen_stock" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_donor_semen_stock->Agency->getPlaceHolder()) ?>" value="<?php echo $view_donor_semen_stock->Agency->EditValue ?>"<?php echo $view_donor_semen_stock->Agency->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_donor_semen_stock->ReceivedOn->Visible) { // ReceivedOn ?>
	<div id="xsc_ReceivedOn" class="ew-cell form-group">
		<label for="x_ReceivedOn" class="ew-search-caption ew-label"><?php echo $view_donor_semen_stock->ReceivedOn->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ReceivedOn" id="z_ReceivedOn" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_donor_semen_stock" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?php echo HtmlEncode($view_donor_semen_stock->ReceivedOn->getPlaceHolder()) ?>" value="<?php echo $view_donor_semen_stock->ReceivedOn->EditValue ?>"<?php echo $view_donor_semen_stock->ReceivedOn->editAttributes() ?>>
<?php if (!$view_donor_semen_stock->ReceivedOn->ReadOnly && !$view_donor_semen_stock->ReceivedOn->Disabled && !isset($view_donor_semen_stock->ReceivedOn->EditAttrs["readonly"]) && !isset($view_donor_semen_stock->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_donor_semen_stocklistsrch", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_donor_semen_stock->ReceivedBy->Visible) { // ReceivedBy ?>
	<div id="xsc_ReceivedBy" class="ew-cell form-group">
		<label for="x_ReceivedBy" class="ew-search-caption ew-label"><?php echo $view_donor_semen_stock->ReceivedBy->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReceivedBy" id="z_ReceivedBy" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_donor_semen_stock" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_donor_semen_stock->ReceivedBy->getPlaceHolder()) ?>" value="<?php echo $view_donor_semen_stock->ReceivedBy->EditValue ?>"<?php echo $view_donor_semen_stock->ReceivedBy->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_donor_semen_stock_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_donor_semen_stock_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_donor_semen_stock_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_donor_semen_stock_list->showPageHeader(); ?>
<?php
$view_donor_semen_stock_list->showMessage();
?>
<?php if ($view_donor_semen_stock_list->TotalRecs > 0 || $view_donor_semen_stock->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_donor_semen_stock_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_donor_semen_stock">
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_donor_semen_stock->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_donor_semen_stock_list->Pager)) $view_donor_semen_stock_list->Pager = new NumericPager($view_donor_semen_stock_list->StartRec, $view_donor_semen_stock_list->DisplayRecs, $view_donor_semen_stock_list->TotalRecs, $view_donor_semen_stock_list->RecRange, $view_donor_semen_stock_list->AutoHidePager) ?>
<?php if ($view_donor_semen_stock_list->Pager->RecordCount > 0 && $view_donor_semen_stock_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_donor_semen_stock_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_donor_semen_stock_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_donor_semen_stock_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_donor_semen_stock_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_donor_semen_stock_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_donor_semen_stock_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_donor_semen_stock_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_donor_semen_stock_list->TotalRecs > 0 && (!$view_donor_semen_stock_list->AutoHidePageSizeSelector || $view_donor_semen_stock_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_donor_semen_stock">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_donor_semen_stock_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_donor_semen_stock_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_donor_semen_stock_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_donor_semen_stock_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_donor_semen_stock_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_donor_semen_stock_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_donor_semen_stock->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_semen_stock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_donor_semen_stocklist" id="fview_donor_semen_stocklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_donor_semen_stock_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_donor_semen_stock_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_semen_stock">
<div id="gmp_view_donor_semen_stock" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_donor_semen_stock_list->TotalRecs > 0 || $view_donor_semen_stock->isGridEdit()) { ?>
<table id="tbl_view_donor_semen_stocklist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_donor_semen_stock_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_donor_semen_stock_list->renderListOptions();

// Render list options (header, left)
$view_donor_semen_stock_list->ListOptions->render("header", "left");
?>
<?php if ($view_donor_semen_stock->Agency->Visible) { // Agency ?>
	<?php if ($view_donor_semen_stock->sortUrl($view_donor_semen_stock->Agency) == "") { ?>
		<th data-name="Agency" class="<?php echo $view_donor_semen_stock->Agency->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_Agency" class="view_donor_semen_stock_Agency"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock->Agency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Agency" class="<?php echo $view_donor_semen_stock->Agency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_semen_stock->SortUrl($view_donor_semen_stock->Agency) ?>',1);"><div id="elh_view_donor_semen_stock_Agency" class="view_donor_semen_stock_Agency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock->Agency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock->Agency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_semen_stock->Agency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock->ReceivedOn->Visible) { // ReceivedOn ?>
	<?php if ($view_donor_semen_stock->sortUrl($view_donor_semen_stock->ReceivedOn) == "") { ?>
		<th data-name="ReceivedOn" class="<?php echo $view_donor_semen_stock->ReceivedOn->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_ReceivedOn" class="view_donor_semen_stock_ReceivedOn"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock->ReceivedOn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedOn" class="<?php echo $view_donor_semen_stock->ReceivedOn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_semen_stock->SortUrl($view_donor_semen_stock->ReceivedOn) ?>',1);"><div id="elh_view_donor_semen_stock_ReceivedOn" class="view_donor_semen_stock_ReceivedOn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock->ReceivedOn->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock->ReceivedOn->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_semen_stock->ReceivedOn->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock->ReceivedBy->Visible) { // ReceivedBy ?>
	<?php if ($view_donor_semen_stock->sortUrl($view_donor_semen_stock->ReceivedBy) == "") { ?>
		<th data-name="ReceivedBy" class="<?php echo $view_donor_semen_stock->ReceivedBy->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_ReceivedBy" class="view_donor_semen_stock_ReceivedBy"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock->ReceivedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedBy" class="<?php echo $view_donor_semen_stock->ReceivedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_semen_stock->SortUrl($view_donor_semen_stock->ReceivedBy) ?>',1);"><div id="elh_view_donor_semen_stock_ReceivedBy" class="view_donor_semen_stock_ReceivedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock->ReceivedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock->ReceivedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_semen_stock->ReceivedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock->TotalCount->Visible) { // TotalCount ?>
	<?php if ($view_donor_semen_stock->sortUrl($view_donor_semen_stock->TotalCount) == "") { ?>
		<th data-name="TotalCount" class="<?php echo $view_donor_semen_stock->TotalCount->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_TotalCount" class="view_donor_semen_stock_TotalCount"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock->TotalCount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCount" class="<?php echo $view_donor_semen_stock->TotalCount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_semen_stock->SortUrl($view_donor_semen_stock->TotalCount) ?>',1);"><div id="elh_view_donor_semen_stock_TotalCount" class="view_donor_semen_stock_TotalCount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock->TotalCount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock->TotalCount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_semen_stock->TotalCount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock->Remaining->Visible) { // Remaining ?>
	<?php if ($view_donor_semen_stock->sortUrl($view_donor_semen_stock->Remaining) == "") { ?>
		<th data-name="Remaining" class="<?php echo $view_donor_semen_stock->Remaining->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_Remaining" class="view_donor_semen_stock_Remaining"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock->Remaining->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remaining" class="<?php echo $view_donor_semen_stock->Remaining->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_semen_stock->SortUrl($view_donor_semen_stock->Remaining) ?>',1);"><div id="elh_view_donor_semen_stock_Remaining" class="view_donor_semen_stock_Remaining">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock->Remaining->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock->Remaining->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_semen_stock->Remaining->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_donor_semen_stock_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_donor_semen_stock->ExportAll && $view_donor_semen_stock->isExport()) {
	$view_donor_semen_stock_list->StopRec = $view_donor_semen_stock_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_donor_semen_stock_list->TotalRecs > $view_donor_semen_stock_list->StartRec + $view_donor_semen_stock_list->DisplayRecs - 1)
		$view_donor_semen_stock_list->StopRec = $view_donor_semen_stock_list->StartRec + $view_donor_semen_stock_list->DisplayRecs - 1;
	else
		$view_donor_semen_stock_list->StopRec = $view_donor_semen_stock_list->TotalRecs;
}
$view_donor_semen_stock_list->RecCnt = $view_donor_semen_stock_list->StartRec - 1;
if ($view_donor_semen_stock_list->Recordset && !$view_donor_semen_stock_list->Recordset->EOF) {
	$view_donor_semen_stock_list->Recordset->moveFirst();
	$selectLimit = $view_donor_semen_stock_list->UseSelectLimit;
	if (!$selectLimit && $view_donor_semen_stock_list->StartRec > 1)
		$view_donor_semen_stock_list->Recordset->move($view_donor_semen_stock_list->StartRec - 1);
} elseif (!$view_donor_semen_stock->AllowAddDeleteRow && $view_donor_semen_stock_list->StopRec == 0) {
	$view_donor_semen_stock_list->StopRec = $view_donor_semen_stock->GridAddRowCount;
}

// Initialize aggregate
$view_donor_semen_stock->RowType = ROWTYPE_AGGREGATEINIT;
$view_donor_semen_stock->resetAttributes();
$view_donor_semen_stock_list->renderRow();
while ($view_donor_semen_stock_list->RecCnt < $view_donor_semen_stock_list->StopRec) {
	$view_donor_semen_stock_list->RecCnt++;
	if ($view_donor_semen_stock_list->RecCnt >= $view_donor_semen_stock_list->StartRec) {
		$view_donor_semen_stock_list->RowCnt++;

		// Set up key count
		$view_donor_semen_stock_list->KeyCount = $view_donor_semen_stock_list->RowIndex;

		// Init row class and style
		$view_donor_semen_stock->resetAttributes();
		$view_donor_semen_stock->CssClass = "";
		if ($view_donor_semen_stock->isGridAdd()) {
		} else {
			$view_donor_semen_stock_list->loadRowValues($view_donor_semen_stock_list->Recordset); // Load row values
		}
		$view_donor_semen_stock->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_donor_semen_stock->RowAttrs = array_merge($view_donor_semen_stock->RowAttrs, array('data-rowindex'=>$view_donor_semen_stock_list->RowCnt, 'id'=>'r' . $view_donor_semen_stock_list->RowCnt . '_view_donor_semen_stock', 'data-rowtype'=>$view_donor_semen_stock->RowType));

		// Render row
		$view_donor_semen_stock_list->renderRow();

		// Render list options
		$view_donor_semen_stock_list->renderListOptions();
?>
	<tr<?php echo $view_donor_semen_stock->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_donor_semen_stock_list->ListOptions->render("body", "left", $view_donor_semen_stock_list->RowCnt);
?>
	<?php if ($view_donor_semen_stock->Agency->Visible) { // Agency ?>
		<td data-name="Agency"<?php echo $view_donor_semen_stock->Agency->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCnt ?>_view_donor_semen_stock_Agency" class="view_donor_semen_stock_Agency">
<span<?php echo $view_donor_semen_stock->Agency->viewAttributes() ?>>
<?php echo $view_donor_semen_stock->Agency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock->ReceivedOn->Visible) { // ReceivedOn ?>
		<td data-name="ReceivedOn"<?php echo $view_donor_semen_stock->ReceivedOn->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCnt ?>_view_donor_semen_stock_ReceivedOn" class="view_donor_semen_stock_ReceivedOn">
<span<?php echo $view_donor_semen_stock->ReceivedOn->viewAttributes() ?>>
<?php echo $view_donor_semen_stock->ReceivedOn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock->ReceivedBy->Visible) { // ReceivedBy ?>
		<td data-name="ReceivedBy"<?php echo $view_donor_semen_stock->ReceivedBy->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCnt ?>_view_donor_semen_stock_ReceivedBy" class="view_donor_semen_stock_ReceivedBy">
<span<?php echo $view_donor_semen_stock->ReceivedBy->viewAttributes() ?>>
<?php echo $view_donor_semen_stock->ReceivedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock->TotalCount->Visible) { // TotalCount ?>
		<td data-name="TotalCount"<?php echo $view_donor_semen_stock->TotalCount->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCnt ?>_view_donor_semen_stock_TotalCount" class="view_donor_semen_stock_TotalCount">
<span<?php echo $view_donor_semen_stock->TotalCount->viewAttributes() ?>>
<?php echo $view_donor_semen_stock->TotalCount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock->Remaining->Visible) { // Remaining ?>
		<td data-name="Remaining"<?php echo $view_donor_semen_stock->Remaining->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCnt ?>_view_donor_semen_stock_Remaining" class="view_donor_semen_stock_Remaining">
<span<?php echo $view_donor_semen_stock->Remaining->viewAttributes() ?>>
<?php echo $view_donor_semen_stock->Remaining->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_donor_semen_stock_list->ListOptions->render("body", "right", $view_donor_semen_stock_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_donor_semen_stock->isGridAdd())
		$view_donor_semen_stock_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_donor_semen_stock->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_donor_semen_stock_list->Recordset)
	$view_donor_semen_stock_list->Recordset->Close();
?>
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_donor_semen_stock->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_donor_semen_stock_list->Pager)) $view_donor_semen_stock_list->Pager = new NumericPager($view_donor_semen_stock_list->StartRec, $view_donor_semen_stock_list->DisplayRecs, $view_donor_semen_stock_list->TotalRecs, $view_donor_semen_stock_list->RecRange, $view_donor_semen_stock_list->AutoHidePager) ?>
<?php if ($view_donor_semen_stock_list->Pager->RecordCount > 0 && $view_donor_semen_stock_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_donor_semen_stock_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_donor_semen_stock_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_donor_semen_stock_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_semen_stock_list->pageUrl() ?>start=<?php echo $view_donor_semen_stock_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_donor_semen_stock_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_donor_semen_stock_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_donor_semen_stock_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_donor_semen_stock_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_donor_semen_stock_list->TotalRecs > 0 && (!$view_donor_semen_stock_list->AutoHidePageSizeSelector || $view_donor_semen_stock_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_donor_semen_stock">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_donor_semen_stock_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_donor_semen_stock_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_donor_semen_stock_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_donor_semen_stock_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_donor_semen_stock_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_donor_semen_stock_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_donor_semen_stock->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_semen_stock_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_donor_semen_stock_list->TotalRecs == 0 && !$view_donor_semen_stock->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_donor_semen_stock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_donor_semen_stock_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_donor_semen_stock", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_donor_semen_stock_list->terminate();
?>