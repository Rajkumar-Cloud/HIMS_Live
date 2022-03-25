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
$hr_companystructures_list = new hr_companystructures_list();

// Run the page
$hr_companystructures_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_companystructures_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_companystructures->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_companystructureslist = currentForm = new ew.Form("fhr_companystructureslist", "list");
fhr_companystructureslist.formKeyCountName = '<?php echo $hr_companystructures_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_companystructureslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_companystructureslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_companystructureslist.lists["x_type"] = <?php echo $hr_companystructures_list->type->Lookup->toClientList() ?>;
fhr_companystructureslist.lists["x_type"].options = <?php echo JsonEncode($hr_companystructures_list->type->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_companystructureslistsrch = currentSearchForm = new ew.Form("fhr_companystructureslistsrch");

// Validate function for search
fhr_companystructureslistsrch.validate = function(fobj) {
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
fhr_companystructureslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_companystructureslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_companystructureslistsrch.lists["x_type"] = <?php echo $hr_companystructures_list->type->Lookup->toClientList() ?>;
fhr_companystructureslistsrch.lists["x_type"].options = <?php echo JsonEncode($hr_companystructures_list->type->options(FALSE, TRUE)) ?>;

// Filters
fhr_companystructureslistsrch.filterList = <?php echo $hr_companystructures_list->getFilterList() ?>;
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
<?php if (!$hr_companystructures->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_companystructures_list->TotalRecs > 0 && $hr_companystructures_list->ExportOptions->visible()) { ?>
<?php $hr_companystructures_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_companystructures_list->ImportOptions->visible()) { ?>
<?php $hr_companystructures_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_companystructures_list->SearchOptions->visible()) { ?>
<?php $hr_companystructures_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_companystructures_list->FilterOptions->visible()) { ?>
<?php $hr_companystructures_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_companystructures_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_companystructures->isExport() && !$hr_companystructures->CurrentAction) { ?>
<form name="fhr_companystructureslistsrch" id="fhr_companystructureslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_companystructures_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_companystructureslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_companystructures">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_companystructures_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_companystructures->RowType = ROWTYPE_SEARCH;

// Render row
$hr_companystructures->resetAttributes();
$hr_companystructures_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_companystructures->type->Visible) { // type ?>
	<div id="xsc_type" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_companystructures->type->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_type" id="z_type" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_type" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_companystructures" data-field="x_type" data-value-separator="<?php echo $hr_companystructures->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="{value}"<?php echo $hr_companystructures->type->editAttributes() ?>></div>
<div id="dsl_x_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_companystructures->type->radioButtonListHtml(FALSE, "x_type") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_companystructures_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_companystructures_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_companystructures_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_companystructures_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_companystructures_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_companystructures_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_companystructures_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_companystructures_list->showPageHeader(); ?>
<?php
$hr_companystructures_list->showMessage();
?>
<?php if ($hr_companystructures_list->TotalRecs > 0 || $hr_companystructures->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_companystructures_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_companystructures">
<?php if (!$hr_companystructures->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_companystructures->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_companystructures_list->Pager)) $hr_companystructures_list->Pager = new NumericPager($hr_companystructures_list->StartRec, $hr_companystructures_list->DisplayRecs, $hr_companystructures_list->TotalRecs, $hr_companystructures_list->RecRange, $hr_companystructures_list->AutoHidePager) ?>
<?php if ($hr_companystructures_list->Pager->RecordCount > 0 && $hr_companystructures_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_companystructures_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_companystructures_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_companystructures_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_companystructures_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_companystructures_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_companystructures_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_companystructures_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_companystructures_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_companystructures_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_companystructures_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_companystructures_list->TotalRecs > 0 && (!$hr_companystructures_list->AutoHidePageSizeSelector || $hr_companystructures_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_companystructures">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_companystructures_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_companystructures_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_companystructures_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_companystructures_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_companystructures_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_companystructures_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_companystructures->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_companystructures_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_companystructureslist" id="fhr_companystructureslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_companystructures_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_companystructures_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
<div id="gmp_hr_companystructures" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_companystructures_list->TotalRecs > 0 || $hr_companystructures->isGridEdit()) { ?>
<table id="tbl_hr_companystructureslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_companystructures_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_companystructures_list->renderListOptions();

// Render list options (header, left)
$hr_companystructures_list->ListOptions->render("header", "left");
?>
<?php if ($hr_companystructures->id->Visible) { // id ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_companystructures->id->headerCellClass() ?>"><div id="elh_hr_companystructures_id" class="hr_companystructures_id"><div class="ew-table-header-caption"><?php echo $hr_companystructures->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_companystructures->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->id) ?>',1);"><div id="elh_hr_companystructures_id" class="hr_companystructures_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->title->Visible) { // title ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->title) == "") { ?>
		<th data-name="title" class="<?php echo $hr_companystructures->title->headerCellClass() ?>"><div id="elh_hr_companystructures_title" class="hr_companystructures_title"><div class="ew-table-header-caption"><?php echo $hr_companystructures->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $hr_companystructures->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->title) ?>',1);"><div id="elh_hr_companystructures_title" class="hr_companystructures_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->type->Visible) { // type ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->type) == "") { ?>
		<th data-name="type" class="<?php echo $hr_companystructures->type->headerCellClass() ?>"><div id="elh_hr_companystructures_type" class="hr_companystructures_type"><div class="ew-table-header-caption"><?php echo $hr_companystructures->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $hr_companystructures->type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->type) ?>',1);"><div id="elh_hr_companystructures_type" class="hr_companystructures_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->country->Visible) { // country ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->country) == "") { ?>
		<th data-name="country" class="<?php echo $hr_companystructures->country->headerCellClass() ?>"><div id="elh_hr_companystructures_country" class="hr_companystructures_country"><div class="ew-table-header-caption"><?php echo $hr_companystructures->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $hr_companystructures->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->country) ?>',1);"><div id="elh_hr_companystructures_country" class="hr_companystructures_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->parent->Visible) { // parent ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->parent) == "") { ?>
		<th data-name="parent" class="<?php echo $hr_companystructures->parent->headerCellClass() ?>"><div id="elh_hr_companystructures_parent" class="hr_companystructures_parent"><div class="ew-table-header-caption"><?php echo $hr_companystructures->parent->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="parent" class="<?php echo $hr_companystructures->parent->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->parent) ?>',1);"><div id="elh_hr_companystructures_parent" class="hr_companystructures_parent">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->parent->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->parent->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->parent->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->timezone->Visible) { // timezone ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->timezone) == "") { ?>
		<th data-name="timezone" class="<?php echo $hr_companystructures->timezone->headerCellClass() ?>"><div id="elh_hr_companystructures_timezone" class="hr_companystructures_timezone"><div class="ew-table-header-caption"><?php echo $hr_companystructures->timezone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="timezone" class="<?php echo $hr_companystructures->timezone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->timezone) ?>',1);"><div id="elh_hr_companystructures_timezone" class="hr_companystructures_timezone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->timezone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->timezone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->timezone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->heads->Visible) { // heads ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->heads) == "") { ?>
		<th data-name="heads" class="<?php echo $hr_companystructures->heads->headerCellClass() ?>"><div id="elh_hr_companystructures_heads" class="hr_companystructures_heads"><div class="ew-table-header-caption"><?php echo $hr_companystructures->heads->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="heads" class="<?php echo $hr_companystructures->heads->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->heads) ?>',1);"><div id="elh_hr_companystructures_heads" class="hr_companystructures_heads">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->heads->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->heads->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->heads->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_companystructures->HospID->Visible) { // HospID ?>
	<?php if ($hr_companystructures->sortUrl($hr_companystructures->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_companystructures->HospID->headerCellClass() ?>"><div id="elh_hr_companystructures_HospID" class="hr_companystructures_HospID"><div class="ew-table-header-caption"><?php echo $hr_companystructures->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_companystructures->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_companystructures->SortUrl($hr_companystructures->HospID) ?>',1);"><div id="elh_hr_companystructures_HospID" class="hr_companystructures_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_companystructures->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_companystructures->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_companystructures->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_companystructures_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_companystructures->ExportAll && $hr_companystructures->isExport()) {
	$hr_companystructures_list->StopRec = $hr_companystructures_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_companystructures_list->TotalRecs > $hr_companystructures_list->StartRec + $hr_companystructures_list->DisplayRecs - 1)
		$hr_companystructures_list->StopRec = $hr_companystructures_list->StartRec + $hr_companystructures_list->DisplayRecs - 1;
	else
		$hr_companystructures_list->StopRec = $hr_companystructures_list->TotalRecs;
}
$hr_companystructures_list->RecCnt = $hr_companystructures_list->StartRec - 1;
if ($hr_companystructures_list->Recordset && !$hr_companystructures_list->Recordset->EOF) {
	$hr_companystructures_list->Recordset->moveFirst();
	$selectLimit = $hr_companystructures_list->UseSelectLimit;
	if (!$selectLimit && $hr_companystructures_list->StartRec > 1)
		$hr_companystructures_list->Recordset->move($hr_companystructures_list->StartRec - 1);
} elseif (!$hr_companystructures->AllowAddDeleteRow && $hr_companystructures_list->StopRec == 0) {
	$hr_companystructures_list->StopRec = $hr_companystructures->GridAddRowCount;
}

// Initialize aggregate
$hr_companystructures->RowType = ROWTYPE_AGGREGATEINIT;
$hr_companystructures->resetAttributes();
$hr_companystructures_list->renderRow();
while ($hr_companystructures_list->RecCnt < $hr_companystructures_list->StopRec) {
	$hr_companystructures_list->RecCnt++;
	if ($hr_companystructures_list->RecCnt >= $hr_companystructures_list->StartRec) {
		$hr_companystructures_list->RowCnt++;

		// Set up key count
		$hr_companystructures_list->KeyCount = $hr_companystructures_list->RowIndex;

		// Init row class and style
		$hr_companystructures->resetAttributes();
		$hr_companystructures->CssClass = "";
		if ($hr_companystructures->isGridAdd()) {
		} else {
			$hr_companystructures_list->loadRowValues($hr_companystructures_list->Recordset); // Load row values
		}
		$hr_companystructures->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_companystructures->RowAttrs = array_merge($hr_companystructures->RowAttrs, array('data-rowindex'=>$hr_companystructures_list->RowCnt, 'id'=>'r' . $hr_companystructures_list->RowCnt . '_hr_companystructures', 'data-rowtype'=>$hr_companystructures->RowType));

		// Render row
		$hr_companystructures_list->renderRow();

		// Render list options
		$hr_companystructures_list->renderListOptions();
?>
	<tr<?php echo $hr_companystructures->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_companystructures_list->ListOptions->render("body", "left", $hr_companystructures_list->RowCnt);
?>
	<?php if ($hr_companystructures->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_companystructures->id->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_id" class="hr_companystructures_id">
<span<?php echo $hr_companystructures->id->viewAttributes() ?>>
<?php echo $hr_companystructures->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->title->Visible) { // title ?>
		<td data-name="title"<?php echo $hr_companystructures->title->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_title" class="hr_companystructures_title">
<span<?php echo $hr_companystructures->title->viewAttributes() ?>>
<?php echo $hr_companystructures->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->type->Visible) { // type ?>
		<td data-name="type"<?php echo $hr_companystructures->type->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_type" class="hr_companystructures_type">
<span<?php echo $hr_companystructures->type->viewAttributes() ?>>
<?php echo $hr_companystructures->type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->country->Visible) { // country ?>
		<td data-name="country"<?php echo $hr_companystructures->country->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_country" class="hr_companystructures_country">
<span<?php echo $hr_companystructures->country->viewAttributes() ?>>
<?php echo $hr_companystructures->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->parent->Visible) { // parent ?>
		<td data-name="parent"<?php echo $hr_companystructures->parent->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_parent" class="hr_companystructures_parent">
<span<?php echo $hr_companystructures->parent->viewAttributes() ?>>
<?php echo $hr_companystructures->parent->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->timezone->Visible) { // timezone ?>
		<td data-name="timezone"<?php echo $hr_companystructures->timezone->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_timezone" class="hr_companystructures_timezone">
<span<?php echo $hr_companystructures->timezone->viewAttributes() ?>>
<?php echo $hr_companystructures->timezone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->heads->Visible) { // heads ?>
		<td data-name="heads"<?php echo $hr_companystructures->heads->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_heads" class="hr_companystructures_heads">
<span<?php echo $hr_companystructures->heads->viewAttributes() ?>>
<?php echo $hr_companystructures->heads->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_companystructures->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_companystructures->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_list->RowCnt ?>_hr_companystructures_HospID" class="hr_companystructures_HospID">
<span<?php echo $hr_companystructures->HospID->viewAttributes() ?>>
<?php echo $hr_companystructures->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_companystructures_list->ListOptions->render("body", "right", $hr_companystructures_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_companystructures->isGridAdd())
		$hr_companystructures_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_companystructures->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_companystructures_list->Recordset)
	$hr_companystructures_list->Recordset->Close();
?>
<?php if (!$hr_companystructures->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_companystructures->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_companystructures_list->Pager)) $hr_companystructures_list->Pager = new NumericPager($hr_companystructures_list->StartRec, $hr_companystructures_list->DisplayRecs, $hr_companystructures_list->TotalRecs, $hr_companystructures_list->RecRange, $hr_companystructures_list->AutoHidePager) ?>
<?php if ($hr_companystructures_list->Pager->RecordCount > 0 && $hr_companystructures_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_companystructures_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_companystructures_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_companystructures_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_companystructures_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_companystructures_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_companystructures_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_companystructures_list->pageUrl() ?>start=<?php echo $hr_companystructures_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_companystructures_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_companystructures_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_companystructures_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_companystructures_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_companystructures_list->TotalRecs > 0 && (!$hr_companystructures_list->AutoHidePageSizeSelector || $hr_companystructures_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_companystructures">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_companystructures_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_companystructures_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_companystructures_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_companystructures_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_companystructures_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_companystructures_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_companystructures->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_companystructures_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_companystructures_list->TotalRecs == 0 && !$hr_companystructures->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_companystructures_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_companystructures_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_companystructures->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_companystructures->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_companystructures", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_companystructures_list->terminate();
?>