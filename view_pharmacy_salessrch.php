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
$view_pharmacy_sales_search = new view_pharmacy_sales_search();

// Run the page
$view_pharmacy_sales_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_sales_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_pharmacy_sales_search->IsModal) { ?>
var fview_pharmacy_salessearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_salessearch", "search");
<?php } else { ?>
var fview_pharmacy_salessearch = currentForm = new ew.Form("fview_pharmacy_salessearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_pharmacy_salessearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_salessearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_salessearch.lists["x_SiNo"] = <?php echo $view_pharmacy_sales_search->SiNo->Lookup->toClientList() ?>;
fview_pharmacy_salessearch.lists["x_SiNo"].options = <?php echo JsonEncode($view_pharmacy_sales_search->SiNo->lookupOptions()) ?>;
fview_pharmacy_salessearch.lists["x_BRCODE"] = <?php echo $view_pharmacy_sales_search->BRCODE->Lookup->toClientList() ?>;
fview_pharmacy_salessearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_sales_search->BRCODE->lookupOptions()) ?>;
fview_pharmacy_salessearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
// Validate function for search

fview_pharmacy_salessearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_BillDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->BillDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->EXPDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->SalRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_IQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->IQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->RT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DAMT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->DAMT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BILLDT");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->BILLDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BRCODE");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->BRCODE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->SSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->SCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PurValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PurRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PAMT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PAMT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PSGSTAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PSGSTAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PCGSTAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->PCGSTAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SSGSTAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->SSGSTAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SCGSTAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->SCGSTAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HosoID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales->HosoID->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_sales_search->showPageHeader(); ?>
<?php
$view_pharmacy_sales_search->showMessage();
?>
<form name="fview_pharmacy_salessearch" id="fview_pharmacy_salessearch" class="<?php echo $view_pharmacy_sales_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_sales_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_sales_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_sales_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_sales->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label for="x_BillDate" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BillDate"><?php echo $view_pharmacy_sales->BillDate->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->BillDate->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_BillDate" id="z_BillDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_sales->BillDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_pharmacy_sales_BillDate">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BillDate->EditValue ?>"<?php echo $view_pharmacy_sales->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacy_sales->BillDate->ReadOnly && !$view_pharmacy_sales->BillDate->Disabled && !isset($view_pharmacy_sales->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacy_sales->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_salessearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_BillDate d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_pharmacy_sales_BillDate" class="btw1_BillDate d-none">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BillDate->EditValue2 ?>"<?php echo $view_pharmacy_sales->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacy_sales->BillDate->ReadOnly && !$view_pharmacy_sales->BillDate->Disabled && !isset($view_pharmacy_sales->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacy_sales->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_salessearch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label for="x_BILLNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BILLNO"><?php echo $view_pharmacy_sales->BILLNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BILLNO" id="z_BILLNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->BILLNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BILLNO">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BILLNO->EditValue ?>"<?php echo $view_pharmacy_sales->BILLNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label for="x_Product" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Product"><?php echo $view_pharmacy_sales->Product->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Product" id="z_Product" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->Product->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_Product">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->Product->EditValue ?>"<?php echo $view_pharmacy_sales->Product->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label for="x_SiNo" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SiNo"><?php echo $view_pharmacy_sales->SiNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SiNo" id="z_SiNo" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->SiNo->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SiNo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_sales" data-field="x_SiNo" data-value-separator="<?php echo $view_pharmacy_sales->SiNo->displayValueSeparatorAttribute() ?>" id="x_SiNo" name="x_SiNo"<?php echo $view_pharmacy_sales->SiNo->editAttributes() ?>>
		<?php echo $view_pharmacy_sales->SiNo->selectOptionListHtml("x_SiNo") ?>
	</select>
</div>
<?php echo $view_pharmacy_sales->SiNo->Lookup->getParamTag("p_x_SiNo") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PRC"><?php echo $view_pharmacy_sales->PRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PRC->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PRC">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PRC->EditValue ?>"<?php echo $view_pharmacy_sales->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label for="x_BATCHNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BATCHNO"><?php echo $view_pharmacy_sales->BATCHNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->BATCHNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BATCHNO">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_sales->BATCHNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_EXPDT"><?php echo $view_pharmacy_sales->EXPDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_EXPDT" id="z_EXPDT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->EXPDT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_EXPDT">
<input type="text" data-table="view_pharmacy_sales" data-field="x_EXPDT" data-format="7" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->EXPDT->EditValue ?>"<?php echo $view_pharmacy_sales->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_sales->EXPDT->ReadOnly && !$view_pharmacy_sales->EXPDT->Disabled && !isset($view_pharmacy_sales->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_sales->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_salessearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label for="x_Mfg" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Mfg"><?php echo $view_pharmacy_sales->Mfg->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mfg" id="z_Mfg" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->Mfg->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_Mfg">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->Mfg->EditValue ?>"<?php echo $view_pharmacy_sales->Mfg->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label for="x_HSN" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_HSN"><?php echo $view_pharmacy_sales->HSN->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HSN" id="z_HSN" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->HSN->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_HSN">
<input type="text" data-table="view_pharmacy_sales" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->HSN->EditValue ?>"<?php echo $view_pharmacy_sales->HSN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label for="x_IPNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_IPNO"><?php echo $view_pharmacy_sales->IPNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->IPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_IPNO">
<input type="text" data-table="view_pharmacy_sales" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->IPNO->EditValue ?>"<?php echo $view_pharmacy_sales->IPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label for="x_OPNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_OPNO"><?php echo $view_pharmacy_sales->OPNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->OPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_OPNO">
<input type="text" data-table="view_pharmacy_sales" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->OPNO->EditValue ?>"<?php echo $view_pharmacy_sales->OPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label for="x_SalRate" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SalRate"><?php echo $view_pharmacy_sales->SalRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SalRate" id="z_SalRate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->SalRate->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SalRate">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->SalRate->EditValue ?>"<?php echo $view_pharmacy_sales->SalRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_IQ"><?php echo $view_pharmacy_sales->IQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_IQ" id="z_IQ" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->IQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_IQ">
<input type="text" data-table="view_pharmacy_sales" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->IQ->EditValue ?>"<?php echo $view_pharmacy_sales->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_RT"><?php echo $view_pharmacy_sales->RT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RT" id="z_RT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->RT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_RT">
<input type="text" data-table="view_pharmacy_sales" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->RT->EditValue ?>"<?php echo $view_pharmacy_sales->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label for="x_DAMT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_DAMT"><?php echo $view_pharmacy_sales->DAMT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DAMT" id="z_DAMT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->DAMT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_DAMT">
<input type="text" data-table="view_pharmacy_sales" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->DAMT->EditValue ?>"<?php echo $view_pharmacy_sales->DAMT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->Taxable->Visible) { // Taxable ?>
	<div id="r_Taxable" class="form-group row">
		<label for="x_Taxable" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Taxable"><?php echo $view_pharmacy_sales->Taxable->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Taxable" id="z_Taxable" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->Taxable->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_Taxable">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Taxable" name="x_Taxable" id="x_Taxable" size="30" maxlength="24" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->Taxable->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->Taxable->EditValue ?>"<?php echo $view_pharmacy_sales->Taxable->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label for="x_BILLDT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BILLDT"><?php echo $view_pharmacy_sales->BILLDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BILLDT" id="z_BILLDT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->BILLDT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BILLDT">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BILLDT" data-format="7" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->BILLDT->EditValue ?>"<?php echo $view_pharmacy_sales->BILLDT->editAttributes() ?>>
<?php if (!$view_pharmacy_sales->BILLDT->ReadOnly && !$view_pharmacy_sales->BILLDT->Disabled && !isset($view_pharmacy_sales->BILLDT->EditAttrs["readonly"]) && !isset($view_pharmacy_sales->BILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_salessearch", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BRCODE"><?php echo $view_pharmacy_sales->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_sales->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_sales->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="text-nowrap" style="z-index: 8820">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_sales->BRCODE->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_sales->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_sales->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_sales" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_sales->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_sales->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_salessearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":true});
</script>
<?php echo $view_pharmacy_sales->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PSGST"><?php echo $view_pharmacy_sales->PSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PSGST" id="z_PSGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PSGST">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PSGST->EditValue ?>"<?php echo $view_pharmacy_sales->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PCGST"><?php echo $view_pharmacy_sales->PCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PCGST" id="z_PCGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PCGST">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PCGST->EditValue ?>"<?php echo $view_pharmacy_sales->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SSGST"><?php echo $view_pharmacy_sales->SSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SSGST" id="z_SSGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->SSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SSGST">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->SSGST->EditValue ?>"<?php echo $view_pharmacy_sales->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SCGST"><?php echo $view_pharmacy_sales->SCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SCGST" id="z_SCGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->SCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SCGST">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->SCGST->EditValue ?>"<?php echo $view_pharmacy_sales->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PurValue"><?php echo $view_pharmacy_sales->PurValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurValue" id="z_PurValue" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PurValue->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PurValue">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PurValue->EditValue ?>"<?php echo $view_pharmacy_sales->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PurRate"><?php echo $view_pharmacy_sales->PurRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurRate" id="z_PurRate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PurRate->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PurRate">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PurRate->EditValue ?>"<?php echo $view_pharmacy_sales->PurRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PAMT->Visible) { // PAMT ?>
	<div id="r_PAMT" class="form-group row">
		<label for="x_PAMT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PAMT"><?php echo $view_pharmacy_sales->PAMT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PAMT" id="z_PAMT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PAMT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PAMT">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PAMT" name="x_PAMT" id="x_PAMT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PAMT->EditValue ?>"<?php echo $view_pharmacy_sales->PAMT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PSGSTAmount->Visible) { // PSGSTAmount ?>
	<div id="r_PSGSTAmount" class="form-group row">
		<label for="x_PSGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PSGSTAmount"><?php echo $view_pharmacy_sales->PSGSTAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PSGSTAmount" id="z_PSGSTAmount" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PSGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PSGSTAmount">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PSGSTAmount" name="x_PSGSTAmount" id="x_PSGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PSGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PSGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales->PSGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->PCGSTAmount->Visible) { // PCGSTAmount ?>
	<div id="r_PCGSTAmount" class="form-group row">
		<label for="x_PCGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PCGSTAmount"><?php echo $view_pharmacy_sales->PCGSTAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PCGSTAmount" id="z_PCGSTAmount" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->PCGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PCGSTAmount">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PCGSTAmount" name="x_PCGSTAmount" id="x_PCGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->PCGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->PCGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales->PCGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->SSGSTAmount->Visible) { // SSGSTAmount ?>
	<div id="r_SSGSTAmount" class="form-group row">
		<label for="x_SSGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SSGSTAmount"><?php echo $view_pharmacy_sales->SSGSTAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SSGSTAmount" id="z_SSGSTAmount" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->SSGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SSGSTAmount">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SSGSTAmount" name="x_SSGSTAmount" id="x_SSGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->SSGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->SSGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales->SSGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->SCGSTAmount->Visible) { // SCGSTAmount ?>
	<div id="r_SCGSTAmount" class="form-group row">
		<label for="x_SCGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SCGSTAmount"><?php echo $view_pharmacy_sales->SCGSTAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SCGSTAmount" id="z_SCGSTAmount" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->SCGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SCGSTAmount">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SCGSTAmount" name="x_SCGSTAmount" id="x_SCGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->SCGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->SCGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales->SCGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales->HosoID->Visible) { // HosoID ?>
	<div id="r_HosoID" class="form-group row">
		<label for="x_HosoID" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_HosoID"><?php echo $view_pharmacy_sales->HosoID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HosoID" id="z_HosoID" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_sales->HosoID->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_HosoID">
<input type="text" data-table="view_pharmacy_sales" data-field="x_HosoID" name="x_HosoID" id="x_HosoID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales->HosoID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales->HosoID->EditValue ?>"<?php echo $view_pharmacy_sales->HosoID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_sales_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_sales_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_sales_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_sales_search->terminate();
?>