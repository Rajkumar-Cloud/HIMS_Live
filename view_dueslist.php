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
$view_dues_list = new view_dues_list();

// Run the page
$view_dues_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dues_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dues->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dueslist = currentForm = new ew.Form("fview_dueslist", "list");
fview_dueslist.formKeyCountName = '<?php echo $view_dues_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dueslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dueslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_dueslistsrch = currentSearchForm = new ew.Form("fview_dueslistsrch");

// Validate function for search
fview_dueslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dues->Amount->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dueslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dueslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dueslistsrch.filterList = <?php echo $view_dues_list->getFilterList() ?>;
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
<?php if (!$view_dues->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dues_list->TotalRecs > 0 && $view_dues_list->ExportOptions->visible()) { ?>
<?php $view_dues_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dues_list->ImportOptions->visible()) { ?>
<?php $view_dues_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dues_list->SearchOptions->visible()) { ?>
<?php $view_dues_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dues_list->FilterOptions->visible()) { ?>
<?php $view_dues_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_dues_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dues->isExport() && !$view_dues->CurrentAction) { ?>
<form name="fview_dueslistsrch" id="fview_dueslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dues_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dueslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dues">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dues_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dues->RowType = ROWTYPE_SEARCH;

// Render row
$view_dues->resetAttributes();
$view_dues_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dues->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_dues->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dues" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dues->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dues->PatientId->EditValue ?>"<?php echo $view_dues->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_dues->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_dues->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dues" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dues->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dues->PatientName->EditValue ?>"<?php echo $view_dues->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_dues->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="xsc_ModeofPayment" class="ew-cell form-group">
		<label for="x_ModeofPayment" class="ew-search-caption ew-label"><?php echo $view_dues->ModeofPayment->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dues" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dues->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dues->ModeofPayment->EditValue ?>"<?php echo $view_dues->ModeofPayment->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_dues->Amount->Visible) { // Amount ?>
	<div id="xsc_Amount" class="ew-cell form-group">
		<label for="x_Amount" class="ew-search-caption ew-label"><?php echo $view_dues->Amount->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Amount" id="z_Amount" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dues->Amount->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dues" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_dues->Amount->getPlaceHolder()) ?>" value="<?php echo $view_dues->Amount->EditValue ?>"<?php echo $view_dues->Amount->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_Amount style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Amount style="d-none"">
<input type="text" data-table="view_dues" data-field="x_Amount" name="y_Amount" id="y_Amount" size="30" placeholder="<?php echo HtmlEncode($view_dues->Amount->getPlaceHolder()) ?>" value="<?php echo $view_dues->Amount->EditValue2 ?>"<?php echo $view_dues->Amount->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dues_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dues_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dues_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dues_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dues_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dues_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dues_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dues_list->showPageHeader(); ?>
<?php
$view_dues_list->showMessage();
?>
<?php if ($view_dues_list->TotalRecs > 0 || $view_dues->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dues_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dues">
<?php if (!$view_dues->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dues->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dues_list->Pager)) $view_dues_list->Pager = new NumericPager($view_dues_list->StartRec, $view_dues_list->DisplayRecs, $view_dues_list->TotalRecs, $view_dues_list->RecRange, $view_dues_list->AutoHidePager) ?>
<?php if ($view_dues_list->Pager->RecordCount > 0 && $view_dues_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dues_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dues_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dues_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dues_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dues_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dues_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dues_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dues_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dues_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dues_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dues_list->TotalRecs > 0 && (!$view_dues_list->AutoHidePageSizeSelector || $view_dues_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dues">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dues_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dues_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dues_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dues_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dues_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dues_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dues->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dues_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dueslist" id="fview_dueslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dues_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dues_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dues">
<div id="gmp_view_dues" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dues_list->TotalRecs > 0 || $view_dues->isGridEdit()) { ?>
<table id="tbl_view_dueslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dues_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dues_list->renderListOptions();

// Render list options (header, left)
$view_dues_list->ListOptions->render("header", "left");
?>
<?php if ($view_dues->id->Visible) { // id ?>
	<?php if ($view_dues->sortUrl($view_dues->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_dues->id->headerCellClass() ?>"><div id="elh_view_dues_id" class="view_dues_id"><div class="ew-table-header-caption"><?php echo $view_dues->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_dues->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->id) ?>',1);"><div id="elh_view_dues_id" class="view_dues_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dues->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dues->sortUrl($view_dues->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_dues->PatientId->headerCellClass() ?>"><div id="elh_view_dues_PatientId" class="view_dues_PatientId"><div class="ew-table-header-caption"><?php echo $view_dues->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_dues->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->PatientId) ?>',1);"><div id="elh_view_dues_PatientId" class="view_dues_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->mrnno->Visible) { // mrnno ?>
	<?php if ($view_dues->sortUrl($view_dues->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_dues->mrnno->headerCellClass() ?>"><div id="elh_view_dues_mrnno" class="view_dues_mrnno"><div class="ew-table-header-caption"><?php echo $view_dues->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_dues->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->mrnno) ?>',1);"><div id="elh_view_dues_mrnno" class="view_dues_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dues->sortUrl($view_dues->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dues->PatientName->headerCellClass() ?>"><div id="elh_view_dues_PatientName" class="view_dues_PatientName"><div class="ew-table-header-caption"><?php echo $view_dues->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dues->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->PatientName) ?>',1);"><div id="elh_view_dues_PatientName" class="view_dues_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->Mobile->Visible) { // Mobile ?>
	<?php if ($view_dues->sortUrl($view_dues->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_dues->Mobile->headerCellClass() ?>"><div id="elh_view_dues_Mobile" class="view_dues_Mobile"><div class="ew-table-header-caption"><?php echo $view_dues->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_dues->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->Mobile) ?>',1);"><div id="elh_view_dues_Mobile" class="view_dues_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_dues->sortUrl($view_dues->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_dues->voucher_type->headerCellClass() ?>"><div id="elh_view_dues_voucher_type" class="view_dues_voucher_type"><div class="ew-table-header-caption"><?php echo $view_dues->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_dues->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->voucher_type) ?>',1);"><div id="elh_view_dues_voucher_type" class="view_dues_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->Details->Visible) { // Details ?>
	<?php if ($view_dues->sortUrl($view_dues->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_dues->Details->headerCellClass() ?>"><div id="elh_view_dues_Details" class="view_dues_Details"><div class="ew-table-header-caption"><?php echo $view_dues->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_dues->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->Details) ?>',1);"><div id="elh_view_dues_Details" class="view_dues_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dues->sortUrl($view_dues->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dues->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dues_ModeofPayment" class="view_dues_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_dues->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dues->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->ModeofPayment) ?>',1);"><div id="elh_view_dues_ModeofPayment" class="view_dues_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->Amount->Visible) { // Amount ?>
	<?php if ($view_dues->sortUrl($view_dues->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_dues->Amount->headerCellClass() ?>"><div id="elh_view_dues_Amount" class="view_dues_Amount"><div class="ew-table-header-caption"><?php echo $view_dues->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_dues->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->Amount) ?>',1);"><div id="elh_view_dues_Amount" class="view_dues_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dues->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_dues->sortUrl($view_dues->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_dues->AnyDues->headerCellClass() ?>"><div id="elh_view_dues_AnyDues" class="view_dues_AnyDues"><div class="ew-table-header-caption"><?php echo $view_dues->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_dues->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->AnyDues) ?>',1);"><div id="elh_view_dues_AnyDues" class="view_dues_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->createdby->Visible) { // createdby ?>
	<?php if ($view_dues->sortUrl($view_dues->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dues->createdby->headerCellClass() ?>"><div id="elh_view_dues_createdby" class="view_dues_createdby"><div class="ew-table-header-caption"><?php echo $view_dues->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dues->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->createdby) ?>',1);"><div id="elh_view_dues_createdby" class="view_dues_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dues->sortUrl($view_dues->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dues->createddatetime->headerCellClass() ?>"><div id="elh_view_dues_createddatetime" class="view_dues_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dues->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dues->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->createddatetime) ?>',1);"><div id="elh_view_dues_createddatetime" class="view_dues_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dues->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_dues->sortUrl($view_dues->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_dues->modifiedby->headerCellClass() ?>"><div id="elh_view_dues_modifiedby" class="view_dues_modifiedby"><div class="ew-table-header-caption"><?php echo $view_dues->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_dues->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->modifiedby) ?>',1);"><div id="elh_view_dues_modifiedby" class="view_dues_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dues->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_dues->sortUrl($view_dues->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dues->modifieddatetime->headerCellClass() ?>"><div id="elh_view_dues_modifieddatetime" class="view_dues_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_dues->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dues->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->modifieddatetime) ?>',1);"><div id="elh_view_dues_modifieddatetime" class="view_dues_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dues->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dues->HospID->Visible) { // HospID ?>
	<?php if ($view_dues->sortUrl($view_dues->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dues->HospID->headerCellClass() ?>"><div id="elh_view_dues_HospID" class="view_dues_HospID"><div class="ew-table-header-caption"><?php echo $view_dues->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dues->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dues->SortUrl($view_dues->HospID) ?>',1);"><div id="elh_view_dues_HospID" class="view_dues_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dues->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dues->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dues->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dues_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dues->ExportAll && $view_dues->isExport()) {
	$view_dues_list->StopRec = $view_dues_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dues_list->TotalRecs > $view_dues_list->StartRec + $view_dues_list->DisplayRecs - 1)
		$view_dues_list->StopRec = $view_dues_list->StartRec + $view_dues_list->DisplayRecs - 1;
	else
		$view_dues_list->StopRec = $view_dues_list->TotalRecs;
}
$view_dues_list->RecCnt = $view_dues_list->StartRec - 1;
if ($view_dues_list->Recordset && !$view_dues_list->Recordset->EOF) {
	$view_dues_list->Recordset->moveFirst();
	$selectLimit = $view_dues_list->UseSelectLimit;
	if (!$selectLimit && $view_dues_list->StartRec > 1)
		$view_dues_list->Recordset->move($view_dues_list->StartRec - 1);
} elseif (!$view_dues->AllowAddDeleteRow && $view_dues_list->StopRec == 0) {
	$view_dues_list->StopRec = $view_dues->GridAddRowCount;
}

// Initialize aggregate
$view_dues->RowType = ROWTYPE_AGGREGATEINIT;
$view_dues->resetAttributes();
$view_dues_list->renderRow();
while ($view_dues_list->RecCnt < $view_dues_list->StopRec) {
	$view_dues_list->RecCnt++;
	if ($view_dues_list->RecCnt >= $view_dues_list->StartRec) {
		$view_dues_list->RowCnt++;

		// Set up key count
		$view_dues_list->KeyCount = $view_dues_list->RowIndex;

		// Init row class and style
		$view_dues->resetAttributes();
		$view_dues->CssClass = "";
		if ($view_dues->isGridAdd()) {
		} else {
			$view_dues_list->loadRowValues($view_dues_list->Recordset); // Load row values
		}
		$view_dues->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dues->RowAttrs = array_merge($view_dues->RowAttrs, array('data-rowindex'=>$view_dues_list->RowCnt, 'id'=>'r' . $view_dues_list->RowCnt . '_view_dues', 'data-rowtype'=>$view_dues->RowType));

		// Render row
		$view_dues_list->renderRow();

		// Render list options
		$view_dues_list->renderListOptions();
?>
	<tr<?php echo $view_dues->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dues_list->ListOptions->render("body", "left", $view_dues_list->RowCnt);
?>
	<?php if ($view_dues->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_dues->id->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_id" class="view_dues_id">
<span<?php echo $view_dues->id->viewAttributes() ?>>
<?php echo $view_dues->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_dues->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_PatientId" class="view_dues_PatientId">
<span<?php echo $view_dues->PatientId->viewAttributes() ?>>
<?php echo $view_dues->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_dues->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_mrnno" class="view_dues_mrnno">
<span<?php echo $view_dues->mrnno->viewAttributes() ?>>
<?php echo $view_dues->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_dues->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_PatientName" class="view_dues_PatientName">
<span<?php echo $view_dues->PatientName->viewAttributes() ?>>
<?php echo $view_dues->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_dues->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_Mobile" class="view_dues_Mobile">
<span<?php echo $view_dues->Mobile->viewAttributes() ?>>
<?php echo $view_dues->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_dues->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_voucher_type" class="view_dues_voucher_type">
<span<?php echo $view_dues->voucher_type->viewAttributes() ?>>
<?php echo $view_dues->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_dues->Details->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_Details" class="view_dues_Details">
<span<?php echo $view_dues->Details->viewAttributes() ?>>
<?php echo $view_dues->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_dues->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_ModeofPayment" class="view_dues_ModeofPayment">
<span<?php echo $view_dues->ModeofPayment->viewAttributes() ?>>
<?php echo $view_dues->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_dues->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_Amount" class="view_dues_Amount">
<span<?php echo $view_dues->Amount->viewAttributes() ?>>
<?php echo $view_dues->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_dues->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_AnyDues" class="view_dues_AnyDues">
<span<?php echo $view_dues->AnyDues->viewAttributes() ?>>
<?php echo $view_dues->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_dues->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_createdby" class="view_dues_createdby">
<span<?php echo $view_dues->createdby->viewAttributes() ?>>
<?php echo $view_dues->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_dues->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_createddatetime" class="view_dues_createddatetime">
<span<?php echo $view_dues->createddatetime->viewAttributes() ?>>
<?php echo $view_dues->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_dues->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_modifiedby" class="view_dues_modifiedby">
<span<?php echo $view_dues->modifiedby->viewAttributes() ?>>
<?php echo $view_dues->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_dues->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_modifieddatetime" class="view_dues_modifieddatetime">
<span<?php echo $view_dues->modifieddatetime->viewAttributes() ?>>
<?php echo $view_dues->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dues->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dues->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dues_list->RowCnt ?>_view_dues_HospID" class="view_dues_HospID">
<span<?php echo $view_dues->HospID->viewAttributes() ?>>
<?php echo $view_dues->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dues_list->ListOptions->render("body", "right", $view_dues_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dues->isGridAdd())
		$view_dues_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dues->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dues_list->Recordset)
	$view_dues_list->Recordset->Close();
?>
<?php if (!$view_dues->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dues->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dues_list->Pager)) $view_dues_list->Pager = new NumericPager($view_dues_list->StartRec, $view_dues_list->DisplayRecs, $view_dues_list->TotalRecs, $view_dues_list->RecRange, $view_dues_list->AutoHidePager) ?>
<?php if ($view_dues_list->Pager->RecordCount > 0 && $view_dues_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dues_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dues_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dues_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dues_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dues_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dues_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dues_list->pageUrl() ?>start=<?php echo $view_dues_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dues_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dues_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dues_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dues_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dues_list->TotalRecs > 0 && (!$view_dues_list->AutoHidePageSizeSelector || $view_dues_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dues">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dues_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dues_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dues_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dues_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dues_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dues_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dues->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dues_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dues_list->TotalRecs == 0 && !$view_dues->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dues_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dues_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dues->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dues->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dues", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dues_list->terminate();
?>