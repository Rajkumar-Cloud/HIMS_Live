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
$hospital_pharmacy_list = new hospital_pharmacy_list();

// Run the page
$hospital_pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_pharmacy_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospital_pharmacy_list->isExport()) { ?>
<script>
var fhospital_pharmacylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fhospital_pharmacylist = currentForm = new ew.Form("fhospital_pharmacylist", "list");
	fhospital_pharmacylist.formKeyCountName = '<?php echo $hospital_pharmacy_list->FormKeyCountName ?>';
	loadjs.done("fhospital_pharmacylist");
});
var fhospital_pharmacylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fhospital_pharmacylistsrch = currentSearchForm = new ew.Form("fhospital_pharmacylistsrch");

	// Dynamic selection lists
	// Filters

	fhospital_pharmacylistsrch.filterList = <?php echo $hospital_pharmacy_list->getFilterList() ?>;
	loadjs.done("fhospital_pharmacylistsrch");
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
<?php if (!$hospital_pharmacy_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hospital_pharmacy_list->TotalRecords > 0 && $hospital_pharmacy_list->ExportOptions->visible()) { ?>
<?php $hospital_pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->ImportOptions->visible()) { ?>
<?php $hospital_pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->SearchOptions->visible()) { ?>
<?php $hospital_pharmacy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->FilterOptions->visible()) { ?>
<?php $hospital_pharmacy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hospital_pharmacy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hospital_pharmacy_list->isExport() && !$hospital_pharmacy->CurrentAction) { ?>
<form name="fhospital_pharmacylistsrch" id="fhospital_pharmacylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fhospital_pharmacylistsrch-search-panel" class="<?php echo $hospital_pharmacy_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospital_pharmacy">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $hospital_pharmacy_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($hospital_pharmacy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($hospital_pharmacy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hospital_pharmacy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $hospital_pharmacy_list->showPageHeader(); ?>
<?php
$hospital_pharmacy_list->showMessage();
?>
<?php if ($hospital_pharmacy_list->TotalRecords > 0 || $hospital_pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hospital_pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospital_pharmacy">
<?php if (!$hospital_pharmacy_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hospital_pharmacy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hospital_pharmacy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhospital_pharmacylist" id="fhospital_pharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_pharmacy">
<div id="gmp_hospital_pharmacy" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($hospital_pharmacy_list->TotalRecords > 0 || $hospital_pharmacy_list->isGridEdit()) { ?>
<table id="tbl_hospital_pharmacylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hospital_pharmacy->RowType = ROWTYPE_HEADER;

// Render list options
$hospital_pharmacy_list->renderListOptions();

// Render list options (header, left)
$hospital_pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($hospital_pharmacy_list->id->Visible) { // id ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $hospital_pharmacy_list->id->headerCellClass() ?>"><div id="elh_hospital_pharmacy_id" class="hospital_pharmacy_id"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hospital_pharmacy_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->id) ?>', 1);"><div id="elh_hospital_pharmacy_id" class="hospital_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->pharmacy->Visible) { // pharmacy ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->pharmacy) == "") { ?>
		<th data-name="pharmacy" class="<?php echo $hospital_pharmacy_list->pharmacy->headerCellClass() ?>"><div id="elh_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy" class="<?php echo $hospital_pharmacy_list->pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->pharmacy) ?>', 1);"><div id="elh_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->pharmacy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->pharmacy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->pharmacy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->street->Visible) { // street ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $hospital_pharmacy_list->street->headerCellClass() ?>"><div id="elh_hospital_pharmacy_street" class="hospital_pharmacy_street"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $hospital_pharmacy_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->street) ?>', 1);"><div id="elh_hospital_pharmacy_street" class="hospital_pharmacy_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->area->Visible) { // area ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->area) == "") { ?>
		<th data-name="area" class="<?php echo $hospital_pharmacy_list->area->headerCellClass() ?>"><div id="elh_hospital_pharmacy_area" class="hospital_pharmacy_area"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $hospital_pharmacy_list->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->area) ?>', 1);"><div id="elh_hospital_pharmacy_area" class="hospital_pharmacy_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->area->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->area->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->town->Visible) { // town ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $hospital_pharmacy_list->town->headerCellClass() ?>"><div id="elh_hospital_pharmacy_town" class="hospital_pharmacy_town"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $hospital_pharmacy_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->town) ?>', 1);"><div id="elh_hospital_pharmacy_town" class="hospital_pharmacy_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->province->Visible) { // province ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $hospital_pharmacy_list->province->headerCellClass() ?>"><div id="elh_hospital_pharmacy_province" class="hospital_pharmacy_province"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $hospital_pharmacy_list->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->province) ?>', 1);"><div id="elh_hospital_pharmacy_province" class="hospital_pharmacy_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->postal_code->Visible) { // postal_code ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $hospital_pharmacy_list->postal_code->headerCellClass() ?>"><div id="elh_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $hospital_pharmacy_list->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->postal_code) ?>', 1);"><div id="elh_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->phone_no->Visible) { // phone_no ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $hospital_pharmacy_list->phone_no->headerCellClass() ?>"><div id="elh_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $hospital_pharmacy_list->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->phone_no) ?>', 1);"><div id="elh_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->phone_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->phone_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->PreFixCode->Visible) { // PreFixCode ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->PreFixCode) == "") { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_pharmacy_list->PreFixCode->headerCellClass() ?>"><div id="elh_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->PreFixCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_pharmacy_list->PreFixCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->PreFixCode) ?>', 1);"><div id="elh_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->PreFixCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->PreFixCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->PreFixCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->status->Visible) { // status ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $hospital_pharmacy_list->status->headerCellClass() ?>"><div id="elh_hospital_pharmacy_status" class="hospital_pharmacy_status"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hospital_pharmacy_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->status) ?>', 1);"><div id="elh_hospital_pharmacy_status" class="hospital_pharmacy_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->createdby->Visible) { // createdby ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $hospital_pharmacy_list->createdby->headerCellClass() ?>"><div id="elh_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $hospital_pharmacy_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->createdby) ?>', 1);"><div id="elh_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $hospital_pharmacy_list->createddatetime->headerCellClass() ?>"><div id="elh_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $hospital_pharmacy_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->createddatetime) ?>', 1);"><div id="elh_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $hospital_pharmacy_list->modifiedby->headerCellClass() ?>"><div id="elh_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $hospital_pharmacy_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->modifiedby) ?>', 1);"><div id="elh_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $hospital_pharmacy_list->modifieddatetime->headerCellClass() ?>"><div id="elh_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $hospital_pharmacy_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->modifieddatetime) ?>', 1);"><div id="elh_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->pharmacyGST->Visible) { // pharmacyGST ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->pharmacyGST) == "") { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_pharmacy_list->pharmacyGST->headerCellClass() ?>"><div id="elh_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->pharmacyGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_pharmacy_list->pharmacyGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->pharmacyGST) ?>', 1);"><div id="elh_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->pharmacyGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->pharmacyGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->pharmacyGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->HospId->Visible) { // HospId ?>
	<?php if ($hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->HospId) == "") { ?>
		<th data-name="HospId" class="<?php echo $hospital_pharmacy_list->HospId->headerCellClass() ?>"><div id="elh_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->HospId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospId" class="<?php echo $hospital_pharmacy_list->HospId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_pharmacy_list->SortUrl($hospital_pharmacy_list->HospId) ?>', 1);"><div id="elh_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy_list->HospId->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy_list->HospId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_pharmacy_list->HospId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hospital_pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hospital_pharmacy_list->ExportAll && $hospital_pharmacy_list->isExport()) {
	$hospital_pharmacy_list->StopRecord = $hospital_pharmacy_list->TotalRecords;
} else {

	// Set the last record to display
	if ($hospital_pharmacy_list->TotalRecords > $hospital_pharmacy_list->StartRecord + $hospital_pharmacy_list->DisplayRecords - 1)
		$hospital_pharmacy_list->StopRecord = $hospital_pharmacy_list->StartRecord + $hospital_pharmacy_list->DisplayRecords - 1;
	else
		$hospital_pharmacy_list->StopRecord = $hospital_pharmacy_list->TotalRecords;
}
$hospital_pharmacy_list->RecordCount = $hospital_pharmacy_list->StartRecord - 1;
if ($hospital_pharmacy_list->Recordset && !$hospital_pharmacy_list->Recordset->EOF) {
	$hospital_pharmacy_list->Recordset->moveFirst();
	$selectLimit = $hospital_pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $hospital_pharmacy_list->StartRecord > 1)
		$hospital_pharmacy_list->Recordset->move($hospital_pharmacy_list->StartRecord - 1);
} elseif (!$hospital_pharmacy->AllowAddDeleteRow && $hospital_pharmacy_list->StopRecord == 0) {
	$hospital_pharmacy_list->StopRecord = $hospital_pharmacy->GridAddRowCount;
}

// Initialize aggregate
$hospital_pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$hospital_pharmacy->resetAttributes();
$hospital_pharmacy_list->renderRow();
while ($hospital_pharmacy_list->RecordCount < $hospital_pharmacy_list->StopRecord) {
	$hospital_pharmacy_list->RecordCount++;
	if ($hospital_pharmacy_list->RecordCount >= $hospital_pharmacy_list->StartRecord) {
		$hospital_pharmacy_list->RowCount++;

		// Set up key count
		$hospital_pharmacy_list->KeyCount = $hospital_pharmacy_list->RowIndex;

		// Init row class and style
		$hospital_pharmacy->resetAttributes();
		$hospital_pharmacy->CssClass = "";
		if ($hospital_pharmacy_list->isGridAdd()) {
		} else {
			$hospital_pharmacy_list->loadRowValues($hospital_pharmacy_list->Recordset); // Load row values
		}
		$hospital_pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hospital_pharmacy->RowAttrs->merge(["data-rowindex" => $hospital_pharmacy_list->RowCount, "id" => "r" . $hospital_pharmacy_list->RowCount . "_hospital_pharmacy", "data-rowtype" => $hospital_pharmacy->RowType]);

		// Render row
		$hospital_pharmacy_list->renderRow();

		// Render list options
		$hospital_pharmacy_list->renderListOptions();
?>
	<tr <?php echo $hospital_pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hospital_pharmacy_list->ListOptions->render("body", "left", $hospital_pharmacy_list->RowCount);
?>
	<?php if ($hospital_pharmacy_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $hospital_pharmacy_list->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_id">
<span<?php echo $hospital_pharmacy_list->id->viewAttributes() ?>><?php echo $hospital_pharmacy_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy" <?php echo $hospital_pharmacy_list->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_pharmacy">
<span<?php echo $hospital_pharmacy_list->pharmacy->viewAttributes() ?>><?php echo $hospital_pharmacy_list->pharmacy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $hospital_pharmacy_list->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_street">
<span<?php echo $hospital_pharmacy_list->street->viewAttributes() ?>><?php echo $hospital_pharmacy_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->area->Visible) { // area ?>
		<td data-name="area" <?php echo $hospital_pharmacy_list->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_area">
<span<?php echo $hospital_pharmacy_list->area->viewAttributes() ?>><?php echo $hospital_pharmacy_list->area->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $hospital_pharmacy_list->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_town">
<span<?php echo $hospital_pharmacy_list->town->viewAttributes() ?>><?php echo $hospital_pharmacy_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $hospital_pharmacy_list->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_province">
<span<?php echo $hospital_pharmacy_list->province->viewAttributes() ?>><?php echo $hospital_pharmacy_list->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $hospital_pharmacy_list->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_postal_code">
<span<?php echo $hospital_pharmacy_list->postal_code->viewAttributes() ?>><?php echo $hospital_pharmacy_list->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no" <?php echo $hospital_pharmacy_list->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_phone_no">
<span<?php echo $hospital_pharmacy_list->phone_no->viewAttributes() ?>><?php echo $hospital_pharmacy_list->phone_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->PreFixCode->Visible) { // PreFixCode ?>
		<td data-name="PreFixCode" <?php echo $hospital_pharmacy_list->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_PreFixCode">
<span<?php echo $hospital_pharmacy_list->PreFixCode->viewAttributes() ?>><?php echo $hospital_pharmacy_list->PreFixCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $hospital_pharmacy_list->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_status">
<span<?php echo $hospital_pharmacy_list->status->viewAttributes() ?>><?php echo $hospital_pharmacy_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $hospital_pharmacy_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_createdby">
<span<?php echo $hospital_pharmacy_list->createdby->viewAttributes() ?>><?php echo $hospital_pharmacy_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $hospital_pharmacy_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_createddatetime">
<span<?php echo $hospital_pharmacy_list->createddatetime->viewAttributes() ?>><?php echo $hospital_pharmacy_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $hospital_pharmacy_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_modifiedby">
<span<?php echo $hospital_pharmacy_list->modifiedby->viewAttributes() ?>><?php echo $hospital_pharmacy_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $hospital_pharmacy_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_modifieddatetime">
<span<?php echo $hospital_pharmacy_list->modifieddatetime->viewAttributes() ?>><?php echo $hospital_pharmacy_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->pharmacyGST->Visible) { // pharmacyGST ?>
		<td data-name="pharmacyGST" <?php echo $hospital_pharmacy_list->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_pharmacyGST">
<span<?php echo $hospital_pharmacy_list->pharmacyGST->viewAttributes() ?>><?php echo $hospital_pharmacy_list->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->HospId->Visible) { // HospId ?>
		<td data-name="HospId" <?php echo $hospital_pharmacy_list->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCount ?>_hospital_pharmacy_HospId">
<span<?php echo $hospital_pharmacy_list->HospId->viewAttributes() ?>><?php echo $hospital_pharmacy_list->HospId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hospital_pharmacy_list->ListOptions->render("body", "right", $hospital_pharmacy_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$hospital_pharmacy_list->isGridAdd())
		$hospital_pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$hospital_pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hospital_pharmacy_list->Recordset)
	$hospital_pharmacy_list->Recordset->Close();
?>
<?php if (!$hospital_pharmacy_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hospital_pharmacy_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hospital_pharmacy_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hospital_pharmacy_list->TotalRecords == 0 && !$hospital_pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hospital_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hospital_pharmacy_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospital_pharmacy_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_hospital_pharmacy",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$hospital_pharmacy_list->terminate();
?>