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
$appointment_patienttypee_list = new appointment_patienttypee_list();

// Run the page
$appointment_patienttypee_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_patienttypee_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fappointment_patienttypeelist = currentForm = new ew.Form("fappointment_patienttypeelist", "list");
fappointment_patienttypeelist.formKeyCountName = '<?php echo $appointment_patienttypee_list->FormKeyCountName ?>';

// Form_CustomValidate event
fappointment_patienttypeelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_patienttypeelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fappointment_patienttypeelist.lists["x_Type"] = <?php echo $appointment_patienttypee_list->Type->Lookup->toClientList() ?>;
fappointment_patienttypeelist.lists["x_Type"].options = <?php echo JsonEncode($appointment_patienttypee_list->Type->options(FALSE, TRUE)) ?>;

// Form object for search
var fappointment_patienttypeelistsrch = currentSearchForm = new ew.Form("fappointment_patienttypeelistsrch");

// Filters
fappointment_patienttypeelistsrch.filterList = <?php echo $appointment_patienttypee_list->getFilterList() ?>;
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
<?php if (!$appointment_patienttypee->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_patienttypee_list->TotalRecs > 0 && $appointment_patienttypee_list->ExportOptions->visible()) { ?>
<?php $appointment_patienttypee_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->ImportOptions->visible()) { ?>
<?php $appointment_patienttypee_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->SearchOptions->visible()) { ?>
<?php $appointment_patienttypee_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->FilterOptions->visible()) { ?>
<?php $appointment_patienttypee_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$appointment_patienttypee_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_patienttypee->isExport() && !$appointment_patienttypee->CurrentAction) { ?>
<form name="fappointment_patienttypeelistsrch" id="fappointment_patienttypeelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($appointment_patienttypee_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fappointment_patienttypeelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_patienttypee">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($appointment_patienttypee_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($appointment_patienttypee_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_patienttypee_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $appointment_patienttypee_list->showPageHeader(); ?>
<?php
$appointment_patienttypee_list->showMessage();
?>
<?php if ($appointment_patienttypee_list->TotalRecs > 0 || $appointment_patienttypee->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_patienttypee_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_patienttypee">
<?php if (!$appointment_patienttypee->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_patienttypee->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($appointment_patienttypee_list->Pager)) $appointment_patienttypee_list->Pager = new NumericPager($appointment_patienttypee_list->StartRec, $appointment_patienttypee_list->DisplayRecs, $appointment_patienttypee_list->TotalRecs, $appointment_patienttypee_list->RecRange, $appointment_patienttypee_list->AutoHidePager) ?>
<?php if ($appointment_patienttypee_list->Pager->RecordCount > 0 && $appointment_patienttypee_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($appointment_patienttypee_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($appointment_patienttypee_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $appointment_patienttypee_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($appointment_patienttypee_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appointment_patienttypee_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appointment_patienttypee_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appointment_patienttypee_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($appointment_patienttypee_list->TotalRecs > 0 && (!$appointment_patienttypee_list->AutoHidePageSizeSelector || $appointment_patienttypee_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="appointment_patienttypee">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($appointment_patienttypee_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($appointment_patienttypee_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($appointment_patienttypee_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($appointment_patienttypee_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($appointment_patienttypee_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($appointment_patienttypee_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($appointment_patienttypee->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_patienttypee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_patienttypeelist" id="fappointment_patienttypeelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_patienttypee_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_patienttypee_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<div id="gmp_appointment_patienttypee" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($appointment_patienttypee_list->TotalRecs > 0 || $appointment_patienttypee->isGridEdit()) { ?>
<table id="tbl_appointment_patienttypeelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_patienttypee_list->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_patienttypee_list->renderListOptions();

// Render list options (header, left)
$appointment_patienttypee_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_patienttypee->id->Visible) { // id ?>
	<?php if ($appointment_patienttypee->sortUrl($appointment_patienttypee->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_patienttypee->id->headerCellClass() ?>"><div id="elh_appointment_patienttypee_id" class="appointment_patienttypee_id"><div class="ew-table-header-caption"><?php echo $appointment_patienttypee->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_patienttypee->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_patienttypee->SortUrl($appointment_patienttypee->id) ?>',1);"><div id="elh_appointment_patienttypee_id" class="appointment_patienttypee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_patienttypee->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_patienttypee->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_patienttypee->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_patienttypee->Name->Visible) { // Name ?>
	<?php if ($appointment_patienttypee->sortUrl($appointment_patienttypee->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $appointment_patienttypee->Name->headerCellClass() ?>"><div id="elh_appointment_patienttypee_Name" class="appointment_patienttypee_Name"><div class="ew-table-header-caption"><?php echo $appointment_patienttypee->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $appointment_patienttypee->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_patienttypee->SortUrl($appointment_patienttypee->Name) ?>',1);"><div id="elh_appointment_patienttypee_Name" class="appointment_patienttypee_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_patienttypee->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_patienttypee->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_patienttypee->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_patienttypee->Type->Visible) { // Type ?>
	<?php if ($appointment_patienttypee->sortUrl($appointment_patienttypee->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $appointment_patienttypee->Type->headerCellClass() ?>"><div id="elh_appointment_patienttypee_Type" class="appointment_patienttypee_Type"><div class="ew-table-header-caption"><?php echo $appointment_patienttypee->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $appointment_patienttypee->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_patienttypee->SortUrl($appointment_patienttypee->Type) ?>',1);"><div id="elh_appointment_patienttypee_Type" class="appointment_patienttypee_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_patienttypee->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_patienttypee->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_patienttypee->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_patienttypee_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_patienttypee->ExportAll && $appointment_patienttypee->isExport()) {
	$appointment_patienttypee_list->StopRec = $appointment_patienttypee_list->TotalRecs;
} else {

	// Set the last record to display
	if ($appointment_patienttypee_list->TotalRecs > $appointment_patienttypee_list->StartRec + $appointment_patienttypee_list->DisplayRecs - 1)
		$appointment_patienttypee_list->StopRec = $appointment_patienttypee_list->StartRec + $appointment_patienttypee_list->DisplayRecs - 1;
	else
		$appointment_patienttypee_list->StopRec = $appointment_patienttypee_list->TotalRecs;
}
$appointment_patienttypee_list->RecCnt = $appointment_patienttypee_list->StartRec - 1;
if ($appointment_patienttypee_list->Recordset && !$appointment_patienttypee_list->Recordset->EOF) {
	$appointment_patienttypee_list->Recordset->moveFirst();
	$selectLimit = $appointment_patienttypee_list->UseSelectLimit;
	if (!$selectLimit && $appointment_patienttypee_list->StartRec > 1)
		$appointment_patienttypee_list->Recordset->move($appointment_patienttypee_list->StartRec - 1);
} elseif (!$appointment_patienttypee->AllowAddDeleteRow && $appointment_patienttypee_list->StopRec == 0) {
	$appointment_patienttypee_list->StopRec = $appointment_patienttypee->GridAddRowCount;
}

// Initialize aggregate
$appointment_patienttypee->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_patienttypee->resetAttributes();
$appointment_patienttypee_list->renderRow();
while ($appointment_patienttypee_list->RecCnt < $appointment_patienttypee_list->StopRec) {
	$appointment_patienttypee_list->RecCnt++;
	if ($appointment_patienttypee_list->RecCnt >= $appointment_patienttypee_list->StartRec) {
		$appointment_patienttypee_list->RowCnt++;

		// Set up key count
		$appointment_patienttypee_list->KeyCount = $appointment_patienttypee_list->RowIndex;

		// Init row class and style
		$appointment_patienttypee->resetAttributes();
		$appointment_patienttypee->CssClass = "";
		if ($appointment_patienttypee->isGridAdd()) {
		} else {
			$appointment_patienttypee_list->loadRowValues($appointment_patienttypee_list->Recordset); // Load row values
		}
		$appointment_patienttypee->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_patienttypee->RowAttrs = array_merge($appointment_patienttypee->RowAttrs, array('data-rowindex'=>$appointment_patienttypee_list->RowCnt, 'id'=>'r' . $appointment_patienttypee_list->RowCnt . '_appointment_patienttypee', 'data-rowtype'=>$appointment_patienttypee->RowType));

		// Render row
		$appointment_patienttypee_list->renderRow();

		// Render list options
		$appointment_patienttypee_list->renderListOptions();
?>
	<tr<?php echo $appointment_patienttypee->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_patienttypee_list->ListOptions->render("body", "left", $appointment_patienttypee_list->RowCnt);
?>
	<?php if ($appointment_patienttypee->id->Visible) { // id ?>
		<td data-name="id"<?php echo $appointment_patienttypee->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_list->RowCnt ?>_appointment_patienttypee_id" class="appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee->id->viewAttributes() ?>>
<?php echo $appointment_patienttypee->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_patienttypee->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $appointment_patienttypee->Name->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_list->RowCnt ?>_appointment_patienttypee_Name" class="appointment_patienttypee_Name">
<span<?php echo $appointment_patienttypee->Name->viewAttributes() ?>>
<?php echo $appointment_patienttypee->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_patienttypee->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $appointment_patienttypee->Type->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_list->RowCnt ?>_appointment_patienttypee_Type" class="appointment_patienttypee_Type">
<span<?php echo $appointment_patienttypee->Type->viewAttributes() ?>>
<?php echo $appointment_patienttypee->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_patienttypee_list->ListOptions->render("body", "right", $appointment_patienttypee_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$appointment_patienttypee->isGridAdd())
		$appointment_patienttypee_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$appointment_patienttypee->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_patienttypee_list->Recordset)
	$appointment_patienttypee_list->Recordset->Close();
?>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_patienttypee->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($appointment_patienttypee_list->Pager)) $appointment_patienttypee_list->Pager = new NumericPager($appointment_patienttypee_list->StartRec, $appointment_patienttypee_list->DisplayRecs, $appointment_patienttypee_list->TotalRecs, $appointment_patienttypee_list->RecRange, $appointment_patienttypee_list->AutoHidePager) ?>
<?php if ($appointment_patienttypee_list->Pager->RecordCount > 0 && $appointment_patienttypee_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($appointment_patienttypee_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($appointment_patienttypee_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $appointment_patienttypee_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_patienttypee_list->pageUrl() ?>start=<?php echo $appointment_patienttypee_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($appointment_patienttypee_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appointment_patienttypee_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appointment_patienttypee_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appointment_patienttypee_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($appointment_patienttypee_list->TotalRecs > 0 && (!$appointment_patienttypee_list->AutoHidePageSizeSelector || $appointment_patienttypee_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="appointment_patienttypee">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($appointment_patienttypee_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($appointment_patienttypee_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($appointment_patienttypee_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($appointment_patienttypee_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($appointment_patienttypee_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($appointment_patienttypee_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($appointment_patienttypee->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_patienttypee_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_patienttypee_list->TotalRecs == 0 && !$appointment_patienttypee->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_patienttypee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_patienttypee_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<script>
ew.scrollableTable("gmp_appointment_patienttypee", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$appointment_patienttypee_list->terminate();
?>