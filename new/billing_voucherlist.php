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
$billing_voucher_list = new billing_voucher_list();

// Run the page
$billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$billing_voucher_list->isExport()) { ?>
<script>
var fbilling_voucherlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbilling_voucherlist = currentForm = new ew.Form("fbilling_voucherlist", "list");
	fbilling_voucherlist.formKeyCountName = '<?php echo $billing_voucher_list->FormKeyCountName ?>';
	loadjs.done("fbilling_voucherlist");
});
var fbilling_voucherlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbilling_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_voucherlistsrch");

	// Validate function for search
	fbilling_voucherlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($billing_voucher_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fbilling_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_voucherlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fbilling_voucherlistsrch.filterList = <?php echo $billing_voucher_list->getFilterList() ?>;
	loadjs.done("fbilling_voucherlistsrch");
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
<?php if (!$billing_voucher_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_voucher_list->TotalRecords > 0 && $billing_voucher_list->ExportOptions->visible()) { ?>
<?php $billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_voucher_list->ImportOptions->visible()) { ?>
<?php $billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_voucher_list->SearchOptions->visible()) { ?>
<?php $billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_voucher_list->FilterOptions->visible()) { ?>
<?php $billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_voucher_list->isExport() && !$billing_voucher->CurrentAction) { ?>
<form name="fbilling_voucherlistsrch" id="fbilling_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbilling_voucherlistsrch-search-panel" class="<?php echo $billing_voucher_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_voucher">
	<div class="ew-extended-search">
<?php

// Render search row
$billing_voucher->RowType = ROWTYPE_SEARCH;
$billing_voucher->resetAttributes();
$billing_voucher_list->renderRow();
?>
<?php if ($billing_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php
		$billing_voucher_list->SearchColumnCount++;
		if (($billing_voucher_list->SearchColumnCount - 1) % $billing_voucher_list->SearchFieldsPerRow == 0) {
			$billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $billing_voucher_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_billing_voucher_PatientName" class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_list->PatientName->EditValue ?>"<?php echo $billing_voucher_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_voucher_list->SearchColumnCount % $billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php
		$billing_voucher_list->SearchColumnCount++;
		if (($billing_voucher_list->SearchColumnCount - 1) % $billing_voucher_list->SearchFieldsPerRow == 0) {
			$billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $billing_voucher_list->Mobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		<span id="el_billing_voucher_Mobile" class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_list->Mobile->EditValue ?>"<?php echo $billing_voucher_list->Mobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_voucher_list->SearchColumnCount % $billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->createdby->Visible) { // createdby ?>
	<?php
		$billing_voucher_list->SearchColumnCount++;
		if (($billing_voucher_list->SearchColumnCount - 1) % $billing_voucher_list->SearchFieldsPerRow == 0) {
			$billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createdby" class="ew-cell form-group">
		<label for="x_createdby" class="ew-search-caption ew-label"><?php echo $billing_voucher_list->createdby->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
		<span id="el_billing_voucher_createdby" class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($billing_voucher_list->createdby->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_list->createdby->EditValue ?>"<?php echo $billing_voucher_list->createdby->editAttributes() ?>>
</span>
	</div>
	<?php if ($billing_voucher_list->SearchColumnCount % $billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$billing_voucher_list->SearchColumnCount++;
		if (($billing_voucher_list->SearchColumnCount - 1) % $billing_voucher_list->SearchFieldsPerRow == 0) {
			$billing_voucher_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $billing_voucher_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $billing_voucher_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $billing_voucher_list->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_billing_voucher_createddatetime" class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_createddatetime" data-format="11" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_list->createddatetime->EditValue ?>"<?php echo $billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$billing_voucher_list->createddatetime->ReadOnly && !$billing_voucher_list->createddatetime->Disabled && !isset($billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_voucherlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="billing_voucher" data-field="x_createddatetime" data-format="11" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($billing_voucher_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $billing_voucher_list->createddatetime->EditValue2 ?>"<?php echo $billing_voucher_list->createddatetime->editAttributes() ?>>
<?php if (!$billing_voucher_list->createddatetime->ReadOnly && !$billing_voucher_list->createddatetime->Disabled && !isset($billing_voucher_list->createddatetime->EditAttrs["readonly"]) && !isset($billing_voucher_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_voucherlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fbilling_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($billing_voucher_list->SearchColumnCount % $billing_voucher_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($billing_voucher_list->SearchColumnCount % $billing_voucher_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $billing_voucher_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $billing_voucher_list->showPageHeader(); ?>
<?php
$billing_voucher_list->showMessage();
?>
<?php if ($billing_voucher_list->TotalRecords > 0 || $billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_voucher">
<?php if (!$billing_voucher_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $billing_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_voucherlist" id="fbilling_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<div id="gmp_billing_voucher" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($billing_voucher_list->TotalRecords > 0 || $billing_voucher_list->isGridEdit()) { ?>
<table id="tbl_billing_voucherlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_voucher->RowType = ROWTYPE_HEADER;

// Render list options
$billing_voucher_list->renderListOptions();

// Render list options (header, left)
$billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($billing_voucher_list->id->Visible) { // id ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_voucher_list->id->headerCellClass() ?>"><div id="elh_billing_voucher_id" class="billing_voucher_id"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_voucher_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->id) ?>', 1);"><div id="elh_billing_voucher_id" class="billing_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->PatId->Visible) { // PatId ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $billing_voucher_list->PatId->headerCellClass() ?>"><div id="elh_billing_voucher_PatId" class="billing_voucher_PatId"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $billing_voucher_list->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->PatId) ?>', 1);"><div id="elh_billing_voucher_PatId" class="billing_voucher_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->PatId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->PatId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $billing_voucher_list->BillNumber->headerCellClass() ?>"><div id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $billing_voucher_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->BillNumber) ?>', 1);"><div id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->PatientId->Visible) { // PatientId ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $billing_voucher_list->PatientId->headerCellClass() ?>"><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $billing_voucher_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->PatientId) ?>', 1);"><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $billing_voucher_list->PatientName->headerCellClass() ?>"><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $billing_voucher_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->PatientName) ?>', 1);"><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->Gender->Visible) { // Gender ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $billing_voucher_list->Gender->headerCellClass() ?>"><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $billing_voucher_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->Gender) ?>', 1);"><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $billing_voucher_list->Mobile->headerCellClass() ?>"><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $billing_voucher_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->Mobile) ?>', 1);"><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->Doctor->Visible) { // Doctor ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $billing_voucher_list->Doctor->headerCellClass() ?>"><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $billing_voucher_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->Doctor) ?>', 1);"><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_voucher_list->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_voucher_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->ModeofPayment) ?>', 1);"><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->Amount->Visible) { // Amount ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $billing_voucher_list->Amount->headerCellClass() ?>"><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $billing_voucher_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->Amount) ?>', 1);"><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $billing_voucher_list->AnyDues->headerCellClass() ?>"><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $billing_voucher_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->AnyDues) ?>', 1);"><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->createdby->Visible) { // createdby ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $billing_voucher_list->createdby->headerCellClass() ?>"><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $billing_voucher_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->createdby) ?>', 1);"><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $billing_voucher_list->createddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $billing_voucher_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->createddatetime) ?>', 1);"><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $billing_voucher_list->modifiedby->headerCellClass() ?>"><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $billing_voucher_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->modifiedby) ?>', 1);"><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_voucher_list->modifieddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_voucher_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->modifieddatetime) ?>', 1);"><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->HospID->Visible) { // HospID ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $billing_voucher_list->HospID->headerCellClass() ?>"><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $billing_voucher_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->HospID) ?>', 1);"><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $billing_voucher_list->RIDNO->headerCellClass() ?>"><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $billing_voucher_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->RIDNO) ?>', 1);"><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->TidNo->Visible) { // TidNo ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $billing_voucher_list->TidNo->headerCellClass() ?>"><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $billing_voucher_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->TidNo) ?>', 1);"><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CId->Visible) { // CId ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $billing_voucher_list->CId->headerCellClass() ?>"><div id="elh_billing_voucher_CId" class="billing_voucher_CId"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $billing_voucher_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CId) ?>', 1);"><div id="elh_billing_voucher_CId" class="billing_voucher_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $billing_voucher_list->PartnerName->headerCellClass() ?>"><div id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $billing_voucher_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->PartnerName) ?>', 1);"><div id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->PayerType->Visible) { // PayerType ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $billing_voucher_list->PayerType->headerCellClass() ?>"><div id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $billing_voucher_list->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->PayerType) ?>', 1);"><div id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->PayerType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->PayerType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->Dob->Visible) { // Dob ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $billing_voucher_list->Dob->headerCellClass() ?>"><div id="elh_billing_voucher_Dob" class="billing_voucher_Dob"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $billing_voucher_list->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->Dob) ?>', 1);"><div id="elh_billing_voucher_Dob" class="billing_voucher_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->Dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->Dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $billing_voucher_list->DrDepartment->headerCellClass() ?>"><div id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $billing_voucher_list->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->DrDepartment) ?>', 1);"><div id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $billing_voucher_list->RefferedBy->headerCellClass() ?>"><div id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $billing_voucher_list->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->RefferedBy) ?>', 1);"><div id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->RefferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->RefferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CardNumber->Visible) { // CardNumber ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $billing_voucher_list->CardNumber->headerCellClass() ?>"><div id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $billing_voucher_list->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CardNumber) ?>', 1);"><div id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->BankName->Visible) { // BankName ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $billing_voucher_list->BankName->headerCellClass() ?>"><div id="elh_billing_voucher_BankName" class="billing_voucher_BankName"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $billing_voucher_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->BankName) ?>', 1);"><div id="elh_billing_voucher_BankName" class="billing_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->UserName->Visible) { // UserName ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $billing_voucher_list->UserName->headerCellClass() ?>"><div id="elh_billing_voucher_UserName" class="billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $billing_voucher_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->UserName) ?>', 1);"><div id="elh_billing_voucher_UserName" class="billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->AdjustmentAdvance) == "") { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $billing_voucher_list->AdjustmentAdvance->headerCellClass() ?>"><div id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->AdjustmentAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $billing_voucher_list->AdjustmentAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->AdjustmentAdvance) ?>', 1);"><div id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->AdjustmentAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->AdjustmentAdvance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->AdjustmentAdvance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->billing_vouchercol) == "") { ?>
		<th data-name="billing_vouchercol" class="<?php echo $billing_voucher_list->billing_vouchercol->headerCellClass() ?>"><div id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->billing_vouchercol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billing_vouchercol" class="<?php echo $billing_voucher_list->billing_vouchercol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->billing_vouchercol) ?>', 1);"><div id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->billing_vouchercol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->billing_vouchercol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->billing_vouchercol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->BillType->Visible) { // BillType ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $billing_voucher_list->BillType->headerCellClass() ?>"><div id="elh_billing_voucher_BillType" class="billing_voucher_BillType"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $billing_voucher_list->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->BillType) ?>', 1);"><div id="elh_billing_voucher_BillType" class="billing_voucher_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->ProcedureName->Visible) { // ProcedureName ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->ProcedureName) == "") { ?>
		<th data-name="ProcedureName" class="<?php echo $billing_voucher_list->ProcedureName->headerCellClass() ?>"><div id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->ProcedureName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureName" class="<?php echo $billing_voucher_list->ProcedureName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->ProcedureName) ?>', 1);"><div id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->ProcedureName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->ProcedureName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->ProcedureName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->ProcedureAmount) == "") { ?>
		<th data-name="ProcedureAmount" class="<?php echo $billing_voucher_list->ProcedureAmount->headerCellClass() ?>"><div id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->ProcedureAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureAmount" class="<?php echo $billing_voucher_list->ProcedureAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->ProcedureAmount) ?>', 1);"><div id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->ProcedureAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->ProcedureAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->ProcedureAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->IncludePackage->Visible) { // IncludePackage ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->IncludePackage) == "") { ?>
		<th data-name="IncludePackage" class="<?php echo $billing_voucher_list->IncludePackage->headerCellClass() ?>"><div id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->IncludePackage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IncludePackage" class="<?php echo $billing_voucher_list->IncludePackage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->IncludePackage) ?>', 1);"><div id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->IncludePackage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->IncludePackage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->IncludePackage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CancelBill->Visible) { // CancelBill ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CancelBill) == "") { ?>
		<th data-name="CancelBill" class="<?php echo $billing_voucher_list->CancelBill->headerCellClass() ?>"><div id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBill" class="<?php echo $billing_voucher_list->CancelBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CancelBill) ?>', 1);"><div id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CancelBill->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CancelBill->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CancelReason->Visible) { // CancelReason ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CancelReason) == "") { ?>
		<th data-name="CancelReason" class="<?php echo $billing_voucher_list->CancelReason->headerCellClass() ?>"><div id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelReason->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelReason" class="<?php echo $billing_voucher_list->CancelReason->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CancelReason) ?>', 1);"><div id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelReason->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CancelReason->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CancelReason->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CancelModeOfPayment) == "") { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $billing_voucher_list->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelModeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $billing_voucher_list->CancelModeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CancelModeOfPayment) ?>', 1);"><div id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelModeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CancelModeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CancelModeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CancelAmount->Visible) { // CancelAmount ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CancelAmount) == "") { ?>
		<th data-name="CancelAmount" class="<?php echo $billing_voucher_list->CancelAmount->headerCellClass() ?>"><div id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAmount" class="<?php echo $billing_voucher_list->CancelAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CancelAmount) ?>', 1);"><div id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CancelAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CancelAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CancelBankName->Visible) { // CancelBankName ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CancelBankName) == "") { ?>
		<th data-name="CancelBankName" class="<?php echo $billing_voucher_list->CancelBankName->headerCellClass() ?>"><div id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBankName" class="<?php echo $billing_voucher_list->CancelBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CancelBankName) ?>', 1);"><div id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CancelBankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CancelBankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->CancelTransactionNumber) == "") { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $billing_voucher_list->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelTransactionNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $billing_voucher_list->CancelTransactionNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->CancelTransactionNumber) ?>', 1);"><div id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->CancelTransactionNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->CancelTransactionNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->CancelTransactionNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->LabTest->Visible) { // LabTest ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $billing_voucher_list->LabTest->headerCellClass() ?>"><div id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $billing_voucher_list->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->LabTest) ?>', 1);"><div id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->LabTest->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->LabTest->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->sid->Visible) { // sid ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $billing_voucher_list->sid->headerCellClass() ?>"><div id="elh_billing_voucher_sid" class="billing_voucher_sid"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $billing_voucher_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->sid) ?>', 1);"><div id="elh_billing_voucher_sid" class="billing_voucher_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->SidNo->Visible) { // SidNo ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $billing_voucher_list->SidNo->headerCellClass() ?>"><div id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $billing_voucher_list->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->SidNo) ?>', 1);"><div id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->SidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->SidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->createdDatettime) == "") { ?>
		<th data-name="createdDatettime" class="<?php echo $billing_voucher_list->createdDatettime->headerCellClass() ?>"><div id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->createdDatettime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatettime" class="<?php echo $billing_voucher_list->createdDatettime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->createdDatettime) ?>', 1);"><div id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->createdDatettime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->createdDatettime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->createdDatettime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $billing_voucher_list->LabTestReleased->headerCellClass() ?>"><div id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $billing_voucher_list->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->LabTestReleased) ?>', 1);"><div id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->LabTestReleased->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->LabTestReleased->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<?php if ($billing_voucher_list->SortUrl($billing_voucher_list->GoogleReviewID) == "") { ?>
		<th data-name="GoogleReviewID" class="<?php echo $billing_voucher_list->GoogleReviewID->headerCellClass() ?>"><div id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID"><div class="ew-table-header-caption"><?php echo $billing_voucher_list->GoogleReviewID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GoogleReviewID" class="<?php echo $billing_voucher_list->GoogleReviewID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_voucher_list->SortUrl($billing_voucher_list->GoogleReviewID) ?>', 1);"><div id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher_list->GoogleReviewID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher_list->GoogleReviewID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_voucher_list->GoogleReviewID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_voucher_list->ExportAll && $billing_voucher_list->isExport()) {
	$billing_voucher_list->StopRecord = $billing_voucher_list->TotalRecords;
} else {

	// Set the last record to display
	if ($billing_voucher_list->TotalRecords > $billing_voucher_list->StartRecord + $billing_voucher_list->DisplayRecords - 1)
		$billing_voucher_list->StopRecord = $billing_voucher_list->StartRecord + $billing_voucher_list->DisplayRecords - 1;
	else
		$billing_voucher_list->StopRecord = $billing_voucher_list->TotalRecords;
}
$billing_voucher_list->RecordCount = $billing_voucher_list->StartRecord - 1;
if ($billing_voucher_list->Recordset && !$billing_voucher_list->Recordset->EOF) {
	$billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $billing_voucher_list->StartRecord > 1)
		$billing_voucher_list->Recordset->move($billing_voucher_list->StartRecord - 1);
} elseif (!$billing_voucher->AllowAddDeleteRow && $billing_voucher_list->StopRecord == 0) {
	$billing_voucher_list->StopRecord = $billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$billing_voucher->resetAttributes();
$billing_voucher_list->renderRow();
while ($billing_voucher_list->RecordCount < $billing_voucher_list->StopRecord) {
	$billing_voucher_list->RecordCount++;
	if ($billing_voucher_list->RecordCount >= $billing_voucher_list->StartRecord) {
		$billing_voucher_list->RowCount++;

		// Set up key count
		$billing_voucher_list->KeyCount = $billing_voucher_list->RowIndex;

		// Init row class and style
		$billing_voucher->resetAttributes();
		$billing_voucher->CssClass = "";
		if ($billing_voucher_list->isGridAdd()) {
		} else {
			$billing_voucher_list->loadRowValues($billing_voucher_list->Recordset); // Load row values
		}
		$billing_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$billing_voucher->RowAttrs->merge(["data-rowindex" => $billing_voucher_list->RowCount, "id" => "r" . $billing_voucher_list->RowCount . "_billing_voucher", "data-rowtype" => $billing_voucher->RowType]);

		// Render row
		$billing_voucher_list->renderRow();

		// Render list options
		$billing_voucher_list->renderListOptions();
?>
	<tr <?php echo $billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_voucher_list->ListOptions->render("body", "left", $billing_voucher_list->RowCount);
?>
	<?php if ($billing_voucher_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $billing_voucher_list->id->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_id">
<span<?php echo $billing_voucher_list->id->viewAttributes() ?>><?php echo $billing_voucher_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->PatId->Visible) { // PatId ?>
		<td data-name="PatId" <?php echo $billing_voucher_list->PatId->cellAttributes() ?>>
<script id="orig<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_PatId" class="billing_other_voucheredit" type="text/html">
<?php echo $billing_voucher_list->PatId->getViewValue() ?>
</script>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_PatId">
<span<?php echo $billing_voucher_list->PatId->viewAttributes() ?>><?php echo Barcode()->show($billing_voucher_list->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $billing_voucher_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_BillNumber">
<span<?php echo $billing_voucher_list->BillNumber->viewAttributes() ?>><?php echo $billing_voucher_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $billing_voucher_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_PatientId">
<span><?php echo GetImageViewTag($billing_voucher_list->PatientId, $billing_voucher_list->PatientId->getViewValue()) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $billing_voucher_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_PatientName">
<span<?php echo $billing_voucher_list->PatientName->viewAttributes() ?>><?php echo $billing_voucher_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $billing_voucher_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_Gender">
<span<?php echo $billing_voucher_list->Gender->viewAttributes() ?>><?php echo $billing_voucher_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $billing_voucher_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_Mobile">
<span<?php echo $billing_voucher_list->Mobile->viewAttributes() ?>><?php echo $billing_voucher_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $billing_voucher_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_Doctor">
<span<?php echo $billing_voucher_list->Doctor->viewAttributes() ?>><?php echo $billing_voucher_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $billing_voucher_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher_list->ModeofPayment->viewAttributes() ?>><?php echo $billing_voucher_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $billing_voucher_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_Amount">
<span<?php echo $billing_voucher_list->Amount->viewAttributes() ?>><?php echo $billing_voucher_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $billing_voucher_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_AnyDues">
<span<?php echo $billing_voucher_list->AnyDues->viewAttributes() ?>><?php echo $billing_voucher_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $billing_voucher_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_createdby">
<span<?php echo $billing_voucher_list->createdby->viewAttributes() ?>><?php echo $billing_voucher_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $billing_voucher_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_createddatetime">
<span<?php echo $billing_voucher_list->createddatetime->viewAttributes() ?>><?php echo $billing_voucher_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $billing_voucher_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_modifiedby">
<span<?php echo $billing_voucher_list->modifiedby->viewAttributes() ?>><?php echo $billing_voucher_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $billing_voucher_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher_list->modifieddatetime->viewAttributes() ?>><?php echo $billing_voucher_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $billing_voucher_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_HospID">
<span<?php echo $billing_voucher_list->HospID->viewAttributes() ?>><?php echo $billing_voucher_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $billing_voucher_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_RIDNO">
<span<?php echo $billing_voucher_list->RIDNO->viewAttributes() ?>><?php echo $billing_voucher_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $billing_voucher_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_TidNo">
<span<?php echo $billing_voucher_list->TidNo->viewAttributes() ?>><?php echo $billing_voucher_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $billing_voucher_list->CId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CId">
<span<?php echo $billing_voucher_list->CId->viewAttributes() ?>><?php echo $billing_voucher_list->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $billing_voucher_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_PartnerName">
<span<?php echo $billing_voucher_list->PartnerName->viewAttributes() ?>><?php echo $billing_voucher_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType" <?php echo $billing_voucher_list->PayerType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_PayerType">
<span<?php echo $billing_voucher_list->PayerType->viewAttributes() ?>><?php echo $billing_voucher_list->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->Dob->Visible) { // Dob ?>
		<td data-name="Dob" <?php echo $billing_voucher_list->Dob->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_Dob">
<span<?php echo $billing_voucher_list->Dob->viewAttributes() ?>><?php echo $billing_voucher_list->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $billing_voucher_list->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_DrDepartment">
<span<?php echo $billing_voucher_list->DrDepartment->viewAttributes() ?>><?php echo $billing_voucher_list->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy" <?php echo $billing_voucher_list->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_RefferedBy">
<span<?php echo $billing_voucher_list->RefferedBy->viewAttributes() ?>><?php echo $billing_voucher_list->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $billing_voucher_list->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CardNumber">
<span<?php echo $billing_voucher_list->CardNumber->viewAttributes() ?>><?php echo $billing_voucher_list->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $billing_voucher_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_BankName">
<span<?php echo $billing_voucher_list->BankName->viewAttributes() ?>><?php echo $billing_voucher_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $billing_voucher_list->UserName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_UserName">
<span<?php echo $billing_voucher_list->UserName->viewAttributes() ?>><?php echo $billing_voucher_list->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<td data-name="AdjustmentAdvance" <?php echo $billing_voucher_list->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher_list->AdjustmentAdvance->viewAttributes() ?>><?php echo $billing_voucher_list->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<td data-name="billing_vouchercol" <?php echo $billing_voucher_list->billing_vouchercol->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher_list->billing_vouchercol->viewAttributes() ?>><?php echo $billing_voucher_list->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $billing_voucher_list->BillType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_BillType">
<span<?php echo $billing_voucher_list->BillType->viewAttributes() ?>><?php echo $billing_voucher_list->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->ProcedureName->Visible) { // ProcedureName ?>
		<td data-name="ProcedureName" <?php echo $billing_voucher_list->ProcedureName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_ProcedureName">
<span<?php echo $billing_voucher_list->ProcedureName->viewAttributes() ?>><?php echo $billing_voucher_list->ProcedureName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<td data-name="ProcedureAmount" <?php echo $billing_voucher_list->ProcedureAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher_list->ProcedureAmount->viewAttributes() ?>><?php echo $billing_voucher_list->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->IncludePackage->Visible) { // IncludePackage ?>
		<td data-name="IncludePackage" <?php echo $billing_voucher_list->IncludePackage->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_IncludePackage">
<span<?php echo $billing_voucher_list->IncludePackage->viewAttributes() ?>><?php echo $billing_voucher_list->IncludePackage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill" <?php echo $billing_voucher_list->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CancelBill">
<span<?php echo $billing_voucher_list->CancelBill->viewAttributes() ?>><?php echo $billing_voucher_list->CancelBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CancelReason->Visible) { // CancelReason ?>
		<td data-name="CancelReason" <?php echo $billing_voucher_list->CancelReason->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CancelReason">
<span<?php echo $billing_voucher_list->CancelReason->viewAttributes() ?>><?php echo $billing_voucher_list->CancelReason->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td data-name="CancelModeOfPayment" <?php echo $billing_voucher_list->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher_list->CancelModeOfPayment->viewAttributes() ?>><?php echo $billing_voucher_list->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CancelAmount->Visible) { // CancelAmount ?>
		<td data-name="CancelAmount" <?php echo $billing_voucher_list->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CancelAmount">
<span<?php echo $billing_voucher_list->CancelAmount->viewAttributes() ?>><?php echo $billing_voucher_list->CancelAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CancelBankName->Visible) { // CancelBankName ?>
		<td data-name="CancelBankName" <?php echo $billing_voucher_list->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CancelBankName">
<span<?php echo $billing_voucher_list->CancelBankName->viewAttributes() ?>><?php echo $billing_voucher_list->CancelBankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td data-name="CancelTransactionNumber" <?php echo $billing_voucher_list->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher_list->CancelTransactionNumber->viewAttributes() ?>><?php echo $billing_voucher_list->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest" <?php echo $billing_voucher_list->LabTest->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_LabTest">
<span<?php echo $billing_voucher_list->LabTest->viewAttributes() ?>><?php echo $billing_voucher_list->LabTest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $billing_voucher_list->sid->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_sid">
<span<?php echo $billing_voucher_list->sid->viewAttributes() ?>><?php echo $billing_voucher_list->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo" <?php echo $billing_voucher_list->SidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_SidNo">
<span<?php echo $billing_voucher_list->SidNo->viewAttributes() ?>><?php echo $billing_voucher_list->SidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime" <?php echo $billing_voucher_list->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_createdDatettime">
<span<?php echo $billing_voucher_list->createdDatettime->viewAttributes() ?>><?php echo $billing_voucher_list->createdDatettime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased" <?php echo $billing_voucher_list->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher_list->LabTestReleased->viewAttributes() ?>><?php echo $billing_voucher_list->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID" <?php echo $billing_voucher_list->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCount ?>_billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher_list->GoogleReviewID->viewAttributes() ?>><?php echo $billing_voucher_list->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_voucher_list->ListOptions->render("body", "right", $billing_voucher_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$billing_voucher_list->isGridAdd())
		$billing_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_voucher_list->Recordset)
	$billing_voucher_list->Recordset->Close();
?>
<?php if (!$billing_voucher_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $billing_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_voucher_list->TotalRecords == 0 && !$billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_voucher_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$billing_voucher_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$billing_voucher->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_billing_voucher",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$billing_voucher_list->terminate();
?>