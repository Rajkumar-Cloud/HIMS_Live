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
$employee_travel_records_list = new employee_travel_records_list();

// Run the page
$employee_travel_records_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_travel_records_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_travel_records->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_travel_recordslist = currentForm = new ew.Form("femployee_travel_recordslist", "list");
femployee_travel_recordslist.formKeyCountName = '<?php echo $employee_travel_records_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_travel_recordslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_travel_recordslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_travel_recordslist.lists["x_type"] = <?php echo $employee_travel_records_list->type->Lookup->toClientList() ?>;
femployee_travel_recordslist.lists["x_type"].options = <?php echo JsonEncode($employee_travel_records_list->type->options(FALSE, TRUE)) ?>;
femployee_travel_recordslist.lists["x_status"] = <?php echo $employee_travel_records_list->status->Lookup->toClientList() ?>;
femployee_travel_recordslist.lists["x_status"].options = <?php echo JsonEncode($employee_travel_records_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_travel_recordslistsrch = currentSearchForm = new ew.Form("femployee_travel_recordslistsrch");

// Validate function for search
femployee_travel_recordslistsrch.validate = function(fobj) {
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
femployee_travel_recordslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_travel_recordslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_travel_recordslistsrch.lists["x_type"] = <?php echo $employee_travel_records_list->type->Lookup->toClientList() ?>;
femployee_travel_recordslistsrch.lists["x_type"].options = <?php echo JsonEncode($employee_travel_records_list->type->options(FALSE, TRUE)) ?>;
femployee_travel_recordslistsrch.lists["x_status"] = <?php echo $employee_travel_records_list->status->Lookup->toClientList() ?>;
femployee_travel_recordslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_travel_records_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_travel_recordslistsrch.filterList = <?php echo $employee_travel_records_list->getFilterList() ?>;
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
<?php if (!$employee_travel_records->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_travel_records_list->TotalRecs > 0 && $employee_travel_records_list->ExportOptions->visible()) { ?>
<?php $employee_travel_records_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_travel_records_list->ImportOptions->visible()) { ?>
<?php $employee_travel_records_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_travel_records_list->SearchOptions->visible()) { ?>
<?php $employee_travel_records_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_travel_records_list->FilterOptions->visible()) { ?>
<?php $employee_travel_records_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_travel_records_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_travel_records->isExport() && !$employee_travel_records->CurrentAction) { ?>
<form name="femployee_travel_recordslistsrch" id="femployee_travel_recordslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_travel_records_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_travel_recordslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_travel_records">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_travel_records_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_travel_records->RowType = ROWTYPE_SEARCH;

// Render row
$employee_travel_records->resetAttributes();
$employee_travel_records_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_travel_records->type->Visible) { // type ?>
	<div id="xsc_type" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_travel_records->type->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_type" id="z_type" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_type" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_travel_records" data-field="x_type" data-value-separator="<?php echo $employee_travel_records->type->displayValueSeparatorAttribute() ?>" name="x_type" id="x_type" value="{value}"<?php echo $employee_travel_records->type->editAttributes() ?>></div>
<div id="dsl_x_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_travel_records->type->radioButtonListHtml(FALSE, "x_type") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($employee_travel_records->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_travel_records->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_travel_records" data-field="x_status" data-value-separator="<?php echo $employee_travel_records->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_travel_records->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_travel_records->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_travel_records_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_travel_records_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_travel_records_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_travel_records_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_travel_records_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_travel_records_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_travel_records_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_travel_records_list->showPageHeader(); ?>
<?php
$employee_travel_records_list->showMessage();
?>
<?php if ($employee_travel_records_list->TotalRecs > 0 || $employee_travel_records->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_travel_records_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_travel_records">
<?php if (!$employee_travel_records->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_travel_records->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_travel_records_list->Pager)) $employee_travel_records_list->Pager = new NumericPager($employee_travel_records_list->StartRec, $employee_travel_records_list->DisplayRecs, $employee_travel_records_list->TotalRecs, $employee_travel_records_list->RecRange, $employee_travel_records_list->AutoHidePager) ?>
<?php if ($employee_travel_records_list->Pager->RecordCount > 0 && $employee_travel_records_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_travel_records_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_travel_records_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_travel_records_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_travel_records_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_travel_records_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_travel_records_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_travel_records_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_travel_records_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_travel_records_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_travel_records_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_travel_records_list->TotalRecs > 0 && (!$employee_travel_records_list->AutoHidePageSizeSelector || $employee_travel_records_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_travel_records">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_travel_records_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_travel_records_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_travel_records_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_travel_records_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_travel_records_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_travel_records_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_travel_records->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_travel_records_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_travel_recordslist" id="femployee_travel_recordslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_travel_records_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_travel_records_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
<div id="gmp_employee_travel_records" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_travel_records_list->TotalRecs > 0 || $employee_travel_records->isGridEdit()) { ?>
<table id="tbl_employee_travel_recordslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_travel_records_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_travel_records_list->renderListOptions();

// Render list options (header, left)
$employee_travel_records_list->ListOptions->render("header", "left");
?>
<?php if ($employee_travel_records->id->Visible) { // id ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_travel_records->id->headerCellClass() ?>"><div id="elh_employee_travel_records_id" class="employee_travel_records_id"><div class="ew-table-header-caption"><?php echo $employee_travel_records->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_travel_records->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->id) ?>',1);"><div id="elh_employee_travel_records_id" class="employee_travel_records_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->employee->Visible) { // employee ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_travel_records->employee->headerCellClass() ?>"><div id="elh_employee_travel_records_employee" class="employee_travel_records_employee"><div class="ew-table-header-caption"><?php echo $employee_travel_records->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_travel_records->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->employee) ?>',1);"><div id="elh_employee_travel_records_employee" class="employee_travel_records_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->type->Visible) { // type ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->type) == "") { ?>
		<th data-name="type" class="<?php echo $employee_travel_records->type->headerCellClass() ?>"><div id="elh_employee_travel_records_type" class="employee_travel_records_type"><div class="ew-table-header-caption"><?php echo $employee_travel_records->type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="type" class="<?php echo $employee_travel_records->type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->type) ?>',1);"><div id="elh_employee_travel_records_type" class="employee_travel_records_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->purpose->Visible) { // purpose ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->purpose) == "") { ?>
		<th data-name="purpose" class="<?php echo $employee_travel_records->purpose->headerCellClass() ?>"><div id="elh_employee_travel_records_purpose" class="employee_travel_records_purpose"><div class="ew-table-header-caption"><?php echo $employee_travel_records->purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="purpose" class="<?php echo $employee_travel_records->purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->purpose) ?>',1);"><div id="elh_employee_travel_records_purpose" class="employee_travel_records_purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->purpose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->purpose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->travel_from->Visible) { // travel_from ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->travel_from) == "") { ?>
		<th data-name="travel_from" class="<?php echo $employee_travel_records->travel_from->headerCellClass() ?>"><div id="elh_employee_travel_records_travel_from" class="employee_travel_records_travel_from"><div class="ew-table-header-caption"><?php echo $employee_travel_records->travel_from->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="travel_from" class="<?php echo $employee_travel_records->travel_from->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->travel_from) ?>',1);"><div id="elh_employee_travel_records_travel_from" class="employee_travel_records_travel_from">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->travel_from->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->travel_from->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->travel_from->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->travel_to->Visible) { // travel_to ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->travel_to) == "") { ?>
		<th data-name="travel_to" class="<?php echo $employee_travel_records->travel_to->headerCellClass() ?>"><div id="elh_employee_travel_records_travel_to" class="employee_travel_records_travel_to"><div class="ew-table-header-caption"><?php echo $employee_travel_records->travel_to->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="travel_to" class="<?php echo $employee_travel_records->travel_to->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->travel_to) ?>',1);"><div id="elh_employee_travel_records_travel_to" class="employee_travel_records_travel_to">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->travel_to->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->travel_to->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->travel_to->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->travel_date->Visible) { // travel_date ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->travel_date) == "") { ?>
		<th data-name="travel_date" class="<?php echo $employee_travel_records->travel_date->headerCellClass() ?>"><div id="elh_employee_travel_records_travel_date" class="employee_travel_records_travel_date"><div class="ew-table-header-caption"><?php echo $employee_travel_records->travel_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="travel_date" class="<?php echo $employee_travel_records->travel_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->travel_date) ?>',1);"><div id="elh_employee_travel_records_travel_date" class="employee_travel_records_travel_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->travel_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->travel_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->travel_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->return_date->Visible) { // return_date ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->return_date) == "") { ?>
		<th data-name="return_date" class="<?php echo $employee_travel_records->return_date->headerCellClass() ?>"><div id="elh_employee_travel_records_return_date" class="employee_travel_records_return_date"><div class="ew-table-header-caption"><?php echo $employee_travel_records->return_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="return_date" class="<?php echo $employee_travel_records->return_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->return_date) ?>',1);"><div id="elh_employee_travel_records_return_date" class="employee_travel_records_return_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->return_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->return_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->return_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->funding->Visible) { // funding ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->funding) == "") { ?>
		<th data-name="funding" class="<?php echo $employee_travel_records->funding->headerCellClass() ?>"><div id="elh_employee_travel_records_funding" class="employee_travel_records_funding"><div class="ew-table-header-caption"><?php echo $employee_travel_records->funding->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="funding" class="<?php echo $employee_travel_records->funding->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->funding) ?>',1);"><div id="elh_employee_travel_records_funding" class="employee_travel_records_funding">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->funding->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->funding->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->funding->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->currency->Visible) { // currency ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $employee_travel_records->currency->headerCellClass() ?>"><div id="elh_employee_travel_records_currency" class="employee_travel_records_currency"><div class="ew-table-header-caption"><?php echo $employee_travel_records->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $employee_travel_records->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->currency) ?>',1);"><div id="elh_employee_travel_records_currency" class="employee_travel_records_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->attachment1->Visible) { // attachment1 ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->attachment1) == "") { ?>
		<th data-name="attachment1" class="<?php echo $employee_travel_records->attachment1->headerCellClass() ?>"><div id="elh_employee_travel_records_attachment1" class="employee_travel_records_attachment1"><div class="ew-table-header-caption"><?php echo $employee_travel_records->attachment1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment1" class="<?php echo $employee_travel_records->attachment1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->attachment1) ?>',1);"><div id="elh_employee_travel_records_attachment1" class="employee_travel_records_attachment1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->attachment1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->attachment1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->attachment1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->attachment2->Visible) { // attachment2 ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->attachment2) == "") { ?>
		<th data-name="attachment2" class="<?php echo $employee_travel_records->attachment2->headerCellClass() ?>"><div id="elh_employee_travel_records_attachment2" class="employee_travel_records_attachment2"><div class="ew-table-header-caption"><?php echo $employee_travel_records->attachment2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment2" class="<?php echo $employee_travel_records->attachment2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->attachment2) ?>',1);"><div id="elh_employee_travel_records_attachment2" class="employee_travel_records_attachment2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->attachment2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->attachment2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->attachment2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->attachment3->Visible) { // attachment3 ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->attachment3) == "") { ?>
		<th data-name="attachment3" class="<?php echo $employee_travel_records->attachment3->headerCellClass() ?>"><div id="elh_employee_travel_records_attachment3" class="employee_travel_records_attachment3"><div class="ew-table-header-caption"><?php echo $employee_travel_records->attachment3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment3" class="<?php echo $employee_travel_records->attachment3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->attachment3) ?>',1);"><div id="elh_employee_travel_records_attachment3" class="employee_travel_records_attachment3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->attachment3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->attachment3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->attachment3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->created->Visible) { // created ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->created) == "") { ?>
		<th data-name="created" class="<?php echo $employee_travel_records->created->headerCellClass() ?>"><div id="elh_employee_travel_records_created" class="employee_travel_records_created"><div class="ew-table-header-caption"><?php echo $employee_travel_records->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $employee_travel_records->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->created) ?>',1);"><div id="elh_employee_travel_records_created" class="employee_travel_records_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->updated->Visible) { // updated ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $employee_travel_records->updated->headerCellClass() ?>"><div id="elh_employee_travel_records_updated" class="employee_travel_records_updated"><div class="ew-table-header-caption"><?php echo $employee_travel_records->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $employee_travel_records->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->updated) ?>',1);"><div id="elh_employee_travel_records_updated" class="employee_travel_records_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_travel_records->status->Visible) { // status ?>
	<?php if ($employee_travel_records->sortUrl($employee_travel_records->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_travel_records->status->headerCellClass() ?>"><div id="elh_employee_travel_records_status" class="employee_travel_records_status"><div class="ew-table-header-caption"><?php echo $employee_travel_records->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_travel_records->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_travel_records->SortUrl($employee_travel_records->status) ?>',1);"><div id="elh_employee_travel_records_status" class="employee_travel_records_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_travel_records->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_travel_records->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_travel_records->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_travel_records_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_travel_records->ExportAll && $employee_travel_records->isExport()) {
	$employee_travel_records_list->StopRec = $employee_travel_records_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_travel_records_list->TotalRecs > $employee_travel_records_list->StartRec + $employee_travel_records_list->DisplayRecs - 1)
		$employee_travel_records_list->StopRec = $employee_travel_records_list->StartRec + $employee_travel_records_list->DisplayRecs - 1;
	else
		$employee_travel_records_list->StopRec = $employee_travel_records_list->TotalRecs;
}
$employee_travel_records_list->RecCnt = $employee_travel_records_list->StartRec - 1;
if ($employee_travel_records_list->Recordset && !$employee_travel_records_list->Recordset->EOF) {
	$employee_travel_records_list->Recordset->moveFirst();
	$selectLimit = $employee_travel_records_list->UseSelectLimit;
	if (!$selectLimit && $employee_travel_records_list->StartRec > 1)
		$employee_travel_records_list->Recordset->move($employee_travel_records_list->StartRec - 1);
} elseif (!$employee_travel_records->AllowAddDeleteRow && $employee_travel_records_list->StopRec == 0) {
	$employee_travel_records_list->StopRec = $employee_travel_records->GridAddRowCount;
}

// Initialize aggregate
$employee_travel_records->RowType = ROWTYPE_AGGREGATEINIT;
$employee_travel_records->resetAttributes();
$employee_travel_records_list->renderRow();
while ($employee_travel_records_list->RecCnt < $employee_travel_records_list->StopRec) {
	$employee_travel_records_list->RecCnt++;
	if ($employee_travel_records_list->RecCnt >= $employee_travel_records_list->StartRec) {
		$employee_travel_records_list->RowCnt++;

		// Set up key count
		$employee_travel_records_list->KeyCount = $employee_travel_records_list->RowIndex;

		// Init row class and style
		$employee_travel_records->resetAttributes();
		$employee_travel_records->CssClass = "";
		if ($employee_travel_records->isGridAdd()) {
		} else {
			$employee_travel_records_list->loadRowValues($employee_travel_records_list->Recordset); // Load row values
		}
		$employee_travel_records->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_travel_records->RowAttrs = array_merge($employee_travel_records->RowAttrs, array('data-rowindex'=>$employee_travel_records_list->RowCnt, 'id'=>'r' . $employee_travel_records_list->RowCnt . '_employee_travel_records', 'data-rowtype'=>$employee_travel_records->RowType));

		// Render row
		$employee_travel_records_list->renderRow();

		// Render list options
		$employee_travel_records_list->renderListOptions();
?>
	<tr<?php echo $employee_travel_records->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_travel_records_list->ListOptions->render("body", "left", $employee_travel_records_list->RowCnt);
?>
	<?php if ($employee_travel_records->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_travel_records->id->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_id" class="employee_travel_records_id">
<span<?php echo $employee_travel_records->id->viewAttributes() ?>>
<?php echo $employee_travel_records->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_travel_records->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_employee" class="employee_travel_records_employee">
<span<?php echo $employee_travel_records->employee->viewAttributes() ?>>
<?php echo $employee_travel_records->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->type->Visible) { // type ?>
		<td data-name="type"<?php echo $employee_travel_records->type->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_type" class="employee_travel_records_type">
<span<?php echo $employee_travel_records->type->viewAttributes() ?>>
<?php echo $employee_travel_records->type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->purpose->Visible) { // purpose ?>
		<td data-name="purpose"<?php echo $employee_travel_records->purpose->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_purpose" class="employee_travel_records_purpose">
<span<?php echo $employee_travel_records->purpose->viewAttributes() ?>>
<?php echo $employee_travel_records->purpose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->travel_from->Visible) { // travel_from ?>
		<td data-name="travel_from"<?php echo $employee_travel_records->travel_from->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_travel_from" class="employee_travel_records_travel_from">
<span<?php echo $employee_travel_records->travel_from->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_from->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->travel_to->Visible) { // travel_to ?>
		<td data-name="travel_to"<?php echo $employee_travel_records->travel_to->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_travel_to" class="employee_travel_records_travel_to">
<span<?php echo $employee_travel_records->travel_to->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_to->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->travel_date->Visible) { // travel_date ?>
		<td data-name="travel_date"<?php echo $employee_travel_records->travel_date->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_travel_date" class="employee_travel_records_travel_date">
<span<?php echo $employee_travel_records->travel_date->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->return_date->Visible) { // return_date ?>
		<td data-name="return_date"<?php echo $employee_travel_records->return_date->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_return_date" class="employee_travel_records_return_date">
<span<?php echo $employee_travel_records->return_date->viewAttributes() ?>>
<?php echo $employee_travel_records->return_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->funding->Visible) { // funding ?>
		<td data-name="funding"<?php echo $employee_travel_records->funding->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_funding" class="employee_travel_records_funding">
<span<?php echo $employee_travel_records->funding->viewAttributes() ?>>
<?php echo $employee_travel_records->funding->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $employee_travel_records->currency->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_currency" class="employee_travel_records_currency">
<span<?php echo $employee_travel_records->currency->viewAttributes() ?>>
<?php echo $employee_travel_records->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->attachment1->Visible) { // attachment1 ?>
		<td data-name="attachment1"<?php echo $employee_travel_records->attachment1->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_attachment1" class="employee_travel_records_attachment1">
<span<?php echo $employee_travel_records->attachment1->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->attachment2->Visible) { // attachment2 ?>
		<td data-name="attachment2"<?php echo $employee_travel_records->attachment2->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_attachment2" class="employee_travel_records_attachment2">
<span<?php echo $employee_travel_records->attachment2->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->attachment3->Visible) { // attachment3 ?>
		<td data-name="attachment3"<?php echo $employee_travel_records->attachment3->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_attachment3" class="employee_travel_records_attachment3">
<span<?php echo $employee_travel_records->attachment3->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->created->Visible) { // created ?>
		<td data-name="created"<?php echo $employee_travel_records->created->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_created" class="employee_travel_records_created">
<span<?php echo $employee_travel_records->created->viewAttributes() ?>>
<?php echo $employee_travel_records->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $employee_travel_records->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_updated" class="employee_travel_records_updated">
<span<?php echo $employee_travel_records->updated->viewAttributes() ?>>
<?php echo $employee_travel_records->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_travel_records->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_travel_records->status->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_list->RowCnt ?>_employee_travel_records_status" class="employee_travel_records_status">
<span<?php echo $employee_travel_records->status->viewAttributes() ?>>
<?php echo $employee_travel_records->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_travel_records_list->ListOptions->render("body", "right", $employee_travel_records_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_travel_records->isGridAdd())
		$employee_travel_records_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_travel_records->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_travel_records_list->Recordset)
	$employee_travel_records_list->Recordset->Close();
?>
<?php if (!$employee_travel_records->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_travel_records->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_travel_records_list->Pager)) $employee_travel_records_list->Pager = new NumericPager($employee_travel_records_list->StartRec, $employee_travel_records_list->DisplayRecs, $employee_travel_records_list->TotalRecs, $employee_travel_records_list->RecRange, $employee_travel_records_list->AutoHidePager) ?>
<?php if ($employee_travel_records_list->Pager->RecordCount > 0 && $employee_travel_records_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_travel_records_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_travel_records_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_travel_records_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_travel_records_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_travel_records_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_travel_records_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_travel_records_list->pageUrl() ?>start=<?php echo $employee_travel_records_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_travel_records_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_travel_records_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_travel_records_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_travel_records_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_travel_records_list->TotalRecs > 0 && (!$employee_travel_records_list->AutoHidePageSizeSelector || $employee_travel_records_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_travel_records">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_travel_records_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_travel_records_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_travel_records_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_travel_records_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_travel_records_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_travel_records_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_travel_records->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_travel_records_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_travel_records_list->TotalRecs == 0 && !$employee_travel_records->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_travel_records_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_travel_records_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_travel_records->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_travel_records->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_travel_records", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_travel_records_list->terminate();
?>