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
$view_ip_admission_bill_summary_list = new view_ip_admission_bill_summary_list();

// Run the page
$view_ip_admission_bill_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_bill_summary_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_admission_bill_summarylist = currentForm = new ew.Form("fview_ip_admission_bill_summarylist", "list");
fview_ip_admission_bill_summarylist.formKeyCountName = '<?php echo $view_ip_admission_bill_summary_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_admission_bill_summarylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admission_bill_summarylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_admission_bill_summarylist.lists["x_PaymentCategory"] = <?php echo $view_ip_admission_bill_summary_list->PaymentCategory->Lookup->toClientList() ?>;
fview_ip_admission_bill_summarylist.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_list->PaymentCategory->lookupOptions()) ?>;
fview_ip_admission_bill_summarylist.lists["x_PaymentStatus"] = <?php echo $view_ip_admission_bill_summary_list->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_admission_bill_summarylist.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_list->PaymentStatus->lookupOptions()) ?>;
fview_ip_admission_bill_summarylist.lists["x_BillClosing"] = <?php echo $view_ip_admission_bill_summary_list->BillClosing->Lookup->toClientList() ?>;
fview_ip_admission_bill_summarylist.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_list->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_admission_bill_summarylist.lists["x_ReportHeader[]"] = <?php echo $view_ip_admission_bill_summary_list->ReportHeader->Lookup->toClientList() ?>;
fview_ip_admission_bill_summarylist.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_list->ReportHeader->options(FALSE, TRUE)) ?>;
fview_ip_admission_bill_summarylist.lists["x_Procedure"] = <?php echo $view_ip_admission_bill_summary_list->Procedure->Lookup->toClientList() ?>;
fview_ip_admission_bill_summarylist.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_list->Procedure->lookupOptions()) ?>;

// Form object for search
var fview_ip_admission_bill_summarylistsrch = currentSearchForm = new ew.Form("fview_ip_admission_bill_summarylistsrch");

// Filters
fview_ip_admission_bill_summarylistsrch.filterList = <?php echo $view_ip_admission_bill_summary_list->getFilterList() ?>;
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
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_bill_summary_list->TotalRecs > 0 && $view_ip_admission_bill_summary_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_bill_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_bill_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission_bill_summary->isExport() && !$view_ip_admission_bill_summary->CurrentAction) { ?>
<form name="fview_ip_admission_bill_summarylistsrch" id="fview_ip_admission_bill_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_admission_bill_summary_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_admission_bill_summarylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_admission_bill_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_bill_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_bill_summary_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_bill_summary_list->showPageHeader(); ?>
<?php
$view_ip_admission_bill_summary_list->showMessage();
?>
<?php if ($view_ip_admission_bill_summary_list->TotalRecs > 0 || $view_ip_admission_bill_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_bill_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_bill_summary">
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission_bill_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_bill_summary_list->Pager)) $view_ip_admission_bill_summary_list->Pager = new NumericPager($view_ip_admission_bill_summary_list->StartRec, $view_ip_admission_bill_summary_list->DisplayRecs, $view_ip_admission_bill_summary_list->TotalRecs, $view_ip_admission_bill_summary_list->RecRange, $view_ip_admission_bill_summary_list->AutoHidePager) ?>
<?php if ($view_ip_admission_bill_summary_list->Pager->RecordCount > 0 && $view_ip_admission_bill_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_bill_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_bill_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_bill_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_bill_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_bill_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_bill_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->TotalRecs > 0 && (!$view_ip_admission_bill_summary_list->AutoHidePageSizeSelector || $view_ip_admission_bill_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_bill_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_bill_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admission_bill_summarylist" id="fview_ip_admission_bill_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_admission_bill_summary_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_bill_summary_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<div id="gmp_view_ip_admission_bill_summary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_bill_summary_list->TotalRecs > 0 || $view_ip_admission_bill_summary->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_bill_summarylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_bill_summary_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_bill_summary_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_bill_summary_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_admission_bill_summary->id->Visible) { // id ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_bill_summary->id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summary_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_bill_summary->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->id) ?>',1);"><div id="elh_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_bill_summary->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summary_mrnNo"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_bill_summary->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->mrnNo) ?>',1);"><div id="elh_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summary_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_bill_summary->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summary_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_bill_summary->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->PatientID) ?>',1);"><div id="elh_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summary_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_bill_summary->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summary_patient_name"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_bill_summary->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->patient_name) ?>',1);"><div id="elh_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summary_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_bill_summary->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summary_mobileno"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_bill_summary->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->mobileno) ?>',1);"><div id="elh_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summary_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_bill_summary->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summary_gender"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_bill_summary->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->gender) ?>',1);"><div id="elh_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summary_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_bill_summary->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summary_physician_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_bill_summary->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->physician_id) ?>',1);"><div id="elh_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summary_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_bill_summary->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summary_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_bill_summary->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->typeRegsisteration) ?>',1);"><div id="elh_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summary_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_bill_summary->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summary_PaymentCategory"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_bill_summary->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->PaymentCategory) ?>',1);"><div id="elh_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summary_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PaymentCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_bill_summary->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summary_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_bill_summary->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->admission_consultant_id) ?>',1);"><div id="elh_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summary_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_bill_summary->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summary_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_bill_summary->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->leading_consultant_id) ?>',1);"><div id="elh_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summary_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_bill_summary->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summary_admission_date"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_bill_summary->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->admission_date) ?>',1);"><div id="elh_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summary_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_bill_summary->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summary_release_date"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_bill_summary->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->release_date) ?>',1);"><div id="elh_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summary_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_bill_summary->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summary_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_bill_summary->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->PaymentStatus) ?>',1);"><div id="elh_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summary_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->status->Visible) { // status ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_bill_summary->status->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summary_status"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_bill_summary->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->status) ?>',1);"><div id="elh_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summary_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_bill_summary->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summary_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_bill_summary->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->createdby) ?>',1);"><div id="elh_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summary_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_bill_summary->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summary_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_bill_summary->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->createddatetime) ?>',1);"><div id="elh_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summary_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_bill_summary->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summary_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_bill_summary->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->modifiedby) ?>',1);"><div id="elh_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summary_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_bill_summary->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summary_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_bill_summary->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->modifieddatetime) ?>',1);"><div id="elh_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summary_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_bill_summary->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summary_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_bill_summary->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->HospID) ?>',1);"><div id="elh_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_bill_summary->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summary_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_bill_summary->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ReferedByDr) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summary_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_bill_summary->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summary_ReferClinicname"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_bill_summary->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ReferClinicname) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summary_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_bill_summary->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summary_ReferCity"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_bill_summary->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ReferCity) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summary_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_bill_summary->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summary_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_bill_summary->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ReferMobileNo) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summary_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summary_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summary_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summary_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->PurposreReferredfor) ?>',1);"><div id="elh_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summary_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_bill_summary->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summary_BillClosing"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_bill_summary->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->BillClosing) ?>',1);"><div id="elh_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summary_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillClosing->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_bill_summary->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summary_BillClosingDate"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_bill_summary->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->BillClosingDate) ?>',1);"><div id="elh_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summary_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_bill_summary->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summary_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_bill_summary->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->BillNumber) ?>',1);"><div id="elh_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summary_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_bill_summary->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summary_ClosingAmount"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ClosingAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_bill_summary->ClosingAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ClosingAmount) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summary_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_bill_summary->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summary_ClosingType"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ClosingType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_bill_summary->ClosingType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ClosingType) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summary_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_bill_summary->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summary_BillAmount"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_bill_summary->BillAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->BillAmount) ?>',1);"><div id="elh_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summary_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_bill_summary->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summary_billclosedBy"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->billclosedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_bill_summary->billclosedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->billclosedBy) ?>',1);"><div id="elh_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summary_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_bill_summary->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summary_bllcloseByDate"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->bllcloseByDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_bill_summary->bllcloseByDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->bllcloseByDate) ?>',1);"><div id="elh_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summary_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_bill_summary->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summary_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_bill_summary->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->ReportHeader) ?>',1);"><div id="elh_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summary_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_bill_summary->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summary_Procedure"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_bill_summary->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->Procedure) ?>',1);"><div id="elh_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summary_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Procedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_bill_summary->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summary_Consultant"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_bill_summary->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->Consultant) ?>',1);"><div id="elh_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summary_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_bill_summary->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summary_Anesthetist"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_bill_summary->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->Anesthetist) ?>',1);"><div id="elh_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summary_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_bill_summary->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summary_Amound"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Amound->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_bill_summary->Amound->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->Amound) ?>',1);"><div id="elh_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summary_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_bill_summary->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summary_patient_id"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_bill_summary->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->patient_id) ?>',1);"><div id="elh_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summary_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission_bill_summary->sortUrl($view_ip_admission_bill_summary->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_bill_summary->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summary_Package"><div class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Package->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_bill_summary->Package->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_bill_summary->SortUrl($view_ip_admission_bill_summary->Package) ?>',1);"><div id="elh_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summary_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_bill_summary->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_bill_summary->Package->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_bill_summary->Package->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_bill_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission_bill_summary->ExportAll && $view_ip_admission_bill_summary->isExport()) {
	$view_ip_admission_bill_summary_list->StopRec = $view_ip_admission_bill_summary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_admission_bill_summary_list->TotalRecs > $view_ip_admission_bill_summary_list->StartRec + $view_ip_admission_bill_summary_list->DisplayRecs - 1)
		$view_ip_admission_bill_summary_list->StopRec = $view_ip_admission_bill_summary_list->StartRec + $view_ip_admission_bill_summary_list->DisplayRecs - 1;
	else
		$view_ip_admission_bill_summary_list->StopRec = $view_ip_admission_bill_summary_list->TotalRecs;
}
$view_ip_admission_bill_summary_list->RecCnt = $view_ip_admission_bill_summary_list->StartRec - 1;
if ($view_ip_admission_bill_summary_list->Recordset && !$view_ip_admission_bill_summary_list->Recordset->EOF) {
	$view_ip_admission_bill_summary_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_bill_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_bill_summary_list->StartRec > 1)
		$view_ip_admission_bill_summary_list->Recordset->move($view_ip_admission_bill_summary_list->StartRec - 1);
} elseif (!$view_ip_admission_bill_summary->AllowAddDeleteRow && $view_ip_admission_bill_summary_list->StopRec == 0) {
	$view_ip_admission_bill_summary_list->StopRec = $view_ip_admission_bill_summary->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission_bill_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission_bill_summary->resetAttributes();
$view_ip_admission_bill_summary_list->renderRow();
while ($view_ip_admission_bill_summary_list->RecCnt < $view_ip_admission_bill_summary_list->StopRec) {
	$view_ip_admission_bill_summary_list->RecCnt++;
	if ($view_ip_admission_bill_summary_list->RecCnt >= $view_ip_admission_bill_summary_list->StartRec) {
		$view_ip_admission_bill_summary_list->RowCnt++;

		// Set up key count
		$view_ip_admission_bill_summary_list->KeyCount = $view_ip_admission_bill_summary_list->RowIndex;

		// Init row class and style
		$view_ip_admission_bill_summary->resetAttributes();
		$view_ip_admission_bill_summary->CssClass = "";
		if ($view_ip_admission_bill_summary->isGridAdd()) {
		} else {
			$view_ip_admission_bill_summary_list->loadRowValues($view_ip_admission_bill_summary_list->Recordset); // Load row values
		}
		$view_ip_admission_bill_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission_bill_summary->RowAttrs = array_merge($view_ip_admission_bill_summary->RowAttrs, array('data-rowindex'=>$view_ip_admission_bill_summary_list->RowCnt, 'id'=>'r' . $view_ip_admission_bill_summary_list->RowCnt . '_view_ip_admission_bill_summary', 'data-rowtype'=>$view_ip_admission_bill_summary->RowType));

		// Render row
		$view_ip_admission_bill_summary_list->renderRow();

		// Render list options
		$view_ip_admission_bill_summary_list->renderListOptions();
?>
	<tr<?php echo $view_ip_admission_bill_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_bill_summary_list->ListOptions->render("body", "left", $view_ip_admission_bill_summary_list->RowCnt);
?>
	<?php if ($view_ip_admission_bill_summary->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_admission_bill_summary->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summary_id">
<span<?php echo $view_ip_admission_bill_summary->id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_admission_bill_summary->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summary_mrnNo">
<span<?php echo $view_ip_admission_bill_summary->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_admission_bill_summary->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summary_PatientID">
<span<?php echo $view_ip_admission_bill_summary->PatientID->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_admission_bill_summary->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summary_patient_name">
<span<?php echo $view_ip_admission_bill_summary->patient_name->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_admission_bill_summary->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summary_mobileno">
<span<?php echo $view_ip_admission_bill_summary->mobileno->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ip_admission_bill_summary->gender->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summary_gender">
<span<?php echo $view_ip_admission_bill_summary->gender->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_ip_admission_bill_summary->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summary_physician_id">
<span<?php echo $view_ip_admission_bill_summary->physician_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_ip_admission_bill_summary->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summary_typeRegsisteration">
<span<?php echo $view_ip_admission_bill_summary->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_ip_admission_bill_summary->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summary_PaymentCategory">
<span<?php echo $view_ip_admission_bill_summary->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $view_ip_admission_bill_summary->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summary_admission_consultant_id">
<span<?php echo $view_ip_admission_bill_summary->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $view_ip_admission_bill_summary->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summary_leading_consultant_id">
<span<?php echo $view_ip_admission_bill_summary->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_admission_bill_summary->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summary_admission_date">
<span<?php echo $view_ip_admission_bill_summary->admission_date->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_admission_bill_summary->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summary_release_date">
<span<?php echo $view_ip_admission_bill_summary->release_date->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_admission_bill_summary->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summary_PaymentStatus">
<span<?php echo $view_ip_admission_bill_summary->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ip_admission_bill_summary->status->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summary_status">
<span<?php echo $view_ip_admission_bill_summary->status->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_admission_bill_summary->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summary_createdby">
<span<?php echo $view_ip_admission_bill_summary->createdby->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_admission_bill_summary->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summary_createddatetime">
<span<?php echo $view_ip_admission_bill_summary->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_admission_bill_summary->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summary_modifiedby">
<span<?php echo $view_ip_admission_bill_summary->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_admission_bill_summary->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summary_modifieddatetime">
<span<?php echo $view_ip_admission_bill_summary->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_admission_bill_summary->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summary_HospID">
<span<?php echo $view_ip_admission_bill_summary->HospID->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_admission_bill_summary->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summary_ReferedByDr">
<span<?php echo $view_ip_admission_bill_summary->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ip_admission_bill_summary->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summary_ReferClinicname">
<span<?php echo $view_ip_admission_bill_summary->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ip_admission_bill_summary->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summary_ReferCity">
<span<?php echo $view_ip_admission_bill_summary->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ip_admission_bill_summary->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summary_ReferMobileNo">
<span<?php echo $view_ip_admission_bill_summary->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summary_PurposreReferredfor">
<span<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_admission_bill_summary->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summary_BillClosing">
<span<?php echo $view_ip_admission_bill_summary->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_admission_bill_summary->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summary_BillClosingDate">
<span<?php echo $view_ip_admission_bill_summary->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_admission_bill_summary->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summary_BillNumber">
<span<?php echo $view_ip_admission_bill_summary->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $view_ip_admission_bill_summary->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summary_ClosingAmount">
<span<?php echo $view_ip_admission_bill_summary->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ClosingAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $view_ip_admission_bill_summary->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summary_ClosingType">
<span<?php echo $view_ip_admission_bill_summary->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ClosingType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $view_ip_admission_bill_summary->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summary_BillAmount">
<span<?php echo $view_ip_admission_bill_summary->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $view_ip_admission_bill_summary->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summary_billclosedBy">
<span<?php echo $view_ip_admission_bill_summary->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->billclosedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $view_ip_admission_bill_summary->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summary_bllcloseByDate">
<span<?php echo $view_ip_admission_bill_summary->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_admission_bill_summary->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summary_ReportHeader">
<span<?php echo $view_ip_admission_bill_summary->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $view_ip_admission_bill_summary->Procedure->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summary_Procedure">
<span<?php echo $view_ip_admission_bill_summary->Procedure->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $view_ip_admission_bill_summary->Consultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summary_Consultant">
<span<?php echo $view_ip_admission_bill_summary->Consultant->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $view_ip_admission_bill_summary->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summary_Anesthetist">
<span<?php echo $view_ip_admission_bill_summary->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $view_ip_admission_bill_summary->Amound->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summary_Amound">
<span<?php echo $view_ip_admission_bill_summary->Amound->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Amound->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_ip_admission_bill_summary->patient_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summary_patient_id">
<span<?php echo $view_ip_admission_bill_summary->patient_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary->Package->Visible) { // Package ?>
		<td data-name="Package"<?php echo $view_ip_admission_bill_summary->Package->cellAttributes() ?>>
<span id="el<?php echo $view_ip_admission_bill_summary_list->RowCnt ?>_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summary_Package">
<span<?php echo $view_ip_admission_bill_summary->Package->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Package->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_bill_summary_list->ListOptions->render("body", "right", $view_ip_admission_bill_summary_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ip_admission_bill_summary->isGridAdd())
		$view_ip_admission_bill_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_admission_bill_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_admission_bill_summary_list->Recordset)
	$view_ip_admission_bill_summary_list->Recordset->Close();
?>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission_bill_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_bill_summary_list->Pager)) $view_ip_admission_bill_summary_list->Pager = new NumericPager($view_ip_admission_bill_summary_list->StartRec, $view_ip_admission_bill_summary_list->DisplayRecs, $view_ip_admission_bill_summary_list->TotalRecs, $view_ip_admission_bill_summary_list->RecRange, $view_ip_admission_bill_summary_list->AutoHidePager) ?>
<?php if ($view_ip_admission_bill_summary_list->Pager->RecordCount > 0 && $view_ip_admission_bill_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_bill_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_bill_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_bill_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_bill_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_bill_summary_list->pageUrl() ?>start=<?php echo $view_ip_admission_bill_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_bill_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_bill_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_bill_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->TotalRecs > 0 && (!$view_ip_admission_bill_summary_list->AutoHidePageSizeSelector || $view_ip_admission_bill_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_bill_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_bill_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_bill_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_bill_summary_list->TotalRecs == 0 && !$view_ip_admission_bill_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_bill_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_admission_bill_summary_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_admission_bill_summary", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_bill_summary_list->terminate();
?>