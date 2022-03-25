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
$billing_other_voucher_list = new billing_other_voucher_list();

// Run the page
$billing_other_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_other_voucher_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$billing_other_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbilling_other_voucherlist = currentForm = new ew.Form("fbilling_other_voucherlist", "list");
fbilling_other_voucherlist.formKeyCountName = '<?php echo $billing_other_voucher_list->FormKeyCountName ?>';

// Form_CustomValidate event
fbilling_other_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_other_voucherlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_other_voucherlist.lists["x_ModeofPayment"] = <?php echo $billing_other_voucher_list->ModeofPayment->Lookup->toClientList() ?>;
fbilling_other_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_other_voucher_list->ModeofPayment->lookupOptions()) ?>;
fbilling_other_voucherlist.lists["x_CancelAdvance[]"] = <?php echo $billing_other_voucher_list->CancelAdvance->Lookup->toClientList() ?>;
fbilling_other_voucherlist.lists["x_CancelAdvance[]"].options = <?php echo JsonEncode($billing_other_voucher_list->CancelAdvance->options(FALSE, TRUE)) ?>;
fbilling_other_voucherlist.lists["x_CancelStatus"] = <?php echo $billing_other_voucher_list->CancelStatus->Lookup->toClientList() ?>;
fbilling_other_voucherlist.lists["x_CancelStatus"].options = <?php echo JsonEncode($billing_other_voucher_list->CancelStatus->options(FALSE, TRUE)) ?>;

// Form object for search
var fbilling_other_voucherlistsrch = currentSearchForm = new ew.Form("fbilling_other_voucherlistsrch");

// Validate function for search
fbilling_other_voucherlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($billing_other_voucher->Date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fbilling_other_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_other_voucherlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fbilling_other_voucherlistsrch.filterList = <?php echo $billing_other_voucher_list->getFilterList() ?>;
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
<?php if (!$billing_other_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_other_voucher_list->TotalRecs > 0 && $billing_other_voucher_list->ExportOptions->visible()) { ?>
<?php $billing_other_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_other_voucher_list->ImportOptions->visible()) { ?>
<?php $billing_other_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_other_voucher_list->SearchOptions->visible()) { ?>
<?php $billing_other_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_other_voucher_list->FilterOptions->visible()) { ?>
<?php $billing_other_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_other_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_other_voucher->isExport() && !$billing_other_voucher->CurrentAction) { ?>
<form name="fbilling_other_voucherlistsrch" id="fbilling_other_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($billing_other_voucher_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbilling_other_voucherlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_other_voucher">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$billing_other_voucher_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$billing_other_voucher->RowType = ROWTYPE_SEARCH;

// Render row
$billing_other_voucher->resetAttributes();
$billing_other_voucher_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($billing_other_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
	<div id="xsc_AdvanceNo" class="ew-cell form-group">
		<label for="x_AdvanceNo" class="ew-search-caption ew-label"><?php echo $billing_other_voucher->AdvanceNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AdvanceNo" id="z_AdvanceNo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher->AdvanceNo->EditValue ?>"<?php echo $billing_other_voucher->AdvanceNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($billing_other_voucher->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $billing_other_voucher->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher->PatientID->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher->PatientID->EditValue ?>"<?php echo $billing_other_voucher->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($billing_other_voucher->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $billing_other_voucher->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher->PatientName->EditValue ?>"<?php echo $billing_other_voucher->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($billing_other_voucher->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $billing_other_voucher->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_other_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher->Mobile->EditValue ?>"<?php echo $billing_other_voucher->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($billing_other_voucher->Date->Visible) { // Date ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $billing_other_voucher->Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Date" id="z_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($billing_other_voucher->Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($billing_other_voucher->Date->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher->Date->EditValue ?>"<?php echo $billing_other_voucher->Date->editAttributes() ?>>
<?php if (!$billing_other_voucher->Date->ReadOnly && !$billing_other_voucher->Date->Disabled && !isset($billing_other_voucher->Date->EditAttrs["readonly"]) && !isset($billing_other_voucher->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbilling_other_voucherlistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Date style="d-none"">
<input type="text" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="y_Date" id="y_Date" placeholder="<?php echo HtmlEncode($billing_other_voucher->Date->getPlaceHolder()) ?>" value="<?php echo $billing_other_voucher->Date->EditValue2 ?>"<?php echo $billing_other_voucher->Date->editAttributes() ?>>
<?php if (!$billing_other_voucher->Date->ReadOnly && !$billing_other_voucher->Date->Disabled && !isset($billing_other_voucher->Date->EditAttrs["readonly"]) && !isset($billing_other_voucher->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fbilling_other_voucherlistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($billing_other_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($billing_other_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_other_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_other_voucher_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $billing_other_voucher_list->showPageHeader(); ?>
<?php
$billing_other_voucher_list->showMessage();
?>
<?php if ($billing_other_voucher_list->TotalRecs > 0 || $billing_other_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_other_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_other_voucher">
<?php if (!$billing_other_voucher->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_other_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_other_voucher_list->Pager)) $billing_other_voucher_list->Pager = new NumericPager($billing_other_voucher_list->StartRec, $billing_other_voucher_list->DisplayRecs, $billing_other_voucher_list->TotalRecs, $billing_other_voucher_list->RecRange, $billing_other_voucher_list->AutoHidePager) ?>
<?php if ($billing_other_voucher_list->Pager->RecordCount > 0 && $billing_other_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_other_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_other_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_other_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_other_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_other_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_other_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_other_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_other_voucher_list->TotalRecs > 0 && (!$billing_other_voucher_list->AutoHidePageSizeSelector || $billing_other_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_other_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_other_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_other_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_other_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_other_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_other_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_other_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_other_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_other_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_other_voucherlist" id="fbilling_other_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_other_voucher_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_other_voucher_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<div id="gmp_billing_other_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($billing_other_voucher_list->TotalRecs > 0 || $billing_other_voucher->isGridEdit()) { ?>
<table id="tbl_billing_other_voucherlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_other_voucher_list->RowType = ROWTYPE_HEADER;

// Render list options
$billing_other_voucher_list->renderListOptions();

// Render list options (header, left)
$billing_other_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($billing_other_voucher->id->Visible) { // id ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_other_voucher->id->headerCellClass() ?>"><div id="elh_billing_other_voucher_id" class="billing_other_voucher_id"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_other_voucher->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->id) ?>',1);"><div id="elh_billing_other_voucher_id" class="billing_other_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $billing_other_voucher->AdvanceNo->headerCellClass() ?>"><div id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $billing_other_voucher->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->AdvanceNo) ?>',1);"><div id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->AdvanceNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->AdvanceNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->AdvanceNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->PatientID->Visible) { // PatientID ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $billing_other_voucher->PatientID->headerCellClass() ?>"><div id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $billing_other_voucher->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->PatientID) ?>',1);"><div id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $billing_other_voucher->PatientName->headerCellClass() ?>"><div id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $billing_other_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->PatientName) ?>',1);"><div id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $billing_other_voucher->Mobile->headerCellClass() ?>"><div id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $billing_other_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->Mobile) ?>',1);"><div id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_other_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $billing_other_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->ModeofPayment) ?>',1);"><div id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->Amount->Visible) { // Amount ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $billing_other_voucher->Amount->headerCellClass() ?>"><div id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $billing_other_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->Amount) ?>',1);"><div id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->BankName->Visible) { // BankName ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $billing_other_voucher->BankName->headerCellClass() ?>"><div id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $billing_other_voucher->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->BankName) ?>',1);"><div id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->Date->Visible) { // Date ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $billing_other_voucher->Date->headerCellClass() ?>"><div id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $billing_other_voucher->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->Date) ?>',1);"><div id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->GetUserName->Visible) { // GetUserName ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->GetUserName) == "") { ?>
		<th data-name="GetUserName" class="<?php echo $billing_other_voucher->GetUserName->headerCellClass() ?>"><div id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->GetUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GetUserName" class="<?php echo $billing_other_voucher->GetUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->GetUserName) ?>',1);"><div id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->GetUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->GetUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->GetUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->CancelAdvance->Visible) { // CancelAdvance ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->CancelAdvance) == "") { ?>
		<th data-name="CancelAdvance" class="<?php echo $billing_other_voucher->CancelAdvance->headerCellClass() ?>"><div id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->CancelAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAdvance" class="<?php echo $billing_other_voucher->CancelAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->CancelAdvance) ?>',1);"><div id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->CancelAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->CancelAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->CancelAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->CancelStatus->Visible) { // CancelStatus ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->CancelStatus) == "") { ?>
		<th data-name="CancelStatus" class="<?php echo $billing_other_voucher->CancelStatus->headerCellClass() ?>"><div id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->CancelStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelStatus" class="<?php echo $billing_other_voucher->CancelStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->CancelStatus) ?>',1);"><div id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->CancelStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->CancelStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->CancelStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->Cash->Visible) { // Cash ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $billing_other_voucher->Cash->headerCellClass() ?>"><div id="elh_billing_other_voucher_Cash" class="billing_other_voucher_Cash"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $billing_other_voucher->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->Cash) ?>',1);"><div id="elh_billing_other_voucher_Cash" class="billing_other_voucher_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_other_voucher->Card->Visible) { // Card ?>
	<?php if ($billing_other_voucher->sortUrl($billing_other_voucher->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $billing_other_voucher->Card->headerCellClass() ?>"><div id="elh_billing_other_voucher_Card" class="billing_other_voucher_Card"><div class="ew-table-header-caption"><?php echo $billing_other_voucher->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $billing_other_voucher->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_other_voucher->SortUrl($billing_other_voucher->Card) ?>',1);"><div id="elh_billing_other_voucher_Card" class="billing_other_voucher_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_other_voucher->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_other_voucher->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_other_voucher->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_other_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_other_voucher->ExportAll && $billing_other_voucher->isExport()) {
	$billing_other_voucher_list->StopRec = $billing_other_voucher_list->TotalRecs;
} else {

	// Set the last record to display
	if ($billing_other_voucher_list->TotalRecs > $billing_other_voucher_list->StartRec + $billing_other_voucher_list->DisplayRecs - 1)
		$billing_other_voucher_list->StopRec = $billing_other_voucher_list->StartRec + $billing_other_voucher_list->DisplayRecs - 1;
	else
		$billing_other_voucher_list->StopRec = $billing_other_voucher_list->TotalRecs;
}
$billing_other_voucher_list->RecCnt = $billing_other_voucher_list->StartRec - 1;
if ($billing_other_voucher_list->Recordset && !$billing_other_voucher_list->Recordset->EOF) {
	$billing_other_voucher_list->Recordset->moveFirst();
	$selectLimit = $billing_other_voucher_list->UseSelectLimit;
	if (!$selectLimit && $billing_other_voucher_list->StartRec > 1)
		$billing_other_voucher_list->Recordset->move($billing_other_voucher_list->StartRec - 1);
} elseif (!$billing_other_voucher->AllowAddDeleteRow && $billing_other_voucher_list->StopRec == 0) {
	$billing_other_voucher_list->StopRec = $billing_other_voucher->GridAddRowCount;
}

// Initialize aggregate
$billing_other_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$billing_other_voucher->resetAttributes();
$billing_other_voucher_list->renderRow();
while ($billing_other_voucher_list->RecCnt < $billing_other_voucher_list->StopRec) {
	$billing_other_voucher_list->RecCnt++;
	if ($billing_other_voucher_list->RecCnt >= $billing_other_voucher_list->StartRec) {
		$billing_other_voucher_list->RowCnt++;

		// Set up key count
		$billing_other_voucher_list->KeyCount = $billing_other_voucher_list->RowIndex;

		// Init row class and style
		$billing_other_voucher->resetAttributes();
		$billing_other_voucher->CssClass = "";
		if ($billing_other_voucher->isGridAdd()) {
		} else {
			$billing_other_voucher_list->loadRowValues($billing_other_voucher_list->Recordset); // Load row values
		}
		$billing_other_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$billing_other_voucher->RowAttrs = array_merge($billing_other_voucher->RowAttrs, array('data-rowindex'=>$billing_other_voucher_list->RowCnt, 'id'=>'r' . $billing_other_voucher_list->RowCnt . '_billing_other_voucher', 'data-rowtype'=>$billing_other_voucher->RowType));

		// Render row
		$billing_other_voucher_list->renderRow();

		// Render list options
		$billing_other_voucher_list->renderListOptions();
?>
	<tr<?php echo $billing_other_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_other_voucher_list->ListOptions->render("body", "left", $billing_other_voucher_list->RowCnt);
?>
	<?php if ($billing_other_voucher->id->Visible) { // id ?>
		<td data-name="id"<?php echo $billing_other_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_id" class="billing_other_voucher_id">
<span<?php echo $billing_other_voucher->id->viewAttributes() ?>>
<?php echo $billing_other_voucher->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo"<?php echo $billing_other_voucher->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo">
<span<?php echo $billing_other_voucher->AdvanceNo->viewAttributes() ?>>
<?php echo $billing_other_voucher->AdvanceNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $billing_other_voucher->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID">
<span<?php echo $billing_other_voucher->PatientID->viewAttributes() ?>>
<?php echo $billing_other_voucher->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $billing_other_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName">
<span<?php echo $billing_other_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_other_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $billing_other_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile">
<span<?php echo $billing_other_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_other_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $billing_other_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment">
<span<?php echo $billing_other_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_other_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $billing_other_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_Amount" class="billing_other_voucher_Amount">
<span<?php echo $billing_other_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_other_voucher->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $billing_other_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_BankName" class="billing_other_voucher_BankName">
<span<?php echo $billing_other_voucher->BankName->viewAttributes() ?>>
<?php echo $billing_other_voucher->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $billing_other_voucher->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_Date" class="billing_other_voucher_Date">
<span<?php echo $billing_other_voucher->Date->viewAttributes() ?>>
<?php echo $billing_other_voucher->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->GetUserName->Visible) { // GetUserName ?>
		<td data-name="GetUserName"<?php echo $billing_other_voucher->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName">
<span<?php echo $billing_other_voucher->GetUserName->viewAttributes() ?>>
<?php echo $billing_other_voucher->GetUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->CancelAdvance->Visible) { // CancelAdvance ?>
		<td data-name="CancelAdvance"<?php echo $billing_other_voucher->CancelAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance">
<span<?php echo $billing_other_voucher->CancelAdvance->viewAttributes() ?>>
<?php echo $billing_other_voucher->CancelAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->CancelStatus->Visible) { // CancelStatus ?>
		<td data-name="CancelStatus"<?php echo $billing_other_voucher->CancelStatus->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus">
<span<?php echo $billing_other_voucher->CancelStatus->viewAttributes() ?>>
<?php echo $billing_other_voucher->CancelStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $billing_other_voucher->Cash->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_Cash" class="billing_other_voucher_Cash">
<span<?php echo $billing_other_voucher->Cash->viewAttributes() ?>>
<?php echo $billing_other_voucher->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($billing_other_voucher->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $billing_other_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_list->RowCnt ?>_billing_other_voucher_Card" class="billing_other_voucher_Card">
<span<?php echo $billing_other_voucher->Card->viewAttributes() ?>>
<?php echo $billing_other_voucher->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_other_voucher_list->ListOptions->render("body", "right", $billing_other_voucher_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$billing_other_voucher->isGridAdd())
		$billing_other_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$billing_other_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_other_voucher_list->Recordset)
	$billing_other_voucher_list->Recordset->Close();
?>
<?php if (!$billing_other_voucher->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_other_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_other_voucher_list->Pager)) $billing_other_voucher_list->Pager = new NumericPager($billing_other_voucher_list->StartRec, $billing_other_voucher_list->DisplayRecs, $billing_other_voucher_list->TotalRecs, $billing_other_voucher_list->RecRange, $billing_other_voucher_list->AutoHidePager) ?>
<?php if ($billing_other_voucher_list->Pager->RecordCount > 0 && $billing_other_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_other_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_other_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_other_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_other_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_other_voucher_list->pageUrl() ?>start=<?php echo $billing_other_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_other_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_other_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_other_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_other_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_other_voucher_list->TotalRecs > 0 && (!$billing_other_voucher_list->AutoHidePageSizeSelector || $billing_other_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_other_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_other_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_other_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_other_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_other_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_other_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_other_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_other_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_other_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_other_voucher_list->TotalRecs == 0 && !$billing_other_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_other_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_other_voucher_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$billing_other_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$billing_other_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_billing_other_voucher", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$billing_other_voucher_list->terminate();
?>