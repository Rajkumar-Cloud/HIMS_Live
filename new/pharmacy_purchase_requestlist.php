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
$pharmacy_purchase_request_list = new pharmacy_purchase_request_list();

// Run the page
$pharmacy_purchase_request_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_purchase_request_list->isExport()) { ?>
<script>
var fpharmacy_purchase_requestlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_purchase_requestlist = currentForm = new ew.Form("fpharmacy_purchase_requestlist", "list");
	fpharmacy_purchase_requestlist.formKeyCountName = '<?php echo $pharmacy_purchase_request_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_purchase_requestlist");
});
var fpharmacy_purchase_requestlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_purchase_requestlistsrch = currentSearchForm = new ew.Form("fpharmacy_purchase_requestlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_purchase_requestlistsrch.filterList = <?php echo $pharmacy_purchase_request_list->getFilterList() ?>;
	loadjs.done("fpharmacy_purchase_requestlistsrch");
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
<?php if (!$pharmacy_purchase_request_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_purchase_request_list->TotalRecords > 0 && $pharmacy_purchase_request_list->ExportOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->ImportOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->SearchOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->FilterOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_purchase_request_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_purchase_request_list->isExport() && !$pharmacy_purchase_request->CurrentAction) { ?>
<form name="fpharmacy_purchase_requestlistsrch" id="fpharmacy_purchase_requestlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_purchase_requestlistsrch-search-panel" class="<?php echo $pharmacy_purchase_request_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchase_request">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_purchase_request_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_purchase_request_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_purchase_request_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_purchase_request_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_purchase_request_list->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_list->showMessage();
?>
<?php if ($pharmacy_purchase_request_list->TotalRecords > 0 || $pharmacy_purchase_request->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchase_request_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request">
<?php if (!$pharmacy_purchase_request_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_purchase_request_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_purchase_request_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_purchase_requestlist" id="fpharmacy_purchase_requestlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<div id="gmp_pharmacy_purchase_request" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_purchase_request_list->TotalRecords > 0 || $pharmacy_purchase_request_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchase_requestlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchase_request->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchase_request_list->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request_list->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_list->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->id) ?>', 1);"><div id="elh_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->DT->Visible) { // DT ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_purchase_request_list->DT->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_purchase_request_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->DT) ?>', 1);"><div id="elh_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->EmployeeName->Visible) { // EmployeeName ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->EmployeeName) == "") { ?>
		<th data-name="EmployeeName" class="<?php echo $pharmacy_purchase_request_list->EmployeeName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->EmployeeName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmployeeName" class="<?php echo $pharmacy_purchase_request_list->EmployeeName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->EmployeeName) ?>', 1);"><div id="elh_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->EmployeeName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->EmployeeName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->EmployeeName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->Department->Visible) { // Department ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $pharmacy_purchase_request_list->Department->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $pharmacy_purchase_request_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->Department) ?>', 1);"><div id="elh_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $pharmacy_purchase_request_list->ApprovedStatus->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $pharmacy_purchase_request_list->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->ApprovedStatus) ?>', 1);"><div id="elh_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->ApprovedStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->ApprovedStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->ApprovedStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $pharmacy_purchase_request_list->PurchaseStatus->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $pharmacy_purchase_request_list->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->PurchaseStatus) ?>', 1);"><div id="elh_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->PurchaseStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->PurchaseStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->PurchaseStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->HospID) ?>', 1);"><div id="elh_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->createdby) ?>', 1);"><div id="elh_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_list->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_list->SortUrl($pharmacy_purchase_request_list->BRCODE) ?>', 1);"><div id="elh_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchase_request_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_purchase_request_list->ExportAll && $pharmacy_purchase_request_list->isExport()) {
	$pharmacy_purchase_request_list->StopRecord = $pharmacy_purchase_request_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_purchase_request_list->TotalRecords > $pharmacy_purchase_request_list->StartRecord + $pharmacy_purchase_request_list->DisplayRecords - 1)
		$pharmacy_purchase_request_list->StopRecord = $pharmacy_purchase_request_list->StartRecord + $pharmacy_purchase_request_list->DisplayRecords - 1;
	else
		$pharmacy_purchase_request_list->StopRecord = $pharmacy_purchase_request_list->TotalRecords;
}
$pharmacy_purchase_request_list->RecordCount = $pharmacy_purchase_request_list->StartRecord - 1;
if ($pharmacy_purchase_request_list->Recordset && !$pharmacy_purchase_request_list->Recordset->EOF) {
	$pharmacy_purchase_request_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchase_request_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchase_request_list->StartRecord > 1)
		$pharmacy_purchase_request_list->Recordset->move($pharmacy_purchase_request_list->StartRecord - 1);
} elseif (!$pharmacy_purchase_request->AllowAddDeleteRow && $pharmacy_purchase_request_list->StopRecord == 0) {
	$pharmacy_purchase_request_list->StopRecord = $pharmacy_purchase_request->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchase_request->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchase_request->resetAttributes();
$pharmacy_purchase_request_list->renderRow();
while ($pharmacy_purchase_request_list->RecordCount < $pharmacy_purchase_request_list->StopRecord) {
	$pharmacy_purchase_request_list->RecordCount++;
	if ($pharmacy_purchase_request_list->RecordCount >= $pharmacy_purchase_request_list->StartRecord) {
		$pharmacy_purchase_request_list->RowCount++;

		// Set up key count
		$pharmacy_purchase_request_list->KeyCount = $pharmacy_purchase_request_list->RowIndex;

		// Init row class and style
		$pharmacy_purchase_request->resetAttributes();
		$pharmacy_purchase_request->CssClass = "";
		if ($pharmacy_purchase_request_list->isGridAdd()) {
		} else {
			$pharmacy_purchase_request_list->loadRowValues($pharmacy_purchase_request_list->Recordset); // Load row values
		}
		$pharmacy_purchase_request->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_purchase_request->RowAttrs->merge(["data-rowindex" => $pharmacy_purchase_request_list->RowCount, "id" => "r" . $pharmacy_purchase_request_list->RowCount . "_pharmacy_purchase_request", "data-rowtype" => $pharmacy_purchase_request->RowType]);

		// Render row
		$pharmacy_purchase_request_list->renderRow();

		// Render list options
		$pharmacy_purchase_request_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_purchase_request->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_list->ListOptions->render("body", "left", $pharmacy_purchase_request_list->RowCount);
?>
	<?php if ($pharmacy_purchase_request_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_purchase_request_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request_list->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $pharmacy_purchase_request_list->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request_list->DT->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->EmployeeName->Visible) { // EmployeeName ?>
		<td data-name="EmployeeName" <?php echo $pharmacy_purchase_request_list->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request_list->EmployeeName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->EmployeeName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $pharmacy_purchase_request_list->Department->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request_list->Department->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus" <?php echo $pharmacy_purchase_request_list->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request_list->ApprovedStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus" <?php echo $pharmacy_purchase_request_list->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request_list->PurchaseStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_purchase_request_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request_list->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_purchase_request_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request_list->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_purchase_request_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_purchase_request_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_purchase_request_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_purchase_request_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCount ?>_pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request_list->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_list->ListOptions->render("body", "right", $pharmacy_purchase_request_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_purchase_request_list->isGridAdd())
		$pharmacy_purchase_request_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_purchase_request->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchase_request_list->Recordset)
	$pharmacy_purchase_request_list->Recordset->Close();
?>
<?php if (!$pharmacy_purchase_request_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_purchase_request_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_purchase_request_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchase_request_list->TotalRecords == 0 && !$pharmacy_purchase_request->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_purchase_request_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_purchase_request",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_purchase_request_list->terminate();
?>