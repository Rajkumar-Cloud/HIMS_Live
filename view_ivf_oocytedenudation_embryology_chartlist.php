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
$view_ivf_oocytedenudation_embryology_chart_list = new view_ivf_oocytedenudation_embryology_chart_list();

// Run the page
$view_ivf_oocytedenudation_embryology_chart_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_oocytedenudation_embryology_chart_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ivf_oocytedenudation_embryology_chartlist = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartlist", "list");
fview_ivf_oocytedenudation_embryology_chartlist.formKeyCountName = '<?php echo $view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName ?>';

// Validate form
fview_ivf_oocytedenudation_embryology_chartlist.validate = function() {
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
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->id->caption(), $view_ivf_oocytedenudation_embryology_chart->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption(), $view_ivf_oocytedenudation_embryology_chart->OocyteNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Stage->caption(), $view_ivf_oocytedenudation_embryology_chart->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption(), $view_ivf_oocytedenudation_embryology_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->errorMessage()) ?>");
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Name->caption(), $view_ivf_oocytedenudation_embryology_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Day0OocyteStage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0OocyteStage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption(), $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Day0sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0sino");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption(), $view_ivf_oocytedenudation_embryology_chart->Day0sino->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->TidNo->caption(), $view_ivf_oocytedenudation_embryology_chart->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->errorMessage()) ?>");
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DidNO->Required) { ?>
			elm = this.getElements("x" + infix + "_DidNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->DidNO->caption(), $view_ivf_oocytedenudation_embryology_chart->DidNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Remarks->caption(), $view_ivf_oocytedenudation_embryology_chart->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_ivf_oocytedenudation_embryology_chartlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_oocytedenudation_embryology_chartlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ivf_oocytedenudation_embryology_chartlistsrch = currentSearchForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartlistsrch");

// Validate function for search
fview_ivf_oocytedenudation_embryology_chartlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_ivf_oocytedenudation_embryology_chartlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_oocytedenudation_embryology_chartlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_ivf_oocytedenudation_embryology_chartlistsrch.filterList = <?php echo $view_ivf_oocytedenudation_embryology_chart_list->getFilterList() ?>;
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
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs > 0 && $view_ivf_oocytedenudation_embryology_chart_list->ExportOptions->visible()) { ?>
<?php $view_ivf_oocytedenudation_embryology_chart_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->ImportOptions->visible()) { ?>
<?php $view_ivf_oocytedenudation_embryology_chart_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->SearchOptions->visible()) { ?>
<?php $view_ivf_oocytedenudation_embryology_chart_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->FilterOptions->visible()) { ?>
<?php $view_ivf_oocytedenudation_embryology_chart_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport() && !$view_ivf_oocytedenudation_embryology_chart->CurrentAction) { ?>
<form name="fview_ivf_oocytedenudation_embryology_chartlistsrch" id="fview_ivf_oocytedenudation_embryology_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ivf_oocytedenudation_embryology_chart_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ivf_oocytedenudation_embryology_chartlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_ivf_oocytedenudation_embryology_chart_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_ivf_oocytedenudation_embryology_chart->RowType = ROWTYPE_SEARCH;

// Render row
$view_ivf_oocytedenudation_embryology_chart->resetAttributes();
$view_ivf_oocytedenudation_embryology_chart_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
	<div id="xsc_DidNO" class="ew-cell form-group">
		<label for="x_DidNO" class="ew-search-caption ew-label"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DidNO" id="z_DidNO" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ivf_oocytedenudation_embryology_chart_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ivf_oocytedenudation_embryology_chart_list->showPageHeader(); ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_list->showMessage();
?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs > 0 || $view_ivf_oocytedenudation_embryology_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ivf_oocytedenudation_embryology_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_oocytedenudation_embryology_chart">
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ivf_oocytedenudation_embryology_chart_list->Pager)) $view_ivf_oocytedenudation_embryology_chart_list->Pager = new NumericPager($view_ivf_oocytedenudation_embryology_chart_list->StartRec, $view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs, $view_ivf_oocytedenudation_embryology_chart_list->TotalRecs, $view_ivf_oocytedenudation_embryology_chart_list->RecRange, $view_ivf_oocytedenudation_embryology_chart_list->AutoHidePager) ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->RecordCount > 0 && $view_ivf_oocytedenudation_embryology_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ivf_oocytedenudation_embryology_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs > 0 && (!$view_ivf_oocytedenudation_embryology_chart_list->AutoHidePageSizeSelector || $view_ivf_oocytedenudation_embryology_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ivf_oocytedenudation_embryology_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_oocytedenudation_embryology_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ivf_oocytedenudation_embryology_chartlist" id="fview_ivf_oocytedenudation_embryology_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<div id="gmp_view_ivf_oocytedenudation_embryology_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs > 0 || $view_ivf_oocytedenudation_embryology_chart->isAdd() || $view_ivf_oocytedenudation_embryology_chart->isCopy() || $view_ivf_oocytedenudation_embryology_chart->isGridEdit()) { ?>
<table id="tbl_view_ivf_oocytedenudation_embryology_chartlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ivf_oocytedenudation_embryology_chart_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ivf_oocytedenudation_embryology_chart_list->renderListOptions();

// Render list options (header, left)
$view_ivf_oocytedenudation_embryology_chart_list->ListOptions->render("header", "left");
?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->id->Visible) { // id ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->id->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->id) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->OocyteNo) == "") { ?>
		<th data-name="OocyteNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->OocyteNo) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->Stage) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->RIDNo) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->Name) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage) == "") { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->Day0sino) == "") { ?>
		<th data-name="Day0sino" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0sino" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->Day0sino) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->Day0sino->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->TidNo) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->DidNO) == "") { ?>
		<th data-name="DidNO" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DidNO" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->DidNO) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->DidNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->sortUrl($view_ivf_oocytedenudation_embryology_chart->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks"><div class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ivf_oocytedenudation_embryology_chart->SortUrl($view_ivf_oocytedenudation_embryology_chart->Remarks) ?>',1);"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ivf_oocytedenudation_embryology_chart->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ivf_oocytedenudation_embryology_chart_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($view_ivf_oocytedenudation_embryology_chart->isAdd() || $view_ivf_oocytedenudation_embryology_chart->isCopy()) {
		$view_ivf_oocytedenudation_embryology_chart_list->RowIndex = 0;
		$view_ivf_oocytedenudation_embryology_chart_list->KeyCount = $view_ivf_oocytedenudation_embryology_chart_list->RowIndex;
		if ($view_ivf_oocytedenudation_embryology_chart->isCopy() && !$view_ivf_oocytedenudation_embryology_chart_list->loadRow())
			$view_ivf_oocytedenudation_embryology_chart->CurrentAction = "add";
		if ($view_ivf_oocytedenudation_embryology_chart->isAdd())
			$view_ivf_oocytedenudation_embryology_chart_list->loadRowValues();
		if ($view_ivf_oocytedenudation_embryology_chart->EventCancelled) // Insert failed
			$view_ivf_oocytedenudation_embryology_chart_list->restoreFormValues(); // Restore form values

		// Set row properties
		$view_ivf_oocytedenudation_embryology_chart->resetAttributes();
		$view_ivf_oocytedenudation_embryology_chart->RowAttrs = array_merge($view_ivf_oocytedenudation_embryology_chart->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_view_ivf_oocytedenudation_embryology_chart', 'data-rowtype'=>ROWTYPE_ADD));
		$view_ivf_oocytedenudation_embryology_chart->RowType = ROWTYPE_ADD;

		// Render row
		$view_ivf_oocytedenudation_embryology_chart_list->renderRow();

		// Render list options
		$view_ivf_oocytedenudation_embryology_chart_list->renderListOptions();
		$view_ivf_oocytedenudation_embryology_chart_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_ivf_oocytedenudation_embryology_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ivf_oocytedenudation_embryology_chart_list->ListOptions->render("body", "left", $view_ivf_oocytedenudation_embryology_chart_list->RowCnt);
?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_id" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_id" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="form-group view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_OocyteNo" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_OocyteNo" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->OocyteNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="form-group view_ivf_oocytedenudation_embryology_chart_Stage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Stage" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Stage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Stage" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="form-group view_ivf_oocytedenudation_embryology_chart_RIDNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_RIDNo" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_RIDNo" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
		<td data-name="Name">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="form-group view_ivf_oocytedenudation_embryology_chart_Name">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Name" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Name" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="form-group view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0OocyteStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0OocyteStage" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td data-name="Day0sino">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="form-group view_ivf_oocytedenudation_embryology_chart_Day0sino">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0sino" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0sino" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0sino" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0sino" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0sino->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="form-group view_ivf_oocytedenudation_embryology_chart_TidNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_TidNo" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_TidNo" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td data-name="DidNO">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="form-group view_ivf_oocytedenudation_embryology_chart_DidNO">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_DidNO" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_DidNO" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_DidNO" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->DidNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="form-group view_ivf_oocytedenudation_embryology_chart_Remarks">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Remarks" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Remarks" id="o<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Remarks->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ivf_oocytedenudation_embryology_chart_list->ListOptions->render("body", "right", $view_ivf_oocytedenudation_embryology_chart_list->RowCnt);
?>
<script>
fview_ivf_oocytedenudation_embryology_chartlist.updateLists(<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($view_ivf_oocytedenudation_embryology_chart->ExportAll && $view_ivf_oocytedenudation_embryology_chart->isExport()) {
	$view_ivf_oocytedenudation_embryology_chart_list->StopRec = $view_ivf_oocytedenudation_embryology_chart_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs > $view_ivf_oocytedenudation_embryology_chart_list->StartRec + $view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs - 1)
		$view_ivf_oocytedenudation_embryology_chart_list->StopRec = $view_ivf_oocytedenudation_embryology_chart_list->StartRec + $view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs - 1;
	else
		$view_ivf_oocytedenudation_embryology_chart_list->StopRec = $view_ivf_oocytedenudation_embryology_chart_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_ivf_oocytedenudation_embryology_chart_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName) && ($view_ivf_oocytedenudation_embryology_chart->isGridAdd() || $view_ivf_oocytedenudation_embryology_chart->isGridEdit() || $view_ivf_oocytedenudation_embryology_chart->isConfirm())) {
		$view_ivf_oocytedenudation_embryology_chart_list->KeyCount = $CurrentForm->getValue($view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName);
		$view_ivf_oocytedenudation_embryology_chart_list->StopRec = $view_ivf_oocytedenudation_embryology_chart_list->StartRec + $view_ivf_oocytedenudation_embryology_chart_list->KeyCount - 1;
	}
}
$view_ivf_oocytedenudation_embryology_chart_list->RecCnt = $view_ivf_oocytedenudation_embryology_chart_list->StartRec - 1;
if ($view_ivf_oocytedenudation_embryology_chart_list->Recordset && !$view_ivf_oocytedenudation_embryology_chart_list->Recordset->EOF) {
	$view_ivf_oocytedenudation_embryology_chart_list->Recordset->moveFirst();
	$selectLimit = $view_ivf_oocytedenudation_embryology_chart_list->UseSelectLimit;
	if (!$selectLimit && $view_ivf_oocytedenudation_embryology_chart_list->StartRec > 1)
		$view_ivf_oocytedenudation_embryology_chart_list->Recordset->move($view_ivf_oocytedenudation_embryology_chart_list->StartRec - 1);
} elseif (!$view_ivf_oocytedenudation_embryology_chart->AllowAddDeleteRow && $view_ivf_oocytedenudation_embryology_chart_list->StopRec == 0) {
	$view_ivf_oocytedenudation_embryology_chart_list->StopRec = $view_ivf_oocytedenudation_embryology_chart->GridAddRowCount;
}

// Initialize aggregate
$view_ivf_oocytedenudation_embryology_chart->RowType = ROWTYPE_AGGREGATEINIT;
$view_ivf_oocytedenudation_embryology_chart->resetAttributes();
$view_ivf_oocytedenudation_embryology_chart_list->renderRow();
$view_ivf_oocytedenudation_embryology_chart_list->EditRowCnt = 0;
if ($view_ivf_oocytedenudation_embryology_chart->isEdit())
	$view_ivf_oocytedenudation_embryology_chart_list->RowIndex = 1;
while ($view_ivf_oocytedenudation_embryology_chart_list->RecCnt < $view_ivf_oocytedenudation_embryology_chart_list->StopRec) {
	$view_ivf_oocytedenudation_embryology_chart_list->RecCnt++;
	if ($view_ivf_oocytedenudation_embryology_chart_list->RecCnt >= $view_ivf_oocytedenudation_embryology_chart_list->StartRec) {
		$view_ivf_oocytedenudation_embryology_chart_list->RowCnt++;

		// Set up key count
		$view_ivf_oocytedenudation_embryology_chart_list->KeyCount = $view_ivf_oocytedenudation_embryology_chart_list->RowIndex;

		// Init row class and style
		$view_ivf_oocytedenudation_embryology_chart->resetAttributes();
		$view_ivf_oocytedenudation_embryology_chart->CssClass = "";
		if ($view_ivf_oocytedenudation_embryology_chart->isGridAdd()) {
			$view_ivf_oocytedenudation_embryology_chart_list->loadRowValues(); // Load default values
		} else {
			$view_ivf_oocytedenudation_embryology_chart_list->loadRowValues($view_ivf_oocytedenudation_embryology_chart_list->Recordset); // Load row values
		}
		$view_ivf_oocytedenudation_embryology_chart->RowType = ROWTYPE_VIEW; // Render view
		if ($view_ivf_oocytedenudation_embryology_chart->isEdit()) {
			if ($view_ivf_oocytedenudation_embryology_chart_list->checkInlineEditKey() && $view_ivf_oocytedenudation_embryology_chart_list->EditRowCnt == 0) { // Inline edit
				$view_ivf_oocytedenudation_embryology_chart->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_ivf_oocytedenudation_embryology_chart->isEdit() && $view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT && $view_ivf_oocytedenudation_embryology_chart->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_ivf_oocytedenudation_embryology_chart_list->restoreFormValues(); // Restore form values
		}
		if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) // Edit row
			$view_ivf_oocytedenudation_embryology_chart_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_ivf_oocytedenudation_embryology_chart->RowAttrs = array_merge($view_ivf_oocytedenudation_embryology_chart->RowAttrs, array('data-rowindex'=>$view_ivf_oocytedenudation_embryology_chart_list->RowCnt, 'id'=>'r' . $view_ivf_oocytedenudation_embryology_chart_list->RowCnt . '_view_ivf_oocytedenudation_embryology_chart', 'data-rowtype'=>$view_ivf_oocytedenudation_embryology_chart->RowType));

		// Render row
		$view_ivf_oocytedenudation_embryology_chart_list->renderRow();

		// Render list options
		$view_ivf_oocytedenudation_embryology_chart_list->renderListOptions();
?>
	<tr<?php echo $view_ivf_oocytedenudation_embryology_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ivf_oocytedenudation_embryology_chart_list->ListOptions->render("body", "left", $view_ivf_oocytedenudation_embryology_chart_list->RowCnt);
?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ivf_oocytedenudation_embryology_chart->id->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_id" class="form-group view_ivf_oocytedenudation_embryology_chart_id">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ivf_oocytedenudation_embryology_chart->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_id" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_id" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->id->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo"<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="form-group view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_OocyteNo" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="form-group view_ivf_oocytedenudation_embryology_chart_Stage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Stage" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Stage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="form-group view_ivf_oocytedenudation_embryology_chart_RIDNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_RIDNo" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="form-group view_ivf_oocytedenudation_embryology_chart_Name">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Name" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="form-group view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0OocyteStage" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0OocyteStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
		<td data-name="Day0sino"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="form-group view_ivf_oocytedenudation_embryology_chart_Day0sino">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0sino" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Day0sino" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="form-group view_ivf_oocytedenudation_embryology_chart_TidNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_TidNo" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
		<td data-name="DidNO"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="form-group view_ivf_oocytedenudation_embryology_chart_DidNO">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_DidNO" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->cellAttributes() ?>>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="form-group view_ivf_oocytedenudation_embryology_chart_Remarks">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Remarks" id="x<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowCnt ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks">
<span<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->viewAttributes() ?>>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ivf_oocytedenudation_embryology_chart_list->ListOptions->render("body", "right", $view_ivf_oocytedenudation_embryology_chart_list->RowCnt);
?>
	</tr>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_ADD || $view_ivf_oocytedenudation_embryology_chart->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_ivf_oocytedenudation_embryology_chartlist.updateLists(<?php echo $view_ivf_oocytedenudation_embryology_chart_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	if (!$view_ivf_oocytedenudation_embryology_chart->isGridAdd())
		$view_ivf_oocytedenudation_embryology_chart_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->isAdd() || $view_ivf_oocytedenudation_embryology_chart->isCopy()) { ?>
<input type="hidden" name="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName ?>" id="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->KeyCount ?>">
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName ?>" id="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->FormKeyCountName ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->KeyCount ?>">
<?php } ?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ivf_oocytedenudation_embryology_chart_list->Recordset)
	$view_ivf_oocytedenudation_embryology_chart_list->Recordset->Close();
?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ivf_oocytedenudation_embryology_chart_list->Pager)) $view_ivf_oocytedenudation_embryology_chart_list->Pager = new NumericPager($view_ivf_oocytedenudation_embryology_chart_list->StartRec, $view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs, $view_ivf_oocytedenudation_embryology_chart_list->TotalRecs, $view_ivf_oocytedenudation_embryology_chart_list->RecRange, $view_ivf_oocytedenudation_embryology_chart_list->AutoHidePager) ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->RecordCount > 0 && $view_ivf_oocytedenudation_embryology_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ivf_oocytedenudation_embryology_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ivf_oocytedenudation_embryology_chart_list->pageUrl() ?>start=<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ivf_oocytedenudation_embryology_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs > 0 && (!$view_ivf_oocytedenudation_embryology_chart_list->AutoHidePageSizeSelector || $view_ivf_oocytedenudation_embryology_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ivf_oocytedenudation_embryology_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ivf_oocytedenudation_embryology_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ivf_oocytedenudation_embryology_chart_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart_list->TotalRecs == 0 && !$view_ivf_oocytedenudation_embryology_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ivf_oocytedenudation_embryology_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ivf_oocytedenudation_embryology_chart->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ivf_oocytedenudation_embryology_chart", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_list->terminate();
?>