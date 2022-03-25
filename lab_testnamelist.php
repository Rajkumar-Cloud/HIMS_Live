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
$lab_testname_list = new lab_testname_list();

// Run the page
$lab_testname_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_testname_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_testname->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_testnamelist = currentForm = new ew.Form("flab_testnamelist", "list");
flab_testnamelist.formKeyCountName = '<?php echo $lab_testname_list->FormKeyCountName ?>';

// Validate form
flab_testnamelist.validate = function() {
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
		<?php if ($lab_testname_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->id->caption(), $lab_testname->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->TestCode->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->TestCode->caption(), $lab_testname->TestCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Name->caption(), $lab_testname->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->SampleType->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->SampleType->caption(), $lab_testname->SampleType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Department->caption(), $lab_testname->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->schedule->Required) { ?>
			elm = this.getElements("x" + infix + "_schedule");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->schedule->caption(), $lab_testname->schedule->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Created->caption(), $lab_testname->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->CreatedBy->caption(), $lab_testname->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Modified->caption(), $lab_testname->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_list->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->ModifiedBy->caption(), $lab_testname->ModifiedBy->RequiredErrorMessage)) ?>");
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
flab_testnamelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TestCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleType", false)) return false;
	if (ew.valueChanged(fobj, infix, "Department", false)) return false;
	if (ew.valueChanged(fobj, infix, "schedule", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_testnamelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_testnamelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_testnamelist.lists["x_SampleType"] = <?php echo $lab_testname_list->SampleType->Lookup->toClientList() ?>;
flab_testnamelist.lists["x_SampleType"].options = <?php echo JsonEncode($lab_testname_list->SampleType->lookupOptions()) ?>;
flab_testnamelist.lists["x_Department"] = <?php echo $lab_testname_list->Department->Lookup->toClientList() ?>;
flab_testnamelist.lists["x_Department"].options = <?php echo JsonEncode($lab_testname_list->Department->lookupOptions()) ?>;

// Form object for search
var flab_testnamelistsrch = currentSearchForm = new ew.Form("flab_testnamelistsrch");

// Filters
flab_testnamelistsrch.filterList = <?php echo $lab_testname_list->getFilterList() ?>;
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
<?php if (!$lab_testname->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_testname_list->TotalRecs > 0 && $lab_testname_list->ExportOptions->visible()) { ?>
<?php $lab_testname_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_testname_list->ImportOptions->visible()) { ?>
<?php $lab_testname_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_testname_list->SearchOptions->visible()) { ?>
<?php $lab_testname_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_testname_list->FilterOptions->visible()) { ?>
<?php $lab_testname_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_testname_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_testname->isExport() && !$lab_testname->CurrentAction) { ?>
<form name="flab_testnamelistsrch" id="flab_testnamelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_testname_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_testnamelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_testname">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_testname_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_testname_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_testname_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_testname_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_testname_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_testname_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_testname_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_testname_list->showPageHeader(); ?>
<?php
$lab_testname_list->showMessage();
?>
<?php if ($lab_testname_list->TotalRecs > 0 || $lab_testname->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_testname_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_testname">
<?php if (!$lab_testname->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_testname->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_testname_list->Pager)) $lab_testname_list->Pager = new NumericPager($lab_testname_list->StartRec, $lab_testname_list->DisplayRecs, $lab_testname_list->TotalRecs, $lab_testname_list->RecRange, $lab_testname_list->AutoHidePager) ?>
<?php if ($lab_testname_list->Pager->RecordCount > 0 && $lab_testname_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_testname_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_testname_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_testname_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_testname_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_testname_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_testname_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_testname_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_testname_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_testname_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_testname_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_testname_list->TotalRecs > 0 && (!$lab_testname_list->AutoHidePageSizeSelector || $lab_testname_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_testname">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_testname_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_testname_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_testname_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_testname_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_testname_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_testname_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_testname->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_testname_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_testnamelist" id="flab_testnamelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_testname_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_testname_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_testname">
<div id="gmp_lab_testname" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_testname_list->TotalRecs > 0 || $lab_testname->isGridEdit()) { ?>
<table id="tbl_lab_testnamelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_testname_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_testname_list->renderListOptions();

// Render list options (header, left)
$lab_testname_list->ListOptions->render("header", "left");
?>
<?php if ($lab_testname->id->Visible) { // id ?>
	<?php if ($lab_testname->sortUrl($lab_testname->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_testname->id->headerCellClass() ?>"><div id="elh_lab_testname_id" class="lab_testname_id"><div class="ew-table-header-caption"><?php echo $lab_testname->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_testname->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->id) ?>',1);"><div id="elh_lab_testname_id" class="lab_testname_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
	<?php if ($lab_testname->sortUrl($lab_testname->TestCode) == "") { ?>
		<th data-name="TestCode" class="<?php echo $lab_testname->TestCode->headerCellClass() ?>"><div id="elh_lab_testname_TestCode" class="lab_testname_TestCode"><div class="ew-table-header-caption"><?php echo $lab_testname->TestCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCode" class="<?php echo $lab_testname->TestCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->TestCode) ?>',1);"><div id="elh_lab_testname_TestCode" class="lab_testname_TestCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->TestCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->TestCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->TestCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->Name->Visible) { // Name ?>
	<?php if ($lab_testname->sortUrl($lab_testname->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $lab_testname->Name->headerCellClass() ?>"><div id="elh_lab_testname_Name" class="lab_testname_Name"><div class="ew-table-header-caption"><?php echo $lab_testname->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $lab_testname->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->Name) ?>',1);"><div id="elh_lab_testname_Name" class="lab_testname_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
	<?php if ($lab_testname->sortUrl($lab_testname->SampleType) == "") { ?>
		<th data-name="SampleType" class="<?php echo $lab_testname->SampleType->headerCellClass() ?>"><div id="elh_lab_testname_SampleType" class="lab_testname_SampleType"><div class="ew-table-header-caption"><?php echo $lab_testname->SampleType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleType" class="<?php echo $lab_testname->SampleType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->SampleType) ?>',1);"><div id="elh_lab_testname_SampleType" class="lab_testname_SampleType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->SampleType->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->SampleType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->SampleType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->Department->Visible) { // Department ?>
	<?php if ($lab_testname->sortUrl($lab_testname->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $lab_testname->Department->headerCellClass() ?>"><div id="elh_lab_testname_Department" class="lab_testname_Department"><div class="ew-table-header-caption"><?php echo $lab_testname->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $lab_testname->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->Department) ?>',1);"><div id="elh_lab_testname_Department" class="lab_testname_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->schedule->Visible) { // schedule ?>
	<?php if ($lab_testname->sortUrl($lab_testname->schedule) == "") { ?>
		<th data-name="schedule" class="<?php echo $lab_testname->schedule->headerCellClass() ?>"><div id="elh_lab_testname_schedule" class="lab_testname_schedule"><div class="ew-table-header-caption"><?php echo $lab_testname->schedule->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="schedule" class="<?php echo $lab_testname->schedule->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->schedule) ?>',1);"><div id="elh_lab_testname_schedule" class="lab_testname_schedule">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->schedule->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->schedule->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->schedule->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->Created->Visible) { // Created ?>
	<?php if ($lab_testname->sortUrl($lab_testname->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $lab_testname->Created->headerCellClass() ?>"><div id="elh_lab_testname_Created" class="lab_testname_Created"><div class="ew-table-header-caption"><?php echo $lab_testname->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $lab_testname->Created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->Created) ?>',1);"><div id="elh_lab_testname_Created" class="lab_testname_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->Created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->Created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($lab_testname->sortUrl($lab_testname->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $lab_testname->CreatedBy->headerCellClass() ?>"><div id="elh_lab_testname_CreatedBy" class="lab_testname_CreatedBy"><div class="ew-table-header-caption"><?php echo $lab_testname->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $lab_testname->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->CreatedBy) ?>',1);"><div id="elh_lab_testname_CreatedBy" class="lab_testname_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->Modified->Visible) { // Modified ?>
	<?php if ($lab_testname->sortUrl($lab_testname->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $lab_testname->Modified->headerCellClass() ?>"><div id="elh_lab_testname_Modified" class="lab_testname_Modified"><div class="ew-table-header-caption"><?php echo $lab_testname->Modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $lab_testname->Modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->Modified) ?>',1);"><div id="elh_lab_testname_Modified" class="lab_testname_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->Modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->Modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($lab_testname->sortUrl($lab_testname->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $lab_testname->ModifiedBy->headerCellClass() ?>"><div id="elh_lab_testname_ModifiedBy" class="lab_testname_ModifiedBy"><div class="ew-table-header-caption"><?php echo $lab_testname->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $lab_testname->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_testname->SortUrl($lab_testname->ModifiedBy) ?>',1);"><div id="elh_lab_testname_ModifiedBy" class="lab_testname_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_testname->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_testname->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_testname->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_testname_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_testname->ExportAll && $lab_testname->isExport()) {
	$lab_testname_list->StopRec = $lab_testname_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_testname_list->TotalRecs > $lab_testname_list->StartRec + $lab_testname_list->DisplayRecs - 1)
		$lab_testname_list->StopRec = $lab_testname_list->StartRec + $lab_testname_list->DisplayRecs - 1;
	else
		$lab_testname_list->StopRec = $lab_testname_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $lab_testname_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_testname_list->FormKeyCountName) && ($lab_testname->isGridAdd() || $lab_testname->isGridEdit() || $lab_testname->isConfirm())) {
		$lab_testname_list->KeyCount = $CurrentForm->getValue($lab_testname_list->FormKeyCountName);
		$lab_testname_list->StopRec = $lab_testname_list->StartRec + $lab_testname_list->KeyCount - 1;
	}
}
$lab_testname_list->RecCnt = $lab_testname_list->StartRec - 1;
if ($lab_testname_list->Recordset && !$lab_testname_list->Recordset->EOF) {
	$lab_testname_list->Recordset->moveFirst();
	$selectLimit = $lab_testname_list->UseSelectLimit;
	if (!$selectLimit && $lab_testname_list->StartRec > 1)
		$lab_testname_list->Recordset->move($lab_testname_list->StartRec - 1);
} elseif (!$lab_testname->AllowAddDeleteRow && $lab_testname_list->StopRec == 0) {
	$lab_testname_list->StopRec = $lab_testname->GridAddRowCount;
}

// Initialize aggregate
$lab_testname->RowType = ROWTYPE_AGGREGATEINIT;
$lab_testname->resetAttributes();
$lab_testname_list->renderRow();
if ($lab_testname->isGridAdd())
	$lab_testname_list->RowIndex = 0;
if ($lab_testname->isGridEdit())
	$lab_testname_list->RowIndex = 0;
while ($lab_testname_list->RecCnt < $lab_testname_list->StopRec) {
	$lab_testname_list->RecCnt++;
	if ($lab_testname_list->RecCnt >= $lab_testname_list->StartRec) {
		$lab_testname_list->RowCnt++;
		if ($lab_testname->isGridAdd() || $lab_testname->isGridEdit() || $lab_testname->isConfirm()) {
			$lab_testname_list->RowIndex++;
			$CurrentForm->Index = $lab_testname_list->RowIndex;
			if ($CurrentForm->hasValue($lab_testname_list->FormActionName) && $lab_testname_list->EventCancelled)
				$lab_testname_list->RowAction = strval($CurrentForm->getValue($lab_testname_list->FormActionName));
			elseif ($lab_testname->isGridAdd())
				$lab_testname_list->RowAction = "insert";
			else
				$lab_testname_list->RowAction = "";
		}

		// Set up key count
		$lab_testname_list->KeyCount = $lab_testname_list->RowIndex;

		// Init row class and style
		$lab_testname->resetAttributes();
		$lab_testname->CssClass = "";
		if ($lab_testname->isGridAdd()) {
			$lab_testname_list->loadRowValues(); // Load default values
		} else {
			$lab_testname_list->loadRowValues($lab_testname_list->Recordset); // Load row values
		}
		$lab_testname->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_testname->isGridAdd()) // Grid add
			$lab_testname->RowType = ROWTYPE_ADD; // Render add
		if ($lab_testname->isGridAdd() && $lab_testname->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_testname_list->restoreCurrentRowFormValues($lab_testname_list->RowIndex); // Restore form values
		if ($lab_testname->isGridEdit()) { // Grid edit
			if ($lab_testname->EventCancelled)
				$lab_testname_list->restoreCurrentRowFormValues($lab_testname_list->RowIndex); // Restore form values
			if ($lab_testname_list->RowAction == "insert")
				$lab_testname->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_testname->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_testname->isGridEdit() && ($lab_testname->RowType == ROWTYPE_EDIT || $lab_testname->RowType == ROWTYPE_ADD) && $lab_testname->EventCancelled) // Update failed
			$lab_testname_list->restoreCurrentRowFormValues($lab_testname_list->RowIndex); // Restore form values
		if ($lab_testname->RowType == ROWTYPE_EDIT) // Edit row
			$lab_testname_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$lab_testname->RowAttrs = array_merge($lab_testname->RowAttrs, array('data-rowindex'=>$lab_testname_list->RowCnt, 'id'=>'r' . $lab_testname_list->RowCnt . '_lab_testname', 'data-rowtype'=>$lab_testname->RowType));

		// Render row
		$lab_testname_list->renderRow();

		// Render list options
		$lab_testname_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_testname_list->RowAction <> "delete" && $lab_testname_list->RowAction <> "insertdelete" && !($lab_testname_list->RowAction == "insert" && $lab_testname->isConfirm() && $lab_testname_list->emptyRow())) {
?>
	<tr<?php echo $lab_testname->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_testname_list->ListOptions->render("body", "left", $lab_testname_list->RowCnt);
?>
	<?php if ($lab_testname->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_testname->id->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_testname" data-field="x_id" name="o<?php echo $lab_testname_list->RowIndex ?>_id" id="o<?php echo $lab_testname_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_testname->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_id" class="form-group lab_testname_id">
<span<?php echo $lab_testname->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_testname->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_id" name="x<?php echo $lab_testname_list->RowIndex ?>_id" id="x<?php echo $lab_testname_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_testname->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_id" class="lab_testname_id">
<span<?php echo $lab_testname->id->viewAttributes() ?>>
<?php echo $lab_testname->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
		<td data-name="TestCode"<?php echo $lab_testname->TestCode->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_TestCode" class="form-group lab_testname_TestCode">
<input type="text" data-table="lab_testname" data-field="x_TestCode" name="x<?php echo $lab_testname_list->RowIndex ?>_TestCode" id="x<?php echo $lab_testname_list->RowIndex ?>_TestCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->TestCode->getPlaceHolder()) ?>" value="<?php echo $lab_testname->TestCode->EditValue ?>"<?php echo $lab_testname->TestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_TestCode" name="o<?php echo $lab_testname_list->RowIndex ?>_TestCode" id="o<?php echo $lab_testname_list->RowIndex ?>_TestCode" value="<?php echo HtmlEncode($lab_testname->TestCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_TestCode" class="form-group lab_testname_TestCode">
<input type="text" data-table="lab_testname" data-field="x_TestCode" name="x<?php echo $lab_testname_list->RowIndex ?>_TestCode" id="x<?php echo $lab_testname_list->RowIndex ?>_TestCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->TestCode->getPlaceHolder()) ?>" value="<?php echo $lab_testname->TestCode->EditValue ?>"<?php echo $lab_testname->TestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_TestCode" class="lab_testname_TestCode">
<span<?php echo $lab_testname->TestCode->viewAttributes() ?>>
<?php echo $lab_testname->TestCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $lab_testname->Name->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Name" class="form-group lab_testname_Name">
<input type="text" data-table="lab_testname" data-field="x_Name" name="x<?php echo $lab_testname_list->RowIndex ?>_Name" id="x<?php echo $lab_testname_list->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->Name->getPlaceHolder()) ?>" value="<?php echo $lab_testname->Name->EditValue ?>"<?php echo $lab_testname->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_Name" name="o<?php echo $lab_testname_list->RowIndex ?>_Name" id="o<?php echo $lab_testname_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($lab_testname->Name->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Name" class="form-group lab_testname_Name">
<input type="text" data-table="lab_testname" data-field="x_Name" name="x<?php echo $lab_testname_list->RowIndex ?>_Name" id="x<?php echo $lab_testname_list->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->Name->getPlaceHolder()) ?>" value="<?php echo $lab_testname->Name->EditValue ?>"<?php echo $lab_testname->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Name" class="lab_testname_Name">
<span<?php echo $lab_testname->Name->viewAttributes() ?>>
<?php echo $lab_testname->Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
		<td data-name="SampleType"<?php echo $lab_testname->SampleType->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_SampleType" class="form-group lab_testname_SampleType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_SampleType" data-value-separator="<?php echo $lab_testname->SampleType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_testname_list->RowIndex ?>_SampleType" name="x<?php echo $lab_testname_list->RowIndex ?>_SampleType"<?php echo $lab_testname->SampleType->editAttributes() ?>>
		<?php echo $lab_testname->SampleType->selectOptionListHtml("x<?php echo $lab_testname_list->RowIndex ?>_SampleType") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_sampletype") && !$lab_testname->SampleType->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $lab_testname_list->RowIndex ?>_SampleType" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->SampleType->caption() ?>" data-title="<?php echo $lab_testname->SampleType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $lab_testname_list->RowIndex ?>_SampleType',url:'lab_mas_sampletypeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->SampleType->Lookup->getParamTag("p_x" . $lab_testname_list->RowIndex . "_SampleType") ?>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_SampleType" name="o<?php echo $lab_testname_list->RowIndex ?>_SampleType" id="o<?php echo $lab_testname_list->RowIndex ?>_SampleType" value="<?php echo HtmlEncode($lab_testname->SampleType->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_SampleType" class="form-group lab_testname_SampleType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_SampleType" data-value-separator="<?php echo $lab_testname->SampleType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_testname_list->RowIndex ?>_SampleType" name="x<?php echo $lab_testname_list->RowIndex ?>_SampleType"<?php echo $lab_testname->SampleType->editAttributes() ?>>
		<?php echo $lab_testname->SampleType->selectOptionListHtml("x<?php echo $lab_testname_list->RowIndex ?>_SampleType") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_sampletype") && !$lab_testname->SampleType->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $lab_testname_list->RowIndex ?>_SampleType" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->SampleType->caption() ?>" data-title="<?php echo $lab_testname->SampleType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $lab_testname_list->RowIndex ?>_SampleType',url:'lab_mas_sampletypeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->SampleType->Lookup->getParamTag("p_x" . $lab_testname_list->RowIndex . "_SampleType") ?>
</span>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_SampleType" class="lab_testname_SampleType">
<span<?php echo $lab_testname->SampleType->viewAttributes() ?>>
<?php echo $lab_testname->SampleType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $lab_testname->Department->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Department" class="form-group lab_testname_Department">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_Department" data-value-separator="<?php echo $lab_testname->Department->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_testname_list->RowIndex ?>_Department" name="x<?php echo $lab_testname_list->RowIndex ?>_Department"<?php echo $lab_testname->Department->editAttributes() ?>>
		<?php echo $lab_testname->Department->selectOptionListHtml("x<?php echo $lab_testname_list->RowIndex ?>_Department") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_department") && !$lab_testname->Department->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $lab_testname_list->RowIndex ?>_Department" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->Department->caption() ?>" data-title="<?php echo $lab_testname->Department->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $lab_testname_list->RowIndex ?>_Department',url:'lab_mas_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->Department->Lookup->getParamTag("p_x" . $lab_testname_list->RowIndex . "_Department") ?>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_Department" name="o<?php echo $lab_testname_list->RowIndex ?>_Department" id="o<?php echo $lab_testname_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($lab_testname->Department->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Department" class="form-group lab_testname_Department">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_Department" data-value-separator="<?php echo $lab_testname->Department->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_testname_list->RowIndex ?>_Department" name="x<?php echo $lab_testname_list->RowIndex ?>_Department"<?php echo $lab_testname->Department->editAttributes() ?>>
		<?php echo $lab_testname->Department->selectOptionListHtml("x<?php echo $lab_testname_list->RowIndex ?>_Department") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_department") && !$lab_testname->Department->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $lab_testname_list->RowIndex ?>_Department" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->Department->caption() ?>" data-title="<?php echo $lab_testname->Department->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $lab_testname_list->RowIndex ?>_Department',url:'lab_mas_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->Department->Lookup->getParamTag("p_x" . $lab_testname_list->RowIndex . "_Department") ?>
</span>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Department" class="lab_testname_Department">
<span<?php echo $lab_testname->Department->viewAttributes() ?>>
<?php echo $lab_testname->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->schedule->Visible) { // schedule ?>
		<td data-name="schedule"<?php echo $lab_testname->schedule->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_schedule" class="form-group lab_testname_schedule">
<input type="text" data-table="lab_testname" data-field="x_schedule" name="x<?php echo $lab_testname_list->RowIndex ?>_schedule" id="x<?php echo $lab_testname_list->RowIndex ?>_schedule" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->schedule->getPlaceHolder()) ?>" value="<?php echo $lab_testname->schedule->EditValue ?>"<?php echo $lab_testname->schedule->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_schedule" name="o<?php echo $lab_testname_list->RowIndex ?>_schedule" id="o<?php echo $lab_testname_list->RowIndex ?>_schedule" value="<?php echo HtmlEncode($lab_testname->schedule->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_schedule" class="form-group lab_testname_schedule">
<input type="text" data-table="lab_testname" data-field="x_schedule" name="x<?php echo $lab_testname_list->RowIndex ?>_schedule" id="x<?php echo $lab_testname_list->RowIndex ?>_schedule" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->schedule->getPlaceHolder()) ?>" value="<?php echo $lab_testname->schedule->EditValue ?>"<?php echo $lab_testname->schedule->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_schedule" class="lab_testname_schedule">
<span<?php echo $lab_testname->schedule->viewAttributes() ?>>
<?php echo $lab_testname->schedule->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->Created->Visible) { // Created ?>
		<td data-name="Created"<?php echo $lab_testname->Created->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_testname" data-field="x_Created" name="o<?php echo $lab_testname_list->RowIndex ?>_Created" id="o<?php echo $lab_testname_list->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_testname->Created->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Created" class="lab_testname_Created">
<span<?php echo $lab_testname->Created->viewAttributes() ?>>
<?php echo $lab_testname->Created->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $lab_testname->CreatedBy->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_testname" data-field="x_CreatedBy" name="o<?php echo $lab_testname_list->RowIndex ?>_CreatedBy" id="o<?php echo $lab_testname_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_testname->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_CreatedBy" class="lab_testname_CreatedBy">
<span<?php echo $lab_testname->CreatedBy->viewAttributes() ?>>
<?php echo $lab_testname->CreatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->Modified->Visible) { // Modified ?>
		<td data-name="Modified"<?php echo $lab_testname->Modified->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_testname" data-field="x_Modified" name="o<?php echo $lab_testname_list->RowIndex ?>_Modified" id="o<?php echo $lab_testname_list->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_testname->Modified->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_Modified" class="lab_testname_Modified">
<span<?php echo $lab_testname->Modified->viewAttributes() ?>>
<?php echo $lab_testname->Modified->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $lab_testname->ModifiedBy->cellAttributes() ?>>
<?php if ($lab_testname->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_testname" data-field="x_ModifiedBy" name="o<?php echo $lab_testname_list->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_testname_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_testname->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_testname->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_testname_list->RowCnt ?>_lab_testname_ModifiedBy" class="lab_testname_ModifiedBy">
<span<?php echo $lab_testname->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_testname->ModifiedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_testname_list->ListOptions->render("body", "right", $lab_testname_list->RowCnt);
?>
	</tr>
<?php if ($lab_testname->RowType == ROWTYPE_ADD || $lab_testname->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_testnamelist.updateLists(<?php echo $lab_testname_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_testname->isGridAdd())
		if (!$lab_testname_list->Recordset->EOF)
			$lab_testname_list->Recordset->moveNext();
}
?>
<?php
	if ($lab_testname->isGridAdd() || $lab_testname->isGridEdit()) {
		$lab_testname_list->RowIndex = '$rowindex$';
		$lab_testname_list->loadRowValues();

		// Set row properties
		$lab_testname->resetAttributes();
		$lab_testname->RowAttrs = array_merge($lab_testname->RowAttrs, array('data-rowindex'=>$lab_testname_list->RowIndex, 'id'=>'r0_lab_testname', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_testname->RowAttrs["class"], "ew-template");
		$lab_testname->RowType = ROWTYPE_ADD;

		// Render row
		$lab_testname_list->renderRow();

		// Render list options
		$lab_testname_list->renderListOptions();
		$lab_testname_list->StartRowCnt = 0;
?>
	<tr<?php echo $lab_testname->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_testname_list->ListOptions->render("body", "left", $lab_testname_list->RowIndex);
?>
	<?php if ($lab_testname->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="lab_testname" data-field="x_id" name="o<?php echo $lab_testname_list->RowIndex ?>_id" id="o<?php echo $lab_testname_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_testname->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
		<td data-name="TestCode">
<span id="el$rowindex$_lab_testname_TestCode" class="form-group lab_testname_TestCode">
<input type="text" data-table="lab_testname" data-field="x_TestCode" name="x<?php echo $lab_testname_list->RowIndex ?>_TestCode" id="x<?php echo $lab_testname_list->RowIndex ?>_TestCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->TestCode->getPlaceHolder()) ?>" value="<?php echo $lab_testname->TestCode->EditValue ?>"<?php echo $lab_testname->TestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_TestCode" name="o<?php echo $lab_testname_list->RowIndex ?>_TestCode" id="o<?php echo $lab_testname_list->RowIndex ?>_TestCode" value="<?php echo HtmlEncode($lab_testname->TestCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->Name->Visible) { // Name ?>
		<td data-name="Name">
<span id="el$rowindex$_lab_testname_Name" class="form-group lab_testname_Name">
<input type="text" data-table="lab_testname" data-field="x_Name" name="x<?php echo $lab_testname_list->RowIndex ?>_Name" id="x<?php echo $lab_testname_list->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->Name->getPlaceHolder()) ?>" value="<?php echo $lab_testname->Name->EditValue ?>"<?php echo $lab_testname->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_Name" name="o<?php echo $lab_testname_list->RowIndex ?>_Name" id="o<?php echo $lab_testname_list->RowIndex ?>_Name" value="<?php echo HtmlEncode($lab_testname->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
		<td data-name="SampleType">
<span id="el$rowindex$_lab_testname_SampleType" class="form-group lab_testname_SampleType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_SampleType" data-value-separator="<?php echo $lab_testname->SampleType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_testname_list->RowIndex ?>_SampleType" name="x<?php echo $lab_testname_list->RowIndex ?>_SampleType"<?php echo $lab_testname->SampleType->editAttributes() ?>>
		<?php echo $lab_testname->SampleType->selectOptionListHtml("x<?php echo $lab_testname_list->RowIndex ?>_SampleType") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_sampletype") && !$lab_testname->SampleType->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $lab_testname_list->RowIndex ?>_SampleType" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->SampleType->caption() ?>" data-title="<?php echo $lab_testname->SampleType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $lab_testname_list->RowIndex ?>_SampleType',url:'lab_mas_sampletypeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->SampleType->Lookup->getParamTag("p_x" . $lab_testname_list->RowIndex . "_SampleType") ?>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_SampleType" name="o<?php echo $lab_testname_list->RowIndex ?>_SampleType" id="o<?php echo $lab_testname_list->RowIndex ?>_SampleType" value="<?php echo HtmlEncode($lab_testname->SampleType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_lab_testname_Department" class="form-group lab_testname_Department">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_Department" data-value-separator="<?php echo $lab_testname->Department->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_testname_list->RowIndex ?>_Department" name="x<?php echo $lab_testname_list->RowIndex ?>_Department"<?php echo $lab_testname->Department->editAttributes() ?>>
		<?php echo $lab_testname->Department->selectOptionListHtml("x<?php echo $lab_testname_list->RowIndex ?>_Department") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_department") && !$lab_testname->Department->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $lab_testname_list->RowIndex ?>_Department" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->Department->caption() ?>" data-title="<?php echo $lab_testname->Department->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $lab_testname_list->RowIndex ?>_Department',url:'lab_mas_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->Department->Lookup->getParamTag("p_x" . $lab_testname_list->RowIndex . "_Department") ?>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_Department" name="o<?php echo $lab_testname_list->RowIndex ?>_Department" id="o<?php echo $lab_testname_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($lab_testname->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->schedule->Visible) { // schedule ?>
		<td data-name="schedule">
<span id="el$rowindex$_lab_testname_schedule" class="form-group lab_testname_schedule">
<input type="text" data-table="lab_testname" data-field="x_schedule" name="x<?php echo $lab_testname_list->RowIndex ?>_schedule" id="x<?php echo $lab_testname_list->RowIndex ?>_schedule" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->schedule->getPlaceHolder()) ?>" value="<?php echo $lab_testname->schedule->EditValue ?>"<?php echo $lab_testname->schedule->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_schedule" name="o<?php echo $lab_testname_list->RowIndex ?>_schedule" id="o<?php echo $lab_testname_list->RowIndex ?>_schedule" value="<?php echo HtmlEncode($lab_testname->schedule->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->Created->Visible) { // Created ?>
		<td data-name="Created">
<input type="hidden" data-table="lab_testname" data-field="x_Created" name="o<?php echo $lab_testname_list->RowIndex ?>_Created" id="o<?php echo $lab_testname_list->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_testname->Created->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<input type="hidden" data-table="lab_testname" data-field="x_CreatedBy" name="o<?php echo $lab_testname_list->RowIndex ?>_CreatedBy" id="o<?php echo $lab_testname_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_testname->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->Modified->Visible) { // Modified ?>
		<td data-name="Modified">
<input type="hidden" data-table="lab_testname" data-field="x_Modified" name="o<?php echo $lab_testname_list->RowIndex ?>_Modified" id="o<?php echo $lab_testname_list->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_testname->Modified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_testname->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<input type="hidden" data-table="lab_testname" data-field="x_ModifiedBy" name="o<?php echo $lab_testname_list->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_testname_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_testname->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_testname_list->ListOptions->render("body", "right", $lab_testname_list->RowIndex);
?>
<script>
flab_testnamelist.updateLists(<?php echo $lab_testname_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($lab_testname->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $lab_testname_list->FormKeyCountName ?>" id="<?php echo $lab_testname_list->FormKeyCountName ?>" value="<?php echo $lab_testname_list->KeyCount ?>">
<?php echo $lab_testname_list->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_testname->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $lab_testname_list->FormKeyCountName ?>" id="<?php echo $lab_testname_list->FormKeyCountName ?>" value="<?php echo $lab_testname_list->KeyCount ?>">
<?php echo $lab_testname_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$lab_testname->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_testname_list->Recordset)
	$lab_testname_list->Recordset->Close();
?>
<?php if (!$lab_testname->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_testname->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_testname_list->Pager)) $lab_testname_list->Pager = new NumericPager($lab_testname_list->StartRec, $lab_testname_list->DisplayRecs, $lab_testname_list->TotalRecs, $lab_testname_list->RecRange, $lab_testname_list->AutoHidePager) ?>
<?php if ($lab_testname_list->Pager->RecordCount > 0 && $lab_testname_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_testname_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_testname_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_testname_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_testname_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_testname_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_testname_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_testname_list->pageUrl() ?>start=<?php echo $lab_testname_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_testname_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_testname_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_testname_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_testname_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_testname_list->TotalRecs > 0 && (!$lab_testname_list->AutoHidePageSizeSelector || $lab_testname_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_testname">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_testname_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_testname_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_testname_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_testname_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_testname_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_testname_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_testname->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_testname_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_testname_list->TotalRecs == 0 && !$lab_testname->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_testname_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_testname_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_testname->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_testname->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_testname", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_testname_list->terminate();
?>