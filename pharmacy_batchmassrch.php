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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($pharmacy_batchmas_search->IsModal) { ?>
var fpharmacy_batchmassearch = currentAdvancedSearchForm = new ew.Form("fpharmacy_batchmassearch", "search");
<?php } else { ?>
var fpharmacy_batchmassearch = currentForm = new ew.Form("fpharmacy_batchmassearch", "search");
<?php } ?>

// Form_CustomValidate event
fpharmacy_batchmassearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_batchmassearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_batchmassearch.lists["x_PrName"] = <?php echo $pharmacy_batchmas_search->PrName->Lookup->toClientList() ?>;
fpharmacy_batchmassearch.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_search->PrName->lookupOptions()) ?>;
fpharmacy_batchmassearch.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_batchmassearch.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_search->BRCODE->Lookup->toClientList() ?>;
fpharmacy_batchmassearch.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_search->BRCODE->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fpharmacy_batchmassearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->EXPDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->RQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_FRQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->FRQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_IQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->IQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_MRQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->MRQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_MRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->MRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_UR");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->UR->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OLDRT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OLDRT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TEMPMRQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->TEMPMRQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TAXP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->TAXP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OLDRATE");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OLDRATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_NEWRATE");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->NEWRATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OTEMPMRA");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OTEMPMRA->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->RT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BILLDATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->BILLDATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->SUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PurValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PurRate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_batchmas_search->showPageHeader(); ?>
<?php
$pharmacy_batchmas_search->showMessage();
?>
<form name="fpharmacy_batchmassearch" id="fpharmacy_batchmassearch" class="<?php echo $pharmacy_batchmas_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_batchmas_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_batchmas_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_batchmas_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRC"><?php echo $pharmacy_batchmas->PRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PRC->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRC->EditValue ?>"<?php echo $pharmacy_batchmas->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PrName"><?php echo $pharmacy_batchmas->PrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PrName->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PrName">
<?php
$wrkonchange = "" . trim(@$pharmacy_batchmas->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_batchmas->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_batchmassearch.createAutoSuggest({"id":"x_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_batchmas->PrName->Lookup->getParamTag("p_x_PrName") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label for="x_BATCHNO" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCHNO"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BATCHNO->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas->BATCHNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label for="x_BATCH" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCH"><?php echo $pharmacy_batchmas->BATCH->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BATCH" id="z_BATCH" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BATCH->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BATCH">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCH->EditValue ?>"<?php echo $pharmacy_batchmas->BATCH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MFRCODE"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->MFRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_EXPDT"><?php echo $pharmacy_batchmas->EXPDT->caption() ?></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->EXPDT->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_EXPDT" id="z_EXPDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmassearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_EXPDT d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_pharmacy_batchmas_EXPDT" class="btw1_EXPDT d-none">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue2 ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmassearch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
	<div id="r_PRCODE" class="form-group row">
		<label for="x_PRCODE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRCODE"><?php echo $pharmacy_batchmas->PRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRCODE" id="z_PRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->PRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label for="x_OQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OQ"><?php echo $pharmacy_batchmas->OQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OQ" id="z_OQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OQ->EditValue ?>"<?php echo $pharmacy_batchmas->OQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label for="x_RQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RQ"><?php echo $pharmacy_batchmas->RQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RQ" id="z_RQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->RQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RQ->EditValue ?>"<?php echo $pharmacy_batchmas->RQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
	<div id="r_FRQ" class="form-group row">
		<label for="x_FRQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_FRQ"><?php echo $pharmacy_batchmas->FRQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_FRQ" id="z_FRQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->FRQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas->FRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_IQ"><?php echo $pharmacy_batchmas->IQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_IQ" id="z_IQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->IQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->IQ->EditValue ?>"<?php echo $pharmacy_batchmas->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label for="x_MRQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRQ"><?php echo $pharmacy_batchmas->MRQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_MRQ" id="z_MRQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->MRQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas->MRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRP"><?php echo $pharmacy_batchmas->MRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_MRP" id="z_MRP" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->MRP->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRP->EditValue ?>"<?php echo $pharmacy_batchmas->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label for="x_UR" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UR"><?php echo $pharmacy_batchmas->UR->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_UR" id="z_UR" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->UR->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UR->EditValue ?>"<?php echo $pharmacy_batchmas->UR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label for="x_PC" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PC"><?php echo $pharmacy_batchmas->PC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PC" id="z_PC" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PC->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PC->EditValue ?>"<?php echo $pharmacy_batchmas->PC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OLDRT->Visible) { // OLDRT ?>
	<div id="r_OLDRT" class="form-group row">
		<label for="x_OLDRT" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRT"><?php echo $pharmacy_batchmas->OLDRT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OLDRT" id="z_OLDRT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OLDRT->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OLDRT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OLDRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OLDRT->EditValue ?>"<?php echo $pharmacy_batchmas->OLDRT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<div id="r_TEMPMRQ" class="form-group row">
		<label for="x_TEMPMRQ" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TEMPMRQ"><?php echo $pharmacy_batchmas->TEMPMRQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TEMPMRQ" id="z_TEMPMRQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->TEMPMRQ->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_TEMPMRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->TEMPMRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->TEMPMRQ->EditValue ?>"<?php echo $pharmacy_batchmas->TEMPMRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label for="x_TAXP" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TAXP"><?php echo $pharmacy_batchmas->TAXP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TAXP" id="z_TAXP" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->TAXP->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_TAXP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->TAXP->EditValue ?>"<?php echo $pharmacy_batchmas->TAXP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OLDRATE->Visible) { // OLDRATE ?>
	<div id="r_OLDRATE" class="form-group row">
		<label for="x_OLDRATE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRATE"><?php echo $pharmacy_batchmas->OLDRATE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OLDRATE" id="z_OLDRATE" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OLDRATE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OLDRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OLDRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OLDRATE->EditValue ?>"<?php echo $pharmacy_batchmas->OLDRATE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->NEWRATE->Visible) { // NEWRATE ?>
	<div id="r_NEWRATE" class="form-group row">
		<label for="x_NEWRATE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_NEWRATE"><?php echo $pharmacy_batchmas->NEWRATE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_NEWRATE" id="z_NEWRATE" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->NEWRATE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_NEWRATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->NEWRATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->NEWRATE->EditValue ?>"<?php echo $pharmacy_batchmas->NEWRATE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<div id="r_OTEMPMRA" class="form-group row">
		<label for="x_OTEMPMRA" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OTEMPMRA"><?php echo $pharmacy_batchmas->OTEMPMRA->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OTEMPMRA" id="z_OTEMPMRA" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->OTEMPMRA->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_OTEMPMRA">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OTEMPMRA->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OTEMPMRA->EditValue ?>"<?php echo $pharmacy_batchmas->OTEMPMRA->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<div id="r_ACTIVESTATUS" class="form-group row">
		<label for="x_ACTIVESTATUS" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_ACTIVESTATUS"><?php echo $pharmacy_batchmas->ACTIVESTATUS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ACTIVESTATUS" id="z_ACTIVESTATUS" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->ACTIVESTATUS->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<input type="text" data-table="pharmacy_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->ACTIVESTATUS->EditValue ?>"<?php echo $pharmacy_batchmas->ACTIVESTATUS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_id"><?php echo $pharmacy_batchmas->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->id->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_id">
<input type="text" data-table="pharmacy_batchmas" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->id->EditValue ?>"<?php echo $pharmacy_batchmas->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PSGST"><?php echo $pharmacy_batchmas->PSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PSGST" id="z_PSGST" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PSGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PSGST->EditValue ?>"<?php echo $pharmacy_batchmas->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PCGST"><?php echo $pharmacy_batchmas->PCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PCGST" id="z_PCGST" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PCGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PCGST->EditValue ?>"<?php echo $pharmacy_batchmas->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SSGST"><?php echo $pharmacy_batchmas->SSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SSGST" id="z_SSGST" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->SSGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SCGST"><?php echo $pharmacy_batchmas->SCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SCGST" id="z_SCGST" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->SCGST->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RT"><?php echo $pharmacy_batchmas->RT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RT" id="z_RT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->RT->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RT->EditValue ?>"<?php echo $pharmacy_batchmas->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label for="x_BRCODE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BRCODE"><?php echo $pharmacy_batchmas->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas->BRCODE->AdvancedSearch->ViewValue ?></button>
		<div id="dsl_x_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas->BRCODE->radioButtonListHtml(TRUE, "x_BRCODE") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x_BRCODE" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="{value}"<?php echo $pharmacy_batchmas->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$pharmacy_batchmas->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
<?php echo $pharmacy_batchmas->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_HospID"><?php echo $pharmacy_batchmas->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->HospID->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->HospID->EditValue ?>"<?php echo $pharmacy_batchmas->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label for="x_UM" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UM"><?php echo $pharmacy_batchmas->UM->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UM" id="z_UM" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->UM->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UM->EditValue ?>"<?php echo $pharmacy_batchmas->UM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label for="x_GENNAME" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_GENNAME"><?php echo $pharmacy_batchmas->GENNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->GENNAME->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas->GENNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label for="x_BILLDATE" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BILLDATE"><?php echo $pharmacy_batchmas->BILLDATE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BILLDATE" id="z_BILLDATE" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->BILLDATE->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->BILLDATE->ReadOnly && !$pharmacy_batchmas->BILLDATE->Disabled && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmassearch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label for="x_PUnit" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PUnit"><?php echo $pharmacy_batchmas->PUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PUnit" id="z_PUnit" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PUnit->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PUnit->EditValue ?>"<?php echo $pharmacy_batchmas->PUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label for="x_SUnit" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SUnit"><?php echo $pharmacy_batchmas->SUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SUnit" id="z_SUnit" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->SUnit->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_SUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SUnit->EditValue ?>"<?php echo $pharmacy_batchmas->SUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PurValue"><?php echo $pharmacy_batchmas->PurValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurValue" id="z_PurValue" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PurValue->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PurValue">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurValue->EditValue ?>"<?php echo $pharmacy_batchmas->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $pharmacy_batchmas_search->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PurRate"><?php echo $pharmacy_batchmas->PurRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurRate" id="z_PurRate" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_batchmas_search->RightColumnClass ?>"><div<?php echo $pharmacy_batchmas->PurRate->cellAttributes() ?>>
			<span id="el_pharmacy_batchmas_PurRate">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurRate->EditValue ?>"<?php echo $pharmacy_batchmas->PurRate->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_batchmas_search->terminate();
?>