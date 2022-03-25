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
$ivf_list = new ivf_list();

// Run the page
$ivf_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_list->isExport()) { ?>
<script>
var fivflist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivflist = currentForm = new ew.Form("fivflist", "list");
	fivflist.formKeyCountName = '<?php echo $ivf_list->FormKeyCountName ?>';
	loadjs.done("fivflist");
});
var fivflistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivflistsrch = currentSearchForm = new ew.Form("fivflistsrch");

	// Validate function for search
	fivflistsrch.validate = function(fobj) {
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
	fivflistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivflistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fivflistsrch.filterList = <?php echo $ivf_list->getFilterList() ?>;
	loadjs.done("fivflistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #B0C4DE; /* preview row color */
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
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$ivf_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_list->TotalRecords > 0 && $ivf_list->ExportOptions->visible()) { ?>
<?php $ivf_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_list->ImportOptions->visible()) { ?>
<?php $ivf_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_list->SearchOptions->visible()) { ?>
<?php $ivf_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_list->FilterOptions->visible()) { ?>
<?php $ivf_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_list->isExport() && !$ivf->CurrentAction) { ?>
<form name="fivflistsrch" id="fivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivflistsrch-search-panel" class="<?php echo $ivf_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf">
	<div class="ew-extended-search">
<?php

// Render search row
$ivf->RowType = ROWTYPE_SEARCH;
$ivf->resetAttributes();
$ivf_list->renderRow();
?>
<?php if ($ivf_list->CoupleID->Visible) { // CoupleID ?>
	<?php
		$ivf_list->SearchColumnCount++;
		if (($ivf_list->SearchColumnCount - 1) % $ivf_list->SearchFieldsPerRow == 0) {
			$ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $ivf_list->CoupleID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
		<span id="el_ivf_CoupleID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_list->CoupleID->getPlaceHolder()) ?>" value="<?php echo $ivf_list->CoupleID->EditValue ?>"<?php echo $ivf_list->CoupleID->editAttributes() ?>>
</span>
	</div>
	<?php if ($ivf_list->SearchColumnCount % $ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PatientName->Visible) { // PatientName ?>
	<?php
		$ivf_list->SearchColumnCount++;
		if (($ivf_list->SearchColumnCount - 1) % $ivf_list->SearchFieldsPerRow == 0) {
			$ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $ivf_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_ivf_PatientName" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_list->PatientName->EditValue ?>"<?php echo $ivf_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($ivf_list->SearchColumnCount % $ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PatientID->Visible) { // PatientID ?>
	<?php
		$ivf_list->SearchColumnCount++;
		if (($ivf_list->SearchColumnCount - 1) % $ivf_list->SearchFieldsPerRow == 0) {
			$ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $ivf_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_ivf_PatientID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf_list->PatientID->EditValue ?>"<?php echo $ivf_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($ivf_list->SearchColumnCount % $ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PartnerName->Visible) { // PartnerName ?>
	<?php
		$ivf_list->SearchColumnCount++;
		if (($ivf_list->SearchColumnCount - 1) % $ivf_list->SearchFieldsPerRow == 0) {
			$ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $ivf_list->PartnerName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		<span id="el_ivf_PartnerName" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_list->PartnerName->EditValue ?>"<?php echo $ivf_list->PartnerName->editAttributes() ?>>
</span>
	</div>
	<?php if ($ivf_list->SearchColumnCount % $ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PartnerID->Visible) { // PartnerID ?>
	<?php
		$ivf_list->SearchColumnCount++;
		if (($ivf_list->SearchColumnCount - 1) % $ivf_list->SearchFieldsPerRow == 0) {
			$ivf_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $ivf_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $ivf_list->PartnerID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
		<span id="el_ivf_PartnerID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_list->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_list->PartnerID->EditValue ?>"<?php echo $ivf_list->PartnerID->editAttributes() ?>>
</span>
	</div>
	<?php if ($ivf_list->SearchColumnCount % $ivf_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($ivf_list->SearchColumnCount % $ivf_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $ivf_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_list->showPageHeader(); ?>
<?php
$ivf_list->showMessage();
?>
<?php if ($ivf_list->TotalRecords > 0 || $ivf->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf">
<?php if (!$ivf_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivflist" id="fivflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<div id="gmp_ivf" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_list->TotalRecords > 0 || $ivf_list->isGridEdit()) { ?>
<table id="tbl_ivflist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_list->renderListOptions();

// Render list options (header, left)
$ivf_list->ListOptions->render("header", "left", "", "block", $ivf->TableVar, "ivflist");
?>
<?php if ($ivf_list->id->Visible) { // id ?>
	<?php if ($ivf_list->SortUrl($ivf_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_list->id->headerCellClass() ?>"><div id="elh_ivf_id" class="ivf_id"><div class="ew-table-header-caption"><script id="tpc_ivf_id" type="text/html"><?php echo $ivf_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_list->id->headerCellClass() ?>"><script id="tpc_ivf_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->id) ?>', 1);"><div id="elh_ivf_id" class="ivf_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->Male->Visible) { // Male ?>
	<?php if ($ivf_list->SortUrl($ivf_list->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $ivf_list->Male->headerCellClass() ?>"><div id="elh_ivf_Male" class="ivf_Male"><div class="ew-table-header-caption"><script id="tpc_ivf_Male" type="text/html"><?php echo $ivf_list->Male->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $ivf_list->Male->headerCellClass() ?>"><script id="tpc_ivf_Male" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->Male) ?>', 1);"><div id="elh_ivf_Male" class="ivf_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->Male->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->Male->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->Female->Visible) { // Female ?>
	<?php if ($ivf_list->SortUrl($ivf_list->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $ivf_list->Female->headerCellClass() ?>"><div id="elh_ivf_Female" class="ivf_Female"><div class="ew-table-header-caption"><script id="tpc_ivf_Female" type="text/html"><?php echo $ivf_list->Female->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $ivf_list->Female->headerCellClass() ?>"><script id="tpc_ivf_Female" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->Female) ?>', 1);"><div id="elh_ivf_Female" class="ivf_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->Female->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->Female->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->status->Visible) { // status ?>
	<?php if ($ivf_list->SortUrl($ivf_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_list->status->headerCellClass() ?>"><div id="elh_ivf_status" class="ivf_status"><div class="ew-table-header-caption"><script id="tpc_ivf_status" type="text/html"><?php echo $ivf_list->status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_list->status->headerCellClass() ?>"><script id="tpc_ivf_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->status) ?>', 1);"><div id="elh_ivf_status" class="ivf_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->malepropic->Visible) { // malepropic ?>
	<?php if ($ivf_list->SortUrl($ivf_list->malepropic) == "") { ?>
		<th data-name="malepropic" class="<?php echo $ivf_list->malepropic->headerCellClass() ?>"><div id="elh_ivf_malepropic" class="ivf_malepropic"><div class="ew-table-header-caption"><script id="tpc_ivf_malepropic" type="text/html"><?php echo $ivf_list->malepropic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="malepropic" class="<?php echo $ivf_list->malepropic->headerCellClass() ?>"><script id="tpc_ivf_malepropic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->malepropic) ?>', 1);"><div id="elh_ivf_malepropic" class="ivf_malepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->malepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->malepropic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->malepropic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->femalepropic->Visible) { // femalepropic ?>
	<?php if ($ivf_list->SortUrl($ivf_list->femalepropic) == "") { ?>
		<th data-name="femalepropic" class="<?php echo $ivf_list->femalepropic->headerCellClass() ?>"><div id="elh_ivf_femalepropic" class="ivf_femalepropic"><div class="ew-table-header-caption"><script id="tpc_ivf_femalepropic" type="text/html"><?php echo $ivf_list->femalepropic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="femalepropic" class="<?php echo $ivf_list->femalepropic->headerCellClass() ?>"><script id="tpc_ivf_femalepropic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->femalepropic) ?>', 1);"><div id="elh_ivf_femalepropic" class="ivf_femalepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->femalepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->femalepropic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->femalepropic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($ivf_list->SortUrl($ivf_list->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $ivf_list->HusbandEducation->headerCellClass() ?>"><div id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandEducation" type="text/html"><?php echo $ivf_list->HusbandEducation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $ivf_list->HusbandEducation->headerCellClass() ?>"><script id="tpc_ivf_HusbandEducation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->HusbandEducation) ?>', 1);"><div id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->HusbandEducation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->HusbandEducation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($ivf_list->SortUrl($ivf_list->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $ivf_list->WifeEducation->headerCellClass() ?>"><div id="elh_ivf_WifeEducation" class="ivf_WifeEducation"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeEducation" type="text/html"><?php echo $ivf_list->WifeEducation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $ivf_list->WifeEducation->headerCellClass() ?>"><script id="tpc_ivf_WifeEducation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->WifeEducation) ?>', 1);"><div id="elh_ivf_WifeEducation" class="ivf_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->WifeEducation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->WifeEducation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($ivf_list->SortUrl($ivf_list->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $ivf_list->HusbandWorkHours->headerCellClass() ?>"><div id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandWorkHours" type="text/html"><?php echo $ivf_list->HusbandWorkHours->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $ivf_list->HusbandWorkHours->headerCellClass() ?>"><script id="tpc_ivf_HusbandWorkHours" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->HusbandWorkHours) ?>', 1);"><div id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->HusbandWorkHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->HusbandWorkHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($ivf_list->SortUrl($ivf_list->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $ivf_list->WifeWorkHours->headerCellClass() ?>"><div id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeWorkHours" type="text/html"><?php echo $ivf_list->WifeWorkHours->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $ivf_list->WifeWorkHours->headerCellClass() ?>"><script id="tpc_ivf_WifeWorkHours" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->WifeWorkHours) ?>', 1);"><div id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->WifeWorkHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->WifeWorkHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($ivf_list->SortUrl($ivf_list->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $ivf_list->PatientLanguage->headerCellClass() ?>"><div id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage"><div class="ew-table-header-caption"><script id="tpc_ivf_PatientLanguage" type="text/html"><?php echo $ivf_list->PatientLanguage->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $ivf_list->PatientLanguage->headerCellClass() ?>"><script id="tpc_ivf_PatientLanguage" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->PatientLanguage) ?>', 1);"><div id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->PatientLanguage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->PatientLanguage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($ivf_list->SortUrl($ivf_list->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $ivf_list->ReferedBy->headerCellClass() ?>"><div id="elh_ivf_ReferedBy" class="ivf_ReferedBy"><div class="ew-table-header-caption"><script id="tpc_ivf_ReferedBy" type="text/html"><?php echo $ivf_list->ReferedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $ivf_list->ReferedBy->headerCellClass() ?>"><script id="tpc_ivf_ReferedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->ReferedBy) ?>', 1);"><div id="elh_ivf_ReferedBy" class="ivf_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->ReferedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->ReferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->ReferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($ivf_list->SortUrl($ivf_list->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $ivf_list->ReferPhNo->headerCellClass() ?>"><div id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo"><div class="ew-table-header-caption"><script id="tpc_ivf_ReferPhNo" type="text/html"><?php echo $ivf_list->ReferPhNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $ivf_list->ReferPhNo->headerCellClass() ?>"><script id="tpc_ivf_ReferPhNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->ReferPhNo) ?>', 1);"><div id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->ReferPhNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->ReferPhNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->WifeCell->Visible) { // WifeCell ?>
	<?php if ($ivf_list->SortUrl($ivf_list->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $ivf_list->WifeCell->headerCellClass() ?>"><div id="elh_ivf_WifeCell" class="ivf_WifeCell"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeCell" type="text/html"><?php echo $ivf_list->WifeCell->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $ivf_list->WifeCell->headerCellClass() ?>"><script id="tpc_ivf_WifeCell" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->WifeCell) ?>', 1);"><div id="elh_ivf_WifeCell" class="ivf_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->WifeCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->WifeCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($ivf_list->SortUrl($ivf_list->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $ivf_list->HusbandCell->headerCellClass() ?>"><div id="elh_ivf_HusbandCell" class="ivf_HusbandCell"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandCell" type="text/html"><?php echo $ivf_list->HusbandCell->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $ivf_list->HusbandCell->headerCellClass() ?>"><script id="tpc_ivf_HusbandCell" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->HusbandCell) ?>', 1);"><div id="elh_ivf_HusbandCell" class="ivf_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->HusbandCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->HusbandCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($ivf_list->SortUrl($ivf_list->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $ivf_list->WifeEmail->headerCellClass() ?>"><div id="elh_ivf_WifeEmail" class="ivf_WifeEmail"><div class="ew-table-header-caption"><script id="tpc_ivf_WifeEmail" type="text/html"><?php echo $ivf_list->WifeEmail->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $ivf_list->WifeEmail->headerCellClass() ?>"><script id="tpc_ivf_WifeEmail" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->WifeEmail) ?>', 1);"><div id="elh_ivf_WifeEmail" class="ivf_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->WifeEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->WifeEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($ivf_list->SortUrl($ivf_list->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $ivf_list->HusbandEmail->headerCellClass() ?>"><div id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail"><div class="ew-table-header-caption"><script id="tpc_ivf_HusbandEmail" type="text/html"><?php echo $ivf_list->HusbandEmail->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $ivf_list->HusbandEmail->headerCellClass() ?>"><script id="tpc_ivf_HusbandEmail" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->HusbandEmail) ?>', 1);"><div id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->HusbandEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->HusbandEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_list->SortUrl($ivf_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE"><div class="ew-table-header-caption"><script id="tpc_ivf_ARTCYCLE" type="text/html"><?php echo $ivf_list->ARTCYCLE->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_list->ARTCYCLE->headerCellClass() ?>"><script id="tpc_ivf_ARTCYCLE" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->ARTCYCLE) ?>', 1);"><div id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_list->SortUrl($ivf_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $ivf_list->RESULT->headerCellClass() ?>"><div id="elh_ivf_RESULT" class="ivf_RESULT"><div class="ew-table-header-caption"><script id="tpc_ivf_RESULT" type="text/html"><?php echo $ivf_list->RESULT->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $ivf_list->RESULT->headerCellClass() ?>"><script id="tpc_ivf_RESULT" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->RESULT) ?>', 1);"><div id="elh_ivf_RESULT" class="ivf_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->CoupleID->Visible) { // CoupleID ?>
	<?php if ($ivf_list->SortUrl($ivf_list->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $ivf_list->CoupleID->headerCellClass() ?>"><div id="elh_ivf_CoupleID" class="ivf_CoupleID"><div class="ew-table-header-caption"><script id="tpc_ivf_CoupleID" type="text/html"><?php echo $ivf_list->CoupleID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $ivf_list->CoupleID->headerCellClass() ?>"><script id="tpc_ivf_CoupleID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->CoupleID) ?>', 1);"><div id="elh_ivf_CoupleID" class="ivf_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->CoupleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->CoupleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->HospID->Visible) { // HospID ?>
	<?php if ($ivf_list->SortUrl($ivf_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $ivf_list->HospID->headerCellClass() ?>"><div id="elh_ivf_HospID" class="ivf_HospID"><div class="ew-table-header-caption"><script id="tpc_ivf_HospID" type="text/html"><?php echo $ivf_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $ivf_list->HospID->headerCellClass() ?>"><script id="tpc_ivf_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->HospID) ?>', 1);"><div id="elh_ivf_HospID" class="ivf_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_list->SortUrl($ivf_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $ivf_list->PatientName->headerCellClass() ?>"><div id="elh_ivf_PatientName" class="ivf_PatientName"><div class="ew-table-header-caption"><script id="tpc_ivf_PatientName" type="text/html"><?php echo $ivf_list->PatientName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $ivf_list->PatientName->headerCellClass() ?>"><script id="tpc_ivf_PatientName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->PatientName) ?>', 1);"><div id="elh_ivf_PatientName" class="ivf_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PatientID->Visible) { // PatientID ?>
	<?php if ($ivf_list->SortUrl($ivf_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $ivf_list->PatientID->headerCellClass() ?>"><div id="elh_ivf_PatientID" class="ivf_PatientID"><div class="ew-table-header-caption"><script id="tpc_ivf_PatientID" type="text/html"><?php echo $ivf_list->PatientID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $ivf_list->PatientID->headerCellClass() ?>"><script id="tpc_ivf_PatientID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->PatientID) ?>', 1);"><div id="elh_ivf_PatientID" class="ivf_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_list->SortUrl($ivf_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_list->PartnerName->headerCellClass() ?>"><div id="elh_ivf_PartnerName" class="ivf_PartnerName"><div class="ew-table-header-caption"><script id="tpc_ivf_PartnerName" type="text/html"><?php echo $ivf_list->PartnerName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_list->PartnerName->headerCellClass() ?>"><script id="tpc_ivf_PartnerName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->PartnerName) ?>', 1);"><div id="elh_ivf_PartnerName" class="ivf_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_list->SortUrl($ivf_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_list->PartnerID->headerCellClass() ?>"><div id="elh_ivf_PartnerID" class="ivf_PartnerID"><div class="ew-table-header-caption"><script id="tpc_ivf_PartnerID" type="text/html"><?php echo $ivf_list->PartnerID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_list->PartnerID->headerCellClass() ?>"><script id="tpc_ivf_PartnerID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->PartnerID) ?>', 1);"><div id="elh_ivf_PartnerID" class="ivf_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->DrID->Visible) { // DrID ?>
	<?php if ($ivf_list->SortUrl($ivf_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $ivf_list->DrID->headerCellClass() ?>"><div id="elh_ivf_DrID" class="ivf_DrID"><div class="ew-table-header-caption"><script id="tpc_ivf_DrID" type="text/html"><?php echo $ivf_list->DrID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $ivf_list->DrID->headerCellClass() ?>"><script id="tpc_ivf_DrID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->DrID) ?>', 1);"><div id="elh_ivf_DrID" class="ivf_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($ivf_list->SortUrl($ivf_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $ivf_list->DrDepartment->headerCellClass() ?>"><div id="elh_ivf_DrDepartment" class="ivf_DrDepartment"><div class="ew-table-header-caption"><script id="tpc_ivf_DrDepartment" type="text/html"><?php echo $ivf_list->DrDepartment->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $ivf_list->DrDepartment->headerCellClass() ?>"><script id="tpc_ivf_DrDepartment" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->DrDepartment) ?>', 1);"><div id="elh_ivf_DrDepartment" class="ivf_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_list->Doctor->Visible) { // Doctor ?>
	<?php if ($ivf_list->SortUrl($ivf_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $ivf_list->Doctor->headerCellClass() ?>"><div id="elh_ivf_Doctor" class="ivf_Doctor"><div class="ew-table-header-caption"><script id="tpc_ivf_Doctor" type="text/html"><?php echo $ivf_list->Doctor->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $ivf_list->Doctor->headerCellClass() ?>"><script id="tpc_ivf_Doctor" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_list->SortUrl($ivf_list->Doctor) ?>', 1);"><div id="elh_ivf_Doctor" class="ivf_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_list->ListOptions->render("header", "right", "", "block", $ivf->TableVar, "ivflist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_list->ExportAll && $ivf_list->isExport()) {
	$ivf_list->StopRecord = $ivf_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_list->TotalRecords > $ivf_list->StartRecord + $ivf_list->DisplayRecords - 1)
		$ivf_list->StopRecord = $ivf_list->StartRecord + $ivf_list->DisplayRecords - 1;
	else
		$ivf_list->StopRecord = $ivf_list->TotalRecords;
}
$ivf_list->RecordCount = $ivf_list->StartRecord - 1;
if ($ivf_list->Recordset && !$ivf_list->Recordset->EOF) {
	$ivf_list->Recordset->moveFirst();
	$selectLimit = $ivf_list->UseSelectLimit;
	if (!$selectLimit && $ivf_list->StartRecord > 1)
		$ivf_list->Recordset->move($ivf_list->StartRecord - 1);
} elseif (!$ivf->AllowAddDeleteRow && $ivf_list->StopRecord == 0) {
	$ivf_list->StopRecord = $ivf->GridAddRowCount;
}

// Initialize aggregate
$ivf->RowType = ROWTYPE_AGGREGATEINIT;
$ivf->resetAttributes();
$ivf_list->renderRow();
while ($ivf_list->RecordCount < $ivf_list->StopRecord) {
	$ivf_list->RecordCount++;
	if ($ivf_list->RecordCount >= $ivf_list->StartRecord) {
		$ivf_list->RowCount++;

		// Set up key count
		$ivf_list->KeyCount = $ivf_list->RowIndex;

		// Init row class and style
		$ivf->resetAttributes();
		$ivf->CssClass = "";
		if ($ivf_list->isGridAdd()) {
		} else {
			$ivf_list->loadRowValues($ivf_list->Recordset); // Load row values
		}
		$ivf->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf->RowAttrs->merge(["data-rowindex" => $ivf_list->RowCount, "id" => "r" . $ivf_list->RowCount . "_ivf", "data-rowtype" => $ivf->RowType]);

		// Render row
		$ivf_list->renderRow();

		// Render list options
		$ivf_list->renderListOptions();

		// Save row and cell attributes
		$ivf_list->Attrs[$ivf_list->RowCount] = ["row_attrs" => $ivf->rowAttributes(), "cell_attrs" => []];
		$ivf_list->Attrs[$ivf_list->RowCount]["cell_attrs"] = $ivf->fieldCellAttributes();
?>
	<tr <?php echo $ivf->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_list->ListOptions->render("body", "left", $ivf_list->RowCount, "block", $ivf->TableVar, "ivflist");
?>
	<?php if ($ivf_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_list->id->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_id" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_id">
<span<?php echo $ivf_list->id->viewAttributes() ?>><?php echo $ivf_list->id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->Male->Visible) { // Male ?>
		<td data-name="Male" <?php echo $ivf_list->Male->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_Male" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_Male">
<span<?php echo $ivf_list->Male->viewAttributes() ?>><?php echo $ivf_list->Male->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->Female->Visible) { // Female ?>
		<td data-name="Female" <?php echo $ivf_list->Female->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_Female" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_Female">
<span<?php echo $ivf_list->Female->viewAttributes() ?>><?php echo $ivf_list->Female->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $ivf_list->status->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_status" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_status">
<span<?php echo $ivf_list->status->viewAttributes() ?>><?php echo $ivf_list->status->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->malepropic->Visible) { // malepropic ?>
		<td data-name="malepropic" <?php echo $ivf_list->malepropic->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_malepropic" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_malepropic">
<span><?php echo GetFileViewTag($ivf_list->malepropic, $ivf_list->malepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->femalepropic->Visible) { // femalepropic ?>
		<td data-name="femalepropic" <?php echo $ivf_list->femalepropic->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_femalepropic" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_femalepropic">
<span><?php echo GetFileViewTag($ivf_list->femalepropic, $ivf_list->femalepropic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation" <?php echo $ivf_list->HusbandEducation->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_HusbandEducation" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_HusbandEducation">
<span<?php echo $ivf_list->HusbandEducation->viewAttributes() ?>><?php echo $ivf_list->HusbandEducation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation" <?php echo $ivf_list->WifeEducation->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_WifeEducation" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_WifeEducation">
<span<?php echo $ivf_list->WifeEducation->viewAttributes() ?>><?php echo $ivf_list->WifeEducation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours" <?php echo $ivf_list->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_HusbandWorkHours" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_HusbandWorkHours">
<span<?php echo $ivf_list->HusbandWorkHours->viewAttributes() ?>><?php echo $ivf_list->HusbandWorkHours->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours" <?php echo $ivf_list->WifeWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_WifeWorkHours" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_WifeWorkHours">
<span<?php echo $ivf_list->WifeWorkHours->viewAttributes() ?>><?php echo $ivf_list->WifeWorkHours->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage" <?php echo $ivf_list->PatientLanguage->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_PatientLanguage" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_PatientLanguage">
<span<?php echo $ivf_list->PatientLanguage->viewAttributes() ?>><?php echo $ivf_list->PatientLanguage->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy" <?php echo $ivf_list->ReferedBy->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_ReferedBy" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_ReferedBy">
<span<?php echo $ivf_list->ReferedBy->viewAttributes() ?>><?php echo $ivf_list->ReferedBy->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo" <?php echo $ivf_list->ReferPhNo->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_ReferPhNo" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_ReferPhNo">
<span<?php echo $ivf_list->ReferPhNo->viewAttributes() ?>><?php echo $ivf_list->ReferPhNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell" <?php echo $ivf_list->WifeCell->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_WifeCell" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_WifeCell">
<span<?php echo $ivf_list->WifeCell->viewAttributes() ?>><?php echo $ivf_list->WifeCell->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell" <?php echo $ivf_list->HusbandCell->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_HusbandCell" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_HusbandCell">
<span<?php echo $ivf_list->HusbandCell->viewAttributes() ?>><?php echo $ivf_list->HusbandCell->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail" <?php echo $ivf_list->WifeEmail->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_WifeEmail" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_WifeEmail">
<span<?php echo $ivf_list->WifeEmail->viewAttributes() ?>><?php echo $ivf_list->WifeEmail->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail" <?php echo $ivf_list->HusbandEmail->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_HusbandEmail" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_HusbandEmail">
<span<?php echo $ivf_list->HusbandEmail->viewAttributes() ?>><?php echo $ivf_list->HusbandEmail->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $ivf_list->ARTCYCLE->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_ARTCYCLE" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_ARTCYCLE">
<span<?php echo $ivf_list->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_list->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $ivf_list->RESULT->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_RESULT" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_RESULT">
<span<?php echo $ivf_list->RESULT->viewAttributes() ?>><?php echo $ivf_list->RESULT->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID" <?php echo $ivf_list->CoupleID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_CoupleID" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_CoupleID">
<span<?php echo $ivf_list->CoupleID->viewAttributes() ?>><?php echo $ivf_list->CoupleID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $ivf_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_HospID" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_HospID">
<span<?php echo $ivf_list->HospID->viewAttributes() ?>><?php echo $ivf_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $ivf_list->PatientName->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_PatientName" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_PatientName">
<span<?php echo $ivf_list->PatientName->viewAttributes() ?>><?php echo $ivf_list->PatientName->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $ivf_list->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_PatientID" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_PatientID">
<span<?php echo $ivf_list->PatientID->viewAttributes() ?>><?php echo $ivf_list->PatientID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $ivf_list->PartnerName->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_PartnerName" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_PartnerName">
<span<?php echo $ivf_list->PartnerName->viewAttributes() ?>><?php echo $ivf_list->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $ivf_list->PartnerID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_PartnerID" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_PartnerID">
<span<?php echo $ivf_list->PartnerID->viewAttributes() ?>><?php echo $ivf_list->PartnerID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $ivf_list->DrID->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_DrID" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_DrID">
<span<?php echo $ivf_list->DrID->viewAttributes() ?>><?php echo $ivf_list->DrID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $ivf_list->DrDepartment->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_DrDepartment" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_DrDepartment">
<span<?php echo $ivf_list->DrDepartment->viewAttributes() ?>><?php echo $ivf_list->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($ivf_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $ivf_list->Doctor->cellAttributes() ?>>
<script id="tpx<?php echo $ivf_list->RowCount ?>_ivf_Doctor" type="text/html"><span id="el<?php echo $ivf_list->RowCount ?>_ivf_Doctor">
<span<?php echo $ivf_list->Doctor->viewAttributes() ?>><?php echo $ivf_list->Doctor->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_list->ListOptions->render("body", "right", $ivf_list->RowCount, "block", $ivf->TableVar, "ivflist");
?>
	</tr>
<?php
	}
	if (!$ivf_list->isGridAdd())
		$ivf_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_ivflist" class="ew-custom-template"></div>
<script id="tpm_ivflist" type="text/html">
<div id="ct_ivf_list"><?php if ($ivf_list->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	{{include tmpl=~getTemplate("#tpoh_ivf")/}}
	<td rowspan="2">Home</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpc_ivf_CoupleID")/}}</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpc_ivf_malepropic")/}}</td>
		<td rowspan="2">{{include tmpl=~getTemplate("#tpc_ivf_femalepropic")/}}</td>
	<td>{{include tmpl=~getTemplate("#tpc_ivf_PatientID")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpc_ivf_ARTCYCLE")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpc_ivf_status")/}}</td>
	</tr>
	<tr class="ew-table-header">
	<td>{{include tmpl=~getTemplate("#tpc_ivf_Female")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpc_ivf_RESULT")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpc_ivf_ReferedBy")/}}</td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $ivf_list->StartRowCount; $i <= $ivf_list->RowCount; $i++) { ?>
<tr<?php echo @$ivf_list->Attrs[$i]['row_attrs'] ?>> 
	{{include tmpl=~getTemplate("#tpob<?php echo $i ?>_ivf")/}}
	<td rowspan="2">
				<a class="btn btn-app" href="FertilityHome.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2">{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_CoupleID")/}}</td>
	<td rowspan="2">
	<img src="uploads\{{: ~root.rows[<?php echo $i - 1 ?>].PartnerID }}.jpg"  onerror="this.src = 'uploads/hims/profile-picture.png';"  width="80" height="80">	
	</td>
		<td rowspan="2">
	<img src="uploads\{{: ~root.rows[<?php echo $i - 1 ?>].PatientID }}.jpg"  onerror="this.src = 'uploads/hims/profile-picture.png';"  width="80" height="80">	
		</td>
	<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_Male")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_ARTCYCLE")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_status")/}}</td>
</tr>
<tr<?php echo @$ivf_list->Attrs[$i]['row_attrs'] ?>>
	<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_Female")/}}</td>
				<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_RESULT")/}}</td>
					<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_ivf_ReferedBy")/}}</td>
</tr>

<?php } ?>
	</tbody>
	<!-- <?php if ($ivf_list->TotalRecords > 0 && !$ivf->isGridAdd() && !$ivf->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer">{{include tmpl=~getTemplate("#tpof_ivf")/}}<td>{{include tmpl=~getTemplate("#tpg_MyField1")/}}</td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_list->Recordset)
	$ivf_list->Recordset->Close();
?>
<?php if (!$ivf_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_list->TotalRecords == 0 && !$ivf->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
	ew.applyTemplate("tpd_ivflist", "tpm_ivflist", "ivflist", "<?php echo $ivf->CustomExport ?>", ew.templateData);
	$("#tpd_ivflist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_ivflist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.ivflist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_list->terminate();
?>