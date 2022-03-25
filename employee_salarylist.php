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
$employee_salary_list = new employee_salary_list();

// Run the page
$employee_salary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_salary_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_salary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_salarylist = currentForm = new ew.Form("femployee_salarylist", "list");
femployee_salarylist.formKeyCountName = '<?php echo $employee_salary_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_salarylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_salarylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_salarylist.lists["x_pay_frequency"] = <?php echo $employee_salary_list->pay_frequency->Lookup->toClientList() ?>;
femployee_salarylist.lists["x_pay_frequency"].options = <?php echo JsonEncode($employee_salary_list->pay_frequency->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_salarylistsrch = currentSearchForm = new ew.Form("femployee_salarylistsrch");

// Validate function for search
femployee_salarylistsrch.validate = function(fobj) {
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
femployee_salarylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_salarylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_salarylistsrch.lists["x_pay_frequency"] = <?php echo $employee_salary_list->pay_frequency->Lookup->toClientList() ?>;
femployee_salarylistsrch.lists["x_pay_frequency"].options = <?php echo JsonEncode($employee_salary_list->pay_frequency->options(FALSE, TRUE)) ?>;

// Filters
femployee_salarylistsrch.filterList = <?php echo $employee_salary_list->getFilterList() ?>;
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
<?php if (!$employee_salary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_salary_list->TotalRecs > 0 && $employee_salary_list->ExportOptions->visible()) { ?>
<?php $employee_salary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_salary_list->ImportOptions->visible()) { ?>
<?php $employee_salary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_salary_list->SearchOptions->visible()) { ?>
<?php $employee_salary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_salary_list->FilterOptions->visible()) { ?>
<?php $employee_salary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_salary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_salary->isExport() && !$employee_salary->CurrentAction) { ?>
<form name="femployee_salarylistsrch" id="femployee_salarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_salary_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_salarylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_salary">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_salary_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_salary->RowType = ROWTYPE_SEARCH;

// Render row
$employee_salary->resetAttributes();
$employee_salary_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
	<div id="xsc_pay_frequency" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_salary->pay_frequency->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_pay_frequency" id="z_pay_frequency" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_pay_frequency" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_salary" data-field="x_pay_frequency" data-value-separator="<?php echo $employee_salary->pay_frequency->displayValueSeparatorAttribute() ?>" name="x_pay_frequency" id="x_pay_frequency" value="{value}"<?php echo $employee_salary->pay_frequency->editAttributes() ?>></div>
<div id="dsl_x_pay_frequency" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_salary->pay_frequency->radioButtonListHtml(FALSE, "x_pay_frequency") ?>
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
<?php $employee_salary_list->showPageHeader(); ?>
<?php
$employee_salary_list->showMessage();
?>
<?php if ($employee_salary_list->TotalRecs > 0 || $employee_salary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_salary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_salary">
<?php if (!$employee_salary->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_salary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_salary_list->Pager)) $employee_salary_list->Pager = new NumericPager($employee_salary_list->StartRec, $employee_salary_list->DisplayRecs, $employee_salary_list->TotalRecs, $employee_salary_list->RecRange, $employee_salary_list->AutoHidePager) ?>
<?php if ($employee_salary_list->Pager->RecordCount > 0 && $employee_salary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_salary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_salary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_salary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_salary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_salary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_salary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_salary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_salary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_salary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_salary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_salary_list->TotalRecs > 0 && (!$employee_salary_list->AutoHidePageSizeSelector || $employee_salary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_salary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_salary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_salary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_salary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_salary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_salary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_salary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_salary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_salary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_salarylist" id="femployee_salarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_salary_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_salary_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_salary">
<div id="gmp_employee_salary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_salary_list->TotalRecs > 0 || $employee_salary->isGridEdit()) { ?>
<table id="tbl_employee_salarylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_salary_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_salary_list->renderListOptions();

// Render list options (header, left)
$employee_salary_list->ListOptions->render("header", "left");
?>
<?php if ($employee_salary->id->Visible) { // id ?>
	<?php if ($employee_salary->sortUrl($employee_salary->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_salary->id->headerCellClass() ?>"><div id="elh_employee_salary_id" class="employee_salary_id"><div class="ew-table-header-caption"><?php echo $employee_salary->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_salary->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_salary->SortUrl($employee_salary->id) ?>',1);"><div id="elh_employee_salary_id" class="employee_salary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_salary->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_salary->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_salary->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_salary->employee->Visible) { // employee ?>
	<?php if ($employee_salary->sortUrl($employee_salary->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_salary->employee->headerCellClass() ?>"><div id="elh_employee_salary_employee" class="employee_salary_employee"><div class="ew-table-header-caption"><?php echo $employee_salary->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_salary->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_salary->SortUrl($employee_salary->employee) ?>',1);"><div id="elh_employee_salary_employee" class="employee_salary_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_salary->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_salary->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_salary->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_salary->component->Visible) { // component ?>
	<?php if ($employee_salary->sortUrl($employee_salary->component) == "") { ?>
		<th data-name="component" class="<?php echo $employee_salary->component->headerCellClass() ?>"><div id="elh_employee_salary_component" class="employee_salary_component"><div class="ew-table-header-caption"><?php echo $employee_salary->component->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="component" class="<?php echo $employee_salary->component->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_salary->SortUrl($employee_salary->component) ?>',1);"><div id="elh_employee_salary_component" class="employee_salary_component">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_salary->component->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_salary->component->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_salary->component->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
	<?php if ($employee_salary->sortUrl($employee_salary->pay_frequency) == "") { ?>
		<th data-name="pay_frequency" class="<?php echo $employee_salary->pay_frequency->headerCellClass() ?>"><div id="elh_employee_salary_pay_frequency" class="employee_salary_pay_frequency"><div class="ew-table-header-caption"><?php echo $employee_salary->pay_frequency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pay_frequency" class="<?php echo $employee_salary->pay_frequency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_salary->SortUrl($employee_salary->pay_frequency) ?>',1);"><div id="elh_employee_salary_pay_frequency" class="employee_salary_pay_frequency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_salary->pay_frequency->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_salary->pay_frequency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_salary->pay_frequency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_salary->currency->Visible) { // currency ?>
	<?php if ($employee_salary->sortUrl($employee_salary->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $employee_salary->currency->headerCellClass() ?>"><div id="elh_employee_salary_currency" class="employee_salary_currency"><div class="ew-table-header-caption"><?php echo $employee_salary->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $employee_salary->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_salary->SortUrl($employee_salary->currency) ?>',1);"><div id="elh_employee_salary_currency" class="employee_salary_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_salary->currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_salary->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_salary->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_salary->amount->Visible) { // amount ?>
	<?php if ($employee_salary->sortUrl($employee_salary->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $employee_salary->amount->headerCellClass() ?>"><div id="elh_employee_salary_amount" class="employee_salary_amount"><div class="ew-table-header-caption"><?php echo $employee_salary->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $employee_salary->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_salary->SortUrl($employee_salary->amount) ?>',1);"><div id="elh_employee_salary_amount" class="employee_salary_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_salary->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_salary->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_salary->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_salary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_salary->ExportAll && $employee_salary->isExport()) {
	$employee_salary_list->StopRec = $employee_salary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_salary_list->TotalRecs > $employee_salary_list->StartRec + $employee_salary_list->DisplayRecs - 1)
		$employee_salary_list->StopRec = $employee_salary_list->StartRec + $employee_salary_list->DisplayRecs - 1;
	else
		$employee_salary_list->StopRec = $employee_salary_list->TotalRecs;
}
$employee_salary_list->RecCnt = $employee_salary_list->StartRec - 1;
if ($employee_salary_list->Recordset && !$employee_salary_list->Recordset->EOF) {
	$employee_salary_list->Recordset->moveFirst();
	$selectLimit = $employee_salary_list->UseSelectLimit;
	if (!$selectLimit && $employee_salary_list->StartRec > 1)
		$employee_salary_list->Recordset->move($employee_salary_list->StartRec - 1);
} elseif (!$employee_salary->AllowAddDeleteRow && $employee_salary_list->StopRec == 0) {
	$employee_salary_list->StopRec = $employee_salary->GridAddRowCount;
}

// Initialize aggregate
$employee_salary->RowType = ROWTYPE_AGGREGATEINIT;
$employee_salary->resetAttributes();
$employee_salary_list->renderRow();
while ($employee_salary_list->RecCnt < $employee_salary_list->StopRec) {
	$employee_salary_list->RecCnt++;
	if ($employee_salary_list->RecCnt >= $employee_salary_list->StartRec) {
		$employee_salary_list->RowCnt++;

		// Set up key count
		$employee_salary_list->KeyCount = $employee_salary_list->RowIndex;

		// Init row class and style
		$employee_salary->resetAttributes();
		$employee_salary->CssClass = "";
		if ($employee_salary->isGridAdd()) {
		} else {
			$employee_salary_list->loadRowValues($employee_salary_list->Recordset); // Load row values
		}
		$employee_salary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_salary->RowAttrs = array_merge($employee_salary->RowAttrs, array('data-rowindex'=>$employee_salary_list->RowCnt, 'id'=>'r' . $employee_salary_list->RowCnt . '_employee_salary', 'data-rowtype'=>$employee_salary->RowType));

		// Render row
		$employee_salary_list->renderRow();

		// Render list options
		$employee_salary_list->renderListOptions();
?>
	<tr<?php echo $employee_salary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_salary_list->ListOptions->render("body", "left", $employee_salary_list->RowCnt);
?>
	<?php if ($employee_salary->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_salary->id->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_list->RowCnt ?>_employee_salary_id" class="employee_salary_id">
<span<?php echo $employee_salary->id->viewAttributes() ?>>
<?php echo $employee_salary->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_salary->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_salary->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_list->RowCnt ?>_employee_salary_employee" class="employee_salary_employee">
<span<?php echo $employee_salary->employee->viewAttributes() ?>>
<?php echo $employee_salary->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_salary->component->Visible) { // component ?>
		<td data-name="component"<?php echo $employee_salary->component->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_list->RowCnt ?>_employee_salary_component" class="employee_salary_component">
<span<?php echo $employee_salary->component->viewAttributes() ?>>
<?php echo $employee_salary->component->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
		<td data-name="pay_frequency"<?php echo $employee_salary->pay_frequency->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_list->RowCnt ?>_employee_salary_pay_frequency" class="employee_salary_pay_frequency">
<span<?php echo $employee_salary->pay_frequency->viewAttributes() ?>>
<?php echo $employee_salary->pay_frequency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_salary->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $employee_salary->currency->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_list->RowCnt ?>_employee_salary_currency" class="employee_salary_currency">
<span<?php echo $employee_salary->currency->viewAttributes() ?>>
<?php echo $employee_salary->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_salary->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $employee_salary->amount->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_list->RowCnt ?>_employee_salary_amount" class="employee_salary_amount">
<span<?php echo $employee_salary->amount->viewAttributes() ?>>
<?php echo $employee_salary->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_salary_list->ListOptions->render("body", "right", $employee_salary_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_salary->isGridAdd())
		$employee_salary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_salary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_salary_list->Recordset)
	$employee_salary_list->Recordset->Close();
?>
<?php if (!$employee_salary->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_salary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_salary_list->Pager)) $employee_salary_list->Pager = new NumericPager($employee_salary_list->StartRec, $employee_salary_list->DisplayRecs, $employee_salary_list->TotalRecs, $employee_salary_list->RecRange, $employee_salary_list->AutoHidePager) ?>
<?php if ($employee_salary_list->Pager->RecordCount > 0 && $employee_salary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_salary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_salary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_salary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_salary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_salary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_salary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_salary_list->pageUrl() ?>start=<?php echo $employee_salary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_salary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_salary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_salary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_salary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_salary_list->TotalRecs > 0 && (!$employee_salary_list->AutoHidePageSizeSelector || $employee_salary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_salary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_salary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_salary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_salary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_salary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_salary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_salary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_salary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_salary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_salary_list->TotalRecs == 0 && !$employee_salary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_salary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_salary_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_salary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_salary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_salary", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_salary_list->terminate();
?>