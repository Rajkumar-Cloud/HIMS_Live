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
$view_dashboard_summary_modeofpayment_details_list = new view_dashboard_summary_modeofpayment_details_list();

// Run the page
$view_dashboard_summary_modeofpayment_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_summary_modeofpayment_details_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport()) { ?>
<script>
var fview_dashboard_summary_modeofpayment_detailslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_dashboard_summary_modeofpayment_detailslist = currentForm = new ew.Form("fview_dashboard_summary_modeofpayment_detailslist", "list");
	fview_dashboard_summary_modeofpayment_detailslist.formKeyCountName = '<?php echo $view_dashboard_summary_modeofpayment_details_list->FormKeyCountName ?>';
	loadjs.done("fview_dashboard_summary_modeofpayment_detailslist");
});
var fview_dashboard_summary_modeofpayment_detailslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_dashboard_summary_modeofpayment_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_summary_modeofpayment_detailslistsrch");

	// Validate function for search
	fview_dashboard_summary_modeofpayment_detailslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_summary_modeofpayment_details_list->createddate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_summary_modeofpayment_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_summary_modeofpayment_detailslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_dashboard_summary_modeofpayment_detailslistsrch.filterList = <?php echo $view_dashboard_summary_modeofpayment_details_list->getFilterList() ?>;
	loadjs.done("fview_dashboard_summary_modeofpayment_detailslistsrch");
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
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_summary_modeofpayment_details_list->TotalRecords > 0 && $view_dashboard_summary_modeofpayment_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_summary_modeofpayment_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_summary_modeofpayment_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_summary_modeofpayment_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_summary_modeofpayment_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_dashboard_summary_modeofpayment_details_list->isExport("print")) { ?>
<?php
if ($view_dashboard_summary_modeofpayment_details_list->DbMasterFilter != "" && $view_dashboard_summary_modeofpayment_details->getCurrentMasterTable() == "view_dashboard_summary_details") {
	if ($view_dashboard_summary_modeofpayment_details_list->MasterRecordExists) {
		include_once "view_dashboard_summary_detailsmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_dashboard_summary_modeofpayment_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport() && !$view_dashboard_summary_modeofpayment_details->CurrentAction) { ?>
<form name="fview_dashboard_summary_modeofpayment_detailslistsrch" id="fview_dashboard_summary_modeofpayment_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_dashboard_summary_modeofpayment_detailslistsrch-search-panel" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_summary_modeofpayment_details">
	<div class="ew-extended-search">
<?php

// Render search row
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_SEARCH;
$view_dashboard_summary_modeofpayment_details->resetAttributes();
$view_dashboard_summary_modeofpayment_details_list->renderRow();
?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->createddate->Visible) { // createddate ?>
	<?php
		$view_dashboard_summary_modeofpayment_details_list->SearchColumnCount++;
		if (($view_dashboard_summary_modeofpayment_details_list->SearchColumnCount - 1) % $view_dashboard_summary_modeofpayment_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_summary_modeofpayment_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_summary_modeofpayment_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_dashboard_summary_modeofpayment_details_createddate" class="ew-search-field">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->createddate->ReadOnly && !$view_dashboard_summary_modeofpayment_details_list->createddate->Disabled && !isset($view_dashboard_summary_modeofpayment_details_list->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_modeofpayment_details_list->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailslistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_dashboard_summary_modeofpayment_details_createddate" class="ew-search-field2 d-none">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->EditValue2 ?>"<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->createddate->ReadOnly && !$view_dashboard_summary_modeofpayment_details_list->createddate->Disabled && !isset($view_dashboard_summary_modeofpayment_details_list->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_modeofpayment_details_list->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailslistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SearchColumnCount % $view_dashboard_summary_modeofpayment_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SearchColumnCount % $view_dashboard_summary_modeofpayment_details_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_dashboard_summary_modeofpayment_details_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_summary_modeofpayment_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_summary_modeofpayment_details_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_modeofpayment_details_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_modeofpayment_details_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_modeofpayment_details_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_summary_modeofpayment_details_list->showPageHeader(); ?>
<?php
$view_dashboard_summary_modeofpayment_details_list->showMessage();
?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->TotalRecords > 0 || $view_dashboard_summary_modeofpayment_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_summary_modeofpayment_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_modeofpayment_details">
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_summary_modeofpayment_details_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_modeofpayment_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_summary_modeofpayment_detailslist" id="fview_dashboard_summary_modeofpayment_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_summary_modeofpayment_details">
<?php if ($view_dashboard_summary_modeofpayment_details->getCurrentMasterTable() == "view_dashboard_summary_details" && $view_dashboard_summary_modeofpayment_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_dashboard_summary_details">
<input type="hidden" name="fk_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->UserName->getSessionValue()) ?>">
<input type="hidden" name="fk_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->createddate->getSessionValue()) ?>">
<input type="hidden" name="fk_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_list->HospID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_dashboard_summary_modeofpayment_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_summary_modeofpayment_details_list->TotalRecords > 0 || $view_dashboard_summary_modeofpayment_details_list->isGridEdit()) { ?>
<table id="tbl_view_dashboard_summary_modeofpayment_detailslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_summary_modeofpayment_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_summary_modeofpayment_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_UserName" class="view_dashboard_summary_modeofpayment_details_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->UserName) ?>', 1);"><div id="elh_view_dashboard_summary_modeofpayment_details_UserName" class="view_dashboard_summary_modeofpayment_details_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->ModeofPayment) ?>', 1);"><div id="elh_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->sum28Amount29->Visible) { // sum(Amount) ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->sum28Amount29) == "") { ?>
		<th data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="view_dashboard_summary_modeofpayment_details_sum28Amount29"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->sum28Amount29) ?>', 1);"><div id="elh_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="view_dashboard_summary_modeofpayment_details_sum28Amount29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_list->sum28Amount29->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_list->sum28Amount29->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->createddate) ?>', 1);"><div id="elh_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_list->createddate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_list->createddate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->HospID) ?>', 1);"><div id="elh_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_summary_modeofpayment_details_list->SortUrl($view_dashboard_summary_modeofpayment_details_list->BillType) ?>', 1);"><div id="elh_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_summary_modeofpayment_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_summary_modeofpayment_details_list->ExportAll && $view_dashboard_summary_modeofpayment_details_list->isExport()) {
	$view_dashboard_summary_modeofpayment_details_list->StopRecord = $view_dashboard_summary_modeofpayment_details_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_dashboard_summary_modeofpayment_details_list->TotalRecords > $view_dashboard_summary_modeofpayment_details_list->StartRecord + $view_dashboard_summary_modeofpayment_details_list->DisplayRecords - 1)
		$view_dashboard_summary_modeofpayment_details_list->StopRecord = $view_dashboard_summary_modeofpayment_details_list->StartRecord + $view_dashboard_summary_modeofpayment_details_list->DisplayRecords - 1;
	else
		$view_dashboard_summary_modeofpayment_details_list->StopRecord = $view_dashboard_summary_modeofpayment_details_list->TotalRecords;
}
$view_dashboard_summary_modeofpayment_details_list->RecordCount = $view_dashboard_summary_modeofpayment_details_list->StartRecord - 1;
if ($view_dashboard_summary_modeofpayment_details_list->Recordset && !$view_dashboard_summary_modeofpayment_details_list->Recordset->EOF) {
	$view_dashboard_summary_modeofpayment_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_summary_modeofpayment_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_summary_modeofpayment_details_list->StartRecord > 1)
		$view_dashboard_summary_modeofpayment_details_list->Recordset->move($view_dashboard_summary_modeofpayment_details_list->StartRecord - 1);
} elseif (!$view_dashboard_summary_modeofpayment_details->AllowAddDeleteRow && $view_dashboard_summary_modeofpayment_details_list->StopRecord == 0) {
	$view_dashboard_summary_modeofpayment_details_list->StopRecord = $view_dashboard_summary_modeofpayment_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_summary_modeofpayment_details->resetAttributes();
$view_dashboard_summary_modeofpayment_details_list->renderRow();
while ($view_dashboard_summary_modeofpayment_details_list->RecordCount < $view_dashboard_summary_modeofpayment_details_list->StopRecord) {
	$view_dashboard_summary_modeofpayment_details_list->RecordCount++;
	if ($view_dashboard_summary_modeofpayment_details_list->RecordCount >= $view_dashboard_summary_modeofpayment_details_list->StartRecord) {
		$view_dashboard_summary_modeofpayment_details_list->RowCount++;

		// Set up key count
		$view_dashboard_summary_modeofpayment_details_list->KeyCount = $view_dashboard_summary_modeofpayment_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_summary_modeofpayment_details->resetAttributes();
		$view_dashboard_summary_modeofpayment_details->CssClass = "";
		if ($view_dashboard_summary_modeofpayment_details_list->isGridAdd()) {
		} else {
			$view_dashboard_summary_modeofpayment_details_list->loadRowValues($view_dashboard_summary_modeofpayment_details_list->Recordset); // Load row values
		}
		$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_summary_modeofpayment_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_summary_modeofpayment_details_list->RowCount, "id" => "r" . $view_dashboard_summary_modeofpayment_details_list->RowCount . "_view_dashboard_summary_modeofpayment_details", "data-rowtype" => $view_dashboard_summary_modeofpayment_details->RowType]);

		// Render row
		$view_dashboard_summary_modeofpayment_details_list->renderRow();

		// Render list options
		$view_dashboard_summary_modeofpayment_details_list->renderListOptions();
?>
	<tr <?php echo $view_dashboard_summary_modeofpayment_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_modeofpayment_details_list->ListOptions->render("body", "left", $view_dashboard_summary_modeofpayment_details_list->RowCount);
?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_list->RowCount ?>_view_dashboard_summary_modeofpayment_details_UserName">
<span<?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_list->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29" <?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_list->RowCount ?>_view_dashboard_summary_modeofpayment_details_sum28Amount29">
<span<?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->createddate->Visible) { // createddate ?>
		<td data-name="createddate" <?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_list->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate">
<span<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_list->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID">
<span<?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_list->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType">
<span<?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_modeofpayment_details_list->ListOptions->render("body", "right", $view_dashboard_summary_modeofpayment_details_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_summary_modeofpayment_details_list->isGridAdd())
		$view_dashboard_summary_modeofpayment_details_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_summary_modeofpayment_details->resetAttributes();
$view_dashboard_summary_modeofpayment_details_list->renderRow();
?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->TotalRecords > 0 && !$view_dashboard_summary_modeofpayment_details_list->isGridAdd() && !$view_dashboard_summary_modeofpayment_details_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_summary_modeofpayment_details_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_summary_modeofpayment_details_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->UserName->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_UserName" class="view_dashboard_summary_modeofpayment_details_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="view_dashboard_summary_modeofpayment_details_sum28Amount29">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_summary_modeofpayment_details_list->sum28Amount29->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_dashboard_summary_modeofpayment_details_list->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_summary_modeofpayment_details_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_dashboard_summary_modeofpayment_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_summary_modeofpayment_details_list->Recordset)
	$view_dashboard_summary_modeofpayment_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_summary_modeofpayment_details_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_modeofpayment_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_list->TotalRecords == 0 && !$view_dashboard_summary_modeofpayment_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_modeofpayment_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_summary_modeofpayment_details_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_summary_modeofpayment_details_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_summary_modeofpayment_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_summary_modeofpayment_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_dashboard_summary_modeofpayment_details_list->terminate();
?>