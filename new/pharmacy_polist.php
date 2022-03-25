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
$pharmacy_po_list = new pharmacy_po_list();

// Run the page
$pharmacy_po_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_po_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_po_list->isExport()) { ?>
<script>
var fpharmacy_polist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_polist = currentForm = new ew.Form("fpharmacy_polist", "list");
	fpharmacy_polist.formKeyCountName = '<?php echo $pharmacy_po_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_polist");
});
var fpharmacy_polistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_polistsrch = currentSearchForm = new ew.Form("fpharmacy_polistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_polistsrch.filterList = <?php echo $pharmacy_po_list->getFilterList() ?>;
	loadjs.done("fpharmacy_polistsrch");
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
<?php if (!$pharmacy_po_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_po_list->TotalRecords > 0 && $pharmacy_po_list->ExportOptions->visible()) { ?>
<?php $pharmacy_po_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_po_list->ImportOptions->visible()) { ?>
<?php $pharmacy_po_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_po_list->SearchOptions->visible()) { ?>
<?php $pharmacy_po_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_po_list->FilterOptions->visible()) { ?>
<?php $pharmacy_po_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_po_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_po_list->isExport() && !$pharmacy_po->CurrentAction) { ?>
<form name="fpharmacy_polistsrch" id="fpharmacy_polistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_polistsrch-search-panel" class="<?php echo $pharmacy_po_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_po">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_po_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_po_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_po_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_po_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_po_list->showPageHeader(); ?>
<?php
$pharmacy_po_list->showMessage();
?>
<?php if ($pharmacy_po_list->TotalRecords > 0 || $pharmacy_po->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_po_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_po">
<?php if (!$pharmacy_po_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_po_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_po_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_po_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_polist" id="fpharmacy_polist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<div id="gmp_pharmacy_po" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_po_list->TotalRecords > 0 || $pharmacy_po_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_polist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_po->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_po_list->renderListOptions();

// Render list options (header, left)
$pharmacy_po_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_po_list->id->Visible) { // id ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_po_list->id->headerCellClass() ?>"><div id="elh_pharmacy_po_id" class="pharmacy_po_id"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_po_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->id) ?>', 1);"><div id="elh_pharmacy_po_id" class="pharmacy_po_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->ORDNO->Visible) { // ORDNO ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $pharmacy_po_list->ORDNO->headerCellClass() ?>"><div id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $pharmacy_po_list->ORDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->ORDNO) ?>', 1);"><div id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->ORDNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->ORDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->ORDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->DT->Visible) { // DT ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_po_list->DT->headerCellClass() ?>"><div id="elh_pharmacy_po_DT" class="pharmacy_po_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_po_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->DT) ?>', 1);"><div id="elh_pharmacy_po_DT" class="pharmacy_po_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->DT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->YM->Visible) { // YM ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->YM) == "") { ?>
		<th data-name="YM" class="<?php echo $pharmacy_po_list->YM->headerCellClass() ?>"><div id="elh_pharmacy_po_YM" class="pharmacy_po_YM"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->YM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="YM" class="<?php echo $pharmacy_po_list->YM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->YM) ?>', 1);"><div id="elh_pharmacy_po_YM" class="pharmacy_po_YM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->YM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->YM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->YM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->PC->Visible) { // PC ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $pharmacy_po_list->PC->headerCellClass() ?>"><div id="elh_pharmacy_po_PC" class="pharmacy_po_PC"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $pharmacy_po_list->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->PC) ?>', 1);"><div id="elh_pharmacy_po_PC" class="pharmacy_po_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->PC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->PC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->PC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Customercode->Visible) { // Customercode ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_po_list->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_po_list->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Customercode) ?>', 1);"><div id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Customercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Customercode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Customercode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_po_list->Customername->headerCellClass() ?>"><div id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_po_list->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Customername) ?>', 1);"><div id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Customername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Customername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->pharmacy_pocol) == "") { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_po_list->pharmacy_pocol->headerCellClass() ?>"><div id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->pharmacy_pocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_po_list->pharmacy_pocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->pharmacy_pocol) ?>', 1);"><div id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->pharmacy_pocol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->pharmacy_pocol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->pharmacy_pocol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Address1->Visible) { // Address1 ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_po_list->Address1->headerCellClass() ?>"><div id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_po_list->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Address1) ?>', 1);"><div id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Address1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Address1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Address2->Visible) { // Address2 ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_po_list->Address2->headerCellClass() ?>"><div id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_po_list->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Address2) ?>', 1);"><div id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Address2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Address2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Address3->Visible) { // Address3 ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_po_list->Address3->headerCellClass() ?>"><div id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_po_list->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Address3) ?>', 1);"><div id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Address3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Address3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->State->Visible) { // State ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_po_list->State->headerCellClass() ?>"><div id="elh_pharmacy_po_State" class="pharmacy_po_State"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_po_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->State) ?>', 1);"><div id="elh_pharmacy_po_State" class="pharmacy_po_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_po_list->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_po_list->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Pincode) ?>', 1);"><div id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_po_list->Phone->headerCellClass() ?>"><div id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_po_list->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Phone) ?>', 1);"><div id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_po_list->Fax->headerCellClass() ?>"><div id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_po_list->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->Fax) ?>', 1);"><div id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->Fax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->Fax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->EEmail->Visible) { // EEmail ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->EEmail) == "") { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_po_list->EEmail->headerCellClass() ?>"><div id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->EEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_po_list->EEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->EEmail) ?>', 1);"><div id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->EEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->EEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->EEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_po_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_po_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->HospID) ?>', 1);"><div id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_po_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_po_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->createdby) ?>', 1);"><div id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_po_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_po_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_po_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_po_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_po_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_po_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_po_list->SortUrl($pharmacy_po_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_po_list->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_po_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_po_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_po_list->SortUrl($pharmacy_po_list->BRCODE) ?>', 1);"><div id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_po_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_po_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_po_list->ExportAll && $pharmacy_po_list->isExport()) {
	$pharmacy_po_list->StopRecord = $pharmacy_po_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_po_list->TotalRecords > $pharmacy_po_list->StartRecord + $pharmacy_po_list->DisplayRecords - 1)
		$pharmacy_po_list->StopRecord = $pharmacy_po_list->StartRecord + $pharmacy_po_list->DisplayRecords - 1;
	else
		$pharmacy_po_list->StopRecord = $pharmacy_po_list->TotalRecords;
}
$pharmacy_po_list->RecordCount = $pharmacy_po_list->StartRecord - 1;
if ($pharmacy_po_list->Recordset && !$pharmacy_po_list->Recordset->EOF) {
	$pharmacy_po_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_po_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_po_list->StartRecord > 1)
		$pharmacy_po_list->Recordset->move($pharmacy_po_list->StartRecord - 1);
} elseif (!$pharmacy_po->AllowAddDeleteRow && $pharmacy_po_list->StopRecord == 0) {
	$pharmacy_po_list->StopRecord = $pharmacy_po->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_po->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_po->resetAttributes();
$pharmacy_po_list->renderRow();
while ($pharmacy_po_list->RecordCount < $pharmacy_po_list->StopRecord) {
	$pharmacy_po_list->RecordCount++;
	if ($pharmacy_po_list->RecordCount >= $pharmacy_po_list->StartRecord) {
		$pharmacy_po_list->RowCount++;

		// Set up key count
		$pharmacy_po_list->KeyCount = $pharmacy_po_list->RowIndex;

		// Init row class and style
		$pharmacy_po->resetAttributes();
		$pharmacy_po->CssClass = "";
		if ($pharmacy_po_list->isGridAdd()) {
		} else {
			$pharmacy_po_list->loadRowValues($pharmacy_po_list->Recordset); // Load row values
		}
		$pharmacy_po->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_po->RowAttrs->merge(["data-rowindex" => $pharmacy_po_list->RowCount, "id" => "r" . $pharmacy_po_list->RowCount . "_pharmacy_po", "data-rowtype" => $pharmacy_po->RowType]);

		// Render row
		$pharmacy_po_list->renderRow();

		// Render list options
		$pharmacy_po_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_po->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_po_list->ListOptions->render("body", "left", $pharmacy_po_list->RowCount);
?>
	<?php if ($pharmacy_po_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_po_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_id">
<span<?php echo $pharmacy_po_list->id->viewAttributes() ?>><?php echo $pharmacy_po_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO" <?php echo $pharmacy_po_list->ORDNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po_list->ORDNO->viewAttributes() ?>><?php echo $pharmacy_po_list->ORDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $pharmacy_po_list->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_DT">
<span<?php echo $pharmacy_po_list->DT->viewAttributes() ?>><?php echo $pharmacy_po_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->YM->Visible) { // YM ?>
		<td data-name="YM" <?php echo $pharmacy_po_list->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_YM">
<span<?php echo $pharmacy_po_list->YM->viewAttributes() ?>><?php echo $pharmacy_po_list->YM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->PC->Visible) { // PC ?>
		<td data-name="PC" <?php echo $pharmacy_po_list->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_PC">
<span<?php echo $pharmacy_po_list->PC->viewAttributes() ?>><?php echo $pharmacy_po_list->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode" <?php echo $pharmacy_po_list->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Customercode">
<span<?php echo $pharmacy_po_list->Customercode->viewAttributes() ?>><?php echo $pharmacy_po_list->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Customername->Visible) { // Customername ?>
		<td data-name="Customername" <?php echo $pharmacy_po_list->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Customername">
<span<?php echo $pharmacy_po_list->Customername->viewAttributes() ?>><?php echo $pharmacy_po_list->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td data-name="pharmacy_pocol" <?php echo $pharmacy_po_list->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_pharmacy_pocol">
<span<?php echo $pharmacy_po_list->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_po_list->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Address1->Visible) { // Address1 ?>
		<td data-name="Address1" <?php echo $pharmacy_po_list->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Address1">
<span<?php echo $pharmacy_po_list->Address1->viewAttributes() ?>><?php echo $pharmacy_po_list->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Address2->Visible) { // Address2 ?>
		<td data-name="Address2" <?php echo $pharmacy_po_list->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Address2">
<span<?php echo $pharmacy_po_list->Address2->viewAttributes() ?>><?php echo $pharmacy_po_list->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Address3->Visible) { // Address3 ?>
		<td data-name="Address3" <?php echo $pharmacy_po_list->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Address3">
<span<?php echo $pharmacy_po_list->Address3->viewAttributes() ?>><?php echo $pharmacy_po_list->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $pharmacy_po_list->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_State">
<span<?php echo $pharmacy_po_list->State->viewAttributes() ?>><?php echo $pharmacy_po_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" <?php echo $pharmacy_po_list->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Pincode">
<span<?php echo $pharmacy_po_list->Pincode->viewAttributes() ?>><?php echo $pharmacy_po_list->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Phone->Visible) { // Phone ?>
		<td data-name="Phone" <?php echo $pharmacy_po_list->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Phone">
<span<?php echo $pharmacy_po_list->Phone->viewAttributes() ?>><?php echo $pharmacy_po_list->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->Fax->Visible) { // Fax ?>
		<td data-name="Fax" <?php echo $pharmacy_po_list->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_Fax">
<span<?php echo $pharmacy_po_list->Fax->viewAttributes() ?>><?php echo $pharmacy_po_list->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->EEmail->Visible) { // EEmail ?>
		<td data-name="EEmail" <?php echo $pharmacy_po_list->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_EEmail">
<span<?php echo $pharmacy_po_list->EEmail->viewAttributes() ?>><?php echo $pharmacy_po_list->EEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_po_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_HospID">
<span<?php echo $pharmacy_po_list->HospID->viewAttributes() ?>><?php echo $pharmacy_po_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_po_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_createdby">
<span<?php echo $pharmacy_po_list->createdby->viewAttributes() ?>><?php echo $pharmacy_po_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_po_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_createddatetime">
<span<?php echo $pharmacy_po_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_po_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_po_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_modifiedby">
<span<?php echo $pharmacy_po_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_po_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_po_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_modifieddatetime">
<span<?php echo $pharmacy_po_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_po_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_po_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCount ?>_pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po_list->BRCODE->viewAttributes() ?>><?php echo $pharmacy_po_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_po_list->ListOptions->render("body", "right", $pharmacy_po_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_po_list->isGridAdd())
		$pharmacy_po_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_po->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_po_list->Recordset)
	$pharmacy_po_list->Recordset->Close();
?>
<?php if (!$pharmacy_po_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_po_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_po_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_po_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_po_list->TotalRecords == 0 && !$pharmacy_po->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_po_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_po_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_po_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_po->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_po",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_po_list->terminate();
?>