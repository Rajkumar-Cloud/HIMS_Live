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
$patient_address_list = new patient_address_list();

// Run the page
$patient_address_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_address_list->isExport()) { ?>
<script>
var fpatient_addresslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_addresslist = currentForm = new ew.Form("fpatient_addresslist", "list");
	fpatient_addresslist.formKeyCountName = '<?php echo $patient_address_list->FormKeyCountName ?>';
	loadjs.done("fpatient_addresslist");
});
var fpatient_addresslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_addresslistsrch = currentSearchForm = new ew.Form("fpatient_addresslistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_addresslistsrch.filterList = <?php echo $patient_address_list->getFilterList() ?>;
	loadjs.done("fpatient_addresslistsrch");
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
<?php if (!$patient_address_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_address_list->TotalRecords > 0 && $patient_address_list->ExportOptions->visible()) { ?>
<?php $patient_address_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_address_list->ImportOptions->visible()) { ?>
<?php $patient_address_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_address_list->SearchOptions->visible()) { ?>
<?php $patient_address_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_address_list->FilterOptions->visible()) { ?>
<?php $patient_address_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_address_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_address_list->isExport("print")) { ?>
<?php
if ($patient_address_list->DbMasterFilter != "" && $patient_address->getCurrentMasterTable() == "patient") {
	if ($patient_address_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_address_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_address_list->isExport() && !$patient_address->CurrentAction) { ?>
<form name="fpatient_addresslistsrch" id="fpatient_addresslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_addresslistsrch-search-panel" class="<?php echo $patient_address_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_address">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_address_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_address_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_address_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_address_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_address_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_address_list->showPageHeader(); ?>
<?php
$patient_address_list->showMessage();
?>
<?php if ($patient_address_list->TotalRecords > 0 || $patient_address->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_address_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_address">
<?php if (!$patient_address_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_address_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_address_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_address_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_addresslist" id="fpatient_addresslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<?php if ($patient_address->getCurrentMasterTable() == "patient" && $patient_address->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_address_list->patient_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_address" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_address_list->TotalRecords > 0 || $patient_address_list->isGridEdit()) { ?>
<table id="tbl_patient_addresslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_address->RowType = ROWTYPE_HEADER;

// Render list options
$patient_address_list->renderListOptions();

// Render list options (header, left)
$patient_address_list->ListOptions->render("header", "left");
?>
<?php if ($patient_address_list->id->Visible) { // id ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_address_list->id->headerCellClass() ?>"><div id="elh_patient_address_id" class="patient_address_id"><div class="ew-table-header-caption"><?php echo $patient_address_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_address_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->id) ?>', 1);"><div id="elh_patient_address_id" class="patient_address_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_address_list->patient_id->headerCellClass() ?>"><div id="elh_patient_address_patient_id" class="patient_address_patient_id"><div class="ew-table-header-caption"><?php echo $patient_address_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_address_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->patient_id) ?>', 1);"><div id="elh_patient_address_patient_id" class="patient_address_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->street->Visible) { // street ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient_address_list->street->headerCellClass() ?>"><div id="elh_patient_address_street" class="patient_address_street"><div class="ew-table-header-caption"><?php echo $patient_address_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient_address_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->street) ?>', 1);"><div id="elh_patient_address_street" class="patient_address_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->town->Visible) { // town ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient_address_list->town->headerCellClass() ?>"><div id="elh_patient_address_town" class="patient_address_town"><div class="ew-table-header-caption"><?php echo $patient_address_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient_address_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->town) ?>', 1);"><div id="elh_patient_address_town" class="patient_address_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->province->Visible) { // province ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient_address_list->province->headerCellClass() ?>"><div id="elh_patient_address_province" class="patient_address_province"><div class="ew-table-header-caption"><?php echo $patient_address_list->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient_address_list->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->province) ?>', 1);"><div id="elh_patient_address_province" class="patient_address_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient_address_list->postal_code->headerCellClass() ?>"><div id="elh_patient_address_postal_code" class="patient_address_postal_code"><div class="ew-table-header-caption"><?php echo $patient_address_list->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient_address_list->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->postal_code) ?>', 1);"><div id="elh_patient_address_postal_code" class="patient_address_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->address_type->Visible) { // address_type ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->address_type) == "") { ?>
		<th data-name="address_type" class="<?php echo $patient_address_list->address_type->headerCellClass() ?>"><div id="elh_patient_address_address_type" class="patient_address_address_type"><div class="ew-table-header-caption"><?php echo $patient_address_list->address_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address_type" class="<?php echo $patient_address_list->address_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->address_type) ?>', 1);"><div id="elh_patient_address_address_type" class="patient_address_address_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->address_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->address_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_list->status->Visible) { // status ?>
	<?php if ($patient_address_list->SortUrl($patient_address_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_address_list->status->headerCellClass() ?>"><div id="elh_patient_address_status" class="patient_address_status"><div class="ew-table-header-caption"><?php echo $patient_address_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_address_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_address_list->SortUrl($patient_address_list->status) ?>', 1);"><div id="elh_patient_address_status" class="patient_address_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_address_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_address_list->ExportAll && $patient_address_list->isExport()) {
	$patient_address_list->StopRecord = $patient_address_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_address_list->TotalRecords > $patient_address_list->StartRecord + $patient_address_list->DisplayRecords - 1)
		$patient_address_list->StopRecord = $patient_address_list->StartRecord + $patient_address_list->DisplayRecords - 1;
	else
		$patient_address_list->StopRecord = $patient_address_list->TotalRecords;
}
$patient_address_list->RecordCount = $patient_address_list->StartRecord - 1;
if ($patient_address_list->Recordset && !$patient_address_list->Recordset->EOF) {
	$patient_address_list->Recordset->moveFirst();
	$selectLimit = $patient_address_list->UseSelectLimit;
	if (!$selectLimit && $patient_address_list->StartRecord > 1)
		$patient_address_list->Recordset->move($patient_address_list->StartRecord - 1);
} elseif (!$patient_address->AllowAddDeleteRow && $patient_address_list->StopRecord == 0) {
	$patient_address_list->StopRecord = $patient_address->GridAddRowCount;
}

// Initialize aggregate
$patient_address->RowType = ROWTYPE_AGGREGATEINIT;
$patient_address->resetAttributes();
$patient_address_list->renderRow();
while ($patient_address_list->RecordCount < $patient_address_list->StopRecord) {
	$patient_address_list->RecordCount++;
	if ($patient_address_list->RecordCount >= $patient_address_list->StartRecord) {
		$patient_address_list->RowCount++;

		// Set up key count
		$patient_address_list->KeyCount = $patient_address_list->RowIndex;

		// Init row class and style
		$patient_address->resetAttributes();
		$patient_address->CssClass = "";
		if ($patient_address_list->isGridAdd()) {
		} else {
			$patient_address_list->loadRowValues($patient_address_list->Recordset); // Load row values
		}
		$patient_address->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_address->RowAttrs->merge(["data-rowindex" => $patient_address_list->RowCount, "id" => "r" . $patient_address_list->RowCount . "_patient_address", "data-rowtype" => $patient_address->RowType]);

		// Render row
		$patient_address_list->renderRow();

		// Render list options
		$patient_address_list->renderListOptions();
?>
	<tr <?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_list->ListOptions->render("body", "left", $patient_address_list->RowCount);
?>
	<?php if ($patient_address_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_address_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_id">
<span<?php echo $patient_address_list->id->viewAttributes() ?>><?php echo $patient_address_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_address_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_patient_id">
<span<?php echo $patient_address_list->patient_id->viewAttributes() ?>><?php echo $patient_address_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $patient_address_list->street->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_street">
<span<?php echo $patient_address_list->street->viewAttributes() ?>><?php echo $patient_address_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $patient_address_list->town->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_town">
<span<?php echo $patient_address_list->town->viewAttributes() ?>><?php echo $patient_address_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $patient_address_list->province->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_province">
<span<?php echo $patient_address_list->province->viewAttributes() ?>><?php echo $patient_address_list->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $patient_address_list->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_postal_code">
<span<?php echo $patient_address_list->postal_code->viewAttributes() ?>><?php echo $patient_address_list->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->address_type->Visible) { // address_type ?>
		<td data-name="address_type" <?php echo $patient_address_list->address_type->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_address_type">
<span<?php echo $patient_address_list->address_type->viewAttributes() ?>><?php echo $patient_address_list->address_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_address_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_address_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_address_list->RowCount ?>_patient_address_status">
<span<?php echo $patient_address_list->status->viewAttributes() ?>><?php echo $patient_address_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_address_list->ListOptions->render("body", "right", $patient_address_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_address_list->isGridAdd())
		$patient_address_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_address->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_address_list->Recordset)
	$patient_address_list->Recordset->Close();
?>
<?php if (!$patient_address_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_address_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_address_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_address_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_address_list->TotalRecords == 0 && !$patient_address->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_address_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_address_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_address_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_address->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_address",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_address_list->terminate();
?>