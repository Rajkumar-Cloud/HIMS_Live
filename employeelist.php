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
$employee_list = new employee_list();

// Run the page
$employee_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployeelist = currentForm = new ew.Form("femployeelist", "list");
femployeelist.formKeyCountName = '<?php echo $employee_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployeelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeelist.lists["x_gender"] = <?php echo $employee_list->gender->Lookup->toClientList() ?>;
femployeelist.lists["x_gender"].options = <?php echo JsonEncode($employee_list->gender->lookupOptions()) ?>;
femployeelist.lists["x_nationality"] = <?php echo $employee_list->nationality->Lookup->toClientList() ?>;
femployeelist.lists["x_nationality"].options = <?php echo JsonEncode($employee_list->nationality->lookupOptions()) ?>;
femployeelist.lists["x_marital_status"] = <?php echo $employee_list->marital_status->Lookup->toClientList() ?>;
femployeelist.lists["x_marital_status"].options = <?php echo JsonEncode($employee_list->marital_status->options(FALSE, TRUE)) ?>;
femployeelist.lists["x_approver1"] = <?php echo $employee_list->approver1->Lookup->toClientList() ?>;
femployeelist.lists["x_approver1"].options = <?php echo JsonEncode($employee_list->approver1->lookupOptions()) ?>;
femployeelist.lists["x_approver2"] = <?php echo $employee_list->approver2->Lookup->toClientList() ?>;
femployeelist.lists["x_approver2"].options = <?php echo JsonEncode($employee_list->approver2->lookupOptions()) ?>;
femployeelist.lists["x_approver3"] = <?php echo $employee_list->approver3->Lookup->toClientList() ?>;
femployeelist.lists["x_approver3"].options = <?php echo JsonEncode($employee_list->approver3->lookupOptions()) ?>;
femployeelist.lists["x_status"] = <?php echo $employee_list->status->Lookup->toClientList() ?>;
femployeelist.lists["x_status"].options = <?php echo JsonEncode($employee_list->status->lookupOptions()) ?>;

// Form object for search
var femployeelistsrch = currentSearchForm = new ew.Form("femployeelistsrch");

// Validate function for search
femployeelistsrch.validate = function(fobj) {
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
femployeelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeelistsrch.lists["x_marital_status"] = <?php echo $employee_list->marital_status->Lookup->toClientList() ?>;
femployeelistsrch.lists["x_marital_status"].options = <?php echo JsonEncode($employee_list->marital_status->options(FALSE, TRUE)) ?>;

// Filters
femployeelistsrch.filterList = <?php echo $employee_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #2997CB; /* preview row color */
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
ew.PREVIEW_OVERLAY = true;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_list->TotalRecs > 0 && $employee_list->ExportOptions->visible()) { ?>
<?php $employee_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_list->ImportOptions->visible()) { ?>
<?php $employee_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_list->SearchOptions->visible()) { ?>
<?php $employee_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_list->FilterOptions->visible()) { ?>
<?php $employee_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee->isExport() && !$employee->CurrentAction) { ?>
<form name="femployeelistsrch" id="femployeelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployeelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee->RowType = ROWTYPE_SEARCH;

// Render row
$employee->resetAttributes();
$employee_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee->first_name->Visible) { // first_name ?>
	<div id="xsc_first_name" class="ew-cell form-group">
		<label for="x_first_name" class="ew-search-caption ew-label"><?php echo $employee->first_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_first_name" id="z_first_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="employee" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee->first_name->getPlaceHolder()) ?>" value="<?php echo $employee->first_name->EditValue ?>"<?php echo $employee->first_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
	<div id="xsc_marital_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee->marital_status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_marital_status" id="z_marital_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_marital_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee" data-field="x_marital_status" data-value-separator="<?php echo $employee->marital_status->displayValueSeparatorAttribute() ?>" name="x_marital_status" id="x_marital_status" value="{value}"<?php echo $employee->marital_status->editAttributes() ?>></div>
<div id="dsl_x_marital_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee->marital_status->radioButtonListHtml(FALSE, "x_marital_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_list->showPageHeader(); ?>
<?php
$employee_list->showMessage();
?>
<?php if ($employee_list->TotalRecs > 0 || $employee->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee">
<?php if (!$employee->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_list->Pager)) $employee_list->Pager = new NumericPager($employee_list->StartRec, $employee_list->DisplayRecs, $employee_list->TotalRecs, $employee_list->RecRange, $employee_list->AutoHidePager) ?>
<?php if ($employee_list->Pager->RecordCount > 0 && $employee_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_list->TotalRecs > 0 && (!$employee_list->AutoHidePageSizeSelector || $employee_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployeelist" id="femployeelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<div id="gmp_employee" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_list->TotalRecs > 0 || $employee->isGridEdit()) { ?>
<table id="tbl_employeelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_list->renderListOptions();

// Render list options (header, left)
$employee_list->ListOptions->render("header", "left");
?>
<?php if ($employee->id->Visible) { // id ?>
	<?php if ($employee->sortUrl($employee->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee->id->headerCellClass() ?>"><div id="elh_employee_id" class="employee_id"><div class="ew-table-header-caption"><?php echo $employee->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->id) ?>',1);"><div id="elh_employee_id" class="employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
	<?php if ($employee->sortUrl($employee->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee->employee_id->headerCellClass() ?>"><div id="elh_employee_employee_id" class="employee_employee_id"><div class="ew-table-header-caption"><?php echo $employee->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->employee_id) ?>',1);"><div id="elh_employee_employee_id" class="employee_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->employee_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
	<?php if ($employee->sortUrl($employee->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $employee->first_name->headerCellClass() ?>"><div id="elh_employee_first_name" class="employee_first_name"><div class="ew-table-header-caption"><?php echo $employee->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $employee->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->first_name) ?>',1);"><div id="elh_employee_first_name" class="employee_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
	<?php if ($employee->sortUrl($employee->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $employee->middle_name->headerCellClass() ?>"><div id="elh_employee_middle_name" class="employee_middle_name"><div class="ew-table-header-caption"><?php echo $employee->middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $employee->middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->middle_name) ?>',1);"><div id="elh_employee_middle_name" class="employee_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
	<?php if ($employee->sortUrl($employee->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $employee->last_name->headerCellClass() ?>"><div id="elh_employee_last_name" class="employee_last_name"><div class="ew-table-header-caption"><?php echo $employee->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $employee->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->last_name) ?>',1);"><div id="elh_employee_last_name" class="employee_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
	<?php if ($employee->sortUrl($employee->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $employee->gender->headerCellClass() ?>"><div id="elh_employee_gender" class="employee_gender"><div class="ew-table-header-caption"><?php echo $employee->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $employee->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->gender) ?>',1);"><div id="elh_employee_gender" class="employee_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
	<?php if ($employee->sortUrl($employee->nationality) == "") { ?>
		<th data-name="nationality" class="<?php echo $employee->nationality->headerCellClass() ?>"><div id="elh_employee_nationality" class="employee_nationality"><div class="ew-table-header-caption"><?php echo $employee->nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nationality" class="<?php echo $employee->nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->nationality) ?>',1);"><div id="elh_employee_nationality" class="employee_nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->nationality->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
	<?php if ($employee->sortUrl($employee->birthday) == "") { ?>
		<th data-name="birthday" class="<?php echo $employee->birthday->headerCellClass() ?>"><div id="elh_employee_birthday" class="employee_birthday"><div class="ew-table-header-caption"><?php echo $employee->birthday->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthday" class="<?php echo $employee->birthday->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->birthday) ?>',1);"><div id="elh_employee_birthday" class="employee_birthday">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->birthday->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->birthday->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->birthday->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
	<?php if ($employee->sortUrl($employee->marital_status) == "") { ?>
		<th data-name="marital_status" class="<?php echo $employee->marital_status->headerCellClass() ?>"><div id="elh_employee_marital_status" class="employee_marital_status"><div class="ew-table-header-caption"><?php echo $employee->marital_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="marital_status" class="<?php echo $employee->marital_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->marital_status) ?>',1);"><div id="elh_employee_marital_status" class="employee_marital_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->marital_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->marital_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->marital_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
	<?php if ($employee->sortUrl($employee->ssn_num) == "") { ?>
		<th data-name="ssn_num" class="<?php echo $employee->ssn_num->headerCellClass() ?>"><div id="elh_employee_ssn_num" class="employee_ssn_num"><div class="ew-table-header-caption"><?php echo $employee->ssn_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ssn_num" class="<?php echo $employee->ssn_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->ssn_num) ?>',1);"><div id="elh_employee_ssn_num" class="employee_ssn_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->ssn_num->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->ssn_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->ssn_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
	<?php if ($employee->sortUrl($employee->nic_num) == "") { ?>
		<th data-name="nic_num" class="<?php echo $employee->nic_num->headerCellClass() ?>"><div id="elh_employee_nic_num" class="employee_nic_num"><div class="ew-table-header-caption"><?php echo $employee->nic_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nic_num" class="<?php echo $employee->nic_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->nic_num) ?>',1);"><div id="elh_employee_nic_num" class="employee_nic_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->nic_num->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->nic_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->nic_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
	<?php if ($employee->sortUrl($employee->other_id) == "") { ?>
		<th data-name="other_id" class="<?php echo $employee->other_id->headerCellClass() ?>"><div id="elh_employee_other_id" class="employee_other_id"><div class="ew-table-header-caption"><?php echo $employee->other_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="other_id" class="<?php echo $employee->other_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->other_id) ?>',1);"><div id="elh_employee_other_id" class="employee_other_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->other_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->other_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->other_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
	<?php if ($employee->sortUrl($employee->driving_license) == "") { ?>
		<th data-name="driving_license" class="<?php echo $employee->driving_license->headerCellClass() ?>"><div id="elh_employee_driving_license" class="employee_driving_license"><div class="ew-table-header-caption"><?php echo $employee->driving_license->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="driving_license" class="<?php echo $employee->driving_license->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->driving_license) ?>',1);"><div id="elh_employee_driving_license" class="employee_driving_license">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->driving_license->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->driving_license->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->driving_license->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
	<?php if ($employee->sortUrl($employee->driving_license_exp_date) == "") { ?>
		<th data-name="driving_license_exp_date" class="<?php echo $employee->driving_license_exp_date->headerCellClass() ?>"><div id="elh_employee_driving_license_exp_date" class="employee_driving_license_exp_date"><div class="ew-table-header-caption"><?php echo $employee->driving_license_exp_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="driving_license_exp_date" class="<?php echo $employee->driving_license_exp_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->driving_license_exp_date) ?>',1);"><div id="elh_employee_driving_license_exp_date" class="employee_driving_license_exp_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->driving_license_exp_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->driving_license_exp_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->driving_license_exp_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->employment_status->Visible) { // employment_status ?>
	<?php if ($employee->sortUrl($employee->employment_status) == "") { ?>
		<th data-name="employment_status" class="<?php echo $employee->employment_status->headerCellClass() ?>"><div id="elh_employee_employment_status" class="employee_employment_status"><div class="ew-table-header-caption"><?php echo $employee->employment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employment_status" class="<?php echo $employee->employment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->employment_status) ?>',1);"><div id="elh_employee_employment_status" class="employee_employment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->employment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->employment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->employment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
	<?php if ($employee->sortUrl($employee->job_title) == "") { ?>
		<th data-name="job_title" class="<?php echo $employee->job_title->headerCellClass() ?>"><div id="elh_employee_job_title" class="employee_job_title"><div class="ew-table-header-caption"><?php echo $employee->job_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_title" class="<?php echo $employee->job_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->job_title) ?>',1);"><div id="elh_employee_job_title" class="employee_job_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->job_title->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->job_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->job_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
	<?php if ($employee->sortUrl($employee->pay_grade) == "") { ?>
		<th data-name="pay_grade" class="<?php echo $employee->pay_grade->headerCellClass() ?>"><div id="elh_employee_pay_grade" class="employee_pay_grade"><div class="ew-table-header-caption"><?php echo $employee->pay_grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pay_grade" class="<?php echo $employee->pay_grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->pay_grade) ?>',1);"><div id="elh_employee_pay_grade" class="employee_pay_grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->pay_grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->pay_grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->pay_grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
	<?php if ($employee->sortUrl($employee->work_station_id) == "") { ?>
		<th data-name="work_station_id" class="<?php echo $employee->work_station_id->headerCellClass() ?>"><div id="elh_employee_work_station_id" class="employee_work_station_id"><div class="ew-table-header-caption"><?php echo $employee->work_station_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="work_station_id" class="<?php echo $employee->work_station_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->work_station_id) ?>',1);"><div id="elh_employee_work_station_id" class="employee_work_station_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->work_station_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->work_station_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->work_station_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->address1->Visible) { // address1 ?>
	<?php if ($employee->sortUrl($employee->address1) == "") { ?>
		<th data-name="address1" class="<?php echo $employee->address1->headerCellClass() ?>"><div id="elh_employee_address1" class="employee_address1"><div class="ew-table-header-caption"><?php echo $employee->address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address1" class="<?php echo $employee->address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->address1) ?>',1);"><div id="elh_employee_address1" class="employee_address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
	<?php if ($employee->sortUrl($employee->address2) == "") { ?>
		<th data-name="address2" class="<?php echo $employee->address2->headerCellClass() ?>"><div id="elh_employee_address2" class="employee_address2"><div class="ew-table-header-caption"><?php echo $employee->address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address2" class="<?php echo $employee->address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->address2) ?>',1);"><div id="elh_employee_address2" class="employee_address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
	<?php if ($employee->sortUrl($employee->city) == "") { ?>
		<th data-name="city" class="<?php echo $employee->city->headerCellClass() ?>"><div id="elh_employee_city" class="employee_city"><div class="ew-table-header-caption"><?php echo $employee->city->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="city" class="<?php echo $employee->city->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->city) ?>',1);"><div id="elh_employee_city" class="employee_city">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->city->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->city->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->city->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
	<?php if ($employee->sortUrl($employee->country) == "") { ?>
		<th data-name="country" class="<?php echo $employee->country->headerCellClass() ?>"><div id="elh_employee_country" class="employee_country"><div class="ew-table-header-caption"><?php echo $employee->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $employee->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->country) ?>',1);"><div id="elh_employee_country" class="employee_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
	<?php if ($employee->sortUrl($employee->province) == "") { ?>
		<th data-name="province" class="<?php echo $employee->province->headerCellClass() ?>"><div id="elh_employee_province" class="employee_province"><div class="ew-table-header-caption"><?php echo $employee->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $employee->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->province) ?>',1);"><div id="elh_employee_province" class="employee_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
	<?php if ($employee->sortUrl($employee->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $employee->postal_code->headerCellClass() ?>"><div id="elh_employee_postal_code" class="employee_postal_code"><div class="ew-table-header-caption"><?php echo $employee->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $employee->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->postal_code) ?>',1);"><div id="elh_employee_postal_code" class="employee_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
	<?php if ($employee->sortUrl($employee->home_phone) == "") { ?>
		<th data-name="home_phone" class="<?php echo $employee->home_phone->headerCellClass() ?>"><div id="elh_employee_home_phone" class="employee_home_phone"><div class="ew-table-header-caption"><?php echo $employee->home_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="home_phone" class="<?php echo $employee->home_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->home_phone) ?>',1);"><div id="elh_employee_home_phone" class="employee_home_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->home_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->home_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->home_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
	<?php if ($employee->sortUrl($employee->mobile_phone) == "") { ?>
		<th data-name="mobile_phone" class="<?php echo $employee->mobile_phone->headerCellClass() ?>"><div id="elh_employee_mobile_phone" class="employee_mobile_phone"><div class="ew-table-header-caption"><?php echo $employee->mobile_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_phone" class="<?php echo $employee->mobile_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->mobile_phone) ?>',1);"><div id="elh_employee_mobile_phone" class="employee_mobile_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->mobile_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->mobile_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->mobile_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
	<?php if ($employee->sortUrl($employee->work_phone) == "") { ?>
		<th data-name="work_phone" class="<?php echo $employee->work_phone->headerCellClass() ?>"><div id="elh_employee_work_phone" class="employee_work_phone"><div class="ew-table-header-caption"><?php echo $employee->work_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="work_phone" class="<?php echo $employee->work_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->work_phone) ?>',1);"><div id="elh_employee_work_phone" class="employee_work_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->work_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->work_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->work_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
	<?php if ($employee->sortUrl($employee->work_email) == "") { ?>
		<th data-name="work_email" class="<?php echo $employee->work_email->headerCellClass() ?>"><div id="elh_employee_work_email" class="employee_work_email"><div class="ew-table-header-caption"><?php echo $employee->work_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="work_email" class="<?php echo $employee->work_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->work_email) ?>',1);"><div id="elh_employee_work_email" class="employee_work_email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->work_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->work_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->work_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
	<?php if ($employee->sortUrl($employee->private_email) == "") { ?>
		<th data-name="private_email" class="<?php echo $employee->private_email->headerCellClass() ?>"><div id="elh_employee_private_email" class="employee_private_email"><div class="ew-table-header-caption"><?php echo $employee->private_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="private_email" class="<?php echo $employee->private_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->private_email) ?>',1);"><div id="elh_employee_private_email" class="employee_private_email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->private_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->private_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->private_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
	<?php if ($employee->sortUrl($employee->joined_date) == "") { ?>
		<th data-name="joined_date" class="<?php echo $employee->joined_date->headerCellClass() ?>"><div id="elh_employee_joined_date" class="employee_joined_date"><div class="ew-table-header-caption"><?php echo $employee->joined_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="joined_date" class="<?php echo $employee->joined_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->joined_date) ?>',1);"><div id="elh_employee_joined_date" class="employee_joined_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->joined_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->joined_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->joined_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
	<?php if ($employee->sortUrl($employee->confirmation_date) == "") { ?>
		<th data-name="confirmation_date" class="<?php echo $employee->confirmation_date->headerCellClass() ?>"><div id="elh_employee_confirmation_date" class="employee_confirmation_date"><div class="ew-table-header-caption"><?php echo $employee->confirmation_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="confirmation_date" class="<?php echo $employee->confirmation_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->confirmation_date) ?>',1);"><div id="elh_employee_confirmation_date" class="employee_confirmation_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->confirmation_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->confirmation_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->confirmation_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
	<?php if ($employee->sortUrl($employee->supervisor) == "") { ?>
		<th data-name="supervisor" class="<?php echo $employee->supervisor->headerCellClass() ?>"><div id="elh_employee_supervisor" class="employee_supervisor"><div class="ew-table-header-caption"><?php echo $employee->supervisor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="supervisor" class="<?php echo $employee->supervisor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->supervisor) ?>',1);"><div id="elh_employee_supervisor" class="employee_supervisor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->supervisor->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->supervisor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->supervisor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
	<?php if ($employee->sortUrl($employee->indirect_supervisors) == "") { ?>
		<th data-name="indirect_supervisors" class="<?php echo $employee->indirect_supervisors->headerCellClass() ?>"><div id="elh_employee_indirect_supervisors" class="employee_indirect_supervisors"><div class="ew-table-header-caption"><?php echo $employee->indirect_supervisors->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="indirect_supervisors" class="<?php echo $employee->indirect_supervisors->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->indirect_supervisors) ?>',1);"><div id="elh_employee_indirect_supervisors" class="employee_indirect_supervisors">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->indirect_supervisors->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->indirect_supervisors->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->indirect_supervisors->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
	<?php if ($employee->sortUrl($employee->department) == "") { ?>
		<th data-name="department" class="<?php echo $employee->department->headerCellClass() ?>"><div id="elh_employee_department" class="employee_department"><div class="ew-table-header-caption"><?php echo $employee->department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department" class="<?php echo $employee->department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->department) ?>',1);"><div id="elh_employee_department" class="employee_department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->department->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom1->Visible) { // custom1 ?>
	<?php if ($employee->sortUrl($employee->custom1) == "") { ?>
		<th data-name="custom1" class="<?php echo $employee->custom1->headerCellClass() ?>"><div id="elh_employee_custom1" class="employee_custom1"><div class="ew-table-header-caption"><?php echo $employee->custom1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom1" class="<?php echo $employee->custom1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom1) ?>',1);"><div id="elh_employee_custom1" class="employee_custom1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
	<?php if ($employee->sortUrl($employee->custom2) == "") { ?>
		<th data-name="custom2" class="<?php echo $employee->custom2->headerCellClass() ?>"><div id="elh_employee_custom2" class="employee_custom2"><div class="ew-table-header-caption"><?php echo $employee->custom2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom2" class="<?php echo $employee->custom2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom2) ?>',1);"><div id="elh_employee_custom2" class="employee_custom2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
	<?php if ($employee->sortUrl($employee->custom3) == "") { ?>
		<th data-name="custom3" class="<?php echo $employee->custom3->headerCellClass() ?>"><div id="elh_employee_custom3" class="employee_custom3"><div class="ew-table-header-caption"><?php echo $employee->custom3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom3" class="<?php echo $employee->custom3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom3) ?>',1);"><div id="elh_employee_custom3" class="employee_custom3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
	<?php if ($employee->sortUrl($employee->custom4) == "") { ?>
		<th data-name="custom4" class="<?php echo $employee->custom4->headerCellClass() ?>"><div id="elh_employee_custom4" class="employee_custom4"><div class="ew-table-header-caption"><?php echo $employee->custom4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom4" class="<?php echo $employee->custom4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom4) ?>',1);"><div id="elh_employee_custom4" class="employee_custom4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
	<?php if ($employee->sortUrl($employee->custom5) == "") { ?>
		<th data-name="custom5" class="<?php echo $employee->custom5->headerCellClass() ?>"><div id="elh_employee_custom5" class="employee_custom5"><div class="ew-table-header-caption"><?php echo $employee->custom5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom5" class="<?php echo $employee->custom5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom5) ?>',1);"><div id="elh_employee_custom5" class="employee_custom5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
	<?php if ($employee->sortUrl($employee->custom6) == "") { ?>
		<th data-name="custom6" class="<?php echo $employee->custom6->headerCellClass() ?>"><div id="elh_employee_custom6" class="employee_custom6"><div class="ew-table-header-caption"><?php echo $employee->custom6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom6" class="<?php echo $employee->custom6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom6) ?>',1);"><div id="elh_employee_custom6" class="employee_custom6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom6->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
	<?php if ($employee->sortUrl($employee->custom7) == "") { ?>
		<th data-name="custom7" class="<?php echo $employee->custom7->headerCellClass() ?>"><div id="elh_employee_custom7" class="employee_custom7"><div class="ew-table-header-caption"><?php echo $employee->custom7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom7" class="<?php echo $employee->custom7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom7) ?>',1);"><div id="elh_employee_custom7" class="employee_custom7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom7->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
	<?php if ($employee->sortUrl($employee->custom8) == "") { ?>
		<th data-name="custom8" class="<?php echo $employee->custom8->headerCellClass() ?>"><div id="elh_employee_custom8" class="employee_custom8"><div class="ew-table-header-caption"><?php echo $employee->custom8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom8" class="<?php echo $employee->custom8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom8) ?>',1);"><div id="elh_employee_custom8" class="employee_custom8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom8->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
	<?php if ($employee->sortUrl($employee->custom9) == "") { ?>
		<th data-name="custom9" class="<?php echo $employee->custom9->headerCellClass() ?>"><div id="elh_employee_custom9" class="employee_custom9"><div class="ew-table-header-caption"><?php echo $employee->custom9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom9" class="<?php echo $employee->custom9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom9) ?>',1);"><div id="elh_employee_custom9" class="employee_custom9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom9->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
	<?php if ($employee->sortUrl($employee->custom10) == "") { ?>
		<th data-name="custom10" class="<?php echo $employee->custom10->headerCellClass() ?>"><div id="elh_employee_custom10" class="employee_custom10"><div class="ew-table-header-caption"><?php echo $employee->custom10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="custom10" class="<?php echo $employee->custom10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->custom10) ?>',1);"><div id="elh_employee_custom10" class="employee_custom10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->custom10->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee->custom10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->custom10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
	<?php if ($employee->sortUrl($employee->termination_date) == "") { ?>
		<th data-name="termination_date" class="<?php echo $employee->termination_date->headerCellClass() ?>"><div id="elh_employee_termination_date" class="employee_termination_date"><div class="ew-table-header-caption"><?php echo $employee->termination_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="termination_date" class="<?php echo $employee->termination_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->termination_date) ?>',1);"><div id="elh_employee_termination_date" class="employee_termination_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->termination_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->termination_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->termination_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
	<?php if ($employee->sortUrl($employee->ethnicity) == "") { ?>
		<th data-name="ethnicity" class="<?php echo $employee->ethnicity->headerCellClass() ?>"><div id="elh_employee_ethnicity" class="employee_ethnicity"><div class="ew-table-header-caption"><?php echo $employee->ethnicity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ethnicity" class="<?php echo $employee->ethnicity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->ethnicity) ?>',1);"><div id="elh_employee_ethnicity" class="employee_ethnicity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->ethnicity->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->ethnicity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->ethnicity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
	<?php if ($employee->sortUrl($employee->immigration_status) == "") { ?>
		<th data-name="immigration_status" class="<?php echo $employee->immigration_status->headerCellClass() ?>"><div id="elh_employee_immigration_status" class="employee_immigration_status"><div class="ew-table-header-caption"><?php echo $employee->immigration_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="immigration_status" class="<?php echo $employee->immigration_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->immigration_status) ?>',1);"><div id="elh_employee_immigration_status" class="employee_immigration_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->immigration_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->immigration_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->immigration_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->approver1->Visible) { // approver1 ?>
	<?php if ($employee->sortUrl($employee->approver1) == "") { ?>
		<th data-name="approver1" class="<?php echo $employee->approver1->headerCellClass() ?>"><div id="elh_employee_approver1" class="employee_approver1"><div class="ew-table-header-caption"><?php echo $employee->approver1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="approver1" class="<?php echo $employee->approver1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->approver1) ?>',1);"><div id="elh_employee_approver1" class="employee_approver1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->approver1->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->approver1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->approver1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
	<?php if ($employee->sortUrl($employee->approver2) == "") { ?>
		<th data-name="approver2" class="<?php echo $employee->approver2->headerCellClass() ?>"><div id="elh_employee_approver2" class="employee_approver2"><div class="ew-table-header-caption"><?php echo $employee->approver2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="approver2" class="<?php echo $employee->approver2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->approver2) ?>',1);"><div id="elh_employee_approver2" class="employee_approver2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->approver2->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->approver2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->approver2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
	<?php if ($employee->sortUrl($employee->approver3) == "") { ?>
		<th data-name="approver3" class="<?php echo $employee->approver3->headerCellClass() ?>"><div id="elh_employee_approver3" class="employee_approver3"><div class="ew-table-header-caption"><?php echo $employee->approver3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="approver3" class="<?php echo $employee->approver3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->approver3) ?>',1);"><div id="elh_employee_approver3" class="employee_approver3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->approver3->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->approver3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->approver3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
	<?php if ($employee->sortUrl($employee->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee->status->headerCellClass() ?>"><div id="elh_employee_status" class="employee_status"><div class="ew-table-header-caption"><?php echo $employee->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->status) ?>',1);"><div id="elh_employee_status" class="employee_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
	<?php if ($employee->sortUrl($employee->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee->HospID->headerCellClass() ?>"><div id="elh_employee_HospID" class="employee_HospID"><div class="ew-table-header-caption"><?php echo $employee->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee->SortUrl($employee->HospID) ?>',1);"><div id="elh_employee_HospID" class="employee_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee->ExportAll && $employee->isExport()) {
	$employee_list->StopRec = $employee_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_list->TotalRecs > $employee_list->StartRec + $employee_list->DisplayRecs - 1)
		$employee_list->StopRec = $employee_list->StartRec + $employee_list->DisplayRecs - 1;
	else
		$employee_list->StopRec = $employee_list->TotalRecs;
}
$employee_list->RecCnt = $employee_list->StartRec - 1;
if ($employee_list->Recordset && !$employee_list->Recordset->EOF) {
	$employee_list->Recordset->moveFirst();
	$selectLimit = $employee_list->UseSelectLimit;
	if (!$selectLimit && $employee_list->StartRec > 1)
		$employee_list->Recordset->move($employee_list->StartRec - 1);
} elseif (!$employee->AllowAddDeleteRow && $employee_list->StopRec == 0) {
	$employee_list->StopRec = $employee->GridAddRowCount;
}

// Initialize aggregate
$employee->RowType = ROWTYPE_AGGREGATEINIT;
$employee->resetAttributes();
$employee_list->renderRow();
while ($employee_list->RecCnt < $employee_list->StopRec) {
	$employee_list->RecCnt++;
	if ($employee_list->RecCnt >= $employee_list->StartRec) {
		$employee_list->RowCnt++;

		// Set up key count
		$employee_list->KeyCount = $employee_list->RowIndex;

		// Init row class and style
		$employee->resetAttributes();
		$employee->CssClass = "";
		if ($employee->isGridAdd()) {
		} else {
			$employee_list->loadRowValues($employee_list->Recordset); // Load row values
		}
		$employee->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee->RowAttrs = array_merge($employee->RowAttrs, array('data-rowindex'=>$employee_list->RowCnt, 'id'=>'r' . $employee_list->RowCnt . '_employee', 'data-rowtype'=>$employee->RowType));

		// Render row
		$employee_list->renderRow();

		// Render list options
		$employee_list->renderListOptions();
?>
	<tr<?php echo $employee->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_list->ListOptions->render("body", "left", $employee_list->RowCnt);
?>
	<?php if ($employee->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee->id->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_id" class="employee_id">
<span<?php echo $employee->id->viewAttributes() ?>>
<?php echo $employee->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_employee_id" class="employee_employee_id">
<span<?php echo $employee->employee_id->viewAttributes() ?>>
<?php echo $employee->employee_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $employee->first_name->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_first_name" class="employee_first_name">
<span<?php echo $employee->first_name->viewAttributes() ?>>
<?php echo $employee->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name"<?php echo $employee->middle_name->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_middle_name" class="employee_middle_name">
<span<?php echo $employee->middle_name->viewAttributes() ?>>
<?php echo $employee->middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->last_name->Visible) { // last_name ?>
		<td data-name="last_name"<?php echo $employee->last_name->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_last_name" class="employee_last_name">
<span<?php echo $employee->last_name->viewAttributes() ?>>
<?php echo $employee->last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $employee->gender->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_gender" class="employee_gender">
<span<?php echo $employee->gender->viewAttributes() ?>>
<?php echo $employee->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->nationality->Visible) { // nationality ?>
		<td data-name="nationality"<?php echo $employee->nationality->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_nationality" class="employee_nationality">
<span<?php echo $employee->nationality->viewAttributes() ?>>
<?php echo $employee->nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->birthday->Visible) { // birthday ?>
		<td data-name="birthday"<?php echo $employee->birthday->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_birthday" class="employee_birthday">
<span<?php echo $employee->birthday->viewAttributes() ?>>
<?php echo $employee->birthday->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->marital_status->Visible) { // marital_status ?>
		<td data-name="marital_status"<?php echo $employee->marital_status->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_marital_status" class="employee_marital_status">
<span<?php echo $employee->marital_status->viewAttributes() ?>>
<?php echo $employee->marital_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
		<td data-name="ssn_num"<?php echo $employee->ssn_num->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_ssn_num" class="employee_ssn_num">
<span<?php echo $employee->ssn_num->viewAttributes() ?>>
<?php echo $employee->ssn_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->nic_num->Visible) { // nic_num ?>
		<td data-name="nic_num"<?php echo $employee->nic_num->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_nic_num" class="employee_nic_num">
<span<?php echo $employee->nic_num->viewAttributes() ?>>
<?php echo $employee->nic_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->other_id->Visible) { // other_id ?>
		<td data-name="other_id"<?php echo $employee->other_id->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_other_id" class="employee_other_id">
<span<?php echo $employee->other_id->viewAttributes() ?>>
<?php echo $employee->other_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->driving_license->Visible) { // driving_license ?>
		<td data-name="driving_license"<?php echo $employee->driving_license->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_driving_license" class="employee_driving_license">
<span<?php echo $employee->driving_license->viewAttributes() ?>>
<?php echo $employee->driving_license->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
		<td data-name="driving_license_exp_date"<?php echo $employee->driving_license_exp_date->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_driving_license_exp_date" class="employee_driving_license_exp_date">
<span<?php echo $employee->driving_license_exp_date->viewAttributes() ?>>
<?php echo $employee->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->employment_status->Visible) { // employment_status ?>
		<td data-name="employment_status"<?php echo $employee->employment_status->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_employment_status" class="employee_employment_status">
<span<?php echo $employee->employment_status->viewAttributes() ?>>
<?php echo $employee->employment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->job_title->Visible) { // job_title ?>
		<td data-name="job_title"<?php echo $employee->job_title->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_job_title" class="employee_job_title">
<span<?php echo $employee->job_title->viewAttributes() ?>>
<?php echo $employee->job_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
		<td data-name="pay_grade"<?php echo $employee->pay_grade->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_pay_grade" class="employee_pay_grade">
<span<?php echo $employee->pay_grade->viewAttributes() ?>>
<?php echo $employee->pay_grade->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
		<td data-name="work_station_id"<?php echo $employee->work_station_id->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_work_station_id" class="employee_work_station_id">
<span<?php echo $employee->work_station_id->viewAttributes() ?>>
<?php echo $employee->work_station_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->address1->Visible) { // address1 ?>
		<td data-name="address1"<?php echo $employee->address1->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_address1" class="employee_address1">
<span<?php echo $employee->address1->viewAttributes() ?>>
<?php echo $employee->address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->address2->Visible) { // address2 ?>
		<td data-name="address2"<?php echo $employee->address2->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_address2" class="employee_address2">
<span<?php echo $employee->address2->viewAttributes() ?>>
<?php echo $employee->address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->city->Visible) { // city ?>
		<td data-name="city"<?php echo $employee->city->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_city" class="employee_city">
<span<?php echo $employee->city->viewAttributes() ?>>
<?php echo $employee->city->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->country->Visible) { // country ?>
		<td data-name="country"<?php echo $employee->country->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_country" class="employee_country">
<span<?php echo $employee->country->viewAttributes() ?>>
<?php echo $employee->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->province->Visible) { // province ?>
		<td data-name="province"<?php echo $employee->province->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_province" class="employee_province">
<span<?php echo $employee->province->viewAttributes() ?>>
<?php echo $employee->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $employee->postal_code->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_postal_code" class="employee_postal_code">
<span<?php echo $employee->postal_code->viewAttributes() ?>>
<?php echo $employee->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->home_phone->Visible) { // home_phone ?>
		<td data-name="home_phone"<?php echo $employee->home_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_home_phone" class="employee_home_phone">
<span<?php echo $employee->home_phone->viewAttributes() ?>>
<?php echo $employee->home_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
		<td data-name="mobile_phone"<?php echo $employee->mobile_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_mobile_phone" class="employee_mobile_phone">
<span<?php echo $employee->mobile_phone->viewAttributes() ?>>
<?php echo $employee->mobile_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->work_phone->Visible) { // work_phone ?>
		<td data-name="work_phone"<?php echo $employee->work_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_work_phone" class="employee_work_phone">
<span<?php echo $employee->work_phone->viewAttributes() ?>>
<?php echo $employee->work_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->work_email->Visible) { // work_email ?>
		<td data-name="work_email"<?php echo $employee->work_email->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_work_email" class="employee_work_email">
<span<?php echo $employee->work_email->viewAttributes() ?>>
<?php echo $employee->work_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->private_email->Visible) { // private_email ?>
		<td data-name="private_email"<?php echo $employee->private_email->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_private_email" class="employee_private_email">
<span<?php echo $employee->private_email->viewAttributes() ?>>
<?php echo $employee->private_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->joined_date->Visible) { // joined_date ?>
		<td data-name="joined_date"<?php echo $employee->joined_date->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_joined_date" class="employee_joined_date">
<span<?php echo $employee->joined_date->viewAttributes() ?>>
<?php echo $employee->joined_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
		<td data-name="confirmation_date"<?php echo $employee->confirmation_date->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_confirmation_date" class="employee_confirmation_date">
<span<?php echo $employee->confirmation_date->viewAttributes() ?>>
<?php echo $employee->confirmation_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->supervisor->Visible) { // supervisor ?>
		<td data-name="supervisor"<?php echo $employee->supervisor->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_supervisor" class="employee_supervisor">
<span<?php echo $employee->supervisor->viewAttributes() ?>>
<?php echo $employee->supervisor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
		<td data-name="indirect_supervisors"<?php echo $employee->indirect_supervisors->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_indirect_supervisors" class="employee_indirect_supervisors">
<span<?php echo $employee->indirect_supervisors->viewAttributes() ?>>
<?php echo $employee->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->department->Visible) { // department ?>
		<td data-name="department"<?php echo $employee->department->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_department" class="employee_department">
<span<?php echo $employee->department->viewAttributes() ?>>
<?php echo $employee->department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom1->Visible) { // custom1 ?>
		<td data-name="custom1"<?php echo $employee->custom1->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom1" class="employee_custom1">
<span<?php echo $employee->custom1->viewAttributes() ?>>
<?php echo $employee->custom1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom2->Visible) { // custom2 ?>
		<td data-name="custom2"<?php echo $employee->custom2->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom2" class="employee_custom2">
<span<?php echo $employee->custom2->viewAttributes() ?>>
<?php echo $employee->custom2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom3->Visible) { // custom3 ?>
		<td data-name="custom3"<?php echo $employee->custom3->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom3" class="employee_custom3">
<span<?php echo $employee->custom3->viewAttributes() ?>>
<?php echo $employee->custom3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom4->Visible) { // custom4 ?>
		<td data-name="custom4"<?php echo $employee->custom4->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom4" class="employee_custom4">
<span<?php echo $employee->custom4->viewAttributes() ?>>
<?php echo $employee->custom4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom5->Visible) { // custom5 ?>
		<td data-name="custom5"<?php echo $employee->custom5->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom5" class="employee_custom5">
<span<?php echo $employee->custom5->viewAttributes() ?>>
<?php echo $employee->custom5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom6->Visible) { // custom6 ?>
		<td data-name="custom6"<?php echo $employee->custom6->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom6" class="employee_custom6">
<span<?php echo $employee->custom6->viewAttributes() ?>>
<?php echo $employee->custom6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom7->Visible) { // custom7 ?>
		<td data-name="custom7"<?php echo $employee->custom7->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom7" class="employee_custom7">
<span<?php echo $employee->custom7->viewAttributes() ?>>
<?php echo $employee->custom7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom8->Visible) { // custom8 ?>
		<td data-name="custom8"<?php echo $employee->custom8->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom8" class="employee_custom8">
<span<?php echo $employee->custom8->viewAttributes() ?>>
<?php echo $employee->custom8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom9->Visible) { // custom9 ?>
		<td data-name="custom9"<?php echo $employee->custom9->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom9" class="employee_custom9">
<span<?php echo $employee->custom9->viewAttributes() ?>>
<?php echo $employee->custom9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->custom10->Visible) { // custom10 ?>
		<td data-name="custom10"<?php echo $employee->custom10->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_custom10" class="employee_custom10">
<span<?php echo $employee->custom10->viewAttributes() ?>>
<?php echo $employee->custom10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->termination_date->Visible) { // termination_date ?>
		<td data-name="termination_date"<?php echo $employee->termination_date->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_termination_date" class="employee_termination_date">
<span<?php echo $employee->termination_date->viewAttributes() ?>>
<?php echo $employee->termination_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
		<td data-name="ethnicity"<?php echo $employee->ethnicity->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_ethnicity" class="employee_ethnicity">
<span<?php echo $employee->ethnicity->viewAttributes() ?>>
<?php echo $employee->ethnicity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
		<td data-name="immigration_status"<?php echo $employee->immigration_status->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_immigration_status" class="employee_immigration_status">
<span<?php echo $employee->immigration_status->viewAttributes() ?>>
<?php echo $employee->immigration_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->approver1->Visible) { // approver1 ?>
		<td data-name="approver1"<?php echo $employee->approver1->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_approver1" class="employee_approver1">
<span<?php echo $employee->approver1->viewAttributes() ?>>
<?php echo $employee->approver1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->approver2->Visible) { // approver2 ?>
		<td data-name="approver2"<?php echo $employee->approver2->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_approver2" class="employee_approver2">
<span<?php echo $employee->approver2->viewAttributes() ?>>
<?php echo $employee->approver2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->approver3->Visible) { // approver3 ?>
		<td data-name="approver3"<?php echo $employee->approver3->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_approver3" class="employee_approver3">
<span<?php echo $employee->approver3->viewAttributes() ?>>
<?php echo $employee->approver3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee->status->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_status" class="employee_status">
<span<?php echo $employee->status->viewAttributes() ?>>
<?php echo $employee->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_list->RowCnt ?>_employee_HospID" class="employee_HospID">
<span<?php echo $employee->HospID->viewAttributes() ?>>
<?php echo $employee->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_list->ListOptions->render("body", "right", $employee_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee->isGridAdd())
		$employee_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_list->Recordset)
	$employee_list->Recordset->Close();
?>
<?php if (!$employee->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_list->Pager)) $employee_list->Pager = new NumericPager($employee_list->StartRec, $employee_list->DisplayRecs, $employee_list->TotalRecs, $employee_list->RecRange, $employee_list->AutoHidePager) ?>
<?php if ($employee_list->Pager->RecordCount > 0 && $employee_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_list->pageUrl() ?>start=<?php echo $employee_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_list->TotalRecs > 0 && (!$employee_list->AutoHidePageSizeSelector || $employee_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_list->TotalRecs == 0 && !$employee->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_list->terminate();
?>