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
$crm_contactsubdetails_list = new crm_contactsubdetails_list();

// Run the page
$crm_contactsubdetails_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactsubdetails_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_contactsubdetailslist = currentForm = new ew.Form("fcrm_contactsubdetailslist", "list");
fcrm_contactsubdetailslist.formKeyCountName = '<?php echo $crm_contactsubdetails_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_contactsubdetailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactsubdetailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_contactsubdetailslistsrch = currentSearchForm = new ew.Form("fcrm_contactsubdetailslistsrch");

// Filters
fcrm_contactsubdetailslistsrch.filterList = <?php echo $crm_contactsubdetails_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_contactsubdetails_list->TotalRecs > 0 && $crm_contactsubdetails_list->ExportOptions->visible()) { ?>
<?php $crm_contactsubdetails_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_contactsubdetails_list->ImportOptions->visible()) { ?>
<?php $crm_contactsubdetails_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_contactsubdetails_list->SearchOptions->visible()) { ?>
<?php $crm_contactsubdetails_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_contactsubdetails_list->FilterOptions->visible()) { ?>
<?php $crm_contactsubdetails_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_contactsubdetails_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_contactsubdetails->isExport() && !$crm_contactsubdetails->CurrentAction) { ?>
<form name="fcrm_contactsubdetailslistsrch" id="fcrm_contactsubdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_contactsubdetails_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_contactsubdetailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_contactsubdetails">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_contactsubdetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_contactsubdetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_contactsubdetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_contactsubdetails_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_contactsubdetails_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_contactsubdetails_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_contactsubdetails_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_contactsubdetails_list->showPageHeader(); ?>
<?php
$crm_contactsubdetails_list->showMessage();
?>
<?php if ($crm_contactsubdetails_list->TotalRecs > 0 || $crm_contactsubdetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_contactsubdetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_contactsubdetails">
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_contactsubdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_contactsubdetails_list->Pager)) $crm_contactsubdetails_list->Pager = new NumericPager($crm_contactsubdetails_list->StartRec, $crm_contactsubdetails_list->DisplayRecs, $crm_contactsubdetails_list->TotalRecs, $crm_contactsubdetails_list->RecRange, $crm_contactsubdetails_list->AutoHidePager) ?>
<?php if ($crm_contactsubdetails_list->Pager->RecordCount > 0 && $crm_contactsubdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_contactsubdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactsubdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_contactsubdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_contactsubdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_contactsubdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactsubdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_contactsubdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_contactsubdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_contactsubdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_contactsubdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_contactsubdetails_list->TotalRecs > 0 && (!$crm_contactsubdetails_list->AutoHidePageSizeSelector || $crm_contactsubdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_contactsubdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_contactsubdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_contactsubdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_contactsubdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_contactsubdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_contactsubdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_contactsubdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_contactsubdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_contactsubdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_contactsubdetailslist" id="fcrm_contactsubdetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactsubdetails_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactsubdetails_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
<div id="gmp_crm_contactsubdetails" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_contactsubdetails_list->TotalRecs > 0 || $crm_contactsubdetails->isGridEdit()) { ?>
<table id="tbl_crm_contactsubdetailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_contactsubdetails_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_contactsubdetails_list->renderListOptions();

// Render list options (header, left)
$crm_contactsubdetails_list->ListOptions->render("header", "left");
?>
<?php if ($crm_contactsubdetails->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
	<?php if ($crm_contactsubdetails->sortUrl($crm_contactsubdetails->contactsubscriptionid) == "") { ?>
		<th data-name="contactsubscriptionid" class="<?php echo $crm_contactsubdetails->contactsubscriptionid->headerCellClass() ?>"><div id="elh_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid"><div class="ew-table-header-caption"><?php echo $crm_contactsubdetails->contactsubscriptionid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contactsubscriptionid" class="<?php echo $crm_contactsubdetails->contactsubscriptionid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactsubdetails->SortUrl($crm_contactsubdetails->contactsubscriptionid) ?>',1);"><div id="elh_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactsubdetails->contactsubscriptionid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactsubdetails->contactsubscriptionid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactsubdetails->contactsubscriptionid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactsubdetails->birthday->Visible) { // birthday ?>
	<?php if ($crm_contactsubdetails->sortUrl($crm_contactsubdetails->birthday) == "") { ?>
		<th data-name="birthday" class="<?php echo $crm_contactsubdetails->birthday->headerCellClass() ?>"><div id="elh_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday"><div class="ew-table-header-caption"><?php echo $crm_contactsubdetails->birthday->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthday" class="<?php echo $crm_contactsubdetails->birthday->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactsubdetails->SortUrl($crm_contactsubdetails->birthday) ?>',1);"><div id="elh_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactsubdetails->birthday->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactsubdetails->birthday->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactsubdetails->birthday->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
	<?php if ($crm_contactsubdetails->sortUrl($crm_contactsubdetails->laststayintouchrequest) == "") { ?>
		<th data-name="laststayintouchrequest" class="<?php echo $crm_contactsubdetails->laststayintouchrequest->headerCellClass() ?>"><div id="elh_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest"><div class="ew-table-header-caption"><?php echo $crm_contactsubdetails->laststayintouchrequest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="laststayintouchrequest" class="<?php echo $crm_contactsubdetails->laststayintouchrequest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactsubdetails->SortUrl($crm_contactsubdetails->laststayintouchrequest) ?>',1);"><div id="elh_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactsubdetails->laststayintouchrequest->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactsubdetails->laststayintouchrequest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactsubdetails->laststayintouchrequest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactsubdetails->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
	<?php if ($crm_contactsubdetails->sortUrl($crm_contactsubdetails->laststayintouchsavedate) == "") { ?>
		<th data-name="laststayintouchsavedate" class="<?php echo $crm_contactsubdetails->laststayintouchsavedate->headerCellClass() ?>"><div id="elh_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate"><div class="ew-table-header-caption"><?php echo $crm_contactsubdetails->laststayintouchsavedate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="laststayintouchsavedate" class="<?php echo $crm_contactsubdetails->laststayintouchsavedate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactsubdetails->SortUrl($crm_contactsubdetails->laststayintouchsavedate) ?>',1);"><div id="elh_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactsubdetails->laststayintouchsavedate->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactsubdetails->laststayintouchsavedate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactsubdetails->laststayintouchsavedate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactsubdetails->leadsource->Visible) { // leadsource ?>
	<?php if ($crm_contactsubdetails->sortUrl($crm_contactsubdetails->leadsource) == "") { ?>
		<th data-name="leadsource" class="<?php echo $crm_contactsubdetails->leadsource->headerCellClass() ?>"><div id="elh_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource"><div class="ew-table-header-caption"><?php echo $crm_contactsubdetails->leadsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadsource" class="<?php echo $crm_contactsubdetails->leadsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactsubdetails->SortUrl($crm_contactsubdetails->leadsource) ?>',1);"><div id="elh_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactsubdetails->leadsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactsubdetails->leadsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactsubdetails->leadsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_contactsubdetails_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_contactsubdetails->ExportAll && $crm_contactsubdetails->isExport()) {
	$crm_contactsubdetails_list->StopRec = $crm_contactsubdetails_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_contactsubdetails_list->TotalRecs > $crm_contactsubdetails_list->StartRec + $crm_contactsubdetails_list->DisplayRecs - 1)
		$crm_contactsubdetails_list->StopRec = $crm_contactsubdetails_list->StartRec + $crm_contactsubdetails_list->DisplayRecs - 1;
	else
		$crm_contactsubdetails_list->StopRec = $crm_contactsubdetails_list->TotalRecs;
}
$crm_contactsubdetails_list->RecCnt = $crm_contactsubdetails_list->StartRec - 1;
if ($crm_contactsubdetails_list->Recordset && !$crm_contactsubdetails_list->Recordset->EOF) {
	$crm_contactsubdetails_list->Recordset->moveFirst();
	$selectLimit = $crm_contactsubdetails_list->UseSelectLimit;
	if (!$selectLimit && $crm_contactsubdetails_list->StartRec > 1)
		$crm_contactsubdetails_list->Recordset->move($crm_contactsubdetails_list->StartRec - 1);
} elseif (!$crm_contactsubdetails->AllowAddDeleteRow && $crm_contactsubdetails_list->StopRec == 0) {
	$crm_contactsubdetails_list->StopRec = $crm_contactsubdetails->GridAddRowCount;
}

// Initialize aggregate
$crm_contactsubdetails->RowType = ROWTYPE_AGGREGATEINIT;
$crm_contactsubdetails->resetAttributes();
$crm_contactsubdetails_list->renderRow();
while ($crm_contactsubdetails_list->RecCnt < $crm_contactsubdetails_list->StopRec) {
	$crm_contactsubdetails_list->RecCnt++;
	if ($crm_contactsubdetails_list->RecCnt >= $crm_contactsubdetails_list->StartRec) {
		$crm_contactsubdetails_list->RowCnt++;

		// Set up key count
		$crm_contactsubdetails_list->KeyCount = $crm_contactsubdetails_list->RowIndex;

		// Init row class and style
		$crm_contactsubdetails->resetAttributes();
		$crm_contactsubdetails->CssClass = "";
		if ($crm_contactsubdetails->isGridAdd()) {
		} else {
			$crm_contactsubdetails_list->loadRowValues($crm_contactsubdetails_list->Recordset); // Load row values
		}
		$crm_contactsubdetails->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_contactsubdetails->RowAttrs = array_merge($crm_contactsubdetails->RowAttrs, array('data-rowindex'=>$crm_contactsubdetails_list->RowCnt, 'id'=>'r' . $crm_contactsubdetails_list->RowCnt . '_crm_contactsubdetails', 'data-rowtype'=>$crm_contactsubdetails->RowType));

		// Render row
		$crm_contactsubdetails_list->renderRow();

		// Render list options
		$crm_contactsubdetails_list->renderListOptions();
?>
	<tr<?php echo $crm_contactsubdetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_contactsubdetails_list->ListOptions->render("body", "left", $crm_contactsubdetails_list->RowCnt);
?>
	<?php if ($crm_contactsubdetails->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
		<td data-name="contactsubscriptionid"<?php echo $crm_contactsubdetails->contactsubscriptionid->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_list->RowCnt ?>_crm_contactsubdetails_contactsubscriptionid" class="crm_contactsubdetails_contactsubscriptionid">
<span<?php echo $crm_contactsubdetails->contactsubscriptionid->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->contactsubscriptionid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactsubdetails->birthday->Visible) { // birthday ?>
		<td data-name="birthday"<?php echo $crm_contactsubdetails->birthday->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_list->RowCnt ?>_crm_contactsubdetails_birthday" class="crm_contactsubdetails_birthday">
<span<?php echo $crm_contactsubdetails->birthday->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->birthday->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactsubdetails->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
		<td data-name="laststayintouchrequest"<?php echo $crm_contactsubdetails->laststayintouchrequest->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_list->RowCnt ?>_crm_contactsubdetails_laststayintouchrequest" class="crm_contactsubdetails_laststayintouchrequest">
<span<?php echo $crm_contactsubdetails->laststayintouchrequest->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->laststayintouchrequest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactsubdetails->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
		<td data-name="laststayintouchsavedate"<?php echo $crm_contactsubdetails->laststayintouchsavedate->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_list->RowCnt ?>_crm_contactsubdetails_laststayintouchsavedate" class="crm_contactsubdetails_laststayintouchsavedate">
<span<?php echo $crm_contactsubdetails->laststayintouchsavedate->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->laststayintouchsavedate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactsubdetails->leadsource->Visible) { // leadsource ?>
		<td data-name="leadsource"<?php echo $crm_contactsubdetails->leadsource->cellAttributes() ?>>
<span id="el<?php echo $crm_contactsubdetails_list->RowCnt ?>_crm_contactsubdetails_leadsource" class="crm_contactsubdetails_leadsource">
<span<?php echo $crm_contactsubdetails->leadsource->viewAttributes() ?>>
<?php echo $crm_contactsubdetails->leadsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_contactsubdetails_list->ListOptions->render("body", "right", $crm_contactsubdetails_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_contactsubdetails->isGridAdd())
		$crm_contactsubdetails_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_contactsubdetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_contactsubdetails_list->Recordset)
	$crm_contactsubdetails_list->Recordset->Close();
?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_contactsubdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_contactsubdetails_list->Pager)) $crm_contactsubdetails_list->Pager = new NumericPager($crm_contactsubdetails_list->StartRec, $crm_contactsubdetails_list->DisplayRecs, $crm_contactsubdetails_list->TotalRecs, $crm_contactsubdetails_list->RecRange, $crm_contactsubdetails_list->AutoHidePager) ?>
<?php if ($crm_contactsubdetails_list->Pager->RecordCount > 0 && $crm_contactsubdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_contactsubdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactsubdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_contactsubdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_contactsubdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_contactsubdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactsubdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactsubdetails_list->pageUrl() ?>start=<?php echo $crm_contactsubdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_contactsubdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_contactsubdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_contactsubdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_contactsubdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_contactsubdetails_list->TotalRecs > 0 && (!$crm_contactsubdetails_list->AutoHidePageSizeSelector || $crm_contactsubdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_contactsubdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_contactsubdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_contactsubdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_contactsubdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_contactsubdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_contactsubdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_contactsubdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_contactsubdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_contactsubdetails_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_contactsubdetails_list->TotalRecs == 0 && !$crm_contactsubdetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_contactsubdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_contactsubdetails_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_contactsubdetails->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_contactsubdetails", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_contactsubdetails_list->terminate();
?>