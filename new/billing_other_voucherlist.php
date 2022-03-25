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
$billing_other_voucher_list = new billing_other_voucher_list();

// Run the page
$billing_other_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_other_voucher_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$billing_other_voucher_list->isExport()) { ?>
<script>
var fbilling_other_voucherlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbilling_other_voucherlist = currentForm = new ew.Form("fbilling_other_voucherlist", "list");
	fbilling_other_voucherlist.formKeyCountName = '<?php echo $billing_other_voucher_list->FormKeyCountName ?>';
	loadjs.done("fbilling_other_voucherlist");
});
var fbilling_other_voucherlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbilling_other_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_other_voucherlistsrch");

	// Validate function for search
	fbilling_other_voucherlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($billing_other_voucher_list->Date->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fbilling_other_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_other_voucherlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fbilling_other_voucherlistsrch.filterList = <?php echo $billing_other_voucher_list->getFilterList() ?>;
	loadjs.done("fbilling_other_voucherlistsrch");
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
<?php if (!$billing_other_voucher_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_other_voucher_list->TotalRecords > 0 && $billing_other_voucher_list->ExportOptions->visible()) { ?>
<?php $billing_other_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_other_voucher_list->ImportOptions->visible()) { ?>
<?php $billing_other_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_other_voucher_list->SearchOptions->visible()) { ?>
<?php $billing_other_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_other_voucher_list->FilterOptions->visible()) { ?>
<?php $billing_other_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_other_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_other_voucher_list->isExport() && !$billing_other_voucher->CurrentAction) { ?>
<form name="fbilling_other_voucherlistsrch" id="fbilling_other_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbilling_other_voucherlistsrch-search-panel" class="<?php echo $billing_other_voucher_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_other_voucher">
	<div class="ew-extended-search">
<?php

// Render search row
$billing_other_voucher->RowType = ROWTYPE_SEARCH;
$billing_other_voucher->resetAttributes();
$billing_other_voucher_list->renderRow();
?>
<?php if ($billing_other_voucher_list->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php
		$billing_other_voucher_list->SearchColumnCount++;
		if (($billing_other_voucher_list->SearchColumnCount - 1) % $billing_other_voucher_list->SearchFieldsPerRow == 0) {
			$billing_other_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_other_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_AdvanceNo" class="ew-cell form-group">
		<label for="x_AdvanceNo" class="ew-search-caption ew-label"><?php echo $billing_other_voucher_list->AdvanceNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AdvanceNo" id="z_AdvanceNo" value="LIKE">
</span>
		<span id="el_billing_other_voucher_AdvanceNo" class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_list->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_list->AdvanceNo->EditValue ?>"<?php echo $billing_other_voucher_list->AdvanceNo->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_other_voucher_list->SearchColumnCount % $billing_other_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->PatientID->Visible) { // PatientID ?>
	<?php
		$billing_other_voucher_list->SearchColumnCount++;
		if (($billing_other_voucher_list->SearchColumnCount - 1) % $billing_other_voucher_list->SearchFieldsPerRow == 0) {
			$billing_other_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_other_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $billing_other_voucher_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_billing_other_voucher_PatientID" class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_list->PatientID->EditValue ?>"<?php echo $billing_other_voucher_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_other_voucher_list->SearchColumnCount % $billing_other_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php
		$billing_other_voucher_list->SearchColumnCount++;
		if (($billing_other_voucher_list->SearchColumnCount - 1) % $billing_other_voucher_list->SearchFieldsPerRow == 0) {
			$billing_other_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_other_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $billing_other_voucher_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_billing_other_voucher_PatientName" class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_list->PatientName->EditValue ?>"<?php echo $billing_other_voucher_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_other_voucher_list->SearchColumnCount % $billing_other_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php
		$billing_other_voucher_list->SearchColumnCount++;
		if (($billing_other_voucher_list->SearchColumnCount - 1) % $billing_other_voucher_list->SearchFieldsPerRow == 0) {
			$billing_other_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_other_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $billing_other_voucher_list->Mobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		<span id="el_billing_other_voucher_Mobile" class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_list->Mobile->EditValue ?>"<?php echo $billing_other_voucher_list->Mobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_other_voucher_list->SearchColumnCount % $billing_other_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->Date->Visible) { // Date ?>
	<?php
		$billing_other_voucher_list->SearchColumnCount++;
		if (($billing_other_voucher_list->SearchColumnCount - 1) % $billing_other_voucher_list->SearchFieldsPerRow == 0) {
			$billing_other_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_other_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $billing_other_voucher_list->Date->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_Date" id="z_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $billing_other_voucher_list->Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_billing_other_voucher_Date" class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($billing_other_voucher_list->Date->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_list->Date->EditValue ?>"<?php echo $billing_other_voucher_list->Date->editAttributes() ?>>
<?php if (!$billing_other_voucher_list->Date->ReadOnly && !$billing_other_voucher_list->Date->Disabled && !isset($billing_other_voucher_list->Date->EditAttrs["readonly"]) && !isset($billing_other_voucher_list->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucherlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_other_voucherlistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_billing_other_voucher_Date" class="ew-search-field2 d-none">
<input type="text" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="y_Date" id="y_Date" placeholder="<?php echo HtmlEncode($billing_other_voucher_list->Date->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher_list->Date->EditValue2 ?>"<?php echo $billing_other_voucher_list->Date->editAttributes() ?>>
<?php if (!$billing_other_voucher_list->Date->ReadOnly && !$billing_other_voucher_list->Date->Disabled && !isset($billing_other_voucher_list->Date->EditAttrs["readonly"]) && !isset($billing_other_voucher_list->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucherlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_other_voucherlistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($billing_other_voucher_list->SearchColumnCount % $billing_other_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($billing_other_voucher_list->SearchColumnCount % $billing_other_voucher_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $billing_other_voucher_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($billing_other_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($billing_other_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_other_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $billing_other_voucher_list->showPageHeader(); ?>
<?php
$billing_other_voucher_list->showMessage();
?>
<?php if ($billing_other_voucher_list->TotalRecords > 0 || $billing_other_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_other_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_other_voucher">
<?php if (!$billing_other_voucher_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_other_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $billing_other_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_other_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_other_voucherlist" id="fbilling_other_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<div id="gmp_billing_other_voucher" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($billing_other_voucher_list->TotalRecords > 0 || $billing_other_voucher_list->isGridEdit()) { ?>
<table id="tbl_billing_other_voucherlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_other_voucher->RowType = ROWTYPE_HEADER;

// Render list options
$billing_other_voucher_list->renderListOptions();

// Render list options (header, left)
$billing_other_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($billing_other_voucher_list->id->Visible) { // id ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_other_voucher_list->id->headerCellClass() ?>"><div id="elh_billing_other_voucher_id" class="billing_other_voucher_id"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_other_voucher_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->id) ?>', 1);"><div id="elh_billing_other_voucher_id" class="billing_other_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $billing_other_voucher_list->AdvanceNo->headerCellClass() ?>"><div id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $billing_other_voucher_list->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->AdvanceNo) ?>', 1);"><div id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->AdvanceNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->AdvanceNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->AdvanceNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->PatientID->Visible) { // PatientID ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $billing_other_voucher_list->PatientID->headerCellClass() ?>"><div id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $billing_other_voucher_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->PatientID) ?>', 1);"><div id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $billing_other_voucher_list->PatientName->headerCellClass() ?>"><div id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $billing_other_voucher_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->PatientName) ?>', 1);"><div id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $billing_other_voucher_list->Mobile->headerCellClass() ?>"><div id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $billing_other_voucher_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->Mobile) ?>', 1);"><div id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_other_voucher_list->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_other_voucher_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->ModeofPayment) ?>', 1);"><div id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->Amount->Visible) { // Amount ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $billing_other_voucher_list->Amount->headerCellClass() ?>"><div id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $billing_other_voucher_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->Amount) ?>', 1);"><div id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->BankName->Visible) { // BankName ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $billing_other_voucher_list->BankName->headerCellClass() ?>"><div id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $billing_other_voucher_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->BankName) ?>', 1);"><div id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->Date->Visible) { // Date ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $billing_other_voucher_list->Date->headerCellClass() ?>"><div id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $billing_other_voucher_list->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->Date) ?>', 1);"><div id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->GetUserName->Visible) { // GetUserName ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->GetUserName) == "") { ?>
		<th data-name="GetUserName" class="<?php echo $billing_other_voucher_list->GetUserName->headerCellClass() ?>"><div id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->GetUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetUserName" class="<?php echo $billing_other_voucher_list->GetUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->GetUserName) ?>', 1);"><div id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->GetUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->GetUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->GetUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->CancelAdvance->Visible) { // CancelAdvance ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->CancelAdvance) == "") { ?>
		<th data-name="CancelAdvance" class="<?php echo $billing_other_voucher_list->CancelAdvance->headerCellClass() ?>"><div id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->CancelAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAdvance" class="<?php echo $billing_other_voucher_list->CancelAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->CancelAdvance) ?>', 1);"><div id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->CancelAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->CancelAdvance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->CancelAdvance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher_list->CancelStatus->Visible) { // CancelStatus ?>
	<?php if ($billing_other_voucher_list->SortUrl($billing_other_voucher_list->CancelStatus) == "") { ?>
		<th data-name="CancelStatus" class="<?php echo $billing_other_voucher_list->CancelStatus->headerCellClass() ?>"><div id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus"><div class="ew-table-header-caption"><?php echo $billing_other_voucher_list->CancelStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelStatus" class="<?php echo $billing_other_voucher_list->CancelStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_other_voucher_list->SortUrl($billing_other_voucher_list->CancelStatus) ?>', 1);"><div id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher_list->CancelStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher_list->CancelStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_other_voucher_list->CancelStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_other_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_other_voucher_list->ExportAll && $billing_other_voucher_list->isExport()) {
	$billing_other_voucher_list->StopRecord = $billing_other_voucher_list->TotalRecords;
} else {

	// Set the last record to display
	if ($billing_other_voucher_list->TotalRecords > $billing_other_voucher_list->StartRecord + $billing_other_voucher_list->DisplayRecords - 1)
		$billing_other_voucher_list->StopRecord = $billing_other_voucher_list->StartRecord + $billing_other_voucher_list->DisplayRecords - 1;
	else
		$billing_other_voucher_list->StopRecord = $billing_other_voucher_list->TotalRecords;
}
$billing_other_voucher_list->RecordCount = $billing_other_voucher_list->StartRecord - 1;
if ($billing_other_voucher_list->Recordset && !$billing_other_voucher_list->Recordset->EOF) {
	$billing_other_voucher_list->Recordset->moveFirst();
	$selectLimit = $billing_other_voucher_list->UseSelectLimit;
	if (!$selectLimit && $billing_other_voucher_list->StartRecord > 1)
		$billing_other_voucher_list->Recordset->move($billing_other_voucher_list->StartRecord - 1);
} elseif (!$billing_other_voucher->AllowAddDeleteRow && $billing_other_voucher_list->StopRecord == 0) {
	$billing_other_voucher_list->StopRecord = $billing_other_voucher->GridAddRowCount;
}

// Initialize aggregate
$billing_other_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$billing_other_voucher->resetAttributes();
$billing_other_voucher_list->renderRow();
while ($billing_other_voucher_list->RecordCount < $billing_other_voucher_list->StopRecord) {
	$billing_other_voucher_list->RecordCount++;
	if ($billing_other_voucher_list->RecordCount >= $billing_other_voucher_list->StartRecord) {
		$billing_other_voucher_list->RowCount++;

		// Set up key count
		$billing_other_voucher_list->KeyCount = $billing_other_voucher_list->RowIndex;

		// Init row class and style
		$billing_other_voucher->resetAttributes();
		$billing_other_voucher->CssClass = "";
		if ($billing_other_voucher_list->isGridAdd()) {
		} else {
			$billing_other_voucher_list->loadRowValues($billing_other_voucher_list->Recordset); // Load row values
		}
		$billing_other_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$billing_other_voucher->RowAttrs->merge(["data-rowindex" => $billing_other_voucher_list->RowCount, "id" => "r" . $billing_other_voucher_list->RowCount . "_billing_other_voucher", "data-rowtype" => $billing_other_voucher->RowType]);

		// Render row
		$billing_other_voucher_list->renderRow();

		// Render list options
		$billing_other_voucher_list->renderListOptions();
?>
	<tr <?php echo $billing_other_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_other_voucher_list->ListOptions->render("body", "left", $billing_other_voucher_list->RowCount);
?>
	<?php if ($billing_other_voucher_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $billing_other_voucher_list->id->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_id">
<span<?php echo $billing_other_voucher_list->id->viewAttributes() ?>><?php echo $billing_other_voucher_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo" <?php echo $billing_other_voucher_list->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_AdvanceNo">
<span<?php echo $billing_other_voucher_list->AdvanceNo->viewAttributes() ?>><?php echo $billing_other_voucher_list->AdvanceNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $billing_other_voucher_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_PatientID">
<span<?php echo $billing_other_voucher_list->PatientID->viewAttributes() ?>><?php echo $billing_other_voucher_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $billing_other_voucher_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_PatientName">
<span<?php echo $billing_other_voucher_list->PatientName->viewAttributes() ?>><?php echo $billing_other_voucher_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $billing_other_voucher_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_Mobile">
<span<?php echo $billing_other_voucher_list->Mobile->viewAttributes() ?>><?php echo $billing_other_voucher_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $billing_other_voucher_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_ModeofPayment">
<span<?php echo $billing_other_voucher_list->ModeofPayment->viewAttributes() ?>><?php echo $billing_other_voucher_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $billing_other_voucher_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_Amount">
<span<?php echo $billing_other_voucher_list->Amount->viewAttributes() ?>><?php echo $billing_other_voucher_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $billing_other_voucher_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_BankName">
<span<?php echo $billing_other_voucher_list->BankName->viewAttributes() ?>><?php echo $billing_other_voucher_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Date->Visible) { // Date ?>
		<td data-name="Date" <?php echo $billing_other_voucher_list->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_Date">
<span<?php echo $billing_other_voucher_list->Date->viewAttributes() ?>><?php echo $billing_other_voucher_list->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName" <?php echo $billing_other_voucher_list->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_GetUserName">
<span<?php echo $billing_other_voucher_list->GetUserName->viewAttributes() ?>><?php echo $billing_other_voucher_list->GetUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->CancelAdvance->Visible) { // CancelAdvance ?>
		<td data-name="CancelAdvance" <?php echo $billing_other_voucher_list->CancelAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_CancelAdvance">
<span<?php echo $billing_other_voucher_list->CancelAdvance->viewAttributes() ?>><?php echo $billing_other_voucher_list->CancelAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher_list->CancelStatus->Visible) { // CancelStatus ?>
		<td data-name="CancelStatus" <?php echo $billing_other_voucher_list->CancelStatus->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCount ?>_billing_other_voucher_CancelStatus">
<span<?php echo $billing_other_voucher_list->CancelStatus->viewAttributes() ?>><?php echo $billing_other_voucher_list->CancelStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_other_voucher_list->ListOptions->render("body", "right", $billing_other_voucher_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$billing_other_voucher_list->isGridAdd())
		$billing_other_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$billing_other_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_other_voucher_list->Recordset)
	$billing_other_voucher_list->Recordset->Close();
?>
<?php if (!$billing_other_voucher_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_other_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $billing_other_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_other_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_other_voucher_list->TotalRecords == 0 && !$billing_other_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_other_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_other_voucher_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$billing_other_voucher_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$billing_other_voucher->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_billing_other_voucher",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$billing_other_voucher_list->terminate();
?>