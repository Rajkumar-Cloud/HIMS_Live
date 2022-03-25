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
$view_barcode_ivf_list = new view_barcode_ivf_list();

// Run the page
$view_barcode_ivf_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_barcode_ivf_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_barcode_ivf_list->isExport()) { ?>
<script>
var fview_barcode_ivflist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_barcode_ivflist = currentForm = new ew.Form("fview_barcode_ivflist", "list");
	fview_barcode_ivflist.formKeyCountName = '<?php echo $view_barcode_ivf_list->FormKeyCountName ?>';
	loadjs.done("fview_barcode_ivflist");
});
var fview_barcode_ivflistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_barcode_ivflistsrch = currentSearchForm = new ew.Form("fview_barcode_ivflistsrch");

	// Validate function for search
	fview_barcode_ivflistsrch.validate = function(fobj) {
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
	fview_barcode_ivflistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_barcode_ivflistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_barcode_ivflistsrch.filterList = <?php echo $view_barcode_ivf_list->getFilterList() ?>;
	loadjs.done("fview_barcode_ivflistsrch");
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
<?php if (!$view_barcode_ivf_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_barcode_ivf_list->TotalRecords > 0 && $view_barcode_ivf_list->ExportOptions->visible()) { ?>
<?php $view_barcode_ivf_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->ImportOptions->visible()) { ?>
<?php $view_barcode_ivf_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->SearchOptions->visible()) { ?>
<?php $view_barcode_ivf_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->FilterOptions->visible()) { ?>
<?php $view_barcode_ivf_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_barcode_ivf_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_barcode_ivf_list->isExport() && !$view_barcode_ivf->CurrentAction) { ?>
<form name="fview_barcode_ivflistsrch" id="fview_barcode_ivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_barcode_ivflistsrch-search-panel" class="<?php echo $view_barcode_ivf_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_barcode_ivf">
	<div class="ew-extended-search">
<?php

// Render search row
$view_barcode_ivf->RowType = ROWTYPE_SEARCH;
$view_barcode_ivf->resetAttributes();
$view_barcode_ivf_list->renderRow();
?>
<?php if ($view_barcode_ivf_list->CoupleID->Visible) { // CoupleID ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->CoupleID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_CoupleID" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->CoupleID->EditValue ?>"<?php echo $view_barcode_ivf_list->CoupleID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_PatientName" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->PatientName->EditValue ?>"<?php echo $view_barcode_ivf_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PatientID->Visible) { // PatientID ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_PatientID" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->PatientID->EditValue ?>"<?php echo $view_barcode_ivf_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PartnerName->Visible) { // PartnerName ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->PartnerName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_PartnerName" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->PartnerName->EditValue ?>"<?php echo $view_barcode_ivf_list->PartnerName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PartnerID->Visible) { // PartnerID ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->PartnerID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_PartnerID" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->PartnerID->EditValue ?>"<?php echo $view_barcode_ivf_list->PartnerID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->WifeCell->Visible) { // WifeCell ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_WifeCell" class="ew-cell form-group">
		<label for="x_WifeCell" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->WifeCell->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_WifeCell" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->WifeCell->EditValue ?>"<?php echo $view_barcode_ivf_list->WifeCell->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php
		$view_barcode_ivf_list->SearchColumnCount++;
		if (($view_barcode_ivf_list->SearchColumnCount - 1) % $view_barcode_ivf_list->SearchFieldsPerRow == 0) {
			$view_barcode_ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_HusbandCell" class="ew-cell form-group">
		<label for="x_HusbandCell" class="ew-search-caption ew-label"><?php echo $view_barcode_ivf_list->HusbandCell->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE">
</span>
		<span id="el_view_barcode_ivf_HusbandCell" class="ew-search-field">
<input type="text" data-table="view_barcode_ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_barcode_ivf_list->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_barcode_ivf_list->HusbandCell->EditValue ?>"<?php echo $view_barcode_ivf_list->HusbandCell->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_barcode_ivf_list->SearchColumnCount % $view_barcode_ivf_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_barcode_ivf_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_barcode_ivf_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_barcode_ivf_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_barcode_ivf_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_barcode_ivf_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_barcode_ivf_list->showPageHeader(); ?>
<?php
$view_barcode_ivf_list->showMessage();
?>
<?php if ($view_barcode_ivf_list->TotalRecords > 0 || $view_barcode_ivf->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_barcode_ivf_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_barcode_ivf">
<?php if (!$view_barcode_ivf_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_barcode_ivf_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_barcode_ivf_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_barcode_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_barcode_ivflist" id="fview_barcode_ivflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_barcode_ivf">
<div id="gmp_view_barcode_ivf" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_barcode_ivf_list->TotalRecords > 0 || $view_barcode_ivf_list->isGridEdit()) { ?>
<table id="tbl_view_barcode_ivflist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_barcode_ivf->RowType = ROWTYPE_HEADER;

// Render list options
$view_barcode_ivf_list->renderListOptions();

// Render list options (header, left)
$view_barcode_ivf_list->ListOptions->render("header", "left");
?>
<?php if ($view_barcode_ivf_list->id->Visible) { // id ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_barcode_ivf_list->id->headerCellClass() ?>"><div id="elh_view_barcode_ivf_id" class="view_barcode_ivf_id"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_barcode_ivf_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->id) ?>', 1);"><div id="elh_view_barcode_ivf_id" class="view_barcode_ivf_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->_Barcode->Visible) { // Barcode ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->_Barcode) == "") { ?>
		<th data-name="_Barcode" class="<?php echo $view_barcode_ivf_list->_Barcode->headerCellClass() ?>"><div id="elh_view_barcode_ivf__Barcode" class="view_barcode_ivf__Barcode"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->_Barcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Barcode" class="<?php echo $view_barcode_ivf_list->_Barcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->_Barcode) ?>', 1);"><div id="elh_view_barcode_ivf__Barcode" class="view_barcode_ivf__Barcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->_Barcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->_Barcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->_Barcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_barcode_ivf_list->CoupleID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_CoupleID" class="view_barcode_ivf_CoupleID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_barcode_ivf_list->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->CoupleID) ?>', 1);"><div id="elh_view_barcode_ivf_CoupleID" class="view_barcode_ivf_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->CoupleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->CoupleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_barcode_ivf_list->PatientName->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PatientName" class="view_barcode_ivf_PatientName"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_barcode_ivf_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PatientName) ?>', 1);"><div id="elh_view_barcode_ivf_PatientName" class="view_barcode_ivf_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_barcode_ivf_list->PatientID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PatientID" class="view_barcode_ivf_PatientID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_barcode_ivf_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PatientID) ?>', 1);"><div id="elh_view_barcode_ivf_PatientID" class="view_barcode_ivf_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_barcode_ivf_list->PartnerName->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PartnerName" class="view_barcode_ivf_PartnerName"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_barcode_ivf_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PartnerName) ?>', 1);"><div id="elh_view_barcode_ivf_PartnerName" class="view_barcode_ivf_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_barcode_ivf_list->PartnerID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_PartnerID" class="view_barcode_ivf_PartnerID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_barcode_ivf_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->PartnerID) ?>', 1);"><div id="elh_view_barcode_ivf_PartnerID" class="view_barcode_ivf_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_barcode_ivf_list->WifeCell->headerCellClass() ?>"><div id="elh_view_barcode_ivf_WifeCell" class="view_barcode_ivf_WifeCell"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_barcode_ivf_list->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->WifeCell) ?>', 1);"><div id="elh_view_barcode_ivf_WifeCell" class="view_barcode_ivf_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->WifeCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->WifeCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_barcode_ivf_list->HusbandCell->headerCellClass() ?>"><div id="elh_view_barcode_ivf_HusbandCell" class="view_barcode_ivf_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_barcode_ivf_list->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->HusbandCell) ?>', 1);"><div id="elh_view_barcode_ivf_HusbandCell" class="view_barcode_ivf_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->HusbandCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->HusbandCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $view_barcode_ivf_list->WifeEmail->headerCellClass() ?>"><div id="elh_view_barcode_ivf_WifeEmail" class="view_barcode_ivf_WifeEmail"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->WifeEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $view_barcode_ivf_list->WifeEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->WifeEmail) ?>', 1);"><div id="elh_view_barcode_ivf_WifeEmail" class="view_barcode_ivf_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->WifeEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->WifeEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_barcode_ivf_list->HusbandEmail->headerCellClass() ?>"><div id="elh_view_barcode_ivf_HusbandEmail" class="view_barcode_ivf_HusbandEmail"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->HusbandEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_barcode_ivf_list->HusbandEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->HusbandEmail) ?>', 1);"><div id="elh_view_barcode_ivf_HusbandEmail" class="view_barcode_ivf_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->HusbandEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->HusbandEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_barcode_ivf_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivf_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_barcode_ivf_list->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->ARTCYCLE) ?>', 1);"><div id="elh_view_barcode_ivf_ARTCYCLE" class="view_barcode_ivf_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->RESULT->Visible) { // RESULT ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_barcode_ivf_list->RESULT->headerCellClass() ?>"><div id="elh_view_barcode_ivf_RESULT" class="view_barcode_ivf_RESULT"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_barcode_ivf_list->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->RESULT) ?>', 1);"><div id="elh_view_barcode_ivf_RESULT" class="view_barcode_ivf_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_barcode_ivf_list->HospID->Visible) { // HospID ?>
	<?php if ($view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_barcode_ivf_list->HospID->headerCellClass() ?>"><div id="elh_view_barcode_ivf_HospID" class="view_barcode_ivf_HospID"><div class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_barcode_ivf_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_barcode_ivf_list->SortUrl($view_barcode_ivf_list->HospID) ?>', 1);"><div id="elh_view_barcode_ivf_HospID" class="view_barcode_ivf_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_barcode_ivf_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_barcode_ivf_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_barcode_ivf_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_barcode_ivf_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_barcode_ivf_list->ExportAll && $view_barcode_ivf_list->isExport()) {
	$view_barcode_ivf_list->StopRecord = $view_barcode_ivf_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_barcode_ivf_list->TotalRecords > $view_barcode_ivf_list->StartRecord + $view_barcode_ivf_list->DisplayRecords - 1)
		$view_barcode_ivf_list->StopRecord = $view_barcode_ivf_list->StartRecord + $view_barcode_ivf_list->DisplayRecords - 1;
	else
		$view_barcode_ivf_list->StopRecord = $view_barcode_ivf_list->TotalRecords;
}
$view_barcode_ivf_list->RecordCount = $view_barcode_ivf_list->StartRecord - 1;
if ($view_barcode_ivf_list->Recordset && !$view_barcode_ivf_list->Recordset->EOF) {
	$view_barcode_ivf_list->Recordset->moveFirst();
	$selectLimit = $view_barcode_ivf_list->UseSelectLimit;
	if (!$selectLimit && $view_barcode_ivf_list->StartRecord > 1)
		$view_barcode_ivf_list->Recordset->move($view_barcode_ivf_list->StartRecord - 1);
} elseif (!$view_barcode_ivf->AllowAddDeleteRow && $view_barcode_ivf_list->StopRecord == 0) {
	$view_barcode_ivf_list->StopRecord = $view_barcode_ivf->GridAddRowCount;
}

// Initialize aggregate
$view_barcode_ivf->RowType = ROWTYPE_AGGREGATEINIT;
$view_barcode_ivf->resetAttributes();
$view_barcode_ivf_list->renderRow();
while ($view_barcode_ivf_list->RecordCount < $view_barcode_ivf_list->StopRecord) {
	$view_barcode_ivf_list->RecordCount++;
	if ($view_barcode_ivf_list->RecordCount >= $view_barcode_ivf_list->StartRecord) {
		$view_barcode_ivf_list->RowCount++;

		// Set up key count
		$view_barcode_ivf_list->KeyCount = $view_barcode_ivf_list->RowIndex;

		// Init row class and style
		$view_barcode_ivf->resetAttributes();
		$view_barcode_ivf->CssClass = "";
		if ($view_barcode_ivf_list->isGridAdd()) {
		} else {
			$view_barcode_ivf_list->loadRowValues($view_barcode_ivf_list->Recordset); // Load row values
		}
		$view_barcode_ivf->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_barcode_ivf->RowAttrs->merge(["data-rowindex" => $view_barcode_ivf_list->RowCount, "id" => "r" . $view_barcode_ivf_list->RowCount . "_view_barcode_ivf", "data-rowtype" => $view_barcode_ivf->RowType]);

		// Render row
		$view_barcode_ivf_list->renderRow();

		// Render list options
		$view_barcode_ivf_list->renderListOptions();
?>
	<tr <?php echo $view_barcode_ivf->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_barcode_ivf_list->ListOptions->render("body", "left", $view_barcode_ivf_list->RowCount);
?>
	<?php if ($view_barcode_ivf_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_barcode_ivf_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_id">
<span<?php echo $view_barcode_ivf_list->id->viewAttributes() ?>><?php echo $view_barcode_ivf_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->_Barcode->Visible) { // Barcode ?>
		<td data-name="_Barcode" <?php echo $view_barcode_ivf_list->_Barcode->cellAttributes() ?>>
<script id="orig<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf__Barcode" class="view_ivf_treatment_planedit" type="text/html">
<?php echo $view_barcode_ivf_list->_Barcode->getViewValue() ?>
</script>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf__Barcode">
<span<?php echo $view_barcode_ivf_list->_Barcode->viewAttributes() ?>><?php echo Barcode()->show($view_barcode_ivf_list->_Barcode->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID" <?php echo $view_barcode_ivf_list->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_CoupleID">
<span<?php echo $view_barcode_ivf_list->CoupleID->viewAttributes() ?>><?php echo $view_barcode_ivf_list->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_barcode_ivf_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_PatientName">
<span<?php echo $view_barcode_ivf_list->PatientName->viewAttributes() ?>><?php echo $view_barcode_ivf_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_barcode_ivf_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_PatientID">
<span<?php echo $view_barcode_ivf_list->PatientID->viewAttributes() ?>><?php echo $view_barcode_ivf_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_barcode_ivf_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_PartnerName">
<span<?php echo $view_barcode_ivf_list->PartnerName->viewAttributes() ?>><?php echo $view_barcode_ivf_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $view_barcode_ivf_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_PartnerID">
<span<?php echo $view_barcode_ivf_list->PartnerID->viewAttributes() ?>><?php echo $view_barcode_ivf_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell" <?php echo $view_barcode_ivf_list->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_WifeCell">
<span<?php echo $view_barcode_ivf_list->WifeCell->viewAttributes() ?>><?php echo $view_barcode_ivf_list->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell" <?php echo $view_barcode_ivf_list->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_HusbandCell">
<span<?php echo $view_barcode_ivf_list->HusbandCell->viewAttributes() ?>><?php echo $view_barcode_ivf_list->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail" <?php echo $view_barcode_ivf_list->WifeEmail->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_WifeEmail">
<span<?php echo $view_barcode_ivf_list->WifeEmail->viewAttributes() ?>><?php echo $view_barcode_ivf_list->WifeEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail" <?php echo $view_barcode_ivf_list->HusbandEmail->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_HusbandEmail">
<span<?php echo $view_barcode_ivf_list->HusbandEmail->viewAttributes() ?>><?php echo $view_barcode_ivf_list->HusbandEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $view_barcode_ivf_list->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_ARTCYCLE">
<span<?php echo $view_barcode_ivf_list->ARTCYCLE->viewAttributes() ?>><?php echo $view_barcode_ivf_list->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $view_barcode_ivf_list->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_RESULT">
<span<?php echo $view_barcode_ivf_list->RESULT->viewAttributes() ?>><?php echo $view_barcode_ivf_list->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_barcode_ivf_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_barcode_ivf_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_barcode_ivf_list->RowCount ?>_view_barcode_ivf_HospID">
<span<?php echo $view_barcode_ivf_list->HospID->viewAttributes() ?>><?php echo $view_barcode_ivf_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_barcode_ivf_list->ListOptions->render("body", "right", $view_barcode_ivf_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_barcode_ivf_list->isGridAdd())
		$view_barcode_ivf_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_barcode_ivf->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_barcode_ivf_list->Recordset)
	$view_barcode_ivf_list->Recordset->Close();
?>
<?php if (!$view_barcode_ivf_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_barcode_ivf_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_barcode_ivf_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_barcode_ivf_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_barcode_ivf_list->TotalRecords == 0 && !$view_barcode_ivf->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_barcode_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_barcode_ivf_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_barcode_ivf_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_barcode_ivf->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_barcode_ivf",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_barcode_ivf_list->terminate();
?>