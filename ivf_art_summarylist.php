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
$ivf_art_summary_list = new ivf_art_summary_list();

// Run the page
$ivf_art_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_art_summarylist = currentForm = new ew.Form("fivf_art_summarylist", "list");
fivf_art_summarylist.formKeyCountName = '<?php echo $ivf_art_summary_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_art_summarylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_art_summarylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_art_summarylist.lists["x_ARTCycle"] = <?php echo $ivf_art_summary_list->ARTCycle->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_art_summary_list->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Spermorigin"] = <?php echo $ivf_art_summary_list->Spermorigin->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Spermorigin"].options = <?php echo JsonEncode($ivf_art_summary_list->Spermorigin->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Origin"] = <?php echo $ivf_art_summary_list->Origin->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Origin"].options = <?php echo JsonEncode($ivf_art_summary_list->Origin->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Status"] = <?php echo $ivf_art_summary_list->Status->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Status"].options = <?php echo JsonEncode($ivf_art_summary_list->Status->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Method"] = <?php echo $ivf_art_summary_list->Method->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Method"].options = <?php echo JsonEncode($ivf_art_summary_list->Method->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_InseminatinTechnique"] = <?php echo $ivf_art_summary_list->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_art_summary_list->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_DateofET"] = <?php echo $ivf_art_summary_list->DateofET->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_DateofET"].options = <?php echo JsonEncode($ivf_art_summary_list->DateofET->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Reasonfornotranfer"] = <?php echo $ivf_art_summary_list->Reasonfornotranfer->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Reasonfornotranfer"].options = <?php echo JsonEncode($ivf_art_summary_list->Reasonfornotranfer->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_ConsultantsSignature"] = <?php echo $ivf_art_summary_list->ConsultantsSignature->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_ConsultantsSignature"].options = <?php echo JsonEncode($ivf_art_summary_list->ConsultantsSignature->lookupOptions()) ?>;
fivf_art_summarylist.lists["x_Day1"] = <?php echo $ivf_art_summary_list->Day1->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Day1"].options = <?php echo JsonEncode($ivf_art_summary_list->Day1->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_CellStage1"] = <?php echo $ivf_art_summary_list->CellStage1->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_CellStage1"].options = <?php echo JsonEncode($ivf_art_summary_list->CellStage1->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Grade1"] = <?php echo $ivf_art_summary_list->Grade1->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Grade1"].options = <?php echo JsonEncode($ivf_art_summary_list->Grade1->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_State1"] = <?php echo $ivf_art_summary_list->State1->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_State1"].options = <?php echo JsonEncode($ivf_art_summary_list->State1->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Day2"] = <?php echo $ivf_art_summary_list->Day2->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Day2"].options = <?php echo JsonEncode($ivf_art_summary_list->Day2->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_CellStage2"] = <?php echo $ivf_art_summary_list->CellStage2->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_CellStage2"].options = <?php echo JsonEncode($ivf_art_summary_list->CellStage2->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Grade2"] = <?php echo $ivf_art_summary_list->Grade2->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Grade2"].options = <?php echo JsonEncode($ivf_art_summary_list->Grade2->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_State2"] = <?php echo $ivf_art_summary_list->State2->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_State2"].options = <?php echo JsonEncode($ivf_art_summary_list->State2->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Day3"] = <?php echo $ivf_art_summary_list->Day3->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Day3"].options = <?php echo JsonEncode($ivf_art_summary_list->Day3->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_CellStage3"] = <?php echo $ivf_art_summary_list->CellStage3->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_CellStage3"].options = <?php echo JsonEncode($ivf_art_summary_list->CellStage3->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Grade3"] = <?php echo $ivf_art_summary_list->Grade3->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Grade3"].options = <?php echo JsonEncode($ivf_art_summary_list->Grade3->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_State3"] = <?php echo $ivf_art_summary_list->State3->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_State3"].options = <?php echo JsonEncode($ivf_art_summary_list->State3->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Day4"] = <?php echo $ivf_art_summary_list->Day4->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Day4"].options = <?php echo JsonEncode($ivf_art_summary_list->Day4->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_CellStage4"] = <?php echo $ivf_art_summary_list->CellStage4->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_CellStage4"].options = <?php echo JsonEncode($ivf_art_summary_list->CellStage4->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Grade4"] = <?php echo $ivf_art_summary_list->Grade4->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Grade4"].options = <?php echo JsonEncode($ivf_art_summary_list->Grade4->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_State4"] = <?php echo $ivf_art_summary_list->State4->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_State4"].options = <?php echo JsonEncode($ivf_art_summary_list->State4->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Day5"] = <?php echo $ivf_art_summary_list->Day5->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Day5"].options = <?php echo JsonEncode($ivf_art_summary_list->Day5->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_CellStage5"] = <?php echo $ivf_art_summary_list->CellStage5->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_CellStage5"].options = <?php echo JsonEncode($ivf_art_summary_list->CellStage5->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_Grade5"] = <?php echo $ivf_art_summary_list->Grade5->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_Grade5"].options = <?php echo JsonEncode($ivf_art_summary_list->Grade5->options(FALSE, TRUE)) ?>;
fivf_art_summarylist.lists["x_State5"] = <?php echo $ivf_art_summary_list->State5->Lookup->toClientList() ?>;
fivf_art_summarylist.lists["x_State5"].options = <?php echo JsonEncode($ivf_art_summary_list->State5->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_art_summarylistsrch = currentSearchForm = new ew.Form("fivf_art_summarylistsrch");

// Filters
fivf_art_summarylistsrch.filterList = <?php echo $ivf_art_summary_list->getFilterList() ?>;
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
<?php if (!$ivf_art_summary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_art_summary_list->TotalRecs > 0 && $ivf_art_summary_list->ExportOptions->visible()) { ?>
<?php $ivf_art_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_art_summary_list->ImportOptions->visible()) { ?>
<?php $ivf_art_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_art_summary_list->SearchOptions->visible()) { ?>
<?php $ivf_art_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_art_summary_list->FilterOptions->visible()) { ?>
<?php $ivf_art_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_art_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_art_summary->isExport() && !$ivf_art_summary->CurrentAction) { ?>
<form name="fivf_art_summarylistsrch" id="fivf_art_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_art_summary_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_art_summarylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_art_summary">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_art_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_art_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_art_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_art_summary_list->showPageHeader(); ?>
<?php
$ivf_art_summary_list->showMessage();
?>
<?php if ($ivf_art_summary_list->TotalRecs > 0 || $ivf_art_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_art_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_art_summary">
<?php if (!$ivf_art_summary->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_art_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_art_summary_list->Pager)) $ivf_art_summary_list->Pager = new NumericPager($ivf_art_summary_list->StartRec, $ivf_art_summary_list->DisplayRecs, $ivf_art_summary_list->TotalRecs, $ivf_art_summary_list->RecRange, $ivf_art_summary_list->AutoHidePager) ?>
<?php if ($ivf_art_summary_list->Pager->RecordCount > 0 && $ivf_art_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_art_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_art_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_art_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_art_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_art_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_art_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_art_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_art_summary_list->TotalRecs > 0 && (!$ivf_art_summary_list->AutoHidePageSizeSelector || $ivf_art_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_art_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_art_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_art_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_art_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_art_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_art_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_art_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_art_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_art_summarylist" id="fivf_art_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_art_summary_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_art_summary_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<div id="gmp_ivf_art_summary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_art_summary_list->TotalRecs > 0 || $ivf_art_summary->isGridEdit()) { ?>
<table id="tbl_ivf_art_summarylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_art_summary_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_art_summary_list->renderListOptions();

// Render list options (header, left)
$ivf_art_summary_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_art_summary->id->Visible) { // id ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->id) ?>',1);"><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->ARTCycle) ?>',1);"><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Spermorigin) == "") { ?>
		<th data-name="Spermorigin" class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Spermorigin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Spermorigin" class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Spermorigin) ?>',1);"><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Spermorigin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Spermorigin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Spermorigin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->IndicationforART) == "") { ?>
		<th data-name="IndicationforART" class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->IndicationforART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationforART" class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->IndicationforART) ?>',1);"><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->IndicationforART->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->IndicationforART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->IndicationforART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->DateofICSI) == "") { ?>
		<th data-name="DateofICSI" class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofICSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofICSI" class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->DateofICSI) ?>',1);"><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofICSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->DateofICSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->DateofICSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Origin) ?>',1);"><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Status) ?>',1);"><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Method) ?>',1);"><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->pre_Concentration) == "") { ?>
		<th data-name="pre_Concentration" class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Concentration" class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->pre_Concentration) ?>',1);"><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Concentration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->pre_Concentration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->pre_Concentration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->pre_Motility) == "") { ?>
		<th data-name="pre_Motility" class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Motility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Motility" class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->pre_Motility) ?>',1);"><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Motility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->pre_Motility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->pre_Motility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->pre_Morphology) == "") { ?>
		<th data-name="pre_Morphology" class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Morphology->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Morphology" class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->pre_Morphology) ?>',1);"><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Morphology->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->pre_Morphology->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->pre_Morphology->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->post_Concentration) == "") { ?>
		<th data-name="post_Concentration" class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Concentration" class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->post_Concentration) ?>',1);"><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Concentration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->post_Concentration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->post_Concentration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->post_Motility) == "") { ?>
		<th data-name="post_Motility" class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Motility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Motility" class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->post_Motility) ?>',1);"><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Motility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->post_Motility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->post_Motility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->post_Morphology) == "") { ?>
		<th data-name="post_Morphology" class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Morphology->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Morphology" class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->post_Morphology) ?>',1);"><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Morphology->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->post_Morphology->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->post_Morphology->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NumberofEmbryostransferred) == "") { ?>
		<th data-name="NumberofEmbryostransferred" class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberofEmbryostransferred" class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->NumberofEmbryostransferred) ?>',1);"><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NumberofEmbryostransferred->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NumberofEmbryostransferred->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Embryosunderobservation) == "") { ?>
		<th data-name="Embryosunderobservation" class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Embryosunderobservation" class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Embryosunderobservation) ?>',1);"><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Embryosunderobservation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Embryosunderobservation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->EmbryoDevelopmentSummary) == "") { ?>
		<th data-name="EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->EmbryoDevelopmentSummary) ?>',1);"><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->EmbryoDevelopmentSummary->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->EmbryoDevelopmentSummary->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->EmbryologistSignature) == "") { ?>
		<th data-name="EmbryologistSignature" class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryologistSignature" class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->EmbryologistSignature) ?>',1);"><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->EmbryologistSignature->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->EmbryologistSignature->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->IVFRegistrationID) == "") { ?>
		<th data-name="IVFRegistrationID" class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFRegistrationID" class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->IVFRegistrationID) ?>',1);"><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->IVFRegistrationID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->IVFRegistrationID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->InseminatinTechnique) ?>',1);"><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->InseminatinTechnique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->InseminatinTechnique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ICSIDetails) == "") { ?>
		<th data-name="ICSIDetails" class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSIDetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDetails" class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->ICSIDetails) ?>',1);"><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSIDetails->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ICSIDetails->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ICSIDetails->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->DateofET) == "") { ?>
		<th data-name="DateofET" class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofET" class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->DateofET) ?>',1);"><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->DateofET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->DateofET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Reasonfornotranfer) == "") { ?>
		<th data-name="Reasonfornotranfer" class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reasonfornotranfer" class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Reasonfornotranfer) ?>',1);"><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Reasonfornotranfer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Reasonfornotranfer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->EmbryosCryopreserved) == "") { ?>
		<th data-name="EmbryosCryopreserved" class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryosCryopreserved" class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->EmbryosCryopreserved) ?>',1);"><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->EmbryosCryopreserved->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->EmbryosCryopreserved->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->LegendCellStage) == "") { ?>
		<th data-name="LegendCellStage" class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->LegendCellStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LegendCellStage" class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->LegendCellStage) ?>',1);"><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->LegendCellStage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->LegendCellStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->LegendCellStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ConsultantsSignature) == "") { ?>
		<th data-name="ConsultantsSignature" class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConsultantsSignature" class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->ConsultantsSignature) ?>',1);"><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ConsultantsSignature->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ConsultantsSignature->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Name) ?>',1);"><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->M2) == "") { ?>
		<th data-name="M2" class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->M2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M2" class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->M2) ?>',1);"><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->M2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->M2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->M2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Mi2) == "") { ?>
		<th data-name="Mi2" class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Mi2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mi2" class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Mi2) ?>',1);"><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Mi2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Mi2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Mi2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ICSI) == "") { ?>
		<th data-name="ICSI" class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSI" class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->ICSI) ?>',1);"><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ICSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ICSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->IVF) == "") { ?>
		<th data-name="IVF" class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->IVF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVF" class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->IVF) ?>',1);"><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->IVF->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->IVF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->IVF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->M1) == "") { ?>
		<th data-name="M1" class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->M1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M1" class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->M1) ?>',1);"><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->M1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->M1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->M1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->GV) == "") { ?>
		<th data-name="GV" class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->GV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GV" class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->GV) ?>',1);"><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->GV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->GV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->GV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Others) == "") { ?>
		<th data-name="Others" class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><div id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others" class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Others) ?>',1);"><div id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Others->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Normal2PN) == "") { ?>
		<th data-name="Normal2PN" class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Normal2PN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal2PN" class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Normal2PN) ?>',1);"><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Normal2PN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Normal2PN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Normal2PN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Abnormalfertilisation1N) == "") { ?>
		<th data-name="Abnormalfertilisation1N" class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormalfertilisation1N" class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Abnormalfertilisation1N) ?>',1);"><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Abnormalfertilisation1N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Abnormalfertilisation1N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Abnormalfertilisation3N) == "") { ?>
		<th data-name="Abnormalfertilisation3N" class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormalfertilisation3N" class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Abnormalfertilisation3N) ?>',1);"><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Abnormalfertilisation3N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Abnormalfertilisation3N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotFertilized) == "") { ?>
		<th data-name="NotFertilized" class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotFertilized->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotFertilized" class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->NotFertilized) ?>',1);"><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotFertilized->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotFertilized->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotFertilized->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Degenerated) == "") { ?>
		<th data-name="Degenerated" class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Degenerated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Degenerated" class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Degenerated) ?>',1);"><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Degenerated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Degenerated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Degenerated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->SpermDate) == "") { ?>
		<th data-name="SpermDate" class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->SpermDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermDate" class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->SpermDate) ?>',1);"><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->SpermDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->SpermDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->SpermDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code1) == "") { ?>
		<th data-name="Code1" class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code1" class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Code1) ?>',1);"><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day1) == "") { ?>
		<th data-name="Day1" class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1" class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Day1) ?>',1);"><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage1) == "") { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->CellStage1) ?>',1);"><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade1) == "") { ?>
		<th data-name="Grade1" class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade1" class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Grade1) ?>',1);"><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State1) == "") { ?>
		<th data-name="State1" class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State1" class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->State1) ?>',1);"><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code2) == "") { ?>
		<th data-name="Code2" class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code2" class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Code2) ?>',1);"><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day2) == "") { ?>
		<th data-name="Day2" class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2" class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Day2) ?>',1);"><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage2) == "") { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->CellStage2) ?>',1);"><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade2) == "") { ?>
		<th data-name="Grade2" class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade2" class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Grade2) ?>',1);"><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State2) == "") { ?>
		<th data-name="State2" class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State2" class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->State2) ?>',1);"><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code3) == "") { ?>
		<th data-name="Code3" class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code3" class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Code3) ?>',1);"><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day3) == "") { ?>
		<th data-name="Day3" class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3" class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Day3) ?>',1);"><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage3) == "") { ?>
		<th data-name="CellStage3" class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage3" class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->CellStage3) ?>',1);"><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade3) == "") { ?>
		<th data-name="Grade3" class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade3" class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Grade3) ?>',1);"><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State3) == "") { ?>
		<th data-name="State3" class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State3" class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->State3) ?>',1);"><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code4) == "") { ?>
		<th data-name="Code4" class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code4" class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Code4) ?>',1);"><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day4) == "") { ?>
		<th data-name="Day4" class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4" class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Day4) ?>',1);"><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage4) == "") { ?>
		<th data-name="CellStage4" class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage4" class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->CellStage4) ?>',1);"><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade4) == "") { ?>
		<th data-name="Grade4" class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade4" class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Grade4) ?>',1);"><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State4) == "") { ?>
		<th data-name="State4" class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State4" class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->State4) ?>',1);"><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code5) == "") { ?>
		<th data-name="Code5" class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code5" class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Code5) ?>',1);"><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day5) == "") { ?>
		<th data-name="Day5" class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5" class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Day5) ?>',1);"><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage5) == "") { ?>
		<th data-name="CellStage5" class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage5" class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->CellStage5) ?>',1);"><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade5) == "") { ?>
		<th data-name="Grade5" class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade5" class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Grade5) ?>',1);"><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State5) == "") { ?>
		<th data-name="State5" class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State5" class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->State5) ?>',1);"><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->TidNo) ?>',1);"><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->RIDNo) ?>',1);"><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Volume) ?>',1);"><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Volume->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Volume->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Volume1) ?>',1);"><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Volume1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Volume1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Volume2) ?>',1);"><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Volume2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Volume2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Concentration2) ?>',1);"><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Concentration2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Concentration2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Concentration2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Total) ?>',1);"><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Total1) ?>',1);"><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Total1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Total1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Total2) ?>',1);"><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Total2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Total2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Progressive) == "") { ?>
		<th data-name="Progressive" class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive" class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Progressive) ?>',1);"><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Progressive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Progressive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Progressive1) == "") { ?>
		<th data-name="Progressive1" class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive1" class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Progressive1) ?>',1);"><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Progressive1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Progressive1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Progressive2) == "") { ?>
		<th data-name="Progressive2" class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive2" class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Progressive2) ?>',1);"><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Progressive2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Progressive2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotProgressive) == "") { ?>
		<th data-name="NotProgressive" class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive" class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->NotProgressive) ?>',1);"><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotProgressive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotProgressive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotProgressive1) == "") { ?>
		<th data-name="NotProgressive1" class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive1" class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->NotProgressive1) ?>',1);"><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotProgressive1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotProgressive1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotProgressive2) == "") { ?>
		<th data-name="NotProgressive2" class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive2" class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->NotProgressive2) ?>',1);"><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotProgressive2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotProgressive2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Motility2) == "") { ?>
		<th data-name="Motility2" class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Motility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Motility2" class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Motility2) ?>',1);"><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Motility2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Motility2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Motility2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Morphology2) == "") { ?>
		<th data-name="Morphology2" class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Morphology2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Morphology2" class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_art_summary->SortUrl($ivf_art_summary->Morphology2) ?>',1);"><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Morphology2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Morphology2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Morphology2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_art_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_art_summary->ExportAll && $ivf_art_summary->isExport()) {
	$ivf_art_summary_list->StopRec = $ivf_art_summary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_art_summary_list->TotalRecs > $ivf_art_summary_list->StartRec + $ivf_art_summary_list->DisplayRecs - 1)
		$ivf_art_summary_list->StopRec = $ivf_art_summary_list->StartRec + $ivf_art_summary_list->DisplayRecs - 1;
	else
		$ivf_art_summary_list->StopRec = $ivf_art_summary_list->TotalRecs;
}
$ivf_art_summary_list->RecCnt = $ivf_art_summary_list->StartRec - 1;
if ($ivf_art_summary_list->Recordset && !$ivf_art_summary_list->Recordset->EOF) {
	$ivf_art_summary_list->Recordset->moveFirst();
	$selectLimit = $ivf_art_summary_list->UseSelectLimit;
	if (!$selectLimit && $ivf_art_summary_list->StartRec > 1)
		$ivf_art_summary_list->Recordset->move($ivf_art_summary_list->StartRec - 1);
} elseif (!$ivf_art_summary->AllowAddDeleteRow && $ivf_art_summary_list->StopRec == 0) {
	$ivf_art_summary_list->StopRec = $ivf_art_summary->GridAddRowCount;
}

// Initialize aggregate
$ivf_art_summary->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_art_summary->resetAttributes();
$ivf_art_summary_list->renderRow();
while ($ivf_art_summary_list->RecCnt < $ivf_art_summary_list->StopRec) {
	$ivf_art_summary_list->RecCnt++;
	if ($ivf_art_summary_list->RecCnt >= $ivf_art_summary_list->StartRec) {
		$ivf_art_summary_list->RowCnt++;

		// Set up key count
		$ivf_art_summary_list->KeyCount = $ivf_art_summary_list->RowIndex;

		// Init row class and style
		$ivf_art_summary->resetAttributes();
		$ivf_art_summary->CssClass = "";
		if ($ivf_art_summary->isGridAdd()) {
		} else {
			$ivf_art_summary_list->loadRowValues($ivf_art_summary_list->Recordset); // Load row values
		}
		$ivf_art_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_art_summary->RowAttrs = array_merge($ivf_art_summary->RowAttrs, array('data-rowindex'=>$ivf_art_summary_list->RowCnt, 'id'=>'r' . $ivf_art_summary_list->RowCnt . '_ivf_art_summary', 'data-rowtype'=>$ivf_art_summary->RowType));

		// Render row
		$ivf_art_summary_list->renderRow();

		// Render list options
		$ivf_art_summary_list->renderListOptions();
?>
	<tr<?php echo $ivf_art_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_art_summary_list->ListOptions->render("body", "left", $ivf_art_summary_list->RowCnt);
?>
	<?php if ($ivf_art_summary->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_art_summary->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_id" class="ivf_art_summary_id">
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<?php echo $ivf_art_summary->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_art_summary->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_art_summary->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
		<td data-name="Spermorigin"<?php echo $ivf_art_summary->Spermorigin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary->Spermorigin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Spermorigin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
		<td data-name="IndicationforART"<?php echo $ivf_art_summary->IndicationforART->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary->IndicationforART->viewAttributes() ?>>
<?php echo $ivf_art_summary->IndicationforART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
		<td data-name="DateofICSI"<?php echo $ivf_art_summary->DateofICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary->DateofICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofICSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $ivf_art_summary->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary->Origin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $ivf_art_summary->Status->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Status" class="ivf_art_summary_Status">
<span<?php echo $ivf_art_summary->Status->viewAttributes() ?>>
<?php echo $ivf_art_summary->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $ivf_art_summary->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Method" class="ivf_art_summary_Method">
<span<?php echo $ivf_art_summary->Method->viewAttributes() ?>>
<?php echo $ivf_art_summary->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
		<td data-name="pre_Concentration"<?php echo $ivf_art_summary->pre_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary->pre_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Concentration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
		<td data-name="pre_Motility"<?php echo $ivf_art_summary->pre_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary->pre_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Motility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
		<td data-name="pre_Morphology"<?php echo $ivf_art_summary->pre_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary->pre_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Morphology->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
		<td data-name="post_Concentration"<?php echo $ivf_art_summary->post_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary->post_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Concentration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
		<td data-name="post_Motility"<?php echo $ivf_art_summary->post_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary->post_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Motility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
		<td data-name="post_Morphology"<?php echo $ivf_art_summary->post_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary->post_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Morphology->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<td data-name="NumberofEmbryostransferred"<?php echo $ivf_art_summary->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary->NumberofEmbryostransferred->viewAttributes() ?>>
<?php echo $ivf_art_summary->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<td data-name="Embryosunderobservation"<?php echo $ivf_art_summary->Embryosunderobservation->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary->Embryosunderobservation->viewAttributes() ?>>
<?php echo $ivf_art_summary->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<td data-name="EmbryoDevelopmentSummary"<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<td data-name="EmbryologistSignature"<?php echo $ivf_art_summary->EmbryologistSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary->EmbryologistSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<td data-name="IVFRegistrationID"<?php echo $ivf_art_summary->IVFRegistrationID->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary->IVFRegistrationID->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique"<?php echo $ivf_art_summary->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_art_summary->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
		<td data-name="ICSIDetails"<?php echo $ivf_art_summary->ICSIDetails->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary->ICSIDetails->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSIDetails->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
		<td data-name="DateofET"<?php echo $ivf_art_summary->DateofET->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary->DateofET->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<td data-name="Reasonfornotranfer"<?php echo $ivf_art_summary->Reasonfornotranfer->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary->Reasonfornotranfer->viewAttributes() ?>>
<?php echo $ivf_art_summary->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<td data-name="EmbryosCryopreserved"<?php echo $ivf_art_summary->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary->EmbryosCryopreserved->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
		<td data-name="LegendCellStage"<?php echo $ivf_art_summary->LegendCellStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary->LegendCellStage->viewAttributes() ?>>
<?php echo $ivf_art_summary->LegendCellStage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<td data-name="ConsultantsSignature"<?php echo $ivf_art_summary->ConsultantsSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary->ConsultantsSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_art_summary->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Name" class="ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<?php echo $ivf_art_summary->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
		<td data-name="M2"<?php echo $ivf_art_summary->M2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_M2" class="ivf_art_summary_M2">
<span<?php echo $ivf_art_summary->M2->viewAttributes() ?>>
<?php echo $ivf_art_summary->M2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
		<td data-name="Mi2"<?php echo $ivf_art_summary->Mi2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary->Mi2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Mi2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
		<td data-name="ICSI"<?php echo $ivf_art_summary->ICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary->ICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
		<td data-name="IVF"<?php echo $ivf_art_summary->IVF->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary->IVF->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
		<td data-name="M1"<?php echo $ivf_art_summary->M1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_M1" class="ivf_art_summary_M1">
<span<?php echo $ivf_art_summary->M1->viewAttributes() ?>>
<?php echo $ivf_art_summary->M1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
		<td data-name="GV"<?php echo $ivf_art_summary->GV->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_GV" class="ivf_art_summary_GV">
<span<?php echo $ivf_art_summary->GV->viewAttributes() ?>>
<?php echo $ivf_art_summary->GV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
		<td data-name="Others"<?php echo $ivf_art_summary->Others->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Others" class="ivf_art_summary_Others">
<span<?php echo $ivf_art_summary->Others->viewAttributes() ?>>
<?php echo $ivf_art_summary->Others->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
		<td data-name="Normal2PN"<?php echo $ivf_art_summary->Normal2PN->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary->Normal2PN->viewAttributes() ?>>
<?php echo $ivf_art_summary->Normal2PN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<td data-name="Abnormalfertilisation1N"<?php echo $ivf_art_summary->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation1N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<td data-name="Abnormalfertilisation3N"<?php echo $ivf_art_summary->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation3N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
		<td data-name="NotFertilized"<?php echo $ivf_art_summary->NotFertilized->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary->NotFertilized->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotFertilized->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
		<td data-name="Degenerated"<?php echo $ivf_art_summary->Degenerated->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary->Degenerated->viewAttributes() ?>>
<?php echo $ivf_art_summary->Degenerated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
		<td data-name="SpermDate"<?php echo $ivf_art_summary->SpermDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary->SpermDate->viewAttributes() ?>>
<?php echo $ivf_art_summary->SpermDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
		<td data-name="Code1"<?php echo $ivf_art_summary->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary->Code1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
		<td data-name="Day1"<?php echo $ivf_art_summary->Day1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary->Day1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1"<?php echo $ivf_art_summary->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary->CellStage1->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1"<?php echo $ivf_art_summary->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary->Grade1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
		<td data-name="State1"<?php echo $ivf_art_summary->State1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_State1" class="ivf_art_summary_State1">
<span<?php echo $ivf_art_summary->State1->viewAttributes() ?>>
<?php echo $ivf_art_summary->State1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
		<td data-name="Code2"<?php echo $ivf_art_summary->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary->Code2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
		<td data-name="Day2"<?php echo $ivf_art_summary->Day2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary->Day2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2"<?php echo $ivf_art_summary->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary->CellStage2->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2"<?php echo $ivf_art_summary->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary->Grade2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
		<td data-name="State2"<?php echo $ivf_art_summary->State2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_State2" class="ivf_art_summary_State2">
<span<?php echo $ivf_art_summary->State2->viewAttributes() ?>>
<?php echo $ivf_art_summary->State2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
		<td data-name="Code3"<?php echo $ivf_art_summary->Code3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary->Code3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
		<td data-name="Day3"<?php echo $ivf_art_summary->Day3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary->Day3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
		<td data-name="CellStage3"<?php echo $ivf_art_summary->CellStage3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary->CellStage3->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
		<td data-name="Grade3"<?php echo $ivf_art_summary->Grade3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary->Grade3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
		<td data-name="State3"<?php echo $ivf_art_summary->State3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_State3" class="ivf_art_summary_State3">
<span<?php echo $ivf_art_summary->State3->viewAttributes() ?>>
<?php echo $ivf_art_summary->State3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
		<td data-name="Code4"<?php echo $ivf_art_summary->Code4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary->Code4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
		<td data-name="Day4"<?php echo $ivf_art_summary->Day4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary->Day4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
		<td data-name="CellStage4"<?php echo $ivf_art_summary->CellStage4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary->CellStage4->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
		<td data-name="Grade4"<?php echo $ivf_art_summary->Grade4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary->Grade4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
		<td data-name="State4"<?php echo $ivf_art_summary->State4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_State4" class="ivf_art_summary_State4">
<span<?php echo $ivf_art_summary->State4->viewAttributes() ?>>
<?php echo $ivf_art_summary->State4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
		<td data-name="Code5"<?php echo $ivf_art_summary->Code5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary->Code5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
		<td data-name="Day5"<?php echo $ivf_art_summary->Day5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary->Day5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
		<td data-name="CellStage5"<?php echo $ivf_art_summary->CellStage5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary->CellStage5->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
		<td data-name="Grade5"<?php echo $ivf_art_summary->Grade5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary->Grade5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
		<td data-name="State5"<?php echo $ivf_art_summary->State5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_State5" class="ivf_art_summary_State5">
<span<?php echo $ivf_art_summary->State5->viewAttributes() ?>>
<?php echo $ivf_art_summary->State5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_art_summary->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_art_summary->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
		<td data-name="Volume"<?php echo $ivf_art_summary->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary->Volume->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1"<?php echo $ivf_art_summary->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary->Volume1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2"<?php echo $ivf_art_summary->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary->Volume2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2"<?php echo $ivf_art_summary->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary->Concentration2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Concentration2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $ivf_art_summary->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Total" class="ivf_art_summary_Total">
<span<?php echo $ivf_art_summary->Total->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
		<td data-name="Total1"<?php echo $ivf_art_summary->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary->Total1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
		<td data-name="Total2"<?php echo $ivf_art_summary->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary->Total2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
		<td data-name="Progressive"<?php echo $ivf_art_summary->Progressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary->Progressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
		<td data-name="Progressive1"<?php echo $ivf_art_summary->Progressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary->Progressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
		<td data-name="Progressive2"<?php echo $ivf_art_summary->Progressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary->Progressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
		<td data-name="NotProgressive"<?php echo $ivf_art_summary->NotProgressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary->NotProgressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
		<td data-name="NotProgressive1"<?php echo $ivf_art_summary->NotProgressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary->NotProgressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
		<td data-name="NotProgressive2"<?php echo $ivf_art_summary->NotProgressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary->NotProgressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
		<td data-name="Motility2"<?php echo $ivf_art_summary->Motility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary->Motility2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Motility2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
		<td data-name="Morphology2"<?php echo $ivf_art_summary->Morphology2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCnt ?>_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary->Morphology2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Morphology2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_art_summary_list->ListOptions->render("body", "right", $ivf_art_summary_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_art_summary->isGridAdd())
		$ivf_art_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_art_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_art_summary_list->Recordset)
	$ivf_art_summary_list->Recordset->Close();
?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_art_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_art_summary_list->Pager)) $ivf_art_summary_list->Pager = new NumericPager($ivf_art_summary_list->StartRec, $ivf_art_summary_list->DisplayRecs, $ivf_art_summary_list->TotalRecs, $ivf_art_summary_list->RecRange, $ivf_art_summary_list->AutoHidePager) ?>
<?php if ($ivf_art_summary_list->Pager->RecordCount > 0 && $ivf_art_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_art_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_art_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_art_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_art_summary_list->pageUrl() ?>start=<?php echo $ivf_art_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_art_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_art_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_art_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_art_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_art_summary_list->TotalRecs > 0 && (!$ivf_art_summary_list->AutoHidePageSizeSelector || $ivf_art_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_art_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_art_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_art_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_art_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_art_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_art_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_art_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_art_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_art_summary_list->TotalRecs == 0 && !$ivf_art_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_art_summary_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_art_summary", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_art_summary_list->terminate();
?>