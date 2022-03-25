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
$mas_employee_role_job_description_list = new mas_employee_role_job_description_list();

// Run the page
$mas_employee_role_job_description_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_employee_role_job_description_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_employee_role_job_descriptionlist = currentForm = new ew.Form("fmas_employee_role_job_descriptionlist", "list");
fmas_employee_role_job_descriptionlist.formKeyCountName = '<?php echo $mas_employee_role_job_description_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_employee_role_job_descriptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_employee_role_job_descriptionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_employee_role_job_descriptionlist.lists["x_status"] = <?php echo $mas_employee_role_job_description_list->status->Lookup->toClientList() ?>;
fmas_employee_role_job_descriptionlist.lists["x_status"].options = <?php echo JsonEncode($mas_employee_role_job_description_list->status->lookupOptions()) ?>;

// Form object for search
var fmas_employee_role_job_descriptionlistsrch = currentSearchForm = new ew.Form("fmas_employee_role_job_descriptionlistsrch");

// Filters
fmas_employee_role_job_descriptionlistsrch.filterList = <?php echo $mas_employee_role_job_description_list->getFilterList() ?>;
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
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_employee_role_job_description_list->TotalRecs > 0 && $mas_employee_role_job_description_list->ExportOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->ImportOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->SearchOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->FilterOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_employee_role_job_description_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_employee_role_job_description->isExport() && !$mas_employee_role_job_description->CurrentAction) { ?>
<form name="fmas_employee_role_job_descriptionlistsrch" id="fmas_employee_role_job_descriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_employee_role_job_description_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_employee_role_job_descriptionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_employee_role_job_description">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_employee_role_job_description_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_employee_role_job_description_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_employee_role_job_description_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_employee_role_job_description_list->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_list->showMessage();
?>
<?php if ($mas_employee_role_job_description_list->TotalRecs > 0 || $mas_employee_role_job_description->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_employee_role_job_description_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_employee_role_job_description">
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_employee_role_job_description->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_employee_role_job_description_list->Pager)) $mas_employee_role_job_description_list->Pager = new NumericPager($mas_employee_role_job_description_list->StartRec, $mas_employee_role_job_description_list->DisplayRecs, $mas_employee_role_job_description_list->TotalRecs, $mas_employee_role_job_description_list->RecRange, $mas_employee_role_job_description_list->AutoHidePager) ?>
<?php if ($mas_employee_role_job_description_list->Pager->RecordCount > 0 && $mas_employee_role_job_description_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_employee_role_job_description_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_employee_role_job_description_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_employee_role_job_description_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_employee_role_job_description_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_employee_role_job_description_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_employee_role_job_description_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->TotalRecs > 0 && (!$mas_employee_role_job_description_list->AutoHidePageSizeSelector || $mas_employee_role_job_description_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_employee_role_job_description">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_employee_role_job_description->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_employee_role_job_description_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_employee_role_job_descriptionlist" id="fmas_employee_role_job_descriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_employee_role_job_description_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_employee_role_job_description_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<div id="gmp_mas_employee_role_job_description" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_employee_role_job_description_list->TotalRecs > 0 || $mas_employee_role_job_description->isGridEdit()) { ?>
<table id="tbl_mas_employee_role_job_descriptionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_employee_role_job_description_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_employee_role_job_description_list->renderListOptions();

// Render list options (header, left)
$mas_employee_role_job_description_list->ListOptions->render("header", "left");
?>
<?php if ($mas_employee_role_job_description->id->Visible) { // id ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_employee_role_job_description->id->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_employee_role_job_description->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->id) ?>',1);"><div id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->role->Visible) { // role ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->role) == "") { ?>
		<th data-name="role" class="<?php echo $mas_employee_role_job_description->role->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->role->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="role" class="<?php echo $mas_employee_role_job_description->role->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->role) ?>',1);"><div id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->role->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->role->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->role->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->job_description->Visible) { // job_description ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->job_description) == "") { ?>
		<th data-name="job_description" class="<?php echo $mas_employee_role_job_description->job_description->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->job_description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_description" class="<?php echo $mas_employee_role_job_description->job_description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->job_description) ?>',1);"><div id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->job_description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->job_description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->job_description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->status->Visible) { // status ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->status) == "") { ?>
		<th data-name="status" class="<?php echo $mas_employee_role_job_description->status->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $mas_employee_role_job_description->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->status) ?>',1);"><div id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->createdby->Visible) { // createdby ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $mas_employee_role_job_description->createdby->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $mas_employee_role_job_description->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->createdby) ?>',1);"><div id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $mas_employee_role_job_description->createddatetime->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $mas_employee_role_job_description->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->createddatetime) ?>',1);"><div id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $mas_employee_role_job_description->modifiedby->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $mas_employee_role_job_description->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->modifiedby) ?>',1);"><div id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($mas_employee_role_job_description->sortUrl($mas_employee_role_job_description->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $mas_employee_role_job_description->modifieddatetime->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $mas_employee_role_job_description->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_employee_role_job_description->SortUrl($mas_employee_role_job_description->modifieddatetime) ?>',1);"><div id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_employee_role_job_description_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_employee_role_job_description->ExportAll && $mas_employee_role_job_description->isExport()) {
	$mas_employee_role_job_description_list->StopRec = $mas_employee_role_job_description_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_employee_role_job_description_list->TotalRecs > $mas_employee_role_job_description_list->StartRec + $mas_employee_role_job_description_list->DisplayRecs - 1)
		$mas_employee_role_job_description_list->StopRec = $mas_employee_role_job_description_list->StartRec + $mas_employee_role_job_description_list->DisplayRecs - 1;
	else
		$mas_employee_role_job_description_list->StopRec = $mas_employee_role_job_description_list->TotalRecs;
}
$mas_employee_role_job_description_list->RecCnt = $mas_employee_role_job_description_list->StartRec - 1;
if ($mas_employee_role_job_description_list->Recordset && !$mas_employee_role_job_description_list->Recordset->EOF) {
	$mas_employee_role_job_description_list->Recordset->moveFirst();
	$selectLimit = $mas_employee_role_job_description_list->UseSelectLimit;
	if (!$selectLimit && $mas_employee_role_job_description_list->StartRec > 1)
		$mas_employee_role_job_description_list->Recordset->move($mas_employee_role_job_description_list->StartRec - 1);
} elseif (!$mas_employee_role_job_description->AllowAddDeleteRow && $mas_employee_role_job_description_list->StopRec == 0) {
	$mas_employee_role_job_description_list->StopRec = $mas_employee_role_job_description->GridAddRowCount;
}

// Initialize aggregate
$mas_employee_role_job_description->RowType = ROWTYPE_AGGREGATEINIT;
$mas_employee_role_job_description->resetAttributes();
$mas_employee_role_job_description_list->renderRow();
while ($mas_employee_role_job_description_list->RecCnt < $mas_employee_role_job_description_list->StopRec) {
	$mas_employee_role_job_description_list->RecCnt++;
	if ($mas_employee_role_job_description_list->RecCnt >= $mas_employee_role_job_description_list->StartRec) {
		$mas_employee_role_job_description_list->RowCnt++;

		// Set up key count
		$mas_employee_role_job_description_list->KeyCount = $mas_employee_role_job_description_list->RowIndex;

		// Init row class and style
		$mas_employee_role_job_description->resetAttributes();
		$mas_employee_role_job_description->CssClass = "";
		if ($mas_employee_role_job_description->isGridAdd()) {
		} else {
			$mas_employee_role_job_description_list->loadRowValues($mas_employee_role_job_description_list->Recordset); // Load row values
		}
		$mas_employee_role_job_description->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_employee_role_job_description->RowAttrs = array_merge($mas_employee_role_job_description->RowAttrs, array('data-rowindex'=>$mas_employee_role_job_description_list->RowCnt, 'id'=>'r' . $mas_employee_role_job_description_list->RowCnt . '_mas_employee_role_job_description', 'data-rowtype'=>$mas_employee_role_job_description->RowType));

		// Render row
		$mas_employee_role_job_description_list->renderRow();

		// Render list options
		$mas_employee_role_job_description_list->renderListOptions();
?>
	<tr<?php echo $mas_employee_role_job_description->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_employee_role_job_description_list->ListOptions->render("body", "left", $mas_employee_role_job_description_list->RowCnt);
?>
	<?php if ($mas_employee_role_job_description->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_employee_role_job_description->id->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id">
<span<?php echo $mas_employee_role_job_description->id->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->role->Visible) { // role ?>
		<td data-name="role"<?php echo $mas_employee_role_job_description->role->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role">
<span<?php echo $mas_employee_role_job_description->role->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->role->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->job_description->Visible) { // job_description ?>
		<td data-name="job_description"<?php echo $mas_employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description">
<span<?php echo $mas_employee_role_job_description->job_description->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->job_description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->status->Visible) { // status ?>
		<td data-name="status"<?php echo $mas_employee_role_job_description->status->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status">
<span<?php echo $mas_employee_role_job_description->status->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $mas_employee_role_job_description->createdby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby">
<span<?php echo $mas_employee_role_job_description->createdby->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $mas_employee_role_job_description->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime">
<span<?php echo $mas_employee_role_job_description->createddatetime->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $mas_employee_role_job_description->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby">
<span<?php echo $mas_employee_role_job_description->modifiedby->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $mas_employee_role_job_description->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCnt ?>_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime">
<span<?php echo $mas_employee_role_job_description->modifieddatetime->viewAttributes() ?>>
<?php echo $mas_employee_role_job_description->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_employee_role_job_description_list->ListOptions->render("body", "right", $mas_employee_role_job_description_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_employee_role_job_description->isGridAdd())
		$mas_employee_role_job_description_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_employee_role_job_description->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_employee_role_job_description_list->Recordset)
	$mas_employee_role_job_description_list->Recordset->Close();
?>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_employee_role_job_description->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_employee_role_job_description_list->Pager)) $mas_employee_role_job_description_list->Pager = new NumericPager($mas_employee_role_job_description_list->StartRec, $mas_employee_role_job_description_list->DisplayRecs, $mas_employee_role_job_description_list->TotalRecs, $mas_employee_role_job_description_list->RecRange, $mas_employee_role_job_description_list->AutoHidePager) ?>
<?php if ($mas_employee_role_job_description_list->Pager->RecordCount > 0 && $mas_employee_role_job_description_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_employee_role_job_description_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_employee_role_job_description_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_employee_role_job_description_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_employee_role_job_description_list->pageUrl() ?>start=<?php echo $mas_employee_role_job_description_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_employee_role_job_description_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_employee_role_job_description_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_employee_role_job_description_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->TotalRecs > 0 && (!$mas_employee_role_job_description_list->AutoHidePageSizeSelector || $mas_employee_role_job_description_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_employee_role_job_description">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_employee_role_job_description_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_employee_role_job_description->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_employee_role_job_description_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_employee_role_job_description_list->TotalRecs == 0 && !$mas_employee_role_job_description->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_employee_role_job_description_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_employee_role_job_description_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_employee_role_job_description", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_employee_role_job_description_list->terminate();
?>