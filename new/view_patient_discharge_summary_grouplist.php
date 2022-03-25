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
$view_patient_discharge_summary_group_list = new view_patient_discharge_summary_group_list();

// Run the page
$view_patient_discharge_summary_group_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_discharge_summary_group_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_patient_discharge_summary_group_list->isExport()) { ?>
<script>
var fview_patient_discharge_summary_grouplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_patient_discharge_summary_grouplist = currentForm = new ew.Form("fview_patient_discharge_summary_grouplist", "list");
	fview_patient_discharge_summary_grouplist.formKeyCountName = '<?php echo $view_patient_discharge_summary_group_list->FormKeyCountName ?>';
	loadjs.done("fview_patient_discharge_summary_grouplist");
});
var fview_patient_discharge_summary_grouplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_patient_discharge_summary_grouplistsrch = currentSearchForm = new ew.Form("fview_patient_discharge_summary_grouplistsrch");

	// Validate function for search
	fview_patient_discharge_summary_grouplistsrch.validate = function(fobj) {
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
	fview_patient_discharge_summary_grouplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_patient_discharge_summary_grouplistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_patient_discharge_summary_grouplistsrch.lists["x_physician_id"] = <?php echo $view_patient_discharge_summary_group_list->physician_id->Lookup->toClientList($view_patient_discharge_summary_group_list) ?>;
	fview_patient_discharge_summary_grouplistsrch.lists["x_physician_id"].options = <?php echo JsonEncode($view_patient_discharge_summary_group_list->physician_id->lookupOptions()) ?>;

	// Filters
	fview_patient_discharge_summary_grouplistsrch.filterList = <?php echo $view_patient_discharge_summary_group_list->getFilterList() ?>;
	loadjs.done("fview_patient_discharge_summary_grouplistsrch");
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
<?php if (!$view_patient_discharge_summary_group_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_discharge_summary_group_list->TotalRecords > 0 && $view_patient_discharge_summary_group_list->ExportOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->ImportOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->SearchOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->FilterOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_discharge_summary_group_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_discharge_summary_group_list->isExport() && !$view_patient_discharge_summary_group->CurrentAction) { ?>
<form name="fview_patient_discharge_summary_grouplistsrch" id="fview_patient_discharge_summary_grouplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_patient_discharge_summary_grouplistsrch-search-panel" class="<?php echo $view_patient_discharge_summary_group_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
	<div class="ew-extended-search">
<?php

// Render search row
$view_patient_discharge_summary_group->RowType = ROWTYPE_SEARCH;
$view_patient_discharge_summary_group->resetAttributes();
$view_patient_discharge_summary_group_list->renderRow();
?>
<?php if ($view_patient_discharge_summary_group_list->patient_name->Visible) { // patient_name ?>
	<?php
		$view_patient_discharge_summary_group_list->SearchColumnCount++;
		if (($view_patient_discharge_summary_group_list->SearchColumnCount - 1) % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) {
			$view_patient_discharge_summary_group_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_patient_discharge_summary_group_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group_list->patient_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
		<span id="el_view_patient_discharge_summary_group_patient_name" class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary_group" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary_group_list->patient_name->EditValue ?>"<?php echo $view_patient_discharge_summary_group_list->patient_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_patient_discharge_summary_group_list->SearchColumnCount % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->PatientID->Visible) { // PatientID ?>
	<?php
		$view_patient_discharge_summary_group_list->SearchColumnCount++;
		if (($view_patient_discharge_summary_group_list->SearchColumnCount - 1) % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) {
			$view_patient_discharge_summary_group_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_patient_discharge_summary_group_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_view_patient_discharge_summary_group_PatientID" class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary_group" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary_group_list->PatientID->EditValue ?>"<?php echo $view_patient_discharge_summary_group_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_patient_discharge_summary_group_list->SearchColumnCount % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->physician_id->Visible) { // physician_id ?>
	<?php
		$view_patient_discharge_summary_group_list->SearchColumnCount++;
		if (($view_patient_discharge_summary_group_list->SearchColumnCount - 1) % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) {
			$view_patient_discharge_summary_group_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_patient_discharge_summary_group_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_physician_id" class="ew-cell form-group">
		<label for="x_physician_id" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group_list->physician_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_physician_id" id="z_physician_id" value="=">
</span>
		<span id="el_view_patient_discharge_summary_group_physician_id" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_discharge_summary_group" data-field="x_physician_id" data-value-separator="<?php echo $view_patient_discharge_summary_group_list->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $view_patient_discharge_summary_group_list->physician_id->editAttributes() ?>>
			<?php echo $view_patient_discharge_summary_group_list->physician_id->selectOptionListHtml("x_physician_id") ?>
		</select>
</div>
<?php echo $view_patient_discharge_summary_group_list->physician_id->Lookup->getParamTag($view_patient_discharge_summary_group_list, "p_x_physician_id") ?>
</span>
	</div>
	<?php if ($view_patient_discharge_summary_group_list->SearchColumnCount % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php
		$view_patient_discharge_summary_group_list->SearchColumnCount++;
		if (($view_patient_discharge_summary_group_list->SearchColumnCount - 1) % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) {
			$view_patient_discharge_summary_group_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_patient_discharge_summary_group_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_typeRegsisteration" class="ew-cell form-group">
		<label for="x_typeRegsisteration" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE">
</span>
		<span id="el_view_patient_discharge_summary_group_typeRegsisteration" class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary_group" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->typeRegsisteration->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->EditValue ?>"<?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_patient_discharge_summary_group_list->SearchColumnCount % $view_patient_discharge_summary_group_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->SearchColumnCount % $view_patient_discharge_summary_group_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_patient_discharge_summary_group_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_discharge_summary_group_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_discharge_summary_group_list->showPageHeader(); ?>
<?php
$view_patient_discharge_summary_group_list->showMessage();
?>
<?php if ($view_patient_discharge_summary_group_list->TotalRecords > 0 || $view_patient_discharge_summary_group->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_discharge_summary_group_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_discharge_summary_group">
<?php if (!$view_patient_discharge_summary_group_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_discharge_summary_group_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_discharge_summary_group_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_group_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_discharge_summary_grouplist" id="fview_patient_discharge_summary_grouplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
<div id="gmp_view_patient_discharge_summary_group" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_discharge_summary_group_list->TotalRecords > 0 || $view_patient_discharge_summary_group_list->isGridEdit()) { ?>
<table id="tbl_view_patient_discharge_summary_grouplist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_discharge_summary_group->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_discharge_summary_group_list->renderListOptions();

// Render list options (header, left)
$view_patient_discharge_summary_group_list->ListOptions->render("header", "left", "", "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
<?php if ($view_patient_discharge_summary_group_list->id->Visible) { // id ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_discharge_summary_group_list->id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_group_id"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_id" type="text/html"><?php echo $view_patient_discharge_summary_group_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_discharge_summary_group_list->id->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->id) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_group_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->patient_id->Visible) { // patient_id ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_patient_discharge_summary_group_list->patient_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_group_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_patient_id" type="text/html"><?php echo $view_patient_discharge_summary_group_list->patient_id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_patient_discharge_summary_group_list->patient_id->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_patient_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->patient_id) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_group_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->patient_name->Visible) { // patient_name ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_discharge_summary_group_list->patient_name->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_group_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_patient_name" type="text/html"><?php echo $view_patient_discharge_summary_group_list->patient_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_discharge_summary_group_list->patient_name->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_patient_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->patient_name) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_group_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_discharge_summary_group_list->PatientID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_group_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_PatientID" type="text/html"><?php echo $view_patient_discharge_summary_group_list->PatientID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_discharge_summary_group_list->PatientID->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_PatientID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->PatientID) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_group_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_patient_discharge_summary_group_list->mrnNo->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_group_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_mrnNo" type="text/html"><?php echo $view_patient_discharge_summary_group_list->mrnNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_patient_discharge_summary_group_list->mrnNo->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_mrnNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->mrnNo) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_group_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_discharge_summary_group_list->profilePic->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_group_profilePic"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_profilePic" type="text/html"><?php echo $view_patient_discharge_summary_group_list->profilePic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_discharge_summary_group_list->profilePic->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_profilePic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->profilePic) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_group_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->gender->Visible) { // gender ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_patient_discharge_summary_group_list->gender->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_group_gender"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_gender" type="text/html"><?php echo $view_patient_discharge_summary_group_list->gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_patient_discharge_summary_group_list->gender->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->gender) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_group_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->physician_id->Visible) { // physician_id ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_discharge_summary_group_list->physician_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_group_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_physician_id" type="text/html"><?php echo $view_patient_discharge_summary_group_list->physician_id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_discharge_summary_group_list->physician_id->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_physician_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->physician_id) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_group_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->physician_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->physician_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_group_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_typeRegsisteration" type="text/html"><?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_typeRegsisteration" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->typeRegsisteration) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_group_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->typeRegsisteration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->typeRegsisteration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_discharge_summary_group_list->HospID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_group_HospID"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_HospID" type="text/html"><?php echo $view_patient_discharge_summary_group_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_discharge_summary_group_list->HospID->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->HospID) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_group_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_group_AdviceToOtherHospital"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_AdviceToOtherHospital" type="text/html"><?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_AdviceToOtherHospital" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_patient_discharge_summary_group_list->SortUrl($view_patient_discharge_summary_group_list->AdviceToOtherHospital) ?>', 1);"><div id="elh_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_group_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group_list->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group_list->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_discharge_summary_group_list->ListOptions->render("header", "right", "", "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_discharge_summary_group_list->ExportAll && $view_patient_discharge_summary_group_list->isExport()) {
	$view_patient_discharge_summary_group_list->StopRecord = $view_patient_discharge_summary_group_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_patient_discharge_summary_group_list->TotalRecords > $view_patient_discharge_summary_group_list->StartRecord + $view_patient_discharge_summary_group_list->DisplayRecords - 1)
		$view_patient_discharge_summary_group_list->StopRecord = $view_patient_discharge_summary_group_list->StartRecord + $view_patient_discharge_summary_group_list->DisplayRecords - 1;
	else
		$view_patient_discharge_summary_group_list->StopRecord = $view_patient_discharge_summary_group_list->TotalRecords;
}
$view_patient_discharge_summary_group_list->RecordCount = $view_patient_discharge_summary_group_list->StartRecord - 1;
if ($view_patient_discharge_summary_group_list->Recordset && !$view_patient_discharge_summary_group_list->Recordset->EOF) {
	$view_patient_discharge_summary_group_list->Recordset->moveFirst();
	$selectLimit = $view_patient_discharge_summary_group_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_discharge_summary_group_list->StartRecord > 1)
		$view_patient_discharge_summary_group_list->Recordset->move($view_patient_discharge_summary_group_list->StartRecord - 1);
} elseif (!$view_patient_discharge_summary_group->AllowAddDeleteRow && $view_patient_discharge_summary_group_list->StopRecord == 0) {
	$view_patient_discharge_summary_group_list->StopRecord = $view_patient_discharge_summary_group->GridAddRowCount;
}

// Initialize aggregate
$view_patient_discharge_summary_group->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_discharge_summary_group->resetAttributes();
$view_patient_discharge_summary_group_list->renderRow();
while ($view_patient_discharge_summary_group_list->RecordCount < $view_patient_discharge_summary_group_list->StopRecord) {
	$view_patient_discharge_summary_group_list->RecordCount++;
	if ($view_patient_discharge_summary_group_list->RecordCount >= $view_patient_discharge_summary_group_list->StartRecord) {
		$view_patient_discharge_summary_group_list->RowCount++;

		// Set up key count
		$view_patient_discharge_summary_group_list->KeyCount = $view_patient_discharge_summary_group_list->RowIndex;

		// Init row class and style
		$view_patient_discharge_summary_group->resetAttributes();
		$view_patient_discharge_summary_group->CssClass = "";
		if ($view_patient_discharge_summary_group_list->isGridAdd()) {
		} else {
			$view_patient_discharge_summary_group_list->loadRowValues($view_patient_discharge_summary_group_list->Recordset); // Load row values
		}
		$view_patient_discharge_summary_group->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_discharge_summary_group->RowAttrs->merge(["data-rowindex" => $view_patient_discharge_summary_group_list->RowCount, "id" => "r" . $view_patient_discharge_summary_group_list->RowCount . "_view_patient_discharge_summary_group", "data-rowtype" => $view_patient_discharge_summary_group->RowType]);

		// Render row
		$view_patient_discharge_summary_group_list->renderRow();

		// Render list options
		$view_patient_discharge_summary_group_list->renderListOptions();

		// Save row and cell attributes
		$view_patient_discharge_summary_group_list->Attrs[$view_patient_discharge_summary_group_list->RowCount] = ["row_attrs" => $view_patient_discharge_summary_group->rowAttributes(), "cell_attrs" => []];
		$view_patient_discharge_summary_group_list->Attrs[$view_patient_discharge_summary_group_list->RowCount]["cell_attrs"] = $view_patient_discharge_summary_group->fieldCellAttributes();
?>
	<tr <?php echo $view_patient_discharge_summary_group->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_discharge_summary_group_list->ListOptions->render("body", "left", $view_patient_discharge_summary_group_list->RowCount, "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
	<?php if ($view_patient_discharge_summary_group_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_patient_discharge_summary_group_list->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_id" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_id">
<span<?php echo $view_patient_discharge_summary_group_list->id->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $view_patient_discharge_summary_group_list->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_patient_id" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_patient_id">
<span<?php echo $view_patient_discharge_summary_group_list->patient_id->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->patient_id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $view_patient_discharge_summary_group_list->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_patient_name" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_patient_name">
<span<?php echo $view_patient_discharge_summary_group_list->patient_name->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->patient_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_patient_discharge_summary_group_list->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_PatientID" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_PatientID">
<span<?php echo $view_patient_discharge_summary_group_list->PatientID->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->PatientID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $view_patient_discharge_summary_group_list->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_mrnNo" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_mrnNo">
<span<?php echo $view_patient_discharge_summary_group_list->mrnNo->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->mrnNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $view_patient_discharge_summary_group_list->profilePic->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_profilePic" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_profilePic">
<span<?php echo $view_patient_discharge_summary_group_list->profilePic->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->profilePic->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_patient_discharge_summary_group_list->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_gender" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_gender">
<span<?php echo $view_patient_discharge_summary_group_list->gender->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->gender->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id" <?php echo $view_patient_discharge_summary_group_list->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_physician_id" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_physician_id">
<span<?php echo $view_patient_discharge_summary_group_list->physician_id->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->physician_id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration" <?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_typeRegsisteration" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_typeRegsisteration">
<span<?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->typeRegsisteration->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_patient_discharge_summary_group_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_HospID" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_HospID">
<span<?php echo $view_patient_discharge_summary_group_list->HospID->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital" <?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_AdviceToOtherHospital" type="text/html"><span id="el<?php echo $view_patient_discharge_summary_group_list->RowCount ?>_view_patient_discharge_summary_group_AdviceToOtherHospital">
<span<?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->viewAttributes() ?>><?php echo $view_patient_discharge_summary_group_list->AdviceToOtherHospital->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_discharge_summary_group_list->ListOptions->render("body", "right", $view_patient_discharge_summary_group_list->RowCount, "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
	</tr>
<?php
	}
	if (!$view_patient_discharge_summary_group_list->isGridAdd())
		$view_patient_discharge_summary_group_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_patient_discharge_summary_grouplist" class="ew-custom-template"></div>
<script id="tpm_view_patient_discharge_summary_grouplist" type="text/html">
<div id="ct_view_patient_discharge_summary_group_list"><?php if ($view_patient_discharge_summary_group_list->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			{{include tmpl=~getTemplate("#tpoh_view_patient_discharge_summary_group")/}}
			<td rowspan="2">Print</td>
			<td rowspan="2">{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_profilePic")/}}</td>
			<td>{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_PatientID")/}}</td><td>{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_patient_name")/}}</td> <td>{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_gender")/}}</td> 
		</tr>
		<tr class="ew-table-header">
			<td>{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_physician_id")/}}</td><td>{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_typeRegsisteration")/}}</td><td>{{include tmpl=~getTemplate("#tpc_view_patient_discharge_summary_group_mrnNo")/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_patient_discharge_summary_group_list->StartRowCount; $i <= $view_patient_discharge_summary_group_list->RowCount; $i++) { ?>
<tr<?php echo @$view_patient_discharge_summary_group_list->Attrs[$i]['row_attrs'] ?>>
	{{include tmpl=~getTemplate("#tpob<?php echo $i ?>_view_patient_discharge_summary_group")/}}
<td rowspan="2">
<a id="ggh{{: ~root.rows[<?php echo $i - 1 ?>].id }}"  href=""  onload= class="faa-parent animated-hover">
				<i  id="bbbg{{: ~root.rows[<?php echo $i - 1 ?>].id }}"   class="fa fa-print faa-tada fa-2x" style="color:green"></i>
 </a>
<img hidden src="ff" onerror=" var mmk = document.getElementById('ggh{{: ~root.rows[<?php echo $i - 1 ?>].id }}'); var kkkl = document.getElementById('bbbg{{: ~root.rows[<?php echo $i - 1 ?>].id }}'); var ad='{{: ~root.rows[<?php echo $i - 1 ?>].AdviceToOtherHospital }}'; if(ad == 'Yes'){ mmk.href = 'view_patient_clinical_summaryview.php?showdetail=&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}';  kkkl.style.color = '#ff0000'; } else {  mmk.href = 'view_patient_discharge_summaryview.php?showdetail=&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}'  }  a" > 
</td>
	<td rowspan="2">
<div class="image">
		  <img  style="height: auto;width: 4rem;" src='uploads/<?php echo $view_patient_discharge_summary_group->profilePic->getViewValue() ?>'  class="img-circle elevation-2" alt="User Image">
</div>
	</td>
	<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_patient_discharge_summary_group_PatientID")/}}</td><td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_patient_discharge_summary_group_patient_name")/}}</td> <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_patient_discharge_summary_group_gender")/}}</td> 
 </tr>
 <tr<?php echo @$view_patient_discharge_summary_group_list->Attrs[$i]['row_attrs'] ?>> 
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_patient_discharge_summary_group_physician_id")/}}</td><td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_patient_discharge_summary_group_typeRegsisteration")/}}</td><td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_patient_discharge_summary_group_mrnNo")/}}</td>
 </tr> 

<?php } ?>
</tbody></table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_patient_discharge_summary_group->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_discharge_summary_group_list->Recordset)
	$view_patient_discharge_summary_group_list->Recordset->Close();
?>
<?php if (!$view_patient_discharge_summary_group_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_discharge_summary_group_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_patient_discharge_summary_group_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_group_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->TotalRecords == 0 && !$view_patient_discharge_summary_group->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_group_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_patient_discharge_summary_group->Rows) ?> };
	ew.applyTemplate("tpd_view_patient_discharge_summary_grouplist", "tpm_view_patient_discharge_summary_grouplist", "view_patient_discharge_summary_grouplist", "<?php echo $view_patient_discharge_summary_group->CustomExport ?>", ew.templateData);
	$("#tpd_view_patient_discharge_summary_grouplist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_view_patient_discharge_summary_grouplist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.view_patient_discharge_summary_grouplist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_patient_discharge_summary_group_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_patient_discharge_summary_group_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_patient_discharge_summary_group",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_patient_discharge_summary_group_list->terminate();
?>