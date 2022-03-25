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
$store_billing_transfer_edit = new store_billing_transfer_edit();

// Run the page
$store_billing_transfer_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_billing_transfer_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fstore_billing_transferedit = currentForm = new ew.Form("fstore_billing_transferedit", "edit");

// Validate form
fstore_billing_transferedit.validate = function() {
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
		<?php if ($store_billing_transfer_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->id->caption(), $store_billing_transfer->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->transfer->Required) { ?>
			elm = this.getElements("x" + infix + "_transfer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->transfer->caption(), $store_billing_transfer->transfer->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->pharmacy->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->pharmacy->caption(), $store_billing_transfer->pharmacy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->street->caption(), $store_billing_transfer->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->area->caption(), $store_billing_transfer->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->town->caption(), $store_billing_transfer->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->province->caption(), $store_billing_transfer->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->postal_code->caption(), $store_billing_transfer->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->phone_no->caption(), $store_billing_transfer->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->Details->caption(), $store_billing_transfer->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->modifiedby->caption(), $store_billing_transfer->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->modifieddatetime->caption(), $store_billing_transfer->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->HospID->caption(), $store_billing_transfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->RIDNO->caption(), $store_billing_transfer->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->RIDNO->errorMessage()) ?>");
		<?php if ($store_billing_transfer_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->TidNo->caption(), $store_billing_transfer->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->TidNo->errorMessage()) ?>");
		<?php if ($store_billing_transfer_edit->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->CId->caption(), $store_billing_transfer->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->CId->errorMessage()) ?>");
		<?php if ($store_billing_transfer_edit->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->PatId->caption(), $store_billing_transfer->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->PatId->errorMessage()) ?>");
		<?php if ($store_billing_transfer_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->DrID->caption(), $store_billing_transfer->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->DrID->errorMessage()) ?>");
		<?php if ($store_billing_transfer_edit->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->BillStatus->caption(), $store_billing_transfer->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->BillStatus->errorMessage()) ?>");
		<?php if ($store_billing_transfer_edit->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->StoreID->caption(), $store_billing_transfer->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_billing_transfer_edit->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_billing_transfer->BranchID->caption(), $store_billing_transfer->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_billing_transfer->BranchID->errorMessage()) ?>");

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
fstore_billing_transferedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_billing_transferedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_billing_transferedit.lists["x_transfer"] = <?php echo $store_billing_transfer_edit->transfer->Lookup->toClientList() ?>;
fstore_billing_transferedit.lists["x_transfer"].options = <?php echo JsonEncode($store_billing_transfer_edit->transfer->lookupOptions()) ?>;
fstore_billing_transferedit.lists["x_StoreID"] = <?php echo $store_billing_transfer_edit->StoreID->Lookup->toClientList() ?>;
fstore_billing_transferedit.lists["x_StoreID"].options = <?php echo JsonEncode($store_billing_transfer_edit->StoreID->lookupOptions()) ?>;
fstore_billing_transferedit.autoSuggests["x_StoreID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_billing_transfer_edit->showPageHeader(); ?>
<?php
$store_billing_transfer_edit->showMessage();
?>
<form name="fstore_billing_transferedit" id="fstore_billing_transferedit" class="<?php echo $store_billing_transfer_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_billing_transfer_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_billing_transfer_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_billing_transfer">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_billing_transfer_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($store_billing_transfer->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_billing_transfer_id" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_id" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->id->caption() ?><?php echo ($store_billing_transfer->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->id->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_id" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_id">
<span<?php echo $store_billing_transfer->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_billing_transfer->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="store_billing_transfer" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_billing_transfer->id->CurrentValue) ?>">
<?php echo $store_billing_transfer->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->transfer->Visible) { // transfer ?>
	<div id="r_transfer" class="form-group row">
		<label id="elh_store_billing_transfer_transfer" for="x_transfer" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_transfer" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->transfer->caption() ?><?php echo ($store_billing_transfer->transfer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->transfer->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_transfer" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_transfer">
<?php $store_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$store_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $store_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x_transfer" name="x_transfer"<?php echo $store_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $store_billing_transfer->transfer->selectOptionListHtml("x_transfer") ?>
	</select>
</div>
<?php echo $store_billing_transfer->transfer->Lookup->getParamTag("p_x_transfer") ?>
</span>
</script>
<?php echo $store_billing_transfer->transfer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->pharmacy->Visible) { // pharmacy ?>
	<div id="r_pharmacy" class="form-group row">
		<label id="elh_store_billing_transfer_pharmacy" for="x_pharmacy" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_pharmacy" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->pharmacy->caption() ?><?php echo ($store_billing_transfer->pharmacy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->pharmacy->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_pharmacy" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_pharmacy">
<input type="text" data-table="store_billing_transfer" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->pharmacy->EditValue ?>"<?php echo $store_billing_transfer->pharmacy->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->pharmacy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_store_billing_transfer_street" for="x_street" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_street" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->street->caption() ?><?php echo ($store_billing_transfer->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->street->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_street" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_street">
<input type="text" data-table="store_billing_transfer" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->street->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->street->EditValue ?>"<?php echo $store_billing_transfer->street->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_store_billing_transfer_area" for="x_area" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_area" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->area->caption() ?><?php echo ($store_billing_transfer->area->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->area->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_area" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_area">
<input type="text" data-table="store_billing_transfer" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->area->EditValue ?>"<?php echo $store_billing_transfer->area->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_store_billing_transfer_town" for="x_town" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_town" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->town->caption() ?><?php echo ($store_billing_transfer->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->town->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_town" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_town">
<input type="text" data-table="store_billing_transfer" data-field="x_town" name="x_town" id="x_town" placeholder="<?php echo HtmlEncode($store_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->town->EditValue ?>"<?php echo $store_billing_transfer->town->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_store_billing_transfer_province" for="x_province" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_province" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->province->caption() ?><?php echo ($store_billing_transfer->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->province->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_province" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_province">
<input type="text" data-table="store_billing_transfer" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->province->EditValue ?>"<?php echo $store_billing_transfer->province->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_store_billing_transfer_postal_code" for="x_postal_code" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_postal_code" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->postal_code->caption() ?><?php echo ($store_billing_transfer->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->postal_code->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_postal_code" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_postal_code">
<input type="text" data-table="store_billing_transfer" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->postal_code->EditValue ?>"<?php echo $store_billing_transfer->postal_code->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_store_billing_transfer_phone_no" for="x_phone_no" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_phone_no" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->phone_no->caption() ?><?php echo ($store_billing_transfer->phone_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->phone_no->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_phone_no" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_phone_no">
<input type="text" data-table="store_billing_transfer" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->phone_no->EditValue ?>"<?php echo $store_billing_transfer->phone_no->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_store_billing_transfer_Details" for="x_Details" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_Details" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->Details->caption() ?><?php echo ($store_billing_transfer->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->Details->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_Details" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_Details">
<input type="text" data-table="store_billing_transfer" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_billing_transfer->Details->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->Details->EditValue ?>"<?php echo $store_billing_transfer->Details->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_store_billing_transfer_RIDNO" for="x_RIDNO" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_RIDNO" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->RIDNO->caption() ?><?php echo ($store_billing_transfer->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->RIDNO->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_RIDNO" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_RIDNO">
<input type="text" data-table="store_billing_transfer" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->RIDNO->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->RIDNO->EditValue ?>"<?php echo $store_billing_transfer->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_store_billing_transfer_TidNo" for="x_TidNo" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_TidNo" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->TidNo->caption() ?><?php echo ($store_billing_transfer->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->TidNo->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_TidNo" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_TidNo">
<input type="text" data-table="store_billing_transfer" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->TidNo->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->TidNo->EditValue ?>"<?php echo $store_billing_transfer->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_store_billing_transfer_CId" for="x_CId" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_CId" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->CId->caption() ?><?php echo ($store_billing_transfer->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->CId->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_CId" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_CId">
<input type="text" data-table="store_billing_transfer" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->CId->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->CId->EditValue ?>"<?php echo $store_billing_transfer->CId->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_store_billing_transfer_PatId" for="x_PatId" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_PatId" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->PatId->caption() ?><?php echo ($store_billing_transfer->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->PatId->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_PatId" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_PatId">
<input type="text" data-table="store_billing_transfer" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->PatId->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->PatId->EditValue ?>"<?php echo $store_billing_transfer->PatId->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_store_billing_transfer_DrID" for="x_DrID" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_DrID" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->DrID->caption() ?><?php echo ($store_billing_transfer->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->DrID->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_DrID" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_DrID">
<input type="text" data-table="store_billing_transfer" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->DrID->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->DrID->EditValue ?>"<?php echo $store_billing_transfer->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_store_billing_transfer_BillStatus" for="x_BillStatus" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_BillStatus" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->BillStatus->caption() ?><?php echo ($store_billing_transfer->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->BillStatus->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_BillStatus" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_BillStatus">
<input type="text" data-table="store_billing_transfer" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->BillStatus->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->BillStatus->EditValue ?>"<?php echo $store_billing_transfer->BillStatus->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_billing_transfer->BranchID->Visible) { // BranchID ?>
	<div id="r_BranchID" class="form-group row">
		<label id="elh_store_billing_transfer_BranchID" for="x_BranchID" class="<?php echo $store_billing_transfer_edit->LeftColumnClass ?>"><script id="tpc_store_billing_transfer_BranchID" class="store_billing_transferedit" type="text/html"><span><?php echo $store_billing_transfer->BranchID->caption() ?><?php echo ($store_billing_transfer->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_billing_transfer_edit->RightColumnClass ?>"><div<?php echo $store_billing_transfer->BranchID->cellAttributes() ?>>
<script id="tpx_store_billing_transfer_BranchID" class="store_billing_transferedit" type="text/html">
<span id="el_store_billing_transfer_BranchID">
<input type="text" data-table="store_billing_transfer" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_billing_transfer->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_billing_transfer->BranchID->EditValue ?>"<?php echo $store_billing_transfer->BranchID->editAttributes() ?>>
</span>
</script>
<?php echo $store_billing_transfer->BranchID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_store_billing_transferedit" class="ew-custom-template"></div>
<script id="tpm_store_billing_transferedit" type="text/html">
<div id="ct_store_billing_transfer_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_store_billing_transfer_PatId"/}}&nbsp;{{include tmpl="#tpx_store_billing_transfer_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_store_billing_transfer_RIDNO"/}}&nbsp;{{include tmpl="#tpx_store_billing_transfer_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_store_billing_transfer_CId"/}}&nbsp;{{include tmpl="#tpx_store_billing_transfer_CId"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
		<td>{{include tmpl="#tpx_PatientId"/}}</td>
			<td>{{include tmpl="#tpx_PatientName"/}}</td>
			<td>{{include tmpl="#tpx_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpx_Dob"/}}</td>
		<td>{{include tmpl="#tpx_Age"/}}</td>
			<td>{{include tmpl="#tpx_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpx_PartnerName"/}}</td>
			<td>{{include tmpl="#tpx_PayerType"/}}</td>
			<td>{{include tmpl="#tpx_RefferedBy"/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_store_billing_transfer_DrID"/}}&nbsp;{{include tmpl="#tpx_store_billing_transfer_DrID"/}}</td>
			<td>{{include tmpl="#tpx_Doctor"/}}</td>
			<td>{{include tmpl="#tpx_DrDepartment"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpx_ReportHeader"/}}
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpx_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpx_Amount"/}}</td>
			<td>{{include tmpl="#tpx_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpx_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpx_Remarks"/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="viewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpx_CardNumber"/}}</td>
			<td>{{include tmpl="#tpx_BankName"/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_store_transfer", explode(",", $store_billing_transfer->getCurrentDetailTable())) && $view_store_transfer->DetailEdit) {
?>
<?php if ($store_billing_transfer->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_store_transfer", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_store_transfergrid.php" ?>
<?php } ?>
<?php if (!$store_billing_transfer_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_billing_transfer_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_billing_transfer_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($store_billing_transfer->Rows) ?> };
ew.applyTemplate("tpd_store_billing_transferedit", "tpm_store_billing_transferedit", "store_billing_transferedit", "<?php echo $store_billing_transfer->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.store_billing_transferedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$store_billing_transfer_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_billing_transfer_edit->terminate();
?>