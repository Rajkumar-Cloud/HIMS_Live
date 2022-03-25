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
$sms_cintent_list = new sms_cintent_list();

// Run the page
$sms_cintent_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sms_cintent->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsms_cintentlist = currentForm = new ew.Form("fsms_cintentlist", "list");
fsms_cintentlist.formKeyCountName = '<?php echo $sms_cintent_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsms_cintentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_cintentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsms_cintentlist.lists["x_SMSType"] = <?php echo $sms_cintent_list->SMSType->Lookup->toClientList() ?>;
fsms_cintentlist.lists["x_SMSType"].options = <?php echo JsonEncode($sms_cintent_list->SMSType->lookupOptions()) ?>;
fsms_cintentlist.lists["x_Enabled[]"] = <?php echo $sms_cintent_list->Enabled->Lookup->toClientList() ?>;
fsms_cintentlist.lists["x_Enabled[]"].options = <?php echo JsonEncode($sms_cintent_list->Enabled->options(FALSE, TRUE)) ?>;

// Form object for search
var fsms_cintentlistsrch = currentSearchForm = new ew.Form("fsms_cintentlistsrch");

// Filters
fsms_cintentlistsrch.filterList = <?php echo $sms_cintent_list->getFilterList() ?>;
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
<?php if (!$sms_cintent->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sms_cintent_list->TotalRecs > 0 && $sms_cintent_list->ExportOptions->visible()) { ?>
<?php $sms_cintent_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_cintent_list->ImportOptions->visible()) { ?>
<?php $sms_cintent_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_cintent_list->SearchOptions->visible()) { ?>
<?php $sms_cintent_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sms_cintent_list->FilterOptions->visible()) { ?>
<?php $sms_cintent_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sms_cintent_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sms_cintent->isExport() && !$sms_cintent->CurrentAction) { ?>
<form name="fsms_cintentlistsrch" id="fsms_cintentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sms_cintent_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsms_cintentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sms_cintent">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sms_cintent_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sms_cintent_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sms_cintent_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sms_cintent_list->showPageHeader(); ?>
<?php
$sms_cintent_list->showMessage();
?>
<?php if ($sms_cintent_list->TotalRecs > 0 || $sms_cintent->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sms_cintent_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sms_cintent">
<?php if (!$sms_cintent->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sms_cintent->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sms_cintent_list->Pager)) $sms_cintent_list->Pager = new NumericPager($sms_cintent_list->StartRec, $sms_cintent_list->DisplayRecs, $sms_cintent_list->TotalRecs, $sms_cintent_list->RecRange, $sms_cintent_list->AutoHidePager) ?>
<?php if ($sms_cintent_list->Pager->RecordCount > 0 && $sms_cintent_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sms_cintent_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sms_cintent_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sms_cintent_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sms_cintent_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sms_cintent_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sms_cintent_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sms_cintent_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sms_cintent_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sms_cintent_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sms_cintent_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sms_cintent_list->TotalRecs > 0 && (!$sms_cintent_list->AutoHidePageSizeSelector || $sms_cintent_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sms_cintent">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sms_cintent_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sms_cintent_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sms_cintent_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sms_cintent_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sms_cintent_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sms_cintent_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sms_cintent->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_cintent_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsms_cintentlist" id="fsms_cintentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_cintent_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_cintent_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<div id="gmp_sms_cintent" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sms_cintent_list->TotalRecs > 0 || $sms_cintent->isGridEdit()) { ?>
<table id="tbl_sms_cintentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sms_cintent_list->RowType = ROWTYPE_HEADER;

// Render list options
$sms_cintent_list->renderListOptions();

// Render list options (header, left)
$sms_cintent_list->ListOptions->render("header", "left");
?>
<?php if ($sms_cintent->id->Visible) { // id ?>
	<?php if ($sms_cintent->sortUrl($sms_cintent->id) == "") { ?>
		<th data-name="id" class="<?php echo $sms_cintent->id->headerCellClass() ?>"><div id="elh_sms_cintent_id" class="sms_cintent_id"><div class="ew-table-header-caption"><?php echo $sms_cintent->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sms_cintent->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_cintent->SortUrl($sms_cintent->id) ?>',1);"><div id="elh_sms_cintent_id" class="sms_cintent_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_cintent->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent->SMSType->Visible) { // SMSType ?>
	<?php if ($sms_cintent->sortUrl($sms_cintent->SMSType) == "") { ?>
		<th data-name="SMSType" class="<?php echo $sms_cintent->SMSType->headerCellClass() ?>"><div id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType"><div class="ew-table-header-caption"><?php echo $sms_cintent->SMSType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSType" class="<?php echo $sms_cintent->SMSType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_cintent->SortUrl($sms_cintent->SMSType) ?>',1);"><div id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent->SMSType->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent->SMSType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_cintent->SMSType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent->Content->Visible) { // Content ?>
	<?php if ($sms_cintent->sortUrl($sms_cintent->Content) == "") { ?>
		<th data-name="Content" class="<?php echo $sms_cintent->Content->headerCellClass() ?>"><div id="elh_sms_cintent_Content" class="sms_cintent_Content"><div class="ew-table-header-caption"><?php echo $sms_cintent->Content->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Content" class="<?php echo $sms_cintent->Content->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_cintent->SortUrl($sms_cintent->Content) ?>',1);"><div id="elh_sms_cintent_Content" class="sms_cintent_Content">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent->Content->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent->Content->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_cintent->Content->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent->Enabled->Visible) { // Enabled ?>
	<?php if ($sms_cintent->sortUrl($sms_cintent->Enabled) == "") { ?>
		<th data-name="Enabled" class="<?php echo $sms_cintent->Enabled->headerCellClass() ?>"><div id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled"><div class="ew-table-header-caption"><?php echo $sms_cintent->Enabled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enabled" class="<?php echo $sms_cintent->Enabled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_cintent->SortUrl($sms_cintent->Enabled) ?>',1);"><div id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent->Enabled->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent->Enabled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_cintent->Enabled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent->HospID->Visible) { // HospID ?>
	<?php if ($sms_cintent->sortUrl($sms_cintent->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $sms_cintent->HospID->headerCellClass() ?>"><div id="elh_sms_cintent_HospID" class="sms_cintent_HospID"><div class="ew-table-header-caption"><?php echo $sms_cintent->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $sms_cintent->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_cintent->SortUrl($sms_cintent->HospID) ?>',1);"><div id="elh_sms_cintent_HospID" class="sms_cintent_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_cintent->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sms_cintent_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sms_cintent->ExportAll && $sms_cintent->isExport()) {
	$sms_cintent_list->StopRec = $sms_cintent_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sms_cintent_list->TotalRecs > $sms_cintent_list->StartRec + $sms_cintent_list->DisplayRecs - 1)
		$sms_cintent_list->StopRec = $sms_cintent_list->StartRec + $sms_cintent_list->DisplayRecs - 1;
	else
		$sms_cintent_list->StopRec = $sms_cintent_list->TotalRecs;
}
$sms_cintent_list->RecCnt = $sms_cintent_list->StartRec - 1;
if ($sms_cintent_list->Recordset && !$sms_cintent_list->Recordset->EOF) {
	$sms_cintent_list->Recordset->moveFirst();
	$selectLimit = $sms_cintent_list->UseSelectLimit;
	if (!$selectLimit && $sms_cintent_list->StartRec > 1)
		$sms_cintent_list->Recordset->move($sms_cintent_list->StartRec - 1);
} elseif (!$sms_cintent->AllowAddDeleteRow && $sms_cintent_list->StopRec == 0) {
	$sms_cintent_list->StopRec = $sms_cintent->GridAddRowCount;
}

// Initialize aggregate
$sms_cintent->RowType = ROWTYPE_AGGREGATEINIT;
$sms_cintent->resetAttributes();
$sms_cintent_list->renderRow();
while ($sms_cintent_list->RecCnt < $sms_cintent_list->StopRec) {
	$sms_cintent_list->RecCnt++;
	if ($sms_cintent_list->RecCnt >= $sms_cintent_list->StartRec) {
		$sms_cintent_list->RowCnt++;

		// Set up key count
		$sms_cintent_list->KeyCount = $sms_cintent_list->RowIndex;

		// Init row class and style
		$sms_cintent->resetAttributes();
		$sms_cintent->CssClass = "";
		if ($sms_cintent->isGridAdd()) {
		} else {
			$sms_cintent_list->loadRowValues($sms_cintent_list->Recordset); // Load row values
		}
		$sms_cintent->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sms_cintent->RowAttrs = array_merge($sms_cintent->RowAttrs, array('data-rowindex'=>$sms_cintent_list->RowCnt, 'id'=>'r' . $sms_cintent_list->RowCnt . '_sms_cintent', 'data-rowtype'=>$sms_cintent->RowType));

		// Render row
		$sms_cintent_list->renderRow();

		// Render list options
		$sms_cintent_list->renderListOptions();
?>
	<tr<?php echo $sms_cintent->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sms_cintent_list->ListOptions->render("body", "left", $sms_cintent_list->RowCnt);
?>
	<?php if ($sms_cintent->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sms_cintent->id->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCnt ?>_sms_cintent_id" class="sms_cintent_id">
<span<?php echo $sms_cintent->id->viewAttributes() ?>>
<?php echo $sms_cintent->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent->SMSType->Visible) { // SMSType ?>
		<td data-name="SMSType"<?php echo $sms_cintent->SMSType->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCnt ?>_sms_cintent_SMSType" class="sms_cintent_SMSType">
<span<?php echo $sms_cintent->SMSType->viewAttributes() ?>>
<?php echo $sms_cintent->SMSType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent->Content->Visible) { // Content ?>
		<td data-name="Content"<?php echo $sms_cintent->Content->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCnt ?>_sms_cintent_Content" class="sms_cintent_Content">
<span<?php echo $sms_cintent->Content->viewAttributes() ?>>
<?php echo $sms_cintent->Content->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent->Enabled->Visible) { // Enabled ?>
		<td data-name="Enabled"<?php echo $sms_cintent->Enabled->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCnt ?>_sms_cintent_Enabled" class="sms_cintent_Enabled">
<span<?php echo $sms_cintent->Enabled->viewAttributes() ?>>
<?php echo $sms_cintent->Enabled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $sms_cintent->HospID->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCnt ?>_sms_cintent_HospID" class="sms_cintent_HospID">
<span<?php echo $sms_cintent->HospID->viewAttributes() ?>>
<?php echo $sms_cintent->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sms_cintent_list->ListOptions->render("body", "right", $sms_cintent_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sms_cintent->isGridAdd())
		$sms_cintent_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sms_cintent->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sms_cintent_list->Recordset)
	$sms_cintent_list->Recordset->Close();
?>
<?php if (!$sms_cintent->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sms_cintent->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sms_cintent_list->Pager)) $sms_cintent_list->Pager = new NumericPager($sms_cintent_list->StartRec, $sms_cintent_list->DisplayRecs, $sms_cintent_list->TotalRecs, $sms_cintent_list->RecRange, $sms_cintent_list->AutoHidePager) ?>
<?php if ($sms_cintent_list->Pager->RecordCount > 0 && $sms_cintent_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sms_cintent_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sms_cintent_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sms_cintent_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sms_cintent_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sms_cintent_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sms_cintent_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_cintent_list->pageUrl() ?>start=<?php echo $sms_cintent_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sms_cintent_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sms_cintent_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sms_cintent_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sms_cintent_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sms_cintent_list->TotalRecs > 0 && (!$sms_cintent_list->AutoHidePageSizeSelector || $sms_cintent_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sms_cintent">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sms_cintent_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sms_cintent_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sms_cintent_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sms_cintent_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sms_cintent_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sms_cintent_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sms_cintent->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_cintent_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sms_cintent_list->TotalRecs == 0 && !$sms_cintent->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sms_cintent_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sms_cintent_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sms_cintent->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sms_cintent->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sms_cintent", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sms_cintent_list->terminate();
?>