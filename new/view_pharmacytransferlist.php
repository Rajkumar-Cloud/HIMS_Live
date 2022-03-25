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
$view_pharmacytransfer_list = new view_pharmacytransfer_list();

// Run the page
$view_pharmacytransfer_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacytransfer_list->isExport()) { ?>
<script>
var fview_pharmacytransferlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacytransferlist = currentForm = new ew.Form("fview_pharmacytransferlist", "list");
	fview_pharmacytransferlist.formKeyCountName = '<?php echo $view_pharmacytransfer_list->FormKeyCountName ?>';

	// Validate form
	fview_pharmacytransferlist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($view_pharmacytransfer_list->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->ORDNO->caption(), $view_pharmacytransfer_list->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->BRCODE->caption(), $view_pharmacytransfer_list->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->BRCODE->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->PRC->caption(), $view_pharmacytransfer_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->LastMonthSale->caption(), $view_pharmacytransfer_list->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->LastMonthSale->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->PrName->caption(), $view_pharmacytransfer_list->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->Quantity->caption(), $view_pharmacytransfer_list->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->BatchNo->caption(), $view_pharmacytransfer_list->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->ExpDate->caption(), $view_pharmacytransfer_list->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->ExpDate->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->MRP->caption(), $view_pharmacytransfer_list->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->MRP->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->ItemValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->ItemValue->caption(), $view_pharmacytransfer_list->ItemValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->ItemValue->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->trid->Required) { ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->trid->caption(), $view_pharmacytransfer_list->trid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_trid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->trid->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->HospID->caption(), $view_pharmacytransfer_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->grncreatedby->caption(), $view_pharmacytransfer_list->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->grncreatedDateTime->caption(), $view_pharmacytransfer_list->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->grnModifiedby->caption(), $view_pharmacytransfer_list->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->grnModifiedDateTime->caption(), $view_pharmacytransfer_list->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacytransfer_list->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->BillDate->caption(), $view_pharmacytransfer_list->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->BillDate->errorMessage()) ?>");
			<?php if ($view_pharmacytransfer_list->CurStock->Required) { ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacytransfer_list->CurStock->caption(), $view_pharmacytransfer_list->CurStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_list->CurStock->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	fview_pharmacytransferlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "LastMonthSale", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
		if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
		if (ew.valueChanged(fobj, infix, "ItemValue", false)) return false;
		if (ew.valueChanged(fobj, infix, "trid", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacytransferlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacytransferlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacytransferlist.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_list->ORDNO->Lookup->toClientList($view_pharmacytransfer_list) ?>;
	fview_pharmacytransferlist.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_list->ORDNO->lookupOptions()) ?>;
	fview_pharmacytransferlist.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacytransferlist.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_list->BRCODE->Lookup->toClientList($view_pharmacytransfer_list) ?>;
	fview_pharmacytransferlist.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_list->BRCODE->lookupOptions()) ?>;
	fview_pharmacytransferlist.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacytransferlist.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_list->LastMonthSale->Lookup->toClientList($view_pharmacytransfer_list) ?>;
	fview_pharmacytransferlist.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_list->LastMonthSale->lookupOptions()) ?>;
	fview_pharmacytransferlist.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacytransferlist");
});
var fview_pharmacytransferlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacytransferlistsrch = currentSearchForm = new ew.Form("fview_pharmacytransferlistsrch");

	// Dynamic selection lists
	// Filters

	fview_pharmacytransferlistsrch.filterList = <?php echo $view_pharmacytransfer_list->getFilterList() ?>;
	loadjs.done("fview_pharmacytransferlistsrch");
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
<?php if (!$view_pharmacytransfer_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacytransfer_list->TotalRecords > 0 && $view_pharmacytransfer_list->ExportOptions->visible()) { ?>
<?php $view_pharmacytransfer_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->ImportOptions->visible()) { ?>
<?php $view_pharmacytransfer_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->SearchOptions->visible()) { ?>
<?php $view_pharmacytransfer_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->FilterOptions->visible()) { ?>
<?php $view_pharmacytransfer_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacytransfer_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_pharmacytransfer_list->isExport("print")) { ?>
<?php
if ($view_pharmacytransfer_list->DbMasterFilter != "" && $view_pharmacytransfer->getCurrentMasterTable() == "pharmacy_billing_transfer") {
	if ($view_pharmacytransfer_list->MasterRecordExists) {
		include_once "pharmacy_billing_transfermaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacytransfer_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacytransfer_list->isExport() && !$view_pharmacytransfer->CurrentAction) { ?>
<form name="fview_pharmacytransferlistsrch" id="fview_pharmacytransferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacytransferlistsrch-search-panel" class="<?php echo $view_pharmacytransfer_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacytransfer">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_pharmacytransfer_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacytransfer_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacytransfer_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacytransfer_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacytransfer_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacytransfer_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacytransfer_list->showPageHeader(); ?>
<?php
$view_pharmacytransfer_list->showMessage();
?>
<?php if ($view_pharmacytransfer_list->TotalRecords > 0 || $view_pharmacytransfer->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacytransfer_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacytransfer">
<?php if (!$view_pharmacytransfer_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacytransfer_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacytransfer_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacytransfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacytransferlist" id="fview_pharmacytransferlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<?php if ($view_pharmacytransfer->getCurrentMasterTable() == "pharmacy_billing_transfer" && $view_pharmacytransfer->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_transfer">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacytransfer" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacytransfer_list->TotalRecords > 0 || $view_pharmacytransfer_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacytransferlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacytransfer->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacytransfer_list->renderListOptions();

// Render list options (header, left)
$view_pharmacytransfer_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacytransfer_list->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $view_pharmacytransfer_list->ORDNO->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $view_pharmacytransfer_list->ORDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->ORDNO) ?>', 1);"><div id="elh_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->ORDNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->ORDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->ORDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacytransfer_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacytransfer_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacytransfer_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacytransfer_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->PRC) ?>', 1);"><div id="elh_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $view_pharmacytransfer_list->LastMonthSale->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $view_pharmacytransfer_list->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->LastMonthSale) ?>', 1);"><div id="elh_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->LastMonthSale->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->LastMonthSale->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacytransfer_list->PrName->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacytransfer_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->PrName) ?>', 1);"><div id="elh_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacytransfer_list->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacytransfer_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->Quantity) ?>', 1);"><div id="elh_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacytransfer_list->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacytransfer_list->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->BatchNo) ?>', 1);"><div id="elh_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacytransfer_list->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacytransfer_list->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->ExpDate) ?>', 1);"><div id="elh_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacytransfer_list->MRP->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacytransfer_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->MRP) ?>', 1);"><div id="elh_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacytransfer_list->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacytransfer_list->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->ItemValue) ?>', 1);"><div id="elh_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->ItemValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->ItemValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->trid->Visible) { // trid ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->trid) == "") { ?>
		<th data-name="trid" class="<?php echo $view_pharmacytransfer_list->trid->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->trid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="trid" class="<?php echo $view_pharmacytransfer_list->trid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->trid) ?>', 1);"><div id="elh_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->trid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->trid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->trid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacytransfer_list->HospID->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacytransfer_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->HospID) ?>', 1);"><div id="elh_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacytransfer_list->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacytransfer_list->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grncreatedby) ?>', 1);"><div id="elh_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->grncreatedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->grncreatedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacytransfer_list->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacytransfer_list->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grncreatedDateTime) ?>', 1);"><div id="elh_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->grncreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->grncreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacytransfer_list->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacytransfer_list->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grnModifiedby) ?>', 1);"><div id="elh_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->grnModifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->grnModifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacytransfer_list->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacytransfer_list->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->grnModifiedDateTime) ?>', 1);"><div id="elh_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacytransfer_list->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacytransfer_list->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->BillDate) ?>', 1);"><div id="elh_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->CurStock->Visible) { // CurStock ?>
	<?php if ($view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $view_pharmacytransfer_list->CurStock->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock"><div class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $view_pharmacytransfer_list->CurStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacytransfer_list->SortUrl($view_pharmacytransfer_list->CurStock) ?>', 1);"><div id="elh_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacytransfer_list->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacytransfer_list->CurStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacytransfer_list->CurStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacytransfer_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacytransfer_list->ExportAll && $view_pharmacytransfer_list->isExport()) {
	$view_pharmacytransfer_list->StopRecord = $view_pharmacytransfer_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacytransfer_list->TotalRecords > $view_pharmacytransfer_list->StartRecord + $view_pharmacytransfer_list->DisplayRecords - 1)
		$view_pharmacytransfer_list->StopRecord = $view_pharmacytransfer_list->StartRecord + $view_pharmacytransfer_list->DisplayRecords - 1;
	else
		$view_pharmacytransfer_list->StopRecord = $view_pharmacytransfer_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_pharmacytransfer->isConfirm() || $view_pharmacytransfer_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacytransfer_list->FormKeyCountName) && ($view_pharmacytransfer_list->isGridAdd() || $view_pharmacytransfer_list->isGridEdit() || $view_pharmacytransfer->isConfirm())) {
		$view_pharmacytransfer_list->KeyCount = $CurrentForm->getValue($view_pharmacytransfer_list->FormKeyCountName);
		$view_pharmacytransfer_list->StopRecord = $view_pharmacytransfer_list->StartRecord + $view_pharmacytransfer_list->KeyCount - 1;
	}
}
$view_pharmacytransfer_list->RecordCount = $view_pharmacytransfer_list->StartRecord - 1;
if ($view_pharmacytransfer_list->Recordset && !$view_pharmacytransfer_list->Recordset->EOF) {
	$view_pharmacytransfer_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacytransfer_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacytransfer_list->StartRecord > 1)
		$view_pharmacytransfer_list->Recordset->move($view_pharmacytransfer_list->StartRecord - 1);
} elseif (!$view_pharmacytransfer->AllowAddDeleteRow && $view_pharmacytransfer_list->StopRecord == 0) {
	$view_pharmacytransfer_list->StopRecord = $view_pharmacytransfer->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacytransfer->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacytransfer->resetAttributes();
$view_pharmacytransfer_list->renderRow();
if ($view_pharmacytransfer_list->isGridAdd())
	$view_pharmacytransfer_list->RowIndex = 0;
if ($view_pharmacytransfer_list->isGridEdit())
	$view_pharmacytransfer_list->RowIndex = 0;
while ($view_pharmacytransfer_list->RecordCount < $view_pharmacytransfer_list->StopRecord) {
	$view_pharmacytransfer_list->RecordCount++;
	if ($view_pharmacytransfer_list->RecordCount >= $view_pharmacytransfer_list->StartRecord) {
		$view_pharmacytransfer_list->RowCount++;
		if ($view_pharmacytransfer_list->isGridAdd() || $view_pharmacytransfer_list->isGridEdit() || $view_pharmacytransfer->isConfirm()) {
			$view_pharmacytransfer_list->RowIndex++;
			$CurrentForm->Index = $view_pharmacytransfer_list->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacytransfer_list->FormActionName) && ($view_pharmacytransfer->isConfirm() || $view_pharmacytransfer_list->EventCancelled))
				$view_pharmacytransfer_list->RowAction = strval($CurrentForm->getValue($view_pharmacytransfer_list->FormActionName));
			elseif ($view_pharmacytransfer_list->isGridAdd())
				$view_pharmacytransfer_list->RowAction = "insert";
			else
				$view_pharmacytransfer_list->RowAction = "";
		}

		// Set up key count
		$view_pharmacytransfer_list->KeyCount = $view_pharmacytransfer_list->RowIndex;

		// Init row class and style
		$view_pharmacytransfer->resetAttributes();
		$view_pharmacytransfer->CssClass = "";
		if ($view_pharmacytransfer_list->isGridAdd()) {
			$view_pharmacytransfer_list->loadRowValues(); // Load default values
		} else {
			$view_pharmacytransfer_list->loadRowValues($view_pharmacytransfer_list->Recordset); // Load row values
		}
		$view_pharmacytransfer->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacytransfer_list->isGridAdd()) // Grid add
			$view_pharmacytransfer->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacytransfer_list->isGridAdd() && $view_pharmacytransfer->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacytransfer_list->restoreCurrentRowFormValues($view_pharmacytransfer_list->RowIndex); // Restore form values
		if ($view_pharmacytransfer_list->isGridEdit()) { // Grid edit
			if ($view_pharmacytransfer->EventCancelled)
				$view_pharmacytransfer_list->restoreCurrentRowFormValues($view_pharmacytransfer_list->RowIndex); // Restore form values
			if ($view_pharmacytransfer_list->RowAction == "insert")
				$view_pharmacytransfer->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacytransfer->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacytransfer_list->isGridEdit() && ($view_pharmacytransfer->RowType == ROWTYPE_EDIT || $view_pharmacytransfer->RowType == ROWTYPE_ADD) && $view_pharmacytransfer->EventCancelled) // Update failed
			$view_pharmacytransfer_list->restoreCurrentRowFormValues($view_pharmacytransfer_list->RowIndex); // Restore form values
		if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacytransfer_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_pharmacytransfer->RowAttrs->merge(["data-rowindex" => $view_pharmacytransfer_list->RowCount, "id" => "r" . $view_pharmacytransfer_list->RowCount . "_view_pharmacytransfer", "data-rowtype" => $view_pharmacytransfer->RowType]);

		// Render row
		$view_pharmacytransfer_list->renderRow();

		// Render list options
		$view_pharmacytransfer_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacytransfer_list->RowAction != "delete" && $view_pharmacytransfer_list->RowAction != "insertdelete" && !($view_pharmacytransfer_list->RowAction == "insert" && $view_pharmacytransfer->isConfirm() && $view_pharmacytransfer_list->emptyRow())) {
?>
	<tr <?php echo $view_pharmacytransfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacytransfer_list->ListOptions->render("body", "left", $view_pharmacytransfer_list->RowCount);
?>
	<?php if ($view_pharmacytransfer_list->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO" <?php echo $view_pharmacytransfer_list->ORDNO->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ORDNO" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer_list->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ORDNO">
<span<?php echo $view_pharmacytransfer_list->ORDNO->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->ORDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_id" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacytransfer_list->id->CurrentValue) ?>">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_id" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacytransfer_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT || $view_pharmacytransfer->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_id" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_id" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacytransfer_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_pharmacytransfer_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacytransfer_list->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BRCODE" class="form-group">
<?php
$onchange = $view_pharmacytransfer_list->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_list->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer_list->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_list->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer_list->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
	fview_pharmacytransferlist.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE","forceSelect":false});
});
</script>
<?php echo $view_pharmacytransfer_list->BRCODE->Lookup->getParamTag($view_pharmacytransfer_list, "p_x" . $view_pharmacytransfer_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BRCODE" class="form-group">
<?php
$onchange = $view_pharmacytransfer_list->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_list->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer_list->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_list->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer_list->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
	fview_pharmacytransferlist.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE","forceSelect":false});
});
</script>
<?php echo $view_pharmacytransfer_list->BRCODE->Lookup->getParamTag($view_pharmacytransfer_list, "p_x" . $view_pharmacytransfer_list->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BRCODE">
<span<?php echo $view_pharmacytransfer_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacytransfer_list->PRC->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_PRC" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->PRC->EditValue ?>"<?php echo $view_pharmacytransfer_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_PRC" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->PRC->EditValue ?>"<?php echo $view_pharmacytransfer_list->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_PRC">
<span<?php echo $view_pharmacytransfer_list->PRC->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale" <?php echo $view_pharmacytransfer_list->LastMonthSale->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_LastMonthSale" class="form-group">
<?php
$onchange = $view_pharmacytransfer_list->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_list->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer_list->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_list->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer_list->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
	fview_pharmacytransferlist.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale","forceSelect":true});
});
</script>
<?php echo $view_pharmacytransfer_list->LastMonthSale->Lookup->getParamTag($view_pharmacytransfer_list, "p_x" . $view_pharmacytransfer_list->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_LastMonthSale" class="form-group">
<?php
$onchange = $view_pharmacytransfer_list->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_list->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer_list->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_list->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer_list->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
	fview_pharmacytransferlist.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale","forceSelect":true});
});
</script>
<?php echo $view_pharmacytransfer_list->LastMonthSale->Lookup->getParamTag($view_pharmacytransfer_list, "p_x" . $view_pharmacytransfer_list->RowIndex . "_LastMonthSale") ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_LastMonthSale">
<span<?php echo $view_pharmacytransfer_list->LastMonthSale->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->LastMonthSale->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacytransfer_list->PrName->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_PrName" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->PrName->EditValue ?>"<?php echo $view_pharmacytransfer_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer_list->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_PrName" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->PrName->EditValue ?>"<?php echo $view_pharmacytransfer_list->PrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_PrName">
<span<?php echo $view_pharmacytransfer_list->PrName->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacytransfer_list->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_Quantity" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer_list->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_Quantity" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer_list->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_Quantity">
<span<?php echo $view_pharmacytransfer_list->Quantity->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_pharmacytransfer_list->BatchNo->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BatchNo" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer_list->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BatchNo" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer_list->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BatchNo">
<span<?php echo $view_pharmacytransfer_list->BatchNo->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_pharmacytransfer_list->ExpDate->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ExpDate" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_list->ExpDate->ReadOnly && !$view_pharmacytransfer_list->ExpDate->Disabled && !isset($view_pharmacytransfer_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferlist", "x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer_list->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ExpDate" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_list->ExpDate->ReadOnly && !$view_pharmacytransfer_list->ExpDate->Disabled && !isset($view_pharmacytransfer_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferlist", "x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ExpDate">
<span<?php echo $view_pharmacytransfer_list->ExpDate->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->ExpDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $view_pharmacytransfer_list->MRP->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_MRP" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->MRP->EditValue ?>"<?php echo $view_pharmacytransfer_list->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer_list->MRP->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_MRP" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->MRP->EditValue ?>"<?php echo $view_pharmacytransfer_list->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_MRP">
<span<?php echo $view_pharmacytransfer_list->MRP->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" <?php echo $view_pharmacytransfer_list->ItemValue->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ItemValue" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer_list->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer_list->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ItemValue" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer_list->ItemValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_ItemValue">
<span<?php echo $view_pharmacytransfer_list->ItemValue->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->ItemValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->trid->Visible) { // trid ?>
		<td data-name="trid" <?php echo $view_pharmacytransfer_list->trid->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_pharmacytransfer_list->trid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<span<?php echo $view_pharmacytransfer_list->trid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacytransfer_list->trid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->trid->EditValue ?>"<?php echo $view_pharmacytransfer_list->trid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_pharmacytransfer_list->trid->getSessionValue() != "") { ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<span<?php echo $view_pharmacytransfer_list->trid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacytransfer_list->trid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_trid" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->trid->EditValue ?>"<?php echo $view_pharmacytransfer_list->trid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer_list->trid->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->trid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacytransfer_list->HospID->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_HospID" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_HospID">
<span<?php echo $view_pharmacytransfer_list->HospID->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" <?php echo $view_pharmacytransfer_list->grncreatedby->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_grncreatedby">
<span<?php echo $view_pharmacytransfer_list->grncreatedby->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->grncreatedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" <?php echo $view_pharmacytransfer_list->grncreatedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_grncreatedDateTime">
<span<?php echo $view_pharmacytransfer_list->grncreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" <?php echo $view_pharmacytransfer_list->grnModifiedby->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_grnModifiedby">
<span<?php echo $view_pharmacytransfer_list->grnModifiedby->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->grnModifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" <?php echo $view_pharmacytransfer_list->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_grnModifiedDateTime">
<span<?php echo $view_pharmacytransfer_list->grnModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $view_pharmacytransfer_list->BillDate->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BillDate" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer_list->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_list->BillDate->ReadOnly && !$view_pharmacytransfer_list->BillDate->Disabled && !isset($view_pharmacytransfer_list->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferlist", "x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BillDate" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer_list->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_list->BillDate->ReadOnly && !$view_pharmacytransfer_list->BillDate->Disabled && !isset($view_pharmacytransfer_list->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferlist", "x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_BillDate">
<span<?php echo $view_pharmacytransfer_list->BillDate->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock" <?php echo $view_pharmacytransfer_list->CurStock->cellAttributes() ?>>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_CurStock" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer_list->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer_list->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_CurStock" class="form-group">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer_list->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacytransfer_list->RowCount ?>_view_pharmacytransfer_CurStock">
<span<?php echo $view_pharmacytransfer_list->CurStock->viewAttributes() ?>><?php echo $view_pharmacytransfer_list->CurStock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacytransfer_list->ListOptions->render("body", "right", $view_pharmacytransfer_list->RowCount);
?>
	</tr>
<?php if ($view_pharmacytransfer->RowType == ROWTYPE_ADD || $view_pharmacytransfer->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "load"], function() {
	fview_pharmacytransferlist.updateLists(<?php echo $view_pharmacytransfer_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacytransfer_list->isGridAdd())
		if (!$view_pharmacytransfer_list->Recordset->EOF)
			$view_pharmacytransfer_list->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacytransfer_list->isGridAdd() || $view_pharmacytransfer_list->isGridEdit()) {
		$view_pharmacytransfer_list->RowIndex = '$rowindex$';
		$view_pharmacytransfer_list->loadRowValues();

		// Set row properties
		$view_pharmacytransfer->resetAttributes();
		$view_pharmacytransfer->RowAttrs->merge(["data-rowindex" => $view_pharmacytransfer_list->RowIndex, "id" => "r0_view_pharmacytransfer", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacytransfer->RowAttrs->appendClass("ew-template");
		$view_pharmacytransfer->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacytransfer_list->renderRow();

		// Render list options
		$view_pharmacytransfer_list->renderListOptions();
		$view_pharmacytransfer_list->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacytransfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacytransfer_list->ListOptions->render("body", "left", $view_pharmacytransfer_list->RowIndex);
?>
	<?php if ($view_pharmacytransfer_list->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ORDNO" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer_list->ORDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<span id="el$rowindex$_view_pharmacytransfer_BRCODE" class="form-group view_pharmacytransfer_BRCODE">
<?php
$onchange = $view_pharmacytransfer_list->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_list->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer_list->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_list->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer_list->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
	fview_pharmacytransferlist.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE","forceSelect":false});
});
</script>
<?php echo $view_pharmacytransfer_list->BRCODE->Lookup->getParamTag($view_pharmacytransfer_list, "p_x" . $view_pharmacytransfer_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_pharmacytransfer_PRC" class="form-group view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->PRC->EditValue ?>"<?php echo $view_pharmacytransfer_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PRC" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacytransfer_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale">
<span id="el$rowindex$_view_pharmacytransfer_LastMonthSale" class="form-group view_pharmacytransfer_LastMonthSale">
<?php
$onchange = $view_pharmacytransfer_list->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_list->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="sv_x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer_list->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_list->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer_list->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransferlist"], function() {
	fview_pharmacytransferlist.createAutoSuggest({"id":"x<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale","forceSelect":true});
});
</script>
<?php echo $view_pharmacytransfer_list->LastMonthSale->Lookup->getParamTag($view_pharmacytransfer_list, "p_x" . $view_pharmacytransfer_list->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_list->LastMonthSale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_view_pharmacytransfer_PrName" class="form-group view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->PrName->EditValue ?>"<?php echo $view_pharmacytransfer_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_PrName" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacytransfer_list->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_pharmacytransfer_Quantity" class="form-group view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_Quantity" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacytransfer_list->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<span id="el$rowindex$_view_pharmacytransfer_BatchNo" class="form-group view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer_list->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<span id="el$rowindex$_view_pharmacytransfer_ExpDate" class="form-group view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_list->ExpDate->ReadOnly && !$view_pharmacytransfer_list->ExpDate->Disabled && !isset($view_pharmacytransfer_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferlist", "x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacytransfer_list->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<span id="el$rowindex$_view_pharmacytransfer_MRP" class="form-group view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->MRP->EditValue ?>"<?php echo $view_pharmacytransfer_list->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_MRP" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacytransfer_list->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<span id="el$rowindex$_view_pharmacytransfer_ItemValue" class="form-group view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer_list->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacytransfer_list->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->trid->Visible) { // trid ?>
		<td data-name="trid">
<?php if ($view_pharmacytransfer_list->trid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer_list->trid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacytransfer_list->trid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacytransfer_trid" class="form-group view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->trid->EditValue ?>"<?php echo $view_pharmacytransfer_list->trid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_trid" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_trid" value="<?php echo HtmlEncode($view_pharmacytransfer_list->trid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_HospID" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_HospID" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacytransfer_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grncreatedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grncreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grnModifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime">
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacytransfer_list->grnModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<span id="el$rowindex$_view_pharmacytransfer_BillDate" class="form-group view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer_list->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_list->BillDate->ReadOnly && !$view_pharmacytransfer_list->BillDate->Disabled && !isset($view_pharmacytransfer_list->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransferlist", "x<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BillDate" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacytransfer_list->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacytransfer_list->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<span id="el$rowindex$_view_pharmacytransfer_CurStock" class="form-group view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" id="x<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_list->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_list->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer_list->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_CurStock" name="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" id="o<?php echo $view_pharmacytransfer_list->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($view_pharmacytransfer_list->CurStock->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacytransfer_list->ListOptions->render("body", "right", $view_pharmacytransfer_list->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacytransferlist", "load"], function() {
	fview_pharmacytransferlist.updateLists(<?php echo $view_pharmacytransfer_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_pharmacytransfer_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_pharmacytransfer_list->FormKeyCountName ?>" id="<?php echo $view_pharmacytransfer_list->FormKeyCountName ?>" value="<?php echo $view_pharmacytransfer_list->KeyCount ?>">
<?php echo $view_pharmacytransfer_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacytransfer_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_pharmacytransfer_list->FormKeyCountName ?>" id="<?php echo $view_pharmacytransfer_list->FormKeyCountName ?>" value="<?php echo $view_pharmacytransfer_list->KeyCount ?>">
<?php echo $view_pharmacytransfer_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_pharmacytransfer->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacytransfer_list->Recordset)
	$view_pharmacytransfer_list->Recordset->Close();
?>
<?php if (!$view_pharmacytransfer_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacytransfer_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacytransfer_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacytransfer_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacytransfer_list->TotalRecords == 0 && !$view_pharmacytransfer->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacytransfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacytransfer_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacytransfer_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 35em;
	}
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: nowrap;
		align-items: stretch;
		width: 100%;
	}
	.ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
		border: 0;
		padding: 0;
		margin-bottom: 0;
		overflow-x: scroll;
	}
	</style>
	<script>
});
</script>
<?php if (!$view_pharmacytransfer->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacytransfer",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacytransfer_list->terminate();
?>