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
$appointment_reminder_list = new appointment_reminder_list();

// Run the page
$appointment_reminder_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_reminder_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$appointment_reminder_list->isExport()) { ?>
<script>
var fappointment_reminderlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fappointment_reminderlist = currentForm = new ew.Form("fappointment_reminderlist", "list");
	fappointment_reminderlist.formKeyCountName = '<?php echo $appointment_reminder_list->FormKeyCountName ?>';
	loadjs.done("fappointment_reminderlist");
});
var fappointment_reminderlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fappointment_reminderlistsrch = currentSearchForm = new ew.Form("fappointment_reminderlistsrch");

	// Dynamic selection lists
	// Filters

	fappointment_reminderlistsrch.filterList = <?php echo $appointment_reminder_list->getFilterList() ?>;
	loadjs.done("fappointment_reminderlistsrch");
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
<?php if (!$appointment_reminder_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_reminder_list->TotalRecords > 0 && $appointment_reminder_list->ExportOptions->visible()) { ?>
<?php $appointment_reminder_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_reminder_list->ImportOptions->visible()) { ?>
<?php $appointment_reminder_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_reminder_list->SearchOptions->visible()) { ?>
<?php $appointment_reminder_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_reminder_list->FilterOptions->visible()) { ?>
<?php $appointment_reminder_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$appointment_reminder_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_reminder_list->isExport() && !$appointment_reminder->CurrentAction) { ?>
<form name="fappointment_reminderlistsrch" id="fappointment_reminderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fappointment_reminderlistsrch-search-panel" class="<?php echo $appointment_reminder_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_reminder">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $appointment_reminder_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($appointment_reminder_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($appointment_reminder_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_reminder_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $appointment_reminder_list->showPageHeader(); ?>
<?php
$appointment_reminder_list->showMessage();
?>
<?php if ($appointment_reminder_list->TotalRecords > 0 || $appointment_reminder->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_reminder_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_reminder">
<?php if (!$appointment_reminder_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_reminder_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_reminder_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_reminder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_reminderlist" id="fappointment_reminderlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<div id="gmp_appointment_reminder" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($appointment_reminder_list->TotalRecords > 0 || $appointment_reminder_list->isGridEdit()) { ?>
<table id="tbl_appointment_reminderlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_reminder->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_reminder_list->renderListOptions();

// Render list options (header, left)
$appointment_reminder_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_reminder_list->id->Visible) { // id ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_reminder_list->id->headerCellClass() ?>"><div id="elh_appointment_reminder_id" class="appointment_reminder_id"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_reminder_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->id) ?>', 1);"><div id="elh_appointment_reminder_id" class="appointment_reminder_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder_list->Drid->Visible) { // Drid ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->Drid) == "") { ?>
		<th data-name="Drid" class="<?php echo $appointment_reminder_list->Drid->headerCellClass() ?>"><div id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->Drid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drid" class="<?php echo $appointment_reminder_list->Drid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->Drid) ?>', 1);"><div id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->Drid->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->Drid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->Drid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder_list->DrName->Visible) { // DrName ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $appointment_reminder_list->DrName->headerCellClass() ?>"><div id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $appointment_reminder_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->DrName) ?>', 1);"><div id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder_list->Duration->Visible) { // Duration ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $appointment_reminder_list->Duration->headerCellClass() ?>"><div id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $appointment_reminder_list->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->Duration) ?>', 1);"><div id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->Duration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->Duration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder_list->Date->Visible) { // Date ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $appointment_reminder_list->Date->headerCellClass() ?>"><div id="elh_appointment_reminder_Date" class="appointment_reminder_Date"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $appointment_reminder_list->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->Date) ?>', 1);"><div id="elh_appointment_reminder_Date" class="appointment_reminder_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder_list->SMSSend->Visible) { // SMSSend ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->SMSSend) == "") { ?>
		<th data-name="SMSSend" class="<?php echo $appointment_reminder_list->SMSSend->headerCellClass() ?>"><div id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->SMSSend->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSSend" class="<?php echo $appointment_reminder_list->SMSSend->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->SMSSend) ?>', 1);"><div id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->SMSSend->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->SMSSend->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->SMSSend->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder_list->EmailSend->Visible) { // EmailSend ?>
	<?php if ($appointment_reminder_list->SortUrl($appointment_reminder_list->EmailSend) == "") { ?>
		<th data-name="EmailSend" class="<?php echo $appointment_reminder_list->EmailSend->headerCellClass() ?>"><div id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend"><div class="ew-table-header-caption"><?php echo $appointment_reminder_list->EmailSend->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmailSend" class="<?php echo $appointment_reminder_list->EmailSend->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_reminder_list->SortUrl($appointment_reminder_list->EmailSend) ?>', 1);"><div id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder_list->EmailSend->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder_list->EmailSend->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_reminder_list->EmailSend->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_reminder_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_reminder_list->ExportAll && $appointment_reminder_list->isExport()) {
	$appointment_reminder_list->StopRecord = $appointment_reminder_list->TotalRecords;
} else {

	// Set the last record to display
	if ($appointment_reminder_list->TotalRecords > $appointment_reminder_list->StartRecord + $appointment_reminder_list->DisplayRecords - 1)
		$appointment_reminder_list->StopRecord = $appointment_reminder_list->StartRecord + $appointment_reminder_list->DisplayRecords - 1;
	else
		$appointment_reminder_list->StopRecord = $appointment_reminder_list->TotalRecords;
}
$appointment_reminder_list->RecordCount = $appointment_reminder_list->StartRecord - 1;
if ($appointment_reminder_list->Recordset && !$appointment_reminder_list->Recordset->EOF) {
	$appointment_reminder_list->Recordset->moveFirst();
	$selectLimit = $appointment_reminder_list->UseSelectLimit;
	if (!$selectLimit && $appointment_reminder_list->StartRecord > 1)
		$appointment_reminder_list->Recordset->move($appointment_reminder_list->StartRecord - 1);
} elseif (!$appointment_reminder->AllowAddDeleteRow && $appointment_reminder_list->StopRecord == 0) {
	$appointment_reminder_list->StopRecord = $appointment_reminder->GridAddRowCount;
}

// Initialize aggregate
$appointment_reminder->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_reminder->resetAttributes();
$appointment_reminder_list->renderRow();
while ($appointment_reminder_list->RecordCount < $appointment_reminder_list->StopRecord) {
	$appointment_reminder_list->RecordCount++;
	if ($appointment_reminder_list->RecordCount >= $appointment_reminder_list->StartRecord) {
		$appointment_reminder_list->RowCount++;

		// Set up key count
		$appointment_reminder_list->KeyCount = $appointment_reminder_list->RowIndex;

		// Init row class and style
		$appointment_reminder->resetAttributes();
		$appointment_reminder->CssClass = "";
		if ($appointment_reminder_list->isGridAdd()) {
		} else {
			$appointment_reminder_list->loadRowValues($appointment_reminder_list->Recordset); // Load row values
		}
		$appointment_reminder->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_reminder->RowAttrs->merge(["data-rowindex" => $appointment_reminder_list->RowCount, "id" => "r" . $appointment_reminder_list->RowCount . "_appointment_reminder", "data-rowtype" => $appointment_reminder->RowType]);

		// Render row
		$appointment_reminder_list->renderRow();

		// Render list options
		$appointment_reminder_list->renderListOptions();
?>
	<tr <?php echo $appointment_reminder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_reminder_list->ListOptions->render("body", "left", $appointment_reminder_list->RowCount);
?>
	<?php if ($appointment_reminder_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $appointment_reminder_list->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_id">
<span<?php echo $appointment_reminder_list->id->viewAttributes() ?>><?php echo $appointment_reminder_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder_list->Drid->Visible) { // Drid ?>
		<td data-name="Drid" <?php echo $appointment_reminder_list->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_Drid">
<span<?php echo $appointment_reminder_list->Drid->viewAttributes() ?>><?php echo $appointment_reminder_list->Drid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $appointment_reminder_list->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_DrName">
<span<?php echo $appointment_reminder_list->DrName->viewAttributes() ?>><?php echo $appointment_reminder_list->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder_list->Duration->Visible) { // Duration ?>
		<td data-name="Duration" <?php echo $appointment_reminder_list->Duration->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_Duration">
<span<?php echo $appointment_reminder_list->Duration->viewAttributes() ?>><?php echo $appointment_reminder_list->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder_list->Date->Visible) { // Date ?>
		<td data-name="Date" <?php echo $appointment_reminder_list->Date->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_Date">
<span<?php echo $appointment_reminder_list->Date->viewAttributes() ?>><?php echo $appointment_reminder_list->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder_list->SMSSend->Visible) { // SMSSend ?>
		<td data-name="SMSSend" <?php echo $appointment_reminder_list->SMSSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_SMSSend">
<span<?php echo $appointment_reminder_list->SMSSend->viewAttributes() ?>><?php echo $appointment_reminder_list->SMSSend->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder_list->EmailSend->Visible) { // EmailSend ?>
		<td data-name="EmailSend" <?php echo $appointment_reminder_list->EmailSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCount ?>_appointment_reminder_EmailSend">
<span<?php echo $appointment_reminder_list->EmailSend->viewAttributes() ?>><?php echo $appointment_reminder_list->EmailSend->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_reminder_list->ListOptions->render("body", "right", $appointment_reminder_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$appointment_reminder_list->isGridAdd())
		$appointment_reminder_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$appointment_reminder->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_reminder_list->Recordset)
	$appointment_reminder_list->Recordset->Close();
?>
<?php if (!$appointment_reminder_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_reminder_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_reminder_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_reminder_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_reminder_list->TotalRecords == 0 && !$appointment_reminder->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_reminder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_reminder_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_reminder_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$appointment_reminder->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_appointment_reminder",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$appointment_reminder_list->terminate();
?>