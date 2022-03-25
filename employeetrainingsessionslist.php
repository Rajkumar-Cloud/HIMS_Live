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
$employeetrainingsessions_list = new employeetrainingsessions_list();

// Run the page
$employeetrainingsessions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employeetrainingsessions_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployeetrainingsessionslist = currentForm = new ew.Form("femployeetrainingsessionslist", "list");
femployeetrainingsessionslist.formKeyCountName = '<?php echo $employeetrainingsessions_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployeetrainingsessionslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeetrainingsessionslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeetrainingsessionslist.lists["x_status"] = <?php echo $employeetrainingsessions_list->status->Lookup->toClientList() ?>;
femployeetrainingsessionslist.lists["x_status"].options = <?php echo JsonEncode($employeetrainingsessions_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployeetrainingsessionslistsrch = currentSearchForm = new ew.Form("femployeetrainingsessionslistsrch");

// Validate function for search
femployeetrainingsessionslistsrch.validate = function(fobj) {
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
femployeetrainingsessionslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeetrainingsessionslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeetrainingsessionslistsrch.lists["x_status"] = <?php echo $employeetrainingsessions_list->status->Lookup->toClientList() ?>;
femployeetrainingsessionslistsrch.lists["x_status"].options = <?php echo JsonEncode($employeetrainingsessions_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployeetrainingsessionslistsrch.filterList = <?php echo $employeetrainingsessions_list->getFilterList() ?>;
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
<?php if (!$employeetrainingsessions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employeetrainingsessions_list->TotalRecs > 0 && $employeetrainingsessions_list->ExportOptions->visible()) { ?>
<?php $employeetrainingsessions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employeetrainingsessions_list->ImportOptions->visible()) { ?>
<?php $employeetrainingsessions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employeetrainingsessions_list->SearchOptions->visible()) { ?>
<?php $employeetrainingsessions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employeetrainingsessions_list->FilterOptions->visible()) { ?>
<?php $employeetrainingsessions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employeetrainingsessions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employeetrainingsessions->isExport() && !$employeetrainingsessions->CurrentAction) { ?>
<form name="femployeetrainingsessionslistsrch" id="femployeetrainingsessionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employeetrainingsessions_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployeetrainingsessionslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employeetrainingsessions">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employeetrainingsessions_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employeetrainingsessions->RowType = ROWTYPE_SEARCH;

// Render row
$employeetrainingsessions->resetAttributes();
$employeetrainingsessions_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employeetrainingsessions->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employeetrainingsessions->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employeetrainingsessions" data-field="x_status" data-value-separator="<?php echo $employeetrainingsessions->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employeetrainingsessions->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employeetrainingsessions->status->radioButtonListHtml(FALSE, "x_status") ?>
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
<?php $employeetrainingsessions_list->showPageHeader(); ?>
<?php
$employeetrainingsessions_list->showMessage();
?>
<?php if ($employeetrainingsessions_list->TotalRecs > 0 || $employeetrainingsessions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employeetrainingsessions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employeetrainingsessions">
<?php if (!$employeetrainingsessions->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employeetrainingsessions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employeetrainingsessions_list->Pager)) $employeetrainingsessions_list->Pager = new NumericPager($employeetrainingsessions_list->StartRec, $employeetrainingsessions_list->DisplayRecs, $employeetrainingsessions_list->TotalRecs, $employeetrainingsessions_list->RecRange, $employeetrainingsessions_list->AutoHidePager) ?>
<?php if ($employeetrainingsessions_list->Pager->RecordCount > 0 && $employeetrainingsessions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employeetrainingsessions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employeetrainingsessions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employeetrainingsessions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employeetrainingsessions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employeetrainingsessions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employeetrainingsessions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employeetrainingsessions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employeetrainingsessions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employeetrainingsessions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employeetrainingsessions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employeetrainingsessions_list->TotalRecs > 0 && (!$employeetrainingsessions_list->AutoHidePageSizeSelector || $employeetrainingsessions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employeetrainingsessions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employeetrainingsessions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employeetrainingsessions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employeetrainingsessions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employeetrainingsessions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employeetrainingsessions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employeetrainingsessions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employeetrainingsessions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employeetrainingsessions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployeetrainingsessionslist" id="femployeetrainingsessionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employeetrainingsessions_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employeetrainingsessions_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
<div id="gmp_employeetrainingsessions" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employeetrainingsessions_list->TotalRecs > 0 || $employeetrainingsessions->isGridEdit()) { ?>
<table id="tbl_employeetrainingsessionslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employeetrainingsessions_list->RowType = ROWTYPE_HEADER;

// Render list options
$employeetrainingsessions_list->renderListOptions();

// Render list options (header, left)
$employeetrainingsessions_list->ListOptions->render("header", "left");
?>
<?php if ($employeetrainingsessions->id->Visible) { // id ?>
	<?php if ($employeetrainingsessions->sortUrl($employeetrainingsessions->id) == "") { ?>
		<th data-name="id" class="<?php echo $employeetrainingsessions->id->headerCellClass() ?>"><div id="elh_employeetrainingsessions_id" class="employeetrainingsessions_id"><div class="ew-table-header-caption"><?php echo $employeetrainingsessions->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employeetrainingsessions->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employeetrainingsessions->SortUrl($employeetrainingsessions->id) ?>',1);"><div id="elh_employeetrainingsessions_id" class="employeetrainingsessions_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employeetrainingsessions->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employeetrainingsessions->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employeetrainingsessions->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employeetrainingsessions->employee->Visible) { // employee ?>
	<?php if ($employeetrainingsessions->sortUrl($employeetrainingsessions->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employeetrainingsessions->employee->headerCellClass() ?>"><div id="elh_employeetrainingsessions_employee" class="employeetrainingsessions_employee"><div class="ew-table-header-caption"><?php echo $employeetrainingsessions->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employeetrainingsessions->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employeetrainingsessions->SortUrl($employeetrainingsessions->employee) ?>',1);"><div id="elh_employeetrainingsessions_employee" class="employeetrainingsessions_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employeetrainingsessions->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employeetrainingsessions->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employeetrainingsessions->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employeetrainingsessions->trainingSession->Visible) { // trainingSession ?>
	<?php if ($employeetrainingsessions->sortUrl($employeetrainingsessions->trainingSession) == "") { ?>
		<th data-name="trainingSession" class="<?php echo $employeetrainingsessions->trainingSession->headerCellClass() ?>"><div id="elh_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession"><div class="ew-table-header-caption"><?php echo $employeetrainingsessions->trainingSession->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="trainingSession" class="<?php echo $employeetrainingsessions->trainingSession->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employeetrainingsessions->SortUrl($employeetrainingsessions->trainingSession) ?>',1);"><div id="elh_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employeetrainingsessions->trainingSession->caption() ?></span><span class="ew-table-header-sort"><?php if ($employeetrainingsessions->trainingSession->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employeetrainingsessions->trainingSession->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employeetrainingsessions->status->Visible) { // status ?>
	<?php if ($employeetrainingsessions->sortUrl($employeetrainingsessions->status) == "") { ?>
		<th data-name="status" class="<?php echo $employeetrainingsessions->status->headerCellClass() ?>"><div id="elh_employeetrainingsessions_status" class="employeetrainingsessions_status"><div class="ew-table-header-caption"><?php echo $employeetrainingsessions->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employeetrainingsessions->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employeetrainingsessions->SortUrl($employeetrainingsessions->status) ?>',1);"><div id="elh_employeetrainingsessions_status" class="employeetrainingsessions_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employeetrainingsessions->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employeetrainingsessions->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employeetrainingsessions->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employeetrainingsessions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employeetrainingsessions->ExportAll && $employeetrainingsessions->isExport()) {
	$employeetrainingsessions_list->StopRec = $employeetrainingsessions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employeetrainingsessions_list->TotalRecs > $employeetrainingsessions_list->StartRec + $employeetrainingsessions_list->DisplayRecs - 1)
		$employeetrainingsessions_list->StopRec = $employeetrainingsessions_list->StartRec + $employeetrainingsessions_list->DisplayRecs - 1;
	else
		$employeetrainingsessions_list->StopRec = $employeetrainingsessions_list->TotalRecs;
}
$employeetrainingsessions_list->RecCnt = $employeetrainingsessions_list->StartRec - 1;
if ($employeetrainingsessions_list->Recordset && !$employeetrainingsessions_list->Recordset->EOF) {
	$employeetrainingsessions_list->Recordset->moveFirst();
	$selectLimit = $employeetrainingsessions_list->UseSelectLimit;
	if (!$selectLimit && $employeetrainingsessions_list->StartRec > 1)
		$employeetrainingsessions_list->Recordset->move($employeetrainingsessions_list->StartRec - 1);
} elseif (!$employeetrainingsessions->AllowAddDeleteRow && $employeetrainingsessions_list->StopRec == 0) {
	$employeetrainingsessions_list->StopRec = $employeetrainingsessions->GridAddRowCount;
}

// Initialize aggregate
$employeetrainingsessions->RowType = ROWTYPE_AGGREGATEINIT;
$employeetrainingsessions->resetAttributes();
$employeetrainingsessions_list->renderRow();
while ($employeetrainingsessions_list->RecCnt < $employeetrainingsessions_list->StopRec) {
	$employeetrainingsessions_list->RecCnt++;
	if ($employeetrainingsessions_list->RecCnt >= $employeetrainingsessions_list->StartRec) {
		$employeetrainingsessions_list->RowCnt++;

		// Set up key count
		$employeetrainingsessions_list->KeyCount = $employeetrainingsessions_list->RowIndex;

		// Init row class and style
		$employeetrainingsessions->resetAttributes();
		$employeetrainingsessions->CssClass = "";
		if ($employeetrainingsessions->isGridAdd()) {
		} else {
			$employeetrainingsessions_list->loadRowValues($employeetrainingsessions_list->Recordset); // Load row values
		}
		$employeetrainingsessions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employeetrainingsessions->RowAttrs = array_merge($employeetrainingsessions->RowAttrs, array('data-rowindex'=>$employeetrainingsessions_list->RowCnt, 'id'=>'r' . $employeetrainingsessions_list->RowCnt . '_employeetrainingsessions', 'data-rowtype'=>$employeetrainingsessions->RowType));

		// Render row
		$employeetrainingsessions_list->renderRow();

		// Render list options
		$employeetrainingsessions_list->renderListOptions();
?>
	<tr<?php echo $employeetrainingsessions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employeetrainingsessions_list->ListOptions->render("body", "left", $employeetrainingsessions_list->RowCnt);
?>
	<?php if ($employeetrainingsessions->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employeetrainingsessions->id->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_list->RowCnt ?>_employeetrainingsessions_id" class="employeetrainingsessions_id">
<span<?php echo $employeetrainingsessions->id->viewAttributes() ?>>
<?php echo $employeetrainingsessions->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employeetrainingsessions->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employeetrainingsessions->employee->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_list->RowCnt ?>_employeetrainingsessions_employee" class="employeetrainingsessions_employee">
<span<?php echo $employeetrainingsessions->employee->viewAttributes() ?>>
<?php echo $employeetrainingsessions->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employeetrainingsessions->trainingSession->Visible) { // trainingSession ?>
		<td data-name="trainingSession"<?php echo $employeetrainingsessions->trainingSession->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_list->RowCnt ?>_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession">
<span<?php echo $employeetrainingsessions->trainingSession->viewAttributes() ?>>
<?php echo $employeetrainingsessions->trainingSession->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employeetrainingsessions->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employeetrainingsessions->status->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_list->RowCnt ?>_employeetrainingsessions_status" class="employeetrainingsessions_status">
<span<?php echo $employeetrainingsessions->status->viewAttributes() ?>>
<?php echo $employeetrainingsessions->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employeetrainingsessions_list->ListOptions->render("body", "right", $employeetrainingsessions_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employeetrainingsessions->isGridAdd())
		$employeetrainingsessions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employeetrainingsessions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employeetrainingsessions_list->Recordset)
	$employeetrainingsessions_list->Recordset->Close();
?>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employeetrainingsessions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employeetrainingsessions_list->Pager)) $employeetrainingsessions_list->Pager = new NumericPager($employeetrainingsessions_list->StartRec, $employeetrainingsessions_list->DisplayRecs, $employeetrainingsessions_list->TotalRecs, $employeetrainingsessions_list->RecRange, $employeetrainingsessions_list->AutoHidePager) ?>
<?php if ($employeetrainingsessions_list->Pager->RecordCount > 0 && $employeetrainingsessions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employeetrainingsessions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employeetrainingsessions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employeetrainingsessions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employeetrainingsessions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employeetrainingsessions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employeetrainingsessions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employeetrainingsessions_list->pageUrl() ?>start=<?php echo $employeetrainingsessions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employeetrainingsessions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employeetrainingsessions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employeetrainingsessions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employeetrainingsessions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employeetrainingsessions_list->TotalRecs > 0 && (!$employeetrainingsessions_list->AutoHidePageSizeSelector || $employeetrainingsessions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employeetrainingsessions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employeetrainingsessions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employeetrainingsessions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employeetrainingsessions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employeetrainingsessions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employeetrainingsessions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employeetrainingsessions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employeetrainingsessions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employeetrainingsessions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employeetrainingsessions_list->TotalRecs == 0 && !$employeetrainingsessions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employeetrainingsessions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employeetrainingsessions_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employeetrainingsessions->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employeetrainingsessions", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employeetrainingsessions_list->terminate();
?>