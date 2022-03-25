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
$mas_employee_role_job_description_list = new mas_employee_role_job_description_list();

// Run the page
$mas_employee_role_job_description_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_employee_role_job_description_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_employee_role_job_description_list->isExport()) { ?>
<script>
var fmas_employee_role_job_descriptionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_employee_role_job_descriptionlist = currentForm = new ew.Form("fmas_employee_role_job_descriptionlist", "list");
	fmas_employee_role_job_descriptionlist.formKeyCountName = '<?php echo $mas_employee_role_job_description_list->FormKeyCountName ?>';
	loadjs.done("fmas_employee_role_job_descriptionlist");
});
var fmas_employee_role_job_descriptionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_employee_role_job_descriptionlistsrch = currentSearchForm = new ew.Form("fmas_employee_role_job_descriptionlistsrch");

	// Dynamic selection lists
	// Filters

	fmas_employee_role_job_descriptionlistsrch.filterList = <?php echo $mas_employee_role_job_description_list->getFilterList() ?>;
	loadjs.done("fmas_employee_role_job_descriptionlistsrch");
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
<?php if (!$mas_employee_role_job_description_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_employee_role_job_description_list->TotalRecords > 0 && $mas_employee_role_job_description_list->ExportOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->ImportOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->SearchOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->FilterOptions->visible()) { ?>
<?php $mas_employee_role_job_description_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_employee_role_job_description_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_employee_role_job_description_list->isExport() && !$mas_employee_role_job_description->CurrentAction) { ?>
<form name="fmas_employee_role_job_descriptionlistsrch" id="fmas_employee_role_job_descriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_employee_role_job_descriptionlistsrch-search-panel" class="<?php echo $mas_employee_role_job_description_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_employee_role_job_description">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_employee_role_job_description_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_employee_role_job_description_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_employee_role_job_description_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_employee_role_job_description_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_employee_role_job_description_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_employee_role_job_description_list->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_list->showMessage();
?>
<?php if ($mas_employee_role_job_description_list->TotalRecords > 0 || $mas_employee_role_job_description->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_employee_role_job_description_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_employee_role_job_description">
<?php if (!$mas_employee_role_job_description_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_employee_role_job_description_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_employee_role_job_description_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_employee_role_job_description_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_employee_role_job_descriptionlist" id="fmas_employee_role_job_descriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<div id="gmp_mas_employee_role_job_description" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_employee_role_job_description_list->TotalRecords > 0 || $mas_employee_role_job_description_list->isGridEdit()) { ?>
<table id="tbl_mas_employee_role_job_descriptionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_employee_role_job_description->RowType = ROWTYPE_HEADER;

// Render list options
$mas_employee_role_job_description_list->renderListOptions();

// Render list options (header, left)
$mas_employee_role_job_description_list->ListOptions->render("header", "left");
?>
<?php if ($mas_employee_role_job_description_list->id->Visible) { // id ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_employee_role_job_description_list->id->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_employee_role_job_description_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->id) ?>', 1);"><div id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->role->Visible) { // role ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->role) == "") { ?>
		<th data-name="role" class="<?php echo $mas_employee_role_job_description_list->role->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->role->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="role" class="<?php echo $mas_employee_role_job_description_list->role->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->role) ?>', 1);"><div id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->role->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->role->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->role->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->job_description->Visible) { // job_description ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->job_description) == "") { ?>
		<th data-name="job_description" class="<?php echo $mas_employee_role_job_description_list->job_description->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->job_description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_description" class="<?php echo $mas_employee_role_job_description_list->job_description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->job_description) ?>', 1);"><div id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->job_description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->job_description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->job_description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->status->Visible) { // status ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $mas_employee_role_job_description_list->status->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $mas_employee_role_job_description_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->status) ?>', 1);"><div id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->createdby->Visible) { // createdby ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $mas_employee_role_job_description_list->createdby->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $mas_employee_role_job_description_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->createdby) ?>', 1);"><div id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $mas_employee_role_job_description_list->createddatetime->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $mas_employee_role_job_description_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->createddatetime) ?>', 1);"><div id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $mas_employee_role_job_description_list->modifiedby->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $mas_employee_role_job_description_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->modifiedby) ?>', 1);"><div id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_employee_role_job_description_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $mas_employee_role_job_description_list->modifieddatetime->headerCellClass() ?>"><div id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime"><div class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $mas_employee_role_job_description_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_employee_role_job_description_list->SortUrl($mas_employee_role_job_description_list->modifieddatetime) ?>', 1);"><div id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_employee_role_job_description_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_employee_role_job_description_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_employee_role_job_description_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_employee_role_job_description_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_employee_role_job_description_list->ExportAll && $mas_employee_role_job_description_list->isExport()) {
	$mas_employee_role_job_description_list->StopRecord = $mas_employee_role_job_description_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_employee_role_job_description_list->TotalRecords > $mas_employee_role_job_description_list->StartRecord + $mas_employee_role_job_description_list->DisplayRecords - 1)
		$mas_employee_role_job_description_list->StopRecord = $mas_employee_role_job_description_list->StartRecord + $mas_employee_role_job_description_list->DisplayRecords - 1;
	else
		$mas_employee_role_job_description_list->StopRecord = $mas_employee_role_job_description_list->TotalRecords;
}
$mas_employee_role_job_description_list->RecordCount = $mas_employee_role_job_description_list->StartRecord - 1;
if ($mas_employee_role_job_description_list->Recordset && !$mas_employee_role_job_description_list->Recordset->EOF) {
	$mas_employee_role_job_description_list->Recordset->moveFirst();
	$selectLimit = $mas_employee_role_job_description_list->UseSelectLimit;
	if (!$selectLimit && $mas_employee_role_job_description_list->StartRecord > 1)
		$mas_employee_role_job_description_list->Recordset->move($mas_employee_role_job_description_list->StartRecord - 1);
} elseif (!$mas_employee_role_job_description->AllowAddDeleteRow && $mas_employee_role_job_description_list->StopRecord == 0) {
	$mas_employee_role_job_description_list->StopRecord = $mas_employee_role_job_description->GridAddRowCount;
}

// Initialize aggregate
$mas_employee_role_job_description->RowType = ROWTYPE_AGGREGATEINIT;
$mas_employee_role_job_description->resetAttributes();
$mas_employee_role_job_description_list->renderRow();
while ($mas_employee_role_job_description_list->RecordCount < $mas_employee_role_job_description_list->StopRecord) {
	$mas_employee_role_job_description_list->RecordCount++;
	if ($mas_employee_role_job_description_list->RecordCount >= $mas_employee_role_job_description_list->StartRecord) {
		$mas_employee_role_job_description_list->RowCount++;

		// Set up key count
		$mas_employee_role_job_description_list->KeyCount = $mas_employee_role_job_description_list->RowIndex;

		// Init row class and style
		$mas_employee_role_job_description->resetAttributes();
		$mas_employee_role_job_description->CssClass = "";
		if ($mas_employee_role_job_description_list->isGridAdd()) {
		} else {
			$mas_employee_role_job_description_list->loadRowValues($mas_employee_role_job_description_list->Recordset); // Load row values
		}
		$mas_employee_role_job_description->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_employee_role_job_description->RowAttrs->merge(["data-rowindex" => $mas_employee_role_job_description_list->RowCount, "id" => "r" . $mas_employee_role_job_description_list->RowCount . "_mas_employee_role_job_description", "data-rowtype" => $mas_employee_role_job_description->RowType]);

		// Render row
		$mas_employee_role_job_description_list->renderRow();

		// Render list options
		$mas_employee_role_job_description_list->renderListOptions();
?>
	<tr <?php echo $mas_employee_role_job_description->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_employee_role_job_description_list->ListOptions->render("body", "left", $mas_employee_role_job_description_list->RowCount);
?>
	<?php if ($mas_employee_role_job_description_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_employee_role_job_description_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_id">
<span<?php echo $mas_employee_role_job_description_list->id->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->role->Visible) { // role ?>
		<td data-name="role" <?php echo $mas_employee_role_job_description_list->role->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_role">
<span<?php echo $mas_employee_role_job_description_list->role->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->role->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->job_description->Visible) { // job_description ?>
		<td data-name="job_description" <?php echo $mas_employee_role_job_description_list->job_description->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_job_description">
<span<?php echo $mas_employee_role_job_description_list->job_description->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->job_description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $mas_employee_role_job_description_list->status->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_status">
<span<?php echo $mas_employee_role_job_description_list->status->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $mas_employee_role_job_description_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_createdby">
<span<?php echo $mas_employee_role_job_description_list->createdby->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $mas_employee_role_job_description_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_createddatetime">
<span<?php echo $mas_employee_role_job_description_list->createddatetime->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $mas_employee_role_job_description_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_modifiedby">
<span<?php echo $mas_employee_role_job_description_list->modifiedby->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_employee_role_job_description_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $mas_employee_role_job_description_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_employee_role_job_description_list->RowCount ?>_mas_employee_role_job_description_modifieddatetime">
<span<?php echo $mas_employee_role_job_description_list->modifieddatetime->viewAttributes() ?>><?php echo $mas_employee_role_job_description_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_employee_role_job_description_list->ListOptions->render("body", "right", $mas_employee_role_job_description_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_employee_role_job_description_list->isGridAdd())
		$mas_employee_role_job_description_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_employee_role_job_description->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_employee_role_job_description_list->Recordset)
	$mas_employee_role_job_description_list->Recordset->Close();
?>
<?php if (!$mas_employee_role_job_description_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_employee_role_job_description_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_employee_role_job_description_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_employee_role_job_description_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_employee_role_job_description_list->TotalRecords == 0 && !$mas_employee_role_job_description->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_employee_role_job_description_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_employee_role_job_description_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_employee_role_job_description_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_employee_role_job_description->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_employee_role_job_description",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_employee_role_job_description_list->terminate();
?>