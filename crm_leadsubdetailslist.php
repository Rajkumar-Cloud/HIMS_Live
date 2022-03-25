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
$crm_leadsubdetails_list = new crm_leadsubdetails_list();

// Run the page
$crm_leadsubdetails_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsubdetails_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_leadsubdetailslist = currentForm = new ew.Form("fcrm_leadsubdetailslist", "list");
fcrm_leadsubdetailslist.formKeyCountName = '<?php echo $crm_leadsubdetails_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_leadsubdetailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsubdetailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_leadsubdetailslistsrch = currentSearchForm = new ew.Form("fcrm_leadsubdetailslistsrch");

// Filters
fcrm_leadsubdetailslistsrch.filterList = <?php echo $crm_leadsubdetails_list->getFilterList() ?>;
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
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_leadsubdetails_list->TotalRecs > 0 && $crm_leadsubdetails_list->ExportOptions->visible()) { ?>
<?php $crm_leadsubdetails_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadsubdetails_list->ImportOptions->visible()) { ?>
<?php $crm_leadsubdetails_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadsubdetails_list->SearchOptions->visible()) { ?>
<?php $crm_leadsubdetails_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadsubdetails_list->FilterOptions->visible()) { ?>
<?php $crm_leadsubdetails_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_leadsubdetails_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_leadsubdetails->isExport() && !$crm_leadsubdetails->CurrentAction) { ?>
<form name="fcrm_leadsubdetailslistsrch" id="fcrm_leadsubdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_leadsubdetails_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_leadsubdetailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leadsubdetails">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_leadsubdetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_leadsubdetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_leadsubdetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_leadsubdetails_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_leadsubdetails_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_leadsubdetails_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_leadsubdetails_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_leadsubdetails_list->showPageHeader(); ?>
<?php
$crm_leadsubdetails_list->showMessage();
?>
<?php if ($crm_leadsubdetails_list->TotalRecs > 0 || $crm_leadsubdetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_leadsubdetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leadsubdetails">
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_leadsubdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadsubdetails_list->Pager)) $crm_leadsubdetails_list->Pager = new NumericPager($crm_leadsubdetails_list->StartRec, $crm_leadsubdetails_list->DisplayRecs, $crm_leadsubdetails_list->TotalRecs, $crm_leadsubdetails_list->RecRange, $crm_leadsubdetails_list->AutoHidePager) ?>
<?php if ($crm_leadsubdetails_list->Pager->RecordCount > 0 && $crm_leadsubdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadsubdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsubdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadsubdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadsubdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsubdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsubdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadsubdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadsubdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadsubdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadsubdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadsubdetails_list->TotalRecs > 0 && (!$crm_leadsubdetails_list->AutoHidePageSizeSelector || $crm_leadsubdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadsubdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadsubdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadsubdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadsubdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadsubdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadsubdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadsubdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadsubdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadsubdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leadsubdetailslist" id="fcrm_leadsubdetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsubdetails_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsubdetails_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
<div id="gmp_crm_leadsubdetails" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_leadsubdetails_list->TotalRecs > 0 || $crm_leadsubdetails->isGridEdit()) { ?>
<table id="tbl_crm_leadsubdetailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_leadsubdetails_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_leadsubdetails_list->renderListOptions();

// Render list options (header, left)
$crm_leadsubdetails_list->ListOptions->render("header", "left");
?>
<?php if ($crm_leadsubdetails->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
	<?php if ($crm_leadsubdetails->sortUrl($crm_leadsubdetails->leadsubscriptionid) == "") { ?>
		<th data-name="leadsubscriptionid" class="<?php echo $crm_leadsubdetails->leadsubscriptionid->headerCellClass() ?>"><div id="elh_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid"><div class="ew-table-header-caption"><?php echo $crm_leadsubdetails->leadsubscriptionid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadsubscriptionid" class="<?php echo $crm_leadsubdetails->leadsubscriptionid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsubdetails->SortUrl($crm_leadsubdetails->leadsubscriptionid) ?>',1);"><div id="elh_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsubdetails->leadsubscriptionid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsubdetails->leadsubscriptionid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsubdetails->leadsubscriptionid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadsubdetails->website->Visible) { // website ?>
	<?php if ($crm_leadsubdetails->sortUrl($crm_leadsubdetails->website) == "") { ?>
		<th data-name="website" class="<?php echo $crm_leadsubdetails->website->headerCellClass() ?>"><div id="elh_crm_leadsubdetails_website" class="crm_leadsubdetails_website"><div class="ew-table-header-caption"><?php echo $crm_leadsubdetails->website->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="website" class="<?php echo $crm_leadsubdetails->website->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsubdetails->SortUrl($crm_leadsubdetails->website) ?>',1);"><div id="elh_crm_leadsubdetails_website" class="crm_leadsubdetails_website">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsubdetails->website->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsubdetails->website->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsubdetails->website->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_leadsubdetails_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_leadsubdetails->ExportAll && $crm_leadsubdetails->isExport()) {
	$crm_leadsubdetails_list->StopRec = $crm_leadsubdetails_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_leadsubdetails_list->TotalRecs > $crm_leadsubdetails_list->StartRec + $crm_leadsubdetails_list->DisplayRecs - 1)
		$crm_leadsubdetails_list->StopRec = $crm_leadsubdetails_list->StartRec + $crm_leadsubdetails_list->DisplayRecs - 1;
	else
		$crm_leadsubdetails_list->StopRec = $crm_leadsubdetails_list->TotalRecs;
}
$crm_leadsubdetails_list->RecCnt = $crm_leadsubdetails_list->StartRec - 1;
if ($crm_leadsubdetails_list->Recordset && !$crm_leadsubdetails_list->Recordset->EOF) {
	$crm_leadsubdetails_list->Recordset->moveFirst();
	$selectLimit = $crm_leadsubdetails_list->UseSelectLimit;
	if (!$selectLimit && $crm_leadsubdetails_list->StartRec > 1)
		$crm_leadsubdetails_list->Recordset->move($crm_leadsubdetails_list->StartRec - 1);
} elseif (!$crm_leadsubdetails->AllowAddDeleteRow && $crm_leadsubdetails_list->StopRec == 0) {
	$crm_leadsubdetails_list->StopRec = $crm_leadsubdetails->GridAddRowCount;
}

// Initialize aggregate
$crm_leadsubdetails->RowType = ROWTYPE_AGGREGATEINIT;
$crm_leadsubdetails->resetAttributes();
$crm_leadsubdetails_list->renderRow();
while ($crm_leadsubdetails_list->RecCnt < $crm_leadsubdetails_list->StopRec) {
	$crm_leadsubdetails_list->RecCnt++;
	if ($crm_leadsubdetails_list->RecCnt >= $crm_leadsubdetails_list->StartRec) {
		$crm_leadsubdetails_list->RowCnt++;

		// Set up key count
		$crm_leadsubdetails_list->KeyCount = $crm_leadsubdetails_list->RowIndex;

		// Init row class and style
		$crm_leadsubdetails->resetAttributes();
		$crm_leadsubdetails->CssClass = "";
		if ($crm_leadsubdetails->isGridAdd()) {
		} else {
			$crm_leadsubdetails_list->loadRowValues($crm_leadsubdetails_list->Recordset); // Load row values
		}
		$crm_leadsubdetails->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_leadsubdetails->RowAttrs = array_merge($crm_leadsubdetails->RowAttrs, array('data-rowindex'=>$crm_leadsubdetails_list->RowCnt, 'id'=>'r' . $crm_leadsubdetails_list->RowCnt . '_crm_leadsubdetails', 'data-rowtype'=>$crm_leadsubdetails->RowType));

		// Render row
		$crm_leadsubdetails_list->renderRow();

		// Render list options
		$crm_leadsubdetails_list->renderListOptions();
?>
	<tr<?php echo $crm_leadsubdetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_leadsubdetails_list->ListOptions->render("body", "left", $crm_leadsubdetails_list->RowCnt);
?>
	<?php if ($crm_leadsubdetails->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
		<td data-name="leadsubscriptionid"<?php echo $crm_leadsubdetails->leadsubscriptionid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsubdetails_list->RowCnt ?>_crm_leadsubdetails_leadsubscriptionid" class="crm_leadsubdetails_leadsubscriptionid">
<span<?php echo $crm_leadsubdetails->leadsubscriptionid->viewAttributes() ?>>
<?php echo $crm_leadsubdetails->leadsubscriptionid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadsubdetails->website->Visible) { // website ?>
		<td data-name="website"<?php echo $crm_leadsubdetails->website->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsubdetails_list->RowCnt ?>_crm_leadsubdetails_website" class="crm_leadsubdetails_website">
<span<?php echo $crm_leadsubdetails->website->viewAttributes() ?>>
<?php echo $crm_leadsubdetails->website->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_leadsubdetails_list->ListOptions->render("body", "right", $crm_leadsubdetails_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_leadsubdetails->isGridAdd())
		$crm_leadsubdetails_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_leadsubdetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_leadsubdetails_list->Recordset)
	$crm_leadsubdetails_list->Recordset->Close();
?>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_leadsubdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadsubdetails_list->Pager)) $crm_leadsubdetails_list->Pager = new NumericPager($crm_leadsubdetails_list->StartRec, $crm_leadsubdetails_list->DisplayRecs, $crm_leadsubdetails_list->TotalRecs, $crm_leadsubdetails_list->RecRange, $crm_leadsubdetails_list->AutoHidePager) ?>
<?php if ($crm_leadsubdetails_list->Pager->RecordCount > 0 && $crm_leadsubdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadsubdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsubdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadsubdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadsubdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsubdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsubdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsubdetails_list->pageUrl() ?>start=<?php echo $crm_leadsubdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadsubdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadsubdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadsubdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadsubdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadsubdetails_list->TotalRecs > 0 && (!$crm_leadsubdetails_list->AutoHidePageSizeSelector || $crm_leadsubdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadsubdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadsubdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadsubdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadsubdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadsubdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadsubdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadsubdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadsubdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadsubdetails_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_leadsubdetails_list->TotalRecs == 0 && !$crm_leadsubdetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_leadsubdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_leadsubdetails_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_leadsubdetails->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_leadsubdetails", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadsubdetails_list->terminate();
?>