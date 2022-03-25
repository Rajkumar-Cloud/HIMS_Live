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
$employee_projects_list = new employee_projects_list();

// Run the page
$employee_projects_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_projects_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_projects->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_projectslist = currentForm = new ew.Form("femployee_projectslist", "list");
femployee_projectslist.formKeyCountName = '<?php echo $employee_projects_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_projectslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_projectslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_projectslist.lists["x_status"] = <?php echo $employee_projects_list->status->Lookup->toClientList() ?>;
femployee_projectslist.lists["x_status"].options = <?php echo JsonEncode($employee_projects_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_projectslistsrch = currentSearchForm = new ew.Form("femployee_projectslistsrch");

// Validate function for search
femployee_projectslistsrch.validate = function(fobj) {
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
femployee_projectslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_projectslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_projectslistsrch.lists["x_status"] = <?php echo $employee_projects_list->status->Lookup->toClientList() ?>;
femployee_projectslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_projects_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_projectslistsrch.filterList = <?php echo $employee_projects_list->getFilterList() ?>;
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
<?php if (!$employee_projects->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_projects_list->TotalRecs > 0 && $employee_projects_list->ExportOptions->visible()) { ?>
<?php $employee_projects_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_projects_list->ImportOptions->visible()) { ?>
<?php $employee_projects_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_projects_list->SearchOptions->visible()) { ?>
<?php $employee_projects_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_projects_list->FilterOptions->visible()) { ?>
<?php $employee_projects_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_projects_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_projects->isExport() && !$employee_projects->CurrentAction) { ?>
<form name="femployee_projectslistsrch" id="femployee_projectslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_projects_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_projectslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_projects">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_projects_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_projects->RowType = ROWTYPE_SEARCH;

// Render row
$employee_projects->resetAttributes();
$employee_projects_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_projects->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_projects->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_projects" data-field="x_status" data-value-separator="<?php echo $employee_projects->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_projects->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_projects->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_projects_list->showPageHeader(); ?>
<?php
$employee_projects_list->showMessage();
?>
<?php if ($employee_projects_list->TotalRecs > 0 || $employee_projects->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_projects_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_projects">
<?php if (!$employee_projects->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_projects->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_projects_list->Pager)) $employee_projects_list->Pager = new NumericPager($employee_projects_list->StartRec, $employee_projects_list->DisplayRecs, $employee_projects_list->TotalRecs, $employee_projects_list->RecRange, $employee_projects_list->AutoHidePager) ?>
<?php if ($employee_projects_list->Pager->RecordCount > 0 && $employee_projects_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_projects_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_projects_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_projects_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_projects_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_projects_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_projects_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_projects_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_projects_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_projects_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_projects_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_projects_list->TotalRecs > 0 && (!$employee_projects_list->AutoHidePageSizeSelector || $employee_projects_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_projects">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_projects_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_projects_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_projects_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_projects_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_projects_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_projects_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_projects->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_projects_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_projectslist" id="femployee_projectslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_projects_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_projects_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_projects">
<div id="gmp_employee_projects" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_projects_list->TotalRecs > 0 || $employee_projects->isGridEdit()) { ?>
<table id="tbl_employee_projectslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_projects_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_projects_list->renderListOptions();

// Render list options (header, left)
$employee_projects_list->ListOptions->render("header", "left");
?>
<?php if ($employee_projects->id->Visible) { // id ?>
	<?php if ($employee_projects->sortUrl($employee_projects->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_projects->id->headerCellClass() ?>"><div id="elh_employee_projects_id" class="employee_projects_id"><div class="ew-table-header-caption"><?php echo $employee_projects->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_projects->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_projects->SortUrl($employee_projects->id) ?>',1);"><div id="elh_employee_projects_id" class="employee_projects_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_projects->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_projects->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_projects->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_projects->employee->Visible) { // employee ?>
	<?php if ($employee_projects->sortUrl($employee_projects->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_projects->employee->headerCellClass() ?>"><div id="elh_employee_projects_employee" class="employee_projects_employee"><div class="ew-table-header-caption"><?php echo $employee_projects->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_projects->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_projects->SortUrl($employee_projects->employee) ?>',1);"><div id="elh_employee_projects_employee" class="employee_projects_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_projects->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_projects->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_projects->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_projects->project->Visible) { // project ?>
	<?php if ($employee_projects->sortUrl($employee_projects->project) == "") { ?>
		<th data-name="project" class="<?php echo $employee_projects->project->headerCellClass() ?>"><div id="elh_employee_projects_project" class="employee_projects_project"><div class="ew-table-header-caption"><?php echo $employee_projects->project->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="project" class="<?php echo $employee_projects->project->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_projects->SortUrl($employee_projects->project) ?>',1);"><div id="elh_employee_projects_project" class="employee_projects_project">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_projects->project->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_projects->project->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_projects->project->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_projects->date_start->Visible) { // date_start ?>
	<?php if ($employee_projects->sortUrl($employee_projects->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $employee_projects->date_start->headerCellClass() ?>"><div id="elh_employee_projects_date_start" class="employee_projects_date_start"><div class="ew-table-header-caption"><?php echo $employee_projects->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $employee_projects->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_projects->SortUrl($employee_projects->date_start) ?>',1);"><div id="elh_employee_projects_date_start" class="employee_projects_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_projects->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_projects->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_projects->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_projects->date_end->Visible) { // date_end ?>
	<?php if ($employee_projects->sortUrl($employee_projects->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $employee_projects->date_end->headerCellClass() ?>"><div id="elh_employee_projects_date_end" class="employee_projects_date_end"><div class="ew-table-header-caption"><?php echo $employee_projects->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $employee_projects->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_projects->SortUrl($employee_projects->date_end) ?>',1);"><div id="elh_employee_projects_date_end" class="employee_projects_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_projects->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_projects->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_projects->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_projects->status->Visible) { // status ?>
	<?php if ($employee_projects->sortUrl($employee_projects->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_projects->status->headerCellClass() ?>"><div id="elh_employee_projects_status" class="employee_projects_status"><div class="ew-table-header-caption"><?php echo $employee_projects->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_projects->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_projects->SortUrl($employee_projects->status) ?>',1);"><div id="elh_employee_projects_status" class="employee_projects_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_projects->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_projects->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_projects->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_projects_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_projects->ExportAll && $employee_projects->isExport()) {
	$employee_projects_list->StopRec = $employee_projects_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_projects_list->TotalRecs > $employee_projects_list->StartRec + $employee_projects_list->DisplayRecs - 1)
		$employee_projects_list->StopRec = $employee_projects_list->StartRec + $employee_projects_list->DisplayRecs - 1;
	else
		$employee_projects_list->StopRec = $employee_projects_list->TotalRecs;
}
$employee_projects_list->RecCnt = $employee_projects_list->StartRec - 1;
if ($employee_projects_list->Recordset && !$employee_projects_list->Recordset->EOF) {
	$employee_projects_list->Recordset->moveFirst();
	$selectLimit = $employee_projects_list->UseSelectLimit;
	if (!$selectLimit && $employee_projects_list->StartRec > 1)
		$employee_projects_list->Recordset->move($employee_projects_list->StartRec - 1);
} elseif (!$employee_projects->AllowAddDeleteRow && $employee_projects_list->StopRec == 0) {
	$employee_projects_list->StopRec = $employee_projects->GridAddRowCount;
}

// Initialize aggregate
$employee_projects->RowType = ROWTYPE_AGGREGATEINIT;
$employee_projects->resetAttributes();
$employee_projects_list->renderRow();
while ($employee_projects_list->RecCnt < $employee_projects_list->StopRec) {
	$employee_projects_list->RecCnt++;
	if ($employee_projects_list->RecCnt >= $employee_projects_list->StartRec) {
		$employee_projects_list->RowCnt++;

		// Set up key count
		$employee_projects_list->KeyCount = $employee_projects_list->RowIndex;

		// Init row class and style
		$employee_projects->resetAttributes();
		$employee_projects->CssClass = "";
		if ($employee_projects->isGridAdd()) {
		} else {
			$employee_projects_list->loadRowValues($employee_projects_list->Recordset); // Load row values
		}
		$employee_projects->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_projects->RowAttrs = array_merge($employee_projects->RowAttrs, array('data-rowindex'=>$employee_projects_list->RowCnt, 'id'=>'r' . $employee_projects_list->RowCnt . '_employee_projects', 'data-rowtype'=>$employee_projects->RowType));

		// Render row
		$employee_projects_list->renderRow();

		// Render list options
		$employee_projects_list->renderListOptions();
?>
	<tr<?php echo $employee_projects->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_projects_list->ListOptions->render("body", "left", $employee_projects_list->RowCnt);
?>
	<?php if ($employee_projects->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_projects->id->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_list->RowCnt ?>_employee_projects_id" class="employee_projects_id">
<span<?php echo $employee_projects->id->viewAttributes() ?>>
<?php echo $employee_projects->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_projects->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_projects->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_list->RowCnt ?>_employee_projects_employee" class="employee_projects_employee">
<span<?php echo $employee_projects->employee->viewAttributes() ?>>
<?php echo $employee_projects->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_projects->project->Visible) { // project ?>
		<td data-name="project"<?php echo $employee_projects->project->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_list->RowCnt ?>_employee_projects_project" class="employee_projects_project">
<span<?php echo $employee_projects->project->viewAttributes() ?>>
<?php echo $employee_projects->project->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_projects->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $employee_projects->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_list->RowCnt ?>_employee_projects_date_start" class="employee_projects_date_start">
<span<?php echo $employee_projects->date_start->viewAttributes() ?>>
<?php echo $employee_projects->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_projects->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $employee_projects->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_list->RowCnt ?>_employee_projects_date_end" class="employee_projects_date_end">
<span<?php echo $employee_projects->date_end->viewAttributes() ?>>
<?php echo $employee_projects->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_projects->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_projects->status->cellAttributes() ?>>
<span id="el<?php echo $employee_projects_list->RowCnt ?>_employee_projects_status" class="employee_projects_status">
<span<?php echo $employee_projects->status->viewAttributes() ?>>
<?php echo $employee_projects->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_projects_list->ListOptions->render("body", "right", $employee_projects_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_projects->isGridAdd())
		$employee_projects_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_projects->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_projects_list->Recordset)
	$employee_projects_list->Recordset->Close();
?>
<?php if (!$employee_projects->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_projects->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_projects_list->Pager)) $employee_projects_list->Pager = new NumericPager($employee_projects_list->StartRec, $employee_projects_list->DisplayRecs, $employee_projects_list->TotalRecs, $employee_projects_list->RecRange, $employee_projects_list->AutoHidePager) ?>
<?php if ($employee_projects_list->Pager->RecordCount > 0 && $employee_projects_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_projects_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_projects_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_projects_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_projects_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_projects_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_projects_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_projects_list->pageUrl() ?>start=<?php echo $employee_projects_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_projects_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_projects_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_projects_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_projects_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_projects_list->TotalRecs > 0 && (!$employee_projects_list->AutoHidePageSizeSelector || $employee_projects_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_projects">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_projects_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_projects_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_projects_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_projects_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_projects_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_projects_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_projects->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_projects_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_projects_list->TotalRecs == 0 && !$employee_projects->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_projects_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_projects_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_projects->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_projects->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_projects", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_projects_list->terminate();
?>