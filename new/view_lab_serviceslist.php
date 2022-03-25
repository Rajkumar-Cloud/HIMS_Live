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
$view_lab_services_list = new view_lab_services_list();

// Run the page
$view_lab_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_services_list->isExport()) { ?>
<script>
var fview_lab_serviceslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_lab_serviceslist = currentForm = new ew.Form("fview_lab_serviceslist", "list");
	fview_lab_serviceslist.formKeyCountName = '<?php echo $view_lab_services_list->FormKeyCountName ?>';
	loadjs.done("fview_lab_serviceslist");
});
var fview_lab_serviceslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_lab_serviceslistsrch = currentSearchForm = new ew.Form("fview_lab_serviceslistsrch");

	// Validate function for search
	fview_lab_serviceslistsrch.validate = function(fobj) {
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
	fview_lab_serviceslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_serviceslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_serviceslistsrch.lists["x_HospID"] = <?php echo $view_lab_services_list->HospID->Lookup->toClientList($view_lab_services_list) ?>;
	fview_lab_serviceslistsrch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_list->HospID->lookupOptions()) ?>;

	// Filters
	fview_lab_serviceslistsrch.filterList = <?php echo $view_lab_services_list->getFilterList() ?>;
	loadjs.done("fview_lab_serviceslistsrch");
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
<?php if (!$view_lab_services_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_services_list->TotalRecords > 0 && $view_lab_services_list->ExportOptions->visible()) { ?>
<?php $view_lab_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_list->ImportOptions->visible()) { ?>
<?php $view_lab_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_list->SearchOptions->visible()) { ?>
<?php $view_lab_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_list->FilterOptions->visible()) { ?>
<?php $view_lab_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_services_list->isExport() && !$view_lab_services->CurrentAction) { ?>
<form name="fview_lab_serviceslistsrch" id="fview_lab_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_lab_serviceslistsrch-search-panel" class="<?php echo $view_lab_services_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_services">
	<div class="ew-extended-search">
<?php

// Render search row
$view_lab_services->RowType = ROWTYPE_SEARCH;
$view_lab_services->resetAttributes();
$view_lab_services_list->renderRow();
?>
<?php if ($view_lab_services_list->PatientId->Visible) { // PatientId ?>
	<?php
		$view_lab_services_list->SearchColumnCount++;
		if (($view_lab_services_list->SearchColumnCount - 1) % $view_lab_services_list->SearchFieldsPerRow == 0) {
			$view_lab_services_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_services_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_lab_services_list->PatientId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		<span id="el_view_lab_services_PatientId" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_list->PatientId->EditValue ?>"<?php echo $view_lab_services_list->PatientId->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_services_list->SearchColumnCount % $view_lab_services_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_lab_services_list->SearchColumnCount++;
		if (($view_lab_services_list->SearchColumnCount - 1) % $view_lab_services_list->SearchFieldsPerRow == 0) {
			$view_lab_services_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_services_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_lab_services_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_lab_services_PatientName" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_list->PatientName->EditValue ?>"<?php echo $view_lab_services_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_services_list->SearchColumnCount % $view_lab_services_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->HospID->Visible) { // HospID ?>
	<?php
		$view_lab_services_list->SearchColumnCount++;
		if (($view_lab_services_list->SearchColumnCount - 1) % $view_lab_services_list->SearchFieldsPerRow == 0) {
			$view_lab_services_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_services_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_HospID" class="ew-cell form-group">
		<label for="x_HospID" class="ew-search-caption ew-label"><?php echo $view_lab_services_list->HospID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		<span id="el_view_lab_services_HospID" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_services" data-field="x_HospID" data-value-separator="<?php echo $view_lab_services_list->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_services_list->HospID->editAttributes() ?>>
			<?php echo $view_lab_services_list->HospID->selectOptionListHtml("x_HospID") ?>
		</select>
</div>
<?php echo $view_lab_services_list->HospID->Lookup->getParamTag($view_lab_services_list, "p_x_HospID") ?>
</span>
	</div>
	<?php if ($view_lab_services_list->SearchColumnCount % $view_lab_services_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php
		$view_lab_services_list->SearchColumnCount++;
		if (($view_lab_services_list->SearchColumnCount - 1) % $view_lab_services_list->SearchFieldsPerRow == 0) {
			$view_lab_services_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_services_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_LabTestReleased" class="ew-cell form-group">
		<label for="x_LabTestReleased" class="ew-search-caption ew-label"><?php echo $view_lab_services_list->LabTestReleased->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE">
</span>
		<span id="el_view_lab_services_LabTestReleased" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_list->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_list->LabTestReleased->EditValue ?>"<?php echo $view_lab_services_list->LabTestReleased->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_services_list->SearchColumnCount % $view_lab_services_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_lab_services_list->SearchColumnCount % $view_lab_services_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_lab_services_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_lab_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_services_list->showPageHeader(); ?>
<?php
$view_lab_services_list->showMessage();
?>
<?php if ($view_lab_services_list->TotalRecords > 0 || $view_lab_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_services">
<?php if (!$view_lab_services_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_services_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_serviceslist" id="fview_lab_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services">
<div id="gmp_view_lab_services" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_services_list->TotalRecords > 0 || $view_lab_services_list->isGridEdit()) { ?>
<table id="tbl_view_lab_serviceslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_services->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_services_list->renderListOptions();

// Render list options (header, left)
$view_lab_services_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_services_list->id->Visible) { // id ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_services_list->id->headerCellClass() ?>"><div id="elh_view_lab_services_id" class="view_lab_services_id"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_services_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->id) ?>', 1);"><div id="elh_view_lab_services_id" class="view_lab_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->SID->Visible) { // SID ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->SID) == "") { ?>
		<th data-name="SID" class="<?php echo $view_lab_services_list->SID->headerCellClass() ?>"><div id="elh_view_lab_services_SID" class="view_lab_services_SID"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->SID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SID" class="<?php echo $view_lab_services_list->SID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->SID) ?>', 1);"><div id="elh_view_lab_services_SID" class="view_lab_services_SID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->SID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->SID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->SID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_services_list->PatientId->headerCellClass() ?>"><div id="elh_view_lab_services_PatientId" class="view_lab_services_PatientId"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_services_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->PatientId) ?>', 1);"><div id="elh_view_lab_services_PatientId" class="view_lab_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_services_list->PatientName->headerCellClass() ?>"><div id="elh_view_lab_services_PatientName" class="view_lab_services_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_services_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->PatientName) ?>', 1);"><div id="elh_view_lab_services_PatientName" class="view_lab_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_services_list->Gender->headerCellClass() ?>"><div id="elh_view_lab_services_Gender" class="view_lab_services_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_services_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->Gender) ?>', 1);"><div id="elh_view_lab_services_Gender" class="view_lab_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_services_list->Mobile->headerCellClass() ?>"><div id="elh_view_lab_services_Mobile" class="view_lab_services_Mobile"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_services_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->Mobile) ?>', 1);"><div id="elh_view_lab_services_Mobile" class="view_lab_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_services_list->Doctor->headerCellClass() ?>"><div id="elh_view_lab_services_Doctor" class="view_lab_services_Doctor"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_services_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->Doctor) ?>', 1);"><div id="elh_view_lab_services_Doctor" class="view_lab_services_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_services_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_lab_services_ModeofPayment" class="view_lab_services_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_services_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->ModeofPayment) ?>', 1);"><div id="elh_view_lab_services_ModeofPayment" class="view_lab_services_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->Amount->Visible) { // Amount ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_lab_services_list->Amount->headerCellClass() ?>"><div id="elh_view_lab_services_Amount" class="view_lab_services_Amount"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_lab_services_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->Amount) ?>', 1);"><div id="elh_view_lab_services_Amount" class="view_lab_services_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_services_list->HospID->headerCellClass() ?>"><div id="elh_view_lab_services_HospID" class="view_lab_services_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_services_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->HospID) ?>', 1);"><div id="elh_view_lab_services_HospID" class="view_lab_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_services_list->RIDNO->headerCellClass() ?>"><div id="elh_view_lab_services_RIDNO" class="view_lab_services_RIDNO"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_services_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->RIDNO) ?>', 1);"><div id="elh_view_lab_services_RIDNO" class="view_lab_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_services_list->PartnerName->headerCellClass() ?>"><div id="elh_view_lab_services_PartnerName" class="view_lab_services_PartnerName"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_services_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->PartnerName) ?>', 1);"><div id="elh_view_lab_services_PartnerName" class="view_lab_services_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->PatId->Visible) { // PatId ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_lab_services_list->PatId->headerCellClass() ?>"><div id="elh_view_lab_services_PatId" class="view_lab_services_PatId"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_lab_services_list->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->PatId) ?>', 1);"><div id="elh_view_lab_services_PatId" class="view_lab_services_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->PatId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->PatId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_services_list->DrDepartment->headerCellClass() ?>"><div id="elh_view_lab_services_DrDepartment" class="view_lab_services_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_services_list->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->DrDepartment) ?>', 1);"><div id="elh_view_lab_services_DrDepartment" class="view_lab_services_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_services_list->RefferedBy->headerCellClass() ?>"><div id="elh_view_lab_services_RefferedBy" class="view_lab_services_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_services_list->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->RefferedBy) ?>', 1);"><div id="elh_view_lab_services_RefferedBy" class="view_lab_services_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->RefferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->RefferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_services_list->BillNumber->headerCellClass() ?>"><div id="elh_view_lab_services_BillNumber" class="view_lab_services_BillNumber"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_services_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->BillNumber) ?>', 1);"><div id="elh_view_lab_services_BillNumber" class="view_lab_services_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_list->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_lab_services_list->SortUrl($view_lab_services_list->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_services_list->LabTestReleased->headerCellClass() ?>"><div id="elh_view_lab_services_LabTestReleased" class="view_lab_services_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_lab_services_list->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_services_list->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_services_list->SortUrl($view_lab_services_list->LabTestReleased) ?>', 1);"><div id="elh_view_lab_services_LabTestReleased" class="view_lab_services_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_list->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_list->LabTestReleased->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_services_list->LabTestReleased->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_services_list->ExportAll && $view_lab_services_list->isExport()) {
	$view_lab_services_list->StopRecord = $view_lab_services_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_lab_services_list->TotalRecords > $view_lab_services_list->StartRecord + $view_lab_services_list->DisplayRecords - 1)
		$view_lab_services_list->StopRecord = $view_lab_services_list->StartRecord + $view_lab_services_list->DisplayRecords - 1;
	else
		$view_lab_services_list->StopRecord = $view_lab_services_list->TotalRecords;
}
$view_lab_services_list->RecordCount = $view_lab_services_list->StartRecord - 1;
if ($view_lab_services_list->Recordset && !$view_lab_services_list->Recordset->EOF) {
	$view_lab_services_list->Recordset->moveFirst();
	$selectLimit = $view_lab_services_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_services_list->StartRecord > 1)
		$view_lab_services_list->Recordset->move($view_lab_services_list->StartRecord - 1);
} elseif (!$view_lab_services->AllowAddDeleteRow && $view_lab_services_list->StopRecord == 0) {
	$view_lab_services_list->StopRecord = $view_lab_services->GridAddRowCount;
}

// Initialize aggregate
$view_lab_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_services->resetAttributes();
$view_lab_services_list->renderRow();
while ($view_lab_services_list->RecordCount < $view_lab_services_list->StopRecord) {
	$view_lab_services_list->RecordCount++;
	if ($view_lab_services_list->RecordCount >= $view_lab_services_list->StartRecord) {
		$view_lab_services_list->RowCount++;

		// Set up key count
		$view_lab_services_list->KeyCount = $view_lab_services_list->RowIndex;

		// Init row class and style
		$view_lab_services->resetAttributes();
		$view_lab_services->CssClass = "";
		if ($view_lab_services_list->isGridAdd()) {
		} else {
			$view_lab_services_list->loadRowValues($view_lab_services_list->Recordset); // Load row values
		}
		$view_lab_services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_services->RowAttrs->merge(["data-rowindex" => $view_lab_services_list->RowCount, "id" => "r" . $view_lab_services_list->RowCount . "_view_lab_services", "data-rowtype" => $view_lab_services->RowType]);

		// Render row
		$view_lab_services_list->renderRow();

		// Render list options
		$view_lab_services_list->renderListOptions();
?>
	<tr <?php echo $view_lab_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_services_list->ListOptions->render("body", "left", $view_lab_services_list->RowCount);
?>
	<?php if ($view_lab_services_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_lab_services_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_id">
<span<?php echo $view_lab_services_list->id->viewAttributes() ?>><?php echo $view_lab_services_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->SID->Visible) { // SID ?>
		<td data-name="SID" <?php echo $view_lab_services_list->SID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_SID">
<span<?php echo $view_lab_services_list->SID->viewAttributes() ?>><?php echo $view_lab_services_list->SID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_lab_services_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_PatientId">
<span<?php echo $view_lab_services_list->PatientId->viewAttributes() ?>><?php echo $view_lab_services_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_lab_services_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_PatientName">
<span<?php echo $view_lab_services_list->PatientName->viewAttributes() ?>><?php echo $view_lab_services_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_lab_services_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_Gender">
<span<?php echo $view_lab_services_list->Gender->viewAttributes() ?>><?php echo $view_lab_services_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_lab_services_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_Mobile">
<span<?php echo $view_lab_services_list->Mobile->viewAttributes() ?>><?php echo $view_lab_services_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_lab_services_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_Doctor">
<span<?php echo $view_lab_services_list->Doctor->viewAttributes() ?>><?php echo $view_lab_services_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_lab_services_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_ModeofPayment">
<span<?php echo $view_lab_services_list->ModeofPayment->viewAttributes() ?>><?php echo $view_lab_services_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_lab_services_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_Amount">
<span<?php echo $view_lab_services_list->Amount->viewAttributes() ?>><?php echo $view_lab_services_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_services_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_HospID">
<span<?php echo $view_lab_services_list->HospID->viewAttributes() ?>><?php echo $view_lab_services_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_lab_services_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_RIDNO">
<span<?php echo $view_lab_services_list->RIDNO->viewAttributes() ?>><?php echo $view_lab_services_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_lab_services_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_PartnerName">
<span<?php echo $view_lab_services_list->PartnerName->viewAttributes() ?>><?php echo $view_lab_services_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->PatId->Visible) { // PatId ?>
		<td data-name="PatId" <?php echo $view_lab_services_list->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_PatId">
<span<?php echo $view_lab_services_list->PatId->viewAttributes() ?>><?php echo $view_lab_services_list->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $view_lab_services_list->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_DrDepartment">
<span<?php echo $view_lab_services_list->DrDepartment->viewAttributes() ?>><?php echo $view_lab_services_list->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy" <?php echo $view_lab_services_list->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_RefferedBy">
<span<?php echo $view_lab_services_list->RefferedBy->viewAttributes() ?>><?php echo $view_lab_services_list->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_lab_services_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_BillNumber">
<span<?php echo $view_lab_services_list->BillNumber->viewAttributes() ?>><?php echo $view_lab_services_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_list->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased" <?php echo $view_lab_services_list->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCount ?>_view_lab_services_LabTestReleased">
<span<?php echo $view_lab_services_list->LabTestReleased->viewAttributes() ?>><?php echo $view_lab_services_list->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_services_list->ListOptions->render("body", "right", $view_lab_services_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_lab_services_list->isGridAdd())
		$view_lab_services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_lab_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_services_list->Recordset)
	$view_lab_services_list->Recordset->Close();
?>
<?php if (!$view_lab_services_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_services_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_services_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_services_list->TotalRecords == 0 && !$view_lab_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_services_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_services_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_lab_services->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_services",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_lab_services_list->terminate();
?>