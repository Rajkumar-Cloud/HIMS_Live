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
$ivf_oocytedenudation_stage_list = new ivf_oocytedenudation_stage_list();

// Run the page
$ivf_oocytedenudation_stage_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_oocytedenudation_stagelist = currentForm = new ew.Form("fivf_oocytedenudation_stagelist", "list");
fivf_oocytedenudation_stagelist.formKeyCountName = '<?php echo $ivf_oocytedenudation_stage_list->FormKeyCountName ?>';

// Validate form
fivf_oocytedenudation_stagelist.validate = function() {
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
		<?php if ($ivf_oocytedenudation_stage_list->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage->OocyteNo->caption(), $ivf_oocytedenudation_stage->OocyteNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_stage_list->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage->Stage->caption(), $ivf_oocytedenudation_stage->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_stage_list->ReMarks->Required) { ?>
			elm = this.getElements("x" + infix + "_ReMarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage->ReMarks->caption(), $ivf_oocytedenudation_stage->ReMarks->RequiredErrorMessage)) ?>");
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
fivf_oocytedenudation_stagelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "OocyteNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Stage", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReMarks", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_oocytedenudation_stagelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudation_stagelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudation_stagelist.lists["x_Stage"] = <?php echo $ivf_oocytedenudation_stage_list->Stage->Lookup->toClientList() ?>;
fivf_oocytedenudation_stagelist.lists["x_Stage"].options = <?php echo JsonEncode($ivf_oocytedenudation_stage_list->Stage->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_oocytedenudation_stagelistsrch = currentSearchForm = new ew.Form("fivf_oocytedenudation_stagelistsrch");

// Filters
fivf_oocytedenudation_stagelistsrch.filterList = <?php echo $ivf_oocytedenudation_stage_list->getFilterList() ?>;
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
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_oocytedenudation_stage_list->TotalRecs > 0 && $ivf_oocytedenudation_stage_list->ExportOptions->visible()) { ?>
<?php $ivf_oocytedenudation_stage_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->ImportOptions->visible()) { ?>
<?php $ivf_oocytedenudation_stage_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->SearchOptions->visible()) { ?>
<?php $ivf_oocytedenudation_stage_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->FilterOptions->visible()) { ?>
<?php $ivf_oocytedenudation_stage_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_oocytedenudation_stage_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_oocytedenudation_stage->isExport() && !$ivf_oocytedenudation_stage->CurrentAction) { ?>
<form name="fivf_oocytedenudation_stagelistsrch" id="fivf_oocytedenudation_stagelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_oocytedenudation_stage_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_oocytedenudation_stagelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_oocytedenudation_stage_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_stage_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_stage_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_stage_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_stage_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_oocytedenudation_stage_list->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_list->showMessage();
?>
<?php if ($ivf_oocytedenudation_stage_list->TotalRecs > 0 || $ivf_oocytedenudation_stage->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_oocytedenudation_stage_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation_stage">
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_oocytedenudation_stage->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_oocytedenudation_stage_list->Pager)) $ivf_oocytedenudation_stage_list->Pager = new NumericPager($ivf_oocytedenudation_stage_list->StartRec, $ivf_oocytedenudation_stage_list->DisplayRecs, $ivf_oocytedenudation_stage_list->TotalRecs, $ivf_oocytedenudation_stage_list->RecRange, $ivf_oocytedenudation_stage_list->AutoHidePager) ?>
<?php if ($ivf_oocytedenudation_stage_list->Pager->RecordCount > 0 && $ivf_oocytedenudation_stage_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_oocytedenudation_stage_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_oocytedenudation_stage_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_oocytedenudation_stage_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->TotalRecs > 0 && (!$ivf_oocytedenudation_stage_list->AutoHidePageSizeSelector || $ivf_oocytedenudation_stage_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_oocytedenudation_stage->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_stage_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_oocytedenudation_stagelist" id="fivf_oocytedenudation_stagelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_stage_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_stage_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<div id="gmp_ivf_oocytedenudation_stage" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_oocytedenudation_stage_list->TotalRecs > 0 || $ivf_oocytedenudation_stage->isGridEdit()) { ?>
<table id="tbl_ivf_oocytedenudation_stagelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_oocytedenudation_stage_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_oocytedenudation_stage_list->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_stage_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($ivf_oocytedenudation_stage->sortUrl($ivf_oocytedenudation_stage->OocyteNo) == "") { ?>
		<th data-name="OocyteNo" class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteNo" class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation_stage->SortUrl($ivf_oocytedenudation_stage->OocyteNo) ?>',1);"><div id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage->OocyteNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_stage->OocyteNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
	<?php if ($ivf_oocytedenudation_stage->sortUrl($ivf_oocytedenudation_stage->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation_stage->SortUrl($ivf_oocytedenudation_stage->Stage) ?>',1);"><div id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_stage->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
	<?php if ($ivf_oocytedenudation_stage->sortUrl($ivf_oocytedenudation_stage->ReMarks) == "") { ?>
		<th data-name="ReMarks" class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReMarks" class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_oocytedenudation_stage->SortUrl($ivf_oocytedenudation_stage->ReMarks) ?>',1);"><div id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage->ReMarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_stage->ReMarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_stage_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_oocytedenudation_stage->ExportAll && $ivf_oocytedenudation_stage->isExport()) {
	$ivf_oocytedenudation_stage_list->StopRec = $ivf_oocytedenudation_stage_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_oocytedenudation_stage_list->TotalRecs > $ivf_oocytedenudation_stage_list->StartRec + $ivf_oocytedenudation_stage_list->DisplayRecs - 1)
		$ivf_oocytedenudation_stage_list->StopRec = $ivf_oocytedenudation_stage_list->StartRec + $ivf_oocytedenudation_stage_list->DisplayRecs - 1;
	else
		$ivf_oocytedenudation_stage_list->StopRec = $ivf_oocytedenudation_stage_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $ivf_oocytedenudation_stage_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_oocytedenudation_stage_list->FormKeyCountName) && ($ivf_oocytedenudation_stage->isGridAdd() || $ivf_oocytedenudation_stage->isGridEdit() || $ivf_oocytedenudation_stage->isConfirm())) {
		$ivf_oocytedenudation_stage_list->KeyCount = $CurrentForm->getValue($ivf_oocytedenudation_stage_list->FormKeyCountName);
		$ivf_oocytedenudation_stage_list->StopRec = $ivf_oocytedenudation_stage_list->StartRec + $ivf_oocytedenudation_stage_list->KeyCount - 1;
	}
}
$ivf_oocytedenudation_stage_list->RecCnt = $ivf_oocytedenudation_stage_list->StartRec - 1;
if ($ivf_oocytedenudation_stage_list->Recordset && !$ivf_oocytedenudation_stage_list->Recordset->EOF) {
	$ivf_oocytedenudation_stage_list->Recordset->moveFirst();
	$selectLimit = $ivf_oocytedenudation_stage_list->UseSelectLimit;
	if (!$selectLimit && $ivf_oocytedenudation_stage_list->StartRec > 1)
		$ivf_oocytedenudation_stage_list->Recordset->move($ivf_oocytedenudation_stage_list->StartRec - 1);
} elseif (!$ivf_oocytedenudation_stage->AllowAddDeleteRow && $ivf_oocytedenudation_stage_list->StopRec == 0) {
	$ivf_oocytedenudation_stage_list->StopRec = $ivf_oocytedenudation_stage->GridAddRowCount;
}

// Initialize aggregate
$ivf_oocytedenudation_stage->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_oocytedenudation_stage->resetAttributes();
$ivf_oocytedenudation_stage_list->renderRow();
if ($ivf_oocytedenudation_stage->isGridAdd())
	$ivf_oocytedenudation_stage_list->RowIndex = 0;
if ($ivf_oocytedenudation_stage->isGridEdit())
	$ivf_oocytedenudation_stage_list->RowIndex = 0;
while ($ivf_oocytedenudation_stage_list->RecCnt < $ivf_oocytedenudation_stage_list->StopRec) {
	$ivf_oocytedenudation_stage_list->RecCnt++;
	if ($ivf_oocytedenudation_stage_list->RecCnt >= $ivf_oocytedenudation_stage_list->StartRec) {
		$ivf_oocytedenudation_stage_list->RowCnt++;
		if ($ivf_oocytedenudation_stage->isGridAdd() || $ivf_oocytedenudation_stage->isGridEdit() || $ivf_oocytedenudation_stage->isConfirm()) {
			$ivf_oocytedenudation_stage_list->RowIndex++;
			$CurrentForm->Index = $ivf_oocytedenudation_stage_list->RowIndex;
			if ($CurrentForm->hasValue($ivf_oocytedenudation_stage_list->FormActionName) && $ivf_oocytedenudation_stage_list->EventCancelled)
				$ivf_oocytedenudation_stage_list->RowAction = strval($CurrentForm->getValue($ivf_oocytedenudation_stage_list->FormActionName));
			elseif ($ivf_oocytedenudation_stage->isGridAdd())
				$ivf_oocytedenudation_stage_list->RowAction = "insert";
			else
				$ivf_oocytedenudation_stage_list->RowAction = "";
		}

		// Set up key count
		$ivf_oocytedenudation_stage_list->KeyCount = $ivf_oocytedenudation_stage_list->RowIndex;

		// Init row class and style
		$ivf_oocytedenudation_stage->resetAttributes();
		$ivf_oocytedenudation_stage->CssClass = "";
		if ($ivf_oocytedenudation_stage->isGridAdd()) {
			$ivf_oocytedenudation_stage_list->loadRowValues(); // Load default values
		} else {
			$ivf_oocytedenudation_stage_list->loadRowValues($ivf_oocytedenudation_stage_list->Recordset); // Load row values
		}
		$ivf_oocytedenudation_stage->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_oocytedenudation_stage->isGridAdd()) // Grid add
			$ivf_oocytedenudation_stage->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_oocytedenudation_stage->isGridAdd() && $ivf_oocytedenudation_stage->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_oocytedenudation_stage_list->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_list->RowIndex); // Restore form values
		if ($ivf_oocytedenudation_stage->isGridEdit()) { // Grid edit
			if ($ivf_oocytedenudation_stage->EventCancelled)
				$ivf_oocytedenudation_stage_list->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_list->RowIndex); // Restore form values
			if ($ivf_oocytedenudation_stage_list->RowAction == "insert")
				$ivf_oocytedenudation_stage->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_oocytedenudation_stage->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_oocytedenudation_stage->isGridEdit() && ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT || $ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) && $ivf_oocytedenudation_stage->EventCancelled) // Update failed
			$ivf_oocytedenudation_stage_list->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_list->RowIndex); // Restore form values
		if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_oocytedenudation_stage_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$ivf_oocytedenudation_stage->RowAttrs = array_merge($ivf_oocytedenudation_stage->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_stage_list->RowCnt, 'id'=>'r' . $ivf_oocytedenudation_stage_list->RowCnt . '_ivf_oocytedenudation_stage', 'data-rowtype'=>$ivf_oocytedenudation_stage->RowType));

		// Render row
		$ivf_oocytedenudation_stage_list->renderRow();

		// Render list options
		$ivf_oocytedenudation_stage_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_oocytedenudation_stage_list->RowAction <> "delete" && $ivf_oocytedenudation_stage_list->RowAction <> "insertdelete" && !($ivf_oocytedenudation_stage_list->RowAction == "insert" && $ivf_oocytedenudation_stage->isConfirm() && $ivf_oocytedenudation_stage_list->emptyRow())) {
?>
	<tr<?php echo $ivf_oocytedenudation_stage->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_stage_list->ListOptions->render("body", "left", $ivf_oocytedenudation_stage_list->RowCnt);
?>
	<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo"<?php echo $ivf_oocytedenudation_stage->OocyteNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->OocyteNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->OocyteNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT || $ivf_oocytedenudation_stage->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $ivf_oocytedenudation_stage->Stage->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage"<?php echo $ivf_oocytedenudation_stage->Stage->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation_stage->Stage->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage"<?php echo $ivf_oocytedenudation_stage->Stage->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation_stage->Stage->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage->Stage->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<td data-name="ReMarks"<?php echo $ivf_oocytedenudation_stage->ReMarks->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->ReMarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->ReMarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_list->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage->ReMarks->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->ReMarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_stage_list->ListOptions->render("body", "right", $ivf_oocytedenudation_stage_list->RowCnt);
?>
	</tr>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD || $ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_oocytedenudation_stagelist.updateLists(<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_oocytedenudation_stage->isGridAdd())
		if (!$ivf_oocytedenudation_stage_list->Recordset->EOF)
			$ivf_oocytedenudation_stage_list->Recordset->moveNext();
}
?>
<?php
	if ($ivf_oocytedenudation_stage->isGridAdd() || $ivf_oocytedenudation_stage->isGridEdit()) {
		$ivf_oocytedenudation_stage_list->RowIndex = '$rowindex$';
		$ivf_oocytedenudation_stage_list->loadRowValues();

		// Set row properties
		$ivf_oocytedenudation_stage->resetAttributes();
		$ivf_oocytedenudation_stage->RowAttrs = array_merge($ivf_oocytedenudation_stage->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_stage_list->RowIndex, 'id'=>'r0_ivf_oocytedenudation_stage', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_oocytedenudation_stage->RowAttrs["class"], "ew-template");
		$ivf_oocytedenudation_stage->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_oocytedenudation_stage_list->renderRow();

		// Render list options
		$ivf_oocytedenudation_stage_list->renderListOptions();
		$ivf_oocytedenudation_stage_list->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_oocytedenudation_stage->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_stage_list->ListOptions->render("body", "left", $ivf_oocytedenudation_stage_list->RowIndex);
?>
	<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo">
<span id="el$rowindex$_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el$rowindex$_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage"<?php echo $ivf_oocytedenudation_stage->Stage->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation_stage->Stage->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<td data-name="ReMarks">
<span id="el$rowindex$_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->ReMarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" id="o<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_stage_list->ListOptions->render("body", "right", $ivf_oocytedenudation_stage_list->RowIndex);
?>
<script>
fivf_oocytedenudation_stagelist.updateLists(<?php echo $ivf_oocytedenudation_stage_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $ivf_oocytedenudation_stage_list->FormKeyCountName ?>" id="<?php echo $ivf_oocytedenudation_stage_list->FormKeyCountName ?>" value="<?php echo $ivf_oocytedenudation_stage_list->KeyCount ?>">
<?php echo $ivf_oocytedenudation_stage_list->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $ivf_oocytedenudation_stage_list->FormKeyCountName ?>" id="<?php echo $ivf_oocytedenudation_stage_list->FormKeyCountName ?>" value="<?php echo $ivf_oocytedenudation_stage_list->KeyCount ?>">
<?php echo $ivf_oocytedenudation_stage_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$ivf_oocytedenudation_stage->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_oocytedenudation_stage_list->Recordset)
	$ivf_oocytedenudation_stage_list->Recordset->Close();
?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_oocytedenudation_stage->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_oocytedenudation_stage_list->Pager)) $ivf_oocytedenudation_stage_list->Pager = new NumericPager($ivf_oocytedenudation_stage_list->StartRec, $ivf_oocytedenudation_stage_list->DisplayRecs, $ivf_oocytedenudation_stage_list->TotalRecs, $ivf_oocytedenudation_stage_list->RecRange, $ivf_oocytedenudation_stage_list->AutoHidePager) ?>
<?php if ($ivf_oocytedenudation_stage_list->Pager->RecordCount > 0 && $ivf_oocytedenudation_stage_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_oocytedenudation_stage_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_oocytedenudation_stage_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_oocytedenudation_stage_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_oocytedenudation_stage_list->pageUrl() ?>start=<?php echo $ivf_oocytedenudation_stage_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_oocytedenudation_stage_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->TotalRecs > 0 && (!$ivf_oocytedenudation_stage_list->AutoHidePageSizeSelector || $ivf_oocytedenudation_stage_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_oocytedenudation_stage_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_oocytedenudation_stage->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_stage_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_list->TotalRecs == 0 && !$ivf_oocytedenudation_stage->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_stage_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_oocytedenudation_stage_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_oocytedenudation_stage", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_stage_list->terminate();
?>