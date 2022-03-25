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
$view_lab_print_list = new view_lab_print_list();

// Run the page
$view_lab_print_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_print_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_print_list->isExport()) { ?>
<script>
var fview_lab_printlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_lab_printlist = currentForm = new ew.Form("fview_lab_printlist", "list");
	fview_lab_printlist.formKeyCountName = '<?php echo $view_lab_print_list->FormKeyCountName ?>';
	loadjs.done("fview_lab_printlist");
});
var fview_lab_printlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_lab_printlistsrch = currentSearchForm = new ew.Form("fview_lab_printlistsrch");

	// Validate function for search
	fview_lab_printlistsrch.validate = function(fobj) {
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
	fview_lab_printlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_printlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_lab_printlistsrch.filterList = <?php echo $view_lab_print_list->getFilterList() ?>;
	loadjs.done("fview_lab_printlistsrch");
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
<?php if (!$view_lab_print_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_print_list->TotalRecords > 0 && $view_lab_print_list->ExportOptions->visible()) { ?>
<?php $view_lab_print_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_print_list->ImportOptions->visible()) { ?>
<?php $view_lab_print_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_print_list->SearchOptions->visible()) { ?>
<?php $view_lab_print_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_print_list->FilterOptions->visible()) { ?>
<?php $view_lab_print_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_print_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_print_list->isExport() && !$view_lab_print->CurrentAction) { ?>
<form name="fview_lab_printlistsrch" id="fview_lab_printlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_lab_printlistsrch-search-panel" class="<?php echo $view_lab_print_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_print">
	<div class="ew-extended-search">
<?php

// Render search row
$view_lab_print->RowType = ROWTYPE_SEARCH;
$view_lab_print->resetAttributes();
$view_lab_print_list->renderRow();
?>
<?php if ($view_lab_print_list->PatientId->Visible) { // PatientId ?>
	<?php
		$view_lab_print_list->SearchColumnCount++;
		if (($view_lab_print_list->SearchColumnCount - 1) % $view_lab_print_list->SearchFieldsPerRow == 0) {
			$view_lab_print_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_print_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_lab_print_list->PatientId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		<span id="el_view_lab_print_PatientId" class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_print_list->PatientId->EditValue ?>"<?php echo $view_lab_print_list->PatientId->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_print_list->SearchColumnCount % $view_lab_print_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->PatientName->Visible) { // PatientName ?>
	<?php
		$view_lab_print_list->SearchColumnCount++;
		if (($view_lab_print_list->SearchColumnCount - 1) % $view_lab_print_list->SearchFieldsPerRow == 0) {
			$view_lab_print_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_print_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_lab_print_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_view_lab_print_PatientName" class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print_list->PatientName->EditValue ?>"<?php echo $view_lab_print_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_print_list->SearchColumnCount % $view_lab_print_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->Mobile->Visible) { // Mobile ?>
	<?php
		$view_lab_print_list->SearchColumnCount++;
		if (($view_lab_print_list->SearchColumnCount - 1) % $view_lab_print_list->SearchFieldsPerRow == 0) {
			$view_lab_print_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_print_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_lab_print_list->Mobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		<span id="el_view_lab_print_Mobile" class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_print_list->Mobile->EditValue ?>"<?php echo $view_lab_print_list->Mobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_print_list->SearchColumnCount % $view_lab_print_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->PartnerName->Visible) { // PartnerName ?>
	<?php
		$view_lab_print_list->SearchColumnCount++;
		if (($view_lab_print_list->SearchColumnCount - 1) % $view_lab_print_list->SearchFieldsPerRow == 0) {
			$view_lab_print_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_print_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_lab_print_list->PartnerName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		<span id="el_view_lab_print_PartnerName" class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print_list->PartnerName->EditValue ?>"<?php echo $view_lab_print_list->PartnerName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_print_list->SearchColumnCount % $view_lab_print_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->BillNumber->Visible) { // BillNumber ?>
	<?php
		$view_lab_print_list->SearchColumnCount++;
		if (($view_lab_print_list->SearchColumnCount - 1) % $view_lab_print_list->SearchFieldsPerRow == 0) {
			$view_lab_print_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_print_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $view_lab_print_list->BillNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
		<span id="el_view_lab_print_BillNumber" class="ew-search-field">
<input type="text" data-table="view_lab_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print_list->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_print_list->BillNumber->EditValue ?>"<?php echo $view_lab_print_list->BillNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_print_list->SearchColumnCount % $view_lab_print_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_lab_print_list->SearchColumnCount % $view_lab_print_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_lab_print_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_print_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_lab_print_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_print_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_print_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_print_list->showPageHeader(); ?>
<?php
$view_lab_print_list->showMessage();
?>
<?php if ($view_lab_print_list->TotalRecords > 0 || $view_lab_print->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_print_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_print">
<?php if (!$view_lab_print_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_print_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_print_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_printlist" id="fview_lab_printlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_print">
<div id="gmp_view_lab_print" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_print_list->TotalRecords > 0 || $view_lab_print_list->isGridEdit()) { ?>
<table id="tbl_view_lab_printlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_print->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_print_list->renderListOptions();

// Render list options (header, left)
$view_lab_print_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_print_list->id->Visible) { // id ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_print_list->id->headerCellClass() ?>"><div id="elh_view_lab_print_id" class="view_lab_print_id"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_print_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->id) ?>', 1);"><div id="elh_view_lab_print_id" class="view_lab_print_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->SID->Visible) { // SID ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->SID) == "") { ?>
		<th data-name="SID" class="<?php echo $view_lab_print_list->SID->headerCellClass() ?>"><div id="elh_view_lab_print_SID" class="view_lab_print_SID"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->SID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SID" class="<?php echo $view_lab_print_list->SID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->SID) ?>', 1);"><div id="elh_view_lab_print_SID" class="view_lab_print_SID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->SID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->SID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->SID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_print_list->PatientId->headerCellClass() ?>"><div id="elh_view_lab_print_PatientId" class="view_lab_print_PatientId"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_print_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->PatientId) ?>', 1);"><div id="elh_view_lab_print_PatientId" class="view_lab_print_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_print_list->PatientName->headerCellClass() ?>"><div id="elh_view_lab_print_PatientName" class="view_lab_print_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_print_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->PatientName) ?>', 1);"><div id="elh_view_lab_print_PatientName" class="view_lab_print_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_print_list->Gender->headerCellClass() ?>"><div id="elh_view_lab_print_Gender" class="view_lab_print_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_print_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->Gender) ?>', 1);"><div id="elh_view_lab_print_Gender" class="view_lab_print_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_print_list->Mobile->headerCellClass() ?>"><div id="elh_view_lab_print_Mobile" class="view_lab_print_Mobile"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_print_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->Mobile) ?>', 1);"><div id="elh_view_lab_print_Mobile" class="view_lab_print_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_print_list->Doctor->headerCellClass() ?>"><div id="elh_view_lab_print_Doctor" class="view_lab_print_Doctor"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_print_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->Doctor) ?>', 1);"><div id="elh_view_lab_print_Doctor" class="view_lab_print_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_print_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_lab_print_ModeofPayment" class="view_lab_print_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_print_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->ModeofPayment) ?>', 1);"><div id="elh_view_lab_print_ModeofPayment" class="view_lab_print_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->Amount->Visible) { // Amount ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_lab_print_list->Amount->headerCellClass() ?>"><div id="elh_view_lab_print_Amount" class="view_lab_print_Amount"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_lab_print_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->Amount) ?>', 1);"><div id="elh_view_lab_print_Amount" class="view_lab_print_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_print_list->HospID->headerCellClass() ?>"><div id="elh_view_lab_print_HospID" class="view_lab_print_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_print_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->HospID) ?>', 1);"><div id="elh_view_lab_print_HospID" class="view_lab_print_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_print_list->RIDNO->headerCellClass() ?>"><div id="elh_view_lab_print_RIDNO" class="view_lab_print_RIDNO"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_print_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->RIDNO) ?>', 1);"><div id="elh_view_lab_print_RIDNO" class="view_lab_print_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_print_list->PartnerName->headerCellClass() ?>"><div id="elh_view_lab_print_PartnerName" class="view_lab_print_PartnerName"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_print_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->PartnerName) ?>', 1);"><div id="elh_view_lab_print_PartnerName" class="view_lab_print_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->Remarks->Visible) { // Remarks ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_lab_print_list->Remarks->headerCellClass() ?>"><div id="elh_view_lab_print_Remarks" class="view_lab_print_Remarks"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_lab_print_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->Remarks) ?>', 1);"><div id="elh_view_lab_print_Remarks" class="view_lab_print_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_print_list->DrDepartment->headerCellClass() ?>"><div id="elh_view_lab_print_DrDepartment" class="view_lab_print_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_print_list->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->DrDepartment) ?>', 1);"><div id="elh_view_lab_print_DrDepartment" class="view_lab_print_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_print_list->RefferedBy->headerCellClass() ?>"><div id="elh_view_lab_print_RefferedBy" class="view_lab_print_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_print_list->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->RefferedBy) ?>', 1);"><div id="elh_view_lab_print_RefferedBy" class="view_lab_print_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->RefferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->RefferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_print_list->BillNumber->headerCellClass() ?>"><div id="elh_view_lab_print_BillNumber" class="view_lab_print_BillNumber"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_print_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->BillNumber) ?>', 1);"><div id="elh_view_lab_print_BillNumber" class="view_lab_print_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_print_list->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_lab_print_list->SortUrl($view_lab_print_list->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_print_list->LabTestReleased->headerCellClass() ?>"><div id="elh_view_lab_print_LabTestReleased" class="view_lab_print_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_lab_print_list->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_print_list->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_print_list->SortUrl($view_lab_print_list->LabTestReleased) ?>', 1);"><div id="elh_view_lab_print_LabTestReleased" class="view_lab_print_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_print_list->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_print_list->LabTestReleased->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_print_list->LabTestReleased->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_print_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_print_list->ExportAll && $view_lab_print_list->isExport()) {
	$view_lab_print_list->StopRecord = $view_lab_print_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_lab_print_list->TotalRecords > $view_lab_print_list->StartRecord + $view_lab_print_list->DisplayRecords - 1)
		$view_lab_print_list->StopRecord = $view_lab_print_list->StartRecord + $view_lab_print_list->DisplayRecords - 1;
	else
		$view_lab_print_list->StopRecord = $view_lab_print_list->TotalRecords;
}
$view_lab_print_list->RecordCount = $view_lab_print_list->StartRecord - 1;
if ($view_lab_print_list->Recordset && !$view_lab_print_list->Recordset->EOF) {
	$view_lab_print_list->Recordset->moveFirst();
	$selectLimit = $view_lab_print_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_print_list->StartRecord > 1)
		$view_lab_print_list->Recordset->move($view_lab_print_list->StartRecord - 1);
} elseif (!$view_lab_print->AllowAddDeleteRow && $view_lab_print_list->StopRecord == 0) {
	$view_lab_print_list->StopRecord = $view_lab_print->GridAddRowCount;
}

// Initialize aggregate
$view_lab_print->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_print->resetAttributes();
$view_lab_print_list->renderRow();
while ($view_lab_print_list->RecordCount < $view_lab_print_list->StopRecord) {
	$view_lab_print_list->RecordCount++;
	if ($view_lab_print_list->RecordCount >= $view_lab_print_list->StartRecord) {
		$view_lab_print_list->RowCount++;

		// Set up key count
		$view_lab_print_list->KeyCount = $view_lab_print_list->RowIndex;

		// Init row class and style
		$view_lab_print->resetAttributes();
		$view_lab_print->CssClass = "";
		if ($view_lab_print_list->isGridAdd()) {
		} else {
			$view_lab_print_list->loadRowValues($view_lab_print_list->Recordset); // Load row values
		}
		$view_lab_print->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_print->RowAttrs->merge(["data-rowindex" => $view_lab_print_list->RowCount, "id" => "r" . $view_lab_print_list->RowCount . "_view_lab_print", "data-rowtype" => $view_lab_print->RowType]);

		// Render row
		$view_lab_print_list->renderRow();

		// Render list options
		$view_lab_print_list->renderListOptions();
?>
	<tr <?php echo $view_lab_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_print_list->ListOptions->render("body", "left", $view_lab_print_list->RowCount);
?>
	<?php if ($view_lab_print_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_lab_print_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_id">
<span<?php echo $view_lab_print_list->id->viewAttributes() ?>><?php echo $view_lab_print_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->SID->Visible) { // SID ?>
		<td data-name="SID" <?php echo $view_lab_print_list->SID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_SID">
<span<?php echo $view_lab_print_list->SID->viewAttributes() ?>><?php echo $view_lab_print_list->SID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_lab_print_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_PatientId">
<span<?php echo $view_lab_print_list->PatientId->viewAttributes() ?>><?php echo $view_lab_print_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_lab_print_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_PatientName">
<span<?php echo $view_lab_print_list->PatientName->viewAttributes() ?>><?php echo $view_lab_print_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_lab_print_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_Gender">
<span<?php echo $view_lab_print_list->Gender->viewAttributes() ?>><?php echo $view_lab_print_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_lab_print_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_Mobile">
<span<?php echo $view_lab_print_list->Mobile->viewAttributes() ?>><?php echo $view_lab_print_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_lab_print_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_Doctor">
<span<?php echo $view_lab_print_list->Doctor->viewAttributes() ?>><?php echo $view_lab_print_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_lab_print_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_ModeofPayment">
<span<?php echo $view_lab_print_list->ModeofPayment->viewAttributes() ?>><?php echo $view_lab_print_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_lab_print_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_Amount">
<span<?php echo $view_lab_print_list->Amount->viewAttributes() ?>><?php echo $view_lab_print_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_print_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_HospID">
<span<?php echo $view_lab_print_list->HospID->viewAttributes() ?>><?php echo $view_lab_print_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_lab_print_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_RIDNO">
<span<?php echo $view_lab_print_list->RIDNO->viewAttributes() ?>><?php echo $view_lab_print_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_lab_print_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_PartnerName">
<span<?php echo $view_lab_print_list->PartnerName->viewAttributes() ?>><?php echo $view_lab_print_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $view_lab_print_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_Remarks">
<span<?php echo $view_lab_print_list->Remarks->viewAttributes() ?>><?php echo $view_lab_print_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $view_lab_print_list->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_DrDepartment">
<span<?php echo $view_lab_print_list->DrDepartment->viewAttributes() ?>><?php echo $view_lab_print_list->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy" <?php echo $view_lab_print_list->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_RefferedBy">
<span<?php echo $view_lab_print_list->RefferedBy->viewAttributes() ?>><?php echo $view_lab_print_list->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_lab_print_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_BillNumber">
<span<?php echo $view_lab_print_list->BillNumber->viewAttributes() ?>><?php echo $view_lab_print_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_print_list->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased" <?php echo $view_lab_print_list->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_lab_print_list->RowCount ?>_view_lab_print_LabTestReleased">
<span<?php echo $view_lab_print_list->LabTestReleased->viewAttributes() ?>><?php echo $view_lab_print_list->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_print_list->ListOptions->render("body", "right", $view_lab_print_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_lab_print_list->isGridAdd())
		$view_lab_print_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_lab_print->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_print_list->Recordset)
	$view_lab_print_list->Recordset->Close();
?>
<?php if (!$view_lab_print_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_print_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_print_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_print_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_print_list->TotalRecords == 0 && !$view_lab_print->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_print_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_print_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_lab_print->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_print",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_lab_print_list->terminate();
?>