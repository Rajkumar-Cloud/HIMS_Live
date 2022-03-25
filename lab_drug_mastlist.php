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
$lab_drug_mast_list = new lab_drug_mast_list();

// Run the page
$lab_drug_mast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_drug_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_drug_mastlist = currentForm = new ew.Form("flab_drug_mastlist", "list");
flab_drug_mastlist.formKeyCountName = '<?php echo $lab_drug_mast_list->FormKeyCountName ?>';

// Form_CustomValidate event
flab_drug_mastlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_drug_mastlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_drug_mastlistsrch = currentSearchForm = new ew.Form("flab_drug_mastlistsrch");

// Filters
flab_drug_mastlistsrch.filterList = <?php echo $lab_drug_mast_list->getFilterList() ?>;
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
<?php if (!$lab_drug_mast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_drug_mast_list->TotalRecs > 0 && $lab_drug_mast_list->ExportOptions->visible()) { ?>
<?php $lab_drug_mast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_drug_mast_list->ImportOptions->visible()) { ?>
<?php $lab_drug_mast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_drug_mast_list->SearchOptions->visible()) { ?>
<?php $lab_drug_mast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_drug_mast_list->FilterOptions->visible()) { ?>
<?php $lab_drug_mast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_drug_mast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_drug_mast->isExport() && !$lab_drug_mast->CurrentAction) { ?>
<form name="flab_drug_mastlistsrch" id="flab_drug_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_drug_mast_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_drug_mastlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_drug_mast">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_drug_mast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_drug_mast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_drug_mast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_drug_mast_list->showPageHeader(); ?>
<?php
$lab_drug_mast_list->showMessage();
?>
<?php if ($lab_drug_mast_list->TotalRecs > 0 || $lab_drug_mast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_drug_mast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_drug_mast">
<?php if (!$lab_drug_mast->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_drug_mast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_drug_mast_list->Pager)) $lab_drug_mast_list->Pager = new NumericPager($lab_drug_mast_list->StartRec, $lab_drug_mast_list->DisplayRecs, $lab_drug_mast_list->TotalRecs, $lab_drug_mast_list->RecRange, $lab_drug_mast_list->AutoHidePager) ?>
<?php if ($lab_drug_mast_list->Pager->RecordCount > 0 && $lab_drug_mast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_drug_mast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_drug_mast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_drug_mast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_drug_mast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_drug_mast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_drug_mast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_drug_mast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_drug_mast_list->TotalRecs > 0 && (!$lab_drug_mast_list->AutoHidePageSizeSelector || $lab_drug_mast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_drug_mast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_drug_mast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_drug_mast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_drug_mast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_drug_mast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_drug_mast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_drug_mast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_drug_mast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_drug_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_drug_mastlist" id="flab_drug_mastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_drug_mast_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_drug_mast_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<div id="gmp_lab_drug_mast" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_drug_mast_list->TotalRecs > 0 || $lab_drug_mast->isGridEdit()) { ?>
<table id="tbl_lab_drug_mastlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_drug_mast_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_drug_mast_list->renderListOptions();

// Render list options (header, left)
$lab_drug_mast_list->ListOptions->render("header", "left");
?>
<?php if ($lab_drug_mast->DrugName->Visible) { // DrugName ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->DrugName) == "") { ?>
		<th data-name="DrugName" class="<?php echo $lab_drug_mast->DrugName->headerCellClass() ?>"><div id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->DrugName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrugName" class="<?php echo $lab_drug_mast->DrugName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->DrugName) ?>',1);"><div id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->DrugName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->DrugName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->DrugName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->Positive->Visible) { // Positive ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->Positive) == "") { ?>
		<th data-name="Positive" class="<?php echo $lab_drug_mast->Positive->headerCellClass() ?>"><div id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->Positive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Positive" class="<?php echo $lab_drug_mast->Positive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->Positive) ?>',1);"><div id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->Positive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->Positive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->Positive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->Negative->Visible) { // Negative ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->Negative) == "") { ?>
		<th data-name="Negative" class="<?php echo $lab_drug_mast->Negative->headerCellClass() ?>"><div id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->Negative->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Negative" class="<?php echo $lab_drug_mast->Negative->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->Negative) ?>',1);"><div id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->Negative->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->Negative->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->Negative->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->ShortName->Visible) { // ShortName ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->ShortName) == "") { ?>
		<th data-name="ShortName" class="<?php echo $lab_drug_mast->ShortName->headerCellClass() ?>"><div id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->ShortName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShortName" class="<?php echo $lab_drug_mast->ShortName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->ShortName) ?>',1);"><div id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->ShortName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->ShortName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->ShortName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->GroupCD->Visible) { // GroupCD ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->GroupCD) == "") { ?>
		<th data-name="GroupCD" class="<?php echo $lab_drug_mast->GroupCD->headerCellClass() ?>"><div id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->GroupCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupCD" class="<?php echo $lab_drug_mast->GroupCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->GroupCD) ?>',1);"><div id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->GroupCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->GroupCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->GroupCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->Content->Visible) { // Content ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->Content) == "") { ?>
		<th data-name="Content" class="<?php echo $lab_drug_mast->Content->headerCellClass() ?>"><div id="elh_lab_drug_mast_Content" class="lab_drug_mast_Content"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->Content->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Content" class="<?php echo $lab_drug_mast->Content->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->Content) ?>',1);"><div id="elh_lab_drug_mast_Content" class="lab_drug_mast_Content">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->Content->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->Content->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->Content->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->Order->Visible) { // Order ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $lab_drug_mast->Order->headerCellClass() ?>"><div id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $lab_drug_mast->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->Order) ?>',1);"><div id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->DrugCD->Visible) { // DrugCD ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->DrugCD) == "") { ?>
		<th data-name="DrugCD" class="<?php echo $lab_drug_mast->DrugCD->headerCellClass() ?>"><div id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->DrugCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrugCD" class="<?php echo $lab_drug_mast->DrugCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->DrugCD) ?>',1);"><div id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->DrugCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->DrugCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->DrugCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast->id->Visible) { // id ?>
	<?php if ($lab_drug_mast->sortUrl($lab_drug_mast->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_drug_mast->id->headerCellClass() ?>"><div id="elh_lab_drug_mast_id" class="lab_drug_mast_id"><div class="ew-table-header-caption"><?php echo $lab_drug_mast->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_drug_mast->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_drug_mast->SortUrl($lab_drug_mast->id) ?>',1);"><div id="elh_lab_drug_mast_id" class="lab_drug_mast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_drug_mast->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_drug_mast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_drug_mast->ExportAll && $lab_drug_mast->isExport()) {
	$lab_drug_mast_list->StopRec = $lab_drug_mast_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_drug_mast_list->TotalRecs > $lab_drug_mast_list->StartRec + $lab_drug_mast_list->DisplayRecs - 1)
		$lab_drug_mast_list->StopRec = $lab_drug_mast_list->StartRec + $lab_drug_mast_list->DisplayRecs - 1;
	else
		$lab_drug_mast_list->StopRec = $lab_drug_mast_list->TotalRecs;
}
$lab_drug_mast_list->RecCnt = $lab_drug_mast_list->StartRec - 1;
if ($lab_drug_mast_list->Recordset && !$lab_drug_mast_list->Recordset->EOF) {
	$lab_drug_mast_list->Recordset->moveFirst();
	$selectLimit = $lab_drug_mast_list->UseSelectLimit;
	if (!$selectLimit && $lab_drug_mast_list->StartRec > 1)
		$lab_drug_mast_list->Recordset->move($lab_drug_mast_list->StartRec - 1);
} elseif (!$lab_drug_mast->AllowAddDeleteRow && $lab_drug_mast_list->StopRec == 0) {
	$lab_drug_mast_list->StopRec = $lab_drug_mast->GridAddRowCount;
}

// Initialize aggregate
$lab_drug_mast->RowType = ROWTYPE_AGGREGATEINIT;
$lab_drug_mast->resetAttributes();
$lab_drug_mast_list->renderRow();
while ($lab_drug_mast_list->RecCnt < $lab_drug_mast_list->StopRec) {
	$lab_drug_mast_list->RecCnt++;
	if ($lab_drug_mast_list->RecCnt >= $lab_drug_mast_list->StartRec) {
		$lab_drug_mast_list->RowCnt++;

		// Set up key count
		$lab_drug_mast_list->KeyCount = $lab_drug_mast_list->RowIndex;

		// Init row class and style
		$lab_drug_mast->resetAttributes();
		$lab_drug_mast->CssClass = "";
		if ($lab_drug_mast->isGridAdd()) {
		} else {
			$lab_drug_mast_list->loadRowValues($lab_drug_mast_list->Recordset); // Load row values
		}
		$lab_drug_mast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_drug_mast->RowAttrs = array_merge($lab_drug_mast->RowAttrs, array('data-rowindex'=>$lab_drug_mast_list->RowCnt, 'id'=>'r' . $lab_drug_mast_list->RowCnt . '_lab_drug_mast', 'data-rowtype'=>$lab_drug_mast->RowType));

		// Render row
		$lab_drug_mast_list->renderRow();

		// Render list options
		$lab_drug_mast_list->renderListOptions();
?>
	<tr<?php echo $lab_drug_mast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_drug_mast_list->ListOptions->render("body", "left", $lab_drug_mast_list->RowCnt);
?>
	<?php if ($lab_drug_mast->DrugName->Visible) { // DrugName ?>
		<td data-name="DrugName"<?php echo $lab_drug_mast->DrugName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName">
<span<?php echo $lab_drug_mast->DrugName->viewAttributes() ?>>
<?php echo $lab_drug_mast->DrugName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->Positive->Visible) { // Positive ?>
		<td data-name="Positive"<?php echo $lab_drug_mast->Positive->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_Positive" class="lab_drug_mast_Positive">
<span<?php echo $lab_drug_mast->Positive->viewAttributes() ?>>
<?php echo $lab_drug_mast->Positive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->Negative->Visible) { // Negative ?>
		<td data-name="Negative"<?php echo $lab_drug_mast->Negative->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_Negative" class="lab_drug_mast_Negative">
<span<?php echo $lab_drug_mast->Negative->viewAttributes() ?>>
<?php echo $lab_drug_mast->Negative->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->ShortName->Visible) { // ShortName ?>
		<td data-name="ShortName"<?php echo $lab_drug_mast->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName">
<span<?php echo $lab_drug_mast->ShortName->viewAttributes() ?>>
<?php echo $lab_drug_mast->ShortName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->GroupCD->Visible) { // GroupCD ?>
		<td data-name="GroupCD"<?php echo $lab_drug_mast->GroupCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD">
<span<?php echo $lab_drug_mast->GroupCD->viewAttributes() ?>>
<?php echo $lab_drug_mast->GroupCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->Content->Visible) { // Content ?>
		<td data-name="Content"<?php echo $lab_drug_mast->Content->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_Content" class="lab_drug_mast_Content">
<span<?php echo $lab_drug_mast->Content->viewAttributes() ?>>
<?php echo $lab_drug_mast->Content->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $lab_drug_mast->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_Order" class="lab_drug_mast_Order">
<span<?php echo $lab_drug_mast->Order->viewAttributes() ?>>
<?php echo $lab_drug_mast->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->DrugCD->Visible) { // DrugCD ?>
		<td data-name="DrugCD"<?php echo $lab_drug_mast->DrugCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD">
<span<?php echo $lab_drug_mast->DrugCD->viewAttributes() ?>>
<?php echo $lab_drug_mast->DrugCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_drug_mast->id->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCnt ?>_lab_drug_mast_id" class="lab_drug_mast_id">
<span<?php echo $lab_drug_mast->id->viewAttributes() ?>>
<?php echo $lab_drug_mast->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_drug_mast_list->ListOptions->render("body", "right", $lab_drug_mast_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$lab_drug_mast->isGridAdd())
		$lab_drug_mast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$lab_drug_mast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_drug_mast_list->Recordset)
	$lab_drug_mast_list->Recordset->Close();
?>
<?php if (!$lab_drug_mast->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_drug_mast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_drug_mast_list->Pager)) $lab_drug_mast_list->Pager = new NumericPager($lab_drug_mast_list->StartRec, $lab_drug_mast_list->DisplayRecs, $lab_drug_mast_list->TotalRecs, $lab_drug_mast_list->RecRange, $lab_drug_mast_list->AutoHidePager) ?>
<?php if ($lab_drug_mast_list->Pager->RecordCount > 0 && $lab_drug_mast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_drug_mast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_drug_mast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_drug_mast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_drug_mast_list->pageUrl() ?>start=<?php echo $lab_drug_mast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_drug_mast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_drug_mast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_drug_mast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_drug_mast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_drug_mast_list->TotalRecs > 0 && (!$lab_drug_mast_list->AutoHidePageSizeSelector || $lab_drug_mast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_drug_mast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_drug_mast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_drug_mast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_drug_mast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_drug_mast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_drug_mast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_drug_mast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_drug_mast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_drug_mast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_drug_mast_list->TotalRecs == 0 && !$lab_drug_mast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_drug_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_drug_mast_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_drug_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_drug_mast->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_drug_mast", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_drug_mast_list->terminate();
?>