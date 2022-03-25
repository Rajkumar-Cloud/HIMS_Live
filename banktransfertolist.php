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
$banktransferto_list = new banktransferto_list();

// Run the page
$banktransferto_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$banktransferto->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbanktransfertolist = currentForm = new ew.Form("fbanktransfertolist", "list");
fbanktransfertolist.formKeyCountName = '<?php echo $banktransferto_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbanktransfertolist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbanktransfertolist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fbanktransfertolistsrch = currentSearchForm = new ew.Form("fbanktransfertolistsrch");

// Filters
fbanktransfertolistsrch.filterList = <?php echo $banktransferto_list->getFilterList() ?>;
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
<?php if (!$banktransferto->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($banktransferto_list->TotalRecs > 0 && $banktransferto_list->ExportOptions->visible()) { ?>
<?php $banktransferto_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($banktransferto_list->ImportOptions->visible()) { ?>
<?php $banktransferto_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($banktransferto_list->SearchOptions->visible()) { ?>
<?php $banktransferto_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($banktransferto_list->FilterOptions->visible()) { ?>
<?php $banktransferto_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$banktransferto_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$banktransferto->isExport() && !$banktransferto->CurrentAction) { ?>
<form name="fbanktransfertolistsrch" id="fbanktransfertolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($banktransferto_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbanktransfertolistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="banktransferto">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($banktransferto_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($banktransferto_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $banktransferto_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $banktransferto_list->showPageHeader(); ?>
<?php
$banktransferto_list->showMessage();
?>
<?php if ($banktransferto_list->TotalRecs > 0 || $banktransferto->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($banktransferto_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> banktransferto">
<?php if (!$banktransferto->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$banktransferto->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($banktransferto_list->Pager)) $banktransferto_list->Pager = new NumericPager($banktransferto_list->StartRec, $banktransferto_list->DisplayRecs, $banktransferto_list->TotalRecs, $banktransferto_list->RecRange, $banktransferto_list->AutoHidePager) ?>
<?php if ($banktransferto_list->Pager->RecordCount > 0 && $banktransferto_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($banktransferto_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($banktransferto_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($banktransferto_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $banktransferto_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($banktransferto_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($banktransferto_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($banktransferto_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $banktransferto_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $banktransferto_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $banktransferto_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($banktransferto_list->TotalRecs > 0 && (!$banktransferto_list->AutoHidePageSizeSelector || $banktransferto_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="banktransferto">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($banktransferto_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($banktransferto_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($banktransferto_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($banktransferto_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($banktransferto_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($banktransferto_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($banktransferto->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $banktransferto_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbanktransfertolist" id="fbanktransfertolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($banktransferto_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $banktransferto_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<div id="gmp_banktransferto" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($banktransferto_list->TotalRecs > 0 || $banktransferto->isGridEdit()) { ?>
<table id="tbl_banktransfertolist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$banktransferto_list->RowType = ROWTYPE_HEADER;

// Render list options
$banktransferto_list->renderListOptions();

// Render list options (header, left)
$banktransferto_list->ListOptions->render("header", "left");
?>
<?php if ($banktransferto->id->Visible) { // id ?>
	<?php if ($banktransferto->sortUrl($banktransferto->id) == "") { ?>
		<th data-name="id" class="<?php echo $banktransferto->id->headerCellClass() ?>"><div id="elh_banktransferto_id" class="banktransferto_id"><div class="ew-table-header-caption"><?php echo $banktransferto->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $banktransferto->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->id) ?>',1);"><div id="elh_banktransferto_id" class="banktransferto_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->Name->Visible) { // Name ?>
	<?php if ($banktransferto->sortUrl($banktransferto->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $banktransferto->Name->headerCellClass() ?>"><div id="elh_banktransferto_Name" class="banktransferto_Name"><div class="ew-table-header-caption"><?php echo $banktransferto->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $banktransferto->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->Name) ?>',1);"><div id="elh_banktransferto_Name" class="banktransferto_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->Street_Address->Visible) { // Street_Address ?>
	<?php if ($banktransferto->sortUrl($banktransferto->Street_Address) == "") { ?>
		<th data-name="Street_Address" class="<?php echo $banktransferto->Street_Address->headerCellClass() ?>"><div id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address"><div class="ew-table-header-caption"><?php echo $banktransferto->Street_Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Street_Address" class="<?php echo $banktransferto->Street_Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->Street_Address) ?>',1);"><div id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->Street_Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->Street_Address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->Street_Address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->City->Visible) { // City ?>
	<?php if ($banktransferto->sortUrl($banktransferto->City) == "") { ?>
		<th data-name="City" class="<?php echo $banktransferto->City->headerCellClass() ?>"><div id="elh_banktransferto_City" class="banktransferto_City"><div class="ew-table-header-caption"><?php echo $banktransferto->City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="City" class="<?php echo $banktransferto->City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->City) ?>',1);"><div id="elh_banktransferto_City" class="banktransferto_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->City->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->City->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->State->Visible) { // State ?>
	<?php if ($banktransferto->sortUrl($banktransferto->State) == "") { ?>
		<th data-name="State" class="<?php echo $banktransferto->State->headerCellClass() ?>"><div id="elh_banktransferto_State" class="banktransferto_State"><div class="ew-table-header-caption"><?php echo $banktransferto->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $banktransferto->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->State) ?>',1);"><div id="elh_banktransferto_State" class="banktransferto_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->Zipcode->Visible) { // Zipcode ?>
	<?php if ($banktransferto->sortUrl($banktransferto->Zipcode) == "") { ?>
		<th data-name="Zipcode" class="<?php echo $banktransferto->Zipcode->headerCellClass() ?>"><div id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode"><div class="ew-table-header-caption"><?php echo $banktransferto->Zipcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Zipcode" class="<?php echo $banktransferto->Zipcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->Zipcode) ?>',1);"><div id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->Zipcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->Zipcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->Zipcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->Mobile_Number->Visible) { // Mobile_Number ?>
	<?php if ($banktransferto->sortUrl($banktransferto->Mobile_Number) == "") { ?>
		<th data-name="Mobile_Number" class="<?php echo $banktransferto->Mobile_Number->headerCellClass() ?>"><div id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number"><div class="ew-table-header-caption"><?php echo $banktransferto->Mobile_Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile_Number" class="<?php echo $banktransferto->Mobile_Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->Mobile_Number) ?>',1);"><div id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->Mobile_Number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->Mobile_Number->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->Mobile_Number->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto->AccountNo->Visible) { // AccountNo ?>
	<?php if ($banktransferto->sortUrl($banktransferto->AccountNo) == "") { ?>
		<th data-name="AccountNo" class="<?php echo $banktransferto->AccountNo->headerCellClass() ?>"><div id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo"><div class="ew-table-header-caption"><?php echo $banktransferto->AccountNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNo" class="<?php echo $banktransferto->AccountNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $banktransferto->SortUrl($banktransferto->AccountNo) ?>',1);"><div id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto->AccountNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto->AccountNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($banktransferto->AccountNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$banktransferto_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($banktransferto->ExportAll && $banktransferto->isExport()) {
	$banktransferto_list->StopRec = $banktransferto_list->TotalRecs;
} else {

	// Set the last record to display
	if ($banktransferto_list->TotalRecs > $banktransferto_list->StartRec + $banktransferto_list->DisplayRecs - 1)
		$banktransferto_list->StopRec = $banktransferto_list->StartRec + $banktransferto_list->DisplayRecs - 1;
	else
		$banktransferto_list->StopRec = $banktransferto_list->TotalRecs;
}
$banktransferto_list->RecCnt = $banktransferto_list->StartRec - 1;
if ($banktransferto_list->Recordset && !$banktransferto_list->Recordset->EOF) {
	$banktransferto_list->Recordset->moveFirst();
	$selectLimit = $banktransferto_list->UseSelectLimit;
	if (!$selectLimit && $banktransferto_list->StartRec > 1)
		$banktransferto_list->Recordset->move($banktransferto_list->StartRec - 1);
} elseif (!$banktransferto->AllowAddDeleteRow && $banktransferto_list->StopRec == 0) {
	$banktransferto_list->StopRec = $banktransferto->GridAddRowCount;
}

// Initialize aggregate
$banktransferto->RowType = ROWTYPE_AGGREGATEINIT;
$banktransferto->resetAttributes();
$banktransferto_list->renderRow();
while ($banktransferto_list->RecCnt < $banktransferto_list->StopRec) {
	$banktransferto_list->RecCnt++;
	if ($banktransferto_list->RecCnt >= $banktransferto_list->StartRec) {
		$banktransferto_list->RowCnt++;

		// Set up key count
		$banktransferto_list->KeyCount = $banktransferto_list->RowIndex;

		// Init row class and style
		$banktransferto->resetAttributes();
		$banktransferto->CssClass = "";
		if ($banktransferto->isGridAdd()) {
		} else {
			$banktransferto_list->loadRowValues($banktransferto_list->Recordset); // Load row values
		}
		$banktransferto->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$banktransferto->RowAttrs = array_merge($banktransferto->RowAttrs, array('data-rowindex'=>$banktransferto_list->RowCnt, 'id'=>'r' . $banktransferto_list->RowCnt . '_banktransferto', 'data-rowtype'=>$banktransferto->RowType));

		// Render row
		$banktransferto_list->renderRow();

		// Render list options
		$banktransferto_list->renderListOptions();
?>
	<tr<?php echo $banktransferto->rowAttributes() ?>>
<?php

// Render list options (body, left)
$banktransferto_list->ListOptions->render("body", "left", $banktransferto_list->RowCnt);
?>
	<?php if ($banktransferto->id->Visible) { // id ?>
		<td data-name="id"<?php echo $banktransferto->id->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_id" class="banktransferto_id">
<span<?php echo $banktransferto->id->viewAttributes() ?>>
<?php echo $banktransferto->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $banktransferto->Name->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_Name" class="banktransferto_Name">
<span<?php echo $banktransferto->Name->viewAttributes() ?>>
<?php echo $banktransferto->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->Street_Address->Visible) { // Street_Address ?>
		<td data-name="Street_Address"<?php echo $banktransferto->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_Street_Address" class="banktransferto_Street_Address">
<span<?php echo $banktransferto->Street_Address->viewAttributes() ?>>
<?php echo $banktransferto->Street_Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->City->Visible) { // City ?>
		<td data-name="City"<?php echo $banktransferto->City->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_City" class="banktransferto_City">
<span<?php echo $banktransferto->City->viewAttributes() ?>>
<?php echo $banktransferto->City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->State->Visible) { // State ?>
		<td data-name="State"<?php echo $banktransferto->State->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_State" class="banktransferto_State">
<span<?php echo $banktransferto->State->viewAttributes() ?>>
<?php echo $banktransferto->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->Zipcode->Visible) { // Zipcode ?>
		<td data-name="Zipcode"<?php echo $banktransferto->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_Zipcode" class="banktransferto_Zipcode">
<span<?php echo $banktransferto->Zipcode->viewAttributes() ?>>
<?php echo $banktransferto->Zipcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->Mobile_Number->Visible) { // Mobile_Number ?>
		<td data-name="Mobile_Number"<?php echo $banktransferto->Mobile_Number->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number">
<span<?php echo $banktransferto->Mobile_Number->viewAttributes() ?>>
<?php echo $banktransferto->Mobile_Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto->AccountNo->Visible) { // AccountNo ?>
		<td data-name="AccountNo"<?php echo $banktransferto->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCnt ?>_banktransferto_AccountNo" class="banktransferto_AccountNo">
<span<?php echo $banktransferto->AccountNo->viewAttributes() ?>>
<?php echo $banktransferto->AccountNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$banktransferto_list->ListOptions->render("body", "right", $banktransferto_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$banktransferto->isGridAdd())
		$banktransferto_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$banktransferto->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($banktransferto_list->Recordset)
	$banktransferto_list->Recordset->Close();
?>
<?php if (!$banktransferto->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$banktransferto->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($banktransferto_list->Pager)) $banktransferto_list->Pager = new NumericPager($banktransferto_list->StartRec, $banktransferto_list->DisplayRecs, $banktransferto_list->TotalRecs, $banktransferto_list->RecRange, $banktransferto_list->AutoHidePager) ?>
<?php if ($banktransferto_list->Pager->RecordCount > 0 && $banktransferto_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($banktransferto_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($banktransferto_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($banktransferto_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $banktransferto_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($banktransferto_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($banktransferto_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $banktransferto_list->pageUrl() ?>start=<?php echo $banktransferto_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($banktransferto_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $banktransferto_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $banktransferto_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $banktransferto_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($banktransferto_list->TotalRecs > 0 && (!$banktransferto_list->AutoHidePageSizeSelector || $banktransferto_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="banktransferto">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($banktransferto_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($banktransferto_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($banktransferto_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($banktransferto_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($banktransferto_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($banktransferto_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($banktransferto->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $banktransferto_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($banktransferto_list->TotalRecs == 0 && !$banktransferto->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $banktransferto_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$banktransferto_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$banktransferto->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$banktransferto->isExport()) { ?>
<script>
ew.scrollableTable("gmp_banktransferto", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$banktransferto_list->terminate();
?>