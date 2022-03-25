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
$receipts_list = new receipts_list();

// Run the page
$receipts_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$receipts_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$receipts->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var freceiptslist = currentForm = new ew.Form("freceiptslist", "list");
freceiptslist.formKeyCountName = '<?php echo $receipts_list->FormKeyCountName ?>';

// Form_CustomValidate event
freceiptslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceiptslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var freceiptslistsrch = currentSearchForm = new ew.Form("freceiptslistsrch");

// Filters
freceiptslistsrch.filterList = <?php echo $receipts_list->getFilterList() ?>;
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
<?php if (!$receipts->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($receipts_list->TotalRecs > 0 && $receipts_list->ExportOptions->visible()) { ?>
<?php $receipts_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($receipts_list->ImportOptions->visible()) { ?>
<?php $receipts_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($receipts_list->SearchOptions->visible()) { ?>
<?php $receipts_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($receipts_list->FilterOptions->visible()) { ?>
<?php $receipts_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$receipts_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$receipts->isExport() && !$receipts->CurrentAction) { ?>
<form name="freceiptslistsrch" id="freceiptslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($receipts_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="freceiptslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="receipts">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($receipts_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($receipts_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $receipts_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $receipts_list->showPageHeader(); ?>
<?php
$receipts_list->showMessage();
?>
<?php if ($receipts_list->TotalRecs > 0 || $receipts->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($receipts_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> receipts">
<?php if (!$receipts->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$receipts->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($receipts_list->Pager)) $receipts_list->Pager = new NumericPager($receipts_list->StartRec, $receipts_list->DisplayRecs, $receipts_list->TotalRecs, $receipts_list->RecRange, $receipts_list->AutoHidePager) ?>
<?php if ($receipts_list->Pager->RecordCount > 0 && $receipts_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($receipts_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($receipts_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($receipts_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $receipts_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($receipts_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($receipts_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($receipts_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $receipts_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $receipts_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $receipts_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($receipts_list->TotalRecs > 0 && (!$receipts_list->AutoHidePageSizeSelector || $receipts_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="receipts">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($receipts_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($receipts_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($receipts_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($receipts_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($receipts_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($receipts_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($receipts->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $receipts_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="freceiptslist" id="freceiptslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($receipts_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $receipts_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<div id="gmp_receipts" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($receipts_list->TotalRecs > 0 || $receipts->isGridEdit()) { ?>
<table id="tbl_receiptslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$receipts_list->RowType = ROWTYPE_HEADER;

// Render list options
$receipts_list->renderListOptions();

// Render list options (header, left)
$receipts_list->ListOptions->render("header", "left");
?>
<?php if ($receipts->id->Visible) { // id ?>
	<?php if ($receipts->sortUrl($receipts->id) == "") { ?>
		<th data-name="id" class="<?php echo $receipts->id->headerCellClass() ?>"><div id="elh_receipts_id" class="receipts_id"><div class="ew-table-header-caption"><?php echo $receipts->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $receipts->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->id) ?>',1);"><div id="elh_receipts_id" class="receipts_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->Reception->Visible) { // Reception ?>
	<?php if ($receipts->sortUrl($receipts->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $receipts->Reception->headerCellClass() ?>"><div id="elh_receipts_Reception" class="receipts_Reception"><div class="ew-table-header-caption"><?php echo $receipts->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $receipts->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->Reception) ?>',1);"><div id="elh_receipts_Reception" class="receipts_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->Aid->Visible) { // Aid ?>
	<?php if ($receipts->sortUrl($receipts->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $receipts->Aid->headerCellClass() ?>"><div id="elh_receipts_Aid" class="receipts_Aid"><div class="ew-table-header-caption"><?php echo $receipts->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $receipts->Aid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->Aid) ?>',1);"><div id="elh_receipts_Aid" class="receipts_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->Aid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->Aid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->Vid->Visible) { // Vid ?>
	<?php if ($receipts->sortUrl($receipts->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $receipts->Vid->headerCellClass() ?>"><div id="elh_receipts_Vid" class="receipts_Vid"><div class="ew-table-header-caption"><?php echo $receipts->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $receipts->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->Vid) ?>',1);"><div id="elh_receipts_Vid" class="receipts_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->patient_id->Visible) { // patient_id ?>
	<?php if ($receipts->sortUrl($receipts->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $receipts->patient_id->headerCellClass() ?>"><div id="elh_receipts_patient_id" class="receipts_patient_id"><div class="ew-table-header-caption"><?php echo $receipts->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $receipts->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->patient_id) ?>',1);"><div id="elh_receipts_patient_id" class="receipts_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->mrnno->Visible) { // mrnno ?>
	<?php if ($receipts->sortUrl($receipts->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $receipts->mrnno->headerCellClass() ?>"><div id="elh_receipts_mrnno" class="receipts_mrnno"><div class="ew-table-header-caption"><?php echo $receipts->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $receipts->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->mrnno) ?>',1);"><div id="elh_receipts_mrnno" class="receipts_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->PatientName->Visible) { // PatientName ?>
	<?php if ($receipts->sortUrl($receipts->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $receipts->PatientName->headerCellClass() ?>"><div id="elh_receipts_PatientName" class="receipts_PatientName"><div class="ew-table-header-caption"><?php echo $receipts->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $receipts->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->PatientName) ?>',1);"><div id="elh_receipts_PatientName" class="receipts_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->amount->Visible) { // amount ?>
	<?php if ($receipts->sortUrl($receipts->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $receipts->amount->headerCellClass() ?>"><div id="elh_receipts_amount" class="receipts_amount"><div class="ew-table-header-caption"><?php echo $receipts->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $receipts->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->amount) ?>',1);"><div id="elh_receipts_amount" class="receipts_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->Discount->Visible) { // Discount ?>
	<?php if ($receipts->sortUrl($receipts->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $receipts->Discount->headerCellClass() ?>"><div id="elh_receipts_Discount" class="receipts_Discount"><div class="ew-table-header-caption"><?php echo $receipts->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $receipts->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->Discount) ?>',1);"><div id="elh_receipts_Discount" class="receipts_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->SubTotal->Visible) { // SubTotal ?>
	<?php if ($receipts->sortUrl($receipts->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $receipts->SubTotal->headerCellClass() ?>"><div id="elh_receipts_SubTotal" class="receipts_SubTotal"><div class="ew-table-header-caption"><?php echo $receipts->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $receipts->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->SubTotal) ?>',1);"><div id="elh_receipts_SubTotal" class="receipts_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->patient_type->Visible) { // patient_type ?>
	<?php if ($receipts->sortUrl($receipts->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $receipts->patient_type->headerCellClass() ?>"><div id="elh_receipts_patient_type" class="receipts_patient_type"><div class="ew-table-header-caption"><?php echo $receipts->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $receipts->patient_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->patient_type) ?>',1);"><div id="elh_receipts_patient_type" class="receipts_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->patient_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->patient_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->invoiceId->Visible) { // invoiceId ?>
	<?php if ($receipts->sortUrl($receipts->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $receipts->invoiceId->headerCellClass() ?>"><div id="elh_receipts_invoiceId" class="receipts_invoiceId"><div class="ew-table-header-caption"><?php echo $receipts->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $receipts->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->invoiceId) ?>',1);"><div id="elh_receipts_invoiceId" class="receipts_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($receipts->sortUrl($receipts->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $receipts->invoiceAmount->headerCellClass() ?>"><div id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount"><div class="ew-table-header-caption"><?php echo $receipts->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $receipts->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->invoiceAmount) ?>',1);"><div id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->invoiceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->invoiceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($receipts->sortUrl($receipts->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $receipts->invoiceStatus->headerCellClass() ?>"><div id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus"><div class="ew-table-header-caption"><?php echo $receipts->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $receipts->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->invoiceStatus) ?>',1);"><div id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->invoiceStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->invoiceStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($receipts->sortUrl($receipts->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $receipts->modeOfPayment->headerCellClass() ?>"><div id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment"><div class="ew-table-header-caption"><?php echo $receipts->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $receipts->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->modeOfPayment) ?>',1);"><div id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->modeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->modeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->charged_date->Visible) { // charged_date ?>
	<?php if ($receipts->sortUrl($receipts->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $receipts->charged_date->headerCellClass() ?>"><div id="elh_receipts_charged_date" class="receipts_charged_date"><div class="ew-table-header-caption"><?php echo $receipts->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $receipts->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->charged_date) ?>',1);"><div id="elh_receipts_charged_date" class="receipts_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->status->Visible) { // status ?>
	<?php if ($receipts->sortUrl($receipts->status) == "") { ?>
		<th data-name="status" class="<?php echo $receipts->status->headerCellClass() ?>"><div id="elh_receipts_status" class="receipts_status"><div class="ew-table-header-caption"><?php echo $receipts->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $receipts->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->status) ?>',1);"><div id="elh_receipts_status" class="receipts_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->createdby->Visible) { // createdby ?>
	<?php if ($receipts->sortUrl($receipts->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $receipts->createdby->headerCellClass() ?>"><div id="elh_receipts_createdby" class="receipts_createdby"><div class="ew-table-header-caption"><?php echo $receipts->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $receipts->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->createdby) ?>',1);"><div id="elh_receipts_createdby" class="receipts_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->createddatetime->Visible) { // createddatetime ?>
	<?php if ($receipts->sortUrl($receipts->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $receipts->createddatetime->headerCellClass() ?>"><div id="elh_receipts_createddatetime" class="receipts_createddatetime"><div class="ew-table-header-caption"><?php echo $receipts->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $receipts->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->createddatetime) ?>',1);"><div id="elh_receipts_createddatetime" class="receipts_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->modifiedby->Visible) { // modifiedby ?>
	<?php if ($receipts->sortUrl($receipts->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $receipts->modifiedby->headerCellClass() ?>"><div id="elh_receipts_modifiedby" class="receipts_modifiedby"><div class="ew-table-header-caption"><?php echo $receipts->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $receipts->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->modifiedby) ?>',1);"><div id="elh_receipts_modifiedby" class="receipts_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($receipts->sortUrl($receipts->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $receipts->modifieddatetime->headerCellClass() ?>"><div id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime"><div class="ew-table-header-caption"><?php echo $receipts->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $receipts->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->modifieddatetime) ?>',1);"><div id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<?php if ($receipts->sortUrl($receipts->ChequeCardNo) == "") { ?>
		<th data-name="ChequeCardNo" class="<?php echo $receipts->ChequeCardNo->headerCellClass() ?>"><div id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo"><div class="ew-table-header-caption"><?php echo $receipts->ChequeCardNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChequeCardNo" class="<?php echo $receipts->ChequeCardNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->ChequeCardNo) ?>',1);"><div id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->ChequeCardNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->ChequeCardNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->ChequeCardNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditBankName->Visible) { // CreditBankName ?>
	<?php if ($receipts->sortUrl($receipts->CreditBankName) == "") { ?>
		<th data-name="CreditBankName" class="<?php echo $receipts->CreditBankName->headerCellClass() ?>"><div id="elh_receipts_CreditBankName" class="receipts_CreditBankName"><div class="ew-table-header-caption"><?php echo $receipts->CreditBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditBankName" class="<?php echo $receipts->CreditBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditBankName) ?>',1);"><div id="elh_receipts_CreditBankName" class="receipts_CreditBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditBankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditBankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<?php if ($receipts->sortUrl($receipts->CreditCardHolder) == "") { ?>
		<th data-name="CreditCardHolder" class="<?php echo $receipts->CreditCardHolder->headerCellClass() ?>"><div id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder"><div class="ew-table-header-caption"><?php echo $receipts->CreditCardHolder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardHolder" class="<?php echo $receipts->CreditCardHolder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditCardHolder) ?>',1);"><div id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditCardHolder->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditCardHolder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditCardHolder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditCardType->Visible) { // CreditCardType ?>
	<?php if ($receipts->sortUrl($receipts->CreditCardType) == "") { ?>
		<th data-name="CreditCardType" class="<?php echo $receipts->CreditCardType->headerCellClass() ?>"><div id="elh_receipts_CreditCardType" class="receipts_CreditCardType"><div class="ew-table-header-caption"><?php echo $receipts->CreditCardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardType" class="<?php echo $receipts->CreditCardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditCardType) ?>',1);"><div id="elh_receipts_CreditCardType" class="receipts_CreditCardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditCardType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditCardType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditCardType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<?php if ($receipts->sortUrl($receipts->CreditCardMachine) == "") { ?>
		<th data-name="CreditCardMachine" class="<?php echo $receipts->CreditCardMachine->headerCellClass() ?>"><div id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine"><div class="ew-table-header-caption"><?php echo $receipts->CreditCardMachine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardMachine" class="<?php echo $receipts->CreditCardMachine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditCardMachine) ?>',1);"><div id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditCardMachine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditCardMachine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditCardMachine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<?php if ($receipts->sortUrl($receipts->CreditCardBatchNo) == "") { ?>
		<th data-name="CreditCardBatchNo" class="<?php echo $receipts->CreditCardBatchNo->headerCellClass() ?>"><div id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo"><div class="ew-table-header-caption"><?php echo $receipts->CreditCardBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardBatchNo" class="<?php echo $receipts->CreditCardBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditCardBatchNo) ?>',1);"><div id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditCardBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditCardBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditCardBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditCardTax->Visible) { // CreditCardTax ?>
	<?php if ($receipts->sortUrl($receipts->CreditCardTax) == "") { ?>
		<th data-name="CreditCardTax" class="<?php echo $receipts->CreditCardTax->headerCellClass() ?>"><div id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax"><div class="ew-table-header-caption"><?php echo $receipts->CreditCardTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardTax" class="<?php echo $receipts->CreditCardTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditCardTax) ?>',1);"><div id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditCardTax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditCardTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditCardTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<?php if ($receipts->sortUrl($receipts->CreditDeductionAmount) == "") { ?>
		<th data-name="CreditDeductionAmount" class="<?php echo $receipts->CreditDeductionAmount->headerCellClass() ?>"><div id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount"><div class="ew-table-header-caption"><?php echo $receipts->CreditDeductionAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditDeductionAmount" class="<?php echo $receipts->CreditDeductionAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->CreditDeductionAmount) ?>',1);"><div id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->CreditDeductionAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->CreditDeductionAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->CreditDeductionAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($receipts->sortUrl($receipts->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $receipts->RealizationAmount->headerCellClass() ?>"><div id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount"><div class="ew-table-header-caption"><?php echo $receipts->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $receipts->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->RealizationAmount) ?>',1);"><div id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->RealizationAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($receipts->sortUrl($receipts->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $receipts->RealizationStatus->headerCellClass() ?>"><div id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus"><div class="ew-table-header-caption"><?php echo $receipts->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $receipts->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->RealizationStatus) ?>',1);"><div id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->RealizationStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->RealizationStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($receipts->sortUrl($receipts->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $receipts->RealizationRemarks->headerCellClass() ?>"><div id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $receipts->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $receipts->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->RealizationRemarks) ?>',1);"><div id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->RealizationRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->RealizationRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($receipts->sortUrl($receipts->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $receipts->RealizationBatchNo->headerCellClass() ?>"><div id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $receipts->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $receipts->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->RealizationBatchNo) ?>',1);"><div id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->RealizationBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->RealizationBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($receipts->sortUrl($receipts->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $receipts->RealizationDate->headerCellClass() ?>"><div id="elh_receipts_RealizationDate" class="receipts_RealizationDate"><div class="ew-table-header-caption"><?php echo $receipts->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $receipts->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->RealizationDate) ?>',1);"><div id="elh_receipts_RealizationDate" class="receipts_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->RealizationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->RealizationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<?php if ($receipts->sortUrl($receipts->BankAccHolderMobileNumber) == "") { ?>
		<th data-name="BankAccHolderMobileNumber" class="<?php echo $receipts->BankAccHolderMobileNumber->headerCellClass() ?>"><div id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber"><div class="ew-table-header-caption"><?php echo $receipts->BankAccHolderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankAccHolderMobileNumber" class="<?php echo $receipts->BankAccHolderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $receipts->SortUrl($receipts->BankAccHolderMobileNumber) ?>',1);"><div id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts->BankAccHolderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts->BankAccHolderMobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($receipts->BankAccHolderMobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$receipts_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($receipts->ExportAll && $receipts->isExport()) {
	$receipts_list->StopRec = $receipts_list->TotalRecs;
} else {

	// Set the last record to display
	if ($receipts_list->TotalRecs > $receipts_list->StartRec + $receipts_list->DisplayRecs - 1)
		$receipts_list->StopRec = $receipts_list->StartRec + $receipts_list->DisplayRecs - 1;
	else
		$receipts_list->StopRec = $receipts_list->TotalRecs;
}
$receipts_list->RecCnt = $receipts_list->StartRec - 1;
if ($receipts_list->Recordset && !$receipts_list->Recordset->EOF) {
	$receipts_list->Recordset->moveFirst();
	$selectLimit = $receipts_list->UseSelectLimit;
	if (!$selectLimit && $receipts_list->StartRec > 1)
		$receipts_list->Recordset->move($receipts_list->StartRec - 1);
} elseif (!$receipts->AllowAddDeleteRow && $receipts_list->StopRec == 0) {
	$receipts_list->StopRec = $receipts->GridAddRowCount;
}

// Initialize aggregate
$receipts->RowType = ROWTYPE_AGGREGATEINIT;
$receipts->resetAttributes();
$receipts_list->renderRow();
while ($receipts_list->RecCnt < $receipts_list->StopRec) {
	$receipts_list->RecCnt++;
	if ($receipts_list->RecCnt >= $receipts_list->StartRec) {
		$receipts_list->RowCnt++;

		// Set up key count
		$receipts_list->KeyCount = $receipts_list->RowIndex;

		// Init row class and style
		$receipts->resetAttributes();
		$receipts->CssClass = "";
		if ($receipts->isGridAdd()) {
		} else {
			$receipts_list->loadRowValues($receipts_list->Recordset); // Load row values
		}
		$receipts->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$receipts->RowAttrs = array_merge($receipts->RowAttrs, array('data-rowindex'=>$receipts_list->RowCnt, 'id'=>'r' . $receipts_list->RowCnt . '_receipts', 'data-rowtype'=>$receipts->RowType));

		// Render row
		$receipts_list->renderRow();

		// Render list options
		$receipts_list->renderListOptions();
?>
	<tr<?php echo $receipts->rowAttributes() ?>>
<?php

// Render list options (body, left)
$receipts_list->ListOptions->render("body", "left", $receipts_list->RowCnt);
?>
	<?php if ($receipts->id->Visible) { // id ?>
		<td data-name="id"<?php echo $receipts->id->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_id" class="receipts_id">
<span<?php echo $receipts->id->viewAttributes() ?>>
<?php echo $receipts->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $receipts->Reception->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_Reception" class="receipts_Reception">
<span<?php echo $receipts->Reception->viewAttributes() ?>>
<?php echo $receipts->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->Aid->Visible) { // Aid ?>
		<td data-name="Aid"<?php echo $receipts->Aid->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_Aid" class="receipts_Aid">
<span<?php echo $receipts->Aid->viewAttributes() ?>>
<?php echo $receipts->Aid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $receipts->Vid->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_Vid" class="receipts_Vid">
<span<?php echo $receipts->Vid->viewAttributes() ?>>
<?php echo $receipts->Vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $receipts->patient_id->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_patient_id" class="receipts_patient_id">
<span<?php echo $receipts->patient_id->viewAttributes() ?>>
<?php echo $receipts->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $receipts->mrnno->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_mrnno" class="receipts_mrnno">
<span<?php echo $receipts->mrnno->viewAttributes() ?>>
<?php echo $receipts->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $receipts->PatientName->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_PatientName" class="receipts_PatientName">
<span<?php echo $receipts->PatientName->viewAttributes() ?>>
<?php echo $receipts->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $receipts->amount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_amount" class="receipts_amount">
<span<?php echo $receipts->amount->viewAttributes() ?>>
<?php echo $receipts->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $receipts->Discount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_Discount" class="receipts_Discount">
<span<?php echo $receipts->Discount->viewAttributes() ?>>
<?php echo $receipts->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $receipts->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_SubTotal" class="receipts_SubTotal">
<span<?php echo $receipts->SubTotal->viewAttributes() ?>>
<?php echo $receipts->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type"<?php echo $receipts->patient_type->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_patient_type" class="receipts_patient_type">
<span<?php echo $receipts->patient_type->viewAttributes() ?>>
<?php echo $receipts->patient_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $receipts->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_invoiceId" class="receipts_invoiceId">
<span<?php echo $receipts->invoiceId->viewAttributes() ?>>
<?php echo $receipts->invoiceId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount"<?php echo $receipts->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_invoiceAmount" class="receipts_invoiceAmount">
<span<?php echo $receipts->invoiceAmount->viewAttributes() ?>>
<?php echo $receipts->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus"<?php echo $receipts->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_invoiceStatus" class="receipts_invoiceStatus">
<span<?php echo $receipts->invoiceStatus->viewAttributes() ?>>
<?php echo $receipts->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment"<?php echo $receipts->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_modeOfPayment" class="receipts_modeOfPayment">
<span<?php echo $receipts->modeOfPayment->viewAttributes() ?>>
<?php echo $receipts->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $receipts->charged_date->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_charged_date" class="receipts_charged_date">
<span<?php echo $receipts->charged_date->viewAttributes() ?>>
<?php echo $receipts->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->status->Visible) { // status ?>
		<td data-name="status"<?php echo $receipts->status->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_status" class="receipts_status">
<span<?php echo $receipts->status->viewAttributes() ?>>
<?php echo $receipts->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $receipts->createdby->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_createdby" class="receipts_createdby">
<span<?php echo $receipts->createdby->viewAttributes() ?>>
<?php echo $receipts->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $receipts->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_createddatetime" class="receipts_createddatetime">
<span<?php echo $receipts->createddatetime->viewAttributes() ?>>
<?php echo $receipts->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $receipts->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_modifiedby" class="receipts_modifiedby">
<span<?php echo $receipts->modifiedby->viewAttributes() ?>>
<?php echo $receipts->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $receipts->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_modifieddatetime" class="receipts_modifieddatetime">
<span<?php echo $receipts->modifieddatetime->viewAttributes() ?>>
<?php echo $receipts->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->ChequeCardNo->Visible) { // ChequeCardNo ?>
		<td data-name="ChequeCardNo"<?php echo $receipts->ChequeCardNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_ChequeCardNo" class="receipts_ChequeCardNo">
<span<?php echo $receipts->ChequeCardNo->viewAttributes() ?>>
<?php echo $receipts->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditBankName->Visible) { // CreditBankName ?>
		<td data-name="CreditBankName"<?php echo $receipts->CreditBankName->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditBankName" class="receipts_CreditBankName">
<span<?php echo $receipts->CreditBankName->viewAttributes() ?>>
<?php echo $receipts->CreditBankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditCardHolder->Visible) { // CreditCardHolder ?>
		<td data-name="CreditCardHolder"<?php echo $receipts->CreditCardHolder->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditCardHolder" class="receipts_CreditCardHolder">
<span<?php echo $receipts->CreditCardHolder->viewAttributes() ?>>
<?php echo $receipts->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditCardType->Visible) { // CreditCardType ?>
		<td data-name="CreditCardType"<?php echo $receipts->CreditCardType->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditCardType" class="receipts_CreditCardType">
<span<?php echo $receipts->CreditCardType->viewAttributes() ?>>
<?php echo $receipts->CreditCardType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditCardMachine->Visible) { // CreditCardMachine ?>
		<td data-name="CreditCardMachine"<?php echo $receipts->CreditCardMachine->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditCardMachine" class="receipts_CreditCardMachine">
<span<?php echo $receipts->CreditCardMachine->viewAttributes() ?>>
<?php echo $receipts->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
		<td data-name="CreditCardBatchNo"<?php echo $receipts->CreditCardBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo">
<span<?php echo $receipts->CreditCardBatchNo->viewAttributes() ?>>
<?php echo $receipts->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditCardTax->Visible) { // CreditCardTax ?>
		<td data-name="CreditCardTax"<?php echo $receipts->CreditCardTax->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditCardTax" class="receipts_CreditCardTax">
<span<?php echo $receipts->CreditCardTax->viewAttributes() ?>>
<?php echo $receipts->CreditCardTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
		<td data-name="CreditDeductionAmount"<?php echo $receipts->CreditDeductionAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount">
<span<?php echo $receipts->CreditDeductionAmount->viewAttributes() ?>>
<?php echo $receipts->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $receipts->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_RealizationAmount" class="receipts_RealizationAmount">
<span<?php echo $receipts->RealizationAmount->viewAttributes() ?>>
<?php echo $receipts->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus"<?php echo $receipts->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_RealizationStatus" class="receipts_RealizationStatus">
<span<?php echo $receipts->RealizationStatus->viewAttributes() ?>>
<?php echo $receipts->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks"<?php echo $receipts->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_RealizationRemarks" class="receipts_RealizationRemarks">
<span<?php echo $receipts->RealizationRemarks->viewAttributes() ?>>
<?php echo $receipts->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo"<?php echo $receipts->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo">
<span<?php echo $receipts->RealizationBatchNo->viewAttributes() ?>>
<?php echo $receipts->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate"<?php echo $receipts->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_RealizationDate" class="receipts_RealizationDate">
<span<?php echo $receipts->RealizationDate->viewAttributes() ?>>
<?php echo $receipts->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
		<td data-name="BankAccHolderMobileNumber"<?php echo $receipts->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCnt ?>_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber">
<span<?php echo $receipts->BankAccHolderMobileNumber->viewAttributes() ?>>
<?php echo $receipts->BankAccHolderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$receipts_list->ListOptions->render("body", "right", $receipts_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$receipts->isGridAdd())
		$receipts_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$receipts->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($receipts_list->Recordset)
	$receipts_list->Recordset->Close();
?>
<?php if (!$receipts->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$receipts->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($receipts_list->Pager)) $receipts_list->Pager = new NumericPager($receipts_list->StartRec, $receipts_list->DisplayRecs, $receipts_list->TotalRecs, $receipts_list->RecRange, $receipts_list->AutoHidePager) ?>
<?php if ($receipts_list->Pager->RecordCount > 0 && $receipts_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($receipts_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($receipts_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($receipts_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $receipts_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($receipts_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($receipts_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $receipts_list->pageUrl() ?>start=<?php echo $receipts_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($receipts_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $receipts_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $receipts_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $receipts_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($receipts_list->TotalRecs > 0 && (!$receipts_list->AutoHidePageSizeSelector || $receipts_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="receipts">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($receipts_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($receipts_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($receipts_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($receipts_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($receipts_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($receipts_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($receipts->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $receipts_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($receipts_list->TotalRecs == 0 && !$receipts->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $receipts_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$receipts_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$receipts->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$receipts->isExport()) { ?>
<script>
ew.scrollableTable("gmp_receipts", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$receipts_list->terminate();
?>