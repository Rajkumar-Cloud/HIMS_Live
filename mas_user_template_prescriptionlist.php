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
$mas_user_template_prescription_list = new mas_user_template_prescription_list();

// Run the page
$mas_user_template_prescription_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_prescription_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_user_template_prescriptionlist = currentForm = new ew.Form("fmas_user_template_prescriptionlist", "list");
fmas_user_template_prescriptionlist.formKeyCountName = '<?php echo $mas_user_template_prescription_list->FormKeyCountName ?>';

// Validate form
fmas_user_template_prescriptionlist.validate = function() {
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
		<?php if ($mas_user_template_prescription_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->id->caption(), $mas_user_template_prescription->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->TemplateName->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->TemplateName->caption(), $mas_user_template_prescription->TemplateName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->Medicine->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->Medicine->caption(), $mas_user_template_prescription->Medicine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->M->caption(), $mas_user_template_prescription->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->A->caption(), $mas_user_template_prescription->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->N->Required) { ?>
			elm = this.getElements("x" + infix + "_N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->N->caption(), $mas_user_template_prescription->N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->NoOfDays->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfDays");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->NoOfDays->caption(), $mas_user_template_prescription->NoOfDays->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->PreRoute->Required) { ?>
			elm = this.getElements("x" + infix + "_PreRoute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->PreRoute->caption(), $mas_user_template_prescription->PreRoute->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->TimeOfTaking->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeOfTaking");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->TimeOfTaking->caption(), $mas_user_template_prescription->TimeOfTaking->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->CreatedBy->caption(), $mas_user_template_prescription->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->CreateDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreateDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->CreateDateTime->caption(), $mas_user_template_prescription->CreateDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->ModifiedBy->caption(), $mas_user_template_prescription->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_user_template_prescription_list->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription->ModifiedDateTime->caption(), $mas_user_template_prescription->ModifiedDateTime->RequiredErrorMessage)) ?>");
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
fmas_user_template_prescriptionlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TemplateName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Medicine", false)) return false;
	if (ew.valueChanged(fobj, infix, "M", false)) return false;
	if (ew.valueChanged(fobj, infix, "A", false)) return false;
	if (ew.valueChanged(fobj, infix, "N", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfDays", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreRoute", false)) return false;
	if (ew.valueChanged(fobj, infix, "TimeOfTaking", false)) return false;
	return true;
}

// Form_CustomValidate event
fmas_user_template_prescriptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_user_template_prescriptionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_user_template_prescriptionlist.lists["x_TemplateName"] = <?php echo $mas_user_template_prescription_list->TemplateName->Lookup->toClientList() ?>;
fmas_user_template_prescriptionlist.lists["x_TemplateName"].options = <?php echo JsonEncode($mas_user_template_prescription_list->TemplateName->lookupOptions()) ?>;
fmas_user_template_prescriptionlist.lists["x_Medicine"] = <?php echo $mas_user_template_prescription_list->Medicine->Lookup->toClientList() ?>;
fmas_user_template_prescriptionlist.lists["x_Medicine"].options = <?php echo JsonEncode($mas_user_template_prescription_list->Medicine->lookupOptions()) ?>;
fmas_user_template_prescriptionlist.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fmas_user_template_prescriptionlist.lists["x_PreRoute"] = <?php echo $mas_user_template_prescription_list->PreRoute->Lookup->toClientList() ?>;
fmas_user_template_prescriptionlist.lists["x_PreRoute"].options = <?php echo JsonEncode($mas_user_template_prescription_list->PreRoute->lookupOptions()) ?>;
fmas_user_template_prescriptionlist.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fmas_user_template_prescriptionlist.lists["x_TimeOfTaking"] = <?php echo $mas_user_template_prescription_list->TimeOfTaking->Lookup->toClientList() ?>;
fmas_user_template_prescriptionlist.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($mas_user_template_prescription_list->TimeOfTaking->lookupOptions()) ?>;
fmas_user_template_prescriptionlist.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fmas_user_template_prescriptionlistsrch = currentSearchForm = new ew.Form("fmas_user_template_prescriptionlistsrch");

// Filters
fmas_user_template_prescriptionlistsrch.filterList = <?php echo $mas_user_template_prescription_list->getFilterList() ?>;
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
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_user_template_prescription_list->TotalRecs > 0 && $mas_user_template_prescription_list->ExportOptions->visible()) { ?>
<?php $mas_user_template_prescription_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_prescription_list->ImportOptions->visible()) { ?>
<?php $mas_user_template_prescription_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_prescription_list->SearchOptions->visible()) { ?>
<?php $mas_user_template_prescription_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_prescription_list->FilterOptions->visible()) { ?>
<?php $mas_user_template_prescription_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_user_template_prescription_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_user_template_prescription->isExport() && !$mas_user_template_prescription->CurrentAction) { ?>
<form name="fmas_user_template_prescriptionlistsrch" id="fmas_user_template_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_user_template_prescription_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_user_template_prescriptionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_user_template_prescription">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_user_template_prescription_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_user_template_prescription_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_user_template_prescription_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_user_template_prescription_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_prescription_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_prescription_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_prescription_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_user_template_prescription_list->showPageHeader(); ?>
<?php
$mas_user_template_prescription_list->showMessage();
?>
<?php if ($mas_user_template_prescription_list->TotalRecs > 0 || $mas_user_template_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_user_template_prescription_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_user_template_prescription">
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_user_template_prescription->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_user_template_prescription_list->Pager)) $mas_user_template_prescription_list->Pager = new NumericPager($mas_user_template_prescription_list->StartRec, $mas_user_template_prescription_list->DisplayRecs, $mas_user_template_prescription_list->TotalRecs, $mas_user_template_prescription_list->RecRange, $mas_user_template_prescription_list->AutoHidePager) ?>
<?php if ($mas_user_template_prescription_list->Pager->RecordCount > 0 && $mas_user_template_prescription_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_user_template_prescription_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_prescription_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_user_template_prescription_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_user_template_prescription_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_prescription_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_prescription_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_user_template_prescription_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_user_template_prescription_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_user_template_prescription_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_user_template_prescription_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_user_template_prescription_list->TotalRecs > 0 && (!$mas_user_template_prescription_list->AutoHidePageSizeSelector || $mas_user_template_prescription_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_user_template_prescription">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_user_template_prescription_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_user_template_prescription_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_user_template_prescription_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_user_template_prescription_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_user_template_prescription_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_user_template_prescription_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_user_template_prescription->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_user_template_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_user_template_prescriptionlist" id="fmas_user_template_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_user_template_prescription_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_user_template_prescription_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<div id="gmp_mas_user_template_prescription" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_user_template_prescription_list->TotalRecs > 0 || $mas_user_template_prescription->isGridEdit()) { ?>
<table id="tbl_mas_user_template_prescriptionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_user_template_prescription_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_user_template_prescription_list->renderListOptions();

// Render list options (header, left)
$mas_user_template_prescription_list->ListOptions->render("header", "left");
?>
<?php if ($mas_user_template_prescription->id->Visible) { // id ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_user_template_prescription->id->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_id" class="mas_user_template_prescription_id"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_user_template_prescription->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->id) ?>',1);"><div id="elh_mas_user_template_prescription_id" class="mas_user_template_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->TemplateName->Visible) { // TemplateName ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->TemplateName) == "") { ?>
		<th data-name="TemplateName" class="<?php echo $mas_user_template_prescription->TemplateName->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->TemplateName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateName" class="<?php echo $mas_user_template_prescription->TemplateName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->TemplateName) ?>',1);"><div id="elh_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->TemplateName->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->TemplateName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->TemplateName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->Medicine->Visible) { // Medicine ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->Medicine) == "") { ?>
		<th data-name="Medicine" class="<?php echo $mas_user_template_prescription->Medicine->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->Medicine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicine" class="<?php echo $mas_user_template_prescription->Medicine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->Medicine) ?>',1);"><div id="elh_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->Medicine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->Medicine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->Medicine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->M->Visible) { // M ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->M) == "") { ?>
		<th data-name="M" class="<?php echo $mas_user_template_prescription->M->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_M" class="mas_user_template_prescription_M"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $mas_user_template_prescription->M->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->M) ?>',1);"><div id="elh_mas_user_template_prescription_M" class="mas_user_template_prescription_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->M->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->M->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->M->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->A->Visible) { // A ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->A) == "") { ?>
		<th data-name="A" class="<?php echo $mas_user_template_prescription->A->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_A" class="mas_user_template_prescription_A"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $mas_user_template_prescription->A->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->A) ?>',1);"><div id="elh_mas_user_template_prescription_A" class="mas_user_template_prescription_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->A->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->N->Visible) { // N ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->N) == "") { ?>
		<th data-name="N" class="<?php echo $mas_user_template_prescription->N->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_N" class="mas_user_template_prescription_N"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="N" class="<?php echo $mas_user_template_prescription->N->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->N) ?>',1);"><div id="elh_mas_user_template_prescription_N" class="mas_user_template_prescription_N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->NoOfDays) == "") { ?>
		<th data-name="NoOfDays" class="<?php echo $mas_user_template_prescription->NoOfDays->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->NoOfDays->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfDays" class="<?php echo $mas_user_template_prescription->NoOfDays->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->NoOfDays) ?>',1);"><div id="elh_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->NoOfDays->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->NoOfDays->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->NoOfDays->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->PreRoute->Visible) { // PreRoute ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->PreRoute) == "") { ?>
		<th data-name="PreRoute" class="<?php echo $mas_user_template_prescription->PreRoute->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->PreRoute->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreRoute" class="<?php echo $mas_user_template_prescription->PreRoute->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->PreRoute) ?>',1);"><div id="elh_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->PreRoute->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->PreRoute->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->PreRoute->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->TimeOfTaking) == "") { ?>
		<th data-name="TimeOfTaking" class="<?php echo $mas_user_template_prescription->TimeOfTaking->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeOfTaking" class="<?php echo $mas_user_template_prescription->TimeOfTaking->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->TimeOfTaking) ?>',1);"><div id="elh_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->TimeOfTaking->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->TimeOfTaking->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $mas_user_template_prescription->CreatedBy->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $mas_user_template_prescription->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->CreatedBy) ?>',1);"><div id="elh_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->CreateDateTime) == "") { ?>
		<th data-name="CreateDateTime" class="<?php echo $mas_user_template_prescription->CreateDateTime->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->CreateDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreateDateTime" class="<?php echo $mas_user_template_prescription->CreateDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->CreateDateTime) ?>',1);"><div id="elh_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->CreateDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->CreateDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->CreateDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $mas_user_template_prescription->ModifiedBy->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $mas_user_template_prescription->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->ModifiedBy) ?>',1);"><div id="elh_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($mas_user_template_prescription->sortUrl($mas_user_template_prescription->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $mas_user_template_prescription->ModifiedDateTime->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $mas_user_template_prescription->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $mas_user_template_prescription->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template_prescription->SortUrl($mas_user_template_prescription->ModifiedDateTime) ?>',1);"><div id="elh_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template_prescription->ModifiedDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template_prescription->ModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template_prescription->ModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_user_template_prescription_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_user_template_prescription->ExportAll && $mas_user_template_prescription->isExport()) {
	$mas_user_template_prescription_list->StopRec = $mas_user_template_prescription_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_user_template_prescription_list->TotalRecs > $mas_user_template_prescription_list->StartRec + $mas_user_template_prescription_list->DisplayRecs - 1)
		$mas_user_template_prescription_list->StopRec = $mas_user_template_prescription_list->StartRec + $mas_user_template_prescription_list->DisplayRecs - 1;
	else
		$mas_user_template_prescription_list->StopRec = $mas_user_template_prescription_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $mas_user_template_prescription_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($mas_user_template_prescription_list->FormKeyCountName) && ($mas_user_template_prescription->isGridAdd() || $mas_user_template_prescription->isGridEdit() || $mas_user_template_prescription->isConfirm())) {
		$mas_user_template_prescription_list->KeyCount = $CurrentForm->getValue($mas_user_template_prescription_list->FormKeyCountName);
		$mas_user_template_prescription_list->StopRec = $mas_user_template_prescription_list->StartRec + $mas_user_template_prescription_list->KeyCount - 1;
	}
}
$mas_user_template_prescription_list->RecCnt = $mas_user_template_prescription_list->StartRec - 1;
if ($mas_user_template_prescription_list->Recordset && !$mas_user_template_prescription_list->Recordset->EOF) {
	$mas_user_template_prescription_list->Recordset->moveFirst();
	$selectLimit = $mas_user_template_prescription_list->UseSelectLimit;
	if (!$selectLimit && $mas_user_template_prescription_list->StartRec > 1)
		$mas_user_template_prescription_list->Recordset->move($mas_user_template_prescription_list->StartRec - 1);
} elseif (!$mas_user_template_prescription->AllowAddDeleteRow && $mas_user_template_prescription_list->StopRec == 0) {
	$mas_user_template_prescription_list->StopRec = $mas_user_template_prescription->GridAddRowCount;
}

// Initialize aggregate
$mas_user_template_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$mas_user_template_prescription->resetAttributes();
$mas_user_template_prescription_list->renderRow();
if ($mas_user_template_prescription->isGridAdd())
	$mas_user_template_prescription_list->RowIndex = 0;
if ($mas_user_template_prescription->isGridEdit())
	$mas_user_template_prescription_list->RowIndex = 0;
while ($mas_user_template_prescription_list->RecCnt < $mas_user_template_prescription_list->StopRec) {
	$mas_user_template_prescription_list->RecCnt++;
	if ($mas_user_template_prescription_list->RecCnt >= $mas_user_template_prescription_list->StartRec) {
		$mas_user_template_prescription_list->RowCnt++;
		if ($mas_user_template_prescription->isGridAdd() || $mas_user_template_prescription->isGridEdit() || $mas_user_template_prescription->isConfirm()) {
			$mas_user_template_prescription_list->RowIndex++;
			$CurrentForm->Index = $mas_user_template_prescription_list->RowIndex;
			if ($CurrentForm->hasValue($mas_user_template_prescription_list->FormActionName) && $mas_user_template_prescription_list->EventCancelled)
				$mas_user_template_prescription_list->RowAction = strval($CurrentForm->getValue($mas_user_template_prescription_list->FormActionName));
			elseif ($mas_user_template_prescription->isGridAdd())
				$mas_user_template_prescription_list->RowAction = "insert";
			else
				$mas_user_template_prescription_list->RowAction = "";
		}

		// Set up key count
		$mas_user_template_prescription_list->KeyCount = $mas_user_template_prescription_list->RowIndex;

		// Init row class and style
		$mas_user_template_prescription->resetAttributes();
		$mas_user_template_prescription->CssClass = "";
		if ($mas_user_template_prescription->isGridAdd()) {
			$mas_user_template_prescription_list->loadRowValues(); // Load default values
		} else {
			$mas_user_template_prescription_list->loadRowValues($mas_user_template_prescription_list->Recordset); // Load row values
		}
		$mas_user_template_prescription->RowType = ROWTYPE_VIEW; // Render view
		if ($mas_user_template_prescription->isGridAdd()) // Grid add
			$mas_user_template_prescription->RowType = ROWTYPE_ADD; // Render add
		if ($mas_user_template_prescription->isGridAdd() && $mas_user_template_prescription->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$mas_user_template_prescription_list->restoreCurrentRowFormValues($mas_user_template_prescription_list->RowIndex); // Restore form values
		if ($mas_user_template_prescription->isGridEdit()) { // Grid edit
			if ($mas_user_template_prescription->EventCancelled)
				$mas_user_template_prescription_list->restoreCurrentRowFormValues($mas_user_template_prescription_list->RowIndex); // Restore form values
			if ($mas_user_template_prescription_list->RowAction == "insert")
				$mas_user_template_prescription->RowType = ROWTYPE_ADD; // Render add
			else
				$mas_user_template_prescription->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($mas_user_template_prescription->isGridEdit() && ($mas_user_template_prescription->RowType == ROWTYPE_EDIT || $mas_user_template_prescription->RowType == ROWTYPE_ADD) && $mas_user_template_prescription->EventCancelled) // Update failed
			$mas_user_template_prescription_list->restoreCurrentRowFormValues($mas_user_template_prescription_list->RowIndex); // Restore form values
		if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) // Edit row
			$mas_user_template_prescription_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$mas_user_template_prescription->RowAttrs = array_merge($mas_user_template_prescription->RowAttrs, array('data-rowindex'=>$mas_user_template_prescription_list->RowCnt, 'id'=>'r' . $mas_user_template_prescription_list->RowCnt . '_mas_user_template_prescription', 'data-rowtype'=>$mas_user_template_prescription->RowType));

		// Render row
		$mas_user_template_prescription_list->renderRow();

		// Render list options
		$mas_user_template_prescription_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($mas_user_template_prescription_list->RowAction <> "delete" && $mas_user_template_prescription_list->RowAction <> "insertdelete" && !($mas_user_template_prescription_list->RowAction == "insert" && $mas_user_template_prescription->isConfirm() && $mas_user_template_prescription_list->emptyRow())) {
?>
	<tr<?php echo $mas_user_template_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_user_template_prescription_list->ListOptions->render("body", "left", $mas_user_template_prescription_list->RowCnt);
?>
	<?php if ($mas_user_template_prescription->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_user_template_prescription->id->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_id" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_user_template_prescription->id->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_id" class="form-group mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_user_template_prescription->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_id" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_user_template_prescription->id->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_id" class="mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription->id->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->TemplateName->Visible) { // TemplateName ?>
		<td data-name="TemplateName"<?php echo $mas_user_template_prescription->TemplateName->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_TemplateName" class="form-group mas_user_template_prescription_TemplateName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-value-separator="<?php echo $mas_user_template_prescription->TemplateName->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName"<?php echo $mas_user_template_prescription->TemplateName->editAttributes() ?>>
		<?php echo $mas_user_template_prescription->TemplateName->selectOptionListHtml("x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$mas_user_template_prescription->TemplateName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->TemplateName->caption() ?>" data-title="<?php echo $mas_user_template_prescription->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName',url:'mas_template_prescription_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_user_template_prescription->TemplateName->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_TemplateName") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TemplateName" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" value="<?php echo HtmlEncode($mas_user_template_prescription->TemplateName->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_TemplateName" class="form-group mas_user_template_prescription_TemplateName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-value-separator="<?php echo $mas_user_template_prescription->TemplateName->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName"<?php echo $mas_user_template_prescription->TemplateName->editAttributes() ?>>
		<?php echo $mas_user_template_prescription->TemplateName->selectOptionListHtml("x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$mas_user_template_prescription->TemplateName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->TemplateName->caption() ?>" data-title="<?php echo $mas_user_template_prescription->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName',url:'mas_template_prescription_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_user_template_prescription->TemplateName->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_TemplateName") ?>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName">
<span<?php echo $mas_user_template_prescription->TemplateName->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->TemplateName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine"<?php echo $mas_user_template_prescription->Medicine->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_Medicine" class="form-group mas_user_template_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($mas_user_template_prescription->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($mas_user_template_prescription->Medicine->ReadOnly || $mas_user_template_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$mas_user_template_prescription->Medicine->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->Medicine->caption() ?>" data-title="<?php echo $mas_user_template_prescription->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine',url:'pres_tradenames_newaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine","forceSelect":true});
</script>
<?php echo $mas_user_template_prescription->Medicine->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_Medicine" class="form-group mas_user_template_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($mas_user_template_prescription->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($mas_user_template_prescription->Medicine->ReadOnly || $mas_user_template_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$mas_user_template_prescription->Medicine->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->Medicine->caption() ?>" data-title="<?php echo $mas_user_template_prescription->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine',url:'pres_tradenames_newaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine","forceSelect":true});
</script>
<?php echo $mas_user_template_prescription->Medicine->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_Medicine") ?>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine">
<span<?php echo $mas_user_template_prescription->Medicine->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->Medicine->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->M->Visible) { // M ?>
		<td data-name="M"<?php echo $mas_user_template_prescription->M->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_M" class="form-group mas_user_template_prescription_M">
<input type="text" data-table="mas_user_template_prescription" data-field="x_M" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->M->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->M->EditValue ?>"<?php echo $mas_user_template_prescription->M->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_M" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" value="<?php echo HtmlEncode($mas_user_template_prescription->M->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_M" class="form-group mas_user_template_prescription_M">
<input type="text" data-table="mas_user_template_prescription" data-field="x_M" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->M->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->M->EditValue ?>"<?php echo $mas_user_template_prescription->M->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_M" class="mas_user_template_prescription_M">
<span<?php echo $mas_user_template_prescription->M->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->M->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->A->Visible) { // A ?>
		<td data-name="A"<?php echo $mas_user_template_prescription->A->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_A" class="form-group mas_user_template_prescription_A">
<input type="text" data-table="mas_user_template_prescription" data-field="x_A" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->A->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->A->EditValue ?>"<?php echo $mas_user_template_prescription->A->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_A" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" value="<?php echo HtmlEncode($mas_user_template_prescription->A->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_A" class="form-group mas_user_template_prescription_A">
<input type="text" data-table="mas_user_template_prescription" data-field="x_A" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->A->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->A->EditValue ?>"<?php echo $mas_user_template_prescription->A->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_A" class="mas_user_template_prescription_A">
<span<?php echo $mas_user_template_prescription->A->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->A->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->N->Visible) { // N ?>
		<td data-name="N"<?php echo $mas_user_template_prescription->N->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_N" class="form-group mas_user_template_prescription_N">
<input type="text" data-table="mas_user_template_prescription" data-field="x_N" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->N->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->N->EditValue ?>"<?php echo $mas_user_template_prescription->N->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_N" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" value="<?php echo HtmlEncode($mas_user_template_prescription->N->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_N" class="form-group mas_user_template_prescription_N">
<input type="text" data-table="mas_user_template_prescription" data-field="x_N" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->N->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->N->EditValue ?>"<?php echo $mas_user_template_prescription->N->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_N" class="mas_user_template_prescription_N">
<span<?php echo $mas_user_template_prescription->N->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->N->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays"<?php echo $mas_user_template_prescription->NoOfDays->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_NoOfDays" class="form-group mas_user_template_prescription_NoOfDays">
<input type="text" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->NoOfDays->EditValue ?>"<?php echo $mas_user_template_prescription->NoOfDays->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($mas_user_template_prescription->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_NoOfDays" class="form-group mas_user_template_prescription_NoOfDays">
<input type="text" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->NoOfDays->EditValue ?>"<?php echo $mas_user_template_prescription->NoOfDays->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays">
<span<?php echo $mas_user_template_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->NoOfDays->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute"<?php echo $mas_user_template_prescription->PreRoute->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_PreRoute" class="form-group mas_user_template_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($mas_user_template_prescription->PreRoute->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->PreRoute->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription->PreRoute->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($mas_user_template_prescription->PreRoute->ReadOnly || $mas_user_template_prescription->PreRoute->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$mas_user_template_prescription->PreRoute->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->PreRoute->caption() ?>" data-title="<?php echo $mas_user_template_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute","forceSelect":false});
</script>
<?php echo $mas_user_template_prescription->PreRoute->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_PreRoute" class="form-group mas_user_template_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($mas_user_template_prescription->PreRoute->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->PreRoute->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription->PreRoute->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($mas_user_template_prescription->PreRoute->ReadOnly || $mas_user_template_prescription->PreRoute->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$mas_user_template_prescription->PreRoute->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->PreRoute->caption() ?>" data-title="<?php echo $mas_user_template_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute","forceSelect":false});
</script>
<?php echo $mas_user_template_prescription->PreRoute->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_PreRoute") ?>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute">
<span<?php echo $mas_user_template_prescription->PreRoute->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->PreRoute->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking"<?php echo $mas_user_template_prescription->TimeOfTaking->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_TimeOfTaking" class="form-group mas_user_template_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($mas_user_template_prescription->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$mas_user_template_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $mas_user_template_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false});
</script>
<?php echo $mas_user_template_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_TimeOfTaking" class="form-group mas_user_template_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($mas_user_template_prescription->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$mas_user_template_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $mas_user_template_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false});
</script>
<?php echo $mas_user_template_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking">
<span<?php echo $mas_user_template_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $mas_user_template_prescription->CreatedBy->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreatedBy" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreatedBy" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($mas_user_template_prescription->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy">
<span<?php echo $mas_user_template_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->CreatedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime"<?php echo $mas_user_template_prescription->CreateDateTime->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreateDateTime" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreateDateTime" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($mas_user_template_prescription->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime">
<span<?php echo $mas_user_template_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->CreateDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $mas_user_template_prescription->ModifiedBy->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedBy" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedBy" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($mas_user_template_prescription->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy">
<span<?php echo $mas_user_template_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->ModifiedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime"<?php echo $mas_user_template_prescription->ModifiedDateTime->cellAttributes() ?>>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($mas_user_template_prescription->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_user_template_prescription_list->RowCnt ?>_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime">
<span<?php echo $mas_user_template_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_user_template_prescription_list->ListOptions->render("body", "right", $mas_user_template_prescription_list->RowCnt);
?>
	</tr>
<?php if ($mas_user_template_prescription->RowType == ROWTYPE_ADD || $mas_user_template_prescription->RowType == ROWTYPE_EDIT) { ?>
<script>
fmas_user_template_prescriptionlist.updateLists(<?php echo $mas_user_template_prescription_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$mas_user_template_prescription->isGridAdd())
		if (!$mas_user_template_prescription_list->Recordset->EOF)
			$mas_user_template_prescription_list->Recordset->moveNext();
}
?>
<?php
	if ($mas_user_template_prescription->isGridAdd() || $mas_user_template_prescription->isGridEdit()) {
		$mas_user_template_prescription_list->RowIndex = '$rowindex$';
		$mas_user_template_prescription_list->loadRowValues();

		// Set row properties
		$mas_user_template_prescription->resetAttributes();
		$mas_user_template_prescription->RowAttrs = array_merge($mas_user_template_prescription->RowAttrs, array('data-rowindex'=>$mas_user_template_prescription_list->RowIndex, 'id'=>'r0_mas_user_template_prescription', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($mas_user_template_prescription->RowAttrs["class"], "ew-template");
		$mas_user_template_prescription->RowType = ROWTYPE_ADD;

		// Render row
		$mas_user_template_prescription_list->renderRow();

		// Render list options
		$mas_user_template_prescription_list->renderListOptions();
		$mas_user_template_prescription_list->StartRowCnt = 0;
?>
	<tr<?php echo $mas_user_template_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_user_template_prescription_list->ListOptions->render("body", "left", $mas_user_template_prescription_list->RowIndex);
?>
	<?php if ($mas_user_template_prescription->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_id" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_user_template_prescription->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->TemplateName->Visible) { // TemplateName ?>
		<td data-name="TemplateName">
<span id="el$rowindex$_mas_user_template_prescription_TemplateName" class="form-group mas_user_template_prescription_TemplateName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-value-separator="<?php echo $mas_user_template_prescription->TemplateName->displayValueSeparatorAttribute() ?>" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName"<?php echo $mas_user_template_prescription->TemplateName->editAttributes() ?>>
		<?php echo $mas_user_template_prescription->TemplateName->selectOptionListHtml("x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$mas_user_template_prescription->TemplateName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->TemplateName->caption() ?>" data-title="<?php echo $mas_user_template_prescription->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName',url:'mas_template_prescription_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_user_template_prescription->TemplateName->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_TemplateName") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TemplateName" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TemplateName" value="<?php echo HtmlEncode($mas_user_template_prescription->TemplateName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine">
<span id="el$rowindex$_mas_user_template_prescription_Medicine" class="form-group mas_user_template_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($mas_user_template_prescription->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo (($mas_user_template_prescription->Medicine->ReadOnly || $mas_user_template_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$mas_user_template_prescription->Medicine->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->Medicine->caption() ?>" data-title="<?php echo $mas_user_template_prescription->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine',url:'pres_tradenames_newaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine","forceSelect":true});
</script>
<?php echo $mas_user_template_prescription->Medicine->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription->Medicine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->M->Visible) { // M ?>
		<td data-name="M">
<span id="el$rowindex$_mas_user_template_prescription_M" class="form-group mas_user_template_prescription_M">
<input type="text" data-table="mas_user_template_prescription" data-field="x_M" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->M->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->M->EditValue ?>"<?php echo $mas_user_template_prescription->M->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_M" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_M" value="<?php echo HtmlEncode($mas_user_template_prescription->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->A->Visible) { // A ?>
		<td data-name="A">
<span id="el$rowindex$_mas_user_template_prescription_A" class="form-group mas_user_template_prescription_A">
<input type="text" data-table="mas_user_template_prescription" data-field="x_A" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->A->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->A->EditValue ?>"<?php echo $mas_user_template_prescription->A->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_A" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_A" value="<?php echo HtmlEncode($mas_user_template_prescription->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->N->Visible) { // N ?>
		<td data-name="N">
<span id="el$rowindex$_mas_user_template_prescription_N" class="form-group mas_user_template_prescription_N">
<input type="text" data-table="mas_user_template_prescription" data-field="x_N" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->N->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->N->EditValue ?>"<?php echo $mas_user_template_prescription->N->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_N" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_N" value="<?php echo HtmlEncode($mas_user_template_prescription->N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays">
<span id="el$rowindex$_mas_user_template_prescription_NoOfDays" class="form-group mas_user_template_prescription_NoOfDays">
<input type="text" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription->NoOfDays->EditValue ?>"<?php echo $mas_user_template_prescription->NoOfDays->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($mas_user_template_prescription->NoOfDays->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute">
<span id="el$rowindex$_mas_user_template_prescription_PreRoute" class="form-group mas_user_template_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($mas_user_template_prescription->PreRoute->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->PreRoute->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription->PreRoute->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($mas_user_template_prescription->PreRoute->ReadOnly || $mas_user_template_prescription->PreRoute->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$mas_user_template_prescription->PreRoute->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->PreRoute->caption() ?>" data-title="<?php echo $mas_user_template_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute","forceSelect":false});
</script>
<?php echo $mas_user_template_prescription->PreRoute->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription->PreRoute->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking">
<span id="el$rowindex$_mas_user_template_prescription_TimeOfTaking" class="form-group mas_user_template_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$mas_user_template_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$mas_user_template_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" class="text-nowrap" style="z-index: <?php echo (9000 - $mas_user_template_prescription_list->RowCnt * 10) ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($mas_user_template_prescription->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$mas_user_template_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $mas_user_template_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fmas_user_template_prescriptionlist.createAutoSuggest({"id":"x<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false});
</script>
<?php echo $mas_user_template_prescription->TimeOfTaking->Lookup->getParamTag("p_x" . $mas_user_template_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription->TimeOfTaking->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreatedBy" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreatedBy" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($mas_user_template_prescription->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_CreateDateTime" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreateDateTime" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($mas_user_template_prescription->CreateDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedBy" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedBy" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($mas_user_template_prescription->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_user_template_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $mas_user_template_prescription_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($mas_user_template_prescription->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_user_template_prescription_list->ListOptions->render("body", "right", $mas_user_template_prescription_list->RowIndex);
?>
<script>
fmas_user_template_prescriptionlist.updateLists(<?php echo $mas_user_template_prescription_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($mas_user_template_prescription->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $mas_user_template_prescription_list->FormKeyCountName ?>" id="<?php echo $mas_user_template_prescription_list->FormKeyCountName ?>" value="<?php echo $mas_user_template_prescription_list->KeyCount ?>">
<?php echo $mas_user_template_prescription_list->MultiSelectKey ?>
<?php } ?>
<?php if ($mas_user_template_prescription->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $mas_user_template_prescription_list->FormKeyCountName ?>" id="<?php echo $mas_user_template_prescription_list->FormKeyCountName ?>" value="<?php echo $mas_user_template_prescription_list->KeyCount ?>">
<?php echo $mas_user_template_prescription_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$mas_user_template_prescription->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_user_template_prescription_list->Recordset)
	$mas_user_template_prescription_list->Recordset->Close();
?>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_user_template_prescription->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_user_template_prescription_list->Pager)) $mas_user_template_prescription_list->Pager = new NumericPager($mas_user_template_prescription_list->StartRec, $mas_user_template_prescription_list->DisplayRecs, $mas_user_template_prescription_list->TotalRecs, $mas_user_template_prescription_list->RecRange, $mas_user_template_prescription_list->AutoHidePager) ?>
<?php if ($mas_user_template_prescription_list->Pager->RecordCount > 0 && $mas_user_template_prescription_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_user_template_prescription_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_prescription_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_user_template_prescription_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_user_template_prescription_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_prescription_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_prescription_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_prescription_list->pageUrl() ?>start=<?php echo $mas_user_template_prescription_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_user_template_prescription_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_user_template_prescription_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_user_template_prescription_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_user_template_prescription_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_user_template_prescription_list->TotalRecs > 0 && (!$mas_user_template_prescription_list->AutoHidePageSizeSelector || $mas_user_template_prescription_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_user_template_prescription">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_user_template_prescription_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_user_template_prescription_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_user_template_prescription_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_user_template_prescription_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_user_template_prescription_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_user_template_prescription_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_user_template_prescription->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_user_template_prescription_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_user_template_prescription_list->TotalRecs == 0 && !$mas_user_template_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_user_template_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_user_template_prescription_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_user_template_prescription", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_user_template_prescription_list->terminate();
?>