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
$view_gst_output_list = new view_gst_output_list();

// Run the page
$view_gst_output_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_gst_output_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_gst_output_list->isExport()) { ?>
<script>
var fview_gst_outputlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_gst_outputlist = currentForm = new ew.Form("fview_gst_outputlist", "list");
	fview_gst_outputlist.formKeyCountName = '<?php echo $view_gst_output_list->FormKeyCountName ?>';
	loadjs.done("fview_gst_outputlist");
});
var fview_gst_outputlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_gst_outputlistsrch = currentSearchForm = new ew.Form("fview_gst_outputlistsrch");

	// Validate function for search
	fview_gst_outputlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_BillDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_gst_output_list->BillDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_gst_outputlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_gst_outputlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_gst_outputlistsrch.filterList = <?php echo $view_gst_output_list->getFilterList() ?>;
	loadjs.done("fview_gst_outputlistsrch");
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
<?php if (!$view_gst_output_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_gst_output_list->TotalRecords > 0 && $view_gst_output_list->ExportOptions->visible()) { ?>
<?php $view_gst_output_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_gst_output_list->ImportOptions->visible()) { ?>
<?php $view_gst_output_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_gst_output_list->SearchOptions->visible()) { ?>
<?php $view_gst_output_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_gst_output_list->FilterOptions->visible()) { ?>
<?php $view_gst_output_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_gst_output_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_gst_output_list->isExport() && !$view_gst_output->CurrentAction) { ?>
<form name="fview_gst_outputlistsrch" id="fview_gst_outputlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_gst_outputlistsrch-search-panel" class="<?php echo $view_gst_output_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_gst_output">
	<div class="ew-extended-search">
<?php

// Render search row
$view_gst_output->RowType = ROWTYPE_SEARCH;
$view_gst_output->resetAttributes();
$view_gst_output_list->renderRow();
?>
<?php if ($view_gst_output_list->BillDate->Visible) { // BillDate ?>
	<?php
		$view_gst_output_list->SearchColumnCount++;
		if (($view_gst_output_list->SearchColumnCount - 1) % $view_gst_output_list->SearchFieldsPerRow == 0) {
			$view_gst_output_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_gst_output_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BillDate" class="ew-cell form-group">
		<label for="x_BillDate" class="ew-search-caption ew-label"><?php echo $view_gst_output_list->BillDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_BillDate" id="z_BillDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_gst_output_list->BillDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_gst_output_BillDate" class="ew-search-field">
<input type="text" data-table="view_gst_output" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_gst_output_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_gst_output_list->BillDate->EditValue ?>"<?php echo $view_gst_output_list->BillDate->editAttributes() ?>>
<?php if (!$view_gst_output_list->BillDate->ReadOnly && !$view_gst_output_list->BillDate->Disabled && !isset($view_gst_output_list->BillDate->EditAttrs["readonly"]) && !isset($view_gst_output_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_gst_outputlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_gst_outputlistsrch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_gst_output_BillDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_gst_output" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?php echo HtmlEncode($view_gst_output_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_gst_output_list->BillDate->EditValue2 ?>"<?php echo $view_gst_output_list->BillDate->editAttributes() ?>>
<?php if (!$view_gst_output_list->BillDate->ReadOnly && !$view_gst_output_list->BillDate->Disabled && !isset($view_gst_output_list->BillDate->EditAttrs["readonly"]) && !isset($view_gst_output_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_gst_outputlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_gst_outputlistsrch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_gst_output_list->SearchColumnCount % $view_gst_output_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_gst_output_list->SearchColumnCount % $view_gst_output_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_gst_output_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_gst_output_list->showPageHeader(); ?>
<?php
$view_gst_output_list->showMessage();
?>
<?php if ($view_gst_output_list->TotalRecords > 0 || $view_gst_output->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_gst_output_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_gst_output">
<?php if (!$view_gst_output_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_gst_output_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_gst_output_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_gst_output_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_gst_outputlist" id="fview_gst_outputlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_gst_output">
<div id="gmp_view_gst_output" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_gst_output_list->TotalRecords > 0 || $view_gst_output_list->isGridEdit()) { ?>
<table id="tbl_view_gst_outputlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_gst_output->RowType = ROWTYPE_HEADER;

// Render list options
$view_gst_output_list->renderListOptions();

// Render list options (header, left)
$view_gst_output_list->ListOptions->render("header", "left");
?>
<?php if ($view_gst_output_list->BillDate->Visible) { // BillDate ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_gst_output_list->BillDate->headerCellClass() ?>"><div id="elh_view_gst_output_BillDate" class="view_gst_output_BillDate"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_gst_output_list->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->BillDate) ?>', 1);"><div id="elh_view_gst_output_BillDate" class="view_gst_output_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_2_525_SGST->Visible) { // IP 2.5% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_2_525_SGST) == "") { ?>
		<th data-name="IP_2_525_SGST" class="<?php echo $view_gst_output_list->IP_2_525_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_2_525_SGST" class="view_gst_output_IP_2_525_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_2_525_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_2_525_SGST" class="<?php echo $view_gst_output_list->IP_2_525_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_2_525_SGST) ?>', 1);"><div id="elh_view_gst_output_IP_2_525_SGST" class="view_gst_output_IP_2_525_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_2_525_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_2_525_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_2_525_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_2_525_CGST->Visible) { // IP 2.5% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_2_525_CGST) == "") { ?>
		<th data-name="IP_2_525_CGST" class="<?php echo $view_gst_output_list->IP_2_525_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_2_525_CGST" class="view_gst_output_IP_2_525_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_2_525_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_2_525_CGST" class="<?php echo $view_gst_output_list->IP_2_525_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_2_525_CGST) ?>', 1);"><div id="elh_view_gst_output_IP_2_525_CGST" class="view_gst_output_IP_2_525_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_2_525_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_2_525_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_2_525_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_6_025_SGST->Visible) { // IP 6.0% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_6_025_SGST) == "") { ?>
		<th data-name="IP_6_025_SGST" class="<?php echo $view_gst_output_list->IP_6_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_6_025_SGST" class="view_gst_output_IP_6_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_6_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_6_025_SGST" class="<?php echo $view_gst_output_list->IP_6_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_6_025_SGST) ?>', 1);"><div id="elh_view_gst_output_IP_6_025_SGST" class="view_gst_output_IP_6_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_6_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_6_025_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_6_025_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_6_025_CGST->Visible) { // IP 6.0% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_6_025_CGST) == "") { ?>
		<th data-name="IP_6_025_CGST" class="<?php echo $view_gst_output_list->IP_6_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_6_025_CGST" class="view_gst_output_IP_6_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_6_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_6_025_CGST" class="<?php echo $view_gst_output_list->IP_6_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_6_025_CGST) ?>', 1);"><div id="elh_view_gst_output_IP_6_025_CGST" class="view_gst_output_IP_6_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_6_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_6_025_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_6_025_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_9_025_SGST->Visible) { // IP 9.0% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_9_025_SGST) == "") { ?>
		<th data-name="IP_9_025_SGST" class="<?php echo $view_gst_output_list->IP_9_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_9_025_SGST" class="view_gst_output_IP_9_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_9_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_9_025_SGST" class="<?php echo $view_gst_output_list->IP_9_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_9_025_SGST) ?>', 1);"><div id="elh_view_gst_output_IP_9_025_SGST" class="view_gst_output_IP_9_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_9_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_9_025_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_9_025_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_9_025_CGST->Visible) { // IP 9.0% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_9_025_CGST) == "") { ?>
		<th data-name="IP_9_025_CGST" class="<?php echo $view_gst_output_list->IP_9_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_9_025_CGST" class="view_gst_output_IP_9_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_9_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_9_025_CGST" class="<?php echo $view_gst_output_list->IP_9_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_9_025_CGST) ?>', 1);"><div id="elh_view_gst_output_IP_9_025_CGST" class="view_gst_output_IP_9_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_9_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_9_025_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_9_025_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_14_025_SGST->Visible) { // IP 14.0% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_14_025_SGST) == "") { ?>
		<th data-name="IP_14_025_SGST" class="<?php echo $view_gst_output_list->IP_14_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_14_025_SGST" class="view_gst_output_IP_14_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_14_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_14_025_SGST" class="<?php echo $view_gst_output_list->IP_14_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_14_025_SGST) ?>', 1);"><div id="elh_view_gst_output_IP_14_025_SGST" class="view_gst_output_IP_14_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_14_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_14_025_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_14_025_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->IP_14_025_CGST->Visible) { // IP 14.0% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->IP_14_025_CGST) == "") { ?>
		<th data-name="IP_14_025_CGST" class="<?php echo $view_gst_output_list->IP_14_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_14_025_CGST" class="view_gst_output_IP_14_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_14_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_14_025_CGST" class="<?php echo $view_gst_output_list->IP_14_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->IP_14_025_CGST) ?>', 1);"><div id="elh_view_gst_output_IP_14_025_CGST" class="view_gst_output_IP_14_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->IP_14_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->IP_14_025_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->IP_14_025_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_2_525_SGST->Visible) { // OP 2.5% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_2_525_SGST) == "") { ?>
		<th data-name="OP_2_525_SGST" class="<?php echo $view_gst_output_list->OP_2_525_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_2_525_SGST" class="view_gst_output_OP_2_525_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_2_525_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_2_525_SGST" class="<?php echo $view_gst_output_list->OP_2_525_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_2_525_SGST) ?>', 1);"><div id="elh_view_gst_output_OP_2_525_SGST" class="view_gst_output_OP_2_525_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_2_525_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_2_525_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_2_525_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_2_525_CGST->Visible) { // OP 2.5% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_2_525_CGST) == "") { ?>
		<th data-name="OP_2_525_CGST" class="<?php echo $view_gst_output_list->OP_2_525_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_2_525_CGST" class="view_gst_output_OP_2_525_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_2_525_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_2_525_CGST" class="<?php echo $view_gst_output_list->OP_2_525_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_2_525_CGST) ?>', 1);"><div id="elh_view_gst_output_OP_2_525_CGST" class="view_gst_output_OP_2_525_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_2_525_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_2_525_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_2_525_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_6_025_SGST->Visible) { // OP 6.0% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_6_025_SGST) == "") { ?>
		<th data-name="OP_6_025_SGST" class="<?php echo $view_gst_output_list->OP_6_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_6_025_SGST" class="view_gst_output_OP_6_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_6_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_6_025_SGST" class="<?php echo $view_gst_output_list->OP_6_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_6_025_SGST) ?>', 1);"><div id="elh_view_gst_output_OP_6_025_SGST" class="view_gst_output_OP_6_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_6_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_6_025_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_6_025_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_6_025_CGST->Visible) { // OP 6.0% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_6_025_CGST) == "") { ?>
		<th data-name="OP_6_025_CGST" class="<?php echo $view_gst_output_list->OP_6_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_6_025_CGST" class="view_gst_output_OP_6_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_6_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_6_025_CGST" class="<?php echo $view_gst_output_list->OP_6_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_6_025_CGST) ?>', 1);"><div id="elh_view_gst_output_OP_6_025_CGST" class="view_gst_output_OP_6_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_6_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_6_025_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_6_025_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_9_025_SGST->Visible) { // OP 9.0% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_9_025_SGST) == "") { ?>
		<th data-name="OP_9_025_SGST" class="<?php echo $view_gst_output_list->OP_9_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_9_025_SGST" class="view_gst_output_OP_9_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_9_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_9_025_SGST" class="<?php echo $view_gst_output_list->OP_9_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_9_025_SGST) ?>', 1);"><div id="elh_view_gst_output_OP_9_025_SGST" class="view_gst_output_OP_9_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_9_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_9_025_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_9_025_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_9_025_CGST->Visible) { // OP 9.0% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_9_025_CGST) == "") { ?>
		<th data-name="OP_9_025_CGST" class="<?php echo $view_gst_output_list->OP_9_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_9_025_CGST" class="view_gst_output_OP_9_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_9_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_9_025_CGST" class="<?php echo $view_gst_output_list->OP_9_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_9_025_CGST) ?>', 1);"><div id="elh_view_gst_output_OP_9_025_CGST" class="view_gst_output_OP_9_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_9_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_9_025_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_9_025_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_14_025_SGST->Visible) { // OP 14.0% SGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_14_025_SGST) == "") { ?>
		<th data-name="OP_14_025_SGST" class="<?php echo $view_gst_output_list->OP_14_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_14_025_SGST" class="view_gst_output_OP_14_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_14_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_14_025_SGST" class="<?php echo $view_gst_output_list->OP_14_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_14_025_SGST) ?>', 1);"><div id="elh_view_gst_output_OP_14_025_SGST" class="view_gst_output_OP_14_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_14_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_14_025_SGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_14_025_SGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->OP_14_025_CGST->Visible) { // OP 14.0% CGST ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->OP_14_025_CGST) == "") { ?>
		<th data-name="OP_14_025_CGST" class="<?php echo $view_gst_output_list->OP_14_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_14_025_CGST" class="view_gst_output_OP_14_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_14_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_14_025_CGST" class="<?php echo $view_gst_output_list->OP_14_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->OP_14_025_CGST) ?>', 1);"><div id="elh_view_gst_output_OP_14_025_CGST" class="view_gst_output_OP_14_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->OP_14_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->OP_14_025_CGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->OP_14_025_CGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output_list->HosoID->Visible) { // HosoID ?>
	<?php if ($view_gst_output_list->SortUrl($view_gst_output_list->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_gst_output_list->HosoID->headerCellClass() ?>"><div id="elh_view_gst_output_HosoID" class="view_gst_output_HosoID"><div class="ew-table-header-caption"><?php echo $view_gst_output_list->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_gst_output_list->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_gst_output_list->SortUrl($view_gst_output_list->HosoID) ?>', 1);"><div id="elh_view_gst_output_HosoID" class="view_gst_output_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output_list->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output_list->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_gst_output_list->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_gst_output_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_gst_output_list->ExportAll && $view_gst_output_list->isExport()) {
	$view_gst_output_list->StopRecord = $view_gst_output_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_gst_output_list->TotalRecords > $view_gst_output_list->StartRecord + $view_gst_output_list->DisplayRecords - 1)
		$view_gst_output_list->StopRecord = $view_gst_output_list->StartRecord + $view_gst_output_list->DisplayRecords - 1;
	else
		$view_gst_output_list->StopRecord = $view_gst_output_list->TotalRecords;
}
$view_gst_output_list->RecordCount = $view_gst_output_list->StartRecord - 1;
if ($view_gst_output_list->Recordset && !$view_gst_output_list->Recordset->EOF) {
	$view_gst_output_list->Recordset->moveFirst();
	$selectLimit = $view_gst_output_list->UseSelectLimit;
	if (!$selectLimit && $view_gst_output_list->StartRecord > 1)
		$view_gst_output_list->Recordset->move($view_gst_output_list->StartRecord - 1);
} elseif (!$view_gst_output->AllowAddDeleteRow && $view_gst_output_list->StopRecord == 0) {
	$view_gst_output_list->StopRecord = $view_gst_output->GridAddRowCount;
}

// Initialize aggregate
$view_gst_output->RowType = ROWTYPE_AGGREGATEINIT;
$view_gst_output->resetAttributes();
$view_gst_output_list->renderRow();
while ($view_gst_output_list->RecordCount < $view_gst_output_list->StopRecord) {
	$view_gst_output_list->RecordCount++;
	if ($view_gst_output_list->RecordCount >= $view_gst_output_list->StartRecord) {
		$view_gst_output_list->RowCount++;

		// Set up key count
		$view_gst_output_list->KeyCount = $view_gst_output_list->RowIndex;

		// Init row class and style
		$view_gst_output->resetAttributes();
		$view_gst_output->CssClass = "";
		if ($view_gst_output_list->isGridAdd()) {
		} else {
			$view_gst_output_list->loadRowValues($view_gst_output_list->Recordset); // Load row values
		}
		$view_gst_output->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_gst_output->RowAttrs->merge(["data-rowindex" => $view_gst_output_list->RowCount, "id" => "r" . $view_gst_output_list->RowCount . "_view_gst_output", "data-rowtype" => $view_gst_output->RowType]);

		// Render row
		$view_gst_output_list->renderRow();

		// Render list options
		$view_gst_output_list->renderListOptions();
?>
	<tr <?php echo $view_gst_output->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_gst_output_list->ListOptions->render("body", "left", $view_gst_output_list->RowCount);
?>
	<?php if ($view_gst_output_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $view_gst_output_list->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_BillDate">
<span<?php echo $view_gst_output_list->BillDate->viewAttributes() ?>><?php echo $view_gst_output_list->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_2_525_SGST->Visible) { // IP 2.5% SGST ?>
		<td data-name="IP_2_525_SGST" <?php echo $view_gst_output_list->IP_2_525_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_2_525_SGST">
<span<?php echo $view_gst_output_list->IP_2_525_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_2_525_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_2_525_CGST->Visible) { // IP 2.5% CGST ?>
		<td data-name="IP_2_525_CGST" <?php echo $view_gst_output_list->IP_2_525_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_2_525_CGST">
<span<?php echo $view_gst_output_list->IP_2_525_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_2_525_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_6_025_SGST->Visible) { // IP 6.0% SGST ?>
		<td data-name="IP_6_025_SGST" <?php echo $view_gst_output_list->IP_6_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_6_025_SGST">
<span<?php echo $view_gst_output_list->IP_6_025_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_6_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_6_025_CGST->Visible) { // IP 6.0% CGST ?>
		<td data-name="IP_6_025_CGST" <?php echo $view_gst_output_list->IP_6_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_6_025_CGST">
<span<?php echo $view_gst_output_list->IP_6_025_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_6_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_9_025_SGST->Visible) { // IP 9.0% SGST ?>
		<td data-name="IP_9_025_SGST" <?php echo $view_gst_output_list->IP_9_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_9_025_SGST">
<span<?php echo $view_gst_output_list->IP_9_025_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_9_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_9_025_CGST->Visible) { // IP 9.0% CGST ?>
		<td data-name="IP_9_025_CGST" <?php echo $view_gst_output_list->IP_9_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_9_025_CGST">
<span<?php echo $view_gst_output_list->IP_9_025_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_9_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_14_025_SGST->Visible) { // IP 14.0% SGST ?>
		<td data-name="IP_14_025_SGST" <?php echo $view_gst_output_list->IP_14_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_14_025_SGST">
<span<?php echo $view_gst_output_list->IP_14_025_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_14_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->IP_14_025_CGST->Visible) { // IP 14.0% CGST ?>
		<td data-name="IP_14_025_CGST" <?php echo $view_gst_output_list->IP_14_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_IP_14_025_CGST">
<span<?php echo $view_gst_output_list->IP_14_025_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->IP_14_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_2_525_SGST->Visible) { // OP 2.5% SGST ?>
		<td data-name="OP_2_525_SGST" <?php echo $view_gst_output_list->OP_2_525_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_2_525_SGST">
<span<?php echo $view_gst_output_list->OP_2_525_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_2_525_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_2_525_CGST->Visible) { // OP 2.5% CGST ?>
		<td data-name="OP_2_525_CGST" <?php echo $view_gst_output_list->OP_2_525_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_2_525_CGST">
<span<?php echo $view_gst_output_list->OP_2_525_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_2_525_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_6_025_SGST->Visible) { // OP 6.0% SGST ?>
		<td data-name="OP_6_025_SGST" <?php echo $view_gst_output_list->OP_6_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_6_025_SGST">
<span<?php echo $view_gst_output_list->OP_6_025_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_6_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_6_025_CGST->Visible) { // OP 6.0% CGST ?>
		<td data-name="OP_6_025_CGST" <?php echo $view_gst_output_list->OP_6_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_6_025_CGST">
<span<?php echo $view_gst_output_list->OP_6_025_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_6_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_9_025_SGST->Visible) { // OP 9.0% SGST ?>
		<td data-name="OP_9_025_SGST" <?php echo $view_gst_output_list->OP_9_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_9_025_SGST">
<span<?php echo $view_gst_output_list->OP_9_025_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_9_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_9_025_CGST->Visible) { // OP 9.0% CGST ?>
		<td data-name="OP_9_025_CGST" <?php echo $view_gst_output_list->OP_9_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_9_025_CGST">
<span<?php echo $view_gst_output_list->OP_9_025_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_9_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_14_025_SGST->Visible) { // OP 14.0% SGST ?>
		<td data-name="OP_14_025_SGST" <?php echo $view_gst_output_list->OP_14_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_14_025_SGST">
<span<?php echo $view_gst_output_list->OP_14_025_SGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_14_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->OP_14_025_CGST->Visible) { // OP 14.0% CGST ?>
		<td data-name="OP_14_025_CGST" <?php echo $view_gst_output_list->OP_14_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_OP_14_025_CGST">
<span<?php echo $view_gst_output_list->OP_14_025_CGST->viewAttributes() ?>><?php echo $view_gst_output_list->OP_14_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $view_gst_output_list->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCount ?>_view_gst_output_HosoID">
<span<?php echo $view_gst_output_list->HosoID->viewAttributes() ?>><?php echo $view_gst_output_list->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_gst_output_list->ListOptions->render("body", "right", $view_gst_output_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_gst_output_list->isGridAdd())
		$view_gst_output_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_gst_output->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_gst_output_list->Recordset)
	$view_gst_output_list->Recordset->Close();
?>
<?php if (!$view_gst_output_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_gst_output_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_gst_output_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_gst_output_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_gst_output_list->TotalRecords == 0 && !$view_gst_output->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_gst_output_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_gst_output_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_gst_output_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_gst_output->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_gst_output",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_gst_output_list->terminate();
?>