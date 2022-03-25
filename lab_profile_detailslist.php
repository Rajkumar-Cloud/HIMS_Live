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
$lab_profile_details_list = new lab_profile_details_list();

// Run the page
$lab_profile_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_profile_details->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_profile_detailslist = currentForm = new ew.Form("flab_profile_detailslist", "list");
flab_profile_detailslist.formKeyCountName = '<?php echo $lab_profile_details_list->FormKeyCountName ?>';

// Validate form
flab_profile_detailslist.validate = function() {
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
		<?php if ($lab_profile_details_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->id->caption(), $lab_profile_details->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_list->ProfileCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->ProfileCode->caption(), $lab_profile_details->ProfileCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_list->SubProfileCode->Required) { ?>
			elm = this.getElements("x" + infix + "_SubProfileCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->SubProfileCode->caption(), $lab_profile_details->SubProfileCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_list->ProfileTestCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileTestCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->ProfileTestCode->caption(), $lab_profile_details->ProfileTestCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_list->ProfileSubTestCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfileSubTestCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->ProfileSubTestCode->caption(), $lab_profile_details->ProfileSubTestCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_profile_details_list->TestOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->TestOrder->caption(), $lab_profile_details->TestOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_details->TestOrder->errorMessage()) ?>");
		<?php if ($lab_profile_details_list->TestAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TestAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details->TestAmount->caption(), $lab_profile_details->TestAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_profile_details->TestAmount->errorMessage()) ?>");

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
flab_profile_detailslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "ProfileCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "SubProfileCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProfileTestCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProfileSubTestCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestOrder", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestAmount", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_profile_detailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_detailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_profile_detailslist.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_list->SubProfileCode->Lookup->toClientList() ?>;
flab_profile_detailslist.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_list->SubProfileCode->lookupOptions()) ?>;
flab_profile_detailslist.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_list->ProfileTestCode->Lookup->toClientList() ?>;
flab_profile_detailslist.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_list->ProfileTestCode->lookupOptions()) ?>;

// Form object for search
var flab_profile_detailslistsrch = currentSearchForm = new ew.Form("flab_profile_detailslistsrch");

// Filters
flab_profile_detailslistsrch.filterList = <?php echo $lab_profile_details_list->getFilterList() ?>;
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
<?php if (!$lab_profile_details->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_profile_details_list->TotalRecs > 0 && $lab_profile_details_list->ExportOptions->visible()) { ?>
<?php $lab_profile_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_details_list->ImportOptions->visible()) { ?>
<?php $lab_profile_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_details_list->SearchOptions->visible()) { ?>
<?php $lab_profile_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_details_list->FilterOptions->visible()) { ?>
<?php $lab_profile_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$lab_profile_details->isExport() || EXPORT_MASTER_RECORD && $lab_profile_details->isExport("print")) { ?>
<?php
if ($lab_profile_details_list->DbMasterFilter <> "" && $lab_profile_details->getCurrentMasterTable() == "view_lab_profile") {
	if ($lab_profile_details_list->MasterRecordExists) {
		include_once "view_lab_profilemaster.php";
	}
}
?>
<?php } ?>
<?php
$lab_profile_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_profile_details->isExport() && !$lab_profile_details->CurrentAction) { ?>
<form name="flab_profile_detailslistsrch" id="flab_profile_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_profile_details_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_profile_detailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_profile_details">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_profile_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_profile_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_profile_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_profile_details_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_details_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_details_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_details_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_profile_details_list->showPageHeader(); ?>
<?php
$lab_profile_details_list->showMessage();
?>
<?php if ($lab_profile_details_list->TotalRecs > 0 || $lab_profile_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_profile_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_details">
<?php if (!$lab_profile_details->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_profile_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_profile_details_list->Pager)) $lab_profile_details_list->Pager = new NumericPager($lab_profile_details_list->StartRec, $lab_profile_details_list->DisplayRecs, $lab_profile_details_list->TotalRecs, $lab_profile_details_list->RecRange, $lab_profile_details_list->AutoHidePager) ?>
<?php if ($lab_profile_details_list->Pager->RecordCount > 0 && $lab_profile_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_profile_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_profile_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_profile_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_profile_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_profile_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_profile_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_profile_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_profile_details_list->TotalRecs > 0 && (!$lab_profile_details_list->AutoHidePageSizeSelector || $lab_profile_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_profile_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_profile_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_profile_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_profile_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_profile_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_profile_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_profile_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_profile_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_profile_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_profile_detailslist" id="flab_profile_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_details_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_details_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<?php if ($lab_profile_details->getCurrentMasterTable() == "view_lab_profile" && $lab_profile_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_profile">
<input type="hidden" name="fk_CODE" value="<?php echo $lab_profile_details->ProfileCode->getSessionValue() ?>">
<?php } ?>
<div id="gmp_lab_profile_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_profile_details_list->TotalRecs > 0 || $lab_profile_details->isGridEdit()) { ?>
<table id="tbl_lab_profile_detailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_profile_details_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_profile_details_list->renderListOptions();

// Render list options (header, left)
$lab_profile_details_list->ListOptions->render("header", "left");
?>
<?php if ($lab_profile_details->id->Visible) { // id ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_profile_details->id->headerCellClass() ?>"><div id="elh_lab_profile_details_id" class="lab_profile_details_id"><div class="ew-table-header-caption"><?php echo $lab_profile_details->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_profile_details->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->id) ?>',1);"><div id="elh_lab_profile_details_id" class="lab_profile_details_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->ProfileCode) == "") { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_details->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_details->ProfileCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->ProfileCode) ?>',1);"><div id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->ProfileCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->ProfileCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->SubProfileCode) == "") { ?>
		<th data-name="SubProfileCode" class="<?php echo $lab_profile_details->SubProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details->SubProfileCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubProfileCode" class="<?php echo $lab_profile_details->SubProfileCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->SubProfileCode) ?>',1);"><div id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->SubProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->SubProfileCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->SubProfileCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->ProfileTestCode) == "") { ?>
		<th data-name="ProfileTestCode" class="<?php echo $lab_profile_details->ProfileTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileTestCode" class="<?php echo $lab_profile_details->ProfileTestCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->ProfileTestCode) ?>',1);"><div id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->ProfileTestCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->ProfileTestCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->ProfileSubTestCode) == "") { ?>
		<th data-name="ProfileSubTestCode" class="<?php echo $lab_profile_details->ProfileSubTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileSubTestCode" class="<?php echo $lab_profile_details->ProfileSubTestCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->ProfileSubTestCode) ?>',1);"><div id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->ProfileSubTestCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->ProfileSubTestCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->TestOrder) == "") { ?>
		<th data-name="TestOrder" class="<?php echo $lab_profile_details->TestOrder->headerCellClass() ?>"><div id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><div class="ew-table-header-caption"><?php echo $lab_profile_details->TestOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestOrder" class="<?php echo $lab_profile_details->TestOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->TestOrder) ?>',1);"><div id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->TestOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->TestOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->TestOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
	<?php if ($lab_profile_details->sortUrl($lab_profile_details->TestAmount) == "") { ?>
		<th data-name="TestAmount" class="<?php echo $lab_profile_details->TestAmount->headerCellClass() ?>"><div id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><div class="ew-table-header-caption"><?php echo $lab_profile_details->TestAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestAmount" class="<?php echo $lab_profile_details->TestAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_details->SortUrl($lab_profile_details->TestAmount) ?>',1);"><div id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details->TestAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details->TestAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_details->TestAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_profile_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_profile_details->ExportAll && $lab_profile_details->isExport()) {
	$lab_profile_details_list->StopRec = $lab_profile_details_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_profile_details_list->TotalRecs > $lab_profile_details_list->StartRec + $lab_profile_details_list->DisplayRecs - 1)
		$lab_profile_details_list->StopRec = $lab_profile_details_list->StartRec + $lab_profile_details_list->DisplayRecs - 1;
	else
		$lab_profile_details_list->StopRec = $lab_profile_details_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $lab_profile_details_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_profile_details_list->FormKeyCountName) && ($lab_profile_details->isGridAdd() || $lab_profile_details->isGridEdit() || $lab_profile_details->isConfirm())) {
		$lab_profile_details_list->KeyCount = $CurrentForm->getValue($lab_profile_details_list->FormKeyCountName);
		$lab_profile_details_list->StopRec = $lab_profile_details_list->StartRec + $lab_profile_details_list->KeyCount - 1;
	}
}
$lab_profile_details_list->RecCnt = $lab_profile_details_list->StartRec - 1;
if ($lab_profile_details_list->Recordset && !$lab_profile_details_list->Recordset->EOF) {
	$lab_profile_details_list->Recordset->moveFirst();
	$selectLimit = $lab_profile_details_list->UseSelectLimit;
	if (!$selectLimit && $lab_profile_details_list->StartRec > 1)
		$lab_profile_details_list->Recordset->move($lab_profile_details_list->StartRec - 1);
} elseif (!$lab_profile_details->AllowAddDeleteRow && $lab_profile_details_list->StopRec == 0) {
	$lab_profile_details_list->StopRec = $lab_profile_details->GridAddRowCount;
}

// Initialize aggregate
$lab_profile_details->RowType = ROWTYPE_AGGREGATEINIT;
$lab_profile_details->resetAttributes();
$lab_profile_details_list->renderRow();
if ($lab_profile_details->isGridAdd())
	$lab_profile_details_list->RowIndex = 0;
if ($lab_profile_details->isGridEdit())
	$lab_profile_details_list->RowIndex = 0;
while ($lab_profile_details_list->RecCnt < $lab_profile_details_list->StopRec) {
	$lab_profile_details_list->RecCnt++;
	if ($lab_profile_details_list->RecCnt >= $lab_profile_details_list->StartRec) {
		$lab_profile_details_list->RowCnt++;
		if ($lab_profile_details->isGridAdd() || $lab_profile_details->isGridEdit() || $lab_profile_details->isConfirm()) {
			$lab_profile_details_list->RowIndex++;
			$CurrentForm->Index = $lab_profile_details_list->RowIndex;
			if ($CurrentForm->hasValue($lab_profile_details_list->FormActionName) && $lab_profile_details_list->EventCancelled)
				$lab_profile_details_list->RowAction = strval($CurrentForm->getValue($lab_profile_details_list->FormActionName));
			elseif ($lab_profile_details->isGridAdd())
				$lab_profile_details_list->RowAction = "insert";
			else
				$lab_profile_details_list->RowAction = "";
		}

		// Set up key count
		$lab_profile_details_list->KeyCount = $lab_profile_details_list->RowIndex;

		// Init row class and style
		$lab_profile_details->resetAttributes();
		$lab_profile_details->CssClass = "";
		if ($lab_profile_details->isGridAdd()) {
			$lab_profile_details_list->loadRowValues(); // Load default values
		} else {
			$lab_profile_details_list->loadRowValues($lab_profile_details_list->Recordset); // Load row values
		}
		$lab_profile_details->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_profile_details->isGridAdd()) // Grid add
			$lab_profile_details->RowType = ROWTYPE_ADD; // Render add
		if ($lab_profile_details->isGridAdd() && $lab_profile_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_profile_details_list->restoreCurrentRowFormValues($lab_profile_details_list->RowIndex); // Restore form values
		if ($lab_profile_details->isGridEdit()) { // Grid edit
			if ($lab_profile_details->EventCancelled)
				$lab_profile_details_list->restoreCurrentRowFormValues($lab_profile_details_list->RowIndex); // Restore form values
			if ($lab_profile_details_list->RowAction == "insert")
				$lab_profile_details->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_profile_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_profile_details->isGridEdit() && ($lab_profile_details->RowType == ROWTYPE_EDIT || $lab_profile_details->RowType == ROWTYPE_ADD) && $lab_profile_details->EventCancelled) // Update failed
			$lab_profile_details_list->restoreCurrentRowFormValues($lab_profile_details_list->RowIndex); // Restore form values
		if ($lab_profile_details->RowType == ROWTYPE_EDIT) // Edit row
			$lab_profile_details_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$lab_profile_details->RowAttrs = array_merge($lab_profile_details->RowAttrs, array('data-rowindex'=>$lab_profile_details_list->RowCnt, 'id'=>'r' . $lab_profile_details_list->RowCnt . '_lab_profile_details', 'data-rowtype'=>$lab_profile_details->RowType));

		// Render row
		$lab_profile_details_list->renderRow();

		// Render list options
		$lab_profile_details_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_profile_details_list->RowAction <> "delete" && $lab_profile_details_list->RowAction <> "insertdelete" && !($lab_profile_details_list->RowAction == "insert" && $lab_profile_details->isConfirm() && $lab_profile_details_list->emptyRow())) {
?>
	<tr<?php echo $lab_profile_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_details_list->ListOptions->render("body", "left", $lab_profile_details_list->RowCnt);
?>
	<?php if ($lab_profile_details->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_profile_details->id->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="o<?php echo $lab_profile_details_list->RowIndex ?>_id" id="o<?php echo $lab_profile_details_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_id" class="form-group lab_profile_details_id">
<span<?php echo $lab_profile_details->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_profile_details->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="x<?php echo $lab_profile_details_list->RowIndex ?>_id" id="x<?php echo $lab_profile_details_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_id" class="lab_profile_details_id">
<span<?php echo $lab_profile_details->id->viewAttributes() ?>>
<?php echo $lab_profile_details->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
		<td data-name="ProfileCode"<?php echo $lab_profile_details->ProfileCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($lab_profile_details->ProfileCode->getSessionValue() <> "") { ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_profile_details->ProfileCode->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileCode->EditValue ?>"<?php echo $lab_profile_details->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($lab_profile_details->ProfileCode->getSessionValue() <> "") { ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_profile_details->ProfileCode->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileCode->EditValue ?>"<?php echo $lab_profile_details->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
		<td data-name="SubProfileCode"<?php echo $lab_profile_details->SubProfileCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode"><?php echo strval($lab_profile_details->SubProfileCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->SubProfileCode->ViewValue) : $lab_profile_details->SubProfileCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->SubProfileCode->ReadOnly || $lab_profile_details->SubProfileCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->SubProfileCode->Lookup->getParamTag("p_x" . $lab_profile_details_list->RowIndex . "_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" value="<?php echo $lab_profile_details->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details->SubProfileCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details->SubProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode"><?php echo strval($lab_profile_details->SubProfileCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->SubProfileCode->ViewValue) : $lab_profile_details->SubProfileCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->SubProfileCode->ReadOnly || $lab_profile_details->SubProfileCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->SubProfileCode->Lookup->getParamTag("p_x" . $lab_profile_details_list->RowIndex . "_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" value="<?php echo $lab_profile_details->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details->SubProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details->SubProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_details->SubProfileCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<td data-name="ProfileTestCode"<?php echo $lab_profile_details->ProfileTestCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode"><?php echo strval($lab_profile_details->ProfileTestCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->ProfileTestCode->ViewValue) : $lab_profile_details->ProfileTestCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->ProfileTestCode->ReadOnly || $lab_profile_details->ProfileTestCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->ProfileTestCode->Lookup->getParamTag("p_x" . $lab_profile_details_list->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" value="<?php echo $lab_profile_details->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details->ProfileTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileTestCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode"><?php echo strval($lab_profile_details->ProfileTestCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->ProfileTestCode->ViewValue) : $lab_profile_details->ProfileTestCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->ProfileTestCode->ReadOnly || $lab_profile_details->ProfileTestCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->ProfileTestCode->Lookup->getParamTag("p_x" . $lab_profile_details_list->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" value="<?php echo $lab_profile_details->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details->ProfileTestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details->ProfileTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileTestCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<td data-name="ProfileSubTestCode"<?php echo $lab_profile_details->ProfileSubTestCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details->ProfileSubTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details->ProfileSubTestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details->ProfileSubTestCode->viewAttributes() ?>>
<?php echo $lab_profile_details->ProfileSubTestCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder"<?php echo $lab_profile_details->TestOrder->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestOrder->EditValue ?>"<?php echo $lab_profile_details->TestOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="o<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" id="o<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details->TestOrder->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestOrder->EditValue ?>"<?php echo $lab_profile_details->TestOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details->TestOrder->viewAttributes() ?>>
<?php echo $lab_profile_details->TestOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
		<td data-name="TestAmount"<?php echo $lab_profile_details->TestAmount->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestAmount->EditValue ?>"<?php echo $lab_profile_details->TestAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="o<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" id="o<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details->TestAmount->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestAmount->EditValue ?>"<?php echo $lab_profile_details->TestAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_list->RowCnt ?>_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details->TestAmount->viewAttributes() ?>>
<?php echo $lab_profile_details->TestAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_details_list->ListOptions->render("body", "right", $lab_profile_details_list->RowCnt);
?>
	</tr>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD || $lab_profile_details->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_profile_detailslist.updateLists(<?php echo $lab_profile_details_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_profile_details->isGridAdd())
		if (!$lab_profile_details_list->Recordset->EOF)
			$lab_profile_details_list->Recordset->moveNext();
}
?>
<?php
	if ($lab_profile_details->isGridAdd() || $lab_profile_details->isGridEdit()) {
		$lab_profile_details_list->RowIndex = '$rowindex$';
		$lab_profile_details_list->loadRowValues();

		// Set row properties
		$lab_profile_details->resetAttributes();
		$lab_profile_details->RowAttrs = array_merge($lab_profile_details->RowAttrs, array('data-rowindex'=>$lab_profile_details_list->RowIndex, 'id'=>'r0_lab_profile_details', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_profile_details->RowAttrs["class"], "ew-template");
		$lab_profile_details->RowType = ROWTYPE_ADD;

		// Render row
		$lab_profile_details_list->renderRow();

		// Render list options
		$lab_profile_details_list->renderListOptions();
		$lab_profile_details_list->StartRowCnt = 0;
?>
	<tr<?php echo $lab_profile_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_details_list->ListOptions->render("body", "left", $lab_profile_details_list->RowIndex);
?>
	<?php if ($lab_profile_details->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="o<?php echo $lab_profile_details_list->RowIndex ?>_id" id="o<?php echo $lab_profile_details_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
		<td data-name="ProfileCode">
<?php if ($lab_profile_details->ProfileCode->getSessionValue() <> "") { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_profile_details->ProfileCode->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileCode->EditValue ?>"<?php echo $lab_profile_details->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
		<td data-name="SubProfileCode">
<span id="el$rowindex$_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode"><?php echo strval($lab_profile_details->SubProfileCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->SubProfileCode->ViewValue) : $lab_profile_details->SubProfileCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->SubProfileCode->ReadOnly || $lab_profile_details->SubProfileCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->SubProfileCode->Lookup->getParamTag("p_x" . $lab_profile_details_list->RowIndex . "_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" value="<?php echo $lab_profile_details->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details->SubProfileCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details->SubProfileCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<td data-name="ProfileTestCode">
<span id="el$rowindex$_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode"><?php echo strval($lab_profile_details->ProfileTestCode->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->ProfileTestCode->ViewValue) : $lab_profile_details->ProfileTestCode->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->ProfileTestCode->ReadOnly || $lab_profile_details->ProfileTestCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->ProfileTestCode->Lookup->getParamTag("p_x" . $lab_profile_details_list->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" value="<?php echo $lab_profile_details->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details->ProfileTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileTestCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<td data-name="ProfileSubTestCode">
<span id="el$rowindex$_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details->ProfileSubTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" id="o<?php echo $lab_profile_details_list->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder">
<span id="el$rowindex$_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestOrder->EditValue ?>"<?php echo $lab_profile_details->TestOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="o<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" id="o<?php echo $lab_profile_details_list->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details->TestOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
		<td data-name="TestAmount">
<span id="el$rowindex$_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestAmount->EditValue ?>"<?php echo $lab_profile_details->TestAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="o<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" id="o<?php echo $lab_profile_details_list->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details->TestAmount->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_details_list->ListOptions->render("body", "right", $lab_profile_details_list->RowIndex);
?>
<script>
flab_profile_detailslist.updateLists(<?php echo $lab_profile_details_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($lab_profile_details->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $lab_profile_details_list->FormKeyCountName ?>" id="<?php echo $lab_profile_details_list->FormKeyCountName ?>" value="<?php echo $lab_profile_details_list->KeyCount ?>">
<?php echo $lab_profile_details_list->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_profile_details->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $lab_profile_details_list->FormKeyCountName ?>" id="<?php echo $lab_profile_details_list->FormKeyCountName ?>" value="<?php echo $lab_profile_details_list->KeyCount ?>">
<?php echo $lab_profile_details_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$lab_profile_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_profile_details_list->Recordset)
	$lab_profile_details_list->Recordset->Close();
?>
<?php if (!$lab_profile_details->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_profile_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_profile_details_list->Pager)) $lab_profile_details_list->Pager = new NumericPager($lab_profile_details_list->StartRec, $lab_profile_details_list->DisplayRecs, $lab_profile_details_list->TotalRecs, $lab_profile_details_list->RecRange, $lab_profile_details_list->AutoHidePager) ?>
<?php if ($lab_profile_details_list->Pager->RecordCount > 0 && $lab_profile_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_profile_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_profile_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_profile_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_details_list->pageUrl() ?>start=<?php echo $lab_profile_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_profile_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_profile_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_profile_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_profile_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_profile_details_list->TotalRecs > 0 && (!$lab_profile_details_list->AutoHidePageSizeSelector || $lab_profile_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_profile_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_profile_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_profile_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_profile_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_profile_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_profile_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_profile_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_profile_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_profile_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_profile_details_list->TotalRecs == 0 && !$lab_profile_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_profile_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_profile_details_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_details->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_profile_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_profile_details", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_profile_details_list->terminate();
?>