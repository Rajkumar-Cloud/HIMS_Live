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
$view_issuing_semen_list = new view_issuing_semen_list();

// Run the page
$view_issuing_semen_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_issuing_semen_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_issuing_semen->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_issuing_semenlist = currentForm = new ew.Form("fview_issuing_semenlist", "list");
fview_issuing_semenlist.formKeyCountName = '<?php echo $view_issuing_semen_list->FormKeyCountName ?>';

// Validate form
fview_issuing_semenlist.validate = function() {
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
		<?php if ($view_issuing_semen_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->id->caption(), $view_issuing_semen->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->RIDNo->caption(), $view_issuing_semen->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->PatientName->caption(), $view_issuing_semen->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->HusbandName->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->HusbandName->caption(), $view_issuing_semen->HusbandName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->RequestDr->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->RequestDr->caption(), $view_issuing_semen->RequestDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->CollectionDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CollectionDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->CollectionDate->caption(), $view_issuing_semen->CollectionDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->Tank->caption(), $view_issuing_semen->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->Location->Required) { ?>
			elm = this.getElements("x" + infix + "_Location");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->Location->caption(), $view_issuing_semen->Location->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->IssuedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_IssuedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->IssuedBy->caption(), $view_issuing_semen->IssuedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->IssuedTo->Required) { ?>
			elm = this.getElements("x" + infix + "_IssuedTo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->IssuedTo->caption(), $view_issuing_semen->IssuedTo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_issuing_semen_list->RequestSample->Required) { ?>
			elm = this.getElements("x" + infix + "_RequestSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_issuing_semen->RequestSample->caption(), $view_issuing_semen->RequestSample->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_issuing_semenlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_issuing_semenlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_issuing_semenlist.lists["x_PatientName"] = <?php echo $view_issuing_semen_list->PatientName->Lookup->toClientList() ?>;
fview_issuing_semenlist.lists["x_PatientName"].options = <?php echo JsonEncode($view_issuing_semen_list->PatientName->lookupOptions()) ?>;
fview_issuing_semenlist.lists["x_HusbandName"] = <?php echo $view_issuing_semen_list->HusbandName->Lookup->toClientList() ?>;
fview_issuing_semenlist.lists["x_HusbandName"].options = <?php echo JsonEncode($view_issuing_semen_list->HusbandName->lookupOptions()) ?>;
fview_issuing_semenlist.lists["x_IssuedTo"] = <?php echo $view_issuing_semen_list->IssuedTo->Lookup->toClientList() ?>;
fview_issuing_semenlist.lists["x_IssuedTo"].options = <?php echo JsonEncode($view_issuing_semen_list->IssuedTo->options(FALSE, TRUE)) ?>;
fview_issuing_semenlist.lists["x_RequestSample"] = <?php echo $view_issuing_semen_list->RequestSample->Lookup->toClientList() ?>;
fview_issuing_semenlist.lists["x_RequestSample"].options = <?php echo JsonEncode($view_issuing_semen_list->RequestSample->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_issuing_semenlistsrch = currentSearchForm = new ew.Form("fview_issuing_semenlistsrch");

// Validate function for search
fview_issuing_semenlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_RIDNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_issuing_semen->RIDNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CollectionDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_issuing_semen->CollectionDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_issuing_semenlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_issuing_semenlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_issuing_semenlistsrch.lists["x_PatientName"] = <?php echo $view_issuing_semen_list->PatientName->Lookup->toClientList() ?>;
fview_issuing_semenlistsrch.lists["x_PatientName"].options = <?php echo JsonEncode($view_issuing_semen_list->PatientName->lookupOptions()) ?>;
fview_issuing_semenlistsrch.lists["x_HusbandName"] = <?php echo $view_issuing_semen_list->HusbandName->Lookup->toClientList() ?>;
fview_issuing_semenlistsrch.lists["x_HusbandName"].options = <?php echo JsonEncode($view_issuing_semen_list->HusbandName->lookupOptions()) ?>;

// Filters
fview_issuing_semenlistsrch.filterList = <?php echo $view_issuing_semen_list->getFilterList() ?>;
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
<?php if (!$view_issuing_semen->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_issuing_semen_list->TotalRecs > 0 && $view_issuing_semen_list->ExportOptions->visible()) { ?>
<?php $view_issuing_semen_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_issuing_semen_list->ImportOptions->visible()) { ?>
<?php $view_issuing_semen_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_issuing_semen_list->SearchOptions->visible()) { ?>
<?php $view_issuing_semen_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_issuing_semen_list->FilterOptions->visible()) { ?>
<?php $view_issuing_semen_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_issuing_semen_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_issuing_semen->isExport() && !$view_issuing_semen->CurrentAction) { ?>
<form name="fview_issuing_semenlistsrch" id="fview_issuing_semenlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_issuing_semen_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_issuing_semenlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_issuing_semen">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_issuing_semen_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_issuing_semen->RowType = ROWTYPE_SEARCH;

// Render row
$view_issuing_semen->resetAttributes();
$view_issuing_semen_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_issuing_semen->RIDNo->Visible) { // RIDNo ?>
	<div id="xsc_RIDNo" class="ew-cell form-group">
		<label for="x_RIDNo" class="ew-search-caption ew-label"><?php echo $view_issuing_semen->RIDNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNo" id="z_RIDNo" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="view_issuing_semen" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_issuing_semen->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->RIDNo->EditValue ?>"<?php echo $view_issuing_semen->RIDNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_issuing_semen->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_issuing_semen->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_PatientName" data-value-separator="<?php echo $view_issuing_semen->PatientName->displayValueSeparatorAttribute() ?>" id="x_PatientName" name="x_PatientName"<?php echo $view_issuing_semen->PatientName->editAttributes() ?>>
		<?php echo $view_issuing_semen->PatientName->selectOptionListHtml("x_PatientName") ?>
	</select>
</div>
<?php echo $view_issuing_semen->PatientName->Lookup->getParamTag("p_x_PatientName") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_issuing_semen->HusbandName->Visible) { // HusbandName ?>
	<div id="xsc_HusbandName" class="ew-cell form-group">
		<label for="x_HusbandName" class="ew-search-caption ew-label"><?php echo $view_issuing_semen->HusbandName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_HusbandName" data-value-separator="<?php echo $view_issuing_semen->HusbandName->displayValueSeparatorAttribute() ?>" id="x_HusbandName" name="x_HusbandName"<?php echo $view_issuing_semen->HusbandName->editAttributes() ?>>
		<?php echo $view_issuing_semen->HusbandName->selectOptionListHtml("x_HusbandName") ?>
	</select>
</div>
<?php echo $view_issuing_semen->HusbandName->Lookup->getParamTag("p_x_HusbandName") ?>
</span>
	</div>
<?php } ?>
<?php if ($view_issuing_semen->RequestDr->Visible) { // RequestDr ?>
	<div id="xsc_RequestDr" class="ew-cell form-group">
		<label for="x_RequestDr" class="ew-search-caption ew-label"><?php echo $view_issuing_semen->RequestDr->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RequestDr" id="z_RequestDr" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_issuing_semen" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->RequestDr->EditValue ?>"<?php echo $view_issuing_semen->RequestDr->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_issuing_semen->CollectionDate->Visible) { // CollectionDate ?>
	<div id="xsc_CollectionDate" class="ew-cell form-group">
		<label for="x_CollectionDate" class="ew-search-caption ew-label"><?php echo $view_issuing_semen->CollectionDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_CollectionDate" id="z_CollectionDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_issuing_semen->CollectionDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->CollectionDate->EditValue ?>"<?php echo $view_issuing_semen->CollectionDate->editAttributes() ?>>
<?php if (!$view_issuing_semen->CollectionDate->ReadOnly && !$view_issuing_semen->CollectionDate->Disabled && !isset($view_issuing_semen->CollectionDate->EditAttrs["readonly"]) && !isset($view_issuing_semen->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_issuing_semenlistsrch", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_CollectionDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_CollectionDate style="d-none"">
<input type="text" data-table="view_issuing_semen" data-field="x_CollectionDate" name="y_CollectionDate" id="y_CollectionDate" placeholder="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->CollectionDate->EditValue2 ?>"<?php echo $view_issuing_semen->CollectionDate->editAttributes() ?>>
<?php if (!$view_issuing_semen->CollectionDate->ReadOnly && !$view_issuing_semen->CollectionDate->Disabled && !isset($view_issuing_semen->CollectionDate->EditAttrs["readonly"]) && !isset($view_issuing_semen->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_issuing_semenlistsrch", "y_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_issuing_semen_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_issuing_semen_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_issuing_semen_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_issuing_semen_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_issuing_semen_list->showPageHeader(); ?>
<?php
$view_issuing_semen_list->showMessage();
?>
<?php if ($view_issuing_semen_list->TotalRecs > 0 || $view_issuing_semen->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_issuing_semen_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_issuing_semen">
<?php if (!$view_issuing_semen->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_issuing_semen->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_issuing_semen_list->Pager)) $view_issuing_semen_list->Pager = new NumericPager($view_issuing_semen_list->StartRec, $view_issuing_semen_list->DisplayRecs, $view_issuing_semen_list->TotalRecs, $view_issuing_semen_list->RecRange, $view_issuing_semen_list->AutoHidePager) ?>
<?php if ($view_issuing_semen_list->Pager->RecordCount > 0 && $view_issuing_semen_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_issuing_semen_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_issuing_semen_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_issuing_semen_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_issuing_semen_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_issuing_semen_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_issuing_semen_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_issuing_semen_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_issuing_semen_list->TotalRecs > 0 && (!$view_issuing_semen_list->AutoHidePageSizeSelector || $view_issuing_semen_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_issuing_semen">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_issuing_semen_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_issuing_semen_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_issuing_semen_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_issuing_semen_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_issuing_semen_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_issuing_semen_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_issuing_semen->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_issuing_semen_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_issuing_semenlist" id="fview_issuing_semenlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_issuing_semen_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_issuing_semen_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_issuing_semen">
<div id="gmp_view_issuing_semen" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_issuing_semen_list->TotalRecs > 0 || $view_issuing_semen->isGridEdit()) { ?>
<table id="tbl_view_issuing_semenlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_issuing_semen_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_issuing_semen_list->renderListOptions();

// Render list options (header, left)
$view_issuing_semen_list->ListOptions->render("header", "left");
?>
<?php if ($view_issuing_semen->id->Visible) { // id ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_issuing_semen->id->headerCellClass() ?>"><div id="elh_view_issuing_semen_id" class="view_issuing_semen_id"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_issuing_semen->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->id) ?>',1);"><div id="elh_view_issuing_semen_id" class="view_issuing_semen_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->RIDNo->Visible) { // RIDNo ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $view_issuing_semen->RIDNo->headerCellClass() ?>"><div id="elh_view_issuing_semen_RIDNo" class="view_issuing_semen_RIDNo"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $view_issuing_semen->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->RIDNo) ?>',1);"><div id="elh_view_issuing_semen_RIDNo" class="view_issuing_semen_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->PatientName->Visible) { // PatientName ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_issuing_semen->PatientName->headerCellClass() ?>"><div id="elh_view_issuing_semen_PatientName" class="view_issuing_semen_PatientName"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_issuing_semen->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->PatientName) ?>',1);"><div id="elh_view_issuing_semen_PatientName" class="view_issuing_semen_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->HusbandName->Visible) { // HusbandName ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $view_issuing_semen->HusbandName->headerCellClass() ?>"><div id="elh_view_issuing_semen_HusbandName" class="view_issuing_semen_HusbandName"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $view_issuing_semen->HusbandName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->HusbandName) ?>',1);"><div id="elh_view_issuing_semen_HusbandName" class="view_issuing_semen_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->HusbandName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->HusbandName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->HusbandName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->RequestDr->Visible) { // RequestDr ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $view_issuing_semen->RequestDr->headerCellClass() ?>"><div id="elh_view_issuing_semen_RequestDr" class="view_issuing_semen_RequestDr"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $view_issuing_semen->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->RequestDr) ?>',1);"><div id="elh_view_issuing_semen_RequestDr" class="view_issuing_semen_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->RequestDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->RequestDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $view_issuing_semen->CollectionDate->headerCellClass() ?>"><div id="elh_view_issuing_semen_CollectionDate" class="view_issuing_semen_CollectionDate"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $view_issuing_semen->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->CollectionDate) ?>',1);"><div id="elh_view_issuing_semen_CollectionDate" class="view_issuing_semen_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->CollectionDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->CollectionDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->Tank->Visible) { // Tank ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $view_issuing_semen->Tank->headerCellClass() ?>"><div id="elh_view_issuing_semen_Tank" class="view_issuing_semen_Tank"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $view_issuing_semen->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->Tank) ?>',1);"><div id="elh_view_issuing_semen_Tank" class="view_issuing_semen_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->Tank->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->Tank->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->Location->Visible) { // Location ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $view_issuing_semen->Location->headerCellClass() ?>"><div id="elh_view_issuing_semen_Location" class="view_issuing_semen_Location"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $view_issuing_semen->Location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->Location) ?>',1);"><div id="elh_view_issuing_semen_Location" class="view_issuing_semen_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->Location->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->Location->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->Location->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->IssuedBy) == "") { ?>
		<th data-name="IssuedBy" class="<?php echo $view_issuing_semen->IssuedBy->headerCellClass() ?>"><div id="elh_view_issuing_semen_IssuedBy" class="view_issuing_semen_IssuedBy"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->IssuedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedBy" class="<?php echo $view_issuing_semen->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->IssuedBy) ?>',1);"><div id="elh_view_issuing_semen_IssuedBy" class="view_issuing_semen_IssuedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->IssuedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->IssuedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->IssuedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->IssuedTo) == "") { ?>
		<th data-name="IssuedTo" class="<?php echo $view_issuing_semen->IssuedTo->headerCellClass() ?>"><div id="elh_view_issuing_semen_IssuedTo" class="view_issuing_semen_IssuedTo"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->IssuedTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedTo" class="<?php echo $view_issuing_semen->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->IssuedTo) ?>',1);"><div id="elh_view_issuing_semen_IssuedTo" class="view_issuing_semen_IssuedTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->IssuedTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->IssuedTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->IssuedTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_issuing_semen->RequestSample->Visible) { // RequestSample ?>
	<?php if ($view_issuing_semen->sortUrl($view_issuing_semen->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $view_issuing_semen->RequestSample->headerCellClass() ?>"><div id="elh_view_issuing_semen_RequestSample" class="view_issuing_semen_RequestSample"><div class="ew-table-header-caption"><?php echo $view_issuing_semen->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $view_issuing_semen->RequestSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_issuing_semen->SortUrl($view_issuing_semen->RequestSample) ?>',1);"><div id="elh_view_issuing_semen_RequestSample" class="view_issuing_semen_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_issuing_semen->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_issuing_semen->RequestSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_issuing_semen->RequestSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_issuing_semen_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_issuing_semen->ExportAll && $view_issuing_semen->isExport()) {
	$view_issuing_semen_list->StopRec = $view_issuing_semen_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_issuing_semen_list->TotalRecs > $view_issuing_semen_list->StartRec + $view_issuing_semen_list->DisplayRecs - 1)
		$view_issuing_semen_list->StopRec = $view_issuing_semen_list->StartRec + $view_issuing_semen_list->DisplayRecs - 1;
	else
		$view_issuing_semen_list->StopRec = $view_issuing_semen_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_issuing_semen_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_issuing_semen_list->FormKeyCountName) && ($view_issuing_semen->isGridAdd() || $view_issuing_semen->isGridEdit() || $view_issuing_semen->isConfirm())) {
		$view_issuing_semen_list->KeyCount = $CurrentForm->getValue($view_issuing_semen_list->FormKeyCountName);
		$view_issuing_semen_list->StopRec = $view_issuing_semen_list->StartRec + $view_issuing_semen_list->KeyCount - 1;
	}
}
$view_issuing_semen_list->RecCnt = $view_issuing_semen_list->StartRec - 1;
if ($view_issuing_semen_list->Recordset && !$view_issuing_semen_list->Recordset->EOF) {
	$view_issuing_semen_list->Recordset->moveFirst();
	$selectLimit = $view_issuing_semen_list->UseSelectLimit;
	if (!$selectLimit && $view_issuing_semen_list->StartRec > 1)
		$view_issuing_semen_list->Recordset->move($view_issuing_semen_list->StartRec - 1);
} elseif (!$view_issuing_semen->AllowAddDeleteRow && $view_issuing_semen_list->StopRec == 0) {
	$view_issuing_semen_list->StopRec = $view_issuing_semen->GridAddRowCount;
}

// Initialize aggregate
$view_issuing_semen->RowType = ROWTYPE_AGGREGATEINIT;
$view_issuing_semen->resetAttributes();
$view_issuing_semen_list->renderRow();
$view_issuing_semen_list->EditRowCnt = 0;
if ($view_issuing_semen->isEdit())
	$view_issuing_semen_list->RowIndex = 1;
if ($view_issuing_semen->isGridEdit())
	$view_issuing_semen_list->RowIndex = 0;
while ($view_issuing_semen_list->RecCnt < $view_issuing_semen_list->StopRec) {
	$view_issuing_semen_list->RecCnt++;
	if ($view_issuing_semen_list->RecCnt >= $view_issuing_semen_list->StartRec) {
		$view_issuing_semen_list->RowCnt++;
		if ($view_issuing_semen->isGridAdd() || $view_issuing_semen->isGridEdit() || $view_issuing_semen->isConfirm()) {
			$view_issuing_semen_list->RowIndex++;
			$CurrentForm->Index = $view_issuing_semen_list->RowIndex;
			if ($CurrentForm->hasValue($view_issuing_semen_list->FormActionName) && $view_issuing_semen_list->EventCancelled)
				$view_issuing_semen_list->RowAction = strval($CurrentForm->getValue($view_issuing_semen_list->FormActionName));
			elseif ($view_issuing_semen->isGridAdd())
				$view_issuing_semen_list->RowAction = "insert";
			else
				$view_issuing_semen_list->RowAction = "";
		}

		// Set up key count
		$view_issuing_semen_list->KeyCount = $view_issuing_semen_list->RowIndex;

		// Init row class and style
		$view_issuing_semen->resetAttributes();
		$view_issuing_semen->CssClass = "";
		if ($view_issuing_semen->isGridAdd()) {
			$view_issuing_semen_list->loadRowValues(); // Load default values
		} else {
			$view_issuing_semen_list->loadRowValues($view_issuing_semen_list->Recordset); // Load row values
		}
		$view_issuing_semen->RowType = ROWTYPE_VIEW; // Render view
		if ($view_issuing_semen->isEdit()) {
			if ($view_issuing_semen_list->checkInlineEditKey() && $view_issuing_semen_list->EditRowCnt == 0) { // Inline edit
				$view_issuing_semen->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_issuing_semen->isGridEdit()) { // Grid edit
			if ($view_issuing_semen->EventCancelled)
				$view_issuing_semen_list->restoreCurrentRowFormValues($view_issuing_semen_list->RowIndex); // Restore form values
			if ($view_issuing_semen_list->RowAction == "insert")
				$view_issuing_semen->RowType = ROWTYPE_ADD; // Render add
			else
				$view_issuing_semen->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_issuing_semen->isEdit() && $view_issuing_semen->RowType == ROWTYPE_EDIT && $view_issuing_semen->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_issuing_semen_list->restoreFormValues(); // Restore form values
		}
		if ($view_issuing_semen->isGridEdit() && ($view_issuing_semen->RowType == ROWTYPE_EDIT || $view_issuing_semen->RowType == ROWTYPE_ADD) && $view_issuing_semen->EventCancelled) // Update failed
			$view_issuing_semen_list->restoreCurrentRowFormValues($view_issuing_semen_list->RowIndex); // Restore form values
		if ($view_issuing_semen->RowType == ROWTYPE_EDIT) // Edit row
			$view_issuing_semen_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_issuing_semen->RowAttrs = array_merge($view_issuing_semen->RowAttrs, array('data-rowindex'=>$view_issuing_semen_list->RowCnt, 'id'=>'r' . $view_issuing_semen_list->RowCnt . '_view_issuing_semen', 'data-rowtype'=>$view_issuing_semen->RowType));

		// Render row
		$view_issuing_semen_list->renderRow();

		// Render list options
		$view_issuing_semen_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_issuing_semen_list->RowAction <> "delete" && $view_issuing_semen_list->RowAction <> "insertdelete" && !($view_issuing_semen_list->RowAction == "insert" && $view_issuing_semen->isConfirm() && $view_issuing_semen_list->emptyRow())) {
?>
	<tr<?php echo $view_issuing_semen->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_issuing_semen_list->ListOptions->render("body", "left", $view_issuing_semen_list->RowCnt);
?>
	<?php if ($view_issuing_semen->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_issuing_semen->id->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_issuing_semen->id->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_id" class="form-group view_issuing_semen_id">
<span<?php echo $view_issuing_semen->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_id" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_issuing_semen->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_id" class="view_issuing_semen_id">
<span<?php echo $view_issuing_semen->id->viewAttributes() ?>>
<?php echo $view_issuing_semen->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $view_issuing_semen->RIDNo->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RIDNo" class="form-group view_issuing_semen_RIDNo">
<input type="text" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_issuing_semen->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->RIDNo->EditValue ?>"<?php echo $view_issuing_semen->RIDNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_issuing_semen->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RIDNo" class="form-group view_issuing_semen_RIDNo">
<span<?php echo $view_issuing_semen->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->RIDNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_issuing_semen->RIDNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RIDNo" class="view_issuing_semen_RIDNo">
<span<?php echo $view_issuing_semen->RIDNo->viewAttributes() ?>>
<?php echo $view_issuing_semen->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_issuing_semen->PatientName->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_PatientName" class="form-group view_issuing_semen_PatientName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_PatientName" data-value-separator="<?php echo $view_issuing_semen->PatientName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName"<?php echo $view_issuing_semen->PatientName->editAttributes() ?>>
		<?php echo $view_issuing_semen->PatientName->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName") ?>
	</select>
</div>
<?php echo $view_issuing_semen->PatientName->Lookup->getParamTag("p_x" . $view_issuing_semen_list->RowIndex . "_PatientName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_issuing_semen->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_PatientName" class="form-group view_issuing_semen_PatientName">
<span<?php echo $view_issuing_semen->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->PatientName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_issuing_semen->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_PatientName" class="view_issuing_semen_PatientName">
<span<?php echo $view_issuing_semen->PatientName->viewAttributes() ?>>
<?php echo $view_issuing_semen->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName"<?php echo $view_issuing_semen->HusbandName->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_HusbandName" class="form-group view_issuing_semen_HusbandName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_HusbandName" data-value-separator="<?php echo $view_issuing_semen->HusbandName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName"<?php echo $view_issuing_semen->HusbandName->editAttributes() ?>>
		<?php echo $view_issuing_semen->HusbandName->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName") ?>
	</select>
</div>
<?php echo $view_issuing_semen->HusbandName->Lookup->getParamTag("p_x" . $view_issuing_semen_list->RowIndex . "_HusbandName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($view_issuing_semen->HusbandName->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_HusbandName" class="form-group view_issuing_semen_HusbandName">
<span<?php echo $view_issuing_semen->HusbandName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->HusbandName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($view_issuing_semen->HusbandName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_HusbandName" class="view_issuing_semen_HusbandName">
<span<?php echo $view_issuing_semen->HusbandName->viewAttributes() ?>>
<?php echo $view_issuing_semen->HusbandName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr"<?php echo $view_issuing_semen->RequestDr->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RequestDr" class="form-group view_issuing_semen_RequestDr">
<input type="text" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->RequestDr->EditValue ?>"<?php echo $view_issuing_semen->RequestDr->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($view_issuing_semen->RequestDr->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RequestDr" class="form-group view_issuing_semen_RequestDr">
<span<?php echo $view_issuing_semen->RequestDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->RequestDr->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($view_issuing_semen->RequestDr->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RequestDr" class="view_issuing_semen_RequestDr">
<span<?php echo $view_issuing_semen->RequestDr->viewAttributes() ?>>
<?php echo $view_issuing_semen->RequestDr->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate"<?php echo $view_issuing_semen->CollectionDate->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_CollectionDate" class="form-group view_issuing_semen_CollectionDate">
<input type="text" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->CollectionDate->EditValue ?>"<?php echo $view_issuing_semen->CollectionDate->editAttributes() ?>>
<?php if (!$view_issuing_semen->CollectionDate->ReadOnly && !$view_issuing_semen->CollectionDate->Disabled && !isset($view_issuing_semen->CollectionDate->EditAttrs["readonly"]) && !isset($view_issuing_semen->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_issuing_semenlist", "x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_CollectionDate" class="form-group view_issuing_semen_CollectionDate">
<span<?php echo $view_issuing_semen->CollectionDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->CollectionDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_CollectionDate" class="view_issuing_semen_CollectionDate">
<span<?php echo $view_issuing_semen->CollectionDate->viewAttributes() ?>>
<?php echo $view_issuing_semen->CollectionDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->Tank->Visible) { // Tank ?>
		<td data-name="Tank"<?php echo $view_issuing_semen->Tank->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_Tank" class="form-group view_issuing_semen_Tank">
<input type="text" data-table="view_issuing_semen" data-field="x_Tank" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->Tank->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->Tank->EditValue ?>"<?php echo $view_issuing_semen->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($view_issuing_semen->Tank->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_Tank" class="form-group view_issuing_semen_Tank">
<span<?php echo $view_issuing_semen->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->Tank->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($view_issuing_semen->Tank->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_Tank" class="view_issuing_semen_Tank">
<span<?php echo $view_issuing_semen->Tank->viewAttributes() ?>>
<?php echo $view_issuing_semen->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->Location->Visible) { // Location ?>
		<td data-name="Location"<?php echo $view_issuing_semen->Location->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_Location" class="form-group view_issuing_semen_Location">
<input type="text" data-table="view_issuing_semen" data-field="x_Location" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->Location->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->Location->EditValue ?>"<?php echo $view_issuing_semen->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($view_issuing_semen->Location->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_Location" class="form-group view_issuing_semen_Location">
<span<?php echo $view_issuing_semen->Location->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->Location->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($view_issuing_semen->Location->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_Location" class="view_issuing_semen_Location">
<span<?php echo $view_issuing_semen->Location->viewAttributes() ?>>
<?php echo $view_issuing_semen->Location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy"<?php echo $view_issuing_semen->IssuedBy->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_IssuedBy" class="form-group view_issuing_semen_IssuedBy">
<input type="text" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->IssuedBy->EditValue ?>"<?php echo $view_issuing_semen->IssuedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedBy" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($view_issuing_semen->IssuedBy->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_IssuedBy" class="form-group view_issuing_semen_IssuedBy">
<input type="text" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->IssuedBy->EditValue ?>"<?php echo $view_issuing_semen->IssuedBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_IssuedBy" class="view_issuing_semen_IssuedBy">
<span<?php echo $view_issuing_semen->IssuedBy->viewAttributes() ?>>
<?php echo $view_issuing_semen->IssuedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo"<?php echo $view_issuing_semen->IssuedTo->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_IssuedTo" class="form-group view_issuing_semen_IssuedTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_IssuedTo" data-value-separator="<?php echo $view_issuing_semen->IssuedTo->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo"<?php echo $view_issuing_semen->IssuedTo->editAttributes() ?>>
		<?php echo $view_issuing_semen->IssuedTo->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedTo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($view_issuing_semen->IssuedTo->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_IssuedTo" class="form-group view_issuing_semen_IssuedTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_IssuedTo" data-value-separator="<?php echo $view_issuing_semen->IssuedTo->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo"<?php echo $view_issuing_semen->IssuedTo->editAttributes() ?>>
		<?php echo $view_issuing_semen->IssuedTo->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_IssuedTo" class="view_issuing_semen_IssuedTo">
<span<?php echo $view_issuing_semen->IssuedTo->viewAttributes() ?>>
<?php echo $view_issuing_semen->IssuedTo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample"<?php echo $view_issuing_semen->RequestSample->cellAttributes() ?>>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RequestSample" class="form-group view_issuing_semen_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_RequestSample" data-value-separator="<?php echo $view_issuing_semen->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample"<?php echo $view_issuing_semen->RequestSample->editAttributes() ?>>
		<?php echo $view_issuing_semen->RequestSample->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($view_issuing_semen->RequestSample->OldValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RequestSample" class="form-group view_issuing_semen_RequestSample">
<span<?php echo $view_issuing_semen->RequestSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_issuing_semen->RequestSample->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($view_issuing_semen->RequestSample->CurrentValue) ?>">
<?php } ?>
<?php if ($view_issuing_semen->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_issuing_semen_list->RowCnt ?>_view_issuing_semen_RequestSample" class="view_issuing_semen_RequestSample">
<span<?php echo $view_issuing_semen->RequestSample->viewAttributes() ?>>
<?php echo $view_issuing_semen->RequestSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_issuing_semen_list->ListOptions->render("body", "right", $view_issuing_semen_list->RowCnt);
?>
	</tr>
<?php if ($view_issuing_semen->RowType == ROWTYPE_ADD || $view_issuing_semen->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_issuing_semenlist.updateLists(<?php echo $view_issuing_semen_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_issuing_semen->isGridAdd())
		if (!$view_issuing_semen_list->Recordset->EOF)
			$view_issuing_semen_list->Recordset->moveNext();
}
?>
<?php
	if ($view_issuing_semen->isGridAdd() || $view_issuing_semen->isGridEdit()) {
		$view_issuing_semen_list->RowIndex = '$rowindex$';
		$view_issuing_semen_list->loadRowValues();

		// Set row properties
		$view_issuing_semen->resetAttributes();
		$view_issuing_semen->RowAttrs = array_merge($view_issuing_semen->RowAttrs, array('data-rowindex'=>$view_issuing_semen_list->RowIndex, 'id'=>'r0_view_issuing_semen', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_issuing_semen->RowAttrs["class"], "ew-template");
		$view_issuing_semen->RowType = ROWTYPE_ADD;

		// Render row
		$view_issuing_semen_list->renderRow();

		// Render list options
		$view_issuing_semen_list->renderListOptions();
		$view_issuing_semen_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_issuing_semen->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_issuing_semen_list->ListOptions->render("body", "left", $view_issuing_semen_list->RowIndex);
?>
	<?php if ($view_issuing_semen->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_issuing_semen->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<span id="el$rowindex$_view_issuing_semen_RIDNo" class="form-group view_issuing_semen_RIDNo">
<input type="text" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_issuing_semen->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->RIDNo->EditValue ?>"<?php echo $view_issuing_semen->RIDNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($view_issuing_semen->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_issuing_semen_PatientName" class="form-group view_issuing_semen_PatientName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_PatientName" data-value-separator="<?php echo $view_issuing_semen->PatientName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName"<?php echo $view_issuing_semen->PatientName->editAttributes() ?>>
		<?php echo $view_issuing_semen->PatientName->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName") ?>
	</select>
</div>
<?php echo $view_issuing_semen->PatientName->Lookup->getParamTag("p_x" . $view_issuing_semen_list->RowIndex . "_PatientName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_issuing_semen->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName">
<span id="el$rowindex$_view_issuing_semen_HusbandName" class="form-group view_issuing_semen_HusbandName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_HusbandName" data-value-separator="<?php echo $view_issuing_semen->HusbandName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName"<?php echo $view_issuing_semen->HusbandName->editAttributes() ?>>
		<?php echo $view_issuing_semen->HusbandName->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName") ?>
	</select>
</div>
<?php echo $view_issuing_semen->HusbandName->Lookup->getParamTag("p_x" . $view_issuing_semen_list->RowIndex . "_HusbandName") ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_HusbandName" value="<?php echo HtmlEncode($view_issuing_semen->HusbandName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr">
<span id="el$rowindex$_view_issuing_semen_RequestDr" class="form-group view_issuing_semen_RequestDr">
<input type="text" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->RequestDr->EditValue ?>"<?php echo $view_issuing_semen->RequestDr->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestDr" value="<?php echo HtmlEncode($view_issuing_semen->RequestDr->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate">
<span id="el$rowindex$_view_issuing_semen_CollectionDate" class="form-group view_issuing_semen_CollectionDate">
<input type="text" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" placeholder="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->CollectionDate->EditValue ?>"<?php echo $view_issuing_semen->CollectionDate->editAttributes() ?>>
<?php if (!$view_issuing_semen->CollectionDate->ReadOnly && !$view_issuing_semen->CollectionDate->Disabled && !isset($view_issuing_semen->CollectionDate->EditAttrs["readonly"]) && !isset($view_issuing_semen->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_issuing_semenlist", "x<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_CollectionDate" value="<?php echo HtmlEncode($view_issuing_semen->CollectionDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<span id="el$rowindex$_view_issuing_semen_Tank" class="form-group view_issuing_semen_Tank">
<input type="text" data-table="view_issuing_semen" data-field="x_Tank" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->Tank->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->Tank->EditValue ?>"<?php echo $view_issuing_semen->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($view_issuing_semen->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->Location->Visible) { // Location ?>
		<td data-name="Location">
<span id="el$rowindex$_view_issuing_semen_Location" class="form-group view_issuing_semen_Location">
<input type="text" data-table="view_issuing_semen" data-field="x_Location" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->Location->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->Location->EditValue ?>"<?php echo $view_issuing_semen->Location->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_Location" value="<?php echo HtmlEncode($view_issuing_semen->Location->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy">
<span id="el$rowindex$_view_issuing_semen_IssuedBy" class="form-group view_issuing_semen_IssuedBy">
<input type="text" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_issuing_semen->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_issuing_semen->IssuedBy->EditValue ?>"<?php echo $view_issuing_semen->IssuedBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedBy" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedBy" value="<?php echo HtmlEncode($view_issuing_semen->IssuedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo">
<span id="el$rowindex$_view_issuing_semen_IssuedTo" class="form-group view_issuing_semen_IssuedTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_IssuedTo" data-value-separator="<?php echo $view_issuing_semen->IssuedTo->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo"<?php echo $view_issuing_semen->IssuedTo->editAttributes() ?>>
		<?php echo $view_issuing_semen->IssuedTo->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedTo" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_IssuedTo" value="<?php echo HtmlEncode($view_issuing_semen->IssuedTo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_issuing_semen->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample">
<span id="el$rowindex$_view_issuing_semen_RequestSample" class="form-group view_issuing_semen_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_issuing_semen" data-field="x_RequestSample" data-value-separator="<?php echo $view_issuing_semen->RequestSample->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" name="x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample"<?php echo $view_issuing_semen->RequestSample->editAttributes() ?>>
		<?php echo $view_issuing_semen->RequestSample->selectOptionListHtml("x<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" name="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" id="o<?php echo $view_issuing_semen_list->RowIndex ?>_RequestSample" value="<?php echo HtmlEncode($view_issuing_semen->RequestSample->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_issuing_semen_list->ListOptions->render("body", "right", $view_issuing_semen_list->RowIndex);
?>
<script>
fview_issuing_semenlist.updateLists(<?php echo $view_issuing_semen_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_issuing_semen->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" id="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" value="<?php echo $view_issuing_semen_list->KeyCount ?>">
<?php } ?>
<?php if ($view_issuing_semen->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" id="<?php echo $view_issuing_semen_list->FormKeyCountName ?>" value="<?php echo $view_issuing_semen_list->KeyCount ?>">
<?php echo $view_issuing_semen_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_issuing_semen->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_issuing_semen_list->Recordset)
	$view_issuing_semen_list->Recordset->Close();
?>
<?php if (!$view_issuing_semen->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_issuing_semen->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_issuing_semen_list->Pager)) $view_issuing_semen_list->Pager = new NumericPager($view_issuing_semen_list->StartRec, $view_issuing_semen_list->DisplayRecs, $view_issuing_semen_list->TotalRecs, $view_issuing_semen_list->RecRange, $view_issuing_semen_list->AutoHidePager) ?>
<?php if ($view_issuing_semen_list->Pager->RecordCount > 0 && $view_issuing_semen_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_issuing_semen_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_issuing_semen_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_issuing_semen_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_issuing_semen_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_issuing_semen_list->pageUrl() ?>start=<?php echo $view_issuing_semen_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_issuing_semen_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_issuing_semen_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_issuing_semen_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_issuing_semen_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_issuing_semen_list->TotalRecs > 0 && (!$view_issuing_semen_list->AutoHidePageSizeSelector || $view_issuing_semen_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_issuing_semen">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_issuing_semen_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_issuing_semen_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_issuing_semen_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_issuing_semen_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_issuing_semen_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_issuing_semen_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_issuing_semen->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_issuing_semen_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_issuing_semen_list->TotalRecs == 0 && !$view_issuing_semen->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_issuing_semen_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_issuing_semen_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_issuing_semen->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_issuing_semen->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_issuing_semen", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_issuing_semen_list->terminate();
?>