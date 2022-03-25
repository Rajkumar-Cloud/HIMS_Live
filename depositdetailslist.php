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
$depositdetails_list = new depositdetails_list();

// Run the page
$depositdetails_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$depositdetails_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$depositdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fdepositdetailslist = currentForm = new ew.Form("fdepositdetailslist", "list");
fdepositdetailslist.formKeyCountName = '<?php echo $depositdetails_list->FormKeyCountName ?>';

// Form_CustomValidate event
fdepositdetailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdepositdetailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdepositdetailslist.lists["x_TransferTo"] = <?php echo $depositdetails_list->TransferTo->Lookup->toClientList() ?>;
fdepositdetailslist.lists["x_TransferTo"].options = <?php echo JsonEncode($depositdetails_list->TransferTo->lookupOptions()) ?>;

// Form object for search
var fdepositdetailslistsrch = currentSearchForm = new ew.Form("fdepositdetailslistsrch");

// Filters
fdepositdetailslistsrch.filterList = <?php echo $depositdetails_list->getFilterList() ?>;
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
<?php if (!$depositdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($depositdetails_list->TotalRecs > 0 && $depositdetails_list->ExportOptions->visible()) { ?>
<?php $depositdetails_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($depositdetails_list->ImportOptions->visible()) { ?>
<?php $depositdetails_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($depositdetails_list->SearchOptions->visible()) { ?>
<?php $depositdetails_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($depositdetails_list->FilterOptions->visible()) { ?>
<?php $depositdetails_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$depositdetails_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$depositdetails->isExport() && !$depositdetails->CurrentAction) { ?>
<form name="fdepositdetailslistsrch" id="fdepositdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($depositdetails_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fdepositdetailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="depositdetails">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($depositdetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($depositdetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $depositdetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $depositdetails_list->showPageHeader(); ?>
<?php
$depositdetails_list->showMessage();
?>
<?php if ($depositdetails_list->TotalRecs > 0 || $depositdetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($depositdetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> depositdetails">
<?php if (!$depositdetails->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$depositdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($depositdetails_list->Pager)) $depositdetails_list->Pager = new NumericPager($depositdetails_list->StartRec, $depositdetails_list->DisplayRecs, $depositdetails_list->TotalRecs, $depositdetails_list->RecRange, $depositdetails_list->AutoHidePager) ?>
<?php if ($depositdetails_list->Pager->RecordCount > 0 && $depositdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($depositdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($depositdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($depositdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $depositdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($depositdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($depositdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($depositdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $depositdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $depositdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $depositdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($depositdetails_list->TotalRecs > 0 && (!$depositdetails_list->AutoHidePageSizeSelector || $depositdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="depositdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($depositdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($depositdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($depositdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($depositdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($depositdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($depositdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($depositdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $depositdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdepositdetailslist" id="fdepositdetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($depositdetails_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $depositdetails_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<div id="gmp_depositdetails" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($depositdetails_list->TotalRecs > 0 || $depositdetails->isGridEdit()) { ?>
<table id="tbl_depositdetailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$depositdetails_list->RowType = ROWTYPE_HEADER;

// Render list options
$depositdetails_list->renderListOptions();

// Render list options (header, left)
$depositdetails_list->ListOptions->render("header", "left");
?>
<?php if ($depositdetails->id->Visible) { // id ?>
	<?php if ($depositdetails->sortUrl($depositdetails->id) == "") { ?>
		<th data-name="id" class="<?php echo $depositdetails->id->headerCellClass() ?>"><div id="elh_depositdetails_id" class="depositdetails_id"><div class="ew-table-header-caption"><?php echo $depositdetails->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $depositdetails->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->id) ?>',1);"><div id="elh_depositdetails_id" class="depositdetails_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->DepositDate->Visible) { // DepositDate ?>
	<?php if ($depositdetails->sortUrl($depositdetails->DepositDate) == "") { ?>
		<th data-name="DepositDate" class="<?php echo $depositdetails->DepositDate->headerCellClass() ?>"><div id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate"><div class="ew-table-header-caption"><?php echo $depositdetails->DepositDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepositDate" class="<?php echo $depositdetails->DepositDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->DepositDate) ?>',1);"><div id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->DepositDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->DepositDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->DepositDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->TransferTo->Visible) { // TransferTo ?>
	<?php if ($depositdetails->sortUrl($depositdetails->TransferTo) == "") { ?>
		<th data-name="TransferTo" class="<?php echo $depositdetails->TransferTo->headerCellClass() ?>"><div id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><div class="ew-table-header-caption"><?php echo $depositdetails->TransferTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferTo" class="<?php echo $depositdetails->TransferTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->TransferTo) ?>',1);"><div id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->TransferTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->TransferTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->TransferTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->OpeningBalance->Visible) { // OpeningBalance ?>
	<?php if ($depositdetails->sortUrl($depositdetails->OpeningBalance) == "") { ?>
		<th data-name="OpeningBalance" class="<?php echo $depositdetails->OpeningBalance->headerCellClass() ?>"><div id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><div class="ew-table-header-caption"><?php echo $depositdetails->OpeningBalance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningBalance" class="<?php echo $depositdetails->OpeningBalance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->OpeningBalance) ?>',1);"><div id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->OpeningBalance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->OpeningBalance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->OpeningBalance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->Other->Visible) { // Other ?>
	<?php if ($depositdetails->sortUrl($depositdetails->Other) == "") { ?>
		<th data-name="Other" class="<?php echo $depositdetails->Other->headerCellClass() ?>"><div id="elh_depositdetails_Other" class="depositdetails_Other"><div class="ew-table-header-caption"><?php echo $depositdetails->Other->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Other" class="<?php echo $depositdetails->Other->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->Other) ?>',1);"><div id="elh_depositdetails_Other" class="depositdetails_Other">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->Other->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->Other->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->Other->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->TotalCash->Visible) { // TotalCash ?>
	<?php if ($depositdetails->sortUrl($depositdetails->TotalCash) == "") { ?>
		<th data-name="TotalCash" class="<?php echo $depositdetails->TotalCash->headerCellClass() ?>"><div id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash"><div class="ew-table-header-caption"><?php echo $depositdetails->TotalCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCash" class="<?php echo $depositdetails->TotalCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->TotalCash) ?>',1);"><div id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->TotalCash->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->TotalCash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->TotalCash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->Cheque->Visible) { // Cheque ?>
	<?php if ($depositdetails->sortUrl($depositdetails->Cheque) == "") { ?>
		<th data-name="Cheque" class="<?php echo $depositdetails->Cheque->headerCellClass() ?>"><div id="elh_depositdetails_Cheque" class="depositdetails_Cheque"><div class="ew-table-header-caption"><?php echo $depositdetails->Cheque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cheque" class="<?php echo $depositdetails->Cheque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->Cheque) ?>',1);"><div id="elh_depositdetails_Cheque" class="depositdetails_Cheque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->Cheque->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->Cheque->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->Cheque->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->Card->Visible) { // Card ?>
	<?php if ($depositdetails->sortUrl($depositdetails->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $depositdetails->Card->headerCellClass() ?>"><div id="elh_depositdetails_Card" class="depositdetails_Card"><div class="ew-table-header-caption"><?php echo $depositdetails->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $depositdetails->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->Card) ?>',1);"><div id="elh_depositdetails_Card" class="depositdetails_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->Card->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<?php if ($depositdetails->sortUrl($depositdetails->NEFTRTGS) == "") { ?>
		<th data-name="NEFTRTGS" class="<?php echo $depositdetails->NEFTRTGS->headerCellClass() ?>"><div id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS"><div class="ew-table-header-caption"><?php echo $depositdetails->NEFTRTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEFTRTGS" class="<?php echo $depositdetails->NEFTRTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->NEFTRTGS) ?>',1);"><div id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->NEFTRTGS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->NEFTRTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->NEFTRTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
	<?php if ($depositdetails->sortUrl($depositdetails->TotalTransferDepositAmount) == "") { ?>
		<th data-name="TotalTransferDepositAmount" class="<?php echo $depositdetails->TotalTransferDepositAmount->headerCellClass() ?>"><div id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount"><div class="ew-table-header-caption"><?php echo $depositdetails->TotalTransferDepositAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalTransferDepositAmount" class="<?php echo $depositdetails->TotalTransferDepositAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->TotalTransferDepositAmount) ?>',1);"><div id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->TotalTransferDepositAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->TotalTransferDepositAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->TotalTransferDepositAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->CreatedUserName->Visible) { // CreatedUserName ?>
	<?php if ($depositdetails->sortUrl($depositdetails->CreatedUserName) == "") { ?>
		<th data-name="CreatedUserName" class="<?php echo $depositdetails->CreatedUserName->headerCellClass() ?>"><div id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><div class="ew-table-header-caption"><?php echo $depositdetails->CreatedUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedUserName" class="<?php echo $depositdetails->CreatedUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->CreatedUserName) ?>',1);"><div id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->CreatedUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->CreatedUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->CreatedUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->CashCollected->Visible) { // CashCollected ?>
	<?php if ($depositdetails->sortUrl($depositdetails->CashCollected) == "") { ?>
		<th data-name="CashCollected" class="<?php echo $depositdetails->CashCollected->headerCellClass() ?>"><div id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected"><div class="ew-table-header-caption"><?php echo $depositdetails->CashCollected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CashCollected" class="<?php echo $depositdetails->CashCollected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->CashCollected) ?>',1);"><div id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->CashCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->CashCollected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->CashCollected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->RTGS->Visible) { // RTGS ?>
	<?php if ($depositdetails->sortUrl($depositdetails->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $depositdetails->RTGS->headerCellClass() ?>"><div id="elh_depositdetails_RTGS" class="depositdetails_RTGS"><div class="ew-table-header-caption"><?php echo $depositdetails->RTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $depositdetails->RTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->RTGS) ?>',1);"><div id="elh_depositdetails_RTGS" class="depositdetails_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->PAYTM->Visible) { // PAYTM ?>
	<?php if ($depositdetails->sortUrl($depositdetails->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $depositdetails->PAYTM->headerCellClass() ?>"><div id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM"><div class="ew-table-header-caption"><?php echo $depositdetails->PAYTM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $depositdetails->PAYTM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->PAYTM) ?>',1);"><div id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->ManualCash->Visible) { // ManualCash ?>
	<?php if ($depositdetails->sortUrl($depositdetails->ManualCash) == "") { ?>
		<th data-name="ManualCash" class="<?php echo $depositdetails->ManualCash->headerCellClass() ?>"><div id="elh_depositdetails_ManualCash" class="depositdetails_ManualCash"><div class="ew-table-header-caption"><?php echo $depositdetails->ManualCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCash" class="<?php echo $depositdetails->ManualCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->ManualCash) ?>',1);"><div id="elh_depositdetails_ManualCash" class="depositdetails_ManualCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->ManualCash->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->ManualCash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->ManualCash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails->ManualCard->Visible) { // ManualCard ?>
	<?php if ($depositdetails->sortUrl($depositdetails->ManualCard) == "") { ?>
		<th data-name="ManualCard" class="<?php echo $depositdetails->ManualCard->headerCellClass() ?>"><div id="elh_depositdetails_ManualCard" class="depositdetails_ManualCard"><div class="ew-table-header-caption"><?php echo $depositdetails->ManualCard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCard" class="<?php echo $depositdetails->ManualCard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $depositdetails->SortUrl($depositdetails->ManualCard) ?>',1);"><div id="elh_depositdetails_ManualCard" class="depositdetails_ManualCard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails->ManualCard->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails->ManualCard->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($depositdetails->ManualCard->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$depositdetails_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($depositdetails->ExportAll && $depositdetails->isExport()) {
	$depositdetails_list->StopRec = $depositdetails_list->TotalRecs;
} else {

	// Set the last record to display
	if ($depositdetails_list->TotalRecs > $depositdetails_list->StartRec + $depositdetails_list->DisplayRecs - 1)
		$depositdetails_list->StopRec = $depositdetails_list->StartRec + $depositdetails_list->DisplayRecs - 1;
	else
		$depositdetails_list->StopRec = $depositdetails_list->TotalRecs;
}
$depositdetails_list->RecCnt = $depositdetails_list->StartRec - 1;
if ($depositdetails_list->Recordset && !$depositdetails_list->Recordset->EOF) {
	$depositdetails_list->Recordset->moveFirst();
	$selectLimit = $depositdetails_list->UseSelectLimit;
	if (!$selectLimit && $depositdetails_list->StartRec > 1)
		$depositdetails_list->Recordset->move($depositdetails_list->StartRec - 1);
} elseif (!$depositdetails->AllowAddDeleteRow && $depositdetails_list->StopRec == 0) {
	$depositdetails_list->StopRec = $depositdetails->GridAddRowCount;
}

// Initialize aggregate
$depositdetails->RowType = ROWTYPE_AGGREGATEINIT;
$depositdetails->resetAttributes();
$depositdetails_list->renderRow();
while ($depositdetails_list->RecCnt < $depositdetails_list->StopRec) {
	$depositdetails_list->RecCnt++;
	if ($depositdetails_list->RecCnt >= $depositdetails_list->StartRec) {
		$depositdetails_list->RowCnt++;

		// Set up key count
		$depositdetails_list->KeyCount = $depositdetails_list->RowIndex;

		// Init row class and style
		$depositdetails->resetAttributes();
		$depositdetails->CssClass = "";
		if ($depositdetails->isGridAdd()) {
		} else {
			$depositdetails_list->loadRowValues($depositdetails_list->Recordset); // Load row values
		}
		$depositdetails->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$depositdetails->RowAttrs = array_merge($depositdetails->RowAttrs, array('data-rowindex'=>$depositdetails_list->RowCnt, 'id'=>'r' . $depositdetails_list->RowCnt . '_depositdetails', 'data-rowtype'=>$depositdetails->RowType));

		// Render row
		$depositdetails_list->renderRow();

		// Render list options
		$depositdetails_list->renderListOptions();
?>
	<tr<?php echo $depositdetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$depositdetails_list->ListOptions->render("body", "left", $depositdetails_list->RowCnt);
?>
	<?php if ($depositdetails->id->Visible) { // id ?>
		<td data-name="id"<?php echo $depositdetails->id->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_id" class="depositdetails_id">
<span<?php echo $depositdetails->id->viewAttributes() ?>>
<?php echo $depositdetails->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate"<?php echo $depositdetails->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_DepositDate" class="depositdetails_DepositDate">
<span<?php echo $depositdetails->DepositDate->viewAttributes() ?>>
<?php echo $depositdetails->DepositDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo"<?php echo $depositdetails->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_TransferTo" class="depositdetails_TransferTo">
<span<?php echo $depositdetails->TransferTo->viewAttributes() ?>>
<?php echo $depositdetails->TransferTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance"<?php echo $depositdetails->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance">
<span<?php echo $depositdetails->OpeningBalance->viewAttributes() ?>>
<?php echo $depositdetails->OpeningBalance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->Other->Visible) { // Other ?>
		<td data-name="Other"<?php echo $depositdetails->Other->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_Other" class="depositdetails_Other">
<span<?php echo $depositdetails->Other->viewAttributes() ?>>
<?php echo $depositdetails->Other->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash"<?php echo $depositdetails->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_TotalCash" class="depositdetails_TotalCash">
<span<?php echo $depositdetails->TotalCash->viewAttributes() ?>>
<?php echo $depositdetails->TotalCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque"<?php echo $depositdetails->Cheque->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_Cheque" class="depositdetails_Cheque">
<span<?php echo $depositdetails->Cheque->viewAttributes() ?>>
<?php echo $depositdetails->Cheque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $depositdetails->Card->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_Card" class="depositdetails_Card">
<span<?php echo $depositdetails->Card->viewAttributes() ?>>
<?php echo $depositdetails->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS"<?php echo $depositdetails->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS">
<span<?php echo $depositdetails->NEFTRTGS->viewAttributes() ?>>
<?php echo $depositdetails->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
		<td data-name="TotalTransferDepositAmount"<?php echo $depositdetails->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails->TotalTransferDepositAmount->viewAttributes() ?>>
<?php echo $depositdetails->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName"<?php echo $depositdetails->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName">
<span<?php echo $depositdetails->CreatedUserName->viewAttributes() ?>>
<?php echo $depositdetails->CreatedUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->CashCollected->Visible) { // CashCollected ?>
		<td data-name="CashCollected"<?php echo $depositdetails->CashCollected->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_CashCollected" class="depositdetails_CashCollected">
<span<?php echo $depositdetails->CashCollected->viewAttributes() ?>>
<?php echo $depositdetails->CashCollected->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS"<?php echo $depositdetails->RTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_RTGS" class="depositdetails_RTGS">
<span<?php echo $depositdetails->RTGS->viewAttributes() ?>>
<?php echo $depositdetails->RTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM"<?php echo $depositdetails->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_PAYTM" class="depositdetails_PAYTM">
<span<?php echo $depositdetails->PAYTM->viewAttributes() ?>>
<?php echo $depositdetails->PAYTM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->ManualCash->Visible) { // ManualCash ?>
		<td data-name="ManualCash"<?php echo $depositdetails->ManualCash->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_ManualCash" class="depositdetails_ManualCash">
<span<?php echo $depositdetails->ManualCash->viewAttributes() ?>>
<?php echo $depositdetails->ManualCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails->ManualCard->Visible) { // ManualCard ?>
		<td data-name="ManualCard"<?php echo $depositdetails->ManualCard->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCnt ?>_depositdetails_ManualCard" class="depositdetails_ManualCard">
<span<?php echo $depositdetails->ManualCard->viewAttributes() ?>>
<?php echo $depositdetails->ManualCard->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$depositdetails_list->ListOptions->render("body", "right", $depositdetails_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$depositdetails->isGridAdd())
		$depositdetails_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$depositdetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($depositdetails_list->Recordset)
	$depositdetails_list->Recordset->Close();
?>
<?php if (!$depositdetails->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$depositdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($depositdetails_list->Pager)) $depositdetails_list->Pager = new NumericPager($depositdetails_list->StartRec, $depositdetails_list->DisplayRecs, $depositdetails_list->TotalRecs, $depositdetails_list->RecRange, $depositdetails_list->AutoHidePager) ?>
<?php if ($depositdetails_list->Pager->RecordCount > 0 && $depositdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($depositdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($depositdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($depositdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $depositdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($depositdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($depositdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $depositdetails_list->pageUrl() ?>start=<?php echo $depositdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($depositdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $depositdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $depositdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $depositdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($depositdetails_list->TotalRecs > 0 && (!$depositdetails_list->AutoHidePageSizeSelector || $depositdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="depositdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($depositdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($depositdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($depositdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($depositdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($depositdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($depositdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($depositdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $depositdetails_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($depositdetails_list->TotalRecs == 0 && !$depositdetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $depositdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$depositdetails_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$depositdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$depositdetails->isExport()) { ?>
<script>
ew.scrollableTable("gmp_depositdetails", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$depositdetails_list->terminate();
?>