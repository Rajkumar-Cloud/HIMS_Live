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
$pharmacy_purchase_request_items_add = new pharmacy_purchase_request_items_add();

// Run the page
$pharmacy_purchase_request_items_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchase_request_itemsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_purchase_request_itemsadd = currentForm = new ew.Form("fpharmacy_purchase_request_itemsadd", "add");

	// Validate form
	fpharmacy_purchase_request_itemsadd.validate = function() {
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
			<?php if ($pharmacy_purchase_request_items_add->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->PRC->caption(), $pharmacy_purchase_request_items_add->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_add->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->PrName->caption(), $pharmacy_purchase_request_items_add->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_add->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->Quantity->caption(), $pharmacy_purchase_request_items_add->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_add->Quantity->errorMessage()) ?>");
			<?php if ($pharmacy_purchase_request_items_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->HospID->caption(), $pharmacy_purchase_request_items_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->createdby->caption(), $pharmacy_purchase_request_items_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->createddatetime->caption(), $pharmacy_purchase_request_items_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->BRCODE->caption(), $pharmacy_purchase_request_items_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_add->prid->Required) { ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_add->prid->caption(), $pharmacy_purchase_request_items_add->prid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_add->prid->errorMessage()) ?>");

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
	fpharmacy_purchase_request_itemsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchase_request_itemsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchase_request_itemsadd.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_add->PrName->Lookup->toClientList($pharmacy_purchase_request_items_add) ?>;
	fpharmacy_purchase_request_itemsadd.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_add->PrName->lookupOptions()) ?>;
	fpharmacy_purchase_request_itemsadd.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_purchase_request_itemsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchase_request_items_add->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_add->showMessage();
?>
<form name="fpharmacy_purchase_request_itemsadd" id="fpharmacy_purchase_request_itemsadd" class="<?php echo $pharmacy_purchase_request_items_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_items_add->IsModal ?>">
<?php if ($pharmacy_purchase_request_items->getCurrentMasterTable() == "pharmacy_purchase_request") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->prid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_purchase_request_items_add->PRC->Visible) { // PRC ?>
	<div id="r_PRC" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_PRC" for="x_PRC" class="<?php echo $pharmacy_purchase_request_items_add->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_add->PRC->caption() ?><?php echo $pharmacy_purchase_request_items_add->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_add->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x_PRC" id="x_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_add->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_add->PRC->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_items_add->PRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_add->PrName->Visible) { // PrName ?>
	<div id="r_PrName" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_PrName" class="<?php echo $pharmacy_purchase_request_items_add->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_add->PrName->caption() ?><?php echo $pharmacy_purchase_request_items_add->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_add->PrName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PrName">
<?php
$onchange = $pharmacy_purchase_request_items_add->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_add->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_add->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_add->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_add->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsadd"], function() {
	fpharmacy_purchase_request_itemsadd.createAutoSuggest({"id":"x_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_add->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_add, "p_x_PrName") ?>
</span>
<?php echo $pharmacy_purchase_request_items_add->PrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_add->Quantity->Visible) { // Quantity ?>
	<div id="r_Quantity" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_Quantity" for="x_Quantity" class="<?php echo $pharmacy_purchase_request_items_add->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_add->Quantity->caption() ?><?php echo $pharmacy_purchase_request_items_add->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_add->Quantity->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_add->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_add->Quantity->editAttributes() ?>>
</span>
<?php echo $pharmacy_purchase_request_items_add->Quantity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_add->prid->Visible) { // prid ?>
	<div id="r_prid" class="form-group row">
		<label id="elh_pharmacy_purchase_request_items_prid" for="x_prid" class="<?php echo $pharmacy_purchase_request_items_add->LeftColumnClass ?>"><?php echo $pharmacy_purchase_request_items_add->prid->caption() ?><?php echo $pharmacy_purchase_request_items_add->prid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_purchase_request_items_add->RightColumnClass ?>"><div <?php echo $pharmacy_purchase_request_items_add->prid->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items_add->prid->getSessionValue() != "") { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_add->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_add->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_prid" name="x_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x_prid" id="x_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_add->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_add->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_add->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $pharmacy_purchase_request_items_add->prid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_purchase_request_items_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_purchase_request_items_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchase_request_items_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_purchase_request_items_add->showPageFooter();
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
$pharmacy_purchase_request_items_add->terminate();
?>