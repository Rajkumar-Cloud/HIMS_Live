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
$view_partner_semenstock_list = new view_partner_semenstock_list();

// Run the page
$view_partner_semenstock_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_partner_semenstock_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_partner_semenstock_list->isExport()) { ?>
<script>
var fview_partner_semenstocklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_partner_semenstocklist = currentForm = new ew.Form("fview_partner_semenstocklist", "list");
	fview_partner_semenstocklist.formKeyCountName = '<?php echo $view_partner_semenstock_list->FormKeyCountName ?>';
	loadjs.done("fview_partner_semenstocklist");
});
var fview_partner_semenstocklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_partner_semenstocklistsrch = currentSearchForm = new ew.Form("fview_partner_semenstocklistsrch");

	// Validate function for search
	fview_partner_semenstocklistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_partner_semenstocklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_partner_semenstocklistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_partner_semenstocklistsrch.filterList = <?php echo $view_partner_semenstock_list->getFilterList() ?>;
	loadjs.done("fview_partner_semenstocklistsrch");
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
<?php if (!$view_partner_semenstock_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_partner_semenstock_list->TotalRecords > 0 && $view_partner_semenstock_list->ExportOptions->visible()) { ?>
<?php $view_partner_semenstock_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->ImportOptions->visible()) { ?>
<?php $view_partner_semenstock_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->SearchOptions->visible()) { ?>
<?php $view_partner_semenstock_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->FilterOptions->visible()) { ?>
<?php $view_partner_semenstock_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_partner_semenstock_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_partner_semenstock_list->isExport() && !$view_partner_semenstock->CurrentAction) { ?>
<form name="fview_partner_semenstocklistsrch" id="fview_partner_semenstocklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_partner_semenstocklistsrch-search-panel" class="<?php echo $view_partner_semenstock_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_partner_semenstock">
	<div class="ew-extended-search">
<?php

// Render search row
$view_partner_semenstock->RowType = ROWTYPE_SEARCH;
$view_partner_semenstock->resetAttributes();
$view_partner_semenstock_list->renderRow();
?>
<?php if ($view_partner_semenstock_list->RIDNo->Visible) { // RIDNo ?>
	<?php
		$view_partner_semenstock_list->SearchColumnCount++;
		if (($view_partner_semenstock_list->SearchColumnCount - 1) % $view_partner_semenstock_list->SearchFieldsPerRow == 0) {
			$view_partner_semenstock_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_partner_semenstock_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_RIDNo" class="ew-cell form-group">
		<label for="x_RIDNo" class="ew-search-caption ew-label"><?php echo $view_partner_semenstock_list->RIDNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNo" id="z_RIDNo" value="=">
</span>
		<span id="el_view_partner_semenstock_RIDNo" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_partner_semenstock" data-field="x_RIDNo" data-value-separator="<?php echo $view_partner_semenstock_list->RIDNo->displayValueSeparatorAttribute() ?>" id="x_RIDNo" name="x_RIDNo"<?php echo $view_partner_semenstock_list->RIDNo->editAttributes() ?>>
			<?php echo $view_partner_semenstock_list->RIDNo->selectOptionListHtml("x_RIDNo") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($view_partner_semenstock_list->SearchColumnCount % $view_partner_semenstock_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_partner_semenstock_list->SearchColumnCount++;
		if (($view_partner_semenstock_list->SearchColumnCount - 1) % $view_partner_semenstock_list->SearchFieldsPerRow == 0) {
			$view_partner_semenstock_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_partner_semenstock_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_partner_semenstock_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_partner_semenstock_PatientName" class="ew-search-field">
<input type="text" data-table="view_partner_semenstock" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_partner_semenstock_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_partner_semenstock_list->PatientName->EditValue ?>"<?php echo $view_partner_semenstock_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_partner_semenstock_list->SearchColumnCount % $view_partner_semenstock_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->HusbandName->Visible) { // HusbandName ?>
	<?php
		$view_partner_semenstock_list->SearchColumnCount++;
		if (($view_partner_semenstock_list->SearchColumnCount - 1) % $view_partner_semenstock_list->SearchFieldsPerRow == 0) {
			$view_partner_semenstock_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_partner_semenstock_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_HusbandName" class="ew-cell form-group">
		<label for="x_HusbandName" class="ew-search-caption ew-label"><?php echo $view_partner_semenstock_list->HusbandName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE">
</span>
		<span id="el_view_partner_semenstock_HusbandName" class="ew-search-field">
<input type="text" data-table="view_partner_semenstock" data-field="x_HusbandName" name="x_HusbandName" id="x_HusbandName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_partner_semenstock_list->HusbandName->getPlaceHolder()) ?>" value="<?php echo $view_partner_semenstock_list->HusbandName->EditValue ?>"<?php echo $view_partner_semenstock_list->HusbandName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_partner_semenstock_list->SearchColumnCount % $view_partner_semenstock_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_partner_semenstock_list->SearchColumnCount % $view_partner_semenstock_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_partner_semenstock_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_partner_semenstock_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_partner_semenstock_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_partner_semenstock_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_partner_semenstock_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_partner_semenstock_list->showPageHeader(); ?>
<?php
$view_partner_semenstock_list->showMessage();
?>
<?php if ($view_partner_semenstock_list->TotalRecords > 0 || $view_partner_semenstock->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_partner_semenstock_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_partner_semenstock">
<?php if (!$view_partner_semenstock_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_partner_semenstock_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_partner_semenstock_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_partner_semenstock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_partner_semenstocklist" id="fview_partner_semenstocklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_partner_semenstock">
<div id="gmp_view_partner_semenstock" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_partner_semenstock_list->TotalRecords > 0 || $view_partner_semenstock_list->isGridEdit()) { ?>
<table id="tbl_view_partner_semenstocklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_partner_semenstock->RowType = ROWTYPE_HEADER;

// Render list options
$view_partner_semenstock_list->renderListOptions();

// Render list options (header, left)
$view_partner_semenstock_list->ListOptions->render("header", "left");
?>
<?php if ($view_partner_semenstock_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $view_partner_semenstock_list->RIDNo->headerCellClass() ?>"><div id="elh_view_partner_semenstock_RIDNo" class="view_partner_semenstock_RIDNo"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $view_partner_semenstock_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->RIDNo) ?>', 1);"><div id="elh_view_partner_semenstock_RIDNo" class="view_partner_semenstock_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_partner_semenstock_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_partner_semenstock_list->PatientName->headerCellClass() ?>"><div id="elh_view_partner_semenstock_PatientName" class="view_partner_semenstock_PatientName"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_partner_semenstock_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->PatientName) ?>', 1);"><div id="elh_view_partner_semenstock_PatientName" class="view_partner_semenstock_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_partner_semenstock_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->HusbandName->Visible) { // HusbandName ?>
	<?php if ($view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $view_partner_semenstock_list->HusbandName->headerCellClass() ?>"><div id="elh_view_partner_semenstock_HusbandName" class="view_partner_semenstock_HusbandName"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $view_partner_semenstock_list->HusbandName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->HusbandName) ?>', 1);"><div id="elh_view_partner_semenstock_HusbandName" class="view_partner_semenstock_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->HusbandName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock_list->HusbandName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_partner_semenstock_list->HusbandName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->RequestDr->Visible) { // RequestDr ?>
	<?php if ($view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $view_partner_semenstock_list->RequestDr->headerCellClass() ?>"><div id="elh_view_partner_semenstock_RequestDr" class="view_partner_semenstock_RequestDr"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $view_partner_semenstock_list->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->RequestDr) ?>', 1);"><div id="elh_view_partner_semenstock_RequestDr" class="view_partner_semenstock_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock_list->RequestDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_partner_semenstock_list->RequestDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_partner_semenstock_list->stock->Visible) { // stock ?>
	<?php if ($view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->stock) == "") { ?>
		<th data-name="stock" class="<?php echo $view_partner_semenstock_list->stock->headerCellClass() ?>"><div id="elh_view_partner_semenstock_stock" class="view_partner_semenstock_stock"><div class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="stock" class="<?php echo $view_partner_semenstock_list->stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_partner_semenstock_list->SortUrl($view_partner_semenstock_list->stock) ?>', 1);"><div id="elh_view_partner_semenstock_stock" class="view_partner_semenstock_stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_partner_semenstock_list->stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_partner_semenstock_list->stock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_partner_semenstock_list->stock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_partner_semenstock_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_partner_semenstock_list->ExportAll && $view_partner_semenstock_list->isExport()) {
	$view_partner_semenstock_list->StopRecord = $view_partner_semenstock_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_partner_semenstock_list->TotalRecords > $view_partner_semenstock_list->StartRecord + $view_partner_semenstock_list->DisplayRecords - 1)
		$view_partner_semenstock_list->StopRecord = $view_partner_semenstock_list->StartRecord + $view_partner_semenstock_list->DisplayRecords - 1;
	else
		$view_partner_semenstock_list->StopRecord = $view_partner_semenstock_list->TotalRecords;
}
$view_partner_semenstock_list->RecordCount = $view_partner_semenstock_list->StartRecord - 1;
if ($view_partner_semenstock_list->Recordset && !$view_partner_semenstock_list->Recordset->EOF) {
	$view_partner_semenstock_list->Recordset->moveFirst();
	$selectLimit = $view_partner_semenstock_list->UseSelectLimit;
	if (!$selectLimit && $view_partner_semenstock_list->StartRecord > 1)
		$view_partner_semenstock_list->Recordset->move($view_partner_semenstock_list->StartRecord - 1);
} elseif (!$view_partner_semenstock->AllowAddDeleteRow && $view_partner_semenstock_list->StopRecord == 0) {
	$view_partner_semenstock_list->StopRecord = $view_partner_semenstock->GridAddRowCount;
}

// Initialize aggregate
$view_partner_semenstock->RowType = ROWTYPE_AGGREGATEINIT;
$view_partner_semenstock->resetAttributes();
$view_partner_semenstock_list->renderRow();
while ($view_partner_semenstock_list->RecordCount < $view_partner_semenstock_list->StopRecord) {
	$view_partner_semenstock_list->RecordCount++;
	if ($view_partner_semenstock_list->RecordCount >= $view_partner_semenstock_list->StartRecord) {
		$view_partner_semenstock_list->RowCount++;

		// Set up key count
		$view_partner_semenstock_list->KeyCount = $view_partner_semenstock_list->RowIndex;

		// Init row class and style
		$view_partner_semenstock->resetAttributes();
		$view_partner_semenstock->CssClass = "";
		if ($view_partner_semenstock_list->isGridAdd()) {
		} else {
			$view_partner_semenstock_list->loadRowValues($view_partner_semenstock_list->Recordset); // Load row values
		}
		$view_partner_semenstock->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_partner_semenstock->RowAttrs->merge(["data-rowindex" => $view_partner_semenstock_list->RowCount, "id" => "r" . $view_partner_semenstock_list->RowCount . "_view_partner_semenstock", "data-rowtype" => $view_partner_semenstock->RowType]);

		// Render row
		$view_partner_semenstock_list->renderRow();

		// Render list options
		$view_partner_semenstock_list->renderListOptions();
?>
	<tr <?php echo $view_partner_semenstock->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_partner_semenstock_list->ListOptions->render("body", "left", $view_partner_semenstock_list->RowCount);
?>
	<?php if ($view_partner_semenstock_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $view_partner_semenstock_list->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCount ?>_view_partner_semenstock_RIDNo">
<span<?php echo $view_partner_semenstock_list->RIDNo->viewAttributes() ?>><?php echo $view_partner_semenstock_list->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_partner_semenstock_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCount ?>_view_partner_semenstock_PatientName">
<span<?php echo $view_partner_semenstock_list->PatientName->viewAttributes() ?>><?php echo $view_partner_semenstock_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName" <?php echo $view_partner_semenstock_list->HusbandName->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCount ?>_view_partner_semenstock_HusbandName">
<span<?php echo $view_partner_semenstock_list->HusbandName->viewAttributes() ?>><?php echo $view_partner_semenstock_list->HusbandName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr" <?php echo $view_partner_semenstock_list->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCount ?>_view_partner_semenstock_RequestDr">
<span<?php echo $view_partner_semenstock_list->RequestDr->viewAttributes() ?>><?php echo $view_partner_semenstock_list->RequestDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_partner_semenstock_list->stock->Visible) { // stock ?>
		<td data-name="stock" <?php echo $view_partner_semenstock_list->stock->cellAttributes() ?>>
<span id="el<?php echo $view_partner_semenstock_list->RowCount ?>_view_partner_semenstock_stock">
<span<?php echo $view_partner_semenstock_list->stock->viewAttributes() ?>><?php echo $view_partner_semenstock_list->stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_partner_semenstock_list->ListOptions->render("body", "right", $view_partner_semenstock_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_partner_semenstock_list->isGridAdd())
		$view_partner_semenstock_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_partner_semenstock->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_partner_semenstock_list->Recordset)
	$view_partner_semenstock_list->Recordset->Close();
?>
<?php if (!$view_partner_semenstock_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_partner_semenstock_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_partner_semenstock_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_partner_semenstock_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_partner_semenstock_list->TotalRecords == 0 && !$view_partner_semenstock->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_partner_semenstock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_partner_semenstock_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_partner_semenstock_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_partner_semenstock->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_partner_semenstock",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_partner_semenstock_list->terminate();
?>