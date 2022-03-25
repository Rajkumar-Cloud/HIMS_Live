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
$view_ip_advance_list = new view_ip_advance_list();

// Run the page
$view_ip_advance_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_advancelist = currentForm = new ew.Form("fview_ip_advancelist", "list");
fview_ip_advancelist.formKeyCountName = '<?php echo $view_ip_advance_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_advancelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_advancelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_advancelist.lists["x_ModeofPayment"] = <?php echo $view_ip_advance_list->ModeofPayment->Lookup->toClientList() ?>;
fview_ip_advancelist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_ip_advance_list->ModeofPayment->lookupOptions()) ?>;
fview_ip_advancelist.lists["x_Reception"] = <?php echo $view_ip_advance_list->Reception->Lookup->toClientList() ?>;
fview_ip_advancelist.lists["x_Reception"].options = <?php echo JsonEncode($view_ip_advance_list->Reception->lookupOptions()) ?>;

// Form object for search
var fview_ip_advancelistsrch = currentSearchForm = new ew.Form("fview_ip_advancelistsrch");

// Filters
fview_ip_advancelistsrch.filterList = <?php echo $view_ip_advance_list->getFilterList() ?>;
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
<?php if (!$view_ip_advance->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_advance_list->TotalRecs > 0 && $view_ip_advance_list->ExportOptions->visible()) { ?>
<?php $view_ip_advance_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_advance_list->ImportOptions->visible()) { ?>
<?php $view_ip_advance_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_advance_list->SearchOptions->visible()) { ?>
<?php $view_ip_advance_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_advance_list->FilterOptions->visible()) { ?>
<?php $view_ip_advance_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_ip_advance->isExport() || EXPORT_MASTER_RECORD && $view_ip_advance->isExport("print")) { ?>
<?php
if ($view_ip_advance_list->DbMasterFilter <> "" && $view_ip_advance->getCurrentMasterTable() == "ip_admission") {
	if ($view_ip_advance_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_ip_advance_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_advance->isExport() && !$view_ip_advance->CurrentAction) { ?>
<form name="fview_ip_advancelistsrch" id="fview_ip_advancelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_advance_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_advancelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_advance">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_advance_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_advance_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_advance_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_advance_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_advance_list->showPageHeader(); ?>
<?php
$view_ip_advance_list->showMessage();
?>
<?php if ($view_ip_advance_list->TotalRecs > 0 || $view_ip_advance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_advance_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_advance">
<?php if (!$view_ip_advance->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_advance->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_advance_list->Pager)) $view_ip_advance_list->Pager = new NumericPager($view_ip_advance_list->StartRec, $view_ip_advance_list->DisplayRecs, $view_ip_advance_list->TotalRecs, $view_ip_advance_list->RecRange, $view_ip_advance_list->AutoHidePager) ?>
<?php if ($view_ip_advance_list->Pager->RecordCount > 0 && $view_ip_advance_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_advance_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_advance_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_advance_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_advance_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_advance_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_advance_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_advance_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_advance_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_advance_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_advance_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_advance_list->TotalRecs > 0 && (!$view_ip_advance_list->AutoHidePageSizeSelector || $view_ip_advance_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_advance">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_advance_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_advance_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_advance_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_advance_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_advance_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_advance_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_advance->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_advancelist" id="fview_ip_advancelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_advance_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_advance_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<?php if ($view_ip_advance->getCurrentMasterTable() == "ip_admission" && $view_ip_advance->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo $view_ip_advance->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $view_ip_advance->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $view_ip_advance->PatID->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_ip_advance" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_advance_list->TotalRecs > 0 || $view_ip_advance->isGridEdit()) { ?>
<table id="tbl_view_ip_advancelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_advance_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_advance_list->renderListOptions();

// Render list options (header, left)
$view_ip_advance_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_advance->id->Visible) { // id ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_advance->id->headerCellClass() ?>"><div id="elh_view_ip_advance_id" class="view_ip_advance_id"><div class="ew-table-header-caption"><?php echo $view_ip_advance->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_advance->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->id) ?>',1);"><div id="elh_view_ip_advance_id" class="view_ip_advance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Name->Visible) { // Name ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance->Name->headerCellClass() ?>"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Name) ?>',1);"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance->Mobile->headerCellClass() ?>"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Mobile) ?>',1);"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type"><div class="ew-table-header-caption"><?php echo $view_ip_advance->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->voucher_type) ?>',1);"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Details->Visible) { // Details ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance->Details->headerCellClass() ?>"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Details) ?>',1);"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_ip_advance->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->ModeofPayment) ?>',1);"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance->Amount->headerCellClass() ?>"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Amount) ?>',1);"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues"><div class="ew-table-header-caption"><?php echo $view_ip_advance->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->AnyDues) ?>',1);"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance->createdby->headerCellClass() ?>"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_advance->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->createdby) ?>',1);"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->createddatetime) ?>',1);"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_advance->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->modifiedby) ?>',1);"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->modifieddatetime) ?>',1);"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance->PatID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->PatID) ?>',1);"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance->PatientID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->PatientID) ?>',1);"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance->PatientName->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->PatientName) ?>',1);"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->VisiteType) == "") { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance->VisiteType->headerCellClass() ?>"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType"><div class="ew-table-header-caption"><?php echo $view_ip_advance->VisiteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance->VisiteType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->VisiteType) ?>',1);"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->VisiteType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->VisiteType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->VisiteType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->VisitDate) == "") { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance->VisitDate->headerCellClass() ?>"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance->VisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance->VisitDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->VisitDate) ?>',1);"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->VisitDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->VisitDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance->AdvanceNo->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo"><div class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->AdvanceNo) ?>',1);"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->AdvanceNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->AdvanceNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Status->Visible) { // Status ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance->Status->headerCellClass() ?>"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Status) ?>',1);"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Date->Visible) { // Date ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance->Date->headerCellClass() ?>"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Date) ?>',1);"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->AdvanceValidityDate) == "") { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->AdvanceValidityDate) ?>',1);"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->AdvanceValidityDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->AdvanceValidityDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->TotalRemainingAdvance) == "") { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance"><div class="ew-table-header-caption"><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->TotalRemainingAdvance) ?>',1);"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->TotalRemainingAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->TotalRemainingAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance->Remarks->headerCellClass() ?>"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Remarks) ?>',1);"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $view_ip_advance->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->SeectPaymentMode) ?>',1);"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->SeectPaymentMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->SeectPaymentMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance->PaidAmount->headerCellClass() ?>"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->PaidAmount) ?>',1);"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance->Currency->headerCellClass() ?>"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Currency) ?>',1);"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber"><div class="ew-table-header-caption"><?php echo $view_ip_advance->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->CardNumber) ?>',1);"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance->BankName->headerCellClass() ?>"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName"><div class="ew-table-header-caption"><?php echo $view_ip_advance->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->BankName) ?>',1);"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance->HospID->headerCellClass() ?>"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_advance->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->HospID) ?>',1);"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance->Reception->headerCellClass() ?>"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->Reception) ?>',1);"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance->mrnno->headerCellClass() ?>"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno"><div class="ew-table-header-caption"><?php echo $view_ip_advance->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_advance->SortUrl($view_ip_advance->mrnno) ?>',1);"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_advance_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_advance->ExportAll && $view_ip_advance->isExport()) {
	$view_ip_advance_list->StopRec = $view_ip_advance_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_advance_list->TotalRecs > $view_ip_advance_list->StartRec + $view_ip_advance_list->DisplayRecs - 1)
		$view_ip_advance_list->StopRec = $view_ip_advance_list->StartRec + $view_ip_advance_list->DisplayRecs - 1;
	else
		$view_ip_advance_list->StopRec = $view_ip_advance_list->TotalRecs;
}
$view_ip_advance_list->RecCnt = $view_ip_advance_list->StartRec - 1;
if ($view_ip_advance_list->Recordset && !$view_ip_advance_list->Recordset->EOF) {
	$view_ip_advance_list->Recordset->moveFirst();
	$selectLimit = $view_ip_advance_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_advance_list->StartRec > 1)
		$view_ip_advance_list->Recordset->move($view_ip_advance_list->StartRec - 1);
} elseif (!$view_ip_advance->AllowAddDeleteRow && $view_ip_advance_list->StopRec == 0) {
	$view_ip_advance_list->StopRec = $view_ip_advance->GridAddRowCount;
}

// Initialize aggregate
$view_ip_advance->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_advance->resetAttributes();
$view_ip_advance_list->renderRow();
while ($view_ip_advance_list->RecCnt < $view_ip_advance_list->StopRec) {
	$view_ip_advance_list->RecCnt++;
	if ($view_ip_advance_list->RecCnt >= $view_ip_advance_list->StartRec) {
		$view_ip_advance_list->RowCnt++;

		// Set up key count
		$view_ip_advance_list->KeyCount = $view_ip_advance_list->RowIndex;

		// Init row class and style
		$view_ip_advance->resetAttributes();
		$view_ip_advance->CssClass = "";
		if ($view_ip_advance->isGridAdd()) {
		} else {
			$view_ip_advance_list->loadRowValues($view_ip_advance_list->Recordset); // Load row values
		}
		$view_ip_advance->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_advance->RowAttrs = array_merge($view_ip_advance->RowAttrs, array('data-rowindex'=>$view_ip_advance_list->RowCnt, 'id'=>'r' . $view_ip_advance_list->RowCnt . '_view_ip_advance', 'data-rowtype'=>$view_ip_advance->RowType));

		// Render row
		$view_ip_advance_list->renderRow();

		// Render list options
		$view_ip_advance_list->renderListOptions();
?>
	<tr<?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_list->ListOptions->render("body", "left", $view_ip_advance_list->RowCnt);
?>
	<?php if ($view_ip_advance->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_advance->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_id" class="view_ip_advance_id">
<span<?php echo $view_ip_advance->id->viewAttributes() ?>>
<?php echo $view_ip_advance->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_ip_advance->Name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Name" class="view_ip_advance_Name">
<span<?php echo $view_ip_advance->Name->viewAttributes() ?>>
<?php echo $view_ip_advance->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_ip_advance->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Mobile" class="view_ip_advance_Mobile">
<span<?php echo $view_ip_advance->Mobile->viewAttributes() ?>>
<?php echo $view_ip_advance->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_ip_advance->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance->voucher_type->viewAttributes() ?>>
<?php echo $view_ip_advance->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_ip_advance->Details->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Details" class="view_ip_advance_Details">
<span<?php echo $view_ip_advance->Details->viewAttributes() ?>>
<?php echo $view_ip_advance->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance->ModeofPayment->viewAttributes() ?>>
<?php echo $view_ip_advance->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_ip_advance->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Amount" class="view_ip_advance_Amount">
<span<?php echo $view_ip_advance->Amount->viewAttributes() ?>>
<?php echo $view_ip_advance->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_ip_advance->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance->AnyDues->viewAttributes() ?>>
<?php echo $view_ip_advance->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_advance->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_createdby" class="view_ip_advance_createdby">
<span<?php echo $view_ip_advance->createdby->viewAttributes() ?>>
<?php echo $view_ip_advance->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_advance->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_advance->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_advance->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_advance->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_ip_advance->PatID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_PatID" class="view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_advance->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_PatientID" class="view_ip_advance_PatientID">
<span<?php echo $view_ip_advance->PatientID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_ip_advance->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_PatientName" class="view_ip_advance_PatientName">
<span<?php echo $view_ip_advance->PatientName->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType"<?php echo $view_ip_advance->VisiteType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance->VisiteType->viewAttributes() ?>>
<?php echo $view_ip_advance->VisiteType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate"<?php echo $view_ip_advance->VisitDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance->VisitDate->viewAttributes() ?>>
<?php echo $view_ip_advance->VisitDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo"<?php echo $view_ip_advance->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance->AdvanceNo->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $view_ip_advance->Status->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Status" class="view_ip_advance_Status">
<span<?php echo $view_ip_advance->Status->viewAttributes() ?>>
<?php echo $view_ip_advance->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $view_ip_advance->Date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Date" class="view_ip_advance_Date">
<span<?php echo $view_ip_advance->Date->viewAttributes() ?>>
<?php echo $view_ip_advance->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate"<?php echo $view_ip_advance->AdvanceValidityDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance"<?php echo $view_ip_advance->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $view_ip_advance->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_ip_advance->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Remarks" class="view_ip_advance_Remarks">
<span<?php echo $view_ip_advance->Remarks->viewAttributes() ?>>
<?php echo $view_ip_advance->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode"<?php echo $view_ip_advance->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance->SeectPaymentMode->viewAttributes() ?>>
<?php echo $view_ip_advance->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $view_ip_advance->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance->PaidAmount->viewAttributes() ?>>
<?php echo $view_ip_advance->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $view_ip_advance->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Currency" class="view_ip_advance_Currency">
<span<?php echo $view_ip_advance->Currency->viewAttributes() ?>>
<?php echo $view_ip_advance->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $view_ip_advance->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance->CardNumber->viewAttributes() ?>>
<?php echo $view_ip_advance->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_ip_advance->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_BankName" class="view_ip_advance_BankName">
<span<?php echo $view_ip_advance->BankName->viewAttributes() ?>>
<?php echo $view_ip_advance->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_advance->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_HospID" class="view_ip_advance_HospID">
<span<?php echo $view_ip_advance->HospID->viewAttributes() ?>>
<?php echo $view_ip_advance->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_ip_advance->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_Reception" class="view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<?php echo $view_ip_advance->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_ip_advance->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_advance_list->RowCnt ?>_view_ip_advance_mrnno" class="view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<?php echo $view_ip_advance->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_list->ListOptions->render("body", "right", $view_ip_advance_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ip_advance->isGridAdd())
		$view_ip_advance_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_advance->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_advance_list->Recordset)
	$view_ip_advance_list->Recordset->Close();
?>
<?php if (!$view_ip_advance->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_advance->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_advance_list->Pager)) $view_ip_advance_list->Pager = new NumericPager($view_ip_advance_list->StartRec, $view_ip_advance_list->DisplayRecs, $view_ip_advance_list->TotalRecs, $view_ip_advance_list->RecRange, $view_ip_advance_list->AutoHidePager) ?>
<?php if ($view_ip_advance_list->Pager->RecordCount > 0 && $view_ip_advance_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_advance_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_advance_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_advance_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_advance_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_advance_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_advance_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_advance_list->pageUrl() ?>start=<?php echo $view_ip_advance_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_advance_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_advance_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_advance_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_advance_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_advance_list->TotalRecs > 0 && (!$view_ip_advance_list->AutoHidePageSizeSelector || $view_ip_advance_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_advance">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_advance_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_advance_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_advance_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_advance_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_advance_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_advance_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_advance->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_advance_list->TotalRecs == 0 && !$view_ip_advance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_advance_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_advance", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_advance_list->terminate();
?>