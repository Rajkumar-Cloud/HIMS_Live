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
$employees_payroll_list = new employees_payroll_list();

// Run the page
$employees_payroll_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_payroll_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employees_payroll->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployees_payrolllist = currentForm = new ew.Form("femployees_payrolllist", "list");
femployees_payrolllist.formKeyCountName = '<?php echo $employees_payroll_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployees_payrolllist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_payrolllist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var femployees_payrolllistsrch = currentSearchForm = new ew.Form("femployees_payrolllistsrch");

// Filters
femployees_payrolllistsrch.filterList = <?php echo $employees_payroll_list->getFilterList() ?>;
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
<?php if (!$employees_payroll->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employees_payroll_list->TotalRecs > 0 && $employees_payroll_list->ExportOptions->visible()) { ?>
<?php $employees_payroll_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employees_payroll_list->ImportOptions->visible()) { ?>
<?php $employees_payroll_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employees_payroll_list->SearchOptions->visible()) { ?>
<?php $employees_payroll_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employees_payroll_list->FilterOptions->visible()) { ?>
<?php $employees_payroll_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employees_payroll_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employees_payroll->isExport() && !$employees_payroll->CurrentAction) { ?>
<form name="femployees_payrolllistsrch" id="femployees_payrolllistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employees_payroll_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployees_payrolllistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employees_payroll">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employees_payroll_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employees_payroll_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employees_payroll_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employees_payroll_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employees_payroll_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employees_payroll_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employees_payroll_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employees_payroll_list->showPageHeader(); ?>
<?php
$employees_payroll_list->showMessage();
?>
<?php if ($employees_payroll_list->TotalRecs > 0 || $employees_payroll->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employees_payroll_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employees_payroll">
<?php if (!$employees_payroll->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employees_payroll->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employees_payroll_list->Pager)) $employees_payroll_list->Pager = new NumericPager($employees_payroll_list->StartRec, $employees_payroll_list->DisplayRecs, $employees_payroll_list->TotalRecs, $employees_payroll_list->RecRange, $employees_payroll_list->AutoHidePager) ?>
<?php if ($employees_payroll_list->Pager->RecordCount > 0 && $employees_payroll_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employees_payroll_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employees_payroll_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employees_payroll_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employees_payroll_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employees_payroll_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employees_payroll_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employees_payroll_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employees_payroll_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employees_payroll_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employees_payroll_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employees_payroll_list->TotalRecs > 0 && (!$employees_payroll_list->AutoHidePageSizeSelector || $employees_payroll_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employees_payroll">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employees_payroll_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employees_payroll_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employees_payroll_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employees_payroll_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employees_payroll_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employees_payroll_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employees_payroll->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employees_payroll_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployees_payrolllist" id="femployees_payrolllist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_payroll_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_payroll_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<div id="gmp_employees_payroll" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employees_payroll_list->TotalRecs > 0 || $employees_payroll->isGridEdit()) { ?>
<table id="tbl_employees_payrolllist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employees_payroll_list->RowType = ROWTYPE_HEADER;

// Render list options
$employees_payroll_list->renderListOptions();

// Render list options (header, left)
$employees_payroll_list->ListOptions->render("header", "left");
?>
<?php if ($employees_payroll->id->Visible) { // id ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->id) == "") { ?>
		<th data-name="id" class="<?php echo $employees_payroll->id->headerCellClass() ?>"><div id="elh_employees_payroll_id" class="employees_payroll_id"><div class="ew-table-header-caption"><?php echo $employees_payroll->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employees_payroll->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->id) ?>',1);"><div id="elh_employees_payroll_id" class="employees_payroll_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_payroll->employee->Visible) { // employee ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employees_payroll->employee->headerCellClass() ?>"><div id="elh_employees_payroll_employee" class="employees_payroll_employee"><div class="ew-table-header-caption"><?php echo $employees_payroll->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employees_payroll->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->employee) ?>',1);"><div id="elh_employees_payroll_employee" class="employees_payroll_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_payroll->pay_frequency->Visible) { // pay_frequency ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->pay_frequency) == "") { ?>
		<th data-name="pay_frequency" class="<?php echo $employees_payroll->pay_frequency->headerCellClass() ?>"><div id="elh_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency"><div class="ew-table-header-caption"><?php echo $employees_payroll->pay_frequency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pay_frequency" class="<?php echo $employees_payroll->pay_frequency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->pay_frequency) ?>',1);"><div id="elh_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->pay_frequency->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->pay_frequency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->pay_frequency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_payroll->currency->Visible) { // currency ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $employees_payroll->currency->headerCellClass() ?>"><div id="elh_employees_payroll_currency" class="employees_payroll_currency"><div class="ew-table-header-caption"><?php echo $employees_payroll->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $employees_payroll->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->currency) ?>',1);"><div id="elh_employees_payroll_currency" class="employees_payroll_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_payroll->deduction_exemptions->Visible) { // deduction_exemptions ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->deduction_exemptions) == "") { ?>
		<th data-name="deduction_exemptions" class="<?php echo $employees_payroll->deduction_exemptions->headerCellClass() ?>"><div id="elh_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions"><div class="ew-table-header-caption"><?php echo $employees_payroll->deduction_exemptions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deduction_exemptions" class="<?php echo $employees_payroll->deduction_exemptions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->deduction_exemptions) ?>',1);"><div id="elh_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->deduction_exemptions->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->deduction_exemptions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->deduction_exemptions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_payroll->deduction_allowed->Visible) { // deduction_allowed ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->deduction_allowed) == "") { ?>
		<th data-name="deduction_allowed" class="<?php echo $employees_payroll->deduction_allowed->headerCellClass() ?>"><div id="elh_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed"><div class="ew-table-header-caption"><?php echo $employees_payroll->deduction_allowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deduction_allowed" class="<?php echo $employees_payroll->deduction_allowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->deduction_allowed) ?>',1);"><div id="elh_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->deduction_allowed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->deduction_allowed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->deduction_allowed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employees_payroll->deduction_group->Visible) { // deduction_group ?>
	<?php if ($employees_payroll->sortUrl($employees_payroll->deduction_group) == "") { ?>
		<th data-name="deduction_group" class="<?php echo $employees_payroll->deduction_group->headerCellClass() ?>"><div id="elh_employees_payroll_deduction_group" class="employees_payroll_deduction_group"><div class="ew-table-header-caption"><?php echo $employees_payroll->deduction_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deduction_group" class="<?php echo $employees_payroll->deduction_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employees_payroll->SortUrl($employees_payroll->deduction_group) ?>',1);"><div id="elh_employees_payroll_deduction_group" class="employees_payroll_deduction_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employees_payroll->deduction_group->caption() ?></span><span class="ew-table-header-sort"><?php if ($employees_payroll->deduction_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employees_payroll->deduction_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employees_payroll_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employees_payroll->ExportAll && $employees_payroll->isExport()) {
	$employees_payroll_list->StopRec = $employees_payroll_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employees_payroll_list->TotalRecs > $employees_payroll_list->StartRec + $employees_payroll_list->DisplayRecs - 1)
		$employees_payroll_list->StopRec = $employees_payroll_list->StartRec + $employees_payroll_list->DisplayRecs - 1;
	else
		$employees_payroll_list->StopRec = $employees_payroll_list->TotalRecs;
}
$employees_payroll_list->RecCnt = $employees_payroll_list->StartRec - 1;
if ($employees_payroll_list->Recordset && !$employees_payroll_list->Recordset->EOF) {
	$employees_payroll_list->Recordset->moveFirst();
	$selectLimit = $employees_payroll_list->UseSelectLimit;
	if (!$selectLimit && $employees_payroll_list->StartRec > 1)
		$employees_payroll_list->Recordset->move($employees_payroll_list->StartRec - 1);
} elseif (!$employees_payroll->AllowAddDeleteRow && $employees_payroll_list->StopRec == 0) {
	$employees_payroll_list->StopRec = $employees_payroll->GridAddRowCount;
}

// Initialize aggregate
$employees_payroll->RowType = ROWTYPE_AGGREGATEINIT;
$employees_payroll->resetAttributes();
$employees_payroll_list->renderRow();
while ($employees_payroll_list->RecCnt < $employees_payroll_list->StopRec) {
	$employees_payroll_list->RecCnt++;
	if ($employees_payroll_list->RecCnt >= $employees_payroll_list->StartRec) {
		$employees_payroll_list->RowCnt++;

		// Set up key count
		$employees_payroll_list->KeyCount = $employees_payroll_list->RowIndex;

		// Init row class and style
		$employees_payroll->resetAttributes();
		$employees_payroll->CssClass = "";
		if ($employees_payroll->isGridAdd()) {
		} else {
			$employees_payroll_list->loadRowValues($employees_payroll_list->Recordset); // Load row values
		}
		$employees_payroll->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employees_payroll->RowAttrs = array_merge($employees_payroll->RowAttrs, array('data-rowindex'=>$employees_payroll_list->RowCnt, 'id'=>'r' . $employees_payroll_list->RowCnt . '_employees_payroll', 'data-rowtype'=>$employees_payroll->RowType));

		// Render row
		$employees_payroll_list->renderRow();

		// Render list options
		$employees_payroll_list->renderListOptions();
?>
	<tr<?php echo $employees_payroll->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employees_payroll_list->ListOptions->render("body", "left", $employees_payroll_list->RowCnt);
?>
	<?php if ($employees_payroll->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employees_payroll->id->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_id" class="employees_payroll_id">
<span<?php echo $employees_payroll->id->viewAttributes() ?>>
<?php echo $employees_payroll->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_payroll->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employees_payroll->employee->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_employee" class="employees_payroll_employee">
<span<?php echo $employees_payroll->employee->viewAttributes() ?>>
<?php echo $employees_payroll->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_payroll->pay_frequency->Visible) { // pay_frequency ?>
		<td data-name="pay_frequency"<?php echo $employees_payroll->pay_frequency->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency">
<span<?php echo $employees_payroll->pay_frequency->viewAttributes() ?>>
<?php echo $employees_payroll->pay_frequency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_payroll->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $employees_payroll->currency->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_currency" class="employees_payroll_currency">
<span<?php echo $employees_payroll->currency->viewAttributes() ?>>
<?php echo $employees_payroll->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_payroll->deduction_exemptions->Visible) { // deduction_exemptions ?>
		<td data-name="deduction_exemptions"<?php echo $employees_payroll->deduction_exemptions->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions">
<span<?php echo $employees_payroll->deduction_exemptions->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_exemptions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_payroll->deduction_allowed->Visible) { // deduction_allowed ?>
		<td data-name="deduction_allowed"<?php echo $employees_payroll->deduction_allowed->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed">
<span<?php echo $employees_payroll->deduction_allowed->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_allowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employees_payroll->deduction_group->Visible) { // deduction_group ?>
		<td data-name="deduction_group"<?php echo $employees_payroll->deduction_group->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_list->RowCnt ?>_employees_payroll_deduction_group" class="employees_payroll_deduction_group">
<span<?php echo $employees_payroll->deduction_group->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employees_payroll_list->ListOptions->render("body", "right", $employees_payroll_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employees_payroll->isGridAdd())
		$employees_payroll_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employees_payroll->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employees_payroll_list->Recordset)
	$employees_payroll_list->Recordset->Close();
?>
<?php if (!$employees_payroll->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employees_payroll->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employees_payroll_list->Pager)) $employees_payroll_list->Pager = new NumericPager($employees_payroll_list->StartRec, $employees_payroll_list->DisplayRecs, $employees_payroll_list->TotalRecs, $employees_payroll_list->RecRange, $employees_payroll_list->AutoHidePager) ?>
<?php if ($employees_payroll_list->Pager->RecordCount > 0 && $employees_payroll_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employees_payroll_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employees_payroll_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employees_payroll_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employees_payroll_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employees_payroll_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employees_payroll_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employees_payroll_list->pageUrl() ?>start=<?php echo $employees_payroll_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employees_payroll_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employees_payroll_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employees_payroll_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employees_payroll_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employees_payroll_list->TotalRecs > 0 && (!$employees_payroll_list->AutoHidePageSizeSelector || $employees_payroll_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employees_payroll">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employees_payroll_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employees_payroll_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employees_payroll_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employees_payroll_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employees_payroll_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employees_payroll_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employees_payroll->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employees_payroll_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employees_payroll_list->TotalRecs == 0 && !$employees_payroll->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employees_payroll_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employees_payroll_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employees_payroll->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employees_payroll->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employees_payroll", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employees_payroll_list->terminate();
?>