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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_storemastsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($pharmacy_storemast_search->IsModal) { ?>
	fpharmacy_storemastsearch = currentAdvancedSearchForm = new ew.Form("fpharmacy_storemastsearch", "search");
	<?php } else { ?>
	fpharmacy_storemastsearch = currentForm = new ew.Form("fpharmacy_storemastsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpharmacy_storemastsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_RT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->RT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_UR");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->UR->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TAXP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->TAXP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->OQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->RQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_MRQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->MRQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_IQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->IQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_MRP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->MRP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->EXPDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SALQTY");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->SALQTY->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_LASTPURDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->LASTPURDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_LASTISSDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->LASTISSDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CREATEDDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->CREATEDDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_STAXPER");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->STAXPER->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OLDTAXP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->OLDTAXP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NEWRT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->NEWRT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NEWMRP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->NEWMRP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NEWUR");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->NEWUR->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RETNQTY");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->RETNQTY->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PATSALE");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->PATSALE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OLDRQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->OLDRQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_STRENGTH");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->STRENGTH->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_STOCK");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->STOCK->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PACKING");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->PACKING->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PhysQty");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->PhysQty->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_LedQty");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->LedQty->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PurValue");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->PurValue->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->PSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->PCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SaleValue");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->SaleValue->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->SSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->SCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SaleRate");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->SaleRate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($pharmacy_storemast_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_storemastsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_storemastsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_storemastsearch.lists["x_TYPE"] = <?php echo $pharmacy_storemast_search->TYPE->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_search->TYPE->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastsearch.lists["x_LASTSUPP"] = <?php echo $pharmacy_storemast_search->LASTSUPP->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_LASTSUPP"].options = <?php echo JsonEncode($pharmacy_storemast_search->LASTSUPP->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_search->GENNAME->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->GENNAME->lookupOptions()) ?>;
	fpharmacy_storemastsearch.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_storemastsearch.lists["x_DRID"] = <?php echo $pharmacy_storemast_search->DRID->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_search->DRID->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_search->MFRCODE->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_search->MFRCODE->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_search->COMBCODE->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_search->COMBCODE->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_search->GENCODE->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_search->GENCODE->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_UNIT"] = <?php echo $pharmacy_storemast_search->UNIT->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_search->UNIT->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastsearch.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_search->FORMULARY->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_search->FORMULARY->options(FALSE, TRUE)) ?>;
	fpharmacy_storemastsearch.lists["x_SUPPNAME"] = <?php echo $pharmacy_storemast_search->SUPPNAME->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_SUPPNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->SUPPNAME->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_search->COMBNAME->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->COMBNAME->lookupOptions()) ?>;
	fpharmacy_storemastsearch.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_search->GENERICNAME->Lookup->toClientList($pharmacy_storemast_search) ?>;
	fpharmacy_storemastsearch.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_search->GENERICNAME->lookupOptions()) ?>;
	loadjs.done("fpharmacy_storemastsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_storemast_search->showPageHeader(); ?>
<?php
$pharmacy_storemast_search->showMessage();
?>
<form name="fpharmacy_storemastsearch" id="fpharmacy_storemastsearch" class="<?php echo $pharmacy_storemast_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_storemast_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($pharmacy_storemast_search->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label for="x_BRCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRCODE"><?php echo $pharmacy_storemast_search->BRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->BRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BRCODE" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->BRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->BRCODE->EditValue ?>"<?php echo $pharmacy_storemast_search->BRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PRC"><?php echo $pharmacy_storemast_search->PRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PRC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PRC" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PRC->EditValue ?>"<?php echo $pharmacy_storemast_search->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->TYPE->Visible) { // TYPE ?>
	<div id="r_TYPE" class="form-group row">
		<label for="x_TYPE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TYPE"><?php echo $pharmacy_storemast_search->TYPE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TYPE" id="z_TYPE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->TYPE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TYPE" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_TYPE" data-value-separator="<?php echo $pharmacy_storemast_search->TYPE->displayValueSeparatorAttribute() ?>" id="x_TYPE" name="x_TYPE"<?php echo $pharmacy_storemast_search->TYPE->editAttributes() ?>>
			<?php echo $pharmacy_storemast_search->TYPE->selectOptionListHtml("x_TYPE") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label for="x_DES" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_DES"><?php echo $pharmacy_storemast_search->DES->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->DES->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_DES" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->DES->EditValue ?>"<?php echo $pharmacy_storemast_search->DES->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->UM->Visible) { // UM ?>
	<div id="r_UM" class="form-group row">
		<label for="x_UM" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UM"><?php echo $pharmacy_storemast_search->UM->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UM" id="z_UM" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->UM->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_UM" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->UM->EditValue ?>"<?php echo $pharmacy_storemast_search->UM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RT"><?php echo $pharmacy_storemast_search->RT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->RT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->RT->EditValue ?>"<?php echo $pharmacy_storemast_search->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->UR->Visible) { // UR ?>
	<div id="r_UR" class="form-group row">
		<label for="x_UR" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UR"><?php echo $pharmacy_storemast_search->UR->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_UR" id="z_UR" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->UR->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_UR" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->UR->EditValue ?>"<?php echo $pharmacy_storemast_search->UR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->TAXP->Visible) { // TAXP ?>
	<div id="r_TAXP" class="form-group row">
		<label for="x_TAXP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXP"><?php echo $pharmacy_storemast_search->TAXP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TAXP" id="z_TAXP" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->TAXP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TAXP" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->TAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->TAXP->EditValue ?>"<?php echo $pharmacy_storemast_search->TAXP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->BATCHNO->Visible) { // BATCHNO ?>
	<div id="r_BATCHNO" class="form-group row">
		<label for="x_BATCHNO" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BATCHNO"><?php echo $pharmacy_storemast_search->BATCHNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->BATCHNO->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BATCHNO" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->BATCHNO->EditValue ?>"<?php echo $pharmacy_storemast_search->BATCHNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label for="x_OQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OQ"><?php echo $pharmacy_storemast_search->OQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OQ" id="z_OQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->OQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OQ" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->OQ->EditValue ?>"<?php echo $pharmacy_storemast_search->OQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->RQ->Visible) { // RQ ?>
	<div id="r_RQ" class="form-group row">
		<label for="x_RQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RQ"><?php echo $pharmacy_storemast_search->RQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RQ" id="z_RQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->RQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RQ" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->RQ->EditValue ?>"<?php echo $pharmacy_storemast_search->RQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label for="x_MRQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRQ"><?php echo $pharmacy_storemast_search->MRQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_MRQ" id="z_MRQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->MRQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_MRQ" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->MRQ->EditValue ?>"<?php echo $pharmacy_storemast_search->MRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_IQ"><?php echo $pharmacy_storemast_search->IQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->IQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_IQ" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->IQ->EditValue ?>"<?php echo $pharmacy_storemast_search->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRP"><?php echo $pharmacy_storemast_search->MRP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_MRP" id="z_MRP" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->MRP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_MRP" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->MRP->EditValue ?>"<?php echo $pharmacy_storemast_search->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_EXPDT"><?php echo $pharmacy_storemast_search->EXPDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_EXPDT" id="z_EXPDT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->EXPDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_EXPDT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->EXPDT->EditValue ?>"<?php echo $pharmacy_storemast_search->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_search->EXPDT->ReadOnly && !$pharmacy_storemast_search->EXPDT->Disabled && !isset($pharmacy_storemast_search->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastsearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->SALQTY->Visible) { // SALQTY ?>
	<div id="r_SALQTY" class="form-group row">
		<label for="x_SALQTY" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SALQTY"><?php echo $pharmacy_storemast_search->SALQTY->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SALQTY" id="z_SALQTY" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->SALQTY->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SALQTY" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->SALQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->SALQTY->EditValue ?>"<?php echo $pharmacy_storemast_search->SALQTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->LASTPURDT->Visible) { // LASTPURDT ?>
	<div id="r_LASTPURDT" class="form-group row">
		<label for="x_LASTPURDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTPURDT"><?php echo $pharmacy_storemast_search->LASTPURDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_LASTPURDT" id="z_LASTPURDT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->LASTPURDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LASTPURDT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->LASTPURDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->LASTPURDT->EditValue ?>"<?php echo $pharmacy_storemast_search->LASTPURDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_search->LASTPURDT->ReadOnly && !$pharmacy_storemast_search->LASTPURDT->Disabled && !isset($pharmacy_storemast_search->LASTPURDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_search->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastsearch", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->LASTSUPP->Visible) { // LASTSUPP ?>
	<div id="r_LASTSUPP" class="form-group row">
		<label for="x_LASTSUPP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTSUPP"><?php echo $pharmacy_storemast_search->LASTSUPP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LASTSUPP" id="z_LASTSUPP" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->LASTSUPP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LASTSUPP" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?php echo EmptyValue(strval($pharmacy_storemast_search->LASTSUPP->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->LASTSUPP->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->LASTSUPP->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->LASTSUPP->ReadOnly || $pharmacy_storemast_search->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->LASTSUPP->Lookup->getParamTag($pharmacy_storemast_search, "p_x_LASTSUPP") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?php echo $pharmacy_storemast_search->LASTSUPP->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->LASTSUPP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENNAME"><?php echo $pharmacy_storemast_search->GENNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->GENNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_GENNAME" class="ew-search-field">
<?php
$onchange = $pharmacy_storemast_search->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_storemast_search->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast_search->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast_search->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->GENNAME->ReadOnly || $pharmacy_storemast_search->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast_search->GENNAME->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_storemastsearch"], function() {
	fpharmacy_storemastsearch.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
});
</script>
<?php echo $pharmacy_storemast_search->GENNAME->Lookup->getParamTag($pharmacy_storemast_search, "p_x_GENNAME") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->LASTISSDT->Visible) { // LASTISSDT ?>
	<div id="r_LASTISSDT" class="form-group row">
		<label for="x_LASTISSDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTISSDT"><?php echo $pharmacy_storemast_search->LASTISSDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_LASTISSDT" id="z_LASTISSDT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->LASTISSDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LASTISSDT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->LASTISSDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->LASTISSDT->EditValue ?>"<?php echo $pharmacy_storemast_search->LASTISSDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_search->LASTISSDT->ReadOnly && !$pharmacy_storemast_search->LASTISSDT->Disabled && !isset($pharmacy_storemast_search->LASTISSDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_search->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastsearch", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->CREATEDDT->Visible) { // CREATEDDT ?>
	<div id="r_CREATEDDT" class="form-group row">
		<label for="x_CREATEDDT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_CREATEDDT"><?php echo $pharmacy_storemast_search->CREATEDDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CREATEDDT" id="z_CREATEDDT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->CREATEDDT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_CREATEDDT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->CREATEDDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->CREATEDDT->EditValue ?>"<?php echo $pharmacy_storemast_search->CREATEDDT->editAttributes() ?>>
<?php if (!$pharmacy_storemast_search->CREATEDDT->ReadOnly && !$pharmacy_storemast_search->CREATEDDT->Disabled && !isset($pharmacy_storemast_search->CREATEDDT->EditAttrs["readonly"]) && !isset($pharmacy_storemast_search->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_storemastsearch", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->OPPRC->Visible) { // OPPRC ?>
	<div id="r_OPPRC" class="form-group row">
		<label for="x_OPPRC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OPPRC"><?php echo $pharmacy_storemast_search->OPPRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPPRC" id="z_OPPRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->OPPRC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OPPRC" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->OPPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->OPPRC->EditValue ?>"<?php echo $pharmacy_storemast_search->OPPRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->RESTRICT->Visible) { // RESTRICT ?>
	<div id="r_RESTRICT" class="form-group row">
		<label for="x_RESTRICT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RESTRICT"><?php echo $pharmacy_storemast_search->RESTRICT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESTRICT" id="z_RESTRICT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->RESTRICT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RESTRICT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->RESTRICT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->RESTRICT->EditValue ?>"<?php echo $pharmacy_storemast_search->RESTRICT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->BAWAPRC->Visible) { // BAWAPRC ?>
	<div id="r_BAWAPRC" class="form-group row">
		<label for="x_BAWAPRC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BAWAPRC"><?php echo $pharmacy_storemast_search->BAWAPRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BAWAPRC" id="z_BAWAPRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->BAWAPRC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BAWAPRC" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->BAWAPRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->BAWAPRC->EditValue ?>"<?php echo $pharmacy_storemast_search->BAWAPRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->STAXPER->Visible) { // STAXPER ?>
	<div id="r_STAXPER" class="form-group row">
		<label for="x_STAXPER" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STAXPER"><?php echo $pharmacy_storemast_search->STAXPER->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_STAXPER" id="z_STAXPER" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->STAXPER->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STAXPER" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->STAXPER->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->STAXPER->EditValue ?>"<?php echo $pharmacy_storemast_search->STAXPER->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->TAXTYPE->Visible) { // TAXTYPE ?>
	<div id="r_TAXTYPE" class="form-group row">
		<label for="x_TAXTYPE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXTYPE"><?php echo $pharmacy_storemast_search->TAXTYPE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TAXTYPE" id="z_TAXTYPE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->TAXTYPE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TAXTYPE" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->TAXTYPE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->TAXTYPE->EditValue ?>"<?php echo $pharmacy_storemast_search->TAXTYPE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->OLDTAXP->Visible) { // OLDTAXP ?>
	<div id="r_OLDTAXP" class="form-group row">
		<label for="x_OLDTAXP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDTAXP"><?php echo $pharmacy_storemast_search->OLDTAXP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OLDTAXP" id="z_OLDTAXP" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->OLDTAXP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OLDTAXP" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->OLDTAXP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->OLDTAXP->EditValue ?>"<?php echo $pharmacy_storemast_search->OLDTAXP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->TAXUPD->Visible) { // TAXUPD ?>
	<div id="r_TAXUPD" class="form-group row">
		<label for="x_TAXUPD" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXUPD"><?php echo $pharmacy_storemast_search->TAXUPD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TAXUPD" id="z_TAXUPD" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->TAXUPD->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TAXUPD" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->TAXUPD->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->TAXUPD->EditValue ?>"<?php echo $pharmacy_storemast_search->TAXUPD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PACKAGE->Visible) { // PACKAGE ?>
	<div id="r_PACKAGE" class="form-group row">
		<label for="x_PACKAGE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PACKAGE"><?php echo $pharmacy_storemast_search->PACKAGE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PACKAGE" id="z_PACKAGE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PACKAGE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PACKAGE" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PACKAGE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PACKAGE->EditValue ?>"<?php echo $pharmacy_storemast_search->PACKAGE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->NEWRT->Visible) { // NEWRT ?>
	<div id="r_NEWRT" class="form-group row">
		<label for="x_NEWRT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWRT"><?php echo $pharmacy_storemast_search->NEWRT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NEWRT" id="z_NEWRT" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->NEWRT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_NEWRT" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->NEWRT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->NEWRT->EditValue ?>"<?php echo $pharmacy_storemast_search->NEWRT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->NEWMRP->Visible) { // NEWMRP ?>
	<div id="r_NEWMRP" class="form-group row">
		<label for="x_NEWMRP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWMRP"><?php echo $pharmacy_storemast_search->NEWMRP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NEWMRP" id="z_NEWMRP" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->NEWMRP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_NEWMRP" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->NEWMRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->NEWMRP->EditValue ?>"<?php echo $pharmacy_storemast_search->NEWMRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->NEWUR->Visible) { // NEWUR ?>
	<div id="r_NEWUR" class="form-group row">
		<label for="x_NEWUR" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWUR"><?php echo $pharmacy_storemast_search->NEWUR->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NEWUR" id="z_NEWUR" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->NEWUR->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_NEWUR" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->NEWUR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->NEWUR->EditValue ?>"<?php echo $pharmacy_storemast_search->NEWUR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->STATUS->Visible) { // STATUS ?>
	<div id="r_STATUS" class="form-group row">
		<label for="x_STATUS" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STATUS"><?php echo $pharmacy_storemast_search->STATUS->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_STATUS" id="z_STATUS" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->STATUS->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STATUS" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->STATUS->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->STATUS->EditValue ?>"<?php echo $pharmacy_storemast_search->STATUS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->RETNQTY->Visible) { // RETNQTY ?>
	<div id="r_RETNQTY" class="form-group row">
		<label for="x_RETNQTY" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RETNQTY"><?php echo $pharmacy_storemast_search->RETNQTY->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RETNQTY" id="z_RETNQTY" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->RETNQTY->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RETNQTY" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->RETNQTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->RETNQTY->EditValue ?>"<?php echo $pharmacy_storemast_search->RETNQTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->KEMODISC->Visible) { // KEMODISC ?>
	<div id="r_KEMODISC" class="form-group row">
		<label for="x_KEMODISC" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_KEMODISC"><?php echo $pharmacy_storemast_search->KEMODISC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_KEMODISC" id="z_KEMODISC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->KEMODISC->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_KEMODISC" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->KEMODISC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->KEMODISC->EditValue ?>"<?php echo $pharmacy_storemast_search->KEMODISC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PATSALE->Visible) { // PATSALE ?>
	<div id="r_PATSALE" class="form-group row">
		<label for="x_PATSALE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PATSALE"><?php echo $pharmacy_storemast_search->PATSALE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PATSALE" id="z_PATSALE" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PATSALE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PATSALE" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PATSALE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PATSALE->EditValue ?>"<?php echo $pharmacy_storemast_search->PATSALE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->ORGAN->Visible) { // ORGAN ?>
	<div id="r_ORGAN" class="form-group row">
		<label for="x_ORGAN" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_ORGAN"><?php echo $pharmacy_storemast_search->ORGAN->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ORGAN" id="z_ORGAN" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->ORGAN->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_ORGAN" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->ORGAN->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->ORGAN->EditValue ?>"<?php echo $pharmacy_storemast_search->ORGAN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->OLDRQ->Visible) { // OLDRQ ?>
	<div id="r_OLDRQ" class="form-group row">
		<label for="x_OLDRQ" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDRQ"><?php echo $pharmacy_storemast_search->OLDRQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OLDRQ" id="z_OLDRQ" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->OLDRQ->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_OLDRQ" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->OLDRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->OLDRQ->EditValue ?>"<?php echo $pharmacy_storemast_search->OLDRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->DRID->Visible) { // DRID ?>
	<div id="r_DRID" class="form-group row">
		<label for="x_DRID" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_DRID"><?php echo $pharmacy_storemast_search->DRID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DRID" id="z_DRID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->DRID->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_DRID" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?php echo EmptyValue(strval($pharmacy_storemast_search->DRID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->DRID->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->DRID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->DRID->ReadOnly || $pharmacy_storemast_search->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->DRID->Lookup->getParamTag($pharmacy_storemast_search, "p_x_DRID") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?php echo $pharmacy_storemast_search->DRID->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->DRID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MFRCODE"><?php echo $pharmacy_storemast_search->MFRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->MFRCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_MFRCODE" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?php echo EmptyValue(strval($pharmacy_storemast_search->MFRCODE->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->MFRCODE->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->MFRCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->MFRCODE->ReadOnly || $pharmacy_storemast_search->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->MFRCODE->Lookup->getParamTag($pharmacy_storemast_search, "p_x_MFRCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?php echo $pharmacy_storemast_search->MFRCODE->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->COMBCODE->Visible) { // COMBCODE ?>
	<div id="r_COMBCODE" class="form-group row">
		<label for="x_COMBCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBCODE"><?php echo $pharmacy_storemast_search->COMBCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COMBCODE" id="z_COMBCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->COMBCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_COMBCODE" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?php echo EmptyValue(strval($pharmacy_storemast_search->COMBCODE->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->COMBCODE->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->COMBCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->COMBCODE->ReadOnly || $pharmacy_storemast_search->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->COMBCODE->Lookup->getParamTag($pharmacy_storemast_search, "p_x_COMBCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?php echo $pharmacy_storemast_search->COMBCODE->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->COMBCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->GENCODE->Visible) { // GENCODE ?>
	<div id="r_GENCODE" class="form-group row">
		<label for="x_GENCODE" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENCODE"><?php echo $pharmacy_storemast_search->GENCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENCODE" id="z_GENCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->GENCODE->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_GENCODE" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?php echo EmptyValue(strval($pharmacy_storemast_search->GENCODE->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->GENCODE->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->GENCODE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->GENCODE->ReadOnly || $pharmacy_storemast_search->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->GENCODE->Lookup->getParamTag($pharmacy_storemast_search, "p_x_GENCODE") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?php echo $pharmacy_storemast_search->GENCODE->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->GENCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->STRENGTH->Visible) { // STRENGTH ?>
	<div id="r_STRENGTH" class="form-group row">
		<label for="x_STRENGTH" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STRENGTH"><?php echo $pharmacy_storemast_search->STRENGTH->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_STRENGTH" id="z_STRENGTH" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->STRENGTH->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STRENGTH" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->STRENGTH->EditValue ?>"<?php echo $pharmacy_storemast_search->STRENGTH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label for="x_UNIT" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UNIT"><?php echo $pharmacy_storemast_search->UNIT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UNIT" id="z_UNIT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->UNIT->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_UNIT" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_UNIT" data-value-separator="<?php echo $pharmacy_storemast_search->UNIT->displayValueSeparatorAttribute() ?>" id="x_UNIT" name="x_UNIT"<?php echo $pharmacy_storemast_search->UNIT->editAttributes() ?>>
			<?php echo $pharmacy_storemast_search->UNIT->selectOptionListHtml("x_UNIT") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->FORMULARY->Visible) { // FORMULARY ?>
	<div id="r_FORMULARY" class="form-group row">
		<label for="x_FORMULARY" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_FORMULARY"><?php echo $pharmacy_storemast_search->FORMULARY->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FORMULARY" id="z_FORMULARY" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->FORMULARY->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_FORMULARY" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-value-separator="<?php echo $pharmacy_storemast_search->FORMULARY->displayValueSeparatorAttribute() ?>" id="x_FORMULARY" name="x_FORMULARY"<?php echo $pharmacy_storemast_search->FORMULARY->editAttributes() ?>>
			<?php echo $pharmacy_storemast_search->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->STOCK->Visible) { // STOCK ?>
	<div id="r_STOCK" class="form-group row">
		<label for="x_STOCK" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STOCK"><?php echo $pharmacy_storemast_search->STOCK->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_STOCK" id="z_STOCK" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->STOCK->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_STOCK" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->STOCK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->STOCK->EditValue ?>"<?php echo $pharmacy_storemast_search->STOCK->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->RACKNO->Visible) { // RACKNO ?>
	<div id="r_RACKNO" class="form-group row">
		<label for="x_RACKNO" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RACKNO"><?php echo $pharmacy_storemast_search->RACKNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RACKNO" id="z_RACKNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->RACKNO->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_RACKNO" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->RACKNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->RACKNO->EditValue ?>"<?php echo $pharmacy_storemast_search->RACKNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->SUPPNAME->Visible) { // SUPPNAME ?>
	<div id="r_SUPPNAME" class="form-group row">
		<label for="x_SUPPNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SUPPNAME"><?php echo $pharmacy_storemast_search->SUPPNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SUPPNAME" id="z_SUPPNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->SUPPNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SUPPNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?php echo EmptyValue(strval($pharmacy_storemast_search->SUPPNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->SUPPNAME->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->SUPPNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->SUPPNAME->ReadOnly || $pharmacy_storemast_search->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->SUPPNAME->Lookup->getParamTag($pharmacy_storemast_search, "p_x_SUPPNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?php echo $pharmacy_storemast_search->SUPPNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->SUPPNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->COMBNAME->Visible) { // COMBNAME ?>
	<div id="r_COMBNAME" class="form-group row">
		<label for="x_COMBNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBNAME"><?php echo $pharmacy_storemast_search->COMBNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COMBNAME" id="z_COMBNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->COMBNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_COMBNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo EmptyValue(strval($pharmacy_storemast_search->COMBNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->COMBNAME->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->COMBNAME->ReadOnly || $pharmacy_storemast_search->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->COMBNAME->Lookup->getParamTag($pharmacy_storemast_search, "p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast_search->COMBNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->COMBNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->GENERICNAME->Visible) { // GENERICNAME ?>
	<div id="r_GENERICNAME" class="form-group row">
		<label for="x_GENERICNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENERICNAME"><?php echo $pharmacy_storemast_search->GENERICNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENERICNAME" id="z_GENERICNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->GENERICNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_GENERICNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo EmptyValue(strval($pharmacy_storemast_search->GENERICNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_search->GENERICNAME->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_search->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_search->GENERICNAME->ReadOnly || $pharmacy_storemast_search->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_search->GENERICNAME->Lookup->getParamTag($pharmacy_storemast_search, "p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_search->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast_search->GENERICNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_search->GENERICNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->REMARK->Visible) { // REMARK ?>
	<div id="r_REMARK" class="form-group row">
		<label for="x_REMARK" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_REMARK"><?php echo $pharmacy_storemast_search->REMARK->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_REMARK" id="z_REMARK" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->REMARK->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_REMARK" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->REMARK->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->REMARK->EditValue ?>"<?php echo $pharmacy_storemast_search->REMARK->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->TEMP->Visible) { // TEMP ?>
	<div id="r_TEMP" class="form-group row">
		<label for="x_TEMP" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TEMP"><?php echo $pharmacy_storemast_search->TEMP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TEMP" id="z_TEMP" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->TEMP->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_TEMP" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->TEMP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->TEMP->EditValue ?>"<?php echo $pharmacy_storemast_search->TEMP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PACKING->Visible) { // PACKING ?>
	<div id="r_PACKING" class="form-group row">
		<label for="x_PACKING" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PACKING"><?php echo $pharmacy_storemast_search->PACKING->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PACKING" id="z_PACKING" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PACKING->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PACKING" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PACKING->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PACKING->EditValue ?>"<?php echo $pharmacy_storemast_search->PACKING->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PhysQty->Visible) { // PhysQty ?>
	<div id="r_PhysQty" class="form-group row">
		<label for="x_PhysQty" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PhysQty"><?php echo $pharmacy_storemast_search->PhysQty->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PhysQty" id="z_PhysQty" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PhysQty->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PhysQty" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PhysQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PhysQty->EditValue ?>"<?php echo $pharmacy_storemast_search->PhysQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->LedQty->Visible) { // LedQty ?>
	<div id="r_LedQty" class="form-group row">
		<label for="x_LedQty" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LedQty"><?php echo $pharmacy_storemast_search->LedQty->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_LedQty" id="z_LedQty" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->LedQty->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_LedQty" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->LedQty->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->LedQty->EditValue ?>"<?php echo $pharmacy_storemast_search->LedQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_id"><?php echo $pharmacy_storemast_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->id->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_id" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->id->EditValue ?>"<?php echo $pharmacy_storemast_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PurValue"><?php echo $pharmacy_storemast_search->PurValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PurValue->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PurValue" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PurValue->EditValue ?>"<?php echo $pharmacy_storemast_search->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PSGST"><?php echo $pharmacy_storemast_search->PSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PSGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PSGST" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PSGST->EditValue ?>"<?php echo $pharmacy_storemast_search->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PCGST"><?php echo $pharmacy_storemast_search->PCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->PCGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_PCGST" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->PCGST->EditValue ?>"<?php echo $pharmacy_storemast_search->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->SaleValue->Visible) { // SaleValue ?>
	<div id="r_SaleValue" class="form-group row">
		<label for="x_SaleValue" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleValue"><?php echo $pharmacy_storemast_search->SaleValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SaleValue" id="z_SaleValue" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->SaleValue->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SaleValue" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->SaleValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->SaleValue->EditValue ?>"<?php echo $pharmacy_storemast_search->SaleValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SSGST"><?php echo $pharmacy_storemast_search->SSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->SSGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SSGST" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->SSGST->EditValue ?>"<?php echo $pharmacy_storemast_search->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SCGST"><?php echo $pharmacy_storemast_search->SCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->SCGST->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SCGST" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->SCGST->EditValue ?>"<?php echo $pharmacy_storemast_search->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->SaleRate->Visible) { // SaleRate ?>
	<div id="r_SaleRate" class="form-group row">
		<label for="x_SaleRate" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleRate"><?php echo $pharmacy_storemast_search->SaleRate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SaleRate" id="z_SaleRate" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->SaleRate->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_SaleRate" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->SaleRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->SaleRate->EditValue ?>"<?php echo $pharmacy_storemast_search->SaleRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_HospID"><?php echo $pharmacy_storemast_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->HospID->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_HospID" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->HospID->EditValue ?>"<?php echo $pharmacy_storemast_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_storemast_search->BRNAME->Visible) { // BRNAME ?>
	<div id="r_BRNAME" class="form-group row">
		<label for="x_BRNAME" class="<?php echo $pharmacy_storemast_search->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRNAME"><?php echo $pharmacy_storemast_search->BRNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BRNAME" id="z_BRNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $pharmacy_storemast_search->RightColumnClass ?>"><div <?php echo $pharmacy_storemast_search->BRNAME->cellAttributes() ?>>
			<span id="el_pharmacy_storemast_BRNAME" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_storemast_search->BRNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_search->BRNAME->EditValue ?>"<?php echo $pharmacy_storemast_search->BRNAME->editAttributes() ?>>
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
$pharmacy_storemast_search->terminate();
?>