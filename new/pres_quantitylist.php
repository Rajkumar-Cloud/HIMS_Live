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
$pres_quantity_list = new pres_quantity_list();

// Run the page
$pres_quantity_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_quantity_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_quantity_list->isExport()) { ?>
<script>
var fpres_quantitylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_quantitylist = currentForm = new ew.Form("fpres_quantitylist", "list");
	fpres_quantitylist.formKeyCountName = '<?php echo $pres_quantity_list->FormKeyCountName ?>';
	loadjs.done("fpres_quantitylist");
});
var fpres_quantitylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_quantitylistsrch = currentSearchForm = new ew.Form("fpres_quantitylistsrch");

	// Dynamic selection lists
	// Filters

	fpres_quantitylistsrch.filterList = <?php echo $pres_quantity_list->getFilterList() ?>;
	loadjs.done("fpres_quantitylistsrch");
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
<?php if (!$pres_quantity_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_quantity_list->TotalRecords > 0 && $pres_quantity_list->ExportOptions->visible()) { ?>
<?php $pres_quantity_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_quantity_list->ImportOptions->visible()) { ?>
<?php $pres_quantity_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_quantity_list->SearchOptions->visible()) { ?>
<?php $pres_quantity_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_quantity_list->FilterOptions->visible()) { ?>
<?php $pres_quantity_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_quantity_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_quantity_list->isExport() && !$pres_quantity->CurrentAction) { ?>
<form name="fpres_quantitylistsrch" id="fpres_quantitylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_quantitylistsrch-search-panel" class="<?php echo $pres_quantity_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_quantity">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_quantity_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_quantity_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_quantity_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_quantity_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_quantity_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_quantity_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_quantity_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_quantity_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_quantity_list->showPageHeader(); ?>
<?php
$pres_quantity_list->showMessage();
?>
<?php if ($pres_quantity_list->TotalRecords > 0 || $pres_quantity->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_quantity_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_quantity">
<?php if (!$pres_quantity_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_quantity_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_quantity_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_quantity_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_quantitylist" id="fpres_quantitylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_quantity">
<div id="gmp_pres_quantity" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_quantity_list->TotalRecords > 0 || $pres_quantity_list->isGridEdit()) { ?>
<table id="tbl_pres_quantitylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_quantity->RowType = ROWTYPE_HEADER;

// Render list options
$pres_quantity_list->renderListOptions();

// Render list options (header, left)
$pres_quantity_list->ListOptions->render("header", "left");
?>
<?php if ($pres_quantity_list->id->Visible) { // id ?>
	<?php if ($pres_quantity_list->SortUrl($pres_quantity_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_quantity_list->id->headerCellClass() ?>"><div id="elh_pres_quantity_id" class="pres_quantity_id"><div class="ew-table-header-caption"><?php echo $pres_quantity_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_quantity_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_quantity_list->SortUrl($pres_quantity_list->id) ?>', 1);"><div id="elh_pres_quantity_id" class="pres_quantity_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_quantity_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_quantity_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_quantity_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_quantity_list->Quantity->Visible) { // Quantity ?>
	<?php if ($pres_quantity_list->SortUrl($pres_quantity_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $pres_quantity_list->Quantity->headerCellClass() ?>"><div id="elh_pres_quantity_Quantity" class="pres_quantity_Quantity"><div class="ew-table-header-caption"><?php echo $pres_quantity_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $pres_quantity_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_quantity_list->SortUrl($pres_quantity_list->Quantity) ?>', 1);"><div id="elh_pres_quantity_Quantity" class="pres_quantity_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_quantity_list->Quantity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_quantity_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_quantity_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_quantity_list->Value->Visible) { // Value ?>
	<?php if ($pres_quantity_list->SortUrl($pres_quantity_list->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $pres_quantity_list->Value->headerCellClass() ?>"><div id="elh_pres_quantity_Value" class="pres_quantity_Value"><div class="ew-table-header-caption"><?php echo $pres_quantity_list->Value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $pres_quantity_list->Value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_quantity_list->SortUrl($pres_quantity_list->Value) ?>', 1);"><div id="elh_pres_quantity_Value" class="pres_quantity_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_quantity_list->Value->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_quantity_list->Value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_quantity_list->Value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_quantity_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_quantity_list->ExportAll && $pres_quantity_list->isExport()) {
	$pres_quantity_list->StopRecord = $pres_quantity_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_quantity_list->TotalRecords > $pres_quantity_list->StartRecord + $pres_quantity_list->DisplayRecords - 1)
		$pres_quantity_list->StopRecord = $pres_quantity_list->StartRecord + $pres_quantity_list->DisplayRecords - 1;
	else
		$pres_quantity_list->StopRecord = $pres_quantity_list->TotalRecords;
}
$pres_quantity_list->RecordCount = $pres_quantity_list->StartRecord - 1;
if ($pres_quantity_list->Recordset && !$pres_quantity_list->Recordset->EOF) {
	$pres_quantity_list->Recordset->moveFirst();
	$selectLimit = $pres_quantity_list->UseSelectLimit;
	if (!$selectLimit && $pres_quantity_list->StartRecord > 1)
		$pres_quantity_list->Recordset->move($pres_quantity_list->StartRecord - 1);
} elseif (!$pres_quantity->AllowAddDeleteRow && $pres_quantity_list->StopRecord == 0) {
	$pres_quantity_list->StopRecord = $pres_quantity->GridAddRowCount;
}

// Initialize aggregate
$pres_quantity->RowType = ROWTYPE_AGGREGATEINIT;
$pres_quantity->resetAttributes();
$pres_quantity_list->renderRow();
while ($pres_quantity_list->RecordCount < $pres_quantity_list->StopRecord) {
	$pres_quantity_list->RecordCount++;
	if ($pres_quantity_list->RecordCount >= $pres_quantity_list->StartRecord) {
		$pres_quantity_list->RowCount++;

		// Set up key count
		$pres_quantity_list->KeyCount = $pres_quantity_list->RowIndex;

		// Init row class and style
		$pres_quantity->resetAttributes();
		$pres_quantity->CssClass = "";
		if ($pres_quantity_list->isGridAdd()) {
		} else {
			$pres_quantity_list->loadRowValues($pres_quantity_list->Recordset); // Load row values
		}
		$pres_quantity->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_quantity->RowAttrs->merge(["data-rowindex" => $pres_quantity_list->RowCount, "id" => "r" . $pres_quantity_list->RowCount . "_pres_quantity", "data-rowtype" => $pres_quantity->RowType]);

		// Render row
		$pres_quantity_list->renderRow();

		// Render list options
		$pres_quantity_list->renderListOptions();
?>
	<tr <?php echo $pres_quantity->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_quantity_list->ListOptions->render("body", "left", $pres_quantity_list->RowCount);
?>
	<?php if ($pres_quantity_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_quantity_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_quantity_list->RowCount ?>_pres_quantity_id">
<span<?php echo $pres_quantity_list->id->viewAttributes() ?>><?php echo $pres_quantity_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_quantity_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $pres_quantity_list->Quantity->cellAttributes() ?>>
<span id="el<?php echo $pres_quantity_list->RowCount ?>_pres_quantity_Quantity">
<span<?php echo $pres_quantity_list->Quantity->viewAttributes() ?>><?php echo $pres_quantity_list->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_quantity_list->Value->Visible) { // Value ?>
		<td data-name="Value" <?php echo $pres_quantity_list->Value->cellAttributes() ?>>
<span id="el<?php echo $pres_quantity_list->RowCount ?>_pres_quantity_Value">
<span<?php echo $pres_quantity_list->Value->viewAttributes() ?>><?php echo $pres_quantity_list->Value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_quantity_list->ListOptions->render("body", "right", $pres_quantity_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_quantity_list->isGridAdd())
		$pres_quantity_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_quantity->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_quantity_list->Recordset)
	$pres_quantity_list->Recordset->Close();
?>
<?php if (!$pres_quantity_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_quantity_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_quantity_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_quantity_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_quantity_list->TotalRecords == 0 && !$pres_quantity->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_quantity_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_quantity_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_quantity_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_quantity->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_quantity",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_quantity_list->terminate();
?>