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
$store_intent_issue_list = new store_intent_issue_list();

// Run the page
$store_intent_issue_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_intent_issue_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_intent_issue_list->isExport()) { ?>
<script>
var fstore_intent_issuelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fstore_intent_issuelist = currentForm = new ew.Form("fstore_intent_issuelist", "list");
	fstore_intent_issuelist.formKeyCountName = '<?php echo $store_intent_issue_list->FormKeyCountName ?>';
	loadjs.done("fstore_intent_issuelist");
});
var fstore_intent_issuelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fstore_intent_issuelistsrch = currentSearchForm = new ew.Form("fstore_intent_issuelistsrch");

	// Dynamic selection lists
	// Filters

	fstore_intent_issuelistsrch.filterList = <?php echo $store_intent_issue_list->getFilterList() ?>;
	loadjs.done("fstore_intent_issuelistsrch");
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
<?php if (!$store_intent_issue_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_intent_issue_list->TotalRecords > 0 && $store_intent_issue_list->ExportOptions->visible()) { ?>
<?php $store_intent_issue_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_intent_issue_list->ImportOptions->visible()) { ?>
<?php $store_intent_issue_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_intent_issue_list->SearchOptions->visible()) { ?>
<?php $store_intent_issue_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_intent_issue_list->FilterOptions->visible()) { ?>
<?php $store_intent_issue_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_intent_issue_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_intent_issue_list->isExport() && !$store_intent_issue->CurrentAction) { ?>
<form name="fstore_intent_issuelistsrch" id="fstore_intent_issuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fstore_intent_issuelistsrch-search-panel" class="<?php echo $store_intent_issue_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_intent_issue">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $store_intent_issue_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($store_intent_issue_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($store_intent_issue_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_intent_issue_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_intent_issue_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $store_intent_issue_list->showPageHeader(); ?>
<?php
$store_intent_issue_list->showMessage();
?>
<?php if ($store_intent_issue_list->TotalRecords > 0 || $store_intent_issue->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_intent_issue_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_intent_issue">
<?php if (!$store_intent_issue_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_intent_issue_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_intent_issue_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_intent_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_intent_issuelist" id="fstore_intent_issuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<div id="gmp_store_intent_issue" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($store_intent_issue_list->TotalRecords > 0 || $store_intent_issue_list->isGridEdit()) { ?>
<table id="tbl_store_intent_issuelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_intent_issue->RowType = ROWTYPE_HEADER;

// Render list options
$store_intent_issue_list->renderListOptions();

// Render list options (header, left)
$store_intent_issue_list->ListOptions->render("header", "left");
?>
<?php if ($store_intent_issue_list->id->Visible) { // id ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_intent_issue_list->id->headerCellClass() ?>"><div id="elh_store_intent_issue_id" class="store_intent_issue_id"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_intent_issue_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->id) ?>', 1);"><div id="elh_store_intent_issue_id" class="store_intent_issue_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Reception->Visible) { // Reception ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $store_intent_issue_list->Reception->headerCellClass() ?>"><div id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $store_intent_issue_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Reception) ?>', 1);"><div id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->PatientId->Visible) { // PatientId ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $store_intent_issue_list->PatientId->headerCellClass() ?>"><div id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $store_intent_issue_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->PatientId) ?>', 1);"><div id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->mrnno->Visible) { // mrnno ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $store_intent_issue_list->mrnno->headerCellClass() ?>"><div id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $store_intent_issue_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->mrnno) ?>', 1);"><div id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->PatientName->Visible) { // PatientName ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $store_intent_issue_list->PatientName->headerCellClass() ?>"><div id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $store_intent_issue_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->PatientName) ?>', 1);"><div id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Age->Visible) { // Age ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $store_intent_issue_list->Age->headerCellClass() ?>"><div id="elh_store_intent_issue_Age" class="store_intent_issue_Age"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $store_intent_issue_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Age) ?>', 1);"><div id="elh_store_intent_issue_Age" class="store_intent_issue_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Gender->Visible) { // Gender ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $store_intent_issue_list->Gender->headerCellClass() ?>"><div id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $store_intent_issue_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Gender) ?>', 1);"><div id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Mobile->Visible) { // Mobile ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $store_intent_issue_list->Mobile->headerCellClass() ?>"><div id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $store_intent_issue_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Mobile) ?>', 1);"><div id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->IP_OP->Visible) { // IP_OP ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $store_intent_issue_list->IP_OP->headerCellClass() ?>"><div id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $store_intent_issue_list->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->IP_OP) ?>', 1);"><div id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->IP_OP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->IP_OP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Doctor->Visible) { // Doctor ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $store_intent_issue_list->Doctor->headerCellClass() ?>"><div id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $store_intent_issue_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Doctor) ?>', 1);"><div id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->voucher_type->Visible) { // voucher_type ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $store_intent_issue_list->voucher_type->headerCellClass() ?>"><div id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $store_intent_issue_list->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->voucher_type) ?>', 1);"><div id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Details->Visible) { // Details ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $store_intent_issue_list->Details->headerCellClass() ?>"><div id="elh_store_intent_issue_Details" class="store_intent_issue_Details"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $store_intent_issue_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Details) ?>', 1);"><div id="elh_store_intent_issue_Details" class="store_intent_issue_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $store_intent_issue_list->ModeofPayment->headerCellClass() ?>"><div id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $store_intent_issue_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->ModeofPayment) ?>', 1);"><div id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Amount->Visible) { // Amount ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $store_intent_issue_list->Amount->headerCellClass() ?>"><div id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $store_intent_issue_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Amount) ?>', 1);"><div id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $store_intent_issue_list->AnyDues->headerCellClass() ?>"><div id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $store_intent_issue_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->AnyDues) ?>', 1);"><div id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->createdby->Visible) { // createdby ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $store_intent_issue_list->createdby->headerCellClass() ?>"><div id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $store_intent_issue_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->createdby) ?>', 1);"><div id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $store_intent_issue_list->createddatetime->headerCellClass() ?>"><div id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $store_intent_issue_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->createddatetime) ?>', 1);"><div id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $store_intent_issue_list->modifiedby->headerCellClass() ?>"><div id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $store_intent_issue_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->modifiedby) ?>', 1);"><div id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_intent_issue_list->modifieddatetime->headerCellClass() ?>"><div id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_intent_issue_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->modifieddatetime) ?>', 1);"><div id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $store_intent_issue_list->RealizationAmount->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $store_intent_issue_list->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationAmount) ?>', 1);"><div id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RealizationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RealizationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $store_intent_issue_list->RealizationStatus->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $store_intent_issue_list->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationStatus) ?>', 1);"><div id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RealizationStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RealizationStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $store_intent_issue_list->RealizationRemarks->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $store_intent_issue_list->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationRemarks) ?>', 1);"><div id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RealizationRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RealizationRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $store_intent_issue_list->RealizationBatchNo->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $store_intent_issue_list->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationBatchNo) ?>', 1);"><div id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RealizationBatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RealizationBatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $store_intent_issue_list->RealizationDate->headerCellClass() ?>"><div id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $store_intent_issue_list->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RealizationDate) ?>', 1);"><div id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RealizationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RealizationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->HospID->Visible) { // HospID ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_intent_issue_list->HospID->headerCellClass() ?>"><div id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_intent_issue_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->HospID) ?>', 1);"><div id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $store_intent_issue_list->RIDNO->headerCellClass() ?>"><div id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $store_intent_issue_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RIDNO) ?>', 1);"><div id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->TidNo->Visible) { // TidNo ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $store_intent_issue_list->TidNo->headerCellClass() ?>"><div id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $store_intent_issue_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->TidNo) ?>', 1);"><div id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->CId->Visible) { // CId ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $store_intent_issue_list->CId->headerCellClass() ?>"><div id="elh_store_intent_issue_CId" class="store_intent_issue_CId"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $store_intent_issue_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->CId) ?>', 1);"><div id="elh_store_intent_issue_CId" class="store_intent_issue_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $store_intent_issue_list->PartnerName->headerCellClass() ?>"><div id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $store_intent_issue_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->PartnerName) ?>', 1);"><div id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->PayerType->Visible) { // PayerType ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $store_intent_issue_list->PayerType->headerCellClass() ?>"><div id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $store_intent_issue_list->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->PayerType) ?>', 1);"><div id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->PayerType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->PayerType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Dob->Visible) { // Dob ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $store_intent_issue_list->Dob->headerCellClass() ?>"><div id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $store_intent_issue_list->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Dob) ?>', 1);"><div id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Currency->Visible) { // Currency ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $store_intent_issue_list->Currency->headerCellClass() ?>"><div id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $store_intent_issue_list->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Currency) ?>', 1);"><div id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Currency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Currency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $store_intent_issue_list->DiscountRemarks->headerCellClass() ?>"><div id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $store_intent_issue_list->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->DiscountRemarks) ?>', 1);"><div id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->DiscountRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->DiscountRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->Remarks->Visible) { // Remarks ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $store_intent_issue_list->Remarks->headerCellClass() ?>"><div id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $store_intent_issue_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->Remarks) ?>', 1);"><div id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->PatId->Visible) { // PatId ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $store_intent_issue_list->PatId->headerCellClass() ?>"><div id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $store_intent_issue_list->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->PatId) ?>', 1);"><div id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->PatId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->PatId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $store_intent_issue_list->DrDepartment->headerCellClass() ?>"><div id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $store_intent_issue_list->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->DrDepartment) ?>', 1);"><div id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $store_intent_issue_list->RefferedBy->headerCellClass() ?>"><div id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $store_intent_issue_list->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->RefferedBy) ?>', 1);"><div id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->RefferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->RefferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $store_intent_issue_list->BillNumber->headerCellClass() ?>"><div id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $store_intent_issue_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->BillNumber) ?>', 1);"><div id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->CardNumber->Visible) { // CardNumber ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $store_intent_issue_list->CardNumber->headerCellClass() ?>"><div id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $store_intent_issue_list->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->CardNumber) ?>', 1);"><div id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->BankName->Visible) { // BankName ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $store_intent_issue_list->BankName->headerCellClass() ?>"><div id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $store_intent_issue_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->BankName) ?>', 1);"><div id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->DrID->Visible) { // DrID ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $store_intent_issue_list->DrID->headerCellClass() ?>"><div id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $store_intent_issue_list->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->DrID) ?>', 1);"><div id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->BillStatus->Visible) { // BillStatus ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $store_intent_issue_list->BillStatus->headerCellClass() ?>"><div id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $store_intent_issue_list->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->BillStatus) ?>', 1);"><div id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->BillStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->BillStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $store_intent_issue_list->ReportHeader->headerCellClass() ?>"><div id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $store_intent_issue_list->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->ReportHeader) ?>', 1);"><div id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_intent_issue_list->PharID->Visible) { // PharID ?>
	<?php if ($store_intent_issue_list->SortUrl($store_intent_issue_list->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $store_intent_issue_list->PharID->headerCellClass() ?>"><div id="elh_store_intent_issue_PharID" class="store_intent_issue_PharID"><div class="ew-table-header-caption"><?php echo $store_intent_issue_list->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $store_intent_issue_list->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $store_intent_issue_list->SortUrl($store_intent_issue_list->PharID) ?>', 1);"><div id="elh_store_intent_issue_PharID" class="store_intent_issue_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_intent_issue_list->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_intent_issue_list->PharID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($store_intent_issue_list->PharID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_intent_issue_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_intent_issue_list->ExportAll && $store_intent_issue_list->isExport()) {
	$store_intent_issue_list->StopRecord = $store_intent_issue_list->TotalRecords;
} else {

	// Set the last record to display
	if ($store_intent_issue_list->TotalRecords > $store_intent_issue_list->StartRecord + $store_intent_issue_list->DisplayRecords - 1)
		$store_intent_issue_list->StopRecord = $store_intent_issue_list->StartRecord + $store_intent_issue_list->DisplayRecords - 1;
	else
		$store_intent_issue_list->StopRecord = $store_intent_issue_list->TotalRecords;
}
$store_intent_issue_list->RecordCount = $store_intent_issue_list->StartRecord - 1;
if ($store_intent_issue_list->Recordset && !$store_intent_issue_list->Recordset->EOF) {
	$store_intent_issue_list->Recordset->moveFirst();
	$selectLimit = $store_intent_issue_list->UseSelectLimit;
	if (!$selectLimit && $store_intent_issue_list->StartRecord > 1)
		$store_intent_issue_list->Recordset->move($store_intent_issue_list->StartRecord - 1);
} elseif (!$store_intent_issue->AllowAddDeleteRow && $store_intent_issue_list->StopRecord == 0) {
	$store_intent_issue_list->StopRecord = $store_intent_issue->GridAddRowCount;
}

// Initialize aggregate
$store_intent_issue->RowType = ROWTYPE_AGGREGATEINIT;
$store_intent_issue->resetAttributes();
$store_intent_issue_list->renderRow();
while ($store_intent_issue_list->RecordCount < $store_intent_issue_list->StopRecord) {
	$store_intent_issue_list->RecordCount++;
	if ($store_intent_issue_list->RecordCount >= $store_intent_issue_list->StartRecord) {
		$store_intent_issue_list->RowCount++;

		// Set up key count
		$store_intent_issue_list->KeyCount = $store_intent_issue_list->RowIndex;

		// Init row class and style
		$store_intent_issue->resetAttributes();
		$store_intent_issue->CssClass = "";
		if ($store_intent_issue_list->isGridAdd()) {
		} else {
			$store_intent_issue_list->loadRowValues($store_intent_issue_list->Recordset); // Load row values
		}
		$store_intent_issue->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_intent_issue->RowAttrs->merge(["data-rowindex" => $store_intent_issue_list->RowCount, "id" => "r" . $store_intent_issue_list->RowCount . "_store_intent_issue", "data-rowtype" => $store_intent_issue->RowType]);

		// Render row
		$store_intent_issue_list->renderRow();

		// Render list options
		$store_intent_issue_list->renderListOptions();
?>
	<tr <?php echo $store_intent_issue->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_intent_issue_list->ListOptions->render("body", "left", $store_intent_issue_list->RowCount);
?>
	<?php if ($store_intent_issue_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $store_intent_issue_list->id->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_id">
<span<?php echo $store_intent_issue_list->id->viewAttributes() ?>><?php echo $store_intent_issue_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $store_intent_issue_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Reception">
<span<?php echo $store_intent_issue_list->Reception->viewAttributes() ?>><?php echo $store_intent_issue_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $store_intent_issue_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_PatientId">
<span<?php echo $store_intent_issue_list->PatientId->viewAttributes() ?>><?php echo $store_intent_issue_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $store_intent_issue_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_mrnno">
<span<?php echo $store_intent_issue_list->mrnno->viewAttributes() ?>><?php echo $store_intent_issue_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $store_intent_issue_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_PatientName">
<span<?php echo $store_intent_issue_list->PatientName->viewAttributes() ?>><?php echo $store_intent_issue_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $store_intent_issue_list->Age->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Age">
<span<?php echo $store_intent_issue_list->Age->viewAttributes() ?>><?php echo $store_intent_issue_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $store_intent_issue_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Gender">
<span<?php echo $store_intent_issue_list->Gender->viewAttributes() ?>><?php echo $store_intent_issue_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $store_intent_issue_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Mobile">
<span<?php echo $store_intent_issue_list->Mobile->viewAttributes() ?>><?php echo $store_intent_issue_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" <?php echo $store_intent_issue_list->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_IP_OP">
<span<?php echo $store_intent_issue_list->IP_OP->viewAttributes() ?>><?php echo $store_intent_issue_list->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $store_intent_issue_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Doctor">
<span<?php echo $store_intent_issue_list->Doctor->viewAttributes() ?>><?php echo $store_intent_issue_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $store_intent_issue_list->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_voucher_type">
<span<?php echo $store_intent_issue_list->voucher_type->viewAttributes() ?>><?php echo $store_intent_issue_list->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $store_intent_issue_list->Details->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Details">
<span<?php echo $store_intent_issue_list->Details->viewAttributes() ?>><?php echo $store_intent_issue_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $store_intent_issue_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_ModeofPayment">
<span<?php echo $store_intent_issue_list->ModeofPayment->viewAttributes() ?>><?php echo $store_intent_issue_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $store_intent_issue_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Amount">
<span<?php echo $store_intent_issue_list->Amount->viewAttributes() ?>><?php echo $store_intent_issue_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $store_intent_issue_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_AnyDues">
<span<?php echo $store_intent_issue_list->AnyDues->viewAttributes() ?>><?php echo $store_intent_issue_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $store_intent_issue_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_createdby">
<span<?php echo $store_intent_issue_list->createdby->viewAttributes() ?>><?php echo $store_intent_issue_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $store_intent_issue_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_createddatetime">
<span<?php echo $store_intent_issue_list->createddatetime->viewAttributes() ?>><?php echo $store_intent_issue_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $store_intent_issue_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_modifiedby">
<span<?php echo $store_intent_issue_list->modifiedby->viewAttributes() ?>><?php echo $store_intent_issue_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $store_intent_issue_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_modifieddatetime">
<span<?php echo $store_intent_issue_list->modifieddatetime->viewAttributes() ?>><?php echo $store_intent_issue_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount" <?php echo $store_intent_issue_list->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RealizationAmount">
<span<?php echo $store_intent_issue_list->RealizationAmount->viewAttributes() ?>><?php echo $store_intent_issue_list->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus" <?php echo $store_intent_issue_list->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RealizationStatus">
<span<?php echo $store_intent_issue_list->RealizationStatus->viewAttributes() ?>><?php echo $store_intent_issue_list->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks" <?php echo $store_intent_issue_list->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RealizationRemarks">
<span<?php echo $store_intent_issue_list->RealizationRemarks->viewAttributes() ?>><?php echo $store_intent_issue_list->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo" <?php echo $store_intent_issue_list->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RealizationBatchNo">
<span<?php echo $store_intent_issue_list->RealizationBatchNo->viewAttributes() ?>><?php echo $store_intent_issue_list->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate" <?php echo $store_intent_issue_list->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RealizationDate">
<span<?php echo $store_intent_issue_list->RealizationDate->viewAttributes() ?>><?php echo $store_intent_issue_list->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $store_intent_issue_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_HospID">
<span<?php echo $store_intent_issue_list->HospID->viewAttributes() ?>><?php echo $store_intent_issue_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $store_intent_issue_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RIDNO">
<span<?php echo $store_intent_issue_list->RIDNO->viewAttributes() ?>><?php echo $store_intent_issue_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $store_intent_issue_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_TidNo">
<span<?php echo $store_intent_issue_list->TidNo->viewAttributes() ?>><?php echo $store_intent_issue_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $store_intent_issue_list->CId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_CId">
<span<?php echo $store_intent_issue_list->CId->viewAttributes() ?>><?php echo $store_intent_issue_list->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $store_intent_issue_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_PartnerName">
<span<?php echo $store_intent_issue_list->PartnerName->viewAttributes() ?>><?php echo $store_intent_issue_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType" <?php echo $store_intent_issue_list->PayerType->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_PayerType">
<span<?php echo $store_intent_issue_list->PayerType->viewAttributes() ?>><?php echo $store_intent_issue_list->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Dob->Visible) { // Dob ?>
		<td data-name="Dob" <?php echo $store_intent_issue_list->Dob->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Dob">
<span<?php echo $store_intent_issue_list->Dob->viewAttributes() ?>><?php echo $store_intent_issue_list->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Currency->Visible) { // Currency ?>
		<td data-name="Currency" <?php echo $store_intent_issue_list->Currency->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Currency">
<span<?php echo $store_intent_issue_list->Currency->viewAttributes() ?>><?php echo $store_intent_issue_list->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks" <?php echo $store_intent_issue_list->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_DiscountRemarks">
<span<?php echo $store_intent_issue_list->DiscountRemarks->viewAttributes() ?>><?php echo $store_intent_issue_list->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $store_intent_issue_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_Remarks">
<span<?php echo $store_intent_issue_list->Remarks->viewAttributes() ?>><?php echo $store_intent_issue_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->PatId->Visible) { // PatId ?>
		<td data-name="PatId" <?php echo $store_intent_issue_list->PatId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_PatId">
<span<?php echo $store_intent_issue_list->PatId->viewAttributes() ?>><?php echo $store_intent_issue_list->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $store_intent_issue_list->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_DrDepartment">
<span<?php echo $store_intent_issue_list->DrDepartment->viewAttributes() ?>><?php echo $store_intent_issue_list->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy" <?php echo $store_intent_issue_list->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_RefferedBy">
<span<?php echo $store_intent_issue_list->RefferedBy->viewAttributes() ?>><?php echo $store_intent_issue_list->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $store_intent_issue_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_BillNumber">
<span<?php echo $store_intent_issue_list->BillNumber->viewAttributes() ?>><?php echo $store_intent_issue_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $store_intent_issue_list->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_CardNumber">
<span<?php echo $store_intent_issue_list->CardNumber->viewAttributes() ?>><?php echo $store_intent_issue_list->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $store_intent_issue_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_BankName">
<span<?php echo $store_intent_issue_list->BankName->viewAttributes() ?>><?php echo $store_intent_issue_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $store_intent_issue_list->DrID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_DrID">
<span<?php echo $store_intent_issue_list->DrID->viewAttributes() ?>><?php echo $store_intent_issue_list->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus" <?php echo $store_intent_issue_list->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_BillStatus">
<span<?php echo $store_intent_issue_list->BillStatus->viewAttributes() ?>><?php echo $store_intent_issue_list->BillStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $store_intent_issue_list->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_ReportHeader">
<span<?php echo $store_intent_issue_list->ReportHeader->viewAttributes() ?>><?php echo $store_intent_issue_list->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_intent_issue_list->PharID->Visible) { // PharID ?>
		<td data-name="PharID" <?php echo $store_intent_issue_list->PharID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_list->RowCount ?>_store_intent_issue_PharID">
<span<?php echo $store_intent_issue_list->PharID->viewAttributes() ?>><?php echo $store_intent_issue_list->PharID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_intent_issue_list->ListOptions->render("body", "right", $store_intent_issue_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$store_intent_issue_list->isGridAdd())
		$store_intent_issue_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$store_intent_issue->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_intent_issue_list->Recordset)
	$store_intent_issue_list->Recordset->Close();
?>
<?php if (!$store_intent_issue_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_intent_issue_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $store_intent_issue_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_intent_issue_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_intent_issue_list->TotalRecords == 0 && !$store_intent_issue->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_intent_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_intent_issue_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_intent_issue_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$store_intent_issue->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_store_intent_issue",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$store_intent_issue_list->terminate();
?>