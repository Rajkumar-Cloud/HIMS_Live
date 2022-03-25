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
$view_dashboard_collection_details_list = new view_dashboard_collection_details_list();

// Run the page
$view_dashboard_collection_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_collection_details_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_dashboard_collection_details_list->isExport()) { ?>
<script>
var fview_dashboard_collection_detailslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_dashboard_collection_detailslist = currentForm = new ew.Form("fview_dashboard_collection_detailslist", "list");
	fview_dashboard_collection_detailslist.formKeyCountName = '<?php echo $view_dashboard_collection_details_list->FormKeyCountName ?>';
	loadjs.done("fview_dashboard_collection_detailslist");
});
var fview_dashboard_collection_detailslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_dashboard_collection_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_collection_detailslistsrch");

	// Validate function for search
	fview_dashboard_collection_detailslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_list->createddate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_collection_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_collection_detailslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_dashboard_collection_detailslistsrch.filterList = <?php echo $view_dashboard_collection_details_list->getFilterList() ?>;
	loadjs.done("fview_dashboard_collection_detailslistsrch");
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
<?php if (!$view_dashboard_collection_details_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_collection_details_list->TotalRecords > 0 && $view_dashboard_collection_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_dashboard_collection_details_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_dashboard_collection_details_list->isExport("print")) { ?>
<?php
if ($view_dashboard_collection_details_list->DbMasterFilter != "" && $view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details") {
	if ($view_dashboard_collection_details_list->MasterRecordExists) {
		include_once "view_dashboard_summary_modeofpayment_detailsmaster.php";
	}
}
?>
<?php
if ($view_dashboard_collection_details_list->DbMasterFilter != "" && $view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_payment_mode") {
	if ($view_dashboard_collection_details_list->MasterRecordExists) {
		include_once "view_dashboard_summary_payment_modemaster.php";
	}
}
?>
<?php } ?>
<?php
$view_dashboard_collection_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_collection_details_list->isExport() && !$view_dashboard_collection_details->CurrentAction) { ?>
<form name="fview_dashboard_collection_detailslistsrch" id="fview_dashboard_collection_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_dashboard_collection_detailslistsrch-search-panel" class="<?php echo $view_dashboard_collection_details_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_collection_details">
	<div class="ew-extended-search">
<?php

// Render search row
$view_dashboard_collection_details->RowType = ROWTYPE_SEARCH;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_list->renderRow();
?>
<?php if ($view_dashboard_collection_details_list->createddate->Visible) { // createddate ?>
	<?php
		$view_dashboard_collection_details_list->SearchColumnCount++;
		if (($view_dashboard_collection_details_list->SearchColumnCount - 1) % $view_dashboard_collection_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_collection_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_collection_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_dashboard_collection_details_list->createddate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_dashboard_collection_details_list->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_dashboard_collection_details_createddate" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_list->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_list->createddate->EditValue ?>"<?php echo $view_dashboard_collection_details_list->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_list->createddate->ReadOnly && !$view_dashboard_collection_details_list->createddate->Disabled && !isset($view_dashboard_collection_details_list->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_list->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailslistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_dashboard_collection_details_createddate" class="ew-search-field2 d-none">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_list->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_list->createddate->EditValue2 ?>"<?php echo $view_dashboard_collection_details_list->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_list->createddate->ReadOnly && !$view_dashboard_collection_details_list->createddate->Disabled && !isset($view_dashboard_collection_details_list->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_list->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailslistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_dashboard_collection_details_list->SearchColumnCount % $view_dashboard_collection_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->UserName->Visible) { // UserName ?>
	<?php
		$view_dashboard_collection_details_list->SearchColumnCount++;
		if (($view_dashboard_collection_details_list->SearchColumnCount - 1) % $view_dashboard_collection_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_collection_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_collection_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_UserName" class="ew-cell form-group">
		<label for="x_UserName" class="ew-search-caption ew-label"><?php echo $view_dashboard_collection_details_list->UserName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UserName" id="z_UserName" value="LIKE">
</span>
		<span id="el_view_dashboard_collection_details_UserName" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x_UserName" id="x_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_list->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_list->UserName->EditValue ?>"<?php echo $view_dashboard_collection_details_list->UserName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_dashboard_collection_details_list->SearchColumnCount % $view_dashboard_collection_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->Mobile->Visible) { // Mobile ?>
	<?php
		$view_dashboard_collection_details_list->SearchColumnCount++;
		if (($view_dashboard_collection_details_list->SearchColumnCount - 1) % $view_dashboard_collection_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_collection_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_collection_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_dashboard_collection_details_list->Mobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		<span id="el_view_dashboard_collection_details_Mobile" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_list->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_list->Mobile->EditValue ?>"<?php echo $view_dashboard_collection_details_list->Mobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_dashboard_collection_details_list->SearchColumnCount % $view_dashboard_collection_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_dashboard_collection_details_list->SearchColumnCount % $view_dashboard_collection_details_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_dashboard_collection_details_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_collection_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_collection_details_list->showPageHeader(); ?>
<?php
$view_dashboard_collection_details_list->showMessage();
?>
<?php if ($view_dashboard_collection_details_list->TotalRecords > 0 || $view_dashboard_collection_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_collection_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_collection_details">
<?php if (!$view_dashboard_collection_details_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_collection_details_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_collection_details_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_collection_detailslist" id="fview_dashboard_collection_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_collection_details">
<?php if ($view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details" && $view_dashboard_collection_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_dashboard_summary_modeofpayment_details">
<input type="hidden" name="fk_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->UserName->getSessionValue()) ?>">
<input type="hidden" name="fk_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->createddate->getSessionValue()) ?>">
<input type="hidden" name="fk_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->ModeofPayment->getSessionValue()) ?>">
<input type="hidden" name="fk_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->HospID->getSessionValue()) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_payment_mode" && $view_dashboard_collection_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_dashboard_summary_payment_mode">
<input type="hidden" name="fk_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->createddate->getSessionValue()) ?>">
<input type="hidden" name="fk_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->HospID->getSessionValue()) ?>">
<input type="hidden" name="fk_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->UserName->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_dashboard_collection_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_collection_details_list->TotalRecords > 0 || $view_dashboard_collection_details_list->isGridEdit()) { ?>
<table id="tbl_view_dashboard_collection_detailslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_collection_details->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_collection_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_collection_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_collection_details_list->id->Visible) { // id ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_dashboard_collection_details_list->id->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_dashboard_collection_details_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->id) ?>', 1);"><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_collection_details_list->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_collection_details_list->createddate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->createddate) ?>', 1);"><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->createddate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->createddate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_collection_details_list->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_collection_details_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->UserName) ?>', 1);"><div id="elh_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_dashboard_collection_details_list->BillNumber->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_dashboard_collection_details_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->BillNumber) ?>', 1);"><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_collection_details_list->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_collection_details_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->PatientID) ?>', 1);"><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_collection_details_list->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_collection_details_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->PatientName) ?>', 1);"><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_dashboard_collection_details_list->Mobile->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_dashboard_collection_details_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->Mobile) ?>', 1);"><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_dashboard_collection_details_list->voucher_type->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_dashboard_collection_details_list->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->voucher_type) ?>', 1);"><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->Details->Visible) { // Details ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_dashboard_collection_details_list->Details->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_dashboard_collection_details_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->Details) ?>', 1);"><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->ModeofPayment) ?>', 1);"><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->Amount->Visible) { // Amount ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_dashboard_collection_details_list->Amount->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_dashboard_collection_details_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->Amount) ?>', 1);"><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_dashboard_collection_details_list->AnyDues->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_dashboard_collection_details_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->AnyDues) ?>', 1);"><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_collection_details_list->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_collection_details_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->createdby) ?>', 1);"><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_collection_details_list->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_collection_details_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->createddatetime) ?>', 1);"><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_dashboard_collection_details_list->modifiedby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_dashboard_collection_details_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->modifiedby) ?>', 1);"><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->modifieddatetime) ?>', 1);"><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_collection_details_list->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_collection_details_list->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->BillType) ?>', 1);"><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_collection_details_list->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_collection_details_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_collection_details_list->SortUrl($view_dashboard_collection_details_list->HospID) ?>', 1);"><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_collection_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_collection_details_list->ExportAll && $view_dashboard_collection_details_list->isExport()) {
	$view_dashboard_collection_details_list->StopRecord = $view_dashboard_collection_details_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_dashboard_collection_details_list->TotalRecords > $view_dashboard_collection_details_list->StartRecord + $view_dashboard_collection_details_list->DisplayRecords - 1)
		$view_dashboard_collection_details_list->StopRecord = $view_dashboard_collection_details_list->StartRecord + $view_dashboard_collection_details_list->DisplayRecords - 1;
	else
		$view_dashboard_collection_details_list->StopRecord = $view_dashboard_collection_details_list->TotalRecords;
}
$view_dashboard_collection_details_list->RecordCount = $view_dashboard_collection_details_list->StartRecord - 1;
if ($view_dashboard_collection_details_list->Recordset && !$view_dashboard_collection_details_list->Recordset->EOF) {
	$view_dashboard_collection_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_collection_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_collection_details_list->StartRecord > 1)
		$view_dashboard_collection_details_list->Recordset->move($view_dashboard_collection_details_list->StartRecord - 1);
} elseif (!$view_dashboard_collection_details->AllowAddDeleteRow && $view_dashboard_collection_details_list->StopRecord == 0) {
	$view_dashboard_collection_details_list->StopRecord = $view_dashboard_collection_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_list->renderRow();
while ($view_dashboard_collection_details_list->RecordCount < $view_dashboard_collection_details_list->StopRecord) {
	$view_dashboard_collection_details_list->RecordCount++;
	if ($view_dashboard_collection_details_list->RecordCount >= $view_dashboard_collection_details_list->StartRecord) {
		$view_dashboard_collection_details_list->RowCount++;

		// Set up key count
		$view_dashboard_collection_details_list->KeyCount = $view_dashboard_collection_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_collection_details->resetAttributes();
		$view_dashboard_collection_details->CssClass = "";
		if ($view_dashboard_collection_details_list->isGridAdd()) {
		} else {
			$view_dashboard_collection_details_list->loadRowValues($view_dashboard_collection_details_list->Recordset); // Load row values
		}
		$view_dashboard_collection_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_collection_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_collection_details_list->RowCount, "id" => "r" . $view_dashboard_collection_details_list->RowCount . "_view_dashboard_collection_details", "data-rowtype" => $view_dashboard_collection_details->RowType]);

		// Render row
		$view_dashboard_collection_details_list->renderRow();

		// Render list options
		$view_dashboard_collection_details_list->renderListOptions();
?>
	<tr <?php echo $view_dashboard_collection_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_collection_details_list->ListOptions->render("body", "left", $view_dashboard_collection_details_list->RowCount);
?>
	<?php if ($view_dashboard_collection_details_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_dashboard_collection_details_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_id">
<span<?php echo $view_dashboard_collection_details_list->id->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->createddate->Visible) { // createddate ?>
		<td data-name="createddate" <?php echo $view_dashboard_collection_details_list->createddate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_createddate">
<span<?php echo $view_dashboard_collection_details_list->createddate->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->createddate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_dashboard_collection_details_list->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_UserName">
<span<?php echo $view_dashboard_collection_details_list->UserName->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_dashboard_collection_details_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_BillNumber">
<span<?php echo $view_dashboard_collection_details_list->BillNumber->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_dashboard_collection_details_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_PatientID">
<span<?php echo $view_dashboard_collection_details_list->PatientID->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_dashboard_collection_details_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_PatientName">
<span<?php echo $view_dashboard_collection_details_list->PatientName->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_dashboard_collection_details_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_Mobile">
<span<?php echo $view_dashboard_collection_details_list->Mobile->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $view_dashboard_collection_details_list->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_voucher_type">
<span<?php echo $view_dashboard_collection_details_list->voucher_type->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_dashboard_collection_details_list->Details->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_Details">
<span<?php echo $view_dashboard_collection_details_list->Details->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_dashboard_collection_details_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_ModeofPayment">
<span<?php echo $view_dashboard_collection_details_list->ModeofPayment->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_dashboard_collection_details_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_Amount">
<span<?php echo $view_dashboard_collection_details_list->Amount->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_dashboard_collection_details_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_AnyDues">
<span<?php echo $view_dashboard_collection_details_list->AnyDues->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_dashboard_collection_details_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_createdby">
<span<?php echo $view_dashboard_collection_details_list->createdby->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_dashboard_collection_details_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_createddatetime">
<span<?php echo $view_dashboard_collection_details_list->createddatetime->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_dashboard_collection_details_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_modifiedby">
<span<?php echo $view_dashboard_collection_details_list->modifiedby->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_dashboard_collection_details_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_modifieddatetime">
<span<?php echo $view_dashboard_collection_details_list->modifieddatetime->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_dashboard_collection_details_list->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_BillType">
<span<?php echo $view_dashboard_collection_details_list->BillType->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_collection_details_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCount ?>_view_dashboard_collection_details_HospID">
<span<?php echo $view_dashboard_collection_details_list->HospID->viewAttributes() ?>><?php echo $view_dashboard_collection_details_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_collection_details_list->ListOptions->render("body", "right", $view_dashboard_collection_details_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_collection_details_list->isGridAdd())
		$view_dashboard_collection_details_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_list->renderRow();
?>
<?php if ($view_dashboard_collection_details_list->TotalRecords > 0 && !$view_dashboard_collection_details_list->isGridAdd() && !$view_dashboard_collection_details_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_collection_details_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_collection_details_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_collection_details_list->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_dashboard_collection_details_list->id->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_dashboard_collection_details_list->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_dashboard_collection_details_list->UserName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" class="<?php echo $view_dashboard_collection_details_list->BillNumber->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" class="<?php echo $view_dashboard_collection_details_list->PatientID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_collection_details_list->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_dashboard_collection_details_list->Mobile->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" class="<?php echo $view_dashboard_collection_details_list->voucher_type->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Details->Visible) { // Details ?>
		<td data-name="Details" class="<?php echo $view_dashboard_collection_details_list->Details->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details_list->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $view_dashboard_collection_details_list->Amount->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_collection_details_list->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" class="<?php echo $view_dashboard_collection_details_list->AnyDues->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_collection_details_list->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_collection_details_list->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $view_dashboard_collection_details_list->modifiedby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details_list->modifieddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_dashboard_collection_details_list->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_collection_details_list->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_collection_details_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_dashboard_collection_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_collection_details_list->Recordset)
	$view_dashboard_collection_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_collection_details_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_collection_details_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_collection_details_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_collection_details_list->TotalRecords == 0 && !$view_dashboard_collection_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_collection_details_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_collection_details_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_collection_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_dashboard_collection_details_list->terminate();
?>