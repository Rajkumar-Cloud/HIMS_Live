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
$pharmacy_stock_movement_list = new pharmacy_stock_movement_list();

// Run the page
$pharmacy_stock_movement_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_stock_movement_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_stock_movementlist = currentForm = new ew.Form("fpharmacy_stock_movementlist", "list");
fpharmacy_stock_movementlist.formKeyCountName = '<?php echo $pharmacy_stock_movement_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_stock_movementlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_stock_movementlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_stock_movementlistsrch = currentSearchForm = new ew.Form("fpharmacy_stock_movementlistsrch");

// Validate function for search
fpharmacy_stock_movementlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_OpeningStk");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->OpeningStk->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurchaseQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->PurchaseQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalesQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->SalesQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ClosingStk");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->ClosingStk->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurchasefreeQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->PurchasefreeQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TransferingQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->TransferingQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CreatedDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_stock_movement->CreatedDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_stock_movementlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_stock_movementlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpharmacy_stock_movementlistsrch.filterList = <?php echo $pharmacy_stock_movement_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_stock_movement_list->TotalRecs > 0 && $pharmacy_stock_movement_list->ExportOptions->visible()) { ?>
<?php $pharmacy_stock_movement_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->ImportOptions->visible()) { ?>
<?php $pharmacy_stock_movement_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->SearchOptions->visible()) { ?>
<?php $pharmacy_stock_movement_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->FilterOptions->visible()) { ?>
<?php $pharmacy_stock_movement_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_stock_movement_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_stock_movement->isExport() && !$pharmacy_stock_movement->CurrentAction) { ?>
<form name="fpharmacy_stock_movementlistsrch" id="fpharmacy_stock_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_stock_movement_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_stock_movementlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_stock_movement">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pharmacy_stock_movement_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pharmacy_stock_movement->RowType = ROWTYPE_SEARCH;

// Render row
$pharmacy_stock_movement->resetAttributes();
$pharmacy_stock_movement_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
	<div id="xsc_PRC" class="ew-cell form-group">
		<label for="x_PRC" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->PRC->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PRC->EditValue ?>"<?php echo $pharmacy_stock_movement->PRC->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
	<div id="xsc_OpeningStk" class="ew-cell form-group">
		<label for="x_OpeningStk" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->OpeningStk->caption() ?></label>
		<span class="ew-search-operator"><select name="z_OpeningStk" id="z_OpeningStk" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->OpeningStk->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OpeningStk" name="x_OpeningStk" id="x_OpeningStk" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OpeningStk->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OpeningStk->EditValue ?>"<?php echo $pharmacy_stock_movement->OpeningStk->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_OpeningStk style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_OpeningStk style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_OpeningStk" name="y_OpeningStk" id="y_OpeningStk" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->OpeningStk->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->OpeningStk->EditValue2 ?>"<?php echo $pharmacy_stock_movement->OpeningStk->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
	<div id="xsc_PurchaseQty" class="ew-cell form-group">
		<label for="x_PurchaseQty" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->PurchaseQty->caption() ?></label>
		<span class="ew-search-operator"><select name="z_PurchaseQty" id="z_PurchaseQty" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->PurchaseQty->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PurchaseQty" name="x_PurchaseQty" id="x_PurchaseQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PurchaseQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PurchaseQty->EditValue ?>"<?php echo $pharmacy_stock_movement->PurchaseQty->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_PurchaseQty style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_PurchaseQty style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PurchaseQty" name="y_PurchaseQty" id="y_PurchaseQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PurchaseQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PurchaseQty->EditValue2 ?>"<?php echo $pharmacy_stock_movement->PurchaseQty->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
	<div id="xsc_SalesQty" class="ew-cell form-group">
		<label for="x_SalesQty" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->SalesQty->caption() ?></label>
		<span class="ew-search-operator"><select name="z_SalesQty" id="z_SalesQty" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->SalesQty->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_SalesQty" name="x_SalesQty" id="x_SalesQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->SalesQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->SalesQty->EditValue ?>"<?php echo $pharmacy_stock_movement->SalesQty->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_SalesQty style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_SalesQty style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_SalesQty" name="y_SalesQty" id="y_SalesQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->SalesQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->SalesQty->EditValue2 ?>"<?php echo $pharmacy_stock_movement->SalesQty->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
	<div id="xsc_ClosingStk" class="ew-cell form-group">
		<label for="x_ClosingStk" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->ClosingStk->caption() ?></label>
		<span class="ew-search-operator"><select name="z_ClosingStk" id="z_ClosingStk" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->ClosingStk->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_ClosingStk" name="x_ClosingStk" id="x_ClosingStk" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->ClosingStk->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->ClosingStk->EditValue ?>"<?php echo $pharmacy_stock_movement->ClosingStk->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_ClosingStk style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_ClosingStk style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_ClosingStk" name="y_ClosingStk" id="y_ClosingStk" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->ClosingStk->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->ClosingStk->EditValue2 ?>"<?php echo $pharmacy_stock_movement->ClosingStk->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
	<div id="xsc_PurchasefreeQty" class="ew-cell form-group">
		<label for="x_PurchasefreeQty" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->PurchasefreeQty->caption() ?></label>
		<span class="ew-search-operator"><select name="z_PurchasefreeQty" id="z_PurchasefreeQty" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->PurchasefreeQty->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PurchasefreeQty" name="x_PurchasefreeQty" id="x_PurchasefreeQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PurchasefreeQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PurchasefreeQty->EditValue ?>"<?php echo $pharmacy_stock_movement->PurchasefreeQty->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_PurchasefreeQty style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_PurchasefreeQty style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_PurchasefreeQty" name="y_PurchasefreeQty" id="y_PurchasefreeQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->PurchasefreeQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->PurchasefreeQty->EditValue2 ?>"<?php echo $pharmacy_stock_movement->PurchasefreeQty->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
	<div id="xsc_TransferingQty" class="ew-cell form-group">
		<label for="x_TransferingQty" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->TransferingQty->caption() ?></label>
		<span class="ew-search-operator"><select name="z_TransferingQty" id="z_TransferingQty" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->TransferingQty->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_TransferingQty" name="x_TransferingQty" id="x_TransferingQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->TransferingQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->TransferingQty->EditValue ?>"<?php echo $pharmacy_stock_movement->TransferingQty->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_TransferingQty style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_TransferingQty style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_TransferingQty" name="y_TransferingQty" id="y_TransferingQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->TransferingQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->TransferingQty->EditValue2 ?>"<?php echo $pharmacy_stock_movement->TransferingQty->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<div id="xsc_CreatedDate" class="ew-cell form-group">
		<label for="x_CreatedDate" class="ew-search-caption ew-label"><?php echo $pharmacy_stock_movement->CreatedDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_CreatedDate" id="z_CreatedDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_stock_movement->CreatedDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_CreatedDate" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->CreatedDate->EditValue ?>"<?php echo $pharmacy_stock_movement->CreatedDate->editAttributes() ?>>
<?php if (!$pharmacy_stock_movement->CreatedDate->ReadOnly && !$pharmacy_stock_movement->CreatedDate->Disabled && !isset($pharmacy_stock_movement->CreatedDate->EditAttrs["readonly"]) && !isset($pharmacy_stock_movement->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_stock_movementlistsrch", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_CreatedDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_CreatedDate style="d-none"">
<input type="text" data-table="pharmacy_stock_movement" data-field="x_CreatedDate" name="y_CreatedDate" id="y_CreatedDate" placeholder="<?php echo HtmlEncode($pharmacy_stock_movement->CreatedDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_stock_movement->CreatedDate->EditValue2 ?>"<?php echo $pharmacy_stock_movement->CreatedDate->editAttributes() ?>>
<?php if (!$pharmacy_stock_movement->CreatedDate->ReadOnly && !$pharmacy_stock_movement->CreatedDate->Disabled && !isset($pharmacy_stock_movement->CreatedDate->EditAttrs["readonly"]) && !isset($pharmacy_stock_movement->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_stock_movementlistsrch", "y_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_stock_movement_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_stock_movement_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_stock_movement_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_stock_movement_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_stock_movement_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_stock_movement_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_stock_movement_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_stock_movement_list->showPageHeader(); ?>
<?php
$pharmacy_stock_movement_list->showMessage();
?>
<?php if ($pharmacy_stock_movement_list->TotalRecs > 0 || $pharmacy_stock_movement->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_stock_movement_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_stock_movement">
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_stock_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_stock_movement_list->Pager)) $pharmacy_stock_movement_list->Pager = new NumericPager($pharmacy_stock_movement_list->StartRec, $pharmacy_stock_movement_list->DisplayRecs, $pharmacy_stock_movement_list->TotalRecs, $pharmacy_stock_movement_list->RecRange, $pharmacy_stock_movement_list->AutoHidePager) ?>
<?php if ($pharmacy_stock_movement_list->Pager->RecordCount > 0 && $pharmacy_stock_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_stock_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_stock_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_stock_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_stock_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_stock_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_stock_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_stock_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_stock_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_stock_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->TotalRecs > 0 && (!$pharmacy_stock_movement_list->AutoHidePageSizeSelector || $pharmacy_stock_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_stock_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_stock_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_stock_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_stock_movementlist" id="fpharmacy_stock_movementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_stock_movement_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_stock_movement_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_stock_movement">
<div id="gmp_pharmacy_stock_movement" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_stock_movement_list->TotalRecs > 0 || $pharmacy_stock_movement->isGridEdit()) { ?>
<table id="tbl_pharmacy_stock_movementlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_stock_movement_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_stock_movement_list->renderListOptions();

// Render list options (header, left)
$pharmacy_stock_movement_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_stock_movement->id->Visible) { // id ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_stock_movement->id->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_stock_movement->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->id) ?>',1);"><div id="elh_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_stock_movement->PRC->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_stock_movement->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PRC) ?>',1);"><div id="elh_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_stock_movement->PrName->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_stock_movement->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PrName) ?>',1);"><div id="elh_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_stock_movement->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_stock_movement->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->BATCHNO) ?>',1);"><div id="elh_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->OpeningStk) == "") { ?>
		<th data-name="OpeningStk" class="<?php echo $pharmacy_stock_movement->OpeningStk->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OpeningStk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningStk" class="<?php echo $pharmacy_stock_movement->OpeningStk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->OpeningStk) ?>',1);"><div id="elh_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OpeningStk->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->OpeningStk->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->OpeningStk->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PurchaseQty) == "") { ?>
		<th data-name="PurchaseQty" class="<?php echo $pharmacy_stock_movement->PurchaseQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PurchaseQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseQty" class="<?php echo $pharmacy_stock_movement->PurchaseQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PurchaseQty) ?>',1);"><div id="elh_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PurchaseQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PurchaseQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PurchaseQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->SalesQty) == "") { ?>
		<th data-name="SalesQty" class="<?php echo $pharmacy_stock_movement->SalesQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->SalesQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesQty" class="<?php echo $pharmacy_stock_movement->SalesQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->SalesQty) ?>',1);"><div id="elh_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->SalesQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->SalesQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->SalesQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->ClosingStk) == "") { ?>
		<th data-name="ClosingStk" class="<?php echo $pharmacy_stock_movement->ClosingStk->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->ClosingStk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingStk" class="<?php echo $pharmacy_stock_movement->ClosingStk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->ClosingStk) ?>',1);"><div id="elh_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->ClosingStk->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->ClosingStk->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->ClosingStk->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PurchasefreeQty) == "") { ?>
		<th data-name="PurchasefreeQty" class="<?php echo $pharmacy_stock_movement->PurchasefreeQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PurchasefreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchasefreeQty" class="<?php echo $pharmacy_stock_movement->PurchasefreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PurchasefreeQty) ?>',1);"><div id="elh_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PurchasefreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PurchasefreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PurchasefreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->TransferingQty) == "") { ?>
		<th data-name="TransferingQty" class="<?php echo $pharmacy_stock_movement->TransferingQty->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->TransferingQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferingQty" class="<?php echo $pharmacy_stock_movement->TransferingQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->TransferingQty) ?>',1);"><div id="elh_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->TransferingQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->TransferingQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->TransferingQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->UnitPurchaseRate) == "") { ?>
		<th data-name="UnitPurchaseRate" class="<?php echo $pharmacy_stock_movement->UnitPurchaseRate->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UnitPurchaseRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitPurchaseRate" class="<?php echo $pharmacy_stock_movement->UnitPurchaseRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->UnitPurchaseRate) ?>',1);"><div id="elh_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UnitPurchaseRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->UnitPurchaseRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->UnitPurchaseRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->UnitSaleRate) == "") { ?>
		<th data-name="UnitSaleRate" class="<?php echo $pharmacy_stock_movement->UnitSaleRate->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UnitSaleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitSaleRate" class="<?php echo $pharmacy_stock_movement->UnitSaleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->UnitSaleRate) ?>',1);"><div id="elh_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UnitSaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->UnitSaleRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->UnitSaleRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->CreatedDate) == "") { ?>
		<th data-name="CreatedDate" class="<?php echo $pharmacy_stock_movement->CreatedDate->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->CreatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDate" class="<?php echo $pharmacy_stock_movement->CreatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->CreatedDate) ?>',1);"><div id="elh_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->CreatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->CreatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->CreatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->OQ->Visible) { // OQ ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $pharmacy_stock_movement->OQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $pharmacy_stock_movement->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->OQ) ?>',1);"><div id="elh_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->RQ->Visible) { // RQ ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $pharmacy_stock_movement->RQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $pharmacy_stock_movement->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->RQ) ?>',1);"><div id="elh_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->RQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->RQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRQ->Visible) { // MRQ ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $pharmacy_stock_movement->MRQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $pharmacy_stock_movement->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->MRQ) ?>',1);"><div id="elh_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_stock_movement->IQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_stock_movement->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->IQ) ?>',1);"><div id="elh_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_stock_movement->MRP->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_stock_movement->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->MRP) ?>',1);"><div id="elh_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_stock_movement->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_stock_movement->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->EXPDT) ?>',1);"><div id="elh_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->UR->Visible) { // UR ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_stock_movement->UR->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_stock_movement->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->UR) ?>',1);"><div id="elh_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->RT->Visible) { // RT ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_stock_movement->RT->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_stock_movement->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->RT) ?>',1);"><div id="elh_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRCODE->Visible) { // PRCODE ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $pharmacy_stock_movement->PRCODE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $pharmacy_stock_movement->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PRCODE) ?>',1);"><div id="elh_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCH->Visible) { // BATCH ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $pharmacy_stock_movement->BATCH->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $pharmacy_stock_movement->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->BATCH) ?>',1);"><div id="elh_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->BATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->BATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PC->Visible) { // PC ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $pharmacy_stock_movement->PC->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $pharmacy_stock_movement->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PC) ?>',1);"><div id="elh_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRT->Visible) { // OLDRT ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->OLDRT) == "") { ?>
		<th data-name="OLDRT" class="<?php echo $pharmacy_stock_movement->OLDRT->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OLDRT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRT" class="<?php echo $pharmacy_stock_movement->OLDRT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->OLDRT) ?>',1);"><div id="elh_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OLDRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->OLDRT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->OLDRT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->TEMPMRQ) == "") { ?>
		<th data-name="TEMPMRQ" class="<?php echo $pharmacy_stock_movement->TEMPMRQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->TEMPMRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMPMRQ" class="<?php echo $pharmacy_stock_movement->TEMPMRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->TEMPMRQ) ?>',1);"><div id="elh_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->TEMPMRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->TEMPMRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->TEMPMRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->TAXP->Visible) { // TAXP ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->TAXP) == "") { ?>
		<th data-name="TAXP" class="<?php echo $pharmacy_stock_movement->TAXP->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->TAXP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXP" class="<?php echo $pharmacy_stock_movement->TAXP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->TAXP) ?>',1);"><div id="elh_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->TAXP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->TAXP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->TAXP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRATE->Visible) { // OLDRATE ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->OLDRATE) == "") { ?>
		<th data-name="OLDRATE" class="<?php echo $pharmacy_stock_movement->OLDRATE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OLDRATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OLDRATE" class="<?php echo $pharmacy_stock_movement->OLDRATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->OLDRATE) ?>',1);"><div id="elh_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OLDRATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->OLDRATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->OLDRATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->NEWRATE->Visible) { // NEWRATE ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->NEWRATE) == "") { ?>
		<th data-name="NEWRATE" class="<?php echo $pharmacy_stock_movement->NEWRATE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->NEWRATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEWRATE" class="<?php echo $pharmacy_stock_movement->NEWRATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->NEWRATE) ?>',1);"><div id="elh_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->NEWRATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->NEWRATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->NEWRATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->OTEMPMRA) == "") { ?>
		<th data-name="OTEMPMRA" class="<?php echo $pharmacy_stock_movement->OTEMPMRA->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OTEMPMRA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OTEMPMRA" class="<?php echo $pharmacy_stock_movement->OTEMPMRA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->OTEMPMRA) ?>',1);"><div id="elh_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->OTEMPMRA->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->OTEMPMRA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->OTEMPMRA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->ACTIVESTATUS) == "") { ?>
		<th data-name="ACTIVESTATUS" class="<?php echo $pharmacy_stock_movement->ACTIVESTATUS->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->ACTIVESTATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ACTIVESTATUS" class="<?php echo $pharmacy_stock_movement->ACTIVESTATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->ACTIVESTATUS) ?>',1);"><div id="elh_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->ACTIVESTATUS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->ACTIVESTATUS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->ACTIVESTATUS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PSGST->Visible) { // PSGST ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_stock_movement->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_stock_movement->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PSGST) ?>',1);"><div id="elh_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->PCGST->Visible) { // PCGST ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_stock_movement->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_stock_movement->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->PCGST) ?>',1);"><div id="elh_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_stock_movement->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_stock_movement->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->SSGST) ?>',1);"><div id="elh_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_stock_movement->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_stock_movement->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->SCGST) ?>',1);"><div id="elh_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_stock_movement->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_stock_movement->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->MFRCODE) ?>',1);"><div id="elh_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_stock_movement->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_stock_movement->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->BRCODE) ?>',1);"><div id="elh_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->FRQ->Visible) { // FRQ ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->FRQ) == "") { ?>
		<th data-name="FRQ" class="<?php echo $pharmacy_stock_movement->FRQ->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->FRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FRQ" class="<?php echo $pharmacy_stock_movement->FRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->FRQ) ?>',1);"><div id="elh_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->FRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->FRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->FRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_stock_movement->HospID->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_stock_movement->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->HospID) ?>',1);"><div id="elh_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->UM->Visible) { // UM ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $pharmacy_stock_movement->UM->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $pharmacy_stock_movement->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->UM) ?>',1);"><div id="elh_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->UM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->UM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_stock_movement->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_stock_movement->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->GENNAME) ?>',1);"><div id="elh_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $pharmacy_stock_movement->BILLDATE->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $pharmacy_stock_movement->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->BILLDATE) ?>',1);"><div id="elh_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->BILLDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->BILLDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_stock_movement->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_stock_movement->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->CreatedDateTime) ?>',1);"><div id="elh_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_stock_movement->baid->Visible) { // baid ?>
	<?php if ($pharmacy_stock_movement->sortUrl($pharmacy_stock_movement->baid) == "") { ?>
		<th data-name="baid" class="<?php echo $pharmacy_stock_movement->baid->headerCellClass() ?>"><div id="elh_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid"><div class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->baid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="baid" class="<?php echo $pharmacy_stock_movement->baid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_stock_movement->SortUrl($pharmacy_stock_movement->baid) ?>',1);"><div id="elh_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_stock_movement->baid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_stock_movement->baid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_stock_movement->baid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_stock_movement_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_stock_movement->ExportAll && $pharmacy_stock_movement->isExport()) {
	$pharmacy_stock_movement_list->StopRec = $pharmacy_stock_movement_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_stock_movement_list->TotalRecs > $pharmacy_stock_movement_list->StartRec + $pharmacy_stock_movement_list->DisplayRecs - 1)
		$pharmacy_stock_movement_list->StopRec = $pharmacy_stock_movement_list->StartRec + $pharmacy_stock_movement_list->DisplayRecs - 1;
	else
		$pharmacy_stock_movement_list->StopRec = $pharmacy_stock_movement_list->TotalRecs;
}
$pharmacy_stock_movement_list->RecCnt = $pharmacy_stock_movement_list->StartRec - 1;
if ($pharmacy_stock_movement_list->Recordset && !$pharmacy_stock_movement_list->Recordset->EOF) {
	$pharmacy_stock_movement_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_stock_movement_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_stock_movement_list->StartRec > 1)
		$pharmacy_stock_movement_list->Recordset->move($pharmacy_stock_movement_list->StartRec - 1);
} elseif (!$pharmacy_stock_movement->AllowAddDeleteRow && $pharmacy_stock_movement_list->StopRec == 0) {
	$pharmacy_stock_movement_list->StopRec = $pharmacy_stock_movement->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_stock_movement->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_stock_movement->resetAttributes();
$pharmacy_stock_movement_list->renderRow();
while ($pharmacy_stock_movement_list->RecCnt < $pharmacy_stock_movement_list->StopRec) {
	$pharmacy_stock_movement_list->RecCnt++;
	if ($pharmacy_stock_movement_list->RecCnt >= $pharmacy_stock_movement_list->StartRec) {
		$pharmacy_stock_movement_list->RowCnt++;

		// Set up key count
		$pharmacy_stock_movement_list->KeyCount = $pharmacy_stock_movement_list->RowIndex;

		// Init row class and style
		$pharmacy_stock_movement->resetAttributes();
		$pharmacy_stock_movement->CssClass = "";
		if ($pharmacy_stock_movement->isGridAdd()) {
		} else {
			$pharmacy_stock_movement_list->loadRowValues($pharmacy_stock_movement_list->Recordset); // Load row values
		}
		$pharmacy_stock_movement->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_stock_movement->RowAttrs = array_merge($pharmacy_stock_movement->RowAttrs, array('data-rowindex'=>$pharmacy_stock_movement_list->RowCnt, 'id'=>'r' . $pharmacy_stock_movement_list->RowCnt . '_pharmacy_stock_movement', 'data-rowtype'=>$pharmacy_stock_movement->RowType));

		// Render row
		$pharmacy_stock_movement_list->renderRow();

		// Render list options
		$pharmacy_stock_movement_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_stock_movement->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_stock_movement_list->ListOptions->render("body", "left", $pharmacy_stock_movement_list->RowCnt);
?>
	<?php if ($pharmacy_stock_movement->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_stock_movement->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id">
<span<?php echo $pharmacy_stock_movement->id->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_stock_movement->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC">
<span<?php echo $pharmacy_stock_movement->PRC->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $pharmacy_stock_movement->PrName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName">
<span<?php echo $pharmacy_stock_movement->PrName->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $pharmacy_stock_movement->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO">
<span<?php echo $pharmacy_stock_movement->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
		<td data-name="OpeningStk"<?php echo $pharmacy_stock_movement->OpeningStk->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk">
<span<?php echo $pharmacy_stock_movement->OpeningStk->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OpeningStk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
		<td data-name="PurchaseQty"<?php echo $pharmacy_stock_movement->PurchaseQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty">
<span<?php echo $pharmacy_stock_movement->PurchaseQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PurchaseQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
		<td data-name="SalesQty"<?php echo $pharmacy_stock_movement->SalesQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty">
<span<?php echo $pharmacy_stock_movement->SalesQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SalesQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
		<td data-name="ClosingStk"<?php echo $pharmacy_stock_movement->ClosingStk->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk">
<span<?php echo $pharmacy_stock_movement->ClosingStk->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->ClosingStk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
		<td data-name="PurchasefreeQty"<?php echo $pharmacy_stock_movement->PurchasefreeQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty">
<span<?php echo $pharmacy_stock_movement->PurchasefreeQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
		<td data-name="TransferingQty"<?php echo $pharmacy_stock_movement->TransferingQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty">
<span<?php echo $pharmacy_stock_movement->TransferingQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TransferingQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
		<td data-name="UnitPurchaseRate"<?php echo $pharmacy_stock_movement->UnitPurchaseRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate">
<span<?php echo $pharmacy_stock_movement->UnitPurchaseRate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
		<td data-name="UnitSaleRate"<?php echo $pharmacy_stock_movement->UnitSaleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate">
<span<?php echo $pharmacy_stock_movement->UnitSaleRate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate"<?php echo $pharmacy_stock_movement->CreatedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate">
<span<?php echo $pharmacy_stock_movement->CreatedDate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->CreatedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $pharmacy_stock_movement->OQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ">
<span<?php echo $pharmacy_stock_movement->OQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->RQ->Visible) { // RQ ?>
		<td data-name="RQ"<?php echo $pharmacy_stock_movement->RQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ">
<span<?php echo $pharmacy_stock_movement->RQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->RQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $pharmacy_stock_movement->MRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ">
<span<?php echo $pharmacy_stock_movement->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $pharmacy_stock_movement->IQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ">
<span<?php echo $pharmacy_stock_movement->IQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $pharmacy_stock_movement->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP">
<span<?php echo $pharmacy_stock_movement->MRP->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $pharmacy_stock_movement->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT">
<span<?php echo $pharmacy_stock_movement->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $pharmacy_stock_movement->UR->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR">
<span<?php echo $pharmacy_stock_movement->UR->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $pharmacy_stock_movement->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT">
<span<?php echo $pharmacy_stock_movement->RT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE"<?php echo $pharmacy_stock_movement->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE">
<span<?php echo $pharmacy_stock_movement->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH"<?php echo $pharmacy_stock_movement->BATCH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH">
<span<?php echo $pharmacy_stock_movement->BATCH->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $pharmacy_stock_movement->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC">
<span<?php echo $pharmacy_stock_movement->PC->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->OLDRT->Visible) { // OLDRT ?>
		<td data-name="OLDRT"<?php echo $pharmacy_stock_movement->OLDRT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT">
<span<?php echo $pharmacy_stock_movement->OLDRT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OLDRT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<td data-name="TEMPMRQ"<?php echo $pharmacy_stock_movement->TEMPMRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ">
<span<?php echo $pharmacy_stock_movement->TEMPMRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->TAXP->Visible) { // TAXP ?>
		<td data-name="TAXP"<?php echo $pharmacy_stock_movement->TAXP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP">
<span<?php echo $pharmacy_stock_movement->TAXP->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TAXP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->OLDRATE->Visible) { // OLDRATE ?>
		<td data-name="OLDRATE"<?php echo $pharmacy_stock_movement->OLDRATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE">
<span<?php echo $pharmacy_stock_movement->OLDRATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OLDRATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->NEWRATE->Visible) { // NEWRATE ?>
		<td data-name="NEWRATE"<?php echo $pharmacy_stock_movement->NEWRATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE">
<span<?php echo $pharmacy_stock_movement->NEWRATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->NEWRATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<td data-name="OTEMPMRA"<?php echo $pharmacy_stock_movement->OTEMPMRA->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA">
<span<?php echo $pharmacy_stock_movement->OTEMPMRA->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<td data-name="ACTIVESTATUS"<?php echo $pharmacy_stock_movement->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS">
<span<?php echo $pharmacy_stock_movement->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $pharmacy_stock_movement->PSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST">
<span<?php echo $pharmacy_stock_movement->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $pharmacy_stock_movement->PCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST">
<span<?php echo $pharmacy_stock_movement->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $pharmacy_stock_movement->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST">
<span<?php echo $pharmacy_stock_movement->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $pharmacy_stock_movement->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST">
<span<?php echo $pharmacy_stock_movement->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $pharmacy_stock_movement->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE">
<span<?php echo $pharmacy_stock_movement->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_stock_movement->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE">
<span<?php echo $pharmacy_stock_movement->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->FRQ->Visible) { // FRQ ?>
		<td data-name="FRQ"<?php echo $pharmacy_stock_movement->FRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ">
<span<?php echo $pharmacy_stock_movement->FRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->FRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_stock_movement->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID">
<span<?php echo $pharmacy_stock_movement->HospID->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->UM->Visible) { // UM ?>
		<td data-name="UM"<?php echo $pharmacy_stock_movement->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM">
<span<?php echo $pharmacy_stock_movement->UM->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $pharmacy_stock_movement->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME">
<span<?php echo $pharmacy_stock_movement->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE"<?php echo $pharmacy_stock_movement->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE">
<span<?php echo $pharmacy_stock_movement->BILLDATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $pharmacy_stock_movement->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime">
<span<?php echo $pharmacy_stock_movement->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_stock_movement->baid->Visible) { // baid ?>
		<td data-name="baid"<?php echo $pharmacy_stock_movement->baid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_list->RowCnt ?>_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid">
<span<?php echo $pharmacy_stock_movement->baid->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->baid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_stock_movement_list->ListOptions->render("body", "right", $pharmacy_stock_movement_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_stock_movement->isGridAdd())
		$pharmacy_stock_movement_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_stock_movement->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_stock_movement_list->Recordset)
	$pharmacy_stock_movement_list->Recordset->Close();
?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_stock_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_stock_movement_list->Pager)) $pharmacy_stock_movement_list->Pager = new NumericPager($pharmacy_stock_movement_list->StartRec, $pharmacy_stock_movement_list->DisplayRecs, $pharmacy_stock_movement_list->TotalRecs, $pharmacy_stock_movement_list->RecRange, $pharmacy_stock_movement_list->AutoHidePager) ?>
<?php if ($pharmacy_stock_movement_list->Pager->RecordCount > 0 && $pharmacy_stock_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_stock_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_stock_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_stock_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_stock_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_stock_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_stock_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $pharmacy_stock_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_stock_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_stock_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_stock_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_stock_movement_list->TotalRecs > 0 && (!$pharmacy_stock_movement_list->AutoHidePageSizeSelector || $pharmacy_stock_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_stock_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_stock_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_stock_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_stock_movement_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_stock_movement_list->TotalRecs == 0 && !$pharmacy_stock_movement->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_stock_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_stock_movement_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_stock_movement", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_stock_movement_list->terminate();
?>