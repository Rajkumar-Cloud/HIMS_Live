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
$employee_address_list = new employee_address_list();

// Run the page
$employee_address_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_address->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_addresslist = currentForm = new ew.Form("femployee_addresslist", "list");
femployee_addresslist.formKeyCountName = '<?php echo $employee_address_list->FormKeyCountName ?>';

// Validate form
femployee_addresslist.validate = function() {
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
		<?php if ($employee_address_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->id->caption(), $employee_address->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->employee_id->caption(), $employee_address->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_address->employee_id->errorMessage()) ?>");
		<?php if ($employee_address_list->contact_persion->Required) { ?>
			elm = this.getElements("x" + infix + "_contact_persion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->contact_persion->caption(), $employee_address->contact_persion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->street->caption(), $employee_address->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->town->caption(), $employee_address->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->province->caption(), $employee_address->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->postal_code->caption(), $employee_address->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->address_type->Required) { ?>
			elm = this.getElements("x" + infix + "_address_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->address_type->caption(), $employee_address->address_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->status->caption(), $employee_address->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_address_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address->HospID->caption(), $employee_address->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_address->HospID->errorMessage()) ?>");

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
femployee_addresslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "contact_persion", false)) return false;
	if (ew.valueChanged(fobj, infix, "street", false)) return false;
	if (ew.valueChanged(fobj, infix, "town", false)) return false;
	if (ew.valueChanged(fobj, infix, "province", false)) return false;
	if (ew.valueChanged(fobj, infix, "postal_code", false)) return false;
	if (ew.valueChanged(fobj, infix, "address_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_addresslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_addresslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_addresslist.lists["x_address_type"] = <?php echo $employee_address_list->address_type->Lookup->toClientList() ?>;
femployee_addresslist.lists["x_address_type"].options = <?php echo JsonEncode($employee_address_list->address_type->lookupOptions()) ?>;
femployee_addresslist.lists["x_status"] = <?php echo $employee_address_list->status->Lookup->toClientList() ?>;
femployee_addresslist.lists["x_status"].options = <?php echo JsonEncode($employee_address_list->status->lookupOptions()) ?>;

// Form object for search
var femployee_addresslistsrch = currentSearchForm = new ew.Form("femployee_addresslistsrch");

// Filters
femployee_addresslistsrch.filterList = <?php echo $employee_address_list->getFilterList() ?>;
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
<?php if (!$employee_address->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_address_list->TotalRecs > 0 && $employee_address_list->ExportOptions->visible()) { ?>
<?php $employee_address_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_address_list->ImportOptions->visible()) { ?>
<?php $employee_address_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_address_list->SearchOptions->visible()) { ?>
<?php $employee_address_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_address_list->FilterOptions->visible()) { ?>
<?php $employee_address_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_address->isExport() || EXPORT_MASTER_RECORD && $employee_address->isExport("print")) { ?>
<?php
if ($employee_address_list->DbMasterFilter <> "" && $employee_address->getCurrentMasterTable() == "employee") {
	if ($employee_address_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_address_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_address->isExport() && !$employee_address->CurrentAction) { ?>
<form name="femployee_addresslistsrch" id="femployee_addresslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_address_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_addresslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_address">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_address_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_address_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_address_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_address_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_address_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_address_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_address_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_address_list->showPageHeader(); ?>
<?php
$employee_address_list->showMessage();
?>
<?php if ($employee_address_list->TotalRecs > 0 || $employee_address->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_address_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_address">
<?php if (!$employee_address->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_address->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_address_list->Pager)) $employee_address_list->Pager = new NumericPager($employee_address_list->StartRec, $employee_address_list->DisplayRecs, $employee_address_list->TotalRecs, $employee_address_list->RecRange, $employee_address_list->AutoHidePager) ?>
<?php if ($employee_address_list->Pager->RecordCount > 0 && $employee_address_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_address_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_address_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_address_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_address_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_address_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_address_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_address_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_address_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_address_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_address_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_address_list->TotalRecs > 0 && (!$employee_address_list->AutoHidePageSizeSelector || $employee_address_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_address">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_address_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_address_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_address_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_address_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_address_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_address_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_address->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_address_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_addresslist" id="femployee_addresslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_address_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_address_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<?php if ($employee_address->getCurrentMasterTable() == "employee" && $employee_address->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo $employee_address->employee_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_employee_address" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_address_list->TotalRecs > 0 || $employee_address->isGridEdit()) { ?>
<table id="tbl_employee_addresslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_address_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_address_list->renderListOptions();

// Render list options (header, left)
$employee_address_list->ListOptions->render("header", "left");
?>
<?php if ($employee_address->id->Visible) { // id ?>
	<?php if ($employee_address->sortUrl($employee_address->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_address->id->headerCellClass() ?>"><div id="elh_employee_address_id" class="employee_address_id"><div class="ew-table-header-caption"><?php echo $employee_address->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_address->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->id) ?>',1);"><div id="elh_employee_address_id" class="employee_address_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_address->sortUrl($employee_address->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_address->employee_id->headerCellClass() ?>"><div id="elh_employee_address_employee_id" class="employee_address_employee_id"><div class="ew-table-header-caption"><?php echo $employee_address->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_address->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->employee_id) ?>',1);"><div id="elh_employee_address_employee_id" class="employee_address_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
	<?php if ($employee_address->sortUrl($employee_address->contact_persion) == "") { ?>
		<th data-name="contact_persion" class="<?php echo $employee_address->contact_persion->headerCellClass() ?>"><div id="elh_employee_address_contact_persion" class="employee_address_contact_persion"><div class="ew-table-header-caption"><?php echo $employee_address->contact_persion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contact_persion" class="<?php echo $employee_address->contact_persion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->contact_persion) ?>',1);"><div id="elh_employee_address_contact_persion" class="employee_address_contact_persion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->contact_persion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_address->contact_persion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->contact_persion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->street->Visible) { // street ?>
	<?php if ($employee_address->sortUrl($employee_address->street) == "") { ?>
		<th data-name="street" class="<?php echo $employee_address->street->headerCellClass() ?>"><div id="elh_employee_address_street" class="employee_address_street"><div class="ew-table-header-caption"><?php echo $employee_address->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $employee_address->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->street) ?>',1);"><div id="elh_employee_address_street" class="employee_address_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_address->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->town->Visible) { // town ?>
	<?php if ($employee_address->sortUrl($employee_address->town) == "") { ?>
		<th data-name="town" class="<?php echo $employee_address->town->headerCellClass() ?>"><div id="elh_employee_address_town" class="employee_address_town"><div class="ew-table-header-caption"><?php echo $employee_address->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $employee_address->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->town) ?>',1);"><div id="elh_employee_address_town" class="employee_address_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_address->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->province->Visible) { // province ?>
	<?php if ($employee_address->sortUrl($employee_address->province) == "") { ?>
		<th data-name="province" class="<?php echo $employee_address->province->headerCellClass() ?>"><div id="elh_employee_address_province" class="employee_address_province"><div class="ew-table-header-caption"><?php echo $employee_address->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $employee_address->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->province) ?>',1);"><div id="elh_employee_address_province" class="employee_address_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_address->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
	<?php if ($employee_address->sortUrl($employee_address->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $employee_address->postal_code->headerCellClass() ?>"><div id="elh_employee_address_postal_code" class="employee_address_postal_code"><div class="ew-table-header-caption"><?php echo $employee_address->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $employee_address->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->postal_code) ?>',1);"><div id="elh_employee_address_postal_code" class="employee_address_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_address->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->address_type->Visible) { // address_type ?>
	<?php if ($employee_address->sortUrl($employee_address->address_type) == "") { ?>
		<th data-name="address_type" class="<?php echo $employee_address->address_type->headerCellClass() ?>"><div id="elh_employee_address_address_type" class="employee_address_address_type"><div class="ew-table-header-caption"><?php echo $employee_address->address_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address_type" class="<?php echo $employee_address->address_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->address_type) ?>',1);"><div id="elh_employee_address_address_type" class="employee_address_address_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address->address_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->address_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->status->Visible) { // status ?>
	<?php if ($employee_address->sortUrl($employee_address->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_address->status->headerCellClass() ?>"><div id="elh_employee_address_status" class="employee_address_status"><div class="ew-table-header-caption"><?php echo $employee_address->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_address->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->status) ?>',1);"><div id="elh_employee_address_status" class="employee_address_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address->HospID->Visible) { // HospID ?>
	<?php if ($employee_address->sortUrl($employee_address->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_address->HospID->headerCellClass() ?>"><div id="elh_employee_address_HospID" class="employee_address_HospID"><div class="ew-table-header-caption"><?php echo $employee_address->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_address->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_address->SortUrl($employee_address->HospID) ?>',1);"><div id="elh_employee_address_HospID" class="employee_address_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_address->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_address_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_address->ExportAll && $employee_address->isExport()) {
	$employee_address_list->StopRec = $employee_address_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_address_list->TotalRecs > $employee_address_list->StartRec + $employee_address_list->DisplayRecs - 1)
		$employee_address_list->StopRec = $employee_address_list->StartRec + $employee_address_list->DisplayRecs - 1;
	else
		$employee_address_list->StopRec = $employee_address_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $employee_address_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_address_list->FormKeyCountName) && ($employee_address->isGridAdd() || $employee_address->isGridEdit() || $employee_address->isConfirm())) {
		$employee_address_list->KeyCount = $CurrentForm->getValue($employee_address_list->FormKeyCountName);
		$employee_address_list->StopRec = $employee_address_list->StartRec + $employee_address_list->KeyCount - 1;
	}
}
$employee_address_list->RecCnt = $employee_address_list->StartRec - 1;
if ($employee_address_list->Recordset && !$employee_address_list->Recordset->EOF) {
	$employee_address_list->Recordset->moveFirst();
	$selectLimit = $employee_address_list->UseSelectLimit;
	if (!$selectLimit && $employee_address_list->StartRec > 1)
		$employee_address_list->Recordset->move($employee_address_list->StartRec - 1);
} elseif (!$employee_address->AllowAddDeleteRow && $employee_address_list->StopRec == 0) {
	$employee_address_list->StopRec = $employee_address->GridAddRowCount;
}

// Initialize aggregate
$employee_address->RowType = ROWTYPE_AGGREGATEINIT;
$employee_address->resetAttributes();
$employee_address_list->renderRow();
if ($employee_address->isGridAdd())
	$employee_address_list->RowIndex = 0;
if ($employee_address->isGridEdit())
	$employee_address_list->RowIndex = 0;
while ($employee_address_list->RecCnt < $employee_address_list->StopRec) {
	$employee_address_list->RecCnt++;
	if ($employee_address_list->RecCnt >= $employee_address_list->StartRec) {
		$employee_address_list->RowCnt++;
		if ($employee_address->isGridAdd() || $employee_address->isGridEdit() || $employee_address->isConfirm()) {
			$employee_address_list->RowIndex++;
			$CurrentForm->Index = $employee_address_list->RowIndex;
			if ($CurrentForm->hasValue($employee_address_list->FormActionName) && $employee_address_list->EventCancelled)
				$employee_address_list->RowAction = strval($CurrentForm->getValue($employee_address_list->FormActionName));
			elseif ($employee_address->isGridAdd())
				$employee_address_list->RowAction = "insert";
			else
				$employee_address_list->RowAction = "";
		}

		// Set up key count
		$employee_address_list->KeyCount = $employee_address_list->RowIndex;

		// Init row class and style
		$employee_address->resetAttributes();
		$employee_address->CssClass = "";
		if ($employee_address->isGridAdd()) {
			$employee_address_list->loadRowValues(); // Load default values
		} else {
			$employee_address_list->loadRowValues($employee_address_list->Recordset); // Load row values
		}
		$employee_address->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_address->isGridAdd()) // Grid add
			$employee_address->RowType = ROWTYPE_ADD; // Render add
		if ($employee_address->isGridAdd() && $employee_address->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_address_list->restoreCurrentRowFormValues($employee_address_list->RowIndex); // Restore form values
		if ($employee_address->isGridEdit()) { // Grid edit
			if ($employee_address->EventCancelled)
				$employee_address_list->restoreCurrentRowFormValues($employee_address_list->RowIndex); // Restore form values
			if ($employee_address_list->RowAction == "insert")
				$employee_address->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_address->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_address->isGridEdit() && ($employee_address->RowType == ROWTYPE_EDIT || $employee_address->RowType == ROWTYPE_ADD) && $employee_address->EventCancelled) // Update failed
			$employee_address_list->restoreCurrentRowFormValues($employee_address_list->RowIndex); // Restore form values
		if ($employee_address->RowType == ROWTYPE_EDIT) // Edit row
			$employee_address_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$employee_address->RowAttrs = array_merge($employee_address->RowAttrs, array('data-rowindex'=>$employee_address_list->RowCnt, 'id'=>'r' . $employee_address_list->RowCnt . '_employee_address', 'data-rowtype'=>$employee_address->RowType));

		// Render row
		$employee_address_list->renderRow();

		// Render list options
		$employee_address_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_address_list->RowAction <> "delete" && $employee_address_list->RowAction <> "insertdelete" && !($employee_address_list->RowAction == "insert" && $employee_address->isConfirm() && $employee_address_list->emptyRow())) {
?>
	<tr<?php echo $employee_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_address_list->ListOptions->render("body", "left", $employee_address_list->RowCnt);
?>
	<?php if ($employee_address->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_address->id->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_address" data-field="x_id" name="o<?php echo $employee_address_list->RowIndex ?>_id" id="o<?php echo $employee_address_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_id" class="form-group employee_address_id">
<span<?php echo $employee_address->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_address->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_id" name="x<?php echo $employee_address_list->RowIndex ?>_id" id="x<?php echo $employee_address_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_id" class="employee_address_id">
<span<?php echo $employee_address->id->viewAttributes() ?>>
<?php echo $employee_address->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_address->employee_id->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_address->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_address->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_address_list->RowIndex ?>_employee_id" name="x<?php echo $employee_address_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_employee_id" class="form-group employee_address_employee_id">
<input type="text" data-table="employee_address" data-field="x_employee_id" name="x<?php echo $employee_address_list->RowIndex ?>_employee_id" id="x<?php echo $employee_address_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_address->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_address->employee_id->EditValue ?>"<?php echo $employee_address->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="o<?php echo $employee_address_list->RowIndex ?>_employee_id" id="o<?php echo $employee_address_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_address->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_address->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_address_list->RowIndex ?>_employee_id" name="x<?php echo $employee_address_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_employee_id" class="form-group employee_address_employee_id">
<input type="text" data-table="employee_address" data-field="x_employee_id" name="x<?php echo $employee_address_list->RowIndex ?>_employee_id" id="x<?php echo $employee_address_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_address->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_address->employee_id->EditValue ?>"<?php echo $employee_address->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_employee_id" class="employee_address_employee_id">
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<?php echo $employee_address->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
		<td data-name="contact_persion"<?php echo $employee_address->contact_persion->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_list->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_list->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address->contact_persion->EditValue ?>"<?php echo $employee_address->contact_persion->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="o<?php echo $employee_address_list->RowIndex ?>_contact_persion" id="o<?php echo $employee_address_list->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address->contact_persion->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_list->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_list->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address->contact_persion->EditValue ?>"<?php echo $employee_address->contact_persion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_contact_persion" class="employee_address_contact_persion">
<span<?php echo $employee_address->contact_persion->viewAttributes() ?>>
<?php echo $employee_address->contact_persion->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->street->Visible) { // street ?>
		<td data-name="street"<?php echo $employee_address->street->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_street" class="form-group employee_address_street">
<input type="text" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_list->RowIndex ?>_street" id="x<?php echo $employee_address_list->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address->street->getPlaceHolder()) ?>" value="<?php echo $employee_address->street->EditValue ?>"<?php echo $employee_address->street->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" name="o<?php echo $employee_address_list->RowIndex ?>_street" id="o<?php echo $employee_address_list->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address->street->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_street" class="form-group employee_address_street">
<input type="text" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_list->RowIndex ?>_street" id="x<?php echo $employee_address_list->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address->street->getPlaceHolder()) ?>" value="<?php echo $employee_address->street->EditValue ?>"<?php echo $employee_address->street->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_street" class="employee_address_street">
<span<?php echo $employee_address->street->viewAttributes() ?>>
<?php echo $employee_address->street->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->town->Visible) { // town ?>
		<td data-name="town"<?php echo $employee_address->town->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_town" class="form-group employee_address_town">
<input type="text" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_list->RowIndex ?>_town" id="x<?php echo $employee_address_list->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->town->getPlaceHolder()) ?>" value="<?php echo $employee_address->town->EditValue ?>"<?php echo $employee_address->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" name="o<?php echo $employee_address_list->RowIndex ?>_town" id="o<?php echo $employee_address_list->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address->town->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_town" class="form-group employee_address_town">
<input type="text" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_list->RowIndex ?>_town" id="x<?php echo $employee_address_list->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->town->getPlaceHolder()) ?>" value="<?php echo $employee_address->town->EditValue ?>"<?php echo $employee_address->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_town" class="employee_address_town">
<span<?php echo $employee_address->town->viewAttributes() ?>>
<?php echo $employee_address->town->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->province->Visible) { // province ?>
		<td data-name="province"<?php echo $employee_address->province->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_province" class="form-group employee_address_province">
<input type="text" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_list->RowIndex ?>_province" id="x<?php echo $employee_address_list->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->province->getPlaceHolder()) ?>" value="<?php echo $employee_address->province->EditValue ?>"<?php echo $employee_address->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" name="o<?php echo $employee_address_list->RowIndex ?>_province" id="o<?php echo $employee_address_list->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address->province->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_province" class="form-group employee_address_province">
<input type="text" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_list->RowIndex ?>_province" id="x<?php echo $employee_address_list->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->province->getPlaceHolder()) ?>" value="<?php echo $employee_address->province->EditValue ?>"<?php echo $employee_address->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_province" class="employee_address_province">
<span<?php echo $employee_address->province->viewAttributes() ?>>
<?php echo $employee_address->province->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $employee_address->postal_code->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_postal_code" class="form-group employee_address_postal_code">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_list->RowIndex ?>_postal_code" id="x<?php echo $employee_address_list->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address->postal_code->EditValue ?>"<?php echo $employee_address->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="o<?php echo $employee_address_list->RowIndex ?>_postal_code" id="o<?php echo $employee_address_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_postal_code" class="form-group employee_address_postal_code">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_list->RowIndex ?>_postal_code" id="x<?php echo $employee_address_list->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address->postal_code->EditValue ?>"<?php echo $employee_address->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_postal_code" class="employee_address_postal_code">
<span<?php echo $employee_address->postal_code->viewAttributes() ?>>
<?php echo $employee_address->postal_code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->address_type->Visible) { // address_type ?>
		<td data-name="address_type"<?php echo $employee_address->address_type->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_address_type" class="form-group employee_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_list->RowIndex ?>_address_type" name="x<?php echo $employee_address_list->RowIndex ?>_address_type"<?php echo $employee_address->address_type->editAttributes() ?>>
		<?php echo $employee_address->address_type->selectOptionListHtml("x<?php echo $employee_address_list->RowIndex ?>_address_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address->address_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_address_list->RowIndex ?>_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address->address_type->caption() ?>" data-title="<?php echo $employee_address->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_address_list->RowIndex ?>_address_type',url:'sys_address_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_address->address_type->Lookup->getParamTag("p_x" . $employee_address_list->RowIndex . "_address_type") ?>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="o<?php echo $employee_address_list->RowIndex ?>_address_type" id="o<?php echo $employee_address_list->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address->address_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_address_type" class="form-group employee_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_list->RowIndex ?>_address_type" name="x<?php echo $employee_address_list->RowIndex ?>_address_type"<?php echo $employee_address->address_type->editAttributes() ?>>
		<?php echo $employee_address->address_type->selectOptionListHtml("x<?php echo $employee_address_list->RowIndex ?>_address_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address->address_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_address_list->RowIndex ?>_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address->address_type->caption() ?>" data-title="<?php echo $employee_address->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_address_list->RowIndex ?>_address_type',url:'sys_address_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_address->address_type->Lookup->getParamTag("p_x" . $employee_address_list->RowIndex . "_address_type") ?>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_address_type" class="employee_address_address_type">
<span<?php echo $employee_address->address_type->viewAttributes() ?>>
<?php echo $employee_address->address_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_address->status->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_status" class="form-group employee_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_list->RowIndex ?>_status" name="x<?php echo $employee_address_list->RowIndex ?>_status"<?php echo $employee_address->status->editAttributes() ?>>
		<?php echo $employee_address->status->selectOptionListHtml("x<?php echo $employee_address_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_address->status->Lookup->getParamTag("p_x" . $employee_address_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" name="o<?php echo $employee_address_list->RowIndex ?>_status" id="o<?php echo $employee_address_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_status" class="form-group employee_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_list->RowIndex ?>_status" name="x<?php echo $employee_address_list->RowIndex ?>_status"<?php echo $employee_address->status->editAttributes() ?>>
		<?php echo $employee_address->status->selectOptionListHtml("x<?php echo $employee_address_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_address->status->Lookup->getParamTag("p_x" . $employee_address_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_status" class="employee_address_status">
<span<?php echo $employee_address->status->viewAttributes() ?>>
<?php echo $employee_address->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_address->HospID->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_HospID" class="form-group employee_address_HospID">
<input type="text" data-table="employee_address" data-field="x_HospID" name="x<?php echo $employee_address_list->RowIndex ?>_HospID" id="x<?php echo $employee_address_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_address->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_address->HospID->EditValue ?>"<?php echo $employee_address->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_HospID" name="o<?php echo $employee_address_list->RowIndex ?>_HospID" id="o<?php echo $employee_address_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_address->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_HospID" class="form-group employee_address_HospID">
<input type="text" data-table="employee_address" data-field="x_HospID" name="x<?php echo $employee_address_list->RowIndex ?>_HospID" id="x<?php echo $employee_address_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_address->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_address->HospID->EditValue ?>"<?php echo $employee_address->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_list->RowCnt ?>_employee_address_HospID" class="employee_address_HospID">
<span<?php echo $employee_address->HospID->viewAttributes() ?>>
<?php echo $employee_address->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_address_list->ListOptions->render("body", "right", $employee_address_list->RowCnt);
?>
	</tr>
<?php if ($employee_address->RowType == ROWTYPE_ADD || $employee_address->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_addresslist.updateLists(<?php echo $employee_address_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_address->isGridAdd())
		if (!$employee_address_list->Recordset->EOF)
			$employee_address_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_address->isGridAdd() || $employee_address->isGridEdit()) {
		$employee_address_list->RowIndex = '$rowindex$';
		$employee_address_list->loadRowValues();

		// Set row properties
		$employee_address->resetAttributes();
		$employee_address->RowAttrs = array_merge($employee_address->RowAttrs, array('data-rowindex'=>$employee_address_list->RowIndex, 'id'=>'r0_employee_address', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_address->RowAttrs["class"], "ew-template");
		$employee_address->RowType = ROWTYPE_ADD;

		// Render row
		$employee_address_list->renderRow();

		// Render list options
		$employee_address_list->renderListOptions();
		$employee_address_list->StartRowCnt = 0;
?>
	<tr<?php echo $employee_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_address_list->ListOptions->render("body", "left", $employee_address_list->RowIndex);
?>
	<?php if ($employee_address->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="employee_address" data-field="x_id" name="o<?php echo $employee_address_list->RowIndex ?>_id" id="o<?php echo $employee_address_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_address->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_address->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_address_list->RowIndex ?>_employee_id" name="x<?php echo $employee_address_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<input type="text" data-table="employee_address" data-field="x_employee_id" name="x<?php echo $employee_address_list->RowIndex ?>_employee_id" id="x<?php echo $employee_address_list->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_address->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_address->employee_id->EditValue ?>"<?php echo $employee_address->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="o<?php echo $employee_address_list->RowIndex ?>_employee_id" id="o<?php echo $employee_address_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
		<td data-name="contact_persion">
<span id="el$rowindex$_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_list->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_list->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address->contact_persion->EditValue ?>"<?php echo $employee_address->contact_persion->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="o<?php echo $employee_address_list->RowIndex ?>_contact_persion" id="o<?php echo $employee_address_list->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address->contact_persion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->street->Visible) { // street ?>
		<td data-name="street">
<span id="el$rowindex$_employee_address_street" class="form-group employee_address_street">
<input type="text" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_list->RowIndex ?>_street" id="x<?php echo $employee_address_list->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address->street->getPlaceHolder()) ?>" value="<?php echo $employee_address->street->EditValue ?>"<?php echo $employee_address->street->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" name="o<?php echo $employee_address_list->RowIndex ?>_street" id="o<?php echo $employee_address_list->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address->street->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->town->Visible) { // town ?>
		<td data-name="town">
<span id="el$rowindex$_employee_address_town" class="form-group employee_address_town">
<input type="text" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_list->RowIndex ?>_town" id="x<?php echo $employee_address_list->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->town->getPlaceHolder()) ?>" value="<?php echo $employee_address->town->EditValue ?>"<?php echo $employee_address->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" name="o<?php echo $employee_address_list->RowIndex ?>_town" id="o<?php echo $employee_address_list->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->province->Visible) { // province ?>
		<td data-name="province">
<span id="el$rowindex$_employee_address_province" class="form-group employee_address_province">
<input type="text" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_list->RowIndex ?>_province" id="x<?php echo $employee_address_list->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->province->getPlaceHolder()) ?>" value="<?php echo $employee_address->province->EditValue ?>"<?php echo $employee_address->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" name="o<?php echo $employee_address_list->RowIndex ?>_province" id="o<?php echo $employee_address_list->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<span id="el$rowindex$_employee_address_postal_code" class="form-group employee_address_postal_code">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_list->RowIndex ?>_postal_code" id="x<?php echo $employee_address_list->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address->postal_code->EditValue ?>"<?php echo $employee_address->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="o<?php echo $employee_address_list->RowIndex ?>_postal_code" id="o<?php echo $employee_address_list->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->address_type->Visible) { // address_type ?>
		<td data-name="address_type">
<span id="el$rowindex$_employee_address_address_type" class="form-group employee_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_list->RowIndex ?>_address_type" name="x<?php echo $employee_address_list->RowIndex ?>_address_type"<?php echo $employee_address->address_type->editAttributes() ?>>
		<?php echo $employee_address->address_type->selectOptionListHtml("x<?php echo $employee_address_list->RowIndex ?>_address_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address->address_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_address_list->RowIndex ?>_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address->address_type->caption() ?>" data-title="<?php echo $employee_address->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_address_list->RowIndex ?>_address_type',url:'sys_address_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_address->address_type->Lookup->getParamTag("p_x" . $employee_address_list->RowIndex . "_address_type") ?>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="o<?php echo $employee_address_list->RowIndex ?>_address_type" id="o<?php echo $employee_address_list->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address->address_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_address_status" class="form-group employee_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_list->RowIndex ?>_status" name="x<?php echo $employee_address_list->RowIndex ?>_status"<?php echo $employee_address->status->editAttributes() ?>>
		<?php echo $employee_address->status->selectOptionListHtml("x<?php echo $employee_address_list->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_address->status->Lookup->getParamTag("p_x" . $employee_address_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" name="o<?php echo $employee_address_list->RowIndex ?>_status" id="o<?php echo $employee_address_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_employee_address_HospID" class="form-group employee_address_HospID">
<input type="text" data-table="employee_address" data-field="x_HospID" name="x<?php echo $employee_address_list->RowIndex ?>_HospID" id="x<?php echo $employee_address_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_address->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_address->HospID->EditValue ?>"<?php echo $employee_address->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_HospID" name="o<?php echo $employee_address_list->RowIndex ?>_HospID" id="o<?php echo $employee_address_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_address->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_address_list->ListOptions->render("body", "right", $employee_address_list->RowIndex);
?>
<script>
femployee_addresslist.updateLists(<?php echo $employee_address_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($employee_address->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_address_list->FormKeyCountName ?>" id="<?php echo $employee_address_list->FormKeyCountName ?>" value="<?php echo $employee_address_list->KeyCount ?>">
<?php echo $employee_address_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_address->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_address_list->FormKeyCountName ?>" id="<?php echo $employee_address_list->FormKeyCountName ?>" value="<?php echo $employee_address_list->KeyCount ?>">
<?php echo $employee_address_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_address->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_address_list->Recordset)
	$employee_address_list->Recordset->Close();
?>
<?php if (!$employee_address->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_address->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_address_list->Pager)) $employee_address_list->Pager = new NumericPager($employee_address_list->StartRec, $employee_address_list->DisplayRecs, $employee_address_list->TotalRecs, $employee_address_list->RecRange, $employee_address_list->AutoHidePager) ?>
<?php if ($employee_address_list->Pager->RecordCount > 0 && $employee_address_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_address_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_address_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_address_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_address_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_address_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_address_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_address_list->pageUrl() ?>start=<?php echo $employee_address_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_address_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_address_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_address_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_address_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_address_list->TotalRecs > 0 && (!$employee_address_list->AutoHidePageSizeSelector || $employee_address_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_address">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_address_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_address_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_address_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_address_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_address_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_address_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_address->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_address_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_address_list->TotalRecs == 0 && !$employee_address->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_address_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_address_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_address->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_address->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_address", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_address_list->terminate();
?>