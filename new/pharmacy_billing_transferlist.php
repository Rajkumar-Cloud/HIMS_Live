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
$pharmacy_billing_transfer_list = new pharmacy_billing_transfer_list();

// Run the page
$pharmacy_billing_transfer_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_transfer_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_billing_transfer_list->isExport()) { ?>
<script>
var fpharmacy_billing_transferlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_billing_transferlist = currentForm = new ew.Form("fpharmacy_billing_transferlist", "list");
	fpharmacy_billing_transferlist.formKeyCountName = '<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>';

	// Validate form
	fpharmacy_billing_transferlist.validate = function() {
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
			<?php if ($pharmacy_billing_transfer_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->id->caption(), $pharmacy_billing_transfer_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->PharID->caption(), $pharmacy_billing_transfer_list->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->pharmacy->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->pharmacy->caption(), $pharmacy_billing_transfer_list->pharmacy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->createdby->caption(), $pharmacy_billing_transfer_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->createddatetime->caption(), $pharmacy_billing_transfer_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->modifiedby->caption(), $pharmacy_billing_transfer_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->modifieddatetime->caption(), $pharmacy_billing_transfer_list->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->HospID->caption(), $pharmacy_billing_transfer_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->transfer->Required) { ?>
				elm = this.getElements("x" + infix + "_transfer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->transfer->caption(), $pharmacy_billing_transfer_list->transfer->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->area->Required) { ?>
				elm = this.getElements("x" + infix + "_area");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->area->caption(), $pharmacy_billing_transfer_list->area->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->town->caption(), $pharmacy_billing_transfer_list->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->province->caption(), $pharmacy_billing_transfer_list->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->postal_code->caption(), $pharmacy_billing_transfer_list->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_list->phone_no->Required) { ?>
				elm = this.getElements("x" + infix + "_phone_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_list->phone_no->caption(), $pharmacy_billing_transfer_list->phone_no->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fpharmacy_billing_transferlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "pharmacy", false)) return false;
		if (ew.valueChanged(fobj, infix, "transfer", false)) return false;
		if (ew.valueChanged(fobj, infix, "area", false)) return false;
		if (ew.valueChanged(fobj, infix, "town", false)) return false;
		if (ew.valueChanged(fobj, infix, "province", false)) return false;
		if (ew.valueChanged(fobj, infix, "postal_code", false)) return false;
		if (ew.valueChanged(fobj, infix, "phone_no", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_billing_transferlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_billing_transferlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_billing_transferlist.lists["x_PharID"] = <?php echo $pharmacy_billing_transfer_list->PharID->Lookup->toClientList($pharmacy_billing_transfer_list) ?>;
	fpharmacy_billing_transferlist.lists["x_PharID"].options = <?php echo JsonEncode($pharmacy_billing_transfer_list->PharID->lookupOptions()) ?>;
	fpharmacy_billing_transferlist.autoSuggests["x_PharID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_billing_transferlist.lists["x_transfer"] = <?php echo $pharmacy_billing_transfer_list->transfer->Lookup->toClientList($pharmacy_billing_transfer_list) ?>;
	fpharmacy_billing_transferlist.lists["x_transfer"].options = <?php echo JsonEncode($pharmacy_billing_transfer_list->transfer->lookupOptions()) ?>;
	loadjs.done("fpharmacy_billing_transferlist");
});
var fpharmacy_billing_transferlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_billing_transferlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_transferlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_billing_transferlistsrch.filterList = <?php echo $pharmacy_billing_transfer_list->getFilterList() ?>;
	loadjs.done("fpharmacy_billing_transferlistsrch");
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
<?php if (!$pharmacy_billing_transfer_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_billing_transfer_list->TotalRecords > 0 && $pharmacy_billing_transfer_list->ExportOptions->visible()) { ?>
<?php $pharmacy_billing_transfer_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->ImportOptions->visible()) { ?>
<?php $pharmacy_billing_transfer_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->SearchOptions->visible()) { ?>
<?php $pharmacy_billing_transfer_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->FilterOptions->visible()) { ?>
<?php $pharmacy_billing_transfer_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_billing_transfer_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_billing_transfer_list->isExport() && !$pharmacy_billing_transfer->CurrentAction) { ?>
<form name="fpharmacy_billing_transferlistsrch" id="fpharmacy_billing_transferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_billing_transferlistsrch-search-panel" class="<?php echo $pharmacy_billing_transfer_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_transfer">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_billing_transfer_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_billing_transfer_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_billing_transfer_list->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_list->showMessage();
?>
<?php if ($pharmacy_billing_transfer_list->TotalRecords > 0 || $pharmacy_billing_transfer->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_billing_transfer_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_transfer">
<?php if (!$pharmacy_billing_transfer_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_billing_transfer_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_billing_transfer_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_transfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_billing_transferlist" id="fpharmacy_billing_transferlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<div id="gmp_pharmacy_billing_transfer" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_billing_transfer_list->TotalRecords > 0 || $pharmacy_billing_transfer_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_transferlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_billing_transfer->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_billing_transfer_list->renderListOptions();

// Render list options (header, left)
$pharmacy_billing_transfer_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_billing_transfer_list->id->Visible) { // id ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_transfer_list->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_transfer_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->id) ?>', 1);"><div id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->PharID->Visible) { // PharID ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_transfer_list->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_transfer_list->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->PharID) ?>', 1);"><div id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->PharID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->PharID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->pharmacy->Visible) { // pharmacy ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->pharmacy) == "") { ?>
		<th data-name="pharmacy" class="<?php echo $pharmacy_billing_transfer_list->pharmacy->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy" class="<?php echo $pharmacy_billing_transfer_list->pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->pharmacy) ?>', 1);"><div id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->pharmacy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->pharmacy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->pharmacy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_transfer_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_transfer_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->createdby) ?>', 1);"><div id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_transfer_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_transfer_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_transfer_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_transfer_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_transfer_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_transfer_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_billing_transfer_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_billing_transfer_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->HospID) ?>', 1);"><div id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->transfer->Visible) { // transfer ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->transfer) == "") { ?>
		<th data-name="transfer" class="<?php echo $pharmacy_billing_transfer_list->transfer->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->transfer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transfer" class="<?php echo $pharmacy_billing_transfer_list->transfer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->transfer) ?>', 1);"><div id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->transfer->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->transfer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->transfer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->area->Visible) { // area ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->area) == "") { ?>
		<th data-name="area" class="<?php echo $pharmacy_billing_transfer_list->area->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $pharmacy_billing_transfer_list->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->area) ?>', 1);"><div id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->area->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->area->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->town->Visible) { // town ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $pharmacy_billing_transfer_list->town->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $pharmacy_billing_transfer_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->town) ?>', 1);"><div id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->province->Visible) { // province ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $pharmacy_billing_transfer_list->province->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $pharmacy_billing_transfer_list->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->province) ?>', 1);"><div id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->postal_code->Visible) { // postal_code ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $pharmacy_billing_transfer_list->postal_code->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $pharmacy_billing_transfer_list->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->postal_code) ?>', 1);"><div id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->phone_no->Visible) { // phone_no ?>
	<?php if ($pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $pharmacy_billing_transfer_list->phone_no->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $pharmacy_billing_transfer_list->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_billing_transfer_list->SortUrl($pharmacy_billing_transfer_list->phone_no) ?>', 1);"><div id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer_list->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer_list->phone_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer_list->phone_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_billing_transfer_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_billing_transfer_list->ExportAll && $pharmacy_billing_transfer_list->isExport()) {
	$pharmacy_billing_transfer_list->StopRecord = $pharmacy_billing_transfer_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_billing_transfer_list->TotalRecords > $pharmacy_billing_transfer_list->StartRecord + $pharmacy_billing_transfer_list->DisplayRecords - 1)
		$pharmacy_billing_transfer_list->StopRecord = $pharmacy_billing_transfer_list->StartRecord + $pharmacy_billing_transfer_list->DisplayRecords - 1;
	else
		$pharmacy_billing_transfer_list->StopRecord = $pharmacy_billing_transfer_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pharmacy_billing_transfer->isConfirm() || $pharmacy_billing_transfer_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_billing_transfer_list->FormKeyCountName) && ($pharmacy_billing_transfer_list->isGridAdd() || $pharmacy_billing_transfer_list->isGridEdit() || $pharmacy_billing_transfer->isConfirm())) {
		$pharmacy_billing_transfer_list->KeyCount = $CurrentForm->getValue($pharmacy_billing_transfer_list->FormKeyCountName);
		$pharmacy_billing_transfer_list->StopRecord = $pharmacy_billing_transfer_list->StartRecord + $pharmacy_billing_transfer_list->KeyCount - 1;
	}
}
$pharmacy_billing_transfer_list->RecordCount = $pharmacy_billing_transfer_list->StartRecord - 1;
if ($pharmacy_billing_transfer_list->Recordset && !$pharmacy_billing_transfer_list->Recordset->EOF) {
	$pharmacy_billing_transfer_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_billing_transfer_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_billing_transfer_list->StartRecord > 1)
		$pharmacy_billing_transfer_list->Recordset->move($pharmacy_billing_transfer_list->StartRecord - 1);
} elseif (!$pharmacy_billing_transfer->AllowAddDeleteRow && $pharmacy_billing_transfer_list->StopRecord == 0) {
	$pharmacy_billing_transfer_list->StopRecord = $pharmacy_billing_transfer->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_billing_transfer->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_billing_transfer->resetAttributes();
$pharmacy_billing_transfer_list->renderRow();
if ($pharmacy_billing_transfer_list->isGridAdd())
	$pharmacy_billing_transfer_list->RowIndex = 0;
if ($pharmacy_billing_transfer_list->isGridEdit())
	$pharmacy_billing_transfer_list->RowIndex = 0;
while ($pharmacy_billing_transfer_list->RecordCount < $pharmacy_billing_transfer_list->StopRecord) {
	$pharmacy_billing_transfer_list->RecordCount++;
	if ($pharmacy_billing_transfer_list->RecordCount >= $pharmacy_billing_transfer_list->StartRecord) {
		$pharmacy_billing_transfer_list->RowCount++;
		if ($pharmacy_billing_transfer_list->isGridAdd() || $pharmacy_billing_transfer_list->isGridEdit() || $pharmacy_billing_transfer->isConfirm()) {
			$pharmacy_billing_transfer_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_billing_transfer_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_billing_transfer_list->FormActionName) && ($pharmacy_billing_transfer->isConfirm() || $pharmacy_billing_transfer_list->EventCancelled))
				$pharmacy_billing_transfer_list->RowAction = strval($CurrentForm->getValue($pharmacy_billing_transfer_list->FormActionName));
			elseif ($pharmacy_billing_transfer_list->isGridAdd())
				$pharmacy_billing_transfer_list->RowAction = "insert";
			else
				$pharmacy_billing_transfer_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_billing_transfer_list->KeyCount = $pharmacy_billing_transfer_list->RowIndex;

		// Init row class and style
		$pharmacy_billing_transfer->resetAttributes();
		$pharmacy_billing_transfer->CssClass = "";
		if ($pharmacy_billing_transfer_list->isGridAdd()) {
			$pharmacy_billing_transfer_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_billing_transfer_list->loadRowValues($pharmacy_billing_transfer_list->Recordset); // Load row values
		}
		$pharmacy_billing_transfer->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_billing_transfer_list->isGridAdd()) // Grid add
			$pharmacy_billing_transfer->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_billing_transfer_list->isGridAdd() && $pharmacy_billing_transfer->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_billing_transfer_list->restoreCurrentRowFormValues($pharmacy_billing_transfer_list->RowIndex); // Restore form values
		if ($pharmacy_billing_transfer_list->isGridEdit()) { // Grid edit
			if ($pharmacy_billing_transfer->EventCancelled)
				$pharmacy_billing_transfer_list->restoreCurrentRowFormValues($pharmacy_billing_transfer_list->RowIndex); // Restore form values
			if ($pharmacy_billing_transfer_list->RowAction == "insert")
				$pharmacy_billing_transfer->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_billing_transfer->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_billing_transfer_list->isGridEdit() && ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT || $pharmacy_billing_transfer->RowType == ROWTYPE_ADD) && $pharmacy_billing_transfer->EventCancelled) // Update failed
			$pharmacy_billing_transfer_list->restoreCurrentRowFormValues($pharmacy_billing_transfer_list->RowIndex); // Restore form values
		if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_billing_transfer_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pharmacy_billing_transfer->RowAttrs->merge(["data-rowindex" => $pharmacy_billing_transfer_list->RowCount, "id" => "r" . $pharmacy_billing_transfer_list->RowCount . "_pharmacy_billing_transfer", "data-rowtype" => $pharmacy_billing_transfer->RowType]);

		// Render row
		$pharmacy_billing_transfer_list->renderRow();

		// Render list options
		$pharmacy_billing_transfer_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_billing_transfer_list->RowAction != "delete" && $pharmacy_billing_transfer_list->RowAction != "insertdelete" && !($pharmacy_billing_transfer_list->RowAction == "insert" && $pharmacy_billing_transfer->isConfirm() && $pharmacy_billing_transfer_list->emptyRow())) {
?>
	<tr <?php echo $pharmacy_billing_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_transfer_list->ListOptions->render("body", "left", $pharmacy_billing_transfer_list->RowCount);
?>
	<?php if ($pharmacy_billing_transfer_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_billing_transfer_list->id->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_id" class="form-group">
<span<?php echo $pharmacy_billing_transfer_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_billing_transfer_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_id">
<span<?php echo $pharmacy_billing_transfer_list->id->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->PharID->Visible) { // PharID ?>
		<td data-name="PharID" <?php echo $pharmacy_billing_transfer_list->PharID->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_PharID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->PharID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_PharID">
<span<?php echo $pharmacy_billing_transfer_list->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy" <?php echo $pharmacy_billing_transfer_list->pharmacy->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_pharmacy" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_pharmacy" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->pharmacy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_pharmacy">
<span<?php echo $pharmacy_billing_transfer_list->pharmacy->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_billing_transfer_list->createdby->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createdby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_createdby">
<span<?php echo $pharmacy_billing_transfer_list->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_billing_transfer_list->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_createddatetime">
<span<?php echo $pharmacy_billing_transfer_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_billing_transfer_list->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_modifiedby">
<span<?php echo $pharmacy_billing_transfer_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_billing_transfer_list->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_modifieddatetime">
<span<?php echo $pharmacy_billing_transfer_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_billing_transfer_list->HospID->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_HospID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_HospID">
<span<?php echo $pharmacy_billing_transfer_list->HospID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->transfer->Visible) { // transfer ?>
		<td data-name="transfer" <?php echo $pharmacy_billing_transfer_list->transfer->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_transfer" class="form-group">
<?php $pharmacy_billing_transfer_list->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer_list->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer"<?php echo $pharmacy_billing_transfer_list->transfer->editAttributes() ?>>
			<?php echo $pharmacy_billing_transfer_list->transfer->selectOptionListHtml("x{$pharmacy_billing_transfer_list->RowIndex}_transfer") ?>
		</select>
</div>
<?php echo $pharmacy_billing_transfer_list->transfer->Lookup->getParamTag($pharmacy_billing_transfer_list, "p_x" . $pharmacy_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_transfer" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->transfer->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_transfer" class="form-group">
<?php $pharmacy_billing_transfer_list->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer_list->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer"<?php echo $pharmacy_billing_transfer_list->transfer->editAttributes() ?>>
			<?php echo $pharmacy_billing_transfer_list->transfer->selectOptionListHtml("x{$pharmacy_billing_transfer_list->RowIndex}_transfer") ?>
		</select>
</div>
<?php echo $pharmacy_billing_transfer_list->transfer->Lookup->getParamTag($pharmacy_billing_transfer_list, "p_x" . $pharmacy_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_transfer">
<span<?php echo $pharmacy_billing_transfer_list->transfer->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->transfer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->area->Visible) { // area ?>
		<td data-name="area" <?php echo $pharmacy_billing_transfer_list->area->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_area" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->area->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->area->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_area" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->area->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_area" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->area->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->area->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_area">
<span<?php echo $pharmacy_billing_transfer_list->area->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->area->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $pharmacy_billing_transfer_list->town->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_town" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->town->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_town" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->town->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_town" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->town->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_town">
<span<?php echo $pharmacy_billing_transfer_list->town->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->town->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $pharmacy_billing_transfer_list->province->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_province" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->province->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_province" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->province->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_province" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->province->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_province">
<span<?php echo $pharmacy_billing_transfer_list->province->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->province->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $pharmacy_billing_transfer_list->postal_code->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_postal_code" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_postal_code" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_postal_code">
<span<?php echo $pharmacy_billing_transfer_list->postal_code->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->postal_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no" <?php echo $pharmacy_billing_transfer_list->phone_no->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_phone_no" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->phone_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->phone_no->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_phone_no" class="form-group">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->phone_no->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCount ?>_pharmacy_billing_transfer_phone_no">
<span<?php echo $pharmacy_billing_transfer_list->phone_no->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_list->phone_no->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_transfer_list->ListOptions->render("body", "right", $pharmacy_billing_transfer_list->RowCount);
?>
	</tr>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD || $pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_billing_transferlist", "load"], function() {
	fpharmacy_billing_transferlist.updateLists(<?php echo $pharmacy_billing_transfer_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_billing_transfer_list->isGridAdd())
		if (!$pharmacy_billing_transfer_list->Recordset->EOF)
			$pharmacy_billing_transfer_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_billing_transfer_list->isGridAdd() || $pharmacy_billing_transfer_list->isGridEdit()) {
		$pharmacy_billing_transfer_list->RowIndex = '$rowindex$';
		$pharmacy_billing_transfer_list->loadRowValues();

		// Set row properties
		$pharmacy_billing_transfer->resetAttributes();
		$pharmacy_billing_transfer->RowAttrs->merge(["data-rowindex" => $pharmacy_billing_transfer_list->RowIndex, "id" => "r0_pharmacy_billing_transfer", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_billing_transfer->RowAttrs->appendClass("ew-template");
		$pharmacy_billing_transfer->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_billing_transfer_list->renderRow();

		// Render list options
		$pharmacy_billing_transfer_list->renderListOptions();
		$pharmacy_billing_transfer_list->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_billing_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_transfer_list->ListOptions->render("body", "left", $pharmacy_billing_transfer_list->RowIndex);
?>
	<?php if ($pharmacy_billing_transfer_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_pharmacy_billing_transfer_id" class="form-group pharmacy_billing_transfer_id"></span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->PharID->Visible) { // PharID ?>
		<td data-name="PharID">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_PharID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->PharID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy">
<span id="el$rowindex$_pharmacy_billing_transfer_pharmacy" class="form-group pharmacy_billing_transfer_pharmacy">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->pharmacy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createdby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_HospID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->transfer->Visible) { // transfer ?>
		<td data-name="transfer">
<span id="el$rowindex$_pharmacy_billing_transfer_transfer" class="form-group pharmacy_billing_transfer_transfer">
<?php $pharmacy_billing_transfer_list->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer_list->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer"<?php echo $pharmacy_billing_transfer_list->transfer->editAttributes() ?>>
			<?php echo $pharmacy_billing_transfer_list->transfer->selectOptionListHtml("x{$pharmacy_billing_transfer_list->RowIndex}_transfer") ?>
		</select>
</div>
<?php echo $pharmacy_billing_transfer_list->transfer->Lookup->getParamTag($pharmacy_billing_transfer_list, "p_x" . $pharmacy_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_transfer" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->transfer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->area->Visible) { // area ?>
		<td data-name="area">
<span id="el$rowindex$_pharmacy_billing_transfer_area" class="form-group pharmacy_billing_transfer_area">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->area->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->area->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_area" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->area->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->town->Visible) { // town ?>
		<td data-name="town">
<span id="el$rowindex$_pharmacy_billing_transfer_town" class="form-group pharmacy_billing_transfer_town">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->town->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_town" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->province->Visible) { // province ?>
		<td data-name="province">
<span id="el$rowindex$_pharmacy_billing_transfer_province" class="form-group pharmacy_billing_transfer_province">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->province->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_province" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<span id="el$rowindex$_pharmacy_billing_transfer_postal_code" class="form-group pharmacy_billing_transfer_postal_code">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no">
<span id="el$rowindex$_pharmacy_billing_transfer_phone_no" class="form-group pharmacy_billing_transfer_phone_no">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_list->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_list->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer_list->phone_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->phone_no->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_transfer_list->ListOptions->render("body", "right", $pharmacy_billing_transfer_list->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_billing_transferlist", "load"], function() {
	fpharmacy_billing_transferlist.updateLists(<?php echo $pharmacy_billing_transfer_list->RowIndex ?>);
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
<?php if ($pharmacy_billing_transfer_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_transfer_list->KeyCount ?>">
<?php echo $pharmacy_billing_transfer_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_transfer_list->KeyCount ?>">
<?php echo $pharmacy_billing_transfer_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_billing_transfer->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_billing_transfer_list->Recordset)
	$pharmacy_billing_transfer_list->Recordset->Close();
?>
<?php if (!$pharmacy_billing_transfer_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_billing_transfer_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_billing_transfer_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_transfer_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->TotalRecords == 0 && !$pharmacy_billing_transfer->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_transfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_billing_transfer_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_transfer_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_billing_transfer",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_billing_transfer_list->terminate();
?>