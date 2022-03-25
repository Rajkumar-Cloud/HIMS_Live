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
$patient_email_list = new patient_email_list();

// Run the page
$patient_email_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_email->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_emaillist = currentForm = new ew.Form("fpatient_emaillist", "list");
fpatient_emaillist.formKeyCountName = '<?php echo $patient_email_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_emaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emaillist.lists["x_email_type"] = <?php echo $patient_email_list->email_type->Lookup->toClientList() ?>;
fpatient_emaillist.lists["x_email_type"].options = <?php echo JsonEncode($patient_email_list->email_type->lookupOptions()) ?>;
fpatient_emaillist.lists["x_status"] = <?php echo $patient_email_list->status->Lookup->toClientList() ?>;
fpatient_emaillist.lists["x_status"].options = <?php echo JsonEncode($patient_email_list->status->lookupOptions()) ?>;

// Form object for search
var fpatient_emaillistsrch = currentSearchForm = new ew.Form("fpatient_emaillistsrch");

// Filters
fpatient_emaillistsrch.filterList = <?php echo $patient_email_list->getFilterList() ?>;
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
<?php if (!$patient_email->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_email_list->TotalRecs > 0 && $patient_email_list->ExportOptions->visible()) { ?>
<?php $patient_email_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_email_list->ImportOptions->visible()) { ?>
<?php $patient_email_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_email_list->SearchOptions->visible()) { ?>
<?php $patient_email_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_email_list->FilterOptions->visible()) { ?>
<?php $patient_email_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_email->isExport() || EXPORT_MASTER_RECORD && $patient_email->isExport("print")) { ?>
<?php
if ($patient_email_list->DbMasterFilter <> "" && $patient_email->getCurrentMasterTable() == "patient") {
	if ($patient_email_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_email_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_email->isExport() && !$patient_email->CurrentAction) { ?>
<form name="fpatient_emaillistsrch" id="fpatient_emaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_email_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_emaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_email">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_email_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_email_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_email_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_email_list->showPageHeader(); ?>
<?php
$patient_email_list->showMessage();
?>
<?php if ($patient_email_list->TotalRecs > 0 || $patient_email->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_email_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_email">
<?php if (!$patient_email->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_email->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_email_list->Pager)) $patient_email_list->Pager = new NumericPager($patient_email_list->StartRec, $patient_email_list->DisplayRecs, $patient_email_list->TotalRecs, $patient_email_list->RecRange, $patient_email_list->AutoHidePager) ?>
<?php if ($patient_email_list->Pager->RecordCount > 0 && $patient_email_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_email_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_email_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_email_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_email_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_email_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_email_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_email_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_email_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_email_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_email_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_email_list->TotalRecs > 0 && (!$patient_email_list->AutoHidePageSizeSelector || $patient_email_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_email">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_email_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_email_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_email_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_email_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_email_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_email_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_email->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_emaillist" id="fpatient_emaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_email_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_email_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_email">
<?php if ($patient_email->getCurrentMasterTable() == "patient" && $patient_email->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo $patient_email->patient_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_email" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_email_list->TotalRecs > 0 || $patient_email->isGridEdit()) { ?>
<table id="tbl_patient_emaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_email_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_email_list->renderListOptions();

// Render list options (header, left)
$patient_email_list->ListOptions->render("header", "left");
?>
<?php if ($patient_email->id->Visible) { // id ?>
	<?php if ($patient_email->sortUrl($patient_email->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_email->id->headerCellClass() ?>"><div id="elh_patient_email_id" class="patient_email_id"><div class="ew-table-header-caption"><?php echo $patient_email->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_email->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_email->SortUrl($patient_email->id) ?>',1);"><div id="elh_patient_email_id" class="patient_email_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_email->sortUrl($patient_email->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_email->patient_id->headerCellClass() ?>"><div id="elh_patient_email_patient_id" class="patient_email_patient_id"><div class="ew-table-header-caption"><?php echo $patient_email->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_email->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_email->SortUrl($patient_email->patient_id) ?>',1);"><div id="elh_patient_email_patient_id" class="patient_email_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
	<?php if ($patient_email->sortUrl($patient_email->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $patient_email->_email->headerCellClass() ?>"><div id="elh_patient_email__email" class="patient_email__email"><div class="ew-table-header-caption"><?php echo $patient_email->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $patient_email->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_email->SortUrl($patient_email->_email) ?>',1);"><div id="elh_patient_email__email" class="patient_email__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_email->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
	<?php if ($patient_email->sortUrl($patient_email->email_type) == "") { ?>
		<th data-name="email_type" class="<?php echo $patient_email->email_type->headerCellClass() ?>"><div id="elh_patient_email_email_type" class="patient_email_email_type"><div class="ew-table-header-caption"><?php echo $patient_email->email_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_type" class="<?php echo $patient_email->email_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_email->SortUrl($patient_email->email_type) ?>',1);"><div id="elh_patient_email_email_type" class="patient_email_email_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->email_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->email_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->status->Visible) { // status ?>
	<?php if ($patient_email->sortUrl($patient_email->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_email->status->headerCellClass() ?>"><div id="elh_patient_email_status" class="patient_email_status"><div class="ew-table-header-caption"><?php echo $patient_email->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_email->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_email->SortUrl($patient_email->status) ?>',1);"><div id="elh_patient_email_status" class="patient_email_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_email_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_email->ExportAll && $patient_email->isExport()) {
	$patient_email_list->StopRec = $patient_email_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_email_list->TotalRecs > $patient_email_list->StartRec + $patient_email_list->DisplayRecs - 1)
		$patient_email_list->StopRec = $patient_email_list->StartRec + $patient_email_list->DisplayRecs - 1;
	else
		$patient_email_list->StopRec = $patient_email_list->TotalRecs;
}
$patient_email_list->RecCnt = $patient_email_list->StartRec - 1;
if ($patient_email_list->Recordset && !$patient_email_list->Recordset->EOF) {
	$patient_email_list->Recordset->moveFirst();
	$selectLimit = $patient_email_list->UseSelectLimit;
	if (!$selectLimit && $patient_email_list->StartRec > 1)
		$patient_email_list->Recordset->move($patient_email_list->StartRec - 1);
} elseif (!$patient_email->AllowAddDeleteRow && $patient_email_list->StopRec == 0) {
	$patient_email_list->StopRec = $patient_email->GridAddRowCount;
}

// Initialize aggregate
$patient_email->RowType = ROWTYPE_AGGREGATEINIT;
$patient_email->resetAttributes();
$patient_email_list->renderRow();
while ($patient_email_list->RecCnt < $patient_email_list->StopRec) {
	$patient_email_list->RecCnt++;
	if ($patient_email_list->RecCnt >= $patient_email_list->StartRec) {
		$patient_email_list->RowCnt++;

		// Set up key count
		$patient_email_list->KeyCount = $patient_email_list->RowIndex;

		// Init row class and style
		$patient_email->resetAttributes();
		$patient_email->CssClass = "";
		if ($patient_email->isGridAdd()) {
		} else {
			$patient_email_list->loadRowValues($patient_email_list->Recordset); // Load row values
		}
		$patient_email->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_email->RowAttrs = array_merge($patient_email->RowAttrs, array('data-rowindex'=>$patient_email_list->RowCnt, 'id'=>'r' . $patient_email_list->RowCnt . '_patient_email', 'data-rowtype'=>$patient_email->RowType));

		// Render row
		$patient_email_list->renderRow();

		// Render list options
		$patient_email_list->renderListOptions();
?>
	<tr<?php echo $patient_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_email_list->ListOptions->render("body", "left", $patient_email_list->RowCnt);
?>
	<?php if ($patient_email->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_email->id->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCnt ?>_patient_email_id" class="patient_email_id">
<span<?php echo $patient_email->id->viewAttributes() ?>>
<?php echo $patient_email->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_email->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCnt ?>_patient_email_patient_id" class="patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<?php echo $patient_email->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $patient_email->_email->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCnt ?>_patient_email__email" class="patient_email__email">
<span<?php echo $patient_email->_email->viewAttributes() ?>>
<?php echo $patient_email->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type"<?php echo $patient_email->email_type->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCnt ?>_patient_email_email_type" class="patient_email_email_type">
<span<?php echo $patient_email->email_type->viewAttributes() ?>>
<?php echo $patient_email->email_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_email->status->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCnt ?>_patient_email_status" class="patient_email_status">
<span<?php echo $patient_email->status->viewAttributes() ?>>
<?php echo $patient_email->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_email_list->ListOptions->render("body", "right", $patient_email_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_email->isGridAdd())
		$patient_email_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_email->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_email_list->Recordset)
	$patient_email_list->Recordset->Close();
?>
<?php if (!$patient_email->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_email->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_email_list->Pager)) $patient_email_list->Pager = new NumericPager($patient_email_list->StartRec, $patient_email_list->DisplayRecs, $patient_email_list->TotalRecs, $patient_email_list->RecRange, $patient_email_list->AutoHidePager) ?>
<?php if ($patient_email_list->Pager->RecordCount > 0 && $patient_email_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_email_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_email_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_email_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_email_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_email_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_email_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_email_list->pageUrl() ?>start=<?php echo $patient_email_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_email_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_email_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_email_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_email_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_email_list->TotalRecs > 0 && (!$patient_email_list->AutoHidePageSizeSelector || $patient_email_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_email">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_email_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_email_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_email_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_email_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_email_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_email_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_email->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_email_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_email_list->TotalRecs == 0 && !$patient_email->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_email_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_email->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_email->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_email", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_email_list->terminate();
?>