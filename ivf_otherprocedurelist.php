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
$ivf_otherprocedure_list = new ivf_otherprocedure_list();

// Run the page
$ivf_otherprocedure_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_otherprocedurelist = currentForm = new ew.Form("fivf_otherprocedurelist", "list");
fivf_otherprocedurelist.formKeyCountName = '<?php echo $ivf_otherprocedure_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_otherprocedurelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_otherprocedurelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_otherprocedurelist.lists["x_Name"] = <?php echo $ivf_otherprocedure_list->Name->Lookup->toClientList() ?>;
fivf_otherprocedurelist.lists["x_Name"].options = <?php echo JsonEncode($ivf_otherprocedure_list->Name->lookupOptions()) ?>;
fivf_otherprocedurelist.autoSuggests["x_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_otherprocedurelist.lists["x_Consultant"] = <?php echo $ivf_otherprocedure_list->Consultant->Lookup->toClientList() ?>;
fivf_otherprocedurelist.lists["x_Consultant"].options = <?php echo JsonEncode($ivf_otherprocedure_list->Consultant->lookupOptions()) ?>;
fivf_otherprocedurelist.lists["x_Surgeon"] = <?php echo $ivf_otherprocedure_list->Surgeon->Lookup->toClientList() ?>;
fivf_otherprocedurelist.lists["x_Surgeon"].options = <?php echo JsonEncode($ivf_otherprocedure_list->Surgeon->lookupOptions()) ?>;
fivf_otherprocedurelist.lists["x_Anesthetist"] = <?php echo $ivf_otherprocedure_list->Anesthetist->Lookup->toClientList() ?>;
fivf_otherprocedurelist.lists["x_Anesthetist"].options = <?php echo JsonEncode($ivf_otherprocedure_list->Anesthetist->lookupOptions()) ?>;

// Form object for search
var fivf_otherprocedurelistsrch = currentSearchForm = new ew.Form("fivf_otherprocedurelistsrch");

// Filters
fivf_otherprocedurelistsrch.filterList = <?php echo $ivf_otherprocedure_list->getFilterList() ?>;
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
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_otherprocedure_list->TotalRecs > 0 && $ivf_otherprocedure_list->ExportOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->ImportOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->SearchOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->FilterOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_otherprocedure_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_otherprocedure->isExport() && !$ivf_otherprocedure->CurrentAction) { ?>
<form name="fivf_otherprocedurelistsrch" id="fivf_otherprocedurelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_otherprocedure_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_otherprocedurelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_otherprocedure">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_otherprocedure_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_otherprocedure_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_otherprocedure_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_otherprocedure_list->showPageHeader(); ?>
<?php
$ivf_otherprocedure_list->showMessage();
?>
<?php if ($ivf_otherprocedure_list->TotalRecs > 0 || $ivf_otherprocedure->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_otherprocedure_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_otherprocedure">
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_otherprocedure->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_otherprocedure_list->Pager)) $ivf_otherprocedure_list->Pager = new NumericPager($ivf_otherprocedure_list->StartRec, $ivf_otherprocedure_list->DisplayRecs, $ivf_otherprocedure_list->TotalRecs, $ivf_otherprocedure_list->RecRange, $ivf_otherprocedure_list->AutoHidePager) ?>
<?php if ($ivf_otherprocedure_list->Pager->RecordCount > 0 && $ivf_otherprocedure_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_otherprocedure_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_otherprocedure_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_otherprocedure_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_otherprocedure_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_otherprocedure_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_otherprocedure_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_otherprocedure_list->TotalRecs > 0 && (!$ivf_otherprocedure_list->AutoHidePageSizeSelector || $ivf_otherprocedure_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_otherprocedure">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_otherprocedure_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_otherprocedure_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_otherprocedure_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_otherprocedure_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_otherprocedure_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_otherprocedure_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_otherprocedure->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_otherprocedurelist" id="fivf_otherprocedurelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_otherprocedure_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_otherprocedure_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<div id="gmp_ivf_otherprocedure" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_otherprocedure_list->TotalRecs > 0 || $ivf_otherprocedure->isGridEdit()) { ?>
<table id="tbl_ivf_otherprocedurelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_otherprocedure_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_otherprocedure_list->renderListOptions();

// Render list options (header, left)
$ivf_otherprocedure_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->id) ?>',1);"><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->RIDNO) ?>',1);"><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Name) ?>',1);"><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->DateofAdmission) ?>',1);"><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->DateofAdmission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->DateofAdmission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->DateofProcedure) == "") { ?>
		<th data-name="DateofProcedure" class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofProcedure" class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->DateofProcedure) ?>',1);"><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->DateofProcedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->DateofProcedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->DateofDischarge) == "") { ?>
		<th data-name="DateofDischarge" class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofDischarge" class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->DateofDischarge) ?>',1);"><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->DateofDischarge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->DateofDischarge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Consultant) ?>',1);"><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Surgeon) ?>',1);"><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Surgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Surgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Anesthetist) ?>',1);"><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->IdentificationMark) ?>',1);"><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->ProcedureDone) == "") { ?>
		<th data-name="ProcedureDone" class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDone" class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->ProcedureDone) ?>',1);"><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->ProcedureDone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->ProcedureDone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->PROVISIONALDIAGNOSIS) ?>',1);"><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Chiefcomplaints) == "") { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Chiefcomplaints) ?>',1);"><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Chiefcomplaints->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Chiefcomplaints->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->MaritallHistory) == "") { ?>
		<th data-name="MaritallHistory" class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritallHistory" class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->MaritallHistory) ?>',1);"><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->MaritallHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->MaritallHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->MenstrualHistory) ?>',1);"><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->SurgicalHistory) ?>',1);"><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->SurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->SurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->PastHistory) == "") { ?>
		<th data-name="PastHistory" class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PastHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastHistory" class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->PastHistory) ?>',1);"><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PastHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->PastHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->PastHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->FamilyHistory) ?>',1);"><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Temp) ?>',1);"><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Temp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->Pulse) ?>',1);"><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->BP) ?>',1);"><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->CNS) ?>',1);"><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CNS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->CNS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->CNS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->_RS) == "") { ?>
		<th data-name="_RS" class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->_RS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_RS" class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->_RS) ?>',1);"><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->_RS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->_RS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->_RS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->CVS) ?>',1);"><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->PA) ?>',1);"><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->InvestigationReport) == "") { ?>
		<th data-name="InvestigationReport" class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InvestigationReport" class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->InvestigationReport) ?>',1);"><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->InvestigationReport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->InvestigationReport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_otherprocedure->SortUrl($ivf_otherprocedure->TidNo) ?>',1);"><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_otherprocedure_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_otherprocedure->ExportAll && $ivf_otherprocedure->isExport()) {
	$ivf_otherprocedure_list->StopRec = $ivf_otherprocedure_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_otherprocedure_list->TotalRecs > $ivf_otherprocedure_list->StartRec + $ivf_otherprocedure_list->DisplayRecs - 1)
		$ivf_otherprocedure_list->StopRec = $ivf_otherprocedure_list->StartRec + $ivf_otherprocedure_list->DisplayRecs - 1;
	else
		$ivf_otherprocedure_list->StopRec = $ivf_otherprocedure_list->TotalRecs;
}
$ivf_otherprocedure_list->RecCnt = $ivf_otherprocedure_list->StartRec - 1;
if ($ivf_otherprocedure_list->Recordset && !$ivf_otherprocedure_list->Recordset->EOF) {
	$ivf_otherprocedure_list->Recordset->moveFirst();
	$selectLimit = $ivf_otherprocedure_list->UseSelectLimit;
	if (!$selectLimit && $ivf_otherprocedure_list->StartRec > 1)
		$ivf_otherprocedure_list->Recordset->move($ivf_otherprocedure_list->StartRec - 1);
} elseif (!$ivf_otherprocedure->AllowAddDeleteRow && $ivf_otherprocedure_list->StopRec == 0) {
	$ivf_otherprocedure_list->StopRec = $ivf_otherprocedure->GridAddRowCount;
}

// Initialize aggregate
$ivf_otherprocedure->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_otherprocedure->resetAttributes();
$ivf_otherprocedure_list->renderRow();
while ($ivf_otherprocedure_list->RecCnt < $ivf_otherprocedure_list->StopRec) {
	$ivf_otherprocedure_list->RecCnt++;
	if ($ivf_otherprocedure_list->RecCnt >= $ivf_otherprocedure_list->StartRec) {
		$ivf_otherprocedure_list->RowCnt++;

		// Set up key count
		$ivf_otherprocedure_list->KeyCount = $ivf_otherprocedure_list->RowIndex;

		// Init row class and style
		$ivf_otherprocedure->resetAttributes();
		$ivf_otherprocedure->CssClass = "";
		if ($ivf_otherprocedure->isGridAdd()) {
		} else {
			$ivf_otherprocedure_list->loadRowValues($ivf_otherprocedure_list->Recordset); // Load row values
		}
		$ivf_otherprocedure->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_otherprocedure->RowAttrs = array_merge($ivf_otherprocedure->RowAttrs, array('data-rowindex'=>$ivf_otherprocedure_list->RowCnt, 'id'=>'r' . $ivf_otherprocedure_list->RowCnt . '_ivf_otherprocedure', 'data-rowtype'=>$ivf_otherprocedure->RowType));

		// Render row
		$ivf_otherprocedure_list->renderRow();

		// Render list options
		$ivf_otherprocedure_list->renderListOptions();
?>
	<tr<?php echo $ivf_otherprocedure->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_otherprocedure_list->ListOptions->render("body", "left", $ivf_otherprocedure_list->RowCnt);
?>
	<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_otherprocedure->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_otherprocedure->RIDNO->cellAttributes() ?>>
<script id="orig<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<?php echo $ivf_otherprocedure->RIDNO->getViewValue() ?>
</script>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>><?php echo Barcode()->show($ivf_otherprocedure->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_otherprocedure->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission"<?php echo $ivf_otherprocedure->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure->DateofAdmission->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofAdmission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
		<td data-name="DateofProcedure"<?php echo $ivf_otherprocedure->DateofProcedure->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure->DateofProcedure->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofProcedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
		<td data-name="DateofDischarge"<?php echo $ivf_otherprocedure->DateofDischarge->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure->DateofDischarge->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofDischarge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_otherprocedure->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure->Consultant->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon"<?php echo $ivf_otherprocedure->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure->Surgeon->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Surgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure->Anesthetist->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $ivf_otherprocedure->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
		<td data-name="ProcedureDone"<?php echo $ivf_otherprocedure->ProcedureDone->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure->ProcedureDone->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->ProcedureDone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints"<?php echo $ivf_otherprocedure->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
		<td data-name="MaritallHistory"<?php echo $ivf_otherprocedure->MaritallHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure->MaritallHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MaritallHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $ivf_otherprocedure->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory"<?php echo $ivf_otherprocedure->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
		<td data-name="PastHistory"<?php echo $ivf_otherprocedure->PastHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure->PastHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PastHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $ivf_otherprocedure->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
		<td data-name="Temp"<?php echo $ivf_otherprocedure->Temp->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure->Temp->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse"<?php echo $ivf_otherprocedure->Pulse->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure->Pulse->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $ivf_otherprocedure->BP->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure->BP->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
		<td data-name="CNS"<?php echo $ivf_otherprocedure->CNS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure->CNS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CNS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
		<td data-name="_RS"<?php echo $ivf_otherprocedure->_RS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure->_RS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->_RS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $ivf_otherprocedure->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure->CVS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $ivf_otherprocedure->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure->PA->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
		<td data-name="InvestigationReport"<?php echo $ivf_otherprocedure->InvestigationReport->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure->InvestigationReport->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->InvestigationReport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_otherprocedure->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCnt ?>_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_otherprocedure_list->ListOptions->render("body", "right", $ivf_otherprocedure_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_otherprocedure->isGridAdd())
		$ivf_otherprocedure_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_otherprocedure->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_otherprocedure_list->Recordset)
	$ivf_otherprocedure_list->Recordset->Close();
?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_otherprocedure->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_otherprocedure_list->Pager)) $ivf_otherprocedure_list->Pager = new NumericPager($ivf_otherprocedure_list->StartRec, $ivf_otherprocedure_list->DisplayRecs, $ivf_otherprocedure_list->TotalRecs, $ivf_otherprocedure_list->RecRange, $ivf_otherprocedure_list->AutoHidePager) ?>
<?php if ($ivf_otherprocedure_list->Pager->RecordCount > 0 && $ivf_otherprocedure_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_otherprocedure_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_otherprocedure_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_otherprocedure_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_otherprocedure_list->pageUrl() ?>start=<?php echo $ivf_otherprocedure_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_otherprocedure_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_otherprocedure_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_otherprocedure_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_otherprocedure_list->TotalRecs > 0 && (!$ivf_otherprocedure_list->AutoHidePageSizeSelector || $ivf_otherprocedure_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_otherprocedure">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_otherprocedure_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_otherprocedure_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_otherprocedure_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_otherprocedure_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_otherprocedure_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_otherprocedure_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_otherprocedure->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_otherprocedure_list->TotalRecs == 0 && !$ivf_otherprocedure->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_otherprocedure_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_otherprocedure", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_otherprocedure_list->terminate();
?>