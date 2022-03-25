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
$view_pharmacy_movement_item_search = new view_pharmacy_movement_item_search();

// Run the page
$view_pharmacy_movement_item_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_item_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_pharmacy_movement_item_search->IsModal) { ?>
var fview_pharmacy_movement_itemsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_movement_itemsearch", "search");
<?php } else { ?>
var fview_pharmacy_movement_itemsearch = currentForm = new ew.Form("fview_pharmacy_movement_itemsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_pharmacy_movement_itemsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_movement_itemsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_movement_itemsearch.lists["x_ProductFrom"] = <?php echo $view_pharmacy_movement_item_search->ProductFrom->Lookup->toClientList() ?>;
fview_pharmacy_movement_itemsearch.lists["x_ProductFrom"].options = <?php echo JsonEncode($view_pharmacy_movement_item_search->ProductFrom->lookupOptions()) ?>;
fview_pharmacy_movement_itemsearch.autoSuggests["x_ProductFrom"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacy_movement_itemsearch.lists["x_BRCODE"] = <?php echo $view_pharmacy_movement_item_search->BRCODE->Lookup->toClientList() ?>;
fview_pharmacy_movement_itemsearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_movement_item_search->BRCODE->lookupOptions()) ?>;
fview_pharmacy_movement_itemsearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
// Validate function for search

fview_pharmacy_movement_itemsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ExpDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->ExpDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item->HospID->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_movement_item_search->showPageHeader(); ?>
<?php
$view_pharmacy_movement_item_search->showMessage();
?>
<form name="fview_pharmacy_movement_itemsearch" id="fview_pharmacy_movement_itemsearch" class="<?php echo $view_pharmacy_movement_item_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_movement_item_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_movement_item_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_movement_item_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_movement_item->ProductFrom->Visible) { // ProductFrom ?>
	<div id="r_ProductFrom" class="form-group row">
		<label class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_ProductFrom"><?php echo $view_pharmacy_movement_item->ProductFrom->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProductFrom" id="z_ProductFrom" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->ProductFrom->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_ProductFrom">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x_ProductFrom" class="text-nowrap" style="z-index: 8990">
	<input type="text" class="form-control" name="sv_x_ProductFrom" id="sv_x_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item->ProductFrom->displayValueSeparatorAttribute() ?>" name="x_ProductFrom" id="x_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item->ProductFrom->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemsearch.createAutoSuggest({"id":"x_ProductFrom","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->ProductFrom->Lookup->getParamTag("p_x_ProductFrom") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_Quantity"><?php echo $view_pharmacy_movement_item->Quantity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Quantity" id="z_Quantity" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->Quantity->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_Quantity">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label for="x_FreeQty" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_FreeQty"><?php echo $view_pharmacy_movement_item->FreeQty->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_FreeQty" id="z_FreeQty" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->FreeQty->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_FreeQty">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item->FreeQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_IQ"><?php echo $view_pharmacy_movement_item->IQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IQ" id="z_IQ" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->IQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_IQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label for="x_MRQ" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_MRQ"><?php echo $view_pharmacy_movement_item->MRQ->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MRQ" id="z_MRQ" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->MRQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_MRQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item->MRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BRCODE"><?php echo $view_pharmacy_movement_item->BRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BRCODE" id="z_BRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BRCODE">
<?php
$wrkonchange = "" . trim(@$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_movement_item->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="text-nowrap" style="z-index: 8940">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_movement_itemsearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":true});
</script>
<?php echo $view_pharmacy_movement_item->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label for="x_OPNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_OPNO"><?php echo $view_pharmacy_movement_item->OPNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->OPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_OPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->OPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label for="x_IPNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_IPNO"><?php echo $view_pharmacy_movement_item->IPNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->IPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_IPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->IPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<div id="r_PatientBILLNO" class="form-group row">
		<label for="x_PatientBILLNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_PatientBILLNO"><?php echo $view_pharmacy_movement_item->PatientBILLNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientBILLNO" id="z_PatientBILLNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->PatientBILLNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_PatientBILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x_PatientBILLNO" id="x_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->PatientBILLNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label for="x_BILLDT" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BILLDT"><?php echo $view_pharmacy_movement_item->BILLDT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BILLDT" id="z_BILLDT" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->BILLDT->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BILLDT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLDT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->GRNNO->Visible) { // GRNNO ?>
	<div id="r_GRNNO" class="form-group row">
		<label for="x_GRNNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_GRNNO"><?php echo $view_pharmacy_movement_item->GRNNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GRNNO" id="z_GRNNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->GRNNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_GRNNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x_GRNNO" id="x_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->GRNNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label for="x_DT" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_DT"><?php echo $view_pharmacy_movement_item->DT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DT" id="z_DT" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->DT->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_DT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x_DT" id="x_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item->DT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label for="x_Customername" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_Customername"><?php echo $view_pharmacy_movement_item->Customername->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Customername" id="z_Customername" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->Customername->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_Customername">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item->Customername->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_createdby"><?php echo $view_pharmacy_movement_item->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->createdby->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_createdby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_createddatetime"><?php echo $view_pharmacy_movement_item->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->createddatetime->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_createddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->createddatetime->ReadOnly && !$view_pharmacy_movement_item->createddatetime->Disabled && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_modifiedby"><?php echo $view_pharmacy_movement_item->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->modifiedby->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_modifiedby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_modifieddatetime"><?php echo $view_pharmacy_movement_item->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_modifieddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label for="x_BILLNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BILLNO"><?php echo $view_pharmacy_movement_item->BILLNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BILLNO" id="z_BILLNO" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->BILLNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item->BILLNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->prc->Visible) { // prc ?>
	<div id="r_prc" class="form-group row">
		<label for="x_prc" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_prc"><?php echo $view_pharmacy_movement_item->prc->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_prc" id="z_prc" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->prc->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_prc">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item->prc->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label for="x_PrName" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_PrName"><?php echo $view_pharmacy_movement_item->PrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->PrName->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_PrName">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item->PrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label for="x_BatchNo" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BatchNo"><?php echo $view_pharmacy_movement_item->BatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->BatchNo->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BatchNo">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item->BatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label for="x_ExpDate" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_ExpDate"><?php echo $view_pharmacy_movement_item->ExpDate->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->ExpDate->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_ExpDate" id="z_ExpDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_movement_item->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_pharmacy_movement_item_ExpDate">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_ExpDate d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_pharmacy_movement_item_ExpDate" class="btw1_ExpDate d-none">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement_item->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item->ExpDate->ReadOnly && !$view_pharmacy_movement_item->ExpDate->Disabled && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_MFRCODE"><?php echo $view_pharmacy_movement_item->MFRCODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_MFRCODE">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->hsn->Visible) { // hsn ?>
	<div id="r_hsn" class="form-group row">
		<label for="x_hsn" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_hsn"><?php echo $view_pharmacy_movement_item->hsn->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_hsn" id="z_hsn" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->hsn->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_hsn">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x_hsn" id="x_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item->hsn->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_HospID"><?php echo $view_pharmacy_movement_item->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div<?php echo $view_pharmacy_movement_item->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_HospID">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item->HospID->EditValue ?>"<?php echo $view_pharmacy_movement_item->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_movement_item_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_movement_item_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_movement_item_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_movement_item_search->terminate();
?>