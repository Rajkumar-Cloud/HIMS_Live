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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_billing_transferlist = currentForm = new ew.Form("fpharmacy_billing_transferlist", "list");
fpharmacy_billing_transferlist.formKeyCountName = '<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>';

// Validate form
fpharmacy_billing_transferlist.validate = function() {
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
		<?php if ($pharmacy_billing_transfer_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->id->caption(), $pharmacy_billing_transfer->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->PharID->caption(), $pharmacy_billing_transfer->PharID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->pharmacy->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->pharmacy->caption(), $pharmacy_billing_transfer->pharmacy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->createdby->caption(), $pharmacy_billing_transfer->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->createddatetime->caption(), $pharmacy_billing_transfer->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->modifiedby->caption(), $pharmacy_billing_transfer->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->modifieddatetime->caption(), $pharmacy_billing_transfer->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->HospID->caption(), $pharmacy_billing_transfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->transfer->Required) { ?>
			elm = this.getElements("x" + infix + "_transfer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->transfer->caption(), $pharmacy_billing_transfer->transfer->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->area->caption(), $pharmacy_billing_transfer->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->town->caption(), $pharmacy_billing_transfer->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->province->caption(), $pharmacy_billing_transfer->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->postal_code->caption(), $pharmacy_billing_transfer->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_list->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->phone_no->caption(), $pharmacy_billing_transfer->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>

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

// Form_CustomValidate event
fpharmacy_billing_transferlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_transferlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_transferlist.lists["x_PharID"] = <?php echo $pharmacy_billing_transfer_list->PharID->Lookup->toClientList() ?>;
fpharmacy_billing_transferlist.lists["x_PharID"].options = <?php echo JsonEncode($pharmacy_billing_transfer_list->PharID->lookupOptions()) ?>;
fpharmacy_billing_transferlist.autoSuggests["x_PharID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_billing_transferlist.lists["x_transfer"] = <?php echo $pharmacy_billing_transfer_list->transfer->Lookup->toClientList() ?>;
fpharmacy_billing_transferlist.lists["x_transfer"].options = <?php echo JsonEncode($pharmacy_billing_transfer_list->transfer->lookupOptions()) ?>;

// Form object for search
var fpharmacy_billing_transferlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_transferlistsrch");

// Filters
fpharmacy_billing_transferlistsrch.filterList = <?php echo $pharmacy_billing_transfer_list->getFilterList() ?>;
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
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_billing_transfer_list->TotalRecs > 0 && $pharmacy_billing_transfer_list->ExportOptions->visible()) { ?>
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
<?php if (!$pharmacy_billing_transfer->isExport() && !$pharmacy_billing_transfer->CurrentAction) { ?>
<form name="fpharmacy_billing_transferlistsrch" id="fpharmacy_billing_transferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_billing_transfer_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_billing_transferlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_transfer">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_billing_transfer_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_billing_transfer_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_transfer_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_billing_transfer_list->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_list->showMessage();
?>
<?php if ($pharmacy_billing_transfer_list->TotalRecs > 0 || $pharmacy_billing_transfer->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_billing_transfer_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_transfer">
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_billing_transfer->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_billing_transfer_list->Pager)) $pharmacy_billing_transfer_list->Pager = new NumericPager($pharmacy_billing_transfer_list->StartRec, $pharmacy_billing_transfer_list->DisplayRecs, $pharmacy_billing_transfer_list->TotalRecs, $pharmacy_billing_transfer_list->RecRange, $pharmacy_billing_transfer_list->AutoHidePager) ?>
<?php if ($pharmacy_billing_transfer_list->Pager->RecordCount > 0 && $pharmacy_billing_transfer_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_billing_transfer_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_billing_transfer_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_billing_transfer_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_billing_transfer_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_billing_transfer_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_billing_transfer_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->TotalRecs > 0 && (!$pharmacy_billing_transfer_list->AutoHidePageSizeSelector || $pharmacy_billing_transfer_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_billing_transfer->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_transfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_billing_transferlist" id="fpharmacy_billing_transferlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_transfer_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_transfer_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<div id="gmp_pharmacy_billing_transfer" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_billing_transfer_list->TotalRecs > 0 || $pharmacy_billing_transfer->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_transferlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_billing_transfer_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_billing_transfer_list->renderListOptions();

// Render list options (header, left)
$pharmacy_billing_transfer_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_billing_transfer->id->Visible) { // id ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_transfer->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_transfer->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->id) ?>',1);"><div id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->PharID->Visible) { // PharID ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_transfer->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_transfer->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->PharID) ?>',1);"><div id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->PharID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->PharID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->pharmacy) == "") { ?>
		<th data-name="pharmacy" class="<?php echo $pharmacy_billing_transfer->pharmacy->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy" class="<?php echo $pharmacy_billing_transfer->pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->pharmacy) ?>',1);"><div id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->pharmacy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->pharmacy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->pharmacy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_transfer->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_transfer->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->createdby) ?>',1);"><div id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_transfer->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_transfer->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->createddatetime) ?>',1);"><div id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_transfer->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_transfer->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->modifiedby) ?>',1);"><div id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_transfer->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_transfer->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->modifieddatetime) ?>',1);"><div id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_billing_transfer->HospID->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_billing_transfer->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->HospID) ?>',1);"><div id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->transfer) == "") { ?>
		<th data-name="transfer" class="<?php echo $pharmacy_billing_transfer->transfer->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->transfer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transfer" class="<?php echo $pharmacy_billing_transfer->transfer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->transfer) ?>',1);"><div id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->transfer->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->transfer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->transfer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->area) == "") { ?>
		<th data-name="area" class="<?php echo $pharmacy_billing_transfer->area->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $pharmacy_billing_transfer->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->area) ?>',1);"><div id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->area->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->area->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->town) == "") { ?>
		<th data-name="town" class="<?php echo $pharmacy_billing_transfer->town->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $pharmacy_billing_transfer->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->town) ?>',1);"><div id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->province) == "") { ?>
		<th data-name="province" class="<?php echo $pharmacy_billing_transfer->province->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $pharmacy_billing_transfer->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->province) ?>',1);"><div id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $pharmacy_billing_transfer->postal_code->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $pharmacy_billing_transfer->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->postal_code) ?>',1);"><div id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
	<?php if ($pharmacy_billing_transfer->sortUrl($pharmacy_billing_transfer->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $pharmacy_billing_transfer->phone_no->headerCellClass() ?>"><div id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $pharmacy_billing_transfer->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_transfer->SortUrl($pharmacy_billing_transfer->phone_no) ?>',1);"><div id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_transfer->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_transfer->phone_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_transfer->phone_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
if ($pharmacy_billing_transfer->ExportAll && $pharmacy_billing_transfer->isExport()) {
	$pharmacy_billing_transfer_list->StopRec = $pharmacy_billing_transfer_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_billing_transfer_list->TotalRecs > $pharmacy_billing_transfer_list->StartRec + $pharmacy_billing_transfer_list->DisplayRecs - 1)
		$pharmacy_billing_transfer_list->StopRec = $pharmacy_billing_transfer_list->StartRec + $pharmacy_billing_transfer_list->DisplayRecs - 1;
	else
		$pharmacy_billing_transfer_list->StopRec = $pharmacy_billing_transfer_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_billing_transfer_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_billing_transfer_list->FormKeyCountName) && ($pharmacy_billing_transfer->isGridAdd() || $pharmacy_billing_transfer->isGridEdit() || $pharmacy_billing_transfer->isConfirm())) {
		$pharmacy_billing_transfer_list->KeyCount = $CurrentForm->getValue($pharmacy_billing_transfer_list->FormKeyCountName);
		$pharmacy_billing_transfer_list->StopRec = $pharmacy_billing_transfer_list->StartRec + $pharmacy_billing_transfer_list->KeyCount - 1;
	}
}
$pharmacy_billing_transfer_list->RecCnt = $pharmacy_billing_transfer_list->StartRec - 1;
if ($pharmacy_billing_transfer_list->Recordset && !$pharmacy_billing_transfer_list->Recordset->EOF) {
	$pharmacy_billing_transfer_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_billing_transfer_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_billing_transfer_list->StartRec > 1)
		$pharmacy_billing_transfer_list->Recordset->move($pharmacy_billing_transfer_list->StartRec - 1);
} elseif (!$pharmacy_billing_transfer->AllowAddDeleteRow && $pharmacy_billing_transfer_list->StopRec == 0) {
	$pharmacy_billing_transfer_list->StopRec = $pharmacy_billing_transfer->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_billing_transfer->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_billing_transfer->resetAttributes();
$pharmacy_billing_transfer_list->renderRow();
if ($pharmacy_billing_transfer->isGridAdd())
	$pharmacy_billing_transfer_list->RowIndex = 0;
if ($pharmacy_billing_transfer->isGridEdit())
	$pharmacy_billing_transfer_list->RowIndex = 0;
while ($pharmacy_billing_transfer_list->RecCnt < $pharmacy_billing_transfer_list->StopRec) {
	$pharmacy_billing_transfer_list->RecCnt++;
	if ($pharmacy_billing_transfer_list->RecCnt >= $pharmacy_billing_transfer_list->StartRec) {
		$pharmacy_billing_transfer_list->RowCnt++;
		if ($pharmacy_billing_transfer->isGridAdd() || $pharmacy_billing_transfer->isGridEdit() || $pharmacy_billing_transfer->isConfirm()) {
			$pharmacy_billing_transfer_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_billing_transfer_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_billing_transfer_list->FormActionName) && $pharmacy_billing_transfer_list->EventCancelled)
				$pharmacy_billing_transfer_list->RowAction = strval($CurrentForm->getValue($pharmacy_billing_transfer_list->FormActionName));
			elseif ($pharmacy_billing_transfer->isGridAdd())
				$pharmacy_billing_transfer_list->RowAction = "insert";
			else
				$pharmacy_billing_transfer_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_billing_transfer_list->KeyCount = $pharmacy_billing_transfer_list->RowIndex;

		// Init row class and style
		$pharmacy_billing_transfer->resetAttributes();
		$pharmacy_billing_transfer->CssClass = "";
		if ($pharmacy_billing_transfer->isGridAdd()) {
			$pharmacy_billing_transfer_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_billing_transfer_list->loadRowValues($pharmacy_billing_transfer_list->Recordset); // Load row values
		}
		$pharmacy_billing_transfer->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_billing_transfer->isGridAdd()) // Grid add
			$pharmacy_billing_transfer->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_billing_transfer->isGridAdd() && $pharmacy_billing_transfer->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_billing_transfer_list->restoreCurrentRowFormValues($pharmacy_billing_transfer_list->RowIndex); // Restore form values
		if ($pharmacy_billing_transfer->isGridEdit()) { // Grid edit
			if ($pharmacy_billing_transfer->EventCancelled)
				$pharmacy_billing_transfer_list->restoreCurrentRowFormValues($pharmacy_billing_transfer_list->RowIndex); // Restore form values
			if ($pharmacy_billing_transfer_list->RowAction == "insert")
				$pharmacy_billing_transfer->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_billing_transfer->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_billing_transfer->isGridEdit() && ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT || $pharmacy_billing_transfer->RowType == ROWTYPE_ADD) && $pharmacy_billing_transfer->EventCancelled) // Update failed
			$pharmacy_billing_transfer_list->restoreCurrentRowFormValues($pharmacy_billing_transfer_list->RowIndex); // Restore form values
		if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_billing_transfer_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_billing_transfer->RowAttrs = array_merge($pharmacy_billing_transfer->RowAttrs, array('data-rowindex'=>$pharmacy_billing_transfer_list->RowCnt, 'id'=>'r' . $pharmacy_billing_transfer_list->RowCnt . '_pharmacy_billing_transfer', 'data-rowtype'=>$pharmacy_billing_transfer->RowType));

		// Render row
		$pharmacy_billing_transfer_list->renderRow();

		// Render list options
		$pharmacy_billing_transfer_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_billing_transfer_list->RowAction <> "delete" && $pharmacy_billing_transfer_list->RowAction <> "insertdelete" && !($pharmacy_billing_transfer_list->RowAction == "insert" && $pharmacy_billing_transfer->isConfirm() && $pharmacy_billing_transfer_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_billing_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_transfer_list->ListOptions->render("body", "left", $pharmacy_billing_transfer_list->RowCnt);
?>
	<?php if ($pharmacy_billing_transfer->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_billing_transfer->id->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_transfer->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_id" class="form-group pharmacy_billing_transfer_id">
<span<?php echo $pharmacy_billing_transfer->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_transfer->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_transfer->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id">
<span<?php echo $pharmacy_billing_transfer->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->PharID->Visible) { // PharID ?>
		<td data-name="PharID"<?php echo $pharmacy_billing_transfer->PharID->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_PharID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_transfer->PharID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID">
<span<?php echo $pharmacy_billing_transfer->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy"<?php echo $pharmacy_billing_transfer->pharmacy->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_pharmacy" class="form-group pharmacy_billing_transfer_pharmacy">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer->pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" value="<?php echo HtmlEncode($pharmacy_billing_transfer->pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_pharmacy" class="form-group pharmacy_billing_transfer_pharmacy">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer->pharmacy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy">
<span<?php echo $pharmacy_billing_transfer->pharmacy->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_billing_transfer->createdby->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createdby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_transfer->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby">
<span<?php echo $pharmacy_billing_transfer->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_billing_transfer->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime">
<span<?php echo $pharmacy_billing_transfer->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_billing_transfer->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_transfer->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby">
<span<?php echo $pharmacy_billing_transfer->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_billing_transfer->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime">
<span<?php echo $pharmacy_billing_transfer->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_billing_transfer->HospID->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_HospID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_billing_transfer->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID">
<span<?php echo $pharmacy_billing_transfer->HospID->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
		<td data-name="transfer"<?php echo $pharmacy_billing_transfer->transfer->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_transfer" class="form-group pharmacy_billing_transfer_transfer">
<?php $pharmacy_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer"<?php echo $pharmacy_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $pharmacy_billing_transfer->transfer->selectOptionListHtml("x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer") ?>
	</select>
</div>
<?php echo $pharmacy_billing_transfer->transfer->Lookup->getParamTag("p_x" . $pharmacy_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_transfer" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" value="<?php echo HtmlEncode($pharmacy_billing_transfer->transfer->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_transfer" class="form-group pharmacy_billing_transfer_transfer">
<?php $pharmacy_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer"<?php echo $pharmacy_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $pharmacy_billing_transfer->transfer->selectOptionListHtml("x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer") ?>
	</select>
</div>
<?php echo $pharmacy_billing_transfer->transfer->Lookup->getParamTag("p_x" . $pharmacy_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer">
<span<?php echo $pharmacy_billing_transfer->transfer->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->transfer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
		<td data-name="area"<?php echo $pharmacy_billing_transfer->area->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_area" class="form-group pharmacy_billing_transfer_area">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->area->EditValue ?>"<?php echo $pharmacy_billing_transfer->area->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_area" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" value="<?php echo HtmlEncode($pharmacy_billing_transfer->area->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_area" class="form-group pharmacy_billing_transfer_area">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->area->EditValue ?>"<?php echo $pharmacy_billing_transfer->area->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area">
<span<?php echo $pharmacy_billing_transfer->area->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->area->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
		<td data-name="town"<?php echo $pharmacy_billing_transfer->town->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_town" class="form-group pharmacy_billing_transfer_town">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->town->EditValue ?>"<?php echo $pharmacy_billing_transfer->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_town" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" value="<?php echo HtmlEncode($pharmacy_billing_transfer->town->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_town" class="form-group pharmacy_billing_transfer_town">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->town->EditValue ?>"<?php echo $pharmacy_billing_transfer->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town">
<span<?php echo $pharmacy_billing_transfer->town->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->town->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
		<td data-name="province"<?php echo $pharmacy_billing_transfer->province->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_province" class="form-group pharmacy_billing_transfer_province">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->province->EditValue ?>"<?php echo $pharmacy_billing_transfer->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_province" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" value="<?php echo HtmlEncode($pharmacy_billing_transfer->province->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_province" class="form-group pharmacy_billing_transfer_province">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->province->EditValue ?>"<?php echo $pharmacy_billing_transfer->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province">
<span<?php echo $pharmacy_billing_transfer->province->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->province->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $pharmacy_billing_transfer->postal_code->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_postal_code" class="form-group pharmacy_billing_transfer_postal_code">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($pharmacy_billing_transfer->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_postal_code" class="form-group pharmacy_billing_transfer_postal_code">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code">
<span<?php echo $pharmacy_billing_transfer->postal_code->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->postal_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no"<?php echo $pharmacy_billing_transfer->phone_no->cellAttributes() ?>>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_phone_no" class="form-group pharmacy_billing_transfer_phone_no">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer->phone_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" value="<?php echo HtmlEncode($pharmacy_billing_transfer->phone_no->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_phone_no" class="form-group pharmacy_billing_transfer_phone_no">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer->phone_no->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_transfer_list->RowCnt ?>_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no">
<span<?php echo $pharmacy_billing_transfer->phone_no->viewAttributes() ?>>
<?php echo $pharmacy_billing_transfer->phone_no->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_transfer_list->ListOptions->render("body", "right", $pharmacy_billing_transfer_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_billing_transfer->RowType == ROWTYPE_ADD || $pharmacy_billing_transfer->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_billing_transferlist.updateLists(<?php echo $pharmacy_billing_transfer_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_billing_transfer->isGridAdd())
		if (!$pharmacy_billing_transfer_list->Recordset->EOF)
			$pharmacy_billing_transfer_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_billing_transfer->isGridAdd() || $pharmacy_billing_transfer->isGridEdit()) {
		$pharmacy_billing_transfer_list->RowIndex = '$rowindex$';
		$pharmacy_billing_transfer_list->loadRowValues();

		// Set row properties
		$pharmacy_billing_transfer->resetAttributes();
		$pharmacy_billing_transfer->RowAttrs = array_merge($pharmacy_billing_transfer->RowAttrs, array('data-rowindex'=>$pharmacy_billing_transfer_list->RowIndex, 'id'=>'r0_pharmacy_billing_transfer', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_billing_transfer->RowAttrs["class"], "ew-template");
		$pharmacy_billing_transfer->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_billing_transfer_list->renderRow();

		// Render list options
		$pharmacy_billing_transfer_list->renderListOptions();
		$pharmacy_billing_transfer_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_billing_transfer->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_transfer_list->ListOptions->render("body", "left", $pharmacy_billing_transfer_list->RowIndex);
?>
	<?php if ($pharmacy_billing_transfer->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_transfer->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->PharID->Visible) { // PharID ?>
		<td data-name="PharID">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_PharID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_transfer->PharID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy">
<span id="el$rowindex$_pharmacy_billing_transfer_pharmacy" class="form-group pharmacy_billing_transfer_pharmacy">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer->pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_pharmacy" value="<?php echo HtmlEncode($pharmacy_billing_transfer->pharmacy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createdby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_transfer->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_transfer->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_transfer->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_HospID" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_billing_transfer->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
		<td data-name="transfer">
<span id="el$rowindex$_pharmacy_billing_transfer_transfer" class="form-group pharmacy_billing_transfer_transfer">
<?php $pharmacy_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer"<?php echo $pharmacy_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $pharmacy_billing_transfer->transfer->selectOptionListHtml("x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer") ?>
	</select>
</div>
<?php echo $pharmacy_billing_transfer->transfer->Lookup->getParamTag("p_x" . $pharmacy_billing_transfer_list->RowIndex . "_transfer") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_transfer" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_transfer" value="<?php echo HtmlEncode($pharmacy_billing_transfer->transfer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
		<td data-name="area">
<span id="el$rowindex$_pharmacy_billing_transfer_area" class="form-group pharmacy_billing_transfer_area">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->area->EditValue ?>"<?php echo $pharmacy_billing_transfer->area->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_area" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_area" value="<?php echo HtmlEncode($pharmacy_billing_transfer->area->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
		<td data-name="town">
<span id="el$rowindex$_pharmacy_billing_transfer_town" class="form-group pharmacy_billing_transfer_town">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->town->EditValue ?>"<?php echo $pharmacy_billing_transfer->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_town" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_town" value="<?php echo HtmlEncode($pharmacy_billing_transfer->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
		<td data-name="province">
<span id="el$rowindex$_pharmacy_billing_transfer_province" class="form-group pharmacy_billing_transfer_province">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->province->EditValue ?>"<?php echo $pharmacy_billing_transfer->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_province" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_province" value="<?php echo HtmlEncode($pharmacy_billing_transfer->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<span id="el$rowindex$_pharmacy_billing_transfer_postal_code" class="form-group pharmacy_billing_transfer_postal_code">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($pharmacy_billing_transfer->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no">
<span id="el$rowindex$_pharmacy_billing_transfer_phone_no" class="form-group pharmacy_billing_transfer_phone_no">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="x<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer->phone_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" id="o<?php echo $pharmacy_billing_transfer_list->RowIndex ?>_phone_no" value="<?php echo HtmlEncode($pharmacy_billing_transfer->phone_no->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_transfer_list->ListOptions->render("body", "right", $pharmacy_billing_transfer_list->RowIndex);
?>
<script>
fpharmacy_billing_transferlist.updateLists(<?php echo $pharmacy_billing_transfer_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_billing_transfer->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_transfer_list->KeyCount ?>">
<?php echo $pharmacy_billing_transfer_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_billing_transfer->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_transfer_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_transfer_list->KeyCount ?>">
<?php echo $pharmacy_billing_transfer_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_billing_transfer->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_billing_transfer_list->Recordset)
	$pharmacy_billing_transfer_list->Recordset->Close();
?>
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_billing_transfer->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_billing_transfer_list->Pager)) $pharmacy_billing_transfer_list->Pager = new NumericPager($pharmacy_billing_transfer_list->StartRec, $pharmacy_billing_transfer_list->DisplayRecs, $pharmacy_billing_transfer_list->TotalRecs, $pharmacy_billing_transfer_list->RecRange, $pharmacy_billing_transfer_list->AutoHidePager) ?>
<?php if ($pharmacy_billing_transfer_list->Pager->RecordCount > 0 && $pharmacy_billing_transfer_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_billing_transfer_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_billing_transfer_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_billing_transfer_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_transfer_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_transfer_list->pageUrl() ?>start=<?php echo $pharmacy_billing_transfer_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_billing_transfer_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_billing_transfer_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_billing_transfer_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_list->TotalRecs > 0 && (!$pharmacy_billing_transfer_list->AutoHidePageSizeSelector || $pharmacy_billing_transfer_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_billing_transfer_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_billing_transfer->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
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
<?php if ($pharmacy_billing_transfer_list->TotalRecs == 0 && !$pharmacy_billing_transfer->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_transfer_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_billing_transfer_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_billing_transfer->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_billing_transfer", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_transfer_list->terminate();
?>