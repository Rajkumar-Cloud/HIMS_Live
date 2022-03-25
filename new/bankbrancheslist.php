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
$bankbranches_list = new bankbranches_list();

// Run the page
$bankbranches_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bankbranches_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bankbranches_list->isExport()) { ?>
<script>
var fbankbrancheslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbankbrancheslist = currentForm = new ew.Form("fbankbrancheslist", "list");
	fbankbrancheslist.formKeyCountName = '<?php echo $bankbranches_list->FormKeyCountName ?>';
	loadjs.done("fbankbrancheslist");
});
var fbankbrancheslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbankbrancheslistsrch = currentSearchForm = new ew.Form("fbankbrancheslistsrch");

	// Dynamic selection lists
	// Filters

	fbankbrancheslistsrch.filterList = <?php echo $bankbranches_list->getFilterList() ?>;
	loadjs.done("fbankbrancheslistsrch");
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
<?php if (!$bankbranches_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bankbranches_list->TotalRecords > 0 && $bankbranches_list->ExportOptions->visible()) { ?>
<?php $bankbranches_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bankbranches_list->ImportOptions->visible()) { ?>
<?php $bankbranches_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bankbranches_list->SearchOptions->visible()) { ?>
<?php $bankbranches_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bankbranches_list->FilterOptions->visible()) { ?>
<?php $bankbranches_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bankbranches_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bankbranches_list->isExport() && !$bankbranches->CurrentAction) { ?>
<form name="fbankbrancheslistsrch" id="fbankbrancheslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbankbrancheslistsrch-search-panel" class="<?php echo $bankbranches_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bankbranches">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bankbranches_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bankbranches_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bankbranches_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bankbranches_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bankbranches_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bankbranches_list->showPageHeader(); ?>
<?php
$bankbranches_list->showMessage();
?>
<?php if ($bankbranches_list->TotalRecords > 0 || $bankbranches->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bankbranches_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bankbranches">
<?php if (!$bankbranches_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bankbranches_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bankbranches_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bankbranches_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbankbrancheslist" id="fbankbrancheslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<div id="gmp_bankbranches" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bankbranches_list->TotalRecords > 0 || $bankbranches_list->isGridEdit()) { ?>
<table id="tbl_bankbrancheslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bankbranches->RowType = ROWTYPE_HEADER;

// Render list options
$bankbranches_list->renderListOptions();

// Render list options (header, left)
$bankbranches_list->ListOptions->render("header", "left");
?>
<?php if ($bankbranches_list->id->Visible) { // id ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $bankbranches_list->id->headerCellClass() ?>"><div id="elh_bankbranches_id" class="bankbranches_id"><div class="ew-table-header-caption"><?php echo $bankbranches_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $bankbranches_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->id) ?>', 1);"><div id="elh_bankbranches_id" class="bankbranches_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->Branch_Name->Visible) { // Branch_Name ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->Branch_Name) == "") { ?>
		<th data-name="Branch_Name" class="<?php echo $bankbranches_list->Branch_Name->headerCellClass() ?>"><div id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name"><div class="ew-table-header-caption"><?php echo $bankbranches_list->Branch_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch_Name" class="<?php echo $bankbranches_list->Branch_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->Branch_Name) ?>', 1);"><div id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->Branch_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->Branch_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->Branch_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->Street_Address->Visible) { // Street_Address ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->Street_Address) == "") { ?>
		<th data-name="Street_Address" class="<?php echo $bankbranches_list->Street_Address->headerCellClass() ?>"><div id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address"><div class="ew-table-header-caption"><?php echo $bankbranches_list->Street_Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Street_Address" class="<?php echo $bankbranches_list->Street_Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->Street_Address) ?>', 1);"><div id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->Street_Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->Street_Address->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->Street_Address->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->City->Visible) { // City ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->City) == "") { ?>
		<th data-name="City" class="<?php echo $bankbranches_list->City->headerCellClass() ?>"><div id="elh_bankbranches_City" class="bankbranches_City"><div class="ew-table-header-caption"><?php echo $bankbranches_list->City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="City" class="<?php echo $bankbranches_list->City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->City) ?>', 1);"><div id="elh_bankbranches_City" class="bankbranches_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->City->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->City->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->State->Visible) { // State ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $bankbranches_list->State->headerCellClass() ?>"><div id="elh_bankbranches_State" class="bankbranches_State"><div class="ew-table-header-caption"><?php echo $bankbranches_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $bankbranches_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->State) ?>', 1);"><div id="elh_bankbranches_State" class="bankbranches_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->Zipcode->Visible) { // Zipcode ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->Zipcode) == "") { ?>
		<th data-name="Zipcode" class="<?php echo $bankbranches_list->Zipcode->headerCellClass() ?>"><div id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode"><div class="ew-table-header-caption"><?php echo $bankbranches_list->Zipcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Zipcode" class="<?php echo $bankbranches_list->Zipcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->Zipcode) ?>', 1);"><div id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->Zipcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->Zipcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->Zipcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->Phone_Number->Visible) { // Phone_Number ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->Phone_Number) == "") { ?>
		<th data-name="Phone_Number" class="<?php echo $bankbranches_list->Phone_Number->headerCellClass() ?>"><div id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number"><div class="ew-table-header-caption"><?php echo $bankbranches_list->Phone_Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone_Number" class="<?php echo $bankbranches_list->Phone_Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->Phone_Number) ?>', 1);"><div id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->Phone_Number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->Phone_Number->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->Phone_Number->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bankbranches_list->AccountNo->Visible) { // AccountNo ?>
	<?php if ($bankbranches_list->SortUrl($bankbranches_list->AccountNo) == "") { ?>
		<th data-name="AccountNo" class="<?php echo $bankbranches_list->AccountNo->headerCellClass() ?>"><div id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo"><div class="ew-table-header-caption"><?php echo $bankbranches_list->AccountNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNo" class="<?php echo $bankbranches_list->AccountNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bankbranches_list->SortUrl($bankbranches_list->AccountNo) ?>', 1);"><div id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bankbranches_list->AccountNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bankbranches_list->AccountNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bankbranches_list->AccountNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bankbranches_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bankbranches_list->ExportAll && $bankbranches_list->isExport()) {
	$bankbranches_list->StopRecord = $bankbranches_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bankbranches_list->TotalRecords > $bankbranches_list->StartRecord + $bankbranches_list->DisplayRecords - 1)
		$bankbranches_list->StopRecord = $bankbranches_list->StartRecord + $bankbranches_list->DisplayRecords - 1;
	else
		$bankbranches_list->StopRecord = $bankbranches_list->TotalRecords;
}
$bankbranches_list->RecordCount = $bankbranches_list->StartRecord - 1;
if ($bankbranches_list->Recordset && !$bankbranches_list->Recordset->EOF) {
	$bankbranches_list->Recordset->moveFirst();
	$selectLimit = $bankbranches_list->UseSelectLimit;
	if (!$selectLimit && $bankbranches_list->StartRecord > 1)
		$bankbranches_list->Recordset->move($bankbranches_list->StartRecord - 1);
} elseif (!$bankbranches->AllowAddDeleteRow && $bankbranches_list->StopRecord == 0) {
	$bankbranches_list->StopRecord = $bankbranches->GridAddRowCount;
}

// Initialize aggregate
$bankbranches->RowType = ROWTYPE_AGGREGATEINIT;
$bankbranches->resetAttributes();
$bankbranches_list->renderRow();
while ($bankbranches_list->RecordCount < $bankbranches_list->StopRecord) {
	$bankbranches_list->RecordCount++;
	if ($bankbranches_list->RecordCount >= $bankbranches_list->StartRecord) {
		$bankbranches_list->RowCount++;

		// Set up key count
		$bankbranches_list->KeyCount = $bankbranches_list->RowIndex;

		// Init row class and style
		$bankbranches->resetAttributes();
		$bankbranches->CssClass = "";
		if ($bankbranches_list->isGridAdd()) {
		} else {
			$bankbranches_list->loadRowValues($bankbranches_list->Recordset); // Load row values
		}
		$bankbranches->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bankbranches->RowAttrs->merge(["data-rowindex" => $bankbranches_list->RowCount, "id" => "r" . $bankbranches_list->RowCount . "_bankbranches", "data-rowtype" => $bankbranches->RowType]);

		// Render row
		$bankbranches_list->renderRow();

		// Render list options
		$bankbranches_list->renderListOptions();
?>
	<tr <?php echo $bankbranches->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bankbranches_list->ListOptions->render("body", "left", $bankbranches_list->RowCount);
?>
	<?php if ($bankbranches_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $bankbranches_list->id->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_id">
<span<?php echo $bankbranches_list->id->viewAttributes() ?>><?php echo $bankbranches_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->Branch_Name->Visible) { // Branch_Name ?>
		<td data-name="Branch_Name" <?php echo $bankbranches_list->Branch_Name->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_Branch_Name">
<span<?php echo $bankbranches_list->Branch_Name->viewAttributes() ?>><?php echo $bankbranches_list->Branch_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->Street_Address->Visible) { // Street_Address ?>
		<td data-name="Street_Address" <?php echo $bankbranches_list->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_Street_Address">
<span<?php echo $bankbranches_list->Street_Address->viewAttributes() ?>><?php echo $bankbranches_list->Street_Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->City->Visible) { // City ?>
		<td data-name="City" <?php echo $bankbranches_list->City->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_City">
<span<?php echo $bankbranches_list->City->viewAttributes() ?>><?php echo $bankbranches_list->City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $bankbranches_list->State->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_State">
<span<?php echo $bankbranches_list->State->viewAttributes() ?>><?php echo $bankbranches_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->Zipcode->Visible) { // Zipcode ?>
		<td data-name="Zipcode" <?php echo $bankbranches_list->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_Zipcode">
<span<?php echo $bankbranches_list->Zipcode->viewAttributes() ?>><?php echo $bankbranches_list->Zipcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->Phone_Number->Visible) { // Phone_Number ?>
		<td data-name="Phone_Number" <?php echo $bankbranches_list->Phone_Number->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_Phone_Number">
<span<?php echo $bankbranches_list->Phone_Number->viewAttributes() ?>><?php echo $bankbranches_list->Phone_Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bankbranches_list->AccountNo->Visible) { // AccountNo ?>
		<td data-name="AccountNo" <?php echo $bankbranches_list->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_list->RowCount ?>_bankbranches_AccountNo">
<span<?php echo $bankbranches_list->AccountNo->viewAttributes() ?>><?php echo $bankbranches_list->AccountNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bankbranches_list->ListOptions->render("body", "right", $bankbranches_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bankbranches_list->isGridAdd())
		$bankbranches_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bankbranches->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bankbranches_list->Recordset)
	$bankbranches_list->Recordset->Close();
?>
<?php if (!$bankbranches_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$bankbranches_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bankbranches_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bankbranches_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bankbranches_list->TotalRecords == 0 && !$bankbranches->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bankbranches_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bankbranches_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bankbranches_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$bankbranches->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_bankbranches",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$bankbranches_list->terminate();
?>