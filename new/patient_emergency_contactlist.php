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
$patient_emergency_contact_list = new patient_emergency_contact_list();

// Run the page
$patient_emergency_contact_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_emergency_contact_list->isExport()) { ?>
<script>
var fpatient_emergency_contactlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_emergency_contactlist = currentForm = new ew.Form("fpatient_emergency_contactlist", "list");
	fpatient_emergency_contactlist.formKeyCountName = '<?php echo $patient_emergency_contact_list->FormKeyCountName ?>';
	loadjs.done("fpatient_emergency_contactlist");
});
var fpatient_emergency_contactlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_emergency_contactlistsrch = currentSearchForm = new ew.Form("fpatient_emergency_contactlistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_emergency_contactlistsrch.filterList = <?php echo $patient_emergency_contact_list->getFilterList() ?>;
	loadjs.done("fpatient_emergency_contactlistsrch");
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
<?php if (!$patient_emergency_contact_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_emergency_contact_list->TotalRecords > 0 && $patient_emergency_contact_list->ExportOptions->visible()) { ?>
<?php $patient_emergency_contact_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->ImportOptions->visible()) { ?>
<?php $patient_emergency_contact_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->SearchOptions->visible()) { ?>
<?php $patient_emergency_contact_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->FilterOptions->visible()) { ?>
<?php $patient_emergency_contact_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_emergency_contact_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_emergency_contact_list->isExport("print")) { ?>
<?php
if ($patient_emergency_contact_list->DbMasterFilter != "" && $patient_emergency_contact->getCurrentMasterTable() == "patient") {
	if ($patient_emergency_contact_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_emergency_contact_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_emergency_contact_list->isExport() && !$patient_emergency_contact->CurrentAction) { ?>
<form name="fpatient_emergency_contactlistsrch" id="fpatient_emergency_contactlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_emergency_contactlistsrch-search-panel" class="<?php echo $patient_emergency_contact_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_emergency_contact">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_emergency_contact_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_emergency_contact_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_emergency_contact_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_emergency_contact_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_emergency_contact_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_emergency_contact_list->showPageHeader(); ?>
<?php
$patient_emergency_contact_list->showMessage();
?>
<?php if ($patient_emergency_contact_list->TotalRecords > 0 || $patient_emergency_contact->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_emergency_contact_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_emergency_contact">
<?php if (!$patient_emergency_contact_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_emergency_contact_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_emergency_contact_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_emergency_contactlist" id="fpatient_emergency_contactlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<?php if ($patient_emergency_contact->getCurrentMasterTable() == "patient" && $patient_emergency_contact->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_emergency_contact_list->patient_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_emergency_contact" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_emergency_contact_list->TotalRecords > 0 || $patient_emergency_contact_list->isGridEdit()) { ?>
<table id="tbl_patient_emergency_contactlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_emergency_contact->RowType = ROWTYPE_HEADER;

// Render list options
$patient_emergency_contact_list->renderListOptions();

// Render list options (header, left)
$patient_emergency_contact_list->ListOptions->render("header", "left");
?>
<?php if ($patient_emergency_contact_list->id->Visible) { // id ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact_list->id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->id) ?>', 1);"><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact_list->patient_id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->patient_id) ?>', 1);"><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->name->Visible) { // name ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact_list->name->headerCellClass() ?>"><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->name) ?>', 1);"><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->relationship->Visible) { // relationship ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->relationship) == "") { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact_list->relationship->headerCellClass() ?>"><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact_list->relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->relationship) ?>', 1);"><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->relationship->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->relationship->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->telephone->Visible) { // telephone ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact_list->telephone->headerCellClass() ?>"><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact_list->telephone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->telephone) ?>', 1);"><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->telephone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->telephone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->telephone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->address->Visible) { // address ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->address) == "") { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact_list->address->headerCellClass() ?>"><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact_list->address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->address) ?>', 1);"><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->address->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->address->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_list->status->Visible) { // status ?>
	<?php if ($patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact_list->status->headerCellClass() ?>"><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_emergency_contact_list->SortUrl($patient_emergency_contact_list->status) ?>', 1);"><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_emergency_contact_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_emergency_contact_list->ExportAll && $patient_emergency_contact_list->isExport()) {
	$patient_emergency_contact_list->StopRecord = $patient_emergency_contact_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_emergency_contact_list->TotalRecords > $patient_emergency_contact_list->StartRecord + $patient_emergency_contact_list->DisplayRecords - 1)
		$patient_emergency_contact_list->StopRecord = $patient_emergency_contact_list->StartRecord + $patient_emergency_contact_list->DisplayRecords - 1;
	else
		$patient_emergency_contact_list->StopRecord = $patient_emergency_contact_list->TotalRecords;
}
$patient_emergency_contact_list->RecordCount = $patient_emergency_contact_list->StartRecord - 1;
if ($patient_emergency_contact_list->Recordset && !$patient_emergency_contact_list->Recordset->EOF) {
	$patient_emergency_contact_list->Recordset->moveFirst();
	$selectLimit = $patient_emergency_contact_list->UseSelectLimit;
	if (!$selectLimit && $patient_emergency_contact_list->StartRecord > 1)
		$patient_emergency_contact_list->Recordset->move($patient_emergency_contact_list->StartRecord - 1);
} elseif (!$patient_emergency_contact->AllowAddDeleteRow && $patient_emergency_contact_list->StopRecord == 0) {
	$patient_emergency_contact_list->StopRecord = $patient_emergency_contact->GridAddRowCount;
}

// Initialize aggregate
$patient_emergency_contact->RowType = ROWTYPE_AGGREGATEINIT;
$patient_emergency_contact->resetAttributes();
$patient_emergency_contact_list->renderRow();
while ($patient_emergency_contact_list->RecordCount < $patient_emergency_contact_list->StopRecord) {
	$patient_emergency_contact_list->RecordCount++;
	if ($patient_emergency_contact_list->RecordCount >= $patient_emergency_contact_list->StartRecord) {
		$patient_emergency_contact_list->RowCount++;

		// Set up key count
		$patient_emergency_contact_list->KeyCount = $patient_emergency_contact_list->RowIndex;

		// Init row class and style
		$patient_emergency_contact->resetAttributes();
		$patient_emergency_contact->CssClass = "";
		if ($patient_emergency_contact_list->isGridAdd()) {
		} else {
			$patient_emergency_contact_list->loadRowValues($patient_emergency_contact_list->Recordset); // Load row values
		}
		$patient_emergency_contact->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_emergency_contact->RowAttrs->merge(["data-rowindex" => $patient_emergency_contact_list->RowCount, "id" => "r" . $patient_emergency_contact_list->RowCount . "_patient_emergency_contact", "data-rowtype" => $patient_emergency_contact->RowType]);

		// Render row
		$patient_emergency_contact_list->renderRow();

		// Render list options
		$patient_emergency_contact_list->renderListOptions();
?>
	<tr <?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_list->ListOptions->render("body", "left", $patient_emergency_contact_list->RowCount);
?>
	<?php if ($patient_emergency_contact_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_emergency_contact_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact_list->id->viewAttributes() ?>><?php echo $patient_emergency_contact_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_emergency_contact_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_list->patient_id->viewAttributes() ?>><?php echo $patient_emergency_contact_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $patient_emergency_contact_list->name->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact_list->name->viewAttributes() ?>><?php echo $patient_emergency_contact_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->relationship->Visible) { // relationship ?>
		<td data-name="relationship" <?php echo $patient_emergency_contact_list->relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact_list->relationship->viewAttributes() ?>><?php echo $patient_emergency_contact_list->relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->telephone->Visible) { // telephone ?>
		<td data-name="telephone" <?php echo $patient_emergency_contact_list->telephone->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact_list->telephone->viewAttributes() ?>><?php echo $patient_emergency_contact_list->telephone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->address->Visible) { // address ?>
		<td data-name="address" <?php echo $patient_emergency_contact_list->address->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact_list->address->viewAttributes() ?>><?php echo $patient_emergency_contact_list->address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_emergency_contact_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_list->RowCount ?>_patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact_list->status->viewAttributes() ?>><?php echo $patient_emergency_contact_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_list->ListOptions->render("body", "right", $patient_emergency_contact_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_emergency_contact_list->isGridAdd())
		$patient_emergency_contact_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_emergency_contact->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_emergency_contact_list->Recordset)
	$patient_emergency_contact_list->Recordset->Close();
?>
<?php if (!$patient_emergency_contact_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_emergency_contact_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_emergency_contact_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_emergency_contact_list->TotalRecords == 0 && !$patient_emergency_contact->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_emergency_contact_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_emergency_contact_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_emergency_contact",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_emergency_contact_list->terminate();
?>