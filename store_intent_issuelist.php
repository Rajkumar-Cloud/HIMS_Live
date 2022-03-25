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
$store_intent_issue_list = new store_intent_issue_list();

// Run the page
$store_intent_issue_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_intent_issue_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_intent_issue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_intent_issuelist = currentForm = new ew.Form("fstore_intent_issuelist", "list");
fstore_intent_issuelist.formKeyCountName = '<?php echo $store_intent_issue_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_intent_issuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_intent_issuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_intent_issuelistsrch = currentSearchForm = new ew.Form("fstore_intent_issuelistsrch");

// Filters
fstore_intent_issuelistsrch.filterList = <?php echo $store_intent_issue_list->getFilterList() ?>;
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
<?php if (!$store_intent_issue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_intent_issue_list->TotalRecs > 0 && $store_intent_issue_list->ExportOptions->visible()) { ?>
<?php $store_intent_issue_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_intent_issue_list->ImportOptions->visible()) { ?>
<?php $store_intent_issue_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_intent_issue_list->SearchOptions->visible()) { ?>
<?php $store_intent_issue_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_intent_issue_list->FilterOptions->visible()) { ?>
<?php $store_intent_issue_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_intent_issue_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_intent_issue->isExport() && !$store_intent_issue->CurrentAction) { ?>
<form name="fstore_intent_issuelistsrch" id="fstore_intent_issuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_intent_issue_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_intent_issuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_intent_issue">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_intent_issue_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_intent_issue_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_intent_issue_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_intent_issue_list->showPageHeader(); ?>
<?php
$store_intent_issue_list->showMessage();
?>
<?php if ($store_intent_issue_list->TotalRecs > 0 || $store_intent_issue->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_intent_issue_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_intent_issue">
<?php if (!$store_intent_issue->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_intent_issue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_intent_issue_list->Pager)) $store_intent_issue_list->Pager = new NumericPager($store_intent_issue_list->StartRec, $store_intent_issue_list->DisplayRecs, $store_intent_issue_list->TotalRecs, $store_intent_issue_list->RecRange, $store_intent_issue_list->AutoHidePager) ?>
<?php if ($store_intent_issue_list->Pager->RecordCount > 0 && $store_intent_issue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_intent_issue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_intent_issue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_intent_issue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_intent_issue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_intent_issue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_intent_issue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_intent_issue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_intent_issue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_intent_issue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_intent_issue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_intent_issue_list->TotalRecs > 0 && (!$store_intent_issue_list->AutoHidePageSizeSelector || $store_intent_issue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_intent_issue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_intent_issue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_intent_issue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_intent_issue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_intent_issue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_intent_issue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_intent_issue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_intent_issue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_intent_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_intent_issuelist" id="fstore_intent_issuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_intent_issue_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_intent_issue_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<div id="gmp_store_intent_issue" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_intent_issue_list->TotalRecs > 0 || $store_intent_issue->isGridEdit()) { ?>
<table id="tbl_store_intent_issuelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_intent_issue_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_intent_issue_list->renderListOptions();

// Render list options (header, left)
$store_intent_issue_list->ListOptions->render("header", "left");
?>
<?php if ($store_intent_issue->id->Visible) { // id ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_intent_issue->id->headerCellClass() ?>"><div id="elh_store_intent_issue_id" class="store_intent_issue_id"><div class="ew-table-header-caption"><?php echo $store_intent_issue->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_intent_issue->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->id) ?>',1);"><div id="elh_store_intent_issue_id" class="store_intent_issue_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Reception->Visible) { // Reception ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $store_intent_issue->Reception->headerCellClass() ?>"><div id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $store_intent_issue->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Reception) ?>',1);"><div id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->PatientId->Visible) { // PatientId ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $store_intent_issue->PatientId->headerCellClass() ?>"><div id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId"><div class="ew-table-header-caption"><?php echo $store_intent_issue->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $store_intent_issue->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->PatientId) ?>',1);"><div id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->mrnno->Visible) { // mrnno ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $store_intent_issue->mrnno->headerCellClass() ?>"><div id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno"><div class="ew-table-header-caption"><?php echo $store_intent_issue->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $store_intent_issue->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->mrnno) ?>',1);"><div id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->PatientName->Visible) { // PatientName ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $store_intent_issue->PatientName->headerCellClass() ?>"><div id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName"><div class="ew-table-header-caption"><?php echo $store_intent_issue->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $store_intent_issue->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->PatientName) ?>',1);"><div id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Age->Visible) { // Age ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $store_intent_issue->Age->headerCellClass() ?>"><div id="elh_store_intent_issue_Age" class="store_intent_issue_Age"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $store_intent_issue->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Age) ?>',1);"><div id="elh_store_intent_issue_Age" class="store_intent_issue_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Gender->Visible) { // Gender ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $store_intent_issue->Gender->headerCellClass() ?>"><div id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $store_intent_issue->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Gender) ?>',1);"><div id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Mobile->Visible) { // Mobile ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $store_intent_issue->Mobile->headerCellClass() ?>"><div id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $store_intent_issue->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Mobile) ?>',1);"><div id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->IP_OP->Visible) { // IP_OP ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $store_intent_issue->IP_OP->headerCellClass() ?>"><div id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP"><div class="ew-table-header-caption"><?php echo $store_intent_issue->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $store_intent_issue->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->IP_OP) ?>',1);"><div id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Doctor->Visible) { // Doctor ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $store_intent_issue->Doctor->headerCellClass() ?>"><div id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $store_intent_issue->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Doctor) ?>',1);"><div id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->voucher_type->Visible) { // voucher_type ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $store_intent_issue->voucher_type->headerCellClass() ?>"><div id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type"><div class="ew-table-header-caption"><?php echo $store_intent_issue->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $store_intent_issue->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->voucher_type) ?>',1);"><div id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Details->Visible) { // Details ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $store_intent_issue->Details->headerCellClass() ?>"><div id="elh_store_intent_issue_Details" class="store_intent_issue_Details"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $store_intent_issue->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Details) ?>',1);"><div id="elh_store_intent_issue_Details" class="store_intent_issue_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $store_intent_issue->ModeofPayment->headerCellClass() ?>"><div id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment"><div class="ew-table-header-caption"><?php echo $store_intent_issue->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $store_intent_issue->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->ModeofPayment) ?>',1);"><div id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Amount->Visible) { // Amount ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $store_intent_issue->Amount->headerCellClass() ?>"><div id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $store_intent_issue->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Amount) ?>',1);"><div id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->AnyDues->Visible) { // AnyDues ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $store_intent_issue->AnyDues->headerCellClass() ?>"><div id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues"><div class="ew-table-header-caption"><?php echo $store_intent_issue->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $store_intent_issue->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->AnyDues) ?>',1);"><div id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->createdby->Visible) { // createdby ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $store_intent_issue->createdby->headerCellClass() ?>"><div id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby"><div class="ew-table-header-caption"><?php echo $store_intent_issue->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $store_intent_issue->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->createdby) ?>',1);"><div id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->createddatetime->Visible) { // createddatetime ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $store_intent_issue->createddatetime->headerCellClass() ?>"><div id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime"><div class="ew-table-header-caption"><?php echo $store_intent_issue->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $store_intent_issue->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->createddatetime) ?>',1);"><div id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->modifiedby->Visible) { // modifiedby ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $store_intent_issue->modifiedby->headerCellClass() ?>"><div id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby"><div class="ew-table-header-caption"><?php echo $store_intent_issue->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $store_intent_issue->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->modifiedby) ?>',1);"><div id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_intent_issue->modifieddatetime->headerCellClass() ?>"><div id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime"><div class="ew-table-header-caption"><?php echo $store_intent_issue->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_intent_issue->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->modifieddatetime) ?>',1);"><div id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $store_intent_issue->RealizationAmount->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $store_intent_issue->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RealizationAmount) ?>',1);"><div id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $store_intent_issue->RealizationStatus->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $store_intent_issue->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RealizationStatus) ?>',1);"><div id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RealizationStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RealizationStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $store_intent_issue->RealizationRemarks->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $store_intent_issue->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RealizationRemarks) ?>',1);"><div id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RealizationRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RealizationRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $store_intent_issue->RealizationBatchNo->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $store_intent_issue->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RealizationBatchNo) ?>',1);"><div id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RealizationBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RealizationBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $store_intent_issue->RealizationDate->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $store_intent_issue->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RealizationDate) ?>',1);"><div id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RealizationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RealizationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->HospID->Visible) { // HospID ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_intent_issue->HospID->headerCellClass() ?>"><div id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID"><div class="ew-table-header-caption"><?php echo $store_intent_issue->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_intent_issue->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->HospID) ?>',1);"><div id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RIDNO->Visible) { // RIDNO ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $store_intent_issue->RIDNO->headerCellClass() ?>"><div id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $store_intent_issue->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RIDNO) ?>',1);"><div id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->TidNo->Visible) { // TidNo ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $store_intent_issue->TidNo->headerCellClass() ?>"><div id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo"><div class="ew-table-header-caption"><?php echo $store_intent_issue->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $store_intent_issue->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->TidNo) ?>',1);"><div id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->CId->Visible) { // CId ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $store_intent_issue->CId->headerCellClass() ?>"><div id="elh_store_intent_issue_CId" class="store_intent_issue_CId"><div class="ew-table-header-caption"><?php echo $store_intent_issue->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $store_intent_issue->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->CId) ?>',1);"><div id="elh_store_intent_issue_CId" class="store_intent_issue_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->PartnerName->Visible) { // PartnerName ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $store_intent_issue->PartnerName->headerCellClass() ?>"><div id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName"><div class="ew-table-header-caption"><?php echo $store_intent_issue->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $store_intent_issue->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->PartnerName) ?>',1);"><div id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->PayerType->Visible) { // PayerType ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $store_intent_issue->PayerType->headerCellClass() ?>"><div id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType"><div class="ew-table-header-caption"><?php echo $store_intent_issue->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $store_intent_issue->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->PayerType) ?>',1);"><div id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->PayerType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->PayerType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Dob->Visible) { // Dob ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $store_intent_issue->Dob->headerCellClass() ?>"><div id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $store_intent_issue->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Dob) ?>',1);"><div id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Currency->Visible) { // Currency ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $store_intent_issue->Currency->headerCellClass() ?>"><div id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $store_intent_issue->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Currency) ?>',1);"><div id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $store_intent_issue->DiscountRemarks->headerCellClass() ?>"><div id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $store_intent_issue->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $store_intent_issue->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->DiscountRemarks) ?>',1);"><div id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->DiscountRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->DiscountRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->Remarks->Visible) { // Remarks ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $store_intent_issue->Remarks->headerCellClass() ?>"><div id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks"><div class="ew-table-header-caption"><?php echo $store_intent_issue->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $store_intent_issue->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->Remarks) ?>',1);"><div id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->PatId->Visible) { // PatId ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $store_intent_issue->PatId->headerCellClass() ?>"><div id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId"><div class="ew-table-header-caption"><?php echo $store_intent_issue->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $store_intent_issue->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->PatId) ?>',1);"><div id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $store_intent_issue->DrDepartment->headerCellClass() ?>"><div id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment"><div class="ew-table-header-caption"><?php echo $store_intent_issue->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $store_intent_issue->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->DrDepartment) ?>',1);"><div id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $store_intent_issue->RefferedBy->headerCellClass() ?>"><div id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy"><div class="ew-table-header-caption"><?php echo $store_intent_issue->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $store_intent_issue->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->RefferedBy) ?>',1);"><div id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->BillNumber->Visible) { // BillNumber ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $store_intent_issue->BillNumber->headerCellClass() ?>"><div id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber"><div class="ew-table-header-caption"><?php echo $store_intent_issue->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $store_intent_issue->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->BillNumber) ?>',1);"><div id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->CardNumber->Visible) { // CardNumber ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $store_intent_issue->CardNumber->headerCellClass() ?>"><div id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber"><div class="ew-table-header-caption"><?php echo $store_intent_issue->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $store_intent_issue->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->CardNumber) ?>',1);"><div id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->BankName->Visible) { // BankName ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $store_intent_issue->BankName->headerCellClass() ?>"><div id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName"><div class="ew-table-header-caption"><?php echo $store_intent_issue->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $store_intent_issue->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->BankName) ?>',1);"><div id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->DrID->Visible) { // DrID ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $store_intent_issue->DrID->headerCellClass() ?>"><div id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID"><div class="ew-table-header-caption"><?php echo $store_intent_issue->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $store_intent_issue->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->DrID) ?>',1);"><div id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->BillStatus->Visible) { // BillStatus ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $store_intent_issue->BillStatus->headerCellClass() ?>"><div id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus"><div class="ew-table-header-caption"><?php echo $store_intent_issue->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $store_intent_issue->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->BillStatus) ?>',1);"><div id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->BillStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->BillStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $store_intent_issue->ReportHeader->headerCellClass() ?>"><div id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader"><div class="ew-table-header-caption"><?php echo $store_intent_issue->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $store_intent_issue->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->ReportHeader) ?>',1);"><div id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->StoreID->Visible) { // StoreID ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_intent_issue->StoreID->headerCellClass() ?>"><div id="elh_store_intent_issue_StoreID" class="store_intent_issue_StoreID"><div class="ew-table-header-caption"><?php echo $store_intent_issue->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_intent_issue->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->StoreID) ?>',1);"><div id="elh_store_intent_issue_StoreID" class="store_intent_issue_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue->BranchID->Visible) { // BranchID ?>
	<?php if ($store_intent_issue->sortUrl($store_intent_issue->BranchID) == "") { ?>
		<th data-name="BranchID" class="<?php echo $store_intent_issue->BranchID->headerCellClass() ?>"><div id="elh_store_intent_issue_BranchID" class="store_intent_issue_BranchID"><div class="ew-table-header-caption"><?php echo $store_intent_issue->BranchID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchID" class="<?php echo $store_intent_issue->BranchID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_intent_issue->SortUrl($store_intent_issue->BranchID) ?>',1);"><div id="elh_store_intent_issue_BranchID" class="store_intent_issue_BranchID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue->BranchID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue->BranchID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_intent_issue->BranchID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_intent_issue_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_intent_issue->ExportAll && $store_intent_issue->isExport()) {
	$store_intent_issue_list->StopRec = $store_intent_issue_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_intent_issue_list->TotalRecs > $store_intent_issue_list->StartRec + $store_intent_issue_list->DisplayRecs - 1)
		$store_intent_issue_list->StopRec = $store_intent_issue_list->StartRec + $store_intent_issue_list->DisplayRecs - 1;
	else
		$store_intent_issue_list->StopRec = $store_intent_issue_list->TotalRecs;
}
$store_intent_issue_list->RecCnt = $store_intent_issue_list->StartRec - 1;
if ($store_intent_issue_list->Recordset && !$store_intent_issue_list->Recordset->EOF) {
	$store_intent_issue_list->Recordset->moveFirst();
	$selectLimit = $store_intent_issue_list->UseSelectLimit;
	if (!$selectLimit && $store_intent_issue_list->StartRec > 1)
		$store_intent_issue_list->Recordset->move($store_intent_issue_list->StartRec - 1);
} elseif (!$store_intent_issue->AllowAddDeleteRow && $store_intent_issue_list->StopRec == 0) {
	$store_intent_issue_list->StopRec = $store_intent_issue->GridAddRowCount;
}

// Initialize aggregate
$store_intent_issue->RowType = ROWTYPE_AGGREGATEINIT;
$store_intent_issue->resetAttributes();
$store_intent_issue_list->renderRow();
while ($store_intent_issue_list->RecCnt < $store_intent_issue_list->StopRec) {
	$store_intent_issue_list->RecCnt++;
	if ($store_intent_issue_list->RecCnt >= $store_intent_issue_list->StartRec) {
		$store_intent_issue_list->RowCnt++;

		// Set up key count
		$store_intent_issue_list->KeyCount = $store_intent_issue_list->RowIndex;

		// Init row class and style
		$store_intent_issue->resetAttributes();
		$store_intent_issue->CssClass = "";
		if ($store_intent_issue->isGridAdd()) {
		} else {
			$store_intent_issue_list->loadRowValues($store_intent_issue_list->Recordset); // Load row values
		}
		$store_intent_issue->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_intent_issue->RowAttrs = array_merge($store_intent_issue->RowAttrs, array('data-rowindex'=>$store_intent_issue_list->RowCnt, 'id'=>'r' . $store_intent_issue_list->RowCnt . '_store_intent_issue', 'data-rowtype'=>$store_intent_issue->RowType));

		// Render row
		$store_intent_issue_list->renderRow();

		// Render list options
		$store_intent_issue_list->renderListOptions();
?>
	<tr<?php echo $store_intent_issue->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_intent_issue_list->ListOptions->render("body", "left", $store_intent_issue_list->RowCnt);
?>
	<?php if ($store_intent_issue->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_intent_issue->id->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_id" class="store_intent_issue_id">
<span<?php echo $store_intent_issue->id->viewAttributes() ?>>
<?php echo $store_intent_issue->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $store_intent_issue->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Reception" class="store_intent_issue_Reception">
<span<?php echo $store_intent_issue->Reception->viewAttributes() ?>>
<?php echo $store_intent_issue->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $store_intent_issue->PatientId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_PatientId" class="store_intent_issue_PatientId">
<span<?php echo $store_intent_issue->PatientId->viewAttributes() ?>>
<?php echo $store_intent_issue->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $store_intent_issue->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_mrnno" class="store_intent_issue_mrnno">
<span<?php echo $store_intent_issue->mrnno->viewAttributes() ?>>
<?php echo $store_intent_issue->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $store_intent_issue->PatientName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_PatientName" class="store_intent_issue_PatientName">
<span<?php echo $store_intent_issue->PatientName->viewAttributes() ?>>
<?php echo $store_intent_issue->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $store_intent_issue->Age->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Age" class="store_intent_issue_Age">
<span<?php echo $store_intent_issue->Age->viewAttributes() ?>>
<?php echo $store_intent_issue->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $store_intent_issue->Gender->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Gender" class="store_intent_issue_Gender">
<span<?php echo $store_intent_issue->Gender->viewAttributes() ?>>
<?php echo $store_intent_issue->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $store_intent_issue->Mobile->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Mobile" class="store_intent_issue_Mobile">
<span<?php echo $store_intent_issue->Mobile->viewAttributes() ?>>
<?php echo $store_intent_issue->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $store_intent_issue->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP">
<span<?php echo $store_intent_issue->IP_OP->viewAttributes() ?>>
<?php echo $store_intent_issue->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $store_intent_issue->Doctor->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Doctor" class="store_intent_issue_Doctor">
<span<?php echo $store_intent_issue->Doctor->viewAttributes() ?>>
<?php echo $store_intent_issue->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $store_intent_issue->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type">
<span<?php echo $store_intent_issue->voucher_type->viewAttributes() ?>>
<?php echo $store_intent_issue->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $store_intent_issue->Details->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Details" class="store_intent_issue_Details">
<span<?php echo $store_intent_issue->Details->viewAttributes() ?>>
<?php echo $store_intent_issue->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $store_intent_issue->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment">
<span<?php echo $store_intent_issue->ModeofPayment->viewAttributes() ?>>
<?php echo $store_intent_issue->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $store_intent_issue->Amount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Amount" class="store_intent_issue_Amount">
<span<?php echo $store_intent_issue->Amount->viewAttributes() ?>>
<?php echo $store_intent_issue->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $store_intent_issue->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues">
<span<?php echo $store_intent_issue->AnyDues->viewAttributes() ?>>
<?php echo $store_intent_issue->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $store_intent_issue->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_createdby" class="store_intent_issue_createdby">
<span<?php echo $store_intent_issue->createdby->viewAttributes() ?>>
<?php echo $store_intent_issue->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $store_intent_issue->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime">
<span<?php echo $store_intent_issue->createddatetime->viewAttributes() ?>>
<?php echo $store_intent_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $store_intent_issue->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby">
<span<?php echo $store_intent_issue->modifiedby->viewAttributes() ?>>
<?php echo $store_intent_issue->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $store_intent_issue->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime">
<span<?php echo $store_intent_issue->modifieddatetime->viewAttributes() ?>>
<?php echo $store_intent_issue->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $store_intent_issue->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount">
<span<?php echo $store_intent_issue->RealizationAmount->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus"<?php echo $store_intent_issue->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus">
<span<?php echo $store_intent_issue->RealizationStatus->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks"<?php echo $store_intent_issue->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks">
<span<?php echo $store_intent_issue->RealizationRemarks->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo"<?php echo $store_intent_issue->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo">
<span<?php echo $store_intent_issue->RealizationBatchNo->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate"<?php echo $store_intent_issue->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate">
<span<?php echo $store_intent_issue->RealizationDate->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_intent_issue->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_HospID" class="store_intent_issue_HospID">
<span<?php echo $store_intent_issue->HospID->viewAttributes() ?>>
<?php echo $store_intent_issue->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $store_intent_issue->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO">
<span<?php echo $store_intent_issue->RIDNO->viewAttributes() ?>>
<?php echo $store_intent_issue->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $store_intent_issue->TidNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_TidNo" class="store_intent_issue_TidNo">
<span<?php echo $store_intent_issue->TidNo->viewAttributes() ?>>
<?php echo $store_intent_issue->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $store_intent_issue->CId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_CId" class="store_intent_issue_CId">
<span<?php echo $store_intent_issue->CId->viewAttributes() ?>>
<?php echo $store_intent_issue->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $store_intent_issue->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName">
<span<?php echo $store_intent_issue->PartnerName->viewAttributes() ?>>
<?php echo $store_intent_issue->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType"<?php echo $store_intent_issue->PayerType->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_PayerType" class="store_intent_issue_PayerType">
<span<?php echo $store_intent_issue->PayerType->viewAttributes() ?>>
<?php echo $store_intent_issue->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Dob->Visible) { // Dob ?>
		<td data-name="Dob"<?php echo $store_intent_issue->Dob->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Dob" class="store_intent_issue_Dob">
<span<?php echo $store_intent_issue->Dob->viewAttributes() ?>>
<?php echo $store_intent_issue->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $store_intent_issue->Currency->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Currency" class="store_intent_issue_Currency">
<span<?php echo $store_intent_issue->Currency->viewAttributes() ?>>
<?php echo $store_intent_issue->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks"<?php echo $store_intent_issue->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks">
<span<?php echo $store_intent_issue->DiscountRemarks->viewAttributes() ?>>
<?php echo $store_intent_issue->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $store_intent_issue->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_Remarks" class="store_intent_issue_Remarks">
<span<?php echo $store_intent_issue->Remarks->viewAttributes() ?>>
<?php echo $store_intent_issue->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $store_intent_issue->PatId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_PatId" class="store_intent_issue_PatId">
<span<?php echo $store_intent_issue->PatId->viewAttributes() ?>>
<?php echo $store_intent_issue->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $store_intent_issue->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment">
<span<?php echo $store_intent_issue->DrDepartment->viewAttributes() ?>>
<?php echo $store_intent_issue->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $store_intent_issue->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy">
<span<?php echo $store_intent_issue->RefferedBy->viewAttributes() ?>>
<?php echo $store_intent_issue->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $store_intent_issue->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber">
<span<?php echo $store_intent_issue->BillNumber->viewAttributes() ?>>
<?php echo $store_intent_issue->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $store_intent_issue->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber">
<span<?php echo $store_intent_issue->CardNumber->viewAttributes() ?>>
<?php echo $store_intent_issue->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $store_intent_issue->BankName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_BankName" class="store_intent_issue_BankName">
<span<?php echo $store_intent_issue->BankName->viewAttributes() ?>>
<?php echo $store_intent_issue->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $store_intent_issue->DrID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_DrID" class="store_intent_issue_DrID">
<span<?php echo $store_intent_issue->DrID->viewAttributes() ?>>
<?php echo $store_intent_issue->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus"<?php echo $store_intent_issue->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus">
<span<?php echo $store_intent_issue->BillStatus->viewAttributes() ?>>
<?php echo $store_intent_issue->BillStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $store_intent_issue->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader">
<span<?php echo $store_intent_issue->ReportHeader->viewAttributes() ?>>
<?php echo $store_intent_issue->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_intent_issue->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_StoreID" class="store_intent_issue_StoreID">
<span<?php echo $store_intent_issue->StoreID->viewAttributes() ?>>
<?php echo $store_intent_issue->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID"<?php echo $store_intent_issue->BranchID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCnt ?>_store_intent_issue_BranchID" class="store_intent_issue_BranchID">
<span<?php echo $store_intent_issue->BranchID->viewAttributes() ?>>
<?php echo $store_intent_issue->BranchID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_intent_issue_list->ListOptions->render("body", "right", $store_intent_issue_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_intent_issue->isGridAdd())
		$store_intent_issue_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_intent_issue->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_intent_issue_list->Recordset)
	$store_intent_issue_list->Recordset->Close();
?>
<?php if (!$store_intent_issue->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_intent_issue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_intent_issue_list->Pager)) $store_intent_issue_list->Pager = new NumericPager($store_intent_issue_list->StartRec, $store_intent_issue_list->DisplayRecs, $store_intent_issue_list->TotalRecs, $store_intent_issue_list->RecRange, $store_intent_issue_list->AutoHidePager) ?>
<?php if ($store_intent_issue_list->Pager->RecordCount > 0 && $store_intent_issue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_intent_issue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_intent_issue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_intent_issue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_intent_issue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_intent_issue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_intent_issue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_intent_issue_list->pageUrl() ?>start=<?php echo $store_intent_issue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_intent_issue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_intent_issue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_intent_issue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_intent_issue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_intent_issue_list->TotalRecs > 0 && (!$store_intent_issue_list->AutoHidePageSizeSelector || $store_intent_issue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_intent_issue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_intent_issue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_intent_issue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_intent_issue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_intent_issue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_intent_issue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_intent_issue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_intent_issue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_intent_issue_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_intent_issue_list->TotalRecs == 0 && !$store_intent_issue->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_intent_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_intent_issue_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_intent_issue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_intent_issue->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_intent_issue", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_intent_issue_list->terminate();
?>