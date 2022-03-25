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
$pharmacy_storemast_search = new pharmacy_storemast_search();

// Run the page
$pharmacy_storemast_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($pharmacy_storemast_search->IsModal) { ?>
var fpharmacy_storemastsearch = currentAdvancedSearchForm = new ew.Form("fpharmacy_storemastsearch", "search");
<?php } else { ?>
var fpharmacy_storemastsearch = currentForm = new ew.Form("fpharmacy_storemastsearch", "search");
<?php } ?>

// Form_CustomValidate event
fpharmacy_storemastsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastsearch.lists["x_TYPE"] = <?php echo $pharmacy_storemast_search->TYPE->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_search->TYPE->options(FALSE, TRUE)) ?>;
fpharmacy_storemastsearch.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_search->LASTSUPP->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_search->LASTSUPP->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_search->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastsearch.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastsearch.lists["x_DRID"] = <?php echo $pharmacy_storemast_search->DRID->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_search->DRID->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_search->MFRCODE->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_search->MFRCODE->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_search->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_search->COMBCODE->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_search->GENCODE->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_search->GENCODE->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_UNIT"] = <?php echo $pharmacy_storemast_search->UNIT->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_search->UNIT->options(FALSE, TRUE)) ?>;
fpharmacy_storemastsearch.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_search->FORMULARY->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_search->FORMULARY->options(FALSE, TRUE)) ?>;
fpharmacy_storemastsearch.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_search->SUPPNAME->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->SUPPNAME->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_search->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_search->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->GENERICNAME->lookupOptions()) ?>;
fpharmacy_storemastsearch.lists["x_Scheduling"] = <?php echo $pharmacy_storemast_search->Scheduling->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_Scheduling"].options = <?php echo JsonEncode($pharmacy_storemast_search->Scheduling->options(FALSE, TRUE)) ?>;
fpharmacy_storemastsearch.lists["x_Schedulingh1"] = <?php echo $pharmacy_storemast_search->Schedulingh1->Lookup->toClientList() ?>;
fpharmacy_storemastsearch.lists["x_Schedulingh1"].options = <?php echo JsonEncode($pharmacy_storemast_search->Schedulingh1->options(FALSE, TRUE)) ?>;

// Form object for search
// Validate function for search

fpharmacy_storemastsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_RT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_UR");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->UR->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TAXP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->TAXP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_MRQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MRQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_IQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->IQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_MRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->MRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->EXPDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SALQTY");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SALQTY->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LASTPURDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LASTPURDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LASTISSDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LASTISSDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CREATEDDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->CREATEDDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_STAXPER");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STAXPER->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OLDTAXP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OLDTAXP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_NEWRT");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWRT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_NEWMRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWMRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_NEWUR");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->NEWUR->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RETNQTY");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->RETNQTY->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PATSALE");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PATSALE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OLDRQ");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->OLDRQ->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_STRENGTH");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STRENGTH->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_STOCK");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->STOCK->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PACKING");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PACKING->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PhysQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PhysQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LedQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->LedQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PurValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->PCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SaleValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SaleRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->SaleRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast->HospID->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_storemast_search->showPageHeader(); ?>
<?php
$pharmacy_storemast_search->showMessage();
?>
<form name="fpharmacy_storemastsearch" id="fpharmacy_storemastsearch" class="<?php echo $pharmacy_storemast_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_storemast_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_storemast_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label for="x_BRCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRCODE"><?php echo $pharmacy_storemast->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->BRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BRCODE">
<input type="text" data-table="pharmacy_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BRCODE->EditValue ?>"<?php echo $pharmacy_storemast->BRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PRC"><?php echo $pharmacy_storemast->PRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PRC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PRC->EditValue ?>"<?php echo $pharmacy_storemast->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label for="x_TYPE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TYPE"><?php echo $pharmacy_storemast->TYPE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TYPE" id="z_TYPE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TYPE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast->TYPE->editAttributes() ?>>
		<?php echo $pharmacy_storemast->TYPE->selectOptionListHtml("x_TYPE") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label for="x_DES" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_DES"><?php echo $pharmacy_storemast->DES->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->DES->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_DES">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->DES->EditValue ?>"<?php echo $pharmacy_storemast->DES->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label for="x_UM" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UM"><?php echo $pharmacy_storemast->UM->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UM" id="z_UM" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->UM->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_UM">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UM->EditValue ?>"<?php echo $pharmacy_storemast->UM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RT"><?php echo $pharmacy_storemast->RT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RT" id="z_RT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RT->EditValue ?>"<?php echo $pharmacy_storemast->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label for="x_UR" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UR"><?php echo $pharmacy_storemast->UR->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_UR" id="z_UR" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->UR->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_UR">
<input type="text" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->UR->EditValue ?>"<?php echo $pharmacy_storemast->UR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label for="x_TAXP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXP"><?php echo $pharmacy_storemast->TAXP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TAXP" id="z_TAXP" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TAXP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TAXP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TAXP->EditValue ?>"<?php echo $pharmacy_storemast->TAXP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label for="x_BATCHNO" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BATCHNO"><?php echo $pharmacy_storemast->BATCHNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->BATCHNO->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BATCHNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast->BATCHNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label for="x_OQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OQ"><?php echo $pharmacy_storemast->OQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OQ" id="z_OQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->OQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OQ">
<input type="text" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OQ->EditValue ?>"<?php echo $pharmacy_storemast->OQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label for="x_RQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RQ"><?php echo $pharmacy_storemast->RQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RQ" id="z_RQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RQ">
<input type="text" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RQ->EditValue ?>"<?php echo $pharmacy_storemast->RQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label for="x_MRQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRQ"><?php echo $pharmacy_storemast->MRQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_MRQ" id="z_MRQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->MRQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_MRQ">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRQ->EditValue ?>"<?php echo $pharmacy_storemast->MRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_IQ"><?php echo $pharmacy_storemast->IQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_IQ" id="z_IQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->IQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_IQ">
<input type="text" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->IQ->EditValue ?>"<?php echo $pharmacy_storemast->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRP"><?php echo $pharmacy_storemast->MRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_MRP" id="z_MRP" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->MRP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_MRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->MRP->EditValue ?>"<?php echo $pharmacy_storemast->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_EXPDT"><?php echo $pharmacy_storemast->EXPDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_EXPDT" id="z_EXPDT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->EXPDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_EXPDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->EXPDT->ReadOnly && !$pharmacy_storemast->EXPDT->Disabled && !isset($pharmacy_storemast->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastsearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SALQTY->Visible) { // SALQTY ?>
	<div id="r_SALQTY" class="form-group row">
		<label for="x_SALQTY" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SALQTY"><?php echo $pharmacy_storemast->SALQTY->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SALQTY" id="z_SALQTY" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SALQTY->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SALQTY">
<input type="text" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SALQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SALQTY->EditValue ?>"<?php echo $pharmacy_storemast->SALQTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label for="x_LASTPURDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTPURDT"><?php echo $pharmacy_storemast->LASTPURDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LASTPURDT" id="z_LASTPURDT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LASTPURDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LASTPURDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->LASTPURDT->ReadOnly && !$pharmacy_storemast->LASTPURDT->Disabled && !isset($pharmacy_storemast->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastsearch", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label for="x_LASTSUPP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTSUPP"><?php echo $pharmacy_storemast->LASTSUPP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LASTSUPP" id="z_LASTSUPP" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LASTSUPP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LASTSUPP">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo strval($pharmacy_storemast->LASTSUPP->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->LASTSUPP->AdvancedSearch->ViewValue) : $pharmacy_storemast->LASTSUPP->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->LASTSUPP->ReadOnly || $pharmacy_storemast->LASTSUPP->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->LASTSUPP->Lookup->getParamTag("p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast->LASTSUPP->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->LASTSUPP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENNAME"><?php echo $pharmacy_storemast->GENNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->GENNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_GENNAME">
<?php
$wrkonchange = "" . trim(@$pharmacy_storemast->GENNAME->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_storemast->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME" class="text-nowrap" style="z-index: 8810">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENNAME->ReadOnly || $pharmacy_storemast->GENNAME->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast->GENNAME->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_storemastsearch.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
</script>
<?php echo $pharmacy_storemast->GENNAME->Lookup->getParamTag("p_x_GENNAME") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label for="x_LASTISSDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTISSDT"><?php echo $pharmacy_storemast->LASTISSDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LASTISSDT" id="z_LASTISSDT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LASTISSDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LASTISSDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->LASTISSDT->ReadOnly && !$pharmacy_storemast->LASTISSDT->Disabled && !isset($pharmacy_storemast->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastsearch", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
	<div id="r_CREATEDDT" class="form-group row">
		<label for="x_CREATEDDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_CREATEDDT"><?php echo $pharmacy_storemast->CREATEDDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CREATEDDT" id="z_CREATEDDT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->CREATEDDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_CREATEDDT">
<input type="text" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast->CREATEDDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->CREATEDDT->EditValue ?>"<?php echo $pharmacy_storemast->CREATEDDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast->CREATEDDT->ReadOnly && !$pharmacy_storemast->CREATEDDT->Disabled && !isset($pharmacy_storemast->CREATEDDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_storemastsearch", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OPPRC->Visible) { // OPPRC ?>
	<div id="r_OPPRC" class="form-group row">
		<label for="x_OPPRC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OPPRC"><?php echo $pharmacy_storemast->OPPRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_OPPRC" id="z_OPPRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->OPPRC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OPPRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OPPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OPPRC->EditValue ?>"<?php echo $pharmacy_storemast->OPPRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RESTRICT->Visible) { // RESTRICT ?>
	<div id="r_RESTRICT" class="form-group row">
		<label for="x_RESTRICT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RESTRICT"><?php echo $pharmacy_storemast->RESTRICT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RESTRICT" id="z_RESTRICT" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RESTRICT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RESTRICT">
<input type="text" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RESTRICT->EditValue ?>"<?php echo $pharmacy_storemast->RESTRICT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
	<div id="r_BAWAPRC" class="form-group row">
		<label for="x_BAWAPRC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BAWAPRC"><?php echo $pharmacy_storemast->BAWAPRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BAWAPRC" id="z_BAWAPRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->BAWAPRC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BAWAPRC">
<input type="text" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BAWAPRC->EditValue ?>"<?php echo $pharmacy_storemast->BAWAPRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STAXPER->Visible) { // STAXPER ?>
	<div id="r_STAXPER" class="form-group row">
		<label for="x_STAXPER" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STAXPER"><?php echo $pharmacy_storemast->STAXPER->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_STAXPER" id="z_STAXPER" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->STAXPER->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STAXPER">
<input type="text" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STAXPER->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STAXPER->EditValue ?>"<?php echo $pharmacy_storemast->STAXPER->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
	<div id="r_TAXTYPE" class="form-group row">
		<label for="x_TAXTYPE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXTYPE"><?php echo $pharmacy_storemast->TAXTYPE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TAXTYPE" id="z_TAXTYPE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TAXTYPE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TAXTYPE">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TAXTYPE->EditValue ?>"<?php echo $pharmacy_storemast->TAXTYPE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
	<div id="r_OLDTAXP" class="form-group row">
		<label for="x_OLDTAXP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDTAXP"><?php echo $pharmacy_storemast->OLDTAXP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OLDTAXP" id="z_OLDTAXP" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->OLDTAXP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OLDTAXP">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OLDTAXP->EditValue ?>"<?php echo $pharmacy_storemast->OLDTAXP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TAXUPD->Visible) { // TAXUPD ?>
	<div id="r_TAXUPD" class="form-group row">
		<label for="x_TAXUPD" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXUPD"><?php echo $pharmacy_storemast->TAXUPD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TAXUPD" id="z_TAXUPD" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TAXUPD->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TAXUPD">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TAXUPD->EditValue ?>"<?php echo $pharmacy_storemast->TAXUPD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PACKAGE->Visible) { // PACKAGE ?>
	<div id="r_PACKAGE" class="form-group row">
		<label for="x_PACKAGE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PACKAGE"><?php echo $pharmacy_storemast->PACKAGE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PACKAGE" id="z_PACKAGE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PACKAGE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PACKAGE">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PACKAGE->EditValue ?>"<?php echo $pharmacy_storemast->PACKAGE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWRT->Visible) { // NEWRT ?>
	<div id="r_NEWRT" class="form-group row">
		<label for="x_NEWRT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWRT"><?php echo $pharmacy_storemast->NEWRT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_NEWRT" id="z_NEWRT" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->NEWRT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_NEWRT">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWRT->EditValue ?>"<?php echo $pharmacy_storemast->NEWRT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWMRP->Visible) { // NEWMRP ?>
	<div id="r_NEWMRP" class="form-group row">
		<label for="x_NEWMRP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWMRP"><?php echo $pharmacy_storemast->NEWMRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_NEWMRP" id="z_NEWMRP" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->NEWMRP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_NEWMRP">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWMRP->EditValue ?>"<?php echo $pharmacy_storemast->NEWMRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->NEWUR->Visible) { // NEWUR ?>
	<div id="r_NEWUR" class="form-group row">
		<label for="x_NEWUR" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWUR"><?php echo $pharmacy_storemast->NEWUR->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_NEWUR" id="z_NEWUR" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->NEWUR->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_NEWUR">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->NEWUR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->NEWUR->EditValue ?>"<?php echo $pharmacy_storemast->NEWUR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STATUS->Visible) { // STATUS ?>
	<div id="r_STATUS" class="form-group row">
		<label for="x_STATUS" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STATUS"><?php echo $pharmacy_storemast->STATUS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_STATUS" id="z_STATUS" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->STATUS->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STATUS">
<input type="text" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STATUS->EditValue ?>"<?php echo $pharmacy_storemast->STATUS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RETNQTY->Visible) { // RETNQTY ?>
	<div id="r_RETNQTY" class="form-group row">
		<label for="x_RETNQTY" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RETNQTY"><?php echo $pharmacy_storemast->RETNQTY->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RETNQTY" id="z_RETNQTY" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RETNQTY->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RETNQTY">
<input type="text" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RETNQTY->EditValue ?>"<?php echo $pharmacy_storemast->RETNQTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->KEMODISC->Visible) { // KEMODISC ?>
	<div id="r_KEMODISC" class="form-group row">
		<label for="x_KEMODISC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_KEMODISC"><?php echo $pharmacy_storemast->KEMODISC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_KEMODISC" id="z_KEMODISC" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->KEMODISC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_KEMODISC">
<input type="text" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->KEMODISC->EditValue ?>"<?php echo $pharmacy_storemast->KEMODISC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PATSALE->Visible) { // PATSALE ?>
	<div id="r_PATSALE" class="form-group row">
		<label for="x_PATSALE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PATSALE"><?php echo $pharmacy_storemast->PATSALE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PATSALE" id="z_PATSALE" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PATSALE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PATSALE">
<input type="text" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PATSALE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PATSALE->EditValue ?>"<?php echo $pharmacy_storemast->PATSALE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->ORGAN->Visible) { // ORGAN ?>
	<div id="r_ORGAN" class="form-group row">
		<label for="x_ORGAN" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_ORGAN"><?php echo $pharmacy_storemast->ORGAN->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ORGAN" id="z_ORGAN" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->ORGAN->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_ORGAN">
<input type="text" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->ORGAN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->ORGAN->EditValue ?>"<?php echo $pharmacy_storemast->ORGAN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->OLDRQ->Visible) { // OLDRQ ?>
	<div id="r_OLDRQ" class="form-group row">
		<label for="x_OLDRQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDRQ"><?php echo $pharmacy_storemast->OLDRQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OLDRQ" id="z_OLDRQ" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->OLDRQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OLDRQ">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->OLDRQ->EditValue ?>"<?php echo $pharmacy_storemast->OLDRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label for="x_DRID" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_DRID"><?php echo $pharmacy_storemast->DRID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DRID" id="z_DRID" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->DRID->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo strval($pharmacy_storemast->DRID->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->DRID->AdvancedSearch->ViewValue) : $pharmacy_storemast->DRID->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->DRID->ReadOnly || $pharmacy_storemast->DRID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->DRID->Lookup->getParamTag("p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast->DRID->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->DRID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MFRCODE"><?php echo $pharmacy_storemast->MFRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->MFRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo strval($pharmacy_storemast->MFRCODE->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->MFRCODE->AdvancedSearch->ViewValue) : $pharmacy_storemast->MFRCODE->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->MFRCODE->ReadOnly || $pharmacy_storemast->MFRCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->MFRCODE->Lookup->getParamTag("p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast->MFRCODE->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label for="x_COMBCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBCODE"><?php echo $pharmacy_storemast->COMBCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_COMBCODE" id="z_COMBCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->COMBCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_COMBCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo strval($pharmacy_storemast->COMBCODE->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBCODE->AdvancedSearch->ViewValue) : $pharmacy_storemast->COMBCODE->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBCODE->ReadOnly || $pharmacy_storemast->COMBCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBCODE->Lookup->getParamTag("p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast->COMBCODE->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->COMBCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label for="x_GENCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENCODE"><?php echo $pharmacy_storemast->GENCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENCODE" id="z_GENCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->GENCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_GENCODE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo strval($pharmacy_storemast->GENCODE->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENCODE->AdvancedSearch->ViewValue) : $pharmacy_storemast->GENCODE->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENCODE->ReadOnly || $pharmacy_storemast->GENCODE->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENCODE->Lookup->getParamTag("p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast->GENCODE->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->GENCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label for="x_STRENGTH" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STRENGTH"><?php echo $pharmacy_storemast->STRENGTH->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_STRENGTH" id="z_STRENGTH" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->STRENGTH->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STRENGTH">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast->STRENGTH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label for="x_UNIT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UNIT"><?php echo $pharmacy_storemast->UNIT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UNIT" id="z_UNIT" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->UNIT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_UNIT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast->UNIT->editAttributes() ?>>
		<?php echo $pharmacy_storemast->UNIT->selectOptionListHtml("x_UNIT") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label for="x_FORMULARY" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_FORMULARY"><?php echo $pharmacy_storemast->FORMULARY->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_FORMULARY" id="z_FORMULARY" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->FORMULARY->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_FORMULARY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast->FORMULARY->editAttributes() ?>>
		<?php echo $pharmacy_storemast->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->STOCK->Visible) { // STOCK ?>
	<div id="r_STOCK" class="form-group row">
		<label for="x_STOCK" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STOCK"><?php echo $pharmacy_storemast->STOCK->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_STOCK" id="z_STOCK" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->STOCK->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STOCK">
<input type="text" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->STOCK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->STOCK->EditValue ?>"<?php echo $pharmacy_storemast->STOCK->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label for="x_RACKNO" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RACKNO"><?php echo $pharmacy_storemast->RACKNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RACKNO" id="z_RACKNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->RACKNO->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RACKNO">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast->RACKNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label for="x_SUPPNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SUPPNAME"><?php echo $pharmacy_storemast->SUPPNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SUPPNAME" id="z_SUPPNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SUPPNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SUPPNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo strval($pharmacy_storemast->SUPPNAME->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->SUPPNAME->AdvancedSearch->ViewValue) : $pharmacy_storemast->SUPPNAME->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->SUPPNAME->ReadOnly || $pharmacy_storemast->SUPPNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->SUPPNAME->Lookup->getParamTag("p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast->SUPPNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->SUPPNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label for="x_COMBNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBNAME"><?php echo $pharmacy_storemast->COMBNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_COMBNAME" id="z_COMBNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->COMBNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo strval($pharmacy_storemast->COMBNAME->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->COMBNAME->AdvancedSearch->ViewValue) : $pharmacy_storemast->COMBNAME->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->COMBNAME->ReadOnly || $pharmacy_storemast->COMBNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->COMBNAME->Lookup->getParamTag("p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast->COMBNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->COMBNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label for="x_GENERICNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENERICNAME"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GENERICNAME" id="z_GENERICNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->GENERICNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo strval($pharmacy_storemast->GENERICNAME->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_storemast->GENERICNAME->AdvancedSearch->ViewValue) : $pharmacy_storemast->GENERICNAME->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_storemast->GENERICNAME->ReadOnly || $pharmacy_storemast->GENERICNAME->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast->GENERICNAME->Lookup->getParamTag("p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast->GENERICNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast->GENERICNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label for="x_REMARK" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_REMARK"><?php echo $pharmacy_storemast->REMARK->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_REMARK" id="z_REMARK" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->REMARK->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_REMARK">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->REMARK->EditValue ?>"<?php echo $pharmacy_storemast->REMARK->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label for="x_TEMP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TEMP"><?php echo $pharmacy_storemast->TEMP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TEMP" id="z_TEMP" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->TEMP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TEMP">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->TEMP->EditValue ?>"<?php echo $pharmacy_storemast->TEMP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PACKING->Visible) { // PACKING ?>
	<div id="r_PACKING" class="form-group row">
		<label for="x_PACKING" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PACKING"><?php echo $pharmacy_storemast->PACKING->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PACKING" id="z_PACKING" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PACKING->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PACKING">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PACKING->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PACKING->EditValue ?>"<?php echo $pharmacy_storemast->PACKING->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PhysQty->Visible) { // PhysQty ?>
	<div id="r_PhysQty" class="form-group row">
		<label for="x_PhysQty" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PhysQty"><?php echo $pharmacy_storemast->PhysQty->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PhysQty" id="z_PhysQty" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PhysQty->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PhysQty">
<input type="text" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PhysQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PhysQty->EditValue ?>"<?php echo $pharmacy_storemast->PhysQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->LedQty->Visible) { // LedQty ?>
	<div id="r_LedQty" class="form-group row">
		<label for="x_LedQty" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LedQty"><?php echo $pharmacy_storemast->LedQty->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LedQty" id="z_LedQty" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->LedQty->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LedQty">
<input type="text" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->LedQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->LedQty->EditValue ?>"<?php echo $pharmacy_storemast->LedQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_id"><?php echo $pharmacy_storemast->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->id->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_id">
<input type="text" data-table="pharmacy_storemast" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($pharmacy_storemast->id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->id->EditValue ?>"<?php echo $pharmacy_storemast->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PurValue"><?php echo $pharmacy_storemast->PurValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurValue" id="z_PurValue" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PurValue->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PurValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PurValue->EditValue ?>"<?php echo $pharmacy_storemast->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PSGST"><?php echo $pharmacy_storemast->PSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PSGST" id="z_PSGST" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PSGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PSGST->EditValue ?>"<?php echo $pharmacy_storemast->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PCGST"><?php echo $pharmacy_storemast->PCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PCGST" id="z_PCGST" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->PCGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->PCGST->EditValue ?>"<?php echo $pharmacy_storemast->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label for="x_SaleValue" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleValue"><?php echo $pharmacy_storemast->SaleValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SaleValue" id="z_SaleValue" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SaleValue->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SaleValue">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast->SaleValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SSGST"><?php echo $pharmacy_storemast->SSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SSGST" id="z_SSGST" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SSGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SSGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SSGST->EditValue ?>"<?php echo $pharmacy_storemast->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SCGST"><?php echo $pharmacy_storemast->SCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SCGST" id="z_SCGST" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SCGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SCGST">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SCGST->EditValue ?>"<?php echo $pharmacy_storemast->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label for="x_SaleRate" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleRate"><?php echo $pharmacy_storemast->SaleRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SaleRate" id="z_SaleRate" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->SaleRate->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SaleRate">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast->SaleRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_HospID"><?php echo $pharmacy_storemast->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->HospID->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_HospID">
<input type="text" data-table="pharmacy_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->HospID->EditValue ?>"<?php echo $pharmacy_storemast->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
	<div id="r_BRNAME" class="form-group row">
		<label for="x_BRNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRNAME"><?php echo $pharmacy_storemast->BRNAME->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BRNAME" id="z_BRNAME" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->BRNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BRNAME">
<input type="text" data-table="pharmacy_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast->BRNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast->BRNAME->EditValue ?>"<?php echo $pharmacy_storemast->BRNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
	<div id="r_Scheduling" class="form-group row">
		<label class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_Scheduling"><?php echo $pharmacy_storemast->Scheduling->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Scheduling" id="z_Scheduling" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->Scheduling->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_Scheduling">
<div id="tp_x_Scheduling" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Scheduling" data-value-separator="<?php echo $pharmacy_storemast->Scheduling->displayValueSeparatorAttribute() ?>" name="x_Scheduling" id="x_Scheduling" value="{value}"<?php echo $pharmacy_storemast->Scheduling->editAttributes() ?>></div>
<div id="dsl_x_Scheduling" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Scheduling->radioButtonListHtml(FALSE, "x_Scheduling") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
	<div id="r_Schedulingh1" class="form-group row">
		<label class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_Schedulingh1"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Schedulingh1" id="z_Schedulingh1" value="LIKE"></span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div<?php echo $pharmacy_storemast->Schedulingh1->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_Schedulingh1">
<div id="tp_x_Schedulingh1" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-value-separator="<?php echo $pharmacy_storemast->Schedulingh1->displayValueSeparatorAttribute() ?>" name="x_Schedulingh1" id="x_Schedulingh1" value="{value}"<?php echo $pharmacy_storemast->Schedulingh1->editAttributes() ?>></div>
<div id="dsl_x_Schedulingh1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_storemast->Schedulingh1->radioButtonListHtml(FALSE, "x_Schedulingh1") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_storemast_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_storemast_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_storemast_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_storemast_search->terminate();
?>