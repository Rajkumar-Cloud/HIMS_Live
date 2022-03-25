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
$employee_email_list = new employee_email_list();

// Run the page
$employee_email_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_email->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_emaillist = currentForm = new ew.Form("femployee_emaillist", "list");
femployee_emaillist.formKeyCountName = '<?php echo $employee_email_list->FormKeyCountName ?>';

// Validate form
femployee_emaillist.validate = function() {
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
		<?php if ($employee_email_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->id->caption(), $employee_email->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_list->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->employee_id->caption(), $employee_email->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->employee_id->errorMessage()) ?>");
		<?php if ($employee_email_list->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->_email->caption(), $employee_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_list->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->email_type->caption(), $employee_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->status->caption(), $employee_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->HospID->caption(), $employee_email->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->HospID->errorMessage()) ?>");

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
femployee_emaillist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "_email", false)) return false;
	if (ew.valueChanged(fobj, infix, "email_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_emaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_emaillist.lists["x_email_type"] = <?php echo $employee_email_list->email_type->Lookup->toClientList() ?>;
femployee_emaillist.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_list->email_type->lookupOptions()) ?>;
femployee_emaillist.lists["x_status"] = <?php echo $employee_email_list->status->Lookup->toClientList() ?>;
femployee_emaillist.lists["x_status"].options = <?php echo JsonEncode($employee_email_list->status->lookupOptions()) ?>;

// Form object for search
var femployee_emaillistsrch = currentSearchForm = new ew.Form("femployee_emaillistsrch");

// Filters
femployee_emaillistsrch.filterList = <?php echo $employee_email_list->getFilterList() ?>;
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
<?php if (!$employee_email->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_email_list->TotalRecs > 0 && $employee_email_list->ExportOptions->visible()) { ?>
<?php $employee_email_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_email_list->ImportOptions->visible()) { ?>
<?php $employee_email_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_email_list->SearchOptions->visible()) { ?>
<?php $employee_email_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_email_list->FilterOptions->visible()) { ?>
<?php $employee_email_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_email->isExport() || EXPORT_MASTER_RECORD && $employee_email->isExport("print")) { ?>
<?php
if ($employee_email_list->DbMasterFilter <> "" && $employee_email->getCurrentMasterTable() == "employee") {
	if ($employee_email_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_email_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_email->isExport() && !$employee_email->CurrentAction) { ?>
<form name="femployee_emaillistsrch" id="femployee_emaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_email_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_emaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_email">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_email_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_email_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_email_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_email_list->showPageHeader(); ?>
<?php
$employee_email_list->showMessage();
?>
<?php if ($employee_email_list->TotalRecs > 0 || $employee_email->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_email_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_email">
<?php if (!$employee_email->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_email->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_email_list->Pager)) $employee_email_list->Pager = new NumericPager($employee_email_list->StartRec, $employee_email_list->DisplayRecs, $employee_email_list->TotalRecs, $employee_email_list->RecRange, $employee_email_list->AutoHidePager) ?>
<?php if ($employee_email_list->Pager->RecordCount > 0 && $employee_email_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_email_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_email_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_email_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_email_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_email_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_email_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_email_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_email_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_email_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_email_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_email_list->TotalRecs > 0 && (!$employee_email_list->AutoHidePageSizeSelector || $employee_email_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_email">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_email_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_email_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_email_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_email_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_email_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_email_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_email->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_emaillist" id="femployee_emaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_email_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_email_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_email">
<?php if ($employee_email->getCurrentMasterTable() == "employee" && $employee_email->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_email->employee_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_employee_email" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_email_list->TotalRecs > 0 || $employee_email->isGridEdit()) { ?>
<table id="tbl_employee_emaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_email_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_email_list->renderListOptions();

// Render list options (header, left)
$employee_email_list->ListOptions->render("header", "left");
?>
<?php if ($employee_email->id->Visible) { // id ?>
	<?php if ($employee_email->sortUrl($employee_email->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_email->id->headerCellClass() ?>"><div id="elh_employee_email_id" class="employee_email_id"><div class="ew-table-header-caption"><?php echo $employee_email->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_email->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_email->SortUrl($employee_email->id) ?>',1);"><div id="elh_employee_email_id" class="employee_email_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_email->sortUrl($employee_email->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><div id="elh_employee_email_employee_id" class="employee_email_employee_id"><div class="ew-table-header-caption"><?php echo $employee_email->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_email->SortUrl($employee_email->employee_id) ?>',1);"><div id="elh_employee_email_employee_id" class="employee_email_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
	<?php if ($employee_email->sortUrl($employee_email->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $employee_email->_email->headerCellClass() ?>"><div id="elh_employee_email__email" class="employee_email__email"><div class="ew-table-header-caption"><?php echo $employee_email->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $employee_email->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_email->SortUrl($employee_email->_email) ?>',1);"><div id="elh_employee_email__email" class="employee_email__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_email->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
	<?php if ($employee_email->sortUrl($employee_email->email_type) == "") { ?>
		<th data-name="email_type" class="<?php echo $employee_email->email_type->headerCellClass() ?>"><div id="elh_employee_email_email_type" class="employee_email_email_type"><div class="ew-table-header-caption"><?php echo $employee_email->email_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_type" class="<?php echo $employee_email->email_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_email->SortUrl($employee_email->email_type) ?>',1);"><div id="elh_employee_email_email_type" class="employee_email_email_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->email_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->email_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
	<?php if ($employee_email->sortUrl($employee_email->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_email->status->headerCellClass() ?>"><div id="elh_employee_email_status" class="employee_email_status"><div class="ew-table-header-caption"><?php echo $employee_email->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_email->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_email->SortUrl($employee_email->status) ?>',1);"><div id="elh_employee_email_status" class="employee_email_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
	<?php if ($employee_email->sortUrl($employee_email->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_email->HospID->headerCellClass() ?>"><div id="elh_employee_email_HospID" class="employee_email_HospID"><div class="ew-table-header-caption"><?php echo $employee_email->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_email->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_email->SortUrl($employee_email->HospID) ?>',1);"><div id="elh_employee_email_HospID" class="employee_email_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_email_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_email->ExportAll && $employee_email->isExport()) {
	$employee_email_list->StopRec = $employee_email_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_email_list->TotalRecs > $employee_email_list->StartRec + $employee_email_list->DisplayRecs - 1)
		$employee_email_list->StopRec = $employee_email_list->StartRec + $employee_email_list->DisplayRecs - 1;
	else
		$employee_email_list->StopRec = $employee_email_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $employee_email_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_email_list->FormKeyCountName) && ($employee_email->isGridAdd() || $employee_email->isGridEdit() || $employee_email->isConfirm())) {
		$employee_email_list->KeyCount = $CurrentForm->getValue($employee_email_list->FormKeyCountName);
		$employee_email_list->StopRec = $employee_email_list->StartRec + $employee_email_list->KeyCount - 1;
	}
}
$employee_email_list->RecCnt = $employee_email_list->StartRec - 1;
if ($employee_email_list->Recordset && !$employee_email_list->Recordset->EOF) {
	$employee_email_list->Recordset->moveFirst();
	$selectLimit = $employee_email_list->UseSelectLimit;
	if (!$selectLimit && $employee_email_list->StartRec > 1)
		$employee_email_list->Recordset->move($employee_email_list->StartRec - 1);
} elseif (!$employee_email->AllowAddDeleteRow && $employee_email_list->StopRec == 0) {
	$employee_email_list->StopRec = $employee_email->GridAddRowCount;
}

// Initialize aggregate
$employee_email->RowType = ROWTYPE_AGGREGATEINIT;
$employee_email->resetAttributes();
$employee_email_list->renderRow();
if ($employee_email->isGridAdd())
	$employee_email_list->RowIndex = 0;
if ($employee_email->isGridEdit())
	$employee_email_list->RowIndex = 0;
while ($employee_email_list->RecCnt < $employee_email_list->StopRec) {
	$employee_email_list->RecCnt++;
	if ($employee_email_list->RecCnt >= $employee_email_list->StartRec) {
		$employee_email_list->RowCnt++;
		if ($employee_email->isGridAdd() || $employee_email->isGridEdit() || $employee_email->isConfirm()) {
			$employee_email_list->RowIndex++;
			$CurrentForm->Index = $employee_email_list->RowIndex;
			if ($CurrentForm->hasValue($employee_email_list->FormActionName) && $employee_email_list->EventCancelled)
				$employee_email_list->RowAction = strval($CurrentForm->getValue($employee_email_list->FormActionName));
			elseif ($employee_email->isGridAdd())
				$employee_email_list->RowAction = "insert";
			else
				$employee_email_list->RowAction = "";
		}

		// Set up key count
		$employee_email_list->KeyCount = $employee_email_list->RowIndex;

		// Init row class and style
		$employee_email->resetAttributes();
		$employee_email->CssClass = "";
		if ($employee_email->isGridAdd()) {
			$employee_email_list->loadRowValues(); // Load default values
		} else {
			$employee_email_list->loadRowValues($employee_email_list->Recordset); // Load row values
		}
		$employee_email->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_email->isGridAdd()) // Grid add
			$employee_email->RowType = ROWTYPE_ADD; // Render add
		if ($employee_email->isGridAdd() && $employee_email->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_email_list->restoreCurrentRowFormValues($employee_email_list->RowIndex); // Restore form values
		if ($employee_email->isGridEdit()) { // Grid edit
			if ($employee_email->EventCancelled)
				$employee_email_list->restoreCurrentRowFormValues($employee_email_list->RowIndex); // Restore form values
			if ($employee_email_list->RowAction == "insert")
				$employee_email->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_email->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_email->isGridEdit() && ($employee_email->RowType == ROWTYPE_EDIT || $employee_email->RowType == ROWTYPE_ADD) && $employee_email->EventCancelled) // Update failed
			$employee_email_list->restoreCurrentRowFormValues($employee_email_list->RowIndex); // Restore form values
		if ($employee_email->RowType == ROWTYPE_EDIT) // Edit row
			$employee_email_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$employee_email->RowAttrs = array_merge($employee_email->RowAttrs, array('data-rowindex'=>$employee_email_list->RowCnt, 'id'=>'r' . $employee_email_list->RowCnt . '_employee_email', 'data-rowtype'=>$employee_email->RowType));

		// Render row
		$employee_email_list->renderRow();

		// Render list options
		$employee_email_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_email_list->RowAction <> "delete" && $employee_email_list->RowAction <> "insertdelete" && !($employee_email_list->RowAction == "insert" && $employee_email->isConfirm() && $employee_email_list->emptyRow())) {
?>
	<tr<?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_list->ListOptions->render("body", "left", $employee_email_list->RowCnt);
?>
	<?php if ($employee_email->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_email->id->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_list->RowIndex ?>_id" id="o<?php echo $employee_email_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_id" class="form-group employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x<?php echo $employee_email_list->RowIndex ?>_id" id="x<?php echo $employee_email_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_id" class="employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<?php echo $employee_email->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_email->employee_id->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_list->RowIndex ?>_employee_id" id="o<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_employee_id" class="employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<?php echo $employee_email->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $employee_email->_email->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_list->RowIndex ?>__email" id="x<?php echo $employee_email_list->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_list->RowIndex ?>__email" id="o<?php echo $employee_email_list->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_list->RowIndex ?>__email" id="x<?php echo $employee_email_list->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email__email" class="employee_email__email">
<span<?php echo $employee_email->_email->viewAttributes() ?>>
<?php echo $employee_email->_email->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type"<?php echo $employee_email->email_type->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_email_type" name="x<?php echo $employee_email_list->RowIndex ?>_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x<?php echo $employee_email_list->RowIndex ?>_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_list->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_list->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x" . $employee_email_list->RowIndex . "_email_type") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_list->RowIndex ?>_email_type" id="o<?php echo $employee_email_list->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_email_type" name="x<?php echo $employee_email_list->RowIndex ?>_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x<?php echo $employee_email_list->RowIndex ?>_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_list->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_list->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x" . $employee_email_list->RowIndex . "_email_type") ?>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_email_type" class="employee_email_email_type">
<span<?php echo $employee_email->email_type->viewAttributes() ?>>
<?php echo $employee_email->email_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_email->status->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_status" name="x<?php echo $employee_email_list->RowIndex ?>_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x<?php echo $employee_email_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x" . $employee_email_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_list->RowIndex ?>_status" id="o<?php echo $employee_email_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_status" name="x<?php echo $employee_email_list->RowIndex ?>_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x<?php echo $employee_email_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x" . $employee_email_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_status" class="employee_email_status">
<span<?php echo $employee_email->status->viewAttributes() ?>>
<?php echo $employee_email->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_email->HospID->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_HospID" class="form-group employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_list->RowIndex ?>_HospID" id="x<?php echo $employee_email_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="o<?php echo $employee_email_list->RowIndex ?>_HospID" id="o<?php echo $employee_email_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_HospID" class="form-group employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_list->RowIndex ?>_HospID" id="x<?php echo $employee_email_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCnt ?>_employee_email_HospID" class="employee_email_HospID">
<span<?php echo $employee_email->HospID->viewAttributes() ?>>
<?php echo $employee_email->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_email_list->ListOptions->render("body", "right", $employee_email_list->RowCnt);
?>
	</tr>
<?php if ($employee_email->RowType == ROWTYPE_ADD || $employee_email->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_emaillist.updateLists(<?php echo $employee_email_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_email->isGridAdd())
		if (!$employee_email_list->Recordset->EOF)
			$employee_email_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_email->isGridAdd() || $employee_email->isGridEdit()) {
		$employee_email_list->RowIndex = '$rowindex$';
		$employee_email_list->loadRowValues();

		// Set row properties
		$employee_email->resetAttributes();
		$employee_email->RowAttrs = array_merge($employee_email->RowAttrs, array('data-rowindex'=>$employee_email_list->RowIndex, 'id'=>'r0_employee_email', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_email->RowAttrs["class"], "ew-template");
		$employee_email->RowType = ROWTYPE_ADD;

		// Render row
		$employee_email_list->renderRow();

		// Render list options
		$employee_email_list->renderListOptions();
		$employee_email_list->StartRowCnt = 0;
?>
	<tr<?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_list->ListOptions->render("body", "left", $employee_email_list->RowIndex);
?>
	<?php if ($employee_email->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_list->RowIndex ?>_id" id="o<?php echo $employee_email_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_list->RowIndex ?>_employee_id" id="o<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->_email->Visible) { // email ?>
		<td data-name="_email">
<span id="el$rowindex$_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_list->RowIndex ?>__email" id="x<?php echo $employee_email_list->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_list->RowIndex ?>__email" id="o<?php echo $employee_email_list->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type">
<span id="el$rowindex$_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_email_type" name="x<?php echo $employee_email_list->RowIndex ?>_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x<?php echo $employee_email_list->RowIndex ?>_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_list->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_list->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x" . $employee_email_list->RowIndex . "_email_type") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_list->RowIndex ?>_email_type" id="o<?php echo $employee_email_list->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_status" name="x<?php echo $employee_email_list->RowIndex ?>_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x<?php echo $employee_email_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x" . $employee_email_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_list->RowIndex ?>_status" id="o<?php echo $employee_email_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_employee_email_HospID" class="form-group employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_list->RowIndex ?>_HospID" id="x<?php echo $employee_email_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="o<?php echo $employee_email_list->RowIndex ?>_HospID" id="o<?php echo $employee_email_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_email_list->ListOptions->render("body", "right", $employee_email_list->RowIndex);
?>
<script>
femployee_emaillist.updateLists(<?php echo $employee_email_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($employee_email->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_email_list->FormKeyCountName ?>" id="<?php echo $employee_email_list->FormKeyCountName ?>" value="<?php echo $employee_email_list->KeyCount ?>">
<?php echo $employee_email_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_email->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_email_list->FormKeyCountName ?>" id="<?php echo $employee_email_list->FormKeyCountName ?>" value="<?php echo $employee_email_list->KeyCount ?>">
<?php echo $employee_email_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_email->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_email_list->Recordset)
	$employee_email_list->Recordset->Close();
?>
<?php if (!$employee_email->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_email->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_email_list->Pager)) $employee_email_list->Pager = new NumericPager($employee_email_list->StartRec, $employee_email_list->DisplayRecs, $employee_email_list->TotalRecs, $employee_email_list->RecRange, $employee_email_list->AutoHidePager) ?>
<?php if ($employee_email_list->Pager->RecordCount > 0 && $employee_email_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_email_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_email_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_email_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_email_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_email_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_email_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_email_list->pageUrl() ?>start=<?php echo $employee_email_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_email_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_email_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_email_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_email_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_email_list->TotalRecs > 0 && (!$employee_email_list->AutoHidePageSizeSelector || $employee_email_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_email">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_email_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_email_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_email_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_email_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_email_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_email_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_email->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_email_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_email_list->TotalRecs == 0 && !$employee_email->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_email_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_email->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_email->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_email", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_email_list->terminate();
?>