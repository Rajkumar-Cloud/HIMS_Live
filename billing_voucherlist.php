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
$billing_voucher_list = new billing_voucher_list();

// Run the page
$billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$billing_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbilling_voucherlist = currentForm = new ew.Form("fbilling_voucherlist", "list");
fbilling_voucherlist.formKeyCountName = '<?php echo $billing_voucher_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbilling_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_voucherlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_voucherlist.lists["x_Doctor"] = <?php echo $billing_voucher_list->Doctor->Lookup->toClientList() ?>;
fbilling_voucherlist.lists["x_Doctor"].options = <?php echo JsonEncode($billing_voucher_list->Doctor->lookupOptions()) ?>;
fbilling_voucherlist.autoSuggests["x_Doctor"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fbilling_voucherlist.lists["x_ModeofPayment"] = <?php echo $billing_voucher_list->ModeofPayment->Lookup->toClientList() ?>;
fbilling_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_voucher_list->ModeofPayment->lookupOptions()) ?>;

// Form object for search
var fbilling_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_voucherlistsrch");

// Validate function for search
fbilling_voucherlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($billing_voucher->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fbilling_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_voucherlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fbilling_voucherlistsrch.filterList = <?php echo $billing_voucher_list->getFilterList() ?>;
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
<?php if (!$billing_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_voucher_list->TotalRecs > 0 && $billing_voucher_list->ExportOptions->visible()) { ?>
<?php $billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_voucher_list->ImportOptions->visible()) { ?>
<?php $billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_voucher_list->SearchOptions->visible()) { ?>
<?php $billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_voucher_list->FilterOptions->visible()) { ?>
<?php $billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_voucher->isExport() && !$billing_voucher->CurrentAction) { ?>
<form name="fbilling_voucherlistsrch" id="fbilling_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($billing_voucher_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbilling_voucherlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_voucher">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$billing_voucher_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$billing_voucher->RowType = ROWTYPE_SEARCH;

// Render row
$billing_voucher->resetAttributes();
$billing_voucher_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $billing_voucher->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->PatientName->EditValue ?>"<?php echo $billing_voucher->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $billing_voucher->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->Mobile->EditValue ?>"<?php echo $billing_voucher->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
	<div id="xsc_createdby" class="ew-cell form-group">
		<label for="x_createdby" class="ew-search-caption ew-label"><?php echo $billing_voucher->createdby->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($billing_voucher->createdby->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->createdby->EditValue ?>"<?php echo $billing_voucher->createdby->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $billing_voucher->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_voucher" data-field="x_createddatetime" data-format="11" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->createddatetime->EditValue ?>"<?php echo $billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$billing_voucher->createddatetime->ReadOnly && !$billing_voucher->createddatetime->Disabled && !isset($billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbilling_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="billing_voucher" data-field="x_createddatetime" data-format="11" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $billing_voucher->createddatetime->EditValue2 ?>"<?php echo $billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$billing_voucher->createddatetime->ReadOnly && !$billing_voucher->createddatetime->Disabled && !isset($billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbilling_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_voucher_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $billing_voucher_list->showPageHeader(); ?>
<?php
$billing_voucher_list->showMessage();
?>
<?php if ($billing_voucher_list->TotalRecs > 0 || $billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_voucher">
<?php if (!$billing_voucher->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_voucher_list->Pager)) $billing_voucher_list->Pager = new NumericPager($billing_voucher_list->StartRec, $billing_voucher_list->DisplayRecs, $billing_voucher_list->TotalRecs, $billing_voucher_list->RecRange, $billing_voucher_list->AutoHidePager) ?>
<?php if ($billing_voucher_list->Pager->RecordCount > 0 && $billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_voucher_list->TotalRecs > 0 && (!$billing_voucher_list->AutoHidePageSizeSelector || $billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_voucherlist" id="fbilling_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_voucher_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_voucher_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<div id="gmp_billing_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($billing_voucher_list->TotalRecs > 0 || $billing_voucher->isGridEdit()) { ?>
<table id="tbl_billing_voucherlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_voucher_list->RowType = ROWTYPE_HEADER;

// Render list options
$billing_voucher_list->renderListOptions();

// Render list options (header, left)
$billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($billing_voucher->id->Visible) { // id ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_voucher->id->headerCellClass() ?>"><div id="elh_billing_voucher_id" class="billing_voucher_id"><div class="ew-table-header-caption"><?php echo $billing_voucher->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_voucher->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->id) ?>',1);"><div id="elh_billing_voucher_id" class="billing_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $billing_voucher->PatId->headerCellClass() ?>"><div id="elh_billing_voucher_PatId" class="billing_voucher_PatId"><div class="ew-table-header-caption"><?php echo $billing_voucher->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $billing_voucher->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->PatId) ?>',1);"><div id="elh_billing_voucher_PatId" class="billing_voucher_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $billing_voucher->BillNumber->headerCellClass() ?>"><div id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $billing_voucher->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $billing_voucher->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->BillNumber) ?>',1);"><div id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $billing_voucher->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->PatientId) ?>',1);"><div id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $billing_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->PatientName) ?>',1);"><div id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><div class="ew-table-header-caption"><?php echo $billing_voucher->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Gender) ?>',1);"><div id="elh_billing_voucher_Gender" class="billing_voucher_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $billing_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Mobile) ?>',1);"><div id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $billing_voucher->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Doctor) ?>',1);"><div id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $billing_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->ModeofPayment) ?>',1);"><div id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $billing_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Amount) ?>',1);"><div id="elh_billing_voucher_Amount" class="billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $billing_voucher->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->AnyDues) ?>',1);"><div id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><div class="ew-table-header-caption"><?php echo $billing_voucher->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->createdby) ?>',1);"><div id="elh_billing_voucher_createdby" class="billing_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $billing_voucher->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->createddatetime) ?>',1);"><div id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $billing_voucher->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->modifiedby) ?>',1);"><div id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $billing_voucher->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->modifieddatetime) ?>',1);"><div id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><div class="ew-table-header-caption"><?php echo $billing_voucher->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->HospID) ?>',1);"><div id="elh_billing_voucher_HospID" class="billing_voucher_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><div class="ew-table-header-caption"><?php echo $billing_voucher->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->RIDNO) ?>',1);"><div id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><div class="ew-table-header-caption"><?php echo $billing_voucher->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->TidNo) ?>',1);"><div id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CId->Visible) { // CId ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $billing_voucher->CId->headerCellClass() ?>"><div id="elh_billing_voucher_CId" class="billing_voucher_CId"><div class="ew-table-header-caption"><?php echo $billing_voucher->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $billing_voucher->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CId) ?>',1);"><div id="elh_billing_voucher_CId" class="billing_voucher_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $billing_voucher->PartnerName->headerCellClass() ?>"><div id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName"><div class="ew-table-header-caption"><?php echo $billing_voucher->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $billing_voucher->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->PartnerName) ?>',1);"><div id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $billing_voucher->PayerType->headerCellClass() ?>"><div id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType"><div class="ew-table-header-caption"><?php echo $billing_voucher->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $billing_voucher->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->PayerType) ?>',1);"><div id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PayerType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PayerType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $billing_voucher->Dob->headerCellClass() ?>"><div id="elh_billing_voucher_Dob" class="billing_voucher_Dob"><div class="ew-table-header-caption"><?php echo $billing_voucher->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $billing_voucher->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Dob) ?>',1);"><div id="elh_billing_voucher_Dob" class="billing_voucher_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $billing_voucher->DrDepartment->headerCellClass() ?>"><div id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment"><div class="ew-table-header-caption"><?php echo $billing_voucher->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $billing_voucher->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->DrDepartment) ?>',1);"><div id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $billing_voucher->RefferedBy->headerCellClass() ?>"><div id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy"><div class="ew-table-header-caption"><?php echo $billing_voucher->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $billing_voucher->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->RefferedBy) ?>',1);"><div id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $billing_voucher->CardNumber->headerCellClass() ?>"><div id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $billing_voucher->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $billing_voucher->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CardNumber) ?>',1);"><div id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $billing_voucher->BankName->headerCellClass() ?>"><div id="elh_billing_voucher_BankName" class="billing_voucher_BankName"><div class="ew-table-header-caption"><?php echo $billing_voucher->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $billing_voucher->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->BankName) ?>',1);"><div id="elh_billing_voucher_BankName" class="billing_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->UserName->Visible) { // UserName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $billing_voucher->UserName->headerCellClass() ?>"><div id="elh_billing_voucher_UserName" class="billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $billing_voucher->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $billing_voucher->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->UserName) ?>',1);"><div id="elh_billing_voucher_UserName" class="billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->AdjustmentAdvance) == "") { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $billing_voucher->AdjustmentAdvance->headerCellClass() ?>"><div id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance"><div class="ew-table-header-caption"><?php echo $billing_voucher->AdjustmentAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $billing_voucher->AdjustmentAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->AdjustmentAdvance) ?>',1);"><div id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->AdjustmentAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->AdjustmentAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->AdjustmentAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->billing_vouchercol) == "") { ?>
		<th data-name="billing_vouchercol" class="<?php echo $billing_voucher->billing_vouchercol->headerCellClass() ?>"><div id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol"><div class="ew-table-header-caption"><?php echo $billing_voucher->billing_vouchercol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billing_vouchercol" class="<?php echo $billing_voucher->billing_vouchercol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->billing_vouchercol) ?>',1);"><div id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->billing_vouchercol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->billing_vouchercol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->billing_vouchercol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $billing_voucher->BillType->headerCellClass() ?>"><div id="elh_billing_voucher_BillType" class="billing_voucher_BillType"><div class="ew-table-header-caption"><?php echo $billing_voucher->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $billing_voucher->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->BillType) ?>',1);"><div id="elh_billing_voucher_BillType" class="billing_voucher_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->ProcedureName) == "") { ?>
		<th data-name="ProcedureName" class="<?php echo $billing_voucher->ProcedureName->headerCellClass() ?>"><div id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName"><div class="ew-table-header-caption"><?php echo $billing_voucher->ProcedureName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureName" class="<?php echo $billing_voucher->ProcedureName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->ProcedureName) ?>',1);"><div id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->ProcedureName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->ProcedureName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->ProcedureName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->ProcedureAmount) == "") { ?>
		<th data-name="ProcedureAmount" class="<?php echo $billing_voucher->ProcedureAmount->headerCellClass() ?>"><div id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount"><div class="ew-table-header-caption"><?php echo $billing_voucher->ProcedureAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureAmount" class="<?php echo $billing_voucher->ProcedureAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->ProcedureAmount) ?>',1);"><div id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->ProcedureAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->ProcedureAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->ProcedureAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->IncludePackage) == "") { ?>
		<th data-name="IncludePackage" class="<?php echo $billing_voucher->IncludePackage->headerCellClass() ?>"><div id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage"><div class="ew-table-header-caption"><?php echo $billing_voucher->IncludePackage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IncludePackage" class="<?php echo $billing_voucher->IncludePackage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->IncludePackage) ?>',1);"><div id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->IncludePackage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->IncludePackage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->IncludePackage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CancelBill) == "") { ?>
		<th data-name="CancelBill" class="<?php echo $billing_voucher->CancelBill->headerCellClass() ?>"><div id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill"><div class="ew-table-header-caption"><?php echo $billing_voucher->CancelBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBill" class="<?php echo $billing_voucher->CancelBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CancelBill) ?>',1);"><div id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CancelBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CancelBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CancelBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CancelReason) == "") { ?>
		<th data-name="CancelReason" class="<?php echo $billing_voucher->CancelReason->headerCellClass() ?>"><div id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason"><div class="ew-table-header-caption"><?php echo $billing_voucher->CancelReason->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelReason" class="<?php echo $billing_voucher->CancelReason->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CancelReason) ?>',1);"><div id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CancelReason->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CancelReason->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CancelReason->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CancelModeOfPayment) == "") { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $billing_voucher->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment"><div class="ew-table-header-caption"><?php echo $billing_voucher->CancelModeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $billing_voucher->CancelModeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CancelModeOfPayment) ?>',1);"><div id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CancelModeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CancelModeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CancelModeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CancelAmount) == "") { ?>
		<th data-name="CancelAmount" class="<?php echo $billing_voucher->CancelAmount->headerCellClass() ?>"><div id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount"><div class="ew-table-header-caption"><?php echo $billing_voucher->CancelAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAmount" class="<?php echo $billing_voucher->CancelAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CancelAmount) ?>',1);"><div id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CancelAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CancelAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CancelAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CancelBankName) == "") { ?>
		<th data-name="CancelBankName" class="<?php echo $billing_voucher->CancelBankName->headerCellClass() ?>"><div id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName"><div class="ew-table-header-caption"><?php echo $billing_voucher->CancelBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBankName" class="<?php echo $billing_voucher->CancelBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CancelBankName) ?>',1);"><div id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CancelBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CancelBankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CancelBankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CancelTransactionNumber) == "") { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $billing_voucher->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber"><div class="ew-table-header-caption"><?php echo $billing_voucher->CancelTransactionNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $billing_voucher->CancelTransactionNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CancelTransactionNumber) ?>',1);"><div id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CancelTransactionNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CancelTransactionNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CancelTransactionNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $billing_voucher->LabTest->headerCellClass() ?>"><div id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest"><div class="ew-table-header-caption"><?php echo $billing_voucher->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $billing_voucher->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->LabTest) ?>',1);"><div id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->LabTest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->LabTest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->sid->Visible) { // sid ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $billing_voucher->sid->headerCellClass() ?>"><div id="elh_billing_voucher_sid" class="billing_voucher_sid"><div class="ew-table-header-caption"><?php echo $billing_voucher->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $billing_voucher->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->sid) ?>',1);"><div id="elh_billing_voucher_sid" class="billing_voucher_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $billing_voucher->SidNo->headerCellClass() ?>"><div id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo"><div class="ew-table-header-caption"><?php echo $billing_voucher->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $billing_voucher->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->SidNo) ?>',1);"><div id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->SidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->SidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->createdDatettime) == "") { ?>
		<th data-name="createdDatettime" class="<?php echo $billing_voucher->createdDatettime->headerCellClass() ?>"><div id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime"><div class="ew-table-header-caption"><?php echo $billing_voucher->createdDatettime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatettime" class="<?php echo $billing_voucher->createdDatettime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->createdDatettime) ?>',1);"><div id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->createdDatettime->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->createdDatettime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->createdDatettime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $billing_voucher->LabTestReleased->headerCellClass() ?>"><div id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased"><div class="ew-table-header-caption"><?php echo $billing_voucher->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $billing_voucher->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->LabTestReleased) ?>',1);"><div id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->LabTestReleased->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->LabTestReleased->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->GoogleReviewID) == "") { ?>
		<th data-name="GoogleReviewID" class="<?php echo $billing_voucher->GoogleReviewID->headerCellClass() ?>"><div id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID"><div class="ew-table-header-caption"><?php echo $billing_voucher->GoogleReviewID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GoogleReviewID" class="<?php echo $billing_voucher->GoogleReviewID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->GoogleReviewID) ?>',1);"><div id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->GoogleReviewID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->GoogleReviewID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->GoogleReviewID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->CardType->Visible) { // CardType ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->CardType) == "") { ?>
		<th data-name="CardType" class="<?php echo $billing_voucher->CardType->headerCellClass() ?>"><div id="elh_billing_voucher_CardType" class="billing_voucher_CardType"><div class="ew-table-header-caption"><?php echo $billing_voucher->CardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardType" class="<?php echo $billing_voucher->CardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->CardType) ?>',1);"><div id="elh_billing_voucher_CardType" class="billing_voucher_CardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->CardType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->CardType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->CardType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->PharmacyBill) == "") { ?>
		<th data-name="PharmacyBill" class="<?php echo $billing_voucher->PharmacyBill->headerCellClass() ?>"><div id="elh_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill"><div class="ew-table-header-caption"><?php echo $billing_voucher->PharmacyBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharmacyBill" class="<?php echo $billing_voucher->PharmacyBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->PharmacyBill) ?>',1);"><div id="elh_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->PharmacyBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->PharmacyBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->PharmacyBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->DiscountAmount) == "") { ?>
		<th data-name="DiscountAmount" class="<?php echo $billing_voucher->DiscountAmount->headerCellClass() ?>"><div id="elh_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount"><div class="ew-table-header-caption"><?php echo $billing_voucher->DiscountAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountAmount" class="<?php echo $billing_voucher->DiscountAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->DiscountAmount) ?>',1);"><div id="elh_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->DiscountAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->DiscountAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->DiscountAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Cash->Visible) { // Cash ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $billing_voucher->Cash->headerCellClass() ?>"><div id="elh_billing_voucher_Cash" class="billing_voucher_Cash"><div class="ew-table-header-caption"><?php echo $billing_voucher->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $billing_voucher->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Cash) ?>',1);"><div id="elh_billing_voucher_Cash" class="billing_voucher_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_voucher->Card->Visible) { // Card ?>
	<?php if ($billing_voucher->sortUrl($billing_voucher->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $billing_voucher->Card->headerCellClass() ?>"><div id="elh_billing_voucher_Card" class="billing_voucher_Card"><div class="ew-table-header-caption"><?php echo $billing_voucher->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $billing_voucher->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_voucher->SortUrl($billing_voucher->Card) ?>',1);"><div id="elh_billing_voucher_Card" class="billing_voucher_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_voucher->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_voucher->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_voucher->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_voucher->ExportAll && $billing_voucher->isExport()) {
	$billing_voucher_list->StopRec = $billing_voucher_list->TotalRecs;
} else {

	// Set the last record to display
	if ($billing_voucher_list->TotalRecs > $billing_voucher_list->StartRec + $billing_voucher_list->DisplayRecs - 1)
		$billing_voucher_list->StopRec = $billing_voucher_list->StartRec + $billing_voucher_list->DisplayRecs - 1;
	else
		$billing_voucher_list->StopRec = $billing_voucher_list->TotalRecs;
}
$billing_voucher_list->RecCnt = $billing_voucher_list->StartRec - 1;
if ($billing_voucher_list->Recordset && !$billing_voucher_list->Recordset->EOF) {
	$billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $billing_voucher_list->StartRec > 1)
		$billing_voucher_list->Recordset->move($billing_voucher_list->StartRec - 1);
} elseif (!$billing_voucher->AllowAddDeleteRow && $billing_voucher_list->StopRec == 0) {
	$billing_voucher_list->StopRec = $billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$billing_voucher->resetAttributes();
$billing_voucher_list->renderRow();
while ($billing_voucher_list->RecCnt < $billing_voucher_list->StopRec) {
	$billing_voucher_list->RecCnt++;
	if ($billing_voucher_list->RecCnt >= $billing_voucher_list->StartRec) {
		$billing_voucher_list->RowCnt++;

		// Set up key count
		$billing_voucher_list->KeyCount = $billing_voucher_list->RowIndex;

		// Init row class and style
		$billing_voucher->resetAttributes();
		$billing_voucher->CssClass = "";
		if ($billing_voucher->isGridAdd()) {
		} else {
			$billing_voucher_list->loadRowValues($billing_voucher_list->Recordset); // Load row values
		}
		$billing_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$billing_voucher->RowAttrs = array_merge($billing_voucher->RowAttrs, array('data-rowindex'=>$billing_voucher_list->RowCnt, 'id'=>'r' . $billing_voucher_list->RowCnt . '_billing_voucher', 'data-rowtype'=>$billing_voucher->RowType));

		// Render row
		$billing_voucher_list->renderRow();

		// Render list options
		$billing_voucher_list->renderListOptions();
?>
	<tr<?php echo $billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_voucher_list->ListOptions->render("body", "left", $billing_voucher_list->RowCnt);
?>
	<?php if ($billing_voucher->id->Visible) { // id ?>
		<td data-name="id"<?php echo $billing_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_id" class="billing_voucher_id">
<span<?php echo $billing_voucher->id->viewAttributes() ?>>
<?php echo $billing_voucher->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $billing_voucher->PatId->cellAttributes() ?>>
<script id="orig<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PatId" class="billing_other_voucheredit" type="text/html">
<?php echo $billing_voucher->PatId->getViewValue() ?>
</script>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PatId" class="billing_voucher_PatId">
<span<?php echo $billing_voucher->PatId->viewAttributes() ?>><?php echo Barcode()->show($billing_voucher->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_BillNumber" class="billing_voucher_BillNumber">
<span<?php echo $billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $billing_voucher->PatientId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PatientId" class="billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->getViewValue()) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $billing_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PatientName" class="billing_voucher_PatientName">
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $billing_voucher->Gender->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Gender" class="billing_voucher_Gender">
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>>
<?php echo $billing_voucher->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $billing_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Mobile" class="billing_voucher_Mobile">
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $billing_voucher->Doctor->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Doctor" class="billing_voucher_Doctor">
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $billing_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Amount" class="billing_voucher_Amount">
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $billing_voucher->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_createdby" class="billing_voucher_createdby">
<span<?php echo $billing_voucher->createdby->viewAttributes() ?>>
<?php echo $billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
<span<?php echo $billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $billing_voucher->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_HospID" class="billing_voucher_HospID">
<span<?php echo $billing_voucher->HospID->viewAttributes() ?>>
<?php echo $billing_voucher->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $billing_voucher->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<?php echo $billing_voucher->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $billing_voucher->TidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_TidNo" class="billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<?php echo $billing_voucher->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $billing_voucher->CId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CId" class="billing_voucher_CId">
<span<?php echo $billing_voucher->CId->viewAttributes() ?>>
<?php echo $billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PartnerName" class="billing_voucher_PartnerName">
<span<?php echo $billing_voucher->PartnerName->viewAttributes() ?>>
<?php echo $billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType"<?php echo $billing_voucher->PayerType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PayerType" class="billing_voucher_PayerType">
<span<?php echo $billing_voucher->PayerType->viewAttributes() ?>>
<?php echo $billing_voucher->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
		<td data-name="Dob"<?php echo $billing_voucher->Dob->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Dob" class="billing_voucher_Dob">
<span<?php echo $billing_voucher->Dob->viewAttributes() ?>>
<?php echo $billing_voucher->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $billing_voucher->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment">
<span<?php echo $billing_voucher->DrDepartment->viewAttributes() ?>>
<?php echo $billing_voucher->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $billing_voucher->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy">
<span<?php echo $billing_voucher->RefferedBy->viewAttributes() ?>>
<?php echo $billing_voucher->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CardNumber" class="billing_voucher_CardNumber">
<span<?php echo $billing_voucher->CardNumber->viewAttributes() ?>>
<?php echo $billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $billing_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_BankName" class="billing_voucher_BankName">
<span<?php echo $billing_voucher->BankName->viewAttributes() ?>>
<?php echo $billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $billing_voucher->UserName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_UserName" class="billing_voucher_UserName">
<span<?php echo $billing_voucher->UserName->viewAttributes() ?>>
<?php echo $billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<td data-name="AdjustmentAdvance"<?php echo $billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher->AdjustmentAdvance->viewAttributes() ?>>
<?php echo $billing_voucher->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<td data-name="billing_vouchercol"<?php echo $billing_voucher->billing_vouchercol->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher->billing_vouchercol->viewAttributes() ?>>
<?php echo $billing_voucher->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $billing_voucher->BillType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_BillType" class="billing_voucher_BillType">
<span<?php echo $billing_voucher->BillType->viewAttributes() ?>>
<?php echo $billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
		<td data-name="ProcedureName"<?php echo $billing_voucher->ProcedureName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName">
<span<?php echo $billing_voucher->ProcedureName->viewAttributes() ?>>
<?php echo $billing_voucher->ProcedureName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<td data-name="ProcedureAmount"<?php echo $billing_voucher->ProcedureAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher->ProcedureAmount->viewAttributes() ?>>
<?php echo $billing_voucher->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
		<td data-name="IncludePackage"<?php echo $billing_voucher->IncludePackage->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage">
<span<?php echo $billing_voucher->IncludePackage->viewAttributes() ?>>
<?php echo $billing_voucher->IncludePackage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill"<?php echo $billing_voucher->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CancelBill" class="billing_voucher_CancelBill">
<span<?php echo $billing_voucher->CancelBill->viewAttributes() ?>>
<?php echo $billing_voucher->CancelBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
		<td data-name="CancelReason"<?php echo $billing_voucher->CancelReason->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CancelReason" class="billing_voucher_CancelReason">
<span<?php echo $billing_voucher->CancelReason->viewAttributes() ?>>
<?php echo $billing_voucher->CancelReason->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td data-name="CancelModeOfPayment"<?php echo $billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $billing_voucher->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
		<td data-name="CancelAmount"<?php echo $billing_voucher->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount">
<span<?php echo $billing_voucher->CancelAmount->viewAttributes() ?>>
<?php echo $billing_voucher->CancelAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
		<td data-name="CancelBankName"<?php echo $billing_voucher->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName">
<span<?php echo $billing_voucher->CancelBankName->viewAttributes() ?>>
<?php echo $billing_voucher->CancelBankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td data-name="CancelTransactionNumber"<?php echo $billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $billing_voucher->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest"<?php echo $billing_voucher->LabTest->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_LabTest" class="billing_voucher_LabTest">
<span<?php echo $billing_voucher->LabTest->viewAttributes() ?>>
<?php echo $billing_voucher->LabTest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $billing_voucher->sid->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_sid" class="billing_voucher_sid">
<span<?php echo $billing_voucher->sid->viewAttributes() ?>>
<?php echo $billing_voucher->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo"<?php echo $billing_voucher->SidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_SidNo" class="billing_voucher_SidNo">
<span<?php echo $billing_voucher->SidNo->viewAttributes() ?>>
<?php echo $billing_voucher->SidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime"<?php echo $billing_voucher->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime">
<span<?php echo $billing_voucher->createdDatettime->viewAttributes() ?>>
<?php echo $billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased"<?php echo $billing_voucher->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher->LabTestReleased->viewAttributes() ?>>
<?php echo $billing_voucher->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID"<?php echo $billing_voucher->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher->GoogleReviewID->viewAttributes() ?>>
<?php echo $billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType"<?php echo $billing_voucher->CardType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_CardType" class="billing_voucher_CardType">
<span<?php echo $billing_voucher->CardType->viewAttributes() ?>>
<?php echo $billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<td data-name="PharmacyBill"<?php echo $billing_voucher->PharmacyBill->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill">
<span<?php echo $billing_voucher->PharmacyBill->viewAttributes() ?>>
<?php echo $billing_voucher->PharmacyBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount"<?php echo $billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount">
<span<?php echo $billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $billing_voucher->Cash->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Cash" class="billing_voucher_Cash">
<span<?php echo $billing_voucher->Cash->viewAttributes() ?>>
<?php echo $billing_voucher->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $billing_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_list->RowCnt ?>_billing_voucher_Card" class="billing_voucher_Card">
<span<?php echo $billing_voucher->Card->viewAttributes() ?>>
<?php echo $billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_voucher_list->ListOptions->render("body", "right", $billing_voucher_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$billing_voucher->isGridAdd())
		$billing_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_voucher_list->Recordset)
	$billing_voucher_list->Recordset->Close();
?>
<?php if (!$billing_voucher->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_voucher_list->Pager)) $billing_voucher_list->Pager = new NumericPager($billing_voucher_list->StartRec, $billing_voucher_list->DisplayRecs, $billing_voucher_list->TotalRecs, $billing_voucher_list->RecRange, $billing_voucher_list->AutoHidePager) ?>
<?php if ($billing_voucher_list->Pager->RecordCount > 0 && $billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_voucher_list->pageUrl() ?>start=<?php echo $billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_voucher_list->TotalRecs > 0 && (!$billing_voucher_list->AutoHidePageSizeSelector || $billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_voucher_list->TotalRecs == 0 && !$billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_voucher_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$billing_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$billing_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_billing_voucher", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$billing_voucher_list->terminate();
?>