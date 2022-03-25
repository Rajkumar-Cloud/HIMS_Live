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
$patient_document_list = new patient_document_list();

// Run the page
$patient_document_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_document->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_documentlist = currentForm = new ew.Form("fpatient_documentlist", "list");
fpatient_documentlist.formKeyCountName = '<?php echo $patient_document_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_documentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_documentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_documentlist.lists["x_DocumentName"] = <?php echo $patient_document_list->DocumentName->Lookup->toClientList() ?>;
fpatient_documentlist.lists["x_DocumentName"].options = <?php echo JsonEncode($patient_document_list->DocumentName->lookupOptions()) ?>;
fpatient_documentlist.lists["x_status"] = <?php echo $patient_document_list->status->Lookup->toClientList() ?>;
fpatient_documentlist.lists["x_status"].options = <?php echo JsonEncode($patient_document_list->status->lookupOptions()) ?>;

// Form object for search
var fpatient_documentlistsrch = currentSearchForm = new ew.Form("fpatient_documentlistsrch");

// Filters
fpatient_documentlistsrch.filterList = <?php echo $patient_document_list->getFilterList() ?>;
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
<?php if (!$patient_document->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_document_list->TotalRecs > 0 && $patient_document_list->ExportOptions->visible()) { ?>
<?php $patient_document_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_document_list->ImportOptions->visible()) { ?>
<?php $patient_document_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_document_list->SearchOptions->visible()) { ?>
<?php $patient_document_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_document_list->FilterOptions->visible()) { ?>
<?php $patient_document_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_document->isExport() || EXPORT_MASTER_RECORD && $patient_document->isExport("print")) { ?>
<?php
if ($patient_document_list->DbMasterFilter <> "" && $patient_document->getCurrentMasterTable() == "patient") {
	if ($patient_document_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_document_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_document->isExport() && !$patient_document->CurrentAction) { ?>
<form name="fpatient_documentlistsrch" id="fpatient_documentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_document_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_documentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_document">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_document_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_document_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_document_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_document_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_document_list->showPageHeader(); ?>
<?php
$patient_document_list->showMessage();
?>
<?php if ($patient_document_list->TotalRecs > 0 || $patient_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_document_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_document">
<?php if (!$patient_document->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_document->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_document_list->Pager)) $patient_document_list->Pager = new NumericPager($patient_document_list->StartRec, $patient_document_list->DisplayRecs, $patient_document_list->TotalRecs, $patient_document_list->RecRange, $patient_document_list->AutoHidePager) ?>
<?php if ($patient_document_list->Pager->RecordCount > 0 && $patient_document_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_document_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_document_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_document_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_document_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_document_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_document_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_document_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_document_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_document_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_document_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_document_list->TotalRecs > 0 && (!$patient_document_list->AutoHidePageSizeSelector || $patient_document_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_document">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_document_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_document_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_document_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_document_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_document_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_document_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_document->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_documentlist" id="fpatient_documentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_document_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_document_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<?php if ($patient_document->getCurrentMasterTable() == "patient" && $patient_document->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_document->patient_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_document" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_document_list->TotalRecs > 0 || $patient_document->isGridEdit()) { ?>
<table id="tbl_patient_documentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_document_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_document_list->renderListOptions();

// Render list options (header, left)
$patient_document_list->ListOptions->render("header", "left");
?>
<?php if ($patient_document->id->Visible) { // id ?>
	<?php if ($patient_document->sortUrl($patient_document->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_document->id->headerCellClass() ?>"><div id="elh_patient_document_id" class="patient_document_id"><div class="ew-table-header-caption"><?php echo $patient_document->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_document->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->id) ?>',1);"><div id="elh_patient_document_id" class="patient_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_document->sortUrl($patient_document->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><div id="elh_patient_document_patient_id" class="patient_document_patient_id"><div class="ew-table-header-caption"><?php echo $patient_document->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->patient_id) ?>',1);"><div id="elh_patient_document_patient_id" class="patient_document_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
	<?php if ($patient_document->sortUrl($patient_document->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><div id="elh_patient_document_DocumentName" class="patient_document_DocumentName"><div class="ew-table-header-caption"><?php echo $patient_document->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->DocumentName) ?>',1);"><div id="elh_patient_document_DocumentName" class="patient_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->DocumentName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->DocumentName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
	<?php if ($patient_document->sortUrl($patient_document->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_document->status->headerCellClass() ?>"><div id="elh_patient_document_status" class="patient_document_status"><div class="ew-table-header-caption"><?php echo $patient_document->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_document->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->status) ?>',1);"><div id="elh_patient_document_status" class="patient_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
	<?php if ($patient_document->sortUrl($patient_document->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_document->createdby->headerCellClass() ?>"><div id="elh_patient_document_createdby" class="patient_document_createdby"><div class="ew-table-header-caption"><?php echo $patient_document->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_document->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->createdby) ?>',1);"><div id="elh_patient_document_createdby" class="patient_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_document->sortUrl($patient_document->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><div id="elh_patient_document_createddatetime" class="patient_document_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_document->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->createddatetime) ?>',1);"><div id="elh_patient_document_createddatetime" class="patient_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_document->sortUrl($patient_document->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><div id="elh_patient_document_modifiedby" class="patient_document_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_document->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->modifiedby) ?>',1);"><div id="elh_patient_document_modifiedby" class="patient_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_document->sortUrl($patient_document->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_document->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->modifieddatetime) ?>',1);"><div id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($patient_document->sortUrl($patient_document->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><div id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $patient_document->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_document->SortUrl($patient_document->DocumentNumber) ?>',1);"><div id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->DocumentNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_document->DocumentNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->DocumentNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_document_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_document->ExportAll && $patient_document->isExport()) {
	$patient_document_list->StopRec = $patient_document_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_document_list->TotalRecs > $patient_document_list->StartRec + $patient_document_list->DisplayRecs - 1)
		$patient_document_list->StopRec = $patient_document_list->StartRec + $patient_document_list->DisplayRecs - 1;
	else
		$patient_document_list->StopRec = $patient_document_list->TotalRecs;
}
$patient_document_list->RecCnt = $patient_document_list->StartRec - 1;
if ($patient_document_list->Recordset && !$patient_document_list->Recordset->EOF) {
	$patient_document_list->Recordset->moveFirst();
	$selectLimit = $patient_document_list->UseSelectLimit;
	if (!$selectLimit && $patient_document_list->StartRec > 1)
		$patient_document_list->Recordset->move($patient_document_list->StartRec - 1);
} elseif (!$patient_document->AllowAddDeleteRow && $patient_document_list->StopRec == 0) {
	$patient_document_list->StopRec = $patient_document->GridAddRowCount;
}

// Initialize aggregate
$patient_document->RowType = ROWTYPE_AGGREGATEINIT;
$patient_document->resetAttributes();
$patient_document_list->renderRow();
while ($patient_document_list->RecCnt < $patient_document_list->StopRec) {
	$patient_document_list->RecCnt++;
	if ($patient_document_list->RecCnt >= $patient_document_list->StartRec) {
		$patient_document_list->RowCnt++;

		// Set up key count
		$patient_document_list->KeyCount = $patient_document_list->RowIndex;

		// Init row class and style
		$patient_document->resetAttributes();
		$patient_document->CssClass = "";
		if ($patient_document->isGridAdd()) {
		} else {
			$patient_document_list->loadRowValues($patient_document_list->Recordset); // Load row values
		}
		$patient_document->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_document->RowAttrs = array_merge($patient_document->RowAttrs, array('data-rowindex'=>$patient_document_list->RowCnt, 'id'=>'r' . $patient_document_list->RowCnt . '_patient_document', 'data-rowtype'=>$patient_document->RowType));

		// Render row
		$patient_document_list->renderRow();

		// Render list options
		$patient_document_list->renderListOptions();
?>
	<tr<?php echo $patient_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_document_list->ListOptions->render("body", "left", $patient_document_list->RowCnt);
?>
	<?php if ($patient_document->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_document->id->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_id" class="patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<?php echo $patient_document->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_document->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_patient_id" class="patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<?php echo $patient_document->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName"<?php echo $patient_document->DocumentName->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_DocumentName" class="patient_document_DocumentName">
<span<?php echo $patient_document->DocumentName->viewAttributes() ?>>
<?php echo $patient_document->DocumentName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_document->status->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_status" class="patient_document_status">
<span<?php echo $patient_document->status->viewAttributes() ?>>
<?php echo $patient_document->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_document->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_createdby" class="patient_document_createdby">
<span<?php echo $patient_document->createdby->viewAttributes() ?>>
<?php echo $patient_document->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_document->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_createddatetime" class="patient_document_createddatetime">
<span<?php echo $patient_document->createddatetime->viewAttributes() ?>>
<?php echo $patient_document->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_document->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_modifiedby" class="patient_document_modifiedby">
<span<?php echo $patient_document->modifiedby->viewAttributes() ?>>
<?php echo $patient_document->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_document->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_modifieddatetime" class="patient_document_modifieddatetime">
<span<?php echo $patient_document->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_document->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber"<?php echo $patient_document->DocumentNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_document_list->RowCnt ?>_patient_document_DocumentNumber" class="patient_document_DocumentNumber">
<span<?php echo $patient_document->DocumentNumber->viewAttributes() ?>>
<?php echo $patient_document->DocumentNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_document_list->ListOptions->render("body", "right", $patient_document_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_document->isGridAdd())
		$patient_document_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_document->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_document_list->Recordset)
	$patient_document_list->Recordset->Close();
?>
<?php if (!$patient_document->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_document->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_document_list->Pager)) $patient_document_list->Pager = new NumericPager($patient_document_list->StartRec, $patient_document_list->DisplayRecs, $patient_document_list->TotalRecs, $patient_document_list->RecRange, $patient_document_list->AutoHidePager) ?>
<?php if ($patient_document_list->Pager->RecordCount > 0 && $patient_document_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_document_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_document_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_document_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_document_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_document_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_document_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_document_list->pageUrl() ?>start=<?php echo $patient_document_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_document_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_document_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_document_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_document_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_document_list->TotalRecs > 0 && (!$patient_document_list->AutoHidePageSizeSelector || $patient_document_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_document">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_document_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_document_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_document_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_document_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_document_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_document_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_document->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_document_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_document_list->TotalRecs == 0 && !$patient_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_document_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_document->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_document->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_document", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_document_list->terminate();
?>