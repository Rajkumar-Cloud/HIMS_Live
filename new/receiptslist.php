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
<?php include_once "header.php"; ?>
<?php if (!$receipts_list->isExport()) { ?>
<script>
var freceiptslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	freceiptslist = currentForm = new ew.Form("freceiptslist", "list");
	freceiptslist.formKeyCountName = '<?php echo $receipts_list->FormKeyCountName ?>';
	loadjs.done("freceiptslist");
});
var freceiptslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	freceiptslistsrch = currentSearchForm = new ew.Form("freceiptslistsrch");

	// Dynamic selection lists
	// Filters

	freceiptslistsrch.filterList = <?php echo $receipts_list->getFilterList() ?>;
	loadjs.done("freceiptslistsrch");
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
<?php if (!$receipts_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($receipts_list->TotalRecords > 0 && $receipts_list->ExportOptions->visible()) { ?>
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
<?php if (!$receipts_list->isExport() && !$receipts->CurrentAction) { ?>
<form name="freceiptslistsrch" id="freceiptslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="freceiptslistsrch-search-panel" class="<?php echo $receipts_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="receipts">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $receipts_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($receipts_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($receipts_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $receipts_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($receipts_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $receipts_list->showPageHeader(); ?>
<?php
$receipts_list->showMessage();
?>
<?php if ($receipts_list->TotalRecords > 0 || $receipts->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($receipts_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> receipts">
<?php if (!$receipts_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$receipts_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $receipts_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $receipts_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="freceiptslist" id="freceiptslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<div id="gmp_receipts" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($receipts_list->TotalRecords > 0 || $receipts_list->isGridEdit()) { ?>
<table id="tbl_receiptslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$receipts->RowType = ROWTYPE_HEADER;

// Render list options
$receipts_list->renderListOptions();

// Render list options (header, left)
$receipts_list->ListOptions->render("header", "left");
?>
<?php if ($receipts_list->id->Visible) { // id ?>
	<?php if ($receipts_list->SortUrl($receipts_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $receipts_list->id->headerCellClass() ?>"><div id="elh_receipts_id" class="receipts_id"><div class="ew-table-header-caption"><?php echo $receipts_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $receipts_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->id) ?>', 1);"><div id="elh_receipts_id" class="receipts_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->Reception->Visible) { // Reception ?>
	<?php if ($receipts_list->SortUrl($receipts_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $receipts_list->Reception->headerCellClass() ?>"><div id="elh_receipts_Reception" class="receipts_Reception"><div class="ew-table-header-caption"><?php echo $receipts_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $receipts_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->Reception) ?>', 1);"><div id="elh_receipts_Reception" class="receipts_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->Aid->Visible) { // Aid ?>
	<?php if ($receipts_list->SortUrl($receipts_list->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $receipts_list->Aid->headerCellClass() ?>"><div id="elh_receipts_Aid" class="receipts_Aid"><div class="ew-table-header-caption"><?php echo $receipts_list->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $receipts_list->Aid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->Aid) ?>', 1);"><div id="elh_receipts_Aid" class="receipts_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->Aid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->Aid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->Vid->Visible) { // Vid ?>
	<?php if ($receipts_list->SortUrl($receipts_list->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $receipts_list->Vid->headerCellClass() ?>"><div id="elh_receipts_Vid" class="receipts_Vid"><div class="ew-table-header-caption"><?php echo $receipts_list->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $receipts_list->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->Vid) ?>', 1);"><div id="elh_receipts_Vid" class="receipts_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->patient_id->Visible) { // patient_id ?>
	<?php if ($receipts_list->SortUrl($receipts_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $receipts_list->patient_id->headerCellClass() ?>"><div id="elh_receipts_patient_id" class="receipts_patient_id"><div class="ew-table-header-caption"><?php echo $receipts_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $receipts_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->patient_id) ?>', 1);"><div id="elh_receipts_patient_id" class="receipts_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->mrnno->Visible) { // mrnno ?>
	<?php if ($receipts_list->SortUrl($receipts_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $receipts_list->mrnno->headerCellClass() ?>"><div id="elh_receipts_mrnno" class="receipts_mrnno"><div class="ew-table-header-caption"><?php echo $receipts_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $receipts_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->mrnno) ?>', 1);"><div id="elh_receipts_mrnno" class="receipts_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->PatientName->Visible) { // PatientName ?>
	<?php if ($receipts_list->SortUrl($receipts_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $receipts_list->PatientName->headerCellClass() ?>"><div id="elh_receipts_PatientName" class="receipts_PatientName"><div class="ew-table-header-caption"><?php echo $receipts_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $receipts_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->PatientName) ?>', 1);"><div id="elh_receipts_PatientName" class="receipts_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->amount->Visible) { // amount ?>
	<?php if ($receipts_list->SortUrl($receipts_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $receipts_list->amount->headerCellClass() ?>"><div id="elh_receipts_amount" class="receipts_amount"><div class="ew-table-header-caption"><?php echo $receipts_list->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $receipts_list->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->amount) ?>', 1);"><div id="elh_receipts_amount" class="receipts_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->Discount->Visible) { // Discount ?>
	<?php if ($receipts_list->SortUrl($receipts_list->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $receipts_list->Discount->headerCellClass() ?>"><div id="elh_receipts_Discount" class="receipts_Discount"><div class="ew-table-header-caption"><?php echo $receipts_list->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $receipts_list->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->Discount) ?>', 1);"><div id="elh_receipts_Discount" class="receipts_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->SubTotal->Visible) { // SubTotal ?>
	<?php if ($receipts_list->SortUrl($receipts_list->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $receipts_list->SubTotal->headerCellClass() ?>"><div id="elh_receipts_SubTotal" class="receipts_SubTotal"><div class="ew-table-header-caption"><?php echo $receipts_list->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $receipts_list->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->SubTotal) ?>', 1);"><div id="elh_receipts_SubTotal" class="receipts_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->patient_type->Visible) { // patient_type ?>
	<?php if ($receipts_list->SortUrl($receipts_list->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $receipts_list->patient_type->headerCellClass() ?>"><div id="elh_receipts_patient_type" class="receipts_patient_type"><div class="ew-table-header-caption"><?php echo $receipts_list->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $receipts_list->patient_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->patient_type) ?>', 1);"><div id="elh_receipts_patient_type" class="receipts_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->patient_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->patient_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->invoiceId->Visible) { // invoiceId ?>
	<?php if ($receipts_list->SortUrl($receipts_list->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $receipts_list->invoiceId->headerCellClass() ?>"><div id="elh_receipts_invoiceId" class="receipts_invoiceId"><div class="ew-table-header-caption"><?php echo $receipts_list->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $receipts_list->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->invoiceId) ?>', 1);"><div id="elh_receipts_invoiceId" class="receipts_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($receipts_list->SortUrl($receipts_list->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $receipts_list->invoiceAmount->headerCellClass() ?>"><div id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount"><div class="ew-table-header-caption"><?php echo $receipts_list->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $receipts_list->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->invoiceAmount) ?>', 1);"><div id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->invoiceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->invoiceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($receipts_list->SortUrl($receipts_list->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $receipts_list->invoiceStatus->headerCellClass() ?>"><div id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus"><div class="ew-table-header-caption"><?php echo $receipts_list->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $receipts_list->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->invoiceStatus) ?>', 1);"><div id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->invoiceStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->invoiceStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($receipts_list->SortUrl($receipts_list->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $receipts_list->modeOfPayment->headerCellClass() ?>"><div id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment"><div class="ew-table-header-caption"><?php echo $receipts_list->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $receipts_list->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->modeOfPayment) ?>', 1);"><div id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->modeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->modeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->charged_date->Visible) { // charged_date ?>
	<?php if ($receipts_list->SortUrl($receipts_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $receipts_list->charged_date->headerCellClass() ?>"><div id="elh_receipts_charged_date" class="receipts_charged_date"><div class="ew-table-header-caption"><?php echo $receipts_list->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $receipts_list->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->charged_date) ?>', 1);"><div id="elh_receipts_charged_date" class="receipts_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->status->Visible) { // status ?>
	<?php if ($receipts_list->SortUrl($receipts_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $receipts_list->status->headerCellClass() ?>"><div id="elh_receipts_status" class="receipts_status"><div class="ew-table-header-caption"><?php echo $receipts_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $receipts_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->status) ?>', 1);"><div id="elh_receipts_status" class="receipts_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->createdby->Visible) { // createdby ?>
	<?php if ($receipts_list->SortUrl($receipts_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $receipts_list->createdby->headerCellClass() ?>"><div id="elh_receipts_createdby" class="receipts_createdby"><div class="ew-table-header-caption"><?php echo $receipts_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $receipts_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->createdby) ?>', 1);"><div id="elh_receipts_createdby" class="receipts_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($receipts_list->SortUrl($receipts_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $receipts_list->createddatetime->headerCellClass() ?>"><div id="elh_receipts_createddatetime" class="receipts_createddatetime"><div class="ew-table-header-caption"><?php echo $receipts_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $receipts_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->createddatetime) ?>', 1);"><div id="elh_receipts_createddatetime" class="receipts_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($receipts_list->SortUrl($receipts_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $receipts_list->modifiedby->headerCellClass() ?>"><div id="elh_receipts_modifiedby" class="receipts_modifiedby"><div class="ew-table-header-caption"><?php echo $receipts_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $receipts_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->modifiedby) ?>', 1);"><div id="elh_receipts_modifiedby" class="receipts_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($receipts_list->SortUrl($receipts_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $receipts_list->modifieddatetime->headerCellClass() ?>"><div id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime"><div class="ew-table-header-caption"><?php echo $receipts_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $receipts_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->modifieddatetime) ?>', 1);"><div id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<?php if ($receipts_list->SortUrl($receipts_list->ChequeCardNo) == "") { ?>
		<th data-name="ChequeCardNo" class="<?php echo $receipts_list->ChequeCardNo->headerCellClass() ?>"><div id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo"><div class="ew-table-header-caption"><?php echo $receipts_list->ChequeCardNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChequeCardNo" class="<?php echo $receipts_list->ChequeCardNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->ChequeCardNo) ?>', 1);"><div id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->ChequeCardNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->ChequeCardNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->ChequeCardNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditBankName->Visible) { // CreditBankName ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditBankName) == "") { ?>
		<th data-name="CreditBankName" class="<?php echo $receipts_list->CreditBankName->headerCellClass() ?>"><div id="elh_receipts_CreditBankName" class="receipts_CreditBankName"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditBankName" class="<?php echo $receipts_list->CreditBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditBankName) ?>', 1);"><div id="elh_receipts_CreditBankName" class="receipts_CreditBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditBankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditBankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditCardHolder) == "") { ?>
		<th data-name="CreditCardHolder" class="<?php echo $receipts_list->CreditCardHolder->headerCellClass() ?>"><div id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditCardHolder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardHolder" class="<?php echo $receipts_list->CreditCardHolder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditCardHolder) ?>', 1);"><div id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditCardHolder->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditCardHolder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditCardHolder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditCardType->Visible) { // CreditCardType ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditCardType) == "") { ?>
		<th data-name="CreditCardType" class="<?php echo $receipts_list->CreditCardType->headerCellClass() ?>"><div id="elh_receipts_CreditCardType" class="receipts_CreditCardType"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditCardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardType" class="<?php echo $receipts_list->CreditCardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditCardType) ?>', 1);"><div id="elh_receipts_CreditCardType" class="receipts_CreditCardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditCardType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditCardType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditCardType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditCardMachine) == "") { ?>
		<th data-name="CreditCardMachine" class="<?php echo $receipts_list->CreditCardMachine->headerCellClass() ?>"><div id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditCardMachine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardMachine" class="<?php echo $receipts_list->CreditCardMachine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditCardMachine) ?>', 1);"><div id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditCardMachine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditCardMachine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditCardMachine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditCardBatchNo) == "") { ?>
		<th data-name="CreditCardBatchNo" class="<?php echo $receipts_list->CreditCardBatchNo->headerCellClass() ?>"><div id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditCardBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardBatchNo" class="<?php echo $receipts_list->CreditCardBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditCardBatchNo) ?>', 1);"><div id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditCardBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditCardBatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditCardBatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditCardTax->Visible) { // CreditCardTax ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditCardTax) == "") { ?>
		<th data-name="CreditCardTax" class="<?php echo $receipts_list->CreditCardTax->headerCellClass() ?>"><div id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditCardTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditCardTax" class="<?php echo $receipts_list->CreditCardTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditCardTax) ?>', 1);"><div id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditCardTax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditCardTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditCardTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<?php if ($receipts_list->SortUrl($receipts_list->CreditDeductionAmount) == "") { ?>
		<th data-name="CreditDeductionAmount" class="<?php echo $receipts_list->CreditDeductionAmount->headerCellClass() ?>"><div id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount"><div class="ew-table-header-caption"><?php echo $receipts_list->CreditDeductionAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreditDeductionAmount" class="<?php echo $receipts_list->CreditDeductionAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->CreditDeductionAmount) ?>', 1);"><div id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->CreditDeductionAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->CreditDeductionAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->CreditDeductionAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($receipts_list->SortUrl($receipts_list->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $receipts_list->RealizationAmount->headerCellClass() ?>"><div id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount"><div class="ew-table-header-caption"><?php echo $receipts_list->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $receipts_list->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->RealizationAmount) ?>', 1);"><div id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->RealizationAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->RealizationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->RealizationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($receipts_list->SortUrl($receipts_list->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $receipts_list->RealizationStatus->headerCellClass() ?>"><div id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus"><div class="ew-table-header-caption"><?php echo $receipts_list->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $receipts_list->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->RealizationStatus) ?>', 1);"><div id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->RealizationStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->RealizationStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($receipts_list->SortUrl($receipts_list->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $receipts_list->RealizationRemarks->headerCellClass() ?>"><div id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $receipts_list->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $receipts_list->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->RealizationRemarks) ?>', 1);"><div id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->RealizationRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->RealizationRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($receipts_list->SortUrl($receipts_list->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $receipts_list->RealizationBatchNo->headerCellClass() ?>"><div id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $receipts_list->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $receipts_list->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->RealizationBatchNo) ?>', 1);"><div id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->RealizationBatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->RealizationBatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($receipts_list->SortUrl($receipts_list->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $receipts_list->RealizationDate->headerCellClass() ?>"><div id="elh_receipts_RealizationDate" class="receipts_RealizationDate"><div class="ew-table-header-caption"><?php echo $receipts_list->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $receipts_list->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->RealizationDate) ?>', 1);"><div id="elh_receipts_RealizationDate" class="receipts_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->RealizationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->RealizationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($receipts_list->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<?php if ($receipts_list->SortUrl($receipts_list->BankAccHolderMobileNumber) == "") { ?>
		<th data-name="BankAccHolderMobileNumber" class="<?php echo $receipts_list->BankAccHolderMobileNumber->headerCellClass() ?>"><div id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber"><div class="ew-table-header-caption"><?php echo $receipts_list->BankAccHolderMobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankAccHolderMobileNumber" class="<?php echo $receipts_list->BankAccHolderMobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $receipts_list->SortUrl($receipts_list->BankAccHolderMobileNumber) ?>', 1);"><div id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $receipts_list->BankAccHolderMobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($receipts_list->BankAccHolderMobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($receipts_list->BankAccHolderMobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($receipts_list->ExportAll && $receipts_list->isExport()) {
	$receipts_list->StopRecord = $receipts_list->TotalRecords;
} else {

	// Set the last record to display
	if ($receipts_list->TotalRecords > $receipts_list->StartRecord + $receipts_list->DisplayRecords - 1)
		$receipts_list->StopRecord = $receipts_list->StartRecord + $receipts_list->DisplayRecords - 1;
	else
		$receipts_list->StopRecord = $receipts_list->TotalRecords;
}
$receipts_list->RecordCount = $receipts_list->StartRecord - 1;
if ($receipts_list->Recordset && !$receipts_list->Recordset->EOF) {
	$receipts_list->Recordset->moveFirst();
	$selectLimit = $receipts_list->UseSelectLimit;
	if (!$selectLimit && $receipts_list->StartRecord > 1)
		$receipts_list->Recordset->move($receipts_list->StartRecord - 1);
} elseif (!$receipts->AllowAddDeleteRow && $receipts_list->StopRecord == 0) {
	$receipts_list->StopRecord = $receipts->GridAddRowCount;
}

// Initialize aggregate
$receipts->RowType = ROWTYPE_AGGREGATEINIT;
$receipts->resetAttributes();
$receipts_list->renderRow();
while ($receipts_list->RecordCount < $receipts_list->StopRecord) {
	$receipts_list->RecordCount++;
	if ($receipts_list->RecordCount >= $receipts_list->StartRecord) {
		$receipts_list->RowCount++;

		// Set up key count
		$receipts_list->KeyCount = $receipts_list->RowIndex;

		// Init row class and style
		$receipts->resetAttributes();
		$receipts->CssClass = "";
		if ($receipts_list->isGridAdd()) {
		} else {
			$receipts_list->loadRowValues($receipts_list->Recordset); // Load row values
		}
		$receipts->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$receipts->RowAttrs->merge(["data-rowindex" => $receipts_list->RowCount, "id" => "r" . $receipts_list->RowCount . "_receipts", "data-rowtype" => $receipts->RowType]);

		// Render row
		$receipts_list->renderRow();

		// Render list options
		$receipts_list->renderListOptions();
?>
	<tr <?php echo $receipts->rowAttributes() ?>>
<?php

// Render list options (body, left)
$receipts_list->ListOptions->render("body", "left", $receipts_list->RowCount);
?>
	<?php if ($receipts_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $receipts_list->id->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_id">
<span<?php echo $receipts_list->id->viewAttributes() ?>><?php echo $receipts_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $receipts_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_Reception">
<span<?php echo $receipts_list->Reception->viewAttributes() ?>><?php echo $receipts_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid" <?php echo $receipts_list->Aid->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_Aid">
<span<?php echo $receipts_list->Aid->viewAttributes() ?>><?php echo $receipts_list->Aid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $receipts_list->Vid->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_Vid">
<span<?php echo $receipts_list->Vid->viewAttributes() ?>><?php echo $receipts_list->Vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $receipts_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_patient_id">
<span<?php echo $receipts_list->patient_id->viewAttributes() ?>><?php echo $receipts_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $receipts_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_mrnno">
<span<?php echo $receipts_list->mrnno->viewAttributes() ?>><?php echo $receipts_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $receipts_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_PatientName">
<span<?php echo $receipts_list->PatientName->viewAttributes() ?>><?php echo $receipts_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $receipts_list->amount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_amount">
<span<?php echo $receipts_list->amount->viewAttributes() ?>><?php echo $receipts_list->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $receipts_list->Discount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_Discount">
<span<?php echo $receipts_list->Discount->viewAttributes() ?>><?php echo $receipts_list->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $receipts_list->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_SubTotal">
<span<?php echo $receipts_list->SubTotal->viewAttributes() ?>><?php echo $receipts_list->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" <?php echo $receipts_list->patient_type->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_patient_type">
<span<?php echo $receipts_list->patient_type->viewAttributes() ?>><?php echo $receipts_list->patient_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $receipts_list->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_invoiceId">
<span<?php echo $receipts_list->invoiceId->viewAttributes() ?>><?php echo $receipts_list->invoiceId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" <?php echo $receipts_list->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_invoiceAmount">
<span<?php echo $receipts_list->invoiceAmount->viewAttributes() ?>><?php echo $receipts_list->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" <?php echo $receipts_list->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_invoiceStatus">
<span<?php echo $receipts_list->invoiceStatus->viewAttributes() ?>><?php echo $receipts_list->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" <?php echo $receipts_list->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_modeOfPayment">
<span<?php echo $receipts_list->modeOfPayment->viewAttributes() ?>><?php echo $receipts_list->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $receipts_list->charged_date->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_charged_date">
<span<?php echo $receipts_list->charged_date->viewAttributes() ?>><?php echo $receipts_list->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $receipts_list->status->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_status">
<span<?php echo $receipts_list->status->viewAttributes() ?>><?php echo $receipts_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $receipts_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_createdby">
<span<?php echo $receipts_list->createdby->viewAttributes() ?>><?php echo $receipts_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $receipts_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_createddatetime">
<span<?php echo $receipts_list->createddatetime->viewAttributes() ?>><?php echo $receipts_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $receipts_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_modifiedby">
<span<?php echo $receipts_list->modifiedby->viewAttributes() ?>><?php echo $receipts_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $receipts_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_modifieddatetime">
<span<?php echo $receipts_list->modifieddatetime->viewAttributes() ?>><?php echo $receipts_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->ChequeCardNo->Visible) { // ChequeCardNo ?>
		<td data-name="ChequeCardNo" <?php echo $receipts_list->ChequeCardNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_ChequeCardNo">
<span<?php echo $receipts_list->ChequeCardNo->viewAttributes() ?>><?php echo $receipts_list->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditBankName->Visible) { // CreditBankName ?>
		<td data-name="CreditBankName" <?php echo $receipts_list->CreditBankName->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditBankName">
<span<?php echo $receipts_list->CreditBankName->viewAttributes() ?>><?php echo $receipts_list->CreditBankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditCardHolder->Visible) { // CreditCardHolder ?>
		<td data-name="CreditCardHolder" <?php echo $receipts_list->CreditCardHolder->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditCardHolder">
<span<?php echo $receipts_list->CreditCardHolder->viewAttributes() ?>><?php echo $receipts_list->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditCardType->Visible) { // CreditCardType ?>
		<td data-name="CreditCardType" <?php echo $receipts_list->CreditCardType->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditCardType">
<span<?php echo $receipts_list->CreditCardType->viewAttributes() ?>><?php echo $receipts_list->CreditCardType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditCardMachine->Visible) { // CreditCardMachine ?>
		<td data-name="CreditCardMachine" <?php echo $receipts_list->CreditCardMachine->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditCardMachine">
<span<?php echo $receipts_list->CreditCardMachine->viewAttributes() ?>><?php echo $receipts_list->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
		<td data-name="CreditCardBatchNo" <?php echo $receipts_list->CreditCardBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditCardBatchNo">
<span<?php echo $receipts_list->CreditCardBatchNo->viewAttributes() ?>><?php echo $receipts_list->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditCardTax->Visible) { // CreditCardTax ?>
		<td data-name="CreditCardTax" <?php echo $receipts_list->CreditCardTax->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditCardTax">
<span<?php echo $receipts_list->CreditCardTax->viewAttributes() ?>><?php echo $receipts_list->CreditCardTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
		<td data-name="CreditDeductionAmount" <?php echo $receipts_list->CreditDeductionAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_CreditDeductionAmount">
<span<?php echo $receipts_list->CreditDeductionAmount->viewAttributes() ?>><?php echo $receipts_list->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount" <?php echo $receipts_list->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_RealizationAmount">
<span<?php echo $receipts_list->RealizationAmount->viewAttributes() ?>><?php echo $receipts_list->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus" <?php echo $receipts_list->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_RealizationStatus">
<span<?php echo $receipts_list->RealizationStatus->viewAttributes() ?>><?php echo $receipts_list->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks" <?php echo $receipts_list->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_RealizationRemarks">
<span<?php echo $receipts_list->RealizationRemarks->viewAttributes() ?>><?php echo $receipts_list->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo" <?php echo $receipts_list->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_RealizationBatchNo">
<span<?php echo $receipts_list->RealizationBatchNo->viewAttributes() ?>><?php echo $receipts_list->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate" <?php echo $receipts_list->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_RealizationDate">
<span<?php echo $receipts_list->RealizationDate->viewAttributes() ?>><?php echo $receipts_list->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($receipts_list->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
		<td data-name="BankAccHolderMobileNumber" <?php echo $receipts_list->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $receipts_list->RowCount ?>_receipts_BankAccHolderMobileNumber">
<span<?php echo $receipts_list->BankAccHolderMobileNumber->viewAttributes() ?>><?php echo $receipts_list->BankAccHolderMobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$receipts_list->ListOptions->render("body", "right", $receipts_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$receipts_list->isGridAdd())
		$receipts_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$receipts->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($receipts_list->Recordset)
	$receipts_list->Recordset->Close();
?>
<?php if (!$receipts_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$receipts_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $receipts_list->Pager->render() ?>
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
<?php if ($receipts_list->TotalRecords == 0 && !$receipts->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $receipts_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$receipts_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$receipts_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$receipts->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_receipts",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$receipts_list->terminate();
?>