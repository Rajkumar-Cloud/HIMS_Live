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
$ivf_semenan_medication_list = new ivf_semenan_medication_list();

// Run the page
$ivf_semenan_medication_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenan_medication_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_semenan_medication_list->isExport()) { ?>
<script>
var fivf_semenan_medicationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_semenan_medicationlist = currentForm = new ew.Form("fivf_semenan_medicationlist", "list");
	fivf_semenan_medicationlist.formKeyCountName = '<?php echo $ivf_semenan_medication_list->FormKeyCountName ?>';
	loadjs.done("fivf_semenan_medicationlist");
});
var fivf_semenan_medicationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_semenan_medicationlistsrch = currentSearchForm = new ew.Form("fivf_semenan_medicationlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_semenan_medicationlistsrch.filterList = <?php echo $ivf_semenan_medication_list->getFilterList() ?>;
	loadjs.done("fivf_semenan_medicationlistsrch");
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
<?php if (!$ivf_semenan_medication_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_semenan_medication_list->TotalRecords > 0 && $ivf_semenan_medication_list->ExportOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->ImportOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->SearchOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->FilterOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_semenan_medication_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_semenan_medication_list->isExport() && !$ivf_semenan_medication->CurrentAction) { ?>
<form name="fivf_semenan_medicationlistsrch" id="fivf_semenan_medicationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_semenan_medicationlistsrch-search-panel" class="<?php echo $ivf_semenan_medication_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_semenan_medication">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_semenan_medication_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_semenan_medication_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_semenan_medication_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_semenan_medication_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_semenan_medication_list->showPageHeader(); ?>
<?php
$ivf_semenan_medication_list->showMessage();
?>
<?php if ($ivf_semenan_medication_list->TotalRecords > 0 || $ivf_semenan_medication->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_semenan_medication_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenan_medication">
<?php if (!$ivf_semenan_medication_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_semenan_medication_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_semenan_medication_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenan_medication_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_semenan_medicationlist" id="fivf_semenan_medicationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenan_medication">
<div id="gmp_ivf_semenan_medication" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_semenan_medication_list->TotalRecords > 0 || $ivf_semenan_medication_list->isGridEdit()) { ?>
<table id="tbl_ivf_semenan_medicationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_semenan_medication->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_semenan_medication_list->renderListOptions();

// Render list options (header, left)
$ivf_semenan_medication_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenan_medication_list->id->Visible) { // id ?>
	<?php if ($ivf_semenan_medication_list->SortUrl($ivf_semenan_medication_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_semenan_medication_list->id->headerCellClass() ?>"><div id="elh_ivf_semenan_medication_id" class="ivf_semenan_medication_id"><div class="ew-table-header-caption"><?php echo $ivf_semenan_medication_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_semenan_medication_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenan_medication_list->SortUrl($ivf_semenan_medication_list->id) ?>', 1);"><div id="elh_ivf_semenan_medication_id" class="ivf_semenan_medication_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenan_medication_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenan_medication_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenan_medication_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->Medication->Visible) { // Medication ?>
	<?php if ($ivf_semenan_medication_list->SortUrl($ivf_semenan_medication_list->Medication) == "") { ?>
		<th data-name="Medication" class="<?php echo $ivf_semenan_medication_list->Medication->headerCellClass() ?>"><div id="elh_ivf_semenan_medication_Medication" class="ivf_semenan_medication_Medication"><div class="ew-table-header-caption"><?php echo $ivf_semenan_medication_list->Medication->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medication" class="<?php echo $ivf_semenan_medication_list->Medication->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenan_medication_list->SortUrl($ivf_semenan_medication_list->Medication) ?>', 1);"><div id="elh_ivf_semenan_medication_Medication" class="ivf_semenan_medication_Medication">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenan_medication_list->Medication->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenan_medication_list->Medication->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenan_medication_list->Medication->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_semenan_medication_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_semenan_medication_list->ExportAll && $ivf_semenan_medication_list->isExport()) {
	$ivf_semenan_medication_list->StopRecord = $ivf_semenan_medication_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_semenan_medication_list->TotalRecords > $ivf_semenan_medication_list->StartRecord + $ivf_semenan_medication_list->DisplayRecords - 1)
		$ivf_semenan_medication_list->StopRecord = $ivf_semenan_medication_list->StartRecord + $ivf_semenan_medication_list->DisplayRecords - 1;
	else
		$ivf_semenan_medication_list->StopRecord = $ivf_semenan_medication_list->TotalRecords;
}
$ivf_semenan_medication_list->RecordCount = $ivf_semenan_medication_list->StartRecord - 1;
if ($ivf_semenan_medication_list->Recordset && !$ivf_semenan_medication_list->Recordset->EOF) {
	$ivf_semenan_medication_list->Recordset->moveFirst();
	$selectLimit = $ivf_semenan_medication_list->UseSelectLimit;
	if (!$selectLimit && $ivf_semenan_medication_list->StartRecord > 1)
		$ivf_semenan_medication_list->Recordset->move($ivf_semenan_medication_list->StartRecord - 1);
} elseif (!$ivf_semenan_medication->AllowAddDeleteRow && $ivf_semenan_medication_list->StopRecord == 0) {
	$ivf_semenan_medication_list->StopRecord = $ivf_semenan_medication->GridAddRowCount;
}

// Initialize aggregate
$ivf_semenan_medication->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_semenan_medication->resetAttributes();
$ivf_semenan_medication_list->renderRow();
while ($ivf_semenan_medication_list->RecordCount < $ivf_semenan_medication_list->StopRecord) {
	$ivf_semenan_medication_list->RecordCount++;
	if ($ivf_semenan_medication_list->RecordCount >= $ivf_semenan_medication_list->StartRecord) {
		$ivf_semenan_medication_list->RowCount++;

		// Set up key count
		$ivf_semenan_medication_list->KeyCount = $ivf_semenan_medication_list->RowIndex;

		// Init row class and style
		$ivf_semenan_medication->resetAttributes();
		$ivf_semenan_medication->CssClass = "";
		if ($ivf_semenan_medication_list->isGridAdd()) {
		} else {
			$ivf_semenan_medication_list->loadRowValues($ivf_semenan_medication_list->Recordset); // Load row values
		}
		$ivf_semenan_medication->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_semenan_medication->RowAttrs->merge(["data-rowindex" => $ivf_semenan_medication_list->RowCount, "id" => "r" . $ivf_semenan_medication_list->RowCount . "_ivf_semenan_medication", "data-rowtype" => $ivf_semenan_medication->RowType]);

		// Render row
		$ivf_semenan_medication_list->renderRow();

		// Render list options
		$ivf_semenan_medication_list->renderListOptions();
?>
	<tr <?php echo $ivf_semenan_medication->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenan_medication_list->ListOptions->render("body", "left", $ivf_semenan_medication_list->RowCount);
?>
	<?php if ($ivf_semenan_medication_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_semenan_medication_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenan_medication_list->RowCount ?>_ivf_semenan_medication_id">
<span<?php echo $ivf_semenan_medication_list->id->viewAttributes() ?>><?php echo $ivf_semenan_medication_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Medication->Visible) { // Medication ?>
		<td data-name="Medication" <?php echo $ivf_semenan_medication_list->Medication->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenan_medication_list->RowCount ?>_ivf_semenan_medication_Medication">
<span<?php echo $ivf_semenan_medication_list->Medication->viewAttributes() ?>><?php echo $ivf_semenan_medication_list->Medication->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenan_medication_list->ListOptions->render("body", "right", $ivf_semenan_medication_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_semenan_medication_list->isGridAdd())
		$ivf_semenan_medication_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_semenan_medication->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_semenan_medication_list->Recordset)
	$ivf_semenan_medication_list->Recordset->Close();
?>
<?php if (!$ivf_semenan_medication_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_semenan_medication_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_semenan_medication_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenan_medication_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_semenan_medication_list->TotalRecords == 0 && !$ivf_semenan_medication->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_semenan_medication_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_semenan_medication_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenan_medication_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_semenan_medication",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_semenan_medication_list->terminate();
?>