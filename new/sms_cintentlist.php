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
$sms_cintent_list = new sms_cintent_list();

// Run the page
$sms_cintent_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sms_cintent_list->isExport()) { ?>
<script>
var fsms_cintentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fsms_cintentlist = currentForm = new ew.Form("fsms_cintentlist", "list");
	fsms_cintentlist.formKeyCountName = '<?php echo $sms_cintent_list->FormKeyCountName ?>';
	loadjs.done("fsms_cintentlist");
});
var fsms_cintentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fsms_cintentlistsrch = currentSearchForm = new ew.Form("fsms_cintentlistsrch");

	// Dynamic selection lists
	// Filters

	fsms_cintentlistsrch.filterList = <?php echo $sms_cintent_list->getFilterList() ?>;
	loadjs.done("fsms_cintentlistsrch");
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
<?php if (!$sms_cintent_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sms_cintent_list->TotalRecords > 0 && $sms_cintent_list->ExportOptions->visible()) { ?>
<?php $sms_cintent_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_cintent_list->ImportOptions->visible()) { ?>
<?php $sms_cintent_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sms_cintent_list->SearchOptions->visible()) { ?>
<?php $sms_cintent_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sms_cintent_list->FilterOptions->visible()) { ?>
<?php $sms_cintent_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sms_cintent_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sms_cintent_list->isExport() && !$sms_cintent->CurrentAction) { ?>
<form name="fsms_cintentlistsrch" id="fsms_cintentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsms_cintentlistsrch-search-panel" class="<?php echo $sms_cintent_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sms_cintent">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $sms_cintent_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($sms_cintent_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($sms_cintent_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sms_cintent_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sms_cintent_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $sms_cintent_list->showPageHeader(); ?>
<?php
$sms_cintent_list->showMessage();
?>
<?php if ($sms_cintent_list->TotalRecords > 0 || $sms_cintent->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sms_cintent_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sms_cintent">
<?php if (!$sms_cintent_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sms_cintent_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sms_cintent_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_cintent_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsms_cintentlist" id="fsms_cintentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<div id="gmp_sms_cintent" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($sms_cintent_list->TotalRecords > 0 || $sms_cintent_list->isGridEdit()) { ?>
<table id="tbl_sms_cintentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sms_cintent->RowType = ROWTYPE_HEADER;

// Render list options
$sms_cintent_list->renderListOptions();

// Render list options (header, left)
$sms_cintent_list->ListOptions->render("header", "left");
?>
<?php if ($sms_cintent_list->id->Visible) { // id ?>
	<?php if ($sms_cintent_list->SortUrl($sms_cintent_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $sms_cintent_list->id->headerCellClass() ?>"><div id="elh_sms_cintent_id" class="sms_cintent_id"><div class="ew-table-header-caption"><?php echo $sms_cintent_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sms_cintent_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_cintent_list->SortUrl($sms_cintent_list->id) ?>', 1);"><div id="elh_sms_cintent_id" class="sms_cintent_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_cintent_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent_list->SMSType->Visible) { // SMSType ?>
	<?php if ($sms_cintent_list->SortUrl($sms_cintent_list->SMSType) == "") { ?>
		<th data-name="SMSType" class="<?php echo $sms_cintent_list->SMSType->headerCellClass() ?>"><div id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType"><div class="ew-table-header-caption"><?php echo $sms_cintent_list->SMSType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSType" class="<?php echo $sms_cintent_list->SMSType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_cintent_list->SortUrl($sms_cintent_list->SMSType) ?>', 1);"><div id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent_list->SMSType->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent_list->SMSType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_cintent_list->SMSType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent_list->Content->Visible) { // Content ?>
	<?php if ($sms_cintent_list->SortUrl($sms_cintent_list->Content) == "") { ?>
		<th data-name="Content" class="<?php echo $sms_cintent_list->Content->headerCellClass() ?>"><div id="elh_sms_cintent_Content" class="sms_cintent_Content"><div class="ew-table-header-caption"><?php echo $sms_cintent_list->Content->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Content" class="<?php echo $sms_cintent_list->Content->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_cintent_list->SortUrl($sms_cintent_list->Content) ?>', 1);"><div id="elh_sms_cintent_Content" class="sms_cintent_Content">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent_list->Content->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent_list->Content->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_cintent_list->Content->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent_list->Enabled->Visible) { // Enabled ?>
	<?php if ($sms_cintent_list->SortUrl($sms_cintent_list->Enabled) == "") { ?>
		<th data-name="Enabled" class="<?php echo $sms_cintent_list->Enabled->headerCellClass() ?>"><div id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled"><div class="ew-table-header-caption"><?php echo $sms_cintent_list->Enabled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enabled" class="<?php echo $sms_cintent_list->Enabled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_cintent_list->SortUrl($sms_cintent_list->Enabled) ?>', 1);"><div id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent_list->Enabled->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent_list->Enabled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_cintent_list->Enabled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sms_cintent_list->HospID->Visible) { // HospID ?>
	<?php if ($sms_cintent_list->SortUrl($sms_cintent_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $sms_cintent_list->HospID->headerCellClass() ?>"><div id="elh_sms_cintent_HospID" class="sms_cintent_HospID"><div class="ew-table-header-caption"><?php echo $sms_cintent_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $sms_cintent_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $sms_cintent_list->SortUrl($sms_cintent_list->HospID) ?>', 1);"><div id="elh_sms_cintent_HospID" class="sms_cintent_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sms_cintent_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($sms_cintent_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($sms_cintent_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sms_cintent_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sms_cintent_list->ExportAll && $sms_cintent_list->isExport()) {
	$sms_cintent_list->StopRecord = $sms_cintent_list->TotalRecords;
} else {

	// Set the last record to display
	if ($sms_cintent_list->TotalRecords > $sms_cintent_list->StartRecord + $sms_cintent_list->DisplayRecords - 1)
		$sms_cintent_list->StopRecord = $sms_cintent_list->StartRecord + $sms_cintent_list->DisplayRecords - 1;
	else
		$sms_cintent_list->StopRecord = $sms_cintent_list->TotalRecords;
}
$sms_cintent_list->RecordCount = $sms_cintent_list->StartRecord - 1;
if ($sms_cintent_list->Recordset && !$sms_cintent_list->Recordset->EOF) {
	$sms_cintent_list->Recordset->moveFirst();
	$selectLimit = $sms_cintent_list->UseSelectLimit;
	if (!$selectLimit && $sms_cintent_list->StartRecord > 1)
		$sms_cintent_list->Recordset->move($sms_cintent_list->StartRecord - 1);
} elseif (!$sms_cintent->AllowAddDeleteRow && $sms_cintent_list->StopRecord == 0) {
	$sms_cintent_list->StopRecord = $sms_cintent->GridAddRowCount;
}

// Initialize aggregate
$sms_cintent->RowType = ROWTYPE_AGGREGATEINIT;
$sms_cintent->resetAttributes();
$sms_cintent_list->renderRow();
while ($sms_cintent_list->RecordCount < $sms_cintent_list->StopRecord) {
	$sms_cintent_list->RecordCount++;
	if ($sms_cintent_list->RecordCount >= $sms_cintent_list->StartRecord) {
		$sms_cintent_list->RowCount++;

		// Set up key count
		$sms_cintent_list->KeyCount = $sms_cintent_list->RowIndex;

		// Init row class and style
		$sms_cintent->resetAttributes();
		$sms_cintent->CssClass = "";
		if ($sms_cintent_list->isGridAdd()) {
		} else {
			$sms_cintent_list->loadRowValues($sms_cintent_list->Recordset); // Load row values
		}
		$sms_cintent->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sms_cintent->RowAttrs->merge(["data-rowindex" => $sms_cintent_list->RowCount, "id" => "r" . $sms_cintent_list->RowCount . "_sms_cintent", "data-rowtype" => $sms_cintent->RowType]);

		// Render row
		$sms_cintent_list->renderRow();

		// Render list options
		$sms_cintent_list->renderListOptions();
?>
	<tr <?php echo $sms_cintent->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sms_cintent_list->ListOptions->render("body", "left", $sms_cintent_list->RowCount);
?>
	<?php if ($sms_cintent_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $sms_cintent_list->id->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCount ?>_sms_cintent_id">
<span<?php echo $sms_cintent_list->id->viewAttributes() ?>><?php echo $sms_cintent_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent_list->SMSType->Visible) { // SMSType ?>
		<td data-name="SMSType" <?php echo $sms_cintent_list->SMSType->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCount ?>_sms_cintent_SMSType">
<span<?php echo $sms_cintent_list->SMSType->viewAttributes() ?>><?php echo $sms_cintent_list->SMSType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent_list->Content->Visible) { // Content ?>
		<td data-name="Content" <?php echo $sms_cintent_list->Content->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCount ?>_sms_cintent_Content">
<span<?php echo $sms_cintent_list->Content->viewAttributes() ?>><?php echo $sms_cintent_list->Content->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent_list->Enabled->Visible) { // Enabled ?>
		<td data-name="Enabled" <?php echo $sms_cintent_list->Enabled->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCount ?>_sms_cintent_Enabled">
<span<?php echo $sms_cintent_list->Enabled->viewAttributes() ?>><?php echo $sms_cintent_list->Enabled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sms_cintent_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $sms_cintent_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_list->RowCount ?>_sms_cintent_HospID">
<span<?php echo $sms_cintent_list->HospID->viewAttributes() ?>><?php echo $sms_cintent_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sms_cintent_list->ListOptions->render("body", "right", $sms_cintent_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$sms_cintent_list->isGridAdd())
		$sms_cintent_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$sms_cintent->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sms_cintent_list->Recordset)
	$sms_cintent_list->Recordset->Close();
?>
<?php if (!$sms_cintent_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sms_cintent_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $sms_cintent_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sms_cintent_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sms_cintent_list->TotalRecords == 0 && !$sms_cintent->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sms_cintent_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sms_cintent_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sms_cintent_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$sms_cintent->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_sms_cintent",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$sms_cintent_list->terminate();
?>