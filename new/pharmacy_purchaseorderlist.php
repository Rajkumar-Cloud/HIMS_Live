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
$pharmacy_purchaseorder_list = new pharmacy_purchaseorder_list();

// Run the page
$pharmacy_purchaseorder_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_purchaseorder_list->isExport()) { ?>
<script>
var fpharmacy_purchaseorderlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_purchaseorderlist = currentForm = new ew.Form("fpharmacy_purchaseorderlist", "list");
	fpharmacy_purchaseorderlist.formKeyCountName = '<?php echo $pharmacy_purchaseorder_list->FormKeyCountName ?>';

	// Validate form
	fpharmacy_purchaseorderlist.validate = function() {
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
			<?php if ($pharmacy_purchaseorder_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->PRC->caption(), $pharmacy_purchaseorder_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_list->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->QTY->caption(), $pharmacy_purchaseorder_list->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_list->QTY->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_list->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->Stock->caption(), $pharmacy_purchaseorder_list->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_list->Stock->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_list->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->LastMonthSale->caption(), $pharmacy_purchaseorder_list->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_list->LastMonthSale->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->HospID->caption(), $pharmacy_purchaseorder_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_list->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->CreatedBy->caption(), $pharmacy_purchaseorder_list->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_list->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->CreatedDateTime->caption(), $pharmacy_purchaseorder_list->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_list->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->ModifiedBy->caption(), $pharmacy_purchaseorder_list->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_list->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->ModifiedDateTime->caption(), $pharmacy_purchaseorder_list->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_list->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->BillDate->caption(), $pharmacy_purchaseorder_list->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_list->BillDate->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_list->CurStock->Required) { ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_list->CurStock->caption(), $pharmacy_purchaseorder_list->CurStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_list->CurStock->errorMessage()) ?>");

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
	fpharmacy_purchaseorderlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "QTY", false)) return false;
		if (ew.valueChanged(fobj, infix, "Stock", false)) return false;
		if (ew.valueChanged(fobj, infix, "LastMonthSale", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_purchaseorderlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchaseorderlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchaseorderlist.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_list->PRC->Lookup->toClientList($pharmacy_purchaseorder_list) ?>;
	fpharmacy_purchaseorderlist.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_list->PRC->lookupOptions()) ?>;
	fpharmacy_purchaseorderlist.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_purchaseorderlist");
});
var fpharmacy_purchaseorderlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_purchaseorderlistsrch = currentSearchForm = new ew.Form("fpharmacy_purchaseorderlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_purchaseorderlistsrch.filterList = <?php echo $pharmacy_purchaseorder_list->getFilterList() ?>;
	loadjs.done("fpharmacy_purchaseorderlistsrch");
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
<?php if (!$pharmacy_purchaseorder_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_purchaseorder_list->TotalRecords > 0 && $pharmacy_purchaseorder_list->ExportOptions->visible()) { ?>
<?php $pharmacy_purchaseorder_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->ImportOptions->visible()) { ?>
<?php $pharmacy_purchaseorder_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->SearchOptions->visible()) { ?>
<?php $pharmacy_purchaseorder_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->FilterOptions->visible()) { ?>
<?php $pharmacy_purchaseorder_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_purchaseorder_list->isExport() || Config("EXPORT_MASTER_RECORD") && $pharmacy_purchaseorder_list->isExport("print")) { ?>
<?php
if ($pharmacy_purchaseorder_list->DbMasterFilter != "" && $pharmacy_purchaseorder->getCurrentMasterTable() == "pharmacy_po") {
	if ($pharmacy_purchaseorder_list->MasterRecordExists) {
		include_once "pharmacy_pomaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_purchaseorder_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_purchaseorder_list->isExport() && !$pharmacy_purchaseorder->CurrentAction) { ?>
<form name="fpharmacy_purchaseorderlistsrch" id="fpharmacy_purchaseorderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_purchaseorderlistsrch-search-panel" class="<?php echo $pharmacy_purchaseorder_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchaseorder">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_purchaseorder_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_purchaseorder_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_purchaseorder_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchaseorder_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchaseorder_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchaseorder_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_purchaseorder_list->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_list->showMessage();
?>
<?php if ($pharmacy_purchaseorder_list->TotalRecords > 0 || $pharmacy_purchaseorder->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchaseorder_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchaseorder">
<?php if (!$pharmacy_purchaseorder_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_purchaseorder_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_purchaseorder_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchaseorder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_purchaseorderlist" id="fpharmacy_purchaseorderlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<?php if ($pharmacy_purchaseorder->getCurrentMasterTable() == "pharmacy_po" && $pharmacy_purchaseorder->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_po">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->poid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_purchaseorder" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_purchaseorder_list->TotalRecords > 0 || $pharmacy_purchaseorder_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchaseorderlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchaseorder->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchaseorder_list->renderListOptions();

// Render list options (header, left)
$pharmacy_purchaseorder_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchaseorder_list->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchaseorder_list->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchaseorder_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->PRC) ?>', 1);"><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->QTY->Visible) { // QTY ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->QTY) == "") { ?>
		<th data-name="QTY" class="<?php echo $pharmacy_purchaseorder_list->QTY->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->QTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QTY" class="<?php echo $pharmacy_purchaseorder_list->QTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->QTY) ?>', 1);"><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->QTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->QTY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->QTY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->Stock->Visible) { // Stock ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $pharmacy_purchaseorder_list->Stock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $pharmacy_purchaseorder_list->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->Stock) ?>', 1);"><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->Stock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->Stock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $pharmacy_purchaseorder_list->LastMonthSale->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $pharmacy_purchaseorder_list->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->LastMonthSale) ?>', 1);"><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->LastMonthSale->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->LastMonthSale->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchaseorder_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchaseorder_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->HospID) ?>', 1);"><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $pharmacy_purchaseorder_list->CreatedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $pharmacy_purchaseorder_list->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->CreatedBy) ?>', 1);"><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_purchaseorder_list->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_purchaseorder_list->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->CreatedDateTime) ?>', 1);"><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->CreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->CreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $pharmacy_purchaseorder_list->ModifiedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $pharmacy_purchaseorder_list->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->ModifiedBy) ?>', 1);"><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->ModifiedDateTime) ?>', 1);"><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->ModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->ModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->BillDate->Visible) { // BillDate ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $pharmacy_purchaseorder_list->BillDate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $pharmacy_purchaseorder_list->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->BillDate) ?>', 1);"><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->CurStock->Visible) { // CurStock ?>
	<?php if ($pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $pharmacy_purchaseorder_list->CurStock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $pharmacy_purchaseorder_list->CurStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchaseorder_list->SortUrl($pharmacy_purchaseorder_list->CurStock) ?>', 1);"><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_list->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_list->CurStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_list->CurStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchaseorder_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_purchaseorder_list->ExportAll && $pharmacy_purchaseorder_list->isExport()) {
	$pharmacy_purchaseorder_list->StopRecord = $pharmacy_purchaseorder_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_purchaseorder_list->TotalRecords > $pharmacy_purchaseorder_list->StartRecord + $pharmacy_purchaseorder_list->DisplayRecords - 1)
		$pharmacy_purchaseorder_list->StopRecord = $pharmacy_purchaseorder_list->StartRecord + $pharmacy_purchaseorder_list->DisplayRecords - 1;
	else
		$pharmacy_purchaseorder_list->StopRecord = $pharmacy_purchaseorder_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pharmacy_purchaseorder->isConfirm() || $pharmacy_purchaseorder_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_purchaseorder_list->FormKeyCountName) && ($pharmacy_purchaseorder_list->isGridAdd() || $pharmacy_purchaseorder_list->isGridEdit() || $pharmacy_purchaseorder->isConfirm())) {
		$pharmacy_purchaseorder_list->KeyCount = $CurrentForm->getValue($pharmacy_purchaseorder_list->FormKeyCountName);
		$pharmacy_purchaseorder_list->StopRecord = $pharmacy_purchaseorder_list->StartRecord + $pharmacy_purchaseorder_list->KeyCount - 1;
	}
}
$pharmacy_purchaseorder_list->RecordCount = $pharmacy_purchaseorder_list->StartRecord - 1;
if ($pharmacy_purchaseorder_list->Recordset && !$pharmacy_purchaseorder_list->Recordset->EOF) {
	$pharmacy_purchaseorder_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchaseorder_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchaseorder_list->StartRecord > 1)
		$pharmacy_purchaseorder_list->Recordset->move($pharmacy_purchaseorder_list->StartRecord - 1);
} elseif (!$pharmacy_purchaseorder->AllowAddDeleteRow && $pharmacy_purchaseorder_list->StopRecord == 0) {
	$pharmacy_purchaseorder_list->StopRecord = $pharmacy_purchaseorder->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchaseorder->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchaseorder->resetAttributes();
$pharmacy_purchaseorder_list->renderRow();
if ($pharmacy_purchaseorder_list->isGridAdd())
	$pharmacy_purchaseorder_list->RowIndex = 0;
if ($pharmacy_purchaseorder_list->isGridEdit())
	$pharmacy_purchaseorder_list->RowIndex = 0;
while ($pharmacy_purchaseorder_list->RecordCount < $pharmacy_purchaseorder_list->StopRecord) {
	$pharmacy_purchaseorder_list->RecordCount++;
	if ($pharmacy_purchaseorder_list->RecordCount >= $pharmacy_purchaseorder_list->StartRecord) {
		$pharmacy_purchaseorder_list->RowCount++;
		if ($pharmacy_purchaseorder_list->isGridAdd() || $pharmacy_purchaseorder_list->isGridEdit() || $pharmacy_purchaseorder->isConfirm()) {
			$pharmacy_purchaseorder_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_purchaseorder_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_purchaseorder_list->FormActionName) && ($pharmacy_purchaseorder->isConfirm() || $pharmacy_purchaseorder_list->EventCancelled))
				$pharmacy_purchaseorder_list->RowAction = strval($CurrentForm->getValue($pharmacy_purchaseorder_list->FormActionName));
			elseif ($pharmacy_purchaseorder_list->isGridAdd())
				$pharmacy_purchaseorder_list->RowAction = "insert";
			else
				$pharmacy_purchaseorder_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_purchaseorder_list->KeyCount = $pharmacy_purchaseorder_list->RowIndex;

		// Init row class and style
		$pharmacy_purchaseorder->resetAttributes();
		$pharmacy_purchaseorder->CssClass = "";
		if ($pharmacy_purchaseorder_list->isGridAdd()) {
			$pharmacy_purchaseorder_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_purchaseorder_list->loadRowValues($pharmacy_purchaseorder_list->Recordset); // Load row values
		}
		$pharmacy_purchaseorder->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_purchaseorder_list->isGridAdd()) // Grid add
			$pharmacy_purchaseorder->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_purchaseorder_list->isGridAdd() && $pharmacy_purchaseorder->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_purchaseorder_list->restoreCurrentRowFormValues($pharmacy_purchaseorder_list->RowIndex); // Restore form values
		if ($pharmacy_purchaseorder_list->isGridEdit()) { // Grid edit
			if ($pharmacy_purchaseorder->EventCancelled)
				$pharmacy_purchaseorder_list->restoreCurrentRowFormValues($pharmacy_purchaseorder_list->RowIndex); // Restore form values
			if ($pharmacy_purchaseorder_list->RowAction == "insert")
				$pharmacy_purchaseorder->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_purchaseorder->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_purchaseorder_list->isGridEdit() && ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT || $pharmacy_purchaseorder->RowType == ROWTYPE_ADD) && $pharmacy_purchaseorder->EventCancelled) // Update failed
			$pharmacy_purchaseorder_list->restoreCurrentRowFormValues($pharmacy_purchaseorder_list->RowIndex); // Restore form values
		if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_purchaseorder_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pharmacy_purchaseorder->RowAttrs->merge(["data-rowindex" => $pharmacy_purchaseorder_list->RowCount, "id" => "r" . $pharmacy_purchaseorder_list->RowCount . "_pharmacy_purchaseorder", "data-rowtype" => $pharmacy_purchaseorder->RowType]);

		// Render row
		$pharmacy_purchaseorder_list->renderRow();

		// Render list options
		$pharmacy_purchaseorder_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_purchaseorder_list->RowAction != "delete" && $pharmacy_purchaseorder_list->RowAction != "insertdelete" && !($pharmacy_purchaseorder_list->RowAction == "insert" && $pharmacy_purchaseorder->isConfirm() && $pharmacy_purchaseorder_list->emptyRow())) {
?>
	<tr <?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_list->ListOptions->render("body", "left", $pharmacy_purchaseorder_list->RowCount);
?>
	<?php if ($pharmacy_purchaseorder_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_purchaseorder_list->PRC->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $pharmacy_purchaseorder_list->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_list->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_list->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_list->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist"], function() {
	fpharmacy_purchaseorderlist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_list->PRC->Lookup->getParamTag($pharmacy_purchaseorder_list, "p_x" . $pharmacy_purchaseorder_list->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $pharmacy_purchaseorder_list->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_list->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_list->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_list->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist"], function() {
	fpharmacy_purchaseorderlist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_list->PRC->Lookup->getParamTag($pharmacy_purchaseorder_list, "p_x" . $pharmacy_purchaseorder_list->RowIndex . "_PRC") ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder_list->PRC->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_id" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->id->CurrentValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_id" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT || $pharmacy_purchaseorder->CurrentMode == "edit") { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_id" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->QTY->Visible) { // QTY ?>
		<td data-name="QTY" <?php echo $pharmacy_purchaseorder_list->QTY->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->QTY->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->QTY->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->QTY->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder_list->QTY->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->QTY->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->Stock->Visible) { // Stock ?>
		<td data-name="Stock" <?php echo $pharmacy_purchaseorder_list->Stock->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->Stock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->Stock->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->Stock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder_list->Stock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->Stock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale" <?php echo $pharmacy_purchaseorder_list->LastMonthSale->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->LastMonthSale->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder_list->LastMonthSale->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->LastMonthSale->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_purchaseorder_list->HospID->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder_list->HospID->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $pharmacy_purchaseorder_list->CreatedBy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder_list->CreatedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->CreatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" <?php echo $pharmacy_purchaseorder_list->CreatedDateTime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder_list->CreatedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->CreatedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $pharmacy_purchaseorder_list->ModifiedBy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder_list->ModifiedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->ModifiedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime" <?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $pharmacy_purchaseorder_list->BillDate->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_list->BillDate->ReadOnly && !$pharmacy_purchaseorder_list->BillDate->Disabled && !isset($pharmacy_purchaseorder_list->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderlist", "x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_list->BillDate->ReadOnly && !$pharmacy_purchaseorder_list->BillDate->Disabled && !isset($pharmacy_purchaseorder_list->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderlist", "x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder_list->BillDate->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock" <?php echo $pharmacy_purchaseorder_list->CurStock->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_list->RowCount ?>_pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder_list->CurStock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_list->CurStock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_list->ListOptions->render("body", "right", $pharmacy_purchaseorder_list->RowCount);
?>
	</tr>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD || $pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "load"], function() {
	fpharmacy_purchaseorderlist.updateLists(<?php echo $pharmacy_purchaseorder_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_purchaseorder_list->isGridAdd())
		if (!$pharmacy_purchaseorder_list->Recordset->EOF)
			$pharmacy_purchaseorder_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_purchaseorder_list->isGridAdd() || $pharmacy_purchaseorder_list->isGridEdit()) {
		$pharmacy_purchaseorder_list->RowIndex = '$rowindex$';
		$pharmacy_purchaseorder_list->loadRowValues();

		// Set row properties
		$pharmacy_purchaseorder->resetAttributes();
		$pharmacy_purchaseorder->RowAttrs->merge(["data-rowindex" => $pharmacy_purchaseorder_list->RowIndex, "id" => "r0_pharmacy_purchaseorder", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_purchaseorder->RowAttrs->appendClass("ew-template");
		$pharmacy_purchaseorder->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_purchaseorder_list->renderRow();

		// Render list options
		$pharmacy_purchaseorder_list->renderListOptions();
		$pharmacy_purchaseorder_list->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_list->ListOptions->render("body", "left", $pharmacy_purchaseorder_list->RowIndex);
?>
	<?php if ($pharmacy_purchaseorder_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$onchange = $pharmacy_purchaseorder_list->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_list->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_list->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_list->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist"], function() {
	fpharmacy_purchaseorderlist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_list->PRC->Lookup->getParamTag($pharmacy_purchaseorder_list, "p_x" . $pharmacy_purchaseorder_list->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->QTY->Visible) { // QTY ?>
		<td data-name="QTY">
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->QTY->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->QTY->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->Stock->Visible) { // Stock ?>
		<td data-name="Stock">
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->Stock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->Stock->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale">
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->LastMonthSale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_list->BillDate->ReadOnly && !$pharmacy_purchaseorder_list->BillDate->Disabled && !isset($pharmacy_purchaseorder_list->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseorderlist", "x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_list->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_list->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_list->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_list->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_list->CurStock->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_list->ListOptions->render("body", "right", $pharmacy_purchaseorder_list->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchaseorderlist", "load"], function() {
	fpharmacy_purchaseorderlist.updateLists(<?php echo $pharmacy_purchaseorder_list->RowIndex ?>);
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
<?php if ($pharmacy_purchaseorder_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_purchaseorder_list->FormKeyCountName ?>" id="<?php echo $pharmacy_purchaseorder_list->FormKeyCountName ?>" value="<?php echo $pharmacy_purchaseorder_list->KeyCount ?>">
<?php echo $pharmacy_purchaseorder_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_purchaseorder_list->FormKeyCountName ?>" id="<?php echo $pharmacy_purchaseorder_list->FormKeyCountName ?>" value="<?php echo $pharmacy_purchaseorder_list->KeyCount ?>">
<?php echo $pharmacy_purchaseorder_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_purchaseorder->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchaseorder_list->Recordset)
	$pharmacy_purchaseorder_list->Recordset->Close();
?>
<?php if (!$pharmacy_purchaseorder_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_purchaseorder_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_purchaseorder_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchaseorder_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchaseorder_list->TotalRecords == 0 && !$pharmacy_purchaseorder->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchaseorder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_purchaseorder_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchaseorder_list->isExport()) { ?>
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
	</style>
	<script>
});
</script>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_purchaseorder",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_purchaseorder_list->terminate();
?>