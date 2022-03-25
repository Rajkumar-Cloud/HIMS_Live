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
$patient_email_list = new patient_email_list();

// Run the page
$patient_email_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_email_list->isExport()) { ?>
<script>
var fpatient_emaillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_emaillist = currentForm = new ew.Form("fpatient_emaillist", "list");
	fpatient_emaillist.formKeyCountName = '<?php echo $patient_email_list->FormKeyCountName ?>';
	loadjs.done("fpatient_emaillist");
});
var fpatient_emaillistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_emaillistsrch = currentSearchForm = new ew.Form("fpatient_emaillistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_emaillistsrch.filterList = <?php echo $patient_email_list->getFilterList() ?>;
	loadjs.done("fpatient_emaillistsrch");
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
<?php if (!$patient_email_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_email_list->TotalRecords > 0 && $patient_email_list->ExportOptions->visible()) { ?>
<?php $patient_email_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_email_list->ImportOptions->visible()) { ?>
<?php $patient_email_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_email_list->SearchOptions->visible()) { ?>
<?php $patient_email_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_email_list->FilterOptions->visible()) { ?>
<?php $patient_email_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_email_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_email_list->isExport("print")) { ?>
<?php
if ($patient_email_list->DbMasterFilter != "" && $patient_email->getCurrentMasterTable() == "patient") {
	if ($patient_email_list->MasterRecordExists) {
		include_once "patientmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_email_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_email_list->isExport() && !$patient_email->CurrentAction) { ?>
<form name="fpatient_emaillistsrch" id="fpatient_emaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_emaillistsrch-search-panel" class="<?php echo $patient_email_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_email">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_email_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_email_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_email_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_email_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_email_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_email_list->showPageHeader(); ?>
<?php
$patient_email_list->showMessage();
?>
<?php if ($patient_email_list->TotalRecords > 0 || $patient_email->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_email_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_email">
<?php if (!$patient_email_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_email_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_email_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_emaillist" id="fpatient_emaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_email">
<?php if ($patient_email->getCurrentMasterTable() == "patient" && $patient_email->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_email_list->patient_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_email" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_email_list->TotalRecords > 0 || $patient_email_list->isGridEdit()) { ?>
<table id="tbl_patient_emaillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_email->RowType = ROWTYPE_HEADER;

// Render list options
$patient_email_list->renderListOptions();

// Render list options (header, left)
$patient_email_list->ListOptions->render("header", "left");
?>
<?php if ($patient_email_list->id->Visible) { // id ?>
	<?php if ($patient_email_list->SortUrl($patient_email_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_email_list->id->headerCellClass() ?>"><div id="elh_patient_email_id" class="patient_email_id"><div class="ew-table-header-caption"><?php echo $patient_email_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_email_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_email_list->SortUrl($patient_email_list->id) ?>', 1);"><div id="elh_patient_email_id" class="patient_email_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_list->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_email_list->SortUrl($patient_email_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_email_list->patient_id->headerCellClass() ?>"><div id="elh_patient_email_patient_id" class="patient_email_patient_id"><div class="ew-table-header-caption"><?php echo $patient_email_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_email_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_email_list->SortUrl($patient_email_list->patient_id) ?>', 1);"><div id="elh_patient_email_patient_id" class="patient_email_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_list->_email->Visible) { // email ?>
	<?php if ($patient_email_list->SortUrl($patient_email_list->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $patient_email_list->_email->headerCellClass() ?>"><div id="elh_patient_email__email" class="patient_email__email"><div class="ew-table-header-caption"><?php echo $patient_email_list->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $patient_email_list->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_email_list->SortUrl($patient_email_list->_email) ?>', 1);"><div id="elh_patient_email__email" class="patient_email__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_list->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_email_list->_email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_list->_email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_list->email_type->Visible) { // email_type ?>
	<?php if ($patient_email_list->SortUrl($patient_email_list->email_type) == "") { ?>
		<th data-name="email_type" class="<?php echo $patient_email_list->email_type->headerCellClass() ?>"><div id="elh_patient_email_email_type" class="patient_email_email_type"><div class="ew-table-header-caption"><?php echo $patient_email_list->email_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_type" class="<?php echo $patient_email_list->email_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_email_list->SortUrl($patient_email_list->email_type) ?>', 1);"><div id="elh_patient_email_email_type" class="patient_email_email_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_list->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_list->email_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_list->email_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_list->status->Visible) { // status ?>
	<?php if ($patient_email_list->SortUrl($patient_email_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_email_list->status->headerCellClass() ?>"><div id="elh_patient_email_status" class="patient_email_status"><div class="ew-table-header-caption"><?php echo $patient_email_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_email_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_email_list->SortUrl($patient_email_list->status) ?>', 1);"><div id="elh_patient_email_status" class="patient_email_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_email_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_email_list->ExportAll && $patient_email_list->isExport()) {
	$patient_email_list->StopRecord = $patient_email_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_email_list->TotalRecords > $patient_email_list->StartRecord + $patient_email_list->DisplayRecords - 1)
		$patient_email_list->StopRecord = $patient_email_list->StartRecord + $patient_email_list->DisplayRecords - 1;
	else
		$patient_email_list->StopRecord = $patient_email_list->TotalRecords;
}
$patient_email_list->RecordCount = $patient_email_list->StartRecord - 1;
if ($patient_email_list->Recordset && !$patient_email_list->Recordset->EOF) {
	$patient_email_list->Recordset->moveFirst();
	$selectLimit = $patient_email_list->UseSelectLimit;
	if (!$selectLimit && $patient_email_list->StartRecord > 1)
		$patient_email_list->Recordset->move($patient_email_list->StartRecord - 1);
} elseif (!$patient_email->AllowAddDeleteRow && $patient_email_list->StopRecord == 0) {
	$patient_email_list->StopRecord = $patient_email->GridAddRowCount;
}

// Initialize aggregate
$patient_email->RowType = ROWTYPE_AGGREGATEINIT;
$patient_email->resetAttributes();
$patient_email_list->renderRow();
while ($patient_email_list->RecordCount < $patient_email_list->StopRecord) {
	$patient_email_list->RecordCount++;
	if ($patient_email_list->RecordCount >= $patient_email_list->StartRecord) {
		$patient_email_list->RowCount++;

		// Set up key count
		$patient_email_list->KeyCount = $patient_email_list->RowIndex;

		// Init row class and style
		$patient_email->resetAttributes();
		$patient_email->CssClass = "";
		if ($patient_email_list->isGridAdd()) {
		} else {
			$patient_email_list->loadRowValues($patient_email_list->Recordset); // Load row values
		}
		$patient_email->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_email->RowAttrs->merge(["data-rowindex" => $patient_email_list->RowCount, "id" => "r" . $patient_email_list->RowCount . "_patient_email", "data-rowtype" => $patient_email->RowType]);

		// Render row
		$patient_email_list->renderRow();

		// Render list options
		$patient_email_list->renderListOptions();
?>
	<tr <?php echo $patient_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_email_list->ListOptions->render("body", "left", $patient_email_list->RowCount);
?>
	<?php if ($patient_email_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_email_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCount ?>_patient_email_id">
<span<?php echo $patient_email_list->id->viewAttributes() ?>><?php echo $patient_email_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_email_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCount ?>_patient_email_patient_id">
<span<?php echo $patient_email_list->patient_id->viewAttributes() ?>><?php echo $patient_email_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email_list->_email->Visible) { // email ?>
		<td data-name="_email" <?php echo $patient_email_list->_email->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCount ?>_patient_email__email">
<span<?php echo $patient_email_list->_email->viewAttributes() ?>><?php echo $patient_email_list->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email_list->email_type->Visible) { // email_type ?>
		<td data-name="email_type" <?php echo $patient_email_list->email_type->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCount ?>_patient_email_email_type">
<span<?php echo $patient_email_list->email_type->viewAttributes() ?>><?php echo $patient_email_list->email_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_email_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_email_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_email_list->RowCount ?>_patient_email_status">
<span<?php echo $patient_email_list->status->viewAttributes() ?>><?php echo $patient_email_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_email_list->ListOptions->render("body", "right", $patient_email_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_email_list->isGridAdd())
		$patient_email_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_email->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_email_list->Recordset)
	$patient_email_list->Recordset->Close();
?>
<?php if (!$patient_email_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_email_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_email_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_email_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_email_list->TotalRecords == 0 && !$patient_email->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_email_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_email_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_email->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_email",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_email_list->terminate();
?>