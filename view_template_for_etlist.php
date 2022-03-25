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
$view_template_for_et_list = new view_template_for_et_list();

// Run the page
$view_template_for_et_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_template_for_et_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_template_for_et->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_template_for_etlist = currentForm = new ew.Form("fview_template_for_etlist", "list");
fview_template_for_etlist.formKeyCountName = '<?php echo $view_template_for_et_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_template_for_etlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_template_for_etlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_template_for_etlistsrch = currentSearchForm = new ew.Form("fview_template_for_etlistsrch");

// Validate function for search
fview_template_for_etlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_template_for_et->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OPUDATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_template_for_et->OPUDATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_template_for_etlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_template_for_etlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_template_for_etlistsrch.filterList = <?php echo $view_template_for_et_list->getFilterList() ?>;
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
<?php if (!$view_template_for_et->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_template_for_et_list->TotalRecs > 0 && $view_template_for_et_list->ExportOptions->visible()) { ?>
<?php $view_template_for_et_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_for_et_list->ImportOptions->visible()) { ?>
<?php $view_template_for_et_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_for_et_list->SearchOptions->visible()) { ?>
<?php $view_template_for_et_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_for_et_list->FilterOptions->visible()) { ?>
<?php $view_template_for_et_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_template_for_et_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_template_for_et->isExport() && !$view_template_for_et->CurrentAction) { ?>
<form name="fview_template_for_etlistsrch" id="fview_template_for_etlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_template_for_et_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_template_for_etlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_template_for_et">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_template_for_et_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_template_for_et->RowType = ROWTYPE_SEARCH;

// Render row
$view_template_for_et->resetAttributes();
$view_template_for_et_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_template_for_et->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_template_for_et->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_et->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->PatientName->EditValue ?>"<?php echo $view_template_for_et->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_et->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_template_for_et->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_et->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->PatientID->EditValue ?>"<?php echo $view_template_for_et->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_template_for_et->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_template_for_et->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_et->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->PartnerName->EditValue ?>"<?php echo $view_template_for_et->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_et->PartnerID->Visible) { // PartnerID ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_template_for_et->PartnerID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_et->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->PartnerID->EditValue ?>"<?php echo $view_template_for_et->PartnerID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_template_for_et->RIDNO->Visible) { // RIDNO ?>
	<div id="xsc_RIDNO" class="ew-cell form-group">
		<label for="x_RIDNO" class="ew-search-caption ew-label"><?php echo $view_template_for_et->RIDNO->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_template_for_et->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->RIDNO->EditValue ?>"<?php echo $view_template_for_et->RIDNO->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_template_for_et->Treatment->Visible) { // Treatment ?>
	<div id="xsc_Treatment" class="ew-cell form-group">
		<label for="x_Treatment" class="ew-search-caption ew-label"><?php echo $view_template_for_et->Treatment->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Treatment" id="z_Treatment" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_template_for_et->Treatment->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->Treatment->EditValue ?>"<?php echo $view_template_for_et->Treatment->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_template_for_et->OPUDATE->Visible) { // OPUDATE ?>
	<div id="xsc_OPUDATE" class="ew-cell form-group">
		<label for="x_OPUDATE" class="ew-search-caption ew-label"><?php echo $view_template_for_et->OPUDATE->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OPUDATE" id="z_OPUDATE" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_template_for_et" data-field="x_OPUDATE" name="x_OPUDATE" id="x_OPUDATE" placeholder="<?php echo HtmlEncode($view_template_for_et->OPUDATE->getPlaceHolder()) ?>" value="<?php echo $view_template_for_et->OPUDATE->EditValue ?>"<?php echo $view_template_for_et->OPUDATE->editAttributes() ?>>
<?php if (!$view_template_for_et->OPUDATE->ReadOnly && !$view_template_for_et->OPUDATE->Disabled && !isset($view_template_for_et->OPUDATE->EditAttrs["readonly"]) && !isset($view_template_for_et->OPUDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_template_for_etlistsrch", "x_OPUDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_template_for_et_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_template_for_et_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_template_for_et_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_template_for_et_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_template_for_et_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_template_for_et_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_template_for_et_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_template_for_et_list->showPageHeader(); ?>
<?php
$view_template_for_et_list->showMessage();
?>
<?php if ($view_template_for_et_list->TotalRecs > 0 || $view_template_for_et->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_template_for_et_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_template_for_et">
<?php if (!$view_template_for_et->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_template_for_et->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_template_for_et_list->Pager)) $view_template_for_et_list->Pager = new NumericPager($view_template_for_et_list->StartRec, $view_template_for_et_list->DisplayRecs, $view_template_for_et_list->TotalRecs, $view_template_for_et_list->RecRange, $view_template_for_et_list->AutoHidePager) ?>
<?php if ($view_template_for_et_list->Pager->RecordCount > 0 && $view_template_for_et_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_template_for_et_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_et_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_template_for_et_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_template_for_et_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_et_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_et_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_template_for_et_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_template_for_et_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_template_for_et_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_template_for_et_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_template_for_et_list->TotalRecs > 0 && (!$view_template_for_et_list->AutoHidePageSizeSelector || $view_template_for_et_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_template_for_et">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_template_for_et_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_template_for_et_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_template_for_et_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_template_for_et_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_template_for_et_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_template_for_et_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_template_for_et->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_template_for_et_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_template_for_etlist" id="fview_template_for_etlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_template_for_et_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_template_for_et_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_template_for_et">
<div id="gmp_view_template_for_et" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_template_for_et_list->TotalRecs > 0 || $view_template_for_et->isGridEdit()) { ?>
<table id="tbl_view_template_for_etlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_template_for_et_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_template_for_et_list->renderListOptions();

// Render list options (header, left)
$view_template_for_et_list->ListOptions->render("header", "left");
?>
<?php if ($view_template_for_et->id->Visible) { // id ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_template_for_et->id->headerCellClass() ?>"><div id="elh_view_template_for_et_id" class="view_template_for_et_id"><div class="ew-table-header-caption"><?php echo $view_template_for_et->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_template_for_et->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->id) ?>',1);"><div id="elh_view_template_for_et_id" class="view_template_for_et_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->HospID->Visible) { // HospID ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_template_for_et->HospID->headerCellClass() ?>"><div id="elh_view_template_for_et_HospID" class="view_template_for_et_HospID"><div class="ew-table-header-caption"><?php echo $view_template_for_et->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_template_for_et->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->HospID) ?>',1);"><div id="elh_view_template_for_et_HospID" class="view_template_for_et_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->PatientName->Visible) { // PatientName ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_template_for_et->PatientName->headerCellClass() ?>"><div id="elh_view_template_for_et_PatientName" class="view_template_for_et_PatientName"><div class="ew-table-header-caption"><?php echo $view_template_for_et->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_template_for_et->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->PatientName) ?>',1);"><div id="elh_view_template_for_et_PatientName" class="view_template_for_et_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->PatientID->Visible) { // PatientID ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_template_for_et->PatientID->headerCellClass() ?>"><div id="elh_view_template_for_et_PatientID" class="view_template_for_et_PatientID"><div class="ew-table-header-caption"><?php echo $view_template_for_et->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_template_for_et->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->PatientID) ?>',1);"><div id="elh_view_template_for_et_PatientID" class="view_template_for_et_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_template_for_et->PartnerName->headerCellClass() ?>"><div id="elh_view_template_for_et_PartnerName" class="view_template_for_et_PartnerName"><div class="ew-table-header-caption"><?php echo $view_template_for_et->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_template_for_et->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->PartnerName) ?>',1);"><div id="elh_view_template_for_et_PartnerName" class="view_template_for_et_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_template_for_et->PartnerID->headerCellClass() ?>"><div id="elh_view_template_for_et_PartnerID" class="view_template_for_et_PartnerID"><div class="ew-table-header-caption"><?php echo $view_template_for_et->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_template_for_et->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->PartnerID) ?>',1);"><div id="elh_view_template_for_et_PartnerID" class="view_template_for_et_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_template_for_et->RIDNO->headerCellClass() ?>"><div id="elh_view_template_for_et_RIDNO" class="view_template_for_et_RIDNO"><div class="ew-table-header-caption"><?php echo $view_template_for_et->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_template_for_et->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->RIDNO) ?>',1);"><div id="elh_view_template_for_et_RIDNO" class="view_template_for_et_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->Treatment->Visible) { // Treatment ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_template_for_et->Treatment->headerCellClass() ?>"><div id="elh_view_template_for_et_Treatment" class="view_template_for_et_Treatment"><div class="ew-table-header-caption"><?php echo $view_template_for_et->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_template_for_et->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->Treatment) ?>',1);"><div id="elh_view_template_for_et_Treatment" class="view_template_for_et_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->Ectopic->Visible) { // Ectopic ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $view_template_for_et->Ectopic->headerCellClass() ?>"><div id="elh_view_template_for_et_Ectopic" class="view_template_for_et_Ectopic"><div class="ew-table-header-caption"><?php echo $view_template_for_et->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $view_template_for_et->Ectopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->Ectopic) ?>',1);"><div id="elh_view_template_for_et_Ectopic" class="view_template_for_et_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->Ectopic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->Ectopic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->Ectopic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->OPUDATE->Visible) { // OPUDATE ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->OPUDATE) == "") { ?>
		<th data-name="OPUDATE" class="<?php echo $view_template_for_et->OPUDATE->headerCellClass() ?>"><div id="elh_view_template_for_et_OPUDATE" class="view_template_for_et_OPUDATE"><div class="ew-table-header-caption"><?php echo $view_template_for_et->OPUDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDATE" class="<?php echo $view_template_for_et->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->OPUDATE) ?>',1);"><div id="elh_view_template_for_et_OPUDATE" class="view_template_for_et_OPUDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->OPUDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->OPUDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->OPUDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->ERA->Visible) { // ERA ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->ERA) == "") { ?>
		<th data-name="ERA" class="<?php echo $view_template_for_et->ERA->headerCellClass() ?>"><div id="elh_view_template_for_et_ERA" class="view_template_for_et_ERA"><div class="ew-table-header-caption"><?php echo $view_template_for_et->ERA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ERA" class="<?php echo $view_template_for_et->ERA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->ERA) ?>',1);"><div id="elh_view_template_for_et_ERA" class="view_template_for_et_ERA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->ERA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->ERA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->ERA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->PatientAge->Visible) { // PatientAge ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->PatientAge) == "") { ?>
		<th data-name="PatientAge" class="<?php echo $view_template_for_et->PatientAge->headerCellClass() ?>"><div id="elh_view_template_for_et_PatientAge" class="view_template_for_et_PatientAge"><div class="ew-table-header-caption"><?php echo $view_template_for_et->PatientAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientAge" class="<?php echo $view_template_for_et->PatientAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->PatientAge) ?>',1);"><div id="elh_view_template_for_et_PatientAge" class="view_template_for_et_PatientAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->PatientAge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->PatientAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->PatientAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_for_et->PartnerAge->Visible) { // PartnerAge ?>
	<?php if ($view_template_for_et->sortUrl($view_template_for_et->PartnerAge) == "") { ?>
		<th data-name="PartnerAge" class="<?php echo $view_template_for_et->PartnerAge->headerCellClass() ?>"><div id="elh_view_template_for_et_PartnerAge" class="view_template_for_et_PartnerAge"><div class="ew-table-header-caption"><?php echo $view_template_for_et->PartnerAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerAge" class="<?php echo $view_template_for_et->PartnerAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_for_et->SortUrl($view_template_for_et->PartnerAge) ?>',1);"><div id="elh_view_template_for_et_PartnerAge" class="view_template_for_et_PartnerAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_for_et->PartnerAge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_for_et->PartnerAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_for_et->PartnerAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_template_for_et_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_template_for_et->ExportAll && $view_template_for_et->isExport()) {
	$view_template_for_et_list->StopRec = $view_template_for_et_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_template_for_et_list->TotalRecs > $view_template_for_et_list->StartRec + $view_template_for_et_list->DisplayRecs - 1)
		$view_template_for_et_list->StopRec = $view_template_for_et_list->StartRec + $view_template_for_et_list->DisplayRecs - 1;
	else
		$view_template_for_et_list->StopRec = $view_template_for_et_list->TotalRecs;
}
$view_template_for_et_list->RecCnt = $view_template_for_et_list->StartRec - 1;
if ($view_template_for_et_list->Recordset && !$view_template_for_et_list->Recordset->EOF) {
	$view_template_for_et_list->Recordset->moveFirst();
	$selectLimit = $view_template_for_et_list->UseSelectLimit;
	if (!$selectLimit && $view_template_for_et_list->StartRec > 1)
		$view_template_for_et_list->Recordset->move($view_template_for_et_list->StartRec - 1);
} elseif (!$view_template_for_et->AllowAddDeleteRow && $view_template_for_et_list->StopRec == 0) {
	$view_template_for_et_list->StopRec = $view_template_for_et->GridAddRowCount;
}

// Initialize aggregate
$view_template_for_et->RowType = ROWTYPE_AGGREGATEINIT;
$view_template_for_et->resetAttributes();
$view_template_for_et_list->renderRow();
while ($view_template_for_et_list->RecCnt < $view_template_for_et_list->StopRec) {
	$view_template_for_et_list->RecCnt++;
	if ($view_template_for_et_list->RecCnt >= $view_template_for_et_list->StartRec) {
		$view_template_for_et_list->RowCnt++;

		// Set up key count
		$view_template_for_et_list->KeyCount = $view_template_for_et_list->RowIndex;

		// Init row class and style
		$view_template_for_et->resetAttributes();
		$view_template_for_et->CssClass = "";
		if ($view_template_for_et->isGridAdd()) {
		} else {
			$view_template_for_et_list->loadRowValues($view_template_for_et_list->Recordset); // Load row values
		}
		$view_template_for_et->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_template_for_et->RowAttrs = array_merge($view_template_for_et->RowAttrs, array('data-rowindex'=>$view_template_for_et_list->RowCnt, 'id'=>'r' . $view_template_for_et_list->RowCnt . '_view_template_for_et', 'data-rowtype'=>$view_template_for_et->RowType));

		// Render row
		$view_template_for_et_list->renderRow();

		// Render list options
		$view_template_for_et_list->renderListOptions();
?>
	<tr<?php echo $view_template_for_et->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_template_for_et_list->ListOptions->render("body", "left", $view_template_for_et_list->RowCnt);
?>
	<?php if ($view_template_for_et->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_template_for_et->id->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_id" class="view_template_for_et_id">
<span<?php echo $view_template_for_et->id->viewAttributes() ?>>
<?php echo $view_template_for_et->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_template_for_et->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_HospID" class="view_template_for_et_HospID">
<span<?php echo $view_template_for_et->HospID->viewAttributes() ?>>
<?php echo $view_template_for_et->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_template_for_et->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_PatientName" class="view_template_for_et_PatientName">
<span<?php echo $view_template_for_et->PatientName->viewAttributes() ?>>
<?php echo $view_template_for_et->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_template_for_et->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_PatientID" class="view_template_for_et_PatientID">
<span<?php echo $view_template_for_et->PatientID->viewAttributes() ?>>
<?php echo $view_template_for_et->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_template_for_et->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_PartnerName" class="view_template_for_et_PartnerName">
<span<?php echo $view_template_for_et->PartnerName->viewAttributes() ?>>
<?php echo $view_template_for_et->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_template_for_et->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_PartnerID" class="view_template_for_et_PartnerID">
<span<?php echo $view_template_for_et->PartnerID->viewAttributes() ?>>
<?php echo $view_template_for_et->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_template_for_et->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_RIDNO" class="view_template_for_et_RIDNO">
<span<?php echo $view_template_for_et->RIDNO->viewAttributes() ?>>
<?php echo $view_template_for_et->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $view_template_for_et->Treatment->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_Treatment" class="view_template_for_et_Treatment">
<span<?php echo $view_template_for_et->Treatment->viewAttributes() ?>>
<?php echo $view_template_for_et->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic"<?php echo $view_template_for_et->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_Ectopic" class="view_template_for_et_Ectopic">
<span<?php echo $view_template_for_et->Ectopic->viewAttributes() ?>>
<?php echo $view_template_for_et->Ectopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->OPUDATE->Visible) { // OPUDATE ?>
		<td data-name="OPUDATE"<?php echo $view_template_for_et->OPUDATE->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_OPUDATE" class="view_template_for_et_OPUDATE">
<span<?php echo $view_template_for_et->OPUDATE->viewAttributes() ?>>
<?php echo $view_template_for_et->OPUDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->ERA->Visible) { // ERA ?>
		<td data-name="ERA"<?php echo $view_template_for_et->ERA->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_ERA" class="view_template_for_et_ERA">
<span<?php echo $view_template_for_et->ERA->viewAttributes() ?>>
<?php echo $view_template_for_et->ERA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->PatientAge->Visible) { // PatientAge ?>
		<td data-name="PatientAge"<?php echo $view_template_for_et->PatientAge->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_PatientAge" class="view_template_for_et_PatientAge">
<span<?php echo $view_template_for_et->PatientAge->viewAttributes() ?>>
<?php echo $view_template_for_et->PatientAge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_for_et->PartnerAge->Visible) { // PartnerAge ?>
		<td data-name="PartnerAge"<?php echo $view_template_for_et->PartnerAge->cellAttributes() ?>>
<span id="el<?php echo $view_template_for_et_list->RowCnt ?>_view_template_for_et_PartnerAge" class="view_template_for_et_PartnerAge">
<span<?php echo $view_template_for_et->PartnerAge->viewAttributes() ?>>
<?php echo $view_template_for_et->PartnerAge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_template_for_et_list->ListOptions->render("body", "right", $view_template_for_et_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_template_for_et->isGridAdd())
		$view_template_for_et_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_template_for_et->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_template_for_et_list->Recordset)
	$view_template_for_et_list->Recordset->Close();
?>
<?php if (!$view_template_for_et->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_template_for_et->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_template_for_et_list->Pager)) $view_template_for_et_list->Pager = new NumericPager($view_template_for_et_list->StartRec, $view_template_for_et_list->DisplayRecs, $view_template_for_et_list->TotalRecs, $view_template_for_et_list->RecRange, $view_template_for_et_list->AutoHidePager) ?>
<?php if ($view_template_for_et_list->Pager->RecordCount > 0 && $view_template_for_et_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_template_for_et_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_et_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_template_for_et_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_template_for_et_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_et_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_template_for_et_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_for_et_list->pageUrl() ?>start=<?php echo $view_template_for_et_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_template_for_et_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_template_for_et_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_template_for_et_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_template_for_et_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_template_for_et_list->TotalRecs > 0 && (!$view_template_for_et_list->AutoHidePageSizeSelector || $view_template_for_et_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_template_for_et">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_template_for_et_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_template_for_et_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_template_for_et_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_template_for_et_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_template_for_et_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_template_for_et_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_template_for_et->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_template_for_et_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_template_for_et_list->TotalRecs == 0 && !$view_template_for_et->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_template_for_et_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_template_for_et_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_template_for_et->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_template_for_et_list->terminate();
?>