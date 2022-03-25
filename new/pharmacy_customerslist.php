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
$pharmacy_customers_list = new pharmacy_customers_list();

// Run the page
$pharmacy_customers_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_customers_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_customers_list->isExport()) { ?>
<script>
var fpharmacy_customerslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_customerslist = currentForm = new ew.Form("fpharmacy_customerslist", "list");
	fpharmacy_customerslist.formKeyCountName = '<?php echo $pharmacy_customers_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_customerslist");
});
var fpharmacy_customerslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_customerslistsrch = currentSearchForm = new ew.Form("fpharmacy_customerslistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_customerslistsrch.filterList = <?php echo $pharmacy_customers_list->getFilterList() ?>;
	loadjs.done("fpharmacy_customerslistsrch");
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
<?php if (!$pharmacy_customers_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_customers_list->TotalRecords > 0 && $pharmacy_customers_list->ExportOptions->visible()) { ?>
<?php $pharmacy_customers_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_customers_list->ImportOptions->visible()) { ?>
<?php $pharmacy_customers_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_customers_list->SearchOptions->visible()) { ?>
<?php $pharmacy_customers_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_customers_list->FilterOptions->visible()) { ?>
<?php $pharmacy_customers_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_customers_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_customers_list->isExport() && !$pharmacy_customers->CurrentAction) { ?>
<form name="fpharmacy_customerslistsrch" id="fpharmacy_customerslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_customerslistsrch-search-panel" class="<?php echo $pharmacy_customers_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_customers">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_customers_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_customers_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_customers_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_customers_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_customers_list->showPageHeader(); ?>
<?php
$pharmacy_customers_list->showMessage();
?>
<?php if ($pharmacy_customers_list->TotalRecords > 0 || $pharmacy_customers->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_customers_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_customers">
<?php if (!$pharmacy_customers_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_customers_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_customers_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_customers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_customerslist" id="fpharmacy_customerslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<div id="gmp_pharmacy_customers" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_customers_list->TotalRecords > 0 || $pharmacy_customers_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_customerslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_customers->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_customers_list->renderListOptions();

// Render list options (header, left)
$pharmacy_customers_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_customers_list->Customercode->Visible) { // Customercode ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_customers_list->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_customers_list->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Customercode) ?>', 1);"><div id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Customercode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Customercode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Customercode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Address1->Visible) { // Address1 ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_customers_list->Address1->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_customers_list->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Address1) ?>', 1);"><div id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Address1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Address1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Address2->Visible) { // Address2 ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_customers_list->Address2->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_customers_list->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Address2) ?>', 1);"><div id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Address2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Address2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Address3->Visible) { // Address3 ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_customers_list->Address3->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_customers_list->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Address3) ?>', 1);"><div id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Address3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Address3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->State->Visible) { // State ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_customers_list->State->headerCellClass() ?>"><div id="elh_pharmacy_customers_State" class="pharmacy_customers_State"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_customers_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->State) ?>', 1);"><div id="elh_pharmacy_customers_State" class="pharmacy_customers_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_customers_list->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_customers_list->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Pincode) ?>', 1);"><div id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_customers_list->Phone->headerCellClass() ?>"><div id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_customers_list->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Phone) ?>', 1);"><div id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_customers_list->Fax->headerCellClass() ?>"><div id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_customers_list->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Fax) ?>', 1);"><div id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Fax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Fax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->_Email->Visible) { // Email ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_customers_list->_Email->headerCellClass() ?>"><div id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_customers_list->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->_Email) ?>', 1);"><div id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->_Email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->_Email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Ratetype->Visible) { // Ratetype ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Ratetype) == "") { ?>
		<th data-name="Ratetype" class="<?php echo $pharmacy_customers_list->Ratetype->headerCellClass() ?>"><div id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Ratetype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ratetype" class="<?php echo $pharmacy_customers_list->Ratetype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Ratetype) ?>', 1);"><div id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Ratetype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Ratetype->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Ratetype->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->Creationdate->Visible) { // Creationdate ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->Creationdate) == "") { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_customers_list->Creationdate->headerCellClass() ?>"><div id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Creationdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_customers_list->Creationdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->Creationdate) ?>', 1);"><div id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->Creationdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->Creationdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->Creationdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->ContactPerson->Visible) { // ContactPerson ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->ContactPerson) == "") { ?>
		<th data-name="ContactPerson" class="<?php echo $pharmacy_customers_list->ContactPerson->headerCellClass() ?>"><div id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->ContactPerson->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactPerson" class="<?php echo $pharmacy_customers_list->ContactPerson->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->ContactPerson) ?>', 1);"><div id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->ContactPerson->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->ContactPerson->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->ContactPerson->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->CPPhone->Visible) { // CPPhone ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->CPPhone) == "") { ?>
		<th data-name="CPPhone" class="<?php echo $pharmacy_customers_list->CPPhone->headerCellClass() ?>"><div id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->CPPhone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CPPhone" class="<?php echo $pharmacy_customers_list->CPPhone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->CPPhone) ?>', 1);"><div id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->CPPhone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->CPPhone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->CPPhone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers_list->id->Visible) { // id ?>
	<?php if ($pharmacy_customers_list->SortUrl($pharmacy_customers_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_customers_list->id->headerCellClass() ?>"><div id="elh_pharmacy_customers_id" class="pharmacy_customers_id"><div class="ew-table-header-caption"><?php echo $pharmacy_customers_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_customers_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_customers_list->SortUrl($pharmacy_customers_list->id) ?>', 1);"><div id="elh_pharmacy_customers_id" class="pharmacy_customers_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_customers_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_customers_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_customers_list->ExportAll && $pharmacy_customers_list->isExport()) {
	$pharmacy_customers_list->StopRecord = $pharmacy_customers_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_customers_list->TotalRecords > $pharmacy_customers_list->StartRecord + $pharmacy_customers_list->DisplayRecords - 1)
		$pharmacy_customers_list->StopRecord = $pharmacy_customers_list->StartRecord + $pharmacy_customers_list->DisplayRecords - 1;
	else
		$pharmacy_customers_list->StopRecord = $pharmacy_customers_list->TotalRecords;
}
$pharmacy_customers_list->RecordCount = $pharmacy_customers_list->StartRecord - 1;
if ($pharmacy_customers_list->Recordset && !$pharmacy_customers_list->Recordset->EOF) {
	$pharmacy_customers_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_customers_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_customers_list->StartRecord > 1)
		$pharmacy_customers_list->Recordset->move($pharmacy_customers_list->StartRecord - 1);
} elseif (!$pharmacy_customers->AllowAddDeleteRow && $pharmacy_customers_list->StopRecord == 0) {
	$pharmacy_customers_list->StopRecord = $pharmacy_customers->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_customers->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_customers->resetAttributes();
$pharmacy_customers_list->renderRow();
while ($pharmacy_customers_list->RecordCount < $pharmacy_customers_list->StopRecord) {
	$pharmacy_customers_list->RecordCount++;
	if ($pharmacy_customers_list->RecordCount >= $pharmacy_customers_list->StartRecord) {
		$pharmacy_customers_list->RowCount++;

		// Set up key count
		$pharmacy_customers_list->KeyCount = $pharmacy_customers_list->RowIndex;

		// Init row class and style
		$pharmacy_customers->resetAttributes();
		$pharmacy_customers->CssClass = "";
		if ($pharmacy_customers_list->isGridAdd()) {
		} else {
			$pharmacy_customers_list->loadRowValues($pharmacy_customers_list->Recordset); // Load row values
		}
		$pharmacy_customers->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_customers->RowAttrs->merge(["data-rowindex" => $pharmacy_customers_list->RowCount, "id" => "r" . $pharmacy_customers_list->RowCount . "_pharmacy_customers", "data-rowtype" => $pharmacy_customers->RowType]);

		// Render row
		$pharmacy_customers_list->renderRow();

		// Render list options
		$pharmacy_customers_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_customers->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_customers_list->ListOptions->render("body", "left", $pharmacy_customers_list->RowCount);
?>
	<?php if ($pharmacy_customers_list->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode" <?php echo $pharmacy_customers_list->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Customercode">
<span<?php echo $pharmacy_customers_list->Customercode->viewAttributes() ?>><?php echo $pharmacy_customers_list->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Address1->Visible) { // Address1 ?>
		<td data-name="Address1" <?php echo $pharmacy_customers_list->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Address1">
<span<?php echo $pharmacy_customers_list->Address1->viewAttributes() ?>><?php echo $pharmacy_customers_list->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Address2->Visible) { // Address2 ?>
		<td data-name="Address2" <?php echo $pharmacy_customers_list->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Address2">
<span<?php echo $pharmacy_customers_list->Address2->viewAttributes() ?>><?php echo $pharmacy_customers_list->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Address3->Visible) { // Address3 ?>
		<td data-name="Address3" <?php echo $pharmacy_customers_list->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Address3">
<span<?php echo $pharmacy_customers_list->Address3->viewAttributes() ?>><?php echo $pharmacy_customers_list->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $pharmacy_customers_list->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_State">
<span<?php echo $pharmacy_customers_list->State->viewAttributes() ?>><?php echo $pharmacy_customers_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" <?php echo $pharmacy_customers_list->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Pincode">
<span<?php echo $pharmacy_customers_list->Pincode->viewAttributes() ?>><?php echo $pharmacy_customers_list->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Phone->Visible) { // Phone ?>
		<td data-name="Phone" <?php echo $pharmacy_customers_list->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Phone">
<span<?php echo $pharmacy_customers_list->Phone->viewAttributes() ?>><?php echo $pharmacy_customers_list->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Fax->Visible) { // Fax ?>
		<td data-name="Fax" <?php echo $pharmacy_customers_list->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Fax">
<span<?php echo $pharmacy_customers_list->Fax->viewAttributes() ?>><?php echo $pharmacy_customers_list->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->_Email->Visible) { // Email ?>
		<td data-name="_Email" <?php echo $pharmacy_customers_list->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers__Email">
<span<?php echo $pharmacy_customers_list->_Email->viewAttributes() ?>><?php echo $pharmacy_customers_list->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Ratetype->Visible) { // Ratetype ?>
		<td data-name="Ratetype" <?php echo $pharmacy_customers_list->Ratetype->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Ratetype">
<span<?php echo $pharmacy_customers_list->Ratetype->viewAttributes() ?>><?php echo $pharmacy_customers_list->Ratetype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Creationdate->Visible) { // Creationdate ?>
		<td data-name="Creationdate" <?php echo $pharmacy_customers_list->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_Creationdate">
<span<?php echo $pharmacy_customers_list->Creationdate->viewAttributes() ?>><?php echo $pharmacy_customers_list->Creationdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->ContactPerson->Visible) { // ContactPerson ?>
		<td data-name="ContactPerson" <?php echo $pharmacy_customers_list->ContactPerson->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_ContactPerson">
<span<?php echo $pharmacy_customers_list->ContactPerson->viewAttributes() ?>><?php echo $pharmacy_customers_list->ContactPerson->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->CPPhone->Visible) { // CPPhone ?>
		<td data-name="CPPhone" <?php echo $pharmacy_customers_list->CPPhone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_CPPhone">
<span<?php echo $pharmacy_customers_list->CPPhone->viewAttributes() ?>><?php echo $pharmacy_customers_list->CPPhone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_customers_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCount ?>_pharmacy_customers_id">
<span<?php echo $pharmacy_customers_list->id->viewAttributes() ?>><?php echo $pharmacy_customers_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_customers_list->ListOptions->render("body", "right", $pharmacy_customers_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_customers_list->isGridAdd())
		$pharmacy_customers_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_customers->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_customers_list->Recordset)
	$pharmacy_customers_list->Recordset->Close();
?>
<?php if (!$pharmacy_customers_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_customers_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_customers_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_customers_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_customers_list->TotalRecords == 0 && !$pharmacy_customers->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_customers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_customers_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_customers_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_customers->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_customers",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_customers_list->terminate();
?>