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
$employee_immigrations_list = new employee_immigrations_list();

// Run the page
$employee_immigrations_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrations_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_immigrations->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_immigrationslist = currentForm = new ew.Form("femployee_immigrationslist", "list");
femployee_immigrationslist.formKeyCountName = '<?php echo $employee_immigrations_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_immigrationslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationslist.lists["x_status"] = <?php echo $employee_immigrations_list->status->Lookup->toClientList() ?>;
femployee_immigrationslist.lists["x_status"].options = <?php echo JsonEncode($employee_immigrations_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_immigrationslistsrch = currentSearchForm = new ew.Form("femployee_immigrationslistsrch");

// Validate function for search
femployee_immigrationslistsrch.validate = function(fobj) {
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
femployee_immigrationslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationslistsrch.lists["x_status"] = <?php echo $employee_immigrations_list->status->Lookup->toClientList() ?>;
femployee_immigrationslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_immigrations_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_immigrationslistsrch.filterList = <?php echo $employee_immigrations_list->getFilterList() ?>;
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
<?php if (!$employee_immigrations->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_immigrations_list->TotalRecs > 0 && $employee_immigrations_list->ExportOptions->visible()) { ?>
<?php $employee_immigrations_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_immigrations_list->ImportOptions->visible()) { ?>
<?php $employee_immigrations_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_immigrations_list->SearchOptions->visible()) { ?>
<?php $employee_immigrations_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_immigrations_list->FilterOptions->visible()) { ?>
<?php $employee_immigrations_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_immigrations_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_immigrations->isExport() && !$employee_immigrations->CurrentAction) { ?>
<form name="femployee_immigrationslistsrch" id="femployee_immigrationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_immigrations_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_immigrationslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_immigrations">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_immigrations_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_immigrations->RowType = ROWTYPE_SEARCH;

// Render row
$employee_immigrations->resetAttributes();
$employee_immigrations_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_immigrations->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_immigrations->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrations" data-field="x_status" data-value-separator="<?php echo $employee_immigrations->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_immigrations->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrations->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_immigrations_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_immigrations_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_immigrations_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_immigrations_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_immigrations_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_immigrations_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_immigrations_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_immigrations_list->showPageHeader(); ?>
<?php
$employee_immigrations_list->showMessage();
?>
<?php if ($employee_immigrations_list->TotalRecs > 0 || $employee_immigrations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_immigrations_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_immigrations">
<?php if (!$employee_immigrations->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_immigrations->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_immigrations_list->Pager)) $employee_immigrations_list->Pager = new NumericPager($employee_immigrations_list->StartRec, $employee_immigrations_list->DisplayRecs, $employee_immigrations_list->TotalRecs, $employee_immigrations_list->RecRange, $employee_immigrations_list->AutoHidePager) ?>
<?php if ($employee_immigrations_list->Pager->RecordCount > 0 && $employee_immigrations_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_immigrations_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrations_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_immigrations_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_immigrations_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrations_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrations_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_immigrations_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_immigrations_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_immigrations_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_immigrations_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_immigrations_list->TotalRecs > 0 && (!$employee_immigrations_list->AutoHidePageSizeSelector || $employee_immigrations_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_immigrations">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_immigrations_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_immigrations_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_immigrations_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_immigrations_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_immigrations_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_immigrations_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_immigrations->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_immigrations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_immigrationslist" id="femployee_immigrationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrations_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrations_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<div id="gmp_employee_immigrations" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_immigrations_list->TotalRecs > 0 || $employee_immigrations->isGridEdit()) { ?>
<table id="tbl_employee_immigrationslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_immigrations_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_immigrations_list->renderListOptions();

// Render list options (header, left)
$employee_immigrations_list->ListOptions->render("header", "left");
?>
<?php if ($employee_immigrations->id->Visible) { // id ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_immigrations->id->headerCellClass() ?>"><div id="elh_employee_immigrations_id" class="employee_immigrations_id"><div class="ew-table-header-caption"><?php echo $employee_immigrations->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_immigrations->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->id) ?>',1);"><div id="elh_employee_immigrations_id" class="employee_immigrations_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->employee->Visible) { // employee ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_immigrations->employee->headerCellClass() ?>"><div id="elh_employee_immigrations_employee" class="employee_immigrations_employee"><div class="ew-table-header-caption"><?php echo $employee_immigrations->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_immigrations->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->employee) ?>',1);"><div id="elh_employee_immigrations_employee" class="employee_immigrations_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->document->Visible) { // document ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->document) == "") { ?>
		<th data-name="document" class="<?php echo $employee_immigrations->document->headerCellClass() ?>"><div id="elh_employee_immigrations_document" class="employee_immigrations_document"><div class="ew-table-header-caption"><?php echo $employee_immigrations->document->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="document" class="<?php echo $employee_immigrations->document->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->document) ?>',1);"><div id="elh_employee_immigrations_document" class="employee_immigrations_document">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->document->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->document->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->document->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->documentname->Visible) { // documentname ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->documentname) == "") { ?>
		<th data-name="documentname" class="<?php echo $employee_immigrations->documentname->headerCellClass() ?>"><div id="elh_employee_immigrations_documentname" class="employee_immigrations_documentname"><div class="ew-table-header-caption"><?php echo $employee_immigrations->documentname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="documentname" class="<?php echo $employee_immigrations->documentname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->documentname) ?>',1);"><div id="elh_employee_immigrations_documentname" class="employee_immigrations_documentname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->documentname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->documentname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->documentname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->valid_until->Visible) { // valid_until ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->valid_until) == "") { ?>
		<th data-name="valid_until" class="<?php echo $employee_immigrations->valid_until->headerCellClass() ?>"><div id="elh_employee_immigrations_valid_until" class="employee_immigrations_valid_until"><div class="ew-table-header-caption"><?php echo $employee_immigrations->valid_until->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="valid_until" class="<?php echo $employee_immigrations->valid_until->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->valid_until) ?>',1);"><div id="elh_employee_immigrations_valid_until" class="employee_immigrations_valid_until">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->valid_until->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->valid_until->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->valid_until->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->status->Visible) { // status ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_immigrations->status->headerCellClass() ?>"><div id="elh_employee_immigrations_status" class="employee_immigrations_status"><div class="ew-table-header-caption"><?php echo $employee_immigrations->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_immigrations->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->status) ?>',1);"><div id="elh_employee_immigrations_status" class="employee_immigrations_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->attachment1->Visible) { // attachment1 ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->attachment1) == "") { ?>
		<th data-name="attachment1" class="<?php echo $employee_immigrations->attachment1->headerCellClass() ?>"><div id="elh_employee_immigrations_attachment1" class="employee_immigrations_attachment1"><div class="ew-table-header-caption"><?php echo $employee_immigrations->attachment1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment1" class="<?php echo $employee_immigrations->attachment1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->attachment1) ?>',1);"><div id="elh_employee_immigrations_attachment1" class="employee_immigrations_attachment1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->attachment1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->attachment1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->attachment1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->attachment2->Visible) { // attachment2 ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->attachment2) == "") { ?>
		<th data-name="attachment2" class="<?php echo $employee_immigrations->attachment2->headerCellClass() ?>"><div id="elh_employee_immigrations_attachment2" class="employee_immigrations_attachment2"><div class="ew-table-header-caption"><?php echo $employee_immigrations->attachment2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment2" class="<?php echo $employee_immigrations->attachment2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->attachment2) ?>',1);"><div id="elh_employee_immigrations_attachment2" class="employee_immigrations_attachment2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->attachment2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->attachment2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->attachment2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->attachment3->Visible) { // attachment3 ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->attachment3) == "") { ?>
		<th data-name="attachment3" class="<?php echo $employee_immigrations->attachment3->headerCellClass() ?>"><div id="elh_employee_immigrations_attachment3" class="employee_immigrations_attachment3"><div class="ew-table-header-caption"><?php echo $employee_immigrations->attachment3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment3" class="<?php echo $employee_immigrations->attachment3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->attachment3) ?>',1);"><div id="elh_employee_immigrations_attachment3" class="employee_immigrations_attachment3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->attachment3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->attachment3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->attachment3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->created->Visible) { // created ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->created) == "") { ?>
		<th data-name="created" class="<?php echo $employee_immigrations->created->headerCellClass() ?>"><div id="elh_employee_immigrations_created" class="employee_immigrations_created"><div class="ew-table-header-caption"><?php echo $employee_immigrations->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $employee_immigrations->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->created) ?>',1);"><div id="elh_employee_immigrations_created" class="employee_immigrations_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrations->updated->Visible) { // updated ?>
	<?php if ($employee_immigrations->sortUrl($employee_immigrations->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $employee_immigrations->updated->headerCellClass() ?>"><div id="elh_employee_immigrations_updated" class="employee_immigrations_updated"><div class="ew-table-header-caption"><?php echo $employee_immigrations->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $employee_immigrations->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrations->SortUrl($employee_immigrations->updated) ?>',1);"><div id="elh_employee_immigrations_updated" class="employee_immigrations_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrations->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrations->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrations->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_immigrations_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_immigrations->ExportAll && $employee_immigrations->isExport()) {
	$employee_immigrations_list->StopRec = $employee_immigrations_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_immigrations_list->TotalRecs > $employee_immigrations_list->StartRec + $employee_immigrations_list->DisplayRecs - 1)
		$employee_immigrations_list->StopRec = $employee_immigrations_list->StartRec + $employee_immigrations_list->DisplayRecs - 1;
	else
		$employee_immigrations_list->StopRec = $employee_immigrations_list->TotalRecs;
}
$employee_immigrations_list->RecCnt = $employee_immigrations_list->StartRec - 1;
if ($employee_immigrations_list->Recordset && !$employee_immigrations_list->Recordset->EOF) {
	$employee_immigrations_list->Recordset->moveFirst();
	$selectLimit = $employee_immigrations_list->UseSelectLimit;
	if (!$selectLimit && $employee_immigrations_list->StartRec > 1)
		$employee_immigrations_list->Recordset->move($employee_immigrations_list->StartRec - 1);
} elseif (!$employee_immigrations->AllowAddDeleteRow && $employee_immigrations_list->StopRec == 0) {
	$employee_immigrations_list->StopRec = $employee_immigrations->GridAddRowCount;
}

// Initialize aggregate
$employee_immigrations->RowType = ROWTYPE_AGGREGATEINIT;
$employee_immigrations->resetAttributes();
$employee_immigrations_list->renderRow();
while ($employee_immigrations_list->RecCnt < $employee_immigrations_list->StopRec) {
	$employee_immigrations_list->RecCnt++;
	if ($employee_immigrations_list->RecCnt >= $employee_immigrations_list->StartRec) {
		$employee_immigrations_list->RowCnt++;

		// Set up key count
		$employee_immigrations_list->KeyCount = $employee_immigrations_list->RowIndex;

		// Init row class and style
		$employee_immigrations->resetAttributes();
		$employee_immigrations->CssClass = "";
		if ($employee_immigrations->isGridAdd()) {
		} else {
			$employee_immigrations_list->loadRowValues($employee_immigrations_list->Recordset); // Load row values
		}
		$employee_immigrations->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_immigrations->RowAttrs = array_merge($employee_immigrations->RowAttrs, array('data-rowindex'=>$employee_immigrations_list->RowCnt, 'id'=>'r' . $employee_immigrations_list->RowCnt . '_employee_immigrations', 'data-rowtype'=>$employee_immigrations->RowType));

		// Render row
		$employee_immigrations_list->renderRow();

		// Render list options
		$employee_immigrations_list->renderListOptions();
?>
	<tr<?php echo $employee_immigrations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_immigrations_list->ListOptions->render("body", "left", $employee_immigrations_list->RowCnt);
?>
	<?php if ($employee_immigrations->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_immigrations->id->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_id" class="employee_immigrations_id">
<span<?php echo $employee_immigrations->id->viewAttributes() ?>>
<?php echo $employee_immigrations->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_immigrations->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_employee" class="employee_immigrations_employee">
<span<?php echo $employee_immigrations->employee->viewAttributes() ?>>
<?php echo $employee_immigrations->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->document->Visible) { // document ?>
		<td data-name="document"<?php echo $employee_immigrations->document->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_document" class="employee_immigrations_document">
<span<?php echo $employee_immigrations->document->viewAttributes() ?>>
<?php echo $employee_immigrations->document->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->documentname->Visible) { // documentname ?>
		<td data-name="documentname"<?php echo $employee_immigrations->documentname->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_documentname" class="employee_immigrations_documentname">
<span<?php echo $employee_immigrations->documentname->viewAttributes() ?>>
<?php echo $employee_immigrations->documentname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->valid_until->Visible) { // valid_until ?>
		<td data-name="valid_until"<?php echo $employee_immigrations->valid_until->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_valid_until" class="employee_immigrations_valid_until">
<span<?php echo $employee_immigrations->valid_until->viewAttributes() ?>>
<?php echo $employee_immigrations->valid_until->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_immigrations->status->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_status" class="employee_immigrations_status">
<span<?php echo $employee_immigrations->status->viewAttributes() ?>>
<?php echo $employee_immigrations->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->attachment1->Visible) { // attachment1 ?>
		<td data-name="attachment1"<?php echo $employee_immigrations->attachment1->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_attachment1" class="employee_immigrations_attachment1">
<span<?php echo $employee_immigrations->attachment1->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->attachment2->Visible) { // attachment2 ?>
		<td data-name="attachment2"<?php echo $employee_immigrations->attachment2->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_attachment2" class="employee_immigrations_attachment2">
<span<?php echo $employee_immigrations->attachment2->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->attachment3->Visible) { // attachment3 ?>
		<td data-name="attachment3"<?php echo $employee_immigrations->attachment3->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_attachment3" class="employee_immigrations_attachment3">
<span<?php echo $employee_immigrations->attachment3->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->created->Visible) { // created ?>
		<td data-name="created"<?php echo $employee_immigrations->created->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_created" class="employee_immigrations_created">
<span<?php echo $employee_immigrations->created->viewAttributes() ?>>
<?php echo $employee_immigrations->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrations->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $employee_immigrations->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_list->RowCnt ?>_employee_immigrations_updated" class="employee_immigrations_updated">
<span<?php echo $employee_immigrations->updated->viewAttributes() ?>>
<?php echo $employee_immigrations->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_immigrations_list->ListOptions->render("body", "right", $employee_immigrations_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_immigrations->isGridAdd())
		$employee_immigrations_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_immigrations->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_immigrations_list->Recordset)
	$employee_immigrations_list->Recordset->Close();
?>
<?php if (!$employee_immigrations->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_immigrations->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_immigrations_list->Pager)) $employee_immigrations_list->Pager = new NumericPager($employee_immigrations_list->StartRec, $employee_immigrations_list->DisplayRecs, $employee_immigrations_list->TotalRecs, $employee_immigrations_list->RecRange, $employee_immigrations_list->AutoHidePager) ?>
<?php if ($employee_immigrations_list->Pager->RecordCount > 0 && $employee_immigrations_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_immigrations_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrations_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_immigrations_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_immigrations_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrations_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrations_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrations_list->pageUrl() ?>start=<?php echo $employee_immigrations_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_immigrations_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_immigrations_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_immigrations_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_immigrations_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_immigrations_list->TotalRecs > 0 && (!$employee_immigrations_list->AutoHidePageSizeSelector || $employee_immigrations_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_immigrations">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_immigrations_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_immigrations_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_immigrations_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_immigrations_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_immigrations_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_immigrations_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_immigrations->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_immigrations_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_immigrations_list->TotalRecs == 0 && !$employee_immigrations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_immigrations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_immigrations_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_immigrations->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_immigrations->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_immigrations", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_immigrations_list->terminate();
?>