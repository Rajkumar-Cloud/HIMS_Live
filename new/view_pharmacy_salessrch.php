<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_salessearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_pharmacy_sales_search->IsModal) { ?>
	fview_pharmacy_salessearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_salessearch", "search");
	<?php } else { ?>
	fview_pharmacy_salessearch = currentForm = new ew.Form("fview_pharmacy_salessearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_pharmacy_salessearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_BillDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->BillDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SiNo");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->SiNo->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->EXPDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_IQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->IQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->RT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DAMT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->DAMT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BILLDT");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->BILLDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BRCODE");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->BRCODE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->SSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->SCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PurValue");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PurValue->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SalRate");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->SalRate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PurRate");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PurRate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PAMT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PAMT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PSGSTAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PSGSTAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PCGSTAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->PCGSTAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SSGSTAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->SSGSTAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SCGSTAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->SCGSTAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HosoID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_search->HosoID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_salessearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_salessearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_salessearch.lists["x_BRCODE"] = <?php echo $view_pharmacy_sales_search->BRCODE->Lookup->toClientList($view_pharmacy_sales_search) ?>;
	fview_pharmacy_salessearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_sales_search->BRCODE->lookupOptions()) ?>;
	fview_pharmacy_salessearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacy_salessearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_sales_search->showPageHeader(); ?>
<?php
$view_pharmacy_sales_search->showMessage();
?>
<form name="fview_pharmacy_salessearch" id="fview_pharmacy_salessearch" class="<?php echo $view_pharmacy_sales_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_sales_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_sales_search->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label for="x_BillDate" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BillDate"><?php echo $view_pharmacy_sales_search->BillDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillDate" id="z_BillDate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->BillDate->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BillDate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->BillDate->EditValue ?>"<?php echo $view_pharmacy_sales_search->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacy_sales_search->BillDate->ReadOnly && !$view_pharmacy_sales_search->BillDate->Disabled && !isset($view_pharmacy_sales_search->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacy_sales_search->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_salessearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->SiNo->Visible) { // SiNo ?>
	<div id="r_SiNo" class="form-group row">
		<label for="x_SiNo" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SiNo"><?php echo $view_pharmacy_sales_search->SiNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SiNo" id="z_SiNo" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->SiNo->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SiNo" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->SiNo->EditValue ?>"<?php echo $view_pharmacy_sales_search->SiNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PRC"><?php echo $view_pharmacy_sales_search->PRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PRC->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PRC" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PRC->EditValue ?>"<?php echo $view_pharmacy_sales_search->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->Product->Visible) { // Product ?>
	<div id="r_Product" class="form-group row">
		<label for="x_Product" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Product"><?php echo $view_pharmacy_sales_search->Product->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Product" id="z_Product" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->Product->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_Product" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->Product->EditValue ?>"<?php echo $view_pharmacy_sales_search->Product->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label for="x_BATCHNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BATCHNO"><?php echo $view_pharmacy_sales_search->BATCHNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->BATCHNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BATCHNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_sales_search->BATCHNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_EXPDT"><?php echo $view_pharmacy_sales_search->EXPDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_EXPDT" id="z_EXPDT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->EXPDT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_EXPDT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_EXPDT" data-format="7" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->EXPDT->EditValue ?>"<?php echo $view_pharmacy_sales_search->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_sales_search->EXPDT->ReadOnly && !$view_pharmacy_sales_search->EXPDT->Disabled && !isset($view_pharmacy_sales_search->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_sales_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_salessearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->Mfg->Visible) { // Mfg ?>
	<div id="r_Mfg" class="form-group row">
		<label for="x_Mfg" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_Mfg"><?php echo $view_pharmacy_sales_search->Mfg->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mfg" id="z_Mfg" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->Mfg->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_Mfg" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->Mfg->EditValue ?>"<?php echo $view_pharmacy_sales_search->Mfg->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label for="x_HSN" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_HSN"><?php echo $view_pharmacy_sales_search->HSN->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HSN" id="z_HSN" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->HSN->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_HSN" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->HSN->EditValue ?>"<?php echo $view_pharmacy_sales_search->HSN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label for="x_IPNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_IPNO"><?php echo $view_pharmacy_sales_search->IPNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->IPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_IPNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->IPNO->EditValue ?>"<?php echo $view_pharmacy_sales_search->IPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label for="x_OPNO" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_OPNO"><?php echo $view_pharmacy_sales_search->OPNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->OPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_OPNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->OPNO->EditValue ?>"<?php echo $view_pharmacy_sales_search->OPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_IQ"><?php echo $view_pharmacy_sales_search->IQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->IQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_IQ" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->IQ->EditValue ?>"<?php echo $view_pharmacy_sales_search->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_RT"><?php echo $view_pharmacy_sales_search->RT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->RT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_RT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->RT->EditValue ?>"<?php echo $view_pharmacy_sales_search->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->DAMT->Visible) { // DAMT ?>
	<div id="r_DAMT" class="form-group row">
		<label for="x_DAMT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_DAMT"><?php echo $view_pharmacy_sales_search->DAMT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DAMT" id="z_DAMT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->DAMT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_DAMT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->DAMT->EditValue ?>"<?php echo $view_pharmacy_sales_search->DAMT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label for="x_BILLDT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BILLDT"><?php echo $view_pharmacy_sales_search->BILLDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BILLDT" id="z_BILLDT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->BILLDT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BILLDT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BILLDT" data-format="7" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->BILLDT->EditValue ?>"<?php echo $view_pharmacy_sales_search->BILLDT->editAttributes() ?>>
<?php if (!$view_pharmacy_sales_search->BILLDT->ReadOnly && !$view_pharmacy_sales_search->BILLDT->Disabled && !isset($view_pharmacy_sales_search->BILLDT->EditAttrs["readonly"]) && !isset($view_pharmacy_sales_search->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_salessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_salessearch", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_BRCODE"><?php echo $view_pharmacy_sales_search->BRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_BRCODE" class="ew-search-field">
<?php
$onchange = $view_pharmacy_sales_search->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_sales_search->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_sales_search->BRCODE->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_sales_search->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_sales" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_sales_search->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_sales_search->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_salessearch"], function() {
	fview_pharmacy_salessearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_sales_search->BRCODE->Lookup->getParamTag($view_pharmacy_sales_search, "p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PSGST"><?php echo $view_pharmacy_sales_search->PSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PSGST" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PSGST->EditValue ?>"<?php echo $view_pharmacy_sales_search->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PCGST"><?php echo $view_pharmacy_sales_search->PCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PCGST" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PCGST->EditValue ?>"<?php echo $view_pharmacy_sales_search->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SSGST"><?php echo $view_pharmacy_sales_search->SSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->SSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SSGST" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->SSGST->EditValue ?>"<?php echo $view_pharmacy_sales_search->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SCGST"><?php echo $view_pharmacy_sales_search->SCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->SCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SCGST" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->SCGST->EditValue ?>"<?php echo $view_pharmacy_sales_search->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PurValue"><?php echo $view_pharmacy_sales_search->PurValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PurValue->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PurValue" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PurValue->EditValue ?>"<?php echo $view_pharmacy_sales_search->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label for="x_SalRate" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SalRate"><?php echo $view_pharmacy_sales_search->SalRate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SalRate" id="z_SalRate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->SalRate->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SalRate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->SalRate->EditValue ?>"<?php echo $view_pharmacy_sales_search->SalRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PurRate"><?php echo $view_pharmacy_sales_search->PurRate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PurRate" id="z_PurRate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PurRate->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PurRate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PurRate->EditValue ?>"<?php echo $view_pharmacy_sales_search->PurRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PAMT->Visible) { // PAMT ?>
	<div id="r_PAMT" class="form-group row">
		<label for="x_PAMT" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PAMT"><?php echo $view_pharmacy_sales_search->PAMT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PAMT" id="z_PAMT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PAMT->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PAMT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PAMT" name="x_PAMT" id="x_PAMT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PAMT->EditValue ?>"<?php echo $view_pharmacy_sales_search->PAMT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PSGSTAmount->Visible) { // PSGSTAmount ?>
	<div id="r_PSGSTAmount" class="form-group row">
		<label for="x_PSGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PSGSTAmount"><?php echo $view_pharmacy_sales_search->PSGSTAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PSGSTAmount" id="z_PSGSTAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PSGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PSGSTAmount" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PSGSTAmount" name="x_PSGSTAmount" id="x_PSGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PSGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PSGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales_search->PSGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->PCGSTAmount->Visible) { // PCGSTAmount ?>
	<div id="r_PCGSTAmount" class="form-group row">
		<label for="x_PCGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_PCGSTAmount"><?php echo $view_pharmacy_sales_search->PCGSTAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PCGSTAmount" id="z_PCGSTAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->PCGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_PCGSTAmount" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PCGSTAmount" name="x_PCGSTAmount" id="x_PCGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->PCGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->PCGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales_search->PCGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->SSGSTAmount->Visible) { // SSGSTAmount ?>
	<div id="r_SSGSTAmount" class="form-group row">
		<label for="x_SSGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SSGSTAmount"><?php echo $view_pharmacy_sales_search->SSGSTAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SSGSTAmount" id="z_SSGSTAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->SSGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SSGSTAmount" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SSGSTAmount" name="x_SSGSTAmount" id="x_SSGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->SSGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->SSGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales_search->SSGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->SCGSTAmount->Visible) { // SCGSTAmount ?>
	<div id="r_SCGSTAmount" class="form-group row">
		<label for="x_SCGSTAmount" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_SCGSTAmount"><?php echo $view_pharmacy_sales_search->SCGSTAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SCGSTAmount" id="z_SCGSTAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->SCGSTAmount->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_SCGSTAmount" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_SCGSTAmount" name="x_SCGSTAmount" id="x_SCGSTAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->SCGSTAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->SCGSTAmount->EditValue ?>"<?php echo $view_pharmacy_sales_search->SCGSTAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_sales_search->HosoID->Visible) { // HosoID ?>
	<div id="r_HosoID" class="form-group row">
		<label for="x_HosoID" class="<?php echo $view_pharmacy_sales_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_sales_HosoID"><?php echo $view_pharmacy_sales_search->HosoID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HosoID" id="z_HosoID" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_sales_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_sales_search->HosoID->cellAttributes() ?>>
			<span id="el_view_pharmacy_sales_HosoID" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_HosoID" name="x_HosoID" id="x_HosoID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_search->HosoID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_search->HosoID->EditValue ?>"<?php echo $view_pharmacy_sales_search->HosoID->editAttributes() ?>>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_sales_search->terminate();
?>