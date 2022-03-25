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
$pharmacy_payment_list = new pharmacy_payment_list();

// Run the page
$pharmacy_payment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_payment_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_payment_list->isExport()) { ?>
<script>
var fpharmacy_paymentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_paymentlist = currentForm = new ew.Form("fpharmacy_paymentlist", "list");
	fpharmacy_paymentlist.formKeyCountName = '<?php echo $pharmacy_payment_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_paymentlist");
});
var fpharmacy_paymentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_paymentlistsrch = currentSearchForm = new ew.Form("fpharmacy_paymentlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_paymentlistsrch.filterList = <?php echo $pharmacy_payment_list->getFilterList() ?>;
	loadjs.done("fpharmacy_paymentlistsrch");
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
<?php if (!$pharmacy_payment_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_payment_list->TotalRecords > 0 && $pharmacy_payment_list->ExportOptions->visible()) { ?>
<?php $pharmacy_payment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_payment_list->ImportOptions->visible()) { ?>
<?php $pharmacy_payment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_payment_list->SearchOptions->visible()) { ?>
<?php $pharmacy_payment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_payment_list->FilterOptions->visible()) { ?>
<?php $pharmacy_payment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_payment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_payment_list->isExport() && !$pharmacy_payment->CurrentAction) { ?>
<form name="fpharmacy_paymentlistsrch" id="fpharmacy_paymentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_paymentlistsrch-search-panel" class="<?php echo $pharmacy_payment_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_payment">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_payment_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_payment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_payment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_payment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_payment_list->showPageHeader(); ?>
<?php
$pharmacy_payment_list->showMessage();
?>
<?php if ($pharmacy_payment_list->TotalRecords > 0 || $pharmacy_payment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_payment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_payment">
<?php if (!$pharmacy_payment_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_payment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_payment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_payment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_paymentlist" id="fpharmacy_paymentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<div id="gmp_pharmacy_payment" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_payment_list->TotalRecords > 0 || $pharmacy_payment_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_paymentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_payment->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_payment_list->renderListOptions();

// Render list options (header, left)
$pharmacy_payment_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_payment_list->id->Visible) { // id ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_payment_list->id->headerCellClass() ?>"><div id="elh_pharmacy_payment_id" class="pharmacy_payment_id"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_payment_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->id) ?>', 1);"><div id="elh_pharmacy_payment_id" class="pharmacy_payment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->PAYNO->Visible) { // PAYNO ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->PAYNO) == "") { ?>
		<th data-name="PAYNO" class="<?php echo $pharmacy_payment_list->PAYNO->headerCellClass() ?>"><div id="elh_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PAYNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYNO" class="<?php echo $pharmacy_payment_list->PAYNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->PAYNO) ?>', 1);"><div id="elh_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PAYNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->PAYNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->PAYNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->DT->Visible) { // DT ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_payment_list->DT->headerCellClass() ?>"><div id="elh_pharmacy_payment_DT" class="pharmacy_payment_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_payment_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->DT) ?>', 1);"><div id="elh_pharmacy_payment_DT" class="pharmacy_payment_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->YM->Visible) { // YM ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->YM) == "") { ?>
		<th data-name="YM" class="<?php echo $pharmacy_payment_list->YM->headerCellClass() ?>"><div id="elh_pharmacy_payment_YM" class="pharmacy_payment_YM"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->YM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="YM" class="<?php echo $pharmacy_payment_list->YM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->YM) ?>', 1);"><div id="elh_pharmacy_payment_YM" class="pharmacy_payment_YM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->YM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->YM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->YM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->PC->Visible) { // PC ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $pharmacy_payment_list->PC->headerCellClass() ?>"><div id="elh_pharmacy_payment_PC" class="pharmacy_payment_PC"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $pharmacy_payment_list->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->PC) ?>', 1);"><div id="elh_pharmacy_payment_PC" class="pharmacy_payment_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->PC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->PC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Customercode->Visible) { // Customercode ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_payment_list->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_payment_list->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Customercode) ?>', 1);"><div id="elh_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Customercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Customercode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Customercode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_payment_list->Customername->headerCellClass() ?>"><div id="elh_pharmacy_payment_Customername" class="pharmacy_payment_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_payment_list->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Customername) ?>', 1);"><div id="elh_pharmacy_payment_Customername" class="pharmacy_payment_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Customername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Customername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->pharmacy_pocol) == "") { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_payment_list->pharmacy_pocol->headerCellClass() ?>"><div id="elh_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->pharmacy_pocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_payment_list->pharmacy_pocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->pharmacy_pocol) ?>', 1);"><div id="elh_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->pharmacy_pocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->pharmacy_pocol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->pharmacy_pocol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->State->Visible) { // State ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_payment_list->State->headerCellClass() ?>"><div id="elh_pharmacy_payment_State" class="pharmacy_payment_State"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_payment_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->State) ?>', 1);"><div id="elh_pharmacy_payment_State" class="pharmacy_payment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_payment_list->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_payment_list->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Pincode) ?>', 1);"><div id="elh_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_payment_list->Phone->headerCellClass() ?>"><div id="elh_pharmacy_payment_Phone" class="pharmacy_payment_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_payment_list->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Phone) ?>', 1);"><div id="elh_pharmacy_payment_Phone" class="pharmacy_payment_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_payment_list->Fax->headerCellClass() ?>"><div id="elh_pharmacy_payment_Fax" class="pharmacy_payment_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_payment_list->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Fax) ?>', 1);"><div id="elh_pharmacy_payment_Fax" class="pharmacy_payment_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Fax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Fax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->EEmail->Visible) { // EEmail ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->EEmail) == "") { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_payment_list->EEmail->headerCellClass() ?>"><div id="elh_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->EEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_payment_list->EEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->EEmail) ?>', 1);"><div id="elh_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->EEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->EEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->EEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_payment_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_payment_HospID" class="pharmacy_payment_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_payment_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->HospID) ?>', 1);"><div id="elh_pharmacy_payment_HospID" class="pharmacy_payment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_payment_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_payment_createdby" class="pharmacy_payment_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_payment_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->createdby) ?>', 1);"><div id="elh_pharmacy_payment_createdby" class="pharmacy_payment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_payment_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_payment_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_payment_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_payment_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_payment_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_payment_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->PharmacyID->Visible) { // PharmacyID ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->PharmacyID) == "") { ?>
		<th data-name="PharmacyID" class="<?php echo $pharmacy_payment_list->PharmacyID->headerCellClass() ?>"><div id="elh_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PharmacyID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharmacyID" class="<?php echo $pharmacy_payment_list->PharmacyID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->PharmacyID) ?>', 1);"><div id="elh_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PharmacyID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->PharmacyID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->PharmacyID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_payment_list->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_payment_list->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->BillTotalValue) ?>', 1);"><div id="elh_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->BillTotalValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->BillTotalValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_payment_list->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_payment_list->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->GRNTotalValue) ?>', 1);"><div id="elh_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->GRNTotalValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->GRNTotalValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_payment_list->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_payment_list->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->BillDiscount) ?>', 1);"><div id="elh_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->BillDiscount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->BillDiscount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->TransPort->Visible) { // TransPort ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->TransPort) == "") { ?>
		<th data-name="TransPort" class="<?php echo $pharmacy_payment_list->TransPort->headerCellClass() ?>"><div id="elh_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->TransPort->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransPort" class="<?php echo $pharmacy_payment_list->TransPort->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->TransPort) ?>', 1);"><div id="elh_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->TransPort->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->TransPort->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->TransPort->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->AnyOther->Visible) { // AnyOther ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->AnyOther) == "") { ?>
		<th data-name="AnyOther" class="<?php echo $pharmacy_payment_list->AnyOther->headerCellClass() ?>"><div id="elh_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->AnyOther->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyOther" class="<?php echo $pharmacy_payment_list->AnyOther->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->AnyOther) ?>', 1);"><div id="elh_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->AnyOther->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->AnyOther->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->AnyOther->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->voucher_type->Visible) { // voucher_type ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $pharmacy_payment_list->voucher_type->headerCellClass() ?>"><div id="elh_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $pharmacy_payment_list->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->voucher_type) ?>', 1);"><div id="elh_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Details->Visible) { // Details ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $pharmacy_payment_list->Details->headerCellClass() ?>"><div id="elh_pharmacy_payment_Details" class="pharmacy_payment_Details"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $pharmacy_payment_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Details) ?>', 1);"><div id="elh_pharmacy_payment_Details" class="pharmacy_payment_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_payment_list->ModeofPayment->headerCellClass() ?>"><div id="elh_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_payment_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->ModeofPayment) ?>', 1);"><div id="elh_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Amount->Visible) { // Amount ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_payment_list->Amount->headerCellClass() ?>"><div id="elh_pharmacy_payment_Amount" class="pharmacy_payment_Amount"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_payment_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Amount) ?>', 1);"><div id="elh_pharmacy_payment_Amount" class="pharmacy_payment_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->BankName->Visible) { // BankName ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $pharmacy_payment_list->BankName->headerCellClass() ?>"><div id="elh_pharmacy_payment_BankName" class="pharmacy_payment_BankName"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $pharmacy_payment_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->BankName) ?>', 1);"><div id="elh_pharmacy_payment_BankName" class="pharmacy_payment_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->AccountNumber->Visible) { // AccountNumber ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->AccountNumber) == "") { ?>
		<th data-name="AccountNumber" class="<?php echo $pharmacy_payment_list->AccountNumber->headerCellClass() ?>"><div id="elh_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->AccountNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNumber" class="<?php echo $pharmacy_payment_list->AccountNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->AccountNumber) ?>', 1);"><div id="elh_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->AccountNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->AccountNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->AccountNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->chequeNumber->Visible) { // chequeNumber ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->chequeNumber) == "") { ?>
		<th data-name="chequeNumber" class="<?php echo $pharmacy_payment_list->chequeNumber->headerCellClass() ?>"><div id="elh_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->chequeNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chequeNumber" class="<?php echo $pharmacy_payment_list->chequeNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->chequeNumber) ?>', 1);"><div id="elh_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->chequeNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->chequeNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->chequeNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $pharmacy_payment_list->SeectPaymentMode->headerCellClass() ?>"><div id="elh_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $pharmacy_payment_list->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->SeectPaymentMode) ?>', 1);"><div id="elh_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->SeectPaymentMode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->SeectPaymentMode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_payment_list->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_payment_list->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->PaidAmount) ?>', 1);"><div id="elh_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->PaidAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->PaidAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->Currency->Visible) { // Currency ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $pharmacy_payment_list->Currency->headerCellClass() ?>"><div id="elh_pharmacy_payment_Currency" class="pharmacy_payment_Currency"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $pharmacy_payment_list->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->Currency) ?>', 1);"><div id="elh_pharmacy_payment_Currency" class="pharmacy_payment_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->Currency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->Currency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment_list->CardNumber->Visible) { // CardNumber ?>
	<?php if ($pharmacy_payment_list->SortUrl($pharmacy_payment_list->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_payment_list->CardNumber->headerCellClass() ?>"><div id="elh_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_payment_list->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_payment_list->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_payment_list->SortUrl($pharmacy_payment_list->CardNumber) ?>', 1);"><div id="elh_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment_list->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment_list->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_payment_list->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_payment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_payment_list->ExportAll && $pharmacy_payment_list->isExport()) {
	$pharmacy_payment_list->StopRecord = $pharmacy_payment_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_payment_list->TotalRecords > $pharmacy_payment_list->StartRecord + $pharmacy_payment_list->DisplayRecords - 1)
		$pharmacy_payment_list->StopRecord = $pharmacy_payment_list->StartRecord + $pharmacy_payment_list->DisplayRecords - 1;
	else
		$pharmacy_payment_list->StopRecord = $pharmacy_payment_list->TotalRecords;
}
$pharmacy_payment_list->RecordCount = $pharmacy_payment_list->StartRecord - 1;
if ($pharmacy_payment_list->Recordset && !$pharmacy_payment_list->Recordset->EOF) {
	$pharmacy_payment_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_payment_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_payment_list->StartRecord > 1)
		$pharmacy_payment_list->Recordset->move($pharmacy_payment_list->StartRecord - 1);
} elseif (!$pharmacy_payment->AllowAddDeleteRow && $pharmacy_payment_list->StopRecord == 0) {
	$pharmacy_payment_list->StopRecord = $pharmacy_payment->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_payment->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_payment->resetAttributes();
$pharmacy_payment_list->renderRow();
while ($pharmacy_payment_list->RecordCount < $pharmacy_payment_list->StopRecord) {
	$pharmacy_payment_list->RecordCount++;
	if ($pharmacy_payment_list->RecordCount >= $pharmacy_payment_list->StartRecord) {
		$pharmacy_payment_list->RowCount++;

		// Set up key count
		$pharmacy_payment_list->KeyCount = $pharmacy_payment_list->RowIndex;

		// Init row class and style
		$pharmacy_payment->resetAttributes();
		$pharmacy_payment->CssClass = "";
		if ($pharmacy_payment_list->isGridAdd()) {
		} else {
			$pharmacy_payment_list->loadRowValues($pharmacy_payment_list->Recordset); // Load row values
		}
		$pharmacy_payment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_payment->RowAttrs->merge(["data-rowindex" => $pharmacy_payment_list->RowCount, "id" => "r" . $pharmacy_payment_list->RowCount . "_pharmacy_payment", "data-rowtype" => $pharmacy_payment->RowType]);

		// Render row
		$pharmacy_payment_list->renderRow();

		// Render list options
		$pharmacy_payment_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_payment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_payment_list->ListOptions->render("body", "left", $pharmacy_payment_list->RowCount);
?>
	<?php if ($pharmacy_payment_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_payment_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_id">
<span<?php echo $pharmacy_payment_list->id->viewAttributes() ?>><?php echo $pharmacy_payment_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->PAYNO->Visible) { // PAYNO ?>
		<td data-name="PAYNO" <?php echo $pharmacy_payment_list->PAYNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment_list->PAYNO->viewAttributes() ?>><?php echo $pharmacy_payment_list->PAYNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $pharmacy_payment_list->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_DT">
<span<?php echo $pharmacy_payment_list->DT->viewAttributes() ?>><?php echo $pharmacy_payment_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->YM->Visible) { // YM ?>
		<td data-name="YM" <?php echo $pharmacy_payment_list->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_YM">
<span<?php echo $pharmacy_payment_list->YM->viewAttributes() ?>><?php echo $pharmacy_payment_list->YM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->PC->Visible) { // PC ?>
		<td data-name="PC" <?php echo $pharmacy_payment_list->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_PC">
<span<?php echo $pharmacy_payment_list->PC->viewAttributes() ?>><?php echo $pharmacy_payment_list->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode" <?php echo $pharmacy_payment_list->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment_list->Customercode->viewAttributes() ?>><?php echo $pharmacy_payment_list->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Customername->Visible) { // Customername ?>
		<td data-name="Customername" <?php echo $pharmacy_payment_list->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment_list->Customername->viewAttributes() ?>><?php echo $pharmacy_payment_list->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td data-name="pharmacy_pocol" <?php echo $pharmacy_payment_list->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment_list->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_payment_list->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $pharmacy_payment_list->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_State">
<span<?php echo $pharmacy_payment_list->State->viewAttributes() ?>><?php echo $pharmacy_payment_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" <?php echo $pharmacy_payment_list->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment_list->Pincode->viewAttributes() ?>><?php echo $pharmacy_payment_list->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Phone->Visible) { // Phone ?>
		<td data-name="Phone" <?php echo $pharmacy_payment_list->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment_list->Phone->viewAttributes() ?>><?php echo $pharmacy_payment_list->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Fax->Visible) { // Fax ?>
		<td data-name="Fax" <?php echo $pharmacy_payment_list->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment_list->Fax->viewAttributes() ?>><?php echo $pharmacy_payment_list->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->EEmail->Visible) { // EEmail ?>
		<td data-name="EEmail" <?php echo $pharmacy_payment_list->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment_list->EEmail->viewAttributes() ?>><?php echo $pharmacy_payment_list->EEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_payment_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment_list->HospID->viewAttributes() ?>><?php echo $pharmacy_payment_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_payment_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment_list->createdby->viewAttributes() ?>><?php echo $pharmacy_payment_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_payment_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_payment_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_payment_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_payment_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_payment_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_payment_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->PharmacyID->Visible) { // PharmacyID ?>
		<td data-name="PharmacyID" <?php echo $pharmacy_payment_list->PharmacyID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment_list->PharmacyID->viewAttributes() ?>><?php echo $pharmacy_payment_list->PharmacyID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" <?php echo $pharmacy_payment_list->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment_list->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment_list->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" <?php echo $pharmacy_payment_list->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment_list->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment_list->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" <?php echo $pharmacy_payment_list->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment_list->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_payment_list->BillDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->TransPort->Visible) { // TransPort ?>
		<td data-name="TransPort" <?php echo $pharmacy_payment_list->TransPort->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment_list->TransPort->viewAttributes() ?>><?php echo $pharmacy_payment_list->TransPort->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->AnyOther->Visible) { // AnyOther ?>
		<td data-name="AnyOther" <?php echo $pharmacy_payment_list->AnyOther->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment_list->AnyOther->viewAttributes() ?>><?php echo $pharmacy_payment_list->AnyOther->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $pharmacy_payment_list->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment_list->voucher_type->viewAttributes() ?>><?php echo $pharmacy_payment_list->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $pharmacy_payment_list->Details->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Details">
<span<?php echo $pharmacy_payment_list->Details->viewAttributes() ?>><?php echo $pharmacy_payment_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $pharmacy_payment_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment_list->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_payment_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $pharmacy_payment_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment_list->Amount->viewAttributes() ?>><?php echo $pharmacy_payment_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $pharmacy_payment_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment_list->BankName->viewAttributes() ?>><?php echo $pharmacy_payment_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->AccountNumber->Visible) { // AccountNumber ?>
		<td data-name="AccountNumber" <?php echo $pharmacy_payment_list->AccountNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment_list->AccountNumber->viewAttributes() ?>><?php echo $pharmacy_payment_list->AccountNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->chequeNumber->Visible) { // chequeNumber ?>
		<td data-name="chequeNumber" <?php echo $pharmacy_payment_list->chequeNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment_list->chequeNumber->viewAttributes() ?>><?php echo $pharmacy_payment_list->chequeNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode" <?php echo $pharmacy_payment_list->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment_list->SeectPaymentMode->viewAttributes() ?>><?php echo $pharmacy_payment_list->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" <?php echo $pharmacy_payment_list->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment_list->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_payment_list->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Currency->Visible) { // Currency ?>
		<td data-name="Currency" <?php echo $pharmacy_payment_list->Currency->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment_list->Currency->viewAttributes() ?>><?php echo $pharmacy_payment_list->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $pharmacy_payment_list->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCount ?>_pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment_list->CardNumber->viewAttributes() ?>><?php echo $pharmacy_payment_list->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_payment_list->ListOptions->render("body", "right", $pharmacy_payment_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_payment_list->isGridAdd())
		$pharmacy_payment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_payment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_payment_list->Recordset)
	$pharmacy_payment_list->Recordset->Close();
?>
<?php if (!$pharmacy_payment_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_payment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_payment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_payment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_payment_list->TotalRecords == 0 && !$pharmacy_payment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_payment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_payment_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_payment_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_payment->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_payment",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_payment_list->terminate();
?>