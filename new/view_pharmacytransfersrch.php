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
$view_pharmacytransfer_search = new view_pharmacytransfer_search();

// Run the page
$view_pharmacytransfer_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacytransfersearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_pharmacytransfer_search->IsModal) { ?>
	fview_pharmacytransfersearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacytransfersearch", "search");
	<?php } else { ?>
	fview_pharmacytransfersearch = currentForm = new ew.Form("fview_pharmacytransfersearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_pharmacytransfersearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_BRCODE");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->BRCODE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_QTY");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->QTY->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->DT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Stock");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->Stock->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_grnid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->grnid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_poid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->poid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_LastMonthSale");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->LastMonthSale->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_GrnQuantity");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->GrnQuantity->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Quantity");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->Quantity->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_FreeQty");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->FreeQty->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ExpDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->ExpDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PUnit");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->PUnit->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SUnit");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->SUnit->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_MRP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->MRP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PurValue");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->PurValue->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Disc");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->Disc->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->PSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->PCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PTax");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->PTax->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ItemValue");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->ItemValue->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SalTax");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->SalTax->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PurRate");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->PurRate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SalRate");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->SalRate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Discount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->Discount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->SSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->SCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_GrnMRP");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->GrnMRP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_trid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->trid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CreatedBy");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->CreatedBy->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CreatedDateTime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->CreatedDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ModifiedBy");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->ModifiedBy->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ModifiedDateTime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->ModifiedDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_grncreatedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->grncreatedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_grncreatedDateTime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->grncreatedDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_grnModifiedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->grnModifiedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_grnModifiedDateTime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->grnModifiedDateTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BillDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->BillDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CurStock");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer_search->CurStock->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacytransfersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacytransfersearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacytransfersearch.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_search->ORDNO->Lookup->toClientList($view_pharmacytransfer_search) ?>;
	fview_pharmacytransfersearch.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_search->ORDNO->lookupOptions()) ?>;
	fview_pharmacytransfersearch.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacytransfersearch.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_search->BRCODE->Lookup->toClientList($view_pharmacytransfer_search) ?>;
	fview_pharmacytransfersearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_search->BRCODE->lookupOptions()) ?>;
	fview_pharmacytransfersearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacytransfersearch.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_search->LastMonthSale->Lookup->toClientList($view_pharmacytransfer_search) ?>;
	fview_pharmacytransfersearch.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_search->LastMonthSale->lookupOptions()) ?>;
	fview_pharmacytransfersearch.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacytransfersearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacytransfer_search->showPageHeader(); ?>
<?php
$view_pharmacytransfer_search->showMessage();
?>
<form name="fview_pharmacytransfersearch" id="fview_pharmacytransfersearch" class="<?php echo $view_pharmacytransfer_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacytransfer_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacytransfer_search->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ORDNO"><?php echo $view_pharmacytransfer_search->ORDNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ORDNO" id="z_ORDNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->ORDNO->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ORDNO" class="ew-search-field">
<?php
$onchange = $view_pharmacytransfer_search->ORDNO->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_search->ORDNO->EditAttrs["onchange"] = "";
?>
<span id="as_x_ORDNO">
	<input type="text" class="form-control" name="sv_x_ORDNO" id="sv_x_ORDNO" value="<?php echo RemoveHtml($view_pharmacytransfer_search->ORDNO->EditValue) ?>" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->ORDNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->ORDNO->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_search->ORDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" data-value-separator="<?php echo $view_pharmacytransfer_search->ORDNO->displayValueSeparatorAttribute() ?>" name="x_ORDNO" id="x_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer_search->ORDNO->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransfersearch"], function() {
	fview_pharmacytransfersearch.createAutoSuggest({"id":"x_ORDNO","forceSelect":false});
});
</script>
<?php echo $view_pharmacytransfer_search->ORDNO->Lookup->getParamTag($view_pharmacytransfer_search, "p_x_ORDNO") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BRCODE"><?php echo $view_pharmacytransfer_search->BRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_BRCODE" class="ew-search-field">
<?php
$onchange = $view_pharmacytransfer_search->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_search->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer_search->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_search->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer_search->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer_search->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransfersearch"], function() {
	fview_pharmacytransfersearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":false});
});
</script>
<?php echo $view_pharmacytransfer_search->BRCODE->Lookup->getParamTag($view_pharmacytransfer_search, "p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PRC"><?php echo $view_pharmacytransfer_search->PRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PRC->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PRC" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PRC->EditValue ?>"<?php echo $view_pharmacytransfer_search->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label for="x_QTY" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_QTY"><?php echo $view_pharmacytransfer_search->QTY->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_QTY" id="z_QTY" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->QTY->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_QTY" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->QTY->EditValue ?>"<?php echo $view_pharmacytransfer_search->QTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label for="x_DT" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_DT"><?php echo $view_pharmacytransfer_search->DT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DT" id="z_DT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->DT->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_DT" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->DT->EditValue ?>"<?php echo $view_pharmacytransfer_search->DT->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->DT->ReadOnly && !$view_pharmacytransfer_search->DT->Disabled && !isset($view_pharmacytransfer_search->DT->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label for="x_PC" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PC"><?php echo $view_pharmacytransfer_search->PC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PC" id="z_PC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PC->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PC" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PC->EditValue ?>"<?php echo $view_pharmacytransfer_search->PC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label for="x_YM" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_YM"><?php echo $view_pharmacytransfer_search->YM->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_YM" id="z_YM" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->YM->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_YM" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->YM->EditValue ?>"<?php echo $view_pharmacytransfer_search->YM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label for="x_Stock" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Stock"><?php echo $view_pharmacytransfer_search->Stock->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Stock" id="z_Stock" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Stock->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Stock" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Stock->EditValue ?>"<?php echo $view_pharmacytransfer_search->Stock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label for="x_Printcheck" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Printcheck"><?php echo $view_pharmacytransfer_search->Printcheck->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Printcheck" id="z_Printcheck" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Printcheck->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Printcheck" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Printcheck->EditValue ?>"<?php echo $view_pharmacytransfer_search->Printcheck->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_id"><?php echo $view_pharmacytransfer_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->id->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_id" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->id->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->id->EditValue ?>"<?php echo $view_pharmacytransfer_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label for="x_grnid" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnid"><?php echo $view_pharmacytransfer_search->grnid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_grnid" id="z_grnid" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->grnid->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grnid" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->grnid->EditValue ?>"<?php echo $view_pharmacytransfer_search->grnid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label for="x_poid" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_poid"><?php echo $view_pharmacytransfer_search->poid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_poid" id="z_poid" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->poid->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_poid" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->poid->EditValue ?>"<?php echo $view_pharmacytransfer_search->poid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_LastMonthSale"><?php echo $view_pharmacytransfer_search->LastMonthSale->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_LastMonthSale" id="z_LastMonthSale" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->LastMonthSale->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_LastMonthSale" class="ew-search-field">
<?php
$onchange = $view_pharmacytransfer_search->LastMonthSale->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacytransfer_search->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale">
	<input type="text" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer_search->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer_search->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer_search->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer_search->LastMonthSale->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacytransfersearch"], function() {
	fview_pharmacytransfersearch.createAutoSuggest({"id":"x_LastMonthSale","forceSelect":true});
});
</script>
<?php echo $view_pharmacytransfer_search->LastMonthSale->Lookup->getParamTag($view_pharmacytransfer_search, "p_x_LastMonthSale") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label for="x_PrName" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PrName"><?php echo $view_pharmacytransfer_search->PrName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PrName->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PrName" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PrName->EditValue ?>"<?php echo $view_pharmacytransfer_search->PrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label for="x_GrnQuantity" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnQuantity"><?php echo $view_pharmacytransfer_search->GrnQuantity->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_GrnQuantity" id="z_GrnQuantity" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->GrnQuantity->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_GrnQuantity" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->GrnQuantity->EditValue ?>"<?php echo $view_pharmacytransfer_search->GrnQuantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Quantity"><?php echo $view_pharmacytransfer_search->Quantity->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Quantity" id="z_Quantity" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Quantity->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Quantity" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer_search->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label for="x_FreeQty" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_FreeQty"><?php echo $view_pharmacytransfer_search->FreeQty->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_FreeQty" id="z_FreeQty" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->FreeQty->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_FreeQty" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->FreeQty->EditValue ?>"<?php echo $view_pharmacytransfer_search->FreeQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label for="x_BatchNo" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BatchNo"><?php echo $view_pharmacytransfer_search->BatchNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->BatchNo->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_BatchNo" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer_search->BatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label for="x_ExpDate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ExpDate"><?php echo $view_pharmacytransfer_search->ExpDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ExpDate" id="z_ExpDate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->ExpDate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ExpDate" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer_search->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->ExpDate->ReadOnly && !$view_pharmacytransfer_search->ExpDate->Disabled && !isset($view_pharmacytransfer_search->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label for="x_HSN" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HSN"><?php echo $view_pharmacytransfer_search->HSN->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HSN" id="z_HSN" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->HSN->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_HSN" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->HSN->EditValue ?>"<?php echo $view_pharmacytransfer_search->HSN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MFRCODE"><?php echo $view_pharmacytransfer_search->MFRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_MFRCODE" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->MFRCODE->EditValue ?>"<?php echo $view_pharmacytransfer_search->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label for="x_PUnit" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PUnit"><?php echo $view_pharmacytransfer_search->PUnit->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PUnit" id="z_PUnit" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PUnit->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PUnit" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PUnit->EditValue ?>"<?php echo $view_pharmacytransfer_search->PUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label for="x_SUnit" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SUnit"><?php echo $view_pharmacytransfer_search->SUnit->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SUnit" id="z_SUnit" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->SUnit->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SUnit" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->SUnit->EditValue ?>"<?php echo $view_pharmacytransfer_search->SUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MRP"><?php echo $view_pharmacytransfer_search->MRP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_MRP" id="z_MRP" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->MRP->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_MRP" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->MRP->EditValue ?>"<?php echo $view_pharmacytransfer_search->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurValue"><?php echo $view_pharmacytransfer_search->PurValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PurValue->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PurValue" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PurValue->EditValue ?>"<?php echo $view_pharmacytransfer_search->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label for="x_Disc" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Disc"><?php echo $view_pharmacytransfer_search->Disc->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Disc" id="z_Disc" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Disc->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Disc" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Disc->EditValue ?>"<?php echo $view_pharmacytransfer_search->Disc->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PSGST"><?php echo $view_pharmacytransfer_search->PSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PSGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PSGST" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PSGST->EditValue ?>"<?php echo $view_pharmacytransfer_search->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PCGST"><?php echo $view_pharmacytransfer_search->PCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PCGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PCGST" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PCGST->EditValue ?>"<?php echo $view_pharmacytransfer_search->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label for="x_PTax" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PTax"><?php echo $view_pharmacytransfer_search->PTax->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PTax" id="z_PTax" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PTax->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PTax" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PTax->EditValue ?>"<?php echo $view_pharmacytransfer_search->PTax->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label for="x_ItemValue" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ItemValue"><?php echo $view_pharmacytransfer_search->ItemValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ItemValue" id="z_ItemValue" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->ItemValue->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ItemValue" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer_search->ItemValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label for="x_SalTax" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalTax"><?php echo $view_pharmacytransfer_search->SalTax->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SalTax" id="z_SalTax" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->SalTax->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SalTax" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->SalTax->EditValue ?>"<?php echo $view_pharmacytransfer_search->SalTax->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurRate"><?php echo $view_pharmacytransfer_search->PurRate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PurRate" id="z_PurRate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->PurRate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PurRate" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->PurRate->EditValue ?>"<?php echo $view_pharmacytransfer_search->PurRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label for="x_SalRate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalRate"><?php echo $view_pharmacytransfer_search->SalRate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SalRate" id="z_SalRate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->SalRate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SalRate" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->SalRate->EditValue ?>"<?php echo $view_pharmacytransfer_search->SalRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label for="x_Discount" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Discount"><?php echo $view_pharmacytransfer_search->Discount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Discount" id="z_Discount" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Discount->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Discount" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Discount->EditValue ?>"<?php echo $view_pharmacytransfer_search->Discount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SSGST"><?php echo $view_pharmacytransfer_search->SSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->SSGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SSGST" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->SSGST->EditValue ?>"<?php echo $view_pharmacytransfer_search->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SCGST"><?php echo $view_pharmacytransfer_search->SCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->SCGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SCGST" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->SCGST->EditValue ?>"<?php echo $view_pharmacytransfer_search->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label for="x_Pack" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Pack"><?php echo $view_pharmacytransfer_search->Pack->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pack" id="z_Pack" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Pack->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Pack" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Pack->EditValue ?>"<?php echo $view_pharmacytransfer_search->Pack->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label for="x_GrnMRP" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnMRP"><?php echo $view_pharmacytransfer_search->GrnMRP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_GrnMRP" id="z_GrnMRP" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->GrnMRP->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_GrnMRP" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->GrnMRP->EditValue ?>"<?php echo $view_pharmacytransfer_search->GrnMRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label for="x_trid" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_trid"><?php echo $view_pharmacytransfer_search->trid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_trid" id="z_trid" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->trid->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_trid" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->trid->EditValue ?>"<?php echo $view_pharmacytransfer_search->trid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HospID"><?php echo $view_pharmacytransfer_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_HospID" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->HospID->EditValue ?>"<?php echo $view_pharmacytransfer_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label for="x_CreatedBy" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedBy"><?php echo $view_pharmacytransfer_search->CreatedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CreatedBy" id="z_CreatedBy" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->CreatedBy->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_CreatedBy" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->CreatedBy->EditValue ?>"<?php echo $view_pharmacytransfer_search->CreatedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label for="x_CreatedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedDateTime"><?php echo $view_pharmacytransfer_search->CreatedDateTime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CreatedDateTime" id="z_CreatedDateTime" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->CreatedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_CreatedDateTime" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer_search->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->CreatedDateTime->ReadOnly && !$view_pharmacytransfer_search->CreatedDateTime->Disabled && !isset($view_pharmacytransfer_search->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label for="x_ModifiedBy" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedBy"><?php echo $view_pharmacytransfer_search->ModifiedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ModifiedBy" id="z_ModifiedBy" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->ModifiedBy->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ModifiedBy" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->ModifiedBy->EditValue ?>"<?php echo $view_pharmacytransfer_search->ModifiedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label for="x_ModifiedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedDateTime"><?php echo $view_pharmacytransfer_search->ModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ModifiedDateTime" id="z_ModifiedDateTime" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->ModifiedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ModifiedDateTime" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer_search->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->ModifiedDateTime->ReadOnly && !$view_pharmacytransfer_search->ModifiedDateTime->Disabled && !isset($view_pharmacytransfer_search->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label for="x_grncreatedby" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedby"><?php echo $view_pharmacytransfer_search->grncreatedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_grncreatedby" id="z_grncreatedby" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->grncreatedby->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grncreatedby" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->grncreatedby->EditValue ?>"<?php echo $view_pharmacytransfer_search->grncreatedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label for="x_grncreatedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedDateTime"><?php echo $view_pharmacytransfer_search->grncreatedDateTime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_grncreatedDateTime" id="z_grncreatedDateTime" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->grncreatedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grncreatedDateTime" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->grncreatedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer_search->grncreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->grncreatedDateTime->ReadOnly && !$view_pharmacytransfer_search->grncreatedDateTime->Disabled && !isset($view_pharmacytransfer_search->grncreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label for="x_grnModifiedby" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedby"><?php echo $view_pharmacytransfer_search->grnModifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_grnModifiedby" id="z_grnModifiedby" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->grnModifiedby->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grnModifiedby" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->grnModifiedby->EditValue ?>"<?php echo $view_pharmacytransfer_search->grnModifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label for="x_grnModifiedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedDateTime"><?php echo $view_pharmacytransfer_search->grnModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_grnModifiedDateTime" id="z_grnModifiedDateTime" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->grnModifiedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grnModifiedDateTime" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->grnModifiedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer_search->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->grnModifiedDateTime->ReadOnly && !$view_pharmacytransfer_search->grnModifiedDateTime->Disabled && !isset($view_pharmacytransfer_search->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label for="x_Received" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Received"><?php echo $view_pharmacytransfer_search->Received->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Received" id="z_Received" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->Received->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Received" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->Received->EditValue ?>"<?php echo $view_pharmacytransfer_search->Received->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label for="x_BillDate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BillDate"><?php echo $view_pharmacytransfer_search->BillDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillDate" id="z_BillDate" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->BillDate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_BillDate" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer_search->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer_search->BillDate->ReadOnly && !$view_pharmacytransfer_search->BillDate->Disabled && !isset($view_pharmacytransfer_search->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer_search->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacytransfersearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer_search->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label for="x_CurStock" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CurStock"><?php echo $view_pharmacytransfer_search->CurStock->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CurStock" id="z_CurStock" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div <?php echo $view_pharmacytransfer_search->CurStock->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_CurStock" class="ew-search-field">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer_search->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer_search->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer_search->CurStock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacytransfer_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacytransfer_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacytransfer_search->showPageFooter();
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
$view_pharmacytransfer_search->terminate();
?>