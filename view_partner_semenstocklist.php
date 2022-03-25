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
$view_partner_semenstock_list = new view_partner_semenstock_list();

// Run the page
$view_partner_semenstock_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_partner_semenstock_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_partner_semenstock->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_partner_semenstocklist = currentForm = new ew.Form("fview_partner_semenstocklist", "list");
fview_partner_semenstocklist.formKeyCountName = '<?php echo $view_partner_semenstock_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_partner_semenstocklist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_partner_semenstocklist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_partner_semenstocklistsrch = currentSearchForm = new ew.Form("fview_partner_semenstocklistsrch");

// Validate function for search
fview_partner_semenstocklistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_partner_semenstocklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_partner_semenstocklistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_partner_semenstocklistsrch.filterList = <?php echo $view_partner_semenstock_list->getFilterList() ?>;
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
<?php if (!$view_partner_semenstock->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_partner_semenstock_list->TotalRecs > 0 && $view_partner_semenstock_list->ExportOptions->visible()) { ?>
<?php $view_partner_semenstock_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->ImportOptions->visible()) { ?>
<?php $view_partner_semenstock_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->SearchOptions->visible()) { ?>
<?php $view_partner_semenstock_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->FilterOptions->visible()) { ?>
<?php $view_partner_semenstock_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_partner_semenstock_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_partner_semenstock->isExport() && !$view_partner_semenstock->CurrentAction) { ?>
<form name="fview_partner_semenstocklistsrch" id="fview_partner_semenstocklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_partner_semenstock_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_partner_semenstocklistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_partner_semenstock">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_partner_semenstock_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_partner_semenstock->RowType = ROWTYPE_SEARCH;

// Render row
$view_partner_semenstock->resetAttributes();
$view_partner_semenstock_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_partner_semenstock->RIDNo->Visible) { // RIDNo ?>
	<div id="xsc_RIDNo" class="ew-cell form-group">
		<label for="x_RIDNo" class="ew-search-caption ew-label"><?php echo $view_partner_semenstock->RIDNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNo" id="z_RIDNo" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_partner_semenstock" data-field="x_RIDNo" data-value-separator="<?php echo $view_partner_semenstock->RIDNo->displayValueSeparatorAttribute() ?>" id="x_RIDNo" name="x_RIDNo"<?php echo $view_partner_semenstock->RIDNo->editAttributes() ?>>
		<?php echo $view_partner_semenstock->RIDNo->selectOptionListHtml("x_RIDNo") ?>
	</select>
</div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_partner_semenstock->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_partner_semenstock->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_partner_semenstock" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_partner_semenstock->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_partner_semenstock->PatientName->EditValue ?>"<?php echo $view_partner_semenstock->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_partner_semenstock->HusbandName->Visible) { // HusbandName ?>
	<div id="xsc_HusbandName" class="ew-cell form-group">
		<label for="x_HusbandName" class="ew-search-caption ew-label"><?php echo $view_partner_semenstock->HusbandName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_partner_semenstock" data-field="x_HusbandName" name="x_HusbandName" id="x_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_partner_semenstock->HusbandName->getPlaceHolder()) ?>" value="<?php echo $view_partner_semenstock->HusbandName->EditValue ?>"<?php echo $view_partner_semenstock->HusbandName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_partner_semenstock_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_partner_semenstock_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_partner_semenstock_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_partner_semenstock_list->showPageHeader(); ?>
<?php
$view_partner_semenstock_list->showMessage();
?>
<?php if ($view_partner_semenstock_list->TotalRecs > 0 || $view_partner_semenstock->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_partner_semenstock_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_partner_semenstock">
<?php if (!$view_partner_semenstock->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_partner_semenstock->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_partner_semenstock_list->Pager)) $view_partner_semenstock_list->Pager = new NumericPager($view_partner_semenstock_list->StartRec, $view_partner_semenstock_list->DisplayRecs, $view_partner_semenstock_list->TotalRecs, $view_partner_semenstock_list->RecRange, $view_partner_semenstock_list->AutoHidePager) ?>
<?php if ($view_partner_semenstock_list->Pager->RecordCount > 0 && $view_partner_semenstock_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_partner_semenstock_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_partner_semenstock_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_partner_semenstock_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_partner_semenstock_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_partner_semenstock_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_partner_semenstock_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_partner_semenstock_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_partner_semenstock_list->TotalRecs > 0 && (!$view_partner_semenstock_list->AutoHidePageSizeSelector || $view_partner_semenstock_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_partner_semenstock">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_partner_semenstock_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_partner_semenstock_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_partner_semenstock_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_partner_semenstock_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_partner_semenstock_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_partner_semenstock_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_partner_semenstock->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_partner_semenstock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_partner_semenstocklist" id="fview_partner_semenstocklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_partner_semenstock_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_partner_semenstock_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_partner_semenstock">
<div id="gmp_view_partner_semenstock" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_partner_semenstock_list->TotalRecs > 0 || $view_partner_semenstock->isGridEdit()) { ?>
<table id="tbl_view_partner_semenstocklist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_partner_semenstock_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_partner_semenstock_list->renderListOptions();

// Render list options (header, left)
$view_partner_semenstock_list->ListOptions->render("header", "left");
?>
<?php if ($view_partner_semenstock->RIDNo->Visible) { // RIDNo ?>
	<?php if ($view_partner_semenstock->sortUrl($view_partner_semenstock->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $view_partner_semenstock->RIDNo->headerCellClass() ?>"><div id="elh_view_partner_semenstock_RIDNo" class="view_partner_semenstock_RIDNo"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $view_partner_semenstock->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_partner_semenstock->SortUrl($view_partner_semenstock->RIDNo) ?>',1);"><div id="elh_view_partner_semenstock_RIDNo" class="view_partner_semenstock_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_partner_semenstock->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock->PatientName->Visible) { // PatientName ?>
	<?php if ($view_partner_semenstock->sortUrl($view_partner_semenstock->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_partner_semenstock->PatientName->headerCellClass() ?>"><div id="elh_view_partner_semenstock_PatientName" class="view_partner_semenstock_PatientName"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_partner_semenstock->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_partner_semenstock->SortUrl($view_partner_semenstock->PatientName) ?>',1);"><div id="elh_view_partner_semenstock_PatientName" class="view_partner_semenstock_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_partner_semenstock->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock->HusbandName->Visible) { // HusbandName ?>
	<?php if ($view_partner_semenstock->sortUrl($view_partner_semenstock->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $view_partner_semenstock->HusbandName->headerCellClass() ?>"><div id="elh_view_partner_semenstock_HusbandName" class="view_partner_semenstock_HusbandName"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $view_partner_semenstock->HusbandName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_partner_semenstock->SortUrl($view_partner_semenstock->HusbandName) ?>',1);"><div id="elh_view_partner_semenstock_HusbandName" class="view_partner_semenstock_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock->HusbandName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock->HusbandName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_partner_semenstock->HusbandName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock->RequestDr->Visible) { // RequestDr ?>
	<?php if ($view_partner_semenstock->sortUrl($view_partner_semenstock->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $view_partner_semenstock->RequestDr->headerCellClass() ?>"><div id="elh_view_partner_semenstock_RequestDr" class="view_partner_semenstock_RequestDr"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $view_partner_semenstock->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_partner_semenstock->SortUrl($view_partner_semenstock->RequestDr) ?>',1);"><div id="elh_view_partner_semenstock_RequestDr" class="view_partner_semenstock_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock->RequestDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_partner_semenstock->RequestDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock->stock->Visible) { // stock ?>
	<?php if ($view_partner_semenstock->sortUrl($view_partner_semenstock->stock) == "") { ?>
		<th data-name="stock" class="<?php echo $view_partner_semenstock->stock->headerCellClass() ?>"><div id="elh_view_partner_semenstock_stock" class="view_partner_semenstock_stock"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock->stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stock" class="<?php echo $view_partner_semenstock->stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_partner_semenstock->SortUrl($view_partner_semenstock->stock) ?>',1);"><div id="elh_view_partner_semenstock_stock" class="view_partner_semenstock_stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock->stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock->stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_partner_semenstock->stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_partner_semenstock_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_partner_semenstock->ExportAll && $view_partner_semenstock->isExport()) {
	$view_partner_semenstock_list->StopRec = $view_partner_semenstock_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_partner_semenstock_list->TotalRecs > $view_partner_semenstock_list->StartRec + $view_partner_semenstock_list->DisplayRecs - 1)
		$view_partner_semenstock_list->StopRec = $view_partner_semenstock_list->StartRec + $view_partner_semenstock_list->DisplayRecs - 1;
	else
		$view_partner_semenstock_list->StopRec = $view_partner_semenstock_list->TotalRecs;
}
$view_partner_semenstock_list->RecCnt = $view_partner_semenstock_list->StartRec - 1;
if ($view_partner_semenstock_list->Recordset && !$view_partner_semenstock_list->Recordset->EOF) {
	$view_partner_semenstock_list->Recordset->moveFirst();
	$selectLimit = $view_partner_semenstock_list->UseSelectLimit;
	if (!$selectLimit && $view_partner_semenstock_list->StartRec > 1)
		$view_partner_semenstock_list->Recordset->move($view_partner_semenstock_list->StartRec - 1);
} elseif (!$view_partner_semenstock->AllowAddDeleteRow && $view_partner_semenstock_list->StopRec == 0) {
	$view_partner_semenstock_list->StopRec = $view_partner_semenstock->GridAddRowCount;
}

// Initialize aggregate
$view_partner_semenstock->RowType = ROWTYPE_AGGREGATEINIT;
$view_partner_semenstock->resetAttributes();
$view_partner_semenstock_list->renderRow();
while ($view_partner_semenstock_list->RecCnt < $view_partner_semenstock_list->StopRec) {
	$view_partner_semenstock_list->RecCnt++;
	if ($view_partner_semenstock_list->RecCnt >= $view_partner_semenstock_list->StartRec) {
		$view_partner_semenstock_list->RowCnt++;

		// Set up key count
		$view_partner_semenstock_list->KeyCount = $view_partner_semenstock_list->RowIndex;

		// Init row class and style
		$view_partner_semenstock->resetAttributes();
		$view_partner_semenstock->CssClass = "";
		if ($view_partner_semenstock->isGridAdd()) {
		} else {
			$view_partner_semenstock_list->loadRowValues($view_partner_semenstock_list->Recordset); // Load row values
		}
		$view_partner_semenstock->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_partner_semenstock->RowAttrs = array_merge($view_partner_semenstock->RowAttrs, array('data-rowindex'=>$view_partner_semenstock_list->RowCnt, 'id'=>'r' . $view_partner_semenstock_list->RowCnt . '_view_partner_semenstock', 'data-rowtype'=>$view_partner_semenstock->RowType));

		// Render row
		$view_partner_semenstock_list->renderRow();

		// Render list options
		$view_partner_semenstock_list->renderListOptions();
?>
	<tr<?php echo $view_partner_semenstock->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_partner_semenstock_list->ListOptions->render("body", "left", $view_partner_semenstock_list->RowCnt);
?>
	<?php if ($view_partner_semenstock->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $view_partner_semenstock->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCnt ?>_view_partner_semenstock_RIDNo" class="view_partner_semenstock_RIDNo">
<span<?php echo $view_partner_semenstock->RIDNo->viewAttributes() ?>>
<?php echo $view_partner_semenstock->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_partner_semenstock->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCnt ?>_view_partner_semenstock_PatientName" class="view_partner_semenstock_PatientName">
<span<?php echo $view_partner_semenstock->PatientName->viewAttributes() ?>>
<?php echo $view_partner_semenstock->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName"<?php echo $view_partner_semenstock->HusbandName->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCnt ?>_view_partner_semenstock_HusbandName" class="view_partner_semenstock_HusbandName">
<span<?php echo $view_partner_semenstock->HusbandName->viewAttributes() ?>>
<?php echo $view_partner_semenstock->HusbandName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr"<?php echo $view_partner_semenstock->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCnt ?>_view_partner_semenstock_RequestDr" class="view_partner_semenstock_RequestDr">
<span<?php echo $view_partner_semenstock->RequestDr->viewAttributes() ?>>
<?php echo $view_partner_semenstock->RequestDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock->stock->Visible) { // stock ?>
		<td data-name="stock"<?php echo $view_partner_semenstock->stock->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCnt ?>_view_partner_semenstock_stock" class="view_partner_semenstock_stock">
<span<?php echo $view_partner_semenstock->stock->viewAttributes() ?>>
<?php echo $view_partner_semenstock->stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_partner_semenstock_list->ListOptions->render("body", "right", $view_partner_semenstock_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_partner_semenstock->isGridAdd())
		$view_partner_semenstock_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_partner_semenstock->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_partner_semenstock_list->Recordset)
	$view_partner_semenstock_list->Recordset->Close();
?>
<?php if (!$view_partner_semenstock->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_partner_semenstock->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_partner_semenstock_list->Pager)) $view_partner_semenstock_list->Pager = new NumericPager($view_partner_semenstock_list->StartRec, $view_partner_semenstock_list->DisplayRecs, $view_partner_semenstock_list->TotalRecs, $view_partner_semenstock_list->RecRange, $view_partner_semenstock_list->AutoHidePager) ?>
<?php if ($view_partner_semenstock_list->Pager->RecordCount > 0 && $view_partner_semenstock_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_partner_semenstock_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_partner_semenstock_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_partner_semenstock_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_partner_semenstock_list->pageUrl() ?>start=<?php echo $view_partner_semenstock_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_partner_semenstock_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_partner_semenstock_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_partner_semenstock_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_partner_semenstock_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_partner_semenstock_list->TotalRecs > 0 && (!$view_partner_semenstock_list->AutoHidePageSizeSelector || $view_partner_semenstock_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_partner_semenstock">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_partner_semenstock_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_partner_semenstock_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_partner_semenstock_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_partner_semenstock_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_partner_semenstock_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_partner_semenstock_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_partner_semenstock->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_partner_semenstock_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_partner_semenstock_list->TotalRecs == 0 && !$view_partner_semenstock->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_partner_semenstock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_partner_semenstock_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_partner_semenstock->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_partner_semenstock->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_partner_semenstock", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_partner_semenstock_list->terminate();
?>