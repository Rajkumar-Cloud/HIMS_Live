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
$pres_fluidformulation_list = new pres_fluidformulation_list();

// Run the page
$pres_fluidformulation_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluidformulation_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_fluidformulationlist = currentForm = new ew.Form("fpres_fluidformulationlist", "list");
fpres_fluidformulationlist.formKeyCountName = '<?php echo $pres_fluidformulation_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_fluidformulationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_fluidformulationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_fluidformulationlistsrch = currentSearchForm = new ew.Form("fpres_fluidformulationlistsrch");

// Filters
fpres_fluidformulationlistsrch.filterList = <?php echo $pres_fluidformulation_list->getFilterList() ?>;
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
<?php if (!$pres_fluidformulation->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_fluidformulation_list->TotalRecs > 0 && $pres_fluidformulation_list->ExportOptions->visible()) { ?>
<?php $pres_fluidformulation_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->ImportOptions->visible()) { ?>
<?php $pres_fluidformulation_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->SearchOptions->visible()) { ?>
<?php $pres_fluidformulation_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->FilterOptions->visible()) { ?>
<?php $pres_fluidformulation_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_fluidformulation_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_fluidformulation->isExport() && !$pres_fluidformulation->CurrentAction) { ?>
<form name="fpres_fluidformulationlistsrch" id="fpres_fluidformulationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_fluidformulation_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_fluidformulationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_fluidformulation">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_fluidformulation_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_fluidformulation_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_fluidformulation_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_fluidformulation_list->showPageHeader(); ?>
<?php
$pres_fluidformulation_list->showMessage();
?>
<?php if ($pres_fluidformulation_list->TotalRecs > 0 || $pres_fluidformulation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_fluidformulation_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_fluidformulation">
<?php if (!$pres_fluidformulation->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_fluidformulation->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_fluidformulation_list->Pager)) $pres_fluidformulation_list->Pager = new NumericPager($pres_fluidformulation_list->StartRec, $pres_fluidformulation_list->DisplayRecs, $pres_fluidformulation_list->TotalRecs, $pres_fluidformulation_list->RecRange, $pres_fluidformulation_list->AutoHidePager) ?>
<?php if ($pres_fluidformulation_list->Pager->RecordCount > 0 && $pres_fluidformulation_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_fluidformulation_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_fluidformulation_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_fluidformulation_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_fluidformulation_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_fluidformulation_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_fluidformulation_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_fluidformulation_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_fluidformulation_list->TotalRecs > 0 && (!$pres_fluidformulation_list->AutoHidePageSizeSelector || $pres_fluidformulation_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_fluidformulation">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_fluidformulation_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_fluidformulation_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_fluidformulation_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_fluidformulation_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_fluidformulation_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_fluidformulation_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_fluidformulation->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_fluidformulation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_fluidformulationlist" id="fpres_fluidformulationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_fluidformulation_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_fluidformulation_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<div id="gmp_pres_fluidformulation" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_fluidformulation_list->TotalRecs > 0 || $pres_fluidformulation->isGridEdit()) { ?>
<table id="tbl_pres_fluidformulationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_fluidformulation_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_fluidformulation_list->renderListOptions();

// Render list options (header, left)
$pres_fluidformulation_list->ListOptions->render("header", "left");
?>
<?php if ($pres_fluidformulation->id->Visible) { // id ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_fluidformulation->id->headerCellClass() ?>"><div id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_fluidformulation->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->id) ?>',1);"><div id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->Tradename->Visible) { // Tradename ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->Tradename) == "") { ?>
		<th data-name="Tradename" class="<?php echo $pres_fluidformulation->Tradename->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->Tradename->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tradename" class="<?php echo $pres_fluidformulation->Tradename->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->Tradename) ?>',1);"><div id="elh_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->Tradename->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->Tradename->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->Tradename->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->Itemcode->Visible) { // Itemcode ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->Itemcode) == "") { ?>
		<th data-name="Itemcode" class="<?php echo $pres_fluidformulation->Itemcode->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->Itemcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Itemcode" class="<?php echo $pres_fluidformulation->Itemcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->Itemcode) ?>',1);"><div id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->Itemcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->Itemcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->Itemcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_fluidformulation->Genericname->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_fluidformulation->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->Genericname) ?>',1);"><div id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->Genericname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->Genericname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->Volume->Visible) { // Volume ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $pres_fluidformulation->Volume->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $pres_fluidformulation->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->Volume) ?>',1);"><div id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->Volume->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->Volume->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->VolumeUnit->Visible) { // VolumeUnit ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->VolumeUnit) == "") { ?>
		<th data-name="VolumeUnit" class="<?php echo $pres_fluidformulation->VolumeUnit->headerCellClass() ?>"><div id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->VolumeUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VolumeUnit" class="<?php echo $pres_fluidformulation->VolumeUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->VolumeUnit) ?>',1);"><div id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->VolumeUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->VolumeUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->VolumeUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->Strength->Visible) { // Strength ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->Strength) == "") { ?>
		<th data-name="Strength" class="<?php echo $pres_fluidformulation->Strength->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->Strength->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength" class="<?php echo $pres_fluidformulation->Strength->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->Strength) ?>',1);"><div id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->Strength->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->Strength->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->Strength->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->StrengthUnit->Visible) { // StrengthUnit ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->StrengthUnit) == "") { ?>
		<th data-name="StrengthUnit" class="<?php echo $pres_fluidformulation->StrengthUnit->headerCellClass() ?>"><div id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->StrengthUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StrengthUnit" class="<?php echo $pres_fluidformulation->StrengthUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->StrengthUnit) ?>',1);"><div id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->StrengthUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->StrengthUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->StrengthUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->_Route->Visible) { // Route ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_fluidformulation->_Route->headerCellClass() ?>"><div id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_fluidformulation->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->_Route) ?>',1);"><div id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->_Route->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->_Route->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation->Forms->Visible) { // Forms ?>
	<?php if ($pres_fluidformulation->sortUrl($pres_fluidformulation->Forms) == "") { ?>
		<th data-name="Forms" class="<?php echo $pres_fluidformulation->Forms->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation->Forms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Forms" class="<?php echo $pres_fluidformulation->Forms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_fluidformulation->SortUrl($pres_fluidformulation->Forms) ?>',1);"><div id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation->Forms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation->Forms->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_fluidformulation->Forms->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_fluidformulation_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_fluidformulation->ExportAll && $pres_fluidformulation->isExport()) {
	$pres_fluidformulation_list->StopRec = $pres_fluidformulation_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_fluidformulation_list->TotalRecs > $pres_fluidformulation_list->StartRec + $pres_fluidformulation_list->DisplayRecs - 1)
		$pres_fluidformulation_list->StopRec = $pres_fluidformulation_list->StartRec + $pres_fluidformulation_list->DisplayRecs - 1;
	else
		$pres_fluidformulation_list->StopRec = $pres_fluidformulation_list->TotalRecs;
}
$pres_fluidformulation_list->RecCnt = $pres_fluidformulation_list->StartRec - 1;
if ($pres_fluidformulation_list->Recordset && !$pres_fluidformulation_list->Recordset->EOF) {
	$pres_fluidformulation_list->Recordset->moveFirst();
	$selectLimit = $pres_fluidformulation_list->UseSelectLimit;
	if (!$selectLimit && $pres_fluidformulation_list->StartRec > 1)
		$pres_fluidformulation_list->Recordset->move($pres_fluidformulation_list->StartRec - 1);
} elseif (!$pres_fluidformulation->AllowAddDeleteRow && $pres_fluidformulation_list->StopRec == 0) {
	$pres_fluidformulation_list->StopRec = $pres_fluidformulation->GridAddRowCount;
}

// Initialize aggregate
$pres_fluidformulation->RowType = ROWTYPE_AGGREGATEINIT;
$pres_fluidformulation->resetAttributes();
$pres_fluidformulation_list->renderRow();
while ($pres_fluidformulation_list->RecCnt < $pres_fluidformulation_list->StopRec) {
	$pres_fluidformulation_list->RecCnt++;
	if ($pres_fluidformulation_list->RecCnt >= $pres_fluidformulation_list->StartRec) {
		$pres_fluidformulation_list->RowCnt++;

		// Set up key count
		$pres_fluidformulation_list->KeyCount = $pres_fluidformulation_list->RowIndex;

		// Init row class and style
		$pres_fluidformulation->resetAttributes();
		$pres_fluidformulation->CssClass = "";
		if ($pres_fluidformulation->isGridAdd()) {
		} else {
			$pres_fluidformulation_list->loadRowValues($pres_fluidformulation_list->Recordset); // Load row values
		}
		$pres_fluidformulation->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_fluidformulation->RowAttrs = array_merge($pres_fluidformulation->RowAttrs, array('data-rowindex'=>$pres_fluidformulation_list->RowCnt, 'id'=>'r' . $pres_fluidformulation_list->RowCnt . '_pres_fluidformulation', 'data-rowtype'=>$pres_fluidformulation->RowType));

		// Render row
		$pres_fluidformulation_list->renderRow();

		// Render list options
		$pres_fluidformulation_list->renderListOptions();
?>
	<tr<?php echo $pres_fluidformulation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_fluidformulation_list->ListOptions->render("body", "left", $pres_fluidformulation_list->RowCnt);
?>
	<?php if ($pres_fluidformulation->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pres_fluidformulation->id->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_id" class="pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation->id->viewAttributes() ?>>
<?php echo $pres_fluidformulation->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->Tradename->Visible) { // Tradename ?>
		<td data-name="Tradename"<?php echo $pres_fluidformulation->Tradename->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename">
<span<?php echo $pres_fluidformulation->Tradename->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Tradename->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->Itemcode->Visible) { // Itemcode ?>
		<td data-name="Itemcode"<?php echo $pres_fluidformulation->Itemcode->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode">
<span<?php echo $pres_fluidformulation->Itemcode->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Itemcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname"<?php echo $pres_fluidformulation->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname">
<span<?php echo $pres_fluidformulation->Genericname->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->Volume->Visible) { // Volume ?>
		<td data-name="Volume"<?php echo $pres_fluidformulation->Volume->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume">
<span<?php echo $pres_fluidformulation->Volume->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->VolumeUnit->Visible) { // VolumeUnit ?>
		<td data-name="VolumeUnit"<?php echo $pres_fluidformulation->VolumeUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit">
<span<?php echo $pres_fluidformulation->VolumeUnit->viewAttributes() ?>>
<?php echo $pres_fluidformulation->VolumeUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->Strength->Visible) { // Strength ?>
		<td data-name="Strength"<?php echo $pres_fluidformulation->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength">
<span<?php echo $pres_fluidformulation->Strength->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Strength->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->StrengthUnit->Visible) { // StrengthUnit ?>
		<td data-name="StrengthUnit"<?php echo $pres_fluidformulation->StrengthUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit">
<span<?php echo $pres_fluidformulation->StrengthUnit->viewAttributes() ?>>
<?php echo $pres_fluidformulation->StrengthUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->_Route->Visible) { // Route ?>
		<td data-name="_Route"<?php echo $pres_fluidformulation->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation__Route" class="pres_fluidformulation__Route">
<span<?php echo $pres_fluidformulation->_Route->viewAttributes() ?>>
<?php echo $pres_fluidformulation->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation->Forms->Visible) { // Forms ?>
		<td data-name="Forms"<?php echo $pres_fluidformulation->Forms->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCnt ?>_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms">
<span<?php echo $pres_fluidformulation->Forms->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Forms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_fluidformulation_list->ListOptions->render("body", "right", $pres_fluidformulation_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_fluidformulation->isGridAdd())
		$pres_fluidformulation_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_fluidformulation->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_fluidformulation_list->Recordset)
	$pres_fluidformulation_list->Recordset->Close();
?>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_fluidformulation->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_fluidformulation_list->Pager)) $pres_fluidformulation_list->Pager = new NumericPager($pres_fluidformulation_list->StartRec, $pres_fluidformulation_list->DisplayRecs, $pres_fluidformulation_list->TotalRecs, $pres_fluidformulation_list->RecRange, $pres_fluidformulation_list->AutoHidePager) ?>
<?php if ($pres_fluidformulation_list->Pager->RecordCount > 0 && $pres_fluidformulation_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_fluidformulation_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_fluidformulation_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_fluidformulation_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_fluidformulation_list->pageUrl() ?>start=<?php echo $pres_fluidformulation_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_fluidformulation_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_fluidformulation_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_fluidformulation_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_fluidformulation_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_fluidformulation_list->TotalRecs > 0 && (!$pres_fluidformulation_list->AutoHidePageSizeSelector || $pres_fluidformulation_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_fluidformulation">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_fluidformulation_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_fluidformulation_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_fluidformulation_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_fluidformulation_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_fluidformulation_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_fluidformulation_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_fluidformulation->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_fluidformulation_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_fluidformulation_list->TotalRecs == 0 && !$pres_fluidformulation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_fluidformulation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_fluidformulation_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_fluidformulation", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_fluidformulation_list->terminate();
?>