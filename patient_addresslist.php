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
$patient_address_list = new patient_address_list();

// Run the page
$patient_address_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_address->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_addresslist = currentForm = new ew.Form("fpatient_addresslist", "list");
fpatient_addresslist.formKeyCountName = '<?php echo $patient_address_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_addresslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_addresslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_addresslist.lists["x_address_type"] = <?php echo $patient_address_list->address_type->Lookup->toClientList() ?>;
fpatient_addresslist.lists["x_address_type"].options = <?php echo JsonEncode($patient_address_list->address_type->lookupOptions()) ?>;
fpatient_addresslist.lists["x_status"] = <?php echo $patient_address_list->status->Lookup->toClientList() ?>;
fpatient_addresslist.lists["x_status"].options = <?php echo JsonEncode($patient_address_list->status->lookupOptions()) ?>;

// Form object for search
var fpatient_addresslistsrch = currentSearchForm = new ew.Form("fpatient_addresslistsrch");

// Filters
fpatient_addresslistsrch.filterList = <?php echo $patient_address_list->getFilterList() ?>;
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
<?php if (!$patient_address->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_address_list->TotalRecs > 0 && $patient_address_list->ExportOptions->visible()) { ?>
<?php $patient_address_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_address_list->ImportOptions->visible()) { ?>
<?php $patient_address_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_address_list->SearchOptions->visible()) { ?>
<?php $patient_address_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_address_list->FilterOptions->visible()) { ?>
<?php $patient_address_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_address->isExport() || EXPORT_MASTER_RECORD && $patient_address->isExport("print")) { ?>
<?php
if ($patient_address_list->DbMasterFilter <> "" && $patient_address->getCurrentMasterTable() == "patient") {
	if ($patient_address_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_address_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_address->isExport() && !$patient_address->CurrentAction) { ?>
<form name="fpatient_addresslistsrch" id="fpatient_addresslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_address_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_addresslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_address">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_address_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_address_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_address_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_address_list->showPageHeader(); ?>
<?php
$patient_address_list->showMessage();
?>
<?php if ($patient_address_list->TotalRecs > 0 || $patient_address->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_address_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_address">
<?php if (!$patient_address->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_address->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_address_list->Pager)) $patient_address_list->Pager = new NumericPager($patient_address_list->StartRec, $patient_address_list->DisplayRecs, $patient_address_list->TotalRecs, $patient_address_list->RecRange, $patient_address_list->AutoHidePager) ?>
<?php if ($patient_address_list->Pager->RecordCount > 0 && $patient_address_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_address_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_address_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_address_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_address_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_address_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_address_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_address_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_address_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_address_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_address_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_address_list->TotalRecs > 0 && (!$patient_address_list->AutoHidePageSizeSelector || $patient_address_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_address">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_address_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_address_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_address_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_address_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_address_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_address_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_address->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_address_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_addresslist" id="fpatient_addresslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_address_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_address_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<?php if ($patient_address->getCurrentMasterTable() == "patient" && $patient_address->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_address->patient_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_address" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_address_list->TotalRecs > 0 || $patient_address->isGridEdit()) { ?>
<table id="tbl_patient_addresslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_address_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_address_list->renderListOptions();

// Render list options (header, left)
$patient_address_list->ListOptions->render("header", "left");
?>
<?php if ($patient_address->id->Visible) { // id ?>
	<?php if ($patient_address->sortUrl($patient_address->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_address->id->headerCellClass() ?>"><div id="elh_patient_address_id" class="patient_address_id"><div class="ew-table-header-caption"><?php echo $patient_address->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_address->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->id) ?>',1);"><div id="elh_patient_address_id" class="patient_address_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_address->sortUrl($patient_address->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_address->patient_id->headerCellClass() ?>"><div id="elh_patient_address_patient_id" class="patient_address_patient_id"><div class="ew-table-header-caption"><?php echo $patient_address->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_address->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->patient_id) ?>',1);"><div id="elh_patient_address_patient_id" class="patient_address_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->street->Visible) { // street ?>
	<?php if ($patient_address->sortUrl($patient_address->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient_address->street->headerCellClass() ?>"><div id="elh_patient_address_street" class="patient_address_street"><div class="ew-table-header-caption"><?php echo $patient_address->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient_address->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->street) ?>',1);"><div id="elh_patient_address_street" class="patient_address_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->town->Visible) { // town ?>
	<?php if ($patient_address->sortUrl($patient_address->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient_address->town->headerCellClass() ?>"><div id="elh_patient_address_town" class="patient_address_town"><div class="ew-table-header-caption"><?php echo $patient_address->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient_address->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->town) ?>',1);"><div id="elh_patient_address_town" class="patient_address_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->province->Visible) { // province ?>
	<?php if ($patient_address->sortUrl($patient_address->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient_address->province->headerCellClass() ?>"><div id="elh_patient_address_province" class="patient_address_province"><div class="ew-table-header-caption"><?php echo $patient_address->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient_address->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->province) ?>',1);"><div id="elh_patient_address_province" class="patient_address_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_address->sortUrl($patient_address->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient_address->postal_code->headerCellClass() ?>"><div id="elh_patient_address_postal_code" class="patient_address_postal_code"><div class="ew-table-header-caption"><?php echo $patient_address->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient_address->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->postal_code) ?>',1);"><div id="elh_patient_address_postal_code" class="patient_address_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->address_type->Visible) { // address_type ?>
	<?php if ($patient_address->sortUrl($patient_address->address_type) == "") { ?>
		<th data-name="address_type" class="<?php echo $patient_address->address_type->headerCellClass() ?>"><div id="elh_patient_address_address_type" class="patient_address_address_type"><div class="ew-table-header-caption"><?php echo $patient_address->address_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address_type" class="<?php echo $patient_address->address_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->address_type) ?>',1);"><div id="elh_patient_address_address_type" class="patient_address_address_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->address_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->address_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->status->Visible) { // status ?>
	<?php if ($patient_address->sortUrl($patient_address->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_address->status->headerCellClass() ?>"><div id="elh_patient_address_status" class="patient_address_status"><div class="ew-table-header-caption"><?php echo $patient_address->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_address->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_address->SortUrl($patient_address->status) ?>',1);"><div id="elh_patient_address_status" class="patient_address_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_address_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_address->ExportAll && $patient_address->isExport()) {
	$patient_address_list->StopRec = $patient_address_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_address_list->TotalRecs > $patient_address_list->StartRec + $patient_address_list->DisplayRecs - 1)
		$patient_address_list->StopRec = $patient_address_list->StartRec + $patient_address_list->DisplayRecs - 1;
	else
		$patient_address_list->StopRec = $patient_address_list->TotalRecs;
}
$patient_address_list->RecCnt = $patient_address_list->StartRec - 1;
if ($patient_address_list->Recordset && !$patient_address_list->Recordset->EOF) {
	$patient_address_list->Recordset->moveFirst();
	$selectLimit = $patient_address_list->UseSelectLimit;
	if (!$selectLimit && $patient_address_list->StartRec > 1)
		$patient_address_list->Recordset->move($patient_address_list->StartRec - 1);
} elseif (!$patient_address->AllowAddDeleteRow && $patient_address_list->StopRec == 0) {
	$patient_address_list->StopRec = $patient_address->GridAddRowCount;
}

// Initialize aggregate
$patient_address->RowType = ROWTYPE_AGGREGATEINIT;
$patient_address->resetAttributes();
$patient_address_list->renderRow();
while ($patient_address_list->RecCnt < $patient_address_list->StopRec) {
	$patient_address_list->RecCnt++;
	if ($patient_address_list->RecCnt >= $patient_address_list->StartRec) {
		$patient_address_list->RowCnt++;

		// Set up key count
		$patient_address_list->KeyCount = $patient_address_list->RowIndex;

		// Init row class and style
		$patient_address->resetAttributes();
		$patient_address->CssClass = "";
		if ($patient_address->isGridAdd()) {
		} else {
			$patient_address_list->loadRowValues($patient_address_list->Recordset); // Load row values
		}
		$patient_address->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_address->RowAttrs = array_merge($patient_address->RowAttrs, array('data-rowindex'=>$patient_address_list->RowCnt, 'id'=>'r' . $patient_address_list->RowCnt . '_patient_address', 'data-rowtype'=>$patient_address->RowType));

		// Render row
		$patient_address_list->renderRow();

		// Render list options
		$patient_address_list->renderListOptions();
?>
	<tr<?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_list->ListOptions->render("body", "left", $patient_address_list->RowCnt);
?>
	<?php if ($patient_address->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_address->id->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_id" class="patient_address_id">
<span<?php echo $patient_address->id->viewAttributes() ?>>
<?php echo $patient_address->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_address->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_patient_id" class="patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<?php echo $patient_address->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->street->Visible) { // street ?>
		<td data-name="street"<?php echo $patient_address->street->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_street" class="patient_address_street">
<span<?php echo $patient_address->street->viewAttributes() ?>>
<?php echo $patient_address->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->town->Visible) { // town ?>
		<td data-name="town"<?php echo $patient_address->town->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_town" class="patient_address_town">
<span<?php echo $patient_address->town->viewAttributes() ?>>
<?php echo $patient_address->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->province->Visible) { // province ?>
		<td data-name="province"<?php echo $patient_address->province->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_province" class="patient_address_province">
<span<?php echo $patient_address->province->viewAttributes() ?>>
<?php echo $patient_address->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $patient_address->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_postal_code" class="patient_address_postal_code">
<span<?php echo $patient_address->postal_code->viewAttributes() ?>>
<?php echo $patient_address->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->address_type->Visible) { // address_type ?>
		<td data-name="address_type"<?php echo $patient_address->address_type->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_address_type" class="patient_address_address_type">
<span<?php echo $patient_address->address_type->viewAttributes() ?>>
<?php echo $patient_address->address_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_address->status->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCnt ?>_patient_address_status" class="patient_address_status">
<span<?php echo $patient_address->status->viewAttributes() ?>>
<?php echo $patient_address->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_address_list->ListOptions->render("body", "right", $patient_address_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_address->isGridAdd())
		$patient_address_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_address->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_address_list->Recordset)
	$patient_address_list->Recordset->Close();
?>
<?php if (!$patient_address->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_address->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_address_list->Pager)) $patient_address_list->Pager = new NumericPager($patient_address_list->StartRec, $patient_address_list->DisplayRecs, $patient_address_list->TotalRecs, $patient_address_list->RecRange, $patient_address_list->AutoHidePager) ?>
<?php if ($patient_address_list->Pager->RecordCount > 0 && $patient_address_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_address_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_address_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_address_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_address_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_address_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_address_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_address_list->pageUrl() ?>start=<?php echo $patient_address_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_address_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_address_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_address_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_address_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_address_list->TotalRecs > 0 && (!$patient_address_list->AutoHidePageSizeSelector || $patient_address_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_address">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_address_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_address_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_address_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_address_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_address_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_address_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_address->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_address_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_address_list->TotalRecs == 0 && !$patient_address->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_address_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_address_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_address->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_address->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_address", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_address_list->terminate();
?>