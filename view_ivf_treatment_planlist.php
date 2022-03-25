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
$view_ivf_treatment_plan_list = new view_ivf_treatment_plan_list();

// Run the page
$view_ivf_treatment_plan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ivf_treatment_planlist = currentForm = new ew.Form("fview_ivf_treatment_planlist", "list");
fview_ivf_treatment_planlist.formKeyCountName = '<?php echo $view_ivf_treatment_plan_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ivf_treatment_planlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatment_planlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatment_planlist.lists["x_RIDNO"] = <?php echo $view_ivf_treatment_plan_list->RIDNO->Lookup->toClientList() ?>;
fview_ivf_treatment_planlist.lists["x_RIDNO"].options = <?php echo JsonEncode($view_ivf_treatment_plan_list->RIDNO->lookupOptions()) ?>;
fview_ivf_treatment_planlist.lists["x_treatment_status"] = <?php echo $view_ivf_treatment_plan_list->treatment_status->Lookup->toClientList() ?>;
fview_ivf_treatment_planlist.lists["x_treatment_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_list->treatment_status->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planlist.lists["x_ARTCYCLE"] = <?php echo $view_ivf_treatment_plan_list->ARTCYCLE->Lookup->toClientList() ?>;
fview_ivf_treatment_planlist.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($view_ivf_treatment_plan_list->ARTCYCLE->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planlist.lists["x_RESULT"] = <?php echo $view_ivf_treatment_plan_list->RESULT->Lookup->toClientList() ?>;
fview_ivf_treatment_planlist.lists["x_RESULT"].options = <?php echo JsonEncode($view_ivf_treatment_plan_list->RESULT->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_ivf_treatment_planlistsrch = currentSearchForm = new ew.Form("fview_ivf_treatment_planlistsrch");

// Validate function for search
fview_ivf_treatment_planlistsrch.validate = function(fobj) {
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
fview_ivf_treatment_planlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatment_planlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_ivf_treatment_planlistsrch.filterList = <?php echo $view_ivf_treatment_plan_list->getFilterList() ?>;
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
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ivf_treatment_plan_list->TotalRecs > 0 && $view_ivf_treatment_plan_list->ExportOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->ImportOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->SearchOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->FilterOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ivf_treatment_plan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ivf_treatment_plan->isExport() && !$view_ivf_treatment_plan->CurrentAction) { ?>
<form name="fview_ivf_treatment_planlistsrch" id="fview_ivf_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ivf_treatment_plan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ivf_treatment_planlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_treatment_plan">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_ivf_treatment_plan_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_ivf_treatment_plan->RowType = ROWTYPE_SEARCH;

// Render row
$view_ivf_treatment_plan->resetAttributes();
$view_ivf_treatment_plan_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->CoupleID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->CoupleID->EditValue ?>"<?php echo $view_ivf_treatment_plan->CoupleID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PatientID->EditValue ?>"<?php echo $view_ivf_treatment_plan->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PatientName->EditValue ?>"<?php echo $view_ivf_treatment_plan->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
	<div id="xsc_WifeCell" class="ew-cell form-group">
		<label for="x_WifeCell" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->WifeCell->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->WifeCell->EditValue ?>"<?php echo $view_ivf_treatment_plan->WifeCell->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->PartnerID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PartnerID->EditValue ?>"<?php echo $view_ivf_treatment_plan->PartnerID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PartnerName->EditValue ?>"<?php echo $view_ivf_treatment_plan->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
	<div id="xsc_HusbandCell" class="ew-cell form-group">
		<label for="x_HusbandCell" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan->HusbandCell->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->HusbandCell->EditValue ?>"<?php echo $view_ivf_treatment_plan->HusbandCell->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ivf_treatment_plan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ivf_treatment_plan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ivf_treatment_plan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ivf_treatment_plan_list->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_list->showMessage();
?>
<?php if ($view_ivf_treatment_plan_list->TotalRecs > 0 || $view_ivf_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ivf_treatment_plan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_treatment_plan">
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ivf_treatment_plan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ivf_treatment_plan_list->Pager)) $view_ivf_treatment_plan_list->Pager = new NumericPager($view_ivf_treatment_plan_list->StartRec, $view_ivf_treatment_plan_list->DisplayRecs, $view_ivf_treatment_plan_list->TotalRecs, $view_ivf_treatment_plan_list->RecRange, $view_ivf_treatment_plan_list->AutoHidePager) ?>
<?php if ($view_ivf_treatment_plan_list->Pager->RecordCount > 0 && $view_ivf_treatment_plan_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ivf_treatment_plan_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ivf_treatment_plan_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ivf_treatment_plan_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ivf_treatment_plan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ivf_treatment_plan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ivf_treatment_plan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->TotalRecs > 0 && (!$view_ivf_treatment_plan_list->AutoHidePageSizeSelector || $view_ivf_treatment_plan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ivf_treatment_plan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ivf_treatment_planlist" id="fview_ivf_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_treatment_plan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_treatment_plan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<div id="gmp_view_ivf_treatment_plan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ivf_treatment_plan_list->TotalRecs > 0 || $view_ivf_treatment_plan->isGridEdit()) { ?>
<table id="tbl_view_ivf_treatment_planlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ivf_treatment_plan_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ivf_treatment_plan_list->renderListOptions();

// Render list options (header, left)
$view_ivf_treatment_plan_list->ListOptions->render("header", "left");
?>
<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment_plan->CoupleID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment_plan->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->CoupleID) ?>',1);"><div id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ivf_treatment_plan->PatientID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ivf_treatment_plan->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->PatientID) ?>',1);"><div id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ivf_treatment_plan->PatientName->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ivf_treatment_plan->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->PatientName) ?>',1);"><div id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_ivf_treatment_plan->WifeCell->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_ivf_treatment_plan->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->WifeCell) ?>',1);"><div id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->WifeCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->WifeCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ivf_treatment_plan->PartnerID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ivf_treatment_plan->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->PartnerID) ?>',1);"><div id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ivf_treatment_plan->PartnerName->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ivf_treatment_plan->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->PartnerName) ?>',1);"><div id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ivf_treatment_plan->HusbandCell->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ivf_treatment_plan->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->HusbandCell) ?>',1);"><div id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->HusbandCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->HusbandCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment_plan->RIDNO->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment_plan->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->RIDNO) ?>',1);"><div id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->TreatmentStartDate) ?>',1);"><div id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->TreatmentStartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->TreatmentStartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->treatment_status) ?>',1);"><div id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->ARTCYCLE) ?>',1);"><div id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RESULT->Visible) { // RESULT ?>
	<?php if ($view_ivf_treatment_plan->sortUrl($view_ivf_treatment_plan->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment_plan->RESULT->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment_plan->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_treatment_plan->SortUrl($view_ivf_treatment_plan->RESULT) ?>',1);"><div id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ivf_treatment_plan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ivf_treatment_plan->ExportAll && $view_ivf_treatment_plan->isExport()) {
	$view_ivf_treatment_plan_list->StopRec = $view_ivf_treatment_plan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ivf_treatment_plan_list->TotalRecs > $view_ivf_treatment_plan_list->StartRec + $view_ivf_treatment_plan_list->DisplayRecs - 1)
		$view_ivf_treatment_plan_list->StopRec = $view_ivf_treatment_plan_list->StartRec + $view_ivf_treatment_plan_list->DisplayRecs - 1;
	else
		$view_ivf_treatment_plan_list->StopRec = $view_ivf_treatment_plan_list->TotalRecs;
}
$view_ivf_treatment_plan_list->RecCnt = $view_ivf_treatment_plan_list->StartRec - 1;
if ($view_ivf_treatment_plan_list->Recordset && !$view_ivf_treatment_plan_list->Recordset->EOF) {
	$view_ivf_treatment_plan_list->Recordset->moveFirst();
	$selectLimit = $view_ivf_treatment_plan_list->UseSelectLimit;
	if (!$selectLimit && $view_ivf_treatment_plan_list->StartRec > 1)
		$view_ivf_treatment_plan_list->Recordset->move($view_ivf_treatment_plan_list->StartRec - 1);
} elseif (!$view_ivf_treatment_plan->AllowAddDeleteRow && $view_ivf_treatment_plan_list->StopRec == 0) {
	$view_ivf_treatment_plan_list->StopRec = $view_ivf_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$view_ivf_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$view_ivf_treatment_plan->resetAttributes();
$view_ivf_treatment_plan_list->renderRow();
while ($view_ivf_treatment_plan_list->RecCnt < $view_ivf_treatment_plan_list->StopRec) {
	$view_ivf_treatment_plan_list->RecCnt++;
	if ($view_ivf_treatment_plan_list->RecCnt >= $view_ivf_treatment_plan_list->StartRec) {
		$view_ivf_treatment_plan_list->RowCnt++;

		// Set up key count
		$view_ivf_treatment_plan_list->KeyCount = $view_ivf_treatment_plan_list->RowIndex;

		// Init row class and style
		$view_ivf_treatment_plan->resetAttributes();
		$view_ivf_treatment_plan->CssClass = "";
		if ($view_ivf_treatment_plan->isGridAdd()) {
		} else {
			$view_ivf_treatment_plan_list->loadRowValues($view_ivf_treatment_plan_list->Recordset); // Load row values
		}
		$view_ivf_treatment_plan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ivf_treatment_plan->RowAttrs = array_merge($view_ivf_treatment_plan->RowAttrs, array('data-rowindex'=>$view_ivf_treatment_plan_list->RowCnt, 'id'=>'r' . $view_ivf_treatment_plan_list->RowCnt . '_view_ivf_treatment_plan', 'data-rowtype'=>$view_ivf_treatment_plan->RowType));

		// Render row
		$view_ivf_treatment_plan_list->renderRow();

		// Render list options
		$view_ivf_treatment_plan_list->renderListOptions();
?>
	<tr<?php echo $view_ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ivf_treatment_plan_list->ListOptions->render("body", "left", $view_ivf_treatment_plan_list->RowCnt);
?>
	<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_ivf_treatment_plan->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID">
<span<?php echo $view_ivf_treatment_plan->CoupleID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ivf_treatment_plan->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID">
<span<?php echo $view_ivf_treatment_plan->PatientID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_ivf_treatment_plan->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName">
<span<?php echo $view_ivf_treatment_plan->PatientName->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell"<?php echo $view_ivf_treatment_plan->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell">
<span<?php echo $view_ivf_treatment_plan->WifeCell->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_ivf_treatment_plan->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID">
<span<?php echo $view_ivf_treatment_plan->PartnerID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_ivf_treatment_plan->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName">
<span<?php echo $view_ivf_treatment_plan->PartnerName->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell"<?php echo $view_ivf_treatment_plan->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell">
<span<?php echo $view_ivf_treatment_plan->HusbandCell->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_ivf_treatment_plan->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO">
<span<?php echo $view_ivf_treatment_plan->RIDNO->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate"<?php echo $view_ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $view_ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $view_ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status">
<span<?php echo $view_ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $view_ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $view_ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $view_ivf_treatment_plan->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCnt ?>_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT">
<span<?php echo $view_ivf_treatment_plan->RESULT->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ivf_treatment_plan_list->ListOptions->render("body", "right", $view_ivf_treatment_plan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ivf_treatment_plan->isGridAdd())
		$view_ivf_treatment_plan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ivf_treatment_plan_list->Recordset)
	$view_ivf_treatment_plan_list->Recordset->Close();
?>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ivf_treatment_plan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ivf_treatment_plan_list->Pager)) $view_ivf_treatment_plan_list->Pager = new NumericPager($view_ivf_treatment_plan_list->StartRec, $view_ivf_treatment_plan_list->DisplayRecs, $view_ivf_treatment_plan_list->TotalRecs, $view_ivf_treatment_plan_list->RecRange, $view_ivf_treatment_plan_list->AutoHidePager) ?>
<?php if ($view_ivf_treatment_plan_list->Pager->RecordCount > 0 && $view_ivf_treatment_plan_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ivf_treatment_plan_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ivf_treatment_plan_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ivf_treatment_plan_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $view_ivf_treatment_plan_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ivf_treatment_plan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ivf_treatment_plan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ivf_treatment_plan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->TotalRecs > 0 && (!$view_ivf_treatment_plan_list->AutoHidePageSizeSelector || $view_ivf_treatment_plan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ivf_treatment_plan_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ivf_treatment_plan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_plan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->TotalRecs == 0 && !$view_ivf_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ivf_treatment_plan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ivf_treatment_plan", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ivf_treatment_plan_list->terminate();
?>