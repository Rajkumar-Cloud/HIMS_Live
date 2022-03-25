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
$reception_list = new reception_list();

// Run the page
$reception_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$reception_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$reception_list->isExport()) { ?>
<script>
var freceptionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	freceptionlist = currentForm = new ew.Form("freceptionlist", "list");
	freceptionlist.formKeyCountName = '<?php echo $reception_list->FormKeyCountName ?>';
	loadjs.done("freceptionlist");
});
var freceptionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	freceptionlistsrch = currentSearchForm = new ew.Form("freceptionlistsrch");

	// Dynamic selection lists
	// Filters

	freceptionlistsrch.filterList = <?php echo $reception_list->getFilterList() ?>;
	loadjs.done("freceptionlistsrch");
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
<?php if (!$reception_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($reception_list->TotalRecords > 0 && $reception_list->ExportOptions->visible()) { ?>
<?php $reception_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($reception_list->ImportOptions->visible()) { ?>
<?php $reception_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($reception_list->SearchOptions->visible()) { ?>
<?php $reception_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($reception_list->FilterOptions->visible()) { ?>
<?php $reception_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$reception_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$reception_list->isExport() && !$reception->CurrentAction) { ?>
<form name="freceptionlistsrch" id="freceptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="freceptionlistsrch-search-panel" class="<?php echo $reception_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="reception">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $reception_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($reception_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($reception_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $reception_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($reception_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $reception_list->showPageHeader(); ?>
<?php
$reception_list->showMessage();
?>
<?php if ($reception_list->TotalRecords > 0 || $reception->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($reception_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> reception">
<?php if (!$reception_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$reception_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $reception_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $reception_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="freceptionlist" id="freceptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<div id="gmp_reception" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($reception_list->TotalRecords > 0 || $reception_list->isGridEdit()) { ?>
<table id="tbl_receptionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$reception->RowType = ROWTYPE_HEADER;

// Render list options
$reception_list->renderListOptions();

// Render list options (header, left)
$reception_list->ListOptions->render("header", "left");
?>
<?php if ($reception_list->id->Visible) { // id ?>
	<?php if ($reception_list->SortUrl($reception_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $reception_list->id->headerCellClass() ?>"><div id="elh_reception_id" class="reception_id"><div class="ew-table-header-caption"><?php echo $reception_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $reception_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->id) ?>', 1);"><div id="elh_reception_id" class="reception_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->PatientID->Visible) { // PatientID ?>
	<?php if ($reception_list->SortUrl($reception_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $reception_list->PatientID->headerCellClass() ?>"><div id="elh_reception_PatientID" class="reception_PatientID"><div class="ew-table-header-caption"><?php echo $reception_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $reception_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->PatientID) ?>', 1);"><div id="elh_reception_PatientID" class="reception_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->PatientName->Visible) { // PatientName ?>
	<?php if ($reception_list->SortUrl($reception_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $reception_list->PatientName->headerCellClass() ?>"><div id="elh_reception_PatientName" class="reception_PatientName"><div class="ew-table-header-caption"><?php echo $reception_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $reception_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->PatientName) ?>', 1);"><div id="elh_reception_PatientName" class="reception_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->OorN->Visible) { // OorN ?>
	<?php if ($reception_list->SortUrl($reception_list->OorN) == "") { ?>
		<th data-name="OorN" class="<?php echo $reception_list->OorN->headerCellClass() ?>"><div id="elh_reception_OorN" class="reception_OorN"><div class="ew-table-header-caption"><?php echo $reception_list->OorN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OorN" class="<?php echo $reception_list->OorN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->OorN) ?>', 1);"><div id="elh_reception_OorN" class="reception_OorN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->OorN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception_list->OorN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->OorN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
	<?php if ($reception_list->SortUrl($reception_list->PRIMARY_CONSULTANT) == "") { ?>
		<th data-name="PRIMARY_CONSULTANT" class="<?php echo $reception_list->PRIMARY_CONSULTANT->headerCellClass() ?>"><div id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT"><div class="ew-table-header-caption"><?php echo $reception_list->PRIMARY_CONSULTANT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRIMARY_CONSULTANT" class="<?php echo $reception_list->PRIMARY_CONSULTANT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->PRIMARY_CONSULTANT) ?>', 1);"><div id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->PRIMARY_CONSULTANT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception_list->PRIMARY_CONSULTANT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->PRIMARY_CONSULTANT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->CATEGORY->Visible) { // CATEGORY ?>
	<?php if ($reception_list->SortUrl($reception_list->CATEGORY) == "") { ?>
		<th data-name="CATEGORY" class="<?php echo $reception_list->CATEGORY->headerCellClass() ?>"><div id="elh_reception_CATEGORY" class="reception_CATEGORY"><div class="ew-table-header-caption"><?php echo $reception_list->CATEGORY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CATEGORY" class="<?php echo $reception_list->CATEGORY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->CATEGORY) ?>', 1);"><div id="elh_reception_CATEGORY" class="reception_CATEGORY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->CATEGORY->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception_list->CATEGORY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->CATEGORY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($reception_list->SortUrl($reception_list->PROCEDURE) == "") { ?>
		<th data-name="PROCEDURE" class="<?php echo $reception_list->PROCEDURE->headerCellClass() ?>"><div id="elh_reception_PROCEDURE" class="reception_PROCEDURE"><div class="ew-table-header-caption"><?php echo $reception_list->PROCEDURE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROCEDURE" class="<?php echo $reception_list->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->PROCEDURE) ?>', 1);"><div id="elh_reception_PROCEDURE" class="reception_PROCEDURE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->PROCEDURE->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception_list->PROCEDURE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->PROCEDURE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->Amount->Visible) { // Amount ?>
	<?php if ($reception_list->SortUrl($reception_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $reception_list->Amount->headerCellClass() ?>"><div id="elh_reception_Amount" class="reception_Amount"><div class="ew-table-header-caption"><?php echo $reception_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $reception_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->Amount) ?>', 1);"><div id="elh_reception_Amount" class="reception_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->Amount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
	<?php if ($reception_list->SortUrl($reception_list->MODE_OF_PAYMENT) == "") { ?>
		<th data-name="MODE_OF_PAYMENT" class="<?php echo $reception_list->MODE_OF_PAYMENT->headerCellClass() ?>"><div id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT"><div class="ew-table-header-caption"><?php echo $reception_list->MODE_OF_PAYMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MODE_OF_PAYMENT" class="<?php echo $reception_list->MODE_OF_PAYMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->MODE_OF_PAYMENT) ?>', 1);"><div id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->MODE_OF_PAYMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception_list->MODE_OF_PAYMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->MODE_OF_PAYMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
	<?php if ($reception_list->SortUrl($reception_list->NEXT_REVIEW_DATE) == "") { ?>
		<th data-name="NEXT_REVIEW_DATE" class="<?php echo $reception_list->NEXT_REVIEW_DATE->headerCellClass() ?>"><div id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE"><div class="ew-table-header-caption"><?php echo $reception_list->NEXT_REVIEW_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEXT_REVIEW_DATE" class="<?php echo $reception_list->NEXT_REVIEW_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->NEXT_REVIEW_DATE) ?>', 1);"><div id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->NEXT_REVIEW_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($reception_list->NEXT_REVIEW_DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->NEXT_REVIEW_DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($reception_list->REMARKS->Visible) { // REMARKS ?>
	<?php if ($reception_list->SortUrl($reception_list->REMARKS) == "") { ?>
		<th data-name="REMARKS" class="<?php echo $reception_list->REMARKS->headerCellClass() ?>"><div id="elh_reception_REMARKS" class="reception_REMARKS"><div class="ew-table-header-caption"><?php echo $reception_list->REMARKS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REMARKS" class="<?php echo $reception_list->REMARKS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $reception_list->SortUrl($reception_list->REMARKS) ?>', 1);"><div id="elh_reception_REMARKS" class="reception_REMARKS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $reception_list->REMARKS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($reception_list->REMARKS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($reception_list->REMARKS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$reception_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($reception_list->ExportAll && $reception_list->isExport()) {
	$reception_list->StopRecord = $reception_list->TotalRecords;
} else {

	// Set the last record to display
	if ($reception_list->TotalRecords > $reception_list->StartRecord + $reception_list->DisplayRecords - 1)
		$reception_list->StopRecord = $reception_list->StartRecord + $reception_list->DisplayRecords - 1;
	else
		$reception_list->StopRecord = $reception_list->TotalRecords;
}
$reception_list->RecordCount = $reception_list->StartRecord - 1;
if ($reception_list->Recordset && !$reception_list->Recordset->EOF) {
	$reception_list->Recordset->moveFirst();
	$selectLimit = $reception_list->UseSelectLimit;
	if (!$selectLimit && $reception_list->StartRecord > 1)
		$reception_list->Recordset->move($reception_list->StartRecord - 1);
} elseif (!$reception->AllowAddDeleteRow && $reception_list->StopRecord == 0) {
	$reception_list->StopRecord = $reception->GridAddRowCount;
}

// Initialize aggregate
$reception->RowType = ROWTYPE_AGGREGATEINIT;
$reception->resetAttributes();
$reception_list->renderRow();
while ($reception_list->RecordCount < $reception_list->StopRecord) {
	$reception_list->RecordCount++;
	if ($reception_list->RecordCount >= $reception_list->StartRecord) {
		$reception_list->RowCount++;

		// Set up key count
		$reception_list->KeyCount = $reception_list->RowIndex;

		// Init row class and style
		$reception->resetAttributes();
		$reception->CssClass = "";
		if ($reception_list->isGridAdd()) {
		} else {
			$reception_list->loadRowValues($reception_list->Recordset); // Load row values
		}
		$reception->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$reception->RowAttrs->merge(["data-rowindex" => $reception_list->RowCount, "id" => "r" . $reception_list->RowCount . "_reception", "data-rowtype" => $reception->RowType]);

		// Render row
		$reception_list->renderRow();

		// Render list options
		$reception_list->renderListOptions();
?>
	<tr <?php echo $reception->rowAttributes() ?>>
<?php

// Render list options (body, left)
$reception_list->ListOptions->render("body", "left", $reception_list->RowCount);
?>
	<?php if ($reception_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $reception_list->id->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_id">
<span<?php echo $reception_list->id->viewAttributes() ?>><?php echo $reception_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $reception_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_PatientID">
<span<?php echo $reception_list->PatientID->viewAttributes() ?>><?php echo $reception_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $reception_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_PatientName">
<span<?php echo $reception_list->PatientName->viewAttributes() ?>><?php echo $reception_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->OorN->Visible) { // OorN ?>
		<td data-name="OorN" <?php echo $reception_list->OorN->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_OorN">
<span<?php echo $reception_list->OorN->viewAttributes() ?>><?php echo $reception_list->OorN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
		<td data-name="PRIMARY_CONSULTANT" <?php echo $reception_list->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_PRIMARY_CONSULTANT">
<span<?php echo $reception_list->PRIMARY_CONSULTANT->viewAttributes() ?>><?php echo $reception_list->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->CATEGORY->Visible) { // CATEGORY ?>
		<td data-name="CATEGORY" <?php echo $reception_list->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_CATEGORY">
<span<?php echo $reception_list->CATEGORY->viewAttributes() ?>><?php echo $reception_list->CATEGORY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->PROCEDURE->Visible) { // PROCEDURE ?>
		<td data-name="PROCEDURE" <?php echo $reception_list->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_PROCEDURE">
<span<?php echo $reception_list->PROCEDURE->viewAttributes() ?>><?php echo $reception_list->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $reception_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_Amount">
<span<?php echo $reception_list->Amount->viewAttributes() ?>><?php echo $reception_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
		<td data-name="MODE_OF_PAYMENT" <?php echo $reception_list->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_MODE_OF_PAYMENT">
<span<?php echo $reception_list->MODE_OF_PAYMENT->viewAttributes() ?>><?php echo $reception_list->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
		<td data-name="NEXT_REVIEW_DATE" <?php echo $reception_list->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_NEXT_REVIEW_DATE">
<span<?php echo $reception_list->NEXT_REVIEW_DATE->viewAttributes() ?>><?php echo $reception_list->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($reception_list->REMARKS->Visible) { // REMARKS ?>
		<td data-name="REMARKS" <?php echo $reception_list->REMARKS->cellAttributes() ?>>
<span id="el<?php echo $reception_list->RowCount ?>_reception_REMARKS">
<span<?php echo $reception_list->REMARKS->viewAttributes() ?>><?php echo $reception_list->REMARKS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$reception_list->ListOptions->render("body", "right", $reception_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$reception_list->isGridAdd())
		$reception_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$reception->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($reception_list->Recordset)
	$reception_list->Recordset->Close();
?>
<?php if (!$reception_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$reception_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $reception_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $reception_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($reception_list->TotalRecords == 0 && !$reception->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $reception_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$reception_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$reception_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$reception->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_reception",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$reception_list->terminate();
?>