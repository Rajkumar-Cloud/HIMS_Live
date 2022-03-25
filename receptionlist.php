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
$reception_list = new reception_list();

// Run the page
$reception_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$reception_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$reception->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var freceptionlist = currentForm = new ew.Form("freceptionlist", "list");
freceptionlist.formKeyCountName = '<?php echo $reception_list->FormKeyCountName ?>';

// Form_CustomValidate event
freceptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceptionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
freceptionlist.lists["x_CATEGORY"] = <?php echo $reception_list->CATEGORY->Lookup->toClientList() ?>;
freceptionlist.lists["x_CATEGORY"].options = <?php echo JsonEncode($reception_list->CATEGORY->lookupOptions()) ?>;
freceptionlist.lists["x_PROCEDURE"] = <?php echo $reception_list->PROCEDURE->Lookup->toClientList() ?>;
freceptionlist.lists["x_PROCEDURE"].options = <?php echo JsonEncode($reception_list->PROCEDURE->lookupOptions()) ?>;
freceptionlist.lists["x_MODE_OF_PAYMENT"] = <?php echo $reception_list->MODE_OF_PAYMENT->Lookup->toClientList() ?>;
freceptionlist.lists["x_MODE_OF_PAYMENT"].options = <?php echo JsonEncode($reception_list->MODE_OF_PAYMENT->lookupOptions()) ?>;

// Form object for search
var freceptionlistsrch = currentSearchForm = new ew.Form("freceptionlistsrch");

// Filters
freceptionlistsrch.filterList = <?php echo $reception_list->getFilterList() ?>;
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
<?php if (!$reception->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($reception_list->TotalRecs > 0 && $reception_list->ExportOptions->visible()) { ?>
<?php $reception_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($reception_list->ImportOptions->visible()) { ?>
<?php $reception_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($reception_list->SearchOptions->visible()) { ?>
<?php $reception_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($reception_list->FilterOptions->visible()) { ?>
<?php $reception_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$reception_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$reception->isExport() && !$reception->CurrentAction) { ?>
<form name="freceptionlistsrch" id="freceptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($reception_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="freceptionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="reception">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($reception_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($reception_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $reception_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $reception_list->showPageHeader(); ?>
<?php
$reception_list->showMessage();
?>
<?php if ($reception_list->TotalRecs > 0 || $reception->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($reception_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> reception">
<?php if (!$reception->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$reception->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($reception_list->Pager)) $reception_list->Pager = new NumericPager($reception_list->StartRec, $reception_list->DisplayRecs, $reception_list->TotalRecs, $reception_list->RecRange, $reception_list->AutoHidePager) ?>
<?php if ($reception_list->Pager->RecordCount > 0 && $reception_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($reception_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($reception_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($reception_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $reception_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($reception_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($reception_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($reception_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $reception_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $reception_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $reception_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($reception_list->TotalRecs > 0 && (!$reception_list->AutoHidePageSizeSelector || $reception_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="reception">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($reception_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($reception_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($reception_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($reception_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($reception_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($reception_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($reception->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $reception_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="freceptionlist" id="freceptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($reception_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $reception_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<div id="gmp_reception" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($reception_list->TotalRecs > 0 || $reception->isGridEdit()) { ?>
<table id="tbl_receptionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$reception_list->RowType = ROWTYPE_HEADER;

// Render list options
$reception_list->renderListOptions();

// Render list options (header, left)
$reception_list->ListOptions->render("header", "left");
?>
<?php if ($reception->id->Visible) { // id ?>
	<?php if ($reception->sortUrl($reception->id) == "") { ?>
		<th data-name="id" class="<?php echo $reception->id->headerCellClass() ?>"><div id="elh_reception_id" class="reception_id"><div class="ew-table-header-caption"><?php echo $reception->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $reception->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->id) ?>',1);"><div id="elh_reception_id" class="reception_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->PatientID->Visible) { // PatientID ?>
	<?php if ($reception->sortUrl($reception->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $reception->PatientID->headerCellClass() ?>"><div id="elh_reception_PatientID" class="reception_PatientID"><div class="ew-table-header-caption"><?php echo $reception->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $reception->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->PatientID) ?>',1);"><div id="elh_reception_PatientID" class="reception_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->PatientName->Visible) { // PatientName ?>
	<?php if ($reception->sortUrl($reception->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $reception->PatientName->headerCellClass() ?>"><div id="elh_reception_PatientName" class="reception_PatientName"><div class="ew-table-header-caption"><?php echo $reception->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $reception->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->PatientName) ?>',1);"><div id="elh_reception_PatientName" class="reception_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->OorN->Visible) { // OorN ?>
	<?php if ($reception->sortUrl($reception->OorN) == "") { ?>
		<th data-name="OorN" class="<?php echo $reception->OorN->headerCellClass() ?>"><div id="elh_reception_OorN" class="reception_OorN"><div class="ew-table-header-caption"><?php echo $reception->OorN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OorN" class="<?php echo $reception->OorN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->OorN) ?>',1);"><div id="elh_reception_OorN" class="reception_OorN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->OorN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception->OorN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->OorN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
	<?php if ($reception->sortUrl($reception->PRIMARY_CONSULTANT) == "") { ?>
		<th data-name="PRIMARY_CONSULTANT" class="<?php echo $reception->PRIMARY_CONSULTANT->headerCellClass() ?>"><div id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT"><div class="ew-table-header-caption"><?php echo $reception->PRIMARY_CONSULTANT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRIMARY_CONSULTANT" class="<?php echo $reception->PRIMARY_CONSULTANT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->PRIMARY_CONSULTANT) ?>',1);"><div id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->PRIMARY_CONSULTANT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception->PRIMARY_CONSULTANT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->PRIMARY_CONSULTANT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
	<?php if ($reception->sortUrl($reception->CATEGORY) == "") { ?>
		<th data-name="CATEGORY" class="<?php echo $reception->CATEGORY->headerCellClass() ?>"><div id="elh_reception_CATEGORY" class="reception_CATEGORY"><div class="ew-table-header-caption"><?php echo $reception->CATEGORY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CATEGORY" class="<?php echo $reception->CATEGORY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->CATEGORY) ?>',1);"><div id="elh_reception_CATEGORY" class="reception_CATEGORY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->CATEGORY->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception->CATEGORY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->CATEGORY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($reception->sortUrl($reception->PROCEDURE) == "") { ?>
		<th data-name="PROCEDURE" class="<?php echo $reception->PROCEDURE->headerCellClass() ?>"><div id="elh_reception_PROCEDURE" class="reception_PROCEDURE"><div class="ew-table-header-caption"><?php echo $reception->PROCEDURE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROCEDURE" class="<?php echo $reception->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->PROCEDURE) ?>',1);"><div id="elh_reception_PROCEDURE" class="reception_PROCEDURE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->PROCEDURE->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception->PROCEDURE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->PROCEDURE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->Amount->Visible) { // Amount ?>
	<?php if ($reception->sortUrl($reception->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $reception->Amount->headerCellClass() ?>"><div id="elh_reception_Amount" class="reception_Amount"><div class="ew-table-header-caption"><?php echo $reception->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $reception->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->Amount) ?>',1);"><div id="elh_reception_Amount" class="reception_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->Amount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
	<?php if ($reception->sortUrl($reception->MODE_OF_PAYMENT) == "") { ?>
		<th data-name="MODE_OF_PAYMENT" class="<?php echo $reception->MODE_OF_PAYMENT->headerCellClass() ?>"><div id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT"><div class="ew-table-header-caption"><?php echo $reception->MODE_OF_PAYMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MODE_OF_PAYMENT" class="<?php echo $reception->MODE_OF_PAYMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->MODE_OF_PAYMENT) ?>',1);"><div id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->MODE_OF_PAYMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception->MODE_OF_PAYMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->MODE_OF_PAYMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
	<?php if ($reception->sortUrl($reception->NEXT_REVIEW_DATE) == "") { ?>
		<th data-name="NEXT_REVIEW_DATE" class="<?php echo $reception->NEXT_REVIEW_DATE->headerCellClass() ?>"><div id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE"><div class="ew-table-header-caption"><?php echo $reception->NEXT_REVIEW_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEXT_REVIEW_DATE" class="<?php echo $reception->NEXT_REVIEW_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->NEXT_REVIEW_DATE) ?>',1);"><div id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->NEXT_REVIEW_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception->NEXT_REVIEW_DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->NEXT_REVIEW_DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
	<?php if ($reception->sortUrl($reception->REMARKS) == "") { ?>
		<th data-name="REMARKS" class="<?php echo $reception->REMARKS->headerCellClass() ?>"><div id="elh_reception_REMARKS" class="reception_REMARKS"><div class="ew-table-header-caption"><?php echo $reception->REMARKS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REMARKS" class="<?php echo $reception->REMARKS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $reception->SortUrl($reception->REMARKS) ?>',1);"><div id="elh_reception_REMARKS" class="reception_REMARKS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception->REMARKS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception->REMARKS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($reception->REMARKS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$reception_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($reception->ExportAll && $reception->isExport()) {
	$reception_list->StopRec = $reception_list->TotalRecs;
} else {

	// Set the last record to display
	if ($reception_list->TotalRecs > $reception_list->StartRec + $reception_list->DisplayRecs - 1)
		$reception_list->StopRec = $reception_list->StartRec + $reception_list->DisplayRecs - 1;
	else
		$reception_list->StopRec = $reception_list->TotalRecs;
}
$reception_list->RecCnt = $reception_list->StartRec - 1;
if ($reception_list->Recordset && !$reception_list->Recordset->EOF) {
	$reception_list->Recordset->moveFirst();
	$selectLimit = $reception_list->UseSelectLimit;
	if (!$selectLimit && $reception_list->StartRec > 1)
		$reception_list->Recordset->move($reception_list->StartRec - 1);
} elseif (!$reception->AllowAddDeleteRow && $reception_list->StopRec == 0) {
	$reception_list->StopRec = $reception->GridAddRowCount;
}

// Initialize aggregate
$reception->RowType = ROWTYPE_AGGREGATEINIT;
$reception->resetAttributes();
$reception_list->renderRow();
while ($reception_list->RecCnt < $reception_list->StopRec) {
	$reception_list->RecCnt++;
	if ($reception_list->RecCnt >= $reception_list->StartRec) {
		$reception_list->RowCnt++;

		// Set up key count
		$reception_list->KeyCount = $reception_list->RowIndex;

		// Init row class and style
		$reception->resetAttributes();
		$reception->CssClass = "";
		if ($reception->isGridAdd()) {
		} else {
			$reception_list->loadRowValues($reception_list->Recordset); // Load row values
		}
		$reception->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$reception->RowAttrs = array_merge($reception->RowAttrs, array('data-rowindex'=>$reception_list->RowCnt, 'id'=>'r' . $reception_list->RowCnt . '_reception', 'data-rowtype'=>$reception->RowType));

		// Render row
		$reception_list->renderRow();

		// Render list options
		$reception_list->renderListOptions();
?>
	<tr<?php echo $reception->rowAttributes() ?>>
<?php

// Render list options (body, left)
$reception_list->ListOptions->render("body", "left", $reception_list->RowCnt);
?>
	<?php if ($reception->id->Visible) { // id ?>
		<td data-name="id"<?php echo $reception->id->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_id" class="reception_id">
<span<?php echo $reception->id->viewAttributes() ?>>
<?php echo $reception->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $reception->PatientID->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_PatientID" class="reception_PatientID">
<span<?php echo $reception->PatientID->viewAttributes() ?>>
<?php echo $reception->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $reception->PatientName->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_PatientName" class="reception_PatientName">
<span<?php echo $reception->PatientName->viewAttributes() ?>>
<?php echo $reception->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->OorN->Visible) { // OorN ?>
		<td data-name="OorN"<?php echo $reception->OorN->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_OorN" class="reception_OorN">
<span<?php echo $reception->OorN->viewAttributes() ?>>
<?php echo $reception->OorN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<td data-name="PRIMARY_CONSULTANT"<?php echo $reception->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT">
<span<?php echo $reception->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?php echo $reception->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
		<td data-name="CATEGORY"<?php echo $reception->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_CATEGORY" class="reception_CATEGORY">
<span<?php echo $reception->CATEGORY->viewAttributes() ?>>
<?php echo $reception->CATEGORY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
		<td data-name="PROCEDURE"<?php echo $reception->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_PROCEDURE" class="reception_PROCEDURE">
<span<?php echo $reception->PROCEDURE->viewAttributes() ?>>
<?php echo $reception->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $reception->Amount->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_Amount" class="reception_Amount">
<span<?php echo $reception->Amount->viewAttributes() ?>>
<?php echo $reception->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<td data-name="MODE_OF_PAYMENT"<?php echo $reception->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT">
<span<?php echo $reception->MODE_OF_PAYMENT->viewAttributes() ?>>
<?php echo $reception->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<td data-name="NEXT_REVIEW_DATE"<?php echo $reception->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE">
<span<?php echo $reception->NEXT_REVIEW_DATE->viewAttributes() ?>>
<?php echo $reception->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
		<td data-name="REMARKS"<?php echo $reception->REMARKS->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCnt ?>_reception_REMARKS" class="reception_REMARKS">
<span<?php echo $reception->REMARKS->viewAttributes() ?>>
<?php echo $reception->REMARKS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$reception_list->ListOptions->render("body", "right", $reception_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$reception->isGridAdd())
		$reception_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$reception->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($reception_list->Recordset)
	$reception_list->Recordset->Close();
?>
<?php if (!$reception->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$reception->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($reception_list->Pager)) $reception_list->Pager = new NumericPager($reception_list->StartRec, $reception_list->DisplayRecs, $reception_list->TotalRecs, $reception_list->RecRange, $reception_list->AutoHidePager) ?>
<?php if ($reception_list->Pager->RecordCount > 0 && $reception_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($reception_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($reception_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($reception_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $reception_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($reception_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($reception_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $reception_list->pageUrl() ?>start=<?php echo $reception_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($reception_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $reception_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $reception_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $reception_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($reception_list->TotalRecs > 0 && (!$reception_list->AutoHidePageSizeSelector || $reception_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="reception">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($reception_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($reception_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($reception_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($reception_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($reception_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($reception_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($reception->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $reception_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($reception_list->TotalRecs == 0 && !$reception->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $reception_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$reception_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$reception->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$reception->isExport()) { ?>
<script>
ew.scrollableTable("gmp_reception", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$reception_list->terminate();
?>