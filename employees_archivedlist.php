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
$employees_archived_list = new employees_archived_list();

// Run the page
$employees_archived_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_archived_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employees_archived->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployees_archivedlist = currentForm = new ew.Form("femployees_archivedlist", "list");
femployees_archivedlist.formKeyCountName = '<?php echo $employees_archived_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployees_archivedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_archivedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployees_archivedlist.lists["x_gender"] = <?php echo $employees_archived_list->gender->Lookup->toClientList() ?>;
femployees_archivedlist.lists["x_gender"].options = <?php echo JsonEncode($employees_archived_list->gender->options(FALSE, TRUE)) ?>;

// Form object for search
var femployees_archivedlistsrch = currentSearchForm = new ew.Form("femployees_archivedlistsrch");

// Validate function for search
femployees_archivedlistsrch.validate = function(fobj) {
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
femployees_archivedlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_archivedlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployees_archivedlistsrch.lists["x_gender"] = <?php echo $employees_archived_list->gender->Lookup->toClientList() ?>;
femployees_archivedlistsrch.lists["x_gender"].options = <?php echo JsonEncode($employees_archived_list->gender->options(FALSE, TRUE)) ?>;

// Filters
femployees_archivedlistsrch.filterList = <?php echo $employees_archived_list->getFilterList() ?>;
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
<?php if (!$employees_archived->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employees_archived_list->TotalRecs > 0 && $employees_archived_list->ExportOptions->visible()) { ?>
<?php $employees_archived_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employees_archived_list->ImportOptions->visible()) { ?>
<?php $employees_archived_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employees_archived_list->SearchOptions->visible()) { ?>
<?php $employees_archived_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employees_archived_list->FilterOptions->visible()) { ?>
<?php $employees_archived_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employees_archived_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employees_archived->isExport() && !$employees_archived->CurrentAction) { ?>
<form name="femployees_archivedlistsrch" id="femployees_archivedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employees_archived_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployees_archivedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employees_archived">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employees_archived_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employees_archived->RowType = ROWTYPE_SEARCH;

// Render row
$employees_archived->resetAttributes();
$employees_archived_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employees_archived->gender->Visible) { // gender ?>
	<div id="xsc_gender" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employees_archived->gender->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_gender" id="z_gender" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_gender" class="ew-template"><input type="radio" class="form-check-input" data-table="employees_archived" data-field="x_gender" data-value-separator="<?php echo $employees_archived->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="{value}"<?php echo $employees_archived->gender->editAttributes() ?>></div>
<div id="dsl_x_gender" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employees_archived->gender->radioButtonListHtml(FALSE, "x_gender") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employees_archived_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employees_archived_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employees_archived_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employees_archived_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employees_archived_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employees_archived_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employees_archived_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employees_archived_list->showPageHeader(); ?>
<?php
$employees_archived_list->showMessage();
?>
<?php if ($employees_archived_list->TotalRecs > 0 || $employees_archived->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employees_archived_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employees_archived">
<?php if (!$employees_archived->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employees_archived->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employees_archived_list->Pager)) $employees_archived_list->Pager = new NumericPager($employees_archived_list->StartRec, $employees_archived_list->DisplayRecs, $employees_archived_list->TotalRecs, $employees_archived_list->RecRange, $employees_archived_list->AutoHidePager) ?>
<?php if ($employees_archived_list->Pager->RecordCount > 0 && $employees_archived_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employees_archived_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employees_archived_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employees_archived_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employees_archived_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employees_archived_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employees_archived_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employees_archived_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employees_archived_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employees_archived_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employees_archived_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employees_archived_list->TotalRecs > 0 && (!$employees_archived_list->AutoHidePageSizeSelector || $employees_archived_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employees_archived">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employees_archived_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employees_archived_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employees_archived_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employees_archived_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employees_archived_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employees_archived_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employees_archived->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employees_archived_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployees_archivedlist" id="femployees_archivedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_archived_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_archived_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<div id="gmp_employees_archived" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employees_archived_list->TotalRecs > 0 || $employees_archived->isGridEdit()) { ?>
<table id="tbl_employees_archivedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employees_archived_list->RowType = ROWTYPE_HEADER;

// Render list options
$employees_archived_list->renderListOptions();

// Render list options (header, left)
$employees_archived_list->ListOptions->render("header", "left");
?>
<?php if ($employees_archived->id->Visible) { // id ?>
	<?php if ($employees_archived->sortUrl($employees_archived->id) == "") { ?>
		<th data-name="id" class="<?php echo $employees_archived->id->headerCellClass() ?>"><div id="elh_employees_archived_id" class="employees_archived_id"><div class="ew-table-header-caption"><?php echo $employees_archived->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employees_archived->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->id) ?>',1);"><div id="elh_employees_archived_id" class="employees_archived_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->ref_id->Visible) { // ref_id ?>
	<?php if ($employees_archived->sortUrl($employees_archived->ref_id) == "") { ?>
		<th data-name="ref_id" class="<?php echo $employees_archived->ref_id->headerCellClass() ?>"><div id="elh_employees_archived_ref_id" class="employees_archived_ref_id"><div class="ew-table-header-caption"><?php echo $employees_archived->ref_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ref_id" class="<?php echo $employees_archived->ref_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->ref_id) ?>',1);"><div id="elh_employees_archived_ref_id" class="employees_archived_ref_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->ref_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->ref_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->ref_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->employee_id->Visible) { // employee_id ?>
	<?php if ($employees_archived->sortUrl($employees_archived->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employees_archived->employee_id->headerCellClass() ?>"><div id="elh_employees_archived_employee_id" class="employees_archived_employee_id"><div class="ew-table-header-caption"><?php echo $employees_archived->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employees_archived->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->employee_id) ?>',1);"><div id="elh_employees_archived_employee_id" class="employees_archived_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->employee_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->first_name->Visible) { // first_name ?>
	<?php if ($employees_archived->sortUrl($employees_archived->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $employees_archived->first_name->headerCellClass() ?>"><div id="elh_employees_archived_first_name" class="employees_archived_first_name"><div class="ew-table-header-caption"><?php echo $employees_archived->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $employees_archived->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->first_name) ?>',1);"><div id="elh_employees_archived_first_name" class="employees_archived_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->last_name->Visible) { // last_name ?>
	<?php if ($employees_archived->sortUrl($employees_archived->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $employees_archived->last_name->headerCellClass() ?>"><div id="elh_employees_archived_last_name" class="employees_archived_last_name"><div class="ew-table-header-caption"><?php echo $employees_archived->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $employees_archived->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->last_name) ?>',1);"><div id="elh_employees_archived_last_name" class="employees_archived_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->gender->Visible) { // gender ?>
	<?php if ($employees_archived->sortUrl($employees_archived->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $employees_archived->gender->headerCellClass() ?>"><div id="elh_employees_archived_gender" class="employees_archived_gender"><div class="ew-table-header-caption"><?php echo $employees_archived->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $employees_archived->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->gender) ?>',1);"><div id="elh_employees_archived_gender" class="employees_archived_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->ssn_num->Visible) { // ssn_num ?>
	<?php if ($employees_archived->sortUrl($employees_archived->ssn_num) == "") { ?>
		<th data-name="ssn_num" class="<?php echo $employees_archived->ssn_num->headerCellClass() ?>"><div id="elh_employees_archived_ssn_num" class="employees_archived_ssn_num"><div class="ew-table-header-caption"><?php echo $employees_archived->ssn_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ssn_num" class="<?php echo $employees_archived->ssn_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->ssn_num) ?>',1);"><div id="elh_employees_archived_ssn_num" class="employees_archived_ssn_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->ssn_num->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->ssn_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->ssn_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->nic_num->Visible) { // nic_num ?>
	<?php if ($employees_archived->sortUrl($employees_archived->nic_num) == "") { ?>
		<th data-name="nic_num" class="<?php echo $employees_archived->nic_num->headerCellClass() ?>"><div id="elh_employees_archived_nic_num" class="employees_archived_nic_num"><div class="ew-table-header-caption"><?php echo $employees_archived->nic_num->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nic_num" class="<?php echo $employees_archived->nic_num->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->nic_num) ?>',1);"><div id="elh_employees_archived_nic_num" class="employees_archived_nic_num">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->nic_num->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->nic_num->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->nic_num->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->other_id->Visible) { // other_id ?>
	<?php if ($employees_archived->sortUrl($employees_archived->other_id) == "") { ?>
		<th data-name="other_id" class="<?php echo $employees_archived->other_id->headerCellClass() ?>"><div id="elh_employees_archived_other_id" class="employees_archived_other_id"><div class="ew-table-header-caption"><?php echo $employees_archived->other_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="other_id" class="<?php echo $employees_archived->other_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->other_id) ?>',1);"><div id="elh_employees_archived_other_id" class="employees_archived_other_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->other_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->other_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->other_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->work_email->Visible) { // work_email ?>
	<?php if ($employees_archived->sortUrl($employees_archived->work_email) == "") { ?>
		<th data-name="work_email" class="<?php echo $employees_archived->work_email->headerCellClass() ?>"><div id="elh_employees_archived_work_email" class="employees_archived_work_email"><div class="ew-table-header-caption"><?php echo $employees_archived->work_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="work_email" class="<?php echo $employees_archived->work_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->work_email) ?>',1);"><div id="elh_employees_archived_work_email" class="employees_archived_work_email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->work_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->work_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->work_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->joined_date->Visible) { // joined_date ?>
	<?php if ($employees_archived->sortUrl($employees_archived->joined_date) == "") { ?>
		<th data-name="joined_date" class="<?php echo $employees_archived->joined_date->headerCellClass() ?>"><div id="elh_employees_archived_joined_date" class="employees_archived_joined_date"><div class="ew-table-header-caption"><?php echo $employees_archived->joined_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="joined_date" class="<?php echo $employees_archived->joined_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->joined_date) ?>',1);"><div id="elh_employees_archived_joined_date" class="employees_archived_joined_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->joined_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->joined_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->joined_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->confirmation_date->Visible) { // confirmation_date ?>
	<?php if ($employees_archived->sortUrl($employees_archived->confirmation_date) == "") { ?>
		<th data-name="confirmation_date" class="<?php echo $employees_archived->confirmation_date->headerCellClass() ?>"><div id="elh_employees_archived_confirmation_date" class="employees_archived_confirmation_date"><div class="ew-table-header-caption"><?php echo $employees_archived->confirmation_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="confirmation_date" class="<?php echo $employees_archived->confirmation_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->confirmation_date) ?>',1);"><div id="elh_employees_archived_confirmation_date" class="employees_archived_confirmation_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->confirmation_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->confirmation_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->confirmation_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->supervisor->Visible) { // supervisor ?>
	<?php if ($employees_archived->sortUrl($employees_archived->supervisor) == "") { ?>
		<th data-name="supervisor" class="<?php echo $employees_archived->supervisor->headerCellClass() ?>"><div id="elh_employees_archived_supervisor" class="employees_archived_supervisor"><div class="ew-table-header-caption"><?php echo $employees_archived->supervisor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="supervisor" class="<?php echo $employees_archived->supervisor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->supervisor) ?>',1);"><div id="elh_employees_archived_supervisor" class="employees_archived_supervisor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->supervisor->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->supervisor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->supervisor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->department->Visible) { // department ?>
	<?php if ($employees_archived->sortUrl($employees_archived->department) == "") { ?>
		<th data-name="department" class="<?php echo $employees_archived->department->headerCellClass() ?>"><div id="elh_employees_archived_department" class="employees_archived_department"><div class="ew-table-header-caption"><?php echo $employees_archived->department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department" class="<?php echo $employees_archived->department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->department) ?>',1);"><div id="elh_employees_archived_department" class="employees_archived_department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->department->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_archived->termination_date->Visible) { // termination_date ?>
	<?php if ($employees_archived->sortUrl($employees_archived->termination_date) == "") { ?>
		<th data-name="termination_date" class="<?php echo $employees_archived->termination_date->headerCellClass() ?>"><div id="elh_employees_archived_termination_date" class="employees_archived_termination_date"><div class="ew-table-header-caption"><?php echo $employees_archived->termination_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="termination_date" class="<?php echo $employees_archived->termination_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_archived->SortUrl($employees_archived->termination_date) ?>',1);"><div id="elh_employees_archived_termination_date" class="employees_archived_termination_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_archived->termination_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_archived->termination_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_archived->termination_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employees_archived_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employees_archived->ExportAll && $employees_archived->isExport()) {
	$employees_archived_list->StopRec = $employees_archived_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employees_archived_list->TotalRecs > $employees_archived_list->StartRec + $employees_archived_list->DisplayRecs - 1)
		$employees_archived_list->StopRec = $employees_archived_list->StartRec + $employees_archived_list->DisplayRecs - 1;
	else
		$employees_archived_list->StopRec = $employees_archived_list->TotalRecs;
}
$employees_archived_list->RecCnt = $employees_archived_list->StartRec - 1;
if ($employees_archived_list->Recordset && !$employees_archived_list->Recordset->EOF) {
	$employees_archived_list->Recordset->moveFirst();
	$selectLimit = $employees_archived_list->UseSelectLimit;
	if (!$selectLimit && $employees_archived_list->StartRec > 1)
		$employees_archived_list->Recordset->move($employees_archived_list->StartRec - 1);
} elseif (!$employees_archived->AllowAddDeleteRow && $employees_archived_list->StopRec == 0) {
	$employees_archived_list->StopRec = $employees_archived->GridAddRowCount;
}

// Initialize aggregate
$employees_archived->RowType = ROWTYPE_AGGREGATEINIT;
$employees_archived->resetAttributes();
$employees_archived_list->renderRow();
while ($employees_archived_list->RecCnt < $employees_archived_list->StopRec) {
	$employees_archived_list->RecCnt++;
	if ($employees_archived_list->RecCnt >= $employees_archived_list->StartRec) {
		$employees_archived_list->RowCnt++;

		// Set up key count
		$employees_archived_list->KeyCount = $employees_archived_list->RowIndex;

		// Init row class and style
		$employees_archived->resetAttributes();
		$employees_archived->CssClass = "";
		if ($employees_archived->isGridAdd()) {
		} else {
			$employees_archived_list->loadRowValues($employees_archived_list->Recordset); // Load row values
		}
		$employees_archived->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employees_archived->RowAttrs = array_merge($employees_archived->RowAttrs, array('data-rowindex'=>$employees_archived_list->RowCnt, 'id'=>'r' . $employees_archived_list->RowCnt . '_employees_archived', 'data-rowtype'=>$employees_archived->RowType));

		// Render row
		$employees_archived_list->renderRow();

		// Render list options
		$employees_archived_list->renderListOptions();
?>
	<tr<?php echo $employees_archived->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employees_archived_list->ListOptions->render("body", "left", $employees_archived_list->RowCnt);
?>
	<?php if ($employees_archived->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employees_archived->id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_id" class="employees_archived_id">
<span<?php echo $employees_archived->id->viewAttributes() ?>>
<?php echo $employees_archived->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->ref_id->Visible) { // ref_id ?>
		<td data-name="ref_id"<?php echo $employees_archived->ref_id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_ref_id" class="employees_archived_ref_id">
<span<?php echo $employees_archived->ref_id->viewAttributes() ?>>
<?php echo $employees_archived->ref_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employees_archived->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_employee_id" class="employees_archived_employee_id">
<span<?php echo $employees_archived->employee_id->viewAttributes() ?>>
<?php echo $employees_archived->employee_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $employees_archived->first_name->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_first_name" class="employees_archived_first_name">
<span<?php echo $employees_archived->first_name->viewAttributes() ?>>
<?php echo $employees_archived->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->last_name->Visible) { // last_name ?>
		<td data-name="last_name"<?php echo $employees_archived->last_name->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_last_name" class="employees_archived_last_name">
<span<?php echo $employees_archived->last_name->viewAttributes() ?>>
<?php echo $employees_archived->last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $employees_archived->gender->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_gender" class="employees_archived_gender">
<span<?php echo $employees_archived->gender->viewAttributes() ?>>
<?php echo $employees_archived->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->ssn_num->Visible) { // ssn_num ?>
		<td data-name="ssn_num"<?php echo $employees_archived->ssn_num->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_ssn_num" class="employees_archived_ssn_num">
<span<?php echo $employees_archived->ssn_num->viewAttributes() ?>>
<?php echo $employees_archived->ssn_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->nic_num->Visible) { // nic_num ?>
		<td data-name="nic_num"<?php echo $employees_archived->nic_num->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_nic_num" class="employees_archived_nic_num">
<span<?php echo $employees_archived->nic_num->viewAttributes() ?>>
<?php echo $employees_archived->nic_num->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->other_id->Visible) { // other_id ?>
		<td data-name="other_id"<?php echo $employees_archived->other_id->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_other_id" class="employees_archived_other_id">
<span<?php echo $employees_archived->other_id->viewAttributes() ?>>
<?php echo $employees_archived->other_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->work_email->Visible) { // work_email ?>
		<td data-name="work_email"<?php echo $employees_archived->work_email->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_work_email" class="employees_archived_work_email">
<span<?php echo $employees_archived->work_email->viewAttributes() ?>>
<?php echo $employees_archived->work_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->joined_date->Visible) { // joined_date ?>
		<td data-name="joined_date"<?php echo $employees_archived->joined_date->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_joined_date" class="employees_archived_joined_date">
<span<?php echo $employees_archived->joined_date->viewAttributes() ?>>
<?php echo $employees_archived->joined_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->confirmation_date->Visible) { // confirmation_date ?>
		<td data-name="confirmation_date"<?php echo $employees_archived->confirmation_date->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_confirmation_date" class="employees_archived_confirmation_date">
<span<?php echo $employees_archived->confirmation_date->viewAttributes() ?>>
<?php echo $employees_archived->confirmation_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->supervisor->Visible) { // supervisor ?>
		<td data-name="supervisor"<?php echo $employees_archived->supervisor->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_supervisor" class="employees_archived_supervisor">
<span<?php echo $employees_archived->supervisor->viewAttributes() ?>>
<?php echo $employees_archived->supervisor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->department->Visible) { // department ?>
		<td data-name="department"<?php echo $employees_archived->department->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_department" class="employees_archived_department">
<span<?php echo $employees_archived->department->viewAttributes() ?>>
<?php echo $employees_archived->department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_archived->termination_date->Visible) { // termination_date ?>
		<td data-name="termination_date"<?php echo $employees_archived->termination_date->cellAttributes() ?>>
<span id="el<?php echo $employees_archived_list->RowCnt ?>_employees_archived_termination_date" class="employees_archived_termination_date">
<span<?php echo $employees_archived->termination_date->viewAttributes() ?>>
<?php echo $employees_archived->termination_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employees_archived_list->ListOptions->render("body", "right", $employees_archived_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employees_archived->isGridAdd())
		$employees_archived_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employees_archived->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employees_archived_list->Recordset)
	$employees_archived_list->Recordset->Close();
?>
<?php if (!$employees_archived->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employees_archived->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employees_archived_list->Pager)) $employees_archived_list->Pager = new NumericPager($employees_archived_list->StartRec, $employees_archived_list->DisplayRecs, $employees_archived_list->TotalRecs, $employees_archived_list->RecRange, $employees_archived_list->AutoHidePager) ?>
<?php if ($employees_archived_list->Pager->RecordCount > 0 && $employees_archived_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employees_archived_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employees_archived_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employees_archived_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employees_archived_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employees_archived_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employees_archived_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_archived_list->pageUrl() ?>start=<?php echo $employees_archived_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employees_archived_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employees_archived_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employees_archived_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employees_archived_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employees_archived_list->TotalRecs > 0 && (!$employees_archived_list->AutoHidePageSizeSelector || $employees_archived_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employees_archived">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employees_archived_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employees_archived_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employees_archived_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employees_archived_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employees_archived_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employees_archived_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employees_archived->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employees_archived_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employees_archived_list->TotalRecs == 0 && !$employees_archived->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employees_archived_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employees_archived_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employees_archived->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employees_archived->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employees_archived", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employees_archived_list->terminate();
?>