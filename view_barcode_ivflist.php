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
$view_barcode_ivf_list = new view_barcode_ivf_list();

// Run the page
$view_barcode_ivf_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_barcode_ivf_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_barcode_ivflist = currentForm = new ew.Form("fview_barcode_ivflist", "list");
fview_barcode_ivflist.formKeyCountName = '<?php echo $view_barcode_ivf_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_barcode_ivflist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_barcode_ivflist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_barcode_ivflistsrch = currentSearchForm = new ew.Form("fview_barcode_ivflistsrch");

// Validate function for search
fview_barcode_ivflistsrch.validate = function(fobj) {
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
fview_barcode_ivflistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_barcode_ivflistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_barcode_ivflistsrch.filterList = <?php echo $view_barcode_ivf_list->getFilterList() ?>;
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
<?php if (!$view_barcode_ivf->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_barcode_ivf_list->TotalRecs > 0 && $view_barcode_ivf_list->ExportOptions->visible()) { ?>
<?php $view_barcode_ivf_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->ImportOptions->visible()) { ?>
<?php $view_barcode_ivf_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->SearchOptions->visible()) { ?>
<?php $view_barcode_ivf_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->FilterOptions->visible()) { ?>
<?php $view_barcode_ivf_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_barcode_ivf_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_barcode_ivf->isExport() && !$view_barcode_ivf->CurrentAction) { ?>
<form name="fview_barcode_ivflistsrch" id="fview_barcode_ivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_barcode_ivf_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_barcode_ivflistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_barcode_ivf">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_barcode_ivf_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_barcode_ivf->RowType = ROWTYPE_SEARCH;

// Render row
$view_barcode_ivf->resetAttributes();
$view_barcode_ivf_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_barcode_ivf->CoupleID->Visible) { // CoupleID ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->CoupleID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->CoupleID->EditValue ?>"<?php echo $view_barcode_ivf->CoupleID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_barcode_ivf->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->PatientName->EditValue ?>"<?php echo $view_barcode_ivf->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_barcode_ivf->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->PatientID->EditValue ?>"<?php echo $view_barcode_ivf->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_barcode_ivf->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->PartnerName->EditValue ?>"<?php echo $view_barcode_ivf->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_barcode_ivf->PartnerID->Visible) { // PartnerID ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->PartnerID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->PartnerID->EditValue ?>"<?php echo $view_barcode_ivf->PartnerID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_barcode_ivf->WifeCell->Visible) { // WifeCell ?>
	<div id="xsc_WifeCell" class="ew-cell form-group">
		<label for="x_WifeCell" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->WifeCell->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->WifeCell->EditValue ?>"<?php echo $view_barcode_ivf->WifeCell->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_barcode_ivf->HusbandCell->Visible) { // HusbandCell ?>
	<div id="xsc_HusbandCell" class="ew-cell form-group">
		<label for="x_HusbandCell" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf->HusbandCell->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf->HusbandCell->EditValue ?>"<?php echo $view_barcode_ivf->HusbandCell->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_barcode_ivf_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_barcode_ivf_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_barcode_ivf_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_barcode_ivf_list->showPageHeader(); ?>
<?php
$view_barcode_ivf_list->showMessage();
?>
<?php if ($view_barcode_ivf_list->TotalRecs > 0 || $view_barcode_ivf->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_barcode_ivf_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_barcode_ivf">
<?php if (!$view_barcode_ivf->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_barcode_ivf->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_barcode_ivf_list->Pager)) $view_barcode_ivf_list->Pager = new NumericPager($view_barcode_ivf_list->StartRec, $view_barcode_ivf_list->DisplayRecs, $view_barcode_ivf_list->TotalRecs, $view_barcode_ivf_list->RecRange, $view_barcode_ivf_list->AutoHidePager) ?>
<?php if ($view_barcode_ivf_list->Pager->RecordCount > 0 && $view_barcode_ivf_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_barcode_ivf_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_barcode_ivf_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_barcode_ivf_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_barcode_ivf_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_barcode_ivf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_barcode_ivf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_barcode_ivf_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_barcode_ivf_list->TotalRecs > 0 && (!$view_barcode_ivf_list->AutoHidePageSizeSelector || $view_barcode_ivf_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_barcode_ivf">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_barcode_ivf_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_barcode_ivf_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_barcode_ivf_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_barcode_ivf_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_barcode_ivf_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_barcode_ivf_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_barcode_ivf->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_barcode_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_barcode_ivflist" id="fview_barcode_ivflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_barcode_ivf_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_barcode_ivf_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_barcode_ivf">
<div id="gmp_view_barcode_ivf" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_barcode_ivf_list->TotalRecs > 0 || $view_barcode_ivf->isGridEdit()) { ?>
<table id="tbl_view_barcode_ivflist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_barcode_ivf_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_barcode_ivf_list->renderListOptions();

// Render list options (header, left)
$view_barcode_ivf_list->ListOptions->render("header", "left");
?>
<?php if ($view_barcode_ivf->id->Visible) { // id ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_barcode_ivf->id->headerCellClass() ?>"><div id="elh_view_barcode_ivf_id" class="view_barcode_ivf_id"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_barcode_ivf->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->id) ?>',1);"><div id="elh_view_barcode_ivf_id" class="view_barcode_ivf_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->_Barcode->Visible) { // Barcode ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->_Barcode) == "") { ?>
		<th data-name="_Barcode" class="<?php echo $view_barcode_ivf->_Barcode->headerCellClass() ?>"><div id="elh_view_barcode_ivf__Barcode" class="view_barcode_ivf__Barcode"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->_Barcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Barcode" class="<?php echo $view_barcode_ivf->_Barcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->_Barcode) ?>',1);"><div id="elh_view_barcode_ivf__Barcode" class="view_barcode_ivf__Barcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->_Barcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->_Barcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->_Barcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_barcode_ivf->CoupleID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_CoupleID" class="view_barcode_ivf_CoupleID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_barcode_ivf->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->CoupleID) ?>',1);"><div id="elh_view_barcode_ivf_CoupleID" class="view_barcode_ivf_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->PatientName->Visible) { // PatientName ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_barcode_ivf->PatientName->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PatientName" class="view_barcode_ivf_PatientName"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_barcode_ivf->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->PatientName) ?>',1);"><div id="elh_view_barcode_ivf_PatientName" class="view_barcode_ivf_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->PatientID->Visible) { // PatientID ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_barcode_ivf->PatientID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PatientID" class="view_barcode_ivf_PatientID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_barcode_ivf->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->PatientID) ?>',1);"><div id="elh_view_barcode_ivf_PatientID" class="view_barcode_ivf_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_barcode_ivf->PartnerName->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PartnerName" class="view_barcode_ivf_PartnerName"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_barcode_ivf->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->PartnerName) ?>',1);"><div id="elh_view_barcode_ivf_PartnerName" class="view_barcode_ivf_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_barcode_ivf->PartnerID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PartnerID" class="view_barcode_ivf_PartnerID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_barcode_ivf->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->PartnerID) ?>',1);"><div id="elh_view_barcode_ivf_PartnerID" class="view_barcode_ivf_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_barcode_ivf->WifeCell->headerCellClass() ?>"><div id="elh_view_barcode_ivf_WifeCell" class="view_barcode_ivf_WifeCell"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_barcode_ivf->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->WifeCell) ?>',1);"><div id="elh_view_barcode_ivf_WifeCell" class="view_barcode_ivf_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->WifeCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->WifeCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_barcode_ivf->HusbandCell->headerCellClass() ?>"><div id="elh_view_barcode_ivf_HusbandCell" class="view_barcode_ivf_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_barcode_ivf->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->HusbandCell) ?>',1);"><div id="elh_view_barcode_ivf_HusbandCell" class="view_barcode_ivf_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->HusbandCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->HusbandCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $view_barcode_ivf->WifeEmail->headerCellClass() ?>"><div id="elh_view_barcode_ivf_WifeEmail" class="view_barcode_ivf_WifeEmail"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->WifeEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $view_barcode_ivf->WifeEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->WifeEmail) ?>',1);"><div id="elh_view_barcode_ivf_WifeEmail" class="view_barcode_ivf_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->WifeEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->WifeEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_barcode_ivf->HusbandEmail->headerCellClass() ?>"><div id="elh_view_barcode_ivf_HusbandEmail" class="view_barcode_ivf_HusbandEmail"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->HusbandEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_barcode_ivf->HusbandEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->HusbandEmail) ?>',1);"><div id="elh_view_barcode_ivf_HusbandEmail" class="view_barcode_ivf_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->HusbandEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->HusbandEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_barcode_ivf->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivf_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_barcode_ivf->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->ARTCYCLE) ?>',1);"><div id="elh_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivf_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->RESULT->Visible) { // RESULT ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_barcode_ivf->RESULT->headerCellClass() ?>"><div id="elh_view_barcode_ivf_RESULT" class="view_barcode_ivf_RESULT"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_barcode_ivf->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->RESULT) ?>',1);"><div id="elh_view_barcode_ivf_RESULT" class="view_barcode_ivf_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf->HospID->Visible) { // HospID ?>
	<?php if ($view_barcode_ivf->sortUrl($view_barcode_ivf->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_barcode_ivf->HospID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_HospID" class="view_barcode_ivf_HospID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_barcode_ivf->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_barcode_ivf->SortUrl($view_barcode_ivf->HospID) ?>',1);"><div id="elh_view_barcode_ivf_HospID" class="view_barcode_ivf_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_barcode_ivf->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_barcode_ivf_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_barcode_ivf->ExportAll && $view_barcode_ivf->isExport()) {
	$view_barcode_ivf_list->StopRec = $view_barcode_ivf_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_barcode_ivf_list->TotalRecs > $view_barcode_ivf_list->StartRec + $view_barcode_ivf_list->DisplayRecs - 1)
		$view_barcode_ivf_list->StopRec = $view_barcode_ivf_list->StartRec + $view_barcode_ivf_list->DisplayRecs - 1;
	else
		$view_barcode_ivf_list->StopRec = $view_barcode_ivf_list->TotalRecs;
}
$view_barcode_ivf_list->RecCnt = $view_barcode_ivf_list->StartRec - 1;
if ($view_barcode_ivf_list->Recordset && !$view_barcode_ivf_list->Recordset->EOF) {
	$view_barcode_ivf_list->Recordset->moveFirst();
	$selectLimit = $view_barcode_ivf_list->UseSelectLimit;
	if (!$selectLimit && $view_barcode_ivf_list->StartRec > 1)
		$view_barcode_ivf_list->Recordset->move($view_barcode_ivf_list->StartRec - 1);
} elseif (!$view_barcode_ivf->AllowAddDeleteRow && $view_barcode_ivf_list->StopRec == 0) {
	$view_barcode_ivf_list->StopRec = $view_barcode_ivf->GridAddRowCount;
}

// Initialize aggregate
$view_barcode_ivf->RowType = ROWTYPE_AGGREGATEINIT;
$view_barcode_ivf->resetAttributes();
$view_barcode_ivf_list->renderRow();
while ($view_barcode_ivf_list->RecCnt < $view_barcode_ivf_list->StopRec) {
	$view_barcode_ivf_list->RecCnt++;
	if ($view_barcode_ivf_list->RecCnt >= $view_barcode_ivf_list->StartRec) {
		$view_barcode_ivf_list->RowCnt++;

		// Set up key count
		$view_barcode_ivf_list->KeyCount = $view_barcode_ivf_list->RowIndex;

		// Init row class and style
		$view_barcode_ivf->resetAttributes();
		$view_barcode_ivf->CssClass = "";
		if ($view_barcode_ivf->isGridAdd()) {
		} else {
			$view_barcode_ivf_list->loadRowValues($view_barcode_ivf_list->Recordset); // Load row values
		}
		$view_barcode_ivf->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_barcode_ivf->RowAttrs = array_merge($view_barcode_ivf->RowAttrs, array('data-rowindex'=>$view_barcode_ivf_list->RowCnt, 'id'=>'r' . $view_barcode_ivf_list->RowCnt . '_view_barcode_ivf', 'data-rowtype'=>$view_barcode_ivf->RowType));

		// Render row
		$view_barcode_ivf_list->renderRow();

		// Render list options
		$view_barcode_ivf_list->renderListOptions();
?>
	<tr<?php echo $view_barcode_ivf->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_barcode_ivf_list->ListOptions->render("body", "left", $view_barcode_ivf_list->RowCnt);
?>
	<?php if ($view_barcode_ivf->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_barcode_ivf->id->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_id" class="view_barcode_ivf_id">
<span<?php echo $view_barcode_ivf->id->viewAttributes() ?>>
<?php echo $view_barcode_ivf->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->_Barcode->Visible) { // Barcode ?>
		<td data-name="_Barcode"<?php echo $view_barcode_ivf->_Barcode->cellAttributes() ?>>
<script id="orig<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf__Barcode" class="view_ivf_treatment_planedit" type="text/html">
<?php echo $view_barcode_ivf->_Barcode->getViewValue() ?>
</script>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf__Barcode" class="view_barcode_ivf__Barcode">
<span<?php echo $view_barcode_ivf->_Barcode->viewAttributes() ?>><?php echo Barcode()->show($view_barcode_ivf->_Barcode->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_barcode_ivf->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_CoupleID" class="view_barcode_ivf_CoupleID">
<span<?php echo $view_barcode_ivf->CoupleID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_barcode_ivf->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_PatientName" class="view_barcode_ivf_PatientName">
<span<?php echo $view_barcode_ivf->PatientName->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_barcode_ivf->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_PatientID" class="view_barcode_ivf_PatientID">
<span<?php echo $view_barcode_ivf->PatientID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_barcode_ivf->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_PartnerName" class="view_barcode_ivf_PartnerName">
<span<?php echo $view_barcode_ivf->PartnerName->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_barcode_ivf->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_PartnerID" class="view_barcode_ivf_PartnerID">
<span<?php echo $view_barcode_ivf->PartnerID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell"<?php echo $view_barcode_ivf->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_WifeCell" class="view_barcode_ivf_WifeCell">
<span<?php echo $view_barcode_ivf->WifeCell->viewAttributes() ?>>
<?php echo $view_barcode_ivf->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell"<?php echo $view_barcode_ivf->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_HusbandCell" class="view_barcode_ivf_HusbandCell">
<span<?php echo $view_barcode_ivf->HusbandCell->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail"<?php echo $view_barcode_ivf->WifeEmail->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_WifeEmail" class="view_barcode_ivf_WifeEmail">
<span<?php echo $view_barcode_ivf->WifeEmail->viewAttributes() ?>>
<?php echo $view_barcode_ivf->WifeEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail"<?php echo $view_barcode_ivf->HusbandEmail->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_HusbandEmail" class="view_barcode_ivf_HusbandEmail">
<span<?php echo $view_barcode_ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HusbandEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $view_barcode_ivf->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivf_ARTCYCLE">
<span<?php echo $view_barcode_ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_barcode_ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $view_barcode_ivf->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_RESULT" class="view_barcode_ivf_RESULT">
<span<?php echo $view_barcode_ivf->RESULT->viewAttributes() ?>>
<?php echo $view_barcode_ivf->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_barcode_ivf->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCnt ?>_view_barcode_ivf_HospID" class="view_barcode_ivf_HospID">
<span<?php echo $view_barcode_ivf->HospID->viewAttributes() ?>>
<?php echo $view_barcode_ivf->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_barcode_ivf_list->ListOptions->render("body", "right", $view_barcode_ivf_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_barcode_ivf->isGridAdd())
		$view_barcode_ivf_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_barcode_ivf->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_barcode_ivf_list->Recordset)
	$view_barcode_ivf_list->Recordset->Close();
?>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_barcode_ivf->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_barcode_ivf_list->Pager)) $view_barcode_ivf_list->Pager = new NumericPager($view_barcode_ivf_list->StartRec, $view_barcode_ivf_list->DisplayRecs, $view_barcode_ivf_list->TotalRecs, $view_barcode_ivf_list->RecRange, $view_barcode_ivf_list->AutoHidePager) ?>
<?php if ($view_barcode_ivf_list->Pager->RecordCount > 0 && $view_barcode_ivf_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_barcode_ivf_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_barcode_ivf_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_barcode_ivf_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_barcode_ivf_list->pageUrl() ?>start=<?php echo $view_barcode_ivf_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_barcode_ivf_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_barcode_ivf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_barcode_ivf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_barcode_ivf_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_barcode_ivf_list->TotalRecs > 0 && (!$view_barcode_ivf_list->AutoHidePageSizeSelector || $view_barcode_ivf_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_barcode_ivf">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_barcode_ivf_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_barcode_ivf_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_barcode_ivf_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_barcode_ivf_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_barcode_ivf_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_barcode_ivf_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_barcode_ivf->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_barcode_ivf_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_barcode_ivf_list->TotalRecs == 0 && !$view_barcode_ivf->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_barcode_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_barcode_ivf_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_barcode_ivf", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_barcode_ivf_list->terminate();
?>