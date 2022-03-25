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
$employee_dependents_list = new employee_dependents_list();

// Run the page
$employee_dependents_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_dependents_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_dependents->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_dependentslist = currentForm = new ew.Form("femployee_dependentslist", "list");
femployee_dependentslist.formKeyCountName = '<?php echo $employee_dependents_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_dependentslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_dependentslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_dependentslist.lists["x_relationship"] = <?php echo $employee_dependents_list->relationship->Lookup->toClientList() ?>;
femployee_dependentslist.lists["x_relationship"].options = <?php echo JsonEncode($employee_dependents_list->relationship->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_dependentslistsrch = currentSearchForm = new ew.Form("femployee_dependentslistsrch");

// Validate function for search
femployee_dependentslistsrch.validate = function(fobj) {
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
femployee_dependentslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_dependentslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_dependentslistsrch.lists["x_relationship"] = <?php echo $employee_dependents_list->relationship->Lookup->toClientList() ?>;
femployee_dependentslistsrch.lists["x_relationship"].options = <?php echo JsonEncode($employee_dependents_list->relationship->options(FALSE, TRUE)) ?>;

// Filters
femployee_dependentslistsrch.filterList = <?php echo $employee_dependents_list->getFilterList() ?>;
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
<?php if (!$employee_dependents->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_dependents_list->TotalRecs > 0 && $employee_dependents_list->ExportOptions->visible()) { ?>
<?php $employee_dependents_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_dependents_list->ImportOptions->visible()) { ?>
<?php $employee_dependents_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_dependents_list->SearchOptions->visible()) { ?>
<?php $employee_dependents_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_dependents_list->FilterOptions->visible()) { ?>
<?php $employee_dependents_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_dependents_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_dependents->isExport() && !$employee_dependents->CurrentAction) { ?>
<form name="femployee_dependentslistsrch" id="femployee_dependentslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_dependents_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_dependentslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_dependents">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_dependents_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_dependents->RowType = ROWTYPE_SEARCH;

// Render row
$employee_dependents->resetAttributes();
$employee_dependents_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
	<div id="xsc_relationship" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_dependents->relationship->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_relationship" id="z_relationship" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_relationship" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_dependents" data-field="x_relationship" data-value-separator="<?php echo $employee_dependents->relationship->displayValueSeparatorAttribute() ?>" name="x_relationship" id="x_relationship" value="{value}"<?php echo $employee_dependents->relationship->editAttributes() ?>></div>
<div id="dsl_x_relationship" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_dependents->relationship->radioButtonListHtml(FALSE, "x_relationship") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_dependents_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_dependents_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_dependents_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_dependents_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_dependents_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_dependents_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_dependents_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_dependents_list->showPageHeader(); ?>
<?php
$employee_dependents_list->showMessage();
?>
<?php if ($employee_dependents_list->TotalRecs > 0 || $employee_dependents->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_dependents_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_dependents">
<?php if (!$employee_dependents->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_dependents->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_dependents_list->Pager)) $employee_dependents_list->Pager = new NumericPager($employee_dependents_list->StartRec, $employee_dependents_list->DisplayRecs, $employee_dependents_list->TotalRecs, $employee_dependents_list->RecRange, $employee_dependents_list->AutoHidePager) ?>
<?php if ($employee_dependents_list->Pager->RecordCount > 0 && $employee_dependents_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_dependents_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_dependents_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_dependents_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_dependents_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_dependents_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_dependents_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_dependents_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_dependents_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_dependents_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_dependents_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_dependents_list->TotalRecs > 0 && (!$employee_dependents_list->AutoHidePageSizeSelector || $employee_dependents_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_dependents">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_dependents_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_dependents_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_dependents_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_dependents_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_dependents_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_dependents_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_dependents->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_dependents_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_dependentslist" id="femployee_dependentslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_dependents_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_dependents_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
<div id="gmp_employee_dependents" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_dependents_list->TotalRecs > 0 || $employee_dependents->isGridEdit()) { ?>
<table id="tbl_employee_dependentslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_dependents_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_dependents_list->renderListOptions();

// Render list options (header, left)
$employee_dependents_list->ListOptions->render("header", "left");
?>
<?php if ($employee_dependents->id->Visible) { // id ?>
	<?php if ($employee_dependents->sortUrl($employee_dependents->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_dependents->id->headerCellClass() ?>"><div id="elh_employee_dependents_id" class="employee_dependents_id"><div class="ew-table-header-caption"><?php echo $employee_dependents->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_dependents->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_dependents->SortUrl($employee_dependents->id) ?>',1);"><div id="elh_employee_dependents_id" class="employee_dependents_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_dependents->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_dependents->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_dependents->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_dependents->employee->Visible) { // employee ?>
	<?php if ($employee_dependents->sortUrl($employee_dependents->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_dependents->employee->headerCellClass() ?>"><div id="elh_employee_dependents_employee" class="employee_dependents_employee"><div class="ew-table-header-caption"><?php echo $employee_dependents->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_dependents->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_dependents->SortUrl($employee_dependents->employee) ?>',1);"><div id="elh_employee_dependents_employee" class="employee_dependents_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_dependents->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_dependents->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_dependents->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_dependents->name->Visible) { // name ?>
	<?php if ($employee_dependents->sortUrl($employee_dependents->name) == "") { ?>
		<th data-name="name" class="<?php echo $employee_dependents->name->headerCellClass() ?>"><div id="elh_employee_dependents_name" class="employee_dependents_name"><div class="ew-table-header-caption"><?php echo $employee_dependents->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $employee_dependents->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_dependents->SortUrl($employee_dependents->name) ?>',1);"><div id="elh_employee_dependents_name" class="employee_dependents_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_dependents->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_dependents->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_dependents->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
	<?php if ($employee_dependents->sortUrl($employee_dependents->relationship) == "") { ?>
		<th data-name="relationship" class="<?php echo $employee_dependents->relationship->headerCellClass() ?>"><div id="elh_employee_dependents_relationship" class="employee_dependents_relationship"><div class="ew-table-header-caption"><?php echo $employee_dependents->relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="relationship" class="<?php echo $employee_dependents->relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_dependents->SortUrl($employee_dependents->relationship) ?>',1);"><div id="elh_employee_dependents_relationship" class="employee_dependents_relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_dependents->relationship->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_dependents->relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_dependents->relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_dependents->dob->Visible) { // dob ?>
	<?php if ($employee_dependents->sortUrl($employee_dependents->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $employee_dependents->dob->headerCellClass() ?>"><div id="elh_employee_dependents_dob" class="employee_dependents_dob"><div class="ew-table-header-caption"><?php echo $employee_dependents->dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $employee_dependents->dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_dependents->SortUrl($employee_dependents->dob) ?>',1);"><div id="elh_employee_dependents_dob" class="employee_dependents_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_dependents->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_dependents->dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_dependents->dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_dependents->id_number->Visible) { // id_number ?>
	<?php if ($employee_dependents->sortUrl($employee_dependents->id_number) == "") { ?>
		<th data-name="id_number" class="<?php echo $employee_dependents->id_number->headerCellClass() ?>"><div id="elh_employee_dependents_id_number" class="employee_dependents_id_number"><div class="ew-table-header-caption"><?php echo $employee_dependents->id_number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_number" class="<?php echo $employee_dependents->id_number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_dependents->SortUrl($employee_dependents->id_number) ?>',1);"><div id="elh_employee_dependents_id_number" class="employee_dependents_id_number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_dependents->id_number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_dependents->id_number->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_dependents->id_number->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_dependents_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_dependents->ExportAll && $employee_dependents->isExport()) {
	$employee_dependents_list->StopRec = $employee_dependents_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_dependents_list->TotalRecs > $employee_dependents_list->StartRec + $employee_dependents_list->DisplayRecs - 1)
		$employee_dependents_list->StopRec = $employee_dependents_list->StartRec + $employee_dependents_list->DisplayRecs - 1;
	else
		$employee_dependents_list->StopRec = $employee_dependents_list->TotalRecs;
}
$employee_dependents_list->RecCnt = $employee_dependents_list->StartRec - 1;
if ($employee_dependents_list->Recordset && !$employee_dependents_list->Recordset->EOF) {
	$employee_dependents_list->Recordset->moveFirst();
	$selectLimit = $employee_dependents_list->UseSelectLimit;
	if (!$selectLimit && $employee_dependents_list->StartRec > 1)
		$employee_dependents_list->Recordset->move($employee_dependents_list->StartRec - 1);
} elseif (!$employee_dependents->AllowAddDeleteRow && $employee_dependents_list->StopRec == 0) {
	$employee_dependents_list->StopRec = $employee_dependents->GridAddRowCount;
}

// Initialize aggregate
$employee_dependents->RowType = ROWTYPE_AGGREGATEINIT;
$employee_dependents->resetAttributes();
$employee_dependents_list->renderRow();
while ($employee_dependents_list->RecCnt < $employee_dependents_list->StopRec) {
	$employee_dependents_list->RecCnt++;
	if ($employee_dependents_list->RecCnt >= $employee_dependents_list->StartRec) {
		$employee_dependents_list->RowCnt++;

		// Set up key count
		$employee_dependents_list->KeyCount = $employee_dependents_list->RowIndex;

		// Init row class and style
		$employee_dependents->resetAttributes();
		$employee_dependents->CssClass = "";
		if ($employee_dependents->isGridAdd()) {
		} else {
			$employee_dependents_list->loadRowValues($employee_dependents_list->Recordset); // Load row values
		}
		$employee_dependents->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_dependents->RowAttrs = array_merge($employee_dependents->RowAttrs, array('data-rowindex'=>$employee_dependents_list->RowCnt, 'id'=>'r' . $employee_dependents_list->RowCnt . '_employee_dependents', 'data-rowtype'=>$employee_dependents->RowType));

		// Render row
		$employee_dependents_list->renderRow();

		// Render list options
		$employee_dependents_list->renderListOptions();
?>
	<tr<?php echo $employee_dependents->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_dependents_list->ListOptions->render("body", "left", $employee_dependents_list->RowCnt);
?>
	<?php if ($employee_dependents->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_dependents->id->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_list->RowCnt ?>_employee_dependents_id" class="employee_dependents_id">
<span<?php echo $employee_dependents->id->viewAttributes() ?>>
<?php echo $employee_dependents->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_dependents->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_dependents->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_list->RowCnt ?>_employee_dependents_employee" class="employee_dependents_employee">
<span<?php echo $employee_dependents->employee->viewAttributes() ?>>
<?php echo $employee_dependents->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_dependents->name->Visible) { // name ?>
		<td data-name="name"<?php echo $employee_dependents->name->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_list->RowCnt ?>_employee_dependents_name" class="employee_dependents_name">
<span<?php echo $employee_dependents->name->viewAttributes() ?>>
<?php echo $employee_dependents->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
		<td data-name="relationship"<?php echo $employee_dependents->relationship->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_list->RowCnt ?>_employee_dependents_relationship" class="employee_dependents_relationship">
<span<?php echo $employee_dependents->relationship->viewAttributes() ?>>
<?php echo $employee_dependents->relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_dependents->dob->Visible) { // dob ?>
		<td data-name="dob"<?php echo $employee_dependents->dob->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_list->RowCnt ?>_employee_dependents_dob" class="employee_dependents_dob">
<span<?php echo $employee_dependents->dob->viewAttributes() ?>>
<?php echo $employee_dependents->dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_dependents->id_number->Visible) { // id_number ?>
		<td data-name="id_number"<?php echo $employee_dependents->id_number->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_list->RowCnt ?>_employee_dependents_id_number" class="employee_dependents_id_number">
<span<?php echo $employee_dependents->id_number->viewAttributes() ?>>
<?php echo $employee_dependents->id_number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_dependents_list->ListOptions->render("body", "right", $employee_dependents_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_dependents->isGridAdd())
		$employee_dependents_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_dependents->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_dependents_list->Recordset)
	$employee_dependents_list->Recordset->Close();
?>
<?php if (!$employee_dependents->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_dependents->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_dependents_list->Pager)) $employee_dependents_list->Pager = new NumericPager($employee_dependents_list->StartRec, $employee_dependents_list->DisplayRecs, $employee_dependents_list->TotalRecs, $employee_dependents_list->RecRange, $employee_dependents_list->AutoHidePager) ?>
<?php if ($employee_dependents_list->Pager->RecordCount > 0 && $employee_dependents_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_dependents_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_dependents_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_dependents_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_dependents_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_dependents_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_dependents_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_dependents_list->pageUrl() ?>start=<?php echo $employee_dependents_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_dependents_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_dependents_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_dependents_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_dependents_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_dependents_list->TotalRecs > 0 && (!$employee_dependents_list->AutoHidePageSizeSelector || $employee_dependents_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_dependents">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_dependents_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_dependents_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_dependents_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_dependents_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_dependents_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_dependents_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_dependents->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_dependents_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_dependents_list->TotalRecs == 0 && !$employee_dependents->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_dependents_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_dependents_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_dependents->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_dependents->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_dependents", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_dependents_list->terminate();
?>