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
$pharmacy_grn_list = new pharmacy_grn_list();

// Run the page
$pharmacy_grn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_grn_list->isExport()) { ?>
<script>
var fpharmacy_grnlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_grnlist = currentForm = new ew.Form("fpharmacy_grnlist", "list");
	fpharmacy_grnlist.formKeyCountName = '<?php echo $pharmacy_grn_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_grnlist");
});
var fpharmacy_grnlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_grnlistsrch = currentSearchForm = new ew.Form("fpharmacy_grnlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_grnlistsrch.filterList = <?php echo $pharmacy_grn_list->getFilterList() ?>;
	loadjs.done("fpharmacy_grnlistsrch");
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
<?php if (!$pharmacy_grn_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_grn_list->TotalRecords > 0 && $pharmacy_grn_list->ExportOptions->visible()) { ?>
<?php $pharmacy_grn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_grn_list->ImportOptions->visible()) { ?>
<?php $pharmacy_grn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_grn_list->SearchOptions->visible()) { ?>
<?php $pharmacy_grn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_grn_list->FilterOptions->visible()) { ?>
<?php $pharmacy_grn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_grn_list->isExport() || Config("EXPORT_MASTER_RECORD") && $pharmacy_grn_list->isExport("print")) { ?>
<?php
if ($pharmacy_grn_list->DbMasterFilter != "" && $pharmacy_grn->getCurrentMasterTable() == "pharmacy_payment") {
	if ($pharmacy_grn_list->MasterRecordExists) {
		include_once "pharmacy_paymentmaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_grn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_grn_list->isExport() && !$pharmacy_grn->CurrentAction) { ?>
<form name="fpharmacy_grnlistsrch" id="fpharmacy_grnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_grnlistsrch-search-panel" class="<?php echo $pharmacy_grn_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_grn">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_grn_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_grn_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_grn_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_grn_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_grn_list->showPageHeader(); ?>
<?php
$pharmacy_grn_list->showMessage();
?>
<?php if ($pharmacy_grn_list->TotalRecords > 0 || $pharmacy_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_grn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_grn">
<?php if (!$pharmacy_grn_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_grn_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_grn_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_grnlist" id="fpharmacy_grnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<?php if ($pharmacy_grn->getCurrentMasterTable() == "pharmacy_payment" && $pharmacy_grn->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_payment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_grn_list->Pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_grn" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_grn_list->TotalRecords > 0 || $pharmacy_grn_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_grnlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_grn->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_grn_list->renderListOptions();

// Render list options (header, left)
$pharmacy_grn_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_grn_list->id->Visible) { // id ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn_list->id->headerCellClass() ?>"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->id) ?>', 1);"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->GRNNO->Visible) { // GRNNO ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn_list->GRNNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn_list->GRNNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->GRNNO) ?>', 1);"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->GRNNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->GRNNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->GRNNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->DT->Visible) { // DT ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn_list->DT->headerCellClass() ?>"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->DT) ?>', 1);"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn_list->Customername->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn_list->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->Customername) ?>', 1);"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->Customername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->Customername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->State->Visible) { // State ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn_list->State->headerCellClass() ?>"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->State) ?>', 1);"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn_list->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn_list->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->Pincode) ?>', 1);"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn_list->Phone->headerCellClass() ?>"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn_list->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->Phone) ?>', 1);"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->BILLNO->Visible) { // BILLNO ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn_list->BILLNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn_list->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->BILLNO) ?>', 1);"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->BILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->BILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->BILLDT->Visible) { // BILLDT ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn_list->BILLDT->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn_list->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->BILLDT) ?>', 1);"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->BILLDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->BILLDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn_list->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn_list->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->BillTotalValue) ?>', 1);"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->BillTotalValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->BillTotalValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn_list->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn_list->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->GRNTotalValue) ?>', 1);"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->GRNTotalValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->GRNTotalValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn_list->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn_list->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->BillDiscount) ?>', 1);"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->BillDiscount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->BillDiscount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->GrnValue->Visible) { // GrnValue ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->GrnValue) == "") { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn_list->GrnValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->GrnValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn_list->GrnValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->GrnValue) ?>', 1);"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->GrnValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->GrnValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->Pid->Visible) { // Pid ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn_list->Pid->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn_list->Pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->Pid) ?>', 1);"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->Pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->Pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn_list->PaymentNo->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn_list->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->PaymentNo) ?>', 1);"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->PaymentNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->PaymentNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->PaymentNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn_list->PaymentStatus->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn_list->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->PaymentStatus) ?>', 1);"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->PaymentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn_list->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_grn_list->SortUrl($pharmacy_grn_list->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn_list->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn_list->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn_list->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_grn_list->SortUrl($pharmacy_grn_list->PaidAmount) ?>', 1);"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn_list->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn_list->PaidAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_grn_list->PaidAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_grn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_grn_list->ExportAll && $pharmacy_grn_list->isExport()) {
	$pharmacy_grn_list->StopRecord = $pharmacy_grn_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_grn_list->TotalRecords > $pharmacy_grn_list->StartRecord + $pharmacy_grn_list->DisplayRecords - 1)
		$pharmacy_grn_list->StopRecord = $pharmacy_grn_list->StartRecord + $pharmacy_grn_list->DisplayRecords - 1;
	else
		$pharmacy_grn_list->StopRecord = $pharmacy_grn_list->TotalRecords;
}
$pharmacy_grn_list->RecordCount = $pharmacy_grn_list->StartRecord - 1;
if ($pharmacy_grn_list->Recordset && !$pharmacy_grn_list->Recordset->EOF) {
	$pharmacy_grn_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_grn_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_grn_list->StartRecord > 1)
		$pharmacy_grn_list->Recordset->move($pharmacy_grn_list->StartRecord - 1);
} elseif (!$pharmacy_grn->AllowAddDeleteRow && $pharmacy_grn_list->StopRecord == 0) {
	$pharmacy_grn_list->StopRecord = $pharmacy_grn->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_grn->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_list->renderRow();
while ($pharmacy_grn_list->RecordCount < $pharmacy_grn_list->StopRecord) {
	$pharmacy_grn_list->RecordCount++;
	if ($pharmacy_grn_list->RecordCount >= $pharmacy_grn_list->StartRecord) {
		$pharmacy_grn_list->RowCount++;

		// Set up key count
		$pharmacy_grn_list->KeyCount = $pharmacy_grn_list->RowIndex;

		// Init row class and style
		$pharmacy_grn->resetAttributes();
		$pharmacy_grn->CssClass = "";
		if ($pharmacy_grn_list->isGridAdd()) {
		} else {
			$pharmacy_grn_list->loadRowValues($pharmacy_grn_list->Recordset); // Load row values
		}
		$pharmacy_grn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_grn->RowAttrs->merge(["data-rowindex" => $pharmacy_grn_list->RowCount, "id" => "r" . $pharmacy_grn_list->RowCount . "_pharmacy_grn", "data-rowtype" => $pharmacy_grn->RowType]);

		// Render row
		$pharmacy_grn_list->renderRow();

		// Render list options
		$pharmacy_grn_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_list->ListOptions->render("body", "left", $pharmacy_grn_list->RowCount);
?>
	<?php if ($pharmacy_grn_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_grn_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_id">
<span<?php echo $pharmacy_grn_list->id->viewAttributes() ?>><?php echo $pharmacy_grn_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" <?php echo $pharmacy_grn_list->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn_list->GRNNO->viewAttributes() ?>><?php echo $pharmacy_grn_list->GRNNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $pharmacy_grn_list->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_DT">
<span<?php echo $pharmacy_grn_list->DT->viewAttributes() ?>><?php echo $pharmacy_grn_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Customername->Visible) { // Customername ?>
		<td data-name="Customername" <?php echo $pharmacy_grn_list->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn_list->Customername->viewAttributes() ?>><?php echo $pharmacy_grn_list->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $pharmacy_grn_list->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_State">
<span<?php echo $pharmacy_grn_list->State->viewAttributes() ?>><?php echo $pharmacy_grn_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" <?php echo $pharmacy_grn_list->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn_list->Pincode->viewAttributes() ?>><?php echo $pharmacy_grn_list->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Phone->Visible) { // Phone ?>
		<td data-name="Phone" <?php echo $pharmacy_grn_list->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn_list->Phone->viewAttributes() ?>><?php echo $pharmacy_grn_list->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" <?php echo $pharmacy_grn_list->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn_list->BILLNO->viewAttributes() ?>><?php echo $pharmacy_grn_list->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" <?php echo $pharmacy_grn_list->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn_list->BILLDT->viewAttributes() ?>><?php echo $pharmacy_grn_list->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" <?php echo $pharmacy_grn_list->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn_list->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_list->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" <?php echo $pharmacy_grn_list->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn_list->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_list->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" <?php echo $pharmacy_grn_list->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn_list->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_grn_list->BillDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" <?php echo $pharmacy_grn_list->GrnValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn_list->GrnValue->viewAttributes() ?>><?php echo $pharmacy_grn_list->GrnValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pid->Visible) { // Pid ?>
		<td data-name="Pid" <?php echo $pharmacy_grn_list->Pid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_list->Pid->viewAttributes() ?>><?php echo $pharmacy_grn_list->Pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" <?php echo $pharmacy_grn_list->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn_list->PaymentNo->viewAttributes() ?>><?php echo $pharmacy_grn_list->PaymentNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $pharmacy_grn_list->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn_list->PaymentStatus->viewAttributes() ?>><?php echo $pharmacy_grn_list->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" <?php echo $pharmacy_grn_list->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCount ?>_pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn_list->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_grn_list->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_list->ListOptions->render("body", "right", $pharmacy_grn_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_grn_list->isGridAdd())
		$pharmacy_grn_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$pharmacy_grn->RowType = ROWTYPE_AGGREGATE;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_list->renderRow();
?>
<?php if ($pharmacy_grn_list->TotalRecords > 0 && !$pharmacy_grn_list->isGridAdd() && !$pharmacy_grn_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$pharmacy_grn_list->renderListOptions();

// Render list options (footer, left)
$pharmacy_grn_list->ListOptions->render("footer", "left");
?>
	<?php if ($pharmacy_grn_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $pharmacy_grn_list->id->footerCellClass() ?>"><span id="elf_pharmacy_grn_id" class="pharmacy_grn_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" class="<?php echo $pharmacy_grn_list->GRNNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $pharmacy_grn_list->DT->footerCellClass() ?>"><span id="elf_pharmacy_grn_DT" class="pharmacy_grn_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $pharmacy_grn_list->Customername->footerCellClass() ?>"><span id="elf_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $pharmacy_grn_list->State->footerCellClass() ?>"><span id="elf_pharmacy_grn_State" class="pharmacy_grn_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $pharmacy_grn_list->Pincode->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $pharmacy_grn_list->Phone->footerCellClass() ?>"><span id="elf_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $pharmacy_grn_list->BILLNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" class="<?php echo $pharmacy_grn_list->BILLDT->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $pharmacy_grn_list->BillTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_list->BillTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $pharmacy_grn_list->GRNTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_list->GRNTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $pharmacy_grn_list->BillDiscount->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn_list->BillDiscount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" class="<?php echo $pharmacy_grn_list->GrnValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pid->Visible) { // Pid ?>
		<td data-name="Pid" class="<?php echo $pharmacy_grn_list->Pid->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" class="<?php echo $pharmacy_grn_list->PaymentNo->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" class="<?php echo $pharmacy_grn_list->PaymentStatus->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn_list->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $pharmacy_grn_list->PaidAmount->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$pharmacy_grn_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_grn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_grn_list->Recordset)
	$pharmacy_grn_list->Recordset->Close();
?>
<?php if (!$pharmacy_grn_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_grn_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_grn_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_grn_list->TotalRecords == 0 && !$pharmacy_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_grn_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_grn_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 35em;
	}
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: nowrap;
		align-items: stretch;
		width: 100%;
	}
	.ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
		border: 0;
		padding: 0;
		margin-bottom: 0;
		overflow-x: scroll;
	}
	</style>
	<script>
	$("[data-name='Quantity']").hide();
	$("[data-name='BillDate']").hide();
});
</script>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_grn",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_grn_list->terminate();
?>