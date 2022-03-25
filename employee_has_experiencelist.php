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
$employee_has_experience_list = new employee_has_experience_list();

// Run the page
$employee_has_experience_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_has_experiencelist = currentForm = new ew.Form("femployee_has_experiencelist", "list");
femployee_has_experiencelist.formKeyCountName = '<?php echo $employee_has_experience_list->FormKeyCountName ?>';

// Validate form
femployee_has_experiencelist.validate = function() {
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
		<?php if ($employee_has_experience_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->id->caption(), $employee_has_experience->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->employee_id->caption(), $employee_has_experience->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->employee_id->errorMessage()) ?>");
		<?php if ($employee_has_experience_list->working_at->Required) { ?>
			elm = this.getElements("x" + infix + "_working_at");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->working_at->caption(), $employee_has_experience->working_at->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->job_description->Required) { ?>
			elm = this.getElements("x" + infix + "_job_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->job_description->caption(), $employee_has_experience->job_description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->role->Required) { ?>
			elm = this.getElements("x" + infix + "_role");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->role->caption(), $employee_has_experience->role->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->start_date->caption(), $employee_has_experience->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->start_date->errorMessage()) ?>");
		<?php if ($employee_has_experience_list->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->end_date->caption(), $employee_has_experience->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->end_date->errorMessage()) ?>");
		<?php if ($employee_has_experience_list->total_experience->Required) { ?>
			elm = this.getElements("x" + infix + "_total_experience");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->total_experience->caption(), $employee_has_experience->total_experience->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->certificates->Required) { ?>
			felm = this.getElements("x" + infix + "_certificates");
			elm = this.getElements("fn_x" + infix + "_certificates");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->certificates->caption(), $employee_has_experience->certificates->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->others->Required) { ?>
			felm = this.getElements("x" + infix + "_others");
			elm = this.getElements("fn_x" + infix + "_others");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->others->caption(), $employee_has_experience->others->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->status->caption(), $employee_has_experience->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->HospID->caption(), $employee_has_experience->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->HospID->errorMessage()) ?>");

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
femployee_has_experiencelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "working_at", false)) return false;
	if (ew.valueChanged(fobj, infix, "job_description", false)) return false;
	if (ew.valueChanged(fobj, infix, "role", false)) return false;
	if (ew.valueChanged(fobj, infix, "start_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "end_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "total_experience", false)) return false;
	if (ew.valueChanged(fobj, infix, "certificates", false)) return false;
	if (ew.valueChanged(fobj, infix, "others", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_has_experiencelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_experiencelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_experiencelist.lists["x_status"] = <?php echo $employee_has_experience_list->status->Lookup->toClientList() ?>;
femployee_has_experiencelist.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_list->status->lookupOptions()) ?>;

// Form object for search
var femployee_has_experiencelistsrch = currentSearchForm = new ew.Form("femployee_has_experiencelistsrch");

// Filters
femployee_has_experiencelistsrch.filterList = <?php echo $employee_has_experience_list->getFilterList() ?>;
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
<?php if (!$employee_has_experience->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_has_experience_list->TotalRecs > 0 && $employee_has_experience_list->ExportOptions->visible()) { ?>
<?php $employee_has_experience_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_experience_list->ImportOptions->visible()) { ?>
<?php $employee_has_experience_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_experience_list->SearchOptions->visible()) { ?>
<?php $employee_has_experience_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_experience_list->FilterOptions->visible()) { ?>
<?php $employee_has_experience_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_has_experience->isExport() || EXPORT_MASTER_RECORD && $employee_has_experience->isExport("print")) { ?>
<?php
if ($employee_has_experience_list->DbMasterFilter <> "" && $employee_has_experience->getCurrentMasterTable() == "employee") {
	if ($employee_has_experience_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_has_experience_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_has_experience->isExport() && !$employee_has_experience->CurrentAction) { ?>
<form name="femployee_has_experiencelistsrch" id="femployee_has_experiencelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_has_experience_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_has_experiencelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_experience">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_has_experience_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_has_experience_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_has_experience_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_has_experience_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_has_experience_list->showPageHeader(); ?>
<?php
$employee_has_experience_list->showMessage();
?>
<?php if ($employee_has_experience_list->TotalRecs > 0 || $employee_has_experience->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_has_experience_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_experience">
<?php if (!$employee_has_experience->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_has_experience->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_has_experience_list->Pager)) $employee_has_experience_list->Pager = new NumericPager($employee_has_experience_list->StartRec, $employee_has_experience_list->DisplayRecs, $employee_has_experience_list->TotalRecs, $employee_has_experience_list->RecRange, $employee_has_experience_list->AutoHidePager) ?>
<?php if ($employee_has_experience_list->Pager->RecordCount > 0 && $employee_has_experience_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_has_experience_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_experience_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_has_experience_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_has_experience_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_has_experience_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_experience_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_has_experience_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_has_experience_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_has_experience_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_has_experience_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_has_experience_list->TotalRecs > 0 && (!$employee_has_experience_list->AutoHidePageSizeSelector || $employee_has_experience_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_has_experience">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_has_experience_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_has_experience_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_has_experience_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_has_experience_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_has_experience_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_has_experience_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_has_experience->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_has_experiencelist" id="femployee_has_experiencelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_experience_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_experience_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<?php if ($employee_has_experience->getCurrentMasterTable() == "employee" && $employee_has_experience->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_has_experience->employee_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_employee_has_experience" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_has_experience_list->TotalRecs > 0 || $employee_has_experience->isGridEdit()) { ?>
<table id="tbl_employee_has_experiencelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_has_experience_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_has_experience_list->renderListOptions();

// Render list options (header, left)
$employee_has_experience_list->ListOptions->render("header", "left");
?>
<?php if ($employee_has_experience->id->Visible) { // id ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><div id="elh_employee_has_experience_id" class="employee_has_experience_id"><div class="ew-table-header-caption"><?php echo $employee_has_experience->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->id) ?>',1);"><div id="elh_employee_has_experience_id" class="employee_has_experience_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><div class="ew-table-header-caption"><?php echo $employee_has_experience->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->employee_id) ?>',1);"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->working_at) == "") { ?>
		<th data-name="working_at" class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><div class="ew-table-header-caption"><?php echo $employee_has_experience->working_at->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="working_at" class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->working_at) ?>',1);"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->working_at->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->working_at->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->working_at->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->job_description) == "") { ?>
		<th data-name="job_description" class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><div id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description"><div class="ew-table-header-caption"><?php echo $employee_has_experience->job_description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_description" class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->job_description) ?>',1);"><div id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->job_description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->job_description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->job_description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->role) == "") { ?>
		<th data-name="role" class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><div id="elh_employee_has_experience_role" class="employee_has_experience_role"><div class="ew-table-header-caption"><?php echo $employee_has_experience->role->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="role" class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->role) ?>',1);"><div id="elh_employee_has_experience_role" class="employee_has_experience_role">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->role->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->role->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->role->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><div class="ew-table-header-caption"><?php echo $employee_has_experience->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->start_date) ?>',1);"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><div class="ew-table-header-caption"><?php echo $employee_has_experience->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->end_date) ?>',1);"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->total_experience) == "") { ?>
		<th data-name="total_experience" class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><div class="ew-table-header-caption"><?php echo $employee_has_experience->total_experience->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_experience" class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->total_experience) ?>',1);"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->total_experience->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->total_experience->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->total_experience->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->certificates) == "") { ?>
		<th data-name="certificates" class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><div class="ew-table-header-caption"><?php echo $employee_has_experience->certificates->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certificates" class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->certificates) ?>',1);"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->certificates->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->certificates->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->certificates->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->others) == "") { ?>
		<th data-name="others" class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><div id="elh_employee_has_experience_others" class="employee_has_experience_others"><div class="ew-table-header-caption"><?php echo $employee_has_experience->others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="others" class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->others) ?>',1);"><div id="elh_employee_has_experience_others" class="employee_has_experience_others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->others->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><div id="elh_employee_has_experience_status" class="employee_has_experience_status"><div class="ew-table-header-caption"><?php echo $employee_has_experience->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->status) ?>',1);"><div id="elh_employee_has_experience_status" class="employee_has_experience_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><div id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID"><div class="ew-table-header-caption"><?php echo $employee_has_experience->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_experience->SortUrl($employee_has_experience->HospID) ?>',1);"><div id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_experience_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_has_experience->ExportAll && $employee_has_experience->isExport()) {
	$employee_has_experience_list->StopRec = $employee_has_experience_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_has_experience_list->TotalRecs > $employee_has_experience_list->StartRec + $employee_has_experience_list->DisplayRecs - 1)
		$employee_has_experience_list->StopRec = $employee_has_experience_list->StartRec + $employee_has_experience_list->DisplayRecs - 1;
	else
		$employee_has_experience_list->StopRec = $employee_has_experience_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $employee_has_experience_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_has_experience_list->FormKeyCountName) && ($employee_has_experience->isGridAdd() || $employee_has_experience->isGridEdit() || $employee_has_experience->isConfirm())) {
		$employee_has_experience_list->KeyCount = $CurrentForm->getValue($employee_has_experience_list->FormKeyCountName);
		$employee_has_experience_list->StopRec = $employee_has_experience_list->StartRec + $employee_has_experience_list->KeyCount - 1;
	}
}
$employee_has_experience_list->RecCnt = $employee_has_experience_list->StartRec - 1;
if ($employee_has_experience_list->Recordset && !$employee_has_experience_list->Recordset->EOF) {
	$employee_has_experience_list->Recordset->moveFirst();
	$selectLimit = $employee_has_experience_list->UseSelectLimit;
	if (!$selectLimit && $employee_has_experience_list->StartRec > 1)
		$employee_has_experience_list->Recordset->move($employee_has_experience_list->StartRec - 1);
} elseif (!$employee_has_experience->AllowAddDeleteRow && $employee_has_experience_list->StopRec == 0) {
	$employee_has_experience_list->StopRec = $employee_has_experience->GridAddRowCount;
}

// Initialize aggregate
$employee_has_experience->RowType = ROWTYPE_AGGREGATEINIT;
$employee_has_experience->resetAttributes();
$employee_has_experience_list->renderRow();
if ($employee_has_experience->isGridAdd())
	$employee_has_experience_list->RowIndex = 0;
if ($employee_has_experience->isGridEdit())
	$employee_has_experience_list->RowIndex = 0;
while ($employee_has_experience_list->RecCnt < $employee_has_experience_list->StopRec) {
	$employee_has_experience_list->RecCnt++;
	if ($employee_has_experience_list->RecCnt >= $employee_has_experience_list->StartRec) {
		$employee_has_experience_list->RowCnt++;
		if ($employee_has_experience->isGridAdd() || $employee_has_experience->isGridEdit() || $employee_has_experience->isConfirm()) {
			$employee_has_experience_list->RowIndex++;
			$CurrentForm->Index = $employee_has_experience_list->RowIndex;
			if ($CurrentForm->hasValue($employee_has_experience_list->FormActionName) && $employee_has_experience_list->EventCancelled)
				$employee_has_experience_list->RowAction = strval($CurrentForm->getValue($employee_has_experience_list->FormActionName));
			elseif ($employee_has_experience->isGridAdd())
				$employee_has_experience_list->RowAction = "insert";
			else
				$employee_has_experience_list->RowAction = "";
		}

		// Set up key count
		$employee_has_experience_list->KeyCount = $employee_has_experience_list->RowIndex;

		// Init row class and style
		$employee_has_experience->resetAttributes();
		$employee_has_experience->CssClass = "";
		if ($employee_has_experience->isGridAdd()) {
			$employee_has_experience_list->loadRowValues(); // Load default values
		} else {
			$employee_has_experience_list->loadRowValues($employee_has_experience_list->Recordset); // Load row values
		}
		$employee_has_experience->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_has_experience->isGridAdd()) // Grid add
			$employee_has_experience->RowType = ROWTYPE_ADD; // Render add
		if ($employee_has_experience->isGridAdd() && $employee_has_experience->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_has_experience_list->restoreCurrentRowFormValues($employee_has_experience_list->RowIndex); // Restore form values
		if ($employee_has_experience->isGridEdit()) { // Grid edit
			if ($employee_has_experience->EventCancelled)
				$employee_has_experience_list->restoreCurrentRowFormValues($employee_has_experience_list->RowIndex); // Restore form values
			if ($employee_has_experience_list->RowAction == "insert")
				$employee_has_experience->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_has_experience->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_has_experience->isGridEdit() && ($employee_has_experience->RowType == ROWTYPE_EDIT || $employee_has_experience->RowType == ROWTYPE_ADD) && $employee_has_experience->EventCancelled) // Update failed
			$employee_has_experience_list->restoreCurrentRowFormValues($employee_has_experience_list->RowIndex); // Restore form values
		if ($employee_has_experience->RowType == ROWTYPE_EDIT) // Edit row
			$employee_has_experience_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$employee_has_experience->RowAttrs = array_merge($employee_has_experience->RowAttrs, array('data-rowindex'=>$employee_has_experience_list->RowCnt, 'id'=>'r' . $employee_has_experience_list->RowCnt . '_employee_has_experience', 'data-rowtype'=>$employee_has_experience->RowType));

		// Render row
		$employee_has_experience_list->renderRow();

		// Render list options
		$employee_has_experience_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_has_experience_list->RowAction <> "delete" && $employee_has_experience_list->RowAction <> "insertdelete" && !($employee_has_experience_list->RowAction == "insert" && $employee_has_experience->isConfirm() && $employee_has_experience_list->emptyRow())) {
?>
	<tr<?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_list->ListOptions->render("body", "left", $employee_has_experience_list->RowCnt);
?>
	<?php if ($employee_has_experience->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_has_experience->id->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_id" class="form-group employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_id" class="employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<?php echo $employee_has_experience->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_has_experience->employee_id->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<?php echo $employee_has_experience->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<td data-name="working_at"<?php echo $employee_has_experience->working_at->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_working_at" class="employee_has_experience_working_at">
<span<?php echo $employee_has_experience->working_at->viewAttributes() ?>>
<?php echo $employee_has_experience->working_at->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<td data-name="job_description"<?php echo $employee_has_experience->job_description->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_job_description" class="employee_has_experience_job_description">
<span<?php echo $employee_has_experience->job_description->viewAttributes() ?>>
<?php echo $employee_has_experience->job_description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->role->Visible) { // role ?>
		<td data-name="role"<?php echo $employee_has_experience->role->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_list->RowIndex ?>_role" id="x<?php echo $employee_has_experience_list->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_list->RowIndex ?>_role" id="o<?php echo $employee_has_experience_list->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_list->RowIndex ?>_role" id="x<?php echo $employee_has_experience_list->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_role" class="employee_has_experience_role">
<span<?php echo $employee_has_experience->role->viewAttributes() ?>>
<?php echo $employee_has_experience->role->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $employee_has_experience->start_date->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_start_date" class="employee_has_experience_start_date">
<span<?php echo $employee_has_experience->start_date->viewAttributes() ?>>
<?php echo $employee_has_experience->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<td data-name="end_date"<?php echo $employee_has_experience->end_date->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_end_date" class="employee_has_experience_end_date">
<span<?php echo $employee_has_experience->end_date->viewAttributes() ?>>
<?php echo $employee_has_experience->end_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<td data-name="total_experience"<?php echo $employee_has_experience->total_experience->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
<span<?php echo $employee_has_experience->total_experience->viewAttributes() ?>>
<?php echo $employee_has_experience->total_experience->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<td data-name="certificates"<?php echo $employee_has_experience->certificates->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" name="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_experience->certificates->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_certificates" class="employee_has_experience_certificates">
<span>
<?php echo GetFileViewTag($employee_has_experience->certificates, $employee_has_experience->certificates->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->others->Visible) { // others ?>
		<td data-name="others"<?php echo $employee_has_experience->others->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_list->RowIndex ?>_others" id="x<?php echo $employee_has_experience_list->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_others" name="o<?php echo $employee_has_experience_list->RowIndex ?>_others" id="o<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_experience->others->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_list->RowIndex ?>_others" id="x<?php echo $employee_has_experience_list->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_others" class="employee_has_experience_others">
<span<?php echo $employee_has_experience->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_experience->others, $employee_has_experience->others->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_has_experience->status->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_list->RowIndex ?>_status" name="x<?php echo $employee_has_experience_list->RowIndex ?>_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x<?php echo $employee_has_experience_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x" . $employee_has_experience_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_list->RowIndex ?>_status" id="o<?php echo $employee_has_experience_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_list->RowIndex ?>_status" name="x<?php echo $employee_has_experience_list->RowIndex ?>_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x<?php echo $employee_has_experience_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x" . $employee_has_experience_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_status" class="employee_has_experience_status">
<span<?php echo $employee_has_experience->status->viewAttributes() ?>>
<?php echo $employee_has_experience->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_has_experience->HospID->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_list->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="o<?php echo $employee_has_experience_list->RowIndex ?>_HospID" id="o<?php echo $employee_has_experience_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_list->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_list->RowCnt ?>_employee_has_experience_HospID" class="employee_has_experience_HospID">
<span<?php echo $employee_has_experience->HospID->viewAttributes() ?>>
<?php echo $employee_has_experience->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_list->ListOptions->render("body", "right", $employee_has_experience_list->RowCnt);
?>
	</tr>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD || $employee_has_experience->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_has_experiencelist.updateLists(<?php echo $employee_has_experience_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_has_experience->isGridAdd())
		if (!$employee_has_experience_list->Recordset->EOF)
			$employee_has_experience_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_has_experience->isGridAdd() || $employee_has_experience->isGridEdit()) {
		$employee_has_experience_list->RowIndex = '$rowindex$';
		$employee_has_experience_list->loadRowValues();

		// Set row properties
		$employee_has_experience->resetAttributes();
		$employee_has_experience->RowAttrs = array_merge($employee_has_experience->RowAttrs, array('data-rowindex'=>$employee_has_experience_list->RowIndex, 'id'=>'r0_employee_has_experience', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_has_experience->RowAttrs["class"], "ew-template");
		$employee_has_experience->RowType = ROWTYPE_ADD;

		// Render row
		$employee_has_experience_list->renderRow();

		// Render list options
		$employee_has_experience_list->renderListOptions();
		$employee_has_experience_list->StartRowCnt = 0;
?>
	<tr<?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_list->ListOptions->render("body", "left", $employee_has_experience_list->RowIndex);
?>
	<?php if ($employee_has_experience->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<td data-name="working_at">
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_list->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_list->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<td data-name="job_description">
<span id="el$rowindex$_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_list->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_list->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->role->Visible) { // role ?>
		<td data-name="role">
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_list->RowIndex ?>_role" id="x<?php echo $employee_has_experience_list->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_list->RowIndex ?>_role" id="o<?php echo $employee_has_experience_list->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_list->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencelist", "x<?php echo $employee_has_experience_list->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_list->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<td data-name="total_experience">
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_list->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<td data-name="certificates">
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" name="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_experience_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_experience->certificates->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->others->Visible) { // others ?>
		<td data-name="others">
<span id="el$rowindex$_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_list->RowIndex ?>_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_list->RowIndex ?>_others" id="x<?php echo $employee_has_experience_list->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_others" name="o<?php echo $employee_has_experience_list->RowIndex ?>_others" id="o<?php echo $employee_has_experience_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_experience->others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_list->RowIndex ?>_status" name="x<?php echo $employee_has_experience_list->RowIndex ?>_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x<?php echo $employee_has_experience_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x" . $employee_has_experience_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_list->RowIndex ?>_status" id="o<?php echo $employee_has_experience_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_list->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="o<?php echo $employee_has_experience_list->RowIndex ?>_HospID" id="o<?php echo $employee_has_experience_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_list->ListOptions->render("body", "right", $employee_has_experience_list->RowIndex);
?>
<script>
femployee_has_experiencelist.updateLists(<?php echo $employee_has_experience_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($employee_has_experience->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_has_experience_list->FormKeyCountName ?>" id="<?php echo $employee_has_experience_list->FormKeyCountName ?>" value="<?php echo $employee_has_experience_list->KeyCount ?>">
<?php echo $employee_has_experience_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_experience->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_has_experience_list->FormKeyCountName ?>" id="<?php echo $employee_has_experience_list->FormKeyCountName ?>" value="<?php echo $employee_has_experience_list->KeyCount ?>">
<?php echo $employee_has_experience_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_has_experience->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_has_experience_list->Recordset)
	$employee_has_experience_list->Recordset->Close();
?>
<?php if (!$employee_has_experience->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_has_experience->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_has_experience_list->Pager)) $employee_has_experience_list->Pager = new NumericPager($employee_has_experience_list->StartRec, $employee_has_experience_list->DisplayRecs, $employee_has_experience_list->TotalRecs, $employee_has_experience_list->RecRange, $employee_has_experience_list->AutoHidePager) ?>
<?php if ($employee_has_experience_list->Pager->RecordCount > 0 && $employee_has_experience_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_has_experience_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_experience_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_has_experience_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_has_experience_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_has_experience_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_experience_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_experience_list->pageUrl() ?>start=<?php echo $employee_has_experience_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_has_experience_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_has_experience_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_has_experience_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_has_experience_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_has_experience_list->TotalRecs > 0 && (!$employee_has_experience_list->AutoHidePageSizeSelector || $employee_has_experience_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_has_experience">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_has_experience_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_has_experience_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_has_experience_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_has_experience_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_has_experience_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_has_experience_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_has_experience->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_has_experience_list->TotalRecs == 0 && !$employee_has_experience->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_has_experience_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_has_experience", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_has_experience_list->terminate();
?>