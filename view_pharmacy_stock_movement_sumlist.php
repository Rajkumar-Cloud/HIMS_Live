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
$view_pharmacy_stock_movement_sum_list = new view_pharmacy_stock_movement_sum_list();

// Run the page
$view_pharmacy_stock_movement_sum_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_stock_movement_sum_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_stock_movement_sum->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_stock_movement_sumlist = currentForm = new ew.Form("fview_pharmacy_stock_movement_sumlist", "list");
fview_pharmacy_stock_movement_sumlist.formKeyCountName = '<?php echo $view_pharmacy_stock_movement_sum_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_stock_movement_sumlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_stock_movement_sumlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_stock_movement_sumlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_stock_movement_sumlistsrch");

// Validate function for search
fview_pharmacy_stock_movement_sumlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_OpeningStk");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_stock_movement_sum->OpeningStk->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_UnitPurchaseRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_stock_movement_sum->UnitPurchaseRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CreatedDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_stock_movement_sum->CreatedDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalesQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_stock_movement_sum->SalesQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ClosingStk");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_stock_movement_sum->ClosingStk->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_stock_movement_sumlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_stock_movement_sumlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_stock_movement_sumlistsrch.filterList = <?php echo $view_pharmacy_stock_movement_sum_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_stock_movement_sum->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs > 0 && $view_pharmacy_stock_movement_sum_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_sum_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_sum_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_sum_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_sum_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_stock_movement_sum_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_stock_movement_sum->isExport() && !$view_pharmacy_stock_movement_sum->CurrentAction) { ?>
<form name="fview_pharmacy_stock_movement_sumlistsrch" id="fview_pharmacy_stock_movement_sumlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_stock_movement_sum_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_stock_movement_sumlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_stock_movement_sum">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_stock_movement_sum_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_stock_movement_sum->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_stock_movement_sum->resetAttributes();
$view_pharmacy_stock_movement_sum_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_stock_movement_sum->PRC->Visible) { // PRC ?>
	<div id="xsc_PRC" class="ew-cell form-group">
		<label for="x_PRC" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->PRC->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->PRC->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->PRC->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->PrName->Visible) { // PrName ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label for="x_PrName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->PrName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->PrName->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->PrName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_stock_movement_sum->OpeningStk->Visible) { // OpeningStk ?>
	<div id="xsc_OpeningStk" class="ew-cell form-group">
		<label for="x_OpeningStk" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->OpeningStk->caption() ?></label>
		<span class="ew-search-operator"><select name="z_OpeningStk" id="z_OpeningStk" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_stock_movement_sum->OpeningStk->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_OpeningStk" name="x_OpeningStk" id="x_OpeningStk" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->OpeningStk->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_OpeningStk style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_OpeningStk style="d-none"">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_OpeningStk" name="y_OpeningStk" id="y_OpeningStk" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->OpeningStk->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->EditValue2 ?>"<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
	<div id="xsc_UnitPurchaseRate" class="ew-cell form-group">
		<label for="x_UnitPurchaseRate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_UnitPurchaseRate" id="z_UnitPurchaseRate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_UnitPurchaseRate" name="x_UnitPurchaseRate" id="x_UnitPurchaseRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->UnitPurchaseRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_UnitPurchaseRate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_UnitPurchaseRate style="d-none"">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_UnitPurchaseRate" name="y_UnitPurchaseRate" id="y_UnitPurchaseRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->UnitPurchaseRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->EditValue2 ?>"<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_stock_movement_sum->CreatedDate->Visible) { // CreatedDate ?>
	<div id="xsc_CreatedDate" class="ew-cell form-group">
		<label for="x_CreatedDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->CreatedDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_CreatedDate" id="z_CreatedDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_stock_movement_sum->CreatedDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_CreatedDate" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->editAttributes() ?>>
<?php if (!$view_pharmacy_stock_movement_sum->CreatedDate->ReadOnly && !$view_pharmacy_stock_movement_sum->CreatedDate->Disabled && !isset($view_pharmacy_stock_movement_sum->CreatedDate->EditAttrs["readonly"]) && !isset($view_pharmacy_stock_movement_sum->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_stock_movement_sumlistsrch", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_CreatedDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_CreatedDate style="d-none"">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_CreatedDate" name="y_CreatedDate" id="y_CreatedDate" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->EditValue2 ?>"<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->editAttributes() ?>>
<?php if (!$view_pharmacy_stock_movement_sum->CreatedDate->ReadOnly && !$view_pharmacy_stock_movement_sum->CreatedDate->Disabled && !isset($view_pharmacy_stock_movement_sum->CreatedDate->EditAttrs["readonly"]) && !isset($view_pharmacy_stock_movement_sum->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_stock_movement_sumlistsrch", "y_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->SalesQty->Visible) { // SalesQty ?>
	<div id="xsc_SalesQty" class="ew-cell form-group">
		<label for="x_SalesQty" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->SalesQty->caption() ?></label>
		<span class="ew-search-operator"><select name="z_SalesQty" id="z_SalesQty" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_stock_movement_sum->SalesQty->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_SalesQty" name="x_SalesQty" id="x_SalesQty" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->SalesQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->SalesQty->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->SalesQty->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_SalesQty style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_SalesQty style="d-none"">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_SalesQty" name="y_SalesQty" id="y_SalesQty" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->SalesQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->SalesQty->EditValue2 ?>"<?php echo $view_pharmacy_stock_movement_sum->SalesQty->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_stock_movement_sum->ClosingStk->Visible) { // ClosingStk ?>
	<div id="xsc_ClosingStk" class="ew-cell form-group">
		<label for="x_ClosingStk" class="ew-search-caption ew-label"><?php echo $view_pharmacy_stock_movement_sum->ClosingStk->caption() ?></label>
		<span class="ew-search-operator"><select name="z_ClosingStk" id="z_ClosingStk" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_stock_movement_sum->ClosingStk->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_ClosingStk" name="x_ClosingStk" id="x_ClosingStk" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->ClosingStk->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->EditValue ?>"<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_ClosingStk style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_ClosingStk style="d-none"">
<input type="text" data-table="view_pharmacy_stock_movement_sum" data-field="x_ClosingStk" name="y_ClosingStk" id="y_ClosingStk" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum->ClosingStk->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->EditValue2 ?>"<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_stock_movement_sum_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_stock_movement_sum_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_sum_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_sum_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_sum_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_sum_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_stock_movement_sum_list->showPageHeader(); ?>
<?php
$view_pharmacy_stock_movement_sum_list->showMessage();
?>
<?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs > 0 || $view_pharmacy_stock_movement_sum->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_stock_movement_sum_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_stock_movement_sum">
<?php if (!$view_pharmacy_stock_movement_sum->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_stock_movement_sum->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_stock_movement_sum_list->Pager)) $view_pharmacy_stock_movement_sum_list->Pager = new NumericPager($view_pharmacy_stock_movement_sum_list->StartRec, $view_pharmacy_stock_movement_sum_list->DisplayRecs, $view_pharmacy_stock_movement_sum_list->TotalRecs, $view_pharmacy_stock_movement_sum_list->RecRange, $view_pharmacy_stock_movement_sum_list->AutoHidePager) ?>
<?php if ($view_pharmacy_stock_movement_sum_list->Pager->RecordCount > 0 && $view_pharmacy_stock_movement_sum_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_stock_movement_sum_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_stock_movement_sum_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_sum_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_sum_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_sum_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs > 0 && (!$view_pharmacy_stock_movement_sum_list->AutoHidePageSizeSelector || $view_pharmacy_stock_movement_sum_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_stock_movement_sum">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_stock_movement_sum->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_movement_sum_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_stock_movement_sumlist" id="fview_pharmacy_stock_movement_sumlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_stock_movement_sum_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_stock_movement_sum_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_stock_movement_sum">
<div id="gmp_view_pharmacy_stock_movement_sum" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs > 0 || $view_pharmacy_stock_movement_sum->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_stock_movement_sumlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_stock_movement_sum_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_stock_movement_sum_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_stock_movement_sum_list->ListOptions->render("header", "left", "", "block", $view_pharmacy_stock_movement_sum->TableVar, "view_pharmacy_stock_movement_sumlist");
?>
<?php if ($view_pharmacy_stock_movement_sum->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_stock_movement_sum->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sum_PRC"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->PRC->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_stock_movement_sum->PRC->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->PRC) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sum_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_stock_movement_sum->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sum_PrName"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->PrName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_stock_movement_sum->PrName->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->PrName) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sum_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->OpeningStk->Visible) { // OpeningStk ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->OpeningStk) == "") { ?>
		<th data-name="OpeningStk" class="<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sum_OpeningStk"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->OpeningStk->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningStk" class="<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->OpeningStk) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sum_OpeningStk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->OpeningStk->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->OpeningStk->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->OpeningStk->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->UnitPurchaseRate) == "") { ?>
		<th data-name="UnitPurchaseRate" class="<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sum_UnitPurchaseRate"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="UnitPurchaseRate" class="<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->UnitPurchaseRate) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sum_UnitPurchaseRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->UnitSaleRate->Visible) { // UnitSaleRate ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->UnitSaleRate) == "") { ?>
		<th data-name="UnitSaleRate" class="<?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sum_UnitSaleRate"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="UnitSaleRate" class="<?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->UnitSaleRate) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sum_UnitSaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->UnitSaleRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->UnitSaleRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->CreatedDate->Visible) { // CreatedDate ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->CreatedDate) == "") { ?>
		<th data-name="CreatedDate" class="<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sum_CreatedDate"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->CreatedDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDate" class="<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->CreatedDate) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sum_CreatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->CreatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->CreatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->CreatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_stock_movement_sum->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sum_HospID"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_stock_movement_sum->HospID->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->HospID) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sum_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->PurchaseQty->Visible) { // PurchaseQty ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->PurchaseQty) == "") { ?>
		<th data-name="PurchaseQty" class="<?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sum_PurchaseQty"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseQty" class="<?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->PurchaseQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sum_PurchaseQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->PurchaseQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->PurchaseQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->SalesQty->Visible) { // SalesQty ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->SalesQty) == "") { ?>
		<th data-name="SalesQty" class="<?php echo $view_pharmacy_stock_movement_sum->SalesQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sum_SalesQty"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->SalesQty->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="SalesQty" class="<?php echo $view_pharmacy_stock_movement_sum->SalesQty->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->SalesQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sum_SalesQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->SalesQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->SalesQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->SalesQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->ClosingStk->Visible) { // ClosingStk ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->ClosingStk) == "") { ?>
		<th data-name="ClosingStk" class="<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sum_ClosingStk"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->ClosingStk->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingStk" class="<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->ClosingStk) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sum_ClosingStk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->ClosingStk->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->ClosingStk->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->ClosingStk->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->PurchasefreeQty) == "") { ?>
		<th data-name="PurchasefreeQty" class="<?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sum_PurchasefreeQty"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurchasefreeQty" class="<?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->PurchasefreeQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sum_PurchasefreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->PurchasefreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->PurchasefreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->TransferingQty->Visible) { // TransferingQty ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->TransferingQty) == "") { ?>
		<th data-name="TransferingQty" class="<?php echo $view_pharmacy_stock_movement_sum->TransferingQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sum_TransferingQty"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->TransferingQty->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TransferingQty" class="<?php echo $view_pharmacy_stock_movement_sum->TransferingQty->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->TransferingQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sum_TransferingQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->TransferingQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->TransferingQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->TransferingQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_stock_movement_sum->sortUrl($view_pharmacy_stock_movement_sum->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_stock_movement_sum->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sum_BRCODE"><div class="ew-table-header-caption"><script id="tpc_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sumlist" type="text/html"><span><?php echo $view_pharmacy_stock_movement_sum->BRCODE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_stock_movement_sum->BRCODE->headerCellClass() ?>"><script id="tpc_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sumlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement_sum->SortUrl($view_pharmacy_stock_movement_sum->BRCODE) ?>',1);"><div id="elh_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sum_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement_sum->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement_sum->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement_sum->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_stock_movement_sum_list->ListOptions->render("header", "right", "", "block", $view_pharmacy_stock_movement_sum->TableVar, "view_pharmacy_stock_movement_sumlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_stock_movement_sum->ExportAll && $view_pharmacy_stock_movement_sum->isExport()) {
	$view_pharmacy_stock_movement_sum_list->StopRec = $view_pharmacy_stock_movement_sum_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_stock_movement_sum_list->TotalRecs > $view_pharmacy_stock_movement_sum_list->StartRec + $view_pharmacy_stock_movement_sum_list->DisplayRecs - 1)
		$view_pharmacy_stock_movement_sum_list->StopRec = $view_pharmacy_stock_movement_sum_list->StartRec + $view_pharmacy_stock_movement_sum_list->DisplayRecs - 1;
	else
		$view_pharmacy_stock_movement_sum_list->StopRec = $view_pharmacy_stock_movement_sum_list->TotalRecs;
}
$view_pharmacy_stock_movement_sum_list->RecCnt = $view_pharmacy_stock_movement_sum_list->StartRec - 1;
if ($view_pharmacy_stock_movement_sum_list->Recordset && !$view_pharmacy_stock_movement_sum_list->Recordset->EOF) {
	$view_pharmacy_stock_movement_sum_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_stock_movement_sum_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_stock_movement_sum_list->StartRec > 1)
		$view_pharmacy_stock_movement_sum_list->Recordset->move($view_pharmacy_stock_movement_sum_list->StartRec - 1);
} elseif (!$view_pharmacy_stock_movement_sum->AllowAddDeleteRow && $view_pharmacy_stock_movement_sum_list->StopRec == 0) {
	$view_pharmacy_stock_movement_sum_list->StopRec = $view_pharmacy_stock_movement_sum->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_stock_movement_sum->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_stock_movement_sum->resetAttributes();
$view_pharmacy_stock_movement_sum_list->renderRow();
while ($view_pharmacy_stock_movement_sum_list->RecCnt < $view_pharmacy_stock_movement_sum_list->StopRec) {
	$view_pharmacy_stock_movement_sum_list->RecCnt++;
	if ($view_pharmacy_stock_movement_sum_list->RecCnt >= $view_pharmacy_stock_movement_sum_list->StartRec) {
		$view_pharmacy_stock_movement_sum_list->RowCnt++;

		// Set up key count
		$view_pharmacy_stock_movement_sum_list->KeyCount = $view_pharmacy_stock_movement_sum_list->RowIndex;

		// Init row class and style
		$view_pharmacy_stock_movement_sum->resetAttributes();
		$view_pharmacy_stock_movement_sum->CssClass = "";
		if ($view_pharmacy_stock_movement_sum->isGridAdd()) {
		} else {
			$view_pharmacy_stock_movement_sum_list->loadRowValues($view_pharmacy_stock_movement_sum_list->Recordset); // Load row values
		}
		$view_pharmacy_stock_movement_sum->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_stock_movement_sum->RowAttrs = array_merge($view_pharmacy_stock_movement_sum->RowAttrs, array('data-rowindex'=>$view_pharmacy_stock_movement_sum_list->RowCnt, 'id'=>'r' . $view_pharmacy_stock_movement_sum_list->RowCnt . '_view_pharmacy_stock_movement_sum', 'data-rowtype'=>$view_pharmacy_stock_movement_sum->RowType));

		// Render row
		$view_pharmacy_stock_movement_sum_list->renderRow();

		// Render list options
		$view_pharmacy_stock_movement_sum_list->renderListOptions();

		// Save row and cell attributes
		$view_pharmacy_stock_movement_sum_list->Attrs[$view_pharmacy_stock_movement_sum_list->RowCnt] = array("row_attrs" => $view_pharmacy_stock_movement_sum->rowAttributes(), "cell_attrs" => array());
		$view_pharmacy_stock_movement_sum_list->Attrs[$view_pharmacy_stock_movement_sum_list->RowCnt]["cell_attrs"] = $view_pharmacy_stock_movement_sum->fieldCellAttributes();
?>
	<tr<?php echo $view_pharmacy_stock_movement_sum->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_stock_movement_sum_list->ListOptions->render("body", "left", $view_pharmacy_stock_movement_sum_list->RowCnt, "block", $view_pharmacy_stock_movement_sum->TableVar, "view_pharmacy_stock_movement_sumlist");
?>
	<?php if ($view_pharmacy_stock_movement_sum->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_stock_movement_sum->PRC->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PRC" class="view_pharmacy_stock_movement_sum_PRC">
<span<?php echo $view_pharmacy_stock_movement_sum->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->PRC->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_stock_movement_sum->PrName->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PrName" class="view_pharmacy_stock_movement_sum_PrName">
<span<?php echo $view_pharmacy_stock_movement_sum->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->PrName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->OpeningStk->Visible) { // OpeningStk ?>
		<td data-name="OpeningStk"<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_OpeningStk" class="view_pharmacy_stock_movement_sum_OpeningStk">
<span<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->OpeningStk->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
		<td data-name="UnitPurchaseRate"<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_UnitPurchaseRate" class="view_pharmacy_stock_movement_sum_UnitPurchaseRate">
<span<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->UnitPurchaseRate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->UnitSaleRate->Visible) { // UnitSaleRate ?>
		<td data-name="UnitSaleRate"<?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_UnitSaleRate" class="view_pharmacy_stock_movement_sum_UnitSaleRate">
<span<?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->UnitSaleRate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate"<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_CreatedDate" class="view_pharmacy_stock_movement_sum_CreatedDate">
<span<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->CreatedDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_stock_movement_sum->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_HospID" class="view_pharmacy_stock_movement_sum_HospID">
<span<?php echo $view_pharmacy_stock_movement_sum->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->PurchaseQty->Visible) { // PurchaseQty ?>
		<td data-name="PurchaseQty"<?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PurchaseQty" class="view_pharmacy_stock_movement_sum_PurchaseQty">
<span<?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->PurchaseQty->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->SalesQty->Visible) { // SalesQty ?>
		<td data-name="SalesQty"<?php echo $view_pharmacy_stock_movement_sum->SalesQty->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_SalesQty" class="view_pharmacy_stock_movement_sum_SalesQty">
<span<?php echo $view_pharmacy_stock_movement_sum->SalesQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->SalesQty->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->ClosingStk->Visible) { // ClosingStk ?>
		<td data-name="ClosingStk"<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_ClosingStk" class="view_pharmacy_stock_movement_sum_ClosingStk">
<span<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->ClosingStk->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
		<td data-name="PurchasefreeQty"<?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_PurchasefreeQty" class="view_pharmacy_stock_movement_sum_PurchasefreeQty">
<span<?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->PurchasefreeQty->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->TransferingQty->Visible) { // TransferingQty ?>
		<td data-name="TransferingQty"<?php echo $view_pharmacy_stock_movement_sum->TransferingQty->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_TransferingQty" class="view_pharmacy_stock_movement_sum_TransferingQty">
<span<?php echo $view_pharmacy_stock_movement_sum->TransferingQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->TransferingQty->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_stock_movement_sum->BRCODE->cellAttributes() ?>>
<script id="tpx<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sumlist" type="text/html">
<span id="el<?php echo $view_pharmacy_stock_movement_sum_list->RowCnt ?>_view_pharmacy_stock_movement_sum_BRCODE" class="view_pharmacy_stock_movement_sum_BRCODE">
<span<?php echo $view_pharmacy_stock_movement_sum->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement_sum->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_stock_movement_sum_list->ListOptions->render("body", "right", $view_pharmacy_stock_movement_sum_list->RowCnt, "block", $view_pharmacy_stock_movement_sum->TableVar, "view_pharmacy_stock_movement_sumlist");
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_stock_movement_sum->isGridAdd())
		$view_pharmacy_stock_movement_sum_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_stock_movement_sum->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_pharmacy_stock_movement_sumlist" class="ew-custom-template"></div>
<script id="tpm_view_pharmacy_stock_movement_sumlist" type="text/html">
<div id="ct_view_pharmacy_stock_movement_sum_list"><?php if ($view_pharmacy_stock_movement_sum_list->RowCnt > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $view_pharmacy_stock_movement_sum_list->StartRowCnt; $i <= $view_pharmacy_stock_movement_sum_list->RowCnt; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs > 0 && !$view_pharmacy_stock_movement_sum->isGridAdd() && !$view_pharmacy_stock_movement_sum->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{

	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
	(int)$SumAmount = 0;
	$sql = "SELECT 
prc, prname,
	SUM(OpeningStk) AS `OpeningStk`,
		SUM(PurchaseQty) AS `PurchaseQty`,
		SUM(SalesQty) AS `SalesQty`,
		SUM(ClosingStk) AS `ClosingStk`,
		SUM(PurchasefreeQty) AS `PurchasefreeQty`,
		SUM(TransferingQty) AS `TransferingQty`,
		`UnitPurchaseRate`,
	   `UnitSaleRate`
 FROM ganeshkumar_bjhims.view_pharmacy_stock_movement_sum
 where  HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' 
  group by prc, prname ;";
 	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>PRC</b></td>
<td><b align="right">PrName</b></td>
<td><b align="right">OpeningStk</b></td>
<td><b align="right">PurchaseQty</b></td>
<td><b align="right">SalesQty</b></td>
<td><b align="right">ClosingStk</b></td>
<td><b align="right">PurchasefreeQty</b></td>
<td><b align="right">TransferingQty</b></td>
<td><b align="right">UnitPurchaseRate</b></td>
<td><b align="right">UnitSaleRate</b></td>
<td><b align="right">CANCEL</b></td>
<td><b align="right">Total</b></td>
</tr>';
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["prc"];				
$CARD =  $results2[$x]["prname"];
$CASH =  $results2[$x]["OpeningStk"];
$NEFT =  $results2[$x]["PurchaseQty"];
$PAYTM =  $results2[$x]["SalesQty"];
$CHEQUE =  $results2[$x]["ClosingStk"];
$RTGS =  $results2[$x]["PurchasefreeQty"];
$AdjAdvance =  $results2[$x]["TransferingQty"];
$NotSelected =  $results2[$x]["UnitPurchaseRate"];
$REFUND =  $results2[$x]["UnitSaleRate"];
				$hhh .= '<tr><td>'.$UserName.'</td><td align="Left">'.$CARD.'</td><td align="right">'.$CASH.'</td>
				<td align="right">'.$NEFT.'</td><td align="right">'.$PAYTM.'</td><td align="right">'.$CHEQUE.'</td>
				<td align="right">'.$RTGS.'</td><td align="right">'.$AdjAdvance.'</td><td align="right">'.$NotSelected.'</td><td align="right">'.$REFUND.'</td>
				</tr>  ';
}
$hhh .= '</table>  ';
echo $hhh;
?>
	</div>
</div>
	</div>
</div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_stock_movement_sum_list->Recordset)
	$view_pharmacy_stock_movement_sum_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_stock_movement_sum->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_stock_movement_sum->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_stock_movement_sum_list->Pager)) $view_pharmacy_stock_movement_sum_list->Pager = new NumericPager($view_pharmacy_stock_movement_sum_list->StartRec, $view_pharmacy_stock_movement_sum_list->DisplayRecs, $view_pharmacy_stock_movement_sum_list->TotalRecs, $view_pharmacy_stock_movement_sum_list->RecRange, $view_pharmacy_stock_movement_sum_list->AutoHidePager) ?>
<?php if ($view_pharmacy_stock_movement_sum_list->Pager->RecordCount > 0 && $view_pharmacy_stock_movement_sum_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_stock_movement_sum_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_stock_movement_sum_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_sum_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_sum_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_sum_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_sum_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_sum_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_sum_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs > 0 && (!$view_pharmacy_stock_movement_sum_list->AutoHidePageSizeSelector || $view_pharmacy_stock_movement_sum_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_stock_movement_sum">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_stock_movement_sum_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_stock_movement_sum->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_movement_sum_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_stock_movement_sum_list->TotalRecs == 0 && !$view_pharmacy_stock_movement_sum->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_movement_sum_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_pharmacy_stock_movement_sum->Rows) ?> };
ew.applyTemplate("tpd_view_pharmacy_stock_movement_sumlist", "tpm_view_pharmacy_stock_movement_sumlist", "view_pharmacy_stock_movement_sumlist", "<?php echo $view_pharmacy_stock_movement_sum->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_pharmacy_stock_movement_sumlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_pharmacy_stock_movement_sumlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_pharmacy_stock_movement_sumlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_pharmacy_stock_movement_sum_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_stock_movement_sum->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_stock_movement_sum->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_stock_movement_sum", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_stock_movement_sum_list->terminate();
?>