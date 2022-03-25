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
$hr_trainingsessions_list = new hr_trainingsessions_list();

// Run the page
$hr_trainingsessions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_trainingsessions_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_trainingsessionslist = currentForm = new ew.Form("fhr_trainingsessionslist", "list");
fhr_trainingsessionslist.formKeyCountName = '<?php echo $hr_trainingsessions_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_trainingsessionslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_trainingsessionslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_trainingsessionslist.lists["x_deliveryMethod"] = <?php echo $hr_trainingsessions_list->deliveryMethod->Lookup->toClientList() ?>;
fhr_trainingsessionslist.lists["x_deliveryMethod"].options = <?php echo JsonEncode($hr_trainingsessions_list->deliveryMethod->options(FALSE, TRUE)) ?>;
fhr_trainingsessionslist.lists["x_status"] = <?php echo $hr_trainingsessions_list->status->Lookup->toClientList() ?>;
fhr_trainingsessionslist.lists["x_status"].options = <?php echo JsonEncode($hr_trainingsessions_list->status->options(FALSE, TRUE)) ?>;
fhr_trainingsessionslist.lists["x_attendanceType"] = <?php echo $hr_trainingsessions_list->attendanceType->Lookup->toClientList() ?>;
fhr_trainingsessionslist.lists["x_attendanceType"].options = <?php echo JsonEncode($hr_trainingsessions_list->attendanceType->options(FALSE, TRUE)) ?>;
fhr_trainingsessionslist.lists["x_requireProof"] = <?php echo $hr_trainingsessions_list->requireProof->Lookup->toClientList() ?>;
fhr_trainingsessionslist.lists["x_requireProof"].options = <?php echo JsonEncode($hr_trainingsessions_list->requireProof->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_trainingsessionslistsrch = currentSearchForm = new ew.Form("fhr_trainingsessionslistsrch");

// Validate function for search
fhr_trainingsessionslistsrch.validate = function(fobj) {
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
fhr_trainingsessionslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_trainingsessionslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_trainingsessionslistsrch.lists["x_deliveryMethod"] = <?php echo $hr_trainingsessions_list->deliveryMethod->Lookup->toClientList() ?>;
fhr_trainingsessionslistsrch.lists["x_deliveryMethod"].options = <?php echo JsonEncode($hr_trainingsessions_list->deliveryMethod->options(FALSE, TRUE)) ?>;
fhr_trainingsessionslistsrch.lists["x_status"] = <?php echo $hr_trainingsessions_list->status->Lookup->toClientList() ?>;
fhr_trainingsessionslistsrch.lists["x_status"].options = <?php echo JsonEncode($hr_trainingsessions_list->status->options(FALSE, TRUE)) ?>;
fhr_trainingsessionslistsrch.lists["x_attendanceType"] = <?php echo $hr_trainingsessions_list->attendanceType->Lookup->toClientList() ?>;
fhr_trainingsessionslistsrch.lists["x_attendanceType"].options = <?php echo JsonEncode($hr_trainingsessions_list->attendanceType->options(FALSE, TRUE)) ?>;
fhr_trainingsessionslistsrch.lists["x_requireProof"] = <?php echo $hr_trainingsessions_list->requireProof->Lookup->toClientList() ?>;
fhr_trainingsessionslistsrch.lists["x_requireProof"].options = <?php echo JsonEncode($hr_trainingsessions_list->requireProof->options(FALSE, TRUE)) ?>;

// Filters
fhr_trainingsessionslistsrch.filterList = <?php echo $hr_trainingsessions_list->getFilterList() ?>;
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
<?php if (!$hr_trainingsessions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_trainingsessions_list->TotalRecs > 0 && $hr_trainingsessions_list->ExportOptions->visible()) { ?>
<?php $hr_trainingsessions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_trainingsessions_list->ImportOptions->visible()) { ?>
<?php $hr_trainingsessions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_trainingsessions_list->SearchOptions->visible()) { ?>
<?php $hr_trainingsessions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_trainingsessions_list->FilterOptions->visible()) { ?>
<?php $hr_trainingsessions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_trainingsessions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_trainingsessions->isExport() && !$hr_trainingsessions->CurrentAction) { ?>
<form name="fhr_trainingsessionslistsrch" id="fhr_trainingsessionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_trainingsessions_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_trainingsessionslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_trainingsessions">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_trainingsessions_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_trainingsessions->RowType = ROWTYPE_SEARCH;

// Render row
$hr_trainingsessions->resetAttributes();
$hr_trainingsessions_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
	<div id="xsc_deliveryMethod" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_trainingsessions->deliveryMethod->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_deliveryMethod" id="z_deliveryMethod" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_deliveryMethod" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_deliveryMethod" data-value-separator="<?php echo $hr_trainingsessions->deliveryMethod->displayValueSeparatorAttribute() ?>" name="x_deliveryMethod" id="x_deliveryMethod" value="{value}"<?php echo $hr_trainingsessions->deliveryMethod->editAttributes() ?>></div>
<div id="dsl_x_deliveryMethod" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->deliveryMethod->radioButtonListHtml(FALSE, "x_deliveryMethod") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($hr_trainingsessions->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_trainingsessions->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_status" data-value-separator="<?php echo $hr_trainingsessions->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_trainingsessions->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
	<div id="xsc_attendanceType" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_trainingsessions->attendanceType->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_attendanceType" id="z_attendanceType" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_attendanceType" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_attendanceType" data-value-separator="<?php echo $hr_trainingsessions->attendanceType->displayValueSeparatorAttribute() ?>" name="x_attendanceType" id="x_attendanceType" value="{value}"<?php echo $hr_trainingsessions->attendanceType->editAttributes() ?>></div>
<div id="dsl_x_attendanceType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->attendanceType->radioButtonListHtml(FALSE, "x_attendanceType") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
	<div id="xsc_requireProof" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_trainingsessions->requireProof->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_requireProof" id="z_requireProof" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_requireProof" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_trainingsessions" data-field="x_requireProof" data-value-separator="<?php echo $hr_trainingsessions->requireProof->displayValueSeparatorAttribute() ?>" name="x_requireProof" id="x_requireProof" value="{value}"<?php echo $hr_trainingsessions->requireProof->editAttributes() ?>></div>
<div id="dsl_x_requireProof" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_trainingsessions->requireProof->radioButtonListHtml(FALSE, "x_requireProof") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_trainingsessions_list->showPageHeader(); ?>
<?php
$hr_trainingsessions_list->showMessage();
?>
<?php if ($hr_trainingsessions_list->TotalRecs > 0 || $hr_trainingsessions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_trainingsessions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_trainingsessions">
<?php if (!$hr_trainingsessions->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_trainingsessions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_trainingsessions_list->Pager)) $hr_trainingsessions_list->Pager = new NumericPager($hr_trainingsessions_list->StartRec, $hr_trainingsessions_list->DisplayRecs, $hr_trainingsessions_list->TotalRecs, $hr_trainingsessions_list->RecRange, $hr_trainingsessions_list->AutoHidePager) ?>
<?php if ($hr_trainingsessions_list->Pager->RecordCount > 0 && $hr_trainingsessions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_trainingsessions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_trainingsessions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_trainingsessions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_trainingsessions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_trainingsessions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_trainingsessions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_trainingsessions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_trainingsessions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_trainingsessions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_trainingsessions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_trainingsessions_list->TotalRecs > 0 && (!$hr_trainingsessions_list->AutoHidePageSizeSelector || $hr_trainingsessions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_trainingsessions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_trainingsessions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_trainingsessions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_trainingsessions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_trainingsessions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_trainingsessions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_trainingsessions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_trainingsessions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_trainingsessions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_trainingsessionslist" id="fhr_trainingsessionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_trainingsessions_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_trainingsessions_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<div id="gmp_hr_trainingsessions" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_trainingsessions_list->TotalRecs > 0 || $hr_trainingsessions->isGridEdit()) { ?>
<table id="tbl_hr_trainingsessionslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_trainingsessions_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_trainingsessions_list->renderListOptions();

// Render list options (header, left)
$hr_trainingsessions_list->ListOptions->render("header", "left");
?>
<?php if ($hr_trainingsessions->id->Visible) { // id ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_trainingsessions->id->headerCellClass() ?>"><div id="elh_hr_trainingsessions_id" class="hr_trainingsessions_id"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_trainingsessions->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->id) ?>',1);"><div id="elh_hr_trainingsessions_id" class="hr_trainingsessions_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->course->Visible) { // course ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->course) == "") { ?>
		<th data-name="course" class="<?php echo $hr_trainingsessions->course->headerCellClass() ?>"><div id="elh_hr_trainingsessions_course" class="hr_trainingsessions_course"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->course->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="course" class="<?php echo $hr_trainingsessions->course->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->course) ?>',1);"><div id="elh_hr_trainingsessions_course" class="hr_trainingsessions_course">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->course->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->course->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->course->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->scheduled->Visible) { // scheduled ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->scheduled) == "") { ?>
		<th data-name="scheduled" class="<?php echo $hr_trainingsessions->scheduled->headerCellClass() ?>"><div id="elh_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->scheduled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduled" class="<?php echo $hr_trainingsessions->scheduled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->scheduled) ?>',1);"><div id="elh_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->scheduled->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->scheduled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->scheduled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->dueDate->Visible) { // dueDate ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->dueDate) == "") { ?>
		<th data-name="dueDate" class="<?php echo $hr_trainingsessions->dueDate->headerCellClass() ?>"><div id="elh_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->dueDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dueDate" class="<?php echo $hr_trainingsessions->dueDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->dueDate) ?>',1);"><div id="elh_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->dueDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->dueDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->dueDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->deliveryMethod) == "") { ?>
		<th data-name="deliveryMethod" class="<?php echo $hr_trainingsessions->deliveryMethod->headerCellClass() ?>"><div id="elh_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->deliveryMethod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deliveryMethod" class="<?php echo $hr_trainingsessions->deliveryMethod->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->deliveryMethod) ?>',1);"><div id="elh_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->deliveryMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->deliveryMethod->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->deliveryMethod->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->status->Visible) { // status ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->status) == "") { ?>
		<th data-name="status" class="<?php echo $hr_trainingsessions->status->headerCellClass() ?>"><div id="elh_hr_trainingsessions_status" class="hr_trainingsessions_status"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hr_trainingsessions->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->status) ?>',1);"><div id="elh_hr_trainingsessions_status" class="hr_trainingsessions_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->attendanceType) == "") { ?>
		<th data-name="attendanceType" class="<?php echo $hr_trainingsessions->attendanceType->headerCellClass() ?>"><div id="elh_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->attendanceType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attendanceType" class="<?php echo $hr_trainingsessions->attendanceType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->attendanceType) ?>',1);"><div id="elh_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->attendanceType->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->attendanceType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->attendanceType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->created->Visible) { // created ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->created) == "") { ?>
		<th data-name="created" class="<?php echo $hr_trainingsessions->created->headerCellClass() ?>"><div id="elh_hr_trainingsessions_created" class="hr_trainingsessions_created"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $hr_trainingsessions->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->created) ?>',1);"><div id="elh_hr_trainingsessions_created" class="hr_trainingsessions_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->updated->Visible) { // updated ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $hr_trainingsessions->updated->headerCellClass() ?>"><div id="elh_hr_trainingsessions_updated" class="hr_trainingsessions_updated"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $hr_trainingsessions->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->updated) ?>',1);"><div id="elh_hr_trainingsessions_updated" class="hr_trainingsessions_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
	<?php if ($hr_trainingsessions->sortUrl($hr_trainingsessions->requireProof) == "") { ?>
		<th data-name="requireProof" class="<?php echo $hr_trainingsessions->requireProof->headerCellClass() ?>"><div id="elh_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof"><div class="ew-table-header-caption"><?php echo $hr_trainingsessions->requireProof->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="requireProof" class="<?php echo $hr_trainingsessions->requireProof->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_trainingsessions->SortUrl($hr_trainingsessions->requireProof) ?>',1);"><div id="elh_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_trainingsessions->requireProof->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_trainingsessions->requireProof->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_trainingsessions->requireProof->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_trainingsessions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_trainingsessions->ExportAll && $hr_trainingsessions->isExport()) {
	$hr_trainingsessions_list->StopRec = $hr_trainingsessions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_trainingsessions_list->TotalRecs > $hr_trainingsessions_list->StartRec + $hr_trainingsessions_list->DisplayRecs - 1)
		$hr_trainingsessions_list->StopRec = $hr_trainingsessions_list->StartRec + $hr_trainingsessions_list->DisplayRecs - 1;
	else
		$hr_trainingsessions_list->StopRec = $hr_trainingsessions_list->TotalRecs;
}
$hr_trainingsessions_list->RecCnt = $hr_trainingsessions_list->StartRec - 1;
if ($hr_trainingsessions_list->Recordset && !$hr_trainingsessions_list->Recordset->EOF) {
	$hr_trainingsessions_list->Recordset->moveFirst();
	$selectLimit = $hr_trainingsessions_list->UseSelectLimit;
	if (!$selectLimit && $hr_trainingsessions_list->StartRec > 1)
		$hr_trainingsessions_list->Recordset->move($hr_trainingsessions_list->StartRec - 1);
} elseif (!$hr_trainingsessions->AllowAddDeleteRow && $hr_trainingsessions_list->StopRec == 0) {
	$hr_trainingsessions_list->StopRec = $hr_trainingsessions->GridAddRowCount;
}

// Initialize aggregate
$hr_trainingsessions->RowType = ROWTYPE_AGGREGATEINIT;
$hr_trainingsessions->resetAttributes();
$hr_trainingsessions_list->renderRow();
while ($hr_trainingsessions_list->RecCnt < $hr_trainingsessions_list->StopRec) {
	$hr_trainingsessions_list->RecCnt++;
	if ($hr_trainingsessions_list->RecCnt >= $hr_trainingsessions_list->StartRec) {
		$hr_trainingsessions_list->RowCnt++;

		// Set up key count
		$hr_trainingsessions_list->KeyCount = $hr_trainingsessions_list->RowIndex;

		// Init row class and style
		$hr_trainingsessions->resetAttributes();
		$hr_trainingsessions->CssClass = "";
		if ($hr_trainingsessions->isGridAdd()) {
		} else {
			$hr_trainingsessions_list->loadRowValues($hr_trainingsessions_list->Recordset); // Load row values
		}
		$hr_trainingsessions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_trainingsessions->RowAttrs = array_merge($hr_trainingsessions->RowAttrs, array('data-rowindex'=>$hr_trainingsessions_list->RowCnt, 'id'=>'r' . $hr_trainingsessions_list->RowCnt . '_hr_trainingsessions', 'data-rowtype'=>$hr_trainingsessions->RowType));

		// Render row
		$hr_trainingsessions_list->renderRow();

		// Render list options
		$hr_trainingsessions_list->renderListOptions();
?>
	<tr<?php echo $hr_trainingsessions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_trainingsessions_list->ListOptions->render("body", "left", $hr_trainingsessions_list->RowCnt);
?>
	<?php if ($hr_trainingsessions->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_trainingsessions->id->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_id" class="hr_trainingsessions_id">
<span<?php echo $hr_trainingsessions->id->viewAttributes() ?>>
<?php echo $hr_trainingsessions->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->course->Visible) { // course ?>
		<td data-name="course"<?php echo $hr_trainingsessions->course->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_course" class="hr_trainingsessions_course">
<span<?php echo $hr_trainingsessions->course->viewAttributes() ?>>
<?php echo $hr_trainingsessions->course->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->scheduled->Visible) { // scheduled ?>
		<td data-name="scheduled"<?php echo $hr_trainingsessions->scheduled->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled">
<span<?php echo $hr_trainingsessions->scheduled->viewAttributes() ?>>
<?php echo $hr_trainingsessions->scheduled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->dueDate->Visible) { // dueDate ?>
		<td data-name="dueDate"<?php echo $hr_trainingsessions->dueDate->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate">
<span<?php echo $hr_trainingsessions->dueDate->viewAttributes() ?>>
<?php echo $hr_trainingsessions->dueDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
		<td data-name="deliveryMethod"<?php echo $hr_trainingsessions->deliveryMethod->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod">
<span<?php echo $hr_trainingsessions->deliveryMethod->viewAttributes() ?>>
<?php echo $hr_trainingsessions->deliveryMethod->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hr_trainingsessions->status->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_status" class="hr_trainingsessions_status">
<span<?php echo $hr_trainingsessions->status->viewAttributes() ?>>
<?php echo $hr_trainingsessions->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
		<td data-name="attendanceType"<?php echo $hr_trainingsessions->attendanceType->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType">
<span<?php echo $hr_trainingsessions->attendanceType->viewAttributes() ?>>
<?php echo $hr_trainingsessions->attendanceType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->created->Visible) { // created ?>
		<td data-name="created"<?php echo $hr_trainingsessions->created->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_created" class="hr_trainingsessions_created">
<span<?php echo $hr_trainingsessions->created->viewAttributes() ?>>
<?php echo $hr_trainingsessions->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $hr_trainingsessions->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_updated" class="hr_trainingsessions_updated">
<span<?php echo $hr_trainingsessions->updated->viewAttributes() ?>>
<?php echo $hr_trainingsessions->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
		<td data-name="requireProof"<?php echo $hr_trainingsessions->requireProof->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_list->RowCnt ?>_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof">
<span<?php echo $hr_trainingsessions->requireProof->viewAttributes() ?>>
<?php echo $hr_trainingsessions->requireProof->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_trainingsessions_list->ListOptions->render("body", "right", $hr_trainingsessions_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_trainingsessions->isGridAdd())
		$hr_trainingsessions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_trainingsessions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_trainingsessions_list->Recordset)
	$hr_trainingsessions_list->Recordset->Close();
?>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_trainingsessions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_trainingsessions_list->Pager)) $hr_trainingsessions_list->Pager = new NumericPager($hr_trainingsessions_list->StartRec, $hr_trainingsessions_list->DisplayRecs, $hr_trainingsessions_list->TotalRecs, $hr_trainingsessions_list->RecRange, $hr_trainingsessions_list->AutoHidePager) ?>
<?php if ($hr_trainingsessions_list->Pager->RecordCount > 0 && $hr_trainingsessions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_trainingsessions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_trainingsessions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_trainingsessions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_trainingsessions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_trainingsessions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_trainingsessions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_trainingsessions_list->pageUrl() ?>start=<?php echo $hr_trainingsessions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_trainingsessions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_trainingsessions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_trainingsessions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_trainingsessions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_trainingsessions_list->TotalRecs > 0 && (!$hr_trainingsessions_list->AutoHidePageSizeSelector || $hr_trainingsessions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_trainingsessions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_trainingsessions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_trainingsessions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_trainingsessions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_trainingsessions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_trainingsessions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_trainingsessions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_trainingsessions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_trainingsessions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_trainingsessions_list->TotalRecs == 0 && !$hr_trainingsessions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_trainingsessions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_trainingsessions_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_trainingsessions->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_trainingsessions", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_trainingsessions_list->terminate();
?>