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
$view_donor_semen_stock_list = new view_donor_semen_stock_list();

// Run the page
$view_donor_semen_stock_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_semen_stock_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_donor_semen_stock_list->isExport()) { ?>
<script>
var fview_donor_semen_stocklist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_donor_semen_stocklist = currentForm = new ew.Form("fview_donor_semen_stocklist", "list");
	fview_donor_semen_stocklist.formKeyCountName = '<?php echo $view_donor_semen_stock_list->FormKeyCountName ?>';
	loadjs.done("fview_donor_semen_stocklist");
});
var fview_donor_semen_stocklistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_donor_semen_stocklistsrch = currentSearchForm = new ew.Form("fview_donor_semen_stocklistsrch");

	// Validate function for search
	fview_donor_semen_stocklistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ReceivedOn");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_donor_semen_stock_list->ReceivedOn->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_donor_semen_stocklistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_donor_semen_stocklistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_donor_semen_stocklistsrch.filterList = <?php echo $view_donor_semen_stock_list->getFilterList() ?>;
	loadjs.done("fview_donor_semen_stocklistsrch");
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
<?php if (!$view_donor_semen_stock_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_donor_semen_stock_list->TotalRecords > 0 && $view_donor_semen_stock_list->ExportOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->ImportOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->SearchOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->FilterOptions->visible()) { ?>
<?php $view_donor_semen_stock_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_donor_semen_stock_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_donor_semen_stock_list->isExport() && !$view_donor_semen_stock->CurrentAction) { ?>
<form name="fview_donor_semen_stocklistsrch" id="fview_donor_semen_stocklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_donor_semen_stocklistsrch-search-panel" class="<?php echo $view_donor_semen_stock_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_donor_semen_stock">
	<div class="ew-extended-search">
<?php

// Render search row
$view_donor_semen_stock->RowType = ROWTYPE_SEARCH;
$view_donor_semen_stock->resetAttributes();
$view_donor_semen_stock_list->renderRow();
?>
<?php if ($view_donor_semen_stock_list->Agency->Visible) { // Agency ?>
	<?php
		$view_donor_semen_stock_list->SearchColumnCount++;
		if (($view_donor_semen_stock_list->SearchColumnCount - 1) % $view_donor_semen_stock_list->SearchFieldsPerRow == 0) {
			$view_donor_semen_stock_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_donor_semen_stock_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Agency" class="ew-cell form-group">
		<label for="x_Agency" class="ew-search-caption ew-label"><?php echo $view_donor_semen_stock_list->Agency->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Agency" id="z_Agency" value="LIKE">
</span>
		<span id="el_view_donor_semen_stock_Agency" class="ew-search-field">
<input type="text" data-table="view_donor_semen_stock" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_donor_semen_stock_list->Agency->getPlaceHolder()) ?>" value="<?php echo $view_donor_semen_stock_list->Agency->EditValue ?>"<?php echo $view_donor_semen_stock_list->Agency->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_donor_semen_stock_list->SearchColumnCount % $view_donor_semen_stock_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->ReceivedOn->Visible) { // ReceivedOn ?>
	<?php
		$view_donor_semen_stock_list->SearchColumnCount++;
		if (($view_donor_semen_stock_list->SearchColumnCount - 1) % $view_donor_semen_stock_list->SearchFieldsPerRow == 0) {
			$view_donor_semen_stock_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_donor_semen_stock_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ReceivedOn" class="ew-cell form-group">
		<label for="x_ReceivedOn" class="ew-search-caption ew-label"><?php echo $view_donor_semen_stock_list->ReceivedOn->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ReceivedOn" id="z_ReceivedOn" value="=">
</span>
		<span id="el_view_donor_semen_stock_ReceivedOn" class="ew-search-field">
<input type="text" data-table="view_donor_semen_stock" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?php echo HtmlEncode($view_donor_semen_stock_list->ReceivedOn->getPlaceHolder()) ?>" value="<?php echo $view_donor_semen_stock_list->ReceivedOn->EditValue ?>"<?php echo $view_donor_semen_stock_list->ReceivedOn->editAttributes() ?>>
<?php if (!$view_donor_semen_stock_list->ReceivedOn->ReadOnly && !$view_donor_semen_stock_list->ReceivedOn->Disabled && !isset($view_donor_semen_stock_list->ReceivedOn->EditAttrs["readonly"]) && !isset($view_donor_semen_stock_list->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_donor_semen_stocklistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_donor_semen_stocklistsrch", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_donor_semen_stock_list->SearchColumnCount % $view_donor_semen_stock_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->ReceivedBy->Visible) { // ReceivedBy ?>
	<?php
		$view_donor_semen_stock_list->SearchColumnCount++;
		if (($view_donor_semen_stock_list->SearchColumnCount - 1) % $view_donor_semen_stock_list->SearchFieldsPerRow == 0) {
			$view_donor_semen_stock_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_donor_semen_stock_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ReceivedBy" class="ew-cell form-group">
		<label for="x_ReceivedBy" class="ew-search-caption ew-label"><?php echo $view_donor_semen_stock_list->ReceivedBy->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReceivedBy" id="z_ReceivedBy" value="LIKE">
</span>
		<span id="el_view_donor_semen_stock_ReceivedBy" class="ew-search-field">
<input type="text" data-table="view_donor_semen_stock" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_donor_semen_stock_list->ReceivedBy->getPlaceHolder()) ?>" value="<?php echo $view_donor_semen_stock_list->ReceivedBy->EditValue ?>"<?php echo $view_donor_semen_stock_list->ReceivedBy->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_donor_semen_stock_list->SearchColumnCount % $view_donor_semen_stock_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_donor_semen_stock_list->SearchColumnCount % $view_donor_semen_stock_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_donor_semen_stock_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_donor_semen_stock_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_donor_semen_stock_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_donor_semen_stock_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_donor_semen_stock_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_donor_semen_stock_list->showPageHeader(); ?>
<?php
$view_donor_semen_stock_list->showMessage();
?>
<?php if ($view_donor_semen_stock_list->TotalRecords > 0 || $view_donor_semen_stock->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_donor_semen_stock_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_donor_semen_stock">
<?php if (!$view_donor_semen_stock_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_donor_semen_stock_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_donor_semen_stock_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_semen_stock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_donor_semen_stocklist" id="fview_donor_semen_stocklist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_semen_stock">
<div id="gmp_view_donor_semen_stock" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_donor_semen_stock_list->TotalRecords > 0 || $view_donor_semen_stock_list->isGridEdit()) { ?>
<table id="tbl_view_donor_semen_stocklist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_donor_semen_stock->RowType = ROWTYPE_HEADER;

// Render list options
$view_donor_semen_stock_list->renderListOptions();

// Render list options (header, left)
$view_donor_semen_stock_list->ListOptions->render("header", "left");
?>
<?php if ($view_donor_semen_stock_list->Agency->Visible) { // Agency ?>
	<?php if ($view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->Agency) == "") { ?>
		<th data-name="Agency" class="<?php echo $view_donor_semen_stock_list->Agency->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_Agency" class="view_donor_semen_stock_Agency"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->Agency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Agency" class="<?php echo $view_donor_semen_stock_list->Agency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->Agency) ?>', 1);"><div id="elh_view_donor_semen_stock_Agency" class="view_donor_semen_stock_Agency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->Agency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock_list->Agency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_semen_stock_list->Agency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->ReceivedOn->Visible) { // ReceivedOn ?>
	<?php if ($view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->ReceivedOn) == "") { ?>
		<th data-name="ReceivedOn" class="<?php echo $view_donor_semen_stock_list->ReceivedOn->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_ReceivedOn" class="view_donor_semen_stock_ReceivedOn"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->ReceivedOn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedOn" class="<?php echo $view_donor_semen_stock_list->ReceivedOn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->ReceivedOn) ?>', 1);"><div id="elh_view_donor_semen_stock_ReceivedOn" class="view_donor_semen_stock_ReceivedOn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->ReceivedOn->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock_list->ReceivedOn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_semen_stock_list->ReceivedOn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->ReceivedBy->Visible) { // ReceivedBy ?>
	<?php if ($view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->ReceivedBy) == "") { ?>
		<th data-name="ReceivedBy" class="<?php echo $view_donor_semen_stock_list->ReceivedBy->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_ReceivedBy" class="view_donor_semen_stock_ReceivedBy"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->ReceivedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedBy" class="<?php echo $view_donor_semen_stock_list->ReceivedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->ReceivedBy) ?>', 1);"><div id="elh_view_donor_semen_stock_ReceivedBy" class="view_donor_semen_stock_ReceivedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->ReceivedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock_list->ReceivedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_semen_stock_list->ReceivedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->TotalCount->Visible) { // TotalCount ?>
	<?php if ($view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->TotalCount) == "") { ?>
		<th data-name="TotalCount" class="<?php echo $view_donor_semen_stock_list->TotalCount->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_TotalCount" class="view_donor_semen_stock_TotalCount"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->TotalCount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCount" class="<?php echo $view_donor_semen_stock_list->TotalCount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->TotalCount) ?>', 1);"><div id="elh_view_donor_semen_stock_TotalCount" class="view_donor_semen_stock_TotalCount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->TotalCount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock_list->TotalCount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_semen_stock_list->TotalCount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_semen_stock_list->Remaining->Visible) { // Remaining ?>
	<?php if ($view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->Remaining) == "") { ?>
		<th data-name="Remaining" class="<?php echo $view_donor_semen_stock_list->Remaining->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_Remaining" class="view_donor_semen_stock_Remaining"><div class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->Remaining->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remaining" class="<?php echo $view_donor_semen_stock_list->Remaining->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_donor_semen_stock_list->SortUrl($view_donor_semen_stock_list->Remaining) ?>', 1);"><div id="elh_view_donor_semen_stock_Remaining" class="view_donor_semen_stock_Remaining">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_semen_stock_list->Remaining->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_semen_stock_list->Remaining->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_donor_semen_stock_list->Remaining->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_donor_semen_stock_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_donor_semen_stock_list->ExportAll && $view_donor_semen_stock_list->isExport()) {
	$view_donor_semen_stock_list->StopRecord = $view_donor_semen_stock_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_donor_semen_stock_list->TotalRecords > $view_donor_semen_stock_list->StartRecord + $view_donor_semen_stock_list->DisplayRecords - 1)
		$view_donor_semen_stock_list->StopRecord = $view_donor_semen_stock_list->StartRecord + $view_donor_semen_stock_list->DisplayRecords - 1;
	else
		$view_donor_semen_stock_list->StopRecord = $view_donor_semen_stock_list->TotalRecords;
}
$view_donor_semen_stock_list->RecordCount = $view_donor_semen_stock_list->StartRecord - 1;
if ($view_donor_semen_stock_list->Recordset && !$view_donor_semen_stock_list->Recordset->EOF) {
	$view_donor_semen_stock_list->Recordset->moveFirst();
	$selectLimit = $view_donor_semen_stock_list->UseSelectLimit;
	if (!$selectLimit && $view_donor_semen_stock_list->StartRecord > 1)
		$view_donor_semen_stock_list->Recordset->move($view_donor_semen_stock_list->StartRecord - 1);
} elseif (!$view_donor_semen_stock->AllowAddDeleteRow && $view_donor_semen_stock_list->StopRecord == 0) {
	$view_donor_semen_stock_list->StopRecord = $view_donor_semen_stock->GridAddRowCount;
}

// Initialize aggregate
$view_donor_semen_stock->RowType = ROWTYPE_AGGREGATEINIT;
$view_donor_semen_stock->resetAttributes();
$view_donor_semen_stock_list->renderRow();
while ($view_donor_semen_stock_list->RecordCount < $view_donor_semen_stock_list->StopRecord) {
	$view_donor_semen_stock_list->RecordCount++;
	if ($view_donor_semen_stock_list->RecordCount >= $view_donor_semen_stock_list->StartRecord) {
		$view_donor_semen_stock_list->RowCount++;

		// Set up key count
		$view_donor_semen_stock_list->KeyCount = $view_donor_semen_stock_list->RowIndex;

		// Init row class and style
		$view_donor_semen_stock->resetAttributes();
		$view_donor_semen_stock->CssClass = "";
		if ($view_donor_semen_stock_list->isGridAdd()) {
		} else {
			$view_donor_semen_stock_list->loadRowValues($view_donor_semen_stock_list->Recordset); // Load row values
		}
		$view_donor_semen_stock->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_donor_semen_stock->RowAttrs->merge(["data-rowindex" => $view_donor_semen_stock_list->RowCount, "id" => "r" . $view_donor_semen_stock_list->RowCount . "_view_donor_semen_stock", "data-rowtype" => $view_donor_semen_stock->RowType]);

		// Render row
		$view_donor_semen_stock_list->renderRow();

		// Render list options
		$view_donor_semen_stock_list->renderListOptions();
?>
	<tr <?php echo $view_donor_semen_stock->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_donor_semen_stock_list->ListOptions->render("body", "left", $view_donor_semen_stock_list->RowCount);
?>
	<?php if ($view_donor_semen_stock_list->Agency->Visible) { // Agency ?>
		<td data-name="Agency" <?php echo $view_donor_semen_stock_list->Agency->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCount ?>_view_donor_semen_stock_Agency">
<span<?php echo $view_donor_semen_stock_list->Agency->viewAttributes() ?>><?php echo $view_donor_semen_stock_list->Agency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->ReceivedOn->Visible) { // ReceivedOn ?>
		<td data-name="ReceivedOn" <?php echo $view_donor_semen_stock_list->ReceivedOn->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCount ?>_view_donor_semen_stock_ReceivedOn">
<span<?php echo $view_donor_semen_stock_list->ReceivedOn->viewAttributes() ?>><?php echo $view_donor_semen_stock_list->ReceivedOn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->ReceivedBy->Visible) { // ReceivedBy ?>
		<td data-name="ReceivedBy" <?php echo $view_donor_semen_stock_list->ReceivedBy->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCount ?>_view_donor_semen_stock_ReceivedBy">
<span<?php echo $view_donor_semen_stock_list->ReceivedBy->viewAttributes() ?>><?php echo $view_donor_semen_stock_list->ReceivedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->TotalCount->Visible) { // TotalCount ?>
		<td data-name="TotalCount" <?php echo $view_donor_semen_stock_list->TotalCount->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCount ?>_view_donor_semen_stock_TotalCount">
<span<?php echo $view_donor_semen_stock_list->TotalCount->viewAttributes() ?>><?php echo $view_donor_semen_stock_list->TotalCount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_donor_semen_stock_list->Remaining->Visible) { // Remaining ?>
		<td data-name="Remaining" <?php echo $view_donor_semen_stock_list->Remaining->cellAttributes() ?>>
<span id="el<?php echo $view_donor_semen_stock_list->RowCount ?>_view_donor_semen_stock_Remaining">
<span<?php echo $view_donor_semen_stock_list->Remaining->viewAttributes() ?>><?php echo $view_donor_semen_stock_list->Remaining->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_donor_semen_stock_list->ListOptions->render("body", "right", $view_donor_semen_stock_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_donor_semen_stock_list->isGridAdd())
		$view_donor_semen_stock_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_donor_semen_stock->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_donor_semen_stock_list->Recordset)
	$view_donor_semen_stock_list->Recordset->Close();
?>
<?php if (!$view_donor_semen_stock_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_donor_semen_stock_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_donor_semen_stock_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_semen_stock_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_donor_semen_stock_list->TotalRecords == 0 && !$view_donor_semen_stock->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_donor_semen_stock_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_donor_semen_stock_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_donor_semen_stock_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_donor_semen_stock->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_donor_semen_stock",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_donor_semen_stock_list->terminate();
?>