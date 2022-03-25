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
$lab_test_master_list = new lab_test_master_list();

// Run the page
$lab_test_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_master_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_test_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_test_masterlist = currentForm = new ew.Form("flab_test_masterlist", "list");
flab_test_masterlist.formKeyCountName = '<?php echo $lab_test_master_list->FormKeyCountName ?>';

// Form_CustomValidate event
flab_test_masterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_test_masterlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_test_masterlistsrch = currentSearchForm = new ew.Form("flab_test_masterlistsrch");

// Filters
flab_test_masterlistsrch.filterList = <?php echo $lab_test_master_list->getFilterList() ?>;
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
<?php if (!$lab_test_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_test_master_list->TotalRecs > 0 && $lab_test_master_list->ExportOptions->visible()) { ?>
<?php $lab_test_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_master_list->ImportOptions->visible()) { ?>
<?php $lab_test_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_master_list->SearchOptions->visible()) { ?>
<?php $lab_test_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_master_list->FilterOptions->visible()) { ?>
<?php $lab_test_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_test_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_test_master->isExport() && !$lab_test_master->CurrentAction) { ?>
<form name="flab_test_masterlistsrch" id="flab_test_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_test_master_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_test_masterlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_master">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_test_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_test_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_test_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_test_master_list->showPageHeader(); ?>
<?php
$lab_test_master_list->showMessage();
?>
<?php if ($lab_test_master_list->TotalRecs > 0 || $lab_test_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_test_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_master">
<?php if (!$lab_test_master->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_test_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_test_master_list->Pager)) $lab_test_master_list->Pager = new NumericPager($lab_test_master_list->StartRec, $lab_test_master_list->DisplayRecs, $lab_test_master_list->TotalRecs, $lab_test_master_list->RecRange, $lab_test_master_list->AutoHidePager) ?>
<?php if ($lab_test_master_list->Pager->RecordCount > 0 && $lab_test_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_test_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_test_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_test_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_test_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_test_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_test_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_test_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_test_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_test_master_list->TotalRecs > 0 && (!$lab_test_master_list->AutoHidePageSizeSelector || $lab_test_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_test_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_test_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_test_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_test_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_test_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_test_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_test_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_test_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_test_masterlist" id="flab_test_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_test_master_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_test_master_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<div id="gmp_lab_test_master" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_test_master_list->TotalRecs > 0 || $lab_test_master->isGridEdit()) { ?>
<table id="tbl_lab_test_masterlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_test_master_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_test_master_list->renderListOptions();

// Render list options (header, left)
$lab_test_master_list->ListOptions->render("header", "left");
?>
<?php if ($lab_test_master->id->Visible) { // id ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_test_master->id->headerCellClass() ?>"><div id="elh_lab_test_master_id" class="lab_test_master_id"><div class="ew-table-header-caption"><?php echo $lab_test_master->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_test_master->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->id) ?>',1);"><div id="elh_lab_test_master_id" class="lab_test_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->MainDeptCd->Visible) { // MainDeptCd ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->MainDeptCd) == "") { ?>
		<th data-name="MainDeptCd" class="<?php echo $lab_test_master->MainDeptCd->headerCellClass() ?>"><div id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd"><div class="ew-table-header-caption"><?php echo $lab_test_master->MainDeptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MainDeptCd" class="<?php echo $lab_test_master->MainDeptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->MainDeptCd) ?>',1);"><div id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->MainDeptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->MainDeptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->MainDeptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->DeptCd->Visible) { // DeptCd ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->DeptCd) == "") { ?>
		<th data-name="DeptCd" class="<?php echo $lab_test_master->DeptCd->headerCellClass() ?>"><div id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd"><div class="ew-table-header-caption"><?php echo $lab_test_master->DeptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptCd" class="<?php echo $lab_test_master->DeptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->DeptCd) ?>',1);"><div id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->DeptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->DeptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->DeptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->TestCd->Visible) { // TestCd ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->TestCd) == "") { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_master->TestCd->headerCellClass() ?>"><div id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd"><div class="ew-table-header-caption"><?php echo $lab_test_master->TestCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_master->TestCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->TestCd) ?>',1);"><div id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->TestCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->TestCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->TestCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_master->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd"><div class="ew-table-header-caption"><?php echo $lab_test_master->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_master->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->TestSubCd) ?>',1);"><div id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->TestName->Visible) { // TestName ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->TestName) == "") { ?>
		<th data-name="TestName" class="<?php echo $lab_test_master->TestName->headerCellClass() ?>"><div id="elh_lab_test_master_TestName" class="lab_test_master_TestName"><div class="ew-table-header-caption"><?php echo $lab_test_master->TestName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestName" class="<?php echo $lab_test_master->TestName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->TestName) ?>',1);"><div id="elh_lab_test_master_TestName" class="lab_test_master_TestName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->TestName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->TestName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->TestName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->XrayPart->Visible) { // XrayPart ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->XrayPart) == "") { ?>
		<th data-name="XrayPart" class="<?php echo $lab_test_master->XrayPart->headerCellClass() ?>"><div id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart"><div class="ew-table-header-caption"><?php echo $lab_test_master->XrayPart->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="XrayPart" class="<?php echo $lab_test_master->XrayPart->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->XrayPart) ?>',1);"><div id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->XrayPart->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->XrayPart->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->XrayPart->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Method->Visible) { // Method ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $lab_test_master->Method->headerCellClass() ?>"><div id="elh_lab_test_master_Method" class="lab_test_master_Method"><div class="ew-table-header-caption"><?php echo $lab_test_master->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $lab_test_master->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Method) ?>',1);"><div id="elh_lab_test_master_Method" class="lab_test_master_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Order->Visible) { // Order ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $lab_test_master->Order->headerCellClass() ?>"><div id="elh_lab_test_master_Order" class="lab_test_master_Order"><div class="ew-table-header-caption"><?php echo $lab_test_master->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $lab_test_master->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Order) ?>',1);"><div id="elh_lab_test_master_Order" class="lab_test_master_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Form->Visible) { // Form ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $lab_test_master->Form->headerCellClass() ?>"><div id="elh_lab_test_master_Form" class="lab_test_master_Form"><div class="ew-table-header-caption"><?php echo $lab_test_master->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $lab_test_master->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Form) ?>',1);"><div id="elh_lab_test_master_Form" class="lab_test_master_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Form->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Form->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Form->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Amt->Visible) { // Amt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Amt) == "") { ?>
		<th data-name="Amt" class="<?php echo $lab_test_master->Amt->headerCellClass() ?>"><div id="elh_lab_test_master_Amt" class="lab_test_master_Amt"><div class="ew-table-header-caption"><?php echo $lab_test_master->Amt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amt" class="<?php echo $lab_test_master->Amt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Amt) ?>',1);"><div id="elh_lab_test_master_Amt" class="lab_test_master_Amt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Amt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Amt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Amt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->SplAmt->Visible) { // SplAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->SplAmt) == "") { ?>
		<th data-name="SplAmt" class="<?php echo $lab_test_master->SplAmt->headerCellClass() ?>"><div id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->SplAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SplAmt" class="<?php echo $lab_test_master->SplAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->SplAmt) ?>',1);"><div id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->SplAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->SplAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->SplAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ResType->Visible) { // ResType ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $lab_test_master->ResType->headerCellClass() ?>"><div id="elh_lab_test_master_ResType" class="lab_test_master_ResType"><div class="ew-table-header-caption"><?php echo $lab_test_master->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $lab_test_master->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ResType) ?>',1);"><div id="elh_lab_test_master_ResType" class="lab_test_master_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->UnitCD->Visible) { // UnitCD ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $lab_test_master->UnitCD->headerCellClass() ?>"><div id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD"><div class="ew-table-header-caption"><?php echo $lab_test_master->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $lab_test_master->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->UnitCD) ?>',1);"><div id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->UnitCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->UnitCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Sample->Visible) { // Sample ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $lab_test_master->Sample->headerCellClass() ?>"><div id="elh_lab_test_master_Sample" class="lab_test_master_Sample"><div class="ew-table-header-caption"><?php echo $lab_test_master->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $lab_test_master->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Sample) ?>',1);"><div id="elh_lab_test_master_Sample" class="lab_test_master_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->NoD->Visible) { // NoD ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $lab_test_master->NoD->headerCellClass() ?>"><div id="elh_lab_test_master_NoD" class="lab_test_master_NoD"><div class="ew-table-header-caption"><?php echo $lab_test_master->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $lab_test_master->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->NoD) ?>',1);"><div id="elh_lab_test_master_NoD" class="lab_test_master_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->BillOrder->Visible) { // BillOrder ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $lab_test_master->BillOrder->headerCellClass() ?>"><div id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder"><div class="ew-table-header-caption"><?php echo $lab_test_master->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $lab_test_master->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->BillOrder) ?>',1);"><div id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Inactive->Visible) { // Inactive ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $lab_test_master->Inactive->headerCellClass() ?>"><div id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive"><div class="ew-table-header-caption"><?php echo $lab_test_master->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $lab_test_master->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Inactive) ?>',1);"><div id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ReagentAmt->Visible) { // ReagentAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ReagentAmt) == "") { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_test_master->ReagentAmt->headerCellClass() ?>"><div id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->ReagentAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_test_master->ReagentAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ReagentAmt) ?>',1);"><div id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ReagentAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ReagentAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ReagentAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->LabAmt->Visible) { // LabAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->LabAmt) == "") { ?>
		<th data-name="LabAmt" class="<?php echo $lab_test_master->LabAmt->headerCellClass() ?>"><div id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->LabAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabAmt" class="<?php echo $lab_test_master->LabAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->LabAmt) ?>',1);"><div id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->LabAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->LabAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->LabAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->RefAmt->Visible) { // RefAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->RefAmt) == "") { ?>
		<th data-name="RefAmt" class="<?php echo $lab_test_master->RefAmt->headerCellClass() ?>"><div id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->RefAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefAmt" class="<?php echo $lab_test_master->RefAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->RefAmt) ?>',1);"><div id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->RefAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->RefAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->RefAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->CreFrom->Visible) { // CreFrom ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->CreFrom) == "") { ?>
		<th data-name="CreFrom" class="<?php echo $lab_test_master->CreFrom->headerCellClass() ?>"><div id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom"><div class="ew-table-header-caption"><?php echo $lab_test_master->CreFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreFrom" class="<?php echo $lab_test_master->CreFrom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->CreFrom) ?>',1);"><div id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->CreFrom->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->CreFrom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->CreFrom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->CreTo->Visible) { // CreTo ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->CreTo) == "") { ?>
		<th data-name="CreTo" class="<?php echo $lab_test_master->CreTo->headerCellClass() ?>"><div id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo"><div class="ew-table-header-caption"><?php echo $lab_test_master->CreTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreTo" class="<?php echo $lab_test_master->CreTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->CreTo) ?>',1);"><div id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->CreTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->CreTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->CreTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Sun->Visible) { // Sun ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Sun) == "") { ?>
		<th data-name="Sun" class="<?php echo $lab_test_master->Sun->headerCellClass() ?>"><div id="elh_lab_test_master_Sun" class="lab_test_master_Sun"><div class="ew-table-header-caption"><?php echo $lab_test_master->Sun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sun" class="<?php echo $lab_test_master->Sun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Sun) ?>',1);"><div id="elh_lab_test_master_Sun" class="lab_test_master_Sun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Sun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Sun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Sun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Mon->Visible) { // Mon ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Mon) == "") { ?>
		<th data-name="Mon" class="<?php echo $lab_test_master->Mon->headerCellClass() ?>"><div id="elh_lab_test_master_Mon" class="lab_test_master_Mon"><div class="ew-table-header-caption"><?php echo $lab_test_master->Mon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mon" class="<?php echo $lab_test_master->Mon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Mon) ?>',1);"><div id="elh_lab_test_master_Mon" class="lab_test_master_Mon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Mon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Mon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Mon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Tue->Visible) { // Tue ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Tue) == "") { ?>
		<th data-name="Tue" class="<?php echo $lab_test_master->Tue->headerCellClass() ?>"><div id="elh_lab_test_master_Tue" class="lab_test_master_Tue"><div class="ew-table-header-caption"><?php echo $lab_test_master->Tue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tue" class="<?php echo $lab_test_master->Tue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Tue) ?>',1);"><div id="elh_lab_test_master_Tue" class="lab_test_master_Tue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Tue->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Tue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Tue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Wed->Visible) { // Wed ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Wed) == "") { ?>
		<th data-name="Wed" class="<?php echo $lab_test_master->Wed->headerCellClass() ?>"><div id="elh_lab_test_master_Wed" class="lab_test_master_Wed"><div class="ew-table-header-caption"><?php echo $lab_test_master->Wed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Wed" class="<?php echo $lab_test_master->Wed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Wed) ?>',1);"><div id="elh_lab_test_master_Wed" class="lab_test_master_Wed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Wed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Wed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Wed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Thi->Visible) { // Thi ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Thi) == "") { ?>
		<th data-name="Thi" class="<?php echo $lab_test_master->Thi->headerCellClass() ?>"><div id="elh_lab_test_master_Thi" class="lab_test_master_Thi"><div class="ew-table-header-caption"><?php echo $lab_test_master->Thi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Thi" class="<?php echo $lab_test_master->Thi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Thi) ?>',1);"><div id="elh_lab_test_master_Thi" class="lab_test_master_Thi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Thi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Thi->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Thi->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Fri->Visible) { // Fri ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Fri) == "") { ?>
		<th data-name="Fri" class="<?php echo $lab_test_master->Fri->headerCellClass() ?>"><div id="elh_lab_test_master_Fri" class="lab_test_master_Fri"><div class="ew-table-header-caption"><?php echo $lab_test_master->Fri->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fri" class="<?php echo $lab_test_master->Fri->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Fri) ?>',1);"><div id="elh_lab_test_master_Fri" class="lab_test_master_Fri">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Fri->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Fri->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Fri->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Sat->Visible) { // Sat ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Sat) == "") { ?>
		<th data-name="Sat" class="<?php echo $lab_test_master->Sat->headerCellClass() ?>"><div id="elh_lab_test_master_Sat" class="lab_test_master_Sat"><div class="ew-table-header-caption"><?php echo $lab_test_master->Sat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sat" class="<?php echo $lab_test_master->Sat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Sat) ?>',1);"><div id="elh_lab_test_master_Sat" class="lab_test_master_Sat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Sat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Sat->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Sat->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Days->Visible) { // Days ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $lab_test_master->Days->headerCellClass() ?>"><div id="elh_lab_test_master_Days" class="lab_test_master_Days"><div class="ew-table-header-caption"><?php echo $lab_test_master->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $lab_test_master->Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Days) ?>',1);"><div id="elh_lab_test_master_Days" class="lab_test_master_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Cutoff->Visible) { // Cutoff ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Cutoff) == "") { ?>
		<th data-name="Cutoff" class="<?php echo $lab_test_master->Cutoff->headerCellClass() ?>"><div id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff"><div class="ew-table-header-caption"><?php echo $lab_test_master->Cutoff->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cutoff" class="<?php echo $lab_test_master->Cutoff->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Cutoff) ?>',1);"><div id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Cutoff->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Cutoff->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Cutoff->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->FontBold->Visible) { // FontBold ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->FontBold) == "") { ?>
		<th data-name="FontBold" class="<?php echo $lab_test_master->FontBold->headerCellClass() ?>"><div id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold"><div class="ew-table-header-caption"><?php echo $lab_test_master->FontBold->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FontBold" class="<?php echo $lab_test_master->FontBold->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->FontBold) ?>',1);"><div id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->FontBold->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->FontBold->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->FontBold->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->TestHeading->Visible) { // TestHeading ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->TestHeading) == "") { ?>
		<th data-name="TestHeading" class="<?php echo $lab_test_master->TestHeading->headerCellClass() ?>"><div id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading"><div class="ew-table-header-caption"><?php echo $lab_test_master->TestHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestHeading" class="<?php echo $lab_test_master->TestHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->TestHeading) ?>',1);"><div id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->TestHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->TestHeading->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->TestHeading->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Outsource->Visible) { // Outsource ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $lab_test_master->Outsource->headerCellClass() ?>"><div id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource"><div class="ew-table-header-caption"><?php echo $lab_test_master->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $lab_test_master->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Outsource) ?>',1);"><div id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Outsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Outsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->NoResult->Visible) { // NoResult ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->NoResult) == "") { ?>
		<th data-name="NoResult" class="<?php echo $lab_test_master->NoResult->headerCellClass() ?>"><div id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult"><div class="ew-table-header-caption"><?php echo $lab_test_master->NoResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoResult" class="<?php echo $lab_test_master->NoResult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->NoResult) ?>',1);"><div id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->NoResult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->NoResult->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->NoResult->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->GraphLow->Visible) { // GraphLow ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->GraphLow) == "") { ?>
		<th data-name="GraphLow" class="<?php echo $lab_test_master->GraphLow->headerCellClass() ?>"><div id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow"><div class="ew-table-header-caption"><?php echo $lab_test_master->GraphLow->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphLow" class="<?php echo $lab_test_master->GraphLow->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->GraphLow) ?>',1);"><div id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->GraphLow->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->GraphLow->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->GraphLow->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->GraphHigh->Visible) { // GraphHigh ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->GraphHigh) == "") { ?>
		<th data-name="GraphHigh" class="<?php echo $lab_test_master->GraphHigh->headerCellClass() ?>"><div id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh"><div class="ew-table-header-caption"><?php echo $lab_test_master->GraphHigh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphHigh" class="<?php echo $lab_test_master->GraphHigh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->GraphHigh) ?>',1);"><div id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->GraphHigh->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->GraphHigh->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->GraphHigh->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->CollSample->Visible) { // CollSample ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $lab_test_master->CollSample->headerCellClass() ?>"><div id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample"><div class="ew-table-header-caption"><?php echo $lab_test_master->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $lab_test_master->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->CollSample) ?>',1);"><div id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ProcessTime->Visible) { // ProcessTime ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ProcessTime) == "") { ?>
		<th data-name="ProcessTime" class="<?php echo $lab_test_master->ProcessTime->headerCellClass() ?>"><div id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime"><div class="ew-table-header-caption"><?php echo $lab_test_master->ProcessTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcessTime" class="<?php echo $lab_test_master->ProcessTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ProcessTime) ?>',1);"><div id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ProcessTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ProcessTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ProcessTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->TamilName->Visible) { // TamilName ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->TamilName) == "") { ?>
		<th data-name="TamilName" class="<?php echo $lab_test_master->TamilName->headerCellClass() ?>"><div id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName"><div class="ew-table-header-caption"><?php echo $lab_test_master->TamilName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TamilName" class="<?php echo $lab_test_master->TamilName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->TamilName) ?>',1);"><div id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->TamilName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->TamilName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->TamilName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ShortName->Visible) { // ShortName ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ShortName) == "") { ?>
		<th data-name="ShortName" class="<?php echo $lab_test_master->ShortName->headerCellClass() ?>"><div id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName"><div class="ew-table-header-caption"><?php echo $lab_test_master->ShortName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShortName" class="<?php echo $lab_test_master->ShortName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ShortName) ?>',1);"><div id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ShortName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ShortName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ShortName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Individual->Visible) { // Individual ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Individual) == "") { ?>
		<th data-name="Individual" class="<?php echo $lab_test_master->Individual->headerCellClass() ?>"><div id="elh_lab_test_master_Individual" class="lab_test_master_Individual"><div class="ew-table-header-caption"><?php echo $lab_test_master->Individual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Individual" class="<?php echo $lab_test_master->Individual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Individual) ?>',1);"><div id="elh_lab_test_master_Individual" class="lab_test_master_Individual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Individual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Individual->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Individual->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->PrevAmt->Visible) { // PrevAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->PrevAmt) == "") { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_test_master->PrevAmt->headerCellClass() ?>"><div id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->PrevAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_test_master->PrevAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->PrevAmt) ?>',1);"><div id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->PrevAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->PrevAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->PrevAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->PrevSplAmt) == "") { ?>
		<th data-name="PrevSplAmt" class="<?php echo $lab_test_master->PrevSplAmt->headerCellClass() ?>"><div id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->PrevSplAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrevSplAmt" class="<?php echo $lab_test_master->PrevSplAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->PrevSplAmt) ?>',1);"><div id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->PrevSplAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->PrevSplAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->PrevSplAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->EditDate->Visible) { // EditDate ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $lab_test_master->EditDate->headerCellClass() ?>"><div id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate"><div class="ew-table-header-caption"><?php echo $lab_test_master->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $lab_test_master->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->EditDate) ?>',1);"><div id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->BillName->Visible) { // BillName ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->BillName) == "") { ?>
		<th data-name="BillName" class="<?php echo $lab_test_master->BillName->headerCellClass() ?>"><div id="elh_lab_test_master_BillName" class="lab_test_master_BillName"><div class="ew-table-header-caption"><?php echo $lab_test_master->BillName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillName" class="<?php echo $lab_test_master->BillName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->BillName) ?>',1);"><div id="elh_lab_test_master_BillName" class="lab_test_master_BillName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->BillName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->BillName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->BillName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ActualAmt->Visible) { // ActualAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ActualAmt) == "") { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_master->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->ActualAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_master->ActualAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ActualAmt) ?>',1);"><div id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ActualAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ActualAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ActualAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->HISCD->Visible) { // HISCD ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->HISCD) == "") { ?>
		<th data-name="HISCD" class="<?php echo $lab_test_master->HISCD->headerCellClass() ?>"><div id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD"><div class="ew-table-header-caption"><?php echo $lab_test_master->HISCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HISCD" class="<?php echo $lab_test_master->HISCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->HISCD) ?>',1);"><div id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->HISCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->HISCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->HISCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->PriceList->Visible) { // PriceList ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->PriceList) == "") { ?>
		<th data-name="PriceList" class="<?php echo $lab_test_master->PriceList->headerCellClass() ?>"><div id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList"><div class="ew-table-header-caption"><?php echo $lab_test_master->PriceList->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceList" class="<?php echo $lab_test_master->PriceList->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->PriceList) ?>',1);"><div id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->PriceList->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->PriceList->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->PriceList->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->IPAmt->Visible) { // IPAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->IPAmt) == "") { ?>
		<th data-name="IPAmt" class="<?php echo $lab_test_master->IPAmt->headerCellClass() ?>"><div id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->IPAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPAmt" class="<?php echo $lab_test_master->IPAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->IPAmt) ?>',1);"><div id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->IPAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->IPAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->IPAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->InsAmt->Visible) { // InsAmt ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->InsAmt) == "") { ?>
		<th data-name="InsAmt" class="<?php echo $lab_test_master->InsAmt->headerCellClass() ?>"><div id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master->InsAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InsAmt" class="<?php echo $lab_test_master->InsAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->InsAmt) ?>',1);"><div id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->InsAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->InsAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->InsAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ManualCD->Visible) { // ManualCD ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ManualCD) == "") { ?>
		<th data-name="ManualCD" class="<?php echo $lab_test_master->ManualCD->headerCellClass() ?>"><div id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD"><div class="ew-table-header-caption"><?php echo $lab_test_master->ManualCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCD" class="<?php echo $lab_test_master->ManualCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ManualCD) ?>',1);"><div id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ManualCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ManualCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ManualCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Free->Visible) { // Free ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Free) == "") { ?>
		<th data-name="Free" class="<?php echo $lab_test_master->Free->headerCellClass() ?>"><div id="elh_lab_test_master_Free" class="lab_test_master_Free"><div class="ew-table-header-caption"><?php echo $lab_test_master->Free->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Free" class="<?php echo $lab_test_master->Free->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Free) ?>',1);"><div id="elh_lab_test_master_Free" class="lab_test_master_Free">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Free->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Free->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Free->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->AutoAuth->Visible) { // AutoAuth ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->AutoAuth) == "") { ?>
		<th data-name="AutoAuth" class="<?php echo $lab_test_master->AutoAuth->headerCellClass() ?>"><div id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth"><div class="ew-table-header-caption"><?php echo $lab_test_master->AutoAuth->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AutoAuth" class="<?php echo $lab_test_master->AutoAuth->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->AutoAuth) ?>',1);"><div id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->AutoAuth->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->AutoAuth->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->AutoAuth->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->ProductCD->Visible) { // ProductCD ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->ProductCD) == "") { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_master->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD"><div class="ew-table-header-caption"><?php echo $lab_test_master->ProductCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_master->ProductCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->ProductCD) ?>',1);"><div id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->ProductCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->ProductCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->ProductCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Inventory->Visible) { // Inventory ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Inventory) == "") { ?>
		<th data-name="Inventory" class="<?php echo $lab_test_master->Inventory->headerCellClass() ?>"><div id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory"><div class="ew-table-header-caption"><?php echo $lab_test_master->Inventory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inventory" class="<?php echo $lab_test_master->Inventory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Inventory) ?>',1);"><div id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Inventory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Inventory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Inventory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->IntimateTest->Visible) { // IntimateTest ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->IntimateTest) == "") { ?>
		<th data-name="IntimateTest" class="<?php echo $lab_test_master->IntimateTest->headerCellClass() ?>"><div id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest"><div class="ew-table-header-caption"><?php echo $lab_test_master->IntimateTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IntimateTest" class="<?php echo $lab_test_master->IntimateTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->IntimateTest) ?>',1);"><div id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->IntimateTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->IntimateTest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->IntimateTest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master->Manual->Visible) { // Manual ?>
	<?php if ($lab_test_master->sortUrl($lab_test_master->Manual) == "") { ?>
		<th data-name="Manual" class="<?php echo $lab_test_master->Manual->headerCellClass() ?>"><div id="elh_lab_test_master_Manual" class="lab_test_master_Manual"><div class="ew-table-header-caption"><?php echo $lab_test_master->Manual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Manual" class="<?php echo $lab_test_master->Manual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_master->SortUrl($lab_test_master->Manual) ?>',1);"><div id="elh_lab_test_master_Manual" class="lab_test_master_Manual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master->Manual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master->Manual->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_master->Manual->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_test_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_test_master->ExportAll && $lab_test_master->isExport()) {
	$lab_test_master_list->StopRec = $lab_test_master_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_test_master_list->TotalRecs > $lab_test_master_list->StartRec + $lab_test_master_list->DisplayRecs - 1)
		$lab_test_master_list->StopRec = $lab_test_master_list->StartRec + $lab_test_master_list->DisplayRecs - 1;
	else
		$lab_test_master_list->StopRec = $lab_test_master_list->TotalRecs;
}
$lab_test_master_list->RecCnt = $lab_test_master_list->StartRec - 1;
if ($lab_test_master_list->Recordset && !$lab_test_master_list->Recordset->EOF) {
	$lab_test_master_list->Recordset->moveFirst();
	$selectLimit = $lab_test_master_list->UseSelectLimit;
	if (!$selectLimit && $lab_test_master_list->StartRec > 1)
		$lab_test_master_list->Recordset->move($lab_test_master_list->StartRec - 1);
} elseif (!$lab_test_master->AllowAddDeleteRow && $lab_test_master_list->StopRec == 0) {
	$lab_test_master_list->StopRec = $lab_test_master->GridAddRowCount;
}

// Initialize aggregate
$lab_test_master->RowType = ROWTYPE_AGGREGATEINIT;
$lab_test_master->resetAttributes();
$lab_test_master_list->renderRow();
while ($lab_test_master_list->RecCnt < $lab_test_master_list->StopRec) {
	$lab_test_master_list->RecCnt++;
	if ($lab_test_master_list->RecCnt >= $lab_test_master_list->StartRec) {
		$lab_test_master_list->RowCnt++;

		// Set up key count
		$lab_test_master_list->KeyCount = $lab_test_master_list->RowIndex;

		// Init row class and style
		$lab_test_master->resetAttributes();
		$lab_test_master->CssClass = "";
		if ($lab_test_master->isGridAdd()) {
		} else {
			$lab_test_master_list->loadRowValues($lab_test_master_list->Recordset); // Load row values
		}
		$lab_test_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_test_master->RowAttrs = array_merge($lab_test_master->RowAttrs, array('data-rowindex'=>$lab_test_master_list->RowCnt, 'id'=>'r' . $lab_test_master_list->RowCnt . '_lab_test_master', 'data-rowtype'=>$lab_test_master->RowType));

		// Render row
		$lab_test_master_list->renderRow();

		// Render list options
		$lab_test_master_list->renderListOptions();
?>
	<tr<?php echo $lab_test_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_test_master_list->ListOptions->render("body", "left", $lab_test_master_list->RowCnt);
?>
	<?php if ($lab_test_master->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_test_master->id->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_id" class="lab_test_master_id">
<span<?php echo $lab_test_master->id->viewAttributes() ?>>
<?php echo $lab_test_master->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->MainDeptCd->Visible) { // MainDeptCd ?>
		<td data-name="MainDeptCd"<?php echo $lab_test_master->MainDeptCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd">
<span<?php echo $lab_test_master->MainDeptCd->viewAttributes() ?>>
<?php echo $lab_test_master->MainDeptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->DeptCd->Visible) { // DeptCd ?>
		<td data-name="DeptCd"<?php echo $lab_test_master->DeptCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_DeptCd" class="lab_test_master_DeptCd">
<span<?php echo $lab_test_master->DeptCd->viewAttributes() ?>>
<?php echo $lab_test_master->DeptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->TestCd->Visible) { // TestCd ?>
		<td data-name="TestCd"<?php echo $lab_test_master->TestCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_TestCd" class="lab_test_master_TestCd">
<span<?php echo $lab_test_master->TestCd->viewAttributes() ?>>
<?php echo $lab_test_master->TestCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $lab_test_master->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd">
<span<?php echo $lab_test_master->TestSubCd->viewAttributes() ?>>
<?php echo $lab_test_master->TestSubCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->TestName->Visible) { // TestName ?>
		<td data-name="TestName"<?php echo $lab_test_master->TestName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_TestName" class="lab_test_master_TestName">
<span<?php echo $lab_test_master->TestName->viewAttributes() ?>>
<?php echo $lab_test_master->TestName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->XrayPart->Visible) { // XrayPart ?>
		<td data-name="XrayPart"<?php echo $lab_test_master->XrayPart->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_XrayPart" class="lab_test_master_XrayPart">
<span<?php echo $lab_test_master->XrayPart->viewAttributes() ?>>
<?php echo $lab_test_master->XrayPart->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $lab_test_master->Method->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Method" class="lab_test_master_Method">
<span<?php echo $lab_test_master->Method->viewAttributes() ?>>
<?php echo $lab_test_master->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $lab_test_master->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Order" class="lab_test_master_Order">
<span<?php echo $lab_test_master->Order->viewAttributes() ?>>
<?php echo $lab_test_master->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Form->Visible) { // Form ?>
		<td data-name="Form"<?php echo $lab_test_master->Form->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Form" class="lab_test_master_Form">
<span<?php echo $lab_test_master->Form->viewAttributes() ?>>
<?php echo $lab_test_master->Form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Amt->Visible) { // Amt ?>
		<td data-name="Amt"<?php echo $lab_test_master->Amt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Amt" class="lab_test_master_Amt">
<span<?php echo $lab_test_master->Amt->viewAttributes() ?>>
<?php echo $lab_test_master->Amt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->SplAmt->Visible) { // SplAmt ?>
		<td data-name="SplAmt"<?php echo $lab_test_master->SplAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_SplAmt" class="lab_test_master_SplAmt">
<span<?php echo $lab_test_master->SplAmt->viewAttributes() ?>>
<?php echo $lab_test_master->SplAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $lab_test_master->ResType->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ResType" class="lab_test_master_ResType">
<span<?php echo $lab_test_master->ResType->viewAttributes() ?>>
<?php echo $lab_test_master->ResType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD"<?php echo $lab_test_master->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_UnitCD" class="lab_test_master_UnitCD">
<span<?php echo $lab_test_master->UnitCD->viewAttributes() ?>>
<?php echo $lab_test_master->UnitCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $lab_test_master->Sample->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Sample" class="lab_test_master_Sample">
<span<?php echo $lab_test_master->Sample->viewAttributes() ?>>
<?php echo $lab_test_master->Sample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $lab_test_master->NoD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_NoD" class="lab_test_master_NoD">
<span<?php echo $lab_test_master->NoD->viewAttributes() ?>>
<?php echo $lab_test_master->NoD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $lab_test_master->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_BillOrder" class="lab_test_master_BillOrder">
<span<?php echo $lab_test_master->BillOrder->viewAttributes() ?>>
<?php echo $lab_test_master->BillOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $lab_test_master->Inactive->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Inactive" class="lab_test_master_Inactive">
<span<?php echo $lab_test_master->Inactive->viewAttributes() ?>>
<?php echo $lab_test_master->Inactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ReagentAmt->Visible) { // ReagentAmt ?>
		<td data-name="ReagentAmt"<?php echo $lab_test_master->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt">
<span<?php echo $lab_test_master->ReagentAmt->viewAttributes() ?>>
<?php echo $lab_test_master->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->LabAmt->Visible) { // LabAmt ?>
		<td data-name="LabAmt"<?php echo $lab_test_master->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_LabAmt" class="lab_test_master_LabAmt">
<span<?php echo $lab_test_master->LabAmt->viewAttributes() ?>>
<?php echo $lab_test_master->LabAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->RefAmt->Visible) { // RefAmt ?>
		<td data-name="RefAmt"<?php echo $lab_test_master->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_RefAmt" class="lab_test_master_RefAmt">
<span<?php echo $lab_test_master->RefAmt->viewAttributes() ?>>
<?php echo $lab_test_master->RefAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->CreFrom->Visible) { // CreFrom ?>
		<td data-name="CreFrom"<?php echo $lab_test_master->CreFrom->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_CreFrom" class="lab_test_master_CreFrom">
<span<?php echo $lab_test_master->CreFrom->viewAttributes() ?>>
<?php echo $lab_test_master->CreFrom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->CreTo->Visible) { // CreTo ?>
		<td data-name="CreTo"<?php echo $lab_test_master->CreTo->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_CreTo" class="lab_test_master_CreTo">
<span<?php echo $lab_test_master->CreTo->viewAttributes() ?>>
<?php echo $lab_test_master->CreTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Sun->Visible) { // Sun ?>
		<td data-name="Sun"<?php echo $lab_test_master->Sun->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Sun" class="lab_test_master_Sun">
<span<?php echo $lab_test_master->Sun->viewAttributes() ?>>
<?php echo $lab_test_master->Sun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Mon->Visible) { // Mon ?>
		<td data-name="Mon"<?php echo $lab_test_master->Mon->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Mon" class="lab_test_master_Mon">
<span<?php echo $lab_test_master->Mon->viewAttributes() ?>>
<?php echo $lab_test_master->Mon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Tue->Visible) { // Tue ?>
		<td data-name="Tue"<?php echo $lab_test_master->Tue->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Tue" class="lab_test_master_Tue">
<span<?php echo $lab_test_master->Tue->viewAttributes() ?>>
<?php echo $lab_test_master->Tue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Wed->Visible) { // Wed ?>
		<td data-name="Wed"<?php echo $lab_test_master->Wed->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Wed" class="lab_test_master_Wed">
<span<?php echo $lab_test_master->Wed->viewAttributes() ?>>
<?php echo $lab_test_master->Wed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Thi->Visible) { // Thi ?>
		<td data-name="Thi"<?php echo $lab_test_master->Thi->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Thi" class="lab_test_master_Thi">
<span<?php echo $lab_test_master->Thi->viewAttributes() ?>>
<?php echo $lab_test_master->Thi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Fri->Visible) { // Fri ?>
		<td data-name="Fri"<?php echo $lab_test_master->Fri->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Fri" class="lab_test_master_Fri">
<span<?php echo $lab_test_master->Fri->viewAttributes() ?>>
<?php echo $lab_test_master->Fri->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Sat->Visible) { // Sat ?>
		<td data-name="Sat"<?php echo $lab_test_master->Sat->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Sat" class="lab_test_master_Sat">
<span<?php echo $lab_test_master->Sat->viewAttributes() ?>>
<?php echo $lab_test_master->Sat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Days->Visible) { // Days ?>
		<td data-name="Days"<?php echo $lab_test_master->Days->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Days" class="lab_test_master_Days">
<span<?php echo $lab_test_master->Days->viewAttributes() ?>>
<?php echo $lab_test_master->Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Cutoff->Visible) { // Cutoff ?>
		<td data-name="Cutoff"<?php echo $lab_test_master->Cutoff->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Cutoff" class="lab_test_master_Cutoff">
<span<?php echo $lab_test_master->Cutoff->viewAttributes() ?>>
<?php echo $lab_test_master->Cutoff->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->FontBold->Visible) { // FontBold ?>
		<td data-name="FontBold"<?php echo $lab_test_master->FontBold->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_FontBold" class="lab_test_master_FontBold">
<span<?php echo $lab_test_master->FontBold->viewAttributes() ?>>
<?php echo $lab_test_master->FontBold->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->TestHeading->Visible) { // TestHeading ?>
		<td data-name="TestHeading"<?php echo $lab_test_master->TestHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_TestHeading" class="lab_test_master_TestHeading">
<span<?php echo $lab_test_master->TestHeading->viewAttributes() ?>>
<?php echo $lab_test_master->TestHeading->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource"<?php echo $lab_test_master->Outsource->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Outsource" class="lab_test_master_Outsource">
<span<?php echo $lab_test_master->Outsource->viewAttributes() ?>>
<?php echo $lab_test_master->Outsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->NoResult->Visible) { // NoResult ?>
		<td data-name="NoResult"<?php echo $lab_test_master->NoResult->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_NoResult" class="lab_test_master_NoResult">
<span<?php echo $lab_test_master->NoResult->viewAttributes() ?>>
<?php echo $lab_test_master->NoResult->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->GraphLow->Visible) { // GraphLow ?>
		<td data-name="GraphLow"<?php echo $lab_test_master->GraphLow->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_GraphLow" class="lab_test_master_GraphLow">
<span<?php echo $lab_test_master->GraphLow->viewAttributes() ?>>
<?php echo $lab_test_master->GraphLow->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->GraphHigh->Visible) { // GraphHigh ?>
		<td data-name="GraphHigh"<?php echo $lab_test_master->GraphHigh->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh">
<span<?php echo $lab_test_master->GraphHigh->viewAttributes() ?>>
<?php echo $lab_test_master->GraphHigh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $lab_test_master->CollSample->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_CollSample" class="lab_test_master_CollSample">
<span<?php echo $lab_test_master->CollSample->viewAttributes() ?>>
<?php echo $lab_test_master->CollSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ProcessTime->Visible) { // ProcessTime ?>
		<td data-name="ProcessTime"<?php echo $lab_test_master->ProcessTime->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime">
<span<?php echo $lab_test_master->ProcessTime->viewAttributes() ?>>
<?php echo $lab_test_master->ProcessTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->TamilName->Visible) { // TamilName ?>
		<td data-name="TamilName"<?php echo $lab_test_master->TamilName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_TamilName" class="lab_test_master_TamilName">
<span<?php echo $lab_test_master->TamilName->viewAttributes() ?>>
<?php echo $lab_test_master->TamilName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ShortName->Visible) { // ShortName ?>
		<td data-name="ShortName"<?php echo $lab_test_master->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ShortName" class="lab_test_master_ShortName">
<span<?php echo $lab_test_master->ShortName->viewAttributes() ?>>
<?php echo $lab_test_master->ShortName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Individual->Visible) { // Individual ?>
		<td data-name="Individual"<?php echo $lab_test_master->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Individual" class="lab_test_master_Individual">
<span<?php echo $lab_test_master->Individual->viewAttributes() ?>>
<?php echo $lab_test_master->Individual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->PrevAmt->Visible) { // PrevAmt ?>
		<td data-name="PrevAmt"<?php echo $lab_test_master->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt">
<span<?php echo $lab_test_master->PrevAmt->viewAttributes() ?>>
<?php echo $lab_test_master->PrevAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->PrevSplAmt->Visible) { // PrevSplAmt ?>
		<td data-name="PrevSplAmt"<?php echo $lab_test_master->PrevSplAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt">
<span<?php echo $lab_test_master->PrevSplAmt->viewAttributes() ?>>
<?php echo $lab_test_master->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $lab_test_master->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_EditDate" class="lab_test_master_EditDate">
<span<?php echo $lab_test_master->EditDate->viewAttributes() ?>>
<?php echo $lab_test_master->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->BillName->Visible) { // BillName ?>
		<td data-name="BillName"<?php echo $lab_test_master->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_BillName" class="lab_test_master_BillName">
<span<?php echo $lab_test_master->BillName->viewAttributes() ?>>
<?php echo $lab_test_master->BillName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt"<?php echo $lab_test_master->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt">
<span<?php echo $lab_test_master->ActualAmt->viewAttributes() ?>>
<?php echo $lab_test_master->ActualAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->HISCD->Visible) { // HISCD ?>
		<td data-name="HISCD"<?php echo $lab_test_master->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_HISCD" class="lab_test_master_HISCD">
<span<?php echo $lab_test_master->HISCD->viewAttributes() ?>>
<?php echo $lab_test_master->HISCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->PriceList->Visible) { // PriceList ?>
		<td data-name="PriceList"<?php echo $lab_test_master->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_PriceList" class="lab_test_master_PriceList">
<span<?php echo $lab_test_master->PriceList->viewAttributes() ?>>
<?php echo $lab_test_master->PriceList->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->IPAmt->Visible) { // IPAmt ?>
		<td data-name="IPAmt"<?php echo $lab_test_master->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_IPAmt" class="lab_test_master_IPAmt">
<span<?php echo $lab_test_master->IPAmt->viewAttributes() ?>>
<?php echo $lab_test_master->IPAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->InsAmt->Visible) { // InsAmt ?>
		<td data-name="InsAmt"<?php echo $lab_test_master->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_InsAmt" class="lab_test_master_InsAmt">
<span<?php echo $lab_test_master->InsAmt->viewAttributes() ?>>
<?php echo $lab_test_master->InsAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ManualCD->Visible) { // ManualCD ?>
		<td data-name="ManualCD"<?php echo $lab_test_master->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ManualCD" class="lab_test_master_ManualCD">
<span<?php echo $lab_test_master->ManualCD->viewAttributes() ?>>
<?php echo $lab_test_master->ManualCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Free->Visible) { // Free ?>
		<td data-name="Free"<?php echo $lab_test_master->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Free" class="lab_test_master_Free">
<span<?php echo $lab_test_master->Free->viewAttributes() ?>>
<?php echo $lab_test_master->Free->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->AutoAuth->Visible) { // AutoAuth ?>
		<td data-name="AutoAuth"<?php echo $lab_test_master->AutoAuth->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth">
<span<?php echo $lab_test_master->AutoAuth->viewAttributes() ?>>
<?php echo $lab_test_master->AutoAuth->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->ProductCD->Visible) { // ProductCD ?>
		<td data-name="ProductCD"<?php echo $lab_test_master->ProductCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_ProductCD" class="lab_test_master_ProductCD">
<span<?php echo $lab_test_master->ProductCD->viewAttributes() ?>>
<?php echo $lab_test_master->ProductCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Inventory->Visible) { // Inventory ?>
		<td data-name="Inventory"<?php echo $lab_test_master->Inventory->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Inventory" class="lab_test_master_Inventory">
<span<?php echo $lab_test_master->Inventory->viewAttributes() ?>>
<?php echo $lab_test_master->Inventory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->IntimateTest->Visible) { // IntimateTest ?>
		<td data-name="IntimateTest"<?php echo $lab_test_master->IntimateTest->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest">
<span<?php echo $lab_test_master->IntimateTest->viewAttributes() ?>>
<?php echo $lab_test_master->IntimateTest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master->Manual->Visible) { // Manual ?>
		<td data-name="Manual"<?php echo $lab_test_master->Manual->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCnt ?>_lab_test_master_Manual" class="lab_test_master_Manual">
<span<?php echo $lab_test_master->Manual->viewAttributes() ?>>
<?php echo $lab_test_master->Manual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_test_master_list->ListOptions->render("body", "right", $lab_test_master_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$lab_test_master->isGridAdd())
		$lab_test_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$lab_test_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_test_master_list->Recordset)
	$lab_test_master_list->Recordset->Close();
?>
<?php if (!$lab_test_master->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_test_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_test_master_list->Pager)) $lab_test_master_list->Pager = new NumericPager($lab_test_master_list->StartRec, $lab_test_master_list->DisplayRecs, $lab_test_master_list->TotalRecs, $lab_test_master_list->RecRange, $lab_test_master_list->AutoHidePager) ?>
<?php if ($lab_test_master_list->Pager->RecordCount > 0 && $lab_test_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_test_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_test_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_test_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_test_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_master_list->pageUrl() ?>start=<?php echo $lab_test_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_test_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_test_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_test_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_test_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_test_master_list->TotalRecs > 0 && (!$lab_test_master_list->AutoHidePageSizeSelector || $lab_test_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_test_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_test_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_test_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_test_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_test_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_test_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_test_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_test_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_test_master_list->TotalRecs == 0 && !$lab_test_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_test_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_test_master_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_test_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_test_master->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_test_master", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_test_master_list->terminate();
?>