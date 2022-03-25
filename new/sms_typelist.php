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
$sms_type_list = new sms_type_list();

// Run the page
$sms_type_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_type_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sms_type_list->isExport()) { ?>
<script>
var fsms_typelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsms_typelist = currentForm = new ew.Form("fsms_typelist", "list");
	fsms_typelist.formKeyCountName = '<?php echo $sms_type_list->FormKeyCountName ?>';
	loadjs.done("fsms_typelist");
});
var fsms_typelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsms_typelistsrch = currentSearchForm = new ew.Form("fsms_typelistsrch");

	// Dynamic selection lists
	// Filters

	fsms_typelistsrch.filterList = <?php echo $sms_type_list->getFilterList() ?>;
	loadjs.done("fsms_typelistsrch");
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
<?php if (!$sms_type_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sms_type_list->TotalRecords > 0 && $sms_type_list->ExportOptions->visible()) { ?>
<?php $sms_type_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_type_list->ImportOptions->visible()) { ?>
<?php $sms_type_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_type_list->SearchOptions->visible()) { ?>
<?php $sms_type_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sms_type_list->FilterOptions->visible()) { ?>
<?php $sms_type_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sms_type_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sms_type_list->isExport() && !$sms_type->CurrentAction) { ?>
<form name="fsms_typelistsrch" id="fsms_typelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsms_typelistsrch-search-panel" class="<?php echo $sms_type_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sms_type">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sms_type_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sms_type_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sms_type_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sms_type_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sms_type_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sms_type_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sms_type_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sms_type_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sms_type_list->showPageHeader(); ?>
<?php
$sms_type_list->showMessage();
?>
<?php if ($sms_type_list->TotalRecords > 0 || $sms_type->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sms_type_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sms_type">
<?php if (!$sms_type_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sms_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sms_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsms_typelist" id="fsms_typelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_type">
<div id="gmp_sms_type" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sms_type_list->TotalRecords > 0 || $sms_type_list->isGridEdit()) { ?>
<table id="tbl_sms_typelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sms_type->RowType = ROWTYPE_HEADER;

// Render list options
$sms_type_list->renderListOptions();

// Render list options (header, left)
$sms_type_list->ListOptions->render("header", "left");
?>
<?php if ($sms_type_list->id->Visible) { // id ?>
	<?php if ($sms_type_list->SortUrl($sms_type_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $sms_type_list->id->headerCellClass() ?>"><div id="elh_sms_type_id" class="sms_type_id"><div class="ew-table-header-caption"><?php echo $sms_type_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sms_type_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_type_list->SortUrl($sms_type_list->id) ?>', 1);"><div id="elh_sms_type_id" class="sms_type_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_type_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_type_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_type_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_type_list->Name->Visible) { // Name ?>
	<?php if ($sms_type_list->SortUrl($sms_type_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $sms_type_list->Name->headerCellClass() ?>"><div id="elh_sms_type_Name" class="sms_type_Name"><div class="ew-table-header-caption"><?php echo $sms_type_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $sms_type_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_type_list->SortUrl($sms_type_list->Name) ?>', 1);"><div id="elh_sms_type_Name" class="sms_type_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_type_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sms_type_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_type_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sms_type_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sms_type_list->ExportAll && $sms_type_list->isExport()) {
	$sms_type_list->StopRecord = $sms_type_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sms_type_list->TotalRecords > $sms_type_list->StartRecord + $sms_type_list->DisplayRecords - 1)
		$sms_type_list->StopRecord = $sms_type_list->StartRecord + $sms_type_list->DisplayRecords - 1;
	else
		$sms_type_list->StopRecord = $sms_type_list->TotalRecords;
}
$sms_type_list->RecordCount = $sms_type_list->StartRecord - 1;
if ($sms_type_list->Recordset && !$sms_type_list->Recordset->EOF) {
	$sms_type_list->Recordset->moveFirst();
	$selectLimit = $sms_type_list->UseSelectLimit;
	if (!$selectLimit && $sms_type_list->StartRecord > 1)
		$sms_type_list->Recordset->move($sms_type_list->StartRecord - 1);
} elseif (!$sms_type->AllowAddDeleteRow && $sms_type_list->StopRecord == 0) {
	$sms_type_list->StopRecord = $sms_type->GridAddRowCount;
}

// Initialize aggregate
$sms_type->RowType = ROWTYPE_AGGREGATEINIT;
$sms_type->resetAttributes();
$sms_type_list->renderRow();
while ($sms_type_list->RecordCount < $sms_type_list->StopRecord) {
	$sms_type_list->RecordCount++;
	if ($sms_type_list->RecordCount >= $sms_type_list->StartRecord) {
		$sms_type_list->RowCount++;

		// Set up key count
		$sms_type_list->KeyCount = $sms_type_list->RowIndex;

		// Init row class and style
		$sms_type->resetAttributes();
		$sms_type->CssClass = "";
		if ($sms_type_list->isGridAdd()) {
		} else {
			$sms_type_list->loadRowValues($sms_type_list->Recordset); // Load row values
		}
		$sms_type->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sms_type->RowAttrs->merge(["data-rowindex" => $sms_type_list->RowCount, "id" => "r" . $sms_type_list->RowCount . "_sms_type", "data-rowtype" => $sms_type->RowType]);

		// Render row
		$sms_type_list->renderRow();

		// Render list options
		$sms_type_list->renderListOptions();
?>
	<tr <?php echo $sms_type->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sms_type_list->ListOptions->render("body", "left", $sms_type_list->RowCount);
?>
	<?php if ($sms_type_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $sms_type_list->id->cellAttributes() ?>>
<span id="el<?php echo $sms_type_list->RowCount ?>_sms_type_id">
<span<?php echo $sms_type_list->id->viewAttributes() ?>><?php echo $sms_type_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_type_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $sms_type_list->Name->cellAttributes() ?>>
<span id="el<?php echo $sms_type_list->RowCount ?>_sms_type_Name">
<span<?php echo $sms_type_list->Name->viewAttributes() ?>><?php echo $sms_type_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sms_type_list->ListOptions->render("body", "right", $sms_type_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sms_type_list->isGridAdd())
		$sms_type_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sms_type->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sms_type_list->Recordset)
	$sms_type_list->Recordset->Close();
?>
<?php if (!$sms_type_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sms_type_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sms_type_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_type_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sms_type_list->TotalRecords == 0 && !$sms_type->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sms_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sms_type_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sms_type_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$sms_type->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_sms_type",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$sms_type_list->terminate();
?>