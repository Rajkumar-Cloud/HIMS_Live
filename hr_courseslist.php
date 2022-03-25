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
$hr_courses_list = new hr_courses_list();

// Run the page
$hr_courses_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_courses_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_courses->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_courseslist = currentForm = new ew.Form("fhr_courseslist", "list");
fhr_courseslist.formKeyCountName = '<?php echo $hr_courses_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_courseslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_courseslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_courseslist.lists["x_paymentType"] = <?php echo $hr_courses_list->paymentType->Lookup->toClientList() ?>;
fhr_courseslist.lists["x_paymentType"].options = <?php echo JsonEncode($hr_courses_list->paymentType->options(FALSE, TRUE)) ?>;
fhr_courseslist.lists["x_status"] = <?php echo $hr_courses_list->status->Lookup->toClientList() ?>;
fhr_courseslist.lists["x_status"].options = <?php echo JsonEncode($hr_courses_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_courseslistsrch = currentSearchForm = new ew.Form("fhr_courseslistsrch");

// Validate function for search
fhr_courseslistsrch.validate = function(fobj) {
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
fhr_courseslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_courseslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_courseslistsrch.lists["x_paymentType"] = <?php echo $hr_courses_list->paymentType->Lookup->toClientList() ?>;
fhr_courseslistsrch.lists["x_paymentType"].options = <?php echo JsonEncode($hr_courses_list->paymentType->options(FALSE, TRUE)) ?>;
fhr_courseslistsrch.lists["x_status"] = <?php echo $hr_courses_list->status->Lookup->toClientList() ?>;
fhr_courseslistsrch.lists["x_status"].options = <?php echo JsonEncode($hr_courses_list->status->options(FALSE, TRUE)) ?>;

// Filters
fhr_courseslistsrch.filterList = <?php echo $hr_courses_list->getFilterList() ?>;
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
<?php if (!$hr_courses->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_courses_list->TotalRecs > 0 && $hr_courses_list->ExportOptions->visible()) { ?>
<?php $hr_courses_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_courses_list->ImportOptions->visible()) { ?>
<?php $hr_courses_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_courses_list->SearchOptions->visible()) { ?>
<?php $hr_courses_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_courses_list->FilterOptions->visible()) { ?>
<?php $hr_courses_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_courses_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_courses->isExport() && !$hr_courses->CurrentAction) { ?>
<form name="fhr_courseslistsrch" id="fhr_courseslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_courses_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_courseslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_courses">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_courses_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_courses->RowType = ROWTYPE_SEARCH;

// Render row
$hr_courses->resetAttributes();
$hr_courses_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
	<div id="xsc_paymentType" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_courses->paymentType->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_paymentType" id="z_paymentType" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_paymentType" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_courses" data-field="x_paymentType" data-value-separator="<?php echo $hr_courses->paymentType->displayValueSeparatorAttribute() ?>" name="x_paymentType" id="x_paymentType" value="{value}"<?php echo $hr_courses->paymentType->editAttributes() ?>></div>
<div id="dsl_x_paymentType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_courses->paymentType->radioButtonListHtml(FALSE, "x_paymentType") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($hr_courses->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_courses->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_courses" data-field="x_status" data-value-separator="<?php echo $hr_courses->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_courses->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_courses->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_courses_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_courses_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_courses_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_courses_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_courses_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_courses_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_courses_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_courses_list->showPageHeader(); ?>
<?php
$hr_courses_list->showMessage();
?>
<?php if ($hr_courses_list->TotalRecs > 0 || $hr_courses->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_courses_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_courses">
<?php if (!$hr_courses->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_courses->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_courses_list->Pager)) $hr_courses_list->Pager = new NumericPager($hr_courses_list->StartRec, $hr_courses_list->DisplayRecs, $hr_courses_list->TotalRecs, $hr_courses_list->RecRange, $hr_courses_list->AutoHidePager) ?>
<?php if ($hr_courses_list->Pager->RecordCount > 0 && $hr_courses_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_courses_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_courses_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_courses_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_courses_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_courses_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_courses_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_courses_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_courses_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_courses_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_courses_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_courses_list->TotalRecs > 0 && (!$hr_courses_list->AutoHidePageSizeSelector || $hr_courses_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_courses">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_courses_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_courses_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_courses_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_courses_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_courses_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_courses_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_courses->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_courses_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_courseslist" id="fhr_courseslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_courses_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_courses_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
<div id="gmp_hr_courses" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_courses_list->TotalRecs > 0 || $hr_courses->isGridEdit()) { ?>
<table id="tbl_hr_courseslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_courses_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_courses_list->renderListOptions();

// Render list options (header, left)
$hr_courses_list->ListOptions->render("header", "left");
?>
<?php if ($hr_courses->id->Visible) { // id ?>
	<?php if ($hr_courses->sortUrl($hr_courses->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_courses->id->headerCellClass() ?>"><div id="elh_hr_courses_id" class="hr_courses_id"><div class="ew-table-header-caption"><?php echo $hr_courses->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_courses->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->id) ?>',1);"><div id="elh_hr_courses_id" class="hr_courses_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->coordinator->Visible) { // coordinator ?>
	<?php if ($hr_courses->sortUrl($hr_courses->coordinator) == "") { ?>
		<th data-name="coordinator" class="<?php echo $hr_courses->coordinator->headerCellClass() ?>"><div id="elh_hr_courses_coordinator" class="hr_courses_coordinator"><div class="ew-table-header-caption"><?php echo $hr_courses->coordinator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="coordinator" class="<?php echo $hr_courses->coordinator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->coordinator) ?>',1);"><div id="elh_hr_courses_coordinator" class="hr_courses_coordinator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->coordinator->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->coordinator->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->coordinator->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
	<?php if ($hr_courses->sortUrl($hr_courses->paymentType) == "") { ?>
		<th data-name="paymentType" class="<?php echo $hr_courses->paymentType->headerCellClass() ?>"><div id="elh_hr_courses_paymentType" class="hr_courses_paymentType"><div class="ew-table-header-caption"><?php echo $hr_courses->paymentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paymentType" class="<?php echo $hr_courses->paymentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->paymentType) ?>',1);"><div id="elh_hr_courses_paymentType" class="hr_courses_paymentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->paymentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->paymentType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->paymentType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->currency->Visible) { // currency ?>
	<?php if ($hr_courses->sortUrl($hr_courses->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $hr_courses->currency->headerCellClass() ?>"><div id="elh_hr_courses_currency" class="hr_courses_currency"><div class="ew-table-header-caption"><?php echo $hr_courses->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $hr_courses->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->currency) ?>',1);"><div id="elh_hr_courses_currency" class="hr_courses_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->cost->Visible) { // cost ?>
	<?php if ($hr_courses->sortUrl($hr_courses->cost) == "") { ?>
		<th data-name="cost" class="<?php echo $hr_courses->cost->headerCellClass() ?>"><div id="elh_hr_courses_cost" class="hr_courses_cost"><div class="ew-table-header-caption"><?php echo $hr_courses->cost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cost" class="<?php echo $hr_courses->cost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->cost) ?>',1);"><div id="elh_hr_courses_cost" class="hr_courses_cost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->cost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->cost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->status->Visible) { // status ?>
	<?php if ($hr_courses->sortUrl($hr_courses->status) == "") { ?>
		<th data-name="status" class="<?php echo $hr_courses->status->headerCellClass() ?>"><div id="elh_hr_courses_status" class="hr_courses_status"><div class="ew-table-header-caption"><?php echo $hr_courses->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hr_courses->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->status) ?>',1);"><div id="elh_hr_courses_status" class="hr_courses_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->created->Visible) { // created ?>
	<?php if ($hr_courses->sortUrl($hr_courses->created) == "") { ?>
		<th data-name="created" class="<?php echo $hr_courses->created->headerCellClass() ?>"><div id="elh_hr_courses_created" class="hr_courses_created"><div class="ew-table-header-caption"><?php echo $hr_courses->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $hr_courses->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->created) ?>',1);"><div id="elh_hr_courses_created" class="hr_courses_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_courses->updated->Visible) { // updated ?>
	<?php if ($hr_courses->sortUrl($hr_courses->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $hr_courses->updated->headerCellClass() ?>"><div id="elh_hr_courses_updated" class="hr_courses_updated"><div class="ew-table-header-caption"><?php echo $hr_courses->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $hr_courses->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_courses->SortUrl($hr_courses->updated) ?>',1);"><div id="elh_hr_courses_updated" class="hr_courses_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_courses->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_courses->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_courses->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_courses_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_courses->ExportAll && $hr_courses->isExport()) {
	$hr_courses_list->StopRec = $hr_courses_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_courses_list->TotalRecs > $hr_courses_list->StartRec + $hr_courses_list->DisplayRecs - 1)
		$hr_courses_list->StopRec = $hr_courses_list->StartRec + $hr_courses_list->DisplayRecs - 1;
	else
		$hr_courses_list->StopRec = $hr_courses_list->TotalRecs;
}
$hr_courses_list->RecCnt = $hr_courses_list->StartRec - 1;
if ($hr_courses_list->Recordset && !$hr_courses_list->Recordset->EOF) {
	$hr_courses_list->Recordset->moveFirst();
	$selectLimit = $hr_courses_list->UseSelectLimit;
	if (!$selectLimit && $hr_courses_list->StartRec > 1)
		$hr_courses_list->Recordset->move($hr_courses_list->StartRec - 1);
} elseif (!$hr_courses->AllowAddDeleteRow && $hr_courses_list->StopRec == 0) {
	$hr_courses_list->StopRec = $hr_courses->GridAddRowCount;
}

// Initialize aggregate
$hr_courses->RowType = ROWTYPE_AGGREGATEINIT;
$hr_courses->resetAttributes();
$hr_courses_list->renderRow();
while ($hr_courses_list->RecCnt < $hr_courses_list->StopRec) {
	$hr_courses_list->RecCnt++;
	if ($hr_courses_list->RecCnt >= $hr_courses_list->StartRec) {
		$hr_courses_list->RowCnt++;

		// Set up key count
		$hr_courses_list->KeyCount = $hr_courses_list->RowIndex;

		// Init row class and style
		$hr_courses->resetAttributes();
		$hr_courses->CssClass = "";
		if ($hr_courses->isGridAdd()) {
		} else {
			$hr_courses_list->loadRowValues($hr_courses_list->Recordset); // Load row values
		}
		$hr_courses->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_courses->RowAttrs = array_merge($hr_courses->RowAttrs, array('data-rowindex'=>$hr_courses_list->RowCnt, 'id'=>'r' . $hr_courses_list->RowCnt . '_hr_courses', 'data-rowtype'=>$hr_courses->RowType));

		// Render row
		$hr_courses_list->renderRow();

		// Render list options
		$hr_courses_list->renderListOptions();
?>
	<tr<?php echo $hr_courses->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_courses_list->ListOptions->render("body", "left", $hr_courses_list->RowCnt);
?>
	<?php if ($hr_courses->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_courses->id->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_id" class="hr_courses_id">
<span<?php echo $hr_courses->id->viewAttributes() ?>>
<?php echo $hr_courses->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->coordinator->Visible) { // coordinator ?>
		<td data-name="coordinator"<?php echo $hr_courses->coordinator->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_coordinator" class="hr_courses_coordinator">
<span<?php echo $hr_courses->coordinator->viewAttributes() ?>>
<?php echo $hr_courses->coordinator->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType"<?php echo $hr_courses->paymentType->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_paymentType" class="hr_courses_paymentType">
<span<?php echo $hr_courses->paymentType->viewAttributes() ?>>
<?php echo $hr_courses->paymentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $hr_courses->currency->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_currency" class="hr_courses_currency">
<span<?php echo $hr_courses->currency->viewAttributes() ?>>
<?php echo $hr_courses->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->cost->Visible) { // cost ?>
		<td data-name="cost"<?php echo $hr_courses->cost->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_cost" class="hr_courses_cost">
<span<?php echo $hr_courses->cost->viewAttributes() ?>>
<?php echo $hr_courses->cost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hr_courses->status->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_status" class="hr_courses_status">
<span<?php echo $hr_courses->status->viewAttributes() ?>>
<?php echo $hr_courses->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->created->Visible) { // created ?>
		<td data-name="created"<?php echo $hr_courses->created->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_created" class="hr_courses_created">
<span<?php echo $hr_courses->created->viewAttributes() ?>>
<?php echo $hr_courses->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_courses->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $hr_courses->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_list->RowCnt ?>_hr_courses_updated" class="hr_courses_updated">
<span<?php echo $hr_courses->updated->viewAttributes() ?>>
<?php echo $hr_courses->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_courses_list->ListOptions->render("body", "right", $hr_courses_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_courses->isGridAdd())
		$hr_courses_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_courses->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_courses_list->Recordset)
	$hr_courses_list->Recordset->Close();
?>
<?php if (!$hr_courses->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_courses->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_courses_list->Pager)) $hr_courses_list->Pager = new NumericPager($hr_courses_list->StartRec, $hr_courses_list->DisplayRecs, $hr_courses_list->TotalRecs, $hr_courses_list->RecRange, $hr_courses_list->AutoHidePager) ?>
<?php if ($hr_courses_list->Pager->RecordCount > 0 && $hr_courses_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_courses_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_courses_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_courses_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_courses_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_courses_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_courses_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_courses_list->pageUrl() ?>start=<?php echo $hr_courses_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_courses_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_courses_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_courses_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_courses_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_courses_list->TotalRecs > 0 && (!$hr_courses_list->AutoHidePageSizeSelector || $hr_courses_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_courses">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_courses_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_courses_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_courses_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_courses_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_courses_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_courses_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_courses->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_courses_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_courses_list->TotalRecs == 0 && !$hr_courses->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_courses_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_courses_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_courses->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_courses->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_courses", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_courses_list->terminate();
?>