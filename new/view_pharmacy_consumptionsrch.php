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
$view_pharmacy_consumption_search = new view_pharmacy_consumption_search();

// Run the page
$view_pharmacy_consumption_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_consumption_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_consumptionsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_pharmacy_consumption_search->IsModal) { ?>
	fview_pharmacy_consumptionsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_consumptionsearch", "search");
	<?php } else { ?>
	fview_pharmacy_consumptionsearch = currentForm = new ew.Form("fview_pharmacy_consumptionsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_pharmacy_consumptionsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OQ");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->OQ->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Stock");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->Stock->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->EXPDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BILLDATE");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->BILLDATE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RT");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->RT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SSGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->SSGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SCGST");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->SCGST->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BRCODE");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->BRCODE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_consumption_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_consumptionsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_consumptionsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_consumptionsearch.lists["x_Select[]"] = <?php echo $view_pharmacy_consumption_search->Select->Lookup->toClientList($view_pharmacy_consumption_search) ?>;
	fview_pharmacy_consumptionsearch.lists["x_Select[]"].options = <?php echo JsonEncode($view_pharmacy_consumption_search->Select->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_pharmacy_consumptionsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_consumption_search->showPageHeader(); ?>
<?php
$view_pharmacy_consumption_search->showMessage();
?>
<form name="fview_pharmacy_consumptionsearch" id="fview_pharmacy_consumptionsearch" class="<?php echo $view_pharmacy_consumption_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_consumption">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_consumption_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_consumption_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_id"><?php echo $view_pharmacy_consumption_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->id->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_id" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->id->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->id->EditValue ?>"<?php echo $view_pharmacy_consumption_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label for="x_PRC" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_PRC"><?php echo $view_pharmacy_consumption_search->PRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->PRC->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_PRC" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->PRC->EditValue ?>"<?php echo $view_pharmacy_consumption_search->PRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->DES->Visible) { // DES ?>
	<div id="r_DES" class="form-group row">
		<label for="x_DES" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_DES"><?php echo $view_pharmacy_consumption_search->DES->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->DES->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_DES" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->DES->EditValue ?>"<?php echo $view_pharmacy_consumption_search->DES->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->BATCH->Visible) { // BATCH ?>
	<div id="r_BATCH" class="form-group row">
		<label for="x_BATCH" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_BATCH"><?php echo $view_pharmacy_consumption_search->BATCH->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCH" id="z_BATCH" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->BATCH->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_BATCH" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->BATCH->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->BATCH->EditValue ?>"<?php echo $view_pharmacy_consumption_search->BATCH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->OQ->Visible) { // OQ ?>
	<div id="r_OQ" class="form-group row">
		<label for="x_OQ" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_OQ"><?php echo $view_pharmacy_consumption_search->OQ->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OQ" id="z_OQ" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->OQ->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_OQ" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->OQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->OQ->EditValue ?>"<?php echo $view_pharmacy_consumption_search->OQ->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->Stock->Visible) { // Stock ?>
	<div id="r_Stock" class="form-group row">
		<label for="x_Stock" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_Stock"><?php echo $view_pharmacy_consumption_search->Stock->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->Stock->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_Stock" id="z_Stock" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_consumption_search->Stock->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_pharmacy_consumption_Stock" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->Stock->EditValue ?>"<?php echo $view_pharmacy_consumption_search->Stock->editAttributes() ?>>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_pharmacy_consumption_Stock" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->Stock->EditValue2 ?>"<?php echo $view_pharmacy_consumption_search->Stock->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->EXPDT->Visible) { // EXPDT ?>
	<div id="r_EXPDT" class="form-group row">
		<label for="x_EXPDT" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_EXPDT"><?php echo $view_pharmacy_consumption_search->EXPDT->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->EXPDT->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_consumption_search->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_pharmacy_consumption_EXPDT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->EXPDT->EditValue ?>"<?php echo $view_pharmacy_consumption_search->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_search->EXPDT->ReadOnly && !$view_pharmacy_consumption_search->EXPDT->Disabled && !isset($view_pharmacy_consumption_search->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_pharmacy_consumption_EXPDT" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->EXPDT->EditValue2 ?>"<?php echo $view_pharmacy_consumption_search->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_search->EXPDT->ReadOnly && !$view_pharmacy_consumption_search->EXPDT->Disabled && !isset($view_pharmacy_consumption_search->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->BILLDATE->Visible) { // BILLDATE ?>
	<div id="r_BILLDATE" class="form-group row">
		<label for="x_BILLDATE" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_BILLDATE"><?php echo $view_pharmacy_consumption_search->BILLDATE->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->BILLDATE->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_BILLDATE" id="z_BILLDATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_consumption_search->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_pharmacy_consumption_BILLDATE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_consumption_search->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_search->BILLDATE->ReadOnly && !$view_pharmacy_consumption_search->BILLDATE->Disabled && !isset($view_pharmacy_consumption_search->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_search->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_pharmacy_consumption_BILLDATE" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->BILLDATE->EditValue2 ?>"<?php echo $view_pharmacy_consumption_search->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_consumption_search->BILLDATE->ReadOnly && !$view_pharmacy_consumption_search->BILLDATE->Disabled && !isset($view_pharmacy_consumption_search->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_consumption_search->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->GENNAME->Visible) { // GENNAME ?>
	<div id="r_GENNAME" class="form-group row">
		<label for="x_GENNAME" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_GENNAME"><?php echo $view_pharmacy_consumption_search->GENNAME->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->GENNAME->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_GENNAME" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->GENNAME->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->GENNAME->EditValue ?>"<?php echo $view_pharmacy_consumption_search->GENNAME->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->UNIT->Visible) { // UNIT ?>
	<div id="r_UNIT" class="form-group row">
		<label for="x_UNIT" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_UNIT"><?php echo $view_pharmacy_consumption_search->UNIT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UNIT" id="z_UNIT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->UNIT->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_UNIT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->UNIT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->UNIT->EditValue ?>"<?php echo $view_pharmacy_consumption_search->UNIT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->RT->Visible) { // RT ?>
	<div id="r_RT" class="form-group row">
		<label for="x_RT" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_RT"><?php echo $view_pharmacy_consumption_search->RT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->RT->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_RT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->RT->EditValue ?>"<?php echo $view_pharmacy_consumption_search->RT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->SSGST->Visible) { // SSGST ?>
	<div id="r_SSGST" class="form-group row">
		<label for="x_SSGST" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_SSGST"><?php echo $view_pharmacy_consumption_search->SSGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->SSGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_SSGST" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->SSGST->EditValue ?>"<?php echo $view_pharmacy_consumption_search->SSGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->SCGST->Visible) { // SCGST ?>
	<div id="r_SCGST" class="form-group row">
		<label for="x_SCGST" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_SCGST"><?php echo $view_pharmacy_consumption_search->SCGST->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->SCGST->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_SCGST" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->SCGST->EditValue ?>"<?php echo $view_pharmacy_consumption_search->SCGST->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_MFRCODE"><?php echo $view_pharmacy_consumption_search->MFRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_MFRCODE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_consumption_search->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label for="x_BRCODE" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_BRCODE"><?php echo $view_pharmacy_consumption_search->BRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->BRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_BRCODE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->BRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->BRCODE->EditValue ?>"<?php echo $view_pharmacy_consumption_search->BRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_HospID"><?php echo $view_pharmacy_consumption_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_HospID" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->HospID->EditValue ?>"<?php echo $view_pharmacy_consumption_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->Select->Visible) { // Select ?>
	<div id="r_Select" class="form-group row">
		<label class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_Select"><?php echo $view_pharmacy_consumption_search->Select->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Select" id="z_Select" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->Select->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_Select" class="ew-search-field">
<div id="tp_x_Select" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" data-value-separator="<?php echo $view_pharmacy_consumption_search->Select->displayValueSeparatorAttribute() ?>" name="x_Select[]" id="x_Select[]" value="{value}"<?php echo $view_pharmacy_consumption_search->Select->editAttributes() ?>></div>
<div id="dsl_x_Select" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_pharmacy_consumption_search->Select->checkBoxListHtml(FALSE, "x_Select[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_consumption_search->ConsQTY->Visible) { // ConsQTY ?>
	<div id="r_ConsQTY" class="form-group row">
		<label for="x_ConsQTY" class="<?php echo $view_pharmacy_consumption_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_ConsQTY"><?php echo $view_pharmacy_consumption_search->ConsQTY->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ConsQTY" id="z_ConsQTY" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_consumption_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_consumption_search->ConsQTY->cellAttributes() ?>>
			<span id="el_view_pharmacy_consumption_ConsQTY" class="ew-search-field">
<input type="text" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x_ConsQTY" id="x_ConsQTY" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_consumption_search->ConsQTY->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_consumption_search->ConsQTY->EditValue ?>"<?php echo $view_pharmacy_consumption_search->ConsQTY->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_consumption_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_consumption_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_consumption_search->showPageFooter();
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
$view_pharmacy_consumption_search->terminate();
?>