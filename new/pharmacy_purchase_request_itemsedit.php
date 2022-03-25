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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchase_request_itemsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpharmacy_purchase_request_itemsedit = currentForm = new ew.Form("fpharmacy_purchase_request_itemsedit", "edit");

	// Validate form
	fpharmacy_purchase_request_itemsedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->id->caption(), $pharmacy_purchase_request_items_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->PRC->caption(), $pharmacy_purchase_request_items_edit->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->PrName->caption(), $pharmacy_purchase_request_items_edit->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->Quantity->caption(), $pharmacy_purchase_request_items_edit->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_edit->Quantity->errorMessage()) ?>");
			<?php if ($pharmacy_purchase_request_items_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->HospID->caption(), $pharmacy_purchase_request_items_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->modifiedby->caption(), $pharmacy_purchase_request_items_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->modifieddatetime->caption(), $pharmacy_purchase_request_items_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->BRCODE->caption(), $pharmacy_purchase_request_items_edit->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_edit->prid->Required) { ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_edit->prid->caption(), $pharmacy_purchase_request_items_edit->prid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_edit->prid->errorMessage()) ?>");

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpharmacy_purchase_request_itemsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchase_request_itemsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchase_request_itemsedit.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_edit->PrName->Lookup->toClientList($pharmacy_purchase_request_items_edit) ?>;
	fpharmacy_purchase_request_itemsedit.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_edit->PrName->lookupOptions()) ?>;
	fpharmacy_purchase_request_itemsedit.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_purchase_request_itemsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchase_request_items_edit->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_edit->showMessage();
?>
<form name="fpharmacy_purchase_request_itemsedit" id="fpharmacy_purchase_request_itemsedit" class="<?php echo $pharmacy_purchase_request_items_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_items_edit->IsModal ?>">
<?php if ($pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->prid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_purchase_request_items_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_id" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_edit->id->caption() ?><?php echo $pharmacy_purchase_request_items_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_edit->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->id->CurrentValue) ?>">
<?php echo $pharmacy_purchase_request_items_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_edit->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_PRC" for="x_PRC" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_edit->PRC->caption() ?><?php echo $pharmacy_purchase_request_items_edit->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_edit->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x_PRC" id="x_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_edit->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_edit->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_items_edit->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_edit->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_PrName" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_edit->PrName->caption() ?><?php echo $pharmacy_purchase_request_items_edit->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_edit->PrName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PrName">
<?php
$onchange = $pharmacy_purchase_request_items_edit->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_edit->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_edit->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_edit->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_edit->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsedit"], function() {
	fpharmacy_purchase_request_itemsedit.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_edit->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_edit, "p_x_PrName") ?>
</span>
<?php echo $pharmacy_purchase_request_items_edit->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_edit->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_Quantity" for="x_Quantity" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_edit->Quantity->caption() ?><?php echo $pharmacy_purchase_request_items_edit->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_edit->Quantity->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_edit->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_edit->Quantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_items_edit->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_edit->prid->Visible) { // prid ?>
	<div id="r_prid" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_prid" for="x_prid" class="<?php echo $pharmacy_purchase_request_items_edit->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_edit->prid->caption() ?><?php echo $pharmacy_purchase_request_items_edit->prid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_edit->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_edit->prid->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items_edit->prid->getSessionValue() != "") { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_edit->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_edit->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_prid" name="x_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x_prid" id="x_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_edit->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_edit->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_edit->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_purchase_request_items_edit->prid->CustomMsg ?></div></div>
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
$pharmacy_purchase_request_items_edit->terminate();
?>