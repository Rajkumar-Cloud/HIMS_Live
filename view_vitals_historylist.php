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
$view_vitals_history_list = new view_vitals_history_list();

// Run the page
$view_vitals_history_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_vitals_history_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_vitals_history->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_vitals_historylist = currentForm = new ew.Form("fview_vitals_historylist", "list");
fview_vitals_historylist.formKeyCountName = '<?php echo $view_vitals_history_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_vitals_historylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_vitals_historylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_vitals_historylist.lists["x_MedicalHistory[]"] = <?php echo $view_vitals_history_list->MedicalHistory->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($view_vitals_history_list->MedicalHistory->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_FBloodgroup"] = <?php echo $view_vitals_history_list->FBloodgroup->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FBloodgroup"].options = <?php echo JsonEncode($view_vitals_history_list->FBloodgroup->lookupOptions()) ?>;
fview_vitals_historylist.lists["x_MBloodgroup"] = <?php echo $view_vitals_history_list->MBloodgroup->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MBloodgroup"].options = <?php echo JsonEncode($view_vitals_history_list->MBloodgroup->lookupOptions()) ?>;
fview_vitals_historylist.lists["x_FBuild"] = <?php echo $view_vitals_history_list->FBuild->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FBuild"].options = <?php echo JsonEncode($view_vitals_history_list->FBuild->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_MBuild"] = <?php echo $view_vitals_history_list->MBuild->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MBuild"].options = <?php echo JsonEncode($view_vitals_history_list->MBuild->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_FSkinColor"] = <?php echo $view_vitals_history_list->FSkinColor->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FSkinColor"].options = <?php echo JsonEncode($view_vitals_history_list->FSkinColor->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_MSkinColor"] = <?php echo $view_vitals_history_list->MSkinColor->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MSkinColor"].options = <?php echo JsonEncode($view_vitals_history_list->MSkinColor->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_FEyesColor"] = <?php echo $view_vitals_history_list->FEyesColor->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FEyesColor"].options = <?php echo JsonEncode($view_vitals_history_list->FEyesColor->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_MEyesColor"] = <?php echo $view_vitals_history_list->MEyesColor->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MEyesColor"].options = <?php echo JsonEncode($view_vitals_history_list->MEyesColor->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_FHairColor"] = <?php echo $view_vitals_history_list->FHairColor->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FHairColor"].options = <?php echo JsonEncode($view_vitals_history_list->FHairColor->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_MhairColor"] = <?php echo $view_vitals_history_list->MhairColor->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MhairColor"].options = <?php echo JsonEncode($view_vitals_history_list->MhairColor->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_FhairTexture"] = <?php echo $view_vitals_history_list->FhairTexture->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FhairTexture"].options = <?php echo JsonEncode($view_vitals_history_list->FhairTexture->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_MHairTexture"] = <?php echo $view_vitals_history_list->MHairTexture->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_MHairTexture"].options = <?php echo JsonEncode($view_vitals_history_list->MHairTexture->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_FamilyHistory"] = <?php echo $view_vitals_history_list->FamilyHistory->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_FamilyHistory"].options = <?php echo JsonEncode($view_vitals_history_list->FamilyHistory->lookupOptions()) ?>;
fview_vitals_historylist.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historylist.lists["x_Addictions[]"] = <?php echo $view_vitals_history_list->Addictions->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_Addictions[]"].options = <?php echo JsonEncode($view_vitals_history_list->Addictions->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_Medical"] = <?php echo $view_vitals_history_list->Medical->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_Medical"].options = <?php echo JsonEncode($view_vitals_history_list->Medical->options(FALSE, TRUE)) ?>;
fview_vitals_historylist.lists["x_Surgical"] = <?php echo $view_vitals_history_list->Surgical->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_Surgical"].options = <?php echo JsonEncode($view_vitals_history_list->Surgical->lookupOptions()) ?>;
fview_vitals_historylist.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historylist.lists["x_CoitalHistory"] = <?php echo $view_vitals_history_list->CoitalHistory->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_CoitalHistory"].options = <?php echo JsonEncode($view_vitals_history_list->CoitalHistory->lookupOptions()) ?>;
fview_vitals_historylist.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historylist.lists["x_pFamilyHistory"] = <?php echo $view_vitals_history_list->pFamilyHistory->Lookup->toClientList() ?>;
fview_vitals_historylist.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($view_vitals_history_list->pFamilyHistory->lookupOptions()) ?>;
fview_vitals_historylist.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_vitals_historylistsrch = currentSearchForm = new ew.Form("fview_vitals_historylistsrch");

// Filters
fview_vitals_historylistsrch.filterList = <?php echo $view_vitals_history_list->getFilterList() ?>;
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
<?php if (!$view_vitals_history->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_vitals_history_list->TotalRecs > 0 && $view_vitals_history_list->ExportOptions->visible()) { ?>
<?php $view_vitals_history_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_vitals_history_list->ImportOptions->visible()) { ?>
<?php $view_vitals_history_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_vitals_history_list->SearchOptions->visible()) { ?>
<?php $view_vitals_history_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_vitals_history_list->FilterOptions->visible()) { ?>
<?php $view_vitals_history_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_vitals_history_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_vitals_history->isExport() && !$view_vitals_history->CurrentAction) { ?>
<form name="fview_vitals_historylistsrch" id="fview_vitals_historylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_vitals_history_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_vitals_historylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_vitals_history">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_vitals_history_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_vitals_history_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_vitals_history_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_vitals_history_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_vitals_history_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_vitals_history_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_vitals_history_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_vitals_history_list->showPageHeader(); ?>
<?php
$view_vitals_history_list->showMessage();
?>
<?php if ($view_vitals_history_list->TotalRecs > 0 || $view_vitals_history->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_vitals_history_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_vitals_history">
<?php if (!$view_vitals_history->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_vitals_history->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_vitals_history_list->Pager)) $view_vitals_history_list->Pager = new NumericPager($view_vitals_history_list->StartRec, $view_vitals_history_list->DisplayRecs, $view_vitals_history_list->TotalRecs, $view_vitals_history_list->RecRange, $view_vitals_history_list->AutoHidePager) ?>
<?php if ($view_vitals_history_list->Pager->RecordCount > 0 && $view_vitals_history_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_vitals_history_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_vitals_history_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_vitals_history_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_vitals_history_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_vitals_history_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_vitals_history_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_vitals_history_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_vitals_history_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_vitals_history_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_vitals_history_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_vitals_history_list->TotalRecs > 0 && (!$view_vitals_history_list->AutoHidePageSizeSelector || $view_vitals_history_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_vitals_history">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_vitals_history_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_vitals_history_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_vitals_history_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_vitals_history_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_vitals_history_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_vitals_history_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_vitals_history->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_vitals_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_vitals_historylist" id="fview_vitals_historylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_vitals_history_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_vitals_history_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_vitals_history">
<div id="gmp_view_vitals_history" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_vitals_history_list->TotalRecs > 0 || $view_vitals_history->isGridEdit()) { ?>
<table id="tbl_view_vitals_historylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_vitals_history_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_vitals_history_list->renderListOptions();

// Render list options (header, left)
$view_vitals_history_list->ListOptions->render("header", "left");
?>
<?php if ($view_vitals_history->id->Visible) { // id ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_vitals_history->id->headerCellClass() ?>"><div id="elh_view_vitals_history_id" class="view_vitals_history_id"><div class="ew-table-header-caption"><?php echo $view_vitals_history->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_vitals_history->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->id) ?>',1);"><div id="elh_view_vitals_history_id" class="view_vitals_history_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_vitals_history->RIDNO->headerCellClass() ?>"><div id="elh_view_vitals_history_RIDNO" class="view_vitals_history_RIDNO"><div class="ew-table-header-caption"><?php echo $view_vitals_history->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_vitals_history->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->RIDNO) ?>',1);"><div id="elh_view_vitals_history_RIDNO" class="view_vitals_history_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Name->Visible) { // Name ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_vitals_history->Name->headerCellClass() ?>"><div id="elh_view_vitals_history_Name" class="view_vitals_history_Name"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_vitals_history->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Name) ?>',1);"><div id="elh_view_vitals_history_Name" class="view_vitals_history_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Age->Visible) { // Age ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_vitals_history->Age->headerCellClass() ?>"><div id="elh_view_vitals_history_Age" class="view_vitals_history_Age"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_vitals_history->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Age) ?>',1);"><div id="elh_view_vitals_history_Age" class="view_vitals_history_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->SEX->Visible) { // SEX ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->SEX) == "") { ?>
		<th data-name="SEX" class="<?php echo $view_vitals_history->SEX->headerCellClass() ?>"><div id="elh_view_vitals_history_SEX" class="view_vitals_history_SEX"><div class="ew-table-header-caption"><?php echo $view_vitals_history->SEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEX" class="<?php echo $view_vitals_history->SEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->SEX) ?>',1);"><div id="elh_view_vitals_history_SEX" class="view_vitals_history_SEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->SEX->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->SEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->SEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Religion->Visible) { // Religion ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $view_vitals_history->Religion->headerCellClass() ?>"><div id="elh_view_vitals_history_Religion" class="view_vitals_history_Religion"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $view_vitals_history->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Religion) ?>',1);"><div id="elh_view_vitals_history_Religion" class="view_vitals_history_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Address->Visible) { // Address ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Address) == "") { ?>
		<th data-name="Address" class="<?php echo $view_vitals_history->Address->headerCellClass() ?>"><div id="elh_view_vitals_history_Address" class="view_vitals_history_Address"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address" class="<?php echo $view_vitals_history->Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Address) ?>',1);"><div id="elh_view_vitals_history_Address" class="view_vitals_history_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_vitals_history->IdentificationMark->headerCellClass() ?>"><div id="elh_view_vitals_history_IdentificationMark" class="view_vitals_history_IdentificationMark"><div class="ew-table-header-caption"><?php echo $view_vitals_history->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_vitals_history->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->IdentificationMark) ?>',1);"><div id="elh_view_vitals_history_IdentificationMark" class="view_vitals_history_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->DoublewitnessName1) == "") { ?>
		<th data-name="DoublewitnessName1" class="<?php echo $view_vitals_history->DoublewitnessName1->headerCellClass() ?>"><div id="elh_view_vitals_history_DoublewitnessName1" class="view_vitals_history_DoublewitnessName1"><div class="ew-table-header-caption"><?php echo $view_vitals_history->DoublewitnessName1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoublewitnessName1" class="<?php echo $view_vitals_history->DoublewitnessName1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->DoublewitnessName1) ?>',1);"><div id="elh_view_vitals_history_DoublewitnessName1" class="view_vitals_history_DoublewitnessName1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->DoublewitnessName1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->DoublewitnessName1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->DoublewitnessName1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->DoublewitnessName2) == "") { ?>
		<th data-name="DoublewitnessName2" class="<?php echo $view_vitals_history->DoublewitnessName2->headerCellClass() ?>"><div id="elh_view_vitals_history_DoublewitnessName2" class="view_vitals_history_DoublewitnessName2"><div class="ew-table-header-caption"><?php echo $view_vitals_history->DoublewitnessName2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoublewitnessName2" class="<?php echo $view_vitals_history->DoublewitnessName2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->DoublewitnessName2) ?>',1);"><div id="elh_view_vitals_history_DoublewitnessName2" class="view_vitals_history_DoublewitnessName2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->DoublewitnessName2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->DoublewitnessName2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->DoublewitnessName2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Chiefcomplaints) == "") { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $view_vitals_history->Chiefcomplaints->headerCellClass() ?>"><div id="elh_view_vitals_history_Chiefcomplaints" class="view_vitals_history_Chiefcomplaints"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Chiefcomplaints->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $view_vitals_history->Chiefcomplaints->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Chiefcomplaints) ?>',1);"><div id="elh_view_vitals_history_Chiefcomplaints" class="view_vitals_history_Chiefcomplaints">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Chiefcomplaints->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Chiefcomplaints->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Chiefcomplaints->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $view_vitals_history->MenstrualHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_MenstrualHistory" class="view_vitals_history_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $view_vitals_history->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MenstrualHistory) ?>',1);"><div id="elh_view_vitals_history_MenstrualHistory" class="view_vitals_history_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MenstrualHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $view_vitals_history->ObstetricHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_ObstetricHistory" class="view_vitals_history_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $view_vitals_history->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->ObstetricHistory) ?>',1);"><div id="elh_view_vitals_history_ObstetricHistory" class="view_vitals_history_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->ObstetricHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->ObstetricHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->ObstetricHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MedicalHistory) == "") { ?>
		<th data-name="MedicalHistory" class="<?php echo $view_vitals_history->MedicalHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_MedicalHistory" class="view_vitals_history_MedicalHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MedicalHistory" class="<?php echo $view_vitals_history->MedicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MedicalHistory) ?>',1);"><div id="elh_view_vitals_history_MedicalHistory" class="view_vitals_history_MedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MedicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MedicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $view_vitals_history->SurgicalHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_SurgicalHistory" class="view_vitals_history_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $view_vitals_history->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->SurgicalHistory) ?>',1);"><div id="elh_view_vitals_history_SurgicalHistory" class="view_vitals_history_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->SurgicalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->SurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->SurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Generalexaminationpallor) == "") { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $view_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><div id="elh_view_vitals_history_Generalexaminationpallor" class="view_vitals_history_Generalexaminationpallor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Generalexaminationpallor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $view_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Generalexaminationpallor) ?>',1);"><div id="elh_view_vitals_history_Generalexaminationpallor" class="view_vitals_history_Generalexaminationpallor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Generalexaminationpallor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Generalexaminationpallor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Generalexaminationpallor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PR->Visible) { // PR ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $view_vitals_history->PR->headerCellClass() ?>"><div id="elh_view_vitals_history_PR" class="view_vitals_history_PR"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $view_vitals_history->PR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PR) ?>',1);"><div id="elh_view_vitals_history_PR" class="view_vitals_history_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->CVS->Visible) { // CVS ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $view_vitals_history->CVS->headerCellClass() ?>"><div id="elh_view_vitals_history_CVS" class="view_vitals_history_CVS"><div class="ew-table-header-caption"><?php echo $view_vitals_history->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $view_vitals_history->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->CVS) ?>',1);"><div id="elh_view_vitals_history_CVS" class="view_vitals_history_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PA->Visible) { // PA ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $view_vitals_history->PA->headerCellClass() ?>"><div id="elh_view_vitals_history_PA" class="view_vitals_history_PA"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $view_vitals_history->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PA) ?>',1);"><div id="elh_view_vitals_history_PA" class="view_vitals_history_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_history_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PROVISIONALDIAGNOSIS) ?>',1);"><div id="elh_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_history_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Investigations->Visible) { // Investigations ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Investigations) == "") { ?>
		<th data-name="Investigations" class="<?php echo $view_vitals_history->Investigations->headerCellClass() ?>"><div id="elh_view_vitals_history_Investigations" class="view_vitals_history_Investigations"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Investigations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investigations" class="<?php echo $view_vitals_history->Investigations->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Investigations) ?>',1);"><div id="elh_view_vitals_history_Investigations" class="view_vitals_history_Investigations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Investigations->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Investigations->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Investigations->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Fheight->Visible) { // Fheight ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Fheight) == "") { ?>
		<th data-name="Fheight" class="<?php echo $view_vitals_history->Fheight->headerCellClass() ?>"><div id="elh_view_vitals_history_Fheight" class="view_vitals_history_Fheight"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Fheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fheight" class="<?php echo $view_vitals_history->Fheight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Fheight) ?>',1);"><div id="elh_view_vitals_history_Fheight" class="view_vitals_history_Fheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Fheight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Fheight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Fheight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Fweight->Visible) { // Fweight ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Fweight) == "") { ?>
		<th data-name="Fweight" class="<?php echo $view_vitals_history->Fweight->headerCellClass() ?>"><div id="elh_view_vitals_history_Fweight" class="view_vitals_history_Fweight"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Fweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fweight" class="<?php echo $view_vitals_history->Fweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Fweight) ?>',1);"><div id="elh_view_vitals_history_Fweight" class="view_vitals_history_Fweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Fweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Fweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Fweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FBMI->Visible) { // FBMI ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FBMI) == "") { ?>
		<th data-name="FBMI" class="<?php echo $view_vitals_history->FBMI->headerCellClass() ?>"><div id="elh_view_vitals_history_FBMI" class="view_vitals_history_FBMI"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBMI" class="<?php echo $view_vitals_history->FBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FBMI) ?>',1);"><div id="elh_view_vitals_history_FBMI" class="view_vitals_history_FBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FBloodgroup) == "") { ?>
		<th data-name="FBloodgroup" class="<?php echo $view_vitals_history->FBloodgroup->headerCellClass() ?>"><div id="elh_view_vitals_history_FBloodgroup" class="view_vitals_history_FBloodgroup"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBloodgroup" class="<?php echo $view_vitals_history->FBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FBloodgroup) ?>',1);"><div id="elh_view_vitals_history_FBloodgroup" class="view_vitals_history_FBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Mheight->Visible) { // Mheight ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Mheight) == "") { ?>
		<th data-name="Mheight" class="<?php echo $view_vitals_history->Mheight->headerCellClass() ?>"><div id="elh_view_vitals_history_Mheight" class="view_vitals_history_Mheight"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Mheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mheight" class="<?php echo $view_vitals_history->Mheight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Mheight) ?>',1);"><div id="elh_view_vitals_history_Mheight" class="view_vitals_history_Mheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Mheight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Mheight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Mheight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Mweight->Visible) { // Mweight ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Mweight) == "") { ?>
		<th data-name="Mweight" class="<?php echo $view_vitals_history->Mweight->headerCellClass() ?>"><div id="elh_view_vitals_history_Mweight" class="view_vitals_history_Mweight"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Mweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mweight" class="<?php echo $view_vitals_history->Mweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Mweight) ?>',1);"><div id="elh_view_vitals_history_Mweight" class="view_vitals_history_Mweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Mweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Mweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Mweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MBMI->Visible) { // MBMI ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MBMI) == "") { ?>
		<th data-name="MBMI" class="<?php echo $view_vitals_history->MBMI->headerCellClass() ?>"><div id="elh_view_vitals_history_MBMI" class="view_vitals_history_MBMI"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBMI" class="<?php echo $view_vitals_history->MBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MBMI) ?>',1);"><div id="elh_view_vitals_history_MBMI" class="view_vitals_history_MBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MBloodgroup) == "") { ?>
		<th data-name="MBloodgroup" class="<?php echo $view_vitals_history->MBloodgroup->headerCellClass() ?>"><div id="elh_view_vitals_history_MBloodgroup" class="view_vitals_history_MBloodgroup"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBloodgroup" class="<?php echo $view_vitals_history->MBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MBloodgroup) ?>',1);"><div id="elh_view_vitals_history_MBloodgroup" class="view_vitals_history_MBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FBuild->Visible) { // FBuild ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FBuild) == "") { ?>
		<th data-name="FBuild" class="<?php echo $view_vitals_history->FBuild->headerCellClass() ?>"><div id="elh_view_vitals_history_FBuild" class="view_vitals_history_FBuild"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBuild" class="<?php echo $view_vitals_history->FBuild->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FBuild) ?>',1);"><div id="elh_view_vitals_history_FBuild" class="view_vitals_history_FBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FBuild->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FBuild->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FBuild->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MBuild->Visible) { // MBuild ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MBuild) == "") { ?>
		<th data-name="MBuild" class="<?php echo $view_vitals_history->MBuild->headerCellClass() ?>"><div id="elh_view_vitals_history_MBuild" class="view_vitals_history_MBuild"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBuild" class="<?php echo $view_vitals_history->MBuild->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MBuild) ?>',1);"><div id="elh_view_vitals_history_MBuild" class="view_vitals_history_MBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MBuild->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MBuild->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MBuild->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FSkinColor) == "") { ?>
		<th data-name="FSkinColor" class="<?php echo $view_vitals_history->FSkinColor->headerCellClass() ?>"><div id="elh_view_vitals_history_FSkinColor" class="view_vitals_history_FSkinColor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FSkinColor" class="<?php echo $view_vitals_history->FSkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FSkinColor) ?>',1);"><div id="elh_view_vitals_history_FSkinColor" class="view_vitals_history_FSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FSkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FSkinColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FSkinColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MSkinColor) == "") { ?>
		<th data-name="MSkinColor" class="<?php echo $view_vitals_history->MSkinColor->headerCellClass() ?>"><div id="elh_view_vitals_history_MSkinColor" class="view_vitals_history_MSkinColor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MSkinColor" class="<?php echo $view_vitals_history->MSkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MSkinColor) ?>',1);"><div id="elh_view_vitals_history_MSkinColor" class="view_vitals_history_MSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MSkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MSkinColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MSkinColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FEyesColor) == "") { ?>
		<th data-name="FEyesColor" class="<?php echo $view_vitals_history->FEyesColor->headerCellClass() ?>"><div id="elh_view_vitals_history_FEyesColor" class="view_vitals_history_FEyesColor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FEyesColor" class="<?php echo $view_vitals_history->FEyesColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FEyesColor) ?>',1);"><div id="elh_view_vitals_history_FEyesColor" class="view_vitals_history_FEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FEyesColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FEyesColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FEyesColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MEyesColor) == "") { ?>
		<th data-name="MEyesColor" class="<?php echo $view_vitals_history->MEyesColor->headerCellClass() ?>"><div id="elh_view_vitals_history_MEyesColor" class="view_vitals_history_MEyesColor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MEyesColor" class="<?php echo $view_vitals_history->MEyesColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MEyesColor) ?>',1);"><div id="elh_view_vitals_history_MEyesColor" class="view_vitals_history_MEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MEyesColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MEyesColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MEyesColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FHairColor->Visible) { // FHairColor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FHairColor) == "") { ?>
		<th data-name="FHairColor" class="<?php echo $view_vitals_history->FHairColor->headerCellClass() ?>"><div id="elh_view_vitals_history_FHairColor" class="view_vitals_history_FHairColor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FHairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FHairColor" class="<?php echo $view_vitals_history->FHairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FHairColor) ?>',1);"><div id="elh_view_vitals_history_FHairColor" class="view_vitals_history_FHairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FHairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FHairColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FHairColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MhairColor->Visible) { // MhairColor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MhairColor) == "") { ?>
		<th data-name="MhairColor" class="<?php echo $view_vitals_history->MhairColor->headerCellClass() ?>"><div id="elh_view_vitals_history_MhairColor" class="view_vitals_history_MhairColor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MhairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MhairColor" class="<?php echo $view_vitals_history->MhairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MhairColor) ?>',1);"><div id="elh_view_vitals_history_MhairColor" class="view_vitals_history_MhairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MhairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MhairColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MhairColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FhairTexture) == "") { ?>
		<th data-name="FhairTexture" class="<?php echo $view_vitals_history->FhairTexture->headerCellClass() ?>"><div id="elh_view_vitals_history_FhairTexture" class="view_vitals_history_FhairTexture"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FhairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FhairTexture" class="<?php echo $view_vitals_history->FhairTexture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FhairTexture) ?>',1);"><div id="elh_view_vitals_history_FhairTexture" class="view_vitals_history_FhairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FhairTexture->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FhairTexture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FhairTexture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MHairTexture) == "") { ?>
		<th data-name="MHairTexture" class="<?php echo $view_vitals_history->MHairTexture->headerCellClass() ?>"><div id="elh_view_vitals_history_MHairTexture" class="view_vitals_history_MHairTexture"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MHairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MHairTexture" class="<?php echo $view_vitals_history->MHairTexture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MHairTexture) ?>',1);"><div id="elh_view_vitals_history_MHairTexture" class="view_vitals_history_MHairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MHairTexture->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MHairTexture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MHairTexture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Fothers->Visible) { // Fothers ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Fothers) == "") { ?>
		<th data-name="Fothers" class="<?php echo $view_vitals_history->Fothers->headerCellClass() ?>"><div id="elh_view_vitals_history_Fothers" class="view_vitals_history_Fothers"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Fothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fothers" class="<?php echo $view_vitals_history->Fothers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Fothers) ?>',1);"><div id="elh_view_vitals_history_Fothers" class="view_vitals_history_Fothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Fothers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Fothers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Fothers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Mothers->Visible) { // Mothers ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Mothers) == "") { ?>
		<th data-name="Mothers" class="<?php echo $view_vitals_history->Mothers->headerCellClass() ?>"><div id="elh_view_vitals_history_Mothers" class="view_vitals_history_Mothers"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Mothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mothers" class="<?php echo $view_vitals_history->Mothers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Mothers) ?>',1);"><div id="elh_view_vitals_history_Mothers" class="view_vitals_history_Mothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Mothers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Mothers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Mothers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PGE->Visible) { // PGE ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PGE) == "") { ?>
		<th data-name="PGE" class="<?php echo $view_vitals_history->PGE->headerCellClass() ?>"><div id="elh_view_vitals_history_PGE" class="view_vitals_history_PGE"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PGE" class="<?php echo $view_vitals_history->PGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PGE) ?>',1);"><div id="elh_view_vitals_history_PGE" class="view_vitals_history_PGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PGE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PPR->Visible) { // PPR ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PPR) == "") { ?>
		<th data-name="PPR" class="<?php echo $view_vitals_history->PPR->headerCellClass() ?>"><div id="elh_view_vitals_history_PPR" class="view_vitals_history_PPR"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PPR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPR" class="<?php echo $view_vitals_history->PPR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PPR) ?>',1);"><div id="elh_view_vitals_history_PPR" class="view_vitals_history_PPR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PPR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PPR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PPR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PBP->Visible) { // PBP ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PBP) == "") { ?>
		<th data-name="PBP" class="<?php echo $view_vitals_history->PBP->headerCellClass() ?>"><div id="elh_view_vitals_history_PBP" class="view_vitals_history_PBP"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PBP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PBP" class="<?php echo $view_vitals_history->PBP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PBP) ?>',1);"><div id="elh_view_vitals_history_PBP" class="view_vitals_history_PBP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PBP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PBP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PBP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Breast->Visible) { // Breast ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Breast) == "") { ?>
		<th data-name="Breast" class="<?php echo $view_vitals_history->Breast->headerCellClass() ?>"><div id="elh_view_vitals_history_Breast" class="view_vitals_history_Breast"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Breast->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Breast" class="<?php echo $view_vitals_history->Breast->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Breast) ?>',1);"><div id="elh_view_vitals_history_Breast" class="view_vitals_history_Breast">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Breast->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Breast->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Breast->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PPA->Visible) { // PPA ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PPA) == "") { ?>
		<th data-name="PPA" class="<?php echo $view_vitals_history->PPA->headerCellClass() ?>"><div id="elh_view_vitals_history_PPA" class="view_vitals_history_PPA"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PPA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPA" class="<?php echo $view_vitals_history->PPA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PPA) ?>',1);"><div id="elh_view_vitals_history_PPA" class="view_vitals_history_PPA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PPA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PPA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PPA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PPSV->Visible) { // PPSV ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PPSV) == "") { ?>
		<th data-name="PPSV" class="<?php echo $view_vitals_history->PPSV->headerCellClass() ?>"><div id="elh_view_vitals_history_PPSV" class="view_vitals_history_PPSV"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PPSV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPSV" class="<?php echo $view_vitals_history->PPSV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PPSV) ?>',1);"><div id="elh_view_vitals_history_PPSV" class="view_vitals_history_PPSV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PPSV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PPSV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PPSV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PPAPSMEAR) == "") { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $view_vitals_history->PPAPSMEAR->headerCellClass() ?>"><div id="elh_view_vitals_history_PPAPSMEAR" class="view_vitals_history_PPAPSMEAR"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PPAPSMEAR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $view_vitals_history->PPAPSMEAR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PPAPSMEAR) ?>',1);"><div id="elh_view_vitals_history_PPAPSMEAR" class="view_vitals_history_PPAPSMEAR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PPAPSMEAR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PPAPSMEAR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PPAPSMEAR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PTHYROID) == "") { ?>
		<th data-name="PTHYROID" class="<?php echo $view_vitals_history->PTHYROID->headerCellClass() ?>"><div id="elh_view_vitals_history_PTHYROID" class="view_vitals_history_PTHYROID"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTHYROID" class="<?php echo $view_vitals_history->PTHYROID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PTHYROID) ?>',1);"><div id="elh_view_vitals_history_PTHYROID" class="view_vitals_history_PTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PTHYROID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PTHYROID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PTHYROID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MTHYROID) == "") { ?>
		<th data-name="MTHYROID" class="<?php echo $view_vitals_history->MTHYROID->headerCellClass() ?>"><div id="elh_view_vitals_history_MTHYROID" class="view_vitals_history_MTHYROID"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MTHYROID" class="<?php echo $view_vitals_history->MTHYROID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MTHYROID) ?>',1);"><div id="elh_view_vitals_history_MTHYROID" class="view_vitals_history_MTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MTHYROID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MTHYROID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MTHYROID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->SecSexCharacters) == "") { ?>
		<th data-name="SecSexCharacters" class="<?php echo $view_vitals_history->SecSexCharacters->headerCellClass() ?>"><div id="elh_view_vitals_history_SecSexCharacters" class="view_vitals_history_SecSexCharacters"><div class="ew-table-header-caption"><?php echo $view_vitals_history->SecSexCharacters->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecSexCharacters" class="<?php echo $view_vitals_history->SecSexCharacters->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->SecSexCharacters) ?>',1);"><div id="elh_view_vitals_history_SecSexCharacters" class="view_vitals_history_SecSexCharacters">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->SecSexCharacters->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->SecSexCharacters->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->SecSexCharacters->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->PenisUM->Visible) { // PenisUM ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->PenisUM) == "") { ?>
		<th data-name="PenisUM" class="<?php echo $view_vitals_history->PenisUM->headerCellClass() ?>"><div id="elh_view_vitals_history_PenisUM" class="view_vitals_history_PenisUM"><div class="ew-table-header-caption"><?php echo $view_vitals_history->PenisUM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PenisUM" class="<?php echo $view_vitals_history->PenisUM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->PenisUM) ?>',1);"><div id="elh_view_vitals_history_PenisUM" class="view_vitals_history_PenisUM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->PenisUM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->PenisUM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->PenisUM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->VAS->Visible) { // VAS ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->VAS) == "") { ?>
		<th data-name="VAS" class="<?php echo $view_vitals_history->VAS->headerCellClass() ?>"><div id="elh_view_vitals_history_VAS" class="view_vitals_history_VAS"><div class="ew-table-header-caption"><?php echo $view_vitals_history->VAS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VAS" class="<?php echo $view_vitals_history->VAS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->VAS) ?>',1);"><div id="elh_view_vitals_history_VAS" class="view_vitals_history_VAS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->VAS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->VAS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->VAS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->EPIDIDYMIS) == "") { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $view_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><div id="elh_view_vitals_history_EPIDIDYMIS" class="view_vitals_history_EPIDIDYMIS"><div class="ew-table-header-caption"><?php echo $view_vitals_history->EPIDIDYMIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $view_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->EPIDIDYMIS) ?>',1);"><div id="elh_view_vitals_history_EPIDIDYMIS" class="view_vitals_history_EPIDIDYMIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->EPIDIDYMIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->EPIDIDYMIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->EPIDIDYMIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Varicocele->Visible) { // Varicocele ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Varicocele) == "") { ?>
		<th data-name="Varicocele" class="<?php echo $view_vitals_history->Varicocele->headerCellClass() ?>"><div id="elh_view_vitals_history_Varicocele" class="view_vitals_history_Varicocele"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Varicocele->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Varicocele" class="<?php echo $view_vitals_history->Varicocele->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Varicocele) ?>',1);"><div id="elh_view_vitals_history_Varicocele" class="view_vitals_history_Varicocele">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Varicocele->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Varicocele->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Varicocele->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $view_vitals_history->FamilyHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_FamilyHistory" class="view_vitals_history_FamilyHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $view_vitals_history->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->FamilyHistory) ?>',1);"><div id="elh_view_vitals_history_FamilyHistory" class="view_vitals_history_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->FamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Addictions->Visible) { // Addictions ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Addictions) == "") { ?>
		<th data-name="Addictions" class="<?php echo $view_vitals_history->Addictions->headerCellClass() ?>"><div id="elh_view_vitals_history_Addictions" class="view_vitals_history_Addictions"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Addictions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Addictions" class="<?php echo $view_vitals_history->Addictions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Addictions) ?>',1);"><div id="elh_view_vitals_history_Addictions" class="view_vitals_history_Addictions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Addictions->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Addictions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Addictions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Medical->Visible) { // Medical ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Medical) == "") { ?>
		<th data-name="Medical" class="<?php echo $view_vitals_history->Medical->headerCellClass() ?>"><div id="elh_view_vitals_history_Medical" class="view_vitals_history_Medical"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Medical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medical" class="<?php echo $view_vitals_history->Medical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Medical) ?>',1);"><div id="elh_view_vitals_history_Medical" class="view_vitals_history_Medical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Medical->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Medical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Medical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->Surgical->Visible) { // Surgical ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->Surgical) == "") { ?>
		<th data-name="Surgical" class="<?php echo $view_vitals_history->Surgical->headerCellClass() ?>"><div id="elh_view_vitals_history_Surgical" class="view_vitals_history_Surgical"><div class="ew-table-header-caption"><?php echo $view_vitals_history->Surgical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgical" class="<?php echo $view_vitals_history->Surgical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->Surgical) ?>',1);"><div id="elh_view_vitals_history_Surgical" class="view_vitals_history_Surgical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->Surgical->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->Surgical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->Surgical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->CoitalHistory) == "") { ?>
		<th data-name="CoitalHistory" class="<?php echo $view_vitals_history->CoitalHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_CoitalHistory" class="view_vitals_history_CoitalHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->CoitalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoitalHistory" class="<?php echo $view_vitals_history->CoitalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->CoitalHistory) ?>',1);"><div id="elh_view_vitals_history_CoitalHistory" class="view_vitals_history_CoitalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->CoitalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->CoitalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->CoitalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->MariedFor->Visible) { // MariedFor ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->MariedFor) == "") { ?>
		<th data-name="MariedFor" class="<?php echo $view_vitals_history->MariedFor->headerCellClass() ?>"><div id="elh_view_vitals_history_MariedFor" class="view_vitals_history_MariedFor"><div class="ew-table-header-caption"><?php echo $view_vitals_history->MariedFor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MariedFor" class="<?php echo $view_vitals_history->MariedFor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->MariedFor) ?>',1);"><div id="elh_view_vitals_history_MariedFor" class="view_vitals_history_MariedFor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->MariedFor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->MariedFor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->MariedFor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->CMNCM->Visible) { // CMNCM ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->CMNCM) == "") { ?>
		<th data-name="CMNCM" class="<?php echo $view_vitals_history->CMNCM->headerCellClass() ?>"><div id="elh_view_vitals_history_CMNCM" class="view_vitals_history_CMNCM"><div class="ew-table-header-caption"><?php echo $view_vitals_history->CMNCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CMNCM" class="<?php echo $view_vitals_history->CMNCM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->CMNCM) ?>',1);"><div id="elh_view_vitals_history_CMNCM" class="view_vitals_history_CMNCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->CMNCM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->CMNCM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->CMNCM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->TidNo->Visible) { // TidNo ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_vitals_history->TidNo->headerCellClass() ?>"><div id="elh_view_vitals_history_TidNo" class="view_vitals_history_TidNo"><div class="ew-table-header-caption"><?php echo $view_vitals_history->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_vitals_history->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->TidNo) ?>',1);"><div id="elh_view_vitals_history_TidNo" class="view_vitals_history_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<?php if ($view_vitals_history->sortUrl($view_vitals_history->pFamilyHistory) == "") { ?>
		<th data-name="pFamilyHistory" class="<?php echo $view_vitals_history->pFamilyHistory->headerCellClass() ?>"><div id="elh_view_vitals_history_pFamilyHistory" class="view_vitals_history_pFamilyHistory"><div class="ew-table-header-caption"><?php echo $view_vitals_history->pFamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pFamilyHistory" class="<?php echo $view_vitals_history->pFamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_vitals_history->SortUrl($view_vitals_history->pFamilyHistory) ?>',1);"><div id="elh_view_vitals_history_pFamilyHistory" class="view_vitals_history_pFamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_vitals_history->pFamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_vitals_history->pFamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_vitals_history->pFamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_vitals_history_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_vitals_history->ExportAll && $view_vitals_history->isExport()) {
	$view_vitals_history_list->StopRec = $view_vitals_history_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_vitals_history_list->TotalRecs > $view_vitals_history_list->StartRec + $view_vitals_history_list->DisplayRecs - 1)
		$view_vitals_history_list->StopRec = $view_vitals_history_list->StartRec + $view_vitals_history_list->DisplayRecs - 1;
	else
		$view_vitals_history_list->StopRec = $view_vitals_history_list->TotalRecs;
}
$view_vitals_history_list->RecCnt = $view_vitals_history_list->StartRec - 1;
if ($view_vitals_history_list->Recordset && !$view_vitals_history_list->Recordset->EOF) {
	$view_vitals_history_list->Recordset->moveFirst();
	$selectLimit = $view_vitals_history_list->UseSelectLimit;
	if (!$selectLimit && $view_vitals_history_list->StartRec > 1)
		$view_vitals_history_list->Recordset->move($view_vitals_history_list->StartRec - 1);
} elseif (!$view_vitals_history->AllowAddDeleteRow && $view_vitals_history_list->StopRec == 0) {
	$view_vitals_history_list->StopRec = $view_vitals_history->GridAddRowCount;
}

// Initialize aggregate
$view_vitals_history->RowType = ROWTYPE_AGGREGATEINIT;
$view_vitals_history->resetAttributes();
$view_vitals_history_list->renderRow();
while ($view_vitals_history_list->RecCnt < $view_vitals_history_list->StopRec) {
	$view_vitals_history_list->RecCnt++;
	if ($view_vitals_history_list->RecCnt >= $view_vitals_history_list->StartRec) {
		$view_vitals_history_list->RowCnt++;

		// Set up key count
		$view_vitals_history_list->KeyCount = $view_vitals_history_list->RowIndex;

		// Init row class and style
		$view_vitals_history->resetAttributes();
		$view_vitals_history->CssClass = "";
		if ($view_vitals_history->isGridAdd()) {
		} else {
			$view_vitals_history_list->loadRowValues($view_vitals_history_list->Recordset); // Load row values
		}
		$view_vitals_history->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_vitals_history->RowAttrs = array_merge($view_vitals_history->RowAttrs, array('data-rowindex'=>$view_vitals_history_list->RowCnt, 'id'=>'r' . $view_vitals_history_list->RowCnt . '_view_vitals_history', 'data-rowtype'=>$view_vitals_history->RowType));

		// Render row
		$view_vitals_history_list->renderRow();

		// Render list options
		$view_vitals_history_list->renderListOptions();
?>
	<tr<?php echo $view_vitals_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_vitals_history_list->ListOptions->render("body", "left", $view_vitals_history_list->RowCnt);
?>
	<?php if ($view_vitals_history->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_vitals_history->id->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_id" class="view_vitals_history_id">
<span<?php echo $view_vitals_history->id->viewAttributes() ?>>
<?php echo $view_vitals_history->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_vitals_history->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_RIDNO" class="view_vitals_history_RIDNO">
<span<?php echo $view_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $view_vitals_history->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_vitals_history->Name->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Name" class="view_vitals_history_Name">
<span<?php echo $view_vitals_history->Name->viewAttributes() ?>>
<?php echo $view_vitals_history->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_vitals_history->Age->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Age" class="view_vitals_history_Age">
<span<?php echo $view_vitals_history->Age->viewAttributes() ?>>
<?php echo $view_vitals_history->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->SEX->Visible) { // SEX ?>
		<td data-name="SEX"<?php echo $view_vitals_history->SEX->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_SEX" class="view_vitals_history_SEX">
<span<?php echo $view_vitals_history->SEX->viewAttributes() ?>>
<?php echo $view_vitals_history->SEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $view_vitals_history->Religion->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Religion" class="view_vitals_history_Religion">
<span<?php echo $view_vitals_history->Religion->viewAttributes() ?>>
<?php echo $view_vitals_history->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Address->Visible) { // Address ?>
		<td data-name="Address"<?php echo $view_vitals_history->Address->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Address" class="view_vitals_history_Address">
<span<?php echo $view_vitals_history->Address->viewAttributes() ?>>
<?php echo $view_vitals_history->Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $view_vitals_history->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_IdentificationMark" class="view_vitals_history_IdentificationMark">
<span<?php echo $view_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $view_vitals_history->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td data-name="DoublewitnessName1"<?php echo $view_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_DoublewitnessName1" class="view_vitals_history_DoublewitnessName1">
<span<?php echo $view_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $view_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td data-name="DoublewitnessName2"<?php echo $view_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_DoublewitnessName2" class="view_vitals_history_DoublewitnessName2">
<span<?php echo $view_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $view_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints"<?php echo $view_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Chiefcomplaints" class="view_vitals_history_Chiefcomplaints">
<span<?php echo $view_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $view_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $view_vitals_history->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MenstrualHistory" class="view_vitals_history_MenstrualHistory">
<span<?php echo $view_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory"<?php echo $view_vitals_history->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_ObstetricHistory" class="view_vitals_history_ObstetricHistory">
<span<?php echo $view_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<td data-name="MedicalHistory"<?php echo $view_vitals_history->MedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MedicalHistory" class="view_vitals_history_MedicalHistory">
<span<?php echo $view_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->MedicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory"<?php echo $view_vitals_history->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_SurgicalHistory" class="view_vitals_history_SurgicalHistory">
<span<?php echo $view_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td data-name="Generalexaminationpallor"<?php echo $view_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Generalexaminationpallor" class="view_vitals_history_Generalexaminationpallor">
<span<?php echo $view_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $view_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PR->Visible) { // PR ?>
		<td data-name="PR"<?php echo $view_vitals_history->PR->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PR" class="view_vitals_history_PR">
<span<?php echo $view_vitals_history->PR->viewAttributes() ?>>
<?php echo $view_vitals_history->PR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $view_vitals_history->CVS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_CVS" class="view_vitals_history_CVS">
<span<?php echo $view_vitals_history->CVS->viewAttributes() ?>>
<?php echo $view_vitals_history->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $view_vitals_history->PA->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PA" class="view_vitals_history_PA">
<span<?php echo $view_vitals_history->PA->viewAttributes() ?>>
<?php echo $view_vitals_history->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Investigations->Visible) { // Investigations ?>
		<td data-name="Investigations"<?php echo $view_vitals_history->Investigations->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Investigations" class="view_vitals_history_Investigations">
<span<?php echo $view_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $view_vitals_history->Investigations->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Fheight->Visible) { // Fheight ?>
		<td data-name="Fheight"<?php echo $view_vitals_history->Fheight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Fheight" class="view_vitals_history_Fheight">
<span<?php echo $view_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $view_vitals_history->Fheight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Fweight->Visible) { // Fweight ?>
		<td data-name="Fweight"<?php echo $view_vitals_history->Fweight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Fweight" class="view_vitals_history_Fweight">
<span<?php echo $view_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $view_vitals_history->Fweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI"<?php echo $view_vitals_history->FBMI->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FBMI" class="view_vitals_history_FBMI">
<span<?php echo $view_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $view_vitals_history->FBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<td data-name="FBloodgroup"<?php echo $view_vitals_history->FBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FBloodgroup" class="view_vitals_history_FBloodgroup">
<span<?php echo $view_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $view_vitals_history->FBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Mheight->Visible) { // Mheight ?>
		<td data-name="Mheight"<?php echo $view_vitals_history->Mheight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Mheight" class="view_vitals_history_Mheight">
<span<?php echo $view_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $view_vitals_history->Mheight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Mweight->Visible) { // Mweight ?>
		<td data-name="Mweight"<?php echo $view_vitals_history->Mweight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Mweight" class="view_vitals_history_Mweight">
<span<?php echo $view_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $view_vitals_history->Mweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MBMI->Visible) { // MBMI ?>
		<td data-name="MBMI"<?php echo $view_vitals_history->MBMI->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MBMI" class="view_vitals_history_MBMI">
<span<?php echo $view_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $view_vitals_history->MBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<td data-name="MBloodgroup"<?php echo $view_vitals_history->MBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MBloodgroup" class="view_vitals_history_MBloodgroup">
<span<?php echo $view_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $view_vitals_history->MBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FBuild->Visible) { // FBuild ?>
		<td data-name="FBuild"<?php echo $view_vitals_history->FBuild->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FBuild" class="view_vitals_history_FBuild">
<span<?php echo $view_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $view_vitals_history->FBuild->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MBuild->Visible) { // MBuild ?>
		<td data-name="MBuild"<?php echo $view_vitals_history->MBuild->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MBuild" class="view_vitals_history_MBuild">
<span<?php echo $view_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $view_vitals_history->MBuild->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<td data-name="FSkinColor"<?php echo $view_vitals_history->FSkinColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FSkinColor" class="view_vitals_history_FSkinColor">
<span<?php echo $view_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FSkinColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<td data-name="MSkinColor"<?php echo $view_vitals_history->MSkinColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MSkinColor" class="view_vitals_history_MSkinColor">
<span<?php echo $view_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MSkinColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<td data-name="FEyesColor"<?php echo $view_vitals_history->FEyesColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FEyesColor" class="view_vitals_history_FEyesColor">
<span<?php echo $view_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FEyesColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<td data-name="MEyesColor"<?php echo $view_vitals_history->MEyesColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MEyesColor" class="view_vitals_history_MEyesColor">
<span<?php echo $view_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MEyesColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<td data-name="FHairColor"<?php echo $view_vitals_history->FHairColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FHairColor" class="view_vitals_history_FHairColor">
<span<?php echo $view_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FHairColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<td data-name="MhairColor"<?php echo $view_vitals_history->MhairColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MhairColor" class="view_vitals_history_MhairColor">
<span<?php echo $view_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MhairColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<td data-name="FhairTexture"<?php echo $view_vitals_history->FhairTexture->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FhairTexture" class="view_vitals_history_FhairTexture">
<span<?php echo $view_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $view_vitals_history->FhairTexture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<td data-name="MHairTexture"<?php echo $view_vitals_history->MHairTexture->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MHairTexture" class="view_vitals_history_MHairTexture">
<span<?php echo $view_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $view_vitals_history->MHairTexture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Fothers->Visible) { // Fothers ?>
		<td data-name="Fothers"<?php echo $view_vitals_history->Fothers->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Fothers" class="view_vitals_history_Fothers">
<span<?php echo $view_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $view_vitals_history->Fothers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Mothers->Visible) { // Mothers ?>
		<td data-name="Mothers"<?php echo $view_vitals_history->Mothers->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Mothers" class="view_vitals_history_Mothers">
<span<?php echo $view_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $view_vitals_history->Mothers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PGE->Visible) { // PGE ?>
		<td data-name="PGE"<?php echo $view_vitals_history->PGE->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PGE" class="view_vitals_history_PGE">
<span<?php echo $view_vitals_history->PGE->viewAttributes() ?>>
<?php echo $view_vitals_history->PGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PPR->Visible) { // PPR ?>
		<td data-name="PPR"<?php echo $view_vitals_history->PPR->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PPR" class="view_vitals_history_PPR">
<span<?php echo $view_vitals_history->PPR->viewAttributes() ?>>
<?php echo $view_vitals_history->PPR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PBP->Visible) { // PBP ?>
		<td data-name="PBP"<?php echo $view_vitals_history->PBP->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PBP" class="view_vitals_history_PBP">
<span<?php echo $view_vitals_history->PBP->viewAttributes() ?>>
<?php echo $view_vitals_history->PBP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Breast->Visible) { // Breast ?>
		<td data-name="Breast"<?php echo $view_vitals_history->Breast->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Breast" class="view_vitals_history_Breast">
<span<?php echo $view_vitals_history->Breast->viewAttributes() ?>>
<?php echo $view_vitals_history->Breast->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PPA->Visible) { // PPA ?>
		<td data-name="PPA"<?php echo $view_vitals_history->PPA->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PPA" class="view_vitals_history_PPA">
<span<?php echo $view_vitals_history->PPA->viewAttributes() ?>>
<?php echo $view_vitals_history->PPA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PPSV->Visible) { // PPSV ?>
		<td data-name="PPSV"<?php echo $view_vitals_history->PPSV->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PPSV" class="view_vitals_history_PPSV">
<span<?php echo $view_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $view_vitals_history->PPSV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td data-name="PPAPSMEAR"<?php echo $view_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PPAPSMEAR" class="view_vitals_history_PPAPSMEAR">
<span<?php echo $view_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $view_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<td data-name="PTHYROID"<?php echo $view_vitals_history->PTHYROID->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PTHYROID" class="view_vitals_history_PTHYROID">
<span<?php echo $view_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $view_vitals_history->PTHYROID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<td data-name="MTHYROID"<?php echo $view_vitals_history->MTHYROID->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MTHYROID" class="view_vitals_history_MTHYROID">
<span<?php echo $view_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $view_vitals_history->MTHYROID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td data-name="SecSexCharacters"<?php echo $view_vitals_history->SecSexCharacters->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_SecSexCharacters" class="view_vitals_history_SecSexCharacters">
<span<?php echo $view_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $view_vitals_history->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<td data-name="PenisUM"<?php echo $view_vitals_history->PenisUM->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_PenisUM" class="view_vitals_history_PenisUM">
<span<?php echo $view_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $view_vitals_history->PenisUM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->VAS->Visible) { // VAS ?>
		<td data-name="VAS"<?php echo $view_vitals_history->VAS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_VAS" class="view_vitals_history_VAS">
<span<?php echo $view_vitals_history->VAS->viewAttributes() ?>>
<?php echo $view_vitals_history->VAS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td data-name="EPIDIDYMIS"<?php echo $view_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_EPIDIDYMIS" class="view_vitals_history_EPIDIDYMIS">
<span<?php echo $view_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $view_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<td data-name="Varicocele"<?php echo $view_vitals_history->Varicocele->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Varicocele" class="view_vitals_history_Varicocele">
<span<?php echo $view_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $view_vitals_history->Varicocele->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $view_vitals_history->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_FamilyHistory" class="view_vitals_history_FamilyHistory">
<span<?php echo $view_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Addictions->Visible) { // Addictions ?>
		<td data-name="Addictions"<?php echo $view_vitals_history->Addictions->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Addictions" class="view_vitals_history_Addictions">
<span<?php echo $view_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $view_vitals_history->Addictions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Medical->Visible) { // Medical ?>
		<td data-name="Medical"<?php echo $view_vitals_history->Medical->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Medical" class="view_vitals_history_Medical">
<span<?php echo $view_vitals_history->Medical->viewAttributes() ?>>
<?php echo $view_vitals_history->Medical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->Surgical->Visible) { // Surgical ?>
		<td data-name="Surgical"<?php echo $view_vitals_history->Surgical->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_Surgical" class="view_vitals_history_Surgical">
<span<?php echo $view_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $view_vitals_history->Surgical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<td data-name="CoitalHistory"<?php echo $view_vitals_history->CoitalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_CoitalHistory" class="view_vitals_history_CoitalHistory">
<span<?php echo $view_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->CoitalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<td data-name="MariedFor"<?php echo $view_vitals_history->MariedFor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_MariedFor" class="view_vitals_history_MariedFor">
<span<?php echo $view_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $view_vitals_history->MariedFor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<td data-name="CMNCM"<?php echo $view_vitals_history->CMNCM->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_CMNCM" class="view_vitals_history_CMNCM">
<span<?php echo $view_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $view_vitals_history->CMNCM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_vitals_history->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_TidNo" class="view_vitals_history_TidNo">
<span<?php echo $view_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $view_vitals_history->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td data-name="pFamilyHistory"<?php echo $view_vitals_history->pFamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_list->RowCnt ?>_view_vitals_history_pFamilyHistory" class="view_vitals_history_pFamilyHistory">
<span<?php echo $view_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_vitals_history_list->ListOptions->render("body", "right", $view_vitals_history_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_vitals_history->isGridAdd())
		$view_vitals_history_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_vitals_history->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_vitals_history_list->Recordset)
	$view_vitals_history_list->Recordset->Close();
?>
<?php if (!$view_vitals_history->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_vitals_history->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_vitals_history_list->Pager)) $view_vitals_history_list->Pager = new NumericPager($view_vitals_history_list->StartRec, $view_vitals_history_list->DisplayRecs, $view_vitals_history_list->TotalRecs, $view_vitals_history_list->RecRange, $view_vitals_history_list->AutoHidePager) ?>
<?php if ($view_vitals_history_list->Pager->RecordCount > 0 && $view_vitals_history_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_vitals_history_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_vitals_history_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_vitals_history_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_vitals_history_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_vitals_history_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_vitals_history_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_vitals_history_list->pageUrl() ?>start=<?php echo $view_vitals_history_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_vitals_history_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_vitals_history_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_vitals_history_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_vitals_history_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_vitals_history_list->TotalRecs > 0 && (!$view_vitals_history_list->AutoHidePageSizeSelector || $view_vitals_history_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_vitals_history">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_vitals_history_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_vitals_history_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_vitals_history_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_vitals_history_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_vitals_history_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_vitals_history_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_vitals_history->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_vitals_history_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_vitals_history_list->TotalRecs == 0 && !$view_vitals_history->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_vitals_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_vitals_history_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_vitals_history->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_vitals_history->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_vitals_history", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_vitals_history_list->terminate();
?>