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
$ivf_mas_user_template_list = new ivf_mas_user_template_list();

// Run the page
$ivf_mas_user_template_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_user_template_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_mas_user_template_list->isExport()) { ?>
<script>
var fivf_mas_user_templatelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_mas_user_templatelist = currentForm = new ew.Form("fivf_mas_user_templatelist", "list");
	fivf_mas_user_templatelist.formKeyCountName = '<?php echo $ivf_mas_user_template_list->FormKeyCountName ?>';
	loadjs.done("fivf_mas_user_templatelist");
});
var fivf_mas_user_templatelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_mas_user_templatelistsrch = currentSearchForm = new ew.Form("fivf_mas_user_templatelistsrch");

	// Dynamic selection lists
	// Filters

	fivf_mas_user_templatelistsrch.filterList = <?php echo $ivf_mas_user_template_list->getFilterList() ?>;
	loadjs.done("fivf_mas_user_templatelistsrch");
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
<?php if (!$ivf_mas_user_template_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_mas_user_template_list->TotalRecords > 0 && $ivf_mas_user_template_list->ExportOptions->visible()) { ?>
<?php $ivf_mas_user_template_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->ImportOptions->visible()) { ?>
<?php $ivf_mas_user_template_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->SearchOptions->visible()) { ?>
<?php $ivf_mas_user_template_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->FilterOptions->visible()) { ?>
<?php $ivf_mas_user_template_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_mas_user_template_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_mas_user_template_list->isExport() && !$ivf_mas_user_template->CurrentAction) { ?>
<form name="fivf_mas_user_templatelistsrch" id="fivf_mas_user_templatelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_mas_user_templatelistsrch-search-panel" class="<?php echo $ivf_mas_user_template_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_mas_user_template">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_mas_user_template_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_mas_user_template_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_mas_user_template_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_mas_user_template_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_mas_user_template_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_user_template_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_user_template_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_user_template_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_mas_user_template_list->showPageHeader(); ?>
<?php
$ivf_mas_user_template_list->showMessage();
?>
<?php if ($ivf_mas_user_template_list->TotalRecords > 0 || $ivf_mas_user_template->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_mas_user_template_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_mas_user_template">
<?php if (!$ivf_mas_user_template_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_mas_user_template_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_mas_user_template_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_mas_user_template_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_mas_user_templatelist" id="fivf_mas_user_templatelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<div id="gmp_ivf_mas_user_template" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_mas_user_template_list->TotalRecords > 0 || $ivf_mas_user_template_list->isGridEdit()) { ?>
<table id="tbl_ivf_mas_user_templatelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_mas_user_template->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_mas_user_template_list->renderListOptions();

// Render list options (header, left)
$ivf_mas_user_template_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_mas_user_template_list->id->Visible) { // id ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_mas_user_template_list->id->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_id" class="ivf_mas_user_template_id"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_mas_user_template_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->id) ?>', 1);"><div id="elh_ivf_mas_user_template_id" class="ivf_mas_user_template_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->TemplateName->Visible) { // TemplateName ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->TemplateName) == "") { ?>
		<th data-name="TemplateName" class="<?php echo $ivf_mas_user_template_list->TemplateName->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->TemplateName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateName" class="<?php echo $ivf_mas_user_template_list->TemplateName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->TemplateName) ?>', 1);"><div id="elh_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->TemplateName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->TemplateName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->TemplateName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->TemplateType->Visible) { // TemplateType ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->TemplateType) == "") { ?>
		<th data-name="TemplateType" class="<?php echo $ivf_mas_user_template_list->TemplateType->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->TemplateType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateType" class="<?php echo $ivf_mas_user_template_list->TemplateType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->TemplateType) ?>', 1);"><div id="elh_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->TemplateType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->TemplateType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->TemplateType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->created->Visible) { // created ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->created) == "") { ?>
		<th data-name="created" class="<?php echo $ivf_mas_user_template_list->created->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_created" class="ivf_mas_user_template_created"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $ivf_mas_user_template_list->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->created) ?>', 1);"><div id="elh_ivf_mas_user_template_created" class="ivf_mas_user_template_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->created->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->createdDatetime->Visible) { // createdDatetime ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->createdDatetime) == "") { ?>
		<th data-name="createdDatetime" class="<?php echo $ivf_mas_user_template_list->createdDatetime->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->createdDatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatetime" class="<?php echo $ivf_mas_user_template_list->createdDatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->createdDatetime) ?>', 1);"><div id="elh_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->createdDatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->createdDatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->createdDatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->modified->Visible) { // modified ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->modified) == "") { ?>
		<th data-name="modified" class="<?php echo $ivf_mas_user_template_list->modified->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modified" class="<?php echo $ivf_mas_user_template_list->modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->modified) ?>', 1);"><div id="elh_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->modified->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->modified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->modified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_user_template_list->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<?php if ($ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->modifiedDatetime) == "") { ?>
		<th data-name="modifiedDatetime" class="<?php echo $ivf_mas_user_template_list->modifiedDatetime->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime"><div class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->modifiedDatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedDatetime" class="<?php echo $ivf_mas_user_template_list->modifiedDatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_mas_user_template_list->SortUrl($ivf_mas_user_template_list->modifiedDatetime) ?>', 1);"><div id="elh_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_user_template_list->modifiedDatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_user_template_list->modifiedDatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_mas_user_template_list->modifiedDatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_mas_user_template_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_mas_user_template_list->ExportAll && $ivf_mas_user_template_list->isExport()) {
	$ivf_mas_user_template_list->StopRecord = $ivf_mas_user_template_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_mas_user_template_list->TotalRecords > $ivf_mas_user_template_list->StartRecord + $ivf_mas_user_template_list->DisplayRecords - 1)
		$ivf_mas_user_template_list->StopRecord = $ivf_mas_user_template_list->StartRecord + $ivf_mas_user_template_list->DisplayRecords - 1;
	else
		$ivf_mas_user_template_list->StopRecord = $ivf_mas_user_template_list->TotalRecords;
}
$ivf_mas_user_template_list->RecordCount = $ivf_mas_user_template_list->StartRecord - 1;
if ($ivf_mas_user_template_list->Recordset && !$ivf_mas_user_template_list->Recordset->EOF) {
	$ivf_mas_user_template_list->Recordset->moveFirst();
	$selectLimit = $ivf_mas_user_template_list->UseSelectLimit;
	if (!$selectLimit && $ivf_mas_user_template_list->StartRecord > 1)
		$ivf_mas_user_template_list->Recordset->move($ivf_mas_user_template_list->StartRecord - 1);
} elseif (!$ivf_mas_user_template->AllowAddDeleteRow && $ivf_mas_user_template_list->StopRecord == 0) {
	$ivf_mas_user_template_list->StopRecord = $ivf_mas_user_template->GridAddRowCount;
}

// Initialize aggregate
$ivf_mas_user_template->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_mas_user_template->resetAttributes();
$ivf_mas_user_template_list->renderRow();
while ($ivf_mas_user_template_list->RecordCount < $ivf_mas_user_template_list->StopRecord) {
	$ivf_mas_user_template_list->RecordCount++;
	if ($ivf_mas_user_template_list->RecordCount >= $ivf_mas_user_template_list->StartRecord) {
		$ivf_mas_user_template_list->RowCount++;

		// Set up key count
		$ivf_mas_user_template_list->KeyCount = $ivf_mas_user_template_list->RowIndex;

		// Init row class and style
		$ivf_mas_user_template->resetAttributes();
		$ivf_mas_user_template->CssClass = "";
		if ($ivf_mas_user_template_list->isGridAdd()) {
		} else {
			$ivf_mas_user_template_list->loadRowValues($ivf_mas_user_template_list->Recordset); // Load row values
		}
		$ivf_mas_user_template->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_mas_user_template->RowAttrs->merge(["data-rowindex" => $ivf_mas_user_template_list->RowCount, "id" => "r" . $ivf_mas_user_template_list->RowCount . "_ivf_mas_user_template", "data-rowtype" => $ivf_mas_user_template->RowType]);

		// Render row
		$ivf_mas_user_template_list->renderRow();

		// Render list options
		$ivf_mas_user_template_list->renderListOptions();
?>
	<tr <?php echo $ivf_mas_user_template->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_mas_user_template_list->ListOptions->render("body", "left", $ivf_mas_user_template_list->RowCount);
?>
	<?php if ($ivf_mas_user_template_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_mas_user_template_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_id">
<span<?php echo $ivf_mas_user_template_list->id->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_user_template_list->TemplateName->Visible) { // TemplateName ?>
		<td data-name="TemplateName" <?php echo $ivf_mas_user_template_list->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_TemplateName">
<span<?php echo $ivf_mas_user_template_list->TemplateName->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->TemplateName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_user_template_list->TemplateType->Visible) { // TemplateType ?>
		<td data-name="TemplateType" <?php echo $ivf_mas_user_template_list->TemplateType->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_TemplateType">
<span<?php echo $ivf_mas_user_template_list->TemplateType->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->TemplateType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_user_template_list->created->Visible) { // created ?>
		<td data-name="created" <?php echo $ivf_mas_user_template_list->created->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_created">
<span<?php echo $ivf_mas_user_template_list->created->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_user_template_list->createdDatetime->Visible) { // createdDatetime ?>
		<td data-name="createdDatetime" <?php echo $ivf_mas_user_template_list->createdDatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_createdDatetime">
<span<?php echo $ivf_mas_user_template_list->createdDatetime->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->createdDatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_user_template_list->modified->Visible) { // modified ?>
		<td data-name="modified" <?php echo $ivf_mas_user_template_list->modified->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_modified">
<span<?php echo $ivf_mas_user_template_list->modified->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->modified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_user_template_list->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<td data-name="modifiedDatetime" <?php echo $ivf_mas_user_template_list->modifiedDatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_user_template_list->RowCount ?>_ivf_mas_user_template_modifiedDatetime">
<span<?php echo $ivf_mas_user_template_list->modifiedDatetime->viewAttributes() ?>><?php echo $ivf_mas_user_template_list->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_mas_user_template_list->ListOptions->render("body", "right", $ivf_mas_user_template_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_mas_user_template_list->isGridAdd())
		$ivf_mas_user_template_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_mas_user_template->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_mas_user_template_list->Recordset)
	$ivf_mas_user_template_list->Recordset->Close();
?>
<?php if (!$ivf_mas_user_template_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_mas_user_template_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_mas_user_template_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_mas_user_template_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_mas_user_template_list->TotalRecords == 0 && !$ivf_mas_user_template->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_mas_user_template_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_mas_user_template_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_user_template_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_mas_user_template->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_mas_user_template",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_mas_user_template_list->terminate();
?>