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
$employee_role_job_description_list = new employee_role_job_description_list();

// Run the page
$employee_role_job_description_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_role_job_description_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_role_job_description->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_role_job_descriptionlist = currentForm = new ew.Form("femployee_role_job_descriptionlist", "list");
femployee_role_job_descriptionlist.formKeyCountName = '<?php echo $employee_role_job_description_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_role_job_descriptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_role_job_descriptionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var femployee_role_job_descriptionlistsrch = currentSearchForm = new ew.Form("femployee_role_job_descriptionlistsrch");

// Filters
femployee_role_job_descriptionlistsrch.filterList = <?php echo $employee_role_job_description_list->getFilterList() ?>;
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
<?php if (!$employee_role_job_description->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_role_job_description_list->TotalRecs > 0 && $employee_role_job_description_list->ExportOptions->visible()) { ?>
<?php $employee_role_job_description_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_role_job_description_list->ImportOptions->visible()) { ?>
<?php $employee_role_job_description_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_role_job_description_list->SearchOptions->visible()) { ?>
<?php $employee_role_job_description_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_role_job_description_list->FilterOptions->visible()) { ?>
<?php $employee_role_job_description_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_role_job_description_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_role_job_description->isExport() && !$employee_role_job_description->CurrentAction) { ?>
<form name="femployee_role_job_descriptionlistsrch" id="femployee_role_job_descriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_role_job_description_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_role_job_descriptionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_role_job_description">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_role_job_description_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_role_job_description_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_role_job_description_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_role_job_description_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_role_job_description_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_role_job_description_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_role_job_description_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_role_job_description_list->showPageHeader(); ?>
<?php
$employee_role_job_description_list->showMessage();
?>
<?php if ($employee_role_job_description_list->TotalRecs > 0 || $employee_role_job_description->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_role_job_description_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_role_job_description">
<?php if (!$employee_role_job_description->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_role_job_description->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_role_job_description_list->Pager)) $employee_role_job_description_list->Pager = new NumericPager($employee_role_job_description_list->StartRec, $employee_role_job_description_list->DisplayRecs, $employee_role_job_description_list->TotalRecs, $employee_role_job_description_list->RecRange, $employee_role_job_description_list->AutoHidePager) ?>
<?php if ($employee_role_job_description_list->Pager->RecordCount > 0 && $employee_role_job_description_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_role_job_description_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_role_job_description_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_role_job_description_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_role_job_description_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_role_job_description_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_role_job_description_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_role_job_description_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_role_job_description_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_role_job_description_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_role_job_description_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_role_job_description_list->TotalRecs > 0 && (!$employee_role_job_description_list->AutoHidePageSizeSelector || $employee_role_job_description_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_role_job_description">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_role_job_description_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_role_job_description_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_role_job_description_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_role_job_description_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_role_job_description_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_role_job_description_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_role_job_description->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_role_job_description_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_role_job_descriptionlist" id="femployee_role_job_descriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_role_job_description_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_role_job_description_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_role_job_description">
<div id="gmp_employee_role_job_description" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_role_job_description_list->TotalRecs > 0 || $employee_role_job_description->isGridEdit()) { ?>
<table id="tbl_employee_role_job_descriptionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_role_job_description_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_role_job_description_list->renderListOptions();

// Render list options (header, left)
$employee_role_job_description_list->ListOptions->render("header", "left");
?>
<?php if ($employee_role_job_description->id->Visible) { // id ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_role_job_description->id->headerCellClass() ?>"><div id="elh_employee_role_job_description_id" class="employee_role_job_description_id"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_role_job_description->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->id) ?>',1);"><div id="elh_employee_role_job_description_id" class="employee_role_job_description_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->role->Visible) { // role ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->role) == "") { ?>
		<th data-name="role" class="<?php echo $employee_role_job_description->role->headerCellClass() ?>"><div id="elh_employee_role_job_description_role" class="employee_role_job_description_role"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->role->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="role" class="<?php echo $employee_role_job_description->role->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->role) ?>',1);"><div id="elh_employee_role_job_description_role" class="employee_role_job_description_role">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->role->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->role->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->role->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->job_description->Visible) { // job_description ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->job_description) == "") { ?>
		<th data-name="job_description" class="<?php echo $employee_role_job_description->job_description->headerCellClass() ?>"><div id="elh_employee_role_job_description_job_description" class="employee_role_job_description_job_description"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->job_description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_description" class="<?php echo $employee_role_job_description->job_description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->job_description) ?>',1);"><div id="elh_employee_role_job_description_job_description" class="employee_role_job_description_job_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->job_description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->job_description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->job_description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->status->Visible) { // status ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_role_job_description->status->headerCellClass() ?>"><div id="elh_employee_role_job_description_status" class="employee_role_job_description_status"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_role_job_description->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->status) ?>',1);"><div id="elh_employee_role_job_description_status" class="employee_role_job_description_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->createdby->Visible) { // createdby ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $employee_role_job_description->createdby->headerCellClass() ?>"><div id="elh_employee_role_job_description_createdby" class="employee_role_job_description_createdby"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $employee_role_job_description->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->createdby) ?>',1);"><div id="elh_employee_role_job_description_createdby" class="employee_role_job_description_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $employee_role_job_description->createddatetime->headerCellClass() ?>"><div id="elh_employee_role_job_description_createddatetime" class="employee_role_job_description_createddatetime"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $employee_role_job_description->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->createddatetime) ?>',1);"><div id="elh_employee_role_job_description_createddatetime" class="employee_role_job_description_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $employee_role_job_description->modifiedby->headerCellClass() ?>"><div id="elh_employee_role_job_description_modifiedby" class="employee_role_job_description_modifiedby"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $employee_role_job_description->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->modifiedby) ?>',1);"><div id="elh_employee_role_job_description_modifiedby" class="employee_role_job_description_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_role_job_description->sortUrl($employee_role_job_description->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_role_job_description->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_role_job_description_modifieddatetime" class="employee_role_job_description_modifieddatetime"><div class="ew-table-header-caption"><?php echo $employee_role_job_description->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_role_job_description->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_role_job_description->SortUrl($employee_role_job_description->modifieddatetime) ?>',1);"><div id="elh_employee_role_job_description_modifieddatetime" class="employee_role_job_description_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_role_job_description->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_role_job_description->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_role_job_description->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_role_job_description_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_role_job_description->ExportAll && $employee_role_job_description->isExport()) {
	$employee_role_job_description_list->StopRec = $employee_role_job_description_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_role_job_description_list->TotalRecs > $employee_role_job_description_list->StartRec + $employee_role_job_description_list->DisplayRecs - 1)
		$employee_role_job_description_list->StopRec = $employee_role_job_description_list->StartRec + $employee_role_job_description_list->DisplayRecs - 1;
	else
		$employee_role_job_description_list->StopRec = $employee_role_job_description_list->TotalRecs;
}
$employee_role_job_description_list->RecCnt = $employee_role_job_description_list->StartRec - 1;
if ($employee_role_job_description_list->Recordset && !$employee_role_job_description_list->Recordset->EOF) {
	$employee_role_job_description_list->Recordset->moveFirst();
	$selectLimit = $employee_role_job_description_list->UseSelectLimit;
	if (!$selectLimit && $employee_role_job_description_list->StartRec > 1)
		$employee_role_job_description_list->Recordset->move($employee_role_job_description_list->StartRec - 1);
} elseif (!$employee_role_job_description->AllowAddDeleteRow && $employee_role_job_description_list->StopRec == 0) {
	$employee_role_job_description_list->StopRec = $employee_role_job_description->GridAddRowCount;
}

// Initialize aggregate
$employee_role_job_description->RowType = ROWTYPE_AGGREGATEINIT;
$employee_role_job_description->resetAttributes();
$employee_role_job_description_list->renderRow();
while ($employee_role_job_description_list->RecCnt < $employee_role_job_description_list->StopRec) {
	$employee_role_job_description_list->RecCnt++;
	if ($employee_role_job_description_list->RecCnt >= $employee_role_job_description_list->StartRec) {
		$employee_role_job_description_list->RowCnt++;

		// Set up key count
		$employee_role_job_description_list->KeyCount = $employee_role_job_description_list->RowIndex;

		// Init row class and style
		$employee_role_job_description->resetAttributes();
		$employee_role_job_description->CssClass = "";
		if ($employee_role_job_description->isGridAdd()) {
		} else {
			$employee_role_job_description_list->loadRowValues($employee_role_job_description_list->Recordset); // Load row values
		}
		$employee_role_job_description->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_role_job_description->RowAttrs = array_merge($employee_role_job_description->RowAttrs, array('data-rowindex'=>$employee_role_job_description_list->RowCnt, 'id'=>'r' . $employee_role_job_description_list->RowCnt . '_employee_role_job_description', 'data-rowtype'=>$employee_role_job_description->RowType));

		// Render row
		$employee_role_job_description_list->renderRow();

		// Render list options
		$employee_role_job_description_list->renderListOptions();
?>
	<tr<?php echo $employee_role_job_description->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_role_job_description_list->ListOptions->render("body", "left", $employee_role_job_description_list->RowCnt);
?>
	<?php if ($employee_role_job_description->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_role_job_description->id->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_id" class="employee_role_job_description_id">
<span<?php echo $employee_role_job_description->id->viewAttributes() ?>>
<?php echo $employee_role_job_description->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->role->Visible) { // role ?>
		<td data-name="role"<?php echo $employee_role_job_description->role->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_role" class="employee_role_job_description_role">
<span<?php echo $employee_role_job_description->role->viewAttributes() ?>>
<?php echo $employee_role_job_description->role->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->job_description->Visible) { // job_description ?>
		<td data-name="job_description"<?php echo $employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_job_description" class="employee_role_job_description_job_description">
<span<?php echo $employee_role_job_description->job_description->viewAttributes() ?>>
<?php echo $employee_role_job_description->job_description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_role_job_description->status->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_status" class="employee_role_job_description_status">
<span<?php echo $employee_role_job_description->status->viewAttributes() ?>>
<?php echo $employee_role_job_description->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $employee_role_job_description->createdby->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_createdby" class="employee_role_job_description_createdby">
<span<?php echo $employee_role_job_description->createdby->viewAttributes() ?>>
<?php echo $employee_role_job_description->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $employee_role_job_description->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_createddatetime" class="employee_role_job_description_createddatetime">
<span<?php echo $employee_role_job_description->createddatetime->viewAttributes() ?>>
<?php echo $employee_role_job_description->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $employee_role_job_description->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_modifiedby" class="employee_role_job_description_modifiedby">
<span<?php echo $employee_role_job_description->modifiedby->viewAttributes() ?>>
<?php echo $employee_role_job_description->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $employee_role_job_description->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_list->RowCnt ?>_employee_role_job_description_modifieddatetime" class="employee_role_job_description_modifieddatetime">
<span<?php echo $employee_role_job_description->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_role_job_description->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_role_job_description_list->ListOptions->render("body", "right", $employee_role_job_description_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_role_job_description->isGridAdd())
		$employee_role_job_description_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_role_job_description->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_role_job_description_list->Recordset)
	$employee_role_job_description_list->Recordset->Close();
?>
<?php if (!$employee_role_job_description->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_role_job_description->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_role_job_description_list->Pager)) $employee_role_job_description_list->Pager = new NumericPager($employee_role_job_description_list->StartRec, $employee_role_job_description_list->DisplayRecs, $employee_role_job_description_list->TotalRecs, $employee_role_job_description_list->RecRange, $employee_role_job_description_list->AutoHidePager) ?>
<?php if ($employee_role_job_description_list->Pager->RecordCount > 0 && $employee_role_job_description_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_role_job_description_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_role_job_description_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_role_job_description_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_role_job_description_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_role_job_description_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_role_job_description_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_role_job_description_list->pageUrl() ?>start=<?php echo $employee_role_job_description_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_role_job_description_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_role_job_description_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_role_job_description_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_role_job_description_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_role_job_description_list->TotalRecs > 0 && (!$employee_role_job_description_list->AutoHidePageSizeSelector || $employee_role_job_description_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_role_job_description">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_role_job_description_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_role_job_description_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_role_job_description_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_role_job_description_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_role_job_description_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_role_job_description_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_role_job_description->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_role_job_description_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_role_job_description_list->TotalRecs == 0 && !$employee_role_job_description->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_role_job_description_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_role_job_description_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_role_job_description->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_role_job_description->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_role_job_description", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_role_job_description_list->terminate();
?>