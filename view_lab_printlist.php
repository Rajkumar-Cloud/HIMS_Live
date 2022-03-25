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
$view_lab_print_list = new view_lab_print_list();

// Run the page
$view_lab_print_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_print_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_print->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_printlist = currentForm = new ew.Form("fview_lab_printlist", "list");
fview_lab_printlist.formKeyCountName = '<?php echo $view_lab_print_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_lab_printlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_printlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_lab_printlistsrch = currentSearchForm = new ew.Form("fview_lab_printlistsrch");

// Validate function for search
fview_lab_printlistsrch.validate = function(fobj) {
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
fview_lab_printlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_printlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_lab_printlistsrch.filterList = <?php echo $view_lab_print_list->getFilterList() ?>;
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
<?php if (!$view_lab_print->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_print_list->TotalRecs > 0 && $view_lab_print_list->ExportOptions->visible()) { ?>
<?php $view_lab_print_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_print_list->ImportOptions->visible()) { ?>
<?php $view_lab_print_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_print_list->SearchOptions->visible()) { ?>
<?php $view_lab_print_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_print_list->FilterOptions->visible()) { ?>
<?php $view_lab_print_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_print_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_print->isExport() && !$view_lab_print->CurrentAction) { ?>
<form name="fview_lab_printlistsrch" id="fview_lab_printlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_lab_print_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_lab_printlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_print">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_lab_print_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_lab_print->RowType = ROWTYPE_SEARCH;

// Render row
$view_lab_print->resetAttributes();
$view_lab_print_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_lab_print->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_lab_print->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PatientId->EditValue ?>"<?php echo $view_lab_print->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_print->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_lab_print->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PatientName->EditValue ?>"<?php echo $view_lab_print->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_lab_print->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_lab_print->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Mobile->EditValue ?>"<?php echo $view_lab_print->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_print->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_lab_print->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PartnerName->EditValue ?>"<?php echo $view_lab_print->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_lab_print->BillNumber->Visible) { // BillNumber ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $view_lab_print->BillNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->BillNumber->EditValue ?>"<?php echo $view_lab_print->BillNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_print_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_lab_print_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_print_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_print_list->showPageHeader(); ?>
<?php
$view_lab_print_list->showMessage();
?>
<?php if ($view_lab_print_list->TotalRecs > 0 || $view_lab_print->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_print_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_print">
<?php if (!$view_lab_print->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_print->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_print_list->Pager)) $view_lab_print_list->Pager = new NumericPager($view_lab_print_list->StartRec, $view_lab_print_list->DisplayRecs, $view_lab_print_list->TotalRecs, $view_lab_print_list->RecRange, $view_lab_print_list->AutoHidePager) ?>
<?php if ($view_lab_print_list->Pager->RecordCount > 0 && $view_lab_print_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_print_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_print_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_print_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_print_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_print_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_print_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_print_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_print_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_print_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_print_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_print_list->TotalRecs > 0 && (!$view_lab_print_list->AutoHidePageSizeSelector || $view_lab_print_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_print">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_print_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_print_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_print_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_print_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_print_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_print_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_print->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_printlist" id="fview_lab_printlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_print_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_print_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_print">
<div id="gmp_view_lab_print" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_print_list->TotalRecs > 0 || $view_lab_print->isGridEdit()) { ?>
<table id="tbl_view_lab_printlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_print_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_print_list->renderListOptions();

// Render list options (header, left)
$view_lab_print_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_print->id->Visible) { // id ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_print->id->headerCellClass() ?>"><div id="elh_view_lab_print_id" class="view_lab_print_id"><div class="ew-table-header-caption"><?php echo $view_lab_print->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_print->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->id) ?>',1);"><div id="elh_view_lab_print_id" class="view_lab_print_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->SID->Visible) { // SID ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->SID) == "") { ?>
		<th data-name="SID" class="<?php echo $view_lab_print->SID->headerCellClass() ?>"><div id="elh_view_lab_print_SID" class="view_lab_print_SID"><div class="ew-table-header-caption"><?php echo $view_lab_print->SID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SID" class="<?php echo $view_lab_print->SID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->SID) ?>',1);"><div id="elh_view_lab_print_SID" class="view_lab_print_SID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->SID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->SID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->SID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->PatientId->Visible) { // PatientId ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_print->PatientId->headerCellClass() ?>"><div id="elh_view_lab_print_PatientId" class="view_lab_print_PatientId"><div class="ew-table-header-caption"><?php echo $view_lab_print->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_print->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->PatientId) ?>',1);"><div id="elh_view_lab_print_PatientId" class="view_lab_print_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_print->PatientName->headerCellClass() ?>"><div id="elh_view_lab_print_PatientName" class="view_lab_print_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_print->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_print->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->PatientName) ?>',1);"><div id="elh_view_lab_print_PatientName" class="view_lab_print_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_print->Gender->headerCellClass() ?>"><div id="elh_view_lab_print_Gender" class="view_lab_print_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_print->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_print->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->Gender) ?>',1);"><div id="elh_view_lab_print_Gender" class="view_lab_print_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->Mobile->Visible) { // Mobile ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_print->Mobile->headerCellClass() ?>"><div id="elh_view_lab_print_Mobile" class="view_lab_print_Mobile"><div class="ew-table-header-caption"><?php echo $view_lab_print->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_print->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->Mobile) ?>',1);"><div id="elh_view_lab_print_Mobile" class="view_lab_print_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->Doctor->Visible) { // Doctor ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_print->Doctor->headerCellClass() ?>"><div id="elh_view_lab_print_Doctor" class="view_lab_print_Doctor"><div class="ew-table-header-caption"><?php echo $view_lab_print->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_print->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->Doctor) ?>',1);"><div id="elh_view_lab_print_Doctor" class="view_lab_print_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_print->ModeofPayment->headerCellClass() ?>"><div id="elh_view_lab_print_ModeofPayment" class="view_lab_print_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_lab_print->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_print->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->ModeofPayment) ?>',1);"><div id="elh_view_lab_print_ModeofPayment" class="view_lab_print_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->Amount->Visible) { // Amount ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_lab_print->Amount->headerCellClass() ?>"><div id="elh_view_lab_print_Amount" class="view_lab_print_Amount"><div class="ew-table-header-caption"><?php echo $view_lab_print->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_lab_print->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->Amount) ?>',1);"><div id="elh_view_lab_print_Amount" class="view_lab_print_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_print->HospID->headerCellClass() ?>"><div id="elh_view_lab_print_HospID" class="view_lab_print_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_print->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_print->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->HospID) ?>',1);"><div id="elh_view_lab_print_HospID" class="view_lab_print_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_print->RIDNO->headerCellClass() ?>"><div id="elh_view_lab_print_RIDNO" class="view_lab_print_RIDNO"><div class="ew-table-header-caption"><?php echo $view_lab_print->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_print->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->RIDNO) ?>',1);"><div id="elh_view_lab_print_RIDNO" class="view_lab_print_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_print->PartnerName->headerCellClass() ?>"><div id="elh_view_lab_print_PartnerName" class="view_lab_print_PartnerName"><div class="ew-table-header-caption"><?php echo $view_lab_print->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_print->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->PartnerName) ?>',1);"><div id="elh_view_lab_print_PartnerName" class="view_lab_print_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->Remarks->Visible) { // Remarks ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_lab_print->Remarks->headerCellClass() ?>"><div id="elh_view_lab_print_Remarks" class="view_lab_print_Remarks"><div class="ew-table-header-caption"><?php echo $view_lab_print->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_lab_print->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->Remarks) ?>',1);"><div id="elh_view_lab_print_Remarks" class="view_lab_print_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_print->DrDepartment->headerCellClass() ?>"><div id="elh_view_lab_print_DrDepartment" class="view_lab_print_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_lab_print->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_print->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->DrDepartment) ?>',1);"><div id="elh_view_lab_print_DrDepartment" class="view_lab_print_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_print->RefferedBy->headerCellClass() ?>"><div id="elh_view_lab_print_RefferedBy" class="view_lab_print_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_lab_print->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_print->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->RefferedBy) ?>',1);"><div id="elh_view_lab_print_RefferedBy" class="view_lab_print_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_print->BillNumber->headerCellClass() ?>"><div id="elh_view_lab_print_BillNumber" class="view_lab_print_BillNumber"><div class="ew-table-header-caption"><?php echo $view_lab_print->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_print->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->BillNumber) ?>',1);"><div id="elh_view_lab_print_BillNumber" class="view_lab_print_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_lab_print->sortUrl($view_lab_print->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_print->LabTestReleased->headerCellClass() ?>"><div id="elh_view_lab_print_LabTestReleased" class="view_lab_print_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_lab_print->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_print->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_print->SortUrl($view_lab_print->LabTestReleased) ?>',1);"><div id="elh_view_lab_print_LabTestReleased" class="view_lab_print_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print->LabTestReleased->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_print->LabTestReleased->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_print_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_print->ExportAll && $view_lab_print->isExport()) {
	$view_lab_print_list->StopRec = $view_lab_print_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_print_list->TotalRecs > $view_lab_print_list->StartRec + $view_lab_print_list->DisplayRecs - 1)
		$view_lab_print_list->StopRec = $view_lab_print_list->StartRec + $view_lab_print_list->DisplayRecs - 1;
	else
		$view_lab_print_list->StopRec = $view_lab_print_list->TotalRecs;
}
$view_lab_print_list->RecCnt = $view_lab_print_list->StartRec - 1;
if ($view_lab_print_list->Recordset && !$view_lab_print_list->Recordset->EOF) {
	$view_lab_print_list->Recordset->moveFirst();
	$selectLimit = $view_lab_print_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_print_list->StartRec > 1)
		$view_lab_print_list->Recordset->move($view_lab_print_list->StartRec - 1);
} elseif (!$view_lab_print->AllowAddDeleteRow && $view_lab_print_list->StopRec == 0) {
	$view_lab_print_list->StopRec = $view_lab_print->GridAddRowCount;
}

// Initialize aggregate
$view_lab_print->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_print->resetAttributes();
$view_lab_print_list->renderRow();
while ($view_lab_print_list->RecCnt < $view_lab_print_list->StopRec) {
	$view_lab_print_list->RecCnt++;
	if ($view_lab_print_list->RecCnt >= $view_lab_print_list->StartRec) {
		$view_lab_print_list->RowCnt++;

		// Set up key count
		$view_lab_print_list->KeyCount = $view_lab_print_list->RowIndex;

		// Init row class and style
		$view_lab_print->resetAttributes();
		$view_lab_print->CssClass = "";
		if ($view_lab_print->isGridAdd()) {
		} else {
			$view_lab_print_list->loadRowValues($view_lab_print_list->Recordset); // Load row values
		}
		$view_lab_print->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_print->RowAttrs = array_merge($view_lab_print->RowAttrs, array('data-rowindex'=>$view_lab_print_list->RowCnt, 'id'=>'r' . $view_lab_print_list->RowCnt . '_view_lab_print', 'data-rowtype'=>$view_lab_print->RowType));

		// Render row
		$view_lab_print_list->renderRow();

		// Render list options
		$view_lab_print_list->renderListOptions();
?>
	<tr<?php echo $view_lab_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_print_list->ListOptions->render("body", "left", $view_lab_print_list->RowCnt);
?>
	<?php if ($view_lab_print->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_lab_print->id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_id" class="view_lab_print_id">
<span<?php echo $view_lab_print->id->viewAttributes() ?>>
<?php echo $view_lab_print->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->SID->Visible) { // SID ?>
		<td data-name="SID"<?php echo $view_lab_print->SID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_SID" class="view_lab_print_SID">
<span<?php echo $view_lab_print->SID->viewAttributes() ?>>
<?php echo $view_lab_print->SID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_lab_print->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_PatientId" class="view_lab_print_PatientId">
<span<?php echo $view_lab_print->PatientId->viewAttributes() ?>>
<?php echo $view_lab_print->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_lab_print->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_PatientName" class="view_lab_print_PatientName">
<span<?php echo $view_lab_print->PatientName->viewAttributes() ?>>
<?php echo $view_lab_print->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_lab_print->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_Gender" class="view_lab_print_Gender">
<span<?php echo $view_lab_print->Gender->viewAttributes() ?>>
<?php echo $view_lab_print->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_lab_print->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_Mobile" class="view_lab_print_Mobile">
<span<?php echo $view_lab_print->Mobile->viewAttributes() ?>>
<?php echo $view_lab_print->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_lab_print->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_Doctor" class="view_lab_print_Doctor">
<span<?php echo $view_lab_print->Doctor->viewAttributes() ?>>
<?php echo $view_lab_print->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_lab_print->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_ModeofPayment" class="view_lab_print_ModeofPayment">
<span<?php echo $view_lab_print->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_print->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_lab_print->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_Amount" class="view_lab_print_Amount">
<span<?php echo $view_lab_print->Amount->viewAttributes() ?>>
<?php echo $view_lab_print->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_print->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_HospID" class="view_lab_print_HospID">
<span<?php echo $view_lab_print->HospID->viewAttributes() ?>>
<?php echo $view_lab_print->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_lab_print->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_RIDNO" class="view_lab_print_RIDNO">
<span<?php echo $view_lab_print->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_print->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_lab_print->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_PartnerName" class="view_lab_print_PartnerName">
<span<?php echo $view_lab_print->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_print->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_lab_print->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_Remarks" class="view_lab_print_Remarks">
<span<?php echo $view_lab_print->Remarks->viewAttributes() ?>>
<?php echo $view_lab_print->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_lab_print->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_DrDepartment" class="view_lab_print_DrDepartment">
<span<?php echo $view_lab_print->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_print->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $view_lab_print->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_RefferedBy" class="view_lab_print_RefferedBy">
<span<?php echo $view_lab_print->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_print->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_lab_print->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_BillNumber" class="view_lab_print_BillNumber">
<span<?php echo $view_lab_print->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_print->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased"<?php echo $view_lab_print->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCnt ?>_view_lab_print_LabTestReleased" class="view_lab_print_LabTestReleased">
<span<?php echo $view_lab_print->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_print->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_print_list->ListOptions->render("body", "right", $view_lab_print_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_lab_print->isGridAdd())
		$view_lab_print_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_lab_print->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_print_list->Recordset)
	$view_lab_print_list->Recordset->Close();
?>
<?php if (!$view_lab_print->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_print->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_print_list->Pager)) $view_lab_print_list->Pager = new NumericPager($view_lab_print_list->StartRec, $view_lab_print_list->DisplayRecs, $view_lab_print_list->TotalRecs, $view_lab_print_list->RecRange, $view_lab_print_list->AutoHidePager) ?>
<?php if ($view_lab_print_list->Pager->RecordCount > 0 && $view_lab_print_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_print_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_print_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_print_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_print_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_print_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_print_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_print_list->pageUrl() ?>start=<?php echo $view_lab_print_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_print_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_print_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_print_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_print_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_print_list->TotalRecs > 0 && (!$view_lab_print_list->AutoHidePageSizeSelector || $view_lab_print_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_print">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_print_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_print_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_print_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_print_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_print_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_print_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_print->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_print_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_print_list->TotalRecs == 0 && !$view_lab_print->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_print_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_print->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_lab_print->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_print", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_print_list->terminate();
?>