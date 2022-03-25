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
$employee_has_degree_list = new employee_has_degree_list();

// Run the page
$employee_has_degree_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_has_degreelist = currentForm = new ew.Form("femployee_has_degreelist", "list");
femployee_has_degreelist.formKeyCountName = '<?php echo $employee_has_degree_list->FormKeyCountName ?>';

// Validate form
femployee_has_degreelist.validate = function() {
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
		<?php if ($employee_has_degree_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->id->caption(), $employee_has_degree->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->employee_id->caption(), $employee_has_degree->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_degree->employee_id->errorMessage()) ?>");
		<?php if ($employee_has_degree_list->degree_id->Required) { ?>
			elm = this.getElements("x" + infix + "_degree_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->degree_id->caption(), $employee_has_degree->degree_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->college_or_school->Required) { ?>
			elm = this.getElements("x" + infix + "_college_or_school");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->college_or_school->caption(), $employee_has_degree->college_or_school->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->university_or_board->Required) { ?>
			elm = this.getElements("x" + infix + "_university_or_board");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->university_or_board->caption(), $employee_has_degree->university_or_board->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->year_of_passing->Required) { ?>
			elm = this.getElements("x" + infix + "_year_of_passing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->year_of_passing->caption(), $employee_has_degree->year_of_passing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->scoring_marks->Required) { ?>
			elm = this.getElements("x" + infix + "_scoring_marks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->scoring_marks->caption(), $employee_has_degree->scoring_marks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->certificates->Required) { ?>
			felm = this.getElements("x" + infix + "_certificates");
			elm = this.getElements("fn_x" + infix + "_certificates");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->certificates->caption(), $employee_has_degree->certificates->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->others->Required) { ?>
			felm = this.getElements("x" + infix + "_others");
			elm = this.getElements("fn_x" + infix + "_others");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->others->caption(), $employee_has_degree->others->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->status->caption(), $employee_has_degree->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_degree_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree->HospID->caption(), $employee_has_degree->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_degree->HospID->errorMessage()) ?>");

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
femployee_has_degreelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "degree_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "college_or_school", false)) return false;
	if (ew.valueChanged(fobj, infix, "university_or_board", false)) return false;
	if (ew.valueChanged(fobj, infix, "year_of_passing", false)) return false;
	if (ew.valueChanged(fobj, infix, "scoring_marks", false)) return false;
	if (ew.valueChanged(fobj, infix, "certificates", false)) return false;
	if (ew.valueChanged(fobj, infix, "others", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_has_degreelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_degreelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_degreelist.lists["x_degree_id"] = <?php echo $employee_has_degree_list->degree_id->Lookup->toClientList() ?>;
femployee_has_degreelist.lists["x_degree_id"].options = <?php echo JsonEncode($employee_has_degree_list->degree_id->lookupOptions()) ?>;
femployee_has_degreelist.lists["x_status"] = <?php echo $employee_has_degree_list->status->Lookup->toClientList() ?>;
femployee_has_degreelist.lists["x_status"].options = <?php echo JsonEncode($employee_has_degree_list->status->lookupOptions()) ?>;

// Form object for search
var femployee_has_degreelistsrch = currentSearchForm = new ew.Form("femployee_has_degreelistsrch");

// Filters
femployee_has_degreelistsrch.filterList = <?php echo $employee_has_degree_list->getFilterList() ?>;
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
<?php if (!$employee_has_degree->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_has_degree_list->TotalRecs > 0 && $employee_has_degree_list->ExportOptions->visible()) { ?>
<?php $employee_has_degree_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_degree_list->ImportOptions->visible()) { ?>
<?php $employee_has_degree_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_degree_list->SearchOptions->visible()) { ?>
<?php $employee_has_degree_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_has_degree_list->FilterOptions->visible()) { ?>
<?php $employee_has_degree_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_has_degree->isExport() || EXPORT_MASTER_RECORD && $employee_has_degree->isExport("print")) { ?>
<?php
if ($employee_has_degree_list->DbMasterFilter <> "" && $employee_has_degree->getCurrentMasterTable() == "employee") {
	if ($employee_has_degree_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_has_degree_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_has_degree->isExport() && !$employee_has_degree->CurrentAction) { ?>
<form name="femployee_has_degreelistsrch" id="femployee_has_degreelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_has_degree_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_has_degreelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_degree">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_has_degree_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_has_degree_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_has_degree_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_has_degree_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_has_degree_list->showPageHeader(); ?>
<?php
$employee_has_degree_list->showMessage();
?>
<?php if ($employee_has_degree_list->TotalRecs > 0 || $employee_has_degree->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_has_degree_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_degree">
<?php if (!$employee_has_degree->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_has_degree->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_has_degree_list->Pager)) $employee_has_degree_list->Pager = new NumericPager($employee_has_degree_list->StartRec, $employee_has_degree_list->DisplayRecs, $employee_has_degree_list->TotalRecs, $employee_has_degree_list->RecRange, $employee_has_degree_list->AutoHidePager) ?>
<?php if ($employee_has_degree_list->Pager->RecordCount > 0 && $employee_has_degree_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_has_degree_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_degree_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_has_degree_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_has_degree_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_has_degree_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_degree_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_has_degree_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_has_degree_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_has_degree_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_has_degree_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_has_degree_list->TotalRecs > 0 && (!$employee_has_degree_list->AutoHidePageSizeSelector || $employee_has_degree_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_has_degree">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_has_degree_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_has_degree_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_has_degree_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_has_degree_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_has_degree_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_has_degree_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_has_degree->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_has_degreelist" id="femployee_has_degreelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_degree_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_degree_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<?php if ($employee_has_degree->getCurrentMasterTable() == "employee" && $employee_has_degree->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_has_degree->employee_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_employee_has_degree" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_has_degree_list->TotalRecs > 0 || $employee_has_degree->isGridEdit()) { ?>
<table id="tbl_employee_has_degreelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_has_degree_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_has_degree_list->renderListOptions();

// Render list options (header, left)
$employee_has_degree_list->ListOptions->render("header", "left");
?>
<?php if ($employee_has_degree->id->Visible) { // id ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_has_degree->id->headerCellClass() ?>"><div id="elh_employee_has_degree_id" class="employee_has_degree_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_has_degree->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->id) ?>',1);"><div id="elh_employee_has_degree_id" class="employee_has_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_degree->employee_id->headerCellClass() ?>"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_degree->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->employee_id) ?>',1);"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->degree_id) == "") { ?>
		<th data-name="degree_id" class="<?php echo $employee_has_degree->degree_id->headerCellClass() ?>"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree->degree_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="degree_id" class="<?php echo $employee_has_degree->degree_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->degree_id) ?>',1);"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->degree_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->degree_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->degree_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->college_or_school) == "") { ?>
		<th data-name="college_or_school" class="<?php echo $employee_has_degree->college_or_school->headerCellClass() ?>"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><div class="ew-table-header-caption"><?php echo $employee_has_degree->college_or_school->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="college_or_school" class="<?php echo $employee_has_degree->college_or_school->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->college_or_school) ?>',1);"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->college_or_school->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->college_or_school->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->college_or_school->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->university_or_board) == "") { ?>
		<th data-name="university_or_board" class="<?php echo $employee_has_degree->university_or_board->headerCellClass() ?>"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><div class="ew-table-header-caption"><?php echo $employee_has_degree->university_or_board->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="university_or_board" class="<?php echo $employee_has_degree->university_or_board->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->university_or_board) ?>',1);"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->university_or_board->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->university_or_board->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->university_or_board->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->year_of_passing) == "") { ?>
		<th data-name="year_of_passing" class="<?php echo $employee_has_degree->year_of_passing->headerCellClass() ?>"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><div class="ew-table-header-caption"><?php echo $employee_has_degree->year_of_passing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="year_of_passing" class="<?php echo $employee_has_degree->year_of_passing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->year_of_passing) ?>',1);"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->year_of_passing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->year_of_passing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->year_of_passing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->scoring_marks) == "") { ?>
		<th data-name="scoring_marks" class="<?php echo $employee_has_degree->scoring_marks->headerCellClass() ?>"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><div class="ew-table-header-caption"><?php echo $employee_has_degree->scoring_marks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scoring_marks" class="<?php echo $employee_has_degree->scoring_marks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->scoring_marks) ?>',1);"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->scoring_marks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->scoring_marks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->scoring_marks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->certificates) == "") { ?>
		<th data-name="certificates" class="<?php echo $employee_has_degree->certificates->headerCellClass() ?>"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><div class="ew-table-header-caption"><?php echo $employee_has_degree->certificates->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certificates" class="<?php echo $employee_has_degree->certificates->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->certificates) ?>',1);"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->certificates->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->certificates->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->certificates->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->others) == "") { ?>
		<th data-name="others" class="<?php echo $employee_has_degree->others->headerCellClass() ?>"><div id="elh_employee_has_degree_others" class="employee_has_degree_others"><div class="ew-table-header-caption"><?php echo $employee_has_degree->others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="others" class="<?php echo $employee_has_degree->others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->others) ?>',1);"><div id="elh_employee_has_degree_others" class="employee_has_degree_others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->others->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_has_degree->status->headerCellClass() ?>"><div id="elh_employee_has_degree_status" class="employee_has_degree_status"><div class="ew-table-header-caption"><?php echo $employee_has_degree->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_has_degree->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->status) ?>',1);"><div id="elh_employee_has_degree_status" class="employee_has_degree_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
	<?php if ($employee_has_degree->sortUrl($employee_has_degree->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_has_degree->HospID->headerCellClass() ?>"><div id="elh_employee_has_degree_HospID" class="employee_has_degree_HospID"><div class="ew-table-header-caption"><?php echo $employee_has_degree->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_has_degree->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_has_degree->SortUrl($employee_has_degree->HospID) ?>',1);"><div id="elh_employee_has_degree_HospID" class="employee_has_degree_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_degree->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_degree_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_has_degree->ExportAll && $employee_has_degree->isExport()) {
	$employee_has_degree_list->StopRec = $employee_has_degree_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_has_degree_list->TotalRecs > $employee_has_degree_list->StartRec + $employee_has_degree_list->DisplayRecs - 1)
		$employee_has_degree_list->StopRec = $employee_has_degree_list->StartRec + $employee_has_degree_list->DisplayRecs - 1;
	else
		$employee_has_degree_list->StopRec = $employee_has_degree_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $employee_has_degree_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_has_degree_list->FormKeyCountName) && ($employee_has_degree->isGridAdd() || $employee_has_degree->isGridEdit() || $employee_has_degree->isConfirm())) {
		$employee_has_degree_list->KeyCount = $CurrentForm->getValue($employee_has_degree_list->FormKeyCountName);
		$employee_has_degree_list->StopRec = $employee_has_degree_list->StartRec + $employee_has_degree_list->KeyCount - 1;
	}
}
$employee_has_degree_list->RecCnt = $employee_has_degree_list->StartRec - 1;
if ($employee_has_degree_list->Recordset && !$employee_has_degree_list->Recordset->EOF) {
	$employee_has_degree_list->Recordset->moveFirst();
	$selectLimit = $employee_has_degree_list->UseSelectLimit;
	if (!$selectLimit && $employee_has_degree_list->StartRec > 1)
		$employee_has_degree_list->Recordset->move($employee_has_degree_list->StartRec - 1);
} elseif (!$employee_has_degree->AllowAddDeleteRow && $employee_has_degree_list->StopRec == 0) {
	$employee_has_degree_list->StopRec = $employee_has_degree->GridAddRowCount;
}

// Initialize aggregate
$employee_has_degree->RowType = ROWTYPE_AGGREGATEINIT;
$employee_has_degree->resetAttributes();
$employee_has_degree_list->renderRow();
if ($employee_has_degree->isGridAdd())
	$employee_has_degree_list->RowIndex = 0;
if ($employee_has_degree->isGridEdit())
	$employee_has_degree_list->RowIndex = 0;
while ($employee_has_degree_list->RecCnt < $employee_has_degree_list->StopRec) {
	$employee_has_degree_list->RecCnt++;
	if ($employee_has_degree_list->RecCnt >= $employee_has_degree_list->StartRec) {
		$employee_has_degree_list->RowCnt++;
		if ($employee_has_degree->isGridAdd() || $employee_has_degree->isGridEdit() || $employee_has_degree->isConfirm()) {
			$employee_has_degree_list->RowIndex++;
			$CurrentForm->Index = $employee_has_degree_list->RowIndex;
			if ($CurrentForm->hasValue($employee_has_degree_list->FormActionName) && $employee_has_degree_list->EventCancelled)
				$employee_has_degree_list->RowAction = strval($CurrentForm->getValue($employee_has_degree_list->FormActionName));
			elseif ($employee_has_degree->isGridAdd())
				$employee_has_degree_list->RowAction = "insert";
			else
				$employee_has_degree_list->RowAction = "";
		}

		// Set up key count
		$employee_has_degree_list->KeyCount = $employee_has_degree_list->RowIndex;

		// Init row class and style
		$employee_has_degree->resetAttributes();
		$employee_has_degree->CssClass = "";
		if ($employee_has_degree->isGridAdd()) {
			$employee_has_degree_list->loadRowValues(); // Load default values
		} else {
			$employee_has_degree_list->loadRowValues($employee_has_degree_list->Recordset); // Load row values
		}
		$employee_has_degree->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_has_degree->isGridAdd()) // Grid add
			$employee_has_degree->RowType = ROWTYPE_ADD; // Render add
		if ($employee_has_degree->isGridAdd() && $employee_has_degree->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_has_degree_list->restoreCurrentRowFormValues($employee_has_degree_list->RowIndex); // Restore form values
		if ($employee_has_degree->isGridEdit()) { // Grid edit
			if ($employee_has_degree->EventCancelled)
				$employee_has_degree_list->restoreCurrentRowFormValues($employee_has_degree_list->RowIndex); // Restore form values
			if ($employee_has_degree_list->RowAction == "insert")
				$employee_has_degree->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_has_degree->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_has_degree->isGridEdit() && ($employee_has_degree->RowType == ROWTYPE_EDIT || $employee_has_degree->RowType == ROWTYPE_ADD) && $employee_has_degree->EventCancelled) // Update failed
			$employee_has_degree_list->restoreCurrentRowFormValues($employee_has_degree_list->RowIndex); // Restore form values
		if ($employee_has_degree->RowType == ROWTYPE_EDIT) // Edit row
			$employee_has_degree_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$employee_has_degree->RowAttrs = array_merge($employee_has_degree->RowAttrs, array('data-rowindex'=>$employee_has_degree_list->RowCnt, 'id'=>'r' . $employee_has_degree_list->RowCnt . '_employee_has_degree', 'data-rowtype'=>$employee_has_degree->RowType));

		// Render row
		$employee_has_degree_list->renderRow();

		// Render list options
		$employee_has_degree_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_has_degree_list->RowAction <> "delete" && $employee_has_degree_list->RowAction <> "insertdelete" && !($employee_has_degree_list->RowAction == "insert" && $employee_has_degree->isConfirm() && $employee_has_degree_list->emptyRow())) {
?>
	<tr<?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_list->ListOptions->render("body", "left", $employee_has_degree_list->RowCnt);
?>
	<?php if ($employee_has_degree->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_has_degree->id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_id" class="form-group employee_has_degree_id">
<span<?php echo $employee_has_degree->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_degree->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_id" class="employee_has_degree_id">
<span<?php echo $employee_has_degree->id->viewAttributes() ?>>
<?php echo $employee_has_degree->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_has_degree->employee_id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_has_degree->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_degree->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->employee_id->EditValue ?>"<?php echo $employee_has_degree->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_has_degree->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_degree->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->employee_id->EditValue ?>"<?php echo $employee_has_degree->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_employee_id" class="employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<?php echo $employee_has_degree->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
		<td data-name="degree_id"<?php echo $employee_has_degree->degree_id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id"<?php echo $employee_has_degree->degree_id->editAttributes() ?>>
		<?php echo $employee_has_degree->degree_id->selectOptionListHtml("x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree->degree_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_has_degree->degree_id->Lookup->getParamTag("p_x" . $employee_has_degree_list->RowIndex . "_degree_id") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree->degree_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id"<?php echo $employee_has_degree->degree_id->editAttributes() ?>>
		<?php echo $employee_has_degree->degree_id->selectOptionListHtml("x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree->degree_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_has_degree->degree_id->Lookup->getParamTag("p_x" . $employee_has_degree_list->RowIndex . "_degree_id") ?>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_degree_id" class="employee_has_degree_degree_id">
<span<?php echo $employee_has_degree->degree_id->viewAttributes() ?>>
<?php echo $employee_has_degree->degree_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
		<td data-name="college_or_school"<?php echo $employee_has_degree->college_or_school->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->college_or_school->EditValue ?>"<?php echo $employee_has_degree->college_or_school->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree->college_or_school->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->college_or_school->EditValue ?>"<?php echo $employee_has_degree->college_or_school->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree->college_or_school->viewAttributes() ?>>
<?php echo $employee_has_degree->college_or_school->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
		<td data-name="university_or_board"<?php echo $employee_has_degree->university_or_board->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->university_or_board->EditValue ?>"<?php echo $employee_has_degree->university_or_board->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree->university_or_board->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->university_or_board->EditValue ?>"<?php echo $employee_has_degree->university_or_board->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree->university_or_board->viewAttributes() ?>>
<?php echo $employee_has_degree->university_or_board->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
		<td data-name="year_of_passing"<?php echo $employee_has_degree->year_of_passing->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->year_of_passing->EditValue ?>"<?php echo $employee_has_degree->year_of_passing->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree->year_of_passing->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->year_of_passing->EditValue ?>"<?php echo $employee_has_degree->year_of_passing->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree->year_of_passing->viewAttributes() ?>>
<?php echo $employee_has_degree->year_of_passing->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
		<td data-name="scoring_marks"<?php echo $employee_has_degree->scoring_marks->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->scoring_marks->EditValue ?>"<?php echo $employee_has_degree->scoring_marks->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree->scoring_marks->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->scoring_marks->EditValue ?>"<?php echo $employee_has_degree->scoring_marks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree->scoring_marks->viewAttributes() ?>>
<?php echo $employee_has_degree->scoring_marks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
		<td data-name="certificates"<?php echo $employee_has_degree->certificates->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_degree->certificates->title() ? $employee_has_degree->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->certificates->ReadOnly || $employee_has_degree->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_degree->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" name="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_degree->certificates->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_degree->certificates->title() ? $employee_has_degree->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->certificates->ReadOnly || $employee_has_degree->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_degree->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_certificates" class="employee_has_degree_certificates">
<span>
<?php echo GetFileViewTag($employee_has_degree->certificates, $employee_has_degree->certificates->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->others->Visible) { // others ?>
		<td data-name="others"<?php echo $employee_has_degree->others->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_others">
<span title="<?php echo $employee_has_degree->others->title() ? $employee_has_degree->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->others->ReadOnly || $employee_has_degree->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_list->RowIndex ?>_others" id="x<?php echo $employee_has_degree_list->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_degree->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_others" name="o<?php echo $employee_has_degree_list->RowIndex ?>_others" id="o<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_degree->others->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_others">
<span title="<?php echo $employee_has_degree->others->title() ? $employee_has_degree->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->others->ReadOnly || $employee_has_degree->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_list->RowIndex ?>_others" id="x<?php echo $employee_has_degree_list->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_degree->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_others" class="employee_has_degree_others">
<span<?php echo $employee_has_degree->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_degree->others, $employee_has_degree->others->getViewValue()) ?>
</span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_has_degree->status->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_status" class="form-group employee_has_degree_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_status" name="x<?php echo $employee_has_degree_list->RowIndex ?>_status"<?php echo $employee_has_degree->status->editAttributes() ?>>
		<?php echo $employee_has_degree->status->selectOptionListHtml("x<?php echo $employee_has_degree_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_degree->status->Lookup->getParamTag("p_x" . $employee_has_degree_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_list->RowIndex ?>_status" id="o<?php echo $employee_has_degree_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_status" class="form-group employee_has_degree_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_status" name="x<?php echo $employee_has_degree_list->RowIndex ?>_status"<?php echo $employee_has_degree->status->editAttributes() ?>>
		<?php echo $employee_has_degree->status->selectOptionListHtml("x<?php echo $employee_has_degree_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_degree->status->Lookup->getParamTag("p_x" . $employee_has_degree_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_status" class="employee_has_degree_status">
<span<?php echo $employee_has_degree->status->viewAttributes() ?>>
<?php echo $employee_has_degree->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_has_degree->HospID->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_HospID" class="form-group employee_has_degree_HospID">
<input type="text" data-table="employee_has_degree" data-field="x_HospID" name="x<?php echo $employee_has_degree_list->RowIndex ?>_HospID" id="x<?php echo $employee_has_degree_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->HospID->EditValue ?>"<?php echo $employee_has_degree->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" name="o<?php echo $employee_has_degree_list->RowIndex ?>_HospID" id="o<?php echo $employee_has_degree_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_degree->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_HospID" class="form-group employee_has_degree_HospID">
<input type="text" data-table="employee_has_degree" data-field="x_HospID" name="x<?php echo $employee_has_degree_list->RowIndex ?>_HospID" id="x<?php echo $employee_has_degree_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->HospID->EditValue ?>"<?php echo $employee_has_degree->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_list->RowCnt ?>_employee_has_degree_HospID" class="employee_has_degree_HospID">
<span<?php echo $employee_has_degree->HospID->viewAttributes() ?>>
<?php echo $employee_has_degree->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_list->ListOptions->render("body", "right", $employee_has_degree_list->RowCnt);
?>
	</tr>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD || $employee_has_degree->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_has_degreelist.updateLists(<?php echo $employee_has_degree_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_has_degree->isGridAdd())
		if (!$employee_has_degree_list->Recordset->EOF)
			$employee_has_degree_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_has_degree->isGridAdd() || $employee_has_degree->isGridEdit()) {
		$employee_has_degree_list->RowIndex = '$rowindex$';
		$employee_has_degree_list->loadRowValues();

		// Set row properties
		$employee_has_degree->resetAttributes();
		$employee_has_degree->RowAttrs = array_merge($employee_has_degree->RowAttrs, array('data-rowindex'=>$employee_has_degree_list->RowIndex, 'id'=>'r0_employee_has_degree', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_has_degree->RowAttrs["class"], "ew-template");
		$employee_has_degree->RowType = ROWTYPE_ADD;

		// Render row
		$employee_has_degree_list->renderRow();

		// Render list options
		$employee_has_degree_list->renderListOptions();
		$employee_has_degree_list->StartRowCnt = 0;
?>
	<tr<?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_list->ListOptions->render("body", "left", $employee_has_degree_list->RowIndex);
?>
	<?php if ($employee_has_degree->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_has_degree->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_degree->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->employee_id->EditValue ?>"<?php echo $employee_has_degree->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
		<td data-name="degree_id">
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id"<?php echo $employee_has_degree->degree_id->editAttributes() ?>>
		<?php echo $employee_has_degree->degree_id->selectOptionListHtml("x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree->degree_id->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_list->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_has_degree->degree_id->Lookup->getParamTag("p_x" . $employee_has_degree_list->RowIndex . "_degree_id") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_list->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree->degree_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
		<td data-name="college_or_school">
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->college_or_school->EditValue ?>"<?php echo $employee_has_degree->college_or_school->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_list->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree->college_or_school->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
		<td data-name="university_or_board">
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->university_or_board->EditValue ?>"<?php echo $employee_has_degree->university_or_board->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_list->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree->university_or_board->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
		<td data-name="year_of_passing">
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->year_of_passing->EditValue ?>"<?php echo $employee_has_degree->year_of_passing->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_list->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree->year_of_passing->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
		<td data-name="scoring_marks">
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->scoring_marks->EditValue ?>"<?php echo $employee_has_degree->scoring_marks->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_list->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree->scoring_marks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
		<td data-name="certificates">
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_degree->certificates->title() ? $employee_has_degree->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->certificates->ReadOnly || $employee_has_degree->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_degree->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo $employee_has_degree->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" name="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" id="o<?php echo $employee_has_degree_list->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_degree->certificates->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->others->Visible) { // others ?>
		<td data-name="others">
<span id="el$rowindex$_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_list->RowIndex ?>_others">
<span title="<?php echo $employee_has_degree->others->title() ? $employee_has_degree->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_degree->others->ReadOnly || $employee_has_degree->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_list->RowIndex ?>_others" id="x<?php echo $employee_has_degree_list->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_degree->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo $employee_has_degree->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_list->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_others" name="o<?php echo $employee_has_degree_list->RowIndex ?>_others" id="o<?php echo $employee_has_degree_list->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_degree->others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_list->RowIndex ?>_status" name="x<?php echo $employee_has_degree_list->RowIndex ?>_status"<?php echo $employee_has_degree->status->editAttributes() ?>>
		<?php echo $employee_has_degree->status->selectOptionListHtml("x<?php echo $employee_has_degree_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_degree->status->Lookup->getParamTag("p_x" . $employee_has_degree_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_list->RowIndex ?>_status" id="o<?php echo $employee_has_degree_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_employee_has_degree_HospID" class="form-group employee_has_degree_HospID">
<input type="text" data-table="employee_has_degree" data-field="x_HospID" name="x<?php echo $employee_has_degree_list->RowIndex ?>_HospID" id="x<?php echo $employee_has_degree_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree->HospID->EditValue ?>"<?php echo $employee_has_degree->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" name="o<?php echo $employee_has_degree_list->RowIndex ?>_HospID" id="o<?php echo $employee_has_degree_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_degree->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_list->ListOptions->render("body", "right", $employee_has_degree_list->RowIndex);
?>
<script>
femployee_has_degreelist.updateLists(<?php echo $employee_has_degree_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($employee_has_degree->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_has_degree_list->FormKeyCountName ?>" id="<?php echo $employee_has_degree_list->FormKeyCountName ?>" value="<?php echo $employee_has_degree_list->KeyCount ?>">
<?php echo $employee_has_degree_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_degree->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_has_degree_list->FormKeyCountName ?>" id="<?php echo $employee_has_degree_list->FormKeyCountName ?>" value="<?php echo $employee_has_degree_list->KeyCount ?>">
<?php echo $employee_has_degree_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_has_degree->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_has_degree_list->Recordset)
	$employee_has_degree_list->Recordset->Close();
?>
<?php if (!$employee_has_degree->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_has_degree->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_has_degree_list->Pager)) $employee_has_degree_list->Pager = new NumericPager($employee_has_degree_list->StartRec, $employee_has_degree_list->DisplayRecs, $employee_has_degree_list->TotalRecs, $employee_has_degree_list->RecRange, $employee_has_degree_list->AutoHidePager) ?>
<?php if ($employee_has_degree_list->Pager->RecordCount > 0 && $employee_has_degree_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_has_degree_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_degree_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_has_degree_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_has_degree_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_has_degree_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_has_degree_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_has_degree_list->pageUrl() ?>start=<?php echo $employee_has_degree_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_has_degree_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_has_degree_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_has_degree_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_has_degree_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_has_degree_list->TotalRecs > 0 && (!$employee_has_degree_list->AutoHidePageSizeSelector || $employee_has_degree_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_has_degree">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_has_degree_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_has_degree_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_has_degree_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_has_degree_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_has_degree_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_has_degree_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_has_degree->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_has_degree_list->TotalRecs == 0 && !$employee_has_degree->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_has_degree_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_has_degree", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_has_degree_list->terminate();
?>