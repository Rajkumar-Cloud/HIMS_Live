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
$patient_telephone_list = new patient_telephone_list();

// Run the page
$patient_telephone_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_telephone_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_telephone_list->isExport()) { ?>
<script>
var fpatient_telephonelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_telephonelist = currentForm = new ew.Form("fpatient_telephonelist", "list");
	fpatient_telephonelist.formKeyCountName = '<?php echo $patient_telephone_list->FormKeyCountName ?>';
	loadjs.done("fpatient_telephonelist");
});
var fpatient_telephonelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_telephonelistsrch = currentSearchForm = new ew.Form("fpatient_telephonelistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_telephonelistsrch.filterList = <?php echo $patient_telephone_list->getFilterList() ?>;
	loadjs.done("fpatient_telephonelistsrch");
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
<?php if (!$patient_telephone_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_telephone_list->TotalRecords > 0 && $patient_telephone_list->ExportOptions->visible()) { ?>
<?php $patient_telephone_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_telephone_list->ImportOptions->visible()) { ?>
<?php $patient_telephone_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_telephone_list->SearchOptions->visible()) { ?>
<?php $patient_telephone_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_telephone_list->FilterOptions->visible()) { ?>
<?php $patient_telephone_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_telephone_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_telephone_list->isExport("print")) { ?>
<?php
if ($patient_telephone_list->DbMasterFilter != "" && $patient_telephone->getCurrentMasterTable() == "patient") {
	if ($patient_telephone_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_telephone_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_telephone_list->isExport() && !$patient_telephone->CurrentAction) { ?>
<form name="fpatient_telephonelistsrch" id="fpatient_telephonelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_telephonelistsrch-search-panel" class="<?php echo $patient_telephone_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_telephone">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_telephone_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_telephone_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_telephone_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_telephone_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_telephone_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_telephone_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_telephone_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_telephone_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_telephone_list->showPageHeader(); ?>
<?php
$patient_telephone_list->showMessage();
?>
<?php if ($patient_telephone_list->TotalRecords > 0 || $patient_telephone->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_telephone_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_telephone">
<?php if (!$patient_telephone_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_telephone_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_telephone_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_telephone_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_telephonelist" id="fpatient_telephonelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_telephone">
<?php if ($patient_telephone->getCurrentMasterTable() == "patient" && $patient_telephone->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_telephone_list->patient_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_telephone" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_telephone_list->TotalRecords > 0 || $patient_telephone_list->isGridEdit()) { ?>
<table id="tbl_patient_telephonelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_telephone->RowType = ROWTYPE_HEADER;

// Render list options
$patient_telephone_list->renderListOptions();

// Render list options (header, left)
$patient_telephone_list->ListOptions->render("header", "left");
?>
<?php if ($patient_telephone_list->id->Visible) { // id ?>
	<?php if ($patient_telephone_list->SortUrl($patient_telephone_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_telephone_list->id->headerCellClass() ?>"><div id="elh_patient_telephone_id" class="patient_telephone_id"><div class="ew-table-header-caption"><?php echo $patient_telephone_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_telephone_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_telephone_list->SortUrl($patient_telephone_list->id) ?>', 1);"><div id="elh_patient_telephone_id" class="patient_telephone_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_list->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_telephone_list->SortUrl($patient_telephone_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_telephone_list->patient_id->headerCellClass() ?>"><div id="elh_patient_telephone_patient_id" class="patient_telephone_patient_id"><div class="ew-table-header-caption"><?php echo $patient_telephone_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_telephone_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_telephone_list->SortUrl($patient_telephone_list->patient_id) ?>', 1);"><div id="elh_patient_telephone_patient_id" class="patient_telephone_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_list->tele_type->Visible) { // tele_type ?>
	<?php if ($patient_telephone_list->SortUrl($patient_telephone_list->tele_type) == "") { ?>
		<th data-name="tele_type" class="<?php echo $patient_telephone_list->tele_type->headerCellClass() ?>"><div id="elh_patient_telephone_tele_type" class="patient_telephone_tele_type"><div class="ew-table-header-caption"><?php echo $patient_telephone_list->tele_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tele_type" class="<?php echo $patient_telephone_list->tele_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_telephone_list->SortUrl($patient_telephone_list->tele_type) ?>', 1);"><div id="elh_patient_telephone_tele_type" class="patient_telephone_tele_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_list->tele_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_list->tele_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_list->tele_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_list->telephone->Visible) { // telephone ?>
	<?php if ($patient_telephone_list->SortUrl($patient_telephone_list->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $patient_telephone_list->telephone->headerCellClass() ?>"><div id="elh_patient_telephone_telephone" class="patient_telephone_telephone"><div class="ew-table-header-caption"><?php echo $patient_telephone_list->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $patient_telephone_list->telephone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_telephone_list->SortUrl($patient_telephone_list->telephone) ?>', 1);"><div id="elh_patient_telephone_telephone" class="patient_telephone_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_list->telephone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_list->telephone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_list->telephone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_list->telephone_type->Visible) { // telephone_type ?>
	<?php if ($patient_telephone_list->SortUrl($patient_telephone_list->telephone_type) == "") { ?>
		<th data-name="telephone_type" class="<?php echo $patient_telephone_list->telephone_type->headerCellClass() ?>"><div id="elh_patient_telephone_telephone_type" class="patient_telephone_telephone_type"><div class="ew-table-header-caption"><?php echo $patient_telephone_list->telephone_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone_type" class="<?php echo $patient_telephone_list->telephone_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_telephone_list->SortUrl($patient_telephone_list->telephone_type) ?>', 1);"><div id="elh_patient_telephone_telephone_type" class="patient_telephone_telephone_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_list->telephone_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_list->telephone_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_list->telephone_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_list->status->Visible) { // status ?>
	<?php if ($patient_telephone_list->SortUrl($patient_telephone_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_telephone_list->status->headerCellClass() ?>"><div id="elh_patient_telephone_status" class="patient_telephone_status"><div class="ew-table-header-caption"><?php echo $patient_telephone_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_telephone_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_telephone_list->SortUrl($patient_telephone_list->status) ?>', 1);"><div id="elh_patient_telephone_status" class="patient_telephone_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_telephone_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_telephone_list->ExportAll && $patient_telephone_list->isExport()) {
	$patient_telephone_list->StopRecord = $patient_telephone_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_telephone_list->TotalRecords > $patient_telephone_list->StartRecord + $patient_telephone_list->DisplayRecords - 1)
		$patient_telephone_list->StopRecord = $patient_telephone_list->StartRecord + $patient_telephone_list->DisplayRecords - 1;
	else
		$patient_telephone_list->StopRecord = $patient_telephone_list->TotalRecords;
}
$patient_telephone_list->RecordCount = $patient_telephone_list->StartRecord - 1;
if ($patient_telephone_list->Recordset && !$patient_telephone_list->Recordset->EOF) {
	$patient_telephone_list->Recordset->moveFirst();
	$selectLimit = $patient_telephone_list->UseSelectLimit;
	if (!$selectLimit && $patient_telephone_list->StartRecord > 1)
		$patient_telephone_list->Recordset->move($patient_telephone_list->StartRecord - 1);
} elseif (!$patient_telephone->AllowAddDeleteRow && $patient_telephone_list->StopRecord == 0) {
	$patient_telephone_list->StopRecord = $patient_telephone->GridAddRowCount;
}

// Initialize aggregate
$patient_telephone->RowType = ROWTYPE_AGGREGATEINIT;
$patient_telephone->resetAttributes();
$patient_telephone_list->renderRow();
while ($patient_telephone_list->RecordCount < $patient_telephone_list->StopRecord) {
	$patient_telephone_list->RecordCount++;
	if ($patient_telephone_list->RecordCount >= $patient_telephone_list->StartRecord) {
		$patient_telephone_list->RowCount++;

		// Set up key count
		$patient_telephone_list->KeyCount = $patient_telephone_list->RowIndex;

		// Init row class and style
		$patient_telephone->resetAttributes();
		$patient_telephone->CssClass = "";
		if ($patient_telephone_list->isGridAdd()) {
		} else {
			$patient_telephone_list->loadRowValues($patient_telephone_list->Recordset); // Load row values
		}
		$patient_telephone->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_telephone->RowAttrs->merge(["data-rowindex" => $patient_telephone_list->RowCount, "id" => "r" . $patient_telephone_list->RowCount . "_patient_telephone", "data-rowtype" => $patient_telephone->RowType]);

		// Render row
		$patient_telephone_list->renderRow();

		// Render list options
		$patient_telephone_list->renderListOptions();
?>
	<tr <?php echo $patient_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_telephone_list->ListOptions->render("body", "left", $patient_telephone_list->RowCount);
?>
	<?php if ($patient_telephone_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_telephone_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_list->RowCount ?>_patient_telephone_id">
<span<?php echo $patient_telephone_list->id->viewAttributes() ?>><?php echo $patient_telephone_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_telephone_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_telephone_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_list->RowCount ?>_patient_telephone_patient_id">
<span<?php echo $patient_telephone_list->patient_id->viewAttributes() ?>><?php echo $patient_telephone_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_telephone_list->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type" <?php echo $patient_telephone_list->tele_type->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_list->RowCount ?>_patient_telephone_tele_type">
<span<?php echo $patient_telephone_list->tele_type->viewAttributes() ?>><?php echo $patient_telephone_list->tele_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_telephone_list->telephone->Visible) { // telephone ?>
		<td data-name="telephone" <?php echo $patient_telephone_list->telephone->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_list->RowCount ?>_patient_telephone_telephone">
<span<?php echo $patient_telephone_list->telephone->viewAttributes() ?>><?php echo $patient_telephone_list->telephone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_telephone_list->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type" <?php echo $patient_telephone_list->telephone_type->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_list->RowCount ?>_patient_telephone_telephone_type">
<span<?php echo $patient_telephone_list->telephone_type->viewAttributes() ?>><?php echo $patient_telephone_list->telephone_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_telephone_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_telephone_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_telephone_list->RowCount ?>_patient_telephone_status">
<span<?php echo $patient_telephone_list->status->viewAttributes() ?>><?php echo $patient_telephone_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_telephone_list->ListOptions->render("body", "right", $patient_telephone_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_telephone_list->isGridAdd())
		$patient_telephone_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_telephone->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_telephone_list->Recordset)
	$patient_telephone_list->Recordset->Close();
?>
<?php if (!$patient_telephone_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_telephone_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_telephone_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_telephone_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_telephone_list->TotalRecords == 0 && !$patient_telephone->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_telephone_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_telephone_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_telephone_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_telephone->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_telephone",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_telephone_list->terminate();
?>