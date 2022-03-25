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
$patient_emergency_contact_list = new patient_emergency_contact_list();

// Run the page
$patient_emergency_contact_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_emergency_contactlist = currentForm = new ew.Form("fpatient_emergency_contactlist", "list");
fpatient_emergency_contactlist.formKeyCountName = '<?php echo $patient_emergency_contact_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_emergency_contactlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emergency_contactlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emergency_contactlist.lists["x_status"] = <?php echo $patient_emergency_contact_list->status->Lookup->toClientList() ?>;
fpatient_emergency_contactlist.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_list->status->lookupOptions()) ?>;

// Form object for search
var fpatient_emergency_contactlistsrch = currentSearchForm = new ew.Form("fpatient_emergency_contactlistsrch");

// Filters
fpatient_emergency_contactlistsrch.filterList = <?php echo $patient_emergency_contact_list->getFilterList() ?>;
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
<?php if (!$patient_emergency_contact->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_emergency_contact_list->TotalRecs > 0 && $patient_emergency_contact_list->ExportOptions->visible()) { ?>
<?php $patient_emergency_contact_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->ImportOptions->visible()) { ?>
<?php $patient_emergency_contact_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->SearchOptions->visible()) { ?>
<?php $patient_emergency_contact_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->FilterOptions->visible()) { ?>
<?php $patient_emergency_contact_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_emergency_contact->isExport() || EXPORT_MASTER_RECORD && $patient_emergency_contact->isExport("print")) { ?>
<?php
if ($patient_emergency_contact_list->DbMasterFilter <> "" && $patient_emergency_contact->getCurrentMasterTable() == "patient") {
	if ($patient_emergency_contact_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_emergency_contact_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_emergency_contact->isExport() && !$patient_emergency_contact->CurrentAction) { ?>
<form name="fpatient_emergency_contactlistsrch" id="fpatient_emergency_contactlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_emergency_contact_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_emergency_contactlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_emergency_contact">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_emergency_contact_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_emergency_contact_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_emergency_contact_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_emergency_contact_list->showPageHeader(); ?>
<?php
$patient_emergency_contact_list->showMessage();
?>
<?php if ($patient_emergency_contact_list->TotalRecs > 0 || $patient_emergency_contact->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_emergency_contact_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_emergency_contact">
<?php if (!$patient_emergency_contact->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_emergency_contact->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_emergency_contact_list->Pager)) $patient_emergency_contact_list->Pager = new NumericPager($patient_emergency_contact_list->StartRec, $patient_emergency_contact_list->DisplayRecs, $patient_emergency_contact_list->TotalRecs, $patient_emergency_contact_list->RecRange, $patient_emergency_contact_list->AutoHidePager) ?>
<?php if ($patient_emergency_contact_list->Pager->RecordCount > 0 && $patient_emergency_contact_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_emergency_contact_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_emergency_contact_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_emergency_contact_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_emergency_contact_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_emergency_contact_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_emergency_contact_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_emergency_contact_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_emergency_contact_list->TotalRecs > 0 && (!$patient_emergency_contact_list->AutoHidePageSizeSelector || $patient_emergency_contact_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_emergency_contact">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_emergency_contact_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_emergency_contact_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_emergency_contact_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_emergency_contact_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_emergency_contact_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_emergency_contact_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_emergency_contact->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_emergency_contactlist" id="fpatient_emergency_contactlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_emergency_contact_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_emergency_contact_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<?php if ($patient_emergency_contact->getCurrentMasterTable() == "patient" && $patient_emergency_contact->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_emergency_contact->patient_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_emergency_contact" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_emergency_contact_list->TotalRecs > 0 || $patient_emergency_contact->isGridEdit()) { ?>
<table id="tbl_patient_emergency_contactlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_emergency_contact_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_emergency_contact_list->renderListOptions();

// Render list options (header, left)
$patient_emergency_contact_list->ListOptions->render("header", "left");
?>
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->id) ?>',1);"><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->patient_id) ?>',1);"><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->name) == "") { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->name) ?>',1);"><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->relationship) == "") { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->relationship) ?>',1);"><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->telephone) ?>',1);"><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->telephone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->telephone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->telephone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->address) == "") { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->address) ?>',1);"><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_emergency_contact->SortUrl($patient_emergency_contact->status) ?>',1);"><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_emergency_contact_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_emergency_contact->ExportAll && $patient_emergency_contact->isExport()) {
	$patient_emergency_contact_list->StopRec = $patient_emergency_contact_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_emergency_contact_list->TotalRecs > $patient_emergency_contact_list->StartRec + $patient_emergency_contact_list->DisplayRecs - 1)
		$patient_emergency_contact_list->StopRec = $patient_emergency_contact_list->StartRec + $patient_emergency_contact_list->DisplayRecs - 1;
	else
		$patient_emergency_contact_list->StopRec = $patient_emergency_contact_list->TotalRecs;
}
$patient_emergency_contact_list->RecCnt = $patient_emergency_contact_list->StartRec - 1;
if ($patient_emergency_contact_list->Recordset && !$patient_emergency_contact_list->Recordset->EOF) {
	$patient_emergency_contact_list->Recordset->moveFirst();
	$selectLimit = $patient_emergency_contact_list->UseSelectLimit;
	if (!$selectLimit && $patient_emergency_contact_list->StartRec > 1)
		$patient_emergency_contact_list->Recordset->move($patient_emergency_contact_list->StartRec - 1);
} elseif (!$patient_emergency_contact->AllowAddDeleteRow && $patient_emergency_contact_list->StopRec == 0) {
	$patient_emergency_contact_list->StopRec = $patient_emergency_contact->GridAddRowCount;
}

// Initialize aggregate
$patient_emergency_contact->RowType = ROWTYPE_AGGREGATEINIT;
$patient_emergency_contact->resetAttributes();
$patient_emergency_contact_list->renderRow();
while ($patient_emergency_contact_list->RecCnt < $patient_emergency_contact_list->StopRec) {
	$patient_emergency_contact_list->RecCnt++;
	if ($patient_emergency_contact_list->RecCnt >= $patient_emergency_contact_list->StartRec) {
		$patient_emergency_contact_list->RowCnt++;

		// Set up key count
		$patient_emergency_contact_list->KeyCount = $patient_emergency_contact_list->RowIndex;

		// Init row class and style
		$patient_emergency_contact->resetAttributes();
		$patient_emergency_contact->CssClass = "";
		if ($patient_emergency_contact->isGridAdd()) {
		} else {
			$patient_emergency_contact_list->loadRowValues($patient_emergency_contact_list->Recordset); // Load row values
		}
		$patient_emergency_contact->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_emergency_contact->RowAttrs = array_merge($patient_emergency_contact->RowAttrs, array('data-rowindex'=>$patient_emergency_contact_list->RowCnt, 'id'=>'r' . $patient_emergency_contact_list->RowCnt . '_patient_emergency_contact', 'data-rowtype'=>$patient_emergency_contact->RowType));

		// Render row
		$patient_emergency_contact_list->renderRow();

		// Render list options
		$patient_emergency_contact_list->renderListOptions();
?>
	<tr<?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_list->ListOptions->render("body", "left", $patient_emergency_contact_list->RowCnt);
?>
	<?php if ($patient_emergency_contact->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_emergency_contact->id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_id" class="patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_emergency_contact->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->name->Visible) { // name ?>
		<td data-name="name"<?php echo $patient_emergency_contact->name->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_name" class="patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact->name->viewAttributes() ?>>
<?php echo $patient_emergency_contact->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
		<td data-name="relationship"<?php echo $patient_emergency_contact->relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact->relationship->viewAttributes() ?>>
<?php echo $patient_emergency_contact->relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
		<td data-name="telephone"<?php echo $patient_emergency_contact->telephone->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact->telephone->viewAttributes() ?>>
<?php echo $patient_emergency_contact->telephone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->address->Visible) { // address ?>
		<td data-name="address"<?php echo $patient_emergency_contact->address->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_address" class="patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact->address->viewAttributes() ?>>
<?php echo $patient_emergency_contact->address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_emergency_contact->status->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCnt ?>_patient_emergency_contact_status" class="patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact->status->viewAttributes() ?>>
<?php echo $patient_emergency_contact->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_list->ListOptions->render("body", "right", $patient_emergency_contact_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_emergency_contact->isGridAdd())
		$patient_emergency_contact_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_emergency_contact->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_emergency_contact_list->Recordset)
	$patient_emergency_contact_list->Recordset->Close();
?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_emergency_contact->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_emergency_contact_list->Pager)) $patient_emergency_contact_list->Pager = new NumericPager($patient_emergency_contact_list->StartRec, $patient_emergency_contact_list->DisplayRecs, $patient_emergency_contact_list->TotalRecs, $patient_emergency_contact_list->RecRange, $patient_emergency_contact_list->AutoHidePager) ?>
<?php if ($patient_emergency_contact_list->Pager->RecordCount > 0 && $patient_emergency_contact_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_emergency_contact_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_emergency_contact_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_emergency_contact_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_emergency_contact_list->pageUrl() ?>start=<?php echo $patient_emergency_contact_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_emergency_contact_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_emergency_contact_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_emergency_contact_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_emergency_contact_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_emergency_contact_list->TotalRecs > 0 && (!$patient_emergency_contact_list->AutoHidePageSizeSelector || $patient_emergency_contact_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_emergency_contact">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_emergency_contact_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_emergency_contact_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_emergency_contact_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_emergency_contact_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_emergency_contact_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_emergency_contact_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_emergency_contact->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_emergency_contact_list->TotalRecs == 0 && !$patient_emergency_contact->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_emergency_contact_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_emergency_contact", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_emergency_contact_list->terminate();
?>