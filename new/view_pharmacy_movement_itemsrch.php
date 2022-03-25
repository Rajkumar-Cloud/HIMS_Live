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
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_movement_itemsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_pharmacy_movement_item_search->IsModal) { ?>
	fview_pharmacy_movement_itemsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_movement_itemsearch", "search");
	<?php } else { ?>
	fview_pharmacy_movement_itemsearch = currentForm = new ew.Form("fview_pharmacy_movement_itemsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_pharmacy_movement_itemsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ExpDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_search->ExpDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_movement_itemsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_movement_itemsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_movement_itemsearch.lists["x_ProductFrom"] = <?php echo $view_pharmacy_movement_item_search->ProductFrom->Lookup->toClientList($view_pharmacy_movement_item_search) ?>;
	fview_pharmacy_movement_itemsearch.lists["x_ProductFrom"].options = <?php echo JsonEncode($view_pharmacy_movement_item_search->ProductFrom->lookupOptions()) ?>;
	fview_pharmacy_movement_itemsearch.autoSuggests["x_ProductFrom"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacy_movement_itemsearch.lists["x_BRCODE"] = <?php echo $view_pharmacy_movement_item_search->BRCODE->Lookup->toClientList($view_pharmacy_movement_item_search) ?>;
	fview_pharmacy_movement_itemsearch.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_movement_item_search->BRCODE->lookupOptions()) ?>;
	fview_pharmacy_movement_itemsearch.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacy_movement_itemsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_movement_item_search->showPageHeader(); ?>
<?php
$view_pharmacy_movement_item_search->showMessage();
?>
<form name="fview_pharmacy_movement_itemsearch" id="fview_pharmacy_movement_itemsearch" class="<?php echo $view_pharmacy_movement_item_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_movement_item_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_movement_item_search->ProductFrom->Visible) { // ProductFrom ?>
	<div id="r_ProductFrom" class="form-group row">
		<label class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_ProductFrom"><?php echo $view_pharmacy_movement_item_search->ProductFrom->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProductFrom" id="z_ProductFrom" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->ProductFrom->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_ProductFrom" class="ew-search-field">
<?php
$onchange = $view_pharmacy_movement_item_search->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_search->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x_ProductFrom">
	<input type="text" class="form-control" name="sv_x_ProductFrom" id="sv_x_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item_search->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_search->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item_search->ProductFrom->displayValueSeparatorAttribute() ?>" name="x_ProductFrom" id="x_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_search->ProductFrom->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch"], function() {
	fview_pharmacy_movement_itemsearch.createAutoSuggest({"id":"x_ProductFrom","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_search->ProductFrom->Lookup->getParamTag($view_pharmacy_movement_item_search, "p_x_ProductFrom") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label for="x_Quantity" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_Quantity"><?php echo $view_pharmacy_movement_item_search->Quantity->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Quantity" id="z_Quantity" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->Quantity->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_Quantity" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->Quantity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->FreeQty->Visible) { // FreeQty ?>
	<div id="r_FreeQty" class="form-group row">
		<label for="x_FreeQty" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_FreeQty"><?php echo $view_pharmacy_movement_item_search->FreeQty->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FreeQty" id="z_FreeQty" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->FreeQty->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_FreeQty" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->FreeQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->IQ->Visible) { // IQ ?>
	<div id="r_IQ" class="form-group row">
		<label for="x_IQ" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_IQ"><?php echo $view_pharmacy_movement_item_search->IQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->IQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_IQ" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->IQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->MRQ->Visible) { // MRQ ?>
	<div id="r_MRQ" class="form-group row">
		<label for="x_MRQ" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_MRQ"><?php echo $view_pharmacy_movement_item_search->MRQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MRQ" id="z_MRQ" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->MRQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_MRQ" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->MRQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BRCODE"><?php echo $view_pharmacy_movement_item_search->BRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BRCODE" class="ew-search-field">
<?php
$onchange = $view_pharmacy_movement_item_search->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_search->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE">
	<input type="text" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item_search->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_search->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item_search->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_search->BRCODE->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch"], function() {
	fview_pharmacy_movement_itemsearch.createAutoSuggest({"id":"x_BRCODE","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_search->BRCODE->Lookup->getParamTag($view_pharmacy_movement_item_search, "p_x_BRCODE") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->OPNO->Visible) { // OPNO ?>
	<div id="r_OPNO" class="form-group row">
		<label for="x_OPNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_OPNO"><?php echo $view_pharmacy_movement_item_search->OPNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->OPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_OPNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->OPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->IPNO->Visible) { // IPNO ?>
	<div id="r_IPNO" class="form-group row">
		<label for="x_IPNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_IPNO"><?php echo $view_pharmacy_movement_item_search->IPNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->IPNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_IPNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->IPNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<div id="r_PatientBILLNO" class="form-group row">
		<label for="x_PatientBILLNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_PatientBILLNO"><?php echo $view_pharmacy_movement_item_search->PatientBILLNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientBILLNO" id="z_PatientBILLNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->PatientBILLNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_PatientBILLNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x_PatientBILLNO" id="x_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->PatientBILLNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label for="x_BILLDT" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BILLDT"><?php echo $view_pharmacy_movement_item_search->BILLDT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BILLDT" id="z_BILLDT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->BILLDT->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BILLDT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->BILLDT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->GRNNO->Visible) { // GRNNO ?>
	<div id="r_GRNNO" class="form-group row">
		<label for="x_GRNNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_GRNNO"><?php echo $view_pharmacy_movement_item_search->GRNNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GRNNO" id="z_GRNNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->GRNNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_GRNNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x_GRNNO" id="x_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->GRNNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label for="x_DT" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_DT"><?php echo $view_pharmacy_movement_item_search->DT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DT" id="z_DT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->DT->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_DT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x_DT" id="x_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->DT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label for="x_Customername" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_Customername"><?php echo $view_pharmacy_movement_item_search->Customername->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Customername" id="z_Customername" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->Customername->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_Customername" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->Customername->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_createdby"><?php echo $view_pharmacy_movement_item_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->createdby->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_createdby" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_createddatetime"><?php echo $view_pharmacy_movement_item_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->createddatetime->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_createddatetime" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_search->createddatetime->ReadOnly && !$view_pharmacy_movement_item_search->createddatetime->Disabled && !isset($view_pharmacy_movement_item_search->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_modifiedby"><?php echo $view_pharmacy_movement_item_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->modifiedby->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_modifiedby" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_modifieddatetime"><?php echo $view_pharmacy_movement_item_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_modifieddatetime" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_search->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item_search->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item_search->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label for="x_BILLNO" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BILLNO"><?php echo $view_pharmacy_movement_item_search->BILLNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BILLNO" id="z_BILLNO" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->BILLNO->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BILLNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->BILLNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->prc->Visible) { // prc ?>
	<div id="r_prc" class="form-group row">
		<label for="x_prc" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_prc"><?php echo $view_pharmacy_movement_item_search->prc->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->prc->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_prc" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->prc->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label for="x_PrName" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_PrName"><?php echo $view_pharmacy_movement_item_search->PrName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->PrName->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_PrName" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->PrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label for="x_BatchNo" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BatchNo"><?php echo $view_pharmacy_movement_item_search->BatchNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->BatchNo->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_BatchNo" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->BatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label for="x_ExpDate" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_ExpDate"><?php echo $view_pharmacy_movement_item_search->ExpDate->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->ExpDate->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_ExpDate" id="z_ExpDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_movement_item_search->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_pharmacy_movement_item_ExpDate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_search->ExpDate->ReadOnly && !$view_pharmacy_movement_item_search->ExpDate->Disabled && !isset($view_pharmacy_movement_item_search->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_search->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_pharmacy_movement_item_ExpDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement_item_search->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_search->ExpDate->ReadOnly && !$view_pharmacy_movement_item_search->ExpDate->Disabled && !isset($view_pharmacy_movement_item_search->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_search->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_MFRCODE"><?php echo $view_pharmacy_movement_item_search->MFRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_MFRCODE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->hsn->Visible) { // hsn ?>
	<div id="r_hsn" class="form-group row">
		<label for="x_hsn" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_hsn"><?php echo $view_pharmacy_movement_item_search->hsn->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_hsn" id="z_hsn" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->hsn->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_hsn" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x_hsn" id="x_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->hsn->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_item_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacy_movement_item_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_HospID"><?php echo $view_pharmacy_movement_item_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_item_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_item_search->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_item_HospID" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_search->HospID->EditValue ?>"<?php echo $view_pharmacy_movement_item_search->HospID->editAttributes() ?>>
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
$view_pharmacy_movement_item_search->terminate();
?>