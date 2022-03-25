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
$view_ivf_treatment_list = new view_ivf_treatment_list();

// Run the page
$view_ivf_treatment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ivf_treatment_list->isExport()) { ?>
<script>
var fview_ivf_treatmentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ivf_treatmentlist = currentForm = new ew.Form("fview_ivf_treatmentlist", "list");
	fview_ivf_treatmentlist.formKeyCountName = '<?php echo $view_ivf_treatment_list->FormKeyCountName ?>';
	loadjs.done("fview_ivf_treatmentlist");
});
var fview_ivf_treatmentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ivf_treatmentlistsrch = currentSearchForm = new ew.Form("fview_ivf_treatmentlistsrch");

	// Validate function for search
	fview_ivf_treatmentlistsrch.validate = function(fobj) {
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
	fview_ivf_treatmentlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ivf_treatmentlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ivf_treatmentlistsrch.lists["x_Male"] = <?php echo $view_ivf_treatment_list->Male->Lookup->toClientList($view_ivf_treatment_list) ?>;
	fview_ivf_treatmentlistsrch.lists["x_Male"].options = <?php echo JsonEncode($view_ivf_treatment_list->Male->lookupOptions()) ?>;
	fview_ivf_treatmentlistsrch.lists["x_Female"] = <?php echo $view_ivf_treatment_list->Female->Lookup->toClientList($view_ivf_treatment_list) ?>;
	fview_ivf_treatmentlistsrch.lists["x_Female"].options = <?php echo JsonEncode($view_ivf_treatment_list->Female->lookupOptions()) ?>;
	fview_ivf_treatmentlistsrch.lists["x_ARTCYCLE1"] = <?php echo $view_ivf_treatment_list->ARTCYCLE1->Lookup->toClientList($view_ivf_treatment_list) ?>;
	fview_ivf_treatmentlistsrch.lists["x_ARTCYCLE1"].options = <?php echo JsonEncode($view_ivf_treatment_list->ARTCYCLE1->options(FALSE, TRUE)) ?>;
	fview_ivf_treatmentlistsrch.lists["x_RESULT1"] = <?php echo $view_ivf_treatment_list->RESULT1->Lookup->toClientList($view_ivf_treatment_list) ?>;
	fview_ivf_treatmentlistsrch.lists["x_RESULT1"].options = <?php echo JsonEncode($view_ivf_treatment_list->RESULT1->options(FALSE, TRUE)) ?>;

	// Filters
	fview_ivf_treatmentlistsrch.filterList = <?php echo $view_ivf_treatment_list->getFilterList() ?>;
	loadjs.done("fview_ivf_treatmentlistsrch");
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
<?php if (!$view_ivf_treatment_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ivf_treatment_list->TotalRecords > 0 && $view_ivf_treatment_list->ExportOptions->visible()) { ?>
<?php $view_ivf_treatment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ImportOptions->visible()) { ?>
<?php $view_ivf_treatment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->SearchOptions->visible()) { ?>
<?php $view_ivf_treatment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->FilterOptions->visible()) { ?>
<?php $view_ivf_treatment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ivf_treatment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ivf_treatment_list->isExport() && !$view_ivf_treatment->CurrentAction) { ?>
<form name="fview_ivf_treatmentlistsrch" id="fview_ivf_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ivf_treatmentlistsrch-search-panel" class="<?php echo $view_ivf_treatment_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_treatment">
	<div class="ew-extended-search">
<?php

// Render search row
$view_ivf_treatment->RowType = ROWTYPE_SEARCH;
$view_ivf_treatment->resetAttributes();
$view_ivf_treatment_list->renderRow();
?>
<?php if ($view_ivf_treatment_list->Male->Visible) { // Male ?>
	<?php
		$view_ivf_treatment_list->SearchColumnCount++;
		if (($view_ivf_treatment_list->SearchColumnCount - 1) % $view_ivf_treatment_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Male" class="ew-cell form-group">
		<label for="x_Male" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_list->Male->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Male" id="z_Male" value="=">
</span>
		<span id="el_view_ivf_treatment_Male" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?php echo HtmlEncode($view_ivf_treatment_list->Male->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_list->Male->EditValue ?>"<?php echo $view_ivf_treatment_list->Male->editAttributes() ?>>
<?php echo $view_ivf_treatment_list->Male->Lookup->getParamTag($view_ivf_treatment_list, "p_x_Male") ?>
</span>
	</div>
	<?php if ($view_ivf_treatment_list->SearchColumnCount % $view_ivf_treatment_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Female->Visible) { // Female ?>
	<?php
		$view_ivf_treatment_list->SearchColumnCount++;
		if (($view_ivf_treatment_list->SearchColumnCount - 1) % $view_ivf_treatment_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Female" class="ew-cell form-group">
		<label for="x_Female" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_list->Female->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Female" id="z_Female" value="=">
</span>
		<span id="el_view_ivf_treatment_Female" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?php echo HtmlEncode($view_ivf_treatment_list->Female->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_list->Female->EditValue ?>"<?php echo $view_ivf_treatment_list->Female->editAttributes() ?>>
<?php echo $view_ivf_treatment_list->Female->Lookup->getParamTag($view_ivf_treatment_list, "p_x_Female") ?>
</span>
	</div>
	<?php if ($view_ivf_treatment_list->SearchColumnCount % $view_ivf_treatment_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
	<?php
		$view_ivf_treatment_list->SearchColumnCount++;
		if (($view_ivf_treatment_list->SearchColumnCount - 1) % $view_ivf_treatment_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ARTCYCLE1" class="ew-cell form-group">
		<label for="x_ARTCYCLE1" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_list->ARTCYCLE1->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ARTCYCLE1" id="z_ARTCYCLE1" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_ARTCYCLE1" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment" data-field="x_ARTCYCLE1" data-value-separator="<?php echo $view_ivf_treatment_list->ARTCYCLE1->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE1" name="x_ARTCYCLE1"<?php echo $view_ivf_treatment_list->ARTCYCLE1->editAttributes() ?>>
			<?php echo $view_ivf_treatment_list->ARTCYCLE1->selectOptionListHtml("x_ARTCYCLE1") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($view_ivf_treatment_list->SearchColumnCount % $view_ivf_treatment_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->RESULT1->Visible) { // RESULT1 ?>
	<?php
		$view_ivf_treatment_list->SearchColumnCount++;
		if (($view_ivf_treatment_list->SearchColumnCount - 1) % $view_ivf_treatment_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_RESULT1" class="ew-cell form-group">
		<label for="x_RESULT1" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_list->RESULT1->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESULT1" id="z_RESULT1" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_RESULT1" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment" data-field="x_RESULT1" data-value-separator="<?php echo $view_ivf_treatment_list->RESULT1->displayValueSeparatorAttribute() ?>" id="x_RESULT1" name="x_RESULT1"<?php echo $view_ivf_treatment_list->RESULT1->editAttributes() ?>>
			<?php echo $view_ivf_treatment_list->RESULT1->selectOptionListHtml("x_RESULT1") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($view_ivf_treatment_list->SearchColumnCount % $view_ivf_treatment_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->CoupleID->Visible) { // CoupleID ?>
	<?php
		$view_ivf_treatment_list->SearchColumnCount++;
		if (($view_ivf_treatment_list->SearchColumnCount - 1) % $view_ivf_treatment_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_list->CoupleID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="=">
</span>
		<span id="el_view_ivf_treatment_CoupleID" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_list->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_list->CoupleID->EditValue ?>"<?php echo $view_ivf_treatment_list->CoupleID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_list->SearchColumnCount % $view_ivf_treatment_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_ivf_treatment_list->SearchColumnCount % $view_ivf_treatment_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_ivf_treatment_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ivf_treatment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ivf_treatment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ivf_treatment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ivf_treatment_list->showPageHeader(); ?>
<?php
$view_ivf_treatment_list->showMessage();
?>
<?php if ($view_ivf_treatment_list->TotalRecords > 0 || $view_ivf_treatment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ivf_treatment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_treatment">
<?php if (!$view_ivf_treatment_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ivf_treatment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ivf_treatment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ivf_treatmentlist" id="fview_ivf_treatmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment">
<div id="gmp_view_ivf_treatment" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ivf_treatment_list->TotalRecords > 0 || $view_ivf_treatment_list->isGridEdit()) { ?>
<table id="tbl_view_ivf_treatmentlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ivf_treatment->RowType = ROWTYPE_HEADER;

// Render list options
$view_ivf_treatment_list->renderListOptions();

// Render list options (header, left)
$view_ivf_treatment_list->ListOptions->render("header", "left", "", "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
<?php if ($view_ivf_treatment_list->id->Visible) { // id ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ivf_treatment_list->id->headerCellClass() ?>"><div id="elh_view_ivf_treatment_id" class="view_ivf_treatment_id"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_id" type="text/html"><?php echo $view_ivf_treatment_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ivf_treatment_list->id->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->id) ?>', 1);"><div id="elh_view_ivf_treatment_id" class="view_ivf_treatment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment_list->RIDNO->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RIDNO" class="view_ivf_treatment_RIDNO"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_RIDNO" type="text/html"><?php echo $view_ivf_treatment_list->RIDNO->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment_list->RIDNO->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_RIDNO" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->RIDNO) ?>', 1);"><div id="elh_view_ivf_treatment_RIDNO" class="view_ivf_treatment_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Name->Visible) { // Name ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ivf_treatment_list->Name->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Name" class="view_ivf_treatment_Name"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Name" type="text/html"><?php echo $view_ivf_treatment_list->Name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ivf_treatment_list->Name->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Name) ?>', 1);"><div id="elh_view_ivf_treatment_Name" class="view_ivf_treatment_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Age->Visible) { // Age ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_ivf_treatment_list->Age->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Age" class="view_ivf_treatment_Age"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Age" type="text/html"><?php echo $view_ivf_treatment_list->Age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_ivf_treatment_list->Age->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Age) ?>', 1);"><div id="elh_view_ivf_treatment_Age" class="view_ivf_treatment_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->treatment_status->Visible) { // treatment_status ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment_list->treatment_status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_treatment_status" class="view_ivf_treatment_treatment_status"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_treatment_status" type="text/html"><?php echo $view_ivf_treatment_list->treatment_status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment_list->treatment_status->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_treatment_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->treatment_status) ?>', 1);"><div id="elh_view_ivf_treatment_treatment_status" class="view_ivf_treatment_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->treatment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatment_ARTCYCLE"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ARTCYCLE" type="text/html"><?php echo $view_ivf_treatment_list->ARTCYCLE->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment_list->ARTCYCLE->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ARTCYCLE" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ARTCYCLE) ?>', 1);"><div id="elh_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatment_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->RESULT->Visible) { // RESULT ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment_list->RESULT->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RESULT" class="view_ivf_treatment_RESULT"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_RESULT" type="text/html"><?php echo $view_ivf_treatment_list->RESULT->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment_list->RESULT->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_RESULT" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->RESULT) ?>', 1);"><div id="elh_view_ivf_treatment_RESULT" class="view_ivf_treatment_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->status->Visible) { // status ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ivf_treatment_list->status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_status" class="view_ivf_treatment_status"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_status" type="text/html"><?php echo $view_ivf_treatment_list->status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ivf_treatment_list->status->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->status) ?>', 1);"><div id="elh_view_ivf_treatment_status" class="view_ivf_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->createdby->Visible) { // createdby ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ivf_treatment_list->createdby->headerCellClass() ?>"><div id="elh_view_ivf_treatment_createdby" class="view_ivf_treatment_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_createdby" type="text/html"><?php echo $view_ivf_treatment_list->createdby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ivf_treatment_list->createdby->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_createdby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->createdby) ?>', 1);"><div id="elh_view_ivf_treatment_createdby" class="view_ivf_treatment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ivf_treatment_list->createddatetime->headerCellClass() ?>"><div id="elh_view_ivf_treatment_createddatetime" class="view_ivf_treatment_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_createddatetime" type="text/html"><?php echo $view_ivf_treatment_list->createddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ivf_treatment_list->createddatetime->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_createddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->createddatetime) ?>', 1);"><div id="elh_view_ivf_treatment_createddatetime" class="view_ivf_treatment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ivf_treatment_list->modifiedby->headerCellClass() ?>"><div id="elh_view_ivf_treatment_modifiedby" class="view_ivf_treatment_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_modifiedby" type="text/html"><?php echo $view_ivf_treatment_list->modifiedby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ivf_treatment_list->modifiedby->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_modifiedby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->modifiedby) ?>', 1);"><div id="elh_view_ivf_treatment_modifiedby" class="view_ivf_treatment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ivf_treatment_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ivf_treatment_modifieddatetime" class="view_ivf_treatment_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_modifieddatetime" type="text/html"><?php echo $view_ivf_treatment_list->modifieddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ivf_treatment_list->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_modifieddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->modifieddatetime) ?>', 1);"><div id="elh_view_ivf_treatment_modifieddatetime" class="view_ivf_treatment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment_list->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatment_TreatmentStartDate"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TreatmentStartDate" type="text/html"><?php echo $view_ivf_treatment_list->TreatmentStartDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment_list->TreatmentStartDate->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TreatmentStartDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TreatmentStartDate) ?>', 1);"><div id="elh_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatment_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->TreatmentStartDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->TreatmentStartDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TreatementStopDate) == "") { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ivf_treatment_list->TreatementStopDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatment_TreatementStopDate"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TreatementStopDate" type="text/html"><?php echo $view_ivf_treatment_list->TreatementStopDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ivf_treatment_list->TreatementStopDate->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TreatementStopDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TreatementStopDate) ?>', 1);"><div id="elh_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatment_TreatementStopDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->TreatementStopDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->TreatementStopDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->TreatementStopDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->TypePatient->Visible) { // TypePatient ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TypePatient) == "") { ?>
		<th data-name="TypePatient" class="<?php echo $view_ivf_treatment_list->TypePatient->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TypePatient" class="view_ivf_treatment_TypePatient"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TypePatient" type="text/html"><?php echo $view_ivf_treatment_list->TypePatient->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TypePatient" class="<?php echo $view_ivf_treatment_list->TypePatient->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TypePatient" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TypePatient) ?>', 1);"><div id="elh_view_ivf_treatment_TypePatient" class="view_ivf_treatment_TypePatient">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->TypePatient->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->TypePatient->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->TypePatient->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Treatment->Visible) { // Treatment ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_ivf_treatment_list->Treatment->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Treatment" class="view_ivf_treatment_Treatment"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Treatment" type="text/html"><?php echo $view_ivf_treatment_list->Treatment->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_ivf_treatment_list->Treatment->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Treatment" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Treatment) ?>', 1);"><div id="elh_view_ivf_treatment_Treatment" class="view_ivf_treatment_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Treatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Treatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ivf_treatment_list->TreatmentTec->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TreatmentTec" class="view_ivf_treatment_TreatmentTec"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TreatmentTec" type="text/html"><?php echo $view_ivf_treatment_list->TreatmentTec->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ivf_treatment_list->TreatmentTec->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TreatmentTec" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TreatmentTec) ?>', 1);"><div id="elh_view_ivf_treatment_TreatmentTec" class="view_ivf_treatment_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->TreatmentTec->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->TreatmentTec->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->TreatmentTec->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ivf_treatment_list->TypeOfCycle->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatment_TypeOfCycle"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TypeOfCycle" type="text/html"><?php echo $view_ivf_treatment_list->TypeOfCycle->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ivf_treatment_list->TypeOfCycle->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TypeOfCycle" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TypeOfCycle) ?>', 1);"><div id="elh_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatment_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->TypeOfCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->TypeOfCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->TypeOfCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ivf_treatment_list->SpermOrgin->headerCellClass() ?>"><div id="elh_view_ivf_treatment_SpermOrgin" class="view_ivf_treatment_SpermOrgin"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_SpermOrgin" type="text/html"><?php echo $view_ivf_treatment_list->SpermOrgin->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ivf_treatment_list->SpermOrgin->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_SpermOrgin" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->SpermOrgin) ?>', 1);"><div id="elh_view_ivf_treatment_SpermOrgin" class="view_ivf_treatment_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->SpermOrgin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->SpermOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->SpermOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->State->Visible) { // State ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $view_ivf_treatment_list->State->headerCellClass() ?>"><div id="elh_view_ivf_treatment_State" class="view_ivf_treatment_State"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_State" type="text/html"><?php echo $view_ivf_treatment_list->State->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $view_ivf_treatment_list->State->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_State" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->State) ?>', 1);"><div id="elh_view_ivf_treatment_State" class="view_ivf_treatment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Origin->Visible) { // Origin ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $view_ivf_treatment_list->Origin->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Origin" class="view_ivf_treatment_Origin"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Origin" type="text/html"><?php echo $view_ivf_treatment_list->Origin->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $view_ivf_treatment_list->Origin->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Origin" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Origin) ?>', 1);"><div id="elh_view_ivf_treatment_Origin" class="view_ivf_treatment_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Origin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Origin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Origin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->MACS->Visible) { // MACS ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $view_ivf_treatment_list->MACS->headerCellClass() ?>"><div id="elh_view_ivf_treatment_MACS" class="view_ivf_treatment_MACS"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_MACS" type="text/html"><?php echo $view_ivf_treatment_list->MACS->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $view_ivf_treatment_list->MACS->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_MACS" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->MACS) ?>', 1);"><div id="elh_view_ivf_treatment_MACS" class="view_ivf_treatment_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->MACS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->MACS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->MACS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Technique->Visible) { // Technique ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $view_ivf_treatment_list->Technique->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Technique" class="view_ivf_treatment_Technique"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Technique" type="text/html"><?php echo $view_ivf_treatment_list->Technique->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $view_ivf_treatment_list->Technique->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Technique" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Technique) ?>', 1);"><div id="elh_view_ivf_treatment_Technique" class="view_ivf_treatment_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Technique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Technique->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Technique->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ivf_treatment_list->PgdPlanning->headerCellClass() ?>"><div id="elh_view_ivf_treatment_PgdPlanning" class="view_ivf_treatment_PgdPlanning"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_PgdPlanning" type="text/html"><?php echo $view_ivf_treatment_list->PgdPlanning->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ivf_treatment_list->PgdPlanning->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_PgdPlanning" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->PgdPlanning) ?>', 1);"><div id="elh_view_ivf_treatment_PgdPlanning" class="view_ivf_treatment_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->PgdPlanning->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->PgdPlanning->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->PgdPlanning->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->IMSI->Visible) { // IMSI ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $view_ivf_treatment_list->IMSI->headerCellClass() ?>"><div id="elh_view_ivf_treatment_IMSI" class="view_ivf_treatment_IMSI"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_IMSI" type="text/html"><?php echo $view_ivf_treatment_list->IMSI->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $view_ivf_treatment_list->IMSI->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_IMSI" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->IMSI) ?>', 1);"><div id="elh_view_ivf_treatment_IMSI" class="view_ivf_treatment_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->IMSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->IMSI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->IMSI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ivf_treatment_list->SequentialCulture->headerCellClass() ?>"><div id="elh_view_ivf_treatment_SequentialCulture" class="view_ivf_treatment_SequentialCulture"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_SequentialCulture" type="text/html"><?php echo $view_ivf_treatment_list->SequentialCulture->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ivf_treatment_list->SequentialCulture->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_SequentialCulture" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->SequentialCulture) ?>', 1);"><div id="elh_view_ivf_treatment_SequentialCulture" class="view_ivf_treatment_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->SequentialCulture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->SequentialCulture->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->SequentialCulture->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ivf_treatment_list->TimeLapse->headerCellClass() ?>"><div id="elh_view_ivf_treatment_TimeLapse" class="view_ivf_treatment_TimeLapse"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_TimeLapse" type="text/html"><?php echo $view_ivf_treatment_list->TimeLapse->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ivf_treatment_list->TimeLapse->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_TimeLapse" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->TimeLapse) ?>', 1);"><div id="elh_view_ivf_treatment_TimeLapse" class="view_ivf_treatment_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->TimeLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->TimeLapse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->TimeLapse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->AH->Visible) { // AH ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $view_ivf_treatment_list->AH->headerCellClass() ?>"><div id="elh_view_ivf_treatment_AH" class="view_ivf_treatment_AH"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_AH" type="text/html"><?php echo $view_ivf_treatment_list->AH->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $view_ivf_treatment_list->AH->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_AH" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->AH) ?>', 1);"><div id="elh_view_ivf_treatment_AH" class="view_ivf_treatment_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->AH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->AH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->AH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Weight->Visible) { // Weight ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $view_ivf_treatment_list->Weight->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Weight" class="view_ivf_treatment_Weight"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Weight" type="text/html"><?php echo $view_ivf_treatment_list->Weight->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $view_ivf_treatment_list->Weight->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Weight" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Weight) ?>', 1);"><div id="elh_view_ivf_treatment_Weight" class="view_ivf_treatment_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Weight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Weight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Weight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->BMI->Visible) { // BMI ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $view_ivf_treatment_list->BMI->headerCellClass() ?>"><div id="elh_view_ivf_treatment_BMI" class="view_ivf_treatment_BMI"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_BMI" type="text/html"><?php echo $view_ivf_treatment_list->BMI->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $view_ivf_treatment_list->BMI->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_BMI" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->BMI) ?>', 1);"><div id="elh_view_ivf_treatment_BMI" class="view_ivf_treatment_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->BMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->BMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->BMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Male->Visible) { // Male ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $view_ivf_treatment_list->Male->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Male" class="view_ivf_treatment_Male"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Male" type="text/html"><?php echo $view_ivf_treatment_list->Male->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $view_ivf_treatment_list->Male->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Male" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Male) ?>', 1);"><div id="elh_view_ivf_treatment_Male" class="view_ivf_treatment_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Male->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Male->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->Female->Visible) { // Female ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $view_ivf_treatment_list->Female->headerCellClass() ?>"><div id="elh_view_ivf_treatment_Female" class="view_ivf_treatment_Female"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_Female" type="text/html"><?php echo $view_ivf_treatment_list->Female->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $view_ivf_treatment_list->Female->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_Female" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->Female) ?>', 1);"><div id="elh_view_ivf_treatment_Female" class="view_ivf_treatment_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->Female->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->Female->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->malepropic->Visible) { // malepropic ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->malepropic) == "") { ?>
		<th data-name="malepropic" class="<?php echo $view_ivf_treatment_list->malepropic->headerCellClass() ?>"><div id="elh_view_ivf_treatment_malepropic" class="view_ivf_treatment_malepropic"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_malepropic" type="text/html"><?php echo $view_ivf_treatment_list->malepropic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="malepropic" class="<?php echo $view_ivf_treatment_list->malepropic->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_malepropic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->malepropic) ?>', 1);"><div id="elh_view_ivf_treatment_malepropic" class="view_ivf_treatment_malepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->malepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->malepropic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->malepropic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->femalepropic->Visible) { // femalepropic ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->femalepropic) == "") { ?>
		<th data-name="femalepropic" class="<?php echo $view_ivf_treatment_list->femalepropic->headerCellClass() ?>"><div id="elh_view_ivf_treatment_femalepropic" class="view_ivf_treatment_femalepropic"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_femalepropic" type="text/html"><?php echo $view_ivf_treatment_list->femalepropic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="femalepropic" class="<?php echo $view_ivf_treatment_list->femalepropic->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_femalepropic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->femalepropic) ?>', 1);"><div id="elh_view_ivf_treatment_femalepropic" class="view_ivf_treatment_femalepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->femalepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->femalepropic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->femalepropic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_ivf_treatment_list->HusbandEducation->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HusbandEducation" class="view_ivf_treatment_HusbandEducation"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_HusbandEducation" type="text/html"><?php echo $view_ivf_treatment_list->HusbandEducation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_ivf_treatment_list->HusbandEducation->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_HusbandEducation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->HusbandEducation) ?>', 1);"><div id="elh_view_ivf_treatment_HusbandEducation" class="view_ivf_treatment_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->HusbandEducation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->HusbandEducation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $view_ivf_treatment_list->WifeEducation->headerCellClass() ?>"><div id="elh_view_ivf_treatment_WifeEducation" class="view_ivf_treatment_WifeEducation"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_WifeEducation" type="text/html"><?php echo $view_ivf_treatment_list->WifeEducation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $view_ivf_treatment_list->WifeEducation->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_WifeEducation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->WifeEducation) ?>', 1);"><div id="elh_view_ivf_treatment_WifeEducation" class="view_ivf_treatment_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->WifeEducation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->WifeEducation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_ivf_treatment_list->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatment_HusbandWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_HusbandWorkHours" type="text/html"><?php echo $view_ivf_treatment_list->HusbandWorkHours->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_ivf_treatment_list->HusbandWorkHours->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_HusbandWorkHours" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->HusbandWorkHours) ?>', 1);"><div id="elh_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatment_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->HusbandWorkHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->HusbandWorkHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_ivf_treatment_list->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatment_WifeWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_WifeWorkHours" type="text/html"><?php echo $view_ivf_treatment_list->WifeWorkHours->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_ivf_treatment_list->WifeWorkHours->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_WifeWorkHours" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->WifeWorkHours) ?>', 1);"><div id="elh_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatment_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->WifeWorkHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->WifeWorkHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_ivf_treatment_list->PatientLanguage->headerCellClass() ?>"><div id="elh_view_ivf_treatment_PatientLanguage" class="view_ivf_treatment_PatientLanguage"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_PatientLanguage" type="text/html"><?php echo $view_ivf_treatment_list->PatientLanguage->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_ivf_treatment_list->PatientLanguage->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_PatientLanguage" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->PatientLanguage) ?>', 1);"><div id="elh_view_ivf_treatment_PatientLanguage" class="view_ivf_treatment_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->PatientLanguage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->PatientLanguage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $view_ivf_treatment_list->ReferedBy->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ReferedBy" class="view_ivf_treatment_ReferedBy"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ReferedBy" type="text/html"><?php echo $view_ivf_treatment_list->ReferedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $view_ivf_treatment_list->ReferedBy->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ReferedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ReferedBy) ?>', 1);"><div id="elh_view_ivf_treatment_ReferedBy" class="view_ivf_treatment_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->ReferedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->ReferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->ReferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_ivf_treatment_list->ReferPhNo->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ReferPhNo" class="view_ivf_treatment_ReferPhNo"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ReferPhNo" type="text/html"><?php echo $view_ivf_treatment_list->ReferPhNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_ivf_treatment_list->ReferPhNo->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ReferPhNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ReferPhNo) ?>', 1);"><div id="elh_view_ivf_treatment_ReferPhNo" class="view_ivf_treatment_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->ReferPhNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->ReferPhNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ARTCYCLE1) == "") { ?>
		<th data-name="ARTCYCLE1" class="<?php echo $view_ivf_treatment_list->ARTCYCLE1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatment_ARTCYCLE1"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_ARTCYCLE1" type="text/html"><?php echo $view_ivf_treatment_list->ARTCYCLE1->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE1" class="<?php echo $view_ivf_treatment_list->ARTCYCLE1->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_ARTCYCLE1" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->ARTCYCLE1) ?>', 1);"><div id="elh_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatment_ARTCYCLE1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->ARTCYCLE1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->ARTCYCLE1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->ARTCYCLE1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->RESULT1->Visible) { // RESULT1 ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->RESULT1) == "") { ?>
		<th data-name="RESULT1" class="<?php echo $view_ivf_treatment_list->RESULT1->headerCellClass() ?>"><div id="elh_view_ivf_treatment_RESULT1" class="view_ivf_treatment_RESULT1"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_RESULT1" type="text/html"><?php echo $view_ivf_treatment_list->RESULT1->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT1" class="<?php echo $view_ivf_treatment_list->RESULT1->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_RESULT1" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->RESULT1) ?>', 1);"><div id="elh_view_ivf_treatment_RESULT1" class="view_ivf_treatment_RESULT1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->RESULT1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->RESULT1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->RESULT1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment_list->CoupleID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_CoupleID" class="view_ivf_treatment_CoupleID"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_CoupleID" type="text/html"><?php echo $view_ivf_treatment_list->CoupleID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment_list->CoupleID->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_CoupleID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->CoupleID) ?>', 1);"><div id="elh_view_ivf_treatment_CoupleID" class="view_ivf_treatment_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->CoupleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->CoupleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ivf_treatment_list->HospID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_HospID" class="view_ivf_treatment_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ivf_treatment_HospID" type="text/html"><?php echo $view_ivf_treatment_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ivf_treatment_list->HospID->headerCellClass() ?>"><script id="tpc_view_ivf_treatment_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_list->SortUrl($view_ivf_treatment_list->HospID) ?>', 1);"><div id="elh_view_ivf_treatment_HospID" class="view_ivf_treatment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ivf_treatment_list->ListOptions->render("header", "right", "", "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ivf_treatment_list->ExportAll && $view_ivf_treatment_list->isExport()) {
	$view_ivf_treatment_list->StopRecord = $view_ivf_treatment_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ivf_treatment_list->TotalRecords > $view_ivf_treatment_list->StartRecord + $view_ivf_treatment_list->DisplayRecords - 1)
		$view_ivf_treatment_list->StopRecord = $view_ivf_treatment_list->StartRecord + $view_ivf_treatment_list->DisplayRecords - 1;
	else
		$view_ivf_treatment_list->StopRecord = $view_ivf_treatment_list->TotalRecords;
}
$view_ivf_treatment_list->RecordCount = $view_ivf_treatment_list->StartRecord - 1;
if ($view_ivf_treatment_list->Recordset && !$view_ivf_treatment_list->Recordset->EOF) {
	$view_ivf_treatment_list->Recordset->moveFirst();
	$selectLimit = $view_ivf_treatment_list->UseSelectLimit;
	if (!$selectLimit && $view_ivf_treatment_list->StartRecord > 1)
		$view_ivf_treatment_list->Recordset->move($view_ivf_treatment_list->StartRecord - 1);
} elseif (!$view_ivf_treatment->AllowAddDeleteRow && $view_ivf_treatment_list->StopRecord == 0) {
	$view_ivf_treatment_list->StopRecord = $view_ivf_treatment->GridAddRowCount;
}

// Initialize aggregate
$view_ivf_treatment->RowType = ROWTYPE_AGGREGATEINIT;
$view_ivf_treatment->resetAttributes();
$view_ivf_treatment_list->renderRow();
while ($view_ivf_treatment_list->RecordCount < $view_ivf_treatment_list->StopRecord) {
	$view_ivf_treatment_list->RecordCount++;
	if ($view_ivf_treatment_list->RecordCount >= $view_ivf_treatment_list->StartRecord) {
		$view_ivf_treatment_list->RowCount++;

		// Set up key count
		$view_ivf_treatment_list->KeyCount = $view_ivf_treatment_list->RowIndex;

		// Init row class and style
		$view_ivf_treatment->resetAttributes();
		$view_ivf_treatment->CssClass = "";
		if ($view_ivf_treatment_list->isGridAdd()) {
		} else {
			$view_ivf_treatment_list->loadRowValues($view_ivf_treatment_list->Recordset); // Load row values
		}
		$view_ivf_treatment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ivf_treatment->RowAttrs->merge(["data-rowindex" => $view_ivf_treatment_list->RowCount, "id" => "r" . $view_ivf_treatment_list->RowCount . "_view_ivf_treatment", "data-rowtype" => $view_ivf_treatment->RowType]);

		// Render row
		$view_ivf_treatment_list->renderRow();

		// Render list options
		$view_ivf_treatment_list->renderListOptions();

		// Save row and cell attributes
		$view_ivf_treatment_list->Attrs[$view_ivf_treatment_list->RowCount] = ["row_attrs" => $view_ivf_treatment->rowAttributes(), "cell_attrs" => []];
		$view_ivf_treatment_list->Attrs[$view_ivf_treatment_list->RowCount]["cell_attrs"] = $view_ivf_treatment->fieldCellAttributes();
?>
	<tr <?php echo $view_ivf_treatment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ivf_treatment_list->ListOptions->render("body", "left", $view_ivf_treatment_list->RowCount, "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
	<?php if ($view_ivf_treatment_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ivf_treatment_list->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_id" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_id">
<span<?php echo $view_ivf_treatment_list->id->viewAttributes() ?>><?php echo $view_ivf_treatment_list->id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_ivf_treatment_list->RIDNO->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_RIDNO" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_RIDNO">
<span<?php echo $view_ivf_treatment_list->RIDNO->viewAttributes() ?>><?php echo $view_ivf_treatment_list->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $view_ivf_treatment_list->Name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Name" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Name">
<span<?php echo $view_ivf_treatment_list->Name->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_ivf_treatment_list->Age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Age" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Age">
<span<?php echo $view_ivf_treatment_list->Age->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Age->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $view_ivf_treatment_list->treatment_status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_treatment_status" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_treatment_status">
<span<?php echo $view_ivf_treatment_list->treatment_status->viewAttributes() ?>><?php echo $view_ivf_treatment_list->treatment_status->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $view_ivf_treatment_list->ARTCYCLE->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ARTCYCLE" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ARTCYCLE">
<span<?php echo $view_ivf_treatment_list->ARTCYCLE->viewAttributes() ?>><?php echo $view_ivf_treatment_list->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $view_ivf_treatment_list->RESULT->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_RESULT" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_RESULT">
<span<?php echo $view_ivf_treatment_list->RESULT->viewAttributes() ?>><?php echo $view_ivf_treatment_list->RESULT->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_ivf_treatment_list->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_status" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_status">
<span<?php echo $view_ivf_treatment_list->status->viewAttributes() ?>><?php echo $view_ivf_treatment_list->status->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ivf_treatment_list->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_createdby" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_createdby">
<span<?php echo $view_ivf_treatment_list->createdby->viewAttributes() ?>><?php echo $view_ivf_treatment_list->createdby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ivf_treatment_list->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_createddatetime" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_createddatetime">
<span<?php echo $view_ivf_treatment_list->createddatetime->viewAttributes() ?>><?php echo $view_ivf_treatment_list->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ivf_treatment_list->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_modifiedby" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_modifiedby">
<span<?php echo $view_ivf_treatment_list->modifiedby->viewAttributes() ?>><?php echo $view_ivf_treatment_list->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ivf_treatment_list->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_modifieddatetime" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_modifieddatetime">
<span<?php echo $view_ivf_treatment_list->modifieddatetime->viewAttributes() ?>><?php echo $view_ivf_treatment_list->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate" <?php echo $view_ivf_treatment_list->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TreatmentStartDate" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TreatmentStartDate">
<span<?php echo $view_ivf_treatment_list->TreatmentStartDate->viewAttributes() ?>><?php echo $view_ivf_treatment_list->TreatmentStartDate->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->TreatementStopDate->Visible) { // TreatementStopDate ?>
		<td data-name="TreatementStopDate" <?php echo $view_ivf_treatment_list->TreatementStopDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TreatementStopDate" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TreatementStopDate">
<span<?php echo $view_ivf_treatment_list->TreatementStopDate->viewAttributes() ?>><?php echo $view_ivf_treatment_list->TreatementStopDate->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->TypePatient->Visible) { // TypePatient ?>
		<td data-name="TypePatient" <?php echo $view_ivf_treatment_list->TypePatient->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TypePatient" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TypePatient">
<span<?php echo $view_ivf_treatment_list->TypePatient->viewAttributes() ?>><?php echo $view_ivf_treatment_list->TypePatient->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment" <?php echo $view_ivf_treatment_list->Treatment->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Treatment" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Treatment">
<span<?php echo $view_ivf_treatment_list->Treatment->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Treatment->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec" <?php echo $view_ivf_treatment_list->TreatmentTec->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TreatmentTec" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TreatmentTec">
<span<?php echo $view_ivf_treatment_list->TreatmentTec->viewAttributes() ?>><?php echo $view_ivf_treatment_list->TreatmentTec->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle" <?php echo $view_ivf_treatment_list->TypeOfCycle->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TypeOfCycle" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TypeOfCycle">
<span<?php echo $view_ivf_treatment_list->TypeOfCycle->viewAttributes() ?>><?php echo $view_ivf_treatment_list->TypeOfCycle->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin" <?php echo $view_ivf_treatment_list->SpermOrgin->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_SpermOrgin" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_SpermOrgin">
<span<?php echo $view_ivf_treatment_list->SpermOrgin->viewAttributes() ?>><?php echo $view_ivf_treatment_list->SpermOrgin->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $view_ivf_treatment_list->State->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_State" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_State">
<span<?php echo $view_ivf_treatment_list->State->viewAttributes() ?>><?php echo $view_ivf_treatment_list->State->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Origin->Visible) { // Origin ?>
		<td data-name="Origin" <?php echo $view_ivf_treatment_list->Origin->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Origin" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Origin">
<span<?php echo $view_ivf_treatment_list->Origin->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Origin->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->MACS->Visible) { // MACS ?>
		<td data-name="MACS" <?php echo $view_ivf_treatment_list->MACS->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_MACS" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_MACS">
<span<?php echo $view_ivf_treatment_list->MACS->viewAttributes() ?>><?php echo $view_ivf_treatment_list->MACS->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Technique->Visible) { // Technique ?>
		<td data-name="Technique" <?php echo $view_ivf_treatment_list->Technique->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Technique" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Technique">
<span<?php echo $view_ivf_treatment_list->Technique->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Technique->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning" <?php echo $view_ivf_treatment_list->PgdPlanning->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_PgdPlanning" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_PgdPlanning">
<span<?php echo $view_ivf_treatment_list->PgdPlanning->viewAttributes() ?>><?php echo $view_ivf_treatment_list->PgdPlanning->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI" <?php echo $view_ivf_treatment_list->IMSI->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_IMSI" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_IMSI">
<span<?php echo $view_ivf_treatment_list->IMSI->viewAttributes() ?>><?php echo $view_ivf_treatment_list->IMSI->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture" <?php echo $view_ivf_treatment_list->SequentialCulture->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_SequentialCulture" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_SequentialCulture">
<span<?php echo $view_ivf_treatment_list->SequentialCulture->viewAttributes() ?>><?php echo $view_ivf_treatment_list->SequentialCulture->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse" <?php echo $view_ivf_treatment_list->TimeLapse->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TimeLapse" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_TimeLapse">
<span<?php echo $view_ivf_treatment_list->TimeLapse->viewAttributes() ?>><?php echo $view_ivf_treatment_list->TimeLapse->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->AH->Visible) { // AH ?>
		<td data-name="AH" <?php echo $view_ivf_treatment_list->AH->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_AH" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_AH">
<span<?php echo $view_ivf_treatment_list->AH->viewAttributes() ?>><?php echo $view_ivf_treatment_list->AH->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Weight->Visible) { // Weight ?>
		<td data-name="Weight" <?php echo $view_ivf_treatment_list->Weight->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Weight" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Weight">
<span<?php echo $view_ivf_treatment_list->Weight->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Weight->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->BMI->Visible) { // BMI ?>
		<td data-name="BMI" <?php echo $view_ivf_treatment_list->BMI->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_BMI" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_BMI">
<span<?php echo $view_ivf_treatment_list->BMI->viewAttributes() ?>><?php echo $view_ivf_treatment_list->BMI->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Male->Visible) { // Male ?>
		<td data-name="Male" <?php echo $view_ivf_treatment_list->Male->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Male" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Male">
<span<?php echo $view_ivf_treatment_list->Male->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Male->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->Female->Visible) { // Female ?>
		<td data-name="Female" <?php echo $view_ivf_treatment_list->Female->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Female" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_Female">
<span<?php echo $view_ivf_treatment_list->Female->viewAttributes() ?>><?php echo $view_ivf_treatment_list->Female->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->malepropic->Visible) { // malepropic ?>
		<td data-name="malepropic" <?php echo $view_ivf_treatment_list->malepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_malepropic" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_malepropic">
<span><?php echo GetFileViewTag($view_ivf_treatment_list->malepropic, $view_ivf_treatment_list->malepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->femalepropic->Visible) { // femalepropic ?>
		<td data-name="femalepropic" <?php echo $view_ivf_treatment_list->femalepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_femalepropic" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_femalepropic">
<span><?php echo GetFileViewTag($view_ivf_treatment_list->femalepropic, $view_ivf_treatment_list->femalepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation" <?php echo $view_ivf_treatment_list->HusbandEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_HusbandEducation" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_HusbandEducation">
<span<?php echo $view_ivf_treatment_list->HusbandEducation->viewAttributes() ?>><?php echo $view_ivf_treatment_list->HusbandEducation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation" <?php echo $view_ivf_treatment_list->WifeEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_WifeEducation" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_WifeEducation">
<span<?php echo $view_ivf_treatment_list->WifeEducation->viewAttributes() ?>><?php echo $view_ivf_treatment_list->WifeEducation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours" <?php echo $view_ivf_treatment_list->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_HusbandWorkHours" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_HusbandWorkHours">
<span<?php echo $view_ivf_treatment_list->HusbandWorkHours->viewAttributes() ?>><?php echo $view_ivf_treatment_list->HusbandWorkHours->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours" <?php echo $view_ivf_treatment_list->WifeWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_WifeWorkHours" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_WifeWorkHours">
<span<?php echo $view_ivf_treatment_list->WifeWorkHours->viewAttributes() ?>><?php echo $view_ivf_treatment_list->WifeWorkHours->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage" <?php echo $view_ivf_treatment_list->PatientLanguage->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_PatientLanguage" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_PatientLanguage">
<span<?php echo $view_ivf_treatment_list->PatientLanguage->viewAttributes() ?>><?php echo $view_ivf_treatment_list->PatientLanguage->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy" <?php echo $view_ivf_treatment_list->ReferedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ReferedBy" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ReferedBy">
<span<?php echo $view_ivf_treatment_list->ReferedBy->viewAttributes() ?>><?php echo $view_ivf_treatment_list->ReferedBy->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo" <?php echo $view_ivf_treatment_list->ReferPhNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ReferPhNo" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ReferPhNo">
<span<?php echo $view_ivf_treatment_list->ReferPhNo->viewAttributes() ?>><?php echo $view_ivf_treatment_list->ReferPhNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
		<td data-name="ARTCYCLE1" <?php echo $view_ivf_treatment_list->ARTCYCLE1->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ARTCYCLE1" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_ARTCYCLE1">
<span<?php echo $view_ivf_treatment_list->ARTCYCLE1->viewAttributes() ?>><?php echo $view_ivf_treatment_list->ARTCYCLE1->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->RESULT1->Visible) { // RESULT1 ?>
		<td data-name="RESULT1" <?php echo $view_ivf_treatment_list->RESULT1->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_RESULT1" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_RESULT1">
<span<?php echo $view_ivf_treatment_list->RESULT1->viewAttributes() ?>><?php echo $view_ivf_treatment_list->RESULT1->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID" <?php echo $view_ivf_treatment_list->CoupleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_CoupleID" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_CoupleID">
<span<?php echo $view_ivf_treatment_list->CoupleID->viewAttributes() ?>><?php echo $view_ivf_treatment_list->CoupleID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ivf_treatment_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_HospID" type="text/html"><span id="el<?php echo $view_ivf_treatment_list->RowCount ?>_view_ivf_treatment_HospID">
<span<?php echo $view_ivf_treatment_list->HospID->viewAttributes() ?>><?php echo $view_ivf_treatment_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ivf_treatment_list->ListOptions->render("body", "right", $view_ivf_treatment_list->RowCount, "block", $view_ivf_treatment->TableVar, "view_ivf_treatmentlist");
?>
	</tr>
<?php
	}
	if (!$view_ivf_treatment_list->isGridAdd())
		$view_ivf_treatment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_ivf_treatmentlist" class="ew-custom-template"></div>
<script id="tpm_view_ivf_treatmentlist" type="text/html">
<div id="ct_view_ivf_treatment_list"><?php if ($view_ivf_treatment_list->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	{{include tmpl=~getTemplate("#tpoh_view_ivf_treatment")/}}
	<td rowspan="2">Home</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_CoupleID")/}}</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_malepropic")/}}</td>
		<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_femalepropic")/}}</td>
	<td>{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_Male")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_ARTCYCLE")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_status")/}}</td>
	</tr>
	<tr class="ew-table-header">
	<td>{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_Female")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_RESULT")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpc_view_ivf_treatment_ReferedBy")/}}</td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $view_ivf_treatment_list->StartRowCount; $i <= $view_ivf_treatment_list->RowCount; $i++) { ?>
<tr<?php echo @$view_ivf_treatment_list->Attrs[$i]['row_attrs'] ?>> 
	{{include tmpl=~getTemplate("#tpob<?php echo $i ?>_view_ivf_treatment")/}}
	<td rowspan="2">
				<a class="btn btn-app" href="treatment.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_CoupleID")/}}</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_malepropic")/}}</td>
		<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_femalepropic")/}}</td>
	<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_Male")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_ARTCYCLE")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_status")/}}</td>
</tr>
<tr<?php echo @$view_ivf_treatment_list->Attrs[$i]['row_attrs'] ?>>
	<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_Female")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_RESULT")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_ivf_treatment_ReferedBy")/}}</td>
</tr>

<?php } ?>
	</tbody>
	<!-- <?php if ($view_ivf_treatment_list->TotalRecords > 0 && !$view_ivf_treatment->isGridAdd() && !$view_ivf_treatment->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer">{{include tmpl=~getTemplate("#tpof_view_ivf_treatment")/}}<td>{{include tmpl=~getTemplate("#tpg_MyField1")/}}</td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ivf_treatment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ivf_treatment_list->Recordset)
	$view_ivf_treatment_list->Recordset->Close();
?>
<?php if (!$view_ivf_treatment_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ivf_treatment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ivf_treatment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ivf_treatment_list->TotalRecords == 0 && !$view_ivf_treatment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ivf_treatment->Rows) ?> };
	ew.applyTemplate("tpd_view_ivf_treatmentlist", "tpm_view_ivf_treatmentlist", "view_ivf_treatmentlist", "<?php echo $view_ivf_treatment->CustomExport ?>", ew.templateData);
	$("#tpd_view_ivf_treatmentlist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_view_ivf_treatmentlist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.view_ivf_treatmentlist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ivf_treatment_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_treatment_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ivf_treatment",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ivf_treatment_list->terminate();
?>