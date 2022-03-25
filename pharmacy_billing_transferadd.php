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
$pharmacy_billing_transfer_add = new pharmacy_billing_transfer_add();

// Run the page
$pharmacy_billing_transfer_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_transfer_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpharmacy_billing_transferadd = currentForm = new ew.Form("fpharmacy_billing_transferadd", "add");

// Validate form
fpharmacy_billing_transferadd.validate = function() {
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
		<?php if ($pharmacy_billing_transfer_add->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->PharID->caption(), $pharmacy_billing_transfer->PharID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->pharmacy->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->pharmacy->caption(), $pharmacy_billing_transfer->pharmacy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->Details->caption(), $pharmacy_billing_transfer->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->createdby->caption(), $pharmacy_billing_transfer->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->createddatetime->caption(), $pharmacy_billing_transfer->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->HospID->caption(), $pharmacy_billing_transfer->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->RIDNO->caption(), $pharmacy_billing_transfer->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer->RIDNO->errorMessage()) ?>");
		<?php if ($pharmacy_billing_transfer_add->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->TidNo->caption(), $pharmacy_billing_transfer->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer->TidNo->errorMessage()) ?>");
		<?php if ($pharmacy_billing_transfer_add->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->CId->caption(), $pharmacy_billing_transfer->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer->CId->errorMessage()) ?>");
		<?php if ($pharmacy_billing_transfer_add->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->PatId->caption(), $pharmacy_billing_transfer->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer->PatId->errorMessage()) ?>");
		<?php if ($pharmacy_billing_transfer_add->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->DrID->caption(), $pharmacy_billing_transfer->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer->DrID->errorMessage()) ?>");
		<?php if ($pharmacy_billing_transfer_add->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->BillStatus->caption(), $pharmacy_billing_transfer->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer->BillStatus->errorMessage()) ?>");
		<?php if ($pharmacy_billing_transfer_add->transfer->Required) { ?>
			elm = this.getElements("x" + infix + "_transfer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->transfer->caption(), $pharmacy_billing_transfer->transfer->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->street->caption(), $pharmacy_billing_transfer->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->area->Required) { ?>
			elm = this.getElements("x" + infix + "_area");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->area->caption(), $pharmacy_billing_transfer->area->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->town->caption(), $pharmacy_billing_transfer->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->province->caption(), $pharmacy_billing_transfer->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->postal_code->caption(), $pharmacy_billing_transfer->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_transfer_add->phone_no->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer->phone_no->caption(), $pharmacy_billing_transfer->phone_no->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fpharmacy_billing_transferadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_transferadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_transferadd.lists["x_PharID"] = <?php echo $pharmacy_billing_transfer_add->PharID->Lookup->toClientList() ?>;
fpharmacy_billing_transferadd.lists["x_PharID"].options = <?php echo JsonEncode($pharmacy_billing_transfer_add->PharID->lookupOptions()) ?>;
fpharmacy_billing_transferadd.autoSuggests["x_PharID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_billing_transferadd.lists["x_transfer"] = <?php echo $pharmacy_billing_transfer_add->transfer->Lookup->toClientList() ?>;
fpharmacy_billing_transferadd.lists["x_transfer"].options = <?php echo JsonEncode($pharmacy_billing_transfer_add->transfer->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_transfer_add->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_add->showMessage();
?>
<form name="fpharmacy_billing_transferadd" id="fpharmacy_billing_transferadd" class="<?php echo $pharmacy_billing_transfer_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_transfer_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_transfer_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_transfer_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
	<div id="r_pharmacy" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_pharmacy" for="x_pharmacy" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->pharmacy->caption() ?><?php echo ($pharmacy_billing_transfer->pharmacy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->pharmacy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_pharmacy">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer->pharmacy->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->pharmacy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_Details" for="x_Details" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_Details" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->Details->caption() ?><?php echo ($pharmacy_billing_transfer->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_Details" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_Details">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->Details->EditValue ?>"<?php echo $pharmacy_billing_transfer->Details->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_RIDNO" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->RIDNO->caption() ?><?php echo ($pharmacy_billing_transfer->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_RIDNO" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_RIDNO">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->RIDNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->RIDNO->EditValue ?>"<?php echo $pharmacy_billing_transfer->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_TidNo" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->TidNo->caption() ?><?php echo ($pharmacy_billing_transfer->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_TidNo" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_TidNo">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->TidNo->EditValue ?>"<?php echo $pharmacy_billing_transfer->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_CId" for="x_CId" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_CId" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->CId->caption() ?><?php echo ($pharmacy_billing_transfer->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_CId" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_CId">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->CId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->CId->EditValue ?>"<?php echo $pharmacy_billing_transfer->CId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_PatId" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->PatId->caption() ?><?php echo ($pharmacy_billing_transfer->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_PatId" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_PatId">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->PatId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->PatId->EditValue ?>"<?php echo $pharmacy_billing_transfer->PatId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_DrID" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->DrID->caption() ?><?php echo ($pharmacy_billing_transfer->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_DrID" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_DrID">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->DrID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->DrID->EditValue ?>"<?php echo $pharmacy_billing_transfer->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_BillStatus" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->BillStatus->caption() ?><?php echo ($pharmacy_billing_transfer->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_BillStatus" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_BillStatus">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_transfer->BillStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
	<div id="r_transfer" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_transfer" for="x_transfer" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->transfer->caption() ?><?php echo ($pharmacy_billing_transfer->transfer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->transfer->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_transfer">
<?php $pharmacy_billing_transfer->transfer->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_transfer->transfer->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer->transfer->displayValueSeparatorAttribute() ?>" id="x_transfer" name="x_transfer"<?php echo $pharmacy_billing_transfer->transfer->editAttributes() ?>>
		<?php echo $pharmacy_billing_transfer->transfer->selectOptionListHtml("x_transfer") ?>
	</select>
</div>
<?php echo $pharmacy_billing_transfer->transfer->Lookup->getParamTag("p_x_transfer") ?>
</span>
</script>
<?php echo $pharmacy_billing_transfer->transfer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_street" for="x_street" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_street" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->street->caption() ?><?php echo ($pharmacy_billing_transfer->street->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->street->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_street" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_street">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->street->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->street->EditValue ?>"<?php echo $pharmacy_billing_transfer->street->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_area" for="x_area" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_area" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->area->caption() ?><?php echo ($pharmacy_billing_transfer->area->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->area->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_area" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_area">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->area->EditValue ?>"<?php echo $pharmacy_billing_transfer->area->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_town" for="x_town" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_town" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->town->caption() ?><?php echo ($pharmacy_billing_transfer->town->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->town->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_town" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_town">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x_town" id="x_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->town->EditValue ?>"<?php echo $pharmacy_billing_transfer->town->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_province" for="x_province" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_province" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->province->caption() ?><?php echo ($pharmacy_billing_transfer->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->province->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_province" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_province">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->province->EditValue ?>"<?php echo $pharmacy_billing_transfer->province->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_postal_code" for="x_postal_code" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->postal_code->caption() ?><?php echo ($pharmacy_billing_transfer->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->postal_code->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_postal_code">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer->postal_code->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_phone_no" for="x_phone_no" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transferadd" type="text/html"><span><?php echo $pharmacy_billing_transfer->phone_no->caption() ?><?php echo ($pharmacy_billing_transfer->phone_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_transfer->phone_no->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transferadd" type="text/html">
<span id="el_pharmacy_billing_transfer_phone_no">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer->phone_no->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_transfer->phone_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_transferadd" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_transferadd" type="text/html">
<div id="ct_pharmacy_billing_transfer_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_transfer_transfer"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_transfer"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
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
		<td>{{include tmpl="#tpc_pharmacy_billing_transfer_pharmacy"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_pharmacy"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_street"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_street"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_area"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_area"/}}</td>		
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_town"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_town"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_province"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_province"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_postal_code"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_postal_code"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_phone_no"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_phone_no"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_Details"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_transfer_Details"/}}</td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_pharmacytransfer", explode(",", $pharmacy_billing_transfer->getCurrentDetailTable())) && $view_pharmacytransfer->DetailAdd) {
?>
<?php if ($pharmacy_billing_transfer->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_pharmacytransfer", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacytransfergrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_billing_transfer_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_billing_transfer_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_transfer_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_transfer->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_billing_transferadd", "tpm_pharmacy_billing_transferadd", "pharmacy_billing_transferadd", "<?php echo $pharmacy_billing_transfer->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_billing_transferadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_billing_transfer_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

$("[data-name='PRC']").hide();
$("[data-name='ORDNO']").hide();
$("[data-name='BRCODE']").hide();
$("[data-name='BillDate']").hide();
$("[data-name='CurStock']").hide();
$("[data-name='PrName']").hide();

function addtotalSum()
{	
	var totSum = 0;
	for (var i = 1; i < 40; i++) {
			try {
				var amount = document.getElementById("x" + i + "_DAMT");
				if (amount.value != '') {
					totSum = parseInt(totSum) + parseInt(amount.value);
				 var SiNo = document.getElementById("x" + i + "_SiNo");
				 SiNo.value = i;
				}
				var RT = document.getElementById("x" + i + "_RT");
				 var SiNo = document.getElementById("x" + i + "_SiNo");
				 SiNo.value = i;
			}
			catch(err) {
			}
	}

		//var BillAmount = document.getElementById("x_Amount");
		//BillAmount.value = totSum;

}
</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_transfer_add->terminate();
?>