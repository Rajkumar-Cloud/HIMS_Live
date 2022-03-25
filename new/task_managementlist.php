<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$task_management_list->isExport()) { ?>
<script>
var ftask_managementlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ftask_managementlist = currentForm = new ew.Form("ftask_managementlist", "list");
	ftask_managementlist.formKeyCountName = '<?php echo $task_management_list->FormKeyCountName ?>';
	loadjs.done("ftask_managementlist");
});
var ftask_managementlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ftask_managementlistsrch = currentSearchForm = new ew.Form("ftask_managementlistsrch");

	// Dynamic selection lists
	// Filters

	ftask_managementlistsrch.filterList = <?php echo $task_management_list->getFilterList() ?>;
	loadjs.done("ftask_managementlistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$task_management_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($task_management_list->TotalRecords > 0 && $task_management_list->ExportOptions->visible()) { ?>
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
<?php if (!$task_management_list->isExport() && !$task_management->CurrentAction) { ?>
<form name="ftask_managementlistsrch" id="ftask_managementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ftask_managementlistsrch-search-panel" class="<?php echo $task_management_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="task_management">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $task_management_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($task_management_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($task_management_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $task_management_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($task_management_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $task_management_list->showPageHeader(); ?>
<?php
$task_management_list->showMessage();
?>
<?php if ($task_management_list->TotalRecords > 0 || $task_management->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($task_management_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> task_management">
<?php if (!$task_management_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$task_management_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $task_management_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $task_management_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftask_managementlist" id="ftask_managementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<div id="gmp_task_management" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($task_management_list->TotalRecords > 0 || $task_management_list->isGridEdit()) { ?>
<table id="tbl_task_managementlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$task_management->RowType = ROWTYPE_HEADER;

// Render list options
$task_management_list->renderListOptions();

// Render list options (header, left)
$task_management_list->ListOptions->render("header", "left");
?>
<?php if ($task_management_list->id->Visible) { // id ?>
	<?php if ($task_management_list->SortUrl($task_management_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $task_management_list->id->headerCellClass() ?>"><div id="elh_task_management_id" class="task_management_id"><div class="ew-table-header-caption"><?php echo $task_management_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $task_management_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->id) ?>', 1);"><div id="elh_task_management_id" class="task_management_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->TaskName->Visible) { // TaskName ?>
	<?php if ($task_management_list->SortUrl($task_management_list->TaskName) == "") { ?>
		<th data-name="TaskName" class="<?php echo $task_management_list->TaskName->headerCellClass() ?>"><div id="elh_task_management_TaskName" class="task_management_TaskName"><div class="ew-table-header-caption"><?php echo $task_management_list->TaskName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaskName" class="<?php echo $task_management_list->TaskName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->TaskName) ?>', 1);"><div id="elh_task_management_TaskName" class="task_management_TaskName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->TaskName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->TaskName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->TaskName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->AssignTo->Visible) { // AssignTo ?>
	<?php if ($task_management_list->SortUrl($task_management_list->AssignTo) == "") { ?>
		<th data-name="AssignTo" class="<?php echo $task_management_list->AssignTo->headerCellClass() ?>"><div id="elh_task_management_AssignTo" class="task_management_AssignTo"><div class="ew-table-header-caption"><?php echo $task_management_list->AssignTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AssignTo" class="<?php echo $task_management_list->AssignTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->AssignTo) ?>', 1);"><div id="elh_task_management_AssignTo" class="task_management_AssignTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->AssignTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->AssignTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->AssignTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->StartDate->Visible) { // StartDate ?>
	<?php if ($task_management_list->SortUrl($task_management_list->StartDate) == "") { ?>
		<th data-name="StartDate" class="<?php echo $task_management_list->StartDate->headerCellClass() ?>"><div id="elh_task_management_StartDate" class="task_management_StartDate"><div class="ew-table-header-caption"><?php echo $task_management_list->StartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StartDate" class="<?php echo $task_management_list->StartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->StartDate) ?>', 1);"><div id="elh_task_management_StartDate" class="task_management_StartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->StartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->StartDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->StartDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->EndDate->Visible) { // EndDate ?>
	<?php if ($task_management_list->SortUrl($task_management_list->EndDate) == "") { ?>
		<th data-name="EndDate" class="<?php echo $task_management_list->EndDate->headerCellClass() ?>"><div id="elh_task_management_EndDate" class="task_management_EndDate"><div class="ew-table-header-caption"><?php echo $task_management_list->EndDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndDate" class="<?php echo $task_management_list->EndDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->EndDate) ?>', 1);"><div id="elh_task_management_EndDate" class="task_management_EndDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->EndDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->EndDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->EndDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->StatusOfTask->Visible) { // StatusOfTask ?>
	<?php if ($task_management_list->SortUrl($task_management_list->StatusOfTask) == "") { ?>
		<th data-name="StatusOfTask" class="<?php echo $task_management_list->StatusOfTask->headerCellClass() ?>"><div id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask"><div class="ew-table-header-caption"><?php echo $task_management_list->StatusOfTask->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StatusOfTask" class="<?php echo $task_management_list->StatusOfTask->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->StatusOfTask) ?>', 1);"><div id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->StatusOfTask->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->StatusOfTask->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->StatusOfTask->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->ForwardTo->Visible) { // ForwardTo ?>
	<?php if ($task_management_list->SortUrl($task_management_list->ForwardTo) == "") { ?>
		<th data-name="ForwardTo" class="<?php echo $task_management_list->ForwardTo->headerCellClass() ?>"><div id="elh_task_management_ForwardTo" class="task_management_ForwardTo"><div class="ew-table-header-caption"><?php echo $task_management_list->ForwardTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForwardTo" class="<?php echo $task_management_list->ForwardTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->ForwardTo) ?>', 1);"><div id="elh_task_management_ForwardTo" class="task_management_ForwardTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->ForwardTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->ForwardTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->ForwardTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->createdby->Visible) { // createdby ?>
	<?php if ($task_management_list->SortUrl($task_management_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $task_management_list->createdby->headerCellClass() ?>"><div id="elh_task_management_createdby" class="task_management_createdby"><div class="ew-table-header-caption"><?php echo $task_management_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $task_management_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->createdby) ?>', 1);"><div id="elh_task_management_createdby" class="task_management_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($task_management_list->SortUrl($task_management_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $task_management_list->createddatetime->headerCellClass() ?>"><div id="elh_task_management_createddatetime" class="task_management_createddatetime"><div class="ew-table-header-caption"><?php echo $task_management_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $task_management_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->createddatetime) ?>', 1);"><div id="elh_task_management_createddatetime" class="task_management_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($task_management_list->SortUrl($task_management_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $task_management_list->modifiedby->headerCellClass() ?>"><div id="elh_task_management_modifiedby" class="task_management_modifiedby"><div class="ew-table-header-caption"><?php echo $task_management_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $task_management_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->modifiedby) ?>', 1);"><div id="elh_task_management_modifiedby" class="task_management_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($task_management_list->SortUrl($task_management_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $task_management_list->modifieddatetime->headerCellClass() ?>"><div id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime"><div class="ew-table-header-caption"><?php echo $task_management_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $task_management_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->modifieddatetime) ?>', 1);"><div id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->GetUserName->Visible) { // GetUserName ?>
	<?php if ($task_management_list->SortUrl($task_management_list->GetUserName) == "") { ?>
		<th data-name="GetUserName" class="<?php echo $task_management_list->GetUserName->headerCellClass() ?>"><div id="elh_task_management_GetUserName" class="task_management_GetUserName"><div class="ew-table-header-caption"><?php echo $task_management_list->GetUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetUserName" class="<?php echo $task_management_list->GetUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->GetUserName) ?>', 1);"><div id="elh_task_management_GetUserName" class="task_management_GetUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->GetUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->GetUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->GetUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->GetModifiedName->Visible) { // GetModifiedName ?>
	<?php if ($task_management_list->SortUrl($task_management_list->GetModifiedName) == "") { ?>
		<th data-name="GetModifiedName" class="<?php echo $task_management_list->GetModifiedName->headerCellClass() ?>"><div id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName"><div class="ew-table-header-caption"><?php echo $task_management_list->GetModifiedName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetModifiedName" class="<?php echo $task_management_list->GetModifiedName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->GetModifiedName) ?>', 1);"><div id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->GetModifiedName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->GetModifiedName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->GetModifiedName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($task_management_list->HospID->Visible) { // HospID ?>
	<?php if ($task_management_list->SortUrl($task_management_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $task_management_list->HospID->headerCellClass() ?>"><div id="elh_task_management_HospID" class="task_management_HospID"><div class="ew-table-header-caption"><?php echo $task_management_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $task_management_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $task_management_list->SortUrl($task_management_list->HospID) ?>', 1);"><div id="elh_task_management_HospID" class="task_management_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $task_management_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($task_management_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($task_management_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($task_management_list->ExportAll && $task_management_list->isExport()) {
	$task_management_list->StopRecord = $task_management_list->TotalRecords;
} else {

	// Set the last record to display
	if ($task_management_list->TotalRecords > $task_management_list->StartRecord + $task_management_list->DisplayRecords - 1)
		$task_management_list->StopRecord = $task_management_list->StartRecord + $task_management_list->DisplayRecords - 1;
	else
		$task_management_list->StopRecord = $task_management_list->TotalRecords;
}
$task_management_list->RecordCount = $task_management_list->StartRecord - 1;
if ($task_management_list->Recordset && !$task_management_list->Recordset->EOF) {
	$task_management_list->Recordset->moveFirst();
	$selectLimit = $task_management_list->UseSelectLimit;
	if (!$selectLimit && $task_management_list->StartRecord > 1)
		$task_management_list->Recordset->move($task_management_list->StartRecord - 1);
} elseif (!$task_management->AllowAddDeleteRow && $task_management_list->StopRecord == 0) {
	$task_management_list->StopRecord = $task_management->GridAddRowCount;
}

// Initialize aggregate
$task_management->RowType = ROWTYPE_AGGREGATEINIT;
$task_management->resetAttributes();
$task_management_list->renderRow();
while ($task_management_list->RecordCount < $task_management_list->StopRecord) {
	$task_management_list->RecordCount++;
	if ($task_management_list->RecordCount >= $task_management_list->StartRecord) {
		$task_management_list->RowCount++;

		// Set up key count
		$task_management_list->KeyCount = $task_management_list->RowIndex;

		// Init row class and style
		$task_management->resetAttributes();
		$task_management->CssClass = "";
		if ($task_management_list->isGridAdd()) {
		} else {
			$task_management_list->loadRowValues($task_management_list->Recordset); // Load row values
		}
		$task_management->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$task_management->RowAttrs->merge(["data-rowindex" => $task_management_list->RowCount, "id" => "r" . $task_management_list->RowCount . "_task_management", "data-rowtype" => $task_management->RowType]);

		// Render row
		$task_management_list->renderRow();

		// Render list options
		$task_management_list->renderListOptions();
?>
	<tr <?php echo $task_management->rowAttributes() ?>>
<?php

// Render list options (body, left)
$task_management_list->ListOptions->render("body", "left", $task_management_list->RowCount);
?>
	<?php if ($task_management_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $task_management_list->id->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_id">
<span<?php echo $task_management_list->id->viewAttributes() ?>><?php echo $task_management_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->TaskName->Visible) { // TaskName ?>
		<td data-name="TaskName" <?php echo $task_management_list->TaskName->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_TaskName">
<span<?php echo $task_management_list->TaskName->viewAttributes() ?>><?php echo $task_management_list->TaskName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->AssignTo->Visible) { // AssignTo ?>
		<td data-name="AssignTo" <?php echo $task_management_list->AssignTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_AssignTo">
<span<?php echo $task_management_list->AssignTo->viewAttributes() ?>><?php echo $task_management_list->AssignTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->StartDate->Visible) { // StartDate ?>
		<td data-name="StartDate" <?php echo $task_management_list->StartDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_StartDate">
<span<?php echo $task_management_list->StartDate->viewAttributes() ?>><?php echo $task_management_list->StartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->EndDate->Visible) { // EndDate ?>
		<td data-name="EndDate" <?php echo $task_management_list->EndDate->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_EndDate">
<span<?php echo $task_management_list->EndDate->viewAttributes() ?>><?php echo $task_management_list->EndDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->StatusOfTask->Visible) { // StatusOfTask ?>
		<td data-name="StatusOfTask" <?php echo $task_management_list->StatusOfTask->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_StatusOfTask">
<span<?php echo $task_management_list->StatusOfTask->viewAttributes() ?>><?php echo $task_management_list->StatusOfTask->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->ForwardTo->Visible) { // ForwardTo ?>
		<td data-name="ForwardTo" <?php echo $task_management_list->ForwardTo->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_ForwardTo">
<span<?php echo $task_management_list->ForwardTo->viewAttributes() ?>><?php echo $task_management_list->ForwardTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $task_management_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_createdby">
<span<?php echo $task_management_list->createdby->viewAttributes() ?>><?php echo $task_management_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $task_management_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_createddatetime">
<span<?php echo $task_management_list->createddatetime->viewAttributes() ?>><?php echo $task_management_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $task_management_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_modifiedby">
<span<?php echo $task_management_list->modifiedby->viewAttributes() ?>><?php echo $task_management_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $task_management_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_modifieddatetime">
<span<?php echo $task_management_list->modifieddatetime->viewAttributes() ?>><?php echo $task_management_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName" <?php echo $task_management_list->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_GetUserName">
<span<?php echo $task_management_list->GetUserName->viewAttributes() ?>><?php echo $task_management_list->GetUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->GetModifiedName->Visible) { // GetModifiedName ?>
		<td data-name="GetModifiedName" <?php echo $task_management_list->GetModifiedName->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_GetModifiedName">
<span<?php echo $task_management_list->GetModifiedName->viewAttributes() ?>><?php echo $task_management_list->GetModifiedName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($task_management_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $task_management_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $task_management_list->RowCount ?>_task_management_HospID">
<span<?php echo $task_management_list->HospID->viewAttributes() ?>><?php echo $task_management_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$task_management_list->ListOptions->render("body", "right", $task_management_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$task_management_list->isGridAdd())
		$task_management_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$task_management->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($task_management_list->Recordset)
	$task_management_list->Recordset->Close();
?>
<?php if (!$task_management_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$task_management_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $task_management_list->Pager->render() ?>
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
<?php if ($task_management_list->TotalRecords == 0 && !$task_management->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $task_management_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$task_management_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$task_management_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$task_management->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_task_management",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$task_management_list->terminate();
?>