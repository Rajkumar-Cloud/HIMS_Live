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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_purchase_request_itemslist = currentForm = new ew.Form("fpharmacy_purchase_request_itemslist", "list");
fpharmacy_purchase_request_itemslist.formKeyCountName = '<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>';

// Validate form
fpharmacy_purchase_request_itemslist.validate = function() {
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
		<?php if ($pharmacy_purchase_request_items_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->id->caption(), $pharmacy_purchase_request_items->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->PRC->caption(), $pharmacy_purchase_request_items->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->PrName->caption(), $pharmacy_purchase_request_items->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->Quantity->caption(), $pharmacy_purchase_request_items->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items->Quantity->errorMessage()) ?>");
		<?php if ($pharmacy_purchase_request_items_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->HospID->caption(), $pharmacy_purchase_request_items->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->createdby->caption(), $pharmacy_purchase_request_items->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->createddatetime->caption(), $pharmacy_purchase_request_items->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->modifiedby->caption(), $pharmacy_purchase_request_items->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->modifieddatetime->caption(), $pharmacy_purchase_request_items->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->BRCODE->caption(), $pharmacy_purchase_request_items->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_list->prid->Required) { ?>
			elm = this.getElements("x" + infix + "_prid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->prid->caption(), $pharmacy_purchase_request_items->prid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_prid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items->prid->errorMessage()) ?>");

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
fpharmacy_purchase_request_itemslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "prid", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_purchase_request_itemslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_request_itemslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchase_request_itemslist.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_list->PrName->Lookup->toClientList() ?>;
fpharmacy_purchase_request_itemslist.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_list->PrName->lookupOptions()) ?>;
fpharmacy_purchase_request_itemslist.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fpharmacy_purchase_request_itemslistsrch = currentSearchForm = new ew.Form("fpharmacy_purchase_request_itemslistsrch");

// Filters
fpharmacy_purchase_request_itemslistsrch.filterList = <?php echo $pharmacy_purchase_request_items_list->getFilterList() ?>;
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
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_purchase_request_items_list->TotalRecs > 0 && $pharmacy_purchase_request_items_list->ExportOptions->visible()) { ?>
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
<?php if (!$pharmacy_purchase_request_items->isExport() || EXPORT_MASTER_RECORD && $pharmacy_purchase_request_items->isExport("print")) { ?>
<?php
if ($pharmacy_purchase_request_items_list->DbMasterFilter <> "" && $pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request") {
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
<?php if (!$pharmacy_purchase_request_items->isExport() && !$pharmacy_purchase_request_items->CurrentAction) { ?>
<form name="fpharmacy_purchase_request_itemslistsrch" id="fpharmacy_purchase_request_itemslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_purchase_request_items_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_purchase_request_itemslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_purchase_request_items_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_items_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_purchase_request_items_list->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_list->showMessage();
?>
<?php if ($pharmacy_purchase_request_items_list->TotalRecs > 0 || $pharmacy_purchase_request_items->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchase_request_items_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request_items">
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_purchase_request_items->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_purchase_request_items_list->Pager)) $pharmacy_purchase_request_items_list->Pager = new NumericPager($pharmacy_purchase_request_items_list->StartRec, $pharmacy_purchase_request_items_list->DisplayRecs, $pharmacy_purchase_request_items_list->TotalRecs, $pharmacy_purchase_request_items_list->RecRange, $pharmacy_purchase_request_items_list->AutoHidePager) ?>
<?php if ($pharmacy_purchase_request_items_list->Pager->RecordCount > 0 && $pharmacy_purchase_request_items_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_purchase_request_items_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_purchase_request_items_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_purchase_request_items_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->TotalRecs > 0 && (!$pharmacy_purchase_request_items_list->AutoHidePageSizeSelector || $pharmacy_purchase_request_items_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_purchase_request_items->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_items_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_purchase_request_itemslist" id="fpharmacy_purchase_request_itemslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchase_request_items_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_items_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<?php if ($pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request" && $pharmacy_purchase_request_items->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_purchase_request_items->prid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_pharmacy_purchase_request_items" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_purchase_request_items_list->TotalRecs > 0 || $pharmacy_purchase_request_items->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchase_request_itemslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchase_request_items_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchase_request_items_list->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_items_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_items->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_items->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->id) ?>',1);"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchase_request_items->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchase_request_items->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->PRC) ?>',1);"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_purchase_request_items->PrName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_purchase_request_items->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->PrName) ?>',1);"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $pharmacy_purchase_request_items->Quantity->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $pharmacy_purchase_request_items->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->Quantity) ?>',1);"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_items->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_items->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->HospID) ?>',1);"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_items->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_items->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->createdby) ?>',1);"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_items->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_items->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->createddatetime) ?>',1);"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_items->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_items->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->modifiedby) ?>',1);"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_items->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_items->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->modifieddatetime) ?>',1);"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_items->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_items->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->BRCODE) ?>',1);"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
	<?php if ($pharmacy_purchase_request_items->sortUrl($pharmacy_purchase_request_items->prid) == "") { ?>
		<th data-name="prid" class="<?php echo $pharmacy_purchase_request_items->prid->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->prid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prid" class="<?php echo $pharmacy_purchase_request_items->prid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request_items->SortUrl($pharmacy_purchase_request_items->prid) ?>',1);"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items->prid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items->prid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items->prid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
if ($pharmacy_purchase_request_items->ExportAll && $pharmacy_purchase_request_items->isExport()) {
	$pharmacy_purchase_request_items_list->StopRec = $pharmacy_purchase_request_items_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_purchase_request_items_list->TotalRecs > $pharmacy_purchase_request_items_list->StartRec + $pharmacy_purchase_request_items_list->DisplayRecs - 1)
		$pharmacy_purchase_request_items_list->StopRec = $pharmacy_purchase_request_items_list->StartRec + $pharmacy_purchase_request_items_list->DisplayRecs - 1;
	else
		$pharmacy_purchase_request_items_list->StopRec = $pharmacy_purchase_request_items_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_purchase_request_items_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_purchase_request_items_list->FormKeyCountName) && ($pharmacy_purchase_request_items->isGridAdd() || $pharmacy_purchase_request_items->isGridEdit() || $pharmacy_purchase_request_items->isConfirm())) {
		$pharmacy_purchase_request_items_list->KeyCount = $CurrentForm->getValue($pharmacy_purchase_request_items_list->FormKeyCountName);
		$pharmacy_purchase_request_items_list->StopRec = $pharmacy_purchase_request_items_list->StartRec + $pharmacy_purchase_request_items_list->KeyCount - 1;
	}
}
$pharmacy_purchase_request_items_list->RecCnt = $pharmacy_purchase_request_items_list->StartRec - 1;
if ($pharmacy_purchase_request_items_list->Recordset && !$pharmacy_purchase_request_items_list->Recordset->EOF) {
	$pharmacy_purchase_request_items_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchase_request_items_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchase_request_items_list->StartRec > 1)
		$pharmacy_purchase_request_items_list->Recordset->move($pharmacy_purchase_request_items_list->StartRec - 1);
} elseif (!$pharmacy_purchase_request_items->AllowAddDeleteRow && $pharmacy_purchase_request_items_list->StopRec == 0) {
	$pharmacy_purchase_request_items_list->StopRec = $pharmacy_purchase_request_items->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchase_request_items->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchase_request_items->resetAttributes();
$pharmacy_purchase_request_items_list->renderRow();
if ($pharmacy_purchase_request_items->isGridAdd())
	$pharmacy_purchase_request_items_list->RowIndex = 0;
if ($pharmacy_purchase_request_items->isGridEdit())
	$pharmacy_purchase_request_items_list->RowIndex = 0;
while ($pharmacy_purchase_request_items_list->RecCnt < $pharmacy_purchase_request_items_list->StopRec) {
	$pharmacy_purchase_request_items_list->RecCnt++;
	if ($pharmacy_purchase_request_items_list->RecCnt >= $pharmacy_purchase_request_items_list->StartRec) {
		$pharmacy_purchase_request_items_list->RowCnt++;
		if ($pharmacy_purchase_request_items->isGridAdd() || $pharmacy_purchase_request_items->isGridEdit() || $pharmacy_purchase_request_items->isConfirm()) {
			$pharmacy_purchase_request_items_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_purchase_request_items_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_purchase_request_items_list->FormActionName) && $pharmacy_purchase_request_items_list->EventCancelled)
				$pharmacy_purchase_request_items_list->RowAction = strval($CurrentForm->getValue($pharmacy_purchase_request_items_list->FormActionName));
			elseif ($pharmacy_purchase_request_items->isGridAdd())
				$pharmacy_purchase_request_items_list->RowAction = "insert";
			else
				$pharmacy_purchase_request_items_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_purchase_request_items_list->KeyCount = $pharmacy_purchase_request_items_list->RowIndex;

		// Init row class and style
		$pharmacy_purchase_request_items->resetAttributes();
		$pharmacy_purchase_request_items->CssClass = "";
		if ($pharmacy_purchase_request_items->isGridAdd()) {
			$pharmacy_purchase_request_items_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_purchase_request_items_list->loadRowValues($pharmacy_purchase_request_items_list->Recordset); // Load row values
		}
		$pharmacy_purchase_request_items->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_purchase_request_items->isGridAdd()) // Grid add
			$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_purchase_request_items->isGridAdd() && $pharmacy_purchase_request_items->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_purchase_request_items_list->restoreCurrentRowFormValues($pharmacy_purchase_request_items_list->RowIndex); // Restore form values
		if ($pharmacy_purchase_request_items->isGridEdit()) { // Grid edit
			if ($pharmacy_purchase_request_items->EventCancelled)
				$pharmacy_purchase_request_items_list->restoreCurrentRowFormValues($pharmacy_purchase_request_items_list->RowIndex); // Restore form values
			if ($pharmacy_purchase_request_items_list->RowAction == "insert")
				$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_purchase_request_items->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_purchase_request_items->isGridEdit() && ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT || $pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) && $pharmacy_purchase_request_items->EventCancelled) // Update failed
			$pharmacy_purchase_request_items_list->restoreCurrentRowFormValues($pharmacy_purchase_request_items_list->RowIndex); // Restore form values
		if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_purchase_request_items_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_purchase_request_items->RowAttrs = array_merge($pharmacy_purchase_request_items->RowAttrs, array('data-rowindex'=>$pharmacy_purchase_request_items_list->RowCnt, 'id'=>'r' . $pharmacy_purchase_request_items_list->RowCnt . '_pharmacy_purchase_request_items', 'data-rowtype'=>$pharmacy_purchase_request_items->RowType));

		// Render row
		$pharmacy_purchase_request_items_list->renderRow();

		// Render list options
		$pharmacy_purchase_request_items_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_purchase_request_items_list->RowAction <> "delete" && $pharmacy_purchase_request_items_list->RowAction <> "insertdelete" && !($pharmacy_purchase_request_items_list->RowAction == "insert" && $pharmacy_purchase_request_items->isConfirm() && $pharmacy_purchase_request_items_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "left", $pharmacy_purchase_request_items_list->RowCnt);
?>
	<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_purchase_request_items->id->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_purchase_request_items->PRC->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $pharmacy_purchase_request_items->PrName->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_purchase_request_items_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchase_request_itemslist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_purchase_request_items->PrName->Lookup->getParamTag("p_x" . $pharmacy_purchase_request_items_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_purchase_request_items_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchase_request_itemslist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_purchase_request_items->PrName->Lookup->getParamTag("p_x" . $pharmacy_purchase_request_items_list->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items->PrName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $pharmacy_purchase_request_items->Quantity->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items->Quantity->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_purchase_request_items->HospID->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_purchase_request_items->createdby->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_purchase_request_items->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_purchase_request_items->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_purchase_request_items->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_purchase_request_items->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
		<td data-name="prid"<?php echo $pharmacy_purchase_request_items->prid->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_purchase_request_items->prid->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->prid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items->prid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_purchase_request_items->prid->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->prid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_list->RowCnt ?>_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->prid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "right", $pharmacy_purchase_request_items_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD || $pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_purchase_request_itemslist.updateLists(<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_purchase_request_items->isGridAdd())
		if (!$pharmacy_purchase_request_items_list->Recordset->EOF)
			$pharmacy_purchase_request_items_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_purchase_request_items->isGridAdd() || $pharmacy_purchase_request_items->isGridEdit()) {
		$pharmacy_purchase_request_items_list->RowIndex = '$rowindex$';
		$pharmacy_purchase_request_items_list->loadRowValues();

		// Set row properties
		$pharmacy_purchase_request_items->resetAttributes();
		$pharmacy_purchase_request_items->RowAttrs = array_merge($pharmacy_purchase_request_items->RowAttrs, array('data-rowindex'=>$pharmacy_purchase_request_items_list->RowIndex, 'id'=>'r0_pharmacy_purchase_request_items', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_purchase_request_items->RowAttrs["class"], "ew-template");
		$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_purchase_request_items_list->renderRow();

		// Render list options
		$pharmacy_purchase_request_items_list->renderListOptions();
		$pharmacy_purchase_request_items_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "left", $pharmacy_purchase_request_items_list->RowIndex);
?>
	<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_purchase_request_items_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchase_request_itemslist.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_purchase_request_items->PrName->Lookup->getParamTag("p_x" . $pharmacy_purchase_request_items_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
		<td data-name="prid">
<?php if ($pharmacy_purchase_request_items->prid->getSessionValue() <> "") { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->prid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items->prid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_list->ListOptions->render("body", "right", $pharmacy_purchase_request_items_list->RowIndex);
?>
<script>
fpharmacy_purchase_request_itemslist.updateLists(<?php echo $pharmacy_purchase_request_items_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_purchase_request_items->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" id="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" value="<?php echo $pharmacy_purchase_request_items_list->KeyCount ?>">
<?php echo $pharmacy_purchase_request_items_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" id="<?php echo $pharmacy_purchase_request_items_list->FormKeyCountName ?>" value="<?php echo $pharmacy_purchase_request_items_list->KeyCount ?>">
<?php echo $pharmacy_purchase_request_items_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_purchase_request_items->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchase_request_items_list->Recordset)
	$pharmacy_purchase_request_items_list->Recordset->Close();
?>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_purchase_request_items->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_purchase_request_items_list->Pager)) $pharmacy_purchase_request_items_list->Pager = new NumericPager($pharmacy_purchase_request_items_list->StartRec, $pharmacy_purchase_request_items_list->DisplayRecs, $pharmacy_purchase_request_items_list->TotalRecs, $pharmacy_purchase_request_items_list->RecRange, $pharmacy_purchase_request_items_list->AutoHidePager) ?>
<?php if ($pharmacy_purchase_request_items_list->Pager->RecordCount > 0 && $pharmacy_purchase_request_items_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_purchase_request_items_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_purchase_request_items_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_purchase_request_items_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_items_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_items_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_purchase_request_items_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_list->TotalRecs > 0 && (!$pharmacy_purchase_request_items_list->AutoHidePageSizeSelector || $pharmacy_purchase_request_items_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_purchase_request_items_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_purchase_request_items->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
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
<?php if ($pharmacy_purchase_request_items_list->TotalRecs == 0 && !$pharmacy_purchase_request_items->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_items_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_purchase_request_items_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_purchase_request_items", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_items_list->terminate();
?>