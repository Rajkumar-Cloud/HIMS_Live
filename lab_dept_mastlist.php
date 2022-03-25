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
$lab_dept_mast_list = new lab_dept_mast_list();

// Run the page
$lab_dept_mast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_dept_mast_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_dept_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_dept_mastlist = currentForm = new ew.Form("flab_dept_mastlist", "list");
flab_dept_mastlist.formKeyCountName = '<?php echo $lab_dept_mast_list->FormKeyCountName ?>';

// Form_CustomValidate event
flab_dept_mastlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_dept_mastlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_dept_mastlistsrch = currentSearchForm = new ew.Form("flab_dept_mastlistsrch");

// Filters
flab_dept_mastlistsrch.filterList = <?php echo $lab_dept_mast_list->getFilterList() ?>;
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
<?php if (!$lab_dept_mast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_dept_mast_list->TotalRecs > 0 && $lab_dept_mast_list->ExportOptions->visible()) { ?>
<?php $lab_dept_mast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_dept_mast_list->ImportOptions->visible()) { ?>
<?php $lab_dept_mast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_dept_mast_list->SearchOptions->visible()) { ?>
<?php $lab_dept_mast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_dept_mast_list->FilterOptions->visible()) { ?>
<?php $lab_dept_mast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_dept_mast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_dept_mast->isExport() && !$lab_dept_mast->CurrentAction) { ?>
<form name="flab_dept_mastlistsrch" id="flab_dept_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_dept_mast_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_dept_mastlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_dept_mast">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_dept_mast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_dept_mast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_dept_mast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_dept_mast_list->showPageHeader(); ?>
<?php
$lab_dept_mast_list->showMessage();
?>
<?php if ($lab_dept_mast_list->TotalRecs > 0 || $lab_dept_mast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_dept_mast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_dept_mast">
<?php if (!$lab_dept_mast->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_dept_mast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_dept_mast_list->Pager)) $lab_dept_mast_list->Pager = new NumericPager($lab_dept_mast_list->StartRec, $lab_dept_mast_list->DisplayRecs, $lab_dept_mast_list->TotalRecs, $lab_dept_mast_list->RecRange, $lab_dept_mast_list->AutoHidePager) ?>
<?php if ($lab_dept_mast_list->Pager->RecordCount > 0 && $lab_dept_mast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_dept_mast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_dept_mast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_dept_mast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_dept_mast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_dept_mast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_dept_mast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_dept_mast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_dept_mast_list->TotalRecs > 0 && (!$lab_dept_mast_list->AutoHidePageSizeSelector || $lab_dept_mast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_dept_mast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_dept_mast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_dept_mast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_dept_mast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_dept_mast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_dept_mast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_dept_mast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_dept_mast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_dept_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_dept_mastlist" id="flab_dept_mastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_dept_mast_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_dept_mast_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<div id="gmp_lab_dept_mast" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_dept_mast_list->TotalRecs > 0 || $lab_dept_mast->isGridEdit()) { ?>
<table id="tbl_lab_dept_mastlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_dept_mast_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_dept_mast_list->renderListOptions();

// Render list options (header, left)
$lab_dept_mast_list->ListOptions->render("header", "left");
?>
<?php if ($lab_dept_mast->MainCD->Visible) { // MainCD ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->MainCD) == "") { ?>
		<th data-name="MainCD" class="<?php echo $lab_dept_mast->MainCD->headerCellClass() ?>"><div id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->MainCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MainCD" class="<?php echo $lab_dept_mast->MainCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->MainCD) ?>',1);"><div id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->MainCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->MainCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->MainCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->Code->Visible) { // Code ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $lab_dept_mast->Code->headerCellClass() ?>"><div id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $lab_dept_mast->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->Code) ?>',1);"><div id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->Code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->Code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->Code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->Name->Visible) { // Name ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $lab_dept_mast->Name->headerCellClass() ?>"><div id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $lab_dept_mast->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->Name) ?>',1);"><div id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->Order->Visible) { // Order ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $lab_dept_mast->Order->headerCellClass() ?>"><div id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $lab_dept_mast->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->Order) ?>',1);"><div id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->SignCD->Visible) { // SignCD ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->SignCD) == "") { ?>
		<th data-name="SignCD" class="<?php echo $lab_dept_mast->SignCD->headerCellClass() ?>"><div id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->SignCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SignCD" class="<?php echo $lab_dept_mast->SignCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->SignCD) ?>',1);"><div id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->SignCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->SignCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->SignCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->Collection->Visible) { // Collection ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->Collection) == "") { ?>
		<th data-name="Collection" class="<?php echo $lab_dept_mast->Collection->headerCellClass() ?>"><div id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->Collection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Collection" class="<?php echo $lab_dept_mast->Collection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->Collection) ?>',1);"><div id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->Collection->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->Collection->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->Collection->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->EditDate->Visible) { // EditDate ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $lab_dept_mast->EditDate->headerCellClass() ?>"><div id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $lab_dept_mast->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->EditDate) ?>',1);"><div id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->SMS->Visible) { // SMS ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->SMS) == "") { ?>
		<th data-name="SMS" class="<?php echo $lab_dept_mast->SMS->headerCellClass() ?>"><div id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->SMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMS" class="<?php echo $lab_dept_mast->SMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->SMS) ?>',1);"><div id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->SMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->SMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->SMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->WorkList->Visible) { // WorkList ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->WorkList) == "") { ?>
		<th data-name="WorkList" class="<?php echo $lab_dept_mast->WorkList->headerCellClass() ?>"><div id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->WorkList->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WorkList" class="<?php echo $lab_dept_mast->WorkList->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->WorkList) ?>',1);"><div id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->WorkList->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->WorkList->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->WorkList->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->_Page->Visible) { // Page ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->_Page) == "") { ?>
		<th data-name="_Page" class="<?php echo $lab_dept_mast->_Page->headerCellClass() ?>"><div id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->_Page->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Page" class="<?php echo $lab_dept_mast->_Page->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->_Page) ?>',1);"><div id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->_Page->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->_Page->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->_Page->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->Incharge->Visible) { // Incharge ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->Incharge) == "") { ?>
		<th data-name="Incharge" class="<?php echo $lab_dept_mast->Incharge->headerCellClass() ?>"><div id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->Incharge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incharge" class="<?php echo $lab_dept_mast->Incharge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->Incharge) ?>',1);"><div id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->Incharge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->Incharge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->Incharge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->AutoNum->Visible) { // AutoNum ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->AutoNum) == "") { ?>
		<th data-name="AutoNum" class="<?php echo $lab_dept_mast->AutoNum->headerCellClass() ?>"><div id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->AutoNum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AutoNum" class="<?php echo $lab_dept_mast->AutoNum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->AutoNum) ?>',1);"><div id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->AutoNum->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->AutoNum->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->AutoNum->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast->id->Visible) { // id ?>
	<?php if ($lab_dept_mast->sortUrl($lab_dept_mast->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_dept_mast->id->headerCellClass() ?>"><div id="elh_lab_dept_mast_id" class="lab_dept_mast_id"><div class="ew-table-header-caption"><?php echo $lab_dept_mast->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_dept_mast->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_dept_mast->SortUrl($lab_dept_mast->id) ?>',1);"><div id="elh_lab_dept_mast_id" class="lab_dept_mast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_dept_mast->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_dept_mast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_dept_mast->ExportAll && $lab_dept_mast->isExport()) {
	$lab_dept_mast_list->StopRec = $lab_dept_mast_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_dept_mast_list->TotalRecs > $lab_dept_mast_list->StartRec + $lab_dept_mast_list->DisplayRecs - 1)
		$lab_dept_mast_list->StopRec = $lab_dept_mast_list->StartRec + $lab_dept_mast_list->DisplayRecs - 1;
	else
		$lab_dept_mast_list->StopRec = $lab_dept_mast_list->TotalRecs;
}
$lab_dept_mast_list->RecCnt = $lab_dept_mast_list->StartRec - 1;
if ($lab_dept_mast_list->Recordset && !$lab_dept_mast_list->Recordset->EOF) {
	$lab_dept_mast_list->Recordset->moveFirst();
	$selectLimit = $lab_dept_mast_list->UseSelectLimit;
	if (!$selectLimit && $lab_dept_mast_list->StartRec > 1)
		$lab_dept_mast_list->Recordset->move($lab_dept_mast_list->StartRec - 1);
} elseif (!$lab_dept_mast->AllowAddDeleteRow && $lab_dept_mast_list->StopRec == 0) {
	$lab_dept_mast_list->StopRec = $lab_dept_mast->GridAddRowCount;
}

// Initialize aggregate
$lab_dept_mast->RowType = ROWTYPE_AGGREGATEINIT;
$lab_dept_mast->resetAttributes();
$lab_dept_mast_list->renderRow();
while ($lab_dept_mast_list->RecCnt < $lab_dept_mast_list->StopRec) {
	$lab_dept_mast_list->RecCnt++;
	if ($lab_dept_mast_list->RecCnt >= $lab_dept_mast_list->StartRec) {
		$lab_dept_mast_list->RowCnt++;

		// Set up key count
		$lab_dept_mast_list->KeyCount = $lab_dept_mast_list->RowIndex;

		// Init row class and style
		$lab_dept_mast->resetAttributes();
		$lab_dept_mast->CssClass = "";
		if ($lab_dept_mast->isGridAdd()) {
		} else {
			$lab_dept_mast_list->loadRowValues($lab_dept_mast_list->Recordset); // Load row values
		}
		$lab_dept_mast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_dept_mast->RowAttrs = array_merge($lab_dept_mast->RowAttrs, array('data-rowindex'=>$lab_dept_mast_list->RowCnt, 'id'=>'r' . $lab_dept_mast_list->RowCnt . '_lab_dept_mast', 'data-rowtype'=>$lab_dept_mast->RowType));

		// Render row
		$lab_dept_mast_list->renderRow();

		// Render list options
		$lab_dept_mast_list->renderListOptions();
?>
	<tr<?php echo $lab_dept_mast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_dept_mast_list->ListOptions->render("body", "left", $lab_dept_mast_list->RowCnt);
?>
	<?php if ($lab_dept_mast->MainCD->Visible) { // MainCD ?>
		<td data-name="MainCD"<?php echo $lab_dept_mast->MainCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD">
<span<?php echo $lab_dept_mast->MainCD->viewAttributes() ?>>
<?php echo $lab_dept_mast->MainCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->Code->Visible) { // Code ?>
		<td data-name="Code"<?php echo $lab_dept_mast->Code->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_Code" class="lab_dept_mast_Code">
<span<?php echo $lab_dept_mast->Code->viewAttributes() ?>>
<?php echo $lab_dept_mast->Code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $lab_dept_mast->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_Name" class="lab_dept_mast_Name">
<span<?php echo $lab_dept_mast->Name->viewAttributes() ?>>
<?php echo $lab_dept_mast->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $lab_dept_mast->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_Order" class="lab_dept_mast_Order">
<span<?php echo $lab_dept_mast->Order->viewAttributes() ?>>
<?php echo $lab_dept_mast->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->SignCD->Visible) { // SignCD ?>
		<td data-name="SignCD"<?php echo $lab_dept_mast->SignCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD">
<span<?php echo $lab_dept_mast->SignCD->viewAttributes() ?>>
<?php echo $lab_dept_mast->SignCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->Collection->Visible) { // Collection ?>
		<td data-name="Collection"<?php echo $lab_dept_mast->Collection->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_Collection" class="lab_dept_mast_Collection">
<span<?php echo $lab_dept_mast->Collection->viewAttributes() ?>>
<?php echo $lab_dept_mast->Collection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $lab_dept_mast->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate">
<span<?php echo $lab_dept_mast->EditDate->viewAttributes() ?>>
<?php echo $lab_dept_mast->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->SMS->Visible) { // SMS ?>
		<td data-name="SMS"<?php echo $lab_dept_mast->SMS->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_SMS" class="lab_dept_mast_SMS">
<span<?php echo $lab_dept_mast->SMS->viewAttributes() ?>>
<?php echo $lab_dept_mast->SMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->WorkList->Visible) { // WorkList ?>
		<td data-name="WorkList"<?php echo $lab_dept_mast->WorkList->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList">
<span<?php echo $lab_dept_mast->WorkList->viewAttributes() ?>>
<?php echo $lab_dept_mast->WorkList->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->_Page->Visible) { // Page ?>
		<td data-name="_Page"<?php echo $lab_dept_mast->_Page->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast__Page" class="lab_dept_mast__Page">
<span<?php echo $lab_dept_mast->_Page->viewAttributes() ?>>
<?php echo $lab_dept_mast->_Page->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->Incharge->Visible) { // Incharge ?>
		<td data-name="Incharge"<?php echo $lab_dept_mast->Incharge->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge">
<span<?php echo $lab_dept_mast->Incharge->viewAttributes() ?>>
<?php echo $lab_dept_mast->Incharge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->AutoNum->Visible) { // AutoNum ?>
		<td data-name="AutoNum"<?php echo $lab_dept_mast->AutoNum->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum">
<span<?php echo $lab_dept_mast->AutoNum->viewAttributes() ?>>
<?php echo $lab_dept_mast->AutoNum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_dept_mast->id->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCnt ?>_lab_dept_mast_id" class="lab_dept_mast_id">
<span<?php echo $lab_dept_mast->id->viewAttributes() ?>>
<?php echo $lab_dept_mast->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_dept_mast_list->ListOptions->render("body", "right", $lab_dept_mast_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$lab_dept_mast->isGridAdd())
		$lab_dept_mast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$lab_dept_mast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_dept_mast_list->Recordset)
	$lab_dept_mast_list->Recordset->Close();
?>
<?php if (!$lab_dept_mast->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_dept_mast->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_dept_mast_list->Pager)) $lab_dept_mast_list->Pager = new NumericPager($lab_dept_mast_list->StartRec, $lab_dept_mast_list->DisplayRecs, $lab_dept_mast_list->TotalRecs, $lab_dept_mast_list->RecRange, $lab_dept_mast_list->AutoHidePager) ?>
<?php if ($lab_dept_mast_list->Pager->RecordCount > 0 && $lab_dept_mast_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_dept_mast_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_dept_mast_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_dept_mast_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_dept_mast_list->pageUrl() ?>start=<?php echo $lab_dept_mast_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_dept_mast_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_dept_mast_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_dept_mast_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_dept_mast_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_dept_mast_list->TotalRecs > 0 && (!$lab_dept_mast_list->AutoHidePageSizeSelector || $lab_dept_mast_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_dept_mast">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_dept_mast_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_dept_mast_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_dept_mast_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_dept_mast_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_dept_mast_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_dept_mast_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_dept_mast->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_dept_mast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_dept_mast_list->TotalRecs == 0 && !$lab_dept_mast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_dept_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_dept_mast_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_dept_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_dept_mast->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_dept_mast", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_dept_mast_list->terminate();
?>