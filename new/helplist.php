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
$help_list = new help_list();

// Run the page
$help_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$help_list->isExport()) { ?>
<script>
var fhelplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fhelplist = currentForm = new ew.Form("fhelplist", "list");
	fhelplist.formKeyCountName = '<?php echo $help_list->FormKeyCountName ?>';
	loadjs.done("fhelplist");
});
var fhelplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fhelplistsrch = currentSearchForm = new ew.Form("fhelplistsrch");

	// Dynamic selection lists
	// Filters

	fhelplistsrch.filterList = <?php echo $help_list->getFilterList() ?>;
	loadjs.done("fhelplistsrch");
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
<?php if (!$help_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($help_list->TotalRecords > 0 && $help_list->ExportOptions->visible()) { ?>
<?php $help_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($help_list->ImportOptions->visible()) { ?>
<?php $help_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($help_list->SearchOptions->visible()) { ?>
<?php $help_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($help_list->FilterOptions->visible()) { ?>
<?php $help_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$help_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$help_list->isExport() && !$help->CurrentAction) { ?>
<form name="fhelplistsrch" id="fhelplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fhelplistsrch-search-panel" class="<?php echo $help_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="help">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $help_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($help_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($help_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $help_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $help_list->showPageHeader(); ?>
<?php
$help_list->showMessage();
?>
<?php if ($help_list->TotalRecords > 0 || $help->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($help_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> help">
<?php if (!$help_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$help_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $help_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $help_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhelplist" id="fhelplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<div id="gmp_help" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($help_list->TotalRecords > 0 || $help_list->isGridEdit()) { ?>
<table id="tbl_helplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$help->RowType = ROWTYPE_HEADER;

// Render list options
$help_list->renderListOptions();

// Render list options (header, left)
$help_list->ListOptions->render("header", "left");
?>
<?php if ($help_list->id->Visible) { // id ?>
	<?php if ($help_list->SortUrl($help_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $help_list->id->headerCellClass() ?>"><div id="elh_help_id" class="help_id"><div class="ew-table-header-caption"><?php echo $help_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $help_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $help_list->SortUrl($help_list->id) ?>', 1);"><div id="elh_help_id" class="help_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $help_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($help_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($help_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($help_list->Tittle->Visible) { // Tittle ?>
	<?php if ($help_list->SortUrl($help_list->Tittle) == "") { ?>
		<th data-name="Tittle" class="<?php echo $help_list->Tittle->headerCellClass() ?>"><div id="elh_help_Tittle" class="help_Tittle"><div class="ew-table-header-caption"><?php echo $help_list->Tittle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tittle" class="<?php echo $help_list->Tittle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $help_list->SortUrl($help_list->Tittle) ?>', 1);"><div id="elh_help_Tittle" class="help_Tittle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $help_list->Tittle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($help_list->Tittle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($help_list->Tittle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$help_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($help_list->ExportAll && $help_list->isExport()) {
	$help_list->StopRecord = $help_list->TotalRecords;
} else {

	// Set the last record to display
	if ($help_list->TotalRecords > $help_list->StartRecord + $help_list->DisplayRecords - 1)
		$help_list->StopRecord = $help_list->StartRecord + $help_list->DisplayRecords - 1;
	else
		$help_list->StopRecord = $help_list->TotalRecords;
}
$help_list->RecordCount = $help_list->StartRecord - 1;
if ($help_list->Recordset && !$help_list->Recordset->EOF) {
	$help_list->Recordset->moveFirst();
	$selectLimit = $help_list->UseSelectLimit;
	if (!$selectLimit && $help_list->StartRecord > 1)
		$help_list->Recordset->move($help_list->StartRecord - 1);
} elseif (!$help->AllowAddDeleteRow && $help_list->StopRecord == 0) {
	$help_list->StopRecord = $help->GridAddRowCount;
}

// Initialize aggregate
$help->RowType = ROWTYPE_AGGREGATEINIT;
$help->resetAttributes();
$help_list->renderRow();
while ($help_list->RecordCount < $help_list->StopRecord) {
	$help_list->RecordCount++;
	if ($help_list->RecordCount >= $help_list->StartRecord) {
		$help_list->RowCount++;

		// Set up key count
		$help_list->KeyCount = $help_list->RowIndex;

		// Init row class and style
		$help->resetAttributes();
		$help->CssClass = "";
		if ($help_list->isGridAdd()) {
		} else {
			$help_list->loadRowValues($help_list->Recordset); // Load row values
		}
		$help->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$help->RowAttrs->merge(["data-rowindex" => $help_list->RowCount, "id" => "r" . $help_list->RowCount . "_help", "data-rowtype" => $help->RowType]);

		// Render row
		$help_list->renderRow();

		// Render list options
		$help_list->renderListOptions();
?>
	<tr <?php echo $help->rowAttributes() ?>>
<?php

// Render list options (body, left)
$help_list->ListOptions->render("body", "left", $help_list->RowCount);
?>
	<?php if ($help_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $help_list->id->cellAttributes() ?>>
<span id="el<?php echo $help_list->RowCount ?>_help_id">
<span<?php echo $help_list->id->viewAttributes() ?>><?php echo $help_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($help_list->Tittle->Visible) { // Tittle ?>
		<td data-name="Tittle" <?php echo $help_list->Tittle->cellAttributes() ?>>
<span id="el<?php echo $help_list->RowCount ?>_help_Tittle">
<span<?php echo $help_list->Tittle->viewAttributes() ?>><?php echo $help_list->Tittle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$help_list->ListOptions->render("body", "right", $help_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$help_list->isGridAdd())
		$help_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$help->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($help_list->Recordset)
	$help_list->Recordset->Close();
?>
<?php if (!$help_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$help_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $help_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $help_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($help_list->TotalRecords == 0 && !$help->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $help_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$help_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$help_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$help->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_help",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$help_list->terminate();
?>