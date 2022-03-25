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
$crm_crmentity_list = new crm_crmentity_list();

// Run the page
$crm_crmentity_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_crmentity_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_crmentity->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_crmentitylist = currentForm = new ew.Form("fcrm_crmentitylist", "list");
fcrm_crmentitylist.formKeyCountName = '<?php echo $crm_crmentity_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_crmentitylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_crmentitylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_crmentitylistsrch = currentSearchForm = new ew.Form("fcrm_crmentitylistsrch");

// Filters
fcrm_crmentitylistsrch.filterList = <?php echo $crm_crmentity_list->getFilterList() ?>;
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
<?php if (!$crm_crmentity->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_crmentity_list->TotalRecs > 0 && $crm_crmentity_list->ExportOptions->visible()) { ?>
<?php $crm_crmentity_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_crmentity_list->ImportOptions->visible()) { ?>
<?php $crm_crmentity_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_crmentity_list->SearchOptions->visible()) { ?>
<?php $crm_crmentity_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_crmentity_list->FilterOptions->visible()) { ?>
<?php $crm_crmentity_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_crmentity_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_crmentity->isExport() && !$crm_crmentity->CurrentAction) { ?>
<form name="fcrm_crmentitylistsrch" id="fcrm_crmentitylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_crmentity_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_crmentitylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_crmentity">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_crmentity_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_crmentity_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_crmentity_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_crmentity_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_crmentity_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_crmentity_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_crmentity_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_crmentity_list->showPageHeader(); ?>
<?php
$crm_crmentity_list->showMessage();
?>
<?php if ($crm_crmentity_list->TotalRecs > 0 || $crm_crmentity->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_crmentity_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_crmentity">
<?php if (!$crm_crmentity->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_crmentity->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_crmentity_list->Pager)) $crm_crmentity_list->Pager = new NumericPager($crm_crmentity_list->StartRec, $crm_crmentity_list->DisplayRecs, $crm_crmentity_list->TotalRecs, $crm_crmentity_list->RecRange, $crm_crmentity_list->AutoHidePager) ?>
<?php if ($crm_crmentity_list->Pager->RecordCount > 0 && $crm_crmentity_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_crmentity_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_crmentity_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_crmentity_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_crmentity_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_crmentity_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_crmentity_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_crmentity_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_crmentity_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_crmentity_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_crmentity_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_crmentity_list->TotalRecs > 0 && (!$crm_crmentity_list->AutoHidePageSizeSelector || $crm_crmentity_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_crmentity">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_crmentity_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_crmentity_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_crmentity_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_crmentity_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_crmentity_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_crmentity_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_crmentity->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_crmentity_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_crmentitylist" id="fcrm_crmentitylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_crmentity_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_crmentity_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<div id="gmp_crm_crmentity" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_crmentity_list->TotalRecs > 0 || $crm_crmentity->isGridEdit()) { ?>
<table id="tbl_crm_crmentitylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_crmentity_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_crmentity_list->renderListOptions();

// Render list options (header, left)
$crm_crmentity_list->ListOptions->render("header", "left");
?>
<?php if ($crm_crmentity->crmid->Visible) { // crmid ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->crmid) == "") { ?>
		<th data-name="crmid" class="<?php echo $crm_crmentity->crmid->headerCellClass() ?>"><div id="elh_crm_crmentity_crmid" class="crm_crmentity_crmid"><div class="ew-table-header-caption"><?php echo $crm_crmentity->crmid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="crmid" class="<?php echo $crm_crmentity->crmid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->crmid) ?>',1);"><div id="elh_crm_crmentity_crmid" class="crm_crmentity_crmid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->crmid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->crmid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->crmid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->smcreatorid->Visible) { // smcreatorid ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->smcreatorid) == "") { ?>
		<th data-name="smcreatorid" class="<?php echo $crm_crmentity->smcreatorid->headerCellClass() ?>"><div id="elh_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid"><div class="ew-table-header-caption"><?php echo $crm_crmentity->smcreatorid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="smcreatorid" class="<?php echo $crm_crmentity->smcreatorid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->smcreatorid) ?>',1);"><div id="elh_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->smcreatorid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->smcreatorid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->smcreatorid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->smownerid->Visible) { // smownerid ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->smownerid) == "") { ?>
		<th data-name="smownerid" class="<?php echo $crm_crmentity->smownerid->headerCellClass() ?>"><div id="elh_crm_crmentity_smownerid" class="crm_crmentity_smownerid"><div class="ew-table-header-caption"><?php echo $crm_crmentity->smownerid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="smownerid" class="<?php echo $crm_crmentity->smownerid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->smownerid) ?>',1);"><div id="elh_crm_crmentity_smownerid" class="crm_crmentity_smownerid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->smownerid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->smownerid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->smownerid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->shownerid->Visible) { // shownerid ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->shownerid) == "") { ?>
		<th data-name="shownerid" class="<?php echo $crm_crmentity->shownerid->headerCellClass() ?>"><div id="elh_crm_crmentity_shownerid" class="crm_crmentity_shownerid"><div class="ew-table-header-caption"><?php echo $crm_crmentity->shownerid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="shownerid" class="<?php echo $crm_crmentity->shownerid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->shownerid) ?>',1);"><div id="elh_crm_crmentity_shownerid" class="crm_crmentity_shownerid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->shownerid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->shownerid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->shownerid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->modifiedby->Visible) { // modifiedby ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $crm_crmentity->modifiedby->headerCellClass() ?>"><div id="elh_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby"><div class="ew-table-header-caption"><?php echo $crm_crmentity->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $crm_crmentity->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->modifiedby) ?>',1);"><div id="elh_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->setype->Visible) { // setype ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->setype) == "") { ?>
		<th data-name="setype" class="<?php echo $crm_crmentity->setype->headerCellClass() ?>"><div id="elh_crm_crmentity_setype" class="crm_crmentity_setype"><div class="ew-table-header-caption"><?php echo $crm_crmentity->setype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="setype" class="<?php echo $crm_crmentity->setype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->setype) ?>',1);"><div id="elh_crm_crmentity_setype" class="crm_crmentity_setype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->setype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->setype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->setype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->createdtime->Visible) { // createdtime ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->createdtime) == "") { ?>
		<th data-name="createdtime" class="<?php echo $crm_crmentity->createdtime->headerCellClass() ?>"><div id="elh_crm_crmentity_createdtime" class="crm_crmentity_createdtime"><div class="ew-table-header-caption"><?php echo $crm_crmentity->createdtime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdtime" class="<?php echo $crm_crmentity->createdtime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->createdtime) ?>',1);"><div id="elh_crm_crmentity_createdtime" class="crm_crmentity_createdtime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->createdtime->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->createdtime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->createdtime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->modifiedtime->Visible) { // modifiedtime ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->modifiedtime) == "") { ?>
		<th data-name="modifiedtime" class="<?php echo $crm_crmentity->modifiedtime->headerCellClass() ?>"><div id="elh_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime"><div class="ew-table-header-caption"><?php echo $crm_crmentity->modifiedtime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedtime" class="<?php echo $crm_crmentity->modifiedtime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->modifiedtime) ?>',1);"><div id="elh_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->modifiedtime->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->modifiedtime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->modifiedtime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->viewedtime->Visible) { // viewedtime ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->viewedtime) == "") { ?>
		<th data-name="viewedtime" class="<?php echo $crm_crmentity->viewedtime->headerCellClass() ?>"><div id="elh_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime"><div class="ew-table-header-caption"><?php echo $crm_crmentity->viewedtime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="viewedtime" class="<?php echo $crm_crmentity->viewedtime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->viewedtime) ?>',1);"><div id="elh_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->viewedtime->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->viewedtime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->viewedtime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->status->Visible) { // status ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->status) == "") { ?>
		<th data-name="status" class="<?php echo $crm_crmentity->status->headerCellClass() ?>"><div id="elh_crm_crmentity_status" class="crm_crmentity_status"><div class="ew-table-header-caption"><?php echo $crm_crmentity->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $crm_crmentity->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->status) ?>',1);"><div id="elh_crm_crmentity_status" class="crm_crmentity_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->version->Visible) { // version ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->version) == "") { ?>
		<th data-name="version" class="<?php echo $crm_crmentity->version->headerCellClass() ?>"><div id="elh_crm_crmentity_version" class="crm_crmentity_version"><div class="ew-table-header-caption"><?php echo $crm_crmentity->version->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="version" class="<?php echo $crm_crmentity->version->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->version) ?>',1);"><div id="elh_crm_crmentity_version" class="crm_crmentity_version">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->version->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->version->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->version->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->presence->Visible) { // presence ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->presence) == "") { ?>
		<th data-name="presence" class="<?php echo $crm_crmentity->presence->headerCellClass() ?>"><div id="elh_crm_crmentity_presence" class="crm_crmentity_presence"><div class="ew-table-header-caption"><?php echo $crm_crmentity->presence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="presence" class="<?php echo $crm_crmentity->presence->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->presence) ?>',1);"><div id="elh_crm_crmentity_presence" class="crm_crmentity_presence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->presence->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->presence->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->presence->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->deleted->Visible) { // deleted ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->deleted) == "") { ?>
		<th data-name="deleted" class="<?php echo $crm_crmentity->deleted->headerCellClass() ?>"><div id="elh_crm_crmentity_deleted" class="crm_crmentity_deleted"><div class="ew-table-header-caption"><?php echo $crm_crmentity->deleted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deleted" class="<?php echo $crm_crmentity->deleted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->deleted) ?>',1);"><div id="elh_crm_crmentity_deleted" class="crm_crmentity_deleted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->deleted->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->deleted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->deleted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->was_read->Visible) { // was_read ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->was_read) == "") { ?>
		<th data-name="was_read" class="<?php echo $crm_crmentity->was_read->headerCellClass() ?>"><div id="elh_crm_crmentity_was_read" class="crm_crmentity_was_read"><div class="ew-table-header-caption"><?php echo $crm_crmentity->was_read->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="was_read" class="<?php echo $crm_crmentity->was_read->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->was_read) ?>',1);"><div id="elh_crm_crmentity_was_read" class="crm_crmentity_was_read">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->was_read->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->was_read->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->was_read->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_crmentity->_private->Visible) { // private ?>
	<?php if ($crm_crmentity->sortUrl($crm_crmentity->_private) == "") { ?>
		<th data-name="_private" class="<?php echo $crm_crmentity->_private->headerCellClass() ?>"><div id="elh_crm_crmentity__private" class="crm_crmentity__private"><div class="ew-table-header-caption"><?php echo $crm_crmentity->_private->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_private" class="<?php echo $crm_crmentity->_private->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_crmentity->SortUrl($crm_crmentity->_private) ?>',1);"><div id="elh_crm_crmentity__private" class="crm_crmentity__private">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_crmentity->_private->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_crmentity->_private->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_crmentity->_private->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_crmentity_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_crmentity->ExportAll && $crm_crmentity->isExport()) {
	$crm_crmentity_list->StopRec = $crm_crmentity_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_crmentity_list->TotalRecs > $crm_crmentity_list->StartRec + $crm_crmentity_list->DisplayRecs - 1)
		$crm_crmentity_list->StopRec = $crm_crmentity_list->StartRec + $crm_crmentity_list->DisplayRecs - 1;
	else
		$crm_crmentity_list->StopRec = $crm_crmentity_list->TotalRecs;
}
$crm_crmentity_list->RecCnt = $crm_crmentity_list->StartRec - 1;
if ($crm_crmentity_list->Recordset && !$crm_crmentity_list->Recordset->EOF) {
	$crm_crmentity_list->Recordset->moveFirst();
	$selectLimit = $crm_crmentity_list->UseSelectLimit;
	if (!$selectLimit && $crm_crmentity_list->StartRec > 1)
		$crm_crmentity_list->Recordset->move($crm_crmentity_list->StartRec - 1);
} elseif (!$crm_crmentity->AllowAddDeleteRow && $crm_crmentity_list->StopRec == 0) {
	$crm_crmentity_list->StopRec = $crm_crmentity->GridAddRowCount;
}

// Initialize aggregate
$crm_crmentity->RowType = ROWTYPE_AGGREGATEINIT;
$crm_crmentity->resetAttributes();
$crm_crmentity_list->renderRow();
while ($crm_crmentity_list->RecCnt < $crm_crmentity_list->StopRec) {
	$crm_crmentity_list->RecCnt++;
	if ($crm_crmentity_list->RecCnt >= $crm_crmentity_list->StartRec) {
		$crm_crmentity_list->RowCnt++;

		// Set up key count
		$crm_crmentity_list->KeyCount = $crm_crmentity_list->RowIndex;

		// Init row class and style
		$crm_crmentity->resetAttributes();
		$crm_crmentity->CssClass = "";
		if ($crm_crmentity->isGridAdd()) {
		} else {
			$crm_crmentity_list->loadRowValues($crm_crmentity_list->Recordset); // Load row values
		}
		$crm_crmentity->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_crmentity->RowAttrs = array_merge($crm_crmentity->RowAttrs, array('data-rowindex'=>$crm_crmentity_list->RowCnt, 'id'=>'r' . $crm_crmentity_list->RowCnt . '_crm_crmentity', 'data-rowtype'=>$crm_crmentity->RowType));

		// Render row
		$crm_crmentity_list->renderRow();

		// Render list options
		$crm_crmentity_list->renderListOptions();
?>
	<tr<?php echo $crm_crmentity->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_crmentity_list->ListOptions->render("body", "left", $crm_crmentity_list->RowCnt);
?>
	<?php if ($crm_crmentity->crmid->Visible) { // crmid ?>
		<td data-name="crmid"<?php echo $crm_crmentity->crmid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_crmid" class="crm_crmentity_crmid">
<span<?php echo $crm_crmentity->crmid->viewAttributes() ?>>
<?php echo $crm_crmentity->crmid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->smcreatorid->Visible) { // smcreatorid ?>
		<td data-name="smcreatorid"<?php echo $crm_crmentity->smcreatorid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid">
<span<?php echo $crm_crmentity->smcreatorid->viewAttributes() ?>>
<?php echo $crm_crmentity->smcreatorid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->smownerid->Visible) { // smownerid ?>
		<td data-name="smownerid"<?php echo $crm_crmentity->smownerid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_smownerid" class="crm_crmentity_smownerid">
<span<?php echo $crm_crmentity->smownerid->viewAttributes() ?>>
<?php echo $crm_crmentity->smownerid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->shownerid->Visible) { // shownerid ?>
		<td data-name="shownerid"<?php echo $crm_crmentity->shownerid->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_shownerid" class="crm_crmentity_shownerid">
<span<?php echo $crm_crmentity->shownerid->viewAttributes() ?>>
<?php echo $crm_crmentity->shownerid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $crm_crmentity->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby">
<span<?php echo $crm_crmentity->modifiedby->viewAttributes() ?>>
<?php echo $crm_crmentity->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->setype->Visible) { // setype ?>
		<td data-name="setype"<?php echo $crm_crmentity->setype->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_setype" class="crm_crmentity_setype">
<span<?php echo $crm_crmentity->setype->viewAttributes() ?>>
<?php echo $crm_crmentity->setype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->createdtime->Visible) { // createdtime ?>
		<td data-name="createdtime"<?php echo $crm_crmentity->createdtime->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_createdtime" class="crm_crmentity_createdtime">
<span<?php echo $crm_crmentity->createdtime->viewAttributes() ?>>
<?php echo $crm_crmentity->createdtime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->modifiedtime->Visible) { // modifiedtime ?>
		<td data-name="modifiedtime"<?php echo $crm_crmentity->modifiedtime->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime">
<span<?php echo $crm_crmentity->modifiedtime->viewAttributes() ?>>
<?php echo $crm_crmentity->modifiedtime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->viewedtime->Visible) { // viewedtime ?>
		<td data-name="viewedtime"<?php echo $crm_crmentity->viewedtime->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime">
<span<?php echo $crm_crmentity->viewedtime->viewAttributes() ?>>
<?php echo $crm_crmentity->viewedtime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->status->Visible) { // status ?>
		<td data-name="status"<?php echo $crm_crmentity->status->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_status" class="crm_crmentity_status">
<span<?php echo $crm_crmentity->status->viewAttributes() ?>>
<?php echo $crm_crmentity->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->version->Visible) { // version ?>
		<td data-name="version"<?php echo $crm_crmentity->version->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_version" class="crm_crmentity_version">
<span<?php echo $crm_crmentity->version->viewAttributes() ?>>
<?php echo $crm_crmentity->version->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->presence->Visible) { // presence ?>
		<td data-name="presence"<?php echo $crm_crmentity->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_presence" class="crm_crmentity_presence">
<span<?php echo $crm_crmentity->presence->viewAttributes() ?>>
<?php echo $crm_crmentity->presence->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->deleted->Visible) { // deleted ?>
		<td data-name="deleted"<?php echo $crm_crmentity->deleted->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_deleted" class="crm_crmentity_deleted">
<span<?php echo $crm_crmentity->deleted->viewAttributes() ?>>
<?php echo $crm_crmentity->deleted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->was_read->Visible) { // was_read ?>
		<td data-name="was_read"<?php echo $crm_crmentity->was_read->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity_was_read" class="crm_crmentity_was_read">
<span<?php echo $crm_crmentity->was_read->viewAttributes() ?>>
<?php echo $crm_crmentity->was_read->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_crmentity->_private->Visible) { // private ?>
		<td data-name="_private"<?php echo $crm_crmentity->_private->cellAttributes() ?>>
<span id="el<?php echo $crm_crmentity_list->RowCnt ?>_crm_crmentity__private" class="crm_crmentity__private">
<span<?php echo $crm_crmentity->_private->viewAttributes() ?>>
<?php echo $crm_crmentity->_private->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_crmentity_list->ListOptions->render("body", "right", $crm_crmentity_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_crmentity->isGridAdd())
		$crm_crmentity_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_crmentity->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_crmentity_list->Recordset)
	$crm_crmentity_list->Recordset->Close();
?>
<?php if (!$crm_crmentity->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_crmentity->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_crmentity_list->Pager)) $crm_crmentity_list->Pager = new NumericPager($crm_crmentity_list->StartRec, $crm_crmentity_list->DisplayRecs, $crm_crmentity_list->TotalRecs, $crm_crmentity_list->RecRange, $crm_crmentity_list->AutoHidePager) ?>
<?php if ($crm_crmentity_list->Pager->RecordCount > 0 && $crm_crmentity_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_crmentity_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_crmentity_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_crmentity_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_crmentity_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_crmentity_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_crmentity_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_crmentity_list->pageUrl() ?>start=<?php echo $crm_crmentity_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_crmentity_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_crmentity_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_crmentity_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_crmentity_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_crmentity_list->TotalRecs > 0 && (!$crm_crmentity_list->AutoHidePageSizeSelector || $crm_crmentity_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_crmentity">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_crmentity_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_crmentity_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_crmentity_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_crmentity_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_crmentity_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_crmentity_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_crmentity->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_crmentity_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_crmentity_list->TotalRecs == 0 && !$crm_crmentity->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_crmentity_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_crmentity_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_crmentity->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_crmentity->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_crmentity", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_crmentity_list->terminate();
?>