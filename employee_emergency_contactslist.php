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
$employee_emergency_contacts_list = new employee_emergency_contacts_list();

// Run the page
$employee_emergency_contacts_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_emergency_contacts_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_emergency_contactslist = currentForm = new ew.Form("femployee_emergency_contactslist", "list");
femployee_emergency_contactslist.formKeyCountName = '<?php echo $employee_emergency_contacts_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_emergency_contactslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emergency_contactslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var femployee_emergency_contactslistsrch = currentSearchForm = new ew.Form("femployee_emergency_contactslistsrch");

// Filters
femployee_emergency_contactslistsrch.filterList = <?php echo $employee_emergency_contacts_list->getFilterList() ?>;
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
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_emergency_contacts_list->TotalRecs > 0 && $employee_emergency_contacts_list->ExportOptions->visible()) { ?>
<?php $employee_emergency_contacts_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_emergency_contacts_list->ImportOptions->visible()) { ?>
<?php $employee_emergency_contacts_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_emergency_contacts_list->SearchOptions->visible()) { ?>
<?php $employee_emergency_contacts_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_emergency_contacts_list->FilterOptions->visible()) { ?>
<?php $employee_emergency_contacts_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_emergency_contacts_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_emergency_contacts->isExport() && !$employee_emergency_contacts->CurrentAction) { ?>
<form name="femployee_emergency_contactslistsrch" id="femployee_emergency_contactslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_emergency_contacts_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_emergency_contactslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_emergency_contacts">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_emergency_contacts_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_emergency_contacts_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_emergency_contacts_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_emergency_contacts_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_emergency_contacts_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_emergency_contacts_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_emergency_contacts_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_emergency_contacts_list->showPageHeader(); ?>
<?php
$employee_emergency_contacts_list->showMessage();
?>
<?php if ($employee_emergency_contacts_list->TotalRecs > 0 || $employee_emergency_contacts->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_emergency_contacts_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_emergency_contacts">
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_emergency_contacts->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_emergency_contacts_list->Pager)) $employee_emergency_contacts_list->Pager = new NumericPager($employee_emergency_contacts_list->StartRec, $employee_emergency_contacts_list->DisplayRecs, $employee_emergency_contacts_list->TotalRecs, $employee_emergency_contacts_list->RecRange, $employee_emergency_contacts_list->AutoHidePager) ?>
<?php if ($employee_emergency_contacts_list->Pager->RecordCount > 0 && $employee_emergency_contacts_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_emergency_contacts_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_emergency_contacts_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_emergency_contacts_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_emergency_contacts_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_emergency_contacts_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_emergency_contacts_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_emergency_contacts_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_emergency_contacts_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_emergency_contacts_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_emergency_contacts_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_emergency_contacts_list->TotalRecs > 0 && (!$employee_emergency_contacts_list->AutoHidePageSizeSelector || $employee_emergency_contacts_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_emergency_contacts">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_emergency_contacts_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_emergency_contacts_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_emergency_contacts_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_emergency_contacts_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_emergency_contacts_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_emergency_contacts_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_emergency_contacts->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_emergency_contacts_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_emergency_contactslist" id="femployee_emergency_contactslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_emergency_contacts_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_emergency_contacts_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
<div id="gmp_employee_emergency_contacts" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_emergency_contacts_list->TotalRecs > 0 || $employee_emergency_contacts->isGridEdit()) { ?>
<table id="tbl_employee_emergency_contactslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_emergency_contacts_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_emergency_contacts_list->renderListOptions();

// Render list options (header, left)
$employee_emergency_contacts_list->ListOptions->render("header", "left");
?>
<?php if ($employee_emergency_contacts->id->Visible) { // id ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_emergency_contacts->id->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_id" class="employee_emergency_contacts_id"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_emergency_contacts->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->id) ?>',1);"><div id="elh_employee_emergency_contacts_id" class="employee_emergency_contacts_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_emergency_contacts->employee->Visible) { // employee ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_emergency_contacts->employee->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_emergency_contacts->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->employee) ?>',1);"><div id="elh_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_emergency_contacts->name->Visible) { // name ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->name) == "") { ?>
		<th data-name="name" class="<?php echo $employee_emergency_contacts->name->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_name" class="employee_emergency_contacts_name"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $employee_emergency_contacts->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->name) ?>',1);"><div id="elh_employee_emergency_contacts_name" class="employee_emergency_contacts_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_emergency_contacts->relationship->Visible) { // relationship ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->relationship) == "") { ?>
		<th data-name="relationship" class="<?php echo $employee_emergency_contacts->relationship->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="relationship" class="<?php echo $employee_emergency_contacts->relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->relationship) ?>',1);"><div id="elh_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_emergency_contacts->home_phone->Visible) { // home_phone ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->home_phone) == "") { ?>
		<th data-name="home_phone" class="<?php echo $employee_emergency_contacts->home_phone->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->home_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="home_phone" class="<?php echo $employee_emergency_contacts->home_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->home_phone) ?>',1);"><div id="elh_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->home_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->home_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->home_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_emergency_contacts->work_phone->Visible) { // work_phone ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->work_phone) == "") { ?>
		<th data-name="work_phone" class="<?php echo $employee_emergency_contacts->work_phone->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->work_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="work_phone" class="<?php echo $employee_emergency_contacts->work_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->work_phone) ?>',1);"><div id="elh_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->work_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->work_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->work_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_emergency_contacts->mobile_phone->Visible) { // mobile_phone ?>
	<?php if ($employee_emergency_contacts->sortUrl($employee_emergency_contacts->mobile_phone) == "") { ?>
		<th data-name="mobile_phone" class="<?php echo $employee_emergency_contacts->mobile_phone->headerCellClass() ?>"><div id="elh_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone"><div class="ew-table-header-caption"><?php echo $employee_emergency_contacts->mobile_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_phone" class="<?php echo $employee_emergency_contacts->mobile_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_emergency_contacts->SortUrl($employee_emergency_contacts->mobile_phone) ?>',1);"><div id="elh_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_emergency_contacts->mobile_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_emergency_contacts->mobile_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_emergency_contacts->mobile_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_emergency_contacts_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_emergency_contacts->ExportAll && $employee_emergency_contacts->isExport()) {
	$employee_emergency_contacts_list->StopRec = $employee_emergency_contacts_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_emergency_contacts_list->TotalRecs > $employee_emergency_contacts_list->StartRec + $employee_emergency_contacts_list->DisplayRecs - 1)
		$employee_emergency_contacts_list->StopRec = $employee_emergency_contacts_list->StartRec + $employee_emergency_contacts_list->DisplayRecs - 1;
	else
		$employee_emergency_contacts_list->StopRec = $employee_emergency_contacts_list->TotalRecs;
}
$employee_emergency_contacts_list->RecCnt = $employee_emergency_contacts_list->StartRec - 1;
if ($employee_emergency_contacts_list->Recordset && !$employee_emergency_contacts_list->Recordset->EOF) {
	$employee_emergency_contacts_list->Recordset->moveFirst();
	$selectLimit = $employee_emergency_contacts_list->UseSelectLimit;
	if (!$selectLimit && $employee_emergency_contacts_list->StartRec > 1)
		$employee_emergency_contacts_list->Recordset->move($employee_emergency_contacts_list->StartRec - 1);
} elseif (!$employee_emergency_contacts->AllowAddDeleteRow && $employee_emergency_contacts_list->StopRec == 0) {
	$employee_emergency_contacts_list->StopRec = $employee_emergency_contacts->GridAddRowCount;
}

// Initialize aggregate
$employee_emergency_contacts->RowType = ROWTYPE_AGGREGATEINIT;
$employee_emergency_contacts->resetAttributes();
$employee_emergency_contacts_list->renderRow();
while ($employee_emergency_contacts_list->RecCnt < $employee_emergency_contacts_list->StopRec) {
	$employee_emergency_contacts_list->RecCnt++;
	if ($employee_emergency_contacts_list->RecCnt >= $employee_emergency_contacts_list->StartRec) {
		$employee_emergency_contacts_list->RowCnt++;

		// Set up key count
		$employee_emergency_contacts_list->KeyCount = $employee_emergency_contacts_list->RowIndex;

		// Init row class and style
		$employee_emergency_contacts->resetAttributes();
		$employee_emergency_contacts->CssClass = "";
		if ($employee_emergency_contacts->isGridAdd()) {
		} else {
			$employee_emergency_contacts_list->loadRowValues($employee_emergency_contacts_list->Recordset); // Load row values
		}
		$employee_emergency_contacts->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_emergency_contacts->RowAttrs = array_merge($employee_emergency_contacts->RowAttrs, array('data-rowindex'=>$employee_emergency_contacts_list->RowCnt, 'id'=>'r' . $employee_emergency_contacts_list->RowCnt . '_employee_emergency_contacts', 'data-rowtype'=>$employee_emergency_contacts->RowType));

		// Render row
		$employee_emergency_contacts_list->renderRow();

		// Render list options
		$employee_emergency_contacts_list->renderListOptions();
?>
	<tr<?php echo $employee_emergency_contacts->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_emergency_contacts_list->ListOptions->render("body", "left", $employee_emergency_contacts_list->RowCnt);
?>
	<?php if ($employee_emergency_contacts->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_emergency_contacts->id->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_id" class="employee_emergency_contacts_id">
<span<?php echo $employee_emergency_contacts->id->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_emergency_contacts->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_emergency_contacts->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee">
<span<?php echo $employee_emergency_contacts->employee->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_emergency_contacts->name->Visible) { // name ?>
		<td data-name="name"<?php echo $employee_emergency_contacts->name->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_name" class="employee_emergency_contacts_name">
<span<?php echo $employee_emergency_contacts->name->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_emergency_contacts->relationship->Visible) { // relationship ?>
		<td data-name="relationship"<?php echo $employee_emergency_contacts->relationship->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship">
<span<?php echo $employee_emergency_contacts->relationship->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_emergency_contacts->home_phone->Visible) { // home_phone ?>
		<td data-name="home_phone"<?php echo $employee_emergency_contacts->home_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone">
<span<?php echo $employee_emergency_contacts->home_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->home_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_emergency_contacts->work_phone->Visible) { // work_phone ?>
		<td data-name="work_phone"<?php echo $employee_emergency_contacts->work_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone">
<span<?php echo $employee_emergency_contacts->work_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->work_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_emergency_contacts->mobile_phone->Visible) { // mobile_phone ?>
		<td data-name="mobile_phone"<?php echo $employee_emergency_contacts->mobile_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_list->RowCnt ?>_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone">
<span<?php echo $employee_emergency_contacts->mobile_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->mobile_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_emergency_contacts_list->ListOptions->render("body", "right", $employee_emergency_contacts_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_emergency_contacts->isGridAdd())
		$employee_emergency_contacts_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_emergency_contacts->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_emergency_contacts_list->Recordset)
	$employee_emergency_contacts_list->Recordset->Close();
?>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_emergency_contacts->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_emergency_contacts_list->Pager)) $employee_emergency_contacts_list->Pager = new NumericPager($employee_emergency_contacts_list->StartRec, $employee_emergency_contacts_list->DisplayRecs, $employee_emergency_contacts_list->TotalRecs, $employee_emergency_contacts_list->RecRange, $employee_emergency_contacts_list->AutoHidePager) ?>
<?php if ($employee_emergency_contacts_list->Pager->RecordCount > 0 && $employee_emergency_contacts_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_emergency_contacts_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_emergency_contacts_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_emergency_contacts_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_emergency_contacts_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_emergency_contacts_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_emergency_contacts_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_emergency_contacts_list->pageUrl() ?>start=<?php echo $employee_emergency_contacts_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_emergency_contacts_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_emergency_contacts_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_emergency_contacts_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_emergency_contacts_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_emergency_contacts_list->TotalRecs > 0 && (!$employee_emergency_contacts_list->AutoHidePageSizeSelector || $employee_emergency_contacts_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_emergency_contacts">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_emergency_contacts_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_emergency_contacts_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_emergency_contacts_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_emergency_contacts_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_emergency_contacts_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_emergency_contacts_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_emergency_contacts->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_emergency_contacts_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_emergency_contacts_list->TotalRecs == 0 && !$employee_emergency_contacts->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_emergency_contacts_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_emergency_contacts_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_emergency_contacts->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_emergency_contacts", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_emergency_contacts_list->terminate();
?>