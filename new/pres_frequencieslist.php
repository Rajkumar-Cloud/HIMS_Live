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
$pres_frequencies_list = new pres_frequencies_list();

// Run the page
$pres_frequencies_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_frequencies_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_frequencies_list->isExport()) { ?>
<script>
var fpres_frequencieslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_frequencieslist = currentForm = new ew.Form("fpres_frequencieslist", "list");
	fpres_frequencieslist.formKeyCountName = '<?php echo $pres_frequencies_list->FormKeyCountName ?>';
	loadjs.done("fpres_frequencieslist");
});
var fpres_frequencieslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_frequencieslistsrch = currentSearchForm = new ew.Form("fpres_frequencieslistsrch");

	// Dynamic selection lists
	// Filters

	fpres_frequencieslistsrch.filterList = <?php echo $pres_frequencies_list->getFilterList() ?>;
	loadjs.done("fpres_frequencieslistsrch");
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
<?php if (!$pres_frequencies_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_frequencies_list->TotalRecords > 0 && $pres_frequencies_list->ExportOptions->visible()) { ?>
<?php $pres_frequencies_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_frequencies_list->ImportOptions->visible()) { ?>
<?php $pres_frequencies_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_frequencies_list->SearchOptions->visible()) { ?>
<?php $pres_frequencies_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_frequencies_list->FilterOptions->visible()) { ?>
<?php $pres_frequencies_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_frequencies_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_frequencies_list->isExport() && !$pres_frequencies->CurrentAction) { ?>
<form name="fpres_frequencieslistsrch" id="fpres_frequencieslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_frequencieslistsrch-search-panel" class="<?php echo $pres_frequencies_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_frequencies">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_frequencies_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_frequencies_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_frequencies_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_frequencies_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_frequencies_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_frequencies_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_frequencies_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_frequencies_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_frequencies_list->showPageHeader(); ?>
<?php
$pres_frequencies_list->showMessage();
?>
<?php if ($pres_frequencies_list->TotalRecords > 0 || $pres_frequencies->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_frequencies_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_frequencies">
<?php if (!$pres_frequencies_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_frequencies_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_frequencies_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_frequencies_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_frequencieslist" id="fpres_frequencieslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
<div id="gmp_pres_frequencies" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_frequencies_list->TotalRecords > 0 || $pres_frequencies_list->isGridEdit()) { ?>
<table id="tbl_pres_frequencieslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_frequencies->RowType = ROWTYPE_HEADER;

// Render list options
$pres_frequencies_list->renderListOptions();

// Render list options (header, left)
$pres_frequencies_list->ListOptions->render("header", "left");
?>
<?php if ($pres_frequencies_list->id->Visible) { // id ?>
	<?php if ($pres_frequencies_list->SortUrl($pres_frequencies_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_frequencies_list->id->headerCellClass() ?>"><div id="elh_pres_frequencies_id" class="pres_frequencies_id"><div class="ew-table-header-caption"><?php echo $pres_frequencies_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_frequencies_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_frequencies_list->SortUrl($pres_frequencies_list->id) ?>', 1);"><div id="elh_pres_frequencies_id" class="pres_frequencies_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_frequencies_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_frequencies_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_frequencies_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_frequencies_list->Frequency->Visible) { // Frequency ?>
	<?php if ($pres_frequencies_list->SortUrl($pres_frequencies_list->Frequency) == "") { ?>
		<th data-name="Frequency" class="<?php echo $pres_frequencies_list->Frequency->headerCellClass() ?>"><div id="elh_pres_frequencies_Frequency" class="pres_frequencies_Frequency"><div class="ew-table-header-caption"><?php echo $pres_frequencies_list->Frequency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Frequency" class="<?php echo $pres_frequencies_list->Frequency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_frequencies_list->SortUrl($pres_frequencies_list->Frequency) ?>', 1);"><div id="elh_pres_frequencies_Frequency" class="pres_frequencies_Frequency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_frequencies_list->Frequency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_frequencies_list->Frequency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_frequencies_list->Frequency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_frequencies_list->Freq_Exp->Visible) { // Freq_Exp ?>
	<?php if ($pres_frequencies_list->SortUrl($pres_frequencies_list->Freq_Exp) == "") { ?>
		<th data-name="Freq_Exp" class="<?php echo $pres_frequencies_list->Freq_Exp->headerCellClass() ?>"><div id="elh_pres_frequencies_Freq_Exp" class="pres_frequencies_Freq_Exp"><div class="ew-table-header-caption"><?php echo $pres_frequencies_list->Freq_Exp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Freq_Exp" class="<?php echo $pres_frequencies_list->Freq_Exp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_frequencies_list->SortUrl($pres_frequencies_list->Freq_Exp) ?>', 1);"><div id="elh_pres_frequencies_Freq_Exp" class="pres_frequencies_Freq_Exp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_frequencies_list->Freq_Exp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_frequencies_list->Freq_Exp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_frequencies_list->Freq_Exp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_frequencies_list->Freq_Count->Visible) { // Freq_Count ?>
	<?php if ($pres_frequencies_list->SortUrl($pres_frequencies_list->Freq_Count) == "") { ?>
		<th data-name="Freq_Count" class="<?php echo $pres_frequencies_list->Freq_Count->headerCellClass() ?>"><div id="elh_pres_frequencies_Freq_Count" class="pres_frequencies_Freq_Count"><div class="ew-table-header-caption"><?php echo $pres_frequencies_list->Freq_Count->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Freq_Count" class="<?php echo $pres_frequencies_list->Freq_Count->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_frequencies_list->SortUrl($pres_frequencies_list->Freq_Count) ?>', 1);"><div id="elh_pres_frequencies_Freq_Count" class="pres_frequencies_Freq_Count">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_frequencies_list->Freq_Count->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_frequencies_list->Freq_Count->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_frequencies_list->Freq_Count->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_frequencies_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_frequencies_list->ExportAll && $pres_frequencies_list->isExport()) {
	$pres_frequencies_list->StopRecord = $pres_frequencies_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_frequencies_list->TotalRecords > $pres_frequencies_list->StartRecord + $pres_frequencies_list->DisplayRecords - 1)
		$pres_frequencies_list->StopRecord = $pres_frequencies_list->StartRecord + $pres_frequencies_list->DisplayRecords - 1;
	else
		$pres_frequencies_list->StopRecord = $pres_frequencies_list->TotalRecords;
}
$pres_frequencies_list->RecordCount = $pres_frequencies_list->StartRecord - 1;
if ($pres_frequencies_list->Recordset && !$pres_frequencies_list->Recordset->EOF) {
	$pres_frequencies_list->Recordset->moveFirst();
	$selectLimit = $pres_frequencies_list->UseSelectLimit;
	if (!$selectLimit && $pres_frequencies_list->StartRecord > 1)
		$pres_frequencies_list->Recordset->move($pres_frequencies_list->StartRecord - 1);
} elseif (!$pres_frequencies->AllowAddDeleteRow && $pres_frequencies_list->StopRecord == 0) {
	$pres_frequencies_list->StopRecord = $pres_frequencies->GridAddRowCount;
}

// Initialize aggregate
$pres_frequencies->RowType = ROWTYPE_AGGREGATEINIT;
$pres_frequencies->resetAttributes();
$pres_frequencies_list->renderRow();
while ($pres_frequencies_list->RecordCount < $pres_frequencies_list->StopRecord) {
	$pres_frequencies_list->RecordCount++;
	if ($pres_frequencies_list->RecordCount >= $pres_frequencies_list->StartRecord) {
		$pres_frequencies_list->RowCount++;

		// Set up key count
		$pres_frequencies_list->KeyCount = $pres_frequencies_list->RowIndex;

		// Init row class and style
		$pres_frequencies->resetAttributes();
		$pres_frequencies->CssClass = "";
		if ($pres_frequencies_list->isGridAdd()) {
		} else {
			$pres_frequencies_list->loadRowValues($pres_frequencies_list->Recordset); // Load row values
		}
		$pres_frequencies->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_frequencies->RowAttrs->merge(["data-rowindex" => $pres_frequencies_list->RowCount, "id" => "r" . $pres_frequencies_list->RowCount . "_pres_frequencies", "data-rowtype" => $pres_frequencies->RowType]);

		// Render row
		$pres_frequencies_list->renderRow();

		// Render list options
		$pres_frequencies_list->renderListOptions();
?>
	<tr <?php echo $pres_frequencies->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_frequencies_list->ListOptions->render("body", "left", $pres_frequencies_list->RowCount);
?>
	<?php if ($pres_frequencies_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_frequencies_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_list->RowCount ?>_pres_frequencies_id">
<span<?php echo $pres_frequencies_list->id->viewAttributes() ?>><?php echo $pres_frequencies_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_frequencies_list->Frequency->Visible) { // Frequency ?>
		<td data-name="Frequency" <?php echo $pres_frequencies_list->Frequency->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_list->RowCount ?>_pres_frequencies_Frequency">
<span<?php echo $pres_frequencies_list->Frequency->viewAttributes() ?>><?php echo $pres_frequencies_list->Frequency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_frequencies_list->Freq_Exp->Visible) { // Freq_Exp ?>
		<td data-name="Freq_Exp" <?php echo $pres_frequencies_list->Freq_Exp->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_list->RowCount ?>_pres_frequencies_Freq_Exp">
<span<?php echo $pres_frequencies_list->Freq_Exp->viewAttributes() ?>><?php echo $pres_frequencies_list->Freq_Exp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_frequencies_list->Freq_Count->Visible) { // Freq_Count ?>
		<td data-name="Freq_Count" <?php echo $pres_frequencies_list->Freq_Count->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_list->RowCount ?>_pres_frequencies_Freq_Count">
<span<?php echo $pres_frequencies_list->Freq_Count->viewAttributes() ?>><?php echo $pres_frequencies_list->Freq_Count->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_frequencies_list->ListOptions->render("body", "right", $pres_frequencies_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_frequencies_list->isGridAdd())
		$pres_frequencies_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_frequencies->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_frequencies_list->Recordset)
	$pres_frequencies_list->Recordset->Close();
?>
<?php if (!$pres_frequencies_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_frequencies_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_frequencies_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_frequencies_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_frequencies_list->TotalRecords == 0 && !$pres_frequencies->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_frequencies_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_frequencies_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_frequencies_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_frequencies->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_frequencies",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_frequencies_list->terminate();
?>