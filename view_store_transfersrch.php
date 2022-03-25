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
$view_store_transfer_search = new view_store_transfer_search();

// Run the page
$view_store_transfer_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_transfer_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_store_transfer_search->IsModal) { ?>
var fview_store_transfersearch = currentAdvancedSearchForm = new ew.Form("fview_store_transfersearch", "search");
<?php } else { ?>
var fview_store_transfersearch = currentForm = new ew.Form("fview_store_transfersearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_store_transfersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_transfersearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_transfersearch.lists["x_ORDNO"] = <?php echo $view_store_transfer_search->ORDNO->Lookup->toClientList() ?>;
fview_store_transfersearch.lists["x_ORDNO"].options = <?php echo JsonEncode($view_store_transfer_search->ORDNO->lookupOptions()) ?>;
fview_store_transfersearch.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transfersearch.lists["x_LastMonthSale"] = <?php echo $view_store_transfer_search->LastMonthSale->Lookup->toClientList() ?>;
fview_store_transfersearch.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_store_transfer_search->LastMonthSale->lookupOptions()) ?>;
fview_store_transfersearch.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transfersearch.lists["x_BRCODE"] = <?php echo $view_store_transfer_search->BRCODE->Lookup->toClientList() ?>;
fview_store_transfersearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_store_transfer_search->BRCODE->lookupOptions()) ?>;
fview_store_transfersearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
// Validate function for search

fview_store_transfersearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_QTY");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->QTY->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->DT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Stock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Stock->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LastMonthSale");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->LastMonthSale->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_poid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->poid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grnid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->grnid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ExpDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ExpDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Quantity");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Quantity->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_FreeQty");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->FreeQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ItemValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ItemValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Disc");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Disc->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PTax");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PTax->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_MRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->MRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalTax");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SalTax->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PurValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PurRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SalRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Discount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->Discount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BRCODE");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->BRCODE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->PUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->SUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_GrnQuantity");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->GrnQuantity->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_GrnMRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->GrnMRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_strid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->strid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CreatedBy");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CreatedBy->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CreatedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CreatedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ModifiedBy");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ModifiedBy->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ModifiedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->ModifiedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grncreatedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->grncreatedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grncreatedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->grncreatedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grnModifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->grnModifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grnModifiedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->grnModifiedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->BillDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CurStock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_store_transfer->CurStock->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_store_transfer_search->showPageHeader(); ?>
<?php
$view_store_transfer_search->showMessage();
?>
<form name="fview_store_transfersearch" id="fview_store_transfersearch" class="<?php echo $view_store_transfer_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_store_transfer_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_store_transfer_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_store_transfer">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_store_transfer_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_ORDNO"><?php echo $view_store_transfer->ORDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ORDNO" id="z_ORDNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->ORDNO->cellAttributes() ?>>
			<span id="el_view_store_transfer_ORDNO">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->ORDNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->ORDNO->EditAttrs["onchange"] = "";
?>
<span id="as_x_ORDNO" class="text-nowrap" style="z-index: 8990">
	<input type="text" class="form-control" name="sv_x_ORDNO" id="sv_x_ORDNO" value="<?php echo RemoveHtml($view_store_transfer->ORDNO->EditValue) ?>" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_store_transfer->ORDNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->ORDNO->getPlaceHolder()) ?>"<?php echo $view_store_transfer->ORDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" data-value-separator="<?php echo $view_store_transfer->ORDNO->displayValueSeparatorAttribute() ?>" name="x_ORDNO" id="x_ORDNO" value="<?php echo HtmlEncode($view_store_transfer->ORDNO->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfersearch.createAutoSuggest({"id":"x_ORDNO","forceSelect":false});
</script>
<?php echo $view_store_transfer->ORDNO->Lookup->getParamTag("p_x_ORDNO") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PRC"><?php echo $view_store_transfer->PRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PRC->cellAttributes() ?>>
			<span id="el_view_store_transfer_PRC">
<input type="text" data-table="view_store_transfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_store_transfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PRC->EditValue ?>"<?php echo $view_store_transfer->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label for="x_QTY" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_QTY"><?php echo $view_store_transfer->QTY->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_QTY" id="z_QTY" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->QTY->cellAttributes() ?>>
			<span id="el_view_store_transfer_QTY">
<input type="text" data-table="view_store_transfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->QTY->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->QTY->EditValue ?>"<?php echo $view_store_transfer->QTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label for="x_DT" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_DT"><?php echo $view_store_transfer->DT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DT" id="z_DT" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->DT->cellAttributes() ?>>
			<span id="el_view_store_transfer_DT">
<input type="text" data-table="view_store_transfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_store_transfer->DT->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->DT->EditValue ?>"<?php echo $view_store_transfer->DT->editAttributes() ?>>
<?php if (!$view_store_transfer->DT->ReadOnly && !$view_store_transfer->DT->Disabled && !isset($view_store_transfer->DT->EditAttrs["readonly"]) && !isset($view_store_transfer->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label for="x_PC" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PC"><?php echo $view_store_transfer->PC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PC" id="z_PC" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PC->cellAttributes() ?>>
			<span id="el_view_store_transfer_PC">
<input type="text" data-table="view_store_transfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_store_transfer->PC->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PC->EditValue ?>"<?php echo $view_store_transfer->PC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label for="x_YM" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_YM"><?php echo $view_store_transfer->YM->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_YM" id="z_YM" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->YM->cellAttributes() ?>>
			<span id="el_view_store_transfer_YM">
<input type="text" data-table="view_store_transfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_store_transfer->YM->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->YM->EditValue ?>"<?php echo $view_store_transfer->YM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_MFRCODE"><?php echo $view_store_transfer->MFRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->MFRCODE->cellAttributes() ?>>
			<span id="el_view_store_transfer_MFRCODE">
<input type="text" data-table="view_store_transfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MFRCODE->EditValue ?>"<?php echo $view_store_transfer->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label for="x_Stock" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Stock"><?php echo $view_store_transfer->Stock->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Stock" id="z_Stock" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Stock->cellAttributes() ?>>
			<span id="el_view_store_transfer_Stock">
<input type="text" data-table="view_store_transfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->Stock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Stock->EditValue ?>"<?php echo $view_store_transfer->Stock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_LastMonthSale"><?php echo $view_store_transfer->LastMonthSale->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LastMonthSale" id="z_LastMonthSale" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->LastMonthSale->cellAttributes() ?>>
			<span id="el_view_store_transfer_LastMonthSale">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale" class="text-nowrap" style="z-index: 8910">
	<input type="text" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?php echo RemoveHtml($view_store_transfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_store_transfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_store_transfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?php echo HtmlEncode($view_store_transfer->LastMonthSale->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfersearch.createAutoSuggest({"id":"x_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_store_transfer->LastMonthSale->Lookup->getParamTag("p_x_LastMonthSale") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label for="x_Printcheck" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Printcheck"><?php echo $view_store_transfer->Printcheck->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Printcheck" id="z_Printcheck" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Printcheck->cellAttributes() ?>>
			<span id="el_view_store_transfer_Printcheck">
<input type="text" data-table="view_store_transfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_store_transfer->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Printcheck->EditValue ?>"<?php echo $view_store_transfer->Printcheck->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_id"><?php echo $view_store_transfer->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->id->cellAttributes() ?>>
			<span id="el_view_store_transfer_id">
<input type="text" data-table="view_store_transfer" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_store_transfer->id->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->id->EditValue ?>"<?php echo $view_store_transfer->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label for="x_poid" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_poid"><?php echo $view_store_transfer->poid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_poid" id="z_poid" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->poid->cellAttributes() ?>>
			<span id="el_view_store_transfer_poid">
<input type="text" data-table="view_store_transfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->poid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->poid->EditValue ?>"<?php echo $view_store_transfer->poid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label for="x_grnid" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_grnid"><?php echo $view_store_transfer->grnid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grnid" id="z_grnid" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->grnid->cellAttributes() ?>>
			<span id="el_view_store_transfer_grnid">
<input type="text" data-table="view_store_transfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->grnid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->grnid->EditValue ?>"<?php echo $view_store_transfer->grnid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label for="x_BatchNo" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_BatchNo"><?php echo $view_store_transfer->BatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->BatchNo->cellAttributes() ?>>
			<span id="el_view_store_transfer_BatchNo">
<input type="text" data-table="view_store_transfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BatchNo->EditValue ?>"<?php echo $view_store_transfer->BatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label for="x_ExpDate" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_ExpDate"><?php echo $view_store_transfer->ExpDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ExpDate" id="z_ExpDate" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->ExpDate->cellAttributes() ?>>
			<span id="el_view_store_transfer_ExpDate">
<input type="text" data-table="view_store_transfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_store_transfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ExpDate->EditValue ?>"<?php echo $view_store_transfer->ExpDate->editAttributes() ?>>
<?php if (!$view_store_transfer->ExpDate->ReadOnly && !$view_store_transfer->ExpDate->Disabled && !isset($view_store_transfer->ExpDate->EditAttrs["readonly"]) && !isset($view_store_transfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label for="x_PrName" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PrName"><?php echo $view_store_transfer->PrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PrName->cellAttributes() ?>>
			<span id="el_view_store_transfer_PrName">
<input type="text" data-table="view_store_transfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_store_transfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PrName->EditValue ?>"<?php echo $view_store_transfer->PrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Quantity"><?php echo $view_store_transfer->Quantity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Quantity" id="z_Quantity" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Quantity->cellAttributes() ?>>
			<span id="el_view_store_transfer_Quantity">
<input type="text" data-table="view_store_transfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Quantity->EditValue ?>"<?php echo $view_store_transfer->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label for="x_FreeQty" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_FreeQty"><?php echo $view_store_transfer->FreeQty->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_FreeQty" id="z_FreeQty" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->FreeQty->cellAttributes() ?>>
			<span id="el_view_store_transfer_FreeQty">
<input type="text" data-table="view_store_transfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->FreeQty->EditValue ?>"<?php echo $view_store_transfer->FreeQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label for="x_ItemValue" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_ItemValue"><?php echo $view_store_transfer->ItemValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ItemValue" id="z_ItemValue" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->ItemValue->cellAttributes() ?>>
			<span id="el_view_store_transfer_ItemValue">
<input type="text" data-table="view_store_transfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_store_transfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ItemValue->EditValue ?>"<?php echo $view_store_transfer->ItemValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label for="x_Disc" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Disc"><?php echo $view_store_transfer->Disc->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Disc" id="z_Disc" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Disc->cellAttributes() ?>>
			<span id="el_view_store_transfer_Disc">
<input type="text" data-table="view_store_transfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->Disc->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Disc->EditValue ?>"<?php echo $view_store_transfer->Disc->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label for="x_PTax" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PTax"><?php echo $view_store_transfer->PTax->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PTax" id="z_PTax" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PTax->cellAttributes() ?>>
			<span id="el_view_store_transfer_PTax">
<input type="text" data-table="view_store_transfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PTax->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PTax->EditValue ?>"<?php echo $view_store_transfer->PTax->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_MRP"><?php echo $view_store_transfer->MRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_MRP" id="z_MRP" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->MRP->cellAttributes() ?>>
			<span id="el_view_store_transfer_MRP">
<input type="text" data-table="view_store_transfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->MRP->EditValue ?>"<?php echo $view_store_transfer->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label for="x_SalTax" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_SalTax"><?php echo $view_store_transfer->SalTax->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SalTax" id="z_SalTax" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->SalTax->cellAttributes() ?>>
			<span id="el_view_store_transfer_SalTax">
<input type="text" data-table="view_store_transfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SalTax->EditValue ?>"<?php echo $view_store_transfer->SalTax->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PurValue"><?php echo $view_store_transfer->PurValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurValue" id="z_PurValue" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PurValue->cellAttributes() ?>>
			<span id="el_view_store_transfer_PurValue">
<input type="text" data-table="view_store_transfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PurValue->EditValue ?>"<?php echo $view_store_transfer->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PurRate"><?php echo $view_store_transfer->PurRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurRate" id="z_PurRate" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PurRate->cellAttributes() ?>>
			<span id="el_view_store_transfer_PurRate">
<input type="text" data-table="view_store_transfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PurRate->EditValue ?>"<?php echo $view_store_transfer->PurRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label for="x_SalRate" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_SalRate"><?php echo $view_store_transfer->SalRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SalRate" id="z_SalRate" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->SalRate->cellAttributes() ?>>
			<span id="el_view_store_transfer_SalRate">
<input type="text" data-table="view_store_transfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SalRate->EditValue ?>"<?php echo $view_store_transfer->SalRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label for="x_Discount" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Discount"><?php echo $view_store_transfer->Discount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Discount" id="z_Discount" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Discount->cellAttributes() ?>>
			<span id="el_view_store_transfer_Discount">
<input type="text" data-table="view_store_transfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->Discount->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Discount->EditValue ?>"<?php echo $view_store_transfer->Discount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PSGST"><?php echo $view_store_transfer->PSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PSGST" id="z_PSGST" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PSGST->cellAttributes() ?>>
			<span id="el_view_store_transfer_PSGST">
<input type="text" data-table="view_store_transfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PSGST->EditValue ?>"<?php echo $view_store_transfer->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PCGST"><?php echo $view_store_transfer->PCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PCGST" id="z_PCGST" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PCGST->cellAttributes() ?>>
			<span id="el_view_store_transfer_PCGST">
<input type="text" data-table="view_store_transfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PCGST->EditValue ?>"<?php echo $view_store_transfer->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_SSGST"><?php echo $view_store_transfer->SSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SSGST" id="z_SSGST" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->SSGST->cellAttributes() ?>>
			<span id="el_view_store_transfer_SSGST">
<input type="text" data-table="view_store_transfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SSGST->EditValue ?>"<?php echo $view_store_transfer->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_SCGST"><?php echo $view_store_transfer->SCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SCGST" id="z_SCGST" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->SCGST->cellAttributes() ?>>
			<span id="el_view_store_transfer_SCGST">
<input type="text" data-table="view_store_transfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SCGST->EditValue ?>"<?php echo $view_store_transfer->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_BRCODE"><?php echo $view_store_transfer->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->BRCODE->cellAttributes() ?>>
			<span id="el_view_store_transfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_store_transfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_store_transfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="text-nowrap" style="z-index: 8680">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_store_transfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_store_transfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_store_transfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_store_transfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_store_transfer->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_store_transfersearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":false});
</script>
<?php echo $view_store_transfer->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label for="x_HSN" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_HSN"><?php echo $view_store_transfer->HSN->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HSN" id="z_HSN" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->HSN->cellAttributes() ?>>
			<span id="el_view_store_transfer_HSN">
<input type="text" data-table="view_store_transfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->HSN->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->HSN->EditValue ?>"<?php echo $view_store_transfer->HSN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label for="x_Pack" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Pack"><?php echo $view_store_transfer->Pack->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Pack" id="z_Pack" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Pack->cellAttributes() ?>>
			<span id="el_view_store_transfer_Pack">
<input type="text" data-table="view_store_transfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_store_transfer->Pack->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Pack->EditValue ?>"<?php echo $view_store_transfer->Pack->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label for="x_PUnit" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_PUnit"><?php echo $view_store_transfer->PUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PUnit" id="z_PUnit" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->PUnit->cellAttributes() ?>>
			<span id="el_view_store_transfer_PUnit">
<input type="text" data-table="view_store_transfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->PUnit->EditValue ?>"<?php echo $view_store_transfer->PUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label for="x_SUnit" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_SUnit"><?php echo $view_store_transfer->SUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SUnit" id="z_SUnit" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->SUnit->cellAttributes() ?>>
			<span id="el_view_store_transfer_SUnit">
<input type="text" data-table="view_store_transfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->SUnit->EditValue ?>"<?php echo $view_store_transfer->SUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label for="x_GrnQuantity" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_GrnQuantity"><?php echo $view_store_transfer->GrnQuantity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_GrnQuantity" id="z_GrnQuantity" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->GrnQuantity->cellAttributes() ?>>
			<span id="el_view_store_transfer_GrnQuantity">
<input type="text" data-table="view_store_transfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->GrnQuantity->EditValue ?>"<?php echo $view_store_transfer->GrnQuantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label for="x_GrnMRP" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_GrnMRP"><?php echo $view_store_transfer->GrnMRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_GrnMRP" id="z_GrnMRP" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->GrnMRP->cellAttributes() ?>>
			<span id="el_view_store_transfer_GrnMRP">
<input type="text" data-table="view_store_transfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_store_transfer->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->GrnMRP->EditValue ?>"<?php echo $view_store_transfer->GrnMRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->strid->Visible) { // strid ?>
	<div id="r_strid" class="form-group row">
		<label for="x_strid" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_strid"><?php echo $view_store_transfer->strid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_strid" id="z_strid" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->strid->cellAttributes() ?>>
			<span id="el_view_store_transfer_strid">
<input type="text" data-table="view_store_transfer" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->strid->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->strid->EditValue ?>"<?php echo $view_store_transfer->strid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_HospID"><?php echo $view_store_transfer->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->HospID->cellAttributes() ?>>
			<span id="el_view_store_transfer_HospID">
<input type="text" data-table="view_store_transfer" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->HospID->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->HospID->EditValue ?>"<?php echo $view_store_transfer->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label for="x_CreatedBy" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_CreatedBy"><?php echo $view_store_transfer->CreatedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CreatedBy" id="z_CreatedBy" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->CreatedBy->cellAttributes() ?>>
			<span id="el_view_store_transfer_CreatedBy">
<input type="text" data-table="view_store_transfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CreatedBy->EditValue ?>"<?php echo $view_store_transfer->CreatedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label for="x_CreatedDateTime" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_CreatedDateTime"><?php echo $view_store_transfer->CreatedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CreatedDateTime" id="z_CreatedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->CreatedDateTime->cellAttributes() ?>>
			<span id="el_view_store_transfer_CreatedDateTime">
<input type="text" data-table="view_store_transfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_store_transfer->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CreatedDateTime->EditValue ?>"<?php echo $view_store_transfer->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_store_transfer->CreatedDateTime->ReadOnly && !$view_store_transfer->CreatedDateTime->Disabled && !isset($view_store_transfer->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_store_transfer->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label for="x_ModifiedBy" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_ModifiedBy"><?php echo $view_store_transfer->ModifiedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ModifiedBy" id="z_ModifiedBy" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->ModifiedBy->cellAttributes() ?>>
			<span id="el_view_store_transfer_ModifiedBy">
<input type="text" data-table="view_store_transfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ModifiedBy->EditValue ?>"<?php echo $view_store_transfer->ModifiedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label for="x_ModifiedDateTime" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_ModifiedDateTime"><?php echo $view_store_transfer->ModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ModifiedDateTime" id="z_ModifiedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->ModifiedDateTime->cellAttributes() ?>>
			<span id="el_view_store_transfer_ModifiedDateTime">
<input type="text" data-table="view_store_transfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_store_transfer->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->ModifiedDateTime->EditValue ?>"<?php echo $view_store_transfer->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_store_transfer->ModifiedDateTime->ReadOnly && !$view_store_transfer->ModifiedDateTime->Disabled && !isset($view_store_transfer->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_store_transfer->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label for="x_grncreatedby" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_grncreatedby"><?php echo $view_store_transfer->grncreatedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grncreatedby" id="z_grncreatedby" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->grncreatedby->cellAttributes() ?>>
			<span id="el_view_store_transfer_grncreatedby">
<input type="text" data-table="view_store_transfer" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->grncreatedby->EditValue ?>"<?php echo $view_store_transfer->grncreatedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label for="x_grncreatedDateTime" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_grncreatedDateTime"><?php echo $view_store_transfer->grncreatedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grncreatedDateTime" id="z_grncreatedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->grncreatedDateTime->cellAttributes() ?>>
			<span id="el_view_store_transfer_grncreatedDateTime">
<input type="text" data-table="view_store_transfer" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($view_store_transfer->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->grncreatedDateTime->EditValue ?>"<?php echo $view_store_transfer->grncreatedDateTime->editAttributes() ?>>
<?php if (!$view_store_transfer->grncreatedDateTime->ReadOnly && !$view_store_transfer->grncreatedDateTime->Disabled && !isset($view_store_transfer->grncreatedDateTime->EditAttrs["readonly"]) && !isset($view_store_transfer->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label for="x_grnModifiedby" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_grnModifiedby"><?php echo $view_store_transfer->grnModifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grnModifiedby" id="z_grnModifiedby" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->grnModifiedby->cellAttributes() ?>>
			<span id="el_view_store_transfer_grnModifiedby">
<input type="text" data-table="view_store_transfer" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->grnModifiedby->EditValue ?>"<?php echo $view_store_transfer->grnModifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label for="x_grnModifiedDateTime" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_grnModifiedDateTime"><?php echo $view_store_transfer->grnModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grnModifiedDateTime" id="z_grnModifiedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->grnModifiedDateTime->cellAttributes() ?>>
			<span id="el_view_store_transfer_grnModifiedDateTime">
<input type="text" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($view_store_transfer->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->grnModifiedDateTime->EditValue ?>"<?php echo $view_store_transfer->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$view_store_transfer->grnModifiedDateTime->ReadOnly && !$view_store_transfer->grnModifiedDateTime->Disabled && !isset($view_store_transfer->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($view_store_transfer->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label for="x_Received" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_Received"><?php echo $view_store_transfer->Received->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Received" id="z_Received" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->Received->cellAttributes() ?>>
			<span id="el_view_store_transfer_Received">
<input type="text" data-table="view_store_transfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_store_transfer->Received->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->Received->EditValue ?>"<?php echo $view_store_transfer->Received->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label for="x_BillDate" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_BillDate"><?php echo $view_store_transfer->BillDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillDate" id="z_BillDate" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->BillDate->cellAttributes() ?>>
			<span id="el_view_store_transfer_BillDate">
<input type="text" data-table="view_store_transfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_store_transfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->BillDate->EditValue ?>"<?php echo $view_store_transfer->BillDate->editAttributes() ?>>
<?php if (!$view_store_transfer->BillDate->ReadOnly && !$view_store_transfer->BillDate->Disabled && !isset($view_store_transfer->BillDate->EditAttrs["readonly"]) && !isset($view_store_transfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_store_transfersearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label for="x_CurStock" class="<?php echo $view_store_transfer_search->LeftColumnClass ?>"><span id="elh_view_store_transfer_CurStock"><?php echo $view_store_transfer->CurStock->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CurStock" id="z_CurStock" value="="></span>
		</label>
		<div class="<?php echo $view_store_transfer_search->RightColumnClass ?>"><div<?php echo $view_store_transfer->CurStock->cellAttributes() ?>>
			<span id="el_view_store_transfer_CurStock">
<input type="text" data-table="view_store_transfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_store_transfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_store_transfer->CurStock->EditValue ?>"<?php echo $view_store_transfer->CurStock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_store_transfer_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_store_transfer_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_store_transfer_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_store_transfer_search->terminate();
?>