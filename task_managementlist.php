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
$task_management_list = new task_management_list();

// Run the page
$task_management_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$task_management_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$task_management->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftask_managementlist = currentForm = new ew.Form("ftask_managementlist", "list");
ftask_managementlist.formKeyCountName = '<?php echo $task_management_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftask_managementlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftask_managementlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftask_managementlist.lists["x_AssignTo"] = <?php echo $task_management_list->AssignTo->Lookup->toClientList() ?>;
ftask_managementlist.lists["x_AssignTo"].options = <?php echo JsonEncode($task_management_list->AssignTo->lookupOptions()) ?>;
ftask_managementlist.lists["x_StatusOfTask"] = <?php echo $task_management_list->StatusOfTask->Lookup->toClientList() ?>;
ftask_managementlist.lists["x_StatusOfTask"].options = <?php echo JsonEncode($task_management_list->StatusOfTask->options(FALSE, TRUE)) ?>;
ftask_managementlist.lists["x_ForwardTo"] = <?php echo $task_management_list->ForwardTo->Lookup->toClientList() ?>;
ftask_managementlist.lists["x_ForwardTo"].options = <?php echo JsonEncode($task_management_list->ForwardTo->lookupOptions()) ?>;

// Form object for search
var ftask_managementlistsrch = currentSearchForm = new ew.Form("ftask_managementlistsrch");

// Filters
ftask_managementlistsrch.filterList = <?php echo $task_management_list->getFilterList() ?>;
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
<?php if (!$task_management->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($task_management_list->TotalRecs > 0 && $task_management_list->ExportOptions->visible()) { ?>
<?php $task_management_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($task_management_list->ImportOptions->visible()) { ?>
<?php $task_management_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($task_management_list->SearchOptions->visible()) { ?>
<?php $task_management_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($task_management_list->FilterOptions->visible()) { ?>
<?php $task_management_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$task_management_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$task_management->isExport() && !$task_management->CurrentAction) { ?>
<form name="ftask_managementlistsrch" id="ftask_managementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($task_management_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftask_managementlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="task_management">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($task_management_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($task_management_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $task_management_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $task_management_list->showPageHeader(); ?>
<?php
$task_management_list->showMessage();
?>
<?php if ($task_management_list->TotalRecs > 0 || $task_management->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($task_management_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> task_management">
<?php if (!$task_management->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$task_management->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($task_management_list->Pager)) $task_management_list->Pager = new NumericPager($task_management_list->StartRec, $task_management_list->DisplayRecs, $task_management_list->TotalRecs, $task_management_list->RecRange, $task_management_list->AutoHidePager) ?>
<?php if ($task_management_list->Pager->RecordCount > 0 && $task_management_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($task_management_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($task_management_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($task_management_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $task_management_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($task_management_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($task_management_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($task_management_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $task_management_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $task_management_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $task_management_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($task_management_list->TotalRecs > 0 && (!$task_management_list->AutoHidePageSizeSelector || $task_management_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="task_management">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($task_management_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($task_management_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($task_management_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($task_management_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($task_management_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($task_management_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($task_management->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $task_management_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftask_managementlist" id="ftask_managementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($task_management_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $task_management_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<div id="gmp_task_management" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($task_management_list->TotalRecs > 0 || $task_management->isGridEdit()) { ?>
<table id="tbl_task_managementlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$task_management_list->RowType = ROWTYPE_HEADER;

// Render list options
$task_management_list->renderListOptions();

// Render list options (header, left)
$task_management_list->ListOptions->render("header", "left");
?>
<?php if ($task_management->id->Visible) { // id ?>
	<?php if ($task_management->sortUrl($task_management->id) == "") { ?>
		<th data-name="id" class="<?php echo $task_management->id->headerCellClass() ?>"><div id="elh_task_management_id" class="task_management_id"><div class="ew-table-header-caption"><?php echo $task_management->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $task_management->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->id) ?>',1);"><div id="elh_task_management_id" class="task_management_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->TaskName->Visible) { // TaskName ?>
	<?php if ($task_management->sortUrl($task_management->TaskName) == "") { ?>
		<th data-name="TaskName" class="<?php echo $task_management->TaskName->headerCellClass() ?>"><div id="elh_task_management_TaskName" class="task_management_TaskName"><div class="ew-table-header-caption"><?php echo $task_management->TaskName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaskName" class="<?php echo $task_management->TaskName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->TaskName) ?>',1);"><div id="elh_task_management_TaskName" class="task_management_TaskName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->TaskName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management->TaskName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->TaskName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->AssignTo->Visible) { // AssignTo ?>
	<?php if ($task_management->sortUrl($task_management->AssignTo) == "") { ?>
		<th data-name="AssignTo" class="<?php echo $task_management->AssignTo->headerCellClass() ?>"><div id="elh_task_management_AssignTo" class="task_management_AssignTo"><div class="ew-table-header-caption"><?php echo $task_management->AssignTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AssignTo" class="<?php echo $task_management->AssignTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->AssignTo) ?>',1);"><div id="elh_task_management_AssignTo" class="task_management_AssignTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->AssignTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->AssignTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->AssignTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->StartDate->Visible) { // StartDate ?>
	<?php if ($task_management->sortUrl($task_management->StartDate) == "") { ?>
		<th data-name="StartDate" class="<?php echo $task_management->StartDate->headerCellClass() ?>"><div id="elh_task_management_StartDate" class="task_management_StartDate"><div class="ew-table-header-caption"><?php echo $task_management->StartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StartDate" class="<?php echo $task_management->StartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->StartDate) ?>',1);"><div id="elh_task_management_StartDate" class="task_management_StartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->StartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->StartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->StartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->EndDate->Visible) { // EndDate ?>
	<?php if ($task_management->sortUrl($task_management->EndDate) == "") { ?>
		<th data-name="EndDate" class="<?php echo $task_management->EndDate->headerCellClass() ?>"><div id="elh_task_management_EndDate" class="task_management_EndDate"><div class="ew-table-header-caption"><?php echo $task_management->EndDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndDate" class="<?php echo $task_management->EndDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->EndDate) ?>',1);"><div id="elh_task_management_EndDate" class="task_management_EndDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->EndDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->EndDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->EndDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->StatusOfTask->Visible) { // StatusOfTask ?>
	<?php if ($task_management->sortUrl($task_management->StatusOfTask) == "") { ?>
		<th data-name="StatusOfTask" class="<?php echo $task_management->StatusOfTask->headerCellClass() ?>"><div id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask"><div class="ew-table-header-caption"><?php echo $task_management->StatusOfTask->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StatusOfTask" class="<?php echo $task_management->StatusOfTask->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->StatusOfTask) ?>',1);"><div id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->StatusOfTask->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->StatusOfTask->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->StatusOfTask->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->ForwardTo->Visible) { // ForwardTo ?>
	<?php if ($task_management->sortUrl($task_management->ForwardTo) == "") { ?>
		<th data-name="ForwardTo" class="<?php echo $task_management->ForwardTo->headerCellClass() ?>"><div id="elh_task_management_ForwardTo" class="task_management_ForwardTo"><div class="ew-table-header-caption"><?php echo $task_management->ForwardTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForwardTo" class="<?php echo $task_management->ForwardTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->ForwardTo) ?>',1);"><div id="elh_task_management_ForwardTo" class="task_management_ForwardTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->ForwardTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->ForwardTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->ForwardTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->createdby->Visible) { // createdby ?>
	<?php if ($task_management->sortUrl($task_management->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $task_management->createdby->headerCellClass() ?>"><div id="elh_task_management_createdby" class="task_management_createdby"><div class="ew-table-header-caption"><?php echo $task_management->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $task_management->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->createdby) ?>',1);"><div id="elh_task_management_createdby" class="task_management_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->createddatetime->Visible) { // createddatetime ?>
	<?php if ($task_management->sortUrl($task_management->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $task_management->createddatetime->headerCellClass() ?>"><div id="elh_task_management_createddatetime" class="task_management_createddatetime"><div class="ew-table-header-caption"><?php echo $task_management->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $task_management->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->createddatetime) ?>',1);"><div id="elh_task_management_createddatetime" class="task_management_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->modifiedby->Visible) { // modifiedby ?>
	<?php if ($task_management->sortUrl($task_management->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $task_management->modifiedby->headerCellClass() ?>"><div id="elh_task_management_modifiedby" class="task_management_modifiedby"><div class="ew-table-header-caption"><?php echo $task_management->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $task_management->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->modifiedby) ?>',1);"><div id="elh_task_management_modifiedby" class="task_management_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($task_management->sortUrl($task_management->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $task_management->modifieddatetime->headerCellClass() ?>"><div id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime"><div class="ew-table-header-caption"><?php echo $task_management->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $task_management->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->modifieddatetime) ?>',1);"><div id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->GetUserName->Visible) { // GetUserName ?>
	<?php if ($task_management->sortUrl($task_management->GetUserName) == "") { ?>
		<th data-name="GetUserName" class="<?php echo $task_management->GetUserName->headerCellClass() ?>"><div id="elh_task_management_GetUserName" class="task_management_GetUserName"><div class="ew-table-header-caption"><?php echo $task_management->GetUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetUserName" class="<?php echo $task_management->GetUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->GetUserName) ?>',1);"><div id="elh_task_management_GetUserName" class="task_management_GetUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->GetUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management->GetUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->GetUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->GetModifiedName->Visible) { // GetModifiedName ?>
	<?php if ($task_management->sortUrl($task_management->GetModifiedName) == "") { ?>
		<th data-name="GetModifiedName" class="<?php echo $task_management->GetModifiedName->headerCellClass() ?>"><div id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName"><div class="ew-table-header-caption"><?php echo $task_management->GetModifiedName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetModifiedName" class="<?php echo $task_management->GetModifiedName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->GetModifiedName) ?>',1);"><div id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->GetModifiedName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management->GetModifiedName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->GetModifiedName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management->HospID->Visible) { // HospID ?>
	<?php if ($task_management->sortUrl($task_management->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $task_management->HospID->headerCellClass() ?>"><div id="elh_task_management_HospID" class="task_management_HospID"><div class="ew-table-header-caption"><?php echo $task_management->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $task_management->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $task_management->SortUrl($task_management->HospID) ?>',1);"><div id="elh_task_management_HospID" class="task_management_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($task_management->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$task_management_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($task_management->ExportAll && $task_management->isExport()) {
	$task_management_list->StopRec = $task_management_list->TotalRecs;
} else {

	// Set the last record to display
	if ($task_management_list->TotalRecs > $task_management_list->StartRec + $task_management_list->DisplayRecs - 1)
		$task_management_list->StopRec = $task_management_list->StartRec + $task_management_list->DisplayRecs - 1;
	else
		$task_management_list->StopRec = $task_management_list->TotalRecs;
}
$task_management_list->RecCnt = $task_management_list->StartRec - 1;
if ($task_management_list->Recordset && !$task_management_list->Recordset->EOF) {
	$task_management_list->Recordset->moveFirst();
	$selectLimit = $task_management_list->UseSelectLimit;
	if (!$selectLimit && $task_management_list->StartRec > 1)
		$task_management_list->Recordset->move($task_management_list->StartRec - 1);
} elseif (!$task_management->AllowAddDeleteRow && $task_management_list->StopRec == 0) {
	$task_management_list->StopRec = $task_management->GridAddRowCount;
}

// Initialize aggregate
$task_management->RowType = ROWTYPE_AGGREGATEINIT;
$task_management->resetAttributes();
$task_management_list->renderRow();
while ($task_management_list->RecCnt < $task_management_list->StopRec) {
	$task_management_list->RecCnt++;
	if ($task_management_list->RecCnt >= $task_management_list->StartRec) {
		$task_management_list->RowCnt++;

		// Set up key count
		$task_management_list->KeyCount = $task_management_list->RowIndex;

		// Init row class and style
		$task_management->resetAttributes();
		$task_management->CssClass = "";
		if ($task_management->isGridAdd()) {
		} else {
			$task_management_list->loadRowValues($task_management_list->Recordset); // Load row values
		}
		$task_management->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$task_management->RowAttrs = array_merge($task_management->RowAttrs, array('data-rowindex'=>$task_management_list->RowCnt, 'id'=>'r' . $task_management_list->RowCnt . '_task_management', 'data-rowtype'=>$task_management->RowType));

		// Render row
		$task_management_list->renderRow();

		// Render list options
		$task_management_list->renderListOptions();
?>
	<tr<?php echo $task_management->rowAttributes() ?>>
<?php

// Render list options (body, left)
$task_management_list->ListOptions->render("body", "left", $task_management_list->RowCnt);
?>
	<?php if ($task_management->id->Visible) { // id ?>
		<td data-name="id"<?php echo $task_management->id->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_id" class="task_management_id">
<span<?php echo $task_management->id->viewAttributes() ?>>
<?php echo $task_management->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->TaskName->Visible) { // TaskName ?>
		<td data-name="TaskName"<?php echo $task_management->TaskName->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_TaskName" class="task_management_TaskName">
<span<?php echo $task_management->TaskName->viewAttributes() ?>>
<?php echo $task_management->TaskName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->AssignTo->Visible) { // AssignTo ?>
		<td data-name="AssignTo"<?php echo $task_management->AssignTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_AssignTo" class="task_management_AssignTo">
<span<?php echo $task_management->AssignTo->viewAttributes() ?>>
<?php echo $task_management->AssignTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->StartDate->Visible) { // StartDate ?>
		<td data-name="StartDate"<?php echo $task_management->StartDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_StartDate" class="task_management_StartDate">
<span<?php echo $task_management->StartDate->viewAttributes() ?>>
<?php echo $task_management->StartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->EndDate->Visible) { // EndDate ?>
		<td data-name="EndDate"<?php echo $task_management->EndDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_EndDate" class="task_management_EndDate">
<span<?php echo $task_management->EndDate->viewAttributes() ?>>
<?php echo $task_management->EndDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->StatusOfTask->Visible) { // StatusOfTask ?>
		<td data-name="StatusOfTask"<?php echo $task_management->StatusOfTask->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_StatusOfTask" class="task_management_StatusOfTask">
<span<?php echo $task_management->StatusOfTask->viewAttributes() ?>>
<?php echo $task_management->StatusOfTask->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->ForwardTo->Visible) { // ForwardTo ?>
		<td data-name="ForwardTo"<?php echo $task_management->ForwardTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_ForwardTo" class="task_management_ForwardTo">
<span<?php echo $task_management->ForwardTo->viewAttributes() ?>>
<?php echo $task_management->ForwardTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $task_management->createdby->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_createdby" class="task_management_createdby">
<span<?php echo $task_management->createdby->viewAttributes() ?>>
<?php echo $task_management->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $task_management->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_createddatetime" class="task_management_createddatetime">
<span<?php echo $task_management->createddatetime->viewAttributes() ?>>
<?php echo $task_management->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $task_management->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_modifiedby" class="task_management_modifiedby">
<span<?php echo $task_management->modifiedby->viewAttributes() ?>>
<?php echo $task_management->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $task_management->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_modifieddatetime" class="task_management_modifieddatetime">
<span<?php echo $task_management->modifieddatetime->viewAttributes() ?>>
<?php echo $task_management->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName"<?php echo $task_management->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_GetUserName" class="task_management_GetUserName">
<span<?php echo $task_management->GetUserName->viewAttributes() ?>>
<?php echo $task_management->GetUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->GetModifiedName->Visible) { // GetModifiedName ?>
		<td data-name="GetModifiedName"<?php echo $task_management->GetModifiedName->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_GetModifiedName" class="task_management_GetModifiedName">
<span<?php echo $task_management->GetModifiedName->viewAttributes() ?>>
<?php echo $task_management->GetModifiedName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $task_management->HospID->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCnt ?>_task_management_HospID" class="task_management_HospID">
<span<?php echo $task_management->HospID->viewAttributes() ?>>
<?php echo $task_management->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$task_management_list->ListOptions->render("body", "right", $task_management_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$task_management->isGridAdd())
		$task_management_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$task_management->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($task_management_list->Recordset)
	$task_management_list->Recordset->Close();
?>
<?php if (!$task_management->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$task_management->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($task_management_list->Pager)) $task_management_list->Pager = new NumericPager($task_management_list->StartRec, $task_management_list->DisplayRecs, $task_management_list->TotalRecs, $task_management_list->RecRange, $task_management_list->AutoHidePager) ?>
<?php if ($task_management_list->Pager->RecordCount > 0 && $task_management_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($task_management_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($task_management_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($task_management_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $task_management_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($task_management_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($task_management_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $task_management_list->pageUrl() ?>start=<?php echo $task_management_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($task_management_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $task_management_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $task_management_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $task_management_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($task_management_list->TotalRecs > 0 && (!$task_management_list->AutoHidePageSizeSelector || $task_management_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="task_management">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($task_management_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($task_management_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($task_management_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($task_management_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($task_management_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($task_management_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($task_management->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $task_management_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($task_management_list->TotalRecs == 0 && !$task_management->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $task_management_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$task_management_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$task_management->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$task_management->isExport()) { ?>
<script>
ew.scrollableTable("gmp_task_management", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$task_management_list->terminate();
?>