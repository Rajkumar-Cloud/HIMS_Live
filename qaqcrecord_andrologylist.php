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
$qaqcrecord_andrology_list = new qaqcrecord_andrology_list();

// Run the page
$qaqcrecord_andrology_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$qaqcrecord_andrology_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fqaqcrecord_andrologylist = currentForm = new ew.Form("fqaqcrecord_andrologylist", "list");
fqaqcrecord_andrologylist.formKeyCountName = '<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>';

// Validate form
fqaqcrecord_andrologylist.validate = function() {
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
		<?php if ($qaqcrecord_andrology_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->id->caption(), $qaqcrecord_andrology->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Date->caption(), $qaqcrecord_andrology->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Date->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_list->LN2_Level->Required) { ?>
			elm = this.getElements("x" + infix + "_LN2_Level");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LN2_Level->caption(), $qaqcrecord_andrology->LN2_Level->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LN2_Level");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->LN2_Level->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_list->LN2_Checked->Required) { ?>
			elm = this.getElements("x" + infix + "_LN2_Checked[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LN2_Checked->caption(), $qaqcrecord_andrology->LN2_Checked->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->Incubator_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Incubator_Temp->caption(), $qaqcrecord_andrology->Incubator_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Incubator_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Incubator_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_list->Incubator_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Incubator_Cleaned->caption(), $qaqcrecord_andrology->Incubator_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->LAF_MG->Required) { ?>
			elm = this.getElements("x" + infix + "_LAF_MG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LAF_MG->caption(), $qaqcrecord_andrology->LAF_MG->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LAF_MG");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->LAF_MG->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_list->LAF_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_LAF_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LAF_Cleaned->caption(), $qaqcrecord_andrology->LAF_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->REF_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_REF_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->REF_Temp->caption(), $qaqcrecord_andrology->REF_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_REF_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->REF_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_list->REF_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_REF_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->REF_Cleaned->caption(), $qaqcrecord_andrology->REF_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->Heating_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Heating_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Heating_Temp->caption(), $qaqcrecord_andrology->Heating_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Heating_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Heating_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_list->Heating_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_Heating_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Heating_Cleaned->caption(), $qaqcrecord_andrology->Heating_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->Createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_Createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Createdby->caption(), $qaqcrecord_andrology->Createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_list->CreatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->CreatedDate->caption(), $qaqcrecord_andrology->CreatedDate->RequiredErrorMessage)) ?>");
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
fqaqcrecord_andrologylist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Date", false)) return false;
	if (ew.valueChanged(fobj, infix, "LN2_Level", false)) return false;
	if (ew.valueChanged(fobj, infix, "LN2_Checked[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Incubator_Temp", false)) return false;
	if (ew.valueChanged(fobj, infix, "Incubator_Cleaned[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "LAF_MG", false)) return false;
	if (ew.valueChanged(fobj, infix, "LAF_Cleaned[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "REF_Temp", false)) return false;
	if (ew.valueChanged(fobj, infix, "REF_Cleaned[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Heating_Temp", false)) return false;
	if (ew.valueChanged(fobj, infix, "Heating_Cleaned[]", false)) return false;
	return true;
}

// Form_CustomValidate event
fqaqcrecord_andrologylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_andrologylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fqaqcrecord_andrologylist.lists["x_LN2_Checked[]"] = <?php echo $qaqcrecord_andrology_list->LN2_Checked->Lookup->toClientList() ?>;
fqaqcrecord_andrologylist.lists["x_LN2_Checked[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_list->LN2_Checked->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologylist.lists["x_Incubator_Cleaned[]"] = <?php echo $qaqcrecord_andrology_list->Incubator_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologylist.lists["x_Incubator_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_list->Incubator_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologylist.lists["x_LAF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_list->LAF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologylist.lists["x_LAF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_list->LAF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologylist.lists["x_REF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_list->REF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologylist.lists["x_REF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_list->REF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologylist.lists["x_Heating_Cleaned[]"] = <?php echo $qaqcrecord_andrology_list->Heating_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologylist.lists["x_Heating_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_list->Heating_Cleaned->options(FALSE, TRUE)) ?>;

// Form object for search
var fqaqcrecord_andrologylistsrch = currentSearchForm = new ew.Form("fqaqcrecord_andrologylistsrch");

// Validate function for search
fqaqcrecord_andrologylistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Date");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fqaqcrecord_andrologylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_andrologylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fqaqcrecord_andrologylistsrch.filterList = <?php echo $qaqcrecord_andrology_list->getFilterList() ?>;
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
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($qaqcrecord_andrology_list->TotalRecs > 0 && $qaqcrecord_andrology_list->ExportOptions->visible()) { ?>
<?php $qaqcrecord_andrology_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->ImportOptions->visible()) { ?>
<?php $qaqcrecord_andrology_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->SearchOptions->visible()) { ?>
<?php $qaqcrecord_andrology_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->FilterOptions->visible()) { ?>
<?php $qaqcrecord_andrology_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$qaqcrecord_andrology_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$qaqcrecord_andrology->isExport() && !$qaqcrecord_andrology->CurrentAction) { ?>
<form name="fqaqcrecord_andrologylistsrch" id="fqaqcrecord_andrologylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($qaqcrecord_andrology_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fqaqcrecord_andrologylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="qaqcrecord_andrology">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$qaqcrecord_andrology_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$qaqcrecord_andrology->RowType = ROWTYPE_SEARCH;

// Render row
$qaqcrecord_andrology->resetAttributes();
$qaqcrecord_andrology_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $qaqcrecord_andrology->Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Date" id="z_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="BETWEEN"<?php echo ($qaqcrecord_andrology->Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologylistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Date style="d-none"">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="y_Date" id="y_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue2 ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologylistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($qaqcrecord_andrology_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($qaqcrecord_andrology_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $qaqcrecord_andrology_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($qaqcrecord_andrology_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($qaqcrecord_andrology_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($qaqcrecord_andrology_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($qaqcrecord_andrology_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $qaqcrecord_andrology_list->showPageHeader(); ?>
<?php
$qaqcrecord_andrology_list->showMessage();
?>
<?php if ($qaqcrecord_andrology_list->TotalRecs > 0 || $qaqcrecord_andrology->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($qaqcrecord_andrology_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> qaqcrecord_andrology">
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$qaqcrecord_andrology->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($qaqcrecord_andrology_list->Pager)) $qaqcrecord_andrology_list->Pager = new NumericPager($qaqcrecord_andrology_list->StartRec, $qaqcrecord_andrology_list->DisplayRecs, $qaqcrecord_andrology_list->TotalRecs, $qaqcrecord_andrology_list->RecRange, $qaqcrecord_andrology_list->AutoHidePager) ?>
<?php if ($qaqcrecord_andrology_list->Pager->RecordCount > 0 && $qaqcrecord_andrology_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($qaqcrecord_andrology_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($qaqcrecord_andrology_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($qaqcrecord_andrology_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $qaqcrecord_andrology_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($qaqcrecord_andrology_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($qaqcrecord_andrology_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $qaqcrecord_andrology_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $qaqcrecord_andrology_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $qaqcrecord_andrology_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->TotalRecs > 0 && (!$qaqcrecord_andrology_list->AutoHidePageSizeSelector || $qaqcrecord_andrology_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="qaqcrecord_andrology">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($qaqcrecord_andrology->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $qaqcrecord_andrology_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fqaqcrecord_andrologylist" id="fqaqcrecord_andrologylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($qaqcrecord_andrology_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $qaqcrecord_andrology_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<div id="gmp_qaqcrecord_andrology" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($qaqcrecord_andrology_list->TotalRecs > 0 || $qaqcrecord_andrology->isAdd() || $qaqcrecord_andrology->isCopy() || $qaqcrecord_andrology->isGridEdit()) { ?>
<table id="tbl_qaqcrecord_andrologylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$qaqcrecord_andrology_list->RowType = ROWTYPE_HEADER;

// Render list options
$qaqcrecord_andrology_list->renderListOptions();

// Render list options (header, left)
$qaqcrecord_andrology_list->ListOptions->render("header", "left");
?>
<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->id) == "") { ?>
		<th data-name="id" class="<?php echo $qaqcrecord_andrology->id->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $qaqcrecord_andrology->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->id) ?>',1);"><div id="elh_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $qaqcrecord_andrology->Date->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $qaqcrecord_andrology->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->Date) ?>',1);"><div id="elh_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->LN2_Level) == "") { ?>
		<th data-name="LN2_Level" class="<?php echo $qaqcrecord_andrology->LN2_Level->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LN2_Level->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LN2_Level" class="<?php echo $qaqcrecord_andrology->LN2_Level->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->LN2_Level) ?>',1);"><div id="elh_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LN2_Level->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->LN2_Level->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->LN2_Level->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->LN2_Checked) == "") { ?>
		<th data-name="LN2_Checked" class="<?php echo $qaqcrecord_andrology->LN2_Checked->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LN2_Checked->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LN2_Checked" class="<?php echo $qaqcrecord_andrology->LN2_Checked->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->LN2_Checked) ?>',1);"><div id="elh_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LN2_Checked->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->LN2_Checked->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->LN2_Checked->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->Incubator_Temp) == "") { ?>
		<th data-name="Incubator_Temp" class="<?php echo $qaqcrecord_andrology->Incubator_Temp->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Incubator_Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator_Temp" class="<?php echo $qaqcrecord_andrology->Incubator_Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->Incubator_Temp) ?>',1);"><div id="elh_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Incubator_Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->Incubator_Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->Incubator_Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->Incubator_Cleaned) == "") { ?>
		<th data-name="Incubator_Cleaned" class="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Incubator_Cleaned->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator_Cleaned" class="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->Incubator_Cleaned) ?>',1);"><div id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Incubator_Cleaned->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->Incubator_Cleaned->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->Incubator_Cleaned->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->LAF_MG) == "") { ?>
		<th data-name="LAF_MG" class="<?php echo $qaqcrecord_andrology->LAF_MG->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LAF_MG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LAF_MG" class="<?php echo $qaqcrecord_andrology->LAF_MG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->LAF_MG) ?>',1);"><div id="elh_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LAF_MG->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->LAF_MG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->LAF_MG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->LAF_Cleaned) == "") { ?>
		<th data-name="LAF_Cleaned" class="<?php echo $qaqcrecord_andrology->LAF_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LAF_Cleaned->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LAF_Cleaned" class="<?php echo $qaqcrecord_andrology->LAF_Cleaned->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->LAF_Cleaned) ?>',1);"><div id="elh_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->LAF_Cleaned->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->LAF_Cleaned->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->LAF_Cleaned->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->REF_Temp) == "") { ?>
		<th data-name="REF_Temp" class="<?php echo $qaqcrecord_andrology->REF_Temp->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->REF_Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REF_Temp" class="<?php echo $qaqcrecord_andrology->REF_Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->REF_Temp) ?>',1);"><div id="elh_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->REF_Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->REF_Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->REF_Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->REF_Cleaned) == "") { ?>
		<th data-name="REF_Cleaned" class="<?php echo $qaqcrecord_andrology->REF_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->REF_Cleaned->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REF_Cleaned" class="<?php echo $qaqcrecord_andrology->REF_Cleaned->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->REF_Cleaned) ?>',1);"><div id="elh_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->REF_Cleaned->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->REF_Cleaned->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->REF_Cleaned->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->Heating_Temp) == "") { ?>
		<th data-name="Heating_Temp" class="<?php echo $qaqcrecord_andrology->Heating_Temp->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Heating_Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Heating_Temp" class="<?php echo $qaqcrecord_andrology->Heating_Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->Heating_Temp) ?>',1);"><div id="elh_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Heating_Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->Heating_Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->Heating_Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->Heating_Cleaned) == "") { ?>
		<th data-name="Heating_Cleaned" class="<?php echo $qaqcrecord_andrology->Heating_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Heating_Cleaned->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Heating_Cleaned" class="<?php echo $qaqcrecord_andrology->Heating_Cleaned->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->Heating_Cleaned) ?>',1);"><div id="elh_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Heating_Cleaned->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->Heating_Cleaned->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->Heating_Cleaned->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->Createdby) == "") { ?>
		<th data-name="Createdby" class="<?php echo $qaqcrecord_andrology->Createdby->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Createdby" class="<?php echo $qaqcrecord_andrology->Createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->Createdby) ?>',1);"><div id="elh_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->Createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->Createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->Createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
	<?php if ($qaqcrecord_andrology->sortUrl($qaqcrecord_andrology->CreatedDate) == "") { ?>
		<th data-name="CreatedDate" class="<?php echo $qaqcrecord_andrology->CreatedDate->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate"><div class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->CreatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDate" class="<?php echo $qaqcrecord_andrology->CreatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $qaqcrecord_andrology->SortUrl($qaqcrecord_andrology->CreatedDate) ?>',1);"><div id="elh_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $qaqcrecord_andrology->CreatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($qaqcrecord_andrology->CreatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($qaqcrecord_andrology->CreatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$qaqcrecord_andrology_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($qaqcrecord_andrology->isAdd() || $qaqcrecord_andrology->isCopy()) {
		$qaqcrecord_andrology_list->RowIndex = 0;
		$qaqcrecord_andrology_list->KeyCount = $qaqcrecord_andrology_list->RowIndex;
		if ($qaqcrecord_andrology->isCopy() && !$qaqcrecord_andrology_list->loadRow())
			$qaqcrecord_andrology->CurrentAction = "add";
		if ($qaqcrecord_andrology->isAdd())
			$qaqcrecord_andrology_list->loadRowValues();
		if ($qaqcrecord_andrology->EventCancelled) // Insert failed
			$qaqcrecord_andrology_list->restoreFormValues(); // Restore form values

		// Set row properties
		$qaqcrecord_andrology->resetAttributes();
		$qaqcrecord_andrology->RowAttrs = array_merge($qaqcrecord_andrology->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_qaqcrecord_andrology', 'data-rowtype'=>ROWTYPE_ADD));
		$qaqcrecord_andrology->RowType = ROWTYPE_ADD;

		// Render row
		$qaqcrecord_andrology_list->renderRow();

		// Render list options
		$qaqcrecord_andrology_list->renderListOptions();
		$qaqcrecord_andrology_list->StartRowCnt = 0;
?>
	<tr<?php echo $qaqcrecord_andrology->rowAttributes() ?>>
<?php

// Render list options (body, left)
$qaqcrecord_andrology_list->ListOptions->render("body", "left", $qaqcrecord_andrology_list->RowCnt);
?>
	<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" value="<?php echo HtmlEncode($qaqcrecord_andrology->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
		<td data-name="Date">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Date" class="form-group qaqcrecord_andrology_Date">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Date" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" value="<?php echo HtmlEncode($qaqcrecord_andrology->Date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
		<td data-name="LN2_Level">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Level" class="form-group qaqcrecord_andrology_LN2_Level">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LN2_Level->EditValue ?>"<?php echo $qaqcrecord_andrology->LN2_Level->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" value="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
		<td data-name="LN2_Checked">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Checked" class="form-group qaqcrecord_andrology_LN2_Checked">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-value-separator="<?php echo $qaqcrecord_andrology->LN2_Checked->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="{value}"<?php echo $qaqcrecord_andrology->LN2_Checked->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LN2_Checked->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LN2_Checked[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Checked->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
		<td data-name="Incubator_Temp">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Temp" class="form-group qaqcrecord_andrology_Incubator_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Incubator_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Incubator_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
		<td data-name="Incubator_Cleaned">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Cleaned" class="form-group qaqcrecord_andrology_Incubator_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Incubator_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
		<td data-name="LAF_MG">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_MG" class="form-group qaqcrecord_andrology_LAF_MG">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LAF_MG->EditValue ?>"<?php echo $qaqcrecord_andrology->LAF_MG->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" value="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
		<td data-name="LAF_Cleaned">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_Cleaned" class="form-group qaqcrecord_andrology_LAF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->LAF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->LAF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LAF_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
		<td data-name="REF_Temp">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Temp" class="form-group qaqcrecord_andrology_REF_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->REF_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->REF_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
		<td data-name="REF_Cleaned">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Cleaned" class="form-group qaqcrecord_andrology_REF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->REF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->REF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->REF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_REF_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
		<td data-name="Heating_Temp">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Temp" class="form-group qaqcrecord_andrology_Heating_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Heating_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Heating_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
		<td data-name="Heating_Cleaned">
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Cleaned" class="form-group qaqcrecord_andrology_Heating_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Heating_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Heating_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Heating_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
		<td data-name="Createdby">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Createdby" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Createdby" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Createdby" value="<?php echo HtmlEncode($qaqcrecord_andrology->Createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_CreatedDate" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_CreatedDate" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_CreatedDate" value="<?php echo HtmlEncode($qaqcrecord_andrology->CreatedDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$qaqcrecord_andrology_list->ListOptions->render("body", "right", $qaqcrecord_andrology_list->RowCnt);
?>
<script>
fqaqcrecord_andrologylist.updateLists(<?php echo $qaqcrecord_andrology_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($qaqcrecord_andrology->ExportAll && $qaqcrecord_andrology->isExport()) {
	$qaqcrecord_andrology_list->StopRec = $qaqcrecord_andrology_list->TotalRecs;
} else {

	// Set the last record to display
	if ($qaqcrecord_andrology_list->TotalRecs > $qaqcrecord_andrology_list->StartRec + $qaqcrecord_andrology_list->DisplayRecs - 1)
		$qaqcrecord_andrology_list->StopRec = $qaqcrecord_andrology_list->StartRec + $qaqcrecord_andrology_list->DisplayRecs - 1;
	else
		$qaqcrecord_andrology_list->StopRec = $qaqcrecord_andrology_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $qaqcrecord_andrology_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($qaqcrecord_andrology_list->FormKeyCountName) && ($qaqcrecord_andrology->isGridAdd() || $qaqcrecord_andrology->isGridEdit() || $qaqcrecord_andrology->isConfirm())) {
		$qaqcrecord_andrology_list->KeyCount = $CurrentForm->getValue($qaqcrecord_andrology_list->FormKeyCountName);
		$qaqcrecord_andrology_list->StopRec = $qaqcrecord_andrology_list->StartRec + $qaqcrecord_andrology_list->KeyCount - 1;
	}
}
$qaqcrecord_andrology_list->RecCnt = $qaqcrecord_andrology_list->StartRec - 1;
if ($qaqcrecord_andrology_list->Recordset && !$qaqcrecord_andrology_list->Recordset->EOF) {
	$qaqcrecord_andrology_list->Recordset->moveFirst();
	$selectLimit = $qaqcrecord_andrology_list->UseSelectLimit;
	if (!$selectLimit && $qaqcrecord_andrology_list->StartRec > 1)
		$qaqcrecord_andrology_list->Recordset->move($qaqcrecord_andrology_list->StartRec - 1);
} elseif (!$qaqcrecord_andrology->AllowAddDeleteRow && $qaqcrecord_andrology_list->StopRec == 0) {
	$qaqcrecord_andrology_list->StopRec = $qaqcrecord_andrology->GridAddRowCount;
}

// Initialize aggregate
$qaqcrecord_andrology->RowType = ROWTYPE_AGGREGATEINIT;
$qaqcrecord_andrology->resetAttributes();
$qaqcrecord_andrology_list->renderRow();
$qaqcrecord_andrology_list->EditRowCnt = 0;
if ($qaqcrecord_andrology->isEdit())
	$qaqcrecord_andrology_list->RowIndex = 1;
if ($qaqcrecord_andrology->isGridAdd())
	$qaqcrecord_andrology_list->RowIndex = 0;
if ($qaqcrecord_andrology->isGridEdit())
	$qaqcrecord_andrology_list->RowIndex = 0;
while ($qaqcrecord_andrology_list->RecCnt < $qaqcrecord_andrology_list->StopRec) {
	$qaqcrecord_andrology_list->RecCnt++;
	if ($qaqcrecord_andrology_list->RecCnt >= $qaqcrecord_andrology_list->StartRec) {
		$qaqcrecord_andrology_list->RowCnt++;
		if ($qaqcrecord_andrology->isGridAdd() || $qaqcrecord_andrology->isGridEdit() || $qaqcrecord_andrology->isConfirm()) {
			$qaqcrecord_andrology_list->RowIndex++;
			$CurrentForm->Index = $qaqcrecord_andrology_list->RowIndex;
			if ($CurrentForm->hasValue($qaqcrecord_andrology_list->FormActionName) && $qaqcrecord_andrology_list->EventCancelled)
				$qaqcrecord_andrology_list->RowAction = strval($CurrentForm->getValue($qaqcrecord_andrology_list->FormActionName));
			elseif ($qaqcrecord_andrology->isGridAdd())
				$qaqcrecord_andrology_list->RowAction = "insert";
			else
				$qaqcrecord_andrology_list->RowAction = "";
		}

		// Set up key count
		$qaqcrecord_andrology_list->KeyCount = $qaqcrecord_andrology_list->RowIndex;

		// Init row class and style
		$qaqcrecord_andrology->resetAttributes();
		$qaqcrecord_andrology->CssClass = "";
		if ($qaqcrecord_andrology->isGridAdd()) {
			$qaqcrecord_andrology_list->loadRowValues(); // Load default values
		} else {
			$qaqcrecord_andrology_list->loadRowValues($qaqcrecord_andrology_list->Recordset); // Load row values
		}
		$qaqcrecord_andrology->RowType = ROWTYPE_VIEW; // Render view
		if ($qaqcrecord_andrology->isGridAdd()) // Grid add
			$qaqcrecord_andrology->RowType = ROWTYPE_ADD; // Render add
		if ($qaqcrecord_andrology->isGridAdd() && $qaqcrecord_andrology->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$qaqcrecord_andrology_list->restoreCurrentRowFormValues($qaqcrecord_andrology_list->RowIndex); // Restore form values
		if ($qaqcrecord_andrology->isEdit()) {
			if ($qaqcrecord_andrology_list->checkInlineEditKey() && $qaqcrecord_andrology_list->EditRowCnt == 0) { // Inline edit
				$qaqcrecord_andrology->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($qaqcrecord_andrology->isGridEdit()) { // Grid edit
			if ($qaqcrecord_andrology->EventCancelled)
				$qaqcrecord_andrology_list->restoreCurrentRowFormValues($qaqcrecord_andrology_list->RowIndex); // Restore form values
			if ($qaqcrecord_andrology_list->RowAction == "insert")
				$qaqcrecord_andrology->RowType = ROWTYPE_ADD; // Render add
			else
				$qaqcrecord_andrology->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($qaqcrecord_andrology->isEdit() && $qaqcrecord_andrology->RowType == ROWTYPE_EDIT && $qaqcrecord_andrology->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$qaqcrecord_andrology_list->restoreFormValues(); // Restore form values
		}
		if ($qaqcrecord_andrology->isGridEdit() && ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT || $qaqcrecord_andrology->RowType == ROWTYPE_ADD) && $qaqcrecord_andrology->EventCancelled) // Update failed
			$qaqcrecord_andrology_list->restoreCurrentRowFormValues($qaqcrecord_andrology_list->RowIndex); // Restore form values
		if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) // Edit row
			$qaqcrecord_andrology_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$qaqcrecord_andrology->RowAttrs = array_merge($qaqcrecord_andrology->RowAttrs, array('data-rowindex'=>$qaqcrecord_andrology_list->RowCnt, 'id'=>'r' . $qaqcrecord_andrology_list->RowCnt . '_qaqcrecord_andrology', 'data-rowtype'=>$qaqcrecord_andrology->RowType));

		// Render row
		$qaqcrecord_andrology_list->renderRow();

		// Render list options
		$qaqcrecord_andrology_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($qaqcrecord_andrology_list->RowAction <> "delete" && $qaqcrecord_andrology_list->RowAction <> "insertdelete" && !($qaqcrecord_andrology_list->RowAction == "insert" && $qaqcrecord_andrology->isConfirm() && $qaqcrecord_andrology_list->emptyRow())) {
?>
	<tr<?php echo $qaqcrecord_andrology->rowAttributes() ?>>
<?php

// Render list options (body, left)
$qaqcrecord_andrology_list->ListOptions->render("body", "left", $qaqcrecord_andrology_list->RowCnt);
?>
	<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
		<td data-name="id"<?php echo $qaqcrecord_andrology->id->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" value="<?php echo HtmlEncode($qaqcrecord_andrology->id->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_id" class="form-group qaqcrecord_andrology_id">
<span<?php echo $qaqcrecord_andrology->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($qaqcrecord_andrology->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" value="<?php echo HtmlEncode($qaqcrecord_andrology->id->CurrentValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id">
<span<?php echo $qaqcrecord_andrology->id->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $qaqcrecord_andrology->Date->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Date" class="form-group qaqcrecord_andrology_Date">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Date" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" value="<?php echo HtmlEncode($qaqcrecord_andrology->Date->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Date" class="form-group qaqcrecord_andrology_Date">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date">
<span<?php echo $qaqcrecord_andrology->Date->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
		<td data-name="LN2_Level"<?php echo $qaqcrecord_andrology->LN2_Level->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Level" class="form-group qaqcrecord_andrology_LN2_Level">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LN2_Level->EditValue ?>"<?php echo $qaqcrecord_andrology->LN2_Level->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" value="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Level" class="form-group qaqcrecord_andrology_LN2_Level">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LN2_Level->EditValue ?>"<?php echo $qaqcrecord_andrology->LN2_Level->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level">
<span<?php echo $qaqcrecord_andrology->LN2_Level->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LN2_Level->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
		<td data-name="LN2_Checked"<?php echo $qaqcrecord_andrology->LN2_Checked->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Checked" class="form-group qaqcrecord_andrology_LN2_Checked">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-value-separator="<?php echo $qaqcrecord_andrology->LN2_Checked->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="{value}"<?php echo $qaqcrecord_andrology->LN2_Checked->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LN2_Checked->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LN2_Checked[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Checked->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Checked" class="form-group qaqcrecord_andrology_LN2_Checked">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-value-separator="<?php echo $qaqcrecord_andrology->LN2_Checked->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="{value}"<?php echo $qaqcrecord_andrology->LN2_Checked->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LN2_Checked->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LN2_Checked[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked">
<span<?php echo $qaqcrecord_andrology->LN2_Checked->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LN2_Checked->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
		<td data-name="Incubator_Temp"<?php echo $qaqcrecord_andrology->Incubator_Temp->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Temp" class="form-group qaqcrecord_andrology_Incubator_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Incubator_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Incubator_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Temp" class="form-group qaqcrecord_andrology_Incubator_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Incubator_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Incubator_Temp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp">
<span<?php echo $qaqcrecord_andrology->Incubator_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Incubator_Temp->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
		<td data-name="Incubator_Cleaned"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Cleaned" class="form-group qaqcrecord_andrology_Incubator_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Incubator_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Cleaned" class="form-group qaqcrecord_andrology_Incubator_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Incubator_Cleaned[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned">
<span<?php echo $qaqcrecord_andrology->Incubator_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
		<td data-name="LAF_MG"<?php echo $qaqcrecord_andrology->LAF_MG->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_MG" class="form-group qaqcrecord_andrology_LAF_MG">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LAF_MG->EditValue ?>"<?php echo $qaqcrecord_andrology->LAF_MG->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" value="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_MG" class="form-group qaqcrecord_andrology_LAF_MG">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LAF_MG->EditValue ?>"<?php echo $qaqcrecord_andrology->LAF_MG->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG">
<span<?php echo $qaqcrecord_andrology->LAF_MG->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LAF_MG->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
		<td data-name="LAF_Cleaned"<?php echo $qaqcrecord_andrology->LAF_Cleaned->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_Cleaned" class="form-group qaqcrecord_andrology_LAF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->LAF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->LAF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LAF_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_Cleaned" class="form-group qaqcrecord_andrology_LAF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->LAF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->LAF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LAF_Cleaned[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned">
<span<?php echo $qaqcrecord_andrology->LAF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
		<td data-name="REF_Temp"<?php echo $qaqcrecord_andrology->REF_Temp->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Temp" class="form-group qaqcrecord_andrology_REF_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->REF_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->REF_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Temp" class="form-group qaqcrecord_andrology_REF_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->REF_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->REF_Temp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp">
<span<?php echo $qaqcrecord_andrology->REF_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->REF_Temp->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
		<td data-name="REF_Cleaned"<?php echo $qaqcrecord_andrology->REF_Cleaned->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Cleaned" class="form-group qaqcrecord_andrology_REF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->REF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->REF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->REF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_REF_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Cleaned" class="form-group qaqcrecord_andrology_REF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->REF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->REF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->REF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_REF_Cleaned[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned">
<span<?php echo $qaqcrecord_andrology->REF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->REF_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
		<td data-name="Heating_Temp"<?php echo $qaqcrecord_andrology->Heating_Temp->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Temp" class="form-group qaqcrecord_andrology_Heating_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Heating_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Heating_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Temp" class="form-group qaqcrecord_andrology_Heating_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Heating_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Heating_Temp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp">
<span<?php echo $qaqcrecord_andrology->Heating_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Heating_Temp->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
		<td data-name="Heating_Cleaned"<?php echo $qaqcrecord_andrology->Heating_Cleaned->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Cleaned" class="form-group qaqcrecord_andrology_Heating_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Heating_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Heating_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Heating_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Cleaned" class="form-group qaqcrecord_andrology_Heating_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Heating_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Heating_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Heating_Cleaned[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned">
<span<?php echo $qaqcrecord_andrology->Heating_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
		<td data-name="Createdby"<?php echo $qaqcrecord_andrology->Createdby->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Createdby" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Createdby" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Createdby" value="<?php echo HtmlEncode($qaqcrecord_andrology->Createdby->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby">
<span<?php echo $qaqcrecord_andrology->Createdby->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate"<?php echo $qaqcrecord_andrology->CreatedDate->cellAttributes() ?>>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_CreatedDate" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_CreatedDate" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_CreatedDate" value="<?php echo HtmlEncode($qaqcrecord_andrology->CreatedDate->OldValue) ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $qaqcrecord_andrology_list->RowCnt ?>_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate">
<span<?php echo $qaqcrecord_andrology->CreatedDate->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->CreatedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$qaqcrecord_andrology_list->ListOptions->render("body", "right", $qaqcrecord_andrology_list->RowCnt);
?>
	</tr>
<?php if ($qaqcrecord_andrology->RowType == ROWTYPE_ADD || $qaqcrecord_andrology->RowType == ROWTYPE_EDIT) { ?>
<script>
fqaqcrecord_andrologylist.updateLists(<?php echo $qaqcrecord_andrology_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$qaqcrecord_andrology->isGridAdd())
		if (!$qaqcrecord_andrology_list->Recordset->EOF)
			$qaqcrecord_andrology_list->Recordset->moveNext();
}
?>
<?php
	if ($qaqcrecord_andrology->isGridAdd() || $qaqcrecord_andrology->isGridEdit()) {
		$qaqcrecord_andrology_list->RowIndex = '$rowindex$';
		$qaqcrecord_andrology_list->loadRowValues();

		// Set row properties
		$qaqcrecord_andrology->resetAttributes();
		$qaqcrecord_andrology->RowAttrs = array_merge($qaqcrecord_andrology->RowAttrs, array('data-rowindex'=>$qaqcrecord_andrology_list->RowIndex, 'id'=>'r0_qaqcrecord_andrology', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($qaqcrecord_andrology->RowAttrs["class"], "ew-template");
		$qaqcrecord_andrology->RowType = ROWTYPE_ADD;

		// Render row
		$qaqcrecord_andrology_list->renderRow();

		// Render list options
		$qaqcrecord_andrology_list->renderListOptions();
		$qaqcrecord_andrology_list->StartRowCnt = 0;
?>
	<tr<?php echo $qaqcrecord_andrology->rowAttributes() ?>>
<?php

// Render list options (body, left)
$qaqcrecord_andrology_list->ListOptions->render("body", "left", $qaqcrecord_andrology_list->RowIndex);
?>
	<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_id" value="<?php echo HtmlEncode($qaqcrecord_andrology->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
		<td data-name="Date">
<span id="el$rowindex$_qaqcrecord_andrology_Date" class="form-group qaqcrecord_andrology_Date">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Date" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Date" value="<?php echo HtmlEncode($qaqcrecord_andrology->Date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
		<td data-name="LN2_Level">
<span id="el$rowindex$_qaqcrecord_andrology_LN2_Level" class="form-group qaqcrecord_andrology_LN2_Level">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LN2_Level->EditValue ?>"<?php echo $qaqcrecord_andrology->LN2_Level->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Level" value="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
		<td data-name="LN2_Checked">
<span id="el$rowindex$_qaqcrecord_andrology_LN2_Checked" class="form-group qaqcrecord_andrology_LN2_Checked">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-value-separator="<?php echo $qaqcrecord_andrology->LN2_Checked->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="{value}"<?php echo $qaqcrecord_andrology->LN2_Checked->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LN2_Checked->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LN2_Checked[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LN2_Checked[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Checked->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
		<td data-name="Incubator_Temp">
<span id="el$rowindex$_qaqcrecord_andrology_Incubator_Temp" class="form-group qaqcrecord_andrology_Incubator_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Incubator_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Incubator_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
		<td data-name="Incubator_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_Incubator_Cleaned" class="form-group qaqcrecord_andrology_Incubator_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Incubator_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Incubator_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
		<td data-name="LAF_MG">
<span id="el$rowindex$_qaqcrecord_andrology_LAF_MG" class="form-group qaqcrecord_andrology_LAF_MG">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LAF_MG->EditValue ?>"<?php echo $qaqcrecord_andrology->LAF_MG->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_MG" value="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
		<td data-name="LAF_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_LAF_Cleaned" class="form-group qaqcrecord_andrology_LAF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->LAF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->LAF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_LAF_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_LAF_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
		<td data-name="REF_Temp">
<span id="el$rowindex$_qaqcrecord_andrology_REF_Temp" class="form-group qaqcrecord_andrology_REF_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->REF_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->REF_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
		<td data-name="REF_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_REF_Cleaned" class="form-group qaqcrecord_andrology_REF_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->REF_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->REF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->REF_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_REF_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_REF_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
		<td data-name="Heating_Temp">
<span id="el$rowindex$_qaqcrecord_andrology_Heating_Temp" class="form-group qaqcrecord_andrology_Heating_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Heating_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Heating_Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Temp" value="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
		<td data-name="Heating_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_Heating_Cleaned" class="form-group qaqcrecord_andrology_Heating_Cleaned">
<div id="tp_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Heating_Cleaned->displayValueSeparatorAttribute() ?>" name="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Heating_Cleaned->editAttributes() ?>></div>
<div id="dsl_x<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->checkBoxListHtml(FALSE, "x{$qaqcrecord_andrology_list->RowIndex}_Heating_Cleaned[]") ?>
</div></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Heating_Cleaned[]" value="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Cleaned->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
		<td data-name="Createdby">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Createdby" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Createdby" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_Createdby" value="<?php echo HtmlEncode($qaqcrecord_andrology->Createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_CreatedDate" name="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_CreatedDate" id="o<?php echo $qaqcrecord_andrology_list->RowIndex ?>_CreatedDate" value="<?php echo HtmlEncode($qaqcrecord_andrology->CreatedDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$qaqcrecord_andrology_list->ListOptions->render("body", "right", $qaqcrecord_andrology_list->RowIndex);
?>
<script>
fqaqcrecord_andrologylist.updateLists(<?php echo $qaqcrecord_andrology_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($qaqcrecord_andrology->isAdd() || $qaqcrecord_andrology->isCopy()) { ?>
<input type="hidden" name="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" id="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" value="<?php echo $qaqcrecord_andrology_list->KeyCount ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" id="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" value="<?php echo $qaqcrecord_andrology_list->KeyCount ?>">
<?php echo $qaqcrecord_andrology_list->MultiSelectKey ?>
<?php } ?>
<?php if ($qaqcrecord_andrology->isEdit()) { ?>
<input type="hidden" name="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" id="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" value="<?php echo $qaqcrecord_andrology_list->KeyCount ?>">
<?php } ?>
<?php if ($qaqcrecord_andrology->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" id="<?php echo $qaqcrecord_andrology_list->FormKeyCountName ?>" value="<?php echo $qaqcrecord_andrology_list->KeyCount ?>">
<?php echo $qaqcrecord_andrology_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$qaqcrecord_andrology->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($qaqcrecord_andrology_list->Recordset)
	$qaqcrecord_andrology_list->Recordset->Close();
?>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$qaqcrecord_andrology->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($qaqcrecord_andrology_list->Pager)) $qaqcrecord_andrology_list->Pager = new NumericPager($qaqcrecord_andrology_list->StartRec, $qaqcrecord_andrology_list->DisplayRecs, $qaqcrecord_andrology_list->TotalRecs, $qaqcrecord_andrology_list->RecRange, $qaqcrecord_andrology_list->AutoHidePager) ?>
<?php if ($qaqcrecord_andrology_list->Pager->RecordCount > 0 && $qaqcrecord_andrology_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($qaqcrecord_andrology_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($qaqcrecord_andrology_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($qaqcrecord_andrology_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $qaqcrecord_andrology_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($qaqcrecord_andrology_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($qaqcrecord_andrology_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $qaqcrecord_andrology_list->pageUrl() ?>start=<?php echo $qaqcrecord_andrology_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $qaqcrecord_andrology_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $qaqcrecord_andrology_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $qaqcrecord_andrology_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($qaqcrecord_andrology_list->TotalRecs > 0 && (!$qaqcrecord_andrology_list->AutoHidePageSizeSelector || $qaqcrecord_andrology_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="qaqcrecord_andrology">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($qaqcrecord_andrology_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($qaqcrecord_andrology->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $qaqcrecord_andrology_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($qaqcrecord_andrology_list->TotalRecs == 0 && !$qaqcrecord_andrology->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $qaqcrecord_andrology_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$qaqcrecord_andrology_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<script>
ew.scrollableTable("gmp_qaqcrecord_andrology", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$qaqcrecord_andrology_list->terminate();
?>