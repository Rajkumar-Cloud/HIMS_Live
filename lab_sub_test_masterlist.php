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
$lab_sub_test_master_list = new lab_sub_test_master_list();

// Run the page
$lab_sub_test_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sub_test_master_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_sub_test_masterlist = currentForm = new ew.Form("flab_sub_test_masterlist", "list");
flab_sub_test_masterlist.formKeyCountName = '<?php echo $lab_sub_test_master_list->FormKeyCountName ?>';

// Validate form
flab_sub_test_masterlist.validate = function() {
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
		<?php if ($lab_sub_test_master_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->id->caption(), $lab_sub_test_master->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_list->TestMasterID->Required) { ?>
			elm = this.getElements("x" + infix + "_TestMasterID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->TestMasterID->caption(), $lab_sub_test_master->TestMasterID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestMasterID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_sub_test_master->TestMasterID->errorMessage()) ?>");
		<?php if ($lab_sub_test_master_list->SubTestName->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTestName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->SubTestName->caption(), $lab_sub_test_master->SubTestName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_list->TestOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->TestOrder->caption(), $lab_sub_test_master->TestOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_sub_test_master->TestOrder->errorMessage()) ?>");
		<?php if ($lab_sub_test_master_list->NormalRange->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalRange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->NormalRange->caption(), $lab_sub_test_master->NormalRange->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_list->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->Created->caption(), $lab_sub_test_master->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_list->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->CreatedBy->caption(), $lab_sub_test_master->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_list->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->Modified->caption(), $lab_sub_test_master->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_list->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->ModifiedBy->caption(), $lab_sub_test_master->ModifiedBy->RequiredErrorMessage)) ?>");
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
flab_sub_test_masterlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TestMasterID", false)) return false;
	if (ew.valueChanged(fobj, infix, "SubTestName", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestOrder", false)) return false;
	if (ew.valueChanged(fobj, infix, "NormalRange", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_sub_test_masterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sub_test_masterlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_sub_test_masterlist.lists["x_SubTestName"] = <?php echo $lab_sub_test_master_list->SubTestName->Lookup->toClientList() ?>;
flab_sub_test_masterlist.lists["x_SubTestName"].options = <?php echo JsonEncode($lab_sub_test_master_list->SubTestName->lookupOptions()) ?>;

// Form object for search
var flab_sub_test_masterlistsrch = currentSearchForm = new ew.Form("flab_sub_test_masterlistsrch");

// Filters
flab_sub_test_masterlistsrch.filterList = <?php echo $lab_sub_test_master_list->getFilterList() ?>;
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
<?php if (!$lab_sub_test_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_sub_test_master_list->TotalRecs > 0 && $lab_sub_test_master_list->ExportOptions->visible()) { ?>
<?php $lab_sub_test_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sub_test_master_list->ImportOptions->visible()) { ?>
<?php $lab_sub_test_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sub_test_master_list->SearchOptions->visible()) { ?>
<?php $lab_sub_test_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_sub_test_master_list->FilterOptions->visible()) { ?>
<?php $lab_sub_test_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$lab_sub_test_master->isExport() || EXPORT_MASTER_RECORD && $lab_sub_test_master->isExport("print")) { ?>
<?php
if ($lab_sub_test_master_list->DbMasterFilter <> "" && $lab_sub_test_master->getCurrentMasterTable() == "lab_test_master") {
	if ($lab_sub_test_master_list->MasterRecordExists) {
		include_once "lab_test_mastermaster.php";
	}
}
?>
<?php } ?>
<?php
$lab_sub_test_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_sub_test_master->isExport() && !$lab_sub_test_master->CurrentAction) { ?>
<form name="flab_sub_test_masterlistsrch" id="flab_sub_test_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_sub_test_master_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_sub_test_masterlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_sub_test_master">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_sub_test_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_sub_test_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_sub_test_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_sub_test_master_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_sub_test_master_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_sub_test_master_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_sub_test_master_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_sub_test_master_list->showPageHeader(); ?>
<?php
$lab_sub_test_master_list->showMessage();
?>
<?php if ($lab_sub_test_master_list->TotalRecs > 0 || $lab_sub_test_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_sub_test_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_sub_test_master">
<?php if (!$lab_sub_test_master->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_sub_test_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_sub_test_master_list->Pager)) $lab_sub_test_master_list->Pager = new NumericPager($lab_sub_test_master_list->StartRec, $lab_sub_test_master_list->DisplayRecs, $lab_sub_test_master_list->TotalRecs, $lab_sub_test_master_list->RecRange, $lab_sub_test_master_list->AutoHidePager) ?>
<?php if ($lab_sub_test_master_list->Pager->RecordCount > 0 && $lab_sub_test_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_sub_test_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_sub_test_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_sub_test_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_sub_test_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_sub_test_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_sub_test_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_sub_test_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_sub_test_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_sub_test_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_sub_test_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_sub_test_master_list->TotalRecs > 0 && (!$lab_sub_test_master_list->AutoHidePageSizeSelector || $lab_sub_test_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_sub_test_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_sub_test_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_sub_test_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_sub_test_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_sub_test_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_sub_test_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_sub_test_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_sub_test_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_sub_test_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_sub_test_masterlist" id="flab_sub_test_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sub_test_master_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sub_test_master_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sub_test_master">
<?php if ($lab_sub_test_master->getCurrentMasterTable() == "lab_test_master" && $lab_sub_test_master->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="lab_test_master">
<input type="hidden" name="fk_id" value="<?php echo $lab_sub_test_master->TestMasterID->getSessionValue() ?>">
<?php } ?>
<div id="gmp_lab_sub_test_master" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_sub_test_master_list->TotalRecs > 0 || $lab_sub_test_master->isGridEdit()) { ?>
<table id="tbl_lab_sub_test_masterlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_sub_test_master_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_sub_test_master_list->renderListOptions();

// Render list options (header, left)
$lab_sub_test_master_list->ListOptions->render("header", "left");
?>
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><div id="elh_lab_sub_test_master_id" class="lab_sub_test_master_id"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->id) ?>',1);"><div id="elh_lab_sub_test_master_id" class="lab_sub_test_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->TestMasterID) == "") { ?>
		<th data-name="TestMasterID" class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><div id="elh_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestMasterID" class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->TestMasterID) ?>',1);"><div id="elh_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->TestMasterID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->TestMasterID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->SubTestName) == "") { ?>
		<th data-name="SubTestName" class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><div id="elh_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->SubTestName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTestName" class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->SubTestName) ?>',1);"><div id="elh_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->SubTestName->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->SubTestName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->SubTestName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->TestOrder) == "") { ?>
		<th data-name="TestOrder" class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><div id="elh_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestOrder" class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->TestOrder) ?>',1);"><div id="elh_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->TestOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->TestOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->NormalRange) == "") { ?>
		<th data-name="NormalRange" class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><div id="elh_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->NormalRange->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalRange" class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->NormalRange) ?>',1);"><div id="elh_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->NormalRange->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->NormalRange->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->NormalRange->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><div id="elh_lab_sub_test_master_Created" class="lab_sub_test_master_Created"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->Created) ?>',1);"><div id="elh_lab_sub_test_master_Created" class="lab_sub_test_master_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->Created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->Created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><div id="elh_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->CreatedBy) ?>',1);"><div id="elh_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><div id="elh_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->Modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->Modified) ?>',1);"><div id="elh_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->Modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->Modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><div id="elh_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_sub_test_master->SortUrl($lab_sub_test_master->ModifiedBy) ?>',1);"><div id="elh_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_sub_test_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_sub_test_master->ExportAll && $lab_sub_test_master->isExport()) {
	$lab_sub_test_master_list->StopRec = $lab_sub_test_master_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_sub_test_master_list->TotalRecs > $lab_sub_test_master_list->StartRec + $lab_sub_test_master_list->DisplayRecs - 1)
		$lab_sub_test_master_list->StopRec = $lab_sub_test_master_list->StartRec + $lab_sub_test_master_list->DisplayRecs - 1;
	else
		$lab_sub_test_master_list->StopRec = $lab_sub_test_master_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $lab_sub_test_master_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_sub_test_master_list->FormKeyCountName) && ($lab_sub_test_master->isGridAdd() || $lab_sub_test_master->isGridEdit() || $lab_sub_test_master->isConfirm())) {
		$lab_sub_test_master_list->KeyCount = $CurrentForm->getValue($lab_sub_test_master_list->FormKeyCountName);
		$lab_sub_test_master_list->StopRec = $lab_sub_test_master_list->StartRec + $lab_sub_test_master_list->KeyCount - 1;
	}
}
$lab_sub_test_master_list->RecCnt = $lab_sub_test_master_list->StartRec - 1;
if ($lab_sub_test_master_list->Recordset && !$lab_sub_test_master_list->Recordset->EOF) {
	$lab_sub_test_master_list->Recordset->moveFirst();
	$selectLimit = $lab_sub_test_master_list->UseSelectLimit;
	if (!$selectLimit && $lab_sub_test_master_list->StartRec > 1)
		$lab_sub_test_master_list->Recordset->move($lab_sub_test_master_list->StartRec - 1);
} elseif (!$lab_sub_test_master->AllowAddDeleteRow && $lab_sub_test_master_list->StopRec == 0) {
	$lab_sub_test_master_list->StopRec = $lab_sub_test_master->GridAddRowCount;
}

// Initialize aggregate
$lab_sub_test_master->RowType = ROWTYPE_AGGREGATEINIT;
$lab_sub_test_master->resetAttributes();
$lab_sub_test_master_list->renderRow();
if ($lab_sub_test_master->isGridAdd())
	$lab_sub_test_master_list->RowIndex = 0;
if ($lab_sub_test_master->isGridEdit())
	$lab_sub_test_master_list->RowIndex = 0;
while ($lab_sub_test_master_list->RecCnt < $lab_sub_test_master_list->StopRec) {
	$lab_sub_test_master_list->RecCnt++;
	if ($lab_sub_test_master_list->RecCnt >= $lab_sub_test_master_list->StartRec) {
		$lab_sub_test_master_list->RowCnt++;
		if ($lab_sub_test_master->isGridAdd() || $lab_sub_test_master->isGridEdit() || $lab_sub_test_master->isConfirm()) {
			$lab_sub_test_master_list->RowIndex++;
			$CurrentForm->Index = $lab_sub_test_master_list->RowIndex;
			if ($CurrentForm->hasValue($lab_sub_test_master_list->FormActionName) && $lab_sub_test_master_list->EventCancelled)
				$lab_sub_test_master_list->RowAction = strval($CurrentForm->getValue($lab_sub_test_master_list->FormActionName));
			elseif ($lab_sub_test_master->isGridAdd())
				$lab_sub_test_master_list->RowAction = "insert";
			else
				$lab_sub_test_master_list->RowAction = "";
		}

		// Set up key count
		$lab_sub_test_master_list->KeyCount = $lab_sub_test_master_list->RowIndex;

		// Init row class and style
		$lab_sub_test_master->resetAttributes();
		$lab_sub_test_master->CssClass = "";
		if ($lab_sub_test_master->isGridAdd()) {
			$lab_sub_test_master_list->loadRowValues(); // Load default values
		} else {
			$lab_sub_test_master_list->loadRowValues($lab_sub_test_master_list->Recordset); // Load row values
		}
		$lab_sub_test_master->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_sub_test_master->isGridAdd()) // Grid add
			$lab_sub_test_master->RowType = ROWTYPE_ADD; // Render add
		if ($lab_sub_test_master->isGridAdd() && $lab_sub_test_master->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_sub_test_master_list->restoreCurrentRowFormValues($lab_sub_test_master_list->RowIndex); // Restore form values
		if ($lab_sub_test_master->isGridEdit()) { // Grid edit
			if ($lab_sub_test_master->EventCancelled)
				$lab_sub_test_master_list->restoreCurrentRowFormValues($lab_sub_test_master_list->RowIndex); // Restore form values
			if ($lab_sub_test_master_list->RowAction == "insert")
				$lab_sub_test_master->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_sub_test_master->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_sub_test_master->isGridEdit() && ($lab_sub_test_master->RowType == ROWTYPE_EDIT || $lab_sub_test_master->RowType == ROWTYPE_ADD) && $lab_sub_test_master->EventCancelled) // Update failed
			$lab_sub_test_master_list->restoreCurrentRowFormValues($lab_sub_test_master_list->RowIndex); // Restore form values
		if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) // Edit row
			$lab_sub_test_master_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$lab_sub_test_master->RowAttrs = array_merge($lab_sub_test_master->RowAttrs, array('data-rowindex'=>$lab_sub_test_master_list->RowCnt, 'id'=>'r' . $lab_sub_test_master_list->RowCnt . '_lab_sub_test_master', 'data-rowtype'=>$lab_sub_test_master->RowType));

		// Render row
		$lab_sub_test_master_list->renderRow();

		// Render list options
		$lab_sub_test_master_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_sub_test_master_list->RowAction <> "delete" && $lab_sub_test_master_list->RowAction <> "insertdelete" && !($lab_sub_test_master_list->RowAction == "insert" && $lab_sub_test_master->isConfirm() && $lab_sub_test_master_list->emptyRow())) {
?>
	<tr<?php echo $lab_sub_test_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sub_test_master_list->ListOptions->render("body", "left", $lab_sub_test_master_list->RowCnt);
?>
	<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_sub_test_master->id->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_id" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_id" class="form-group lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_id" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_id" class="lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<?php echo $lab_sub_test_master->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<td data-name="TestMasterID"<?php echo $lab_sub_test_master->TestMasterID->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestMasterID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<td data-name="SubTestName"<?php echo $lab_sub_test_master->SubTestName->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x" . $lab_sub_test_master_list->RowIndex . "_SubTestName") ?>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x" . $lab_sub_test_master_list->RowIndex . "_SubTestName") ?>
</span>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName">
<span<?php echo $lab_sub_test_master->SubTestName->viewAttributes() ?>>
<?php echo $lab_sub_test_master->SubTestName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder"<?php echo $lab_sub_test_master->TestOrder->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder">
<span<?php echo $lab_sub_test_master->TestOrder->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange"<?php echo $lab_sub_test_master->NormalRange->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange">
<span<?php echo $lab_sub_test_master->NormalRange->viewAttributes() ?>>
<?php echo $lab_sub_test_master->NormalRange->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<td data-name="Created"<?php echo $lab_sub_test_master->Created->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Created" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_Created" class="lab_sub_test_master_Created">
<span<?php echo $lab_sub_test_master->Created->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Created->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $lab_sub_test_master->CreatedBy->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_CreatedBy" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy">
<span<?php echo $lab_sub_test_master->CreatedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->CreatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<td data-name="Modified"<?php echo $lab_sub_test_master->Modified->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Modified" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified">
<span<?php echo $lab_sub_test_master->Modified->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Modified->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $lab_sub_test_master->ModifiedBy->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_list->RowCnt ?>_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy">
<span<?php echo $lab_sub_test_master->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->ModifiedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_sub_test_master_list->ListOptions->render("body", "right", $lab_sub_test_master_list->RowCnt);
?>
	</tr>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD || $lab_sub_test_master->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_sub_test_masterlist.updateLists(<?php echo $lab_sub_test_master_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_sub_test_master->isGridAdd())
		if (!$lab_sub_test_master_list->Recordset->EOF)
			$lab_sub_test_master_list->Recordset->moveNext();
}
?>
<?php
	if ($lab_sub_test_master->isGridAdd() || $lab_sub_test_master->isGridEdit()) {
		$lab_sub_test_master_list->RowIndex = '$rowindex$';
		$lab_sub_test_master_list->loadRowValues();

		// Set row properties
		$lab_sub_test_master->resetAttributes();
		$lab_sub_test_master->RowAttrs = array_merge($lab_sub_test_master->RowAttrs, array('data-rowindex'=>$lab_sub_test_master_list->RowIndex, 'id'=>'r0_lab_sub_test_master', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_sub_test_master->RowAttrs["class"], "ew-template");
		$lab_sub_test_master->RowType = ROWTYPE_ADD;

		// Render row
		$lab_sub_test_master_list->renderRow();

		// Render list options
		$lab_sub_test_master_list->renderListOptions();
		$lab_sub_test_master_list->StartRowCnt = 0;
?>
	<tr<?php echo $lab_sub_test_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sub_test_master_list->ListOptions->render("body", "left", $lab_sub_test_master_list->RowIndex);
?>
	<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_id" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<td data-name="TestMasterID">
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<td data-name="SubTestName">
<span id="el$rowindex$_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x" . $lab_sub_test_master_list->RowIndex . "_SubTestName") ?>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder">
<span id="el$rowindex$_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange">
<span id="el$rowindex$_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<td data-name="Created">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Created" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_CreatedBy" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<td data-name="Modified">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Modified" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="o<?php echo $lab_sub_test_master_list->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_sub_test_master_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_sub_test_master_list->ListOptions->render("body", "right", $lab_sub_test_master_list->RowIndex);
?>
<script>
flab_sub_test_masterlist.updateLists(<?php echo $lab_sub_test_master_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($lab_sub_test_master->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $lab_sub_test_master_list->FormKeyCountName ?>" id="<?php echo $lab_sub_test_master_list->FormKeyCountName ?>" value="<?php echo $lab_sub_test_master_list->KeyCount ?>">
<?php echo $lab_sub_test_master_list->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_sub_test_master->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $lab_sub_test_master_list->FormKeyCountName ?>" id="<?php echo $lab_sub_test_master_list->FormKeyCountName ?>" value="<?php echo $lab_sub_test_master_list->KeyCount ?>">
<?php echo $lab_sub_test_master_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$lab_sub_test_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_sub_test_master_list->Recordset)
	$lab_sub_test_master_list->Recordset->Close();
?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_sub_test_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_sub_test_master_list->Pager)) $lab_sub_test_master_list->Pager = new NumericPager($lab_sub_test_master_list->StartRec, $lab_sub_test_master_list->DisplayRecs, $lab_sub_test_master_list->TotalRecs, $lab_sub_test_master_list->RecRange, $lab_sub_test_master_list->AutoHidePager) ?>
<?php if ($lab_sub_test_master_list->Pager->RecordCount > 0 && $lab_sub_test_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_sub_test_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_sub_test_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_sub_test_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_sub_test_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_sub_test_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_sub_test_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_sub_test_master_list->pageUrl() ?>start=<?php echo $lab_sub_test_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_sub_test_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_sub_test_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_sub_test_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_sub_test_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_sub_test_master_list->TotalRecs > 0 && (!$lab_sub_test_master_list->AutoHidePageSizeSelector || $lab_sub_test_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_sub_test_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_sub_test_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_sub_test_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_sub_test_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_sub_test_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_sub_test_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_sub_test_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_sub_test_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_sub_test_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_sub_test_master_list->TotalRecs == 0 && !$lab_sub_test_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_sub_test_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_sub_test_master_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_sub_test_master", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_sub_test_master_list->terminate();
?>