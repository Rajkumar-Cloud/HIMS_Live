<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$store_billing_transfer_list = new store_billing_transfer_list();

// Run the page
$store_billing_transfer_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_billing_transfer_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_billing_transfer->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_billing_transferlist = currentForm = new ew.Form("fstore_billing_transferlist", "list");
fstore_billing_transferlist.formKeyCountName = '<?php echo $store_billing_transfer_list->FormKeyCountName ?>';

// Validate form
fstore_billing_transferlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
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
		<?php if ($store_billing_transfer_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->id->caption(), $store_billing_transfer->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->transfer->Required) { ?>
			elm = this.getElements("x" + infix + "_transfer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->transfer->caption(), $store_billing_transfer->transfer->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->pharmacy->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->pharmacy->caption(), $store_billing_transfer->pharmacy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->area->caption(), $store_billing_transfer->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->town->caption(), $store_billing_transfer->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->province->caption(), $store_billing_transfer->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->postal_code->caption(), $store_billing_transfer->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->phone_no->caption(), $store_billing_transfer->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->createdby->caption(), $store_billing_transfer->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->createddatetime->caption(), $store_billing_transfer->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->modifiedby->caption(), $store_billing_transfer->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->modifieddatetime->caption(), $store_billing_transfer->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->HospID->caption(), $store_billing_transfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->StoreID->caption(), $store_billing_transfer->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_list->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->BranchID->caption(), $store_billing_transfer->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->BranchID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
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
fstore_billing_transferlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "transfer", false)) return false;
	if (ew.valueChanged(fobj, infix, "pharmacy", false)) return false;
	if (ew.valueChanged(fobj, infix, "area", false)) return false;
	if (ew.valueChanged(fobj, infix, "town", false)) return false;
	if (ew.valueChanged(fobj, infix, "province", false)) return false;
	if (ew.valueChanged(fobj, infix, "postal_code", false)) return false;
	if (ew.valueChanged(fobj, infix, "phone_no", false)) return false;
	if (ew.valueChanged(fobj, infix, "BranchID", false)) return false;
	return true;
}

// Form_CustomValidate event
fstore_billing_transferlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_billing_transferlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_billing_transferlist.lists["x_transfer"] = <?php echo $store_billing_transfer_list->transfer->Lookup->toClientList() ?>;
fstore_billing_transferlist.lists["x_transfer"].options = <?php echo JsonEncode($store_billing_transfer_list->transfer->lookupOptions()) ?>;
fstore_billing_transferlist.lists["x_StoreID"] = <?php echo $store_billing_transfer_list->StoreID->Lookup->toClientList() ?>;
fstore_billing_transferlist.lists["x_StoreID"].options = <?php echo JsonEncode($store_billing_transfer_list->StoreID->lookupOptions()) ?>;
fstore_billing_transferlist.autoSuggests["x_StoreID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fstore_billing_transferlistsrch = currentSearchForm = new ew.Form("fstore_billing_transferlistsrch");

// Filters
fstore_billing_transferlistsrch.filterList = <?php echo $store_billing_transfer_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_billing_transfer->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_billing_transfer_list->TotalRecs > 0 && $store_billing_transfer_list->ExportOptions->visible()) { ?>
<?php $store_billing_transfer_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_billing_transfer_list->ImportOptions->visible()) { ?>
<?php $store_billing_transfer_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_billing_transfer_list->SearchOptions->visible()) { ?>
<?php $store_billing_transfer_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_billing_transfer_list->FilterOptions->visible()) { ?>
<?php $store_billing_transfer_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_billing_transfer_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_billing_transfer->isExport() && !$store_billing_transfer->CurrentAction) { ?>
<form name="fstore_billing_transferlistsrch" id="fstore_billing_transferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_billing_transfer_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_billing_transferlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_billing_transfer">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_billing_transfer_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_billing_transfer_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_billing_transfer_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_billing_transfer_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_billing_transfer_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_billing_transfer_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_billing_transfer_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_billing_transfer_list->showPageHeader(); ?>
<?php
$store_billing_transfer_list->showMessage();
?>
<?php if ($store_billing_transfer_list->TotalRecs > 0 || $store_billing_transfer->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_billing_transfer_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_billing_transfer">
<?php if (!$store_billing_transfer->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_billing_transfer->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_billing_transfer_list->Pager)) $store_billing_transfer_list->Pager = new NumericPager($store_billing_transfer_list->StartRec, $store_billing_transfer_list->DisplayRecs, $store_billing_transfer_list->TotalRecs, $store_billing_transfer_list->RecRange, $store_billing_transfer_list->AutoHidePager) ?>
<?php if ($store_billing_transfer_list->Pager->RecordCount > 0 && $store_billing_transfer_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_billing_transfer_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_billing_transfer_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_billing_transfer_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_billing_transfer_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_billing_transfer_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_billing_transfer_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_billing_transfer_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_billing_transfer_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_billing_transfer_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_billing_transfer_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_billing_transfer_list->TotalRecs > 0 && (!$store_billing_transfer_list->AutoHidePageSizeSelector || $store_billing_transfer_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_billing_transfer">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_billing_transfer_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_billing_transfer_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_billing_transfer_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_billing_transfer_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_billing_transfer_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_billing_transfer_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_billing_transfer->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_billing_transfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_billing_transferlist" id="fstore_billing_transferlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_billing_transfer_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_billing_transfer_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_billing_transfer">
<div id="gmp_store_billing_transfer" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_billing_transfer_list->TotalRecs > 0 || $store_billing_transfer->isGridEdit()) { ?>
<table id="tbl_store_billing_transferlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_billing_transfer_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_billing_transfer_list->renderListOptions();

// Render list options (header, left)
$store_billing_transfer_list->ListOptions->render("header", "left");
?>
<?php if ($store_billing_transfer->id->Visible) { // id ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_billing_transfer->id->headerCellClass() ?>"><div id="elh_store_billing_transfer_id" class="store_billing_transfer_id"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_billing_transfer->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->id) ?>',1);"><div id="elh_store_billing_transfer_id" class="store_billing_transfer_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->transfer->Visible) { // transfer ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->transfer) == "") { ?>
		<th data-name="transfer" class="<?php echo $store_billing_transfer->transfer->headerCellClass() ?>"><div id="elh_store_billing_transfer_transfer" class="store_billing_transfer_transfer"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->transfer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transfer" class="<?php echo $store_billing_transfer->transfer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->transfer) ?>',1);"><div id="elh_store_billing_transfer_transfer" class="store_billing_transfer_transfer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->transfer->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->transfer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->transfer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->pharmacy->Visible) { // pharmacy ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->pharmacy) == "") { ?>
		<th data-name="pharmacy" class="<?php echo $store_billing_transfer->pharmacy->headerCellClass() ?>"><div id="elh_store_billing_transfer_pharmacy" class="store_billing_transfer_pharmacy"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy" class="<?php echo $store_billing_transfer->pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->pharmacy) ?>',1);"><div id="elh_store_billing_transfer_pharmacy" class="store_billing_transfer_pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->pharmacy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->pharmacy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->pharmacy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->area->Visible) { // area ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->area) == "") { ?>
		<th data-name="area" class="<?php echo $store_billing_transfer->area->headerCellClass() ?>"><div id="elh_store_billing_transfer_area" class="store_billing_transfer_area"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $store_billing_transfer->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->area) ?>',1);"><div id="elh_store_billing_transfer_area" class="store_billing_transfer_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->area->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->area->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->town->Visible) { // town ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->town) == "") { ?>
		<th data-name="town" class="<?php echo $store_billing_transfer->town->headerCellClass() ?>"><div id="elh_store_billing_transfer_town" class="store_billing_transfer_town"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $store_billing_transfer->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->town) ?>',1);"><div id="elh_store_billing_transfer_town" class="store_billing_transfer_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->province->Visible) { // province ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->province) == "") { ?>
		<th data-name="province" class="<?php echo $store_billing_transfer->province->headerCellClass() ?>"><div id="elh_store_billing_transfer_province" class="store_billing_transfer_province"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $store_billing_transfer->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->province) ?>',1);"><div id="elh_store_billing_transfer_province" class="store_billing_transfer_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->postal_code->Visible) { // postal_code ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $store_billing_transfer->postal_code->headerCellClass() ?>"><div id="elh_store_billing_transfer_postal_code" class="store_billing_transfer_postal_code"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $store_billing_transfer->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->postal_code) ?>',1);"><div id="elh_store_billing_transfer_postal_code" class="store_billing_transfer_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->phone_no->Visible) { // phone_no ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $store_billing_transfer->phone_no->headerCellClass() ?>"><div id="elh_store_billing_transfer_phone_no" class="store_billing_transfer_phone_no"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $store_billing_transfer->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->phone_no) ?>',1);"><div id="elh_store_billing_transfer_phone_no" class="store_billing_transfer_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->phone_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->phone_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->createdby->Visible) { // createdby ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $store_billing_transfer->createdby->headerCellClass() ?>"><div id="elh_store_billing_transfer_createdby" class="store_billing_transfer_createdby"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $store_billing_transfer->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->createdby) ?>',1);"><div id="elh_store_billing_transfer_createdby" class="store_billing_transfer_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->createddatetime->Visible) { // createddatetime ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $store_billing_transfer->createddatetime->headerCellClass() ?>"><div id="elh_store_billing_transfer_createddatetime" class="store_billing_transfer_createddatetime"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $store_billing_transfer->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->createddatetime) ?>',1);"><div id="elh_store_billing_transfer_createddatetime" class="store_billing_transfer_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->modifiedby->Visible) { // modifiedby ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $store_billing_transfer->modifiedby->headerCellClass() ?>"><div id="elh_store_billing_transfer_modifiedby" class="store_billing_transfer_modifiedby"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $store_billing_transfer->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->modifiedby) ?>',1);"><div id="elh_store_billing_transfer_modifiedby" class="store_billing_transfer_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_billing_transfer->modifieddatetime->headerCellClass() ?>"><div id="elh_store_billing_transfer_modifieddatetime" class="store_billing_transfer_modifieddatetime"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_billing_transfer->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->modifieddatetime) ?>',1);"><div id="elh_store_billing_transfer_modifieddatetime" class="store_billing_transfer_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->HospID->Visible) { // HospID ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_billing_transfer->HospID->headerCellClass() ?>"><div id="elh_store_billing_transfer_HospID" class="store_billing_transfer_HospID"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_billing_transfer->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->HospID) ?>',1);"><div id="elh_store_billing_transfer_HospID" class="store_billing_transfer_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->StoreID->Visible) { // StoreID ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_billing_transfer->StoreID->headerCellClass() ?>"><div id="elh_store_billing_transfer_StoreID" class="store_billing_transfer_StoreID"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_billing_transfer->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->StoreID) ?>',1);"><div id="elh_store_billing_transfer_StoreID" class="store_billing_transfer_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_billing_transfer->BranchID->Visible) { // BranchID ?>
	<?php if ($store_billing_transfer->sortUrl($store_billing_transfer->BranchID) == "") { ?>
		<th data-name="BranchID" class="<?php echo $store_billing_transfer->BranchID->headerCellClass() ?>"><div id="elh_store_billing_transfer_BranchID" class="store_billing_transfer_BranchID"><div class="ew-table-header-caption"><?php echo $store_billing_transfer->BranchID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchID" class="<?php echo $store_billing_transfer->BranchID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_billing_transfer->SortUrl($store_billing_transfer->BranchID) ?>',1);"><div id="elh_store_billing_transfer_BranchID" class="store_billing_transfer_BranchID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_billing_transfer->BranchID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_billing_transfer->BranchID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_billing_transfer->BranchID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_billing_transfer_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_billing_transfer->ExportAll && $store_billing_transfer->isExport()) {
	$store_billing_transfer_list->StopRec = $store_billing_transfer_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_billing_transfer_list->TotalRecs > $store_billing_transfer_list->StartRec + $store_billing_transfer_list->DisplayRecs - 1)
		$store_billing_transfer_list->StopRec = $store_billing_transfer_list->StartRec + $store_billing_transfer_list->DisplayRecs - 1;
	else
		$store_billing_transfer_list->StopRec = $store_billing_transfer_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $store_billing_transfer_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($store_billing_transfer_list->FormKeyCountName) && ($store_billing_transfer->isGridAdd() || $store_billing_transfer->isGridEdit() || $store_billing_transfer->isConfirm())) {
		$store_billing_transfer_list->KeyCount = $CurrentForm->getValue($store_billing_transfer_list->FormKeyCountName);
		$store_billing_transfer_list->StopRec = $store_billing_transfer_list->StartRec + $store_billing_transfer_list->KeyCount - 1;
	}
}
$store_billing_transfer_list->RecCnt = $store_billing_transfer_list->StartRec - 1;
if ($store_billing_transfer_list->Recordset && !$store_billing_transfer_list->Recordset->EOF) {
	$store_billing_transfer_list->Recordset->moveFirst();
	$selectLimit = $store_billing_transfer_list->UseSelectLimit;
	if (!$selectLimit && $store_billing_transfer_list->StartRec > 1)
		$store_billing_transfer_list->Recordset->move($store_billing_transfer_list->StartRec - 1);
} elseif (!$store_billing_transfer->AllowAddDeleteRow && $store_billing_transfer_list->StopRec == 0) {
	$store_billing_transfer_list->StopRec = $store_billing_transfer->GridAddRowCount;
}

// Initialize aggregate
$store_billing_transfer->RowType = ROWTYPE_AGGREGATEINIT;
$store_billing_transfer->resetAttributes();
$store_billing_transfer_list->renderRow();
if ($store_billing_transfer->isGridAdd())
	$store_billing_transfer_list->RowIndex = 0;
if ($store_billing_transfer->isGridEdit())
	$store_billing_transfer_list->RowIndex = 0;
while ($store_billing_transfer_list->RecCnt < $store_billing_transfer_list->StopRec) {
	$store_billing_transfer_list->RecCnt++;
	if ($store_billing_transfer_list->RecCnt >= $store_billing_transfer_list->StartRec) {
		$store_billing_transfer_list->RowCnt++;
		if ($store_billing_transfer->isGridAdd() || $store_billing_transfer->isGridEdit() || $store_billing_transfer->isConfirm()) {
			$store_billing_transfer_list->RowIndex++;
			$CurrentForm->Index = $store_billing_transfer_list->RowIndex;
			if ($CurrentForm->hasValue($store_billing_transfer_list->FormActionName) && $store_billing_transfer_list->EventCancelled)
				$store_billing_transfer_list->RowAction = strval($CurrentForm->getValue($store_billing_transfer_list->FormActionName));
			elseif ($store_billing_transfer->isGridAdd())
				$store_billing_transfer_list->RowAction = "insert";
			else
				$store_billing_transfer_list->RowAction = "";
		}

		// Set up key count
		$store_billing_transfer_list->KeyCount = $store_billing_transfer_list->RowIndex;

		// Init row class and style
		$store_billing_transfer->resetAttributes();
		$store_billing_transfer->CssClass = "";
		if ($store_billing_transfer->isGridAdd()) {
			$store_billing_transfer_list->loadRowValues(); // Load default values
		} else {
			$store_billing_transfer_list->loadRowValues($store_billing_transfer_list->Recordset); // Load row values
		}
		$store_billing_transfer->RowType = ROWTYPE_VIEW; // Render view
		if ($store_billing_transfer->isGridAdd()) // Grid add
			$store_billing_transfer->RowType = ROWTYPE_ADD; // Render add
		if ($store_billing_transfer->isGridAdd() && $store_billing_transfer->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$store_billing_transfer_list->restoreCurrentRowFormValues($store_billing_transfer_list->RowIndex); // Restore form values
		if ($store_billing_transfer->isGridEdit()) { // Grid edit
			if ($store_billing_transfer->EventCancelled)
				$store_billing_transfer_list->restoreCurrentRowFormValues($store_billing_transfer_list->RowIndex); // Restore form values
			if ($store_billing_transfer_list->RowAction == "insert")
				$store_billing_transfer->RowType = ROWTYPE_ADD; // Render add
			else
				$store_billing_transfer->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($store_billing_transfer->isGridEdit() && ($store_billing_transfer->RowType == ROWTYPE_EDIT || $store_billing_transfer->RowType == ROWTYPE_ADD) && $store_billing_transfer->EventCancelled) // Update failed
			$store_billing_transfer_list->restoreCurrentRowFormValues($store_billing_transfer_list->RowIndex); // Restore form values
		if ($store_billing_transfer->RowType == ROWTYPE_EDIT) // Edit row
			$store_billing_transfer_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$store_billing_transfer->RowAttrs = array_merge($store_billing_transfer->RowAttrs, array('data-rowindex'=>$store_billing_transfer_list->RowCnt, 'id'=>'r' . $store_billing_transfer_list->RowCnt . '_store_billing_transfer', 'data-rowtype'=>$store_billing_transfer->RowType));

		// Render row
		$store_billing_transfer_list->renderRow();

		// Render list options
		$store_billing_transfer_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($store_billing_transfer_list->RowAction <> "delete" && $store_billing_transfer_list->RowAction <> "insertdelete" && !($store_billing_transfer_list->RowAction == "insert" && $store_billing_transfer->isConfirm() && $store_billing_transfer_list->emptyRow())) {
?>
	<tr<?php echo $store_billing_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_billing_transfer_list->ListOptions->render("body", "left", $store_billing_transfer_list->RowCnt);
?>
	<?php if ($store_billing_transfer->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_billing_transfer->id->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_id" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_id" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($store_billing_transfer->id->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_id" class="form-group store_billing_transfer_id">
<span<?php echo $store_billing_transfer->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_billing_transfer->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_id" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_id" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($store_billing_transfer->id->CurrentValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_id" class="store_billing_transfer_id">
<span<?php echo $store_billing_transfer->id->viewAttributes() ?>>
<?php echo $store_billing_transfer->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->transfer->Visible) { // transfer ?>
		<td data-name="transfer"<?php echo $store_billing_transfer->transfer->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_transfer" class="form-group store_billing_transfer_transfer">
<?php $store_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$store_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $store_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer"<?php echo $store_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $store_billing_transfer->transfer->selectOptionListHtml("x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer") ?>
	</select>
</div>
<?php echo $store_billing_transfer->transfer->Lookup->getParamTag("p_x" . $store_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_transfer" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" value="<?php echo HtmlEncode($store_billing_transfer->transfer->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_transfer" class="form-group store_billing_transfer_transfer">
<?php $store_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$store_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $store_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer"<?php echo $store_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $store_billing_transfer->transfer->selectOptionListHtml("x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer") ?>
	</select>
</div>
<?php echo $store_billing_transfer->transfer->Lookup->getParamTag("p_x" . $store_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_transfer" class="store_billing_transfer_transfer">
<span<?php echo $store_billing_transfer->transfer->viewAttributes() ?>>
<?php echo $store_billing_transfer->transfer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy"<?php echo $store_billing_transfer->pharmacy->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_pharmacy" class="form-group store_billing_transfer_pharmacy">
<input type="text" data-table="store_billing_transfer" data-field="x_pharmacy" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->pharmacy->EditValue ?>"<?php echo $store_billing_transfer->pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_pharmacy" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" value="<?php echo HtmlEncode($store_billing_transfer->pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_pharmacy" class="form-group store_billing_transfer_pharmacy">
<input type="text" data-table="store_billing_transfer" data-field="x_pharmacy" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->pharmacy->EditValue ?>"<?php echo $store_billing_transfer->pharmacy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_pharmacy" class="store_billing_transfer_pharmacy">
<span<?php echo $store_billing_transfer->pharmacy->viewAttributes() ?>>
<?php echo $store_billing_transfer->pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->area->Visible) { // area ?>
		<td data-name="area"<?php echo $store_billing_transfer->area->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_area" class="form-group store_billing_transfer_area">
<input type="text" data-table="store_billing_transfer" data-field="x_area" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->area->EditValue ?>"<?php echo $store_billing_transfer->area->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_area" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_area" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_area" value="<?php echo HtmlEncode($store_billing_transfer->area->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_area" class="form-group store_billing_transfer_area">
<input type="text" data-table="store_billing_transfer" data-field="x_area" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->area->EditValue ?>"<?php echo $store_billing_transfer->area->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_area" class="store_billing_transfer_area">
<span<?php echo $store_billing_transfer->area->viewAttributes() ?>>
<?php echo $store_billing_transfer->area->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->town->Visible) { // town ?>
		<td data-name="town"<?php echo $store_billing_transfer->town->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_town" class="form-group store_billing_transfer_town">
<input type="text" data-table="store_billing_transfer" data-field="x_town" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($store_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->town->EditValue ?>"<?php echo $store_billing_transfer->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_town" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_town" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_town" value="<?php echo HtmlEncode($store_billing_transfer->town->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_town" class="form-group store_billing_transfer_town">
<input type="text" data-table="store_billing_transfer" data-field="x_town" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($store_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->town->EditValue ?>"<?php echo $store_billing_transfer->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_town" class="store_billing_transfer_town">
<span<?php echo $store_billing_transfer->town->viewAttributes() ?>>
<?php echo $store_billing_transfer->town->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->province->Visible) { // province ?>
		<td data-name="province"<?php echo $store_billing_transfer->province->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_province" class="form-group store_billing_transfer_province">
<input type="text" data-table="store_billing_transfer" data-field="x_province" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->province->EditValue ?>"<?php echo $store_billing_transfer->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_province" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_province" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_province" value="<?php echo HtmlEncode($store_billing_transfer->province->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_province" class="form-group store_billing_transfer_province">
<input type="text" data-table="store_billing_transfer" data-field="x_province" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->province->EditValue ?>"<?php echo $store_billing_transfer->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_province" class="store_billing_transfer_province">
<span<?php echo $store_billing_transfer->province->viewAttributes() ?>>
<?php echo $store_billing_transfer->province->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $store_billing_transfer->postal_code->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_postal_code" class="form-group store_billing_transfer_postal_code">
<input type="text" data-table="store_billing_transfer" data-field="x_postal_code" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->postal_code->EditValue ?>"<?php echo $store_billing_transfer->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_postal_code" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($store_billing_transfer->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_postal_code" class="form-group store_billing_transfer_postal_code">
<input type="text" data-table="store_billing_transfer" data-field="x_postal_code" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->postal_code->EditValue ?>"<?php echo $store_billing_transfer->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_postal_code" class="store_billing_transfer_postal_code">
<span<?php echo $store_billing_transfer->postal_code->viewAttributes() ?>>
<?php echo $store_billing_transfer->postal_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no"<?php echo $store_billing_transfer->phone_no->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_phone_no" class="form-group store_billing_transfer_phone_no">
<input type="text" data-table="store_billing_transfer" data-field="x_phone_no" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->phone_no->EditValue ?>"<?php echo $store_billing_transfer->phone_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_phone_no" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" value="<?php echo HtmlEncode($store_billing_transfer->phone_no->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_phone_no" class="form-group store_billing_transfer_phone_no">
<input type="text" data-table="store_billing_transfer" data-field="x_phone_no" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->phone_no->EditValue ?>"<?php echo $store_billing_transfer->phone_no->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_phone_no" class="store_billing_transfer_phone_no">
<span<?php echo $store_billing_transfer->phone_no->viewAttributes() ?>>
<?php echo $store_billing_transfer->phone_no->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $store_billing_transfer->createdby->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_createdby" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_createdby" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($store_billing_transfer->createdby->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_createdby" class="store_billing_transfer_createdby">
<span<?php echo $store_billing_transfer->createdby->viewAttributes() ?>>
<?php echo $store_billing_transfer->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $store_billing_transfer->createddatetime->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_createddatetime" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_createddatetime" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($store_billing_transfer->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_createddatetime" class="store_billing_transfer_createddatetime">
<span<?php echo $store_billing_transfer->createddatetime->viewAttributes() ?>>
<?php echo $store_billing_transfer->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $store_billing_transfer->modifiedby->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_modifiedby" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifiedby" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($store_billing_transfer->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_modifiedby" class="store_billing_transfer_modifiedby">
<span<?php echo $store_billing_transfer->modifiedby->viewAttributes() ?>>
<?php echo $store_billing_transfer->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $store_billing_transfer->modifieddatetime->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_modifieddatetime" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifieddatetime" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($store_billing_transfer->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_modifieddatetime" class="store_billing_transfer_modifieddatetime">
<span<?php echo $store_billing_transfer->modifieddatetime->viewAttributes() ?>>
<?php echo $store_billing_transfer->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_billing_transfer->HospID->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_HospID" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_HospID" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($store_billing_transfer->HospID->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_HospID" class="store_billing_transfer_HospID">
<span<?php echo $store_billing_transfer->HospID->viewAttributes() ?>>
<?php echo $store_billing_transfer->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_billing_transfer->StoreID->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="store_billing_transfer" data-field="x_StoreID" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_StoreID" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_billing_transfer->StoreID->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_StoreID" class="store_billing_transfer_StoreID">
<span<?php echo $store_billing_transfer->StoreID->viewAttributes() ?>>
<?php echo $store_billing_transfer->StoreID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID"<?php echo $store_billing_transfer->BranchID->cellAttributes() ?>>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_BranchID" class="form-group store_billing_transfer_BranchID">
<input type="text" data-table="store_billing_transfer" data-field="x_BranchID" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->BranchID->EditValue ?>"<?php echo $store_billing_transfer->BranchID->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_BranchID" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" value="<?php echo HtmlEncode($store_billing_transfer->BranchID->OldValue) ?>">
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_BranchID" class="form-group store_billing_transfer_BranchID">
<input type="text" data-table="store_billing_transfer" data-field="x_BranchID" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->BranchID->EditValue ?>"<?php echo $store_billing_transfer->BranchID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($store_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $store_billing_transfer_list->RowCnt ?>_store_billing_transfer_BranchID" class="store_billing_transfer_BranchID">
<span<?php echo $store_billing_transfer->BranchID->viewAttributes() ?>>
<?php echo $store_billing_transfer->BranchID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_billing_transfer_list->ListOptions->render("body", "right", $store_billing_transfer_list->RowCnt);
?>
	</tr>
<?php if ($store_billing_transfer->RowType == ROWTYPE_ADD || $store_billing_transfer->RowType == ROWTYPE_EDIT) { ?>
<script>
fstore_billing_transferlist.updateLists(<?php echo $store_billing_transfer_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$store_billing_transfer->isGridAdd())
		if (!$store_billing_transfer_list->Recordset->EOF)
			$store_billing_transfer_list->Recordset->moveNext();
}
?>
<?php
	if ($store_billing_transfer->isGridAdd() || $store_billing_transfer->isGridEdit()) {
		$store_billing_transfer_list->RowIndex = '$rowindex$';
		$store_billing_transfer_list->loadRowValues();

		// Set row properties
		$store_billing_transfer->resetAttributes();
		$store_billing_transfer->RowAttrs = array_merge($store_billing_transfer->RowAttrs, array('data-rowindex'=>$store_billing_transfer_list->RowIndex, 'id'=>'r0_store_billing_transfer', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($store_billing_transfer->RowAttrs["class"], "ew-template");
		$store_billing_transfer->RowType = ROWTYPE_ADD;

		// Render row
		$store_billing_transfer_list->renderRow();

		// Render list options
		$store_billing_transfer_list->renderListOptions();
		$store_billing_transfer_list->StartRowCnt = 0;
?>
	<tr<?php echo $store_billing_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_billing_transfer_list->ListOptions->render("body", "left", $store_billing_transfer_list->RowIndex);
?>
	<?php if ($store_billing_transfer->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="store_billing_transfer" data-field="x_id" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_id" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($store_billing_transfer->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->transfer->Visible) { // transfer ?>
		<td data-name="transfer">
<span id="el$rowindex$_store_billing_transfer_transfer" class="form-group store_billing_transfer_transfer">
<?php $store_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$store_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $store_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer"<?php echo $store_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $store_billing_transfer->transfer->selectOptionListHtml("x<?php echo $store_billing_transfer_list->RowIndex ?>_transfer") ?>
	</select>
</div>
<?php echo $store_billing_transfer->transfer->Lookup->getParamTag("p_x" . $store_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_transfer" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_transfer" value="<?php echo HtmlEncode($store_billing_transfer->transfer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy">
<span id="el$rowindex$_store_billing_transfer_pharmacy" class="form-group store_billing_transfer_pharmacy">
<input type="text" data-table="store_billing_transfer" data-field="x_pharmacy" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->pharmacy->EditValue ?>"<?php echo $store_billing_transfer->pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_pharmacy" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_pharmacy" value="<?php echo HtmlEncode($store_billing_transfer->pharmacy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->area->Visible) { // area ?>
		<td data-name="area">
<span id="el$rowindex$_store_billing_transfer_area" class="form-group store_billing_transfer_area">
<input type="text" data-table="store_billing_transfer" data-field="x_area" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->area->EditValue ?>"<?php echo $store_billing_transfer->area->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_area" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_area" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_area" value="<?php echo HtmlEncode($store_billing_transfer->area->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->town->Visible) { // town ?>
		<td data-name="town">
<span id="el$rowindex$_store_billing_transfer_town" class="form-group store_billing_transfer_town">
<input type="text" data-table="store_billing_transfer" data-field="x_town" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($store_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->town->EditValue ?>"<?php echo $store_billing_transfer->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_town" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_town" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_town" value="<?php echo HtmlEncode($store_billing_transfer->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->province->Visible) { // province ?>
		<td data-name="province">
<span id="el$rowindex$_store_billing_transfer_province" class="form-group store_billing_transfer_province">
<input type="text" data-table="store_billing_transfer" data-field="x_province" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->province->EditValue ?>"<?php echo $store_billing_transfer->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_province" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_province" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_province" value="<?php echo HtmlEncode($store_billing_transfer->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<span id="el$rowindex$_store_billing_transfer_postal_code" class="form-group store_billing_transfer_postal_code">
<input type="text" data-table="store_billing_transfer" data-field="x_postal_code" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->postal_code->EditValue ?>"<?php echo $store_billing_transfer->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_postal_code" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($store_billing_transfer->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no">
<span id="el$rowindex$_store_billing_transfer_phone_no" class="form-group store_billing_transfer_phone_no">
<input type="text" data-table="store_billing_transfer" data-field="x_phone_no" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->phone_no->EditValue ?>"<?php echo $store_billing_transfer->phone_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_phone_no" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_phone_no" value="<?php echo HtmlEncode($store_billing_transfer->phone_no->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="store_billing_transfer" data-field="x_createdby" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_createdby" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($store_billing_transfer->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="store_billing_transfer" data-field="x_createddatetime" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_createddatetime" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($store_billing_transfer->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="store_billing_transfer" data-field="x_modifiedby" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifiedby" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($store_billing_transfer->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="store_billing_transfer" data-field="x_modifieddatetime" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifieddatetime" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($store_billing_transfer->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="store_billing_transfer" data-field="x_HospID" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_HospID" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($store_billing_transfer->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID">
<input type="hidden" data-table="store_billing_transfer" data-field="x_StoreID" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_StoreID" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_StoreID" value="<?php echo HtmlEncode($store_billing_transfer->StoreID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($store_billing_transfer->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID">
<span id="el$rowindex$_store_billing_transfer_BranchID" class="form-group store_billing_transfer_BranchID">
<input type="text" data-table="store_billing_transfer" data-field="x_BranchID" name="x<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" id="x<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->BranchID->EditValue ?>"<?php echo $store_billing_transfer->BranchID->editAttributes() ?>>
</span>
<input type="hidden" data-table="store_billing_transfer" data-field="x_BranchID" name="o<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" id="o<?php echo $store_billing_transfer_list->RowIndex ?>_BranchID" value="<?php echo HtmlEncode($store_billing_transfer->BranchID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_billing_transfer_list->ListOptions->render("body", "right", $store_billing_transfer_list->RowIndex);
?>
<script>
fstore_billing_transferlist.updateLists(<?php echo $store_billing_transfer_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($store_billing_transfer->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $store_billing_transfer_list->FormKeyCountName ?>" id="<?php echo $store_billing_transfer_list->FormKeyCountName ?>" value="<?php echo $store_billing_transfer_list->KeyCount ?>">
<?php echo $store_billing_transfer_list->MultiSelectKey ?>
<?php } ?>
<?php if ($store_billing_transfer->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $store_billing_transfer_list->FormKeyCountName ?>" id="<?php echo $store_billing_transfer_list->FormKeyCountName ?>" value="<?php echo $store_billing_transfer_list->KeyCount ?>">
<?php echo $store_billing_transfer_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$store_billing_transfer->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_billing_transfer_list->Recordset)
	$store_billing_transfer_list->Recordset->Close();
?>
<?php if (!$store_billing_transfer->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_billing_transfer->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_billing_transfer_list->Pager)) $store_billing_transfer_list->Pager = new NumericPager($store_billing_transfer_list->StartRec, $store_billing_transfer_list->DisplayRecs, $store_billing_transfer_list->TotalRecs, $store_billing_transfer_list->RecRange, $store_billing_transfer_list->AutoHidePager) ?>
<?php if ($store_billing_transfer_list->Pager->RecordCount > 0 && $store_billing_transfer_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_billing_transfer_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_billing_transfer_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_billing_transfer_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_billing_transfer_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_billing_transfer_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_billing_transfer_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_billing_transfer_list->pageUrl() ?>start=<?php echo $store_billing_transfer_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_billing_transfer_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_billing_transfer_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_billing_transfer_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_billing_transfer_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_billing_transfer_list->TotalRecs > 0 && (!$store_billing_transfer_list->AutoHidePageSizeSelector || $store_billing_transfer_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_billing_transfer">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_billing_transfer_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_billing_transfer_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_billing_transfer_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_billing_transfer_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_billing_transfer_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_billing_transfer_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_billing_transfer->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_billing_transfer_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_billing_transfer_list->TotalRecs == 0 && !$store_billing_transfer->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_billing_transfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_billing_transfer_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_billing_transfer->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_billing_transfer->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_billing_transfer", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_billing_transfer_list->terminate();
?>