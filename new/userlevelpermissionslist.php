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
$userlevelpermissions_list = new userlevelpermissions_list();

// Run the page
$userlevelpermissions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevelpermissions_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$userlevelpermissions_list->isExport()) { ?>
<script>
var fuserlevelpermissionslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fuserlevelpermissionslist = currentForm = new ew.Form("fuserlevelpermissionslist", "list");
	fuserlevelpermissionslist.formKeyCountName = '<?php echo $userlevelpermissions_list->FormKeyCountName ?>';
	loadjs.done("fuserlevelpermissionslist");
});
var fuserlevelpermissionslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fuserlevelpermissionslistsrch = currentSearchForm = new ew.Form("fuserlevelpermissionslistsrch");

	// Dynamic selection lists
	// Filters

	fuserlevelpermissionslistsrch.filterList = <?php echo $userlevelpermissions_list->getFilterList() ?>;
	loadjs.done("fuserlevelpermissionslistsrch");
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
<?php if (!$userlevelpermissions_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($userlevelpermissions_list->TotalRecords > 0 && $userlevelpermissions_list->ExportOptions->visible()) { ?>
<?php $userlevelpermissions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($userlevelpermissions_list->ImportOptions->visible()) { ?>
<?php $userlevelpermissions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($userlevelpermissions_list->SearchOptions->visible()) { ?>
<?php $userlevelpermissions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($userlevelpermissions_list->FilterOptions->visible()) { ?>
<?php $userlevelpermissions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$userlevelpermissions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$userlevelpermissions_list->isExport() && !$userlevelpermissions->CurrentAction) { ?>
<form name="fuserlevelpermissionslistsrch" id="fuserlevelpermissionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fuserlevelpermissionslistsrch-search-panel" class="<?php echo $userlevelpermissions_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="userlevelpermissions">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $userlevelpermissions_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($userlevelpermissions_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($userlevelpermissions_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $userlevelpermissions_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $userlevelpermissions_list->showPageHeader(); ?>
<?php
$userlevelpermissions_list->showMessage();
?>
<?php if ($userlevelpermissions_list->TotalRecords > 0 || $userlevelpermissions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($userlevelpermissions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> userlevelpermissions">
<?php if (!$userlevelpermissions_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$userlevelpermissions_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $userlevelpermissions_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $userlevelpermissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fuserlevelpermissionslist" id="fuserlevelpermissionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevelpermissions">
<div id="gmp_userlevelpermissions" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($userlevelpermissions_list->TotalRecords > 0 || $userlevelpermissions_list->isGridEdit()) { ?>
<table id="tbl_userlevelpermissionslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$userlevelpermissions->RowType = ROWTYPE_HEADER;

// Render list options
$userlevelpermissions_list->renderListOptions();

// Render list options (header, left)
$userlevelpermissions_list->ListOptions->render("header", "left");
?>
<?php if ($userlevelpermissions_list->id->Visible) { // id ?>
	<?php if ($userlevelpermissions_list->SortUrl($userlevelpermissions_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $userlevelpermissions_list->id->headerCellClass() ?>"><div id="elh_userlevelpermissions_id" class="userlevelpermissions_id"><div class="ew-table-header-caption"><?php echo $userlevelpermissions_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $userlevelpermissions_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $userlevelpermissions_list->SortUrl($userlevelpermissions_list->id) ?>', 1);"><div id="elh_userlevelpermissions_id" class="userlevelpermissions_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevelpermissions_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($userlevelpermissions_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($userlevelpermissions_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($userlevelpermissions_list->_tableName->Visible) { // tableName ?>
	<?php if ($userlevelpermissions_list->SortUrl($userlevelpermissions_list->_tableName) == "") { ?>
		<th data-name="_tableName" class="<?php echo $userlevelpermissions_list->_tableName->headerCellClass() ?>"><div id="elh_userlevelpermissions__tableName" class="userlevelpermissions__tableName"><div class="ew-table-header-caption"><?php echo $userlevelpermissions_list->_tableName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_tableName" class="<?php echo $userlevelpermissions_list->_tableName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $userlevelpermissions_list->SortUrl($userlevelpermissions_list->_tableName) ?>', 1);"><div id="elh_userlevelpermissions__tableName" class="userlevelpermissions__tableName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevelpermissions_list->_tableName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($userlevelpermissions_list->_tableName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($userlevelpermissions_list->_tableName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($userlevelpermissions_list->_Permissions->Visible) { // Permissions ?>
	<?php if ($userlevelpermissions_list->SortUrl($userlevelpermissions_list->_Permissions) == "") { ?>
		<th data-name="_Permissions" class="<?php echo $userlevelpermissions_list->_Permissions->headerCellClass() ?>"><div id="elh_userlevelpermissions__Permissions" class="userlevelpermissions__Permissions"><div class="ew-table-header-caption"><?php echo $userlevelpermissions_list->_Permissions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Permissions" class="<?php echo $userlevelpermissions_list->_Permissions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $userlevelpermissions_list->SortUrl($userlevelpermissions_list->_Permissions) ?>', 1);"><div id="elh_userlevelpermissions__Permissions" class="userlevelpermissions__Permissions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevelpermissions_list->_Permissions->caption() ?></span><span class="ew-table-header-sort"><?php if ($userlevelpermissions_list->_Permissions->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($userlevelpermissions_list->_Permissions->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$userlevelpermissions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($userlevelpermissions_list->ExportAll && $userlevelpermissions_list->isExport()) {
	$userlevelpermissions_list->StopRecord = $userlevelpermissions_list->TotalRecords;
} else {

	// Set the last record to display
	if ($userlevelpermissions_list->TotalRecords > $userlevelpermissions_list->StartRecord + $userlevelpermissions_list->DisplayRecords - 1)
		$userlevelpermissions_list->StopRecord = $userlevelpermissions_list->StartRecord + $userlevelpermissions_list->DisplayRecords - 1;
	else
		$userlevelpermissions_list->StopRecord = $userlevelpermissions_list->TotalRecords;
}
$userlevelpermissions_list->RecordCount = $userlevelpermissions_list->StartRecord - 1;
if ($userlevelpermissions_list->Recordset && !$userlevelpermissions_list->Recordset->EOF) {
	$userlevelpermissions_list->Recordset->moveFirst();
	$selectLimit = $userlevelpermissions_list->UseSelectLimit;
	if (!$selectLimit && $userlevelpermissions_list->StartRecord > 1)
		$userlevelpermissions_list->Recordset->move($userlevelpermissions_list->StartRecord - 1);
} elseif (!$userlevelpermissions->AllowAddDeleteRow && $userlevelpermissions_list->StopRecord == 0) {
	$userlevelpermissions_list->StopRecord = $userlevelpermissions->GridAddRowCount;
}

// Initialize aggregate
$userlevelpermissions->RowType = ROWTYPE_AGGREGATEINIT;
$userlevelpermissions->resetAttributes();
$userlevelpermissions_list->renderRow();
while ($userlevelpermissions_list->RecordCount < $userlevelpermissions_list->StopRecord) {
	$userlevelpermissions_list->RecordCount++;
	if ($userlevelpermissions_list->RecordCount >= $userlevelpermissions_list->StartRecord) {
		$userlevelpermissions_list->RowCount++;

		// Set up key count
		$userlevelpermissions_list->KeyCount = $userlevelpermissions_list->RowIndex;

		// Init row class and style
		$userlevelpermissions->resetAttributes();
		$userlevelpermissions->CssClass = "";
		if ($userlevelpermissions_list->isGridAdd()) {
		} else {
			$userlevelpermissions_list->loadRowValues($userlevelpermissions_list->Recordset); // Load row values
		}
		$userlevelpermissions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$userlevelpermissions->RowAttrs->merge(["data-rowindex" => $userlevelpermissions_list->RowCount, "id" => "r" . $userlevelpermissions_list->RowCount . "_userlevelpermissions", "data-rowtype" => $userlevelpermissions->RowType]);

		// Render row
		$userlevelpermissions_list->renderRow();

		// Render list options
		$userlevelpermissions_list->renderListOptions();
?>
	<tr <?php echo $userlevelpermissions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$userlevelpermissions_list->ListOptions->render("body", "left", $userlevelpermissions_list->RowCount);
?>
	<?php if ($userlevelpermissions_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $userlevelpermissions_list->id->cellAttributes() ?>>
<span id="el<?php echo $userlevelpermissions_list->RowCount ?>_userlevelpermissions_id">
<span<?php echo $userlevelpermissions_list->id->viewAttributes() ?>><?php echo $userlevelpermissions_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($userlevelpermissions_list->_tableName->Visible) { // tableName ?>
		<td data-name="_tableName" <?php echo $userlevelpermissions_list->_tableName->cellAttributes() ?>>
<span id="el<?php echo $userlevelpermissions_list->RowCount ?>_userlevelpermissions__tableName">
<span<?php echo $userlevelpermissions_list->_tableName->viewAttributes() ?>><?php echo $userlevelpermissions_list->_tableName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($userlevelpermissions_list->_Permissions->Visible) { // Permissions ?>
		<td data-name="_Permissions" <?php echo $userlevelpermissions_list->_Permissions->cellAttributes() ?>>
<span id="el<?php echo $userlevelpermissions_list->RowCount ?>_userlevelpermissions__Permissions">
<span<?php echo $userlevelpermissions_list->_Permissions->viewAttributes() ?>><?php echo $userlevelpermissions_list->_Permissions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$userlevelpermissions_list->ListOptions->render("body", "right", $userlevelpermissions_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$userlevelpermissions_list->isGridAdd())
		$userlevelpermissions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$userlevelpermissions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($userlevelpermissions_list->Recordset)
	$userlevelpermissions_list->Recordset->Close();
?>
<?php if (!$userlevelpermissions_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$userlevelpermissions_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $userlevelpermissions_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $userlevelpermissions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($userlevelpermissions_list->TotalRecords == 0 && !$userlevelpermissions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $userlevelpermissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$userlevelpermissions_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$userlevelpermissions_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$userlevelpermissions->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_userlevelpermissions",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$userlevelpermissions_list->terminate();
?>