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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_pharmacytransfer_search->IsModal) { ?>
var fview_pharmacytransfersearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacytransfersearch", "search");
<?php } else { ?>
var fview_pharmacytransfersearch = currentForm = new ew.Form("fview_pharmacytransfersearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_pharmacytransfersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacytransfersearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacytransfersearch.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_search->ORDNO->Lookup->toClientList() ?>;
fview_pharmacytransfersearch.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_search->ORDNO->lookupOptions()) ?>;
fview_pharmacytransfersearch.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransfersearch.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_search->BRCODE->Lookup->toClientList() ?>;
fview_pharmacytransfersearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_search->BRCODE->lookupOptions()) ?>;
fview_pharmacytransfersearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransfersearch.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_search->LastMonthSale->Lookup->toClientList() ?>;
fview_pharmacytransfersearch.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_search->LastMonthSale->lookupOptions()) ?>;
fview_pharmacytransfersearch.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
// Validate function for search

fview_pharmacytransfersearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_BRCODE");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->BRCODE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_QTY");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->QTY->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->DT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Stock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Stock->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grnid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->grnid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_poid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->poid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LastMonthSale");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->LastMonthSale->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_GrnQuantity");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->GrnQuantity->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Quantity");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Quantity->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_FreeQty");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->FreeQty->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ExpDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ExpDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SUnit");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SUnit->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_MRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->MRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PurValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Disc");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Disc->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PTax");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PTax->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ItemValue");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ItemValue->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalTax");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SalTax->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PurRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->PurRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SalRate");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SalRate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Discount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->Discount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SSGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SSGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SCGST");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->SCGST->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_GrnMRP");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->GrnMRP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_trid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->trid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CreatedBy");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CreatedBy->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CreatedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CreatedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ModifiedBy");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ModifiedBy->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ModifiedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->ModifiedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grncreatedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->grncreatedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grncreatedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->grncreatedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grnModifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->grnModifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_grnModifiedDateTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->grnModifiedDateTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->BillDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CurStock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacytransfer->CurStock->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacytransfer_search->showPageHeader(); ?>
<?php
$view_pharmacytransfer_search->showMessage();
?>
<form name="fview_pharmacytransfersearch" id="fview_pharmacytransfersearch" class="<?php echo $view_pharmacytransfer_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacytransfer_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacytransfer_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacytransfer_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ORDNO"><?php echo $view_pharmacytransfer->ORDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ORDNO" id="z_ORDNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ORDNO->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ORDNO">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->ORDNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->ORDNO->EditAttrs["onchange"] = "";
?>
<span id="as_x_ORDNO" class="text-nowrap" style="z-index: 8990">
	<input type="text" class="form-control" name="sv_x_ORDNO" id="sv_x_ORDNO" value="<?php echo RemoveHtml($view_pharmacytransfer->ORDNO->EditValue) ?>" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->ORDNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_ORDNO" data-value-separator="<?php echo $view_pharmacytransfer->ORDNO->displayValueSeparatorAttribute() ?>" name="x_ORDNO" id="x_ORDNO" value="<?php echo HtmlEncode($view_pharmacytransfer->ORDNO->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfersearch.createAutoSuggest({"id":"x_ORDNO","forceSelect":false});
</script>
<?php echo $view_pharmacytransfer->ORDNO->Lookup->getParamTag("p_x_ORDNO") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BRCODE"><?php echo $view_pharmacytransfer->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacytransfer->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacytransfer->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacytransfer->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfersearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":false});
</script>
<?php echo $view_pharmacytransfer->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PRC"><?php echo $view_pharmacytransfer->PRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PRC->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PRC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PRC->EditValue ?>"<?php echo $view_pharmacytransfer->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->QTY->Visible) { // QTY ?>
	<div id="r_QTY" class="form-group row">
		<label for="x_QTY" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_QTY"><?php echo $view_pharmacytransfer->QTY->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_QTY" id="z_QTY" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->QTY->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_QTY">
<input type="text" data-table="view_pharmacytransfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->QTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->QTY->EditValue ?>"<?php echo $view_pharmacytransfer->QTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label for="x_DT" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_DT"><?php echo $view_pharmacytransfer->DT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DT" id="z_DT" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->DT->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_DT">
<input type="text" data-table="view_pharmacytransfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->DT->EditValue ?>"<?php echo $view_pharmacytransfer->DT->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->DT->ReadOnly && !$view_pharmacytransfer->DT->Disabled && !isset($view_pharmacytransfer->DT->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label for="x_PC" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PC"><?php echo $view_pharmacytransfer->PC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PC" id="z_PC" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PC->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PC">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PC->EditValue ?>"<?php echo $view_pharmacytransfer->PC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label for="x_YM" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_YM"><?php echo $view_pharmacytransfer->YM->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_YM" id="z_YM" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->YM->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_YM">
<input type="text" data-table="view_pharmacytransfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->YM->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->YM->EditValue ?>"<?php echo $view_pharmacytransfer->YM->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label for="x_Stock" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Stock"><?php echo $view_pharmacytransfer->Stock->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Stock" id="z_Stock" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Stock->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Stock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Stock->EditValue ?>"<?php echo $view_pharmacytransfer->Stock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Printcheck->Visible) { // Printcheck ?>
	<div id="r_Printcheck" class="form-group row">
		<label for="x_Printcheck" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Printcheck"><?php echo $view_pharmacytransfer->Printcheck->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Printcheck" id="z_Printcheck" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Printcheck->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Printcheck">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Printcheck->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Printcheck->EditValue ?>"<?php echo $view_pharmacytransfer->Printcheck->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_id"><?php echo $view_pharmacytransfer->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->id->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_id">
<input type="text" data-table="view_pharmacytransfer" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->id->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->id->EditValue ?>"<?php echo $view_pharmacytransfer->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->grnid->Visible) { // grnid ?>
	<div id="r_grnid" class="form-group row">
		<label for="x_grnid" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnid"><?php echo $view_pharmacytransfer->grnid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grnid" id="z_grnid" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->grnid->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grnid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->grnid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->grnid->EditValue ?>"<?php echo $view_pharmacytransfer->grnid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->poid->Visible) { // poid ?>
	<div id="r_poid" class="form-group row">
		<label for="x_poid" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_poid"><?php echo $view_pharmacytransfer->poid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_poid" id="z_poid" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->poid->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_poid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->poid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->poid->EditValue ?>"<?php echo $view_pharmacytransfer->poid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<div id="r_LastMonthSale" class="form-group row">
		<label class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_LastMonthSale"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LastMonthSale" id="z_LastMonthSale" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->LastMonthSale->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_LastMonthSale">
<?php
$wrkonchange = "" . trim(@$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacytransfer->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale" class="text-nowrap" style="z-index: 8870">
	<input type="text" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?php echo RemoveHtml($view_pharmacytransfer->LastMonthSale->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->getPlaceHolder()) ?>"<?php echo $view_pharmacytransfer->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-value-separator="<?php echo $view_pharmacytransfer->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?php echo HtmlEncode($view_pharmacytransfer->LastMonthSale->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacytransfersearch.createAutoSuggest({"id":"x_LastMonthSale","forceSelect":true});
</script>
<?php echo $view_pharmacytransfer->LastMonthSale->Lookup->getParamTag("p_x_LastMonthSale") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label for="x_PrName" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PrName"><?php echo $view_pharmacytransfer->PrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PrName->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PrName">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PrName->EditValue ?>"<?php echo $view_pharmacytransfer->PrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->GrnQuantity->Visible) { // GrnQuantity ?>
	<div id="r_GrnQuantity" class="form-group row">
		<label for="x_GrnQuantity" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnQuantity"><?php echo $view_pharmacytransfer->GrnQuantity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_GrnQuantity" id="z_GrnQuantity" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->GrnQuantity->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_GrnQuantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->GrnQuantity->EditValue ?>"<?php echo $view_pharmacytransfer->GrnQuantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Quantity"><?php echo $view_pharmacytransfer->Quantity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Quantity" id="z_Quantity" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Quantity->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Quantity">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Quantity->EditValue ?>"<?php echo $view_pharmacytransfer->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label for="x_FreeQty" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_FreeQty"><?php echo $view_pharmacytransfer->FreeQty->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_FreeQty" id="z_FreeQty" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->FreeQty->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_FreeQty">
<input type="text" data-table="view_pharmacytransfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->FreeQty->EditValue ?>"<?php echo $view_pharmacytransfer->FreeQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label for="x_BatchNo" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BatchNo"><?php echo $view_pharmacytransfer->BatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->BatchNo->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_BatchNo">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BatchNo->EditValue ?>"<?php echo $view_pharmacytransfer->BatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label for="x_ExpDate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ExpDate"><?php echo $view_pharmacytransfer->ExpDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ExpDate" id="z_ExpDate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ExpDate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ExpDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ExpDate->EditValue ?>"<?php echo $view_pharmacytransfer->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ExpDate->ReadOnly && !$view_pharmacytransfer->ExpDate->Disabled && !isset($view_pharmacytransfer->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->HSN->Visible) { // HSN ?>
	<div id="r_HSN" class="form-group row">
		<label for="x_HSN" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HSN"><?php echo $view_pharmacytransfer->HSN->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HSN" id="z_HSN" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->HSN->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_HSN">
<input type="text" data-table="view_pharmacytransfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->HSN->EditValue ?>"<?php echo $view_pharmacytransfer->HSN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MFRCODE"><?php echo $view_pharmacytransfer->MFRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_MFRCODE">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MFRCODE->EditValue ?>"<?php echo $view_pharmacytransfer->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PUnit->Visible) { // PUnit ?>
	<div id="r_PUnit" class="form-group row">
		<label for="x_PUnit" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PUnit"><?php echo $view_pharmacytransfer->PUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PUnit" id="z_PUnit" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PUnit->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PUnit">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PUnit->EditValue ?>"<?php echo $view_pharmacytransfer->PUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SUnit->Visible) { // SUnit ?>
	<div id="r_SUnit" class="form-group row">
		<label for="x_SUnit" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SUnit"><?php echo $view_pharmacytransfer->SUnit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SUnit" id="z_SUnit" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SUnit->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SUnit">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SUnit->EditValue ?>"<?php echo $view_pharmacytransfer->SUnit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
	<div id="r_MRP" class="form-group row">
		<label for="x_MRP" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MRP"><?php echo $view_pharmacytransfer->MRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_MRP" id="z_MRP" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->MRP->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_MRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->MRP->EditValue ?>"<?php echo $view_pharmacytransfer->MRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PurValue->Visible) { // PurValue ?>
	<div id="r_PurValue" class="form-group row">
		<label for="x_PurValue" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurValue"><?php echo $view_pharmacytransfer->PurValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurValue" id="z_PurValue" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PurValue->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PurValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PurValue->EditValue ?>"<?php echo $view_pharmacytransfer->PurValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Disc->Visible) { // Disc ?>
	<div id="r_Disc" class="form-group row">
		<label for="x_Disc" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Disc"><?php echo $view_pharmacytransfer->Disc->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Disc" id="z_Disc" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Disc->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Disc">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Disc->EditValue ?>"<?php echo $view_pharmacytransfer->Disc->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PSGST->Visible) { // PSGST ?>
	<div id="r_PSGST" class="form-group row">
		<label for="x_PSGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PSGST"><?php echo $view_pharmacytransfer->PSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PSGST" id="z_PSGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PSGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PSGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PSGST->EditValue ?>"<?php echo $view_pharmacytransfer->PSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PCGST->Visible) { // PCGST ?>
	<div id="r_PCGST" class="form-group row">
		<label for="x_PCGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PCGST"><?php echo $view_pharmacytransfer->PCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PCGST" id="z_PCGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PCGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PCGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PCGST->EditValue ?>"<?php echo $view_pharmacytransfer->PCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PTax->Visible) { // PTax ?>
	<div id="r_PTax" class="form-group row">
		<label for="x_PTax" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PTax"><?php echo $view_pharmacytransfer->PTax->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PTax" id="z_PTax" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PTax->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PTax">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PTax->EditValue ?>"<?php echo $view_pharmacytransfer->PTax->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
	<div id="r_ItemValue" class="form-group row">
		<label for="x_ItemValue" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ItemValue"><?php echo $view_pharmacytransfer->ItemValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ItemValue" id="z_ItemValue" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ItemValue->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ItemValue">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ItemValue->EditValue ?>"<?php echo $view_pharmacytransfer->ItemValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SalTax->Visible) { // SalTax ?>
	<div id="r_SalTax" class="form-group row">
		<label for="x_SalTax" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalTax"><?php echo $view_pharmacytransfer->SalTax->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SalTax" id="z_SalTax" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SalTax->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SalTax">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SalTax->EditValue ?>"<?php echo $view_pharmacytransfer->SalTax->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->PurRate->Visible) { // PurRate ?>
	<div id="r_PurRate" class="form-group row">
		<label for="x_PurRate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurRate"><?php echo $view_pharmacytransfer->PurRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PurRate" id="z_PurRate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->PurRate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_PurRate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->PurRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->PurRate->EditValue ?>"<?php echo $view_pharmacytransfer->PurRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SalRate->Visible) { // SalRate ?>
	<div id="r_SalRate" class="form-group row">
		<label for="x_SalRate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalRate"><?php echo $view_pharmacytransfer->SalRate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SalRate" id="z_SalRate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SalRate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SalRate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SalRate->EditValue ?>"<?php echo $view_pharmacytransfer->SalRate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label for="x_Discount" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Discount"><?php echo $view_pharmacytransfer->Discount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Discount" id="z_Discount" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Discount->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Discount">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Discount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Discount->EditValue ?>"<?php echo $view_pharmacytransfer->Discount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SSGST"><?php echo $view_pharmacytransfer->SSGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SSGST" id="z_SSGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SSGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SSGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SSGST->EditValue ?>"<?php echo $view_pharmacytransfer->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SCGST"><?php echo $view_pharmacytransfer->SCGST->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SCGST" id="z_SCGST" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->SCGST->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_SCGST">
<input type="text" data-table="view_pharmacytransfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->SCGST->EditValue ?>"<?php echo $view_pharmacytransfer->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Pack->Visible) { // Pack ?>
	<div id="r_Pack" class="form-group row">
		<label for="x_Pack" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Pack"><?php echo $view_pharmacytransfer->Pack->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Pack" id="z_Pack" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Pack->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Pack">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Pack->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Pack->EditValue ?>"<?php echo $view_pharmacytransfer->Pack->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->GrnMRP->Visible) { // GrnMRP ?>
	<div id="r_GrnMRP" class="form-group row">
		<label for="x_GrnMRP" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnMRP"><?php echo $view_pharmacytransfer->GrnMRP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_GrnMRP" id="z_GrnMRP" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->GrnMRP->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_GrnMRP">
<input type="text" data-table="view_pharmacytransfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->GrnMRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->GrnMRP->EditValue ?>"<?php echo $view_pharmacytransfer->GrnMRP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
	<div id="r_trid" class="form-group row">
		<label for="x_trid" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_trid"><?php echo $view_pharmacytransfer->trid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_trid" id="z_trid" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->trid->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_trid">
<input type="text" data-table="view_pharmacytransfer" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->trid->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->trid->EditValue ?>"<?php echo $view_pharmacytransfer->trid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HospID"><?php echo $view_pharmacytransfer->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_HospID">
<input type="text" data-table="view_pharmacytransfer" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->HospID->EditValue ?>"<?php echo $view_pharmacytransfer->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label for="x_CreatedBy" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedBy"><?php echo $view_pharmacytransfer->CreatedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CreatedBy" id="z_CreatedBy" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->CreatedBy->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_CreatedBy">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CreatedBy->EditValue ?>"<?php echo $view_pharmacytransfer->CreatedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<div id="r_CreatedDateTime" class="form-group row">
		<label for="x_CreatedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedDateTime"><?php echo $view_pharmacytransfer->CreatedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CreatedDateTime" id="z_CreatedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->CreatedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_CreatedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CreatedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer->CreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->CreatedDateTime->ReadOnly && !$view_pharmacytransfer->CreatedDateTime->Disabled && !isset($view_pharmacytransfer->CreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label for="x_ModifiedBy" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedBy"><?php echo $view_pharmacytransfer->ModifiedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ModifiedBy" id="z_ModifiedBy" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ModifiedBy->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ModifiedBy">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ModifiedBy->EditValue ?>"<?php echo $view_pharmacytransfer->ModifiedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label for="x_ModifiedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedDateTime"><?php echo $view_pharmacytransfer->ModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ModifiedDateTime" id="z_ModifiedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->ModifiedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_ModifiedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->ModifiedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer->ModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->ModifiedDateTime->ReadOnly && !$view_pharmacytransfer->ModifiedDateTime->Disabled && !isset($view_pharmacytransfer->ModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
	<div id="r_grncreatedby" class="form-group row">
		<label for="x_grncreatedby" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedby"><?php echo $view_pharmacytransfer->grncreatedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grncreatedby" id="z_grncreatedby" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->grncreatedby->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grncreatedby">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->grncreatedby->EditValue ?>"<?php echo $view_pharmacytransfer->grncreatedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<div id="r_grncreatedDateTime" class="form-group row">
		<label for="x_grncreatedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedDateTime"><?php echo $view_pharmacytransfer->grncreatedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grncreatedDateTime" id="z_grncreatedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->grncreatedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grncreatedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->grncreatedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->grncreatedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer->grncreatedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->grncreatedDateTime->ReadOnly && !$view_pharmacytransfer->grncreatedDateTime->Disabled && !isset($view_pharmacytransfer->grncreatedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<div id="r_grnModifiedby" class="form-group row">
		<label for="x_grnModifiedby" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedby"><?php echo $view_pharmacytransfer->grnModifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grnModifiedby" id="z_grnModifiedby" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->grnModifiedby->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grnModifiedby">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->grnModifiedby->EditValue ?>"<?php echo $view_pharmacytransfer->grnModifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<div id="r_grnModifiedDateTime" class="form-group row">
		<label for="x_grnModifiedDateTime" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedDateTime"><?php echo $view_pharmacytransfer->grnModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_grnModifiedDateTime" id="z_grnModifiedDateTime" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->grnModifiedDateTime->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_grnModifiedDateTime">
<input type="text" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->grnModifiedDateTime->EditValue ?>"<?php echo $view_pharmacytransfer->grnModifiedDateTime->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->grnModifiedDateTime->ReadOnly && !$view_pharmacytransfer->grnModifiedDateTime->Disabled && !isset($view_pharmacytransfer->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->Received->Visible) { // Received ?>
	<div id="r_Received" class="form-group row">
		<label for="x_Received" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Received"><?php echo $view_pharmacytransfer->Received->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Received" id="z_Received" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->Received->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_Received">
<input type="text" data-table="view_pharmacytransfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->Received->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->Received->EditValue ?>"<?php echo $view_pharmacytransfer->Received->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
	<div id="r_BillDate" class="form-group row">
		<label for="x_BillDate" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BillDate"><?php echo $view_pharmacytransfer->BillDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillDate" id="z_BillDate" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->BillDate->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_BillDate">
<input type="text" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->BillDate->EditValue ?>"<?php echo $view_pharmacytransfer->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacytransfer->BillDate->ReadOnly && !$view_pharmacytransfer->BillDate->Disabled && !isset($view_pharmacytransfer->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacytransfer->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacytransfersearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
	<div id="r_CurStock" class="form-group row">
		<label for="x_CurStock" class="<?php echo $view_pharmacytransfer_search->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CurStock"><?php echo $view_pharmacytransfer->CurStock->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CurStock" id="z_CurStock" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacytransfer_search->RightColumnClass ?>"><div<?php echo $view_pharmacytransfer->CurStock->cellAttributes() ?>>
			<span id="el_view_pharmacytransfer_CurStock">
<input type="text" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacytransfer->CurStock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacytransfer->CurStock->EditValue ?>"<?php echo $view_pharmacytransfer->CurStock->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacytransfer_search->terminate();
?>