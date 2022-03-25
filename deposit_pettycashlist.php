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
$deposit_pettycash_list = new deposit_pettycash_list();

// Run the page
$deposit_pettycash_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_pettycash_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$deposit_pettycash->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fdeposit_pettycashlist = currentForm = new ew.Form("fdeposit_pettycashlist", "list");
fdeposit_pettycashlist.formKeyCountName = '<?php echo $deposit_pettycash_list->FormKeyCountName ?>';

// Form_CustomValidate event
fdeposit_pettycashlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_pettycashlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdeposit_pettycashlist.lists["x_TransType"] = <?php echo $deposit_pettycash_list->TransType->Lookup->toClientList() ?>;
fdeposit_pettycashlist.lists["x_TransType"].options = <?php echo JsonEncode($deposit_pettycash_list->TransType->options(FALSE, TRUE)) ?>;
fdeposit_pettycashlist.lists["x_TerminalNumber"] = <?php echo $deposit_pettycash_list->TerminalNumber->Lookup->toClientList() ?>;
fdeposit_pettycashlist.lists["x_TerminalNumber"].options = <?php echo JsonEncode($deposit_pettycash_list->TerminalNumber->options(FALSE, TRUE)) ?>;
fdeposit_pettycashlist.lists["x_AccoundHead"] = <?php echo $deposit_pettycash_list->AccoundHead->Lookup->toClientList() ?>;
fdeposit_pettycashlist.lists["x_AccoundHead"].options = <?php echo JsonEncode($deposit_pettycash_list->AccoundHead->lookupOptions()) ?>;

// Form object for search
var fdeposit_pettycashlistsrch = currentSearchForm = new ew.Form("fdeposit_pettycashlistsrch");

// Validate function for search
fdeposit_pettycashlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_OpenedDateTime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($deposit_pettycash->OpenedDateTime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fdeposit_pettycashlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdeposit_pettycashlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fdeposit_pettycashlistsrch.filterList = <?php echo $deposit_pettycash_list->getFilterList() ?>;
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
<?php if (!$deposit_pettycash->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($deposit_pettycash_list->TotalRecs > 0 && $deposit_pettycash_list->ExportOptions->visible()) { ?>
<?php $deposit_pettycash_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_pettycash_list->ImportOptions->visible()) { ?>
<?php $deposit_pettycash_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_pettycash_list->SearchOptions->visible()) { ?>
<?php $deposit_pettycash_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($deposit_pettycash_list->FilterOptions->visible()) { ?>
<?php $deposit_pettycash_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$deposit_pettycash_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$deposit_pettycash->isExport() && !$deposit_pettycash->CurrentAction) { ?>
<form name="fdeposit_pettycashlistsrch" id="fdeposit_pettycashlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($deposit_pettycash_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fdeposit_pettycashlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="deposit_pettycash">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$deposit_pettycash_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$deposit_pettycash->RowType = ROWTYPE_SEARCH;

// Render row
$deposit_pettycash->resetAttributes();
$deposit_pettycash_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
	<div id="xsc_OpenedDateTime" class="ew-cell form-group">
		<label for="x_OpenedDateTime" class="ew-search-caption ew-label"><?php echo $deposit_pettycash->OpenedDateTime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_OpenedDateTime" id="z_OpenedDateTime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($deposit_pettycash->OpenedDateTime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="deposit_pettycash" data-field="x_OpenedDateTime" data-format="7" name="x_OpenedDateTime" id="x_OpenedDateTime" placeholder="<?php echo HtmlEncode($deposit_pettycash->OpenedDateTime->getPlaceHolder()) ?>" value="<?php echo $deposit_pettycash->OpenedDateTime->EditValue ?>"<?php echo $deposit_pettycash->OpenedDateTime->editAttributes() ?>>
<?php if (!$deposit_pettycash->OpenedDateTime->ReadOnly && !$deposit_pettycash->OpenedDateTime->Disabled && !isset($deposit_pettycash->OpenedDateTime->EditAttrs["readonly"]) && !isset($deposit_pettycash->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fdeposit_pettycashlistsrch", "x_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_OpenedDateTime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_OpenedDateTime style="d-none"">
<input type="text" data-table="deposit_pettycash" data-field="x_OpenedDateTime" data-format="7" name="y_OpenedDateTime" id="y_OpenedDateTime" placeholder="<?php echo HtmlEncode($deposit_pettycash->OpenedDateTime->getPlaceHolder()) ?>" value="<?php echo $deposit_pettycash->OpenedDateTime->EditValue2 ?>"<?php echo $deposit_pettycash->OpenedDateTime->editAttributes() ?>>
<?php if (!$deposit_pettycash->OpenedDateTime->ReadOnly && !$deposit_pettycash->OpenedDateTime->Disabled && !isset($deposit_pettycash->OpenedDateTime->EditAttrs["readonly"]) && !isset($deposit_pettycash->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fdeposit_pettycashlistsrch", "y_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($deposit_pettycash_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($deposit_pettycash_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $deposit_pettycash_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($deposit_pettycash_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $deposit_pettycash_list->showPageHeader(); ?>
<?php
$deposit_pettycash_list->showMessage();
?>
<?php if ($deposit_pettycash_list->TotalRecs > 0 || $deposit_pettycash->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($deposit_pettycash_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> deposit_pettycash">
<?php if (!$deposit_pettycash->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$deposit_pettycash->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($deposit_pettycash_list->Pager)) $deposit_pettycash_list->Pager = new NumericPager($deposit_pettycash_list->StartRec, $deposit_pettycash_list->DisplayRecs, $deposit_pettycash_list->TotalRecs, $deposit_pettycash_list->RecRange, $deposit_pettycash_list->AutoHidePager) ?>
<?php if ($deposit_pettycash_list->Pager->RecordCount > 0 && $deposit_pettycash_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($deposit_pettycash_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($deposit_pettycash_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $deposit_pettycash_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($deposit_pettycash_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $deposit_pettycash_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $deposit_pettycash_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $deposit_pettycash_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($deposit_pettycash_list->TotalRecs > 0 && (!$deposit_pettycash_list->AutoHidePageSizeSelector || $deposit_pettycash_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="deposit_pettycash">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($deposit_pettycash_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($deposit_pettycash_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($deposit_pettycash_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($deposit_pettycash_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($deposit_pettycash_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($deposit_pettycash_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($deposit_pettycash->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_pettycash_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdeposit_pettycashlist" id="fdeposit_pettycashlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($deposit_pettycash_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $deposit_pettycash_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<div id="gmp_deposit_pettycash" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($deposit_pettycash_list->TotalRecs > 0 || $deposit_pettycash->isGridEdit()) { ?>
<table id="tbl_deposit_pettycashlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$deposit_pettycash_list->RowType = ROWTYPE_HEADER;

// Render list options
$deposit_pettycash_list->renderListOptions();

// Render list options (header, left)
$deposit_pettycash_list->ListOptions->render("header", "left");
?>
<?php if ($deposit_pettycash->id->Visible) { // id ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->id) == "") { ?>
		<th data-name="id" class="<?php echo $deposit_pettycash->id->headerCellClass() ?>"><div id="elh_deposit_pettycash_id" class="deposit_pettycash_id"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $deposit_pettycash->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->id) ?>',1);"><div id="elh_deposit_pettycash_id" class="deposit_pettycash_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->TransType) == "") { ?>
		<th data-name="TransType" class="<?php echo $deposit_pettycash->TransType->headerCellClass() ?>"><div id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->TransType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransType" class="<?php echo $deposit_pettycash->TransType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->TransType) ?>',1);"><div id="elh_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->TransType->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->TransType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->TransType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->ShiftNumber) == "") { ?>
		<th data-name="ShiftNumber" class="<?php echo $deposit_pettycash->ShiftNumber->headerCellClass() ?>"><div id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->ShiftNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShiftNumber" class="<?php echo $deposit_pettycash->ShiftNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->ShiftNumber) ?>',1);"><div id="elh_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->ShiftNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->ShiftNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->ShiftNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->TerminalNumber) == "") { ?>
		<th data-name="TerminalNumber" class="<?php echo $deposit_pettycash->TerminalNumber->headerCellClass() ?>"><div id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->TerminalNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TerminalNumber" class="<?php echo $deposit_pettycash->TerminalNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->TerminalNumber) ?>',1);"><div id="elh_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->TerminalNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->TerminalNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->TerminalNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->User->Visible) { // User ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->User) == "") { ?>
		<th data-name="User" class="<?php echo $deposit_pettycash->User->headerCellClass() ?>"><div id="elh_deposit_pettycash_User" class="deposit_pettycash_User"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->User->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="User" class="<?php echo $deposit_pettycash->User->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->User) ?>',1);"><div id="elh_deposit_pettycash_User" class="deposit_pettycash_User">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->User->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->User->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->User->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->OpenedDateTime) == "") { ?>
		<th data-name="OpenedDateTime" class="<?php echo $deposit_pettycash->OpenedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->OpenedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpenedDateTime" class="<?php echo $deposit_pettycash->OpenedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->OpenedDateTime) ?>',1);"><div id="elh_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->OpenedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->OpenedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->OpenedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->AccoundHead) == "") { ?>
		<th data-name="AccoundHead" class="<?php echo $deposit_pettycash->AccoundHead->headerCellClass() ?>"><div id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->AccoundHead->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccoundHead" class="<?php echo $deposit_pettycash->AccoundHead->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->AccoundHead) ?>',1);"><div id="elh_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->AccoundHead->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->AccoundHead->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->AccoundHead->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $deposit_pettycash->Amount->headerCellClass() ?>"><div id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $deposit_pettycash->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->Amount) ?>',1);"><div id="elh_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $deposit_pettycash->CreatedBy->headerCellClass() ?>"><div id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $deposit_pettycash->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->CreatedBy) ?>',1);"><div id="elh_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $deposit_pettycash->CreatedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $deposit_pettycash->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->CreatedDateTime) ?>',1);"><div id="elh_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $deposit_pettycash->ModifiedBy->headerCellClass() ?>"><div id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $deposit_pettycash->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->ModifiedBy) ?>',1);"><div id="elh_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $deposit_pettycash->ModifiedDateTime->headerCellClass() ?>"><div id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $deposit_pettycash->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->ModifiedDateTime) ?>',1);"><div id="elh_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->ModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->ModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($deposit_pettycash->HospID->Visible) { // HospID ?>
	<?php if ($deposit_pettycash->sortUrl($deposit_pettycash->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $deposit_pettycash->HospID->headerCellClass() ?>"><div id="elh_deposit_pettycash_HospID" class="deposit_pettycash_HospID"><div class="ew-table-header-caption"><?php echo $deposit_pettycash->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $deposit_pettycash->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $deposit_pettycash->SortUrl($deposit_pettycash->HospID) ?>',1);"><div id="elh_deposit_pettycash_HospID" class="deposit_pettycash_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $deposit_pettycash->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($deposit_pettycash->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($deposit_pettycash->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$deposit_pettycash_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($deposit_pettycash->ExportAll && $deposit_pettycash->isExport()) {
	$deposit_pettycash_list->StopRec = $deposit_pettycash_list->TotalRecs;
} else {

	// Set the last record to display
	if ($deposit_pettycash_list->TotalRecs > $deposit_pettycash_list->StartRec + $deposit_pettycash_list->DisplayRecs - 1)
		$deposit_pettycash_list->StopRec = $deposit_pettycash_list->StartRec + $deposit_pettycash_list->DisplayRecs - 1;
	else
		$deposit_pettycash_list->StopRec = $deposit_pettycash_list->TotalRecs;
}
$deposit_pettycash_list->RecCnt = $deposit_pettycash_list->StartRec - 1;
if ($deposit_pettycash_list->Recordset && !$deposit_pettycash_list->Recordset->EOF) {
	$deposit_pettycash_list->Recordset->moveFirst();
	$selectLimit = $deposit_pettycash_list->UseSelectLimit;
	if (!$selectLimit && $deposit_pettycash_list->StartRec > 1)
		$deposit_pettycash_list->Recordset->move($deposit_pettycash_list->StartRec - 1);
} elseif (!$deposit_pettycash->AllowAddDeleteRow && $deposit_pettycash_list->StopRec == 0) {
	$deposit_pettycash_list->StopRec = $deposit_pettycash->GridAddRowCount;
}

// Initialize aggregate
$deposit_pettycash->RowType = ROWTYPE_AGGREGATEINIT;
$deposit_pettycash->resetAttributes();
$deposit_pettycash_list->renderRow();
while ($deposit_pettycash_list->RecCnt < $deposit_pettycash_list->StopRec) {
	$deposit_pettycash_list->RecCnt++;
	if ($deposit_pettycash_list->RecCnt >= $deposit_pettycash_list->StartRec) {
		$deposit_pettycash_list->RowCnt++;

		// Set up key count
		$deposit_pettycash_list->KeyCount = $deposit_pettycash_list->RowIndex;

		// Init row class and style
		$deposit_pettycash->resetAttributes();
		$deposit_pettycash->CssClass = "";
		if ($deposit_pettycash->isGridAdd()) {
		} else {
			$deposit_pettycash_list->loadRowValues($deposit_pettycash_list->Recordset); // Load row values
		}
		$deposit_pettycash->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$deposit_pettycash->RowAttrs = array_merge($deposit_pettycash->RowAttrs, array('data-rowindex'=>$deposit_pettycash_list->RowCnt, 'id'=>'r' . $deposit_pettycash_list->RowCnt . '_deposit_pettycash', 'data-rowtype'=>$deposit_pettycash->RowType));

		// Render row
		$deposit_pettycash_list->renderRow();

		// Render list options
		$deposit_pettycash_list->renderListOptions();
?>
	<tr<?php echo $deposit_pettycash->rowAttributes() ?>>
<?php

// Render list options (body, left)
$deposit_pettycash_list->ListOptions->render("body", "left", $deposit_pettycash_list->RowCnt);
?>
	<?php if ($deposit_pettycash->id->Visible) { // id ?>
		<td data-name="id"<?php echo $deposit_pettycash->id->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_id" class="deposit_pettycash_id">
<span<?php echo $deposit_pettycash->id->viewAttributes() ?>>
<?php echo $deposit_pettycash->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
		<td data-name="TransType"<?php echo $deposit_pettycash->TransType->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
<span<?php echo $deposit_pettycash->TransType->viewAttributes() ?>>
<?php echo $deposit_pettycash->TransType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
		<td data-name="ShiftNumber"<?php echo $deposit_pettycash->ShiftNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
<span<?php echo $deposit_pettycash->ShiftNumber->viewAttributes() ?>>
<?php echo $deposit_pettycash->ShiftNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
		<td data-name="TerminalNumber"<?php echo $deposit_pettycash->TerminalNumber->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
<span<?php echo $deposit_pettycash->TerminalNumber->viewAttributes() ?>>
<?php echo $deposit_pettycash->TerminalNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->User->Visible) { // User ?>
		<td data-name="User"<?php echo $deposit_pettycash->User->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_User" class="deposit_pettycash_User">
<span<?php echo $deposit_pettycash->User->viewAttributes() ?>>
<?php echo $deposit_pettycash->User->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<td data-name="OpenedDateTime"<?php echo $deposit_pettycash->OpenedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
<span<?php echo $deposit_pettycash->OpenedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->OpenedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
		<td data-name="AccoundHead"<?php echo $deposit_pettycash->AccoundHead->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
<span<?php echo $deposit_pettycash->AccoundHead->viewAttributes() ?>>
<?php echo $deposit_pettycash->AccoundHead->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $deposit_pettycash->Amount->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
<span<?php echo $deposit_pettycash->Amount->viewAttributes() ?>>
<?php echo $deposit_pettycash->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $deposit_pettycash->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
<span<?php echo $deposit_pettycash->CreatedBy->viewAttributes() ?>>
<?php echo $deposit_pettycash->CreatedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $deposit_pettycash->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
<span<?php echo $deposit_pettycash->CreatedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $deposit_pettycash->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
<span<?php echo $deposit_pettycash->ModifiedBy->viewAttributes() ?>>
<?php echo $deposit_pettycash->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime"<?php echo $deposit_pettycash->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
<span<?php echo $deposit_pettycash->ModifiedDateTime->viewAttributes() ?>>
<?php echo $deposit_pettycash->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($deposit_pettycash->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $deposit_pettycash->HospID->cellAttributes() ?>>
<span id="el<?php echo $deposit_pettycash_list->RowCnt ?>_deposit_pettycash_HospID" class="deposit_pettycash_HospID">
<span<?php echo $deposit_pettycash->HospID->viewAttributes() ?>>
<?php echo $deposit_pettycash->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$deposit_pettycash_list->ListOptions->render("body", "right", $deposit_pettycash_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$deposit_pettycash->isGridAdd())
		$deposit_pettycash_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$deposit_pettycash->RowType = ROWTYPE_AGGREGATE;
$deposit_pettycash->resetAttributes();
$deposit_pettycash_list->renderRow();
?>
<?php if ($deposit_pettycash_list->TotalRecs > 0 && !$deposit_pettycash->isGridAdd() && !$deposit_pettycash->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$deposit_pettycash_list->renderListOptions();

// Render list options (footer, left)
$deposit_pettycash_list->ListOptions->render("footer", "left");
?>
	<?php if ($deposit_pettycash->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $deposit_pettycash->id->footerCellClass() ?>"><span id="elf_deposit_pettycash_id" class="deposit_pettycash_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->TransType->Visible) { // TransType ?>
		<td data-name="TransType" class="<?php echo $deposit_pettycash->TransType->footerCellClass() ?>"><span id="elf_deposit_pettycash_TransType" class="deposit_pettycash_TransType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->ShiftNumber->Visible) { // ShiftNumber ?>
		<td data-name="ShiftNumber" class="<?php echo $deposit_pettycash->ShiftNumber->footerCellClass() ?>"><span id="elf_deposit_pettycash_ShiftNumber" class="deposit_pettycash_ShiftNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->TerminalNumber->Visible) { // TerminalNumber ?>
		<td data-name="TerminalNumber" class="<?php echo $deposit_pettycash->TerminalNumber->footerCellClass() ?>"><span id="elf_deposit_pettycash_TerminalNumber" class="deposit_pettycash_TerminalNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->User->Visible) { // User ?>
		<td data-name="User" class="<?php echo $deposit_pettycash->User->footerCellClass() ?>"><span id="elf_deposit_pettycash_User" class="deposit_pettycash_User">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->OpenedDateTime->Visible) { // OpenedDateTime ?>
		<td data-name="OpenedDateTime" class="<?php echo $deposit_pettycash->OpenedDateTime->footerCellClass() ?>"><span id="elf_deposit_pettycash_OpenedDateTime" class="deposit_pettycash_OpenedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->AccoundHead->Visible) { // AccoundHead ?>
		<td data-name="AccoundHead" class="<?php echo $deposit_pettycash->AccoundHead->footerCellClass() ?>"><span id="elf_deposit_pettycash_AccoundHead" class="deposit_pettycash_AccoundHead">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $deposit_pettycash->Amount->footerCellClass() ?>"><span id="elf_deposit_pettycash_Amount" class="deposit_pettycash_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $deposit_pettycash->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" class="<?php echo $deposit_pettycash->CreatedBy->footerCellClass() ?>"><span id="elf_deposit_pettycash_CreatedBy" class="deposit_pettycash_CreatedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" class="<?php echo $deposit_pettycash->CreatedDateTime->footerCellClass() ?>"><span id="elf_deposit_pettycash_CreatedDateTime" class="deposit_pettycash_CreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" class="<?php echo $deposit_pettycash->ModifiedBy->footerCellClass() ?>"><span id="elf_deposit_pettycash_ModifiedBy" class="deposit_pettycash_ModifiedBy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime" class="<?php echo $deposit_pettycash->ModifiedDateTime->footerCellClass() ?>"><span id="elf_deposit_pettycash_ModifiedDateTime" class="deposit_pettycash_ModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($deposit_pettycash->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $deposit_pettycash->HospID->footerCellClass() ?>"><span id="elf_deposit_pettycash_HospID" class="deposit_pettycash_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$deposit_pettycash_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$deposit_pettycash->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($deposit_pettycash_list->Recordset)
	$deposit_pettycash_list->Recordset->Close();
?>
<?php if (!$deposit_pettycash->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$deposit_pettycash->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($deposit_pettycash_list->Pager)) $deposit_pettycash_list->Pager = new NumericPager($deposit_pettycash_list->StartRec, $deposit_pettycash_list->DisplayRecs, $deposit_pettycash_list->TotalRecs, $deposit_pettycash_list->RecRange, $deposit_pettycash_list->AutoHidePager) ?>
<?php if ($deposit_pettycash_list->Pager->RecordCount > 0 && $deposit_pettycash_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($deposit_pettycash_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($deposit_pettycash_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $deposit_pettycash_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($deposit_pettycash_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $deposit_pettycash_list->pageUrl() ?>start=<?php echo $deposit_pettycash_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($deposit_pettycash_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $deposit_pettycash_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $deposit_pettycash_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $deposit_pettycash_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($deposit_pettycash_list->TotalRecs > 0 && (!$deposit_pettycash_list->AutoHidePageSizeSelector || $deposit_pettycash_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="deposit_pettycash">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($deposit_pettycash_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($deposit_pettycash_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($deposit_pettycash_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($deposit_pettycash_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($deposit_pettycash_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($deposit_pettycash_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($deposit_pettycash->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $deposit_pettycash_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($deposit_pettycash_list->TotalRecs == 0 && !$deposit_pettycash->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $deposit_pettycash_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$deposit_pettycash_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$deposit_pettycash->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$deposit_pettycash->isExport()) { ?>
<script>
ew.scrollableTable("gmp_deposit_pettycash", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$deposit_pettycash_list->terminate();
?>