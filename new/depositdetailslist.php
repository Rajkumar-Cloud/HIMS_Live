<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$depositdetails_list->isExport()) { ?>
<script>
var fdepositdetailslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdepositdetailslist = currentForm = new ew.Form("fdepositdetailslist", "list");
	fdepositdetailslist.formKeyCountName = '<?php echo $depositdetails_list->FormKeyCountName ?>';
	loadjs.done("fdepositdetailslist");
});
var fdepositdetailslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdepositdetailslistsrch = currentSearchForm = new ew.Form("fdepositdetailslistsrch");

	// Dynamic selection lists
	// Filters

	fdepositdetailslistsrch.filterList = <?php echo $depositdetails_list->getFilterList() ?>;
	loadjs.done("fdepositdetailslistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$depositdetails_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($depositdetails_list->TotalRecords > 0 && $depositdetails_list->ExportOptions->visible()) { ?>
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
<?php if (!$depositdetails_list->isExport() && !$depositdetails->CurrentAction) { ?>
<form name="fdepositdetailslistsrch" id="fdepositdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdepositdetailslistsrch-search-panel" class="<?php echo $depositdetails_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="depositdetails">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $depositdetails_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($depositdetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($depositdetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $depositdetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($depositdetails_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $depositdetails_list->showPageHeader(); ?>
<?php
$depositdetails_list->showMessage();
?>
<?php if ($depositdetails_list->TotalRecords > 0 || $depositdetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($depositdetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> depositdetails">
<?php if (!$depositdetails_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$depositdetails_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $depositdetails_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $depositdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdepositdetailslist" id="fdepositdetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<div id="gmp_depositdetails" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($depositdetails_list->TotalRecords > 0 || $depositdetails_list->isGridEdit()) { ?>
<table id="tbl_depositdetailslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$depositdetails->RowType = ROWTYPE_HEADER;

// Render list options
$depositdetails_list->renderListOptions();

// Render list options (header, left)
$depositdetails_list->ListOptions->render("header", "left");
?>
<?php if ($depositdetails_list->id->Visible) { // id ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $depositdetails_list->id->headerCellClass() ?>"><div id="elh_depositdetails_id" class="depositdetails_id"><div class="ew-table-header-caption"><?php echo $depositdetails_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $depositdetails_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->id) ?>', 1);"><div id="elh_depositdetails_id" class="depositdetails_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->DepositDate->Visible) { // DepositDate ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->DepositDate) == "") { ?>
		<th data-name="DepositDate" class="<?php echo $depositdetails_list->DepositDate->headerCellClass() ?>"><div id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate"><div class="ew-table-header-caption"><?php echo $depositdetails_list->DepositDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepositDate" class="<?php echo $depositdetails_list->DepositDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->DepositDate) ?>', 1);"><div id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->DepositDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->DepositDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->DepositDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->TransferTo->Visible) { // TransferTo ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->TransferTo) == "") { ?>
		<th data-name="TransferTo" class="<?php echo $depositdetails_list->TransferTo->headerCellClass() ?>"><div id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><div class="ew-table-header-caption"><?php echo $depositdetails_list->TransferTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferTo" class="<?php echo $depositdetails_list->TransferTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->TransferTo) ?>', 1);"><div id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->TransferTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->TransferTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->TransferTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->OpeningBalance->Visible) { // OpeningBalance ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->OpeningBalance) == "") { ?>
		<th data-name="OpeningBalance" class="<?php echo $depositdetails_list->OpeningBalance->headerCellClass() ?>"><div id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><div class="ew-table-header-caption"><?php echo $depositdetails_list->OpeningBalance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningBalance" class="<?php echo $depositdetails_list->OpeningBalance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->OpeningBalance) ?>', 1);"><div id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->OpeningBalance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->OpeningBalance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->OpeningBalance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->Other->Visible) { // Other ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->Other) == "") { ?>
		<th data-name="Other" class="<?php echo $depositdetails_list->Other->headerCellClass() ?>"><div id="elh_depositdetails_Other" class="depositdetails_Other"><div class="ew-table-header-caption"><?php echo $depositdetails_list->Other->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Other" class="<?php echo $depositdetails_list->Other->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->Other) ?>', 1);"><div id="elh_depositdetails_Other" class="depositdetails_Other">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->Other->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->Other->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->Other->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->TotalCash->Visible) { // TotalCash ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->TotalCash) == "") { ?>
		<th data-name="TotalCash" class="<?php echo $depositdetails_list->TotalCash->headerCellClass() ?>"><div id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash"><div class="ew-table-header-caption"><?php echo $depositdetails_list->TotalCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCash" class="<?php echo $depositdetails_list->TotalCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->TotalCash) ?>', 1);"><div id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->TotalCash->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->TotalCash->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->TotalCash->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->Cheque->Visible) { // Cheque ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->Cheque) == "") { ?>
		<th data-name="Cheque" class="<?php echo $depositdetails_list->Cheque->headerCellClass() ?>"><div id="elh_depositdetails_Cheque" class="depositdetails_Cheque"><div class="ew-table-header-caption"><?php echo $depositdetails_list->Cheque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cheque" class="<?php echo $depositdetails_list->Cheque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->Cheque) ?>', 1);"><div id="elh_depositdetails_Cheque" class="depositdetails_Cheque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->Cheque->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->Cheque->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->Cheque->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->Card->Visible) { // Card ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $depositdetails_list->Card->headerCellClass() ?>"><div id="elh_depositdetails_Card" class="depositdetails_Card"><div class="ew-table-header-caption"><?php echo $depositdetails_list->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $depositdetails_list->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->Card) ?>', 1);"><div id="elh_depositdetails_Card" class="depositdetails_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->Card->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->Card->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->Card->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->NEFTRTGS) == "") { ?>
		<th data-name="NEFTRTGS" class="<?php echo $depositdetails_list->NEFTRTGS->headerCellClass() ?>"><div id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS"><div class="ew-table-header-caption"><?php echo $depositdetails_list->NEFTRTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEFTRTGS" class="<?php echo $depositdetails_list->NEFTRTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->NEFTRTGS) ?>', 1);"><div id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->NEFTRTGS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->NEFTRTGS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->NEFTRTGS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->TotalTransferDepositAmount) == "") { ?>
		<th data-name="TotalTransferDepositAmount" class="<?php echo $depositdetails_list->TotalTransferDepositAmount->headerCellClass() ?>"><div id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount"><div class="ew-table-header-caption"><?php echo $depositdetails_list->TotalTransferDepositAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalTransferDepositAmount" class="<?php echo $depositdetails_list->TotalTransferDepositAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->TotalTransferDepositAmount) ?>', 1);"><div id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->TotalTransferDepositAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->TotalTransferDepositAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->TotalTransferDepositAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->CreatedUserName->Visible) { // CreatedUserName ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->CreatedUserName) == "") { ?>
		<th data-name="CreatedUserName" class="<?php echo $depositdetails_list->CreatedUserName->headerCellClass() ?>"><div id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><div class="ew-table-header-caption"><?php echo $depositdetails_list->CreatedUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedUserName" class="<?php echo $depositdetails_list->CreatedUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->CreatedUserName) ?>', 1);"><div id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->CreatedUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->CreatedUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->CreatedUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->CashCollected->Visible) { // CashCollected ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->CashCollected) == "") { ?>
		<th data-name="CashCollected" class="<?php echo $depositdetails_list->CashCollected->headerCellClass() ?>"><div id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected"><div class="ew-table-header-caption"><?php echo $depositdetails_list->CashCollected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CashCollected" class="<?php echo $depositdetails_list->CashCollected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->CashCollected) ?>', 1);"><div id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->CashCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->CashCollected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->CashCollected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->RTGS->Visible) { // RTGS ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $depositdetails_list->RTGS->headerCellClass() ?>"><div id="elh_depositdetails_RTGS" class="depositdetails_RTGS"><div class="ew-table-header-caption"><?php echo $depositdetails_list->RTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $depositdetails_list->RTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->RTGS) ?>', 1);"><div id="elh_depositdetails_RTGS" class="depositdetails_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->RTGS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->RTGS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($depositdetails_list->PAYTM->Visible) { // PAYTM ?>
	<?php if ($depositdetails_list->SortUrl($depositdetails_list->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $depositdetails_list->PAYTM->headerCellClass() ?>"><div id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM"><div class="ew-table-header-caption"><?php echo $depositdetails_list->PAYTM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $depositdetails_list->PAYTM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $depositdetails_list->SortUrl($depositdetails_list->PAYTM) ?>', 1);"><div id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $depositdetails_list->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($depositdetails_list->PAYTM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($depositdetails_list->PAYTM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($depositdetails_list->ExportAll && $depositdetails_list->isExport()) {
	$depositdetails_list->StopRecord = $depositdetails_list->TotalRecords;
} else {

	// Set the last record to display
	if ($depositdetails_list->TotalRecords > $depositdetails_list->StartRecord + $depositdetails_list->DisplayRecords - 1)
		$depositdetails_list->StopRecord = $depositdetails_list->StartRecord + $depositdetails_list->DisplayRecords - 1;
	else
		$depositdetails_list->StopRecord = $depositdetails_list->TotalRecords;
}
$depositdetails_list->RecordCount = $depositdetails_list->StartRecord - 1;
if ($depositdetails_list->Recordset && !$depositdetails_list->Recordset->EOF) {
	$depositdetails_list->Recordset->moveFirst();
	$selectLimit = $depositdetails_list->UseSelectLimit;
	if (!$selectLimit && $depositdetails_list->StartRecord > 1)
		$depositdetails_list->Recordset->move($depositdetails_list->StartRecord - 1);
} elseif (!$depositdetails->AllowAddDeleteRow && $depositdetails_list->StopRecord == 0) {
	$depositdetails_list->StopRecord = $depositdetails->GridAddRowCount;
}

// Initialize aggregate
$depositdetails->RowType = ROWTYPE_AGGREGATEINIT;
$depositdetails->resetAttributes();
$depositdetails_list->renderRow();
while ($depositdetails_list->RecordCount < $depositdetails_list->StopRecord) {
	$depositdetails_list->RecordCount++;
	if ($depositdetails_list->RecordCount >= $depositdetails_list->StartRecord) {
		$depositdetails_list->RowCount++;

		// Set up key count
		$depositdetails_list->KeyCount = $depositdetails_list->RowIndex;

		// Init row class and style
		$depositdetails->resetAttributes();
		$depositdetails->CssClass = "";
		if ($depositdetails_list->isGridAdd()) {
		} else {
			$depositdetails_list->loadRowValues($depositdetails_list->Recordset); // Load row values
		}
		$depositdetails->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$depositdetails->RowAttrs->merge(["data-rowindex" => $depositdetails_list->RowCount, "id" => "r" . $depositdetails_list->RowCount . "_depositdetails", "data-rowtype" => $depositdetails->RowType]);

		// Render row
		$depositdetails_list->renderRow();

		// Render list options
		$depositdetails_list->renderListOptions();
?>
	<tr <?php echo $depositdetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$depositdetails_list->ListOptions->render("body", "left", $depositdetails_list->RowCount);
?>
	<?php if ($depositdetails_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $depositdetails_list->id->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_id">
<span<?php echo $depositdetails_list->id->viewAttributes() ?>><?php echo $depositdetails_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate" <?php echo $depositdetails_list->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_DepositDate">
<span<?php echo $depositdetails_list->DepositDate->viewAttributes() ?>><?php echo $depositdetails_list->DepositDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo" <?php echo $depositdetails_list->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_TransferTo">
<span<?php echo $depositdetails_list->TransferTo->viewAttributes() ?>><?php echo $depositdetails_list->TransferTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance" <?php echo $depositdetails_list->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_OpeningBalance">
<span<?php echo $depositdetails_list->OpeningBalance->viewAttributes() ?>><?php echo $depositdetails_list->OpeningBalance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->Other->Visible) { // Other ?>
		<td data-name="Other" <?php echo $depositdetails_list->Other->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_Other">
<span<?php echo $depositdetails_list->Other->viewAttributes() ?>><?php echo $depositdetails_list->Other->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash" <?php echo $depositdetails_list->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_TotalCash">
<span<?php echo $depositdetails_list->TotalCash->viewAttributes() ?>><?php echo $depositdetails_list->TotalCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque" <?php echo $depositdetails_list->Cheque->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_Cheque">
<span<?php echo $depositdetails_list->Cheque->viewAttributes() ?>><?php echo $depositdetails_list->Cheque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->Card->Visible) { // Card ?>
		<td data-name="Card" <?php echo $depositdetails_list->Card->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_Card">
<span<?php echo $depositdetails_list->Card->viewAttributes() ?>><?php echo $depositdetails_list->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS" <?php echo $depositdetails_list->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_NEFTRTGS">
<span<?php echo $depositdetails_list->NEFTRTGS->viewAttributes() ?>><?php echo $depositdetails_list->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
		<td data-name="TotalTransferDepositAmount" <?php echo $depositdetails_list->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails_list->TotalTransferDepositAmount->viewAttributes() ?>><?php echo $depositdetails_list->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName" <?php echo $depositdetails_list->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_CreatedUserName">
<span<?php echo $depositdetails_list->CreatedUserName->viewAttributes() ?>><?php echo $depositdetails_list->CreatedUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->CashCollected->Visible) { // CashCollected ?>
		<td data-name="CashCollected" <?php echo $depositdetails_list->CashCollected->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_CashCollected">
<span<?php echo $depositdetails_list->CashCollected->viewAttributes() ?>><?php echo $depositdetails_list->CashCollected->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" <?php echo $depositdetails_list->RTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_RTGS">
<span<?php echo $depositdetails_list->RTGS->viewAttributes() ?>><?php echo $depositdetails_list->RTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($depositdetails_list->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" <?php echo $depositdetails_list->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_list->RowCount ?>_depositdetails_PAYTM">
<span<?php echo $depositdetails_list->PAYTM->viewAttributes() ?>><?php echo $depositdetails_list->PAYTM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$depositdetails_list->ListOptions->render("body", "right", $depositdetails_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$depositdetails_list->isGridAdd())
		$depositdetails_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$depositdetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($depositdetails_list->Recordset)
	$depositdetails_list->Recordset->Close();
?>
<?php if (!$depositdetails_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$depositdetails_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $depositdetails_list->Pager->render() ?>
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
<?php if ($depositdetails_list->TotalRecords == 0 && !$depositdetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $depositdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$depositdetails_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$depositdetails_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$depositdetails->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_depositdetails",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$depositdetails_list->terminate();
?>