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
$pharmacy_batchmas_search = new pharmacy_batchmas_search();

// Run the page
$pharmacy_batchmas_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_batchmassearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($pharmacy_batchmas_search->IsModal) { ?>
	fpharmacy_batchmassearch = currentAdvancedSearchForm = new ew.Form("fpharmacy_batchmassearch", "search");
	<?php } else { ?>
	fpharmacy_batchmassearch = currentForm = new ew.Form("fpharmacy_batchmassearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpharmacy_batchmassearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->EXPDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->OQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->RQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_FRQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->FRQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_IQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->IQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_MRQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->MRQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_MRP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->MRP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_UR");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->UR->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OLDRT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->OLDRT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TEMPMRQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->TEMPMRQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TAXP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->TAXP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OLDRATE");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->OLDRATE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NEWRATE");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->NEWRATE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OTEMPMRA");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->OTEMPMRA->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->RT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BILLDATE");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas_search->BILLDATE->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_batchmassearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_batchmassearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_batchmassearch.lists["x_PrName"] = <?php echo $pharmacy_batchmas_search->PrName->Lookup->toClientList($pharmacy_batchmas_search) ?>;
	fpharmacy_batchmassearch.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_search->PrName->lookupOptions()) ?>;
	fpharmacy_batchmassearch.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_batchmassearch.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_search->BRCODE->Lookup->toClientList($pharmacy_batchmas_search) ?>;
	fpharmacy_batchmassearch.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_search->BRCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_batchmassearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_batchmas_search->showPageHeader(); ?>
<?php
$pharmacy_batchmas_search->showMessage();
?>
<form name="fpharmacy_batchmassearch" id="fpharmacy_batchmassearch" class="<?php echo $pharmacy_batchmas_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($pharmacy_batchmas_search->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRC"><?php echo $pharmacy_batchmas_search->PRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->PRC->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PRC" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->PRC->EditValue ?>"<?php echo $pharmacy_batchmas_search->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PrName"><?php echo $pharmacy_batchmas_search->PrName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->PrName->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PrName" class="ew-search-field">
<?php
$onchange = $pharmacy_batchmas_search->PrName->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_batchmas_search->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas_search->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas_search->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas_search->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas_search->PrName->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_batchmassearch"], function() {
	fpharmacy_batchmassearch.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_batchmas_search->PrName->Lookup->getParamTag($pharmacy_batchmas_search, "p_x_PrName") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label for="x_BATCHNO" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCHNO"><?php echo $pharmacy_batchmas_search->BATCHNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->BATCHNO->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BATCHNO" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas_search->BATCHNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label for="x_BATCH" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCH"><?php echo $pharmacy_batchmas_search->BATCH->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCH" id="z_BATCH" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->BATCH->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BATCH" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->BATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->BATCH->EditValue ?>"<?php echo $pharmacy_batchmas_search->BATCH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MFRCODE"><?php echo $pharmacy_batchmas_search->MFRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->MFRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_MFRCODE" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_search->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_EXPDT"><?php echo $pharmacy_batchmas_search->EXPDT->caption() ?></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->EXPDT->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $pharmacy_batchmas_search->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_pharmacy_batchmas_EXPDT" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas_search->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_search->EXPDT->ReadOnly && !$pharmacy_batchmas_search->EXPDT->Disabled && !isset($pharmacy_batchmas_search->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmassearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmassearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_pharmacy_batchmas_EXPDT" class="ew-search-field2 d-none">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->EXPDT->EditValue2 ?>"<?php echo $pharmacy_batchmas_search->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_search->EXPDT->ReadOnly && !$pharmacy_batchmas_search->EXPDT->Disabled && !isset($pharmacy_batchmas_search->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmassearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmassearch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label for="x_PRCODE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRCODE"><?php echo $pharmacy_batchmas_search->PRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRCODE" id="z_PRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->PRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PRCODE" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas_search->PRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label for="x_OQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OQ"><?php echo $pharmacy_batchmas_search->OQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OQ" id="z_OQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->OQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OQ" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->OQ->EditValue ?>"<?php echo $pharmacy_batchmas_search->OQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label for="x_RQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RQ"><?php echo $pharmacy_batchmas_search->RQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RQ" id="z_RQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->RQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_RQ" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->RQ->EditValue ?>"<?php echo $pharmacy_batchmas_search->RQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label for="x_FRQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_FRQ"><?php echo $pharmacy_batchmas_search->FRQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_FRQ" id="z_FRQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->FRQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_FRQ" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas_search->FRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_IQ"><?php echo $pharmacy_batchmas_search->IQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->IQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_IQ" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->IQ->EditValue ?>"<?php echo $pharmacy_batchmas_search->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label for="x_MRQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRQ"><?php echo $pharmacy_batchmas_search->MRQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_MRQ" id="z_MRQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->MRQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_MRQ" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas_search->MRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRP"><?php echo $pharmacy_batchmas_search->MRP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_MRP" id="z_MRP" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->MRP->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_MRP" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->MRP->EditValue ?>"<?php echo $pharmacy_batchmas_search->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label for="x_UR" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UR"><?php echo $pharmacy_batchmas_search->UR->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_UR" id="z_UR" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->UR->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_UR" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->UR->EditValue ?>"<?php echo $pharmacy_batchmas_search->UR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label for="x_PC" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PC"><?php echo $pharmacy_batchmas_search->PC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PC" id="z_PC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->PC->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PC" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->PC->EditValue ?>"<?php echo $pharmacy_batchmas_search->PC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label for="x_OLDRT" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRT"><?php echo $pharmacy_batchmas_search->OLDRT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OLDRT" id="z_OLDRT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->OLDRT->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OLDRT" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->OLDRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->OLDRT->EditValue ?>"<?php echo $pharmacy_batchmas_search->OLDRT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label for="x_TEMPMRQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TEMPMRQ"><?php echo $pharmacy_batchmas_search->TEMPMRQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TEMPMRQ" id="z_TEMPMRQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->TEMPMRQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_TEMPMRQ" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->TEMPMRQ->EditValue ?>"<?php echo $pharmacy_batchmas_search->TEMPMRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label for="x_TAXP" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TAXP"><?php echo $pharmacy_batchmas_search->TAXP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TAXP" id="z_TAXP" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->TAXP->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_TAXP" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->TAXP->EditValue ?>"<?php echo $pharmacy_batchmas_search->TAXP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label for="x_OLDRATE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRATE"><?php echo $pharmacy_batchmas_search->OLDRATE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OLDRATE" id="z_OLDRATE" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->OLDRATE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OLDRATE" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->OLDRATE->EditValue ?>"<?php echo $pharmacy_batchmas_search->OLDRATE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label for="x_NEWRATE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_NEWRATE"><?php echo $pharmacy_batchmas_search->NEWRATE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NEWRATE" id="z_NEWRATE" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->NEWRATE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_NEWRATE" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->NEWRATE->EditValue ?>"<?php echo $pharmacy_batchmas_search->NEWRATE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label for="x_OTEMPMRA" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OTEMPMRA"><?php echo $pharmacy_batchmas_search->OTEMPMRA->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OTEMPMRA" id="z_OTEMPMRA" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->OTEMPMRA->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OTEMPMRA" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->OTEMPMRA->EditValue ?>"<?php echo $pharmacy_batchmas_search->OTEMPMRA->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label for="x_ACTIVESTATUS" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_ACTIVESTATUS"><?php echo $pharmacy_batchmas_search->ACTIVESTATUS->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ACTIVESTATUS" id="z_ACTIVESTATUS" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->ACTIVESTATUS->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_ACTIVESTATUS" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->ACTIVESTATUS->EditValue ?>"<?php echo $pharmacy_batchmas_search->ACTIVESTATUS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_id"><?php echo $pharmacy_batchmas_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->id->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_id" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->id->EditValue ?>"<?php echo $pharmacy_batchmas_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PSGST"><?php echo $pharmacy_batchmas_search->PSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->PSGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PSGST" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->PSGST->EditValue ?>"<?php echo $pharmacy_batchmas_search->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PCGST"><?php echo $pharmacy_batchmas_search->PCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->PCGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PCGST" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->PCGST->EditValue ?>"<?php echo $pharmacy_batchmas_search->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SSGST"><?php echo $pharmacy_batchmas_search->SSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->SSGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_SSGST" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas_search->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SCGST"><?php echo $pharmacy_batchmas_search->SCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->SCGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_SCGST" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas_search->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RT"><?php echo $pharmacy_batchmas_search->RT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->RT->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_RT" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->RT->EditValue ?>"<?php echo $pharmacy_batchmas_search->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label for="x_BRCODE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BRCODE"><?php echo $pharmacy_batchmas_search->BRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->BRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BRCODE" class="ew-search-field">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas_search->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas_search->BRCODE->AdvancedSearch->ViewValue ?></button>
		<div id="dsl_x_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas_search->BRCODE->radioButtonListHtml(TRUE, "x_BRCODE") ?>
			</div><!-- /.ew-items -->
		</div><!-- /.dropdown-menu -->
		<div id="tp_x_BRCODE" class="ew-template"><input type="radio" class="custom-control-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas_search->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="{value}"<?php echo $pharmacy_batchmas_search->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group -->
	<?php if (!$pharmacy_batchmas_search->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fas fa-times ew-icon"></i>
	</button>
	<?php } ?>
</div><!-- /.ew-dropdown-list -->
<?php echo $pharmacy_batchmas_search->BRCODE->Lookup->getParamTag($pharmacy_batchmas_search, "p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_HospID"><?php echo $pharmacy_batchmas_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->HospID->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_HospID" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->HospID->EditValue ?>"<?php echo $pharmacy_batchmas_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label for="x_UM" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UM"><?php echo $pharmacy_batchmas_search->UM->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UM" id="z_UM" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->UM->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_UM" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->UM->EditValue ?>"<?php echo $pharmacy_batchmas_search->UM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label for="x_GENNAME" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_GENNAME"><?php echo $pharmacy_batchmas_search->GENNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->GENNAME->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_GENNAME" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas_search->GENNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas_search->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label for="x_BILLDATE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BILLDATE"><?php echo $pharmacy_batchmas_search->BILLDATE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BILLDATE" id="z_BILLDATE" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div <?php echo $pharmacy_batchmas_search->BILLDATE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BILLDATE" class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas_search->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas_search->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas_search->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas_search->BILLDATE->ReadOnly && !$pharmacy_batchmas_search->BILLDATE->Disabled && !isset($pharmacy_batchmas_search->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas_search->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmassearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_batchmassearch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_batchmas_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_batchmas_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_batchmas_search->showPageFooter();
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
$pharmacy_batchmas_search->terminate();
?>