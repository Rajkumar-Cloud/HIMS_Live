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
$ivf_list = new ivf_list();

// Run the page
$ivf_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivflist = currentForm = new ew.Form("fivflist", "list");
fivflist.formKeyCountName = '<?php echo $ivf_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivflist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivflist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivflist.lists["x_Male"] = <?php echo $ivf_list->Male->Lookup->toClientList() ?>;
fivflist.lists["x_Male"].options = <?php echo JsonEncode($ivf_list->Male->lookupOptions()) ?>;
fivflist.lists["x_Female"] = <?php echo $ivf_list->Female->Lookup->toClientList() ?>;
fivflist.lists["x_Female"].options = <?php echo JsonEncode($ivf_list->Female->lookupOptions()) ?>;
fivflist.lists["x_status"] = <?php echo $ivf_list->status->Lookup->toClientList() ?>;
fivflist.lists["x_status"].options = <?php echo JsonEncode($ivf_list->status->lookupOptions()) ?>;
fivflist.lists["x_ReferedBy"] = <?php echo $ivf_list->ReferedBy->Lookup->toClientList() ?>;
fivflist.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_list->ReferedBy->lookupOptions()) ?>;
fivflist.lists["x_ARTCYCLE"] = <?php echo $ivf_list->ARTCYCLE->Lookup->toClientList() ?>;
fivflist.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_list->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivflist.lists["x_RESULT"] = <?php echo $ivf_list->RESULT->Lookup->toClientList() ?>;
fivflist.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_list->RESULT->options(FALSE, TRUE)) ?>;
fivflist.lists["x_DrID"] = <?php echo $ivf_list->DrID->Lookup->toClientList() ?>;
fivflist.lists["x_DrID"].options = <?php echo JsonEncode($ivf_list->DrID->lookupOptions()) ?>;

// Form object for search
var fivflistsrch = currentSearchForm = new ew.Form("fivflistsrch");

// Validate function for search
fivflistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fivflistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivflistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fivflistsrch.filterList = <?php echo $ivf_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #B0C4DE; /* preview row color */
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
ew.PREVIEW_OVERLAY = true;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_list->TotalRecs > 0 && $ivf_list->ExportOptions->visible()) { ?>
<?php $ivf_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_list->ImportOptions->visible()) { ?>
<?php $ivf_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_list->SearchOptions->visible()) { ?>
<?php $ivf_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_list->FilterOptions->visible()) { ?>
<?php $ivf_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf->isExport() && !$ivf->CurrentAction) { ?>
<form name="fivflistsrch" id="fivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivflistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$ivf_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$ivf->RowType = ROWTYPE_SEARCH;

// Render row
$ivf->resetAttributes();
$ivf_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $ivf->CoupleID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->CoupleID->getPlaceHolder()) ?>" value="<?php echo $ivf->CoupleID->EditValue ?>"<?php echo $ivf->CoupleID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $ivf->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientName->EditValue ?>"<?php echo $ivf->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $ivf->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientID->EditValue ?>"<?php echo $ivf->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $ivf->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf->PartnerName->EditValue ?>"<?php echo $ivf->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $ivf->PartnerID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf->PartnerID->EditValue ?>"<?php echo $ivf->PartnerID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_list->showPageHeader(); ?>
<?php
$ivf_list->showMessage();
?>
<?php if ($ivf_list->TotalRecs > 0 || $ivf->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf">
<?php if (!$ivf->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_list->Pager)) $ivf_list->Pager = new NumericPager($ivf_list->StartRec, $ivf_list->DisplayRecs, $ivf_list->TotalRecs, $ivf_list->RecRange, $ivf_list->AutoHidePager) ?>
<?php if ($ivf_list->Pager->RecordCount > 0 && $ivf_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_list->TotalRecs > 0 && (!$ivf_list->AutoHidePageSizeSelector || $ivf_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivflist" id="fivflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<div id="gmp_ivf" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_list->TotalRecs > 0 || $ivf->isGridEdit()) { ?>
<table id="tbl_ivflist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_list->renderListOptions();

// Render list options (header, left)
$ivf_list->ListOptions->render("header", "left", "", "block", $ivf->TableVar, "ivflist");
?>
<?php if ($ivf->id->Visible) { // id ?>
	<?php if ($ivf->sortUrl($ivf->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf->id->headerCellClass() ?>"><div id="elh_ivf_id" class="ivf_id"><div class="ew-table-header-caption"><script id="tpc_ivf_id" class="ivflist" type="text/html"><span><?php echo $ivf->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf->id->headerCellClass() ?>"><script id="tpc_ivf_id" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->id) ?>',1);"><div id="elh_ivf_id" class="ivf_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
	<?php if ($ivf->sortUrl($ivf->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $ivf->Male->headerCellClass() ?>"><div id="elh_ivf_Male" class="ivf_Male"><div class="ew-table-header-caption"><script id="tpc_ivf_Male" class="ivflist" type="text/html"><span><?php echo $ivf->Male->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $ivf->Male->headerCellClass() ?>"><script id="tpc_ivf_Male" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->Male) ?>',1);"><div id="elh_ivf_Male" class="ivf_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->Male->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->Male->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
	<?php if ($ivf->sortUrl($ivf->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $ivf->Female->headerCellClass() ?>"><div id="elh_ivf_Female" class="ivf_Female"><div class="ew-table-header-caption"><script id="tpc_ivf_Female" class="ivflist" type="text/html"><span><?php echo $ivf->Female->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $ivf->Female->headerCellClass() ?>"><script id="tpc_ivf_Female" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->Female) ?>',1);"><div id="elh_ivf_Female" class="ivf_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->Female->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->Female->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
	<?php if ($ivf->sortUrl($ivf->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf->status->headerCellClass() ?>"><div id="elh_ivf_status" class="ivf_status"><div class="ew-table-header-caption"><script id="tpc_ivf_status" class="ivflist" type="text/html"><span><?php echo $ivf->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf->status->headerCellClass() ?>"><script id="tpc_ivf_status" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->status) ?>',1);"><div id="elh_ivf_status" class="ivf_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
	<?php if ($ivf->sortUrl($ivf->malepropic) == "") { ?>
		<th data-name="malepropic" class="<?php echo $ivf->malepropic->headerCellClass() ?>"><div id="elh_ivf_malepropic" class="ivf_malepropic"><div class="ew-table-header-caption"><script id="tpc_ivf_malepropic" class="ivflist" type="text/html"><span><?php echo $ivf->malepropic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="malepropic" class="<?php echo $ivf->malepropic->headerCellClass() ?>"><script id="tpc_ivf_malepropic" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->malepropic) ?>',1);"><div id="elh_ivf_malepropic" class="ivf_malepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->malepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->malepropic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->malepropic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
	<?php if ($ivf->sortUrl($ivf->femalepropic) == "") { ?>
		<th data-name="femalepropic" class="<?php echo $ivf->femalepropic->headerCellClass() ?>"><div id="elh_ivf_femalepropic" class="ivf_femalepropic"><div class="ew-table-header-caption"><script id="tpc_ivf_femalepropic" class="ivflist" type="text/html"><span><?php echo $ivf->femalepropic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="femalepropic" class="<?php echo $ivf->femalepropic->headerCellClass() ?>"><script id="tpc_ivf_femalepropic" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->femalepropic) ?>',1);"><div id="elh_ivf_femalepropic" class="ivf_femalepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->femalepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->femalepropic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->femalepropic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($ivf->sortUrl($ivf->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $ivf->HusbandEducation->headerCellClass() ?>"><div id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandEducation" class="ivflist" type="text/html"><span><?php echo $ivf->HusbandEducation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $ivf->HusbandEducation->headerCellClass() ?>"><script id="tpc_ivf_HusbandEducation" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->HusbandEducation) ?>',1);"><div id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->HusbandEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->HusbandEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($ivf->sortUrl($ivf->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $ivf->WifeEducation->headerCellClass() ?>"><div id="elh_ivf_WifeEducation" class="ivf_WifeEducation"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeEducation" class="ivflist" type="text/html"><span><?php echo $ivf->WifeEducation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $ivf->WifeEducation->headerCellClass() ?>"><script id="tpc_ivf_WifeEducation" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->WifeEducation) ?>',1);"><div id="elh_ivf_WifeEducation" class="ivf_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->WifeEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->WifeEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($ivf->sortUrl($ivf->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $ivf->HusbandWorkHours->headerCellClass() ?>"><div id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandWorkHours" class="ivflist" type="text/html"><span><?php echo $ivf->HusbandWorkHours->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $ivf->HusbandWorkHours->headerCellClass() ?>"><script id="tpc_ivf_HusbandWorkHours" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->HusbandWorkHours) ?>',1);"><div id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->HusbandWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->HusbandWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($ivf->sortUrl($ivf->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $ivf->WifeWorkHours->headerCellClass() ?>"><div id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeWorkHours" class="ivflist" type="text/html"><span><?php echo $ivf->WifeWorkHours->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $ivf->WifeWorkHours->headerCellClass() ?>"><script id="tpc_ivf_WifeWorkHours" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->WifeWorkHours) ?>',1);"><div id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->WifeWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->WifeWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($ivf->sortUrl($ivf->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $ivf->PatientLanguage->headerCellClass() ?>"><div id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage"><div class="ew-table-header-caption"><script id="tpc_ivf_PatientLanguage" class="ivflist" type="text/html"><span><?php echo $ivf->PatientLanguage->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $ivf->PatientLanguage->headerCellClass() ?>"><script id="tpc_ivf_PatientLanguage" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->PatientLanguage) ?>',1);"><div id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->PatientLanguage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->PatientLanguage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($ivf->sortUrl($ivf->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $ivf->ReferedBy->headerCellClass() ?>"><div id="elh_ivf_ReferedBy" class="ivf_ReferedBy"><div class="ew-table-header-caption"><script id="tpc_ivf_ReferedBy" class="ivflist" type="text/html"><span><?php echo $ivf->ReferedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $ivf->ReferedBy->headerCellClass() ?>"><script id="tpc_ivf_ReferedBy" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->ReferedBy) ?>',1);"><div id="elh_ivf_ReferedBy" class="ivf_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->ReferedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->ReferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->ReferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($ivf->sortUrl($ivf->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $ivf->ReferPhNo->headerCellClass() ?>"><div id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo"><div class="ew-table-header-caption"><script id="tpc_ivf_ReferPhNo" class="ivflist" type="text/html"><span><?php echo $ivf->ReferPhNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $ivf->ReferPhNo->headerCellClass() ?>"><script id="tpc_ivf_ReferPhNo" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->ReferPhNo) ?>',1);"><div id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->ReferPhNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->ReferPhNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
	<?php if ($ivf->sortUrl($ivf->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $ivf->WifeCell->headerCellClass() ?>"><div id="elh_ivf_WifeCell" class="ivf_WifeCell"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeCell" class="ivflist" type="text/html"><span><?php echo $ivf->WifeCell->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $ivf->WifeCell->headerCellClass() ?>"><script id="tpc_ivf_WifeCell" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->WifeCell) ?>',1);"><div id="elh_ivf_WifeCell" class="ivf_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->WifeCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->WifeCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($ivf->sortUrl($ivf->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $ivf->HusbandCell->headerCellClass() ?>"><div id="elh_ivf_HusbandCell" class="ivf_HusbandCell"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandCell" class="ivflist" type="text/html"><span><?php echo $ivf->HusbandCell->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $ivf->HusbandCell->headerCellClass() ?>"><script id="tpc_ivf_HusbandCell" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->HusbandCell) ?>',1);"><div id="elh_ivf_HusbandCell" class="ivf_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->HusbandCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->HusbandCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($ivf->sortUrl($ivf->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $ivf->WifeEmail->headerCellClass() ?>"><div id="elh_ivf_WifeEmail" class="ivf_WifeEmail"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeEmail" class="ivflist" type="text/html"><span><?php echo $ivf->WifeEmail->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $ivf->WifeEmail->headerCellClass() ?>"><script id="tpc_ivf_WifeEmail" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->WifeEmail) ?>',1);"><div id="elh_ivf_WifeEmail" class="ivf_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->WifeEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->WifeEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($ivf->sortUrl($ivf->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $ivf->HusbandEmail->headerCellClass() ?>"><div id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandEmail" class="ivflist" type="text/html"><span><?php echo $ivf->HusbandEmail->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $ivf->HusbandEmail->headerCellClass() ?>"><script id="tpc_ivf_HusbandEmail" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->HusbandEmail) ?>',1);"><div id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->HusbandEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->HusbandEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf->sortUrl($ivf->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE"><div class="ew-table-header-caption"><script id="tpc_ivf_ARTCYCLE" class="ivflist" type="text/html"><span><?php echo $ivf->ARTCYCLE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf->ARTCYCLE->headerCellClass() ?>"><script id="tpc_ivf_ARTCYCLE" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->ARTCYCLE) ?>',1);"><div id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf->sortUrl($ivf->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $ivf->RESULT->headerCellClass() ?>"><div id="elh_ivf_RESULT" class="ivf_RESULT"><div class="ew-table-header-caption"><script id="tpc_ivf_RESULT" class="ivflist" type="text/html"><span><?php echo $ivf->RESULT->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $ivf->RESULT->headerCellClass() ?>"><script id="tpc_ivf_RESULT" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->RESULT) ?>',1);"><div id="elh_ivf_RESULT" class="ivf_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
	<?php if ($ivf->sortUrl($ivf->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $ivf->CoupleID->headerCellClass() ?>"><div id="elh_ivf_CoupleID" class="ivf_CoupleID"><div class="ew-table-header-caption"><script id="tpc_ivf_CoupleID" class="ivflist" type="text/html"><span><?php echo $ivf->CoupleID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $ivf->CoupleID->headerCellClass() ?>"><script id="tpc_ivf_CoupleID" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->CoupleID) ?>',1);"><div id="elh_ivf_CoupleID" class="ivf_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->HospID->Visible) { // HospID ?>
	<?php if ($ivf->sortUrl($ivf->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $ivf->HospID->headerCellClass() ?>"><div id="elh_ivf_HospID" class="ivf_HospID"><div class="ew-table-header-caption"><script id="tpc_ivf_HospID" class="ivflist" type="text/html"><span><?php echo $ivf->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $ivf->HospID->headerCellClass() ?>"><script id="tpc_ivf_HospID" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->HospID) ?>',1);"><div id="elh_ivf_HospID" class="ivf_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf->sortUrl($ivf->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $ivf->PatientName->headerCellClass() ?>"><div id="elh_ivf_PatientName" class="ivf_PatientName"><div class="ew-table-header-caption"><script id="tpc_ivf_PatientName" class="ivflist" type="text/html"><span><?php echo $ivf->PatientName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $ivf->PatientName->headerCellClass() ?>"><script id="tpc_ivf_PatientName" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->PatientName) ?>',1);"><div id="elh_ivf_PatientName" class="ivf_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
	<?php if ($ivf->sortUrl($ivf->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $ivf->PatientID->headerCellClass() ?>"><div id="elh_ivf_PatientID" class="ivf_PatientID"><div class="ew-table-header-caption"><script id="tpc_ivf_PatientID" class="ivflist" type="text/html"><span><?php echo $ivf->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $ivf->PatientID->headerCellClass() ?>"><script id="tpc_ivf_PatientID" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->PatientID) ?>',1);"><div id="elh_ivf_PatientID" class="ivf_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf->sortUrl($ivf->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ivf->PartnerName->headerCellClass() ?>"><div id="elh_ivf_PartnerName" class="ivf_PartnerName"><div class="ew-table-header-caption"><script id="tpc_ivf_PartnerName" class="ivflist" type="text/html"><span><?php echo $ivf->PartnerName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ivf->PartnerName->headerCellClass() ?>"><script id="tpc_ivf_PartnerName" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->PartnerName) ?>',1);"><div id="elh_ivf_PartnerName" class="ivf_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf->sortUrl($ivf->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ivf->PartnerID->headerCellClass() ?>"><div id="elh_ivf_PartnerID" class="ivf_PartnerID"><div class="ew-table-header-caption"><script id="tpc_ivf_PartnerID" class="ivflist" type="text/html"><span><?php echo $ivf->PartnerID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ivf->PartnerID->headerCellClass() ?>"><script id="tpc_ivf_PartnerID" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->PartnerID) ?>',1);"><div id="elh_ivf_PartnerID" class="ivf_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
	<?php if ($ivf->sortUrl($ivf->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $ivf->DrID->headerCellClass() ?>"><div id="elh_ivf_DrID" class="ivf_DrID"><div class="ew-table-header-caption"><script id="tpc_ivf_DrID" class="ivflist" type="text/html"><span><?php echo $ivf->DrID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $ivf->DrID->headerCellClass() ?>"><script id="tpc_ivf_DrID" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->DrID) ?>',1);"><div id="elh_ivf_DrID" class="ivf_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($ivf->sortUrl($ivf->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $ivf->DrDepartment->headerCellClass() ?>"><div id="elh_ivf_DrDepartment" class="ivf_DrDepartment"><div class="ew-table-header-caption"><script id="tpc_ivf_DrDepartment" class="ivflist" type="text/html"><span><?php echo $ivf->DrDepartment->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $ivf->DrDepartment->headerCellClass() ?>"><script id="tpc_ivf_DrDepartment" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->DrDepartment) ?>',1);"><div id="elh_ivf_DrDepartment" class="ivf_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
	<?php if ($ivf->sortUrl($ivf->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $ivf->Doctor->headerCellClass() ?>"><div id="elh_ivf_Doctor" class="ivf_Doctor"><div class="ew-table-header-caption"><script id="tpc_ivf_Doctor" class="ivflist" type="text/html"><span><?php echo $ivf->Doctor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $ivf->Doctor->headerCellClass() ?>"><script id="tpc_ivf_Doctor" class="ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf->SortUrl($ivf->Doctor) ?>',1);"><div id="elh_ivf_Doctor" class="ivf_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_list->ListOptions->render("header", "right", "", "block", $ivf->TableVar, "ivflist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf->ExportAll && $ivf->isExport()) {
	$ivf_list->StopRec = $ivf_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_list->TotalRecs > $ivf_list->StartRec + $ivf_list->DisplayRecs - 1)
		$ivf_list->StopRec = $ivf_list->StartRec + $ivf_list->DisplayRecs - 1;
	else
		$ivf_list->StopRec = $ivf_list->TotalRecs;
}
$ivf_list->RecCnt = $ivf_list->StartRec - 1;
if ($ivf_list->Recordset && !$ivf_list->Recordset->EOF) {
	$ivf_list->Recordset->moveFirst();
	$selectLimit = $ivf_list->UseSelectLimit;
	if (!$selectLimit && $ivf_list->StartRec > 1)
		$ivf_list->Recordset->move($ivf_list->StartRec - 1);
} elseif (!$ivf->AllowAddDeleteRow && $ivf_list->StopRec == 0) {
	$ivf_list->StopRec = $ivf->GridAddRowCount;
}

// Initialize aggregate
$ivf->RowType = ROWTYPE_AGGREGATEINIT;
$ivf->resetAttributes();
$ivf_list->renderRow();
while ($ivf_list->RecCnt < $ivf_list->StopRec) {
	$ivf_list->RecCnt++;
	if ($ivf_list->RecCnt >= $ivf_list->StartRec) {
		$ivf_list->RowCnt++;

		// Set up key count
		$ivf_list->KeyCount = $ivf_list->RowIndex;

		// Init row class and style
		$ivf->resetAttributes();
		$ivf->CssClass = "";
		if ($ivf->isGridAdd()) {
		} else {
			$ivf_list->loadRowValues($ivf_list->Recordset); // Load row values
		}
		$ivf->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf->RowAttrs = array_merge($ivf->RowAttrs, array('data-rowindex'=>$ivf_list->RowCnt, 'id'=>'r' . $ivf_list->RowCnt . '_ivf', 'data-rowtype'=>$ivf->RowType));

		// Render row
		$ivf_list->renderRow();

		// Render list options
		$ivf_list->renderListOptions();

		// Save row and cell attributes
		$ivf_list->Attrs[$ivf_list->RowCnt] = array("row_attrs" => $ivf->rowAttributes(), "cell_attrs" => array());
		$ivf_list->Attrs[$ivf_list->RowCnt]["cell_attrs"] = $ivf->fieldCellAttributes();
?>
	<tr<?php echo $ivf->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_list->ListOptions->render("body", "left", $ivf_list->RowCnt, "block", $ivf->TableVar, "ivflist");
?>
	<?php if ($ivf->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf->id->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_id" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_id" class="ivf_id">
<span<?php echo $ivf->id->viewAttributes() ?>>
<?php echo $ivf->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->Male->Visible) { // Male ?>
		<td data-name="Male"<?php echo $ivf->Male->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_Male" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_Male" class="ivf_Male">
<span<?php echo $ivf->Male->viewAttributes() ?>>
<?php echo $ivf->Male->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->Female->Visible) { // Female ?>
		<td data-name="Female"<?php echo $ivf->Female->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_Female" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_Female" class="ivf_Female">
<span<?php echo $ivf->Female->viewAttributes() ?>>
<?php echo $ivf->Female->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf->status->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_status" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_status" class="ivf_status">
<span<?php echo $ivf->status->viewAttributes() ?>>
<?php echo $ivf->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->malepropic->Visible) { // malepropic ?>
		<td data-name="malepropic"<?php echo $ivf->malepropic->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_malepropic" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_malepropic" class="ivf_malepropic">
<span>
<?php echo GetFileViewTag($ivf->malepropic, $ivf->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
		<td data-name="femalepropic"<?php echo $ivf->femalepropic->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_femalepropic" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_femalepropic" class="ivf_femalepropic">
<span>
<?php echo GetFileViewTag($ivf->femalepropic, $ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation"<?php echo $ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_HusbandEducation" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_HusbandEducation" class="ivf_HusbandEducation">
<span<?php echo $ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $ivf->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation"<?php echo $ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_WifeEducation" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_WifeEducation" class="ivf_WifeEducation">
<span<?php echo $ivf->WifeEducation->viewAttributes() ?>>
<?php echo $ivf->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours"<?php echo $ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_HusbandWorkHours" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours">
<span<?php echo $ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours"<?php echo $ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_WifeWorkHours" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_WifeWorkHours" class="ivf_WifeWorkHours">
<span<?php echo $ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage"<?php echo $ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_PatientLanguage" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_PatientLanguage" class="ivf_PatientLanguage">
<span<?php echo $ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $ivf->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy"<?php echo $ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_ReferedBy" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_ReferedBy" class="ivf_ReferedBy">
<span<?php echo $ivf->ReferedBy->viewAttributes() ?>>
<?php echo $ivf->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo"<?php echo $ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_ReferPhNo" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_ReferPhNo" class="ivf_ReferPhNo">
<span<?php echo $ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $ivf->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell"<?php echo $ivf->WifeCell->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_WifeCell" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_WifeCell" class="ivf_WifeCell">
<span<?php echo $ivf->WifeCell->viewAttributes() ?>>
<?php echo $ivf->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell"<?php echo $ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_HusbandCell" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_HusbandCell" class="ivf_HusbandCell">
<span<?php echo $ivf->HusbandCell->viewAttributes() ?>>
<?php echo $ivf->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail"<?php echo $ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_WifeEmail" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_WifeEmail" class="ivf_WifeEmail">
<span<?php echo $ivf->WifeEmail->viewAttributes() ?>>
<?php echo $ivf->WifeEmail->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail"<?php echo $ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_HusbandEmail" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_HusbandEmail" class="ivf_HusbandEmail">
<span<?php echo $ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $ivf->HusbandEmail->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_ARTCYCLE" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_ARTCYCLE" class="ivf_ARTCYCLE">
<span<?php echo $ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $ivf->RESULT->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_RESULT" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_RESULT" class="ivf_RESULT">
<span<?php echo $ivf->RESULT->viewAttributes() ?>>
<?php echo $ivf->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $ivf->CoupleID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_CoupleID" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_CoupleID" class="ivf_CoupleID">
<span<?php echo $ivf->CoupleID->viewAttributes() ?>>
<?php echo $ivf->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $ivf->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_HospID" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_HospID" class="ivf_HospID">
<span<?php echo $ivf->HospID->viewAttributes() ?>>
<?php echo $ivf->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $ivf->PatientName->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_PatientName" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_PatientName" class="ivf_PatientName">
<span<?php echo $ivf->PatientName->viewAttributes() ?>>
<?php echo $ivf->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $ivf->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_PatientID" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_PatientID" class="ivf_PatientID">
<span<?php echo $ivf->PatientID->viewAttributes() ?>>
<?php echo $ivf->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $ivf->PartnerName->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_PartnerName" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_PartnerName" class="ivf_PartnerName">
<span<?php echo $ivf->PartnerName->viewAttributes() ?>>
<?php echo $ivf->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $ivf->PartnerID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_PartnerID" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_PartnerID" class="ivf_PartnerID">
<span<?php echo $ivf->PartnerID->viewAttributes() ?>>
<?php echo $ivf->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $ivf->DrID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_DrID" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_DrID" class="ivf_DrID">
<span<?php echo $ivf->DrID->viewAttributes() ?>>
<?php echo $ivf->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_DrDepartment" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_DrDepartment" class="ivf_DrDepartment">
<span<?php echo $ivf->DrDepartment->viewAttributes() ?>>
<?php echo $ivf->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($ivf->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $ivf->Doctor->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCnt ?>_ivf_Doctor" class="ivflist" type="text/html">
<span id="el<?php echo $ivf_list->RowCnt ?>_ivf_Doctor" class="ivf_Doctor">
<span<?php echo $ivf->Doctor->viewAttributes() ?>>
<?php echo $ivf->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_list->ListOptions->render("body", "right", $ivf_list->RowCnt, "block", $ivf->TableVar, "ivflist");
?>
	</tr>
<?php
	}
	if (!$ivf->isGridAdd())
		$ivf_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_ivflist" class="ew-custom-template"></div>
<script id="tpm_ivflist" type="text/html">
<div id="ct_ivf_list"><?php if ($ivf_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	{{include tmpl="#tpoh_ivf"/}}
	<td rowspan="2">Vitals</td>
	<td rowspan="2">Home</td>
	<td rowspan="2">{{include tmpl="#tpc_ivf_CoupleID"/}}</td>
	<td rowspan="2">{{include tmpl="#tpc_ivf_malepropic"/}}</td>
		<td rowspan="2">{{include tmpl="#tpc_ivf_femalepropic"/}}</td>
	<td>{{include tmpl="#tpc_ivf_PatientID"/}}</td>
				<td>{{include tmpl="#tpc_ivf_ARTCYCLE"/}}</td>
					<td>{{include tmpl="#tpc_ivf_status"/}}</td>
	</tr>
	<tr class="ew-table-header">
	<td>{{include tmpl="#tpc_ivf_Female"/}}</td>
				<td>{{include tmpl="#tpc_ivf_RESULT"/}}</td>
					<td>{{include tmpl="#tpc_ivf_ReferedBy"/}}</td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $ivf_list->StartRowCnt; $i <= $ivf_list->RowCnt; $i++) { ?>
<tr<?php echo @$ivf_list->Attrs[$i]['row_attrs'] ?>> 
	{{include tmpl="#tpob<?php echo $i ?>_ivf"/}}
	<td rowspan="2">
				<a class="btn btn-app" href="view_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=&fk_RIDNO={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_Name={{: ~root.rows[<?php echo $i - 1 ?>].Female }}">
				  <i class="fas fa-user-md"></i> Vitals
				</a>
	</td>
	<td rowspan="2">
				<a class="btn btn-app" href="FertilityHome.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_ivf_CoupleID"/}}</td>
	<td rowspan="2">
	<img src="uploads\{{: ~root.rows[<?php echo $i - 1 ?>].PartnerID }}.jpg"  onerror="this.src = 'uploads/hims/profile-picture.png';"  width="80" height="80">	
	</td>
		<td rowspan="2">
	<img src="uploads\{{: ~root.rows[<?php echo $i - 1 ?>].PatientID }}.jpg"  onerror="this.src = 'uploads/hims/profile-picture.png';"  width="80" height="80">	
		</td>
	<td>{{include tmpl="#tpx<?php echo $i ?>_ivf_Male"/}}</td>
				<td>{{include tmpl="#tpx<?php echo $i ?>_ivf_ARTCYCLE"/}}</td>
					<td>{{include tmpl="#tpx<?php echo $i ?>_ivf_status"/}}</td>
</tr>
<tr<?php echo @$ivf_list->Attrs[$i]['row_attrs'] ?>>
	<td>{{include tmpl="#tpx<?php echo $i ?>_ivf_Female"/}}</td>
				<td>{{include tmpl="#tpx<?php echo $i ?>_ivf_RESULT"/}}</td>
					<td>{{include tmpl="#tpx<?php echo $i ?>_ivf_ReferedBy"/}}</td>
</tr>
<?php } ?>
	</tbody>
	<!-- <?php if ($ivf_list->TotalRecs > 0 && !$ivf->isGridAdd() && !$ivf->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer">{{include tmpl="#tpof_ivf"/}}<td>{{include tmpl="#tpg_MyField1"/}}</td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_list->Recordset)
	$ivf_list->Recordset->Close();
?>
<?php if (!$ivf->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_list->Pager)) $ivf_list->Pager = new NumericPager($ivf_list->StartRec, $ivf_list->DisplayRecs, $ivf_list->TotalRecs, $ivf_list->RecRange, $ivf_list->AutoHidePager) ?>
<?php if ($ivf_list->Pager->RecordCount > 0 && $ivf_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_list->pageUrl() ?>start=<?php echo $ivf_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_list->TotalRecs > 0 && (!$ivf_list->AutoHidePageSizeSelector || $ivf_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_list->TotalRecs == 0 && !$ivf->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
ew.applyTemplate("tpd_ivflist", "tpm_ivflist", "ivflist", "<?php echo $ivf->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_ivflist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_ivflist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.ivflist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_list->terminate();
?>