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
$appointment_patienttypee_list = new appointment_patienttypee_list();

// Run the page
$appointment_patienttypee_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_patienttypee_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$appointment_patienttypee_list->isExport()) { ?>
<script>
var fappointment_patienttypeelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fappointment_patienttypeelist = currentForm = new ew.Form("fappointment_patienttypeelist", "list");
	fappointment_patienttypeelist.formKeyCountName = '<?php echo $appointment_patienttypee_list->FormKeyCountName ?>';
	loadjs.done("fappointment_patienttypeelist");
});
var fappointment_patienttypeelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fappointment_patienttypeelistsrch = currentSearchForm = new ew.Form("fappointment_patienttypeelistsrch");

	// Dynamic selection lists
	// Filters

	fappointment_patienttypeelistsrch.filterList = <?php echo $appointment_patienttypee_list->getFilterList() ?>;
	loadjs.done("fappointment_patienttypeelistsrch");
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
<?php if (!$appointment_patienttypee_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_patienttypee_list->TotalRecords > 0 && $appointment_patienttypee_list->ExportOptions->visible()) { ?>
<?php $appointment_patienttypee_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->ImportOptions->visible()) { ?>
<?php $appointment_patienttypee_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->SearchOptions->visible()) { ?>
<?php $appointment_patienttypee_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->FilterOptions->visible()) { ?>
<?php $appointment_patienttypee_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$appointment_patienttypee_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_patienttypee_list->isExport() && !$appointment_patienttypee->CurrentAction) { ?>
<form name="fappointment_patienttypeelistsrch" id="fappointment_patienttypeelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fappointment_patienttypeelistsrch-search-panel" class="<?php echo $appointment_patienttypee_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_patienttypee">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $appointment_patienttypee_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($appointment_patienttypee_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($appointment_patienttypee_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_patienttypee_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_patienttypee_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $appointment_patienttypee_list->showPageHeader(); ?>
<?php
$appointment_patienttypee_list->showMessage();
?>
<?php if ($appointment_patienttypee_list->TotalRecords > 0 || $appointment_patienttypee->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_patienttypee_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_patienttypee">
<?php if (!$appointment_patienttypee_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_patienttypee_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_patienttypee_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_patienttypee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_patienttypeelist" id="fappointment_patienttypeelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<div id="gmp_appointment_patienttypee" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($appointment_patienttypee_list->TotalRecords > 0 || $appointment_patienttypee_list->isGridEdit()) { ?>
<table id="tbl_appointment_patienttypeelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_patienttypee->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_patienttypee_list->renderListOptions();

// Render list options (header, left)
$appointment_patienttypee_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_patienttypee_list->id->Visible) { // id ?>
	<?php if ($appointment_patienttypee_list->SortUrl($appointment_patienttypee_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_patienttypee_list->id->headerCellClass() ?>"><div id="elh_appointment_patienttypee_id" class="appointment_patienttypee_id"><div class="ew-table-header-caption"><?php echo $appointment_patienttypee_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_patienttypee_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_patienttypee_list->SortUrl($appointment_patienttypee_list->id) ?>', 1);"><div id="elh_appointment_patienttypee_id" class="appointment_patienttypee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_patienttypee_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_patienttypee_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_patienttypee_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->Name->Visible) { // Name ?>
	<?php if ($appointment_patienttypee_list->SortUrl($appointment_patienttypee_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $appointment_patienttypee_list->Name->headerCellClass() ?>"><div id="elh_appointment_patienttypee_Name" class="appointment_patienttypee_Name"><div class="ew-table-header-caption"><?php echo $appointment_patienttypee_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $appointment_patienttypee_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_patienttypee_list->SortUrl($appointment_patienttypee_list->Name) ?>', 1);"><div id="elh_appointment_patienttypee_Name" class="appointment_patienttypee_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_patienttypee_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_patienttypee_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_patienttypee_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_patienttypee_list->Type->Visible) { // Type ?>
	<?php if ($appointment_patienttypee_list->SortUrl($appointment_patienttypee_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $appointment_patienttypee_list->Type->headerCellClass() ?>"><div id="elh_appointment_patienttypee_Type" class="appointment_patienttypee_Type"><div class="ew-table-header-caption"><?php echo $appointment_patienttypee_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $appointment_patienttypee_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_patienttypee_list->SortUrl($appointment_patienttypee_list->Type) ?>', 1);"><div id="elh_appointment_patienttypee_Type" class="appointment_patienttypee_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_patienttypee_list->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_patienttypee_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_patienttypee_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_patienttypee_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_patienttypee_list->ExportAll && $appointment_patienttypee_list->isExport()) {
	$appointment_patienttypee_list->StopRecord = $appointment_patienttypee_list->TotalRecords;
} else {

	// Set the last record to display
	if ($appointment_patienttypee_list->TotalRecords > $appointment_patienttypee_list->StartRecord + $appointment_patienttypee_list->DisplayRecords - 1)
		$appointment_patienttypee_list->StopRecord = $appointment_patienttypee_list->StartRecord + $appointment_patienttypee_list->DisplayRecords - 1;
	else
		$appointment_patienttypee_list->StopRecord = $appointment_patienttypee_list->TotalRecords;
}
$appointment_patienttypee_list->RecordCount = $appointment_patienttypee_list->StartRecord - 1;
if ($appointment_patienttypee_list->Recordset && !$appointment_patienttypee_list->Recordset->EOF) {
	$appointment_patienttypee_list->Recordset->moveFirst();
	$selectLimit = $appointment_patienttypee_list->UseSelectLimit;
	if (!$selectLimit && $appointment_patienttypee_list->StartRecord > 1)
		$appointment_patienttypee_list->Recordset->move($appointment_patienttypee_list->StartRecord - 1);
} elseif (!$appointment_patienttypee->AllowAddDeleteRow && $appointment_patienttypee_list->StopRecord == 0) {
	$appointment_patienttypee_list->StopRecord = $appointment_patienttypee->GridAddRowCount;
}

// Initialize aggregate
$appointment_patienttypee->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_patienttypee->resetAttributes();
$appointment_patienttypee_list->renderRow();
while ($appointment_patienttypee_list->RecordCount < $appointment_patienttypee_list->StopRecord) {
	$appointment_patienttypee_list->RecordCount++;
	if ($appointment_patienttypee_list->RecordCount >= $appointment_patienttypee_list->StartRecord) {
		$appointment_patienttypee_list->RowCount++;

		// Set up key count
		$appointment_patienttypee_list->KeyCount = $appointment_patienttypee_list->RowIndex;

		// Init row class and style
		$appointment_patienttypee->resetAttributes();
		$appointment_patienttypee->CssClass = "";
		if ($appointment_patienttypee_list->isGridAdd()) {
		} else {
			$appointment_patienttypee_list->loadRowValues($appointment_patienttypee_list->Recordset); // Load row values
		}
		$appointment_patienttypee->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_patienttypee->RowAttrs->merge(["data-rowindex" => $appointment_patienttypee_list->RowCount, "id" => "r" . $appointment_patienttypee_list->RowCount . "_appointment_patienttypee", "data-rowtype" => $appointment_patienttypee->RowType]);

		// Render row
		$appointment_patienttypee_list->renderRow();

		// Render list options
		$appointment_patienttypee_list->renderListOptions();
?>
	<tr <?php echo $appointment_patienttypee->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_patienttypee_list->ListOptions->render("body", "left", $appointment_patienttypee_list->RowCount);
?>
	<?php if ($appointment_patienttypee_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $appointment_patienttypee_list->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_list->RowCount ?>_appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee_list->id->viewAttributes() ?>><?php echo $appointment_patienttypee_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $appointment_patienttypee_list->Name->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_list->RowCount ?>_appointment_patienttypee_Name">
<span<?php echo $appointment_patienttypee_list->Name->viewAttributes() ?>><?php echo $appointment_patienttypee_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_patienttypee_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $appointment_patienttypee_list->Type->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_list->RowCount ?>_appointment_patienttypee_Type">
<span<?php echo $appointment_patienttypee_list->Type->viewAttributes() ?>><?php echo $appointment_patienttypee_list->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_patienttypee_list->ListOptions->render("body", "right", $appointment_patienttypee_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$appointment_patienttypee_list->isGridAdd())
		$appointment_patienttypee_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$appointment_patienttypee->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_patienttypee_list->Recordset)
	$appointment_patienttypee_list->Recordset->Close();
?>
<?php if (!$appointment_patienttypee_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_patienttypee_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_patienttypee_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_patienttypee_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_patienttypee_list->TotalRecords == 0 && !$appointment_patienttypee->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_patienttypee_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_patienttypee_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_patienttypee_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_appointment_patienttypee",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$appointment_patienttypee_list->terminate();
?>