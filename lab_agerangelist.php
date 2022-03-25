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
$lab_agerange_list = new lab_agerange_list();

// Run the page
$lab_agerange_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_agerange_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_agerange->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_agerangelist = currentForm = new ew.Form("flab_agerangelist", "list");
flab_agerangelist.formKeyCountName = '<?php echo $lab_agerange_list->FormKeyCountName ?>';

// Validate form
flab_agerangelist.validate = function() {
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
		<?php if ($lab_agerange_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->id->caption(), $lab_agerange->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_list->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Gender->caption(), $lab_agerange->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_list->MinAge->Required) { ?>
			elm = this.getElements("x" + infix + "_MinAge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MinAge->caption(), $lab_agerange->MinAge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinAge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->MinAge->errorMessage()) ?>");
		<?php if ($lab_agerange_list->MinAgeType->Required) { ?>
			elm = this.getElements("x" + infix + "_MinAgeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MinAgeType->caption(), $lab_agerange->MinAgeType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_list->MaxAge->Required) { ?>
			elm = this.getElements("x" + infix + "_MaxAge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MaxAge->caption(), $lab_agerange->MaxAge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MaxAge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->MaxAge->errorMessage()) ?>");
		<?php if ($lab_agerange_list->MaxAgeType->Required) { ?>
			elm = this.getElements("x" + infix + "_MaxAgeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MaxAgeType->caption(), $lab_agerange->MaxAgeType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_list->Value->Required) { ?>
			elm = this.getElements("x" + infix + "_Value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Value->caption(), $lab_agerange->Value->RequiredErrorMessage)) ?>");
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
flab_agerangelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "MinAge", false)) return false;
	if (ew.valueChanged(fobj, infix, "MinAgeType", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaxAge", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaxAgeType", false)) return false;
	if (ew.valueChanged(fobj, infix, "Value", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_agerangelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_agerangelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_agerangelist.lists["x_Gender"] = <?php echo $lab_agerange_list->Gender->Lookup->toClientList() ?>;
flab_agerangelist.lists["x_Gender"].options = <?php echo JsonEncode($lab_agerange_list->Gender->lookupOptions()) ?>;
flab_agerangelist.lists["x_MinAgeType"] = <?php echo $lab_agerange_list->MinAgeType->Lookup->toClientList() ?>;
flab_agerangelist.lists["x_MinAgeType"].options = <?php echo JsonEncode($lab_agerange_list->MinAgeType->options(FALSE, TRUE)) ?>;
flab_agerangelist.lists["x_MaxAgeType"] = <?php echo $lab_agerange_list->MaxAgeType->Lookup->toClientList() ?>;
flab_agerangelist.lists["x_MaxAgeType"].options = <?php echo JsonEncode($lab_agerange_list->MaxAgeType->options(FALSE, TRUE)) ?>;

// Form object for search
var flab_agerangelistsrch = currentSearchForm = new ew.Form("flab_agerangelistsrch");

// Filters
flab_agerangelistsrch.filterList = <?php echo $lab_agerange_list->getFilterList() ?>;
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
ew.PREVIEW_OVERLAY = true;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_agerange->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_agerange_list->TotalRecs > 0 && $lab_agerange_list->ExportOptions->visible()) { ?>
<?php $lab_agerange_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_agerange_list->ImportOptions->visible()) { ?>
<?php $lab_agerange_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_agerange_list->SearchOptions->visible()) { ?>
<?php $lab_agerange_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_agerange_list->FilterOptions->visible()) { ?>
<?php $lab_agerange_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$lab_agerange->isExport() || EXPORT_MASTER_RECORD && $lab_agerange->isExport("print")) { ?>
<?php
if ($lab_agerange_list->DbMasterFilter <> "" && $lab_agerange->getCurrentMasterTable() == "lab_testname") {
	if ($lab_agerange_list->MasterRecordExists) {
		include_once "lab_testnamemaster.php";
	}
}
?>
<?php } ?>
<?php
$lab_agerange_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_agerange->isExport() && !$lab_agerange->CurrentAction) { ?>
<form name="flab_agerangelistsrch" id="flab_agerangelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_agerange_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_agerangelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_agerange">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_agerange_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_agerange_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_agerange_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_agerange_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_agerange_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_agerange_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_agerange_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_agerange_list->showPageHeader(); ?>
<?php
$lab_agerange_list->showMessage();
?>
<?php if ($lab_agerange_list->TotalRecs > 0 || $lab_agerange->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_agerange_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_agerange">
<?php if (!$lab_agerange->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_agerange->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_agerange_list->Pager)) $lab_agerange_list->Pager = new NumericPager($lab_agerange_list->StartRec, $lab_agerange_list->DisplayRecs, $lab_agerange_list->TotalRecs, $lab_agerange_list->RecRange, $lab_agerange_list->AutoHidePager) ?>
<?php if ($lab_agerange_list->Pager->RecordCount > 0 && $lab_agerange_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_agerange_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_agerange_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_agerange_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_agerange_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_agerange_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_agerange_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_agerange_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_agerange_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_agerange_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_agerange_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_agerange_list->TotalRecs > 0 && (!$lab_agerange_list->AutoHidePageSizeSelector || $lab_agerange_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_agerange">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_agerange_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_agerange_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_agerange_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_agerange_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_agerange_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_agerange_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_agerange->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_agerange_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_agerangelist" id="flab_agerangelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_agerange_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_agerange_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_agerange">
<?php if ($lab_agerange->getCurrentMasterTable() == "lab_testname" && $lab_agerange->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="lab_testname">
<input type="hidden" name="fk_id" value="<?php echo $lab_agerange->testid->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $lab_agerange->TestName->getSessionValue() ?>">
<?php } ?>
<div id="gmp_lab_agerange" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_agerange_list->TotalRecs > 0 || $lab_agerange->isGridEdit()) { ?>
<table id="tbl_lab_agerangelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_agerange_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_agerange_list->renderListOptions();

// Render list options (header, left)
$lab_agerange_list->ListOptions->render("header", "left");
?>
<?php if ($lab_agerange->id->Visible) { // id ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_agerange->id->headerCellClass() ?>"><div id="elh_lab_agerange_id" class="lab_agerange_id"><div class="ew-table-header-caption"><?php echo $lab_agerange->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_agerange->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->id) ?>',1);"><div id="elh_lab_agerange_id" class="lab_agerange_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><div id="elh_lab_agerange_Gender" class="lab_agerange_Gender"><div class="ew-table-header-caption"><?php echo $lab_agerange->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->Gender) ?>',1);"><div id="elh_lab_agerange_Gender" class="lab_agerange_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MinAge) == "") { ?>
		<th data-name="MinAge" class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><div id="elh_lab_agerange_MinAge" class="lab_agerange_MinAge"><div class="ew-table-header-caption"><?php echo $lab_agerange->MinAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinAge" class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->MinAge) ?>',1);"><div id="elh_lab_agerange_MinAge" class="lab_agerange_MinAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MinAge->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MinAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MinAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MinAgeType) == "") { ?>
		<th data-name="MinAgeType" class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><div id="elh_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType"><div class="ew-table-header-caption"><?php echo $lab_agerange->MinAgeType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinAgeType" class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->MinAgeType) ?>',1);"><div id="elh_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MinAgeType->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MinAgeType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MinAgeType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MaxAge) == "") { ?>
		<th data-name="MaxAge" class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><div id="elh_lab_agerange_MaxAge" class="lab_agerange_MaxAge"><div class="ew-table-header-caption"><?php echo $lab_agerange->MaxAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaxAge" class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->MaxAge) ?>',1);"><div id="elh_lab_agerange_MaxAge" class="lab_agerange_MaxAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MaxAge->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MaxAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MaxAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MaxAgeType) == "") { ?>
		<th data-name="MaxAgeType" class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><div id="elh_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType"><div class="ew-table-header-caption"><?php echo $lab_agerange->MaxAgeType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaxAgeType" class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->MaxAgeType) ?>',1);"><div id="elh_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MaxAgeType->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MaxAgeType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MaxAgeType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><div id="elh_lab_agerange_Value" class="lab_agerange_Value"><div class="ew-table-header-caption"><?php echo $lab_agerange->Value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_agerange->SortUrl($lab_agerange->Value) ?>',1);"><div id="elh_lab_agerange_Value" class="lab_agerange_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->Value->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->Value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->Value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_agerange_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_agerange->ExportAll && $lab_agerange->isExport()) {
	$lab_agerange_list->StopRec = $lab_agerange_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_agerange_list->TotalRecs > $lab_agerange_list->StartRec + $lab_agerange_list->DisplayRecs - 1)
		$lab_agerange_list->StopRec = $lab_agerange_list->StartRec + $lab_agerange_list->DisplayRecs - 1;
	else
		$lab_agerange_list->StopRec = $lab_agerange_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $lab_agerange_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_agerange_list->FormKeyCountName) && ($lab_agerange->isGridAdd() || $lab_agerange->isGridEdit() || $lab_agerange->isConfirm())) {
		$lab_agerange_list->KeyCount = $CurrentForm->getValue($lab_agerange_list->FormKeyCountName);
		$lab_agerange_list->StopRec = $lab_agerange_list->StartRec + $lab_agerange_list->KeyCount - 1;
	}
}
$lab_agerange_list->RecCnt = $lab_agerange_list->StartRec - 1;
if ($lab_agerange_list->Recordset && !$lab_agerange_list->Recordset->EOF) {
	$lab_agerange_list->Recordset->moveFirst();
	$selectLimit = $lab_agerange_list->UseSelectLimit;
	if (!$selectLimit && $lab_agerange_list->StartRec > 1)
		$lab_agerange_list->Recordset->move($lab_agerange_list->StartRec - 1);
} elseif (!$lab_agerange->AllowAddDeleteRow && $lab_agerange_list->StopRec == 0) {
	$lab_agerange_list->StopRec = $lab_agerange->GridAddRowCount;
}

// Initialize aggregate
$lab_agerange->RowType = ROWTYPE_AGGREGATEINIT;
$lab_agerange->resetAttributes();
$lab_agerange_list->renderRow();
if ($lab_agerange->isGridAdd())
	$lab_agerange_list->RowIndex = 0;
if ($lab_agerange->isGridEdit())
	$lab_agerange_list->RowIndex = 0;
while ($lab_agerange_list->RecCnt < $lab_agerange_list->StopRec) {
	$lab_agerange_list->RecCnt++;
	if ($lab_agerange_list->RecCnt >= $lab_agerange_list->StartRec) {
		$lab_agerange_list->RowCnt++;
		if ($lab_agerange->isGridAdd() || $lab_agerange->isGridEdit() || $lab_agerange->isConfirm()) {
			$lab_agerange_list->RowIndex++;
			$CurrentForm->Index = $lab_agerange_list->RowIndex;
			if ($CurrentForm->hasValue($lab_agerange_list->FormActionName) && $lab_agerange_list->EventCancelled)
				$lab_agerange_list->RowAction = strval($CurrentForm->getValue($lab_agerange_list->FormActionName));
			elseif ($lab_agerange->isGridAdd())
				$lab_agerange_list->RowAction = "insert";
			else
				$lab_agerange_list->RowAction = "";
		}

		// Set up key count
		$lab_agerange_list->KeyCount = $lab_agerange_list->RowIndex;

		// Init row class and style
		$lab_agerange->resetAttributes();
		$lab_agerange->CssClass = "";
		if ($lab_agerange->isGridAdd()) {
			$lab_agerange_list->loadRowValues(); // Load default values
		} else {
			$lab_agerange_list->loadRowValues($lab_agerange_list->Recordset); // Load row values
		}
		$lab_agerange->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_agerange->isGridAdd()) // Grid add
			$lab_agerange->RowType = ROWTYPE_ADD; // Render add
		if ($lab_agerange->isGridAdd() && $lab_agerange->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_agerange_list->restoreCurrentRowFormValues($lab_agerange_list->RowIndex); // Restore form values
		if ($lab_agerange->isGridEdit()) { // Grid edit
			if ($lab_agerange->EventCancelled)
				$lab_agerange_list->restoreCurrentRowFormValues($lab_agerange_list->RowIndex); // Restore form values
			if ($lab_agerange_list->RowAction == "insert")
				$lab_agerange->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_agerange->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_agerange->isGridEdit() && ($lab_agerange->RowType == ROWTYPE_EDIT || $lab_agerange->RowType == ROWTYPE_ADD) && $lab_agerange->EventCancelled) // Update failed
			$lab_agerange_list->restoreCurrentRowFormValues($lab_agerange_list->RowIndex); // Restore form values
		if ($lab_agerange->RowType == ROWTYPE_EDIT) // Edit row
			$lab_agerange_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$lab_agerange->RowAttrs = array_merge($lab_agerange->RowAttrs, array('data-rowindex'=>$lab_agerange_list->RowCnt, 'id'=>'r' . $lab_agerange_list->RowCnt . '_lab_agerange', 'data-rowtype'=>$lab_agerange->RowType));

		// Render row
		$lab_agerange_list->renderRow();

		// Render list options
		$lab_agerange_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_agerange_list->RowAction <> "delete" && $lab_agerange_list->RowAction <> "insertdelete" && !($lab_agerange_list->RowAction == "insert" && $lab_agerange->isConfirm() && $lab_agerange_list->emptyRow())) {
?>
	<tr<?php echo $lab_agerange->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_agerange_list->ListOptions->render("body", "left", $lab_agerange_list->RowCnt);
?>
	<?php if ($lab_agerange->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_agerange->id->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="o<?php echo $lab_agerange_list->RowIndex ?>_id" id="o<?php echo $lab_agerange_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_id" class="form-group lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="x<?php echo $lab_agerange_list->RowIndex ?>_id" id="x<?php echo $lab_agerange_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_id" class="lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<?php echo $lab_agerange->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $lab_agerange->Gender->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_Gender" name="x<?php echo $lab_agerange_list->RowIndex ?>_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x" . $lab_agerange_list->RowIndex . "_Gender") ?>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="o<?php echo $lab_agerange_list->RowIndex ?>_Gender" id="o<?php echo $lab_agerange_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_Gender" name="x<?php echo $lab_agerange_list->RowIndex ?>_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x" . $lab_agerange_list->RowIndex . "_Gender") ?>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_Gender" class="lab_agerange_Gender">
<span<?php echo $lab_agerange->Gender->viewAttributes() ?>>
<?php echo $lab_agerange->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<td data-name="MinAge"<?php echo $lab_agerange->MinAge->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_list->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_list->RowIndex ?>_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="o<?php echo $lab_agerange_list->RowIndex ?>_MinAge" id="o<?php echo $lab_agerange_list->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_list->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_list->RowIndex ?>_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MinAge" class="lab_agerange_MinAge">
<span<?php echo $lab_agerange->MinAge->viewAttributes() ?>>
<?php echo $lab_agerange->MinAge->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<td data-name="MinAgeType"<?php echo $lab_agerange->MinAgeType->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" name="x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="o<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" id="o<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" name="x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType">
<span<?php echo $lab_agerange->MinAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MinAgeType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<td data-name="MaxAge"<?php echo $lab_agerange->MaxAge->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" id="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MaxAge" class="lab_agerange_MaxAge">
<span<?php echo $lab_agerange->MaxAge->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAge->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<td data-name="MaxAgeType"<?php echo $lab_agerange->MaxAgeType->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" name="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" id="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" name="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType">
<span<?php echo $lab_agerange->MaxAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAgeType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<td data-name="Value"<?php echo $lab_agerange->Value->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_Value" class="form-group lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_list->RowIndex ?>_Value" id="x<?php echo $lab_agerange_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="o<?php echo $lab_agerange_list->RowIndex ?>_Value" id="o<?php echo $lab_agerange_list->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_Value" class="form-group lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_list->RowIndex ?>_Value" id="x<?php echo $lab_agerange_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_list->RowCnt ?>_lab_agerange_Value" class="lab_agerange_Value">
<span<?php echo $lab_agerange->Value->viewAttributes() ?>>
<?php echo $lab_agerange->Value->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_agerange_list->ListOptions->render("body", "right", $lab_agerange_list->RowCnt);
?>
	</tr>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD || $lab_agerange->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_agerangelist.updateLists(<?php echo $lab_agerange_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_agerange->isGridAdd())
		if (!$lab_agerange_list->Recordset->EOF)
			$lab_agerange_list->Recordset->moveNext();
}
?>
<?php
	if ($lab_agerange->isGridAdd() || $lab_agerange->isGridEdit()) {
		$lab_agerange_list->RowIndex = '$rowindex$';
		$lab_agerange_list->loadRowValues();

		// Set row properties
		$lab_agerange->resetAttributes();
		$lab_agerange->RowAttrs = array_merge($lab_agerange->RowAttrs, array('data-rowindex'=>$lab_agerange_list->RowIndex, 'id'=>'r0_lab_agerange', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_agerange->RowAttrs["class"], "ew-template");
		$lab_agerange->RowType = ROWTYPE_ADD;

		// Render row
		$lab_agerange_list->renderRow();

		// Render list options
		$lab_agerange_list->renderListOptions();
		$lab_agerange_list->StartRowCnt = 0;
?>
	<tr<?php echo $lab_agerange->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_agerange_list->ListOptions->render("body", "left", $lab_agerange_list->RowIndex);
?>
	<?php if ($lab_agerange->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="o<?php echo $lab_agerange_list->RowIndex ?>_id" id="o<?php echo $lab_agerange_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<span id="el$rowindex$_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_Gender" name="x<?php echo $lab_agerange_list->RowIndex ?>_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x" . $lab_agerange_list->RowIndex . "_Gender") ?>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="o<?php echo $lab_agerange_list->RowIndex ?>_Gender" id="o<?php echo $lab_agerange_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<td data-name="MinAge">
<span id="el$rowindex$_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_list->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_list->RowIndex ?>_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="o<?php echo $lab_agerange_list->RowIndex ?>_MinAge" id="o<?php echo $lab_agerange_list->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<td data-name="MinAgeType">
<span id="el$rowindex$_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" name="x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="o<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" id="o<?php echo $lab_agerange_list->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<td data-name="MaxAge">
<span id="el$rowindex$_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" id="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<td data-name="MaxAgeType">
<span id="el$rowindex$_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" name="x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" id="o<?php echo $lab_agerange_list->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<td data-name="Value">
<span id="el$rowindex$_lab_agerange_Value" class="form-group lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_list->RowIndex ?>_Value" id="x<?php echo $lab_agerange_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="o<?php echo $lab_agerange_list->RowIndex ?>_Value" id="o<?php echo $lab_agerange_list->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_agerange_list->ListOptions->render("body", "right", $lab_agerange_list->RowIndex);
?>
<script>
flab_agerangelist.updateLists(<?php echo $lab_agerange_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($lab_agerange->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $lab_agerange_list->FormKeyCountName ?>" id="<?php echo $lab_agerange_list->FormKeyCountName ?>" value="<?php echo $lab_agerange_list->KeyCount ?>">
<?php echo $lab_agerange_list->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_agerange->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $lab_agerange_list->FormKeyCountName ?>" id="<?php echo $lab_agerange_list->FormKeyCountName ?>" value="<?php echo $lab_agerange_list->KeyCount ?>">
<?php echo $lab_agerange_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$lab_agerange->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_agerange_list->Recordset)
	$lab_agerange_list->Recordset->Close();
?>
<?php if (!$lab_agerange->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_agerange->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_agerange_list->Pager)) $lab_agerange_list->Pager = new NumericPager($lab_agerange_list->StartRec, $lab_agerange_list->DisplayRecs, $lab_agerange_list->TotalRecs, $lab_agerange_list->RecRange, $lab_agerange_list->AutoHidePager) ?>
<?php if ($lab_agerange_list->Pager->RecordCount > 0 && $lab_agerange_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_agerange_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_agerange_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_agerange_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_agerange_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_agerange_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_agerange_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_agerange_list->pageUrl() ?>start=<?php echo $lab_agerange_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_agerange_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_agerange_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_agerange_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_agerange_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_agerange_list->TotalRecs > 0 && (!$lab_agerange_list->AutoHidePageSizeSelector || $lab_agerange_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_agerange">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_agerange_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_agerange_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_agerange_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_agerange_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_agerange_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_agerange_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_agerange->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_agerange_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_agerange_list->TotalRecs == 0 && !$lab_agerange->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_agerange_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_agerange_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_agerange->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_agerange->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_agerange", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_agerange_list->terminate();
?>