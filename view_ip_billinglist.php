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
$view_ip_billing_list = new view_ip_billing_list();

// Run the page
$view_ip_billing_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_billing_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_billinglist = currentForm = new ew.Form("fview_ip_billinglist", "list");
fview_ip_billinglist.formKeyCountName = '<?php echo $view_ip_billing_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_billinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_billinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_billinglist.lists["x_BillClosing"] = <?php echo $view_ip_billing_list->BillClosing->Lookup->toClientList() ?>;
fview_ip_billinglist.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_billing_list->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_billinglist.lists["x_ReportHeader[]"] = <?php echo $view_ip_billing_list->ReportHeader->Lookup->toClientList() ?>;
fview_ip_billinglist.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_billing_list->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_ip_billinglistsrch = currentSearchForm = new ew.Form("fview_ip_billinglistsrch");

// Validate function for search
fview_ip_billinglistsrch.validate = function(fobj) {
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
fview_ip_billinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_billinglistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_ip_billinglistsrch.filterList = <?php echo $view_ip_billing_list->getFilterList() ?>;
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
<?php if (!$view_ip_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_billing_list->TotalRecs > 0 && $view_ip_billing_list->ExportOptions->visible()) { ?>
<?php $view_ip_billing_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_billing_list->ImportOptions->visible()) { ?>
<?php $view_ip_billing_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_billing_list->SearchOptions->visible()) { ?>
<?php $view_ip_billing_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_billing_list->FilterOptions->visible()) { ?>
<?php $view_ip_billing_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_billing_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_billing->isExport() && !$view_ip_billing->CurrentAction) { ?>
<form name="fview_ip_billinglistsrch" id="fview_ip_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_billing_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_billinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_billing">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_ip_billing_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_ip_billing->RowType = ROWTYPE_SEARCH;

// Render row
$view_ip_billing->resetAttributes();
$view_ip_billing_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_ip_billing->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ip_billing->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->PatientID->EditValue ?>"<?php echo $view_ip_billing->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ip_billing->patient_name->Visible) { // patient_name ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_ip_billing->patient_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->patient_name->EditValue ?>"<?php echo $view_ip_billing->patient_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_ip_billing->mrnNo->Visible) { // mrnNo ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $view_ip_billing->mrnNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->mrnNo->EditValue ?>"<?php echo $view_ip_billing->mrnNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ip_billing->mobileno->Visible) { // mobileno ?>
	<div id="xsc_mobileno" class="ew-cell form-group">
		<label for="x_mobileno" class="ew-search-caption ew-label"><?php echo $view_ip_billing->mobileno->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->mobileno->EditValue ?>"<?php echo $view_ip_billing->mobileno->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_billing_list->showPageHeader(); ?>
<?php
$view_ip_billing_list->showMessage();
?>
<?php if ($view_ip_billing_list->TotalRecs > 0 || $view_ip_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_billing">
<?php if (!$view_ip_billing->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_billing_list->Pager)) $view_ip_billing_list->Pager = new NumericPager($view_ip_billing_list->StartRec, $view_ip_billing_list->DisplayRecs, $view_ip_billing_list->TotalRecs, $view_ip_billing_list->RecRange, $view_ip_billing_list->AutoHidePager) ?>
<?php if ($view_ip_billing_list->Pager->RecordCount > 0 && $view_ip_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_billing_list->TotalRecs > 0 && (!$view_ip_billing_list->AutoHidePageSizeSelector || $view_ip_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_billinglist" id="fview_ip_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_billing_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_billing_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<div id="gmp_view_ip_billing" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_billing_list->TotalRecs > 0 || $view_ip_billing->isGridEdit()) { ?>
<table id="tbl_view_ip_billinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_billing_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_billing_list->renderListOptions();

// Render list options (header, left)
$view_ip_billing_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_billing->id->Visible) { // id ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_billing->id->headerCellClass() ?>"><div id="elh_view_ip_billing_id" class="view_ip_billing_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_billing->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->id) ?>',1);"><div id="elh_view_ip_billing_id" class="view_ip_billing_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_billing->PatientID->headerCellClass() ?>"><div id="elh_view_ip_billing_PatientID" class="view_ip_billing_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_billing->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_billing->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->PatientID) ?>',1);"><div id="elh_view_ip_billing_PatientID" class="view_ip_billing_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_billing->patient_name->headerCellClass() ?>"><div id="elh_view_ip_billing_patient_name" class="view_ip_billing_patient_name"><div class="ew-table-header-caption"><?php echo $view_ip_billing->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_billing->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->patient_name) ?>',1);"><div id="elh_view_ip_billing_patient_name" class="view_ip_billing_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_billing->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_billing_mrnNo" class="view_ip_billing_mrnNo"><div class="ew-table-header-caption"><?php echo $view_ip_billing->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_billing->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->mrnNo) ?>',1);"><div id="elh_view_ip_billing_mrnNo" class="view_ip_billing_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_billing->mobileno->headerCellClass() ?>"><div id="elh_view_ip_billing_mobileno" class="view_ip_billing_mobileno"><div class="ew-table-header-caption"><?php echo $view_ip_billing->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_billing->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->mobileno) ?>',1);"><div id="elh_view_ip_billing_mobileno" class="view_ip_billing_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->gender->Visible) { // gender ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_billing->gender->headerCellClass() ?>"><div id="elh_view_ip_billing_gender" class="view_ip_billing_gender"><div class="ew-table-header-caption"><?php echo $view_ip_billing->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_billing->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->gender) ?>',1);"><div id="elh_view_ip_billing_gender" class="view_ip_billing_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_billing->physician_id->headerCellClass() ?>"><div id="elh_view_ip_billing_physician_id" class="view_ip_billing_physician_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_billing->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->physician_id) ?>',1);"><div id="elh_view_ip_billing_physician_id" class="view_ip_billing_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_billing->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_billing_typeRegsisteration" class="view_ip_billing_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $view_ip_billing->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_billing->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->typeRegsisteration) ?>',1);"><div id="elh_view_ip_billing_typeRegsisteration" class="view_ip_billing_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_billing->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_billing_PaymentCategory" class="view_ip_billing_PaymentCategory"><div class="ew-table-header-caption"><?php echo $view_ip_billing->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_billing->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->PaymentCategory) ?>',1);"><div id="elh_view_ip_billing_PaymentCategory" class="view_ip_billing_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_billing->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_billing_admission_consultant_id" class="view_ip_billing_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_billing->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->admission_consultant_id) ?>',1);"><div id="elh_view_ip_billing_admission_consultant_id" class="view_ip_billing_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_billing->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_billing_leading_consultant_id" class="view_ip_billing_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_billing->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->leading_consultant_id) ?>',1);"><div id="elh_view_ip_billing_leading_consultant_id" class="view_ip_billing_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_billing->admission_date->headerCellClass() ?>"><div id="elh_view_ip_billing_admission_date" class="view_ip_billing_admission_date"><div class="ew-table-header-caption"><?php echo $view_ip_billing->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_billing->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->admission_date) ?>',1);"><div id="elh_view_ip_billing_admission_date" class="view_ip_billing_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_billing->release_date->headerCellClass() ?>"><div id="elh_view_ip_billing_release_date" class="view_ip_billing_release_date"><div class="ew-table-header-caption"><?php echo $view_ip_billing->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_billing->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->release_date) ?>',1);"><div id="elh_view_ip_billing_release_date" class="view_ip_billing_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_billing->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_billing_PaymentStatus" class="view_ip_billing_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_ip_billing->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_billing->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->PaymentStatus) ?>',1);"><div id="elh_view_ip_billing_PaymentStatus" class="view_ip_billing_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->status->Visible) { // status ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_billing->status->headerCellClass() ?>"><div id="elh_view_ip_billing_status" class="view_ip_billing_status"><div class="ew-table-header-caption"><?php echo $view_ip_billing->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_billing->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->status) ?>',1);"><div id="elh_view_ip_billing_status" class="view_ip_billing_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_billing->createdby->headerCellClass() ?>"><div id="elh_view_ip_billing_createdby" class="view_ip_billing_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_billing->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_billing->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->createdby) ?>',1);"><div id="elh_view_ip_billing_createdby" class="view_ip_billing_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_billing->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_billing_createddatetime" class="view_ip_billing_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_billing->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_billing->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->createddatetime) ?>',1);"><div id="elh_view_ip_billing_createddatetime" class="view_ip_billing_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_billing->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_billing_modifiedby" class="view_ip_billing_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_billing->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_billing->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->modifiedby) ?>',1);"><div id="elh_view_ip_billing_modifiedby" class="view_ip_billing_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_billing->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_billing_modifieddatetime" class="view_ip_billing_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_billing->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_billing->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->modifieddatetime) ?>',1);"><div id="elh_view_ip_billing_modifieddatetime" class="view_ip_billing_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_billing->HospID->headerCellClass() ?>"><div id="elh_view_ip_billing_HospID" class="view_ip_billing_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_billing->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_billing->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->HospID) ?>',1);"><div id="elh_view_ip_billing_HospID" class="view_ip_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_billing->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferedByDr" class="view_ip_billing_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_billing->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ReferedByDr) ?>',1);"><div id="elh_view_ip_billing_ReferedByDr" class="view_ip_billing_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_billing->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferClinicname" class="view_ip_billing_ReferClinicname"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_billing->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ReferClinicname) ?>',1);"><div id="elh_view_ip_billing_ReferClinicname" class="view_ip_billing_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_billing->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferCity" class="view_ip_billing_ReferCity"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_billing->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ReferCity) ?>',1);"><div id="elh_view_ip_billing_ReferCity" class="view_ip_billing_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_billing->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferMobileNo" class="view_ip_billing_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_billing->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ReferMobileNo) ?>',1);"><div id="elh_view_ip_billing_ReferMobileNo" class="view_ip_billing_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_billing->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billing_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_billing->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billing_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_billing->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_billing_PurposreReferredfor" class="view_ip_billing_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $view_ip_billing->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_billing->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->PurposreReferredfor) ?>',1);"><div id="elh_view_ip_billing_PurposreReferredfor" class="view_ip_billing_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_billing->patient_id->headerCellClass() ?>"><div id="elh_view_ip_billing_patient_id" class="view_ip_billing_patient_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_billing->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->patient_id) ?>',1);"><div id="elh_view_ip_billing_patient_id" class="view_ip_billing_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_billing->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_billing_BillClosing" class="view_ip_billing_BillClosing"><div class="ew-table-header-caption"><?php echo $view_ip_billing->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_billing->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->BillClosing) ?>',1);"><div id="elh_view_ip_billing_BillClosing" class="view_ip_billing_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->BillClosing->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_billing->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_billing_BillClosingDate" class="view_ip_billing_BillClosingDate"><div class="ew-table-header-caption"><?php echo $view_ip_billing->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_billing->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->BillClosingDate) ?>',1);"><div id="elh_view_ip_billing_BillClosingDate" class="view_ip_billing_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_billing->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_billing_BillNumber" class="view_ip_billing_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_billing->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_billing->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->BillNumber) ?>',1);"><div id="elh_view_ip_billing_BillNumber" class="view_ip_billing_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_billing->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_billing_ClosingAmount" class="view_ip_billing_ClosingAmount"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ClosingAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_billing->ClosingAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ClosingAmount) ?>',1);"><div id="elh_view_ip_billing_ClosingAmount" class="view_ip_billing_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_billing->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_billing_ClosingType" class="view_ip_billing_ClosingType"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ClosingType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_billing->ClosingType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ClosingType) ?>',1);"><div id="elh_view_ip_billing_ClosingType" class="view_ip_billing_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_billing->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_billing_BillAmount" class="view_ip_billing_BillAmount"><div class="ew-table-header-caption"><?php echo $view_ip_billing->BillAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_billing->BillAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->BillAmount) ?>',1);"><div id="elh_view_ip_billing_BillAmount" class="view_ip_billing_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_billing->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_billing_billclosedBy" class="view_ip_billing_billclosedBy"><div class="ew-table-header-caption"><?php echo $view_ip_billing->billclosedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_billing->billclosedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->billclosedBy) ?>',1);"><div id="elh_view_ip_billing_billclosedBy" class="view_ip_billing_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_billing->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_billing_bllcloseByDate" class="view_ip_billing_bllcloseByDate"><div class="ew-table-header-caption"><?php echo $view_ip_billing->bllcloseByDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_billing->bllcloseByDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->bllcloseByDate) ?>',1);"><div id="elh_view_ip_billing_bllcloseByDate" class="view_ip_billing_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_billing->sortUrl($view_ip_billing->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_billing->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_billing_ReportHeader" class="view_ip_billing_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_ip_billing->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_billing->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_billing->SortUrl($view_ip_billing->ReportHeader) ?>',1);"><div id="elh_view_ip_billing_ReportHeader" class="view_ip_billing_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_billing->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_billing_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_billing->ExportAll && $view_ip_billing->isExport()) {
	$view_ip_billing_list->StopRec = $view_ip_billing_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_billing_list->TotalRecs > $view_ip_billing_list->StartRec + $view_ip_billing_list->DisplayRecs - 1)
		$view_ip_billing_list->StopRec = $view_ip_billing_list->StartRec + $view_ip_billing_list->DisplayRecs - 1;
	else
		$view_ip_billing_list->StopRec = $view_ip_billing_list->TotalRecs;
}
$view_ip_billing_list->RecCnt = $view_ip_billing_list->StartRec - 1;
if ($view_ip_billing_list->Recordset && !$view_ip_billing_list->Recordset->EOF) {
	$view_ip_billing_list->Recordset->moveFirst();
	$selectLimit = $view_ip_billing_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_billing_list->StartRec > 1)
		$view_ip_billing_list->Recordset->move($view_ip_billing_list->StartRec - 1);
} elseif (!$view_ip_billing->AllowAddDeleteRow && $view_ip_billing_list->StopRec == 0) {
	$view_ip_billing_list->StopRec = $view_ip_billing->GridAddRowCount;
}

// Initialize aggregate
$view_ip_billing->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_billing->resetAttributes();
$view_ip_billing_list->renderRow();
while ($view_ip_billing_list->RecCnt < $view_ip_billing_list->StopRec) {
	$view_ip_billing_list->RecCnt++;
	if ($view_ip_billing_list->RecCnt >= $view_ip_billing_list->StartRec) {
		$view_ip_billing_list->RowCnt++;

		// Set up key count
		$view_ip_billing_list->KeyCount = $view_ip_billing_list->RowIndex;

		// Init row class and style
		$view_ip_billing->resetAttributes();
		$view_ip_billing->CssClass = "";
		if ($view_ip_billing->isGridAdd()) {
		} else {
			$view_ip_billing_list->loadRowValues($view_ip_billing_list->Recordset); // Load row values
		}
		$view_ip_billing->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_billing->RowAttrs = array_merge($view_ip_billing->RowAttrs, array('data-rowindex'=>$view_ip_billing_list->RowCnt, 'id'=>'r' . $view_ip_billing_list->RowCnt . '_view_ip_billing', 'data-rowtype'=>$view_ip_billing->RowType));

		// Render row
		$view_ip_billing_list->renderRow();

		// Render list options
		$view_ip_billing_list->renderListOptions();
?>
	<tr<?php echo $view_ip_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_billing_list->ListOptions->render("body", "left", $view_ip_billing_list->RowCnt);
?>
	<?php if ($view_ip_billing->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_billing->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_id" class="view_ip_billing_id">
<span<?php echo $view_ip_billing->id->viewAttributes() ?>>
<?php echo $view_ip_billing->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_billing->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_PatientID" class="view_ip_billing_PatientID">
<span<?php echo $view_ip_billing->PatientID->viewAttributes() ?>>
<?php echo $view_ip_billing->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_billing->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_patient_name" class="view_ip_billing_patient_name">
<span<?php echo $view_ip_billing->patient_name->viewAttributes() ?>>
<?php echo $view_ip_billing->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_billing->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_mrnNo" class="view_ip_billing_mrnNo">
<span<?php echo $view_ip_billing->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_billing->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_billing->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_mobileno" class="view_ip_billing_mobileno">
<span<?php echo $view_ip_billing->mobileno->viewAttributes() ?>>
<?php echo $view_ip_billing->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ip_billing->gender->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_gender" class="view_ip_billing_gender">
<span<?php echo $view_ip_billing->gender->viewAttributes() ?>>
<?php echo $view_ip_billing->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_ip_billing->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_physician_id" class="view_ip_billing_physician_id">
<span<?php echo $view_ip_billing->physician_id->viewAttributes() ?>>
<?php echo $view_ip_billing->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_ip_billing->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_typeRegsisteration" class="view_ip_billing_typeRegsisteration">
<span<?php echo $view_ip_billing->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_billing->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_ip_billing->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_PaymentCategory" class="view_ip_billing_PaymentCategory">
<span<?php echo $view_ip_billing->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_billing->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $view_ip_billing->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_admission_consultant_id" class="view_ip_billing_admission_consultant_id">
<span<?php echo $view_ip_billing->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_billing->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $view_ip_billing->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_leading_consultant_id" class="view_ip_billing_leading_consultant_id">
<span<?php echo $view_ip_billing->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_billing->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_billing->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_admission_date" class="view_ip_billing_admission_date">
<span<?php echo $view_ip_billing->admission_date->viewAttributes() ?>>
<?php echo $view_ip_billing->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_billing->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_release_date" class="view_ip_billing_release_date">
<span<?php echo $view_ip_billing->release_date->viewAttributes() ?>>
<?php echo $view_ip_billing->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_billing->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_PaymentStatus" class="view_ip_billing_PaymentStatus">
<span<?php echo $view_ip_billing->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_billing->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ip_billing->status->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_status" class="view_ip_billing_status">
<span<?php echo $view_ip_billing->status->viewAttributes() ?>>
<?php echo $view_ip_billing->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_billing->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_createdby" class="view_ip_billing_createdby">
<span<?php echo $view_ip_billing->createdby->viewAttributes() ?>>
<?php echo $view_ip_billing->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_billing->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_createddatetime" class="view_ip_billing_createddatetime">
<span<?php echo $view_ip_billing->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_billing->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_billing->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_modifiedby" class="view_ip_billing_modifiedby">
<span<?php echo $view_ip_billing->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_billing->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_billing->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_modifieddatetime" class="view_ip_billing_modifieddatetime">
<span<?php echo $view_ip_billing->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_billing->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_billing->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_HospID" class="view_ip_billing_HospID">
<span<?php echo $view_ip_billing->HospID->viewAttributes() ?>>
<?php echo $view_ip_billing->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_billing->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ReferedByDr" class="view_ip_billing_ReferedByDr">
<span<?php echo $view_ip_billing->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ip_billing->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ReferClinicname" class="view_ip_billing_ReferClinicname">
<span<?php echo $view_ip_billing->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ip_billing->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ReferCity" class="view_ip_billing_ReferCity">
<span<?php echo $view_ip_billing->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ip_billing->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ReferMobileNo" class="view_ip_billing_ReferMobileNo">
<span<?php echo $view_ip_billing->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_billing->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billing_ReferA4TreatingConsultant">
<span<?php echo $view_ip_billing->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_billing->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_PurposreReferredfor" class="view_ip_billing_PurposreReferredfor">
<span<?php echo $view_ip_billing->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_billing->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_ip_billing->patient_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_patient_id" class="view_ip_billing_patient_id">
<span<?php echo $view_ip_billing->patient_id->viewAttributes() ?>>
<?php echo $view_ip_billing->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_billing->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_BillClosing" class="view_ip_billing_BillClosing">
<span<?php echo $view_ip_billing->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_billing->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_billing->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_BillClosingDate" class="view_ip_billing_BillClosingDate">
<span<?php echo $view_ip_billing->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_billing->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_billing->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_BillNumber" class="view_ip_billing_BillNumber">
<span<?php echo $view_ip_billing->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_billing->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $view_ip_billing->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ClosingAmount" class="view_ip_billing_ClosingAmount">
<span<?php echo $view_ip_billing->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_billing->ClosingAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $view_ip_billing->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ClosingType" class="view_ip_billing_ClosingType">
<span<?php echo $view_ip_billing->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_billing->ClosingType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $view_ip_billing->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_BillAmount" class="view_ip_billing_BillAmount">
<span<?php echo $view_ip_billing->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_billing->BillAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $view_ip_billing->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_billclosedBy" class="view_ip_billing_billclosedBy">
<span<?php echo $view_ip_billing->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_billing->billclosedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $view_ip_billing->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_bllcloseByDate" class="view_ip_billing_bllcloseByDate">
<span<?php echo $view_ip_billing->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_billing->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_billing->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCnt ?>_view_ip_billing_ReportHeader" class="view_ip_billing_ReportHeader">
<span<?php echo $view_ip_billing->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_billing->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_billing_list->ListOptions->render("body", "right", $view_ip_billing_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ip_billing->isGridAdd())
		$view_ip_billing_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_billing_list->Recordset)
	$view_ip_billing_list->Recordset->Close();
?>
<?php if (!$view_ip_billing->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_billing_list->Pager)) $view_ip_billing_list->Pager = new NumericPager($view_ip_billing_list->StartRec, $view_ip_billing_list->DisplayRecs, $view_ip_billing_list->TotalRecs, $view_ip_billing_list->RecRange, $view_ip_billing_list->AutoHidePager) ?>
<?php if ($view_ip_billing_list->Pager->RecordCount > 0 && $view_ip_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_billing_list->pageUrl() ?>start=<?php echo $view_ip_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_billing_list->TotalRecs > 0 && (!$view_ip_billing_list->AutoHidePageSizeSelector || $view_ip_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_billing_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_billing_list->TotalRecs == 0 && !$view_ip_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_billing_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_billing->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_billing", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_billing_list->terminate();
?>