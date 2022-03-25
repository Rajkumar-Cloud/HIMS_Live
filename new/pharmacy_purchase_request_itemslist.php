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
$pharmacy_purchase_request_items_list = new pharmacy_purchase_request_items_list();

// Run the page
$pharmacy_purchase_request_items_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_purchase_request_items_list->isExport()) { ?>
<script>
var fpharmacy_purchase_request_itemslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_purchase_request_itemslist = currentForm = new ew.Form("fpharmacy_purchase_request_itemslist", "list");
	fpharmacy_purchase_request_itemslist.formKeyCountName = '<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>';

	// Validate form
	fpharmacy_purchase_request_itemslist.validate = function() {
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
			<?php if ($pharmacy_purchase_request_items_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->id->caption(), $pharmacy_purchase_request_items_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->PRC->caption(), $pharmacy_purchase_request_items_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->PrName->caption(), $pharmacy_purchase_request_items_list->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->Quantity->caption(), $pharmacy_purchase_request_items_list->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_list->Quantity->errorMessage()) ?>");
			<?php if ($pharmacy_purchase_request_items_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->HospID->caption(), $pharmacy_purchase_request_items_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->createdby->caption(), $pharmacy_purchase_request_items_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->createddatetime->caption(), $pharmacy_purchase_request_items_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->modifiedby->caption(), $pharmacy_purchase_request_items_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->modifieddatetime->caption(), $pharmacy_purchase_request_items_list->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->BRCODE->caption(), $pharmacy_purchase_request_items_list->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_list->prid->Required) { ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_list->prid->caption(), $pharmacy_purchase_request_items_list->prid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_list->prid->errorMessage()) ?>");

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
	fpharmacy_purchase_request_itemslist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
		if (ew.valueChanged(fobj, infix, "prid", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_purchase_request_itemslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchase_request_itemslist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchase_request_itemslist.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_list->PrName->Lookup->toClientList($pharmacy_purchase_request_items_list) ?>;
	fpharmacy_purchase_request_itemslist.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_list->PrName->lookupOptions()) ?>;
	fpharmacy_purchase_request_itemslist.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_purchase_request_itemslist");
});
var fpharmacy_purchase_request_itemslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_purchase_request_itemslistsrch = currentSearchForm = new ew.Form("fpharmacy_purchase_request_itemslistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_purchase_request_itemslistsrch.filterList = <?php echo $pharmacy_purchase_request_items_list->getFilterList() ?>;
	loadjs.done("fpharmacy_purchase_request_itemslistsrch");
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
<?php if (!$pharmacy_purchase_request_items_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_purchase_request_items_list->TotalRecords > 0 && $pharmacy_purchase_request_items_list->ExportOptions->visible()) { ?>
<?php $pharmacy_purchase_request_items_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->ImportOptions->visible()) { ?>
<?php $pharmacy_purchase_request_items_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->SearchOptions->visible()) { ?>
<?php $pharmacy_purchase_request_items_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->FilterOptions->visible()) { ?>
<?php $pharmacy_purchase_request_items_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_purchase_request_items_list->isExport() || Config("EXPORT_MASTER_RECORD") && $pharmacy_purchase_request_items_list->isExport("print")) { ?>
<?php
if ($pharmacy_purchase_request_items_list->DbMasterFilter != "" && $pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request") {
	if ($pharmacy_purchase_request_items_list->MasterRecordExists) {
		include_once "pharmacy_purchase_requestmaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_purchase_request_items_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_purchase_request_items_list->isExport() && !$pharmacy_purchase_request_items->CurrentAction) { ?>
<form name="fpharmacy_purchase_request_itemslistsrch" id="fpharmacy_purchase_request_itemslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_purchase_request_itemslistsrch-search-panel" class="<?php echo $pharmacy_purchase_request_items_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_purchase_request_items_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_purchase_request_items_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_purchase_request_items_list->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_list->showMessage();
?>
<?php if ($pharmacy_purchase_request_items_list->TotalRecords > 0 || $pharmacy_purchase_request_items->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchase_request_items_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request_items">
<?php if (!$pharmacy_purchase_request_items_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_purchase_request_items_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_purchase_request_items_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_items_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_purchase_request_itemslist" id="fpharmacy_purchase_request_itemslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<?php if ($pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request" && $pharmacy_purchase_request_items->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_purchase_request_items" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_purchase_request_items_list->TotalRecords > 0 || $pharmacy_purchase_request_items_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchase_request_itemslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchase_request_items->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchase_request_items_list->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_items_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request_items_list->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_items_list->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_items_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->id) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchase_request_items_list->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchase_request_items_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->PRC) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_purchase_request_items_list->PrName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_purchase_request_items_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->PrName) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->Quantity->Visible) { // Quantity ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $pharmacy_purchase_request_items_list->Quantity->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $pharmacy_purchase_request_items_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->Quantity) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_items_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_items_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->HospID) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_items_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_items_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->createdby) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_items_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_items_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_items_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_items_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_items_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_items_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_items_list->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_items_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->BRCODE) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->prid->Visible) { // prid ?>
	<?php if ($pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->prid) == "") { ?>
		<th data-name="prid" class="<?php echo $pharmacy_purchase_request_items_list->prid->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->prid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prid" class="<?php echo $pharmacy_purchase_request_items_list->prid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_purchase_request_items_list->SortUrl($pharmacy_purchase_request_items_list->prid) ?>', 1);"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_list->prid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_list->prid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_list->prid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchase_request_items_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_purchase_request_items_list->ExportAll && $pharmacy_purchase_request_items_list->isExport()) {
	$pharmacy_purchase_request_items_list->StopRecord = $pharmacy_purchase_request_items_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_purchase_request_items_list->TotalRecords > $pharmacy_purchase_request_items_list->StartRecord + $pharmacy_purchase_request_items_list->DisplayRecords - 1)
		$pharmacy_purchase_request_items_list->StopRecord = $pharmacy_purchase_request_items_list->StartRecord + $pharmacy_purchase_request_items_list->DisplayRecords - 1;
	else
		$pharmacy_purchase_request_items_list->StopRecord = $pharmacy_purchase_request_items_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pharmacy_purchase_request_items->isConfirm() || $pharmacy_purchase_request_items_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_purchase_request_items_list->FormKeyCountName) && ($pharmacy_purchase_request_items_list->isGridAdd() || $pharmacy_purchase_request_items_list->isGridEdit() || $pharmacy_purchase_request_items->isConfirm())) {
		$pharmacy_purchase_request_items_list->KeyCount = $CurrentForm->getValue($pharmacy_purchase_request_items_list->FormKeyCountName);
		$pharmacy_purchase_request_items_list->StopRecord = $pharmacy_purchase_request_items_list->StartRecord + $pharmacy_purchase_request_items_list->KeyCount - 1;
	}
}
$pharmacy_purchase_request_items_list->RecordCount = $pharmacy_purchase_request_items_list->StartRecord - 1;
if ($pharmacy_purchase_request_items_list->Recordset && !$pharmacy_purchase_request_items_list->Recordset->EOF) {
	$pharmacy_purchase_request_items_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchase_request_items_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchase_request_items_list->StartRecord > 1)
		$pharmacy_purchase_request_items_list->Recordset->move($pharmacy_purchase_request_items_list->StartRecord - 1);
} elseif (!$pharmacy_purchase_request_items->AllowAddDeleteRow && $pharmacy_purchase_request_items_list->StopRecord == 0) {
	$pharmacy_purchase_request_items_list->StopRecord = $pharmacy_purchase_request_items->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchase_request_items->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchase_request_items->resetAttributes();
$pharmacy_purchase_request_items_list->renderRow();
if ($pharmacy_purchase_request_items_list->isGridAdd())
	$pharmacy_purchase_request_items_list->RowIndex = 0;
if ($pharmacy_purchase_request_items_list->isGridEdit())
	$pharmacy_purchase_request_items_list->RowIndex = 0;
while ($pharmacy_purchase_request_items_list->RecordCount < $pharmacy_purchase_request_items_list->StopRecord) {
	$pharmacy_purchase_request_items_list->RecordCount++;
	if ($pharmacy_purchase_request_items_list->RecordCount >= $pharmacy_purchase_request_items_list->StartRecord) {
		$pharmacy_purchase_request_items_list->RowCount++;
		if ($pharmacy_purchase_request_items_list->isGridAdd() || $pharmacy_purchase_request_items_list->isGridEdit() || $pharmacy_purchase_request_items->isConfirm()) {
			$pharmacy_purchase_request_items_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_purchase_request_items_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_purchase_request_items_list->FormActionName) && ($pharmacy_purchase_request_items->isConfirm() || $pharmacy_purchase_request_items_list->EventCancelled))
				$pharmacy_purchase_request_items_list->RowAction = strval($CurrentForm->getValue($pharmacy_purchase_request_items_list->FormActionName));
			elseif ($pharmacy_purchase_request_items_list->isGridAdd())
				$pharmacy_purchase_request_items_list->RowAction = "insert";
			else
				$pharmacy_purchase_request_items_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_purchase_request_items_list->KeyCount = $pharmacy_purchase_request_items_list->RowIndex;

		// Init row class and style
		$pharmacy_purchase_request_items->resetAttributes();
		$pharmacy_purchase_request_items->CssClass = "";
		if ($pharmacy_purchase_request_items_list->isGridAdd()) {
			$pharmacy_purchase_request_items_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_purchase_request_items_list->loadRowValues($pharmacy_purchase_request_items_list->Recordset); // Load row values
		}
		$pharmacy_purchase_request_items->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_purchase_request_items_list->isGridAdd()) // Grid add
			$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_purchase_request_items_list->isGridAdd() && $pharmacy_purchase_request_items->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_purchase_request_items_list->restoreCurrentRowFormValues($pharmacy_purchase_request_items_list->RowIndex); // Restore form values
		if ($pharmacy_purchase_request_items_list->isGridEdit()) { // Grid edit
			if ($pharmacy_purchase_request_items->EventCancelled)
				$pharmacy_purchase_request_items_list->restoreCurrentRowFormValues($pharmacy_purchase_request_items_list->RowIndex); // Restore form values
			if ($pharmacy_purchase_request_items_list->RowAction == "insert")
				$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_purchase_request_items->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_purchase_request_items_list->isGridEdit() && ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT || $pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) && $pharmacy_purchase_request_items->EventCancelled) // Update failed
			$pharmacy_purchase_request_items_list->restoreCurrentRowFormValues($pharmacy_purchase_request_items_list->RowIndex); // Restore form values
		if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_purchase_request_items_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pharmacy_purchase_request_items->RowAttrs->merge(["data-rowindex" => $pharmacy_purchase_request_items_list->RowCount, "id" => "r" . $pharmacy_purchase_request_items_list->RowCount . "_pharmacy_purchase_request_items", "data-rowtype" => $pharmacy_purchase_request_items->RowType]);

		// Render row
		$pharmacy_purchase_request_items_list->renderRow();

		// Render list options
		$pharmacy_purchase_request_items_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_purchase_request_items_list->RowAction != "delete" && $pharmacy_purchase_request_items_list->RowAction != "insertdelete" && !($pharmacy_purchase_request_items_list->RowAction == "insert" && $pharmacy_purchase_request_items->isConfirm() && $pharmacy_purchase_request_items_list->emptyRow())) {
?>
	<tr <?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "left", $pharmacy_purchase_request_items_list->RowCount);
?>
	<?php if ($pharmacy_purchase_request_items_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_purchase_request_items_list->id->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group">
<span<?php echo $pharmacy_purchase_request_items_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items_list->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_purchase_request_items_list->PRC->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items_list->PRC->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $pharmacy_purchase_request_items_list->PrName->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $pharmacy_purchase_request_items_list->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_list->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_list->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist"], function() {
	fpharmacy_purchase_request_itemslist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_list->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_list, "p_x" . $pharmacy_purchase_request_items_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $pharmacy_purchase_request_items_list->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_list->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_list->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist"], function() {
	fpharmacy_purchase_request_itemslist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_list->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_list, "p_x" . $pharmacy_purchase_request_items_list->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items_list->PrName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $pharmacy_purchase_request_items_list->Quantity->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items_list->Quantity->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_purchase_request_items_list->HospID->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items_list->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_purchase_request_items_list->createdby->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items_list->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_purchase_request_items_list->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_purchase_request_items_list->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_purchase_request_items_list->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_purchase_request_items_list->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items_list->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->prid->Visible) { // prid ?>
		<td data-name="prid" <?php echo $pharmacy_purchase_request_items_list->prid->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_purchase_request_items_list->prid->getSessionValue() != "") { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?php echo $pharmacy_purchase_request_items_list->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_list->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->prid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_purchase_request_items_list->prid->getSessionValue() != "") { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?php echo $pharmacy_purchase_request_items_list->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_list->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCount ?>_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_list->prid->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_list->prid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "right", $pharmacy_purchase_request_items_list->RowCount);
?>
	</tr>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD || $pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist", "load"], function() {
	fpharmacy_purchase_request_itemslist.updateLists(<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_purchase_request_items_list->isGridAdd())
		if (!$pharmacy_purchase_request_items_list->Recordset->EOF)
			$pharmacy_purchase_request_items_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_purchase_request_items_list->isGridAdd() || $pharmacy_purchase_request_items_list->isGridEdit()) {
		$pharmacy_purchase_request_items_list->RowIndex = '$rowindex$';
		$pharmacy_purchase_request_items_list->loadRowValues();

		// Set row properties
		$pharmacy_purchase_request_items->resetAttributes();
		$pharmacy_purchase_request_items->RowAttrs->merge(["data-rowindex" => $pharmacy_purchase_request_items_list->RowIndex, "id" => "r0_pharmacy_purchase_request_items", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_purchase_request_items->RowAttrs->appendClass("ew-template");
		$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_purchase_request_items_list->renderRow();

		// Render list options
		$pharmacy_purchase_request_items_list->renderListOptions();
		$pharmacy_purchase_request_items_list->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "left", $pharmacy_purchase_request_items_list->RowIndex);
?>
	<?php if ($pharmacy_purchase_request_items_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id"></span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$onchange = $pharmacy_purchase_request_items_list->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_list->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_list->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_list->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_list->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist"], function() {
	fpharmacy_purchase_request_itemslist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_list->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_list, "p_x" . $pharmacy_purchase_request_items_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->prid->Visible) { // prid ?>
		<td data-name="prid">
<?php if ($pharmacy_purchase_request_items_list->prid->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_list->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_list->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_list->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_list->prid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->prid->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "right", $pharmacy_purchase_request_items_list->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemslist", "load"], function() {
	fpharmacy_purchase_request_itemslist.updateLists(<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>);
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
<?php if ($pharmacy_purchase_request_items_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" id="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" value="<?php echo $pharmacy_purchase_request_items_list->KeyCount ?>">
<?php echo $pharmacy_purchase_request_items_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" id="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" value="<?php echo $pharmacy_purchase_request_items_list->KeyCount ?>">
<?php echo $pharmacy_purchase_request_items_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_purchase_request_items->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchase_request_items_list->Recordset)
	$pharmacy_purchase_request_items_list->Recordset->Close();
?>
<?php if (!$pharmacy_purchase_request_items_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_purchase_request_items_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_purchase_request_items_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_items_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->TotalRecords == 0 && !$pharmacy_purchase_request_items->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_items_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_purchase_request_items_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request_items_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_purchase_request_items",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_purchase_request_items_list->terminate();
?>