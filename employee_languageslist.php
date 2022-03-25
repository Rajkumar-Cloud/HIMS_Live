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
$employee_languages_list = new employee_languages_list();

// Run the page
$employee_languages_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_languages_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_languages->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_languageslist = currentForm = new ew.Form("femployee_languageslist", "list");
femployee_languageslist.formKeyCountName = '<?php echo $employee_languages_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_languageslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_languageslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_languageslist.lists["x_reading"] = <?php echo $employee_languages_list->reading->Lookup->toClientList() ?>;
femployee_languageslist.lists["x_reading"].options = <?php echo JsonEncode($employee_languages_list->reading->options(FALSE, TRUE)) ?>;
femployee_languageslist.lists["x_speaking"] = <?php echo $employee_languages_list->speaking->Lookup->toClientList() ?>;
femployee_languageslist.lists["x_speaking"].options = <?php echo JsonEncode($employee_languages_list->speaking->options(FALSE, TRUE)) ?>;
femployee_languageslist.lists["x_writing"] = <?php echo $employee_languages_list->writing->Lookup->toClientList() ?>;
femployee_languageslist.lists["x_writing"].options = <?php echo JsonEncode($employee_languages_list->writing->options(FALSE, TRUE)) ?>;
femployee_languageslist.lists["x_understanding"] = <?php echo $employee_languages_list->understanding->Lookup->toClientList() ?>;
femployee_languageslist.lists["x_understanding"].options = <?php echo JsonEncode($employee_languages_list->understanding->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_languageslistsrch = currentSearchForm = new ew.Form("femployee_languageslistsrch");

// Validate function for search
femployee_languageslistsrch.validate = function(fobj) {
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
femployee_languageslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_languageslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_languageslistsrch.lists["x_reading"] = <?php echo $employee_languages_list->reading->Lookup->toClientList() ?>;
femployee_languageslistsrch.lists["x_reading"].options = <?php echo JsonEncode($employee_languages_list->reading->options(FALSE, TRUE)) ?>;
femployee_languageslistsrch.lists["x_speaking"] = <?php echo $employee_languages_list->speaking->Lookup->toClientList() ?>;
femployee_languageslistsrch.lists["x_speaking"].options = <?php echo JsonEncode($employee_languages_list->speaking->options(FALSE, TRUE)) ?>;
femployee_languageslistsrch.lists["x_writing"] = <?php echo $employee_languages_list->writing->Lookup->toClientList() ?>;
femployee_languageslistsrch.lists["x_writing"].options = <?php echo JsonEncode($employee_languages_list->writing->options(FALSE, TRUE)) ?>;
femployee_languageslistsrch.lists["x_understanding"] = <?php echo $employee_languages_list->understanding->Lookup->toClientList() ?>;
femployee_languageslistsrch.lists["x_understanding"].options = <?php echo JsonEncode($employee_languages_list->understanding->options(FALSE, TRUE)) ?>;

// Filters
femployee_languageslistsrch.filterList = <?php echo $employee_languages_list->getFilterList() ?>;
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
<?php if (!$employee_languages->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_languages_list->TotalRecs > 0 && $employee_languages_list->ExportOptions->visible()) { ?>
<?php $employee_languages_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_languages_list->ImportOptions->visible()) { ?>
<?php $employee_languages_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_languages_list->SearchOptions->visible()) { ?>
<?php $employee_languages_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_languages_list->FilterOptions->visible()) { ?>
<?php $employee_languages_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_languages_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_languages->isExport() && !$employee_languages->CurrentAction) { ?>
<form name="femployee_languageslistsrch" id="femployee_languageslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_languages_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_languageslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_languages">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_languages_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_languages->RowType = ROWTYPE_SEARCH;

// Render row
$employee_languages->resetAttributes();
$employee_languages_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_languages->reading->Visible) { // reading ?>
	<div id="xsc_reading" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_languages->reading->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_reading" id="z_reading" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_reading" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_reading" data-value-separator="<?php echo $employee_languages->reading->displayValueSeparatorAttribute() ?>" name="x_reading" id="x_reading" value="{value}"<?php echo $employee_languages->reading->editAttributes() ?>></div>
<div id="dsl_x_reading" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->reading->radioButtonListHtml(FALSE, "x_reading") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($employee_languages->speaking->Visible) { // speaking ?>
	<div id="xsc_speaking" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_languages->speaking->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_speaking" id="z_speaking" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_speaking" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_speaking" data-value-separator="<?php echo $employee_languages->speaking->displayValueSeparatorAttribute() ?>" name="x_speaking" id="x_speaking" value="{value}"<?php echo $employee_languages->speaking->editAttributes() ?>></div>
<div id="dsl_x_speaking" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->speaking->radioButtonListHtml(FALSE, "x_speaking") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($employee_languages->writing->Visible) { // writing ?>
	<div id="xsc_writing" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_languages->writing->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_writing" id="z_writing" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_writing" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_writing" data-value-separator="<?php echo $employee_languages->writing->displayValueSeparatorAttribute() ?>" name="x_writing" id="x_writing" value="{value}"<?php echo $employee_languages->writing->editAttributes() ?>></div>
<div id="dsl_x_writing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->writing->radioButtonListHtml(FALSE, "x_writing") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($employee_languages->understanding->Visible) { // understanding ?>
	<div id="xsc_understanding" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_languages->understanding->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_understanding" id="z_understanding" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_understanding" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_languages" data-field="x_understanding" data-value-separator="<?php echo $employee_languages->understanding->displayValueSeparatorAttribute() ?>" name="x_understanding" id="x_understanding" value="{value}"<?php echo $employee_languages->understanding->editAttributes() ?>></div>
<div id="dsl_x_understanding" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_languages->understanding->radioButtonListHtml(FALSE, "x_understanding") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_languages_list->showPageHeader(); ?>
<?php
$employee_languages_list->showMessage();
?>
<?php if ($employee_languages_list->TotalRecs > 0 || $employee_languages->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_languages_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_languages">
<?php if (!$employee_languages->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_languages->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_languages_list->Pager)) $employee_languages_list->Pager = new NumericPager($employee_languages_list->StartRec, $employee_languages_list->DisplayRecs, $employee_languages_list->TotalRecs, $employee_languages_list->RecRange, $employee_languages_list->AutoHidePager) ?>
<?php if ($employee_languages_list->Pager->RecordCount > 0 && $employee_languages_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_languages_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_languages_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_languages_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_languages_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_languages_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_languages_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_languages_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_languages_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_languages_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_languages_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_languages_list->TotalRecs > 0 && (!$employee_languages_list->AutoHidePageSizeSelector || $employee_languages_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_languages">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_languages_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_languages_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_languages_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_languages_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_languages_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_languages_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_languages->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_languages_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_languageslist" id="femployee_languageslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_languages_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_languages_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<div id="gmp_employee_languages" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_languages_list->TotalRecs > 0 || $employee_languages->isGridEdit()) { ?>
<table id="tbl_employee_languageslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_languages_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_languages_list->renderListOptions();

// Render list options (header, left)
$employee_languages_list->ListOptions->render("header", "left");
?>
<?php if ($employee_languages->id->Visible) { // id ?>
	<?php if ($employee_languages->sortUrl($employee_languages->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_languages->id->headerCellClass() ?>"><div id="elh_employee_languages_id" class="employee_languages_id"><div class="ew-table-header-caption"><?php echo $employee_languages->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_languages->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->id) ?>',1);"><div id="elh_employee_languages_id" class="employee_languages_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_languages->language_id->Visible) { // language_id ?>
	<?php if ($employee_languages->sortUrl($employee_languages->language_id) == "") { ?>
		<th data-name="language_id" class="<?php echo $employee_languages->language_id->headerCellClass() ?>"><div id="elh_employee_languages_language_id" class="employee_languages_language_id"><div class="ew-table-header-caption"><?php echo $employee_languages->language_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="language_id" class="<?php echo $employee_languages->language_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->language_id) ?>',1);"><div id="elh_employee_languages_language_id" class="employee_languages_language_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->language_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->language_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->language_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_languages->employee->Visible) { // employee ?>
	<?php if ($employee_languages->sortUrl($employee_languages->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_languages->employee->headerCellClass() ?>"><div id="elh_employee_languages_employee" class="employee_languages_employee"><div class="ew-table-header-caption"><?php echo $employee_languages->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_languages->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->employee) ?>',1);"><div id="elh_employee_languages_employee" class="employee_languages_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_languages->reading->Visible) { // reading ?>
	<?php if ($employee_languages->sortUrl($employee_languages->reading) == "") { ?>
		<th data-name="reading" class="<?php echo $employee_languages->reading->headerCellClass() ?>"><div id="elh_employee_languages_reading" class="employee_languages_reading"><div class="ew-table-header-caption"><?php echo $employee_languages->reading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reading" class="<?php echo $employee_languages->reading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->reading) ?>',1);"><div id="elh_employee_languages_reading" class="employee_languages_reading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->reading->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->reading->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->reading->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_languages->speaking->Visible) { // speaking ?>
	<?php if ($employee_languages->sortUrl($employee_languages->speaking) == "") { ?>
		<th data-name="speaking" class="<?php echo $employee_languages->speaking->headerCellClass() ?>"><div id="elh_employee_languages_speaking" class="employee_languages_speaking"><div class="ew-table-header-caption"><?php echo $employee_languages->speaking->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="speaking" class="<?php echo $employee_languages->speaking->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->speaking) ?>',1);"><div id="elh_employee_languages_speaking" class="employee_languages_speaking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->speaking->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->speaking->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->speaking->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_languages->writing->Visible) { // writing ?>
	<?php if ($employee_languages->sortUrl($employee_languages->writing) == "") { ?>
		<th data-name="writing" class="<?php echo $employee_languages->writing->headerCellClass() ?>"><div id="elh_employee_languages_writing" class="employee_languages_writing"><div class="ew-table-header-caption"><?php echo $employee_languages->writing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="writing" class="<?php echo $employee_languages->writing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->writing) ?>',1);"><div id="elh_employee_languages_writing" class="employee_languages_writing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->writing->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->writing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->writing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_languages->understanding->Visible) { // understanding ?>
	<?php if ($employee_languages->sortUrl($employee_languages->understanding) == "") { ?>
		<th data-name="understanding" class="<?php echo $employee_languages->understanding->headerCellClass() ?>"><div id="elh_employee_languages_understanding" class="employee_languages_understanding"><div class="ew-table-header-caption"><?php echo $employee_languages->understanding->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="understanding" class="<?php echo $employee_languages->understanding->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_languages->SortUrl($employee_languages->understanding) ?>',1);"><div id="elh_employee_languages_understanding" class="employee_languages_understanding">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_languages->understanding->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_languages->understanding->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_languages->understanding->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_languages_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_languages->ExportAll && $employee_languages->isExport()) {
	$employee_languages_list->StopRec = $employee_languages_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_languages_list->TotalRecs > $employee_languages_list->StartRec + $employee_languages_list->DisplayRecs - 1)
		$employee_languages_list->StopRec = $employee_languages_list->StartRec + $employee_languages_list->DisplayRecs - 1;
	else
		$employee_languages_list->StopRec = $employee_languages_list->TotalRecs;
}
$employee_languages_list->RecCnt = $employee_languages_list->StartRec - 1;
if ($employee_languages_list->Recordset && !$employee_languages_list->Recordset->EOF) {
	$employee_languages_list->Recordset->moveFirst();
	$selectLimit = $employee_languages_list->UseSelectLimit;
	if (!$selectLimit && $employee_languages_list->StartRec > 1)
		$employee_languages_list->Recordset->move($employee_languages_list->StartRec - 1);
} elseif (!$employee_languages->AllowAddDeleteRow && $employee_languages_list->StopRec == 0) {
	$employee_languages_list->StopRec = $employee_languages->GridAddRowCount;
}

// Initialize aggregate
$employee_languages->RowType = ROWTYPE_AGGREGATEINIT;
$employee_languages->resetAttributes();
$employee_languages_list->renderRow();
while ($employee_languages_list->RecCnt < $employee_languages_list->StopRec) {
	$employee_languages_list->RecCnt++;
	if ($employee_languages_list->RecCnt >= $employee_languages_list->StartRec) {
		$employee_languages_list->RowCnt++;

		// Set up key count
		$employee_languages_list->KeyCount = $employee_languages_list->RowIndex;

		// Init row class and style
		$employee_languages->resetAttributes();
		$employee_languages->CssClass = "";
		if ($employee_languages->isGridAdd()) {
		} else {
			$employee_languages_list->loadRowValues($employee_languages_list->Recordset); // Load row values
		}
		$employee_languages->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_languages->RowAttrs = array_merge($employee_languages->RowAttrs, array('data-rowindex'=>$employee_languages_list->RowCnt, 'id'=>'r' . $employee_languages_list->RowCnt . '_employee_languages', 'data-rowtype'=>$employee_languages->RowType));

		// Render row
		$employee_languages_list->renderRow();

		// Render list options
		$employee_languages_list->renderListOptions();
?>
	<tr<?php echo $employee_languages->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_languages_list->ListOptions->render("body", "left", $employee_languages_list->RowCnt);
?>
	<?php if ($employee_languages->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_languages->id->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_id" class="employee_languages_id">
<span<?php echo $employee_languages->id->viewAttributes() ?>>
<?php echo $employee_languages->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_languages->language_id->Visible) { // language_id ?>
		<td data-name="language_id"<?php echo $employee_languages->language_id->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_language_id" class="employee_languages_language_id">
<span<?php echo $employee_languages->language_id->viewAttributes() ?>>
<?php echo $employee_languages->language_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_languages->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_languages->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_employee" class="employee_languages_employee">
<span<?php echo $employee_languages->employee->viewAttributes() ?>>
<?php echo $employee_languages->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_languages->reading->Visible) { // reading ?>
		<td data-name="reading"<?php echo $employee_languages->reading->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_reading" class="employee_languages_reading">
<span<?php echo $employee_languages->reading->viewAttributes() ?>>
<?php echo $employee_languages->reading->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_languages->speaking->Visible) { // speaking ?>
		<td data-name="speaking"<?php echo $employee_languages->speaking->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_speaking" class="employee_languages_speaking">
<span<?php echo $employee_languages->speaking->viewAttributes() ?>>
<?php echo $employee_languages->speaking->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_languages->writing->Visible) { // writing ?>
		<td data-name="writing"<?php echo $employee_languages->writing->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_writing" class="employee_languages_writing">
<span<?php echo $employee_languages->writing->viewAttributes() ?>>
<?php echo $employee_languages->writing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_languages->understanding->Visible) { // understanding ?>
		<td data-name="understanding"<?php echo $employee_languages->understanding->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_list->RowCnt ?>_employee_languages_understanding" class="employee_languages_understanding">
<span<?php echo $employee_languages->understanding->viewAttributes() ?>>
<?php echo $employee_languages->understanding->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_languages_list->ListOptions->render("body", "right", $employee_languages_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_languages->isGridAdd())
		$employee_languages_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_languages->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_languages_list->Recordset)
	$employee_languages_list->Recordset->Close();
?>
<?php if (!$employee_languages->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_languages->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_languages_list->Pager)) $employee_languages_list->Pager = new NumericPager($employee_languages_list->StartRec, $employee_languages_list->DisplayRecs, $employee_languages_list->TotalRecs, $employee_languages_list->RecRange, $employee_languages_list->AutoHidePager) ?>
<?php if ($employee_languages_list->Pager->RecordCount > 0 && $employee_languages_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_languages_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_languages_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_languages_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_languages_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_languages_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_languages_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_languages_list->pageUrl() ?>start=<?php echo $employee_languages_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_languages_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_languages_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_languages_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_languages_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_languages_list->TotalRecs > 0 && (!$employee_languages_list->AutoHidePageSizeSelector || $employee_languages_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_languages">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_languages_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_languages_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_languages_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_languages_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_languages_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_languages_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_languages->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_languages_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_languages_list->TotalRecs == 0 && !$employee_languages->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_languages_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_languages_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_languages->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_languages->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_languages", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_languages_list->terminate();
?>