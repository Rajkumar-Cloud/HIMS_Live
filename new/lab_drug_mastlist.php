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
$lab_drug_mast_list = new lab_drug_mast_list();

// Run the page
$lab_drug_mast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_drug_mast_list->isExport()) { ?>
<script>
var flab_drug_mastlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_drug_mastlist = currentForm = new ew.Form("flab_drug_mastlist", "list");
	flab_drug_mastlist.formKeyCountName = '<?php echo $lab_drug_mast_list->FormKeyCountName ?>';
	loadjs.done("flab_drug_mastlist");
});
var flab_drug_mastlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_drug_mastlistsrch = currentSearchForm = new ew.Form("flab_drug_mastlistsrch");

	// Dynamic selection lists
	// Filters

	flab_drug_mastlistsrch.filterList = <?php echo $lab_drug_mast_list->getFilterList() ?>;
	loadjs.done("flab_drug_mastlistsrch");
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
<?php if (!$lab_drug_mast_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_drug_mast_list->TotalRecords > 0 && $lab_drug_mast_list->ExportOptions->visible()) { ?>
<?php $lab_drug_mast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_drug_mast_list->ImportOptions->visible()) { ?>
<?php $lab_drug_mast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_drug_mast_list->SearchOptions->visible()) { ?>
<?php $lab_drug_mast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_drug_mast_list->FilterOptions->visible()) { ?>
<?php $lab_drug_mast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_drug_mast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_drug_mast_list->isExport() && !$lab_drug_mast->CurrentAction) { ?>
<form name="flab_drug_mastlistsrch" id="flab_drug_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_drug_mastlistsrch-search-panel" class="<?php echo $lab_drug_mast_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_drug_mast">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lab_drug_mast_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_drug_mast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_drug_mast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_drug_mast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_drug_mast_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_drug_mast_list->showPageHeader(); ?>
<?php
$lab_drug_mast_list->showMessage();
?>
<?php if ($lab_drug_mast_list->TotalRecords > 0 || $lab_drug_mast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_drug_mast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_drug_mast">
<?php if (!$lab_drug_mast_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_drug_mast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_drug_mast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_drug_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_drug_mastlist" id="flab_drug_mastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<div id="gmp_lab_drug_mast" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_drug_mast_list->TotalRecords > 0 || $lab_drug_mast_list->isGridEdit()) { ?>
<table id="tbl_lab_drug_mastlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_drug_mast->RowType = ROWTYPE_HEADER;

// Render list options
$lab_drug_mast_list->renderListOptions();

// Render list options (header, left)
$lab_drug_mast_list->ListOptions->render("header", "left");
?>
<?php if ($lab_drug_mast_list->DrugName->Visible) { // DrugName ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->DrugName) == "") { ?>
		<th data-name="DrugName" class="<?php echo $lab_drug_mast_list->DrugName->headerCellClass() ?>"><div id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->DrugName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrugName" class="<?php echo $lab_drug_mast_list->DrugName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->DrugName) ?>', 1);"><div id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->DrugName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->DrugName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->DrugName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->Positive->Visible) { // Positive ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->Positive) == "") { ?>
		<th data-name="Positive" class="<?php echo $lab_drug_mast_list->Positive->headerCellClass() ?>"><div id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Positive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Positive" class="<?php echo $lab_drug_mast_list->Positive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->Positive) ?>', 1);"><div id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Positive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->Positive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->Positive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->Negative->Visible) { // Negative ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->Negative) == "") { ?>
		<th data-name="Negative" class="<?php echo $lab_drug_mast_list->Negative->headerCellClass() ?>"><div id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Negative->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Negative" class="<?php echo $lab_drug_mast_list->Negative->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->Negative) ?>', 1);"><div id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Negative->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->Negative->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->Negative->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->ShortName->Visible) { // ShortName ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->ShortName) == "") { ?>
		<th data-name="ShortName" class="<?php echo $lab_drug_mast_list->ShortName->headerCellClass() ?>"><div id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->ShortName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShortName" class="<?php echo $lab_drug_mast_list->ShortName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->ShortName) ?>', 1);"><div id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->ShortName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->ShortName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->ShortName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->GroupCD->Visible) { // GroupCD ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->GroupCD) == "") { ?>
		<th data-name="GroupCD" class="<?php echo $lab_drug_mast_list->GroupCD->headerCellClass() ?>"><div id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->GroupCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupCD" class="<?php echo $lab_drug_mast_list->GroupCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->GroupCD) ?>', 1);"><div id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->GroupCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->GroupCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->GroupCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->Content->Visible) { // Content ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->Content) == "") { ?>
		<th data-name="Content" class="<?php echo $lab_drug_mast_list->Content->headerCellClass() ?>"><div id="elh_lab_drug_mast_Content" class="lab_drug_mast_Content"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Content->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Content" class="<?php echo $lab_drug_mast_list->Content->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->Content) ?>', 1);"><div id="elh_lab_drug_mast_Content" class="lab_drug_mast_Content">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Content->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->Content->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->Content->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->Order->Visible) { // Order ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $lab_drug_mast_list->Order->headerCellClass() ?>"><div id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $lab_drug_mast_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->Order) ?>', 1);"><div id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->DrugCD->Visible) { // DrugCD ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->DrugCD) == "") { ?>
		<th data-name="DrugCD" class="<?php echo $lab_drug_mast_list->DrugCD->headerCellClass() ?>"><div id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->DrugCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrugCD" class="<?php echo $lab_drug_mast_list->DrugCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->DrugCD) ?>', 1);"><div id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->DrugCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->DrugCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->DrugCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_drug_mast_list->id->Visible) { // id ?>
	<?php if ($lab_drug_mast_list->SortUrl($lab_drug_mast_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_drug_mast_list->id->headerCellClass() ?>"><div id="elh_lab_drug_mast_id" class="lab_drug_mast_id"><div class="ew-table-header-caption"><?php echo $lab_drug_mast_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_drug_mast_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_drug_mast_list->SortUrl($lab_drug_mast_list->id) ?>', 1);"><div id="elh_lab_drug_mast_id" class="lab_drug_mast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_drug_mast_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_drug_mast_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_drug_mast_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_drug_mast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_drug_mast_list->ExportAll && $lab_drug_mast_list->isExport()) {
	$lab_drug_mast_list->StopRecord = $lab_drug_mast_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_drug_mast_list->TotalRecords > $lab_drug_mast_list->StartRecord + $lab_drug_mast_list->DisplayRecords - 1)
		$lab_drug_mast_list->StopRecord = $lab_drug_mast_list->StartRecord + $lab_drug_mast_list->DisplayRecords - 1;
	else
		$lab_drug_mast_list->StopRecord = $lab_drug_mast_list->TotalRecords;
}
$lab_drug_mast_list->RecordCount = $lab_drug_mast_list->StartRecord - 1;
if ($lab_drug_mast_list->Recordset && !$lab_drug_mast_list->Recordset->EOF) {
	$lab_drug_mast_list->Recordset->moveFirst();
	$selectLimit = $lab_drug_mast_list->UseSelectLimit;
	if (!$selectLimit && $lab_drug_mast_list->StartRecord > 1)
		$lab_drug_mast_list->Recordset->move($lab_drug_mast_list->StartRecord - 1);
} elseif (!$lab_drug_mast->AllowAddDeleteRow && $lab_drug_mast_list->StopRecord == 0) {
	$lab_drug_mast_list->StopRecord = $lab_drug_mast->GridAddRowCount;
}

// Initialize aggregate
$lab_drug_mast->RowType = ROWTYPE_AGGREGATEINIT;
$lab_drug_mast->resetAttributes();
$lab_drug_mast_list->renderRow();
while ($lab_drug_mast_list->RecordCount < $lab_drug_mast_list->StopRecord) {
	$lab_drug_mast_list->RecordCount++;
	if ($lab_drug_mast_list->RecordCount >= $lab_drug_mast_list->StartRecord) {
		$lab_drug_mast_list->RowCount++;

		// Set up key count
		$lab_drug_mast_list->KeyCount = $lab_drug_mast_list->RowIndex;

		// Init row class and style
		$lab_drug_mast->resetAttributes();
		$lab_drug_mast->CssClass = "";
		if ($lab_drug_mast_list->isGridAdd()) {
		} else {
			$lab_drug_mast_list->loadRowValues($lab_drug_mast_list->Recordset); // Load row values
		}
		$lab_drug_mast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_drug_mast->RowAttrs->merge(["data-rowindex" => $lab_drug_mast_list->RowCount, "id" => "r" . $lab_drug_mast_list->RowCount . "_lab_drug_mast", "data-rowtype" => $lab_drug_mast->RowType]);

		// Render row
		$lab_drug_mast_list->renderRow();

		// Render list options
		$lab_drug_mast_list->renderListOptions();
?>
	<tr <?php echo $lab_drug_mast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_drug_mast_list->ListOptions->render("body", "left", $lab_drug_mast_list->RowCount);
?>
	<?php if ($lab_drug_mast_list->DrugName->Visible) { // DrugName ?>
		<td data-name="DrugName" <?php echo $lab_drug_mast_list->DrugName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_DrugName">
<span<?php echo $lab_drug_mast_list->DrugName->viewAttributes() ?>><?php echo $lab_drug_mast_list->DrugName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Positive->Visible) { // Positive ?>
		<td data-name="Positive" <?php echo $lab_drug_mast_list->Positive->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_Positive">
<span<?php echo $lab_drug_mast_list->Positive->viewAttributes() ?>><?php echo $lab_drug_mast_list->Positive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Negative->Visible) { // Negative ?>
		<td data-name="Negative" <?php echo $lab_drug_mast_list->Negative->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_Negative">
<span<?php echo $lab_drug_mast_list->Negative->viewAttributes() ?>><?php echo $lab_drug_mast_list->Negative->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->ShortName->Visible) { // ShortName ?>
		<td data-name="ShortName" <?php echo $lab_drug_mast_list->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_ShortName">
<span<?php echo $lab_drug_mast_list->ShortName->viewAttributes() ?>><?php echo $lab_drug_mast_list->ShortName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->GroupCD->Visible) { // GroupCD ?>
		<td data-name="GroupCD" <?php echo $lab_drug_mast_list->GroupCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_GroupCD">
<span<?php echo $lab_drug_mast_list->GroupCD->viewAttributes() ?>><?php echo $lab_drug_mast_list->GroupCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Content->Visible) { // Content ?>
		<td data-name="Content" <?php echo $lab_drug_mast_list->Content->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_Content">
<span<?php echo $lab_drug_mast_list->Content->viewAttributes() ?>><?php echo $lab_drug_mast_list->Content->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $lab_drug_mast_list->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_Order">
<span<?php echo $lab_drug_mast_list->Order->viewAttributes() ?>><?php echo $lab_drug_mast_list->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->DrugCD->Visible) { // DrugCD ?>
		<td data-name="DrugCD" <?php echo $lab_drug_mast_list->DrugCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_DrugCD">
<span<?php echo $lab_drug_mast_list->DrugCD->viewAttributes() ?>><?php echo $lab_drug_mast_list->DrugCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_drug_mast_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_drug_mast_list->id->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_list->RowCount ?>_lab_drug_mast_id">
<span<?php echo $lab_drug_mast_list->id->viewAttributes() ?>><?php echo $lab_drug_mast_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_drug_mast_list->ListOptions->render("body", "right", $lab_drug_mast_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lab_drug_mast_list->isGridAdd())
		$lab_drug_mast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lab_drug_mast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_drug_mast_list->Recordset)
	$lab_drug_mast_list->Recordset->Close();
?>
<?php if (!$lab_drug_mast_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_drug_mast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_drug_mast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_drug_mast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_drug_mast_list->TotalRecords == 0 && !$lab_drug_mast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_drug_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_drug_mast_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_drug_mast_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_drug_mast->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_drug_mast",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_drug_mast_list->terminate();
?>