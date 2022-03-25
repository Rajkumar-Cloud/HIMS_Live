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
$pharmacy_purchase_request_items_edit = new pharmacy_purchase_request_items_edit();

// Run the page
$pharmacy_purchase_request_items_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_purchase_request_itemsedit = currentForm = new ew.Form("fpharmacy_purchase_request_itemsedit", "edit");

// Validate form
fpharmacy_purchase_request_itemsedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($pharmacy_purchase_request_items_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->id->caption(), $pharmacy_purchase_request_items->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->PRC->caption(), $pharmacy_purchase_request_items->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->PrName->caption(), $pharmacy_purchase_request_items->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->Quantity->caption(), $pharmacy_purchase_request_items->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items->Quantity->errorMessage()) ?>");
		<?php if ($pharmacy_purchase_request_items_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->HospID->caption(), $pharmacy_purchase_request_items->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->modifiedby->caption(), $pharmacy_purchase_request_items->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->modifieddatetime->caption(), $pharmacy_purchase_request_items->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->BRCODE->caption(), $pharmacy_purchase_request_items->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_purchase_request_items_edit->prid->Required) { ?>
			elm = this.getElements("x" + infix + "_prid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items->prid->caption(), $pharmacy_purchase_request_items->prid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_prid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items->prid->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpharmacy_purchase_request_itemsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_request_itemsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchase_request_itemsedit.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_edit->PrName->Lookup->toClientList() ?>;
fpharmacy_purchase_request_itemsedit.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_edit->PrName->lookupOptions()) ?>;
fpharmacy_purchase_request_itemsedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_purchase_request_items_edit->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_edit->showMessage();
?>
<form name="fpharmacy_purchase_request_itemsedit" id="fpharmacy_purchase_request_itemsedit" class="<?php echo $pharmacy_purchase_request_items_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchase_request_items_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_items_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_items_edit->IsModal ?>">
<?php if ($pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_purchase_request_items->prid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_id" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items->id->caption() ?><?php echo ($pharmacy_purchase_request_items->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchase_request_items->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->id->CurrentValue) ?>">
<?php echo $pharmacy_purchase_request_items->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_PRC" for="x_PRC" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?><?php echo ($pharmacy_purchase_request_items->PRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchase_request_items->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x_PRC" id="x_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_items->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_PrName" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?><?php echo ($pharmacy_purchase_request_items->PrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchase_request_items->PrName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_purchase_request_items->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_purchase_request_itemsedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_purchase_request_items->PrName->Lookup->getParamTag("p_x_PrName") ?>
</span>
<?php echo $pharmacy_purchase_request_items->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_Quantity" for="x_Quantity" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?><?php echo ($pharmacy_purchase_request_items->Quantity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchase_request_items->Quantity->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items->Quantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_items->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
	<div id="r_prid" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_prid" for="x_prid" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items->prid->caption() ?><?php echo ($pharmacy_purchase_request_items->prid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div<?php echo $pharmacy_purchase_request_items->prid->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->prid->getSessionValue() <> "") { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_purchase_request_items->prid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_prid" name="x_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x_prid" id="x_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_purchase_request_items->prid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_purchase_request_items_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_purchase_request_items_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchase_request_items_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_purchase_request_items_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_items_edit->terminate();
?>