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
$view_ivf_treatment_plan_list = new view_ivf_treatment_plan_list();

// Run the page
$view_ivf_treatment_plan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ivf_treatment_plan_list->isExport()) { ?>
<script>
var fview_ivf_treatment_planlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ivf_treatment_planlist = currentForm = new ew.Form("fview_ivf_treatment_planlist", "list");
	fview_ivf_treatment_planlist.formKeyCountName = '<?php echo $view_ivf_treatment_plan_list->FormKeyCountName ?>';
	loadjs.done("fview_ivf_treatment_planlist");
});
var fview_ivf_treatment_planlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ivf_treatment_planlistsrch = currentSearchForm = new ew.Form("fview_ivf_treatment_planlistsrch");

	// Validate function for search
	fview_ivf_treatment_planlistsrch.validate = function(fobj) {
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
	fview_ivf_treatment_planlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ivf_treatment_planlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_ivf_treatment_planlistsrch.filterList = <?php echo $view_ivf_treatment_plan_list->getFilterList() ?>;
	loadjs.done("fview_ivf_treatment_planlistsrch");
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
<?php if (!$view_ivf_treatment_plan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ivf_treatment_plan_list->TotalRecords > 0 && $view_ivf_treatment_plan_list->ExportOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->ImportOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->SearchOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->FilterOptions->visible()) { ?>
<?php $view_ivf_treatment_plan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ivf_treatment_plan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ivf_treatment_plan_list->isExport() && !$view_ivf_treatment_plan->CurrentAction) { ?>
<form name="fview_ivf_treatment_planlistsrch" id="fview_ivf_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ivf_treatment_planlistsrch-search-panel" class="<?php echo $view_ivf_treatment_plan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_treatment_plan">
	<div class="ew-extended-search">
<?php

// Render search row
$view_ivf_treatment_plan->RowType = ROWTYPE_SEARCH;
$view_ivf_treatment_plan->resetAttributes();
$view_ivf_treatment_plan_list->renderRow();
?>
<?php if ($view_ivf_treatment_plan_list->CoupleID->Visible) { // CoupleID ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->CoupleID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_CoupleID" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->CoupleID->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->CoupleID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PatientID->Visible) { // PatientID ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_PatientID" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->PatientID->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_PatientName" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->PatientName->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->WifeCell->Visible) { // WifeCell ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_WifeCell" class="ew-cell form-group">
		<label for="x_WifeCell" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->WifeCell->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_WifeCell" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->WifeCell->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->WifeCell->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PartnerID->Visible) { // PartnerID ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->PartnerID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_PartnerID" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->PartnerID->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->PartnerID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PartnerName->Visible) { // PartnerName ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->PartnerName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_PartnerName" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->PartnerName->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->PartnerName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php
		$view_ivf_treatment_plan_list->SearchColumnCount++;
		if (($view_ivf_treatment_plan_list->SearchColumnCount - 1) % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) {
			$view_ivf_treatment_plan_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_HusbandCell" class="ew-cell form-group">
		<label for="x_HusbandCell" class="ew-search-caption ew-label"><?php echo $view_ivf_treatment_plan_list->HusbandCell->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE">
</span>
		<span id="el_view_ivf_treatment_plan_HusbandCell" class="ew-search-field">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_list->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_list->HusbandCell->EditValue ?>"<?php echo $view_ivf_treatment_plan_list->HusbandCell->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->SearchColumnCount % $view_ivf_treatment_plan_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_ivf_treatment_plan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ivf_treatment_plan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ivf_treatment_plan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ivf_treatment_plan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_treatment_plan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ivf_treatment_plan_list->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_list->showMessage();
?>
<?php if ($view_ivf_treatment_plan_list->TotalRecords > 0 || $view_ivf_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ivf_treatment_plan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_treatment_plan">
<?php if (!$view_ivf_treatment_plan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ivf_treatment_plan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ivf_treatment_plan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ivf_treatment_planlist" id="fview_ivf_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<div id="gmp_view_ivf_treatment_plan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ivf_treatment_plan_list->TotalRecords > 0 || $view_ivf_treatment_plan_list->isGridEdit()) { ?>
<table id="tbl_view_ivf_treatment_planlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ivf_treatment_plan->RowType = ROWTYPE_HEADER;

// Render list options
$view_ivf_treatment_plan_list->renderListOptions();

// Render list options (header, left)
$view_ivf_treatment_plan_list->ListOptions->render("header", "left");
?>
<?php if ($view_ivf_treatment_plan_list->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment_plan_list->CoupleID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_ivf_treatment_plan_list->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->CoupleID) ?>', 1);"><div id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->CoupleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->CoupleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ivf_treatment_plan_list->PatientID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ivf_treatment_plan_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PatientID) ?>', 1);"><div id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ivf_treatment_plan_list->PatientName->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ivf_treatment_plan_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PatientName) ?>', 1);"><div id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_ivf_treatment_plan_list->WifeCell->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_ivf_treatment_plan_list->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->WifeCell) ?>', 1);"><div id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->WifeCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->WifeCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ivf_treatment_plan_list->PartnerID->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ivf_treatment_plan_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PartnerID) ?>', 1);"><div id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ivf_treatment_plan_list->PartnerName->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ivf_treatment_plan_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->PartnerName) ?>', 1);"><div id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ivf_treatment_plan_list->HusbandCell->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ivf_treatment_plan_list->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->HusbandCell) ?>', 1);"><div id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->HusbandCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->HusbandCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment_plan_list->RIDNO->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ivf_treatment_plan_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->RIDNO) ?>', 1);"><div id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->TreatmentStartDate) ?>', 1);"><div id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->TreatmentStartDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->TreatmentStartDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->treatment_status->Visible) { // treatment_status ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment_plan_list->treatment_status->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $view_ivf_treatment_plan_list->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->treatment_status) ?>', 1);"><div id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment_plan_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ivf_treatment_plan_list->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->ARTCYCLE) ?>', 1);"><div id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->RESULT->Visible) { // RESULT ?>
	<?php if ($view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment_plan_list->RESULT->headerCellClass() ?>"><div id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT"><div class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_ivf_treatment_plan_list->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ivf_treatment_plan_list->SortUrl($view_ivf_treatment_plan_list->RESULT) ?>', 1);"><div id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_treatment_plan_list->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_treatment_plan_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ivf_treatment_plan_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ivf_treatment_plan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ivf_treatment_plan_list->ExportAll && $view_ivf_treatment_plan_list->isExport()) {
	$view_ivf_treatment_plan_list->StopRecord = $view_ivf_treatment_plan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ivf_treatment_plan_list->TotalRecords > $view_ivf_treatment_plan_list->StartRecord + $view_ivf_treatment_plan_list->DisplayRecords - 1)
		$view_ivf_treatment_plan_list->StopRecord = $view_ivf_treatment_plan_list->StartRecord + $view_ivf_treatment_plan_list->DisplayRecords - 1;
	else
		$view_ivf_treatment_plan_list->StopRecord = $view_ivf_treatment_plan_list->TotalRecords;
}
$view_ivf_treatment_plan_list->RecordCount = $view_ivf_treatment_plan_list->StartRecord - 1;
if ($view_ivf_treatment_plan_list->Recordset && !$view_ivf_treatment_plan_list->Recordset->EOF) {
	$view_ivf_treatment_plan_list->Recordset->moveFirst();
	$selectLimit = $view_ivf_treatment_plan_list->UseSelectLimit;
	if (!$selectLimit && $view_ivf_treatment_plan_list->StartRecord > 1)
		$view_ivf_treatment_plan_list->Recordset->move($view_ivf_treatment_plan_list->StartRecord - 1);
} elseif (!$view_ivf_treatment_plan->AllowAddDeleteRow && $view_ivf_treatment_plan_list->StopRecord == 0) {
	$view_ivf_treatment_plan_list->StopRecord = $view_ivf_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$view_ivf_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$view_ivf_treatment_plan->resetAttributes();
$view_ivf_treatment_plan_list->renderRow();
while ($view_ivf_treatment_plan_list->RecordCount < $view_ivf_treatment_plan_list->StopRecord) {
	$view_ivf_treatment_plan_list->RecordCount++;
	if ($view_ivf_treatment_plan_list->RecordCount >= $view_ivf_treatment_plan_list->StartRecord) {
		$view_ivf_treatment_plan_list->RowCount++;

		// Set up key count
		$view_ivf_treatment_plan_list->KeyCount = $view_ivf_treatment_plan_list->RowIndex;

		// Init row class and style
		$view_ivf_treatment_plan->resetAttributes();
		$view_ivf_treatment_plan->CssClass = "";
		if ($view_ivf_treatment_plan_list->isGridAdd()) {
		} else {
			$view_ivf_treatment_plan_list->loadRowValues($view_ivf_treatment_plan_list->Recordset); // Load row values
		}
		$view_ivf_treatment_plan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ivf_treatment_plan->RowAttrs->merge(["data-rowindex" => $view_ivf_treatment_plan_list->RowCount, "id" => "r" . $view_ivf_treatment_plan_list->RowCount . "_view_ivf_treatment_plan", "data-rowtype" => $view_ivf_treatment_plan->RowType]);

		// Render row
		$view_ivf_treatment_plan_list->renderRow();

		// Render list options
		$view_ivf_treatment_plan_list->renderListOptions();
?>
	<tr <?php echo $view_ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ivf_treatment_plan_list->ListOptions->render("body", "left", $view_ivf_treatment_plan_list->RowCount);
?>
	<?php if ($view_ivf_treatment_plan_list->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID" <?php echo $view_ivf_treatment_plan_list->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_CoupleID">
<span<?php echo $view_ivf_treatment_plan_list->CoupleID->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ivf_treatment_plan_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_PatientID">
<span<?php echo $view_ivf_treatment_plan_list->PatientID->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_ivf_treatment_plan_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_PatientName">
<span<?php echo $view_ivf_treatment_plan_list->PatientName->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell" <?php echo $view_ivf_treatment_plan_list->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_WifeCell">
<span<?php echo $view_ivf_treatment_plan_list->WifeCell->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $view_ivf_treatment_plan_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_PartnerID">
<span<?php echo $view_ivf_treatment_plan_list->PartnerID->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_ivf_treatment_plan_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_PartnerName">
<span<?php echo $view_ivf_treatment_plan_list->PartnerName->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell" <?php echo $view_ivf_treatment_plan_list->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_HusbandCell">
<span<?php echo $view_ivf_treatment_plan_list->HusbandCell->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_ivf_treatment_plan_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_RIDNO">
<span<?php echo $view_ivf_treatment_plan_list->RIDNO->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate" <?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $view_ivf_treatment_plan_list->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_treatment_status">
<span<?php echo $view_ivf_treatment_plan_list->treatment_status->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $view_ivf_treatment_plan_list->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $view_ivf_treatment_plan_list->ARTCYCLE->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ivf_treatment_plan_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $view_ivf_treatment_plan_list->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_ivf_treatment_plan_list->RowCount ?>_view_ivf_treatment_plan_RESULT">
<span<?php echo $view_ivf_treatment_plan_list->RESULT->viewAttributes() ?>><?php echo $view_ivf_treatment_plan_list->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ivf_treatment_plan_list->ListOptions->render("body", "right", $view_ivf_treatment_plan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_ivf_treatment_plan_list->isGridAdd())
		$view_ivf_treatment_plan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ivf_treatment_plan_list->Recordset)
	$view_ivf_treatment_plan_list->Recordset->Close();
?>
<?php if (!$view_ivf_treatment_plan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ivf_treatment_plan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ivf_treatment_plan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_plan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ivf_treatment_plan_list->TotalRecords == 0 && !$view_ivf_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ivf_treatment_plan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_treatment_plan_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ivf_treatment_plan",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ivf_treatment_plan_list->terminate();
?>