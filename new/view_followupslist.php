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
$view_followups_list = new view_followups_list();

// Run the page
$view_followups_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_followups_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_followups_list->isExport()) { ?>
<script>
var fview_followupslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_followupslist = currentForm = new ew.Form("fview_followupslist", "list");
	fview_followupslist.formKeyCountName = '<?php echo $view_followups_list->FormKeyCountName ?>';
	loadjs.done("fview_followupslist");
});
var fview_followupslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_followupslistsrch = currentSearchForm = new ew.Form("fview_followupslistsrch");

	// Validate function for search
	fview_followupslistsrch.validate = function(fobj) {
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
	fview_followupslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_followupslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_followupslistsrch.filterList = <?php echo $view_followups_list->getFilterList() ?>;
	loadjs.done("fview_followupslistsrch");
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
<?php if (!$view_followups_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_followups_list->TotalRecords > 0 && $view_followups_list->ExportOptions->visible()) { ?>
<?php $view_followups_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_followups_list->ImportOptions->visible()) { ?>
<?php $view_followups_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_followups_list->SearchOptions->visible()) { ?>
<?php $view_followups_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_followups_list->FilterOptions->visible()) { ?>
<?php $view_followups_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_followups_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_followups_list->isExport() && !$view_followups->CurrentAction) { ?>
<form name="fview_followupslistsrch" id="fview_followupslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_followupslistsrch-search-panel" class="<?php echo $view_followups_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_followups">
	<div class="ew-extended-search">
<?php

// Render search row
$view_followups->RowType = ROWTYPE_SEARCH;
$view_followups->resetAttributes();
$view_followups_list->renderRow();
?>
<?php if ($view_followups_list->PatientID->Visible) { // PatientID ?>
	<?php
		$view_followups_list->SearchColumnCount++;
		if (($view_followups_list->SearchColumnCount - 1) % $view_followups_list->SearchFieldsPerRow == 0) {
			$view_followups_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_followups_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_followups_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_view_followups_PatientID" class="ew-search-field">
<input type="text" data-table="view_followups" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_followups_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_followups_list->PatientID->EditValue ?>"<?php echo $view_followups_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_followups_list->SearchColumnCount % $view_followups_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->first_name->Visible) { // first_name ?>
	<?php
		$view_followups_list->SearchColumnCount++;
		if (($view_followups_list->SearchColumnCount - 1) % $view_followups_list->SearchFieldsPerRow == 0) {
			$view_followups_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_followups_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_first_name" class="ew-cell form-group">
		<label for="x_first_name" class="ew-search-caption ew-label"><?php echo $view_followups_list->first_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_first_name" id="z_first_name" value="LIKE">
</span>
		<span id="el_view_followups_first_name" class="ew-search-field">
<input type="text" data-table="view_followups" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_followups_list->first_name->getPlaceHolder()) ?>" value="<?php echo $view_followups_list->first_name->EditValue ?>"<?php echo $view_followups_list->first_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_followups_list->SearchColumnCount % $view_followups_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->mobile_no->Visible) { // mobile_no ?>
	<?php
		$view_followups_list->SearchColumnCount++;
		if (($view_followups_list->SearchColumnCount - 1) % $view_followups_list->SearchFieldsPerRow == 0) {
			$view_followups_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_followups_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mobile_no" class="ew-cell form-group">
		<label for="x_mobile_no" class="ew-search-caption ew-label"><?php echo $view_followups_list->mobile_no->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE">
</span>
		<span id="el_view_followups_mobile_no" class="ew-search-field">
<input type="text" data-table="view_followups" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_followups_list->mobile_no->getPlaceHolder()) ?>" value="<?php echo $view_followups_list->mobile_no->EditValue ?>"<?php echo $view_followups_list->mobile_no->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_followups_list->SearchColumnCount % $view_followups_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_followups_list->SearchColumnCount % $view_followups_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_followups_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_followups_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_followups_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_followups_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_followups_list->showPageHeader(); ?>
<?php
$view_followups_list->showMessage();
?>
<?php if ($view_followups_list->TotalRecords > 0 || $view_followups->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_followups_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_followups">
<?php if (!$view_followups_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_followups_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_followups_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_followups_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_followupslist" id="fview_followupslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_followups">
<div id="gmp_view_followups" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_followups_list->TotalRecords > 0 || $view_followups_list->isGridEdit()) { ?>
<table id="tbl_view_followupslist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_followups->RowType = ROWTYPE_HEADER;

// Render list options
$view_followups_list->renderListOptions();

// Render list options (header, left)
$view_followups_list->ListOptions->render("header", "left", "", "block", $view_followups->TableVar, "view_followupslist");
?>
<?php if ($view_followups_list->id->Visible) { // id ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_followups_list->id->headerCellClass() ?>"><div id="elh_view_followups_id" class="view_followups_id"><div class="ew-table-header-caption"><script id="tpc_view_followups_id" type="text/html"><?php echo $view_followups_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_followups_list->id->headerCellClass() ?>"><script id="tpc_view_followups_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->id) ?>', 1);"><div id="elh_view_followups_id" class="view_followups_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_followups_list->PatientID->headerCellClass() ?>"><div id="elh_view_followups_PatientID" class="view_followups_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_followups_PatientID" type="text/html"><?php echo $view_followups_list->PatientID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_followups_list->PatientID->headerCellClass() ?>"><script id="tpc_view_followups_PatientID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->PatientID) ?>', 1);"><div id="elh_view_followups_PatientID" class="view_followups_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->title->Visible) { // title ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->title) == "") { ?>
		<th data-name="title" class="<?php echo $view_followups_list->title->headerCellClass() ?>"><div id="elh_view_followups_title" class="view_followups_title"><div class="ew-table-header-caption"><script id="tpc_view_followups_title" type="text/html"><?php echo $view_followups_list->title->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $view_followups_list->title->headerCellClass() ?>"><script id="tpc_view_followups_title" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->title) ?>', 1);"><div id="elh_view_followups_title" class="view_followups_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->first_name->Visible) { // first_name ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_followups_list->first_name->headerCellClass() ?>"><div id="elh_view_followups_first_name" class="view_followups_first_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_first_name" type="text/html"><?php echo $view_followups_list->first_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_followups_list->first_name->headerCellClass() ?>"><script id="tpc_view_followups_first_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->first_name) ?>', 1);"><div id="elh_view_followups_first_name" class="view_followups_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->middle_name->Visible) { // middle_name ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $view_followups_list->middle_name->headerCellClass() ?>"><div id="elh_view_followups_middle_name" class="view_followups_middle_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_middle_name" type="text/html"><?php echo $view_followups_list->middle_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $view_followups_list->middle_name->headerCellClass() ?>"><script id="tpc_view_followups_middle_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->middle_name) ?>', 1);"><div id="elh_view_followups_middle_name" class="view_followups_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->middle_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->middle_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->last_name->Visible) { // last_name ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $view_followups_list->last_name->headerCellClass() ?>"><div id="elh_view_followups_last_name" class="view_followups_last_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_last_name" type="text/html"><?php echo $view_followups_list->last_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $view_followups_list->last_name->headerCellClass() ?>"><script id="tpc_view_followups_last_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->last_name) ?>', 1);"><div id="elh_view_followups_last_name" class="view_followups_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->last_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->last_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->gender->Visible) { // gender ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_followups_list->gender->headerCellClass() ?>"><div id="elh_view_followups_gender" class="view_followups_gender"><div class="ew-table-header-caption"><script id="tpc_view_followups_gender" type="text/html"><?php echo $view_followups_list->gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_followups_list->gender->headerCellClass() ?>"><script id="tpc_view_followups_gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->gender) ?>', 1);"><div id="elh_view_followups_gender" class="view_followups_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->dob->Visible) { // dob ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $view_followups_list->dob->headerCellClass() ?>"><div id="elh_view_followups_dob" class="view_followups_dob"><div class="ew-table-header-caption"><script id="tpc_view_followups_dob" type="text/html"><?php echo $view_followups_list->dob->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $view_followups_list->dob->headerCellClass() ?>"><script id="tpc_view_followups_dob" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->dob) ?>', 1);"><div id="elh_view_followups_dob" class="view_followups_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Age->Visible) { // Age ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_followups_list->Age->headerCellClass() ?>"><div id="elh_view_followups_Age" class="view_followups_Age"><div class="ew-table-header-caption"><script id="tpc_view_followups_Age" type="text/html"><?php echo $view_followups_list->Age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_followups_list->Age->headerCellClass() ?>"><script id="tpc_view_followups_Age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Age) ?>', 1);"><div id="elh_view_followups_Age" class="view_followups_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->blood_group->Visible) { // blood_group ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $view_followups_list->blood_group->headerCellClass() ?>"><div id="elh_view_followups_blood_group" class="view_followups_blood_group"><div class="ew-table-header-caption"><script id="tpc_view_followups_blood_group" type="text/html"><?php echo $view_followups_list->blood_group->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $view_followups_list->blood_group->headerCellClass() ?>"><script id="tpc_view_followups_blood_group" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->blood_group) ?>', 1);"><div id="elh_view_followups_blood_group" class="view_followups_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->blood_group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->blood_group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_followups_list->mobile_no->headerCellClass() ?>"><div id="elh_view_followups_mobile_no" class="view_followups_mobile_no"><div class="ew-table-header-caption"><script id="tpc_view_followups_mobile_no" type="text/html"><?php echo $view_followups_list->mobile_no->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_followups_list->mobile_no->headerCellClass() ?>"><script id="tpc_view_followups_mobile_no" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->mobile_no) ?>', 1);"><div id="elh_view_followups_mobile_no" class="view_followups_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_followups_list->IdentificationMark->headerCellClass() ?>"><div id="elh_view_followups_IdentificationMark" class="view_followups_IdentificationMark"><div class="ew-table-header-caption"><script id="tpc_view_followups_IdentificationMark" type="text/html"><?php echo $view_followups_list->IdentificationMark->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_followups_list->IdentificationMark->headerCellClass() ?>"><script id="tpc_view_followups_IdentificationMark" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->IdentificationMark) ?>', 1);"><div id="elh_view_followups_IdentificationMark" class="view_followups_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->IdentificationMark->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->IdentificationMark->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Religion->Visible) { // Religion ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $view_followups_list->Religion->headerCellClass() ?>"><div id="elh_view_followups_Religion" class="view_followups_Religion"><div class="ew-table-header-caption"><script id="tpc_view_followups_Religion" type="text/html"><?php echo $view_followups_list->Religion->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $view_followups_list->Religion->headerCellClass() ?>"><script id="tpc_view_followups_Religion" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Religion) ?>', 1);"><div id="elh_view_followups_Religion" class="view_followups_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Religion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Religion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Nationality->Visible) { // Nationality ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $view_followups_list->Nationality->headerCellClass() ?>"><div id="elh_view_followups_Nationality" class="view_followups_Nationality"><div class="ew-table-header-caption"><script id="tpc_view_followups_Nationality" type="text/html"><?php echo $view_followups_list->Nationality->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $view_followups_list->Nationality->headerCellClass() ?>"><script id="tpc_view_followups_Nationality" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Nationality) ?>', 1);"><div id="elh_view_followups_Nationality" class="view_followups_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Nationality->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Nationality->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->profilePic->Visible) { // profilePic ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_followups_list->profilePic->headerCellClass() ?>"><div id="elh_view_followups_profilePic" class="view_followups_profilePic"><div class="ew-table-header-caption"><script id="tpc_view_followups_profilePic" type="text/html"><?php echo $view_followups_list->profilePic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_followups_list->profilePic->headerCellClass() ?>"><script id="tpc_view_followups_profilePic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->profilePic) ?>', 1);"><div id="elh_view_followups_profilePic" class="view_followups_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->status->Visible) { // status ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_followups_list->status->headerCellClass() ?>"><div id="elh_view_followups_status" class="view_followups_status"><div class="ew-table-header-caption"><script id="tpc_view_followups_status" type="text/html"><?php echo $view_followups_list->status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_followups_list->status->headerCellClass() ?>"><script id="tpc_view_followups_status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->status) ?>', 1);"><div id="elh_view_followups_status" class="view_followups_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->createdby->Visible) { // createdby ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_followups_list->createdby->headerCellClass() ?>"><div id="elh_view_followups_createdby" class="view_followups_createdby"><div class="ew-table-header-caption"><script id="tpc_view_followups_createdby" type="text/html"><?php echo $view_followups_list->createdby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_followups_list->createdby->headerCellClass() ?>"><script id="tpc_view_followups_createdby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->createdby) ?>', 1);"><div id="elh_view_followups_createdby" class="view_followups_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_followups_list->createddatetime->headerCellClass() ?>"><div id="elh_view_followups_createddatetime" class="view_followups_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_followups_createddatetime" type="text/html"><?php echo $view_followups_list->createddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_followups_list->createddatetime->headerCellClass() ?>"><script id="tpc_view_followups_createddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->createddatetime) ?>', 1);"><div id="elh_view_followups_createddatetime" class="view_followups_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_followups_list->modifiedby->headerCellClass() ?>"><div id="elh_view_followups_modifiedby" class="view_followups_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_followups_modifiedby" type="text/html"><?php echo $view_followups_list->modifiedby->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_followups_list->modifiedby->headerCellClass() ?>"><script id="tpc_view_followups_modifiedby" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->modifiedby) ?>', 1);"><div id="elh_view_followups_modifiedby" class="view_followups_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_followups_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_followups_modifieddatetime" class="view_followups_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_followups_modifieddatetime" type="text/html"><?php echo $view_followups_list->modifieddatetime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_followups_list->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_followups_modifieddatetime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->modifieddatetime) ?>', 1);"><div id="elh_view_followups_modifieddatetime" class="view_followups_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_followups_list->ReferedByDr->headerCellClass() ?>"><div id="elh_view_followups_ReferedByDr" class="view_followups_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferedByDr" type="text/html"><?php echo $view_followups_list->ReferedByDr->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_followups_list->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_followups_ReferedByDr" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->ReferedByDr) ?>', 1);"><div id="elh_view_followups_ReferedByDr" class="view_followups_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_followups_list->ReferClinicname->headerCellClass() ?>"><div id="elh_view_followups_ReferClinicname" class="view_followups_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferClinicname" type="text/html"><?php echo $view_followups_list->ReferClinicname->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_followups_list->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_followups_ReferClinicname" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->ReferClinicname) ?>', 1);"><div id="elh_view_followups_ReferClinicname" class="view_followups_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_followups_list->ReferCity->headerCellClass() ?>"><div id="elh_view_followups_ReferCity" class="view_followups_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferCity" type="text/html"><?php echo $view_followups_list->ReferCity->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_followups_list->ReferCity->headerCellClass() ?>"><script id="tpc_view_followups_ReferCity" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->ReferCity) ?>', 1);"><div id="elh_view_followups_ReferCity" class="view_followups_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_followups_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_followups_ReferMobileNo" class="view_followups_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferMobileNo" type="text/html"><?php echo $view_followups_list->ReferMobileNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_followups_list->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_followups_ReferMobileNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->ReferMobileNo) ?>', 1);"><div id="elh_view_followups_ReferMobileNo" class="view_followups_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_followups_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_followups_ReferA4TreatingConsultant" class="view_followups_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferA4TreatingConsultant" type="text/html"><?php echo $view_followups_list->ReferA4TreatingConsultant->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_followups_list->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_followups_ReferA4TreatingConsultant" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_view_followups_ReferA4TreatingConsultant" class="view_followups_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_followups_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_followups_PurposreReferredfor" class="view_followups_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_followups_PurposreReferredfor" type="text/html"><?php echo $view_followups_list->PurposreReferredfor->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_followups_list->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_followups_PurposreReferredfor" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->PurposreReferredfor) ?>', 1);"><div id="elh_view_followups_PurposreReferredfor" class="view_followups_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_title->Visible) { // spouse_title ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $view_followups_list->spouse_title->headerCellClass() ?>"><div id="elh_view_followups_spouse_title" class="view_followups_spouse_title"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_title" type="text/html"><?php echo $view_followups_list->spouse_title->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $view_followups_list->spouse_title->headerCellClass() ?>"><script id="tpc_view_followups_spouse_title" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_title) ?>', 1);"><div id="elh_view_followups_spouse_title" class="view_followups_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_followups_list->spouse_first_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_first_name" class="view_followups_spouse_first_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_first_name" type="text/html"><?php echo $view_followups_list->spouse_first_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_followups_list->spouse_first_name->headerCellClass() ?>"><script id="tpc_view_followups_spouse_first_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_first_name) ?>', 1);"><div id="elh_view_followups_spouse_first_name" class="view_followups_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_middle_name) == "") { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_followups_list->spouse_middle_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_middle_name" class="view_followups_spouse_middle_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_middle_name" type="text/html"><?php echo $view_followups_list->spouse_middle_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_followups_list->spouse_middle_name->headerCellClass() ?>"><script id="tpc_view_followups_spouse_middle_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_middle_name) ?>', 1);"><div id="elh_view_followups_spouse_middle_name" class="view_followups_spouse_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_middle_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_middle_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_last_name->Visible) { // spouse_last_name ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_last_name) == "") { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_followups_list->spouse_last_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_last_name" class="view_followups_spouse_last_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_last_name" type="text/html"><?php echo $view_followups_list->spouse_last_name->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_followups_list->spouse_last_name->headerCellClass() ?>"><script id="tpc_view_followups_spouse_last_name" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_last_name) ?>', 1);"><div id="elh_view_followups_spouse_last_name" class="view_followups_spouse_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_last_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_last_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $view_followups_list->spouse_gender->headerCellClass() ?>"><div id="elh_view_followups_spouse_gender" class="view_followups_spouse_gender"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_gender" type="text/html"><?php echo $view_followups_list->spouse_gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $view_followups_list->spouse_gender->headerCellClass() ?>"><script id="tpc_view_followups_spouse_gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_gender) ?>', 1);"><div id="elh_view_followups_spouse_gender" class="view_followups_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_dob->Visible) { // spouse_dob ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_dob) == "") { ?>
		<th data-name="spouse_dob" class="<?php echo $view_followups_list->spouse_dob->headerCellClass() ?>"><div id="elh_view_followups_spouse_dob" class="view_followups_spouse_dob"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_dob" type="text/html"><?php echo $view_followups_list->spouse_dob->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_dob" class="<?php echo $view_followups_list->spouse_dob->headerCellClass() ?>"><script id="tpc_view_followups_spouse_dob" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_dob) ?>', 1);"><div id="elh_view_followups_spouse_dob" class="view_followups_spouse_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_Age->Visible) { // spouse_Age ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_Age) == "") { ?>
		<th data-name="spouse_Age" class="<?php echo $view_followups_list->spouse_Age->headerCellClass() ?>"><div id="elh_view_followups_spouse_Age" class="view_followups_spouse_Age"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_Age" type="text/html"><?php echo $view_followups_list->spouse_Age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_Age" class="<?php echo $view_followups_list->spouse_Age->headerCellClass() ?>"><script id="tpc_view_followups_spouse_Age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_Age) ?>', 1);"><div id="elh_view_followups_spouse_Age" class="view_followups_spouse_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_blood_group) == "") { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_followups_list->spouse_blood_group->headerCellClass() ?>"><div id="elh_view_followups_spouse_blood_group" class="view_followups_spouse_blood_group"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_blood_group" type="text/html"><?php echo $view_followups_list->spouse_blood_group->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_followups_list->spouse_blood_group->headerCellClass() ?>"><script id="tpc_view_followups_spouse_blood_group" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_blood_group) ?>', 1);"><div id="elh_view_followups_spouse_blood_group" class="view_followups_spouse_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_blood_group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_blood_group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_followups_list->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_followups_spouse_mobile_no" class="view_followups_spouse_mobile_no"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_mobile_no" type="text/html"><?php echo $view_followups_list->spouse_mobile_no->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_followups_list->spouse_mobile_no->headerCellClass() ?>"><script id="tpc_view_followups_spouse_mobile_no" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_mobile_no) ?>', 1);"><div id="elh_view_followups_spouse_mobile_no" class="view_followups_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Maritalstatus->Visible) { // Maritalstatus ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Maritalstatus) == "") { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_followups_list->Maritalstatus->headerCellClass() ?>"><div id="elh_view_followups_Maritalstatus" class="view_followups_Maritalstatus"><div class="ew-table-header-caption"><script id="tpc_view_followups_Maritalstatus" type="text/html"><?php echo $view_followups_list->Maritalstatus->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_followups_list->Maritalstatus->headerCellClass() ?>"><script id="tpc_view_followups_Maritalstatus" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Maritalstatus) ?>', 1);"><div id="elh_view_followups_Maritalstatus" class="view_followups_Maritalstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Maritalstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Maritalstatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Maritalstatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Business->Visible) { // Business ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Business) == "") { ?>
		<th data-name="Business" class="<?php echo $view_followups_list->Business->headerCellClass() ?>"><div id="elh_view_followups_Business" class="view_followups_Business"><div class="ew-table-header-caption"><script id="tpc_view_followups_Business" type="text/html"><?php echo $view_followups_list->Business->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Business" class="<?php echo $view_followups_list->Business->headerCellClass() ?>"><script id="tpc_view_followups_Business" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Business) ?>', 1);"><div id="elh_view_followups_Business" class="view_followups_Business">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Business->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Business->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Business->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $view_followups_list->Patient_Language->headerCellClass() ?>"><div id="elh_view_followups_Patient_Language" class="view_followups_Patient_Language"><div class="ew-table-header-caption"><script id="tpc_view_followups_Patient_Language" type="text/html"><?php echo $view_followups_list->Patient_Language->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $view_followups_list->Patient_Language->headerCellClass() ?>"><script id="tpc_view_followups_Patient_Language" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Patient_Language) ?>', 1);"><div id="elh_view_followups_Patient_Language" class="view_followups_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Patient_Language->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Patient_Language->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Patient_Language->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Passport->Visible) { // Passport ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $view_followups_list->Passport->headerCellClass() ?>"><div id="elh_view_followups_Passport" class="view_followups_Passport"><div class="ew-table-header-caption"><script id="tpc_view_followups_Passport" type="text/html"><?php echo $view_followups_list->Passport->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $view_followups_list->Passport->headerCellClass() ?>"><script id="tpc_view_followups_Passport" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Passport) ?>', 1);"><div id="elh_view_followups_Passport" class="view_followups_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Passport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Passport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->VisaNo->Visible) { // VisaNo ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $view_followups_list->VisaNo->headerCellClass() ?>"><div id="elh_view_followups_VisaNo" class="view_followups_VisaNo"><div class="ew-table-header-caption"><script id="tpc_view_followups_VisaNo" type="text/html"><?php echo $view_followups_list->VisaNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $view_followups_list->VisaNo->headerCellClass() ?>"><script id="tpc_view_followups_VisaNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->VisaNo) ?>', 1);"><div id="elh_view_followups_VisaNo" class="view_followups_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->VisaNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->VisaNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->ValidityOfVisa) == "") { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_followups_list->ValidityOfVisa->headerCellClass() ?>"><div id="elh_view_followups_ValidityOfVisa" class="view_followups_ValidityOfVisa"><div class="ew-table-header-caption"><script id="tpc_view_followups_ValidityOfVisa" type="text/html"><?php echo $view_followups_list->ValidityOfVisa->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_followups_list->ValidityOfVisa->headerCellClass() ?>"><script id="tpc_view_followups_ValidityOfVisa" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->ValidityOfVisa) ?>', 1);"><div id="elh_view_followups_ValidityOfVisa" class="view_followups_ValidityOfVisa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->ValidityOfVisa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->ValidityOfVisa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->ValidityOfVisa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_followups_list->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_followups_WhereDidYouHear" class="view_followups_WhereDidYouHear"><div class="ew-table-header-caption"><script id="tpc_view_followups_WhereDidYouHear" type="text/html"><?php echo $view_followups_list->WhereDidYouHear->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_followups_list->WhereDidYouHear->headerCellClass() ?>"><script id="tpc_view_followups_WhereDidYouHear" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->WhereDidYouHear) ?>', 1);"><div id="elh_view_followups_WhereDidYouHear" class="view_followups_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->WhereDidYouHear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->WhereDidYouHear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->HospID->Visible) { // HospID ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_followups_list->HospID->headerCellClass() ?>"><div id="elh_view_followups_HospID" class="view_followups_HospID"><div class="ew-table-header-caption"><script id="tpc_view_followups_HospID" type="text/html"><?php echo $view_followups_list->HospID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_followups_list->HospID->headerCellClass() ?>"><script id="tpc_view_followups_HospID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->HospID) ?>', 1);"><div id="elh_view_followups_HospID" class="view_followups_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->street->Visible) { // street ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_followups_list->street->headerCellClass() ?>"><div id="elh_view_followups_street" class="view_followups_street"><div class="ew-table-header-caption"><script id="tpc_view_followups_street" type="text/html"><?php echo $view_followups_list->street->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_followups_list->street->headerCellClass() ?>"><script id="tpc_view_followups_street" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->street) ?>', 1);"><div id="elh_view_followups_street" class="view_followups_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->town->Visible) { // town ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_followups_list->town->headerCellClass() ?>"><div id="elh_view_followups_town" class="view_followups_town"><div class="ew-table-header-caption"><script id="tpc_view_followups_town" type="text/html"><?php echo $view_followups_list->town->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_followups_list->town->headerCellClass() ?>"><script id="tpc_view_followups_town" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->town) ?>', 1);"><div id="elh_view_followups_town" class="view_followups_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->province->Visible) { // province ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $view_followups_list->province->headerCellClass() ?>"><div id="elh_view_followups_province" class="view_followups_province"><div class="ew-table-header-caption"><script id="tpc_view_followups_province" type="text/html"><?php echo $view_followups_list->province->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $view_followups_list->province->headerCellClass() ?>"><script id="tpc_view_followups_province" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->province) ?>', 1);"><div id="elh_view_followups_province" class="view_followups_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->country->Visible) { // country ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->country) == "") { ?>
		<th data-name="country" class="<?php echo $view_followups_list->country->headerCellClass() ?>"><div id="elh_view_followups_country" class="view_followups_country"><div class="ew-table-header-caption"><script id="tpc_view_followups_country" type="text/html"><?php echo $view_followups_list->country->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $view_followups_list->country->headerCellClass() ?>"><script id="tpc_view_followups_country" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->country) ?>', 1);"><div id="elh_view_followups_country" class="view_followups_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->country->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->country->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->postal_code->Visible) { // postal_code ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $view_followups_list->postal_code->headerCellClass() ?>"><div id="elh_view_followups_postal_code" class="view_followups_postal_code"><div class="ew-table-header-caption"><script id="tpc_view_followups_postal_code" type="text/html"><?php echo $view_followups_list->postal_code->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $view_followups_list->postal_code->headerCellClass() ?>"><script id="tpc_view_followups_postal_code" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->postal_code) ?>', 1);"><div id="elh_view_followups_postal_code" class="view_followups_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->PEmail->Visible) { // PEmail ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $view_followups_list->PEmail->headerCellClass() ?>"><div id="elh_view_followups_PEmail" class="view_followups_PEmail"><div class="ew-table-header-caption"><script id="tpc_view_followups_PEmail" type="text/html"><?php echo $view_followups_list->PEmail->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $view_followups_list->PEmail->headerCellClass() ?>"><script id="tpc_view_followups_PEmail" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->PEmail) ?>', 1);"><div id="elh_view_followups_PEmail" class="view_followups_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->PEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->PEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_followups_list->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_followups_PEmergencyContact" class="view_followups_PEmergencyContact"><div class="ew-table-header-caption"><script id="tpc_view_followups_PEmergencyContact" type="text/html"><?php echo $view_followups_list->PEmergencyContact->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_followups_list->PEmergencyContact->headerCellClass() ?>"><script id="tpc_view_followups_PEmergencyContact" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->PEmergencyContact) ?>', 1);"><div id="elh_view_followups_PEmergencyContact" class="view_followups_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->PEmergencyContact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->PEmergencyContact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->occupation->Visible) { // occupation ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->occupation) == "") { ?>
		<th data-name="occupation" class="<?php echo $view_followups_list->occupation->headerCellClass() ?>"><div id="elh_view_followups_occupation" class="view_followups_occupation"><div class="ew-table-header-caption"><script id="tpc_view_followups_occupation" type="text/html"><?php echo $view_followups_list->occupation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="occupation" class="<?php echo $view_followups_list->occupation->headerCellClass() ?>"><script id="tpc_view_followups_occupation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->occupation) ?>', 1);"><div id="elh_view_followups_occupation" class="view_followups_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->occupation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->occupation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->spouse_occupation->Visible) { // spouse_occupation ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->spouse_occupation) == "") { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_followups_list->spouse_occupation->headerCellClass() ?>"><div id="elh_view_followups_spouse_occupation" class="view_followups_spouse_occupation"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_occupation" type="text/html"><?php echo $view_followups_list->spouse_occupation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_followups_list->spouse_occupation->headerCellClass() ?>"><script id="tpc_view_followups_spouse_occupation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->spouse_occupation) ?>', 1);"><div id="elh_view_followups_spouse_occupation" class="view_followups_spouse_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->spouse_occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->spouse_occupation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->spouse_occupation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->WhatsApp->Visible) { // WhatsApp ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->WhatsApp) == "") { ?>
		<th data-name="WhatsApp" class="<?php echo $view_followups_list->WhatsApp->headerCellClass() ?>"><div id="elh_view_followups_WhatsApp" class="view_followups_WhatsApp"><div class="ew-table-header-caption"><script id="tpc_view_followups_WhatsApp" type="text/html"><?php echo $view_followups_list->WhatsApp->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="WhatsApp" class="<?php echo $view_followups_list->WhatsApp->headerCellClass() ?>"><script id="tpc_view_followups_WhatsApp" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->WhatsApp) ?>', 1);"><div id="elh_view_followups_WhatsApp" class="view_followups_WhatsApp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->WhatsApp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->WhatsApp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->WhatsApp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->CouppleID->Visible) { // CouppleID ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->CouppleID) == "") { ?>
		<th data-name="CouppleID" class="<?php echo $view_followups_list->CouppleID->headerCellClass() ?>"><div id="elh_view_followups_CouppleID" class="view_followups_CouppleID"><div class="ew-table-header-caption"><script id="tpc_view_followups_CouppleID" type="text/html"><?php echo $view_followups_list->CouppleID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CouppleID" class="<?php echo $view_followups_list->CouppleID->headerCellClass() ?>"><script id="tpc_view_followups_CouppleID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->CouppleID) ?>', 1);"><div id="elh_view_followups_CouppleID" class="view_followups_CouppleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->CouppleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->CouppleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->CouppleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->MaleID->Visible) { // MaleID ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->MaleID) == "") { ?>
		<th data-name="MaleID" class="<?php echo $view_followups_list->MaleID->headerCellClass() ?>"><div id="elh_view_followups_MaleID" class="view_followups_MaleID"><div class="ew-table-header-caption"><script id="tpc_view_followups_MaleID" type="text/html"><?php echo $view_followups_list->MaleID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="MaleID" class="<?php echo $view_followups_list->MaleID->headerCellClass() ?>"><script id="tpc_view_followups_MaleID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->MaleID) ?>', 1);"><div id="elh_view_followups_MaleID" class="view_followups_MaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->MaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->MaleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->MaleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->FemaleID->Visible) { // FemaleID ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->FemaleID) == "") { ?>
		<th data-name="FemaleID" class="<?php echo $view_followups_list->FemaleID->headerCellClass() ?>"><div id="elh_view_followups_FemaleID" class="view_followups_FemaleID"><div class="ew-table-header-caption"><script id="tpc_view_followups_FemaleID" type="text/html"><?php echo $view_followups_list->FemaleID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleID" class="<?php echo $view_followups_list->FemaleID->headerCellClass() ?>"><script id="tpc_view_followups_FemaleID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->FemaleID) ?>', 1);"><div id="elh_view_followups_FemaleID" class="view_followups_FemaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->FemaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->FemaleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->FemaleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->GroupID->Visible) { // GroupID ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $view_followups_list->GroupID->headerCellClass() ?>"><div id="elh_view_followups_GroupID" class="view_followups_GroupID"><div class="ew-table-header-caption"><script id="tpc_view_followups_GroupID" type="text/html"><?php echo $view_followups_list->GroupID->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $view_followups_list->GroupID->headerCellClass() ?>"><script id="tpc_view_followups_GroupID" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->GroupID) ?>', 1);"><div id="elh_view_followups_GroupID" class="view_followups_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->GroupID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->GroupID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups_list->Relationship->Visible) { // Relationship ?>
	<?php if ($view_followups_list->SortUrl($view_followups_list->Relationship) == "") { ?>
		<th data-name="Relationship" class="<?php echo $view_followups_list->Relationship->headerCellClass() ?>"><div id="elh_view_followups_Relationship" class="view_followups_Relationship"><div class="ew-table-header-caption"><script id="tpc_view_followups_Relationship" type="text/html"><?php echo $view_followups_list->Relationship->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Relationship" class="<?php echo $view_followups_list->Relationship->headerCellClass() ?>"><script id="tpc_view_followups_Relationship" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_followups_list->SortUrl($view_followups_list->Relationship) ?>', 1);"><div id="elh_view_followups_Relationship" class="view_followups_Relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups_list->Relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups_list->Relationship->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_followups_list->Relationship->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_followups_list->ListOptions->render("header", "right", "", "block", $view_followups->TableVar, "view_followupslist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_followups_list->ExportAll && $view_followups_list->isExport()) {
	$view_followups_list->StopRecord = $view_followups_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_followups_list->TotalRecords > $view_followups_list->StartRecord + $view_followups_list->DisplayRecords - 1)
		$view_followups_list->StopRecord = $view_followups_list->StartRecord + $view_followups_list->DisplayRecords - 1;
	else
		$view_followups_list->StopRecord = $view_followups_list->TotalRecords;
}
$view_followups_list->RecordCount = $view_followups_list->StartRecord - 1;
if ($view_followups_list->Recordset && !$view_followups_list->Recordset->EOF) {
	$view_followups_list->Recordset->moveFirst();
	$selectLimit = $view_followups_list->UseSelectLimit;
	if (!$selectLimit && $view_followups_list->StartRecord > 1)
		$view_followups_list->Recordset->move($view_followups_list->StartRecord - 1);
} elseif (!$view_followups->AllowAddDeleteRow && $view_followups_list->StopRecord == 0) {
	$view_followups_list->StopRecord = $view_followups->GridAddRowCount;
}

// Initialize aggregate
$view_followups->RowType = ROWTYPE_AGGREGATEINIT;
$view_followups->resetAttributes();
$view_followups_list->renderRow();
while ($view_followups_list->RecordCount < $view_followups_list->StopRecord) {
	$view_followups_list->RecordCount++;
	if ($view_followups_list->RecordCount >= $view_followups_list->StartRecord) {
		$view_followups_list->RowCount++;

		// Set up key count
		$view_followups_list->KeyCount = $view_followups_list->RowIndex;

		// Init row class and style
		$view_followups->resetAttributes();
		$view_followups->CssClass = "";
		if ($view_followups_list->isGridAdd()) {
		} else {
			$view_followups_list->loadRowValues($view_followups_list->Recordset); // Load row values
		}
		$view_followups->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_followups->RowAttrs->merge(["data-rowindex" => $view_followups_list->RowCount, "id" => "r" . $view_followups_list->RowCount . "_view_followups", "data-rowtype" => $view_followups->RowType]);

		// Render row
		$view_followups_list->renderRow();

		// Render list options
		$view_followups_list->renderListOptions();

		// Save row and cell attributes
		$view_followups_list->Attrs[$view_followups_list->RowCount] = ["row_attrs" => $view_followups->rowAttributes(), "cell_attrs" => []];
		$view_followups_list->Attrs[$view_followups_list->RowCount]["cell_attrs"] = $view_followups->fieldCellAttributes();
?>
	<tr <?php echo $view_followups->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_followups_list->ListOptions->render("body", "left", $view_followups_list->RowCount, "block", $view_followups->TableVar, "view_followupslist");
?>
	<?php if ($view_followups_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_followups_list->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_id" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_id">
<span<?php echo $view_followups_list->id->viewAttributes() ?>><?php echo $view_followups_list->id->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_followups_list->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_PatientID" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_PatientID">
<span<?php echo $view_followups_list->PatientID->viewAttributes() ?>><?php echo $view_followups_list->PatientID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->title->Visible) { // title ?>
		<td data-name="title" <?php echo $view_followups_list->title->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_title" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_title">
<span<?php echo $view_followups_list->title->viewAttributes() ?>><?php echo $view_followups_list->title->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $view_followups_list->first_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_first_name" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_first_name">
<span<?php echo $view_followups_list->first_name->viewAttributes() ?>><?php echo $view_followups_list->first_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name" <?php echo $view_followups_list->middle_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_middle_name" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_middle_name">
<span<?php echo $view_followups_list->middle_name->viewAttributes() ?>><?php echo $view_followups_list->middle_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->last_name->Visible) { // last_name ?>
		<td data-name="last_name" <?php echo $view_followups_list->last_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_last_name" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_last_name">
<span<?php echo $view_followups_list->last_name->viewAttributes() ?>><?php echo $view_followups_list->last_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_followups_list->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_gender" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_gender">
<span<?php echo $view_followups_list->gender->viewAttributes() ?>><?php echo $view_followups_list->gender->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->dob->Visible) { // dob ?>
		<td data-name="dob" <?php echo $view_followups_list->dob->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_dob" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_dob">
<span<?php echo $view_followups_list->dob->viewAttributes() ?>><?php echo $view_followups_list->dob->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_followups_list->Age->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Age" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Age">
<span<?php echo $view_followups_list->Age->viewAttributes() ?>><?php echo $view_followups_list->Age->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group" <?php echo $view_followups_list->blood_group->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_blood_group" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_blood_group">
<span<?php echo $view_followups_list->blood_group->viewAttributes() ?>><?php echo $view_followups_list->blood_group->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $view_followups_list->mobile_no->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_mobile_no" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_mobile_no">
<span<?php echo $view_followups_list->mobile_no->viewAttributes() ?>><?php echo $view_followups_list->mobile_no->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark" <?php echo $view_followups_list->IdentificationMark->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_IdentificationMark" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_IdentificationMark">
<span<?php echo $view_followups_list->IdentificationMark->viewAttributes() ?>><?php echo $view_followups_list->IdentificationMark->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Religion->Visible) { // Religion ?>
		<td data-name="Religion" <?php echo $view_followups_list->Religion->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Religion" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Religion">
<span<?php echo $view_followups_list->Religion->viewAttributes() ?>><?php echo $view_followups_list->Religion->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality" <?php echo $view_followups_list->Nationality->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Nationality" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Nationality">
<span<?php echo $view_followups_list->Nationality->viewAttributes() ?>><?php echo $view_followups_list->Nationality->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $view_followups_list->profilePic->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_profilePic" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_profilePic">
<span<?php echo $view_followups_list->profilePic->viewAttributes() ?>><?php echo $view_followups_list->profilePic->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_followups_list->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_status" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_status">
<span<?php echo $view_followups_list->status->viewAttributes() ?>><?php echo $view_followups_list->status->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_followups_list->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_createdby" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_createdby">
<span<?php echo $view_followups_list->createdby->viewAttributes() ?>><?php echo $view_followups_list->createdby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_followups_list->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_createddatetime" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_createddatetime">
<span<?php echo $view_followups_list->createddatetime->viewAttributes() ?>><?php echo $view_followups_list->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_followups_list->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_modifiedby" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_modifiedby">
<span<?php echo $view_followups_list->modifiedby->viewAttributes() ?>><?php echo $view_followups_list->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_followups_list->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_modifieddatetime" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_modifieddatetime">
<span<?php echo $view_followups_list->modifieddatetime->viewAttributes() ?>><?php echo $view_followups_list->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $view_followups_list->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_ReferedByDr" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_ReferedByDr">
<span<?php echo $view_followups_list->ReferedByDr->viewAttributes() ?>><?php echo $view_followups_list->ReferedByDr->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $view_followups_list->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_ReferClinicname" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_ReferClinicname">
<span<?php echo $view_followups_list->ReferClinicname->viewAttributes() ?>><?php echo $view_followups_list->ReferClinicname->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $view_followups_list->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_ReferCity" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_ReferCity">
<span<?php echo $view_followups_list->ReferCity->viewAttributes() ?>><?php echo $view_followups_list->ReferCity->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $view_followups_list->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_ReferMobileNo" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_ReferMobileNo">
<span<?php echo $view_followups_list->ReferMobileNo->viewAttributes() ?>><?php echo $view_followups_list->ReferMobileNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_followups_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_ReferA4TreatingConsultant" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_ReferA4TreatingConsultant">
<span<?php echo $view_followups_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_followups_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $view_followups_list->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_PurposreReferredfor" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_PurposreReferredfor">
<span<?php echo $view_followups_list->PurposreReferredfor->viewAttributes() ?>><?php echo $view_followups_list->PurposreReferredfor->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title" <?php echo $view_followups_list->spouse_title->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_title" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_title">
<span<?php echo $view_followups_list->spouse_title->viewAttributes() ?>><?php echo $view_followups_list->spouse_title->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name" <?php echo $view_followups_list->spouse_first_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_first_name" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_first_name">
<span<?php echo $view_followups_list->spouse_first_name->viewAttributes() ?>><?php echo $view_followups_list->spouse_first_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td data-name="spouse_middle_name" <?php echo $view_followups_list->spouse_middle_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_middle_name" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_middle_name">
<span<?php echo $view_followups_list->spouse_middle_name->viewAttributes() ?>><?php echo $view_followups_list->spouse_middle_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_last_name->Visible) { // spouse_last_name ?>
		<td data-name="spouse_last_name" <?php echo $view_followups_list->spouse_last_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_last_name" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_last_name">
<span<?php echo $view_followups_list->spouse_last_name->viewAttributes() ?>><?php echo $view_followups_list->spouse_last_name->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender" <?php echo $view_followups_list->spouse_gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_gender" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_gender">
<span<?php echo $view_followups_list->spouse_gender->viewAttributes() ?>><?php echo $view_followups_list->spouse_gender->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_dob->Visible) { // spouse_dob ?>
		<td data-name="spouse_dob" <?php echo $view_followups_list->spouse_dob->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_dob" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_dob">
<span<?php echo $view_followups_list->spouse_dob->viewAttributes() ?>><?php echo $view_followups_list->spouse_dob->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_Age->Visible) { // spouse_Age ?>
		<td data-name="spouse_Age" <?php echo $view_followups_list->spouse_Age->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_Age" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_Age">
<span<?php echo $view_followups_list->spouse_Age->viewAttributes() ?>><?php echo $view_followups_list->spouse_Age->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td data-name="spouse_blood_group" <?php echo $view_followups_list->spouse_blood_group->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_blood_group" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_blood_group">
<span<?php echo $view_followups_list->spouse_blood_group->viewAttributes() ?>><?php echo $view_followups_list->spouse_blood_group->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no" <?php echo $view_followups_list->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_mobile_no" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_mobile_no">
<span<?php echo $view_followups_list->spouse_mobile_no->viewAttributes() ?>><?php echo $view_followups_list->spouse_mobile_no->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Maritalstatus->Visible) { // Maritalstatus ?>
		<td data-name="Maritalstatus" <?php echo $view_followups_list->Maritalstatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Maritalstatus" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Maritalstatus">
<span<?php echo $view_followups_list->Maritalstatus->viewAttributes() ?>><?php echo $view_followups_list->Maritalstatus->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Business->Visible) { // Business ?>
		<td data-name="Business" <?php echo $view_followups_list->Business->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Business" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Business">
<span<?php echo $view_followups_list->Business->viewAttributes() ?>><?php echo $view_followups_list->Business->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language" <?php echo $view_followups_list->Patient_Language->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Patient_Language" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Patient_Language">
<span<?php echo $view_followups_list->Patient_Language->viewAttributes() ?>><?php echo $view_followups_list->Patient_Language->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Passport->Visible) { // Passport ?>
		<td data-name="Passport" <?php echo $view_followups_list->Passport->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Passport" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Passport">
<span<?php echo $view_followups_list->Passport->viewAttributes() ?>><?php echo $view_followups_list->Passport->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo" <?php echo $view_followups_list->VisaNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_VisaNo" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_VisaNo">
<span<?php echo $view_followups_list->VisaNo->viewAttributes() ?>><?php echo $view_followups_list->VisaNo->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td data-name="ValidityOfVisa" <?php echo $view_followups_list->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_ValidityOfVisa" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_ValidityOfVisa">
<span<?php echo $view_followups_list->ValidityOfVisa->viewAttributes() ?>><?php echo $view_followups_list->ValidityOfVisa->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear" <?php echo $view_followups_list->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_WhereDidYouHear" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_WhereDidYouHear">
<span<?php echo $view_followups_list->WhereDidYouHear->viewAttributes() ?>><?php echo $view_followups_list->WhereDidYouHear->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_followups_list->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_HospID" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_HospID">
<span<?php echo $view_followups_list->HospID->viewAttributes() ?>><?php echo $view_followups_list->HospID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $view_followups_list->street->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_street" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_street">
<span<?php echo $view_followups_list->street->viewAttributes() ?>><?php echo $view_followups_list->street->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $view_followups_list->town->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_town" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_town">
<span<?php echo $view_followups_list->town->viewAttributes() ?>><?php echo $view_followups_list->town->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $view_followups_list->province->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_province" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_province">
<span<?php echo $view_followups_list->province->viewAttributes() ?>><?php echo $view_followups_list->province->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->country->Visible) { // country ?>
		<td data-name="country" <?php echo $view_followups_list->country->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_country" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_country">
<span<?php echo $view_followups_list->country->viewAttributes() ?>><?php echo $view_followups_list->country->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $view_followups_list->postal_code->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_postal_code" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_postal_code">
<span<?php echo $view_followups_list->postal_code->viewAttributes() ?>><?php echo $view_followups_list->postal_code->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail" <?php echo $view_followups_list->PEmail->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_PEmail" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_PEmail">
<span<?php echo $view_followups_list->PEmail->viewAttributes() ?>><?php echo $view_followups_list->PEmail->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact" <?php echo $view_followups_list->PEmergencyContact->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_PEmergencyContact" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_PEmergencyContact">
<span<?php echo $view_followups_list->PEmergencyContact->viewAttributes() ?>><?php echo $view_followups_list->PEmergencyContact->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->occupation->Visible) { // occupation ?>
		<td data-name="occupation" <?php echo $view_followups_list->occupation->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_occupation" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_occupation">
<span<?php echo $view_followups_list->occupation->viewAttributes() ?>><?php echo $view_followups_list->occupation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->spouse_occupation->Visible) { // spouse_occupation ?>
		<td data-name="spouse_occupation" <?php echo $view_followups_list->spouse_occupation->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_occupation" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_spouse_occupation">
<span<?php echo $view_followups_list->spouse_occupation->viewAttributes() ?>><?php echo $view_followups_list->spouse_occupation->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->WhatsApp->Visible) { // WhatsApp ?>
		<td data-name="WhatsApp" <?php echo $view_followups_list->WhatsApp->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_WhatsApp" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_WhatsApp">
<span<?php echo $view_followups_list->WhatsApp->viewAttributes() ?>><?php echo $view_followups_list->WhatsApp->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->CouppleID->Visible) { // CouppleID ?>
		<td data-name="CouppleID" <?php echo $view_followups_list->CouppleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_CouppleID" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_CouppleID">
<span<?php echo $view_followups_list->CouppleID->viewAttributes() ?>><?php echo $view_followups_list->CouppleID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->MaleID->Visible) { // MaleID ?>
		<td data-name="MaleID" <?php echo $view_followups_list->MaleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_MaleID" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_MaleID">
<span<?php echo $view_followups_list->MaleID->viewAttributes() ?>><?php echo $view_followups_list->MaleID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->FemaleID->Visible) { // FemaleID ?>
		<td data-name="FemaleID" <?php echo $view_followups_list->FemaleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_FemaleID" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_FemaleID">
<span<?php echo $view_followups_list->FemaleID->viewAttributes() ?>><?php echo $view_followups_list->FemaleID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID" <?php echo $view_followups_list->GroupID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_GroupID" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_GroupID">
<span<?php echo $view_followups_list->GroupID->viewAttributes() ?>><?php echo $view_followups_list->GroupID->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
	<?php if ($view_followups_list->Relationship->Visible) { // Relationship ?>
		<td data-name="Relationship" <?php echo $view_followups_list->Relationship->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCount ?>_view_followups_Relationship" type="text/html"><span id="el<?php echo $view_followups_list->RowCount ?>_view_followups_Relationship">
<span<?php echo $view_followups_list->Relationship->viewAttributes() ?>><?php echo $view_followups_list->Relationship->getViewValue() ?></span>
</span></script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_followups_list->ListOptions->render("body", "right", $view_followups_list->RowCount, "block", $view_followups->TableVar, "view_followupslist");
?>
	</tr>
<?php
	}
	if (!$view_followups_list->isGridAdd())
		$view_followups_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_followupslist" class="ew-custom-template"></div>
<script id="tpm_view_followupslist" type="text/html">
<div id="ct_view_followups_list"><?php if ($view_followups_list->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			<td>Follow up</td>
			<td>{{include tmpl=~getTemplate("#tpc_view_followups_PatientID")/}}</td>
			<td>{{include tmpl=~getTemplate("#tpc_view_followups_first_name")/}}</td>
			<td>{{include tmpl=~getTemplate("#tpc_view_followups_mobile_no")/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_followups_list->StartRowCount; $i <= $view_followups_list->RowCount; $i++) { ?>
 <tr<?php echo @$view_followups_list->Attrs[$i]['row_attrs'] ?>> 
			<td>
<a href='ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name={{: ~root.rows[<?php echo $i - 1 ?>].id }}' class="faa-parent animated-hover">
				<i class="fa fa-edit faa-tada fa-2x" style="color:green"></i>
 </a>
			</td>
			<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_followups_PatientID")/}}</td>
			<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_followups_first_name")/}}</td>
			<td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_view_followups_mobile_no")/}}</td>
 </tr> 

<?php } ?>
</tbody></table>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_followups->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_followups_list->Recordset)
	$view_followups_list->Recordset->Close();
?>
<?php if (!$view_followups_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_followups_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_followups_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_followups_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_followups_list->TotalRecords == 0 && !$view_followups->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_followups_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_followups->Rows) ?> };
	ew.applyTemplate("tpd_view_followupslist", "tpm_view_followupslist", "view_followupslist", "<?php echo $view_followups->CustomExport ?>", ew.templateData);
	$("#tpd_view_followupslist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_view_followupslist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.view_followupslist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_followups_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_followups_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_followups->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_followups",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_followups_list->terminate();
?>