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
$bankbranches_list = new bankbranches_list();

// Run the page
$bankbranches_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bankbranches_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$bankbranches->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbankbrancheslist = currentForm = new ew.Form("fbankbrancheslist", "list");
fbankbrancheslist.formKeyCountName = '<?php echo $bankbranches_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbankbrancheslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbankbrancheslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fbankbrancheslistsrch = currentSearchForm = new ew.Form("fbankbrancheslistsrch");

// Filters
fbankbrancheslistsrch.filterList = <?php echo $bankbranches_list->getFilterList() ?>;
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
<?php if (!$bankbranches->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bankbranches_list->TotalRecs > 0 && $bankbranches_list->ExportOptions->visible()) { ?>
<?php $bankbranches_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bankbranches_list->ImportOptions->visible()) { ?>
<?php $bankbranches_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bankbranches_list->SearchOptions->visible()) { ?>
<?php $bankbranches_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bankbranches_list->FilterOptions->visible()) { ?>
<?php $bankbranches_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bankbranches_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bankbranches->isExport() && !$bankbranches->CurrentAction) { ?>
<form name="fbankbrancheslistsrch" id="fbankbrancheslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($bankbranches_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbankbrancheslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bankbranches">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($bankbranches_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($bankbranches_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bankbranches_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $bankbranches_list->showPageHeader(); ?>
<?php
$bankbranches_list->showMessage();
?>
<?php if ($bankbranches_list->TotalRecs > 0 || $bankbranches->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bankbranches_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bankbranches">
<?php if (!$bankbranches->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bankbranches->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($bankbranches_list->Pager)) $bankbranches_list->Pager = new NumericPager($bankbranches_list->StartRec, $bankbranches_list->DisplayRecs, $bankbranches_list->TotalRecs, $bankbranches_list->RecRange, $bankbranches_list->AutoHidePager) ?>
<?php if ($bankbranches_list->Pager->RecordCount > 0 && $bankbranches_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($bankbranches_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($bankbranches_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($bankbranches_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $bankbranches_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($bankbranches_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($bankbranches_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($bankbranches_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $bankbranches_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $bankbranches_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $bankbranches_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($bankbranches_list->TotalRecs > 0 && (!$bankbranches_list->AutoHidePageSizeSelector || $bankbranches_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="bankbranches">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($bankbranches_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($bankbranches_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($bankbranches_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($bankbranches_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($bankbranches_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($bankbranches_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($bankbranches->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bankbranches_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbankbrancheslist" id="fbankbrancheslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($bankbranches_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $bankbranches_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<div id="gmp_bankbranches" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($bankbranches_list->TotalRecs > 0 || $bankbranches->isGridEdit()) { ?>
<table id="tbl_bankbrancheslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bankbranches_list->RowType = ROWTYPE_HEADER;

// Render list options
$bankbranches_list->renderListOptions();

// Render list options (header, left)
$bankbranches_list->ListOptions->render("header", "left");
?>
<?php if ($bankbranches->id->Visible) { // id ?>
	<?php if ($bankbranches->sortUrl($bankbranches->id) == "") { ?>
		<th data-name="id" class="<?php echo $bankbranches->id->headerCellClass() ?>"><div id="elh_bankbranches_id" class="bankbranches_id"><div class="ew-table-header-caption"><?php echo $bankbranches->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $bankbranches->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->id) ?>',1);"><div id="elh_bankbranches_id" class="bankbranches_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
	<?php if ($bankbranches->sortUrl($bankbranches->Branch_Name) == "") { ?>
		<th data-name="Branch_Name" class="<?php echo $bankbranches->Branch_Name->headerCellClass() ?>"><div id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name"><div class="ew-table-header-caption"><?php echo $bankbranches->Branch_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch_Name" class="<?php echo $bankbranches->Branch_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->Branch_Name) ?>',1);"><div id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->Branch_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->Branch_Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->Branch_Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
	<?php if ($bankbranches->sortUrl($bankbranches->Street_Address) == "") { ?>
		<th data-name="Street_Address" class="<?php echo $bankbranches->Street_Address->headerCellClass() ?>"><div id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address"><div class="ew-table-header-caption"><?php echo $bankbranches->Street_Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Street_Address" class="<?php echo $bankbranches->Street_Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->Street_Address) ?>',1);"><div id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->Street_Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->Street_Address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->Street_Address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->City->Visible) { // City ?>
	<?php if ($bankbranches->sortUrl($bankbranches->City) == "") { ?>
		<th data-name="City" class="<?php echo $bankbranches->City->headerCellClass() ?>"><div id="elh_bankbranches_City" class="bankbranches_City"><div class="ew-table-header-caption"><?php echo $bankbranches->City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="City" class="<?php echo $bankbranches->City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->City) ?>',1);"><div id="elh_bankbranches_City" class="bankbranches_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->City->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->City->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->State->Visible) { // State ?>
	<?php if ($bankbranches->sortUrl($bankbranches->State) == "") { ?>
		<th data-name="State" class="<?php echo $bankbranches->State->headerCellClass() ?>"><div id="elh_bankbranches_State" class="bankbranches_State"><div class="ew-table-header-caption"><?php echo $bankbranches->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $bankbranches->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->State) ?>',1);"><div id="elh_bankbranches_State" class="bankbranches_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
	<?php if ($bankbranches->sortUrl($bankbranches->Zipcode) == "") { ?>
		<th data-name="Zipcode" class="<?php echo $bankbranches->Zipcode->headerCellClass() ?>"><div id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode"><div class="ew-table-header-caption"><?php echo $bankbranches->Zipcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Zipcode" class="<?php echo $bankbranches->Zipcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->Zipcode) ?>',1);"><div id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->Zipcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->Zipcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->Zipcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
	<?php if ($bankbranches->sortUrl($bankbranches->Phone_Number) == "") { ?>
		<th data-name="Phone_Number" class="<?php echo $bankbranches->Phone_Number->headerCellClass() ?>"><div id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number"><div class="ew-table-header-caption"><?php echo $bankbranches->Phone_Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone_Number" class="<?php echo $bankbranches->Phone_Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->Phone_Number) ?>',1);"><div id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->Phone_Number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->Phone_Number->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->Phone_Number->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
	<?php if ($bankbranches->sortUrl($bankbranches->AccountNo) == "") { ?>
		<th data-name="AccountNo" class="<?php echo $bankbranches->AccountNo->headerCellClass() ?>"><div id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo"><div class="ew-table-header-caption"><?php echo $bankbranches->AccountNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNo" class="<?php echo $bankbranches->AccountNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $bankbranches->SortUrl($bankbranches->AccountNo) ?>',1);"><div id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches->AccountNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches->AccountNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($bankbranches->AccountNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bankbranches_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bankbranches->ExportAll && $bankbranches->isExport()) {
	$bankbranches_list->StopRec = $bankbranches_list->TotalRecs;
} else {

	// Set the last record to display
	if ($bankbranches_list->TotalRecs > $bankbranches_list->StartRec + $bankbranches_list->DisplayRecs - 1)
		$bankbranches_list->StopRec = $bankbranches_list->StartRec + $bankbranches_list->DisplayRecs - 1;
	else
		$bankbranches_list->StopRec = $bankbranches_list->TotalRecs;
}
$bankbranches_list->RecCnt = $bankbranches_list->StartRec - 1;
if ($bankbranches_list->Recordset && !$bankbranches_list->Recordset->EOF) {
	$bankbranches_list->Recordset->moveFirst();
	$selectLimit = $bankbranches_list->UseSelectLimit;
	if (!$selectLimit && $bankbranches_list->StartRec > 1)
		$bankbranches_list->Recordset->move($bankbranches_list->StartRec - 1);
} elseif (!$bankbranches->AllowAddDeleteRow && $bankbranches_list->StopRec == 0) {
	$bankbranches_list->StopRec = $bankbranches->GridAddRowCount;
}

// Initialize aggregate
$bankbranches->RowType = ROWTYPE_AGGREGATEINIT;
$bankbranches->resetAttributes();
$bankbranches_list->renderRow();
while ($bankbranches_list->RecCnt < $bankbranches_list->StopRec) {
	$bankbranches_list->RecCnt++;
	if ($bankbranches_list->RecCnt >= $bankbranches_list->StartRec) {
		$bankbranches_list->RowCnt++;

		// Set up key count
		$bankbranches_list->KeyCount = $bankbranches_list->RowIndex;

		// Init row class and style
		$bankbranches->resetAttributes();
		$bankbranches->CssClass = "";
		if ($bankbranches->isGridAdd()) {
		} else {
			$bankbranches_list->loadRowValues($bankbranches_list->Recordset); // Load row values
		}
		$bankbranches->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bankbranches->RowAttrs = array_merge($bankbranches->RowAttrs, array('data-rowindex'=>$bankbranches_list->RowCnt, 'id'=>'r' . $bankbranches_list->RowCnt . '_bankbranches', 'data-rowtype'=>$bankbranches->RowType));

		// Render row
		$bankbranches_list->renderRow();

		// Render list options
		$bankbranches_list->renderListOptions();
?>
	<tr<?php echo $bankbranches->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bankbranches_list->ListOptions->render("body", "left", $bankbranches_list->RowCnt);
?>
	<?php if ($bankbranches->id->Visible) { // id ?>
		<td data-name="id"<?php echo $bankbranches->id->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_id" class="bankbranches_id">
<span<?php echo $bankbranches->id->viewAttributes() ?>>
<?php echo $bankbranches->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
		<td data-name="Branch_Name"<?php echo $bankbranches->Branch_Name->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_Branch_Name" class="bankbranches_Branch_Name">
<span<?php echo $bankbranches->Branch_Name->viewAttributes() ?>>
<?php echo $bankbranches->Branch_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
		<td data-name="Street_Address"<?php echo $bankbranches->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_Street_Address" class="bankbranches_Street_Address">
<span<?php echo $bankbranches->Street_Address->viewAttributes() ?>>
<?php echo $bankbranches->Street_Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->City->Visible) { // City ?>
		<td data-name="City"<?php echo $bankbranches->City->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_City" class="bankbranches_City">
<span<?php echo $bankbranches->City->viewAttributes() ?>>
<?php echo $bankbranches->City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->State->Visible) { // State ?>
		<td data-name="State"<?php echo $bankbranches->State->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_State" class="bankbranches_State">
<span<?php echo $bankbranches->State->viewAttributes() ?>>
<?php echo $bankbranches->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
		<td data-name="Zipcode"<?php echo $bankbranches->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_Zipcode" class="bankbranches_Zipcode">
<span<?php echo $bankbranches->Zipcode->viewAttributes() ?>>
<?php echo $bankbranches->Zipcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
		<td data-name="Phone_Number"<?php echo $bankbranches->Phone_Number->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_Phone_Number" class="bankbranches_Phone_Number">
<span<?php echo $bankbranches->Phone_Number->viewAttributes() ?>>
<?php echo $bankbranches->Phone_Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
		<td data-name="AccountNo"<?php echo $bankbranches->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCnt ?>_bankbranches_AccountNo" class="bankbranches_AccountNo">
<span<?php echo $bankbranches->AccountNo->viewAttributes() ?>>
<?php echo $bankbranches->AccountNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bankbranches_list->ListOptions->render("body", "right", $bankbranches_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$bankbranches->isGridAdd())
		$bankbranches_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$bankbranches->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bankbranches_list->Recordset)
	$bankbranches_list->Recordset->Close();
?>
<?php if (!$bankbranches->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$bankbranches->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($bankbranches_list->Pager)) $bankbranches_list->Pager = new NumericPager($bankbranches_list->StartRec, $bankbranches_list->DisplayRecs, $bankbranches_list->TotalRecs, $bankbranches_list->RecRange, $bankbranches_list->AutoHidePager) ?>
<?php if ($bankbranches_list->Pager->RecordCount > 0 && $bankbranches_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($bankbranches_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($bankbranches_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($bankbranches_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $bankbranches_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($bankbranches_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($bankbranches_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $bankbranches_list->pageUrl() ?>start=<?php echo $bankbranches_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($bankbranches_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $bankbranches_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $bankbranches_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $bankbranches_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($bankbranches_list->TotalRecs > 0 && (!$bankbranches_list->AutoHidePageSizeSelector || $bankbranches_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="bankbranches">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($bankbranches_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($bankbranches_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($bankbranches_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($bankbranches_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($bankbranches_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($bankbranches_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($bankbranches->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bankbranches_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bankbranches_list->TotalRecs == 0 && !$bankbranches->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bankbranches_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bankbranches_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$bankbranches->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$bankbranches->isExport()) { ?>
<script>
ew.scrollableTable("gmp_bankbranches", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$bankbranches_list->terminate();
?>