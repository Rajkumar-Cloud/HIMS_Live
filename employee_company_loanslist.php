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
$employee_company_loans_list = new employee_company_loans_list();

// Run the page
$employee_company_loans_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_company_loans_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_company_loans->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_company_loanslist = currentForm = new ew.Form("femployee_company_loanslist", "list");
femployee_company_loanslist.formKeyCountName = '<?php echo $employee_company_loans_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_company_loanslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_company_loanslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_company_loanslist.lists["x_status"] = <?php echo $employee_company_loans_list->status->Lookup->toClientList() ?>;
femployee_company_loanslist.lists["x_status"].options = <?php echo JsonEncode($employee_company_loans_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_company_loanslistsrch = currentSearchForm = new ew.Form("femployee_company_loanslistsrch");

// Validate function for search
femployee_company_loanslistsrch.validate = function(fobj) {
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
femployee_company_loanslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_company_loanslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_company_loanslistsrch.lists["x_status"] = <?php echo $employee_company_loans_list->status->Lookup->toClientList() ?>;
femployee_company_loanslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_company_loans_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_company_loanslistsrch.filterList = <?php echo $employee_company_loans_list->getFilterList() ?>;
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
<?php if (!$employee_company_loans->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_company_loans_list->TotalRecs > 0 && $employee_company_loans_list->ExportOptions->visible()) { ?>
<?php $employee_company_loans_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_company_loans_list->ImportOptions->visible()) { ?>
<?php $employee_company_loans_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_company_loans_list->SearchOptions->visible()) { ?>
<?php $employee_company_loans_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_company_loans_list->FilterOptions->visible()) { ?>
<?php $employee_company_loans_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_company_loans_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_company_loans->isExport() && !$employee_company_loans->CurrentAction) { ?>
<form name="femployee_company_loanslistsrch" id="femployee_company_loanslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_company_loans_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_company_loanslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_company_loans">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_company_loans_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_company_loans->RowType = ROWTYPE_SEARCH;

// Render row
$employee_company_loans->resetAttributes();
$employee_company_loans_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_company_loans->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_company_loans->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_company_loans" data-field="x_status" data-value-separator="<?php echo $employee_company_loans->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_company_loans->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_company_loans->status->radioButtonListHtml(FALSE, "x_status") ?>
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
<?php $employee_company_loans_list->showPageHeader(); ?>
<?php
$employee_company_loans_list->showMessage();
?>
<?php if ($employee_company_loans_list->TotalRecs > 0 || $employee_company_loans->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_company_loans_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_company_loans">
<?php if (!$employee_company_loans->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_company_loans->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_company_loans_list->Pager)) $employee_company_loans_list->Pager = new NumericPager($employee_company_loans_list->StartRec, $employee_company_loans_list->DisplayRecs, $employee_company_loans_list->TotalRecs, $employee_company_loans_list->RecRange, $employee_company_loans_list->AutoHidePager) ?>
<?php if ($employee_company_loans_list->Pager->RecordCount > 0 && $employee_company_loans_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_company_loans_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_company_loans_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_company_loans_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_company_loans_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_company_loans_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_company_loans_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_company_loans_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_company_loans_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_company_loans_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_company_loans_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_company_loans_list->TotalRecs > 0 && (!$employee_company_loans_list->AutoHidePageSizeSelector || $employee_company_loans_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_company_loans">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_company_loans_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_company_loans_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_company_loans_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_company_loans_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_company_loans_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_company_loans_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_company_loans->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_company_loans_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_company_loanslist" id="femployee_company_loanslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_company_loans_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_company_loans_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<div id="gmp_employee_company_loans" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_company_loans_list->TotalRecs > 0 || $employee_company_loans->isGridEdit()) { ?>
<table id="tbl_employee_company_loanslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_company_loans_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_company_loans_list->renderListOptions();

// Render list options (header, left)
$employee_company_loans_list->ListOptions->render("header", "left");
?>
<?php if ($employee_company_loans->id->Visible) { // id ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_company_loans->id->headerCellClass() ?>"><div id="elh_employee_company_loans_id" class="employee_company_loans_id"><div class="ew-table-header-caption"><?php echo $employee_company_loans->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_company_loans->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->id) ?>',1);"><div id="elh_employee_company_loans_id" class="employee_company_loans_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->employee->Visible) { // employee ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_company_loans->employee->headerCellClass() ?>"><div id="elh_employee_company_loans_employee" class="employee_company_loans_employee"><div class="ew-table-header-caption"><?php echo $employee_company_loans->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_company_loans->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->employee) ?>',1);"><div id="elh_employee_company_loans_employee" class="employee_company_loans_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->loan->Visible) { // loan ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->loan) == "") { ?>
		<th data-name="loan" class="<?php echo $employee_company_loans->loan->headerCellClass() ?>"><div id="elh_employee_company_loans_loan" class="employee_company_loans_loan"><div class="ew-table-header-caption"><?php echo $employee_company_loans->loan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="loan" class="<?php echo $employee_company_loans->loan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->loan) ?>',1);"><div id="elh_employee_company_loans_loan" class="employee_company_loans_loan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->loan->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->loan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->loan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->start_date->Visible) { // start_date ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $employee_company_loans->start_date->headerCellClass() ?>"><div id="elh_employee_company_loans_start_date" class="employee_company_loans_start_date"><div class="ew-table-header-caption"><?php echo $employee_company_loans->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $employee_company_loans->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->start_date) ?>',1);"><div id="elh_employee_company_loans_start_date" class="employee_company_loans_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->last_installment_date->Visible) { // last_installment_date ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->last_installment_date) == "") { ?>
		<th data-name="last_installment_date" class="<?php echo $employee_company_loans->last_installment_date->headerCellClass() ?>"><div id="elh_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date"><div class="ew-table-header-caption"><?php echo $employee_company_loans->last_installment_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_installment_date" class="<?php echo $employee_company_loans->last_installment_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->last_installment_date) ?>',1);"><div id="elh_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->last_installment_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->last_installment_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->last_installment_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->period_months->Visible) { // period_months ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->period_months) == "") { ?>
		<th data-name="period_months" class="<?php echo $employee_company_loans->period_months->headerCellClass() ?>"><div id="elh_employee_company_loans_period_months" class="employee_company_loans_period_months"><div class="ew-table-header-caption"><?php echo $employee_company_loans->period_months->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="period_months" class="<?php echo $employee_company_loans->period_months->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->period_months) ?>',1);"><div id="elh_employee_company_loans_period_months" class="employee_company_loans_period_months">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->period_months->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->period_months->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->period_months->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->currency->Visible) { // currency ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $employee_company_loans->currency->headerCellClass() ?>"><div id="elh_employee_company_loans_currency" class="employee_company_loans_currency"><div class="ew-table-header-caption"><?php echo $employee_company_loans->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $employee_company_loans->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->currency) ?>',1);"><div id="elh_employee_company_loans_currency" class="employee_company_loans_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->amount->Visible) { // amount ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $employee_company_loans->amount->headerCellClass() ?>"><div id="elh_employee_company_loans_amount" class="employee_company_loans_amount"><div class="ew-table-header-caption"><?php echo $employee_company_loans->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $employee_company_loans->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->amount) ?>',1);"><div id="elh_employee_company_loans_amount" class="employee_company_loans_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->monthly_installment->Visible) { // monthly_installment ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->monthly_installment) == "") { ?>
		<th data-name="monthly_installment" class="<?php echo $employee_company_loans->monthly_installment->headerCellClass() ?>"><div id="elh_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment"><div class="ew-table-header-caption"><?php echo $employee_company_loans->monthly_installment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="monthly_installment" class="<?php echo $employee_company_loans->monthly_installment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->monthly_installment) ?>',1);"><div id="elh_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->monthly_installment->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->monthly_installment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->monthly_installment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_company_loans->status->Visible) { // status ?>
	<?php if ($employee_company_loans->sortUrl($employee_company_loans->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_company_loans->status->headerCellClass() ?>"><div id="elh_employee_company_loans_status" class="employee_company_loans_status"><div class="ew-table-header-caption"><?php echo $employee_company_loans->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_company_loans->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_company_loans->SortUrl($employee_company_loans->status) ?>',1);"><div id="elh_employee_company_loans_status" class="employee_company_loans_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_company_loans->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_company_loans->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_company_loans->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_company_loans_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_company_loans->ExportAll && $employee_company_loans->isExport()) {
	$employee_company_loans_list->StopRec = $employee_company_loans_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_company_loans_list->TotalRecs > $employee_company_loans_list->StartRec + $employee_company_loans_list->DisplayRecs - 1)
		$employee_company_loans_list->StopRec = $employee_company_loans_list->StartRec + $employee_company_loans_list->DisplayRecs - 1;
	else
		$employee_company_loans_list->StopRec = $employee_company_loans_list->TotalRecs;
}
$employee_company_loans_list->RecCnt = $employee_company_loans_list->StartRec - 1;
if ($employee_company_loans_list->Recordset && !$employee_company_loans_list->Recordset->EOF) {
	$employee_company_loans_list->Recordset->moveFirst();
	$selectLimit = $employee_company_loans_list->UseSelectLimit;
	if (!$selectLimit && $employee_company_loans_list->StartRec > 1)
		$employee_company_loans_list->Recordset->move($employee_company_loans_list->StartRec - 1);
} elseif (!$employee_company_loans->AllowAddDeleteRow && $employee_company_loans_list->StopRec == 0) {
	$employee_company_loans_list->StopRec = $employee_company_loans->GridAddRowCount;
}

// Initialize aggregate
$employee_company_loans->RowType = ROWTYPE_AGGREGATEINIT;
$employee_company_loans->resetAttributes();
$employee_company_loans_list->renderRow();
while ($employee_company_loans_list->RecCnt < $employee_company_loans_list->StopRec) {
	$employee_company_loans_list->RecCnt++;
	if ($employee_company_loans_list->RecCnt >= $employee_company_loans_list->StartRec) {
		$employee_company_loans_list->RowCnt++;

		// Set up key count
		$employee_company_loans_list->KeyCount = $employee_company_loans_list->RowIndex;

		// Init row class and style
		$employee_company_loans->resetAttributes();
		$employee_company_loans->CssClass = "";
		if ($employee_company_loans->isGridAdd()) {
		} else {
			$employee_company_loans_list->loadRowValues($employee_company_loans_list->Recordset); // Load row values
		}
		$employee_company_loans->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_company_loans->RowAttrs = array_merge($employee_company_loans->RowAttrs, array('data-rowindex'=>$employee_company_loans_list->RowCnt, 'id'=>'r' . $employee_company_loans_list->RowCnt . '_employee_company_loans', 'data-rowtype'=>$employee_company_loans->RowType));

		// Render row
		$employee_company_loans_list->renderRow();

		// Render list options
		$employee_company_loans_list->renderListOptions();
?>
	<tr<?php echo $employee_company_loans->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_company_loans_list->ListOptions->render("body", "left", $employee_company_loans_list->RowCnt);
?>
	<?php if ($employee_company_loans->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_company_loans->id->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_id" class="employee_company_loans_id">
<span<?php echo $employee_company_loans->id->viewAttributes() ?>>
<?php echo $employee_company_loans->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_company_loans->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_employee" class="employee_company_loans_employee">
<span<?php echo $employee_company_loans->employee->viewAttributes() ?>>
<?php echo $employee_company_loans->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->loan->Visible) { // loan ?>
		<td data-name="loan"<?php echo $employee_company_loans->loan->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_loan" class="employee_company_loans_loan">
<span<?php echo $employee_company_loans->loan->viewAttributes() ?>>
<?php echo $employee_company_loans->loan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $employee_company_loans->start_date->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_start_date" class="employee_company_loans_start_date">
<span<?php echo $employee_company_loans->start_date->viewAttributes() ?>>
<?php echo $employee_company_loans->start_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->last_installment_date->Visible) { // last_installment_date ?>
		<td data-name="last_installment_date"<?php echo $employee_company_loans->last_installment_date->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date">
<span<?php echo $employee_company_loans->last_installment_date->viewAttributes() ?>>
<?php echo $employee_company_loans->last_installment_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->period_months->Visible) { // period_months ?>
		<td data-name="period_months"<?php echo $employee_company_loans->period_months->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_period_months" class="employee_company_loans_period_months">
<span<?php echo $employee_company_loans->period_months->viewAttributes() ?>>
<?php echo $employee_company_loans->period_months->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $employee_company_loans->currency->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_currency" class="employee_company_loans_currency">
<span<?php echo $employee_company_loans->currency->viewAttributes() ?>>
<?php echo $employee_company_loans->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $employee_company_loans->amount->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_amount" class="employee_company_loans_amount">
<span<?php echo $employee_company_loans->amount->viewAttributes() ?>>
<?php echo $employee_company_loans->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->monthly_installment->Visible) { // monthly_installment ?>
		<td data-name="monthly_installment"<?php echo $employee_company_loans->monthly_installment->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment">
<span<?php echo $employee_company_loans->monthly_installment->viewAttributes() ?>>
<?php echo $employee_company_loans->monthly_installment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_company_loans->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_company_loans->status->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_list->RowCnt ?>_employee_company_loans_status" class="employee_company_loans_status">
<span<?php echo $employee_company_loans->status->viewAttributes() ?>>
<?php echo $employee_company_loans->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_company_loans_list->ListOptions->render("body", "right", $employee_company_loans_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_company_loans->isGridAdd())
		$employee_company_loans_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_company_loans->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_company_loans_list->Recordset)
	$employee_company_loans_list->Recordset->Close();
?>
<?php if (!$employee_company_loans->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_company_loans->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_company_loans_list->Pager)) $employee_company_loans_list->Pager = new NumericPager($employee_company_loans_list->StartRec, $employee_company_loans_list->DisplayRecs, $employee_company_loans_list->TotalRecs, $employee_company_loans_list->RecRange, $employee_company_loans_list->AutoHidePager) ?>
<?php if ($employee_company_loans_list->Pager->RecordCount > 0 && $employee_company_loans_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_company_loans_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_company_loans_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_company_loans_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_company_loans_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_company_loans_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_company_loans_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_company_loans_list->pageUrl() ?>start=<?php echo $employee_company_loans_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_company_loans_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_company_loans_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_company_loans_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_company_loans_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_company_loans_list->TotalRecs > 0 && (!$employee_company_loans_list->AutoHidePageSizeSelector || $employee_company_loans_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_company_loans">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_company_loans_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_company_loans_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_company_loans_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_company_loans_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_company_loans_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_company_loans_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_company_loans->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_company_loans_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_company_loans_list->TotalRecs == 0 && !$employee_company_loans->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_company_loans_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_company_loans_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_company_loans->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_company_loans->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_company_loans", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_company_loans_list->terminate();
?>