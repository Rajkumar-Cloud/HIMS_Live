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
$view_ip_billing_list = new view_ip_billing_list();

// Run the page
$view_ip_billing_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_billing_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_billing_list->isExport()) { ?>
<script>
var fview_ip_billinglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ip_billinglist = currentForm = new ew.Form("fview_ip_billinglist", "list");
	fview_ip_billinglist.formKeyCountName = '<?php echo $view_ip_billing_list->FormKeyCountName ?>';
	loadjs.done("fview_ip_billinglist");
});
var fview_ip_billinglistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ip_billinglistsrch = currentSearchForm = new ew.Form("fview_ip_billinglistsrch");

	// Validate function for search
	fview_ip_billinglistsrch.validate = function(fobj) {
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
	fview_ip_billinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_billinglistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_ip_billinglistsrch.filterList = <?php echo $view_ip_billing_list->getFilterList() ?>;
	loadjs.done("fview_ip_billinglistsrch");
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
<?php if (!$view_ip_billing_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_billing_list->TotalRecords > 0 && $view_ip_billing_list->ExportOptions->visible()) { ?>
<?php $view_ip_billing_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_billing_list->ImportOptions->visible()) { ?>
<?php $view_ip_billing_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_billing_list->SearchOptions->visible()) { ?>
<?php $view_ip_billing_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_billing_list->FilterOptions->visible()) { ?>
<?php $view_ip_billing_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_billing_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_billing_list->isExport() && !$view_ip_billing->CurrentAction) { ?>
<form name="fview_ip_billinglistsrch" id="fview_ip_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ip_billinglistsrch-search-panel" class="<?php echo $view_ip_billing_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_billing">
	<div class="ew-extended-search">
<?php

// Render search row
$view_ip_billing->RowType = ROWTYPE_SEARCH;
$view_ip_billing->resetAttributes();
$view_ip_billing_list->renderRow();
?>
<?php if ($view_ip_billing_list->PatientID->Visible) { // PatientID ?>
	<?php
		$view_ip_billing_list->SearchColumnCount++;
		if (($view_ip_billing_list->SearchColumnCount - 1) % $view_ip_billing_list->SearchFieldsPerRow == 0) {
			$view_ip_billing_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_billing_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ip_billing_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_view_ip_billing_PatientID" class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_list->PatientID->EditValue ?>"<?php echo $view_ip_billing_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_billing_list->SearchColumnCount % $view_ip_billing_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->patient_name->Visible) { // patient_name ?>
	<?php
		$view_ip_billing_list->SearchColumnCount++;
		if (($view_ip_billing_list->SearchColumnCount - 1) % $view_ip_billing_list->SearchFieldsPerRow == 0) {
			$view_ip_billing_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_billing_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_ip_billing_list->patient_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
		<span id="el_view_ip_billing_patient_name" class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_list->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_list->patient_name->EditValue ?>"<?php echo $view_ip_billing_list->patient_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_billing_list->SearchColumnCount % $view_ip_billing_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->mrnNo->Visible) { // mrnNo ?>
	<?php
		$view_ip_billing_list->SearchColumnCount++;
		if (($view_ip_billing_list->SearchColumnCount - 1) % $view_ip_billing_list->SearchFieldsPerRow == 0) {
			$view_ip_billing_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_billing_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $view_ip_billing_list->mrnNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
		<span id="el_view_ip_billing_mrnNo" class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_list->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_list->mrnNo->EditValue ?>"<?php echo $view_ip_billing_list->mrnNo->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_billing_list->SearchColumnCount % $view_ip_billing_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->mobileno->Visible) { // mobileno ?>
	<?php
		$view_ip_billing_list->SearchColumnCount++;
		if (($view_ip_billing_list->SearchColumnCount - 1) % $view_ip_billing_list->SearchFieldsPerRow == 0) {
			$view_ip_billing_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ip_billing_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mobileno" class="ew-cell form-group">
		<label for="x_mobileno" class="ew-search-caption ew-label"><?php echo $view_ip_billing_list->mobileno->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE">
</span>
		<span id="el_view_ip_billing_mobileno" class="ew-search-field">
<input type="text" data-table="view_ip_billing" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing_list->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing_list->mobileno->EditValue ?>"<?php echo $view_ip_billing_list->mobileno->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ip_billing_list->SearchColumnCount % $view_ip_billing_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_ip_billing_list->SearchColumnCount % $view_ip_billing_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_ip_billing_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ip_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_billing_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_billing_list->showPageHeader(); ?>
<?php
$view_ip_billing_list->showMessage();
?>
<?php if ($view_ip_billing_list->TotalRecords > 0 || $view_ip_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_billing">
<?php if (!$view_ip_billing_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_billing_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_billing_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_billinglist" id="fview_ip_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<div id="gmp_view_ip_billing" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_billing_list->TotalRecords > 0 || $view_ip_billing_list->isGridEdit()) { ?>
<table id="tbl_view_ip_billinglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_billing->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_billing_list->renderListOptions();

// Render list options (header, left)
$view_ip_billing_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_billing_list->id->Visible) { // id ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_billing_list->id->headerCellClass() ?>"><div id="elh_view_ip_billing_id" class="view_ip_billing_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_billing_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->id) ?>', 1);"><div id="elh_view_ip_billing_id" class="view_ip_billing_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_billing_list->PatientID->headerCellClass() ?>"><div id="elh_view_ip_billing_PatientID" class="view_ip_billing_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_billing_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->PatientID) ?>', 1);"><div id="elh_view_ip_billing_PatientID" class="view_ip_billing_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_billing_list->patient_name->headerCellClass() ?>"><div id="elh_view_ip_billing_patient_name" class="view_ip_billing_patient_name"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_billing_list->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->patient_name) ?>', 1);"><div id="elh_view_ip_billing_patient_name" class="view_ip_billing_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->patient_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->patient_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_billing_list->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_billing_mrnNo" class="view_ip_billing_mrnNo"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_billing_list->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->mrnNo) ?>', 1);"><div id="elh_view_ip_billing_mrnNo" class="view_ip_billing_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->mrnNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->mrnNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_billing_list->mobileno->headerCellClass() ?>"><div id="elh_view_ip_billing_mobileno" class="view_ip_billing_mobileno"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_billing_list->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->mobileno) ?>', 1);"><div id="elh_view_ip_billing_mobileno" class="view_ip_billing_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->mobileno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->mobileno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->gender->Visible) { // gender ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_billing_list->gender->headerCellClass() ?>"><div id="elh_view_ip_billing_gender" class="view_ip_billing_gender"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_billing_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->gender) ?>', 1);"><div id="elh_view_ip_billing_gender" class="view_ip_billing_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_billing_list->physician_id->headerCellClass() ?>"><div id="elh_view_ip_billing_physician_id" class="view_ip_billing_physician_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_billing_list->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->physician_id) ?>', 1);"><div id="elh_view_ip_billing_physician_id" class="view_ip_billing_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->physician_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->physician_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_billing_list->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_billing_typeRegsisteration" class="view_ip_billing_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_billing_list->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->typeRegsisteration) ?>', 1);"><div id="elh_view_ip_billing_typeRegsisteration" class="view_ip_billing_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->typeRegsisteration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->typeRegsisteration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_billing_list->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_billing_PaymentCategory" class="view_ip_billing_PaymentCategory"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_billing_list->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->PaymentCategory) ?>', 1);"><div id="elh_view_ip_billing_PaymentCategory" class="view_ip_billing_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->PaymentCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->PaymentCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_billing_list->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_billing_admission_consultant_id" class="view_ip_billing_admission_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->admission_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_billing_list->admission_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->admission_consultant_id) ?>', 1);"><div id="elh_view_ip_billing_admission_consultant_id" class="view_ip_billing_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->admission_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->admission_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_billing_list->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_billing_leading_consultant_id" class="view_ip_billing_leading_consultant_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->leading_consultant_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_billing_list->leading_consultant_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->leading_consultant_id) ?>', 1);"><div id="elh_view_ip_billing_leading_consultant_id" class="view_ip_billing_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->leading_consultant_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->leading_consultant_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_billing_list->admission_date->headerCellClass() ?>"><div id="elh_view_ip_billing_admission_date" class="view_ip_billing_admission_date"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_billing_list->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->admission_date) ?>', 1);"><div id="elh_view_ip_billing_admission_date" class="view_ip_billing_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->admission_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->admission_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_billing_list->release_date->headerCellClass() ?>"><div id="elh_view_ip_billing_release_date" class="view_ip_billing_release_date"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_billing_list->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->release_date) ?>', 1);"><div id="elh_view_ip_billing_release_date" class="view_ip_billing_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->release_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->release_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_billing_list->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_billing_PaymentStatus" class="view_ip_billing_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_billing_list->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->PaymentStatus) ?>', 1);"><div id="elh_view_ip_billing_PaymentStatus" class="view_ip_billing_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->status->Visible) { // status ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_billing_list->status->headerCellClass() ?>"><div id="elh_view_ip_billing_status" class="view_ip_billing_status"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_billing_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->status) ?>', 1);"><div id="elh_view_ip_billing_status" class="view_ip_billing_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_billing_list->createdby->headerCellClass() ?>"><div id="elh_view_ip_billing_createdby" class="view_ip_billing_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_billing_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->createdby) ?>', 1);"><div id="elh_view_ip_billing_createdby" class="view_ip_billing_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_billing_list->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_billing_createddatetime" class="view_ip_billing_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_billing_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->createddatetime) ?>', 1);"><div id="elh_view_ip_billing_createddatetime" class="view_ip_billing_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_billing_list->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_billing_modifiedby" class="view_ip_billing_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_billing_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->modifiedby) ?>', 1);"><div id="elh_view_ip_billing_modifiedby" class="view_ip_billing_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_billing_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_billing_modifieddatetime" class="view_ip_billing_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_billing_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->modifieddatetime) ?>', 1);"><div id="elh_view_ip_billing_modifieddatetime" class="view_ip_billing_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_billing_list->HospID->headerCellClass() ?>"><div id="elh_view_ip_billing_HospID" class="view_ip_billing_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_billing_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->HospID) ?>', 1);"><div id="elh_view_ip_billing_HospID" class="view_ip_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_billing_list->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferedByDr" class="view_ip_billing_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_billing_list->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ReferedByDr) ?>', 1);"><div id="elh_view_ip_billing_ReferedByDr" class="view_ip_billing_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_billing_list->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferClinicname" class="view_ip_billing_ReferClinicname"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_billing_list->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ReferClinicname) ?>', 1);"><div id="elh_view_ip_billing_ReferClinicname" class="view_ip_billing_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_billing_list->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferCity" class="view_ip_billing_ReferCity"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_billing_list->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ReferCity) ?>', 1);"><div id="elh_view_ip_billing_ReferCity" class="view_ip_billing_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_billing_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferMobileNo" class="view_ip_billing_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_billing_list->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ReferMobileNo) ?>', 1);"><div id="elh_view_ip_billing_ReferMobileNo" class="view_ip_billing_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_billing_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billing_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_billing_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billing_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_billing_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_billing_PurposreReferredfor" class="view_ip_billing_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_billing_list->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->PurposreReferredfor) ?>', 1);"><div id="elh_view_ip_billing_PurposreReferredfor" class="view_ip_billing_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_billing_list->patient_id->headerCellClass() ?>"><div id="elh_view_ip_billing_patient_id" class="view_ip_billing_patient_id"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_billing_list->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->patient_id) ?>', 1);"><div id="elh_view_ip_billing_patient_id" class="view_ip_billing_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_billing_list->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_billing_BillClosing" class="view_ip_billing_BillClosing"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_billing_list->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->BillClosing) ?>', 1);"><div id="elh_view_ip_billing_BillClosing" class="view_ip_billing_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillClosing->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->BillClosing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->BillClosing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_billing_list->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_billing_BillClosingDate" class="view_ip_billing_BillClosingDate"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_billing_list->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->BillClosingDate) ?>', 1);"><div id="elh_view_ip_billing_BillClosingDate" class="view_ip_billing_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->BillClosingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->BillClosingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_billing_list->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_billing_BillNumber" class="view_ip_billing_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_billing_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->BillNumber) ?>', 1);"><div id="elh_view_ip_billing_BillNumber" class="view_ip_billing_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_billing_list->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_billing_ClosingAmount" class="view_ip_billing_ClosingAmount"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ClosingAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_billing_list->ClosingAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ClosingAmount) ?>', 1);"><div id="elh_view_ip_billing_ClosingAmount" class="view_ip_billing_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ClosingAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ClosingAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_billing_list->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_billing_ClosingType" class="view_ip_billing_ClosingType"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ClosingType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_billing_list->ClosingType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ClosingType) ?>', 1);"><div id="elh_view_ip_billing_ClosingType" class="view_ip_billing_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ClosingType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ClosingType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_billing_list->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_billing_BillAmount" class="view_ip_billing_BillAmount"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_billing_list->BillAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->BillAmount) ?>', 1);"><div id="elh_view_ip_billing_BillAmount" class="view_ip_billing_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->BillAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->BillAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_billing_list->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_billing_billclosedBy" class="view_ip_billing_billclosedBy"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->billclosedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_billing_list->billclosedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->billclosedBy) ?>', 1);"><div id="elh_view_ip_billing_billclosedBy" class="view_ip_billing_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->billclosedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->billclosedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_billing_list->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_billing_bllcloseByDate" class="view_ip_billing_bllcloseByDate"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->bllcloseByDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_billing_list->bllcloseByDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->bllcloseByDate) ?>', 1);"><div id="elh_view_ip_billing_bllcloseByDate" class="view_ip_billing_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->bllcloseByDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->bllcloseByDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_billing_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_billing_list->SortUrl($view_ip_billing_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_billing_list->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_billing_ReportHeader" class="view_ip_billing_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_billing_list->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ip_billing_list->SortUrl($view_ip_billing_list->ReportHeader) ?>', 1);"><div id="elh_view_ip_billing_ReportHeader" class="view_ip_billing_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_billing_list->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_billing_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_billing_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_billing_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_billing_list->ExportAll && $view_ip_billing_list->isExport()) {
	$view_ip_billing_list->StopRecord = $view_ip_billing_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ip_billing_list->TotalRecords > $view_ip_billing_list->StartRecord + $view_ip_billing_list->DisplayRecords - 1)
		$view_ip_billing_list->StopRecord = $view_ip_billing_list->StartRecord + $view_ip_billing_list->DisplayRecords - 1;
	else
		$view_ip_billing_list->StopRecord = $view_ip_billing_list->TotalRecords;
}
$view_ip_billing_list->RecordCount = $view_ip_billing_list->StartRecord - 1;
if ($view_ip_billing_list->Recordset && !$view_ip_billing_list->Recordset->EOF) {
	$view_ip_billing_list->Recordset->moveFirst();
	$selectLimit = $view_ip_billing_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_billing_list->StartRecord > 1)
		$view_ip_billing_list->Recordset->move($view_ip_billing_list->StartRecord - 1);
} elseif (!$view_ip_billing->AllowAddDeleteRow && $view_ip_billing_list->StopRecord == 0) {
	$view_ip_billing_list->StopRecord = $view_ip_billing->GridAddRowCount;
}

// Initialize aggregate
$view_ip_billing->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_billing->resetAttributes();
$view_ip_billing_list->renderRow();
while ($view_ip_billing_list->RecordCount < $view_ip_billing_list->StopRecord) {
	$view_ip_billing_list->RecordCount++;
	if ($view_ip_billing_list->RecordCount >= $view_ip_billing_list->StartRecord) {
		$view_ip_billing_list->RowCount++;

		// Set up key count
		$view_ip_billing_list->KeyCount = $view_ip_billing_list->RowIndex;

		// Init row class and style
		$view_ip_billing->resetAttributes();
		$view_ip_billing->CssClass = "";
		if ($view_ip_billing_list->isGridAdd()) {
		} else {
			$view_ip_billing_list->loadRowValues($view_ip_billing_list->Recordset); // Load row values
		}
		$view_ip_billing->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_billing->RowAttrs->merge(["data-rowindex" => $view_ip_billing_list->RowCount, "id" => "r" . $view_ip_billing_list->RowCount . "_view_ip_billing", "data-rowtype" => $view_ip_billing->RowType]);

		// Render row
		$view_ip_billing_list->renderRow();

		// Render list options
		$view_ip_billing_list->renderListOptions();
?>
	<tr <?php echo $view_ip_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_billing_list->ListOptions->render("body", "left", $view_ip_billing_list->RowCount);
?>
	<?php if ($view_ip_billing_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ip_billing_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_id">
<span<?php echo $view_ip_billing_list->id->viewAttributes() ?>><?php echo $view_ip_billing_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ip_billing_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_PatientID">
<span<?php echo $view_ip_billing_list->PatientID->viewAttributes() ?>><?php echo $view_ip_billing_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name" <?php echo $view_ip_billing_list->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_patient_name">
<span<?php echo $view_ip_billing_list->patient_name->viewAttributes() ?>><?php echo $view_ip_billing_list->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo" <?php echo $view_ip_billing_list->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_mrnNo">
<span<?php echo $view_ip_billing_list->mrnNo->viewAttributes() ?>><?php echo $view_ip_billing_list->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno" <?php echo $view_ip_billing_list->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_mobileno">
<span<?php echo $view_ip_billing_list->mobileno->viewAttributes() ?>><?php echo $view_ip_billing_list->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_ip_billing_list->gender->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_gender">
<span<?php echo $view_ip_billing_list->gender->viewAttributes() ?>><?php echo $view_ip_billing_list->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id" <?php echo $view_ip_billing_list->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_physician_id">
<span<?php echo $view_ip_billing_list->physician_id->viewAttributes() ?>><?php echo $view_ip_billing_list->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration" <?php echo $view_ip_billing_list->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_typeRegsisteration">
<span<?php echo $view_ip_billing_list->typeRegsisteration->viewAttributes() ?>><?php echo $view_ip_billing_list->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory" <?php echo $view_ip_billing_list->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_PaymentCategory">
<span<?php echo $view_ip_billing_list->PaymentCategory->viewAttributes() ?>><?php echo $view_ip_billing_list->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id" <?php echo $view_ip_billing_list->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_admission_consultant_id">
<span<?php echo $view_ip_billing_list->admission_consultant_id->viewAttributes() ?>><?php echo $view_ip_billing_list->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id" <?php echo $view_ip_billing_list->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_leading_consultant_id">
<span<?php echo $view_ip_billing_list->leading_consultant_id->viewAttributes() ?>><?php echo $view_ip_billing_list->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date" <?php echo $view_ip_billing_list->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_admission_date">
<span<?php echo $view_ip_billing_list->admission_date->viewAttributes() ?>><?php echo $view_ip_billing_list->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->release_date->Visible) { // release_date ?>
		<td data-name="release_date" <?php echo $view_ip_billing_list->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_release_date">
<span<?php echo $view_ip_billing_list->release_date->viewAttributes() ?>><?php echo $view_ip_billing_list->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $view_ip_billing_list->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_PaymentStatus">
<span<?php echo $view_ip_billing_list->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_billing_list->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_ip_billing_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_status">
<span<?php echo $view_ip_billing_list->status->viewAttributes() ?>><?php echo $view_ip_billing_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ip_billing_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_createdby">
<span<?php echo $view_ip_billing_list->createdby->viewAttributes() ?>><?php echo $view_ip_billing_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ip_billing_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_createddatetime">
<span<?php echo $view_ip_billing_list->createddatetime->viewAttributes() ?>><?php echo $view_ip_billing_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ip_billing_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_modifiedby">
<span<?php echo $view_ip_billing_list->modifiedby->viewAttributes() ?>><?php echo $view_ip_billing_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ip_billing_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_modifieddatetime">
<span<?php echo $view_ip_billing_list->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_billing_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ip_billing_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_HospID">
<span<?php echo $view_ip_billing_list->HospID->viewAttributes() ?>><?php echo $view_ip_billing_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $view_ip_billing_list->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ReferedByDr">
<span<?php echo $view_ip_billing_list->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_billing_list->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $view_ip_billing_list->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ReferClinicname">
<span<?php echo $view_ip_billing_list->ReferClinicname->viewAttributes() ?>><?php echo $view_ip_billing_list->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $view_ip_billing_list->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ReferCity">
<span<?php echo $view_ip_billing_list->ReferCity->viewAttributes() ?>><?php echo $view_ip_billing_list->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $view_ip_billing_list->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ReferMobileNo">
<span<?php echo $view_ip_billing_list->ReferMobileNo->viewAttributes() ?>><?php echo $view_ip_billing_list->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_ip_billing_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ReferA4TreatingConsultant">
<span<?php echo $view_ip_billing_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_ip_billing_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $view_ip_billing_list->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_PurposreReferredfor">
<span<?php echo $view_ip_billing_list->PurposreReferredfor->viewAttributes() ?>><?php echo $view_ip_billing_list->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $view_ip_billing_list->patient_id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_patient_id">
<span<?php echo $view_ip_billing_list->patient_id->viewAttributes() ?>><?php echo $view_ip_billing_list->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing" <?php echo $view_ip_billing_list->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_BillClosing">
<span<?php echo $view_ip_billing_list->BillClosing->viewAttributes() ?>><?php echo $view_ip_billing_list->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate" <?php echo $view_ip_billing_list->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_BillClosingDate">
<span<?php echo $view_ip_billing_list->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_billing_list->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_ip_billing_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_BillNumber">
<span<?php echo $view_ip_billing_list->BillNumber->viewAttributes() ?>><?php echo $view_ip_billing_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount" <?php echo $view_ip_billing_list->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ClosingAmount">
<span<?php echo $view_ip_billing_list->ClosingAmount->viewAttributes() ?>><?php echo $view_ip_billing_list->ClosingAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType" <?php echo $view_ip_billing_list->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ClosingType">
<span<?php echo $view_ip_billing_list->ClosingType->viewAttributes() ?>><?php echo $view_ip_billing_list->ClosingType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount" <?php echo $view_ip_billing_list->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_BillAmount">
<span<?php echo $view_ip_billing_list->BillAmount->viewAttributes() ?>><?php echo $view_ip_billing_list->BillAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy" <?php echo $view_ip_billing_list->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_billclosedBy">
<span<?php echo $view_ip_billing_list->billclosedBy->viewAttributes() ?>><?php echo $view_ip_billing_list->billclosedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate" <?php echo $view_ip_billing_list->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_bllcloseByDate">
<span<?php echo $view_ip_billing_list->bllcloseByDate->viewAttributes() ?>><?php echo $view_ip_billing_list->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_billing_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $view_ip_billing_list->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_ip_billing_list->RowCount ?>_view_ip_billing_ReportHeader">
<span<?php echo $view_ip_billing_list->ReportHeader->viewAttributes() ?>><?php echo $view_ip_billing_list->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_billing_list->ListOptions->render("body", "right", $view_ip_billing_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_ip_billing_list->isGridAdd())
		$view_ip_billing_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ip_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_billing_list->Recordset)
	$view_ip_billing_list->Recordset->Close();
?>
<?php if (!$view_ip_billing_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_billing_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ip_billing_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_billing_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_billing_list->TotalRecords == 0 && !$view_ip_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_billing_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_billing_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ip_billing->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ip_billing",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ip_billing_list->terminate();
?>