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
$ivf_oocytedenudation_list = new ivf_oocytedenudation_list();

// Run the page
$ivf_oocytedenudation_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_oocytedenudationlist = currentForm = new ew.Form("fivf_oocytedenudationlist", "list");
fivf_oocytedenudationlist.formKeyCountName = '<?php echo $ivf_oocytedenudation_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_oocytedenudationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudationlist.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_list->OocyteOrgin->Lookup->toClientList() ?>;
fivf_oocytedenudationlist.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_list->OocyteOrgin->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationlist.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_list->patient1->Lookup->toClientList() ?>;
fivf_oocytedenudationlist.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_list->patient1->lookupOptions()) ?>;
fivf_oocytedenudationlist.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_list->OocyteType->Lookup->toClientList() ?>;
fivf_oocytedenudationlist.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_list->OocyteType->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationlist.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_list->patient3->Lookup->toClientList() ?>;
fivf_oocytedenudationlist.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_list->patient3->lookupOptions()) ?>;
fivf_oocytedenudationlist.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_list->patient4->Lookup->toClientList() ?>;
fivf_oocytedenudationlist.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_list->patient4->lookupOptions()) ?>;

// Form object for search
var fivf_oocytedenudationlistsrch = currentSearchForm = new ew.Form("fivf_oocytedenudationlistsrch");

// Filters
fivf_oocytedenudationlistsrch.filterList = <?php echo $ivf_oocytedenudation_list->getFilterList() ?>;
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
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_oocytedenudation_list->TotalRecs > 0 && $ivf_oocytedenudation_list->ExportOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->ImportOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SearchOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->FilterOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_oocytedenudation->isExport() || EXPORT_MASTER_RECORD && $ivf_oocytedenudation->isExport("print")) { ?>
<?php
if ($ivf_oocytedenudation_list->DbMasterFilter <> "" && $ivf_oocytedenudation->getCurrentMasterTable() == "view_ivf_treatment") {
	if ($ivf_oocytedenudation_list->MasterRecordExists) {
		include_once "view_ivf_treatmentmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_oocytedenudation_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_oocytedenudation->isExport() && !$ivf_oocytedenudation->CurrentAction) { ?>
<form name="fivf_oocytedenudationlistsrch" id="fivf_oocytedenudationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_oocytedenudation_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_oocytedenudationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_oocytedenudation">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_oocytedenudation_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_oocytedenudation_list->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_list->showMessage();
?>
<?php if ($ivf_oocytedenudation_list->TotalRecs > 0 || $ivf_oocytedenudation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_oocytedenudation_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation">
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_oocytedenudation->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_oocytedenudation_list->Pager)) $ivf_oocytedenudation_list->Pager = new NumericPager($ivf_oocytedenudation_list->StartRec, $ivf_oocytedenudation_list->DisplayRecs, $ivf_oocytedenudation_list->TotalRecs, $ivf_oocytedenudation_list->RecRange, $ivf_oocytedenudation_list->AutoHidePager) ?>
<?php if ($ivf_oocytedenudation_list->Pager->RecordCount > 0 && $ivf_oocytedenudation_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_oocytedenudation_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_oocytedenudation_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_oocytedenudation_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_oocytedenudation_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_oocytedenudation_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_oocytedenudation_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->TotalRecs > 0 && (!$ivf_oocytedenudation_list->AutoHidePageSizeSelector || $ivf_oocytedenudation_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_oocytedenudation">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_oocytedenudation->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_oocytedenudationlist" id="fivf_oocytedenudationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<?php if ($ivf_oocytedenudation->getCurrentMasterTable() == "view_ivf_treatment" && $ivf_oocytedenudation->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo $ivf_oocytedenudation->TidNo->getSessionValue() ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_oocytedenudation->RIDNo->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_oocytedenudation->Name->getSessionValue() ?>">
<?php } ?>
<div id="gmp_ivf_oocytedenudation" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_oocytedenudation_list->TotalRecs > 0 || $ivf_oocytedenudation->isGridEdit()) { ?>
<table id="tbl_ivf_oocytedenudationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_oocytedenudation_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_oocytedenudation_list->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->id) ?>',1);"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->RIDNo) ?>',1);"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->Name) ?>',1);"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->ResultDate) ?>',1);"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->Surgeon) ?>',1);"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->Surgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->Surgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->AsstSurgeon) == "") { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->AsstSurgeon) ?>',1);"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->AsstSurgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->AsstSurgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->Anaesthetist) ?>',1);"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->Anaesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->Anaesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->AnaestheiaType) == "") { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->AnaestheiaType) ?>',1);"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->AnaestheiaType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->AnaestheiaType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->PrimaryEmbryologist) ?>',1);"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SecondaryEmbryologist) ?>',1);"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->NoOfFolliclesRight) == "") { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->NoOfFolliclesRight) ?>',1);"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->NoOfFolliclesRight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->NoOfFolliclesRight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->NoOfFolliclesLeft) == "") { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->NoOfFolliclesLeft) ?>',1);"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->NoOfFolliclesLeft->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->NoOfOocytes) == "") { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->NoOfOocytes) ?>',1);"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->NoOfOocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->NoOfOocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->RecordOocyteDenudation) == "") { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->RecordOocyteDenudation) ?>',1);"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->RecordOocyteDenudation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->RecordOocyteDenudation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->DateOfDenudation) == "") { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->DateOfDenudation) ?>',1);"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->DateOfDenudation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->DateOfDenudation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->DenudationDoneBy) == "") { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->DenudationDoneBy) ?>',1);"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->DenudationDoneBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->DenudationDoneBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->status) ?>',1);"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->createdby) ?>',1);"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->createddatetime) ?>',1);"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->modifiedby) ?>',1);"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->modifieddatetime) ?>',1);"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->TidNo) ?>',1);"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->ExpFollicles) == "") { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->ExpFollicles) ?>',1);"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->ExpFollicles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->ExpFollicles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SecondaryDenudationDoneBy) == "") { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SecondaryDenudationDoneBy) ?>',1);"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SecondaryDenudationDoneBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocyteOrgin) == "") { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocyteOrgin) ?>',1);"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocyteOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocyteOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->patient1) == "") { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->patient1) ?>',1);"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->patient1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->patient1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocyteType) == "") { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocyteType) ?>',1);"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocyteType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocyteType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate1) == "") { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate1) ?>',1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate2) == "") { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate2) ?>',1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfMI) == "") { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfMI) ?>',1);"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfMII) == "") { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfMII) ?>',1);"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfMII->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfMII->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->patient3) == "") { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->patient3) ?>',1);"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->patient3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->patient3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->patient4) == "") { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->patient4) ?>',1);"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->patient4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->patient4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocytesDonate3) == "") { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocytesDonate3) ?>',1);"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocytesDonate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocytesDonate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocytesDonate4) == "") { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->OocytesDonate4) ?>',1);"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocytesDonate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocytesDonate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate3) == "") { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate3) ?>',1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate4) == "") { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->MIOocytesDonate4) ?>',1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfOocytesMI) == "") { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfOocytesMI) ?>',1);"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfOocytesMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfOocytesMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfOocytesMII) == "") { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->SelfOocytesMII) ?>',1);"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfOocytesMII->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfOocytesMII->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->donor) == "") { ?>
		<th data-name="donor" class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->donor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="donor" class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation->SortUrl($ivf_oocytedenudation->donor) ?>',1);"><div id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->donor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->donor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_oocytedenudation->ExportAll && $ivf_oocytedenudation->isExport()) {
	$ivf_oocytedenudation_list->StopRec = $ivf_oocytedenudation_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_oocytedenudation_list->TotalRecs > $ivf_oocytedenudation_list->StartRec + $ivf_oocytedenudation_list->DisplayRecs - 1)
		$ivf_oocytedenudation_list->StopRec = $ivf_oocytedenudation_list->StartRec + $ivf_oocytedenudation_list->DisplayRecs - 1;
	else
		$ivf_oocytedenudation_list->StopRec = $ivf_oocytedenudation_list->TotalRecs;
}
$ivf_oocytedenudation_list->RecCnt = $ivf_oocytedenudation_list->StartRec - 1;
if ($ivf_oocytedenudation_list->Recordset && !$ivf_oocytedenudation_list->Recordset->EOF) {
	$ivf_oocytedenudation_list->Recordset->moveFirst();
	$selectLimit = $ivf_oocytedenudation_list->UseSelectLimit;
	if (!$selectLimit && $ivf_oocytedenudation_list->StartRec > 1)
		$ivf_oocytedenudation_list->Recordset->move($ivf_oocytedenudation_list->StartRec - 1);
} elseif (!$ivf_oocytedenudation->AllowAddDeleteRow && $ivf_oocytedenudation_list->StopRec == 0) {
	$ivf_oocytedenudation_list->StopRec = $ivf_oocytedenudation->GridAddRowCount;
}

// Initialize aggregate
$ivf_oocytedenudation->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_oocytedenudation->resetAttributes();
$ivf_oocytedenudation_list->renderRow();
while ($ivf_oocytedenudation_list->RecCnt < $ivf_oocytedenudation_list->StopRec) {
	$ivf_oocytedenudation_list->RecCnt++;
	if ($ivf_oocytedenudation_list->RecCnt >= $ivf_oocytedenudation_list->StartRec) {
		$ivf_oocytedenudation_list->RowCnt++;

		// Set up key count
		$ivf_oocytedenudation_list->KeyCount = $ivf_oocytedenudation_list->RowIndex;

		// Init row class and style
		$ivf_oocytedenudation->resetAttributes();
		$ivf_oocytedenudation->CssClass = "";
		if ($ivf_oocytedenudation->isGridAdd()) {
		} else {
			$ivf_oocytedenudation_list->loadRowValues($ivf_oocytedenudation_list->Recordset); // Load row values
		}
		$ivf_oocytedenudation->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_oocytedenudation->RowAttrs = array_merge($ivf_oocytedenudation->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_list->RowCnt, 'id'=>'r' . $ivf_oocytedenudation_list->RowCnt . '_ivf_oocytedenudation', 'data-rowtype'=>$ivf_oocytedenudation->RowType));

		// Render row
		$ivf_oocytedenudation_list->renderRow();

		// Render list options
		$ivf_oocytedenudation_list->renderListOptions();
?>
	<tr<?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_list->ListOptions->render("body", "left", $ivf_oocytedenudation_list->RowCnt);
?>
	<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon"<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td data-name="AsstSurgeon"<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist"<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td data-name="AnaestheiaType"<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td data-name="NoOfFolliclesRight"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td data-name="NoOfFolliclesLeft"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td data-name="NoOfOocytes"<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td data-name="RecordOocyteDenudation"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td data-name="DateOfDenudation"<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td data-name="DenudationDoneBy"<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<td data-name="ExpFollicles"<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td data-name="SecondaryDenudationDoneBy"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td data-name="OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<td data-name="patient1"<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<td data-name="OocyteType"<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td data-name="MIOocytesDonate1"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td data-name="MIOocytesDonate2"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<td data-name="SelfMI"<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<td data-name="SelfMII"<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<td data-name="patient3"<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<td data-name="patient4"<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td data-name="OocytesDonate3"<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td data-name="OocytesDonate4"<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td data-name="MIOocytesDonate3"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td data-name="MIOocytesDonate4"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td data-name="SelfOocytesMI"<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td data-name="SelfOocytesMII"<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<td data-name="donor"<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCnt ?>_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor">
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->donor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_list->ListOptions->render("body", "right", $ivf_oocytedenudation_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_oocytedenudation->isGridAdd())
		$ivf_oocytedenudation_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_oocytedenudation->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_oocytedenudation_list->Recordset)
	$ivf_oocytedenudation_list->Recordset->Close();
?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_oocytedenudation->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_oocytedenudation_list->Pager)) $ivf_oocytedenudation_list->Pager = new NumericPager($ivf_oocytedenudation_list->StartRec, $ivf_oocytedenudation_list->DisplayRecs, $ivf_oocytedenudation_list->TotalRecs, $ivf_oocytedenudation_list->RecRange, $ivf_oocytedenudation_list->AutoHidePager) ?>
<?php if ($ivf_oocytedenudation_list->Pager->RecordCount > 0 && $ivf_oocytedenudation_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_oocytedenudation_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_oocytedenudation_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_oocytedenudation_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_oocytedenudation_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_oocytedenudation_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_oocytedenudation_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->TotalRecs > 0 && (!$ivf_oocytedenudation_list->AutoHidePageSizeSelector || $ivf_oocytedenudation_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_oocytedenudation">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_oocytedenudation_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_oocytedenudation->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_oocytedenudation_list->TotalRecs == 0 && !$ivf_oocytedenudation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_oocytedenudation_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_oocytedenudation", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_list->terminate();
?>