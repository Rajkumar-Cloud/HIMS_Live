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
$view_appointment_list = new view_appointment_list();

// Run the page
$view_appointment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_appointment_list->isExport()) { ?>
<script>
var fview_appointmentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_appointmentlist = currentForm = new ew.Form("fview_appointmentlist", "list");
	fview_appointmentlist.formKeyCountName = '<?php echo $view_appointment_list->FormKeyCountName ?>';
	loadjs.done("fview_appointmentlist");
});
var fview_appointmentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_appointmentlistsrch = currentSearchForm = new ew.Form("fview_appointmentlistsrch");

	// Dynamic selection lists
	// Filters

	fview_appointmentlistsrch.filterList = <?php echo $view_appointment_list->getFilterList() ?>;
	loadjs.done("fview_appointmentlistsrch");
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
<?php if (!$view_appointment_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_appointment_list->TotalRecords > 0 && $view_appointment_list->ExportOptions->visible()) { ?>
<?php $view_appointment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_list->ImportOptions->visible()) { ?>
<?php $view_appointment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_list->SearchOptions->visible()) { ?>
<?php $view_appointment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_list->FilterOptions->visible()) { ?>
<?php $view_appointment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_appointment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_appointment_list->isExport() && !$view_appointment->CurrentAction) { ?>
<form name="fview_appointmentlistsrch" id="fview_appointmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_appointmentlistsrch-search-panel" class="<?php echo $view_appointment_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_appointment_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_appointment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_appointment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_appointment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_appointment_list->showPageHeader(); ?>
<?php
$view_appointment_list->showMessage();
?>
<?php if ($view_appointment_list->TotalRecords > 0 || $view_appointment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_appointment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment">
<?php if (!$view_appointment_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_appointment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_appointment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_appointmentlist" id="fview_appointmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment">
<div id="gmp_view_appointment" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_appointment_list->TotalRecords > 0 || $view_appointment_list->isGridEdit()) { ?>
<table id="tbl_view_appointmentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_appointment->RowType = ROWTYPE_HEADER;

// Render list options
$view_appointment_list->renderListOptions();

// Render list options (header, left)
$view_appointment_list->ListOptions->render("header", "left");
?>
<?php if ($view_appointment_list->PId->Visible) { // PId ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $view_appointment_list->PId->headerCellClass() ?>"><div id="elh_view_appointment_PId" class="view_appointment_PId"><div class="ew-table-header-caption"><?php echo $view_appointment_list->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $view_appointment_list->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->PId) ?>', 1);"><div id="elh_view_appointment_PId" class="view_appointment_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->PId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->PId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->patientID->Visible) { // patientID ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_list->patientID->headerCellClass() ?>"><div id="elh_view_appointment_patientID" class="view_appointment_patientID"><div class="ew-table-header-caption"><?php echo $view_appointment_list->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_list->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->patientID) ?>', 1);"><div id="elh_view_appointment_patientID" class="view_appointment_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->patientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->patientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->patientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->patientName->Visible) { // patientName ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_list->patientName->headerCellClass() ?>"><div id="elh_view_appointment_patientName" class="view_appointment_patientName"><div class="ew-table-header-caption"><?php echo $view_appointment_list->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_list->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->patientName) ?>', 1);"><div id="elh_view_appointment_patientName" class="view_appointment_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->patientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->patientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_list->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_MobileNumber" class="view_appointment_MobileNumber"><div class="ew-table-header-caption"><?php echo $view_appointment_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->MobileNumber) ?>', 1);"><div id="elh_view_appointment_MobileNumber" class="view_appointment_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->Referal->Visible) { // Referal ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_list->Referal->headerCellClass() ?>"><div id="elh_view_appointment_Referal" class="view_appointment_Referal"><div class="ew-table-header-caption"><?php echo $view_appointment_list->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_list->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->Referal) ?>', 1);"><div id="elh_view_appointment_Referal" class="view_appointment_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->Referal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->Referal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->Referal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $view_appointment_list->createdDateTime->headerCellClass() ?>"><div id="elh_view_appointment_createdDateTime" class="view_appointment_createdDateTime"><div class="ew-table-header-caption"><?php echo $view_appointment_list->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $view_appointment_list->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->createdDateTime) ?>', 1);"><div id="elh_view_appointment_createdDateTime" class="view_appointment_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->createdDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->createdDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->App->Visible) { // App ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->App) == "") { ?>
		<th data-name="App" class="<?php echo $view_appointment_list->App->headerCellClass() ?>"><div id="elh_view_appointment_App" class="view_appointment_App"><div class="ew-table-header-caption"><?php echo $view_appointment_list->App->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="App" class="<?php echo $view_appointment_list->App->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->App) ?>', 1);"><div id="elh_view_appointment_App" class="view_appointment_App">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->App->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->App->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->App->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_list->HospID->Visible) { // HospID ?>
	<?php if ($view_appointment_list->SortUrl($view_appointment_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_list->HospID->headerCellClass() ?>"><div id="elh_view_appointment_HospID" class="view_appointment_HospID"><div class="ew-table-header-caption"><?php echo $view_appointment_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_list->SortUrl($view_appointment_list->HospID) ?>', 1);"><div id="elh_view_appointment_HospID" class="view_appointment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_appointment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_appointment_list->ExportAll && $view_appointment_list->isExport()) {
	$view_appointment_list->StopRecord = $view_appointment_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_appointment_list->TotalRecords > $view_appointment_list->StartRecord + $view_appointment_list->DisplayRecords - 1)
		$view_appointment_list->StopRecord = $view_appointment_list->StartRecord + $view_appointment_list->DisplayRecords - 1;
	else
		$view_appointment_list->StopRecord = $view_appointment_list->TotalRecords;
}
$view_appointment_list->RecordCount = $view_appointment_list->StartRecord - 1;
if ($view_appointment_list->Recordset && !$view_appointment_list->Recordset->EOF) {
	$view_appointment_list->Recordset->moveFirst();
	$selectLimit = $view_appointment_list->UseSelectLimit;
	if (!$selectLimit && $view_appointment_list->StartRecord > 1)
		$view_appointment_list->Recordset->move($view_appointment_list->StartRecord - 1);
} elseif (!$view_appointment->AllowAddDeleteRow && $view_appointment_list->StopRecord == 0) {
	$view_appointment_list->StopRecord = $view_appointment->GridAddRowCount;
}

// Initialize aggregate
$view_appointment->RowType = ROWTYPE_AGGREGATEINIT;
$view_appointment->resetAttributes();
$view_appointment_list->renderRow();
while ($view_appointment_list->RecordCount < $view_appointment_list->StopRecord) {
	$view_appointment_list->RecordCount++;
	if ($view_appointment_list->RecordCount >= $view_appointment_list->StartRecord) {
		$view_appointment_list->RowCount++;

		// Set up key count
		$view_appointment_list->KeyCount = $view_appointment_list->RowIndex;

		// Init row class and style
		$view_appointment->resetAttributes();
		$view_appointment->CssClass = "";
		if ($view_appointment_list->isGridAdd()) {
		} else {
			$view_appointment_list->loadRowValues($view_appointment_list->Recordset); // Load row values
		}
		$view_appointment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_appointment->RowAttrs->merge(["data-rowindex" => $view_appointment_list->RowCount, "id" => "r" . $view_appointment_list->RowCount . "_view_appointment", "data-rowtype" => $view_appointment->RowType]);

		// Render row
		$view_appointment_list->renderRow();

		// Render list options
		$view_appointment_list->renderListOptions();
?>
	<tr <?php echo $view_appointment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_list->ListOptions->render("body", "left", $view_appointment_list->RowCount);
?>
	<?php if ($view_appointment_list->PId->Visible) { // PId ?>
		<td data-name="PId" <?php echo $view_appointment_list->PId->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_PId">
<span<?php echo $view_appointment_list->PId->viewAttributes() ?>><?php echo $view_appointment_list->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->patientID->Visible) { // patientID ?>
		<td data-name="patientID" <?php echo $view_appointment_list->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_patientID">
<span<?php echo $view_appointment_list->patientID->viewAttributes() ?>><?php echo $view_appointment_list->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->patientName->Visible) { // patientName ?>
		<td data-name="patientName" <?php echo $view_appointment_list->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_patientName">
<span<?php echo $view_appointment_list->patientName->viewAttributes() ?>><?php echo $view_appointment_list->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $view_appointment_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_MobileNumber">
<span<?php echo $view_appointment_list->MobileNumber->viewAttributes() ?>><?php echo $view_appointment_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->Referal->Visible) { // Referal ?>
		<td data-name="Referal" <?php echo $view_appointment_list->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_Referal">
<span<?php echo $view_appointment_list->Referal->viewAttributes() ?>><?php echo $view_appointment_list->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime" <?php echo $view_appointment_list->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_createdDateTime">
<span<?php echo $view_appointment_list->createdDateTime->viewAttributes() ?>><?php echo $view_appointment_list->createdDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->App->Visible) { // App ?>
		<td data-name="App" <?php echo $view_appointment_list->App->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_App">
<span<?php echo $view_appointment_list->App->viewAttributes() ?>><?php echo $view_appointment_list->App->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_appointment_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCount ?>_view_appointment_HospID">
<span<?php echo $view_appointment_list->HospID->viewAttributes() ?>><?php echo $view_appointment_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_list->ListOptions->render("body", "right", $view_appointment_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_appointment_list->isGridAdd())
		$view_appointment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_appointment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_appointment_list->Recordset)
	$view_appointment_list->Recordset->Close();
?>
<?php if (!$view_appointment_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_appointment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_appointment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_appointment_list->TotalRecords == 0 && !$view_appointment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_appointment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_appointment_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_appointment->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_appointment",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_appointment_list->terminate();
?>