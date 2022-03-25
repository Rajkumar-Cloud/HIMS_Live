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
$view_pharmacy_search_product_search = new view_pharmacy_search_product_search();

// Run the page
$view_pharmacy_search_product_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_search_product_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_pharmacy_search_product_search->IsModal) { ?>
var fview_pharmacy_search_productsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_search_productsearch", "search");
<?php } else { ?>
var fview_pharmacy_search_productsearch = currentForm = new ew.Form("fview_pharmacy_search_productsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_pharmacy_search_productsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_search_productsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search
// Validate function for search

fview_pharmacy_search_productsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Stock");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->Stock->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->EXPDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->RT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->OQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->SSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->SCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BRCODE");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->BRCODE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BILLDATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->BILLDATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->PUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->PurRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->PurValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->SUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->PSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->PCGST->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_search_product_search->showPageHeader(); ?>
<?php
$view_pharmacy_search_product_search->showMessage();
?>
<form name="fview_pharmacy_search_productsearch" id="fview_pharmacy_search_productsearch" class="<?php echo $view_pharmacy_search_product_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_search_product_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_search_product_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_search_product">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_search_product_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_search_product->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_PRC"><?php echo $view_pharmacy_search_product->PRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->PRC->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_PRC">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->PRC->EditValue ?>"<?php echo $view_pharmacy_search_product->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label for="x_DES" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_DES"><?php echo $view_pharmacy_search_product->DES->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->DES->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_DES">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->DES->EditValue ?>"<?php echo $view_pharmacy_search_product->DES->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label for="x_BATCH" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_BATCH"><?php echo $view_pharmacy_search_product->BATCH->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BATCH" id="z_BATCH" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->BATCH->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_BATCH">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->BATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->BATCH->EditValue ?>"<?php echo $view_pharmacy_search_product->BATCH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label for="x_Stock" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_Stock"><?php echo $view_pharmacy_search_product->Stock->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->Stock->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_Stock" id="z_Stock" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_pharmacy_search_product_Stock">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->Stock->EditValue ?>"<?php echo $view_pharmacy_search_product->Stock->editAttributes() ?>>
</span>
			<span class="ew-search-cond btw1_Stock d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_pharmacy_search_product_Stock" class="btw1_Stock d-none">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->Stock->EditValue2 ?>"<?php echo $view_pharmacy_search_product->Stock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_EXPDT"><?php echo $view_pharmacy_search_product->EXPDT->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->EXPDT->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_EXPDT" id="z_EXPDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_pharmacy_search_product_EXPDT">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->EXPDT->EditValue ?>"<?php echo $view_pharmacy_search_product->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->EXPDT->ReadOnly && !$view_pharmacy_search_product->EXPDT->Disabled && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productsearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_EXPDT d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_pharmacy_search_product_EXPDT" class="btw1_EXPDT d-none">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->EXPDT->EditValue2 ?>"<?php echo $view_pharmacy_search_product->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->EXPDT->ReadOnly && !$view_pharmacy_search_product->EXPDT->Disabled && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productsearch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label for="x_UNIT" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_UNIT"><?php echo $view_pharmacy_search_product->UNIT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UNIT" id="z_UNIT" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->UNIT->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_UNIT">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->UNIT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->UNIT->EditValue ?>"<?php echo $view_pharmacy_search_product->UNIT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_RT"><?php echo $view_pharmacy_search_product->RT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RT" id="z_RT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->RT->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_RT">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->RT->EditValue ?>"<?php echo $view_pharmacy_search_product->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label for="x_OQ" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_OQ"><?php echo $view_pharmacy_search_product->OQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OQ" id="z_OQ" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->OQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_OQ">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->OQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->OQ->EditValue ?>"<?php echo $view_pharmacy_search_product->OQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label for="x_GENNAME" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_GENNAME"><?php echo $view_pharmacy_search_product->GENNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->GENNAME->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_GENNAME">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->GENNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->GENNAME->EditValue ?>"<?php echo $view_pharmacy_search_product->GENNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_SSGST"><?php echo $view_pharmacy_search_product->SSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SSGST" id="z_SSGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->SSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_SSGST">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->SSGST->EditValue ?>"<?php echo $view_pharmacy_search_product->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_SCGST"><?php echo $view_pharmacy_search_product->SCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SCGST" id="z_SCGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->SCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_SCGST">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->SCGST->EditValue ?>"<?php echo $view_pharmacy_search_product->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_MFRCODE"><?php echo $view_pharmacy_search_product->MFRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_MFRCODE">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_search_product->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label for="x_BRCODE" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_BRCODE"><?php echo $view_pharmacy_search_product->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_BRCODE">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->BRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->BRCODE->EditValue ?>"<?php echo $view_pharmacy_search_product->BRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_HospID"><?php echo $view_pharmacy_search_product->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_HospID">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->HospID->EditValue ?>"<?php echo $view_pharmacy_search_product->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label for="x_BILLDATE" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_BILLDATE"><?php echo $view_pharmacy_search_product->BILLDATE->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->BILLDATE->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_BILLDATE" id="z_BILLDATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_pharmacy_search_product_BILLDATE">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_search_product->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->BILLDATE->ReadOnly && !$view_pharmacy_search_product->BILLDATE->Disabled && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productsearch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_BILLDATE d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_pharmacy_search_product_BILLDATE" class="btw1_BILLDATE d-none">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->BILLDATE->EditValue2 ?>"<?php echo $view_pharmacy_search_product->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->BILLDATE->ReadOnly && !$view_pharmacy_search_product->BILLDATE->Disabled && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productsearch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_id"><?php echo $view_pharmacy_search_product->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->id->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_id">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->id->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->id->EditValue ?>"<?php echo $view_pharmacy_search_product->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label for="x_PUnit" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_PUnit"><?php echo $view_pharmacy_search_product->PUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PUnit" id="z_PUnit" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->PUnit->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_PUnit">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->PUnit->EditValue ?>"<?php echo $view_pharmacy_search_product->PUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_PurRate"><?php echo $view_pharmacy_search_product->PurRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurRate" id="z_PurRate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->PurRate->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_PurRate">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->PurRate->EditValue ?>"<?php echo $view_pharmacy_search_product->PurRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_PurValue"><?php echo $view_pharmacy_search_product->PurValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurValue" id="z_PurValue" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->PurValue->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_PurValue">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->PurValue->EditValue ?>"<?php echo $view_pharmacy_search_product->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label for="x_SUnit" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_SUnit"><?php echo $view_pharmacy_search_product->SUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SUnit" id="z_SUnit" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->SUnit->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_SUnit">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->SUnit->EditValue ?>"<?php echo $view_pharmacy_search_product->SUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_PSGST"><?php echo $view_pharmacy_search_product->PSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PSGST" id="z_PSGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->PSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_PSGST">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->PSGST->EditValue ?>"<?php echo $view_pharmacy_search_product->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $view_pharmacy_search_product_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_search_product_PCGST"><?php echo $view_pharmacy_search_product->PCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PCGST" id="z_PCGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_search_product_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_search_product->PCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_search_product_PCGST">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->PCGST->EditValue ?>"<?php echo $view_pharmacy_search_product->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_search_product_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_search_product_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_search_product_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_search_product_search->terminate();
?>