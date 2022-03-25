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
$employee_telephone_list = new employee_telephone_list();

// Run the page
$employee_telephone_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_telephone_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_telephone->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_telephonelist = currentForm = new ew.Form("femployee_telephonelist", "list");
femployee_telephonelist.formKeyCountName = '<?php echo $employee_telephone_list->FormKeyCountName ?>';

// Validate form
femployee_telephonelist.validate = function() {
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
		<?php if ($employee_telephone_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->id->caption(), $employee_telephone->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_list->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->employee_id->caption(), $employee_telephone->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_telephone->employee_id->errorMessage()) ?>");
		<?php if ($employee_telephone_list->tele_type->Required) { ?>
			elm = this.getElements("x" + infix + "_tele_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->tele_type->caption(), $employee_telephone->tele_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_list->telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->telephone->caption(), $employee_telephone->telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_list->telephone_type->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->telephone_type->caption(), $employee_telephone->telephone_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->status->caption(), $employee_telephone->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->HospID->caption(), $employee_telephone->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_telephone->HospID->errorMessage()) ?>");

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
femployee_telephonelist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "tele_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "telephone", false)) return false;
	if (ew.valueChanged(fobj, infix, "telephone_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_telephonelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_telephonelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_telephonelist.lists["x_tele_type"] = <?php echo $employee_telephone_list->tele_type->Lookup->toClientList() ?>;
femployee_telephonelist.lists["x_tele_type"].options = <?php echo JsonEncode($employee_telephone_list->tele_type->lookupOptions()) ?>;
femployee_telephonelist.lists["x_telephone_type"] = <?php echo $employee_telephone_list->telephone_type->Lookup->toClientList() ?>;
femployee_telephonelist.lists["x_telephone_type"].options = <?php echo JsonEncode($employee_telephone_list->telephone_type->lookupOptions()) ?>;
femployee_telephonelist.lists["x_status"] = <?php echo $employee_telephone_list->status->Lookup->toClientList() ?>;
femployee_telephonelist.lists["x_status"].options = <?php echo JsonEncode($employee_telephone_list->status->lookupOptions()) ?>;

// Form object for search
var femployee_telephonelistsrch = currentSearchForm = new ew.Form("femployee_telephonelistsrch");

// Filters
femployee_telephonelistsrch.filterList = <?php echo $employee_telephone_list->getFilterList() ?>;
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
<?php if (!$employee_telephone->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_telephone_list->TotalRecs > 0 && $employee_telephone_list->ExportOptions->visible()) { ?>
<?php $employee_telephone_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_telephone_list->ImportOptions->visible()) { ?>
<?php $employee_telephone_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_telephone_list->SearchOptions->visible()) { ?>
<?php $employee_telephone_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_telephone_list->FilterOptions->visible()) { ?>
<?php $employee_telephone_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_telephone->isExport() || EXPORT_MASTER_RECORD && $employee_telephone->isExport("print")) { ?>
<?php
if ($employee_telephone_list->DbMasterFilter <> "" && $employee_telephone->getCurrentMasterTable() == "employee") {
	if ($employee_telephone_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_telephone_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_telephone->isExport() && !$employee_telephone->CurrentAction) { ?>
<form name="femployee_telephonelistsrch" id="femployee_telephonelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_telephone_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_telephonelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_telephone">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_telephone_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_telephone_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_telephone_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_telephone_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_telephone_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_telephone_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_telephone_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_telephone_list->showPageHeader(); ?>
<?php
$employee_telephone_list->showMessage();
?>
<?php if ($employee_telephone_list->TotalRecs > 0 || $employee_telephone->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_telephone_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_telephone">
<?php if (!$employee_telephone->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_telephone->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_telephone_list->Pager)) $employee_telephone_list->Pager = new NumericPager($employee_telephone_list->StartRec, $employee_telephone_list->DisplayRecs, $employee_telephone_list->TotalRecs, $employee_telephone_list->RecRange, $employee_telephone_list->AutoHidePager) ?>
<?php if ($employee_telephone_list->Pager->RecordCount > 0 && $employee_telephone_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_telephone_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_telephone_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_telephone_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_telephone_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_telephone_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_telephone_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_telephone_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_telephone_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_telephone_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_telephone_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_telephone_list->TotalRecs > 0 && (!$employee_telephone_list->AutoHidePageSizeSelector || $employee_telephone_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_telephone">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_telephone_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_telephone_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_telephone_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_telephone_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_telephone_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_telephone_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_telephone->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_telephone_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_telephonelist" id="femployee_telephonelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_telephone_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_telephone_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_telephone">
<?php if ($employee_telephone->getCurrentMasterTable() == "employee" && $employee_telephone->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_telephone->employee_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_employee_telephone" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_telephone_list->TotalRecs > 0 || $employee_telephone->isGridEdit()) { ?>
<table id="tbl_employee_telephonelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_telephone_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_telephone_list->renderListOptions();

// Render list options (header, left)
$employee_telephone_list->ListOptions->render("header", "left");
?>
<?php if ($employee_telephone->id->Visible) { // id ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_telephone->id->headerCellClass() ?>"><div id="elh_employee_telephone_id" class="employee_telephone_id"><div class="ew-table-header-caption"><?php echo $employee_telephone->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_telephone->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->id) ?>',1);"><div id="elh_employee_telephone_id" class="employee_telephone_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_telephone->employee_id->headerCellClass() ?>"><div id="elh_employee_telephone_employee_id" class="employee_telephone_employee_id"><div class="ew-table-header-caption"><?php echo $employee_telephone->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_telephone->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->employee_id) ?>',1);"><div id="elh_employee_telephone_employee_id" class="employee_telephone_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->tele_type) == "") { ?>
		<th data-name="tele_type" class="<?php echo $employee_telephone->tele_type->headerCellClass() ?>"><div id="elh_employee_telephone_tele_type" class="employee_telephone_tele_type"><div class="ew-table-header-caption"><?php echo $employee_telephone->tele_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tele_type" class="<?php echo $employee_telephone->tele_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->tele_type) ?>',1);"><div id="elh_employee_telephone_tele_type" class="employee_telephone_tele_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->tele_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->tele_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->tele_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $employee_telephone->telephone->headerCellClass() ?>"><div id="elh_employee_telephone_telephone" class="employee_telephone_telephone"><div class="ew-table-header-caption"><?php echo $employee_telephone->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $employee_telephone->telephone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->telephone) ?>',1);"><div id="elh_employee_telephone_telephone" class="employee_telephone_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->telephone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->telephone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->telephone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->telephone_type) == "") { ?>
		<th data-name="telephone_type" class="<?php echo $employee_telephone->telephone_type->headerCellClass() ?>"><div id="elh_employee_telephone_telephone_type" class="employee_telephone_telephone_type"><div class="ew-table-header-caption"><?php echo $employee_telephone->telephone_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone_type" class="<?php echo $employee_telephone->telephone_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->telephone_type) ?>',1);"><div id="elh_employee_telephone_telephone_type" class="employee_telephone_telephone_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->telephone_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->telephone_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->telephone_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->status->Visible) { // status ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_telephone->status->headerCellClass() ?>"><div id="elh_employee_telephone_status" class="employee_telephone_status"><div class="ew-table-header-caption"><?php echo $employee_telephone->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_telephone->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->status) ?>',1);"><div id="elh_employee_telephone_status" class="employee_telephone_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_telephone->HospID->headerCellClass() ?>"><div id="elh_employee_telephone_HospID" class="employee_telephone_HospID"><div class="ew-table-header-caption"><?php echo $employee_telephone->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_telephone->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_telephone->SortUrl($employee_telephone->HospID) ?>',1);"><div id="elh_employee_telephone_HospID" class="employee_telephone_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_telephone_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_telephone->ExportAll && $employee_telephone->isExport()) {
	$employee_telephone_list->StopRec = $employee_telephone_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_telephone_list->TotalRecs > $employee_telephone_list->StartRec + $employee_telephone_list->DisplayRecs - 1)
		$employee_telephone_list->StopRec = $employee_telephone_list->StartRec + $employee_telephone_list->DisplayRecs - 1;
	else
		$employee_telephone_list->StopRec = $employee_telephone_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $employee_telephone_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_telephone_list->FormKeyCountName) && ($employee_telephone->isGridAdd() || $employee_telephone->isGridEdit() || $employee_telephone->isConfirm())) {
		$employee_telephone_list->KeyCount = $CurrentForm->getValue($employee_telephone_list->FormKeyCountName);
		$employee_telephone_list->StopRec = $employee_telephone_list->StartRec + $employee_telephone_list->KeyCount - 1;
	}
}
$employee_telephone_list->RecCnt = $employee_telephone_list->StartRec - 1;
if ($employee_telephone_list->Recordset && !$employee_telephone_list->Recordset->EOF) {
	$employee_telephone_list->Recordset->moveFirst();
	$selectLimit = $employee_telephone_list->UseSelectLimit;
	if (!$selectLimit && $employee_telephone_list->StartRec > 1)
		$employee_telephone_list->Recordset->move($employee_telephone_list->StartRec - 1);
} elseif (!$employee_telephone->AllowAddDeleteRow && $employee_telephone_list->StopRec == 0) {
	$employee_telephone_list->StopRec = $employee_telephone->GridAddRowCount;
}

// Initialize aggregate
$employee_telephone->RowType = ROWTYPE_AGGREGATEINIT;
$employee_telephone->resetAttributes();
$employee_telephone_list->renderRow();
if ($employee_telephone->isGridAdd())
	$employee_telephone_list->RowIndex = 0;
if ($employee_telephone->isGridEdit())
	$employee_telephone_list->RowIndex = 0;
while ($employee_telephone_list->RecCnt < $employee_telephone_list->StopRec) {
	$employee_telephone_list->RecCnt++;
	if ($employee_telephone_list->RecCnt >= $employee_telephone_list->StartRec) {
		$employee_telephone_list->RowCnt++;
		if ($employee_telephone->isGridAdd() || $employee_telephone->isGridEdit() || $employee_telephone->isConfirm()) {
			$employee_telephone_list->RowIndex++;
			$CurrentForm->Index = $employee_telephone_list->RowIndex;
			if ($CurrentForm->hasValue($employee_telephone_list->FormActionName) && $employee_telephone_list->EventCancelled)
				$employee_telephone_list->RowAction = strval($CurrentForm->getValue($employee_telephone_list->FormActionName));
			elseif ($employee_telephone->isGridAdd())
				$employee_telephone_list->RowAction = "insert";
			else
				$employee_telephone_list->RowAction = "";
		}

		// Set up key count
		$employee_telephone_list->KeyCount = $employee_telephone_list->RowIndex;

		// Init row class and style
		$employee_telephone->resetAttributes();
		$employee_telephone->CssClass = "";
		if ($employee_telephone->isGridAdd()) {
			$employee_telephone_list->loadRowValues(); // Load default values
		} else {
			$employee_telephone_list->loadRowValues($employee_telephone_list->Recordset); // Load row values
		}
		$employee_telephone->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_telephone->isGridAdd()) // Grid add
			$employee_telephone->RowType = ROWTYPE_ADD; // Render add
		if ($employee_telephone->isGridAdd() && $employee_telephone->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_telephone_list->restoreCurrentRowFormValues($employee_telephone_list->RowIndex); // Restore form values
		if ($employee_telephone->isGridEdit()) { // Grid edit
			if ($employee_telephone->EventCancelled)
				$employee_telephone_list->restoreCurrentRowFormValues($employee_telephone_list->RowIndex); // Restore form values
			if ($employee_telephone_list->RowAction == "insert")
				$employee_telephone->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_telephone->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_telephone->isGridEdit() && ($employee_telephone->RowType == ROWTYPE_EDIT || $employee_telephone->RowType == ROWTYPE_ADD) && $employee_telephone->EventCancelled) // Update failed
			$employee_telephone_list->restoreCurrentRowFormValues($employee_telephone_list->RowIndex); // Restore form values
		if ($employee_telephone->RowType == ROWTYPE_EDIT) // Edit row
			$employee_telephone_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$employee_telephone->RowAttrs = array_merge($employee_telephone->RowAttrs, array('data-rowindex'=>$employee_telephone_list->RowCnt, 'id'=>'r' . $employee_telephone_list->RowCnt . '_employee_telephone', 'data-rowtype'=>$employee_telephone->RowType));

		// Render row
		$employee_telephone_list->renderRow();

		// Render list options
		$employee_telephone_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_telephone_list->RowAction <> "delete" && $employee_telephone_list->RowAction <> "insertdelete" && !($employee_telephone_list->RowAction == "insert" && $employee_telephone->isConfirm() && $employee_telephone_list->emptyRow())) {
?>
	<tr<?php echo $employee_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_telephone_list->ListOptions->render("body", "left", $employee_telephone_list->RowCnt);
?>
	<?php if ($employee_telephone->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_telephone->id->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="o<?php echo $employee_telephone_list->RowIndex ?>_id" id="o<?php echo $employee_telephone_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_id" class="form-group employee_telephone_id">
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_id" id="x<?php echo $employee_telephone_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_id" class="employee_telephone_id">
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<?php echo $employee_telephone->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_telephone->employee_id->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_telephone->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="text" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->employee_id->EditValue ?>"<?php echo $employee_telephone->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="o<?php echo $employee_telephone_list->RowIndex ?>_employee_id" id="o<?php echo $employee_telephone_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_telephone->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="text" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->employee_id->EditValue ?>"<?php echo $employee_telephone->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_employee_id" class="employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<?php echo $employee_telephone->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type"<?php echo $employee_telephone->tele_type->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_tele_type" name="x<?php echo $employee_telephone_list->RowIndex ?>_tele_type"<?php echo $employee_telephone->tele_type->editAttributes() ?>>
		<?php echo $employee_telephone->tele_type->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_tele_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone->tele_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_list->RowIndex ?>_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->tele_type->caption() ?>" data-title="<?php echo $employee_telephone->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_list->RowIndex ?>_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->tele_type->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_tele_type") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="o<?php echo $employee_telephone_list->RowIndex ?>_tele_type" id="o<?php echo $employee_telephone_list->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_tele_type" name="x<?php echo $employee_telephone_list->RowIndex ?>_tele_type"<?php echo $employee_telephone->tele_type->editAttributes() ?>>
		<?php echo $employee_telephone->tele_type->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_tele_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone->tele_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_list->RowIndex ?>_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->tele_type->caption() ?>" data-title="<?php echo $employee_telephone->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_list->RowIndex ?>_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->tele_type->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_tele_type") ?>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_tele_type" class="employee_telephone_tele_type">
<span<?php echo $employee_telephone->tele_type->viewAttributes() ?>>
<?php echo $employee_telephone->tele_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
		<td data-name="telephone"<?php echo $employee_telephone->telephone->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_list->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_list->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->telephone->EditValue ?>"<?php echo $employee_telephone->telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="o<?php echo $employee_telephone_list->RowIndex ?>_telephone" id="o<?php echo $employee_telephone_list->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_list->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_list->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->telephone->EditValue ?>"<?php echo $employee_telephone->telephone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_telephone" class="employee_telephone_telephone">
<span<?php echo $employee_telephone->telephone->viewAttributes() ?>>
<?php echo $employee_telephone->telephone->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type"<?php echo $employee_telephone->telephone_type->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" name="x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type"<?php echo $employee_telephone->telephone_type->editAttributes() ?>>
		<?php echo $employee_telephone->telephone_type->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone->telephone_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->telephone_type->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_telephone_type") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="o<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" id="o<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" name="x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type"<?php echo $employee_telephone->telephone_type->editAttributes() ?>>
		<?php echo $employee_telephone->telephone_type->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone->telephone_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->telephone_type->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_telephone_type") ?>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_telephone_type" class="employee_telephone_telephone_type">
<span<?php echo $employee_telephone->telephone_type->viewAttributes() ?>>
<?php echo $employee_telephone->telephone_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_telephone->status->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_status" class="form-group employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_status" name="x<?php echo $employee_telephone_list->RowIndex ?>_status"<?php echo $employee_telephone->status->editAttributes() ?>>
		<?php echo $employee_telephone->status->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_telephone->status->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="o<?php echo $employee_telephone_list->RowIndex ?>_status" id="o<?php echo $employee_telephone_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_status" class="form-group employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_status" name="x<?php echo $employee_telephone_list->RowIndex ?>_status"<?php echo $employee_telephone->status->editAttributes() ?>>
		<?php echo $employee_telephone->status->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_telephone->status->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_status" class="employee_telephone_status">
<span<?php echo $employee_telephone->status->viewAttributes() ?>>
<?php echo $employee_telephone->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_telephone->HospID->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="text" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_list->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->HospID->EditValue ?>"<?php echo $employee_telephone->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="o<?php echo $employee_telephone_list->RowIndex ?>_HospID" id="o<?php echo $employee_telephone_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="text" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_list->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->HospID->EditValue ?>"<?php echo $employee_telephone->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_list->RowCnt ?>_employee_telephone_HospID" class="employee_telephone_HospID">
<span<?php echo $employee_telephone->HospID->viewAttributes() ?>>
<?php echo $employee_telephone->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_telephone_list->ListOptions->render("body", "right", $employee_telephone_list->RowCnt);
?>
	</tr>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD || $employee_telephone->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_telephonelist.updateLists(<?php echo $employee_telephone_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_telephone->isGridAdd())
		if (!$employee_telephone_list->Recordset->EOF)
			$employee_telephone_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_telephone->isGridAdd() || $employee_telephone->isGridEdit()) {
		$employee_telephone_list->RowIndex = '$rowindex$';
		$employee_telephone_list->loadRowValues();

		// Set row properties
		$employee_telephone->resetAttributes();
		$employee_telephone->RowAttrs = array_merge($employee_telephone->RowAttrs, array('data-rowindex'=>$employee_telephone_list->RowIndex, 'id'=>'r0_employee_telephone', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_telephone->RowAttrs["class"], "ew-template");
		$employee_telephone->RowType = ROWTYPE_ADD;

		// Render row
		$employee_telephone_list->renderRow();

		// Render list options
		$employee_telephone_list->renderListOptions();
		$employee_telephone_list->StartRowCnt = 0;
?>
	<tr<?php echo $employee_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_telephone_list->ListOptions->render("body", "left", $employee_telephone_list->RowIndex);
?>
	<?php if ($employee_telephone->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="o<?php echo $employee_telephone_list->RowIndex ?>_id" id="o<?php echo $employee_telephone_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_telephone->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="text" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->employee_id->EditValue ?>"<?php echo $employee_telephone->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="o<?php echo $employee_telephone_list->RowIndex ?>_employee_id" id="o<?php echo $employee_telephone_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type">
<span id="el$rowindex$_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_tele_type" name="x<?php echo $employee_telephone_list->RowIndex ?>_tele_type"<?php echo $employee_telephone->tele_type->editAttributes() ?>>
		<?php echo $employee_telephone->tele_type->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_tele_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone->tele_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_list->RowIndex ?>_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->tele_type->caption() ?>" data-title="<?php echo $employee_telephone->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_list->RowIndex ?>_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->tele_type->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_tele_type") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="o<?php echo $employee_telephone_list->RowIndex ?>_tele_type" id="o<?php echo $employee_telephone_list->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
		<td data-name="telephone">
<span id="el$rowindex$_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_list->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_list->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->telephone->EditValue ?>"<?php echo $employee_telephone->telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="o<?php echo $employee_telephone_list->RowIndex ?>_telephone" id="o<?php echo $employee_telephone_list->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type">
<span id="el$rowindex$_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" name="x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type"<?php echo $employee_telephone->telephone_type->editAttributes() ?>>
		<?php echo $employee_telephone->telephone_type->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone->telephone_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_list->RowIndex ?>_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->telephone_type->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_telephone_type") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="o<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" id="o<?php echo $employee_telephone_list->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_telephone_status" class="form-group employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_list->RowIndex ?>_status" name="x<?php echo $employee_telephone_list->RowIndex ?>_status"<?php echo $employee_telephone->status->editAttributes() ?>>
		<?php echo $employee_telephone->status->selectOptionListHtml("x<?php echo $employee_telephone_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_telephone->status->Lookup->getParamTag("p_x" . $employee_telephone_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="o<?php echo $employee_telephone_list->RowIndex ?>_status" id="o<?php echo $employee_telephone_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="text" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_list->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->HospID->EditValue ?>"<?php echo $employee_telephone->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="o<?php echo $employee_telephone_list->RowIndex ?>_HospID" id="o<?php echo $employee_telephone_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_telephone_list->ListOptions->render("body", "right", $employee_telephone_list->RowIndex);
?>
<script>
femployee_telephonelist.updateLists(<?php echo $employee_telephone_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($employee_telephone->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_telephone_list->FormKeyCountName ?>" id="<?php echo $employee_telephone_list->FormKeyCountName ?>" value="<?php echo $employee_telephone_list->KeyCount ?>">
<?php echo $employee_telephone_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_telephone->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_telephone_list->FormKeyCountName ?>" id="<?php echo $employee_telephone_list->FormKeyCountName ?>" value="<?php echo $employee_telephone_list->KeyCount ?>">
<?php echo $employee_telephone_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_telephone->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_telephone_list->Recordset)
	$employee_telephone_list->Recordset->Close();
?>
<?php if (!$employee_telephone->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_telephone->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_telephone_list->Pager)) $employee_telephone_list->Pager = new NumericPager($employee_telephone_list->StartRec, $employee_telephone_list->DisplayRecs, $employee_telephone_list->TotalRecs, $employee_telephone_list->RecRange, $employee_telephone_list->AutoHidePager) ?>
<?php if ($employee_telephone_list->Pager->RecordCount > 0 && $employee_telephone_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_telephone_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_telephone_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_telephone_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_telephone_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_telephone_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_telephone_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_telephone_list->pageUrl() ?>start=<?php echo $employee_telephone_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_telephone_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_telephone_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_telephone_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_telephone_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_telephone_list->TotalRecs > 0 && (!$employee_telephone_list->AutoHidePageSizeSelector || $employee_telephone_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_telephone">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_telephone_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_telephone_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_telephone_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_telephone_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_telephone_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_telephone_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_telephone->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_telephone_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_telephone_list->TotalRecs == 0 && !$employee_telephone->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_telephone_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_telephone_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_telephone->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_telephone->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_telephone", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_telephone_list->terminate();
?>