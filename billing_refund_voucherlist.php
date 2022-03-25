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
$billing_refund_voucher_list = new billing_refund_voucher_list();

// Run the page
$billing_refund_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_refund_voucher_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$billing_refund_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbilling_refund_voucherlist = currentForm = new ew.Form("fbilling_refund_voucherlist", "list");
fbilling_refund_voucherlist.formKeyCountName = '<?php echo $billing_refund_voucher_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbilling_refund_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_refund_voucherlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_refund_voucherlist.lists["x_ModeofPayment"] = <?php echo $billing_refund_voucher_list->ModeofPayment->Lookup->toClientList() ?>;
fbilling_refund_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_refund_voucher_list->ModeofPayment->lookupOptions()) ?>;
fbilling_refund_voucherlist.lists["x_Reception"] = <?php echo $billing_refund_voucher_list->Reception->Lookup->toClientList() ?>;
fbilling_refund_voucherlist.lists["x_Reception"].options = <?php echo JsonEncode($billing_refund_voucher_list->Reception->lookupOptions()) ?>;

// Form object for search
var fbilling_refund_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_refund_voucherlistsrch");

// Validate function for search
fbilling_refund_voucherlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($billing_refund_voucher->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fbilling_refund_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_refund_voucherlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fbilling_refund_voucherlistsrch.filterList = <?php echo $billing_refund_voucher_list->getFilterList() ?>;
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
<?php if (!$billing_refund_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_refund_voucher_list->TotalRecs > 0 && $billing_refund_voucher_list->ExportOptions->visible()) { ?>
<?php $billing_refund_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_refund_voucher_list->ImportOptions->visible()) { ?>
<?php $billing_refund_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_refund_voucher_list->SearchOptions->visible()) { ?>
<?php $billing_refund_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_refund_voucher_list->FilterOptions->visible()) { ?>
<?php $billing_refund_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_refund_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_refund_voucher->isExport() && !$billing_refund_voucher->CurrentAction) { ?>
<form name="fbilling_refund_voucherlistsrch" id="fbilling_refund_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($billing_refund_voucher_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbilling_refund_voucherlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_refund_voucher">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$billing_refund_voucher_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$billing_refund_voucher->RowType = ROWTYPE_SEARCH;

// Render row
$billing_refund_voucher->resetAttributes();
$billing_refund_voucher_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($billing_refund_voucher->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $billing_refund_voucher->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($billing_refund_voucher->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_refund_voucher" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($billing_refund_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher->createddatetime->EditValue ?>"<?php echo $billing_refund_voucher->createddatetime->editAttributes() ?>>
<?php if (!$billing_refund_voucher->createddatetime->ReadOnly && !$billing_refund_voucher->createddatetime->Disabled && !isset($billing_refund_voucher->createddatetime->EditAttrs["readonly"]) && !isset($billing_refund_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbilling_refund_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="billing_refund_voucher" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($billing_refund_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $billing_refund_voucher->createddatetime->EditValue2 ?>"<?php echo $billing_refund_voucher->createddatetime->editAttributes() ?>>
<?php if (!$billing_refund_voucher->createddatetime->ReadOnly && !$billing_refund_voucher->createddatetime->Disabled && !isset($billing_refund_voucher->createddatetime->EditAttrs["readonly"]) && !isset($billing_refund_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbilling_refund_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($billing_refund_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($billing_refund_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_refund_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_refund_voucher_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_refund_voucher_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_refund_voucher_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_refund_voucher_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $billing_refund_voucher_list->showPageHeader(); ?>
<?php
$billing_refund_voucher_list->showMessage();
?>
<?php if ($billing_refund_voucher_list->TotalRecs > 0 || $billing_refund_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_refund_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_refund_voucher">
<?php if (!$billing_refund_voucher->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_refund_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_refund_voucher_list->Pager)) $billing_refund_voucher_list->Pager = new NumericPager($billing_refund_voucher_list->StartRec, $billing_refund_voucher_list->DisplayRecs, $billing_refund_voucher_list->TotalRecs, $billing_refund_voucher_list->RecRange, $billing_refund_voucher_list->AutoHidePager) ?>
<?php if ($billing_refund_voucher_list->Pager->RecordCount > 0 && $billing_refund_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_refund_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_refund_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_refund_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_refund_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_refund_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_refund_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_refund_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_refund_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_refund_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_refund_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_refund_voucher_list->TotalRecs > 0 && (!$billing_refund_voucher_list->AutoHidePageSizeSelector || $billing_refund_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_refund_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_refund_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_refund_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_refund_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_refund_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_refund_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_refund_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_refund_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_refund_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_refund_voucherlist" id="fbilling_refund_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_refund_voucher_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_refund_voucher_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
<div id="gmp_billing_refund_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($billing_refund_voucher_list->TotalRecs > 0 || $billing_refund_voucher->isGridEdit()) { ?>
<table id="tbl_billing_refund_voucherlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_refund_voucher_list->RowType = ROWTYPE_HEADER;

// Render list options
$billing_refund_voucher_list->renderListOptions();

// Render list options (header, left)
$billing_refund_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($billing_refund_voucher->id->Visible) { // id ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_refund_voucher->id->headerCellClass() ?>"><div id="elh_billing_refund_voucher_id" class="billing_refund_voucher_id"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_refund_voucher->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->id) ?>',1);"><div id="elh_billing_refund_voucher_id" class="billing_refund_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Name->Visible) { // Name ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $billing_refund_voucher->Name->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Name" class="billing_refund_voucher_Name"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $billing_refund_voucher->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Name) ?>',1);"><div id="elh_billing_refund_voucher_Name" class="billing_refund_voucher_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $billing_refund_voucher->Mobile->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $billing_refund_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Mobile) ?>',1);"><div id="elh_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->voucher_type->Visible) { // voucher_type ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $billing_refund_voucher->voucher_type->headerCellClass() ?>"><div id="elh_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $billing_refund_voucher->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->voucher_type) ?>',1);"><div id="elh_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Details->Visible) { // Details ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $billing_refund_voucher->Details->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Details" class="billing_refund_voucher_Details"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $billing_refund_voucher->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Details) ?>',1);"><div id="elh_billing_refund_voucher_Details" class="billing_refund_voucher_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_refund_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_refund_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->ModeofPayment) ?>',1);"><div id="elh_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Amount->Visible) { // Amount ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $billing_refund_voucher->Amount->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $billing_refund_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Amount) ?>',1);"><div id="elh_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->AnyDues->Visible) { // AnyDues ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $billing_refund_voucher->AnyDues->headerCellClass() ?>"><div id="elh_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $billing_refund_voucher->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->AnyDues) ?>',1);"><div id="elh_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->createdby->Visible) { // createdby ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $billing_refund_voucher->createdby->headerCellClass() ?>"><div id="elh_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $billing_refund_voucher->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->createdby) ?>',1);"><div id="elh_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $billing_refund_voucher->createddatetime->headerCellClass() ?>"><div id="elh_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $billing_refund_voucher->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->createddatetime) ?>',1);"><div id="elh_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->modifiedby->Visible) { // modifiedby ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $billing_refund_voucher->modifiedby->headerCellClass() ?>"><div id="elh_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $billing_refund_voucher->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->modifiedby) ?>',1);"><div id="elh_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_refund_voucher->modifieddatetime->headerCellClass() ?>"><div id="elh_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_refund_voucher->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->modifieddatetime) ?>',1);"><div id="elh_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->PatID->Visible) { // PatID ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $billing_refund_voucher->PatID->headerCellClass() ?>"><div id="elh_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $billing_refund_voucher->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->PatID) ?>',1);"><div id="elh_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->PatientID->Visible) { // PatientID ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $billing_refund_voucher->PatientID->headerCellClass() ?>"><div id="elh_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $billing_refund_voucher->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->PatientID) ?>',1);"><div id="elh_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $billing_refund_voucher->PatientName->headerCellClass() ?>"><div id="elh_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $billing_refund_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->PatientName) ?>',1);"><div id="elh_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->VisiteType->Visible) { // VisiteType ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->VisiteType) == "") { ?>
		<th data-name="VisiteType" class="<?php echo $billing_refund_voucher->VisiteType->headerCellClass() ?>"><div id="elh_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->VisiteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisiteType" class="<?php echo $billing_refund_voucher->VisiteType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->VisiteType) ?>',1);"><div id="elh_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->VisiteType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->VisiteType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->VisiteType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->VisitDate->Visible) { // VisitDate ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->VisitDate) == "") { ?>
		<th data-name="VisitDate" class="<?php echo $billing_refund_voucher->VisitDate->headerCellClass() ?>"><div id="elh_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->VisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisitDate" class="<?php echo $billing_refund_voucher->VisitDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->VisitDate) ?>',1);"><div id="elh_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->VisitDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->VisitDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $billing_refund_voucher->AdvanceNo->headerCellClass() ?>"><div id="elh_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $billing_refund_voucher->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->AdvanceNo) ?>',1);"><div id="elh_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->AdvanceNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->AdvanceNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->AdvanceNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Status->Visible) { // Status ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $billing_refund_voucher->Status->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Status" class="billing_refund_voucher_Status"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $billing_refund_voucher->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Status) ?>',1);"><div id="elh_billing_refund_voucher_Status" class="billing_refund_voucher_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Date->Visible) { // Date ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $billing_refund_voucher->Date->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Date" class="billing_refund_voucher_Date"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $billing_refund_voucher->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Date) ?>',1);"><div id="elh_billing_refund_voucher_Date" class="billing_refund_voucher_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->AdvanceValidityDate) == "") { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $billing_refund_voucher->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->AdvanceValidityDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $billing_refund_voucher->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->AdvanceValidityDate) ?>',1);"><div id="elh_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->AdvanceValidityDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->AdvanceValidityDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->TotalRemainingAdvance) == "") { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $billing_refund_voucher->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->TotalRemainingAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $billing_refund_voucher->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->TotalRemainingAdvance) ?>',1);"><div id="elh_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->TotalRemainingAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->TotalRemainingAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->TotalRemainingAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Remarks->Visible) { // Remarks ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $billing_refund_voucher->Remarks->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $billing_refund_voucher->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Remarks) ?>',1);"><div id="elh_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $billing_refund_voucher->SeectPaymentMode->headerCellClass() ?>"><div id="elh_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $billing_refund_voucher->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->SeectPaymentMode) ?>',1);"><div id="elh_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->SeectPaymentMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->SeectPaymentMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $billing_refund_voucher->PaidAmount->headerCellClass() ?>"><div id="elh_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $billing_refund_voucher->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->PaidAmount) ?>',1);"><div id="elh_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Currency->Visible) { // Currency ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $billing_refund_voucher->Currency->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $billing_refund_voucher->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Currency) ?>',1);"><div id="elh_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->CardNumber->Visible) { // CardNumber ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $billing_refund_voucher->CardNumber->headerCellClass() ?>"><div id="elh_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $billing_refund_voucher->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->CardNumber) ?>',1);"><div id="elh_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->BankName->Visible) { // BankName ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $billing_refund_voucher->BankName->headerCellClass() ?>"><div id="elh_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $billing_refund_voucher->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->BankName) ?>',1);"><div id="elh_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->HospID->Visible) { // HospID ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $billing_refund_voucher->HospID->headerCellClass() ?>"><div id="elh_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $billing_refund_voucher->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->HospID) ?>',1);"><div id="elh_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->Reception->Visible) { // Reception ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $billing_refund_voucher->Reception->headerCellClass() ?>"><div id="elh_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $billing_refund_voucher->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->Reception) ?>',1);"><div id="elh_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->mrnno->Visible) { // mrnno ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $billing_refund_voucher->mrnno->headerCellClass() ?>"><div id="elh_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $billing_refund_voucher->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->mrnno) ?>',1);"><div id="elh_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_refund_voucher->GetUserName->Visible) { // GetUserName ?>
	<?php if ($billing_refund_voucher->sortUrl($billing_refund_voucher->GetUserName) == "") { ?>
		<th data-name="GetUserName" class="<?php echo $billing_refund_voucher->GetUserName->headerCellClass() ?>"><div id="elh_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName"><div class="ew-table-header-caption"><?php echo $billing_refund_voucher->GetUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetUserName" class="<?php echo $billing_refund_voucher->GetUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_refund_voucher->SortUrl($billing_refund_voucher->GetUserName) ?>',1);"><div id="elh_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_refund_voucher->GetUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_refund_voucher->GetUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_refund_voucher->GetUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_refund_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_refund_voucher->ExportAll && $billing_refund_voucher->isExport()) {
	$billing_refund_voucher_list->StopRec = $billing_refund_voucher_list->TotalRecs;
} else {

	// Set the last record to display
	if ($billing_refund_voucher_list->TotalRecs > $billing_refund_voucher_list->StartRec + $billing_refund_voucher_list->DisplayRecs - 1)
		$billing_refund_voucher_list->StopRec = $billing_refund_voucher_list->StartRec + $billing_refund_voucher_list->DisplayRecs - 1;
	else
		$billing_refund_voucher_list->StopRec = $billing_refund_voucher_list->TotalRecs;
}
$billing_refund_voucher_list->RecCnt = $billing_refund_voucher_list->StartRec - 1;
if ($billing_refund_voucher_list->Recordset && !$billing_refund_voucher_list->Recordset->EOF) {
	$billing_refund_voucher_list->Recordset->moveFirst();
	$selectLimit = $billing_refund_voucher_list->UseSelectLimit;
	if (!$selectLimit && $billing_refund_voucher_list->StartRec > 1)
		$billing_refund_voucher_list->Recordset->move($billing_refund_voucher_list->StartRec - 1);
} elseif (!$billing_refund_voucher->AllowAddDeleteRow && $billing_refund_voucher_list->StopRec == 0) {
	$billing_refund_voucher_list->StopRec = $billing_refund_voucher->GridAddRowCount;
}

// Initialize aggregate
$billing_refund_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$billing_refund_voucher->resetAttributes();
$billing_refund_voucher_list->renderRow();
while ($billing_refund_voucher_list->RecCnt < $billing_refund_voucher_list->StopRec) {
	$billing_refund_voucher_list->RecCnt++;
	if ($billing_refund_voucher_list->RecCnt >= $billing_refund_voucher_list->StartRec) {
		$billing_refund_voucher_list->RowCnt++;

		// Set up key count
		$billing_refund_voucher_list->KeyCount = $billing_refund_voucher_list->RowIndex;

		// Init row class and style
		$billing_refund_voucher->resetAttributes();
		$billing_refund_voucher->CssClass = "";
		if ($billing_refund_voucher->isGridAdd()) {
		} else {
			$billing_refund_voucher_list->loadRowValues($billing_refund_voucher_list->Recordset); // Load row values
		}
		$billing_refund_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$billing_refund_voucher->RowAttrs = array_merge($billing_refund_voucher->RowAttrs, array('data-rowindex'=>$billing_refund_voucher_list->RowCnt, 'id'=>'r' . $billing_refund_voucher_list->RowCnt . '_billing_refund_voucher', 'data-rowtype'=>$billing_refund_voucher->RowType));

		// Render row
		$billing_refund_voucher_list->renderRow();

		// Render list options
		$billing_refund_voucher_list->renderListOptions();
?>
	<tr<?php echo $billing_refund_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_refund_voucher_list->ListOptions->render("body", "left", $billing_refund_voucher_list->RowCnt);
?>
	<?php if ($billing_refund_voucher->id->Visible) { // id ?>
		<td data-name="id"<?php echo $billing_refund_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_id" class="billing_refund_voucher_id">
<span<?php echo $billing_refund_voucher->id->viewAttributes() ?>>
<?php echo $billing_refund_voucher->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $billing_refund_voucher->Name->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Name" class="billing_refund_voucher_Name">
<span<?php echo $billing_refund_voucher->Name->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $billing_refund_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile">
<span<?php echo $billing_refund_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $billing_refund_voucher->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type">
<span<?php echo $billing_refund_voucher->voucher_type->viewAttributes() ?>>
<?php echo $billing_refund_voucher->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $billing_refund_voucher->Details->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Details" class="billing_refund_voucher_Details">
<span<?php echo $billing_refund_voucher->Details->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $billing_refund_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment">
<span<?php echo $billing_refund_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_refund_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $billing_refund_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount">
<span<?php echo $billing_refund_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $billing_refund_voucher->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues">
<span<?php echo $billing_refund_voucher->AnyDues->viewAttributes() ?>>
<?php echo $billing_refund_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $billing_refund_voucher->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby">
<span<?php echo $billing_refund_voucher->createdby->viewAttributes() ?>>
<?php echo $billing_refund_voucher->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $billing_refund_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime">
<span<?php echo $billing_refund_voucher->createddatetime->viewAttributes() ?>>
<?php echo $billing_refund_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $billing_refund_voucher->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby">
<span<?php echo $billing_refund_voucher->modifiedby->viewAttributes() ?>>
<?php echo $billing_refund_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $billing_refund_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime">
<span<?php echo $billing_refund_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $billing_refund_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $billing_refund_voucher->PatID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID">
<span<?php echo $billing_refund_voucher->PatID->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $billing_refund_voucher->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID">
<span<?php echo $billing_refund_voucher->PatientID->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $billing_refund_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName">
<span<?php echo $billing_refund_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType"<?php echo $billing_refund_voucher->VisiteType->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType">
<span<?php echo $billing_refund_voucher->VisiteType->viewAttributes() ?>>
<?php echo $billing_refund_voucher->VisiteType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate"<?php echo $billing_refund_voucher->VisitDate->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate">
<span<?php echo $billing_refund_voucher->VisitDate->viewAttributes() ?>>
<?php echo $billing_refund_voucher->VisitDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo"<?php echo $billing_refund_voucher->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo">
<span<?php echo $billing_refund_voucher->AdvanceNo->viewAttributes() ?>>
<?php echo $billing_refund_voucher->AdvanceNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $billing_refund_voucher->Status->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Status" class="billing_refund_voucher_Status">
<span<?php echo $billing_refund_voucher->Status->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $billing_refund_voucher->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Date" class="billing_refund_voucher_Date">
<span<?php echo $billing_refund_voucher->Date->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate"<?php echo $billing_refund_voucher->AdvanceValidityDate->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate">
<span<?php echo $billing_refund_voucher->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $billing_refund_voucher->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance"<?php echo $billing_refund_voucher->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance">
<span<?php echo $billing_refund_voucher->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $billing_refund_voucher->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $billing_refund_voucher->Remarks->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks">
<span<?php echo $billing_refund_voucher->Remarks->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode"<?php echo $billing_refund_voucher->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode">
<span<?php echo $billing_refund_voucher->SeectPaymentMode->viewAttributes() ?>>
<?php echo $billing_refund_voucher->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $billing_refund_voucher->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount">
<span<?php echo $billing_refund_voucher->PaidAmount->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $billing_refund_voucher->Currency->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency">
<span<?php echo $billing_refund_voucher->Currency->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $billing_refund_voucher->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber">
<span<?php echo $billing_refund_voucher->CardNumber->viewAttributes() ?>>
<?php echo $billing_refund_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $billing_refund_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName">
<span<?php echo $billing_refund_voucher->BankName->viewAttributes() ?>>
<?php echo $billing_refund_voucher->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $billing_refund_voucher->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID">
<span<?php echo $billing_refund_voucher->HospID->viewAttributes() ?>>
<?php echo $billing_refund_voucher->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $billing_refund_voucher->Reception->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception">
<span<?php echo $billing_refund_voucher->Reception->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $billing_refund_voucher->mrnno->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno">
<span<?php echo $billing_refund_voucher->mrnno->viewAttributes() ?>>
<?php echo $billing_refund_voucher->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_refund_voucher->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName"<?php echo $billing_refund_voucher->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_list->RowCnt ?>_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName">
<span<?php echo $billing_refund_voucher->GetUserName->viewAttributes() ?>>
<?php echo $billing_refund_voucher->GetUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_refund_voucher_list->ListOptions->render("body", "right", $billing_refund_voucher_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$billing_refund_voucher->isGridAdd())
		$billing_refund_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$billing_refund_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_refund_voucher_list->Recordset)
	$billing_refund_voucher_list->Recordset->Close();
?>
<?php if (!$billing_refund_voucher->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_refund_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_refund_voucher_list->Pager)) $billing_refund_voucher_list->Pager = new NumericPager($billing_refund_voucher_list->StartRec, $billing_refund_voucher_list->DisplayRecs, $billing_refund_voucher_list->TotalRecs, $billing_refund_voucher_list->RecRange, $billing_refund_voucher_list->AutoHidePager) ?>
<?php if ($billing_refund_voucher_list->Pager->RecordCount > 0 && $billing_refund_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_refund_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_refund_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_refund_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_refund_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_refund_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_refund_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_refund_voucher_list->pageUrl() ?>start=<?php echo $billing_refund_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_refund_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_refund_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_refund_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_refund_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_refund_voucher_list->TotalRecs > 0 && (!$billing_refund_voucher_list->AutoHidePageSizeSelector || $billing_refund_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_refund_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_refund_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_refund_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_refund_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_refund_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_refund_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_refund_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_refund_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_refund_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_refund_voucher_list->TotalRecs == 0 && !$billing_refund_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_refund_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_refund_voucher_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$billing_refund_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$billing_refund_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_billing_refund_voucher", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$billing_refund_voucher_list->terminate();
?>