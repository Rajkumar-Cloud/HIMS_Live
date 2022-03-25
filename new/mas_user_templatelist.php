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
$mas_user_template_list = new mas_user_template_list();

// Run the page
$mas_user_template_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_user_template_list->isExport()) { ?>
<script>
var fmas_user_templatelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmas_user_templatelist = currentForm = new ew.Form("fmas_user_templatelist", "list");
	fmas_user_templatelist.formKeyCountName = '<?php echo $mas_user_template_list->FormKeyCountName ?>';
	loadjs.done("fmas_user_templatelist");
});
var fmas_user_templatelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmas_user_templatelistsrch = currentSearchForm = new ew.Form("fmas_user_templatelistsrch");

	// Dynamic selection lists
	// Filters

	fmas_user_templatelistsrch.filterList = <?php echo $mas_user_template_list->getFilterList() ?>;
	loadjs.done("fmas_user_templatelistsrch");
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
<?php if (!$mas_user_template_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_user_template_list->TotalRecords > 0 && $mas_user_template_list->ExportOptions->visible()) { ?>
<?php $mas_user_template_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_list->ImportOptions->visible()) { ?>
<?php $mas_user_template_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_list->SearchOptions->visible()) { ?>
<?php $mas_user_template_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_list->FilterOptions->visible()) { ?>
<?php $mas_user_template_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_user_template_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_user_template_list->isExport() && !$mas_user_template->CurrentAction) { ?>
<form name="fmas_user_templatelistsrch" id="fmas_user_templatelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmas_user_templatelistsrch-search-panel" class="<?php echo $mas_user_template_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_user_template">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $mas_user_template_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($mas_user_template_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($mas_user_template_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_user_template_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $mas_user_template_list->showPageHeader(); ?>
<?php
$mas_user_template_list->showMessage();
?>
<?php if ($mas_user_template_list->TotalRecords > 0 || $mas_user_template->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_user_template_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_user_template">
<?php if (!$mas_user_template_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_user_template_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_user_template_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_user_template_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_user_templatelist" id="fmas_user_templatelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template">
<div id="gmp_mas_user_template" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($mas_user_template_list->TotalRecords > 0 || $mas_user_template_list->isGridEdit()) { ?>
<table id="tbl_mas_user_templatelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_user_template->RowType = ROWTYPE_HEADER;

// Render list options
$mas_user_template_list->renderListOptions();

// Render list options (header, left)
$mas_user_template_list->ListOptions->render("header", "left");
?>
<?php if ($mas_user_template_list->id->Visible) { // id ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_user_template_list->id->headerCellClass() ?>"><div id="elh_mas_user_template_id" class="mas_user_template_id"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_user_template_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->id) ?>', 1);"><div id="elh_mas_user_template_id" class="mas_user_template_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_list->TemplateName->Visible) { // TemplateName ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->TemplateName) == "") { ?>
		<th data-name="TemplateName" class="<?php echo $mas_user_template_list->TemplateName->headerCellClass() ?>"><div id="elh_mas_user_template_TemplateName" class="mas_user_template_TemplateName"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->TemplateName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateName" class="<?php echo $mas_user_template_list->TemplateName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->TemplateName) ?>', 1);"><div id="elh_mas_user_template_TemplateName" class="mas_user_template_TemplateName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->TemplateName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->TemplateName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->TemplateName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_list->TemplateType->Visible) { // TemplateType ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->TemplateType) == "") { ?>
		<th data-name="TemplateType" class="<?php echo $mas_user_template_list->TemplateType->headerCellClass() ?>"><div id="elh_mas_user_template_TemplateType" class="mas_user_template_TemplateType"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->TemplateType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateType" class="<?php echo $mas_user_template_list->TemplateType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->TemplateType) ?>', 1);"><div id="elh_mas_user_template_TemplateType" class="mas_user_template_TemplateType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->TemplateType->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->TemplateType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->TemplateType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_list->created->Visible) { // created ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->created) == "") { ?>
		<th data-name="created" class="<?php echo $mas_user_template_list->created->headerCellClass() ?>"><div id="elh_mas_user_template_created" class="mas_user_template_created"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $mas_user_template_list->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->created) ?>', 1);"><div id="elh_mas_user_template_created" class="mas_user_template_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->created->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_list->createdDatetime->Visible) { // createdDatetime ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->createdDatetime) == "") { ?>
		<th data-name="createdDatetime" class="<?php echo $mas_user_template_list->createdDatetime->headerCellClass() ?>"><div id="elh_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->createdDatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatetime" class="<?php echo $mas_user_template_list->createdDatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->createdDatetime) ?>', 1);"><div id="elh_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->createdDatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->createdDatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->createdDatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_list->modified->Visible) { // modified ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->modified) == "") { ?>
		<th data-name="modified" class="<?php echo $mas_user_template_list->modified->headerCellClass() ?>"><div id="elh_mas_user_template_modified" class="mas_user_template_modified"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modified" class="<?php echo $mas_user_template_list->modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->modified) ?>', 1);"><div id="elh_mas_user_template_modified" class="mas_user_template_modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->modified->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->modified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->modified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_list->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<?php if ($mas_user_template_list->SortUrl($mas_user_template_list->modifiedDatetime) == "") { ?>
		<th data-name="modifiedDatetime" class="<?php echo $mas_user_template_list->modifiedDatetime->headerCellClass() ?>"><div id="elh_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime"><div class="ew-table-header-caption"><?php echo $mas_user_template_list->modifiedDatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedDatetime" class="<?php echo $mas_user_template_list->modifiedDatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $mas_user_template_list->SortUrl($mas_user_template_list->modifiedDatetime) ?>', 1);"><div id="elh_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_list->modifiedDatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_list->modifiedDatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($mas_user_template_list->modifiedDatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_user_template_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_user_template_list->ExportAll && $mas_user_template_list->isExport()) {
	$mas_user_template_list->StopRecord = $mas_user_template_list->TotalRecords;
} else {

	// Set the last record to display
	if ($mas_user_template_list->TotalRecords > $mas_user_template_list->StartRecord + $mas_user_template_list->DisplayRecords - 1)
		$mas_user_template_list->StopRecord = $mas_user_template_list->StartRecord + $mas_user_template_list->DisplayRecords - 1;
	else
		$mas_user_template_list->StopRecord = $mas_user_template_list->TotalRecords;
}
$mas_user_template_list->RecordCount = $mas_user_template_list->StartRecord - 1;
if ($mas_user_template_list->Recordset && !$mas_user_template_list->Recordset->EOF) {
	$mas_user_template_list->Recordset->moveFirst();
	$selectLimit = $mas_user_template_list->UseSelectLimit;
	if (!$selectLimit && $mas_user_template_list->StartRecord > 1)
		$mas_user_template_list->Recordset->move($mas_user_template_list->StartRecord - 1);
} elseif (!$mas_user_template->AllowAddDeleteRow && $mas_user_template_list->StopRecord == 0) {
	$mas_user_template_list->StopRecord = $mas_user_template->GridAddRowCount;
}

// Initialize aggregate
$mas_user_template->RowType = ROWTYPE_AGGREGATEINIT;
$mas_user_template->resetAttributes();
$mas_user_template_list->renderRow();
while ($mas_user_template_list->RecordCount < $mas_user_template_list->StopRecord) {
	$mas_user_template_list->RecordCount++;
	if ($mas_user_template_list->RecordCount >= $mas_user_template_list->StartRecord) {
		$mas_user_template_list->RowCount++;

		// Set up key count
		$mas_user_template_list->KeyCount = $mas_user_template_list->RowIndex;

		// Init row class and style
		$mas_user_template->resetAttributes();
		$mas_user_template->CssClass = "";
		if ($mas_user_template_list->isGridAdd()) {
		} else {
			$mas_user_template_list->loadRowValues($mas_user_template_list->Recordset); // Load row values
		}
		$mas_user_template->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_user_template->RowAttrs->merge(["data-rowindex" => $mas_user_template_list->RowCount, "id" => "r" . $mas_user_template_list->RowCount . "_mas_user_template", "data-rowtype" => $mas_user_template->RowType]);

		// Render row
		$mas_user_template_list->renderRow();

		// Render list options
		$mas_user_template_list->renderListOptions();
?>
	<tr <?php echo $mas_user_template->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_user_template_list->ListOptions->render("body", "left", $mas_user_template_list->RowCount);
?>
	<?php if ($mas_user_template_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $mas_user_template_list->id->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_id">
<span<?php echo $mas_user_template_list->id->viewAttributes() ?>><?php echo $mas_user_template_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template_list->TemplateName->Visible) { // TemplateName ?>
		<td data-name="TemplateName" <?php echo $mas_user_template_list->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_TemplateName">
<span<?php echo $mas_user_template_list->TemplateName->viewAttributes() ?>><?php echo $mas_user_template_list->TemplateName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template_list->TemplateType->Visible) { // TemplateType ?>
		<td data-name="TemplateType" <?php echo $mas_user_template_list->TemplateType->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_TemplateType">
<span<?php echo $mas_user_template_list->TemplateType->viewAttributes() ?>><?php echo $mas_user_template_list->TemplateType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template_list->created->Visible) { // created ?>
		<td data-name="created" <?php echo $mas_user_template_list->created->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_created">
<span<?php echo $mas_user_template_list->created->viewAttributes() ?>><?php echo $mas_user_template_list->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template_list->createdDatetime->Visible) { // createdDatetime ?>
		<td data-name="createdDatetime" <?php echo $mas_user_template_list->createdDatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_createdDatetime">
<span<?php echo $mas_user_template_list->createdDatetime->viewAttributes() ?>><?php echo $mas_user_template_list->createdDatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template_list->modified->Visible) { // modified ?>
		<td data-name="modified" <?php echo $mas_user_template_list->modified->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_modified">
<span<?php echo $mas_user_template_list->modified->viewAttributes() ?>><?php echo $mas_user_template_list->modified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template_list->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<td data-name="modifiedDatetime" <?php echo $mas_user_template_list->modifiedDatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCount ?>_mas_user_template_modifiedDatetime">
<span<?php echo $mas_user_template_list->modifiedDatetime->viewAttributes() ?>><?php echo $mas_user_template_list->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_user_template_list->ListOptions->render("body", "right", $mas_user_template_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$mas_user_template_list->isGridAdd())
		$mas_user_template_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$mas_user_template->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_user_template_list->Recordset)
	$mas_user_template_list->Recordset->Close();
?>
<?php if (!$mas_user_template_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_user_template_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $mas_user_template_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_user_template_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_user_template_list->TotalRecords == 0 && !$mas_user_template->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_user_template_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_user_template_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_user_template_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$mas_user_template->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_mas_user_template",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$mas_user_template_list->terminate();
?>