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
$pharmacy_grn_list = new pharmacy_grn_list();

// Run the page
$pharmacy_grn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_grnlist = currentForm = new ew.Form("fpharmacy_grnlist", "list");
fpharmacy_grnlist.formKeyCountName = '<?php echo $pharmacy_grn_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_grnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_grnlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_grnlistsrch = currentSearchForm = new ew.Form("fpharmacy_grnlistsrch");

// Validate function for search
fpharmacy_grnlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DT");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->DT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BILLDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_grn->BILLDT->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_grnlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_grnlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpharmacy_grnlistsrch.filterList = <?php echo $pharmacy_grn_list->getFilterList() ?>;
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
<?php if (!$pharmacy_grn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_grn_list->TotalRecs > 0 && $pharmacy_grn_list->ExportOptions->visible()) { ?>
<?php $pharmacy_grn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_grn_list->ImportOptions->visible()) { ?>
<?php $pharmacy_grn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_grn_list->SearchOptions->visible()) { ?>
<?php $pharmacy_grn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_grn_list->FilterOptions->visible()) { ?>
<?php $pharmacy_grn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_grn->isExport() || EXPORT_MASTER_RECORD && $pharmacy_grn->isExport("print")) { ?>
<?php
if ($pharmacy_grn_list->DbMasterFilter <> "" && $pharmacy_grn->getCurrentMasterTable() == "pharmacy_payment") {
	if ($pharmacy_grn_list->MasterRecordExists) {
		include_once "pharmacy_paymentmaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_grn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_grn->isExport() && !$pharmacy_grn->CurrentAction) { ?>
<form name="fpharmacy_grnlistsrch" id="fpharmacy_grnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_grn_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_grnlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_grn">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pharmacy_grn_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pharmacy_grn->RowType = ROWTYPE_SEARCH;

// Render row
$pharmacy_grn->resetAttributes();
$pharmacy_grn_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
	<div id="xsc_DT" class="ew-cell form-group">
		<label for="x_DT" class="ew-search-caption ew-label"><?php echo $pharmacy_grn->DT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DT" id="z_DT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_grn->DT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->DT->EditValue ?>"<?php echo $pharmacy_grn->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn->DT->ReadOnly && !$pharmacy_grn->DT->Disabled && !isset($pharmacy_grn->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grnlistsrch", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DT style="d-none"">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="y_DT" id="y_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->DT->EditValue2 ?>"<?php echo $pharmacy_grn->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn->DT->ReadOnly && !$pharmacy_grn->DT->Disabled && !isset($pharmacy_grn->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grnlistsrch", "y_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
	<div id="xsc_Customername" class="ew-cell form-group">
		<label for="x_Customername" class="ew-search-caption ew-label"><?php echo $pharmacy_grn->Customername->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Customername" id="z_Customername" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->Customername->EditValue ?>"<?php echo $pharmacy_grn->Customername->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
	<div id="xsc_BILLNO" class="ew-cell form-group">
		<label for="x_BILLNO" class="ew-search-caption ew-label"><?php echo $pharmacy_grn->BILLNO->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BILLNO" id="z_BILLNO" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLNO->EditValue ?>"<?php echo $pharmacy_grn->BILLNO->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
	<div id="xsc_BILLDT" class="ew-cell form-group">
		<label for="x_BILLDT" class="ew-search-caption ew-label"><?php echo $pharmacy_grn->BILLDT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_BILLDT" id="z_BILLDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_grn->BILLDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLDT->EditValue ?>"<?php echo $pharmacy_grn->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn->BILLDT->ReadOnly && !$pharmacy_grn->BILLDT->Disabled && !isset($pharmacy_grn->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grnlistsrch", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_BILLDT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_BILLDT style="d-none"">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="y_BILLDT" id="y_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn->BILLDT->EditValue2 ?>"<?php echo $pharmacy_grn->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn->BILLDT->ReadOnly && !$pharmacy_grn->BILLDT->Disabled && !isset($pharmacy_grn->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_grnlistsrch", "y_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_grn_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_grn_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_grn_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_grn_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_grn_list->showPageHeader(); ?>
<?php
$pharmacy_grn_list->showMessage();
?>
<?php if ($pharmacy_grn_list->TotalRecs > 0 || $pharmacy_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_grn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_grn">
<?php if (!$pharmacy_grn->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_grn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_grn_list->Pager)) $pharmacy_grn_list->Pager = new NumericPager($pharmacy_grn_list->StartRec, $pharmacy_grn_list->DisplayRecs, $pharmacy_grn_list->TotalRecs, $pharmacy_grn_list->RecRange, $pharmacy_grn_list->AutoHidePager) ?>
<?php if ($pharmacy_grn_list->Pager->RecordCount > 0 && $pharmacy_grn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_grn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_grn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_grn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_grn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_grn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_grn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_grn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_grn_list->TotalRecs > 0 && (!$pharmacy_grn_list->AutoHidePageSizeSelector || $pharmacy_grn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_grn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="5"<?php if ($pharmacy_grn_list->DisplayRecs == 5) { ?> selected<?php } ?>>5</option>
<option value="8"<?php if ($pharmacy_grn_list->DisplayRecs == 8) { ?> selected<?php } ?>>8</option>
<option value="10"<?php if ($pharmacy_grn_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($pharmacy_grn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_grn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_grn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_grn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_grn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_grn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_grn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_grnlist" id="fpharmacy_grnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_grn_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_grn_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<?php if ($pharmacy_grn->getCurrentMasterTable() == "pharmacy_payment" && $pharmacy_grn->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_payment">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_grn->Pid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_pharmacy_grn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_grn_list->TotalRecs > 0 || $pharmacy_grn->isGridEdit()) { ?>
<table id="tbl_pharmacy_grnlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_grn_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_grn_list->renderListOptions();

// Render list options (header, left)
$pharmacy_grn_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->id) ?>',1);"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->GRNNO) ?>',1);"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->GRNNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->GRNNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->DT) ?>',1);"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->Customername) ?>',1);"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->State) ?>',1);"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->Pincode) ?>',1);"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->Phone) ?>',1);"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->BILLNO) ?>',1);"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->BILLDT) ?>',1);"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->BillTotalValue) ?>',1);"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BillTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BillTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->GRNTotalValue) ?>',1);"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->GRNTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->GRNTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->BillDiscount) ?>',1);"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->BillDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->BillDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->GrnValue) == "") { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->GrnValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnValue" class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->GrnValue) ?>',1);"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->GrnValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->GrnValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->Pid) ?>',1);"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->Pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->Pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->PaymentNo) ?>',1);"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->PaymentNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->PaymentNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->PaymentStatus) ?>',1);"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaymentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_grn->sortUrl($pharmacy_grn->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_grn->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_grn->SortUrl($pharmacy_grn->PaidAmount) ?>',1);"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_grn->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_grn->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_grn->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_grn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_grn->ExportAll && $pharmacy_grn->isExport()) {
	$pharmacy_grn_list->StopRec = $pharmacy_grn_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_grn_list->TotalRecs > $pharmacy_grn_list->StartRec + $pharmacy_grn_list->DisplayRecs - 1)
		$pharmacy_grn_list->StopRec = $pharmacy_grn_list->StartRec + $pharmacy_grn_list->DisplayRecs - 1;
	else
		$pharmacy_grn_list->StopRec = $pharmacy_grn_list->TotalRecs;
}
$pharmacy_grn_list->RecCnt = $pharmacy_grn_list->StartRec - 1;
if ($pharmacy_grn_list->Recordset && !$pharmacy_grn_list->Recordset->EOF) {
	$pharmacy_grn_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_grn_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_grn_list->StartRec > 1)
		$pharmacy_grn_list->Recordset->move($pharmacy_grn_list->StartRec - 1);
} elseif (!$pharmacy_grn->AllowAddDeleteRow && $pharmacy_grn_list->StopRec == 0) {
	$pharmacy_grn_list->StopRec = $pharmacy_grn->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_grn->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_list->renderRow();
while ($pharmacy_grn_list->RecCnt < $pharmacy_grn_list->StopRec) {
	$pharmacy_grn_list->RecCnt++;
	if ($pharmacy_grn_list->RecCnt >= $pharmacy_grn_list->StartRec) {
		$pharmacy_grn_list->RowCnt++;

		// Set up key count
		$pharmacy_grn_list->KeyCount = $pharmacy_grn_list->RowIndex;

		// Init row class and style
		$pharmacy_grn->resetAttributes();
		$pharmacy_grn->CssClass = "";
		if ($pharmacy_grn->isGridAdd()) {
		} else {
			$pharmacy_grn_list->loadRowValues($pharmacy_grn_list->Recordset); // Load row values
		}
		$pharmacy_grn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_grn->RowAttrs = array_merge($pharmacy_grn->RowAttrs, array('data-rowindex'=>$pharmacy_grn_list->RowCnt, 'id'=>'r' . $pharmacy_grn_list->RowCnt . '_pharmacy_grn', 'data-rowtype'=>$pharmacy_grn->RowType));

		// Render row
		$pharmacy_grn_list->renderRow();

		// Render list options
		$pharmacy_grn_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_grn_list->ListOptions->render("body", "left", $pharmacy_grn_list->RowCnt);
?>
	<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_grn->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_id" class="pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<?php echo $pharmacy_grn->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO"<?php echo $pharmacy_grn->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $pharmacy_grn->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_DT" class="pharmacy_grn_DT">
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>>
<?php echo $pharmacy_grn->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $pharmacy_grn->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>>
<?php echo $pharmacy_grn->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<td data-name="State"<?php echo $pharmacy_grn->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_State" class="pharmacy_grn_State">
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>>
<?php echo $pharmacy_grn->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $pharmacy_grn->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $pharmacy_grn->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>>
<?php echo $pharmacy_grn->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $pharmacy_grn->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $pharmacy_grn->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue"<?php echo $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue"<?php echo $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount"<?php echo $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue"<?php echo $pharmacy_grn->GrnValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GrnValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid"<?php echo $pharmacy_grn->Pid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo"<?php echo $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_list->RowCnt ?>_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_grn_list->ListOptions->render("body", "right", $pharmacy_grn_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_grn->isGridAdd())
		$pharmacy_grn_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$pharmacy_grn->RowType = ROWTYPE_AGGREGATE;
$pharmacy_grn->resetAttributes();
$pharmacy_grn_list->renderRow();
?>
<?php if ($pharmacy_grn_list->TotalRecs > 0 && !$pharmacy_grn->isGridAdd() && !$pharmacy_grn->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$pharmacy_grn_list->renderListOptions();

// Render list options (footer, left)
$pharmacy_grn_list->ListOptions->render("footer", "left");
?>
	<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $pharmacy_grn->id->footerCellClass() ?>"><span id="elf_pharmacy_grn_id" class="pharmacy_grn_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" class="<?php echo $pharmacy_grn->GRNNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $pharmacy_grn->DT->footerCellClass() ?>"><span id="elf_pharmacy_grn_DT" class="pharmacy_grn_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $pharmacy_grn->Customername->footerCellClass() ?>"><span id="elf_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $pharmacy_grn->State->footerCellClass() ?>"><span id="elf_pharmacy_grn_State" class="pharmacy_grn_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $pharmacy_grn->Pincode->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $pharmacy_grn->Phone->footerCellClass() ?>"><span id="elf_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $pharmacy_grn->BILLNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" class="<?php echo $pharmacy_grn->BILLDT->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $pharmacy_grn->BillTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->BillTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $pharmacy_grn->GRNTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->GRNTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $pharmacy_grn->BillDiscount->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_grn->BillDiscount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" class="<?php echo $pharmacy_grn->GrnValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid" class="<?php echo $pharmacy_grn->Pid->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" class="<?php echo $pharmacy_grn->PaymentNo->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" class="<?php echo $pharmacy_grn->PaymentStatus->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $pharmacy_grn->PaidAmount->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$pharmacy_grn_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_grn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_grn_list->Recordset)
	$pharmacy_grn_list->Recordset->Close();
?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_grn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_grn_list->Pager)) $pharmacy_grn_list->Pager = new NumericPager($pharmacy_grn_list->StartRec, $pharmacy_grn_list->DisplayRecs, $pharmacy_grn_list->TotalRecs, $pharmacy_grn_list->RecRange, $pharmacy_grn_list->AutoHidePager) ?>
<?php if ($pharmacy_grn_list->Pager->RecordCount > 0 && $pharmacy_grn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_grn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_grn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_grn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_grn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_grn_list->pageUrl() ?>start=<?php echo $pharmacy_grn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_grn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_grn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_grn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_grn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_grn_list->TotalRecs > 0 && (!$pharmacy_grn_list->AutoHidePageSizeSelector || $pharmacy_grn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_grn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="5"<?php if ($pharmacy_grn_list->DisplayRecs == 5) { ?> selected<?php } ?>>5</option>
<option value="8"<?php if ($pharmacy_grn_list->DisplayRecs == 8) { ?> selected<?php } ?>>8</option>
<option value="10"<?php if ($pharmacy_grn_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($pharmacy_grn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_grn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_grn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_grn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_grn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_grn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_grn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_grn_list->TotalRecs == 0 && !$pharmacy_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_grn_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");
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
$("[data-name='Quantity']").hide();
$("[data-name='BillDate']").hide();
</script>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_grn", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_grn_list->terminate();
?>