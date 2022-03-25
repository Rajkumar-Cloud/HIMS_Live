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
$doctors_list = new doctors_list();

// Run the page
$doctors_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$doctors_list->isExport()) { ?>
<script>
var fdoctorslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fdoctorslist = currentForm = new ew.Form("fdoctorslist", "list");
	fdoctorslist.formKeyCountName = '<?php echo $doctors_list->FormKeyCountName ?>';
	loadjs.done("fdoctorslist");
});
var fdoctorslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fdoctorslistsrch = currentSearchForm = new ew.Form("fdoctorslistsrch");

	// Validate function for search
	fdoctorslistsrch.validate = function(fobj) {
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
	fdoctorslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdoctorslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fdoctorslistsrch.filterList = <?php echo $doctors_list->getFilterList() ?>;
	loadjs.done("fdoctorslistsrch");
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
<?php if (!$doctors_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($doctors_list->TotalRecords > 0 && $doctors_list->ExportOptions->visible()) { ?>
<?php $doctors_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($doctors_list->ImportOptions->visible()) { ?>
<?php $doctors_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($doctors_list->SearchOptions->visible()) { ?>
<?php $doctors_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($doctors_list->FilterOptions->visible()) { ?>
<?php $doctors_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$doctors_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$doctors_list->isExport() && !$doctors->CurrentAction) { ?>
<form name="fdoctorslistsrch" id="fdoctorslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fdoctorslistsrch-search-panel" class="<?php echo $doctors_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="doctors">
	<div class="ew-extended-search">
<?php

// Render search row
$doctors->RowType = ROWTYPE_SEARCH;
$doctors->resetAttributes();
$doctors_list->renderRow();
?>
<?php if ($doctors_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php
		$doctors_list->SearchColumnCount++;
		if (($doctors_list->SearchColumnCount - 1) % $doctors_list->SearchFieldsPerRow == 0) {
			$doctors_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $doctors_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $doctors_list->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
		<span id="el_doctors_DEPARTMENT" class="ew-search-field">
<input type="text" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors_list->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $doctors_list->DEPARTMENT->EditValue ?>"<?php echo $doctors_list->DEPARTMENT->editAttributes() ?>>
</span>
	</div>
	<?php if ($doctors_list->SearchColumnCount % $doctors_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($doctors_list->SearchColumnCount % $doctors_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $doctors_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($doctors_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($doctors_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $doctors_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $doctors_list->showPageHeader(); ?>
<?php
$doctors_list->showMessage();
?>
<?php if ($doctors_list->TotalRecords > 0 || $doctors->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($doctors_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> doctors">
<?php if (!$doctors_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$doctors_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $doctors_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $doctors_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdoctorslist" id="fdoctorslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<div id="gmp_doctors" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($doctors_list->TotalRecords > 0 || $doctors_list->isGridEdit()) { ?>
<table id="tbl_doctorslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$doctors->RowType = ROWTYPE_HEADER;

// Render list options
$doctors_list->renderListOptions();

// Render list options (header, left)
$doctors_list->ListOptions->render("header", "left");
?>
<?php if ($doctors_list->id->Visible) { // id ?>
	<?php if ($doctors_list->SortUrl($doctors_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $doctors_list->id->headerCellClass() ?>"><div id="elh_doctors_id" class="doctors_id"><div class="ew-table-header-caption"><?php echo $doctors_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $doctors_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->id) ?>', 1);"><div id="elh_doctors_id" class="doctors_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->CODE->Visible) { // CODE ?>
	<?php if ($doctors_list->SortUrl($doctors_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $doctors_list->CODE->headerCellClass() ?>"><div id="elh_doctors_CODE" class="doctors_CODE"><div class="ew-table-header-caption"><?php echo $doctors_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $doctors_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->CODE) ?>', 1);"><div id="elh_doctors_CODE" class="doctors_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->NAME->Visible) { // NAME ?>
	<?php if ($doctors_list->SortUrl($doctors_list->NAME) == "") { ?>
		<th data-name="NAME" class="<?php echo $doctors_list->NAME->headerCellClass() ?>"><div id="elh_doctors_NAME" class="doctors_NAME"><div class="ew-table-header-caption"><?php echo $doctors_list->NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NAME" class="<?php echo $doctors_list->NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->NAME) ?>', 1);"><div id="elh_doctors_NAME" class="doctors_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->NAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->NAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($doctors_list->SortUrl($doctors_list->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $doctors_list->DEPARTMENT->headerCellClass() ?>"><div id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $doctors_list->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $doctors_list->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->DEPARTMENT) ?>', 1);"><div id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->DEPARTMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->DEPARTMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->start_time->Visible) { // start_time ?>
	<?php if ($doctors_list->SortUrl($doctors_list->start_time) == "") { ?>
		<th data-name="start_time" class="<?php echo $doctors_list->start_time->headerCellClass() ?>"><div id="elh_doctors_start_time" class="doctors_start_time"><div class="ew-table-header-caption"><?php echo $doctors_list->start_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time" class="<?php echo $doctors_list->start_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->start_time) ?>', 1);"><div id="elh_doctors_start_time" class="doctors_start_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->start_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->start_time->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->start_time->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->end_time->Visible) { // end_time ?>
	<?php if ($doctors_list->SortUrl($doctors_list->end_time) == "") { ?>
		<th data-name="end_time" class="<?php echo $doctors_list->end_time->headerCellClass() ?>"><div id="elh_doctors_end_time" class="doctors_end_time"><div class="ew-table-header-caption"><?php echo $doctors_list->end_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time" class="<?php echo $doctors_list->end_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->end_time) ?>', 1);"><div id="elh_doctors_end_time" class="doctors_end_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->end_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->end_time->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->end_time->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->start_time1->Visible) { // start_time1 ?>
	<?php if ($doctors_list->SortUrl($doctors_list->start_time1) == "") { ?>
		<th data-name="start_time1" class="<?php echo $doctors_list->start_time1->headerCellClass() ?>"><div id="elh_doctors_start_time1" class="doctors_start_time1"><div class="ew-table-header-caption"><?php echo $doctors_list->start_time1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time1" class="<?php echo $doctors_list->start_time1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->start_time1) ?>', 1);"><div id="elh_doctors_start_time1" class="doctors_start_time1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->start_time1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->start_time1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->start_time1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->end_time1->Visible) { // end_time1 ?>
	<?php if ($doctors_list->SortUrl($doctors_list->end_time1) == "") { ?>
		<th data-name="end_time1" class="<?php echo $doctors_list->end_time1->headerCellClass() ?>"><div id="elh_doctors_end_time1" class="doctors_end_time1"><div class="ew-table-header-caption"><?php echo $doctors_list->end_time1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time1" class="<?php echo $doctors_list->end_time1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->end_time1) ?>', 1);"><div id="elh_doctors_end_time1" class="doctors_end_time1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->end_time1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->end_time1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->end_time1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->start_time2->Visible) { // start_time2 ?>
	<?php if ($doctors_list->SortUrl($doctors_list->start_time2) == "") { ?>
		<th data-name="start_time2" class="<?php echo $doctors_list->start_time2->headerCellClass() ?>"><div id="elh_doctors_start_time2" class="doctors_start_time2"><div class="ew-table-header-caption"><?php echo $doctors_list->start_time2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time2" class="<?php echo $doctors_list->start_time2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->start_time2) ?>', 1);"><div id="elh_doctors_start_time2" class="doctors_start_time2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->start_time2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->start_time2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->start_time2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->end_time2->Visible) { // end_time2 ?>
	<?php if ($doctors_list->SortUrl($doctors_list->end_time2) == "") { ?>
		<th data-name="end_time2" class="<?php echo $doctors_list->end_time2->headerCellClass() ?>"><div id="elh_doctors_end_time2" class="doctors_end_time2"><div class="ew-table-header-caption"><?php echo $doctors_list->end_time2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time2" class="<?php echo $doctors_list->end_time2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->end_time2) ?>', 1);"><div id="elh_doctors_end_time2" class="doctors_end_time2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->end_time2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->end_time2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->end_time2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->slot_time->Visible) { // slot_time ?>
	<?php if ($doctors_list->SortUrl($doctors_list->slot_time) == "") { ?>
		<th data-name="slot_time" class="<?php echo $doctors_list->slot_time->headerCellClass() ?>"><div id="elh_doctors_slot_time" class="doctors_slot_time"><div class="ew-table-header-caption"><?php echo $doctors_list->slot_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="slot_time" class="<?php echo $doctors_list->slot_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->slot_time) ?>', 1);"><div id="elh_doctors_slot_time" class="doctors_slot_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->slot_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->slot_time->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->slot_time->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->Fees->Visible) { // Fees ?>
	<?php if ($doctors_list->SortUrl($doctors_list->Fees) == "") { ?>
		<th data-name="Fees" class="<?php echo $doctors_list->Fees->headerCellClass() ?>"><div id="elh_doctors_Fees" class="doctors_Fees"><div class="ew-table-header-caption"><?php echo $doctors_list->Fees->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fees" class="<?php echo $doctors_list->Fees->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->Fees) ?>', 1);"><div id="elh_doctors_Fees" class="doctors_Fees">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->Fees->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->Fees->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->Fees->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->slot_days->Visible) { // slot_days ?>
	<?php if ($doctors_list->SortUrl($doctors_list->slot_days) == "") { ?>
		<th data-name="slot_days" class="<?php echo $doctors_list->slot_days->headerCellClass() ?>"><div id="elh_doctors_slot_days" class="doctors_slot_days"><div class="ew-table-header-caption"><?php echo $doctors_list->slot_days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="slot_days" class="<?php echo $doctors_list->slot_days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->slot_days) ?>', 1);"><div id="elh_doctors_slot_days" class="doctors_slot_days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->slot_days->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->slot_days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->slot_days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->Status->Visible) { // Status ?>
	<?php if ($doctors_list->SortUrl($doctors_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $doctors_list->Status->headerCellClass() ?>"><div id="elh_doctors_Status" class="doctors_Status"><div class="ew-table-header-caption"><?php echo $doctors_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $doctors_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->Status) ?>', 1);"><div id="elh_doctors_Status" class="doctors_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($doctors_list->SortUrl($doctors_list->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $doctors_list->scheduler_id->headerCellClass() ?>"><div id="elh_doctors_scheduler_id" class="doctors_scheduler_id"><div class="ew-table-header-caption"><?php echo $doctors_list->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $doctors_list->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->scheduler_id) ?>', 1);"><div id="elh_doctors_scheduler_id" class="doctors_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->scheduler_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->scheduler_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->scheduler_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->HospID->Visible) { // HospID ?>
	<?php if ($doctors_list->SortUrl($doctors_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $doctors_list->HospID->headerCellClass() ?>"><div id="elh_doctors_HospID" class="doctors_HospID"><div class="ew-table-header-caption"><?php echo $doctors_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $doctors_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->HospID) ?>', 1);"><div id="elh_doctors_HospID" class="doctors_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors_list->Designation->Visible) { // Designation ?>
	<?php if ($doctors_list->SortUrl($doctors_list->Designation) == "") { ?>
		<th data-name="Designation" class="<?php echo $doctors_list->Designation->headerCellClass() ?>"><div id="elh_doctors_Designation" class="doctors_Designation"><div class="ew-table-header-caption"><?php echo $doctors_list->Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Designation" class="<?php echo $doctors_list->Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $doctors_list->SortUrl($doctors_list->Designation) ?>', 1);"><div id="elh_doctors_Designation" class="doctors_Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors_list->Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors_list->Designation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($doctors_list->Designation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$doctors_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($doctors_list->ExportAll && $doctors_list->isExport()) {
	$doctors_list->StopRecord = $doctors_list->TotalRecords;
} else {

	// Set the last record to display
	if ($doctors_list->TotalRecords > $doctors_list->StartRecord + $doctors_list->DisplayRecords - 1)
		$doctors_list->StopRecord = $doctors_list->StartRecord + $doctors_list->DisplayRecords - 1;
	else
		$doctors_list->StopRecord = $doctors_list->TotalRecords;
}
$doctors_list->RecordCount = $doctors_list->StartRecord - 1;
if ($doctors_list->Recordset && !$doctors_list->Recordset->EOF) {
	$doctors_list->Recordset->moveFirst();
	$selectLimit = $doctors_list->UseSelectLimit;
	if (!$selectLimit && $doctors_list->StartRecord > 1)
		$doctors_list->Recordset->move($doctors_list->StartRecord - 1);
} elseif (!$doctors->AllowAddDeleteRow && $doctors_list->StopRecord == 0) {
	$doctors_list->StopRecord = $doctors->GridAddRowCount;
}

// Initialize aggregate
$doctors->RowType = ROWTYPE_AGGREGATEINIT;
$doctors->resetAttributes();
$doctors_list->renderRow();
while ($doctors_list->RecordCount < $doctors_list->StopRecord) {
	$doctors_list->RecordCount++;
	if ($doctors_list->RecordCount >= $doctors_list->StartRecord) {
		$doctors_list->RowCount++;

		// Set up key count
		$doctors_list->KeyCount = $doctors_list->RowIndex;

		// Init row class and style
		$doctors->resetAttributes();
		$doctors->CssClass = "";
		if ($doctors_list->isGridAdd()) {
		} else {
			$doctors_list->loadRowValues($doctors_list->Recordset); // Load row values
		}
		$doctors->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$doctors->RowAttrs->merge(["data-rowindex" => $doctors_list->RowCount, "id" => "r" . $doctors_list->RowCount . "_doctors", "data-rowtype" => $doctors->RowType]);

		// Render row
		$doctors_list->renderRow();

		// Render list options
		$doctors_list->renderListOptions();
?>
	<tr <?php echo $doctors->rowAttributes() ?>>
<?php

// Render list options (body, left)
$doctors_list->ListOptions->render("body", "left", $doctors_list->RowCount);
?>
	<?php if ($doctors_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $doctors_list->id->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_id">
<span<?php echo $doctors_list->id->viewAttributes() ?>><?php echo $doctors_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $doctors_list->CODE->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_CODE">
<span<?php echo $doctors_list->CODE->viewAttributes() ?>><?php echo $doctors_list->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->NAME->Visible) { // NAME ?>
		<td data-name="NAME" <?php echo $doctors_list->NAME->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_NAME">
<span<?php echo $doctors_list->NAME->viewAttributes() ?>><?php echo $doctors_list->NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" <?php echo $doctors_list->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_DEPARTMENT">
<span<?php echo $doctors_list->DEPARTMENT->viewAttributes() ?>><?php echo $doctors_list->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->start_time->Visible) { // start_time ?>
		<td data-name="start_time" <?php echo $doctors_list->start_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_start_time">
<span<?php echo $doctors_list->start_time->viewAttributes() ?>><?php echo $doctors_list->start_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->end_time->Visible) { // end_time ?>
		<td data-name="end_time" <?php echo $doctors_list->end_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_end_time">
<span<?php echo $doctors_list->end_time->viewAttributes() ?>><?php echo $doctors_list->end_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->start_time1->Visible) { // start_time1 ?>
		<td data-name="start_time1" <?php echo $doctors_list->start_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_start_time1">
<span<?php echo $doctors_list->start_time1->viewAttributes() ?>><?php echo $doctors_list->start_time1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->end_time1->Visible) { // end_time1 ?>
		<td data-name="end_time1" <?php echo $doctors_list->end_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_end_time1">
<span<?php echo $doctors_list->end_time1->viewAttributes() ?>><?php echo $doctors_list->end_time1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->start_time2->Visible) { // start_time2 ?>
		<td data-name="start_time2" <?php echo $doctors_list->start_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_start_time2">
<span<?php echo $doctors_list->start_time2->viewAttributes() ?>><?php echo $doctors_list->start_time2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->end_time2->Visible) { // end_time2 ?>
		<td data-name="end_time2" <?php echo $doctors_list->end_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_end_time2">
<span<?php echo $doctors_list->end_time2->viewAttributes() ?>><?php echo $doctors_list->end_time2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->slot_time->Visible) { // slot_time ?>
		<td data-name="slot_time" <?php echo $doctors_list->slot_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_slot_time">
<span<?php echo $doctors_list->slot_time->viewAttributes() ?>><?php echo $doctors_list->slot_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->Fees->Visible) { // Fees ?>
		<td data-name="Fees" <?php echo $doctors_list->Fees->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_Fees">
<span<?php echo $doctors_list->Fees->viewAttributes() ?>><?php echo $doctors_list->Fees->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->slot_days->Visible) { // slot_days ?>
		<td data-name="slot_days" <?php echo $doctors_list->slot_days->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_slot_days">
<span<?php echo $doctors_list->slot_days->viewAttributes() ?>><?php echo $doctors_list->slot_days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $doctors_list->Status->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_Status">
<span<?php echo $doctors_list->Status->viewAttributes() ?>><?php echo $doctors_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id" <?php echo $doctors_list->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_scheduler_id">
<span<?php echo $doctors_list->scheduler_id->viewAttributes() ?>><?php echo $doctors_list->scheduler_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $doctors_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_HospID">
<span<?php echo $doctors_list->HospID->viewAttributes() ?>><?php echo $doctors_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors_list->Designation->Visible) { // Designation ?>
		<td data-name="Designation" <?php echo $doctors_list->Designation->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCount ?>_doctors_Designation">
<span<?php echo $doctors_list->Designation->viewAttributes() ?>><?php echo $doctors_list->Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$doctors_list->ListOptions->render("body", "right", $doctors_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$doctors_list->isGridAdd())
		$doctors_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$doctors->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($doctors_list->Recordset)
	$doctors_list->Recordset->Close();
?>
<?php if (!$doctors_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$doctors_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $doctors_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $doctors_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($doctors_list->TotalRecords == 0 && !$doctors->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $doctors_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$doctors_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$doctors_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$doctors->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_doctors",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$doctors_list->terminate();
?>