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
$banktransferto_list = new banktransferto_list();

// Run the page
$banktransferto_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$banktransferto_list->isExport()) { ?>
<script>
var fbanktransfertolist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbanktransfertolist = currentForm = new ew.Form("fbanktransfertolist", "list");
	fbanktransfertolist.formKeyCountName = '<?php echo $banktransferto_list->FormKeyCountName ?>';
	loadjs.done("fbanktransfertolist");
});
var fbanktransfertolistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbanktransfertolistsrch = currentSearchForm = new ew.Form("fbanktransfertolistsrch");

	// Dynamic selection lists
	// Filters

	fbanktransfertolistsrch.filterList = <?php echo $banktransferto_list->getFilterList() ?>;
	loadjs.done("fbanktransfertolistsrch");
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
<?php if (!$banktransferto_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($banktransferto_list->TotalRecords > 0 && $banktransferto_list->ExportOptions->visible()) { ?>
<?php $banktransferto_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($banktransferto_list->ImportOptions->visible()) { ?>
<?php $banktransferto_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($banktransferto_list->SearchOptions->visible()) { ?>
<?php $banktransferto_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($banktransferto_list->FilterOptions->visible()) { ?>
<?php $banktransferto_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$banktransferto_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$banktransferto_list->isExport() && !$banktransferto->CurrentAction) { ?>
<form name="fbanktransfertolistsrch" id="fbanktransfertolistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbanktransfertolistsrch-search-panel" class="<?php echo $banktransferto_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="banktransferto">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $banktransferto_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($banktransferto_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($banktransferto_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $banktransferto_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($banktransferto_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $banktransferto_list->showPageHeader(); ?>
<?php
$banktransferto_list->showMessage();
?>
<?php if ($banktransferto_list->TotalRecords > 0 || $banktransferto->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($banktransferto_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> banktransferto">
<?php if (!$banktransferto_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$banktransferto_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $banktransferto_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $banktransferto_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbanktransfertolist" id="fbanktransfertolist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<div id="gmp_banktransferto" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($banktransferto_list->TotalRecords > 0 || $banktransferto_list->isGridEdit()) { ?>
<table id="tbl_banktransfertolist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$banktransferto->RowType = ROWTYPE_HEADER;

// Render list options
$banktransferto_list->renderListOptions();

// Render list options (header, left)
$banktransferto_list->ListOptions->render("header", "left");
?>
<?php if ($banktransferto_list->id->Visible) { // id ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $banktransferto_list->id->headerCellClass() ?>"><div id="elh_banktransferto_id" class="banktransferto_id"><div class="ew-table-header-caption"><?php echo $banktransferto_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $banktransferto_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->id) ?>', 1);"><div id="elh_banktransferto_id" class="banktransferto_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->Name->Visible) { // Name ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $banktransferto_list->Name->headerCellClass() ?>"><div id="elh_banktransferto_Name" class="banktransferto_Name"><div class="ew-table-header-caption"><?php echo $banktransferto_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $banktransferto_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->Name) ?>', 1);"><div id="elh_banktransferto_Name" class="banktransferto_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->Street_Address->Visible) { // Street_Address ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->Street_Address) == "") { ?>
		<th data-name="Street_Address" class="<?php echo $banktransferto_list->Street_Address->headerCellClass() ?>"><div id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address"><div class="ew-table-header-caption"><?php echo $banktransferto_list->Street_Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Street_Address" class="<?php echo $banktransferto_list->Street_Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->Street_Address) ?>', 1);"><div id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->Street_Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->Street_Address->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->Street_Address->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->City->Visible) { // City ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->City) == "") { ?>
		<th data-name="City" class="<?php echo $banktransferto_list->City->headerCellClass() ?>"><div id="elh_banktransferto_City" class="banktransferto_City"><div class="ew-table-header-caption"><?php echo $banktransferto_list->City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="City" class="<?php echo $banktransferto_list->City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->City) ?>', 1);"><div id="elh_banktransferto_City" class="banktransferto_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->City->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->City->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->State->Visible) { // State ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $banktransferto_list->State->headerCellClass() ?>"><div id="elh_banktransferto_State" class="banktransferto_State"><div class="ew-table-header-caption"><?php echo $banktransferto_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $banktransferto_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->State) ?>', 1);"><div id="elh_banktransferto_State" class="banktransferto_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->Zipcode->Visible) { // Zipcode ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->Zipcode) == "") { ?>
		<th data-name="Zipcode" class="<?php echo $banktransferto_list->Zipcode->headerCellClass() ?>"><div id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode"><div class="ew-table-header-caption"><?php echo $banktransferto_list->Zipcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Zipcode" class="<?php echo $banktransferto_list->Zipcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->Zipcode) ?>', 1);"><div id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->Zipcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->Zipcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->Zipcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->Mobile_Number->Visible) { // Mobile_Number ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->Mobile_Number) == "") { ?>
		<th data-name="Mobile_Number" class="<?php echo $banktransferto_list->Mobile_Number->headerCellClass() ?>"><div id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number"><div class="ew-table-header-caption"><?php echo $banktransferto_list->Mobile_Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile_Number" class="<?php echo $banktransferto_list->Mobile_Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->Mobile_Number) ?>', 1);"><div id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->Mobile_Number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->Mobile_Number->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->Mobile_Number->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($banktransferto_list->AccountNo->Visible) { // AccountNo ?>
	<?php if ($banktransferto_list->SortUrl($banktransferto_list->AccountNo) == "") { ?>
		<th data-name="AccountNo" class="<?php echo $banktransferto_list->AccountNo->headerCellClass() ?>"><div id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo"><div class="ew-table-header-caption"><?php echo $banktransferto_list->AccountNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNo" class="<?php echo $banktransferto_list->AccountNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $banktransferto_list->SortUrl($banktransferto_list->AccountNo) ?>', 1);"><div id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $banktransferto_list->AccountNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($banktransferto_list->AccountNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($banktransferto_list->AccountNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$banktransferto_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($banktransferto_list->ExportAll && $banktransferto_list->isExport()) {
	$banktransferto_list->StopRecord = $banktransferto_list->TotalRecords;
} else {

	// Set the last record to display
	if ($banktransferto_list->TotalRecords > $banktransferto_list->StartRecord + $banktransferto_list->DisplayRecords - 1)
		$banktransferto_list->StopRecord = $banktransferto_list->StartRecord + $banktransferto_list->DisplayRecords - 1;
	else
		$banktransferto_list->StopRecord = $banktransferto_list->TotalRecords;
}
$banktransferto_list->RecordCount = $banktransferto_list->StartRecord - 1;
if ($banktransferto_list->Recordset && !$banktransferto_list->Recordset->EOF) {
	$banktransferto_list->Recordset->moveFirst();
	$selectLimit = $banktransferto_list->UseSelectLimit;
	if (!$selectLimit && $banktransferto_list->StartRecord > 1)
		$banktransferto_list->Recordset->move($banktransferto_list->StartRecord - 1);
} elseif (!$banktransferto->AllowAddDeleteRow && $banktransferto_list->StopRecord == 0) {
	$banktransferto_list->StopRecord = $banktransferto->GridAddRowCount;
}

// Initialize aggregate
$banktransferto->RowType = ROWTYPE_AGGREGATEINIT;
$banktransferto->resetAttributes();
$banktransferto_list->renderRow();
while ($banktransferto_list->RecordCount < $banktransferto_list->StopRecord) {
	$banktransferto_list->RecordCount++;
	if ($banktransferto_list->RecordCount >= $banktransferto_list->StartRecord) {
		$banktransferto_list->RowCount++;

		// Set up key count
		$banktransferto_list->KeyCount = $banktransferto_list->RowIndex;

		// Init row class and style
		$banktransferto->resetAttributes();
		$banktransferto->CssClass = "";
		if ($banktransferto_list->isGridAdd()) {
		} else {
			$banktransferto_list->loadRowValues($banktransferto_list->Recordset); // Load row values
		}
		$banktransferto->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$banktransferto->RowAttrs->merge(["data-rowindex" => $banktransferto_list->RowCount, "id" => "r" . $banktransferto_list->RowCount . "_banktransferto", "data-rowtype" => $banktransferto->RowType]);

		// Render row
		$banktransferto_list->renderRow();

		// Render list options
		$banktransferto_list->renderListOptions();
?>
	<tr <?php echo $banktransferto->rowAttributes() ?>>
<?php

// Render list options (body, left)
$banktransferto_list->ListOptions->render("body", "left", $banktransferto_list->RowCount);
?>
	<?php if ($banktransferto_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $banktransferto_list->id->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_id">
<span<?php echo $banktransferto_list->id->viewAttributes() ?>><?php echo $banktransferto_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $banktransferto_list->Name->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_Name">
<span<?php echo $banktransferto_list->Name->viewAttributes() ?>><?php echo $banktransferto_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->Street_Address->Visible) { // Street_Address ?>
		<td data-name="Street_Address" <?php echo $banktransferto_list->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_Street_Address">
<span<?php echo $banktransferto_list->Street_Address->viewAttributes() ?>><?php echo $banktransferto_list->Street_Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->City->Visible) { // City ?>
		<td data-name="City" <?php echo $banktransferto_list->City->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_City">
<span<?php echo $banktransferto_list->City->viewAttributes() ?>><?php echo $banktransferto_list->City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $banktransferto_list->State->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_State">
<span<?php echo $banktransferto_list->State->viewAttributes() ?>><?php echo $banktransferto_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->Zipcode->Visible) { // Zipcode ?>
		<td data-name="Zipcode" <?php echo $banktransferto_list->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_Zipcode">
<span<?php echo $banktransferto_list->Zipcode->viewAttributes() ?>><?php echo $banktransferto_list->Zipcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->Mobile_Number->Visible) { // Mobile_Number ?>
		<td data-name="Mobile_Number" <?php echo $banktransferto_list->Mobile_Number->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_Mobile_Number">
<span<?php echo $banktransferto_list->Mobile_Number->viewAttributes() ?>><?php echo $banktransferto_list->Mobile_Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($banktransferto_list->AccountNo->Visible) { // AccountNo ?>
		<td data-name="AccountNo" <?php echo $banktransferto_list->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_list->RowCount ?>_banktransferto_AccountNo">
<span<?php echo $banktransferto_list->AccountNo->viewAttributes() ?>><?php echo $banktransferto_list->AccountNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$banktransferto_list->ListOptions->render("body", "right", $banktransferto_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$banktransferto_list->isGridAdd())
		$banktransferto_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$banktransferto->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($banktransferto_list->Recordset)
	$banktransferto_list->Recordset->Close();
?>
<?php if (!$banktransferto_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$banktransferto_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $banktransferto_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $banktransferto_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($banktransferto_list->TotalRecords == 0 && !$banktransferto->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $banktransferto_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$banktransferto_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$banktransferto_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$banktransferto->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_banktransferto",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$banktransferto_list->terminate();
?>