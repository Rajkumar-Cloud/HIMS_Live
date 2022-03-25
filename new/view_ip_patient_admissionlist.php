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
$view_ip_patient_admission_list = new view_ip_patient_admission_list();

// Run the page
$view_ip_patient_admission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_patient_admission_list->isExport()) { ?>
<script>
var fview_ip_patient_admissionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ip_patient_admissionlist = currentForm = new ew.Form("fview_ip_patient_admissionlist", "list");
	fview_ip_patient_admissionlist.formKeyCountName = '<?php echo $view_ip_patient_admission_list->FormKeyCountName ?>';
	loadjs.done("fview_ip_patient_admissionlist");
});
var fview_ip_patient_admissionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ip_patient_admissionlistsrch = currentSearchForm = new ew.Form("fview_ip_patient_admissionlistsrch");

	// Validate function for search
	fview_ip_patient_admissionlistsrch.validate = function(fobj) {
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
	fview_ip_patient_admissionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_patient_admissionlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_ip_patient_admissionlistsrch.filterList = <?php echo $view_ip_patient_admission_list->getFilterList() ?>;
	loadjs.done("fview_ip_patient_admissionlistsrch");
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
<?php if (!$view_ip_patient_admission_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_patient_admission_list->TotalRecords > 0 && $view_ip_patient_admission_list->ExportOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->ImportOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->SearchOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->FilterOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_patient_admission_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_patient_admission_list->isExport() && !$view_ip_patient_admission->CurrentAction) { ?>
<form name="fview_ip_patient_admissionlistsrch" id="fview_ip_patient_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ip_patient_admissionlistsrch-search-panel" class="<?php echo $view_ip_patient_admission_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_patient_admission">
	<div class="ew-extended-search">
<?php

// Render search row
$view_ip_patient_admission->RowType = ROWTYPE_SEARCH;
$view_ip_patient_admission->resetAttributes();
$view_ip_patient_admission_list->renderRow();
?>
<?php if ($view_ip_patient_admission_list->mrnNo->Visible) { // mrnNo ?>
	<?php
		$view_ip_patient_admission_list->SearchColumnCount++;
		if (($view_ip_patient_admission_list->SearchColumnCount - 1) % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) {
			$view_ip_patient_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_patient_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission_list->mrnNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
		<span id="el_view_ip_patient_admission_mrnNo" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_list->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_list->mrnNo->EditValue ?>"<?php echo $view_ip_patient_admission_list->mrnNo->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_patient_admission_list->SearchColumnCount % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PatientID->Visible) { // PatientID ?>
	<?php
		$view_ip_patient_admission_list->SearchColumnCount++;
		if (($view_ip_patient_admission_list->SearchColumnCount - 1) % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) {
			$view_ip_patient_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_patient_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_view_ip_patient_admission_PatientID" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_list->PatientID->EditValue ?>"<?php echo $view_ip_patient_admission_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_patient_admission_list->SearchColumnCount % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->patient_name->Visible) { // patient_name ?>
	<?php
		$view_ip_patient_admission_list->SearchColumnCount++;
		if (($view_ip_patient_admission_list->SearchColumnCount - 1) % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) {
			$view_ip_patient_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_patient_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission_list->patient_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
		<span id="el_view_ip_patient_admission_patient_name" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_list->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_list->patient_name->EditValue ?>"<?php echo $view_ip_patient_admission_list->patient_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_patient_admission_list->SearchColumnCount % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->mobileno->Visible) { // mobileno ?>
	<?php
		$view_ip_patient_admission_list->SearchColumnCount++;
		if (($view_ip_patient_admission_list->SearchColumnCount - 1) % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) {
			$view_ip_patient_admission_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_patient_admission_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mobileno" class="ew-cell form-group">
		<label for="x_mobileno" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission_list->mobileno->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE">
</span>
		<span id="el_view_ip_patient_admission_mobileno" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_list->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_list->mobileno->EditValue ?>"<?php echo $view_ip_patient_admission_list->mobileno->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_patient_admission_list->SearchColumnCount % $view_ip_patient_admission_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_ip_patient_admission_list->SearchColumnCount % $view_ip_patient_admission_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_ip_patient_admission_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_patient_admission_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ip_patient_admission_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_patient_admission_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_patient_admission_list->showPageHeader(); ?>
<?php
$view_ip_patient_admission_list->showMessage();
?>
<?php if ($view_ip_patient_admission_list->TotalRecords > 0 || $view_ip_patient_admission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_patient_admission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_patient_admission">
<?php if (!$view_ip_patient_admission_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_patient_admission_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_patient_admission_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_patient_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_patient_admissionlist" id="fview_ip_patient_admissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<div id="gmp_view_ip_patient_admission" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_patient_admission_list->TotalRecords > 0 || $view_ip_patient_admission_list->isGridEdit()) { ?>
<table id="tbl_view_ip_patient_admissionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_patient_admission->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_patient_admission_list->renderListOptions();

// Render list options (header, left)
$view_ip_patient_admission_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_patient_admission_list->id->Visible) { // id ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_patient_admission_list->id->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_patient_admission_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->id) ?>', 1);"><div id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_patient_admission_list->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_patient_admission_list->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->mrnNo) ?>', 1);"><div id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_patient_admission_list->PatientID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_patient_admission_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PatientID) ?>', 1);"><div id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_patient_admission_list->patient_name->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_patient_admission_list->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->patient_name) ?>', 1);"><div id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_patient_admission_list->mobileno->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_patient_admission_list->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->mobileno) ?>', 1);"><div id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->mobileno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->mobileno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_patient_admission_list->admission_date->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_patient_admission_list->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->admission_date) ?>', 1);"><div id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->admission_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->admission_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_patient_admission_list->release_date->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_patient_admission_list->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->release_date) ?>', 1);"><div id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->release_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->release_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_patient_admission_list->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_patient_admission_list->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PaymentStatus) ?>', 1);"><div id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_patient_admission_list->HospID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_patient_admission_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->HospID) ?>', 1);"><div id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_patient_admission_list->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_patient_admission_list->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->ReferedByDr) ?>', 1);"><div id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->ReferedByDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_patient_admission_list->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_patient_admission_list->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->BillClosing) ?>', 1);"><div id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->BillClosing->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->BillClosing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->BillClosing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_patient_admission_list->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_patient_admission_list->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->BillClosingDate) ?>', 1);"><div id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->BillClosingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->BillClosingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_patient_admission_list->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_patient_admission_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->BillNumber) ?>', 1);"><div id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_patient_admission_list->Procedure->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_patient_admission_list->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Procedure) ?>', 1);"><div id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Procedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->Procedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->Procedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_patient_admission_list->Consultant->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_patient_admission_list->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Consultant) ?>', 1);"><div id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_patient_admission_list->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_patient_admission_list->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Anesthetist) ?>', 1);"><div id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Anesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->Anesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->Anesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_patient_admission_list->Amound->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Amound->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_patient_admission_list->Amound->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Amound) ?>', 1);"><div id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->Amound->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->Amound->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ip_patient_admission_list->PartnerID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ip_patient_admission_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartnerID) ?>', 1);"><div id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_patient_admission_list->PartnerName->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_patient_admission_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartnerName) ?>', 1);"><div id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_ip_patient_admission_list->PartnerMobile->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_ip_patient_admission_list->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartnerMobile) ?>', 1);"><div id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->PartnerMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->PartnerMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Cid->Visible) { // Cid ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Cid) == "") { ?>
		<th data-name="Cid" class="<?php echo $view_ip_patient_admission_list->Cid->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Cid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cid" class="<?php echo $view_ip_patient_admission_list->Cid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->Cid) ?>', 1);"><div id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->Cid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->Cid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->Cid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->PartId->Visible) { // PartId ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartId) == "") { ?>
		<th data-name="PartId" class="<?php echo $view_ip_patient_admission_list->PartId->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartId" class="<?php echo $view_ip_patient_admission_list->PartId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->PartId) ?>', 1);"><div id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->PartId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->PartId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->PartId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->IDProof->Visible) { // IDProof ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->IDProof) == "") { ?>
		<th data-name="IDProof" class="<?php echo $view_ip_patient_admission_list->IDProof->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->IDProof->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IDProof" class="<?php echo $view_ip_patient_admission_list->IDProof->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->IDProof) ?>', 1);"><div id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->IDProof->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->IDProof->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->IDProof->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_patient_admission_list->SortUrl($view_ip_patient_admission_list->AdviceToOtherHospital) ?>', 1);"><div id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission_list->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_patient_admission_list->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_patient_admission_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_patient_admission_list->ExportAll && $view_ip_patient_admission_list->isExport()) {
	$view_ip_patient_admission_list->StopRecord = $view_ip_patient_admission_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ip_patient_admission_list->TotalRecords > $view_ip_patient_admission_list->StartRecord + $view_ip_patient_admission_list->DisplayRecords - 1)
		$view_ip_patient_admission_list->StopRecord = $view_ip_patient_admission_list->StartRecord + $view_ip_patient_admission_list->DisplayRecords - 1;
	else
		$view_ip_patient_admission_list->StopRecord = $view_ip_patient_admission_list->TotalRecords;
}
$view_ip_patient_admission_list->RecordCount = $view_ip_patient_admission_list->StartRecord - 1;
if ($view_ip_patient_admission_list->Recordset && !$view_ip_patient_admission_list->Recordset->EOF) {
	$view_ip_patient_admission_list->Recordset->moveFirst();
	$selectLimit = $view_ip_patient_admission_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_patient_admission_list->StartRecord > 1)
		$view_ip_patient_admission_list->Recordset->move($view_ip_patient_admission_list->StartRecord - 1);
} elseif (!$view_ip_patient_admission->AllowAddDeleteRow && $view_ip_patient_admission_list->StopRecord == 0) {
	$view_ip_patient_admission_list->StopRecord = $view_ip_patient_admission->GridAddRowCount;
}

// Initialize aggregate
$view_ip_patient_admission->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_patient_admission->resetAttributes();
$view_ip_patient_admission_list->renderRow();
while ($view_ip_patient_admission_list->RecordCount < $view_ip_patient_admission_list->StopRecord) {
	$view_ip_patient_admission_list->RecordCount++;
	if ($view_ip_patient_admission_list->RecordCount >= $view_ip_patient_admission_list->StartRecord) {
		$view_ip_patient_admission_list->RowCount++;

		// Set up key count
		$view_ip_patient_admission_list->KeyCount = $view_ip_patient_admission_list->RowIndex;

		// Init row class and style
		$view_ip_patient_admission->resetAttributes();
		$view_ip_patient_admission->CssClass = "";
		if ($view_ip_patient_admission_list->isGridAdd()) {
		} else {
			$view_ip_patient_admission_list->loadRowValues($view_ip_patient_admission_list->Recordset); // Load row values
		}
		$view_ip_patient_admission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_patient_admission->RowAttrs->merge(["data-rowindex" => $view_ip_patient_admission_list->RowCount, "id" => "r" . $view_ip_patient_admission_list->RowCount . "_view_ip_patient_admission", "data-rowtype" => $view_ip_patient_admission->RowType]);

		// Render row
		$view_ip_patient_admission_list->renderRow();

		// Render list options
		$view_ip_patient_admission_list->renderListOptions();
?>
	<tr <?php echo $view_ip_patient_admission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_patient_admission_list->ListOptions->render("body", "left", $view_ip_patient_admission_list->RowCount);
?>
	<?php if ($view_ip_patient_admission_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ip_patient_admission_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission_list->id->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $view_ip_patient_admission_list->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_mrnNo">
<span<?php echo $view_ip_patient_admission_list->mrnNo->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ip_patient_admission_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_PatientID">
<span<?php echo $view_ip_patient_admission_list->PatientID->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $view_ip_patient_admission_list->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_patient_name">
<span<?php echo $view_ip_patient_admission_list->patient_name->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno" <?php echo $view_ip_patient_admission_list->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_mobileno">
<span<?php echo $view_ip_patient_admission_list->mobileno->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date" <?php echo $view_ip_patient_admission_list->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_admission_date">
<span<?php echo $view_ip_patient_admission_list->admission_date->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->release_date->Visible) { // release_date ?>
		<td data-name="release_date" <?php echo $view_ip_patient_admission_list->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_release_date">
<span<?php echo $view_ip_patient_admission_list->release_date->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $view_ip_patient_admission_list->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_PaymentStatus">
<span<?php echo $view_ip_patient_admission_list->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ip_patient_admission_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_HospID">
<span<?php echo $view_ip_patient_admission_list->HospID->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $view_ip_patient_admission_list->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_ReferedByDr">
<span<?php echo $view_ip_patient_admission_list->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing" <?php echo $view_ip_patient_admission_list->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_BillClosing">
<span<?php echo $view_ip_patient_admission_list->BillClosing->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate" <?php echo $view_ip_patient_admission_list->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_BillClosingDate">
<span<?php echo $view_ip_patient_admission_list->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_ip_patient_admission_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_BillNumber">
<span<?php echo $view_ip_patient_admission_list->BillNumber->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure" <?php echo $view_ip_patient_admission_list->Procedure->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_Procedure">
<span<?php echo $view_ip_patient_admission_list->Procedure->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $view_ip_patient_admission_list->Consultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_Consultant">
<span<?php echo $view_ip_patient_admission_list->Consultant->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist" <?php echo $view_ip_patient_admission_list->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_Anesthetist">
<span<?php echo $view_ip_patient_admission_list->Anesthetist->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Amound->Visible) { // Amound ?>
		<td data-name="Amound" <?php echo $view_ip_patient_admission_list->Amound->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_Amound">
<span<?php echo $view_ip_patient_admission_list->Amound->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->Amound->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $view_ip_patient_admission_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_PartnerID">
<span<?php echo $view_ip_patient_admission_list->PartnerID->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_ip_patient_admission_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_PartnerName">
<span<?php echo $view_ip_patient_admission_list->PartnerName->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile" <?php echo $view_ip_patient_admission_list->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_PartnerMobile">
<span<?php echo $view_ip_patient_admission_list->PartnerMobile->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Cid->Visible) { // Cid ?>
		<td data-name="Cid" <?php echo $view_ip_patient_admission_list->Cid->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_Cid">
<span<?php echo $view_ip_patient_admission_list->Cid->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->Cid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->PartId->Visible) { // PartId ?>
		<td data-name="PartId" <?php echo $view_ip_patient_admission_list->PartId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_PartId">
<span<?php echo $view_ip_patient_admission_list->PartId->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->PartId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->IDProof->Visible) { // IDProof ?>
		<td data-name="IDProof" <?php echo $view_ip_patient_admission_list->IDProof->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_IDProof">
<span<?php echo $view_ip_patient_admission_list->IDProof->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->IDProof->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital" <?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCount ?>_view_ip_patient_admission_AdviceToOtherHospital">
<span<?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->viewAttributes() ?>><?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_patient_admission_list->ListOptions->render("body", "right", $view_ip_patient_admission_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_ip_patient_admission_list->isGridAdd())
		$view_ip_patient_admission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ip_patient_admission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_patient_admission_list->Recordset)
	$view_ip_patient_admission_list->Recordset->Close();
?>
<?php if (!$view_ip_patient_admission_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_patient_admission_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_patient_admission_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_patient_admission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_patient_admission_list->TotalRecords == 0 && !$view_ip_patient_admission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_patient_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_patient_admission_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_patient_admission_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ip_patient_admission",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ip_patient_admission_list->terminate();
?>