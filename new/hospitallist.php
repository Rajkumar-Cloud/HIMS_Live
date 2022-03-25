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
$hospital_list = new hospital_list();

// Run the page
$hospital_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$hospital_list->isExport()) { ?>
<script>
var fhospitallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fhospitallist = currentForm = new ew.Form("fhospitallist", "list");
	fhospitallist.formKeyCountName = '<?php echo $hospital_list->FormKeyCountName ?>';
	loadjs.done("fhospitallist");
});
var fhospitallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fhospitallistsrch = currentSearchForm = new ew.Form("fhospitallistsrch");

	// Dynamic selection lists
	// Filters

	fhospitallistsrch.filterList = <?php echo $hospital_list->getFilterList() ?>;
	loadjs.done("fhospitallistsrch");
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
<?php if (!$hospital_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hospital_list->TotalRecords > 0 && $hospital_list->ExportOptions->visible()) { ?>
<?php $hospital_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_list->ImportOptions->visible()) { ?>
<?php $hospital_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_list->SearchOptions->visible()) { ?>
<?php $hospital_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_list->FilterOptions->visible()) { ?>
<?php $hospital_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hospital_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hospital_list->isExport() && !$hospital->CurrentAction) { ?>
<form name="fhospitallistsrch" id="fhospitallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fhospitallistsrch-search-panel" class="<?php echo $hospital_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospital">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $hospital_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($hospital_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($hospital_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hospital_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $hospital_list->showPageHeader(); ?>
<?php
$hospital_list->showMessage();
?>
<?php if ($hospital_list->TotalRecords > 0 || $hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hospital_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospital">
<?php if (!$hospital_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhospitallist" id="fhospitallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<div id="gmp_hospital" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($hospital_list->TotalRecords > 0 || $hospital_list->isGridEdit()) { ?>
<table id="tbl_hospitallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hospital->RowType = ROWTYPE_HEADER;

// Render list options
$hospital_list->renderListOptions();

// Render list options (header, left)
$hospital_list->ListOptions->render("header", "left");
?>
<?php if ($hospital_list->id->Visible) { // id ?>
	<?php if ($hospital_list->SortUrl($hospital_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $hospital_list->id->headerCellClass() ?>"><div id="elh_hospital_id" class="hospital_id"><div class="ew-table-header-caption"><?php echo $hospital_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hospital_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->id) ?>', 1);"><div id="elh_hospital_id" class="hospital_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->hospital->Visible) { // hospital ?>
	<?php if ($hospital_list->SortUrl($hospital_list->hospital) == "") { ?>
		<th data-name="hospital" class="<?php echo $hospital_list->hospital->headerCellClass() ?>"><div id="elh_hospital_hospital" class="hospital_hospital"><div class="ew-table-header-caption"><?php echo $hospital_list->hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital" class="<?php echo $hospital_list->hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->hospital) ?>', 1);"><div id="elh_hospital_hospital" class="hospital_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->hospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->hospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->street->Visible) { // street ?>
	<?php if ($hospital_list->SortUrl($hospital_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $hospital_list->street->headerCellClass() ?>"><div id="elh_hospital_street" class="hospital_street"><div class="ew-table-header-caption"><?php echo $hospital_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $hospital_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->street) ?>', 1);"><div id="elh_hospital_street" class="hospital_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->area->Visible) { // area ?>
	<?php if ($hospital_list->SortUrl($hospital_list->area) == "") { ?>
		<th data-name="area" class="<?php echo $hospital_list->area->headerCellClass() ?>"><div id="elh_hospital_area" class="hospital_area"><div class="ew-table-header-caption"><?php echo $hospital_list->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $hospital_list->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->area) ?>', 1);"><div id="elh_hospital_area" class="hospital_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->area->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->area->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->town->Visible) { // town ?>
	<?php if ($hospital_list->SortUrl($hospital_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $hospital_list->town->headerCellClass() ?>"><div id="elh_hospital_town" class="hospital_town"><div class="ew-table-header-caption"><?php echo $hospital_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $hospital_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->town) ?>', 1);"><div id="elh_hospital_town" class="hospital_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->province->Visible) { // province ?>
	<?php if ($hospital_list->SortUrl($hospital_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $hospital_list->province->headerCellClass() ?>"><div id="elh_hospital_province" class="hospital_province"><div class="ew-table-header-caption"><?php echo $hospital_list->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $hospital_list->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->province) ?>', 1);"><div id="elh_hospital_province" class="hospital_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->postal_code->Visible) { // postal_code ?>
	<?php if ($hospital_list->SortUrl($hospital_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $hospital_list->postal_code->headerCellClass() ?>"><div id="elh_hospital_postal_code" class="hospital_postal_code"><div class="ew-table-header-caption"><?php echo $hospital_list->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $hospital_list->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->postal_code) ?>', 1);"><div id="elh_hospital_postal_code" class="hospital_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->phone_no->Visible) { // phone_no ?>
	<?php if ($hospital_list->SortUrl($hospital_list->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $hospital_list->phone_no->headerCellClass() ?>"><div id="elh_hospital_phone_no" class="hospital_phone_no"><div class="ew-table-header-caption"><?php echo $hospital_list->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $hospital_list->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->phone_no) ?>', 1);"><div id="elh_hospital_phone_no" class="hospital_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->phone_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->phone_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->status->Visible) { // status ?>
	<?php if ($hospital_list->SortUrl($hospital_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $hospital_list->status->headerCellClass() ?>"><div id="elh_hospital_status" class="hospital_status"><div class="ew-table-header-caption"><?php echo $hospital_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hospital_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->status) ?>', 1);"><div id="elh_hospital_status" class="hospital_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->PreFixCode->Visible) { // PreFixCode ?>
	<?php if ($hospital_list->SortUrl($hospital_list->PreFixCode) == "") { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_list->PreFixCode->headerCellClass() ?>"><div id="elh_hospital_PreFixCode" class="hospital_PreFixCode"><div class="ew-table-header-caption"><?php echo $hospital_list->PreFixCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_list->PreFixCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->PreFixCode) ?>', 1);"><div id="elh_hospital_PreFixCode" class="hospital_PreFixCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->PreFixCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->PreFixCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->PreFixCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->BillingGST->Visible) { // BillingGST ?>
	<?php if ($hospital_list->SortUrl($hospital_list->BillingGST) == "") { ?>
		<th data-name="BillingGST" class="<?php echo $hospital_list->BillingGST->headerCellClass() ?>"><div id="elh_hospital_BillingGST" class="hospital_BillingGST"><div class="ew-table-header-caption"><?php echo $hospital_list->BillingGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingGST" class="<?php echo $hospital_list->BillingGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->BillingGST) ?>', 1);"><div id="elh_hospital_BillingGST" class="hospital_BillingGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->BillingGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->BillingGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->BillingGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_list->pharmacyGST->Visible) { // pharmacyGST ?>
	<?php if ($hospital_list->SortUrl($hospital_list->pharmacyGST) == "") { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_list->pharmacyGST->headerCellClass() ?>"><div id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST"><div class="ew-table-header-caption"><?php echo $hospital_list->pharmacyGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_list->pharmacyGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $hospital_list->SortUrl($hospital_list->pharmacyGST) ?>', 1);"><div id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_list->pharmacyGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_list->pharmacyGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($hospital_list->pharmacyGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hospital_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hospital_list->ExportAll && $hospital_list->isExport()) {
	$hospital_list->StopRecord = $hospital_list->TotalRecords;
} else {

	// Set the last record to display
	if ($hospital_list->TotalRecords > $hospital_list->StartRecord + $hospital_list->DisplayRecords - 1)
		$hospital_list->StopRecord = $hospital_list->StartRecord + $hospital_list->DisplayRecords - 1;
	else
		$hospital_list->StopRecord = $hospital_list->TotalRecords;
}
$hospital_list->RecordCount = $hospital_list->StartRecord - 1;
if ($hospital_list->Recordset && !$hospital_list->Recordset->EOF) {
	$hospital_list->Recordset->moveFirst();
	$selectLimit = $hospital_list->UseSelectLimit;
	if (!$selectLimit && $hospital_list->StartRecord > 1)
		$hospital_list->Recordset->move($hospital_list->StartRecord - 1);
} elseif (!$hospital->AllowAddDeleteRow && $hospital_list->StopRecord == 0) {
	$hospital_list->StopRecord = $hospital->GridAddRowCount;
}

// Initialize aggregate
$hospital->RowType = ROWTYPE_AGGREGATEINIT;
$hospital->resetAttributes();
$hospital_list->renderRow();
while ($hospital_list->RecordCount < $hospital_list->StopRecord) {
	$hospital_list->RecordCount++;
	if ($hospital_list->RecordCount >= $hospital_list->StartRecord) {
		$hospital_list->RowCount++;

		// Set up key count
		$hospital_list->KeyCount = $hospital_list->RowIndex;

		// Init row class and style
		$hospital->resetAttributes();
		$hospital->CssClass = "";
		if ($hospital_list->isGridAdd()) {
		} else {
			$hospital_list->loadRowValues($hospital_list->Recordset); // Load row values
		}
		$hospital->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hospital->RowAttrs->merge(["data-rowindex" => $hospital_list->RowCount, "id" => "r" . $hospital_list->RowCount . "_hospital", "data-rowtype" => $hospital->RowType]);

		// Render row
		$hospital_list->renderRow();

		// Render list options
		$hospital_list->renderListOptions();
?>
	<tr <?php echo $hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hospital_list->ListOptions->render("body", "left", $hospital_list->RowCount);
?>
	<?php if ($hospital_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $hospital_list->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_id">
<span<?php echo $hospital_list->id->viewAttributes() ?>><?php echo $hospital_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->hospital->Visible) { // hospital ?>
		<td data-name="hospital" <?php echo $hospital_list->hospital->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_hospital">
<span<?php echo $hospital_list->hospital->viewAttributes() ?>><?php echo $hospital_list->hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $hospital_list->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_street">
<span<?php echo $hospital_list->street->viewAttributes() ?>><?php echo $hospital_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->area->Visible) { // area ?>
		<td data-name="area" <?php echo $hospital_list->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_area">
<span<?php echo $hospital_list->area->viewAttributes() ?>><?php echo $hospital_list->area->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $hospital_list->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_town">
<span<?php echo $hospital_list->town->viewAttributes() ?>><?php echo $hospital_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $hospital_list->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_province">
<span<?php echo $hospital_list->province->viewAttributes() ?>><?php echo $hospital_list->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $hospital_list->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_postal_code">
<span<?php echo $hospital_list->postal_code->viewAttributes() ?>><?php echo $hospital_list->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no" <?php echo $hospital_list->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_phone_no">
<span<?php echo $hospital_list->phone_no->viewAttributes() ?>><?php echo $hospital_list->phone_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $hospital_list->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_status">
<span<?php echo $hospital_list->status->viewAttributes() ?>><?php echo $hospital_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->PreFixCode->Visible) { // PreFixCode ?>
		<td data-name="PreFixCode" <?php echo $hospital_list->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_PreFixCode">
<span<?php echo $hospital_list->PreFixCode->viewAttributes() ?>><?php echo $hospital_list->PreFixCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->BillingGST->Visible) { // BillingGST ?>
		<td data-name="BillingGST" <?php echo $hospital_list->BillingGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_BillingGST">
<span<?php echo $hospital_list->BillingGST->viewAttributes() ?>><?php echo $hospital_list->BillingGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_list->pharmacyGST->Visible) { // pharmacyGST ?>
		<td data-name="pharmacyGST" <?php echo $hospital_list->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCount ?>_hospital_pharmacyGST">
<span<?php echo $hospital_list->pharmacyGST->viewAttributes() ?>><?php echo $hospital_list->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hospital_list->ListOptions->render("body", "right", $hospital_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$hospital_list->isGridAdd())
		$hospital_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$hospital->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hospital_list->Recordset)
	$hospital_list->Recordset->Close();
?>
<?php if (!$hospital_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hospital_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $hospital_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hospital_list->TotalRecords == 0 && !$hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hospital_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$hospital_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$hospital->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_hospital",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$hospital_list->terminate();
?>