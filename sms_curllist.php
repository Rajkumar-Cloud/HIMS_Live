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
$sms_curl_list = new sms_curl_list();

// Run the page
$sms_curl_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_curl_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sms_curl->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsms_curllist = currentForm = new ew.Form("fsms_curllist", "list");
fsms_curllist.formKeyCountName = '<?php echo $sms_curl_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsms_curllist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_curllist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsms_curllistsrch = currentSearchForm = new ew.Form("fsms_curllistsrch");

// Filters
fsms_curllistsrch.filterList = <?php echo $sms_curl_list->getFilterList() ?>;
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
<?php if (!$sms_curl->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sms_curl_list->TotalRecs > 0 && $sms_curl_list->ExportOptions->visible()) { ?>
<?php $sms_curl_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_curl_list->ImportOptions->visible()) { ?>
<?php $sms_curl_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_curl_list->SearchOptions->visible()) { ?>
<?php $sms_curl_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sms_curl_list->FilterOptions->visible()) { ?>
<?php $sms_curl_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sms_curl_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sms_curl->isExport() && !$sms_curl->CurrentAction) { ?>
<form name="fsms_curllistsrch" id="fsms_curllistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sms_curl_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsms_curllistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sms_curl">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sms_curl_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sms_curl_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sms_curl_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sms_curl_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sms_curl_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sms_curl_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sms_curl_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sms_curl_list->showPageHeader(); ?>
<?php
$sms_curl_list->showMessage();
?>
<?php if ($sms_curl_list->TotalRecs > 0 || $sms_curl->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sms_curl_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sms_curl">
<?php if (!$sms_curl->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sms_curl->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sms_curl_list->Pager)) $sms_curl_list->Pager = new NumericPager($sms_curl_list->StartRec, $sms_curl_list->DisplayRecs, $sms_curl_list->TotalRecs, $sms_curl_list->RecRange, $sms_curl_list->AutoHidePager) ?>
<?php if ($sms_curl_list->Pager->RecordCount > 0 && $sms_curl_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sms_curl_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sms_curl_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sms_curl_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sms_curl_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sms_curl_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sms_curl_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sms_curl_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sms_curl_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sms_curl_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sms_curl_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sms_curl_list->TotalRecs > 0 && (!$sms_curl_list->AutoHidePageSizeSelector || $sms_curl_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sms_curl">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sms_curl_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sms_curl_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sms_curl_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sms_curl_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sms_curl_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sms_curl_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sms_curl->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_curl_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsms_curllist" id="fsms_curllist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_curl_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_curl_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_curl">
<div id="gmp_sms_curl" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sms_curl_list->TotalRecs > 0 || $sms_curl->isGridEdit()) { ?>
<table id="tbl_sms_curllist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sms_curl_list->RowType = ROWTYPE_HEADER;

// Render list options
$sms_curl_list->renderListOptions();

// Render list options (header, left)
$sms_curl_list->ListOptions->render("header", "left");
?>
<?php if ($sms_curl->id->Visible) { // id ?>
	<?php if ($sms_curl->sortUrl($sms_curl->id) == "") { ?>
		<th data-name="id" class="<?php echo $sms_curl->id->headerCellClass() ?>"><div id="elh_sms_curl_id" class="sms_curl_id"><div class="ew-table-header-caption"><?php echo $sms_curl->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sms_curl->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_curl->SortUrl($sms_curl->id) ?>',1);"><div id="elh_sms_curl_id" class="sms_curl_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_curl->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_curl->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_curl->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_curl->SMSType->Visible) { // SMSType ?>
	<?php if ($sms_curl->sortUrl($sms_curl->SMSType) == "") { ?>
		<th data-name="SMSType" class="<?php echo $sms_curl->SMSType->headerCellClass() ?>"><div id="elh_sms_curl_SMSType" class="sms_curl_SMSType"><div class="ew-table-header-caption"><?php echo $sms_curl->SMSType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSType" class="<?php echo $sms_curl->SMSType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_curl->SortUrl($sms_curl->SMSType) ?>',1);"><div id="elh_sms_curl_SMSType" class="sms_curl_SMSType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_curl->SMSType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sms_curl->SMSType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_curl->SMSType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_curl->Enabled->Visible) { // Enabled ?>
	<?php if ($sms_curl->sortUrl($sms_curl->Enabled) == "") { ?>
		<th data-name="Enabled" class="<?php echo $sms_curl->Enabled->headerCellClass() ?>"><div id="elh_sms_curl_Enabled" class="sms_curl_Enabled"><div class="ew-table-header-caption"><?php echo $sms_curl->Enabled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enabled" class="<?php echo $sms_curl->Enabled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_curl->SortUrl($sms_curl->Enabled) ?>',1);"><div id="elh_sms_curl_Enabled" class="sms_curl_Enabled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_curl->Enabled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sms_curl->Enabled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_curl->Enabled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_curl->HospID->Visible) { // HospID ?>
	<?php if ($sms_curl->sortUrl($sms_curl->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $sms_curl->HospID->headerCellClass() ?>"><div id="elh_sms_curl_HospID" class="sms_curl_HospID"><div class="ew-table-header-caption"><?php echo $sms_curl->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $sms_curl->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sms_curl->SortUrl($sms_curl->HospID) ?>',1);"><div id="elh_sms_curl_HospID" class="sms_curl_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_curl->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_curl->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sms_curl->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sms_curl_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sms_curl->ExportAll && $sms_curl->isExport()) {
	$sms_curl_list->StopRec = $sms_curl_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sms_curl_list->TotalRecs > $sms_curl_list->StartRec + $sms_curl_list->DisplayRecs - 1)
		$sms_curl_list->StopRec = $sms_curl_list->StartRec + $sms_curl_list->DisplayRecs - 1;
	else
		$sms_curl_list->StopRec = $sms_curl_list->TotalRecs;
}
$sms_curl_list->RecCnt = $sms_curl_list->StartRec - 1;
if ($sms_curl_list->Recordset && !$sms_curl_list->Recordset->EOF) {
	$sms_curl_list->Recordset->moveFirst();
	$selectLimit = $sms_curl_list->UseSelectLimit;
	if (!$selectLimit && $sms_curl_list->StartRec > 1)
		$sms_curl_list->Recordset->move($sms_curl_list->StartRec - 1);
} elseif (!$sms_curl->AllowAddDeleteRow && $sms_curl_list->StopRec == 0) {
	$sms_curl_list->StopRec = $sms_curl->GridAddRowCount;
}

// Initialize aggregate
$sms_curl->RowType = ROWTYPE_AGGREGATEINIT;
$sms_curl->resetAttributes();
$sms_curl_list->renderRow();
while ($sms_curl_list->RecCnt < $sms_curl_list->StopRec) {
	$sms_curl_list->RecCnt++;
	if ($sms_curl_list->RecCnt >= $sms_curl_list->StartRec) {
		$sms_curl_list->RowCnt++;

		// Set up key count
		$sms_curl_list->KeyCount = $sms_curl_list->RowIndex;

		// Init row class and style
		$sms_curl->resetAttributes();
		$sms_curl->CssClass = "";
		if ($sms_curl->isGridAdd()) {
		} else {
			$sms_curl_list->loadRowValues($sms_curl_list->Recordset); // Load row values
		}
		$sms_curl->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sms_curl->RowAttrs = array_merge($sms_curl->RowAttrs, array('data-rowindex'=>$sms_curl_list->RowCnt, 'id'=>'r' . $sms_curl_list->RowCnt . '_sms_curl', 'data-rowtype'=>$sms_curl->RowType));

		// Render row
		$sms_curl_list->renderRow();

		// Render list options
		$sms_curl_list->renderListOptions();
?>
	<tr<?php echo $sms_curl->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sms_curl_list->ListOptions->render("body", "left", $sms_curl_list->RowCnt);
?>
	<?php if ($sms_curl->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sms_curl->id->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_list->RowCnt ?>_sms_curl_id" class="sms_curl_id">
<span<?php echo $sms_curl->id->viewAttributes() ?>>
<?php echo $sms_curl->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_curl->SMSType->Visible) { // SMSType ?>
		<td data-name="SMSType"<?php echo $sms_curl->SMSType->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_list->RowCnt ?>_sms_curl_SMSType" class="sms_curl_SMSType">
<span<?php echo $sms_curl->SMSType->viewAttributes() ?>>
<?php echo $sms_curl->SMSType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_curl->Enabled->Visible) { // Enabled ?>
		<td data-name="Enabled"<?php echo $sms_curl->Enabled->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_list->RowCnt ?>_sms_curl_Enabled" class="sms_curl_Enabled">
<span<?php echo $sms_curl->Enabled->viewAttributes() ?>>
<?php echo $sms_curl->Enabled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_curl->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $sms_curl->HospID->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_list->RowCnt ?>_sms_curl_HospID" class="sms_curl_HospID">
<span<?php echo $sms_curl->HospID->viewAttributes() ?>>
<?php echo $sms_curl->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sms_curl_list->ListOptions->render("body", "right", $sms_curl_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sms_curl->isGridAdd())
		$sms_curl_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sms_curl->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sms_curl_list->Recordset)
	$sms_curl_list->Recordset->Close();
?>
<?php if (!$sms_curl->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sms_curl->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sms_curl_list->Pager)) $sms_curl_list->Pager = new NumericPager($sms_curl_list->StartRec, $sms_curl_list->DisplayRecs, $sms_curl_list->TotalRecs, $sms_curl_list->RecRange, $sms_curl_list->AutoHidePager) ?>
<?php if ($sms_curl_list->Pager->RecordCount > 0 && $sms_curl_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sms_curl_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sms_curl_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sms_curl_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sms_curl_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sms_curl_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sms_curl_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sms_curl_list->pageUrl() ?>start=<?php echo $sms_curl_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sms_curl_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sms_curl_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sms_curl_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sms_curl_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sms_curl_list->TotalRecs > 0 && (!$sms_curl_list->AutoHidePageSizeSelector || $sms_curl_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sms_curl">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sms_curl_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sms_curl_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sms_curl_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sms_curl_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sms_curl_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sms_curl_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sms_curl->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_curl_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sms_curl_list->TotalRecs == 0 && !$sms_curl->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sms_curl_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sms_curl_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sms_curl->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sms_curl->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sms_curl", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sms_curl_list->terminate();
?>