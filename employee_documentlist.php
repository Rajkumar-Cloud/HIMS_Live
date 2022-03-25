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
$employee_document_list = new employee_document_list();

// Run the page
$employee_document_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_document->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_documentlist = currentForm = new ew.Form("femployee_documentlist", "list");
femployee_documentlist.formKeyCountName = '<?php echo $employee_document_list->FormKeyCountName ?>';

// Validate form
femployee_documentlist.validate = function() {
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
		<?php if ($employee_document_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->id->caption(), $employee_document->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->employee_id->caption(), $employee_document->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_document->employee_id->errorMessage()) ?>");
		<?php if ($employee_document_list->DocumentName->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentName->caption(), $employee_document->DocumentName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->DocumentNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentNumber->caption(), $employee_document->DocumentNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->status->caption(), $employee_document->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->createdby->caption(), $employee_document->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->createddatetime->caption(), $employee_document->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->modifiedby->caption(), $employee_document->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->modifieddatetime->caption(), $employee_document->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->HospID->caption(), $employee_document->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_document->HospID->errorMessage()) ?>");

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
femployee_documentlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "DocumentName", false)) return false;
	if (ew.valueChanged(fobj, infix, "DocumentNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_documentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_documentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_documentlist.lists["x_DocumentName"] = <?php echo $employee_document_list->DocumentName->Lookup->toClientList() ?>;
femployee_documentlist.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_list->DocumentName->lookupOptions()) ?>;
femployee_documentlist.lists["x_status"] = <?php echo $employee_document_list->status->Lookup->toClientList() ?>;
femployee_documentlist.lists["x_status"].options = <?php echo JsonEncode($employee_document_list->status->lookupOptions()) ?>;

// Form object for search
var femployee_documentlistsrch = currentSearchForm = new ew.Form("femployee_documentlistsrch");

// Filters
femployee_documentlistsrch.filterList = <?php echo $employee_document_list->getFilterList() ?>;
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
<?php if (!$employee_document->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_document_list->TotalRecs > 0 && $employee_document_list->ExportOptions->visible()) { ?>
<?php $employee_document_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_document_list->ImportOptions->visible()) { ?>
<?php $employee_document_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_document_list->SearchOptions->visible()) { ?>
<?php $employee_document_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_document_list->FilterOptions->visible()) { ?>
<?php $employee_document_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_document->isExport() || EXPORT_MASTER_RECORD && $employee_document->isExport("print")) { ?>
<?php
if ($employee_document_list->DbMasterFilter <> "" && $employee_document->getCurrentMasterTable() == "employee") {
	if ($employee_document_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_document_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_document->isExport() && !$employee_document->CurrentAction) { ?>
<form name="femployee_documentlistsrch" id="femployee_documentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_document_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_documentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_document">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_document_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_document_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_document_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_document_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_document_list->showPageHeader(); ?>
<?php
$employee_document_list->showMessage();
?>
<?php if ($employee_document_list->TotalRecs > 0 || $employee_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_document_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_document">
<?php if (!$employee_document->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_document->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_document_list->Pager)) $employee_document_list->Pager = new NumericPager($employee_document_list->StartRec, $employee_document_list->DisplayRecs, $employee_document_list->TotalRecs, $employee_document_list->RecRange, $employee_document_list->AutoHidePager) ?>
<?php if ($employee_document_list->Pager->RecordCount > 0 && $employee_document_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_document_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_document_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_document_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_document_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_document_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_document_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_document_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_document_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_document_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_document_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_document_list->TotalRecs > 0 && (!$employee_document_list->AutoHidePageSizeSelector || $employee_document_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_document">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_document_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_document_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_document_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_document_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_document_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_document_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_document->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_documentlist" id="femployee_documentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_document_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_document_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<?php if ($employee_document->getCurrentMasterTable() == "employee" && $employee_document->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_document->employee_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_employee_document" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_document_list->TotalRecs > 0 || $employee_document->isGridEdit()) { ?>
<table id="tbl_employee_documentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_document_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_document_list->renderListOptions();

// Render list options (header, left)
$employee_document_list->ListOptions->render("header", "left");
?>
<?php if ($employee_document->id->Visible) { // id ?>
	<?php if ($employee_document->sortUrl($employee_document->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_document->id->headerCellClass() ?>"><div id="elh_employee_document_id" class="employee_document_id"><div class="ew-table-header-caption"><?php echo $employee_document->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_document->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->id) ?>',1);"><div id="elh_employee_document_id" class="employee_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_document->sortUrl($employee_document->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><div id="elh_employee_document_employee_id" class="employee_document_employee_id"><div class="ew-table-header-caption"><?php echo $employee_document->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->employee_id) ?>',1);"><div id="elh_employee_document_employee_id" class="employee_document_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
	<?php if ($employee_document->sortUrl($employee_document->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><div class="ew-table-header-caption"><?php echo $employee_document->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->DocumentName) ?>',1);"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->DocumentName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->DocumentName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($employee_document->sortUrl($employee_document->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $employee_document->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->DocumentNumber) ?>',1);"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->DocumentNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_document->DocumentNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->DocumentNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
	<?php if ($employee_document->sortUrl($employee_document->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_document->status->headerCellClass() ?>"><div id="elh_employee_document_status" class="employee_document_status"><div class="ew-table-header-caption"><?php echo $employee_document->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_document->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->status) ?>',1);"><div id="elh_employee_document_status" class="employee_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
	<?php if ($employee_document->sortUrl($employee_document->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $employee_document->createdby->headerCellClass() ?>"><div id="elh_employee_document_createdby" class="employee_document_createdby"><div class="ew-table-header-caption"><?php echo $employee_document->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $employee_document->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->createdby) ?>',1);"><div id="elh_employee_document_createdby" class="employee_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_document->sortUrl($employee_document->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><div class="ew-table-header-caption"><?php echo $employee_document->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->createddatetime) ?>',1);"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_document->sortUrl($employee_document->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><div class="ew-table-header-caption"><?php echo $employee_document->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->modifiedby) ?>',1);"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_document->sortUrl($employee_document->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $employee_document->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->modifieddatetime) ?>',1);"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
	<?php if ($employee_document->sortUrl($employee_document->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_document->HospID->headerCellClass() ?>"><div id="elh_employee_document_HospID" class="employee_document_HospID"><div class="ew-table-header-caption"><?php echo $employee_document->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_document->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_document->SortUrl($employee_document->HospID) ?>',1);"><div id="elh_employee_document_HospID" class="employee_document_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_document_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_document->ExportAll && $employee_document->isExport()) {
	$employee_document_list->StopRec = $employee_document_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_document_list->TotalRecs > $employee_document_list->StartRec + $employee_document_list->DisplayRecs - 1)
		$employee_document_list->StopRec = $employee_document_list->StartRec + $employee_document_list->DisplayRecs - 1;
	else
		$employee_document_list->StopRec = $employee_document_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $employee_document_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_document_list->FormKeyCountName) && ($employee_document->isGridAdd() || $employee_document->isGridEdit() || $employee_document->isConfirm())) {
		$employee_document_list->KeyCount = $CurrentForm->getValue($employee_document_list->FormKeyCountName);
		$employee_document_list->StopRec = $employee_document_list->StartRec + $employee_document_list->KeyCount - 1;
	}
}
$employee_document_list->RecCnt = $employee_document_list->StartRec - 1;
if ($employee_document_list->Recordset && !$employee_document_list->Recordset->EOF) {
	$employee_document_list->Recordset->moveFirst();
	$selectLimit = $employee_document_list->UseSelectLimit;
	if (!$selectLimit && $employee_document_list->StartRec > 1)
		$employee_document_list->Recordset->move($employee_document_list->StartRec - 1);
} elseif (!$employee_document->AllowAddDeleteRow && $employee_document_list->StopRec == 0) {
	$employee_document_list->StopRec = $employee_document->GridAddRowCount;
}

// Initialize aggregate
$employee_document->RowType = ROWTYPE_AGGREGATEINIT;
$employee_document->resetAttributes();
$employee_document_list->renderRow();
if ($employee_document->isGridAdd())
	$employee_document_list->RowIndex = 0;
if ($employee_document->isGridEdit())
	$employee_document_list->RowIndex = 0;
while ($employee_document_list->RecCnt < $employee_document_list->StopRec) {
	$employee_document_list->RecCnt++;
	if ($employee_document_list->RecCnt >= $employee_document_list->StartRec) {
		$employee_document_list->RowCnt++;
		if ($employee_document->isGridAdd() || $employee_document->isGridEdit() || $employee_document->isConfirm()) {
			$employee_document_list->RowIndex++;
			$CurrentForm->Index = $employee_document_list->RowIndex;
			if ($CurrentForm->hasValue($employee_document_list->FormActionName) && $employee_document_list->EventCancelled)
				$employee_document_list->RowAction = strval($CurrentForm->getValue($employee_document_list->FormActionName));
			elseif ($employee_document->isGridAdd())
				$employee_document_list->RowAction = "insert";
			else
				$employee_document_list->RowAction = "";
		}

		// Set up key count
		$employee_document_list->KeyCount = $employee_document_list->RowIndex;

		// Init row class and style
		$employee_document->resetAttributes();
		$employee_document->CssClass = "";
		if ($employee_document->isGridAdd()) {
			$employee_document_list->loadRowValues(); // Load default values
		} else {
			$employee_document_list->loadRowValues($employee_document_list->Recordset); // Load row values
		}
		$employee_document->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_document->isGridAdd()) // Grid add
			$employee_document->RowType = ROWTYPE_ADD; // Render add
		if ($employee_document->isGridAdd() && $employee_document->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_document_list->restoreCurrentRowFormValues($employee_document_list->RowIndex); // Restore form values
		if ($employee_document->isGridEdit()) { // Grid edit
			if ($employee_document->EventCancelled)
				$employee_document_list->restoreCurrentRowFormValues($employee_document_list->RowIndex); // Restore form values
			if ($employee_document_list->RowAction == "insert")
				$employee_document->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_document->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_document->isGridEdit() && ($employee_document->RowType == ROWTYPE_EDIT || $employee_document->RowType == ROWTYPE_ADD) && $employee_document->EventCancelled) // Update failed
			$employee_document_list->restoreCurrentRowFormValues($employee_document_list->RowIndex); // Restore form values
		if ($employee_document->RowType == ROWTYPE_EDIT) // Edit row
			$employee_document_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$employee_document->RowAttrs = array_merge($employee_document->RowAttrs, array('data-rowindex'=>$employee_document_list->RowCnt, 'id'=>'r' . $employee_document_list->RowCnt . '_employee_document', 'data-rowtype'=>$employee_document->RowType));

		// Render row
		$employee_document_list->renderRow();

		// Render list options
		$employee_document_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_document_list->RowAction <> "delete" && $employee_document_list->RowAction <> "insertdelete" && !($employee_document_list->RowAction == "insert" && $employee_document->isConfirm() && $employee_document_list->emptyRow())) {
?>
	<tr<?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_list->ListOptions->render("body", "left", $employee_document_list->RowCnt);
?>
	<?php if ($employee_document->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_document->id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_list->RowIndex ?>_id" id="o<?php echo $employee_document_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_id" class="form-group employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_list->RowIndex ?>_id" id="x<?php echo $employee_document_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_id" class="employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<?php echo $employee_document->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_document->employee_id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_list->RowIndex ?>_employee_id" id="o<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_employee_id" class="employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<?php echo $employee_document->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName"<?php echo $employee_document->DocumentName->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x<?php echo $employee_document_list->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_list->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_list->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x" . $employee_document_list->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x<?php echo $employee_document_list->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_list->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_list->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x" . $employee_document_list->RowIndex . "_DocumentName") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_DocumentName" class="employee_document_DocumentName">
<span<?php echo $employee_document->DocumentName->viewAttributes() ?>>
<?php echo $employee_document->DocumentName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber"<?php echo $employee_document->DocumentNumber->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
<span<?php echo $employee_document->DocumentNumber->viewAttributes() ?>>
<?php echo $employee_document->DocumentNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_document->status->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_status" name="x<?php echo $employee_document_list->RowIndex ?>_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x<?php echo $employee_document_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x" . $employee_document_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_list->RowIndex ?>_status" id="o<?php echo $employee_document_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_status" name="x<?php echo $employee_document_list->RowIndex ?>_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x<?php echo $employee_document_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x" . $employee_document_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_status" class="employee_document_status">
<span<?php echo $employee_document->status->viewAttributes() ?>>
<?php echo $employee_document->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $employee_document->createdby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_list->RowIndex ?>_createdby" id="o<?php echo $employee_document_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_createdby" class="employee_document_createdby">
<span<?php echo $employee_document->createdby->viewAttributes() ?>>
<?php echo $employee_document->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $employee_document->createddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_createddatetime" class="employee_document_createddatetime">
<span<?php echo $employee_document->createddatetime->viewAttributes() ?>>
<?php echo $employee_document->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $employee_document->modifiedby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_modifiedby" class="employee_document_modifiedby">
<span<?php echo $employee_document->modifiedby->viewAttributes() ?>>
<?php echo $employee_document->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $employee_document->modifieddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
<span<?php echo $employee_document->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_document->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_document->HospID->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_HospID" class="form-group employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_list->RowIndex ?>_HospID" id="x<?php echo $employee_document_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="o<?php echo $employee_document_list->RowIndex ?>_HospID" id="o<?php echo $employee_document_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_HospID" class="form-group employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_list->RowIndex ?>_HospID" id="x<?php echo $employee_document_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_list->RowCnt ?>_employee_document_HospID" class="employee_document_HospID">
<span<?php echo $employee_document->HospID->viewAttributes() ?>>
<?php echo $employee_document->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_list->ListOptions->render("body", "right", $employee_document_list->RowCnt);
?>
	</tr>
<?php if ($employee_document->RowType == ROWTYPE_ADD || $employee_document->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_documentlist.updateLists(<?php echo $employee_document_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_document->isGridAdd())
		if (!$employee_document_list->Recordset->EOF)
			$employee_document_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_document->isGridAdd() || $employee_document->isGridEdit()) {
		$employee_document_list->RowIndex = '$rowindex$';
		$employee_document_list->loadRowValues();

		// Set row properties
		$employee_document->resetAttributes();
		$employee_document->RowAttrs = array_merge($employee_document->RowAttrs, array('data-rowindex'=>$employee_document_list->RowIndex, 'id'=>'r0_employee_document', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_document->RowAttrs["class"], "ew-template");
		$employee_document->RowType = ROWTYPE_ADD;

		// Render row
		$employee_document_list->renderRow();

		// Render list options
		$employee_document_list->renderListOptions();
		$employee_document_list->StartRowCnt = 0;
?>
	<tr<?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_list->ListOptions->render("body", "left", $employee_document_list->RowIndex);
?>
	<?php if ($employee_document->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_list->RowIndex ?>_id" id="o<?php echo $employee_document_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_list->RowIndex ?>_employee_id" id="x<?php echo $employee_document_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_list->RowIndex ?>_employee_id" id="o<?php echo $employee_document_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName">
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x<?php echo $employee_document_list->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_list->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_list->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x" . $employee_document_list->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber">
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_list->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_list->RowIndex ?>_status" name="x<?php echo $employee_document_list->RowIndex ?>_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x<?php echo $employee_document_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x" . $employee_document_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_list->RowIndex ?>_status" id="o<?php echo $employee_document_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_list->RowIndex ?>_createdby" id="o<?php echo $employee_document_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_employee_document_HospID" class="form-group employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_list->RowIndex ?>_HospID" id="x<?php echo $employee_document_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="o<?php echo $employee_document_list->RowIndex ?>_HospID" id="o<?php echo $employee_document_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_list->ListOptions->render("body", "right", $employee_document_list->RowIndex);
?>
<script>
femployee_documentlist.updateLists(<?php echo $employee_document_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($employee_document->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_document_list->FormKeyCountName ?>" id="<?php echo $employee_document_list->FormKeyCountName ?>" value="<?php echo $employee_document_list->KeyCount ?>">
<?php echo $employee_document_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_document->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_document_list->FormKeyCountName ?>" id="<?php echo $employee_document_list->FormKeyCountName ?>" value="<?php echo $employee_document_list->KeyCount ?>">
<?php echo $employee_document_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_document->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_document_list->Recordset)
	$employee_document_list->Recordset->Close();
?>
<?php if (!$employee_document->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_document->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_document_list->Pager)) $employee_document_list->Pager = new NumericPager($employee_document_list->StartRec, $employee_document_list->DisplayRecs, $employee_document_list->TotalRecs, $employee_document_list->RecRange, $employee_document_list->AutoHidePager) ?>
<?php if ($employee_document_list->Pager->RecordCount > 0 && $employee_document_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_document_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_document_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_document_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_document_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_document_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_document_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_document_list->pageUrl() ?>start=<?php echo $employee_document_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_document_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_document_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_document_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_document_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_document_list->TotalRecs > 0 && (!$employee_document_list->AutoHidePageSizeSelector || $employee_document_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_document">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_document_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_document_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_document_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_document_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_document_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_document_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_document->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_document_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_document_list->TotalRecs == 0 && !$employee_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_document_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_document_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_document->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_document->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_document", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_document_list->terminate();
?>