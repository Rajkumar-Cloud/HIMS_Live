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
$view_pharmacy_movement_search = new view_pharmacy_movement_search();

// Run the page
$view_pharmacy_movement_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_movementsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_pharmacy_movement_search->IsModal) { ?>
	fview_pharmacy_movementsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_movementsearch", "search");
	<?php } else { ?>
	fview_pharmacy_movementsearch = currentForm = new ew.Form("fview_pharmacy_movementsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_pharmacy_movementsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ExpDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_search->ExpDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_movementsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_movementsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fview_pharmacy_movementsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_movement_search->showPageHeader(); ?>
<?php
$view_pharmacy_movement_search->showMessage();
?>
<form name="fview_pharmacy_movementsearch" id="fview_pharmacy_movementsearch" class="<?php echo $view_pharmacy_movement_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_movement_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_pharmacy_movement_search->prc->Visible) { // prc ?>
	<div id="r_prc" class="form-group row">
		<label for="x_prc" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_prc"><?php echo $view_pharmacy_movement_search->prc->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->prc->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_prc" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->prc->EditValue ?>"<?php echo $view_pharmacy_movement_search->prc->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_search->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label for="x_PrName" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_PrName"><?php echo $view_pharmacy_movement_search->PrName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->PrName->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_PrName" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_search->PrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_search->BatchNo->Visible) { // BatchNo ?>
	<div id="r_BatchNo" class="form-group row">
		<label for="x_BatchNo" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_BatchNo"><?php echo $view_pharmacy_movement_search->BatchNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->BatchNo->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_BatchNo" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_search->BatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_search->ExpDate->Visible) { // ExpDate ?>
	<div id="r_ExpDate" class="form-group row">
		<label for="x_ExpDate" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_ExpDate"><?php echo $view_pharmacy_movement_search->ExpDate->caption() ?></span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->ExpDate->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_ExpDate" id="z_ExpDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_movement_search->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_pharmacy_movement_ExpDate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_search->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_search->ExpDate->ReadOnly && !$view_pharmacy_movement_search->ExpDate->Disabled && !isset($view_pharmacy_movement_search->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_search->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movementsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movementsearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_pharmacy_movement_ExpDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement_search->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_search->ExpDate->ReadOnly && !$view_pharmacy_movement_search->ExpDate->Disabled && !isset($view_pharmacy_movement_search->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_search->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movementsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movementsearch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_search->MFRCODE->Visible) { // MFRCODE ?>
	<div id="r_MFRCODE" class="form-group row">
		<label for="x_MFRCODE" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_MFRCODE"><?php echo $view_pharmacy_movement_search->MFRCODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->MFRCODE->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_MFRCODE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_search->MFRCODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_search->hsn->Visible) { // hsn ?>
	<div id="r_hsn" class="form-group row">
		<label for="x_hsn" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_hsn"><?php echo $view_pharmacy_movement_search->hsn->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_hsn" id="z_hsn" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->hsn->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_hsn" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_hsn" name="x_hsn" id="x_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_search->hsn->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_pharmacy_movement_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_pharmacy_movement_search->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_HospID"><?php echo $view_pharmacy_movement_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_pharmacy_movement_search->RightColumnClass ?>"><div <?php echo $view_pharmacy_movement_search->HospID->cellAttributes() ?>>
			<span id="el_view_pharmacy_movement_HospID" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_search->HospID->EditValue ?>"<?php echo $view_pharmacy_movement_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_pharmacy_movement_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_pharmacy_movement_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_pharmacy_movement_search->showPageFooter();
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
$view_pharmacy_movement_search->terminate();
?>