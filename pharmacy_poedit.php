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
$pharmacy_po_edit = new pharmacy_po_edit();

// Run the page
$pharmacy_po_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_po_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_poedit = currentForm = new ew.Form("fpharmacy_poedit", "edit");

// Validate form
fpharmacy_poedit.validate = function() {
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
		<?php if ($pharmacy_po_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->id->caption(), $pharmacy_po->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->ORDNO->caption(), $pharmacy_po->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->DT->caption(), $pharmacy_po->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->YM->caption(), $pharmacy_po->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->PC->caption(), $pharmacy_po->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Customercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Customercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Customercode->caption(), $pharmacy_po->Customercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Customername->caption(), $pharmacy_po->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->pharmacy_pocol->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy_pocol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->pharmacy_pocol->caption(), $pharmacy_po->pharmacy_pocol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Address1->caption(), $pharmacy_po->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Address2->caption(), $pharmacy_po->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Address3->caption(), $pharmacy_po->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->State->caption(), $pharmacy_po->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Pincode->caption(), $pharmacy_po->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Phone->caption(), $pharmacy_po->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->Fax->caption(), $pharmacy_po->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->EEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_EEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->EEmail->caption(), $pharmacy_po->EEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->HospID->caption(), $pharmacy_po->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->modifiedby->caption(), $pharmacy_po->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->modifieddatetime->caption(), $pharmacy_po->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_po_edit->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po->BRCODE->caption(), $pharmacy_po->BRCODE->RequiredErrorMessage)) ?>");
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
fpharmacy_poedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_poedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_poedit.lists["x_PC"] = <?php echo $pharmacy_po_edit->PC->Lookup->toClientList() ?>;
fpharmacy_poedit.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_po_edit->PC->lookupOptions()) ?>;
fpharmacy_poedit.lists["x_BRCODE"] = <?php echo $pharmacy_po_edit->BRCODE->Lookup->toClientList() ?>;
fpharmacy_poedit.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_po_edit->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_po_edit->showPageHeader(); ?>
<?php
$pharmacy_po_edit->showMessage();
?>
<form name="fpharmacy_poedit" id="fpharmacy_poedit" class="<?php echo $pharmacy_po_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_po_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_po_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_po_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($pharmacy_po->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_po_id" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_id" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->id->caption() ?><?php echo ($pharmacy_po->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->id->cellAttributes() ?>>
<script id="tpx_pharmacy_po_id" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_id">
<span<?php echo $pharmacy_po->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_po->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="pharmacy_po" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_po->id->CurrentValue) ?>">
<?php echo $pharmacy_po->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_pharmacy_po_ORDNO" for="x_ORDNO" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_ORDNO" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->ORDNO->caption() ?><?php echo ($pharmacy_po->ORDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->ORDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_po_ORDNO" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_po->ORDNO->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="pharmacy_po" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" value="<?php echo HtmlEncode($pharmacy_po->ORDNO->CurrentValue) ?>">
<?php echo $pharmacy_po->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_po_DT" for="x_DT" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_DT" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->DT->caption() ?><?php echo ($pharmacy_po->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_po_DT" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_DT">
<input type="text" data-table="pharmacy_po" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->DT->EditValue ?>"<?php echo $pharmacy_po->DT->editAttributes() ?>>
<?php if (!$pharmacy_po->DT->ReadOnly && !$pharmacy_po->DT->Disabled && !isset($pharmacy_po->DT->EditAttrs["readonly"]) && !isset($pharmacy_po->DT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="pharmacy_poedit_js">
ew.createDateTimePicker("fpharmacy_poedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $pharmacy_po->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_po_YM" for="x_YM" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_YM" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->YM->caption() ?><?php echo ($pharmacy_po->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_po_YM" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_YM">
<input type="text" data-table="pharmacy_po" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->YM->EditValue ?>"<?php echo $pharmacy_po->YM->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_po_PC" for="x_PC" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_PC" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->PC->caption() ?><?php echo ($pharmacy_po->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_po_PC" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_PC">
<?php $pharmacy_po->PC->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_po->PC->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo strval($pharmacy_po->PC->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_po->PC->ViewValue) : $pharmacy_po->PC->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_po->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_po->PC->ReadOnly || $pharmacy_po->PC->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_po->PC->Lookup->getParamTag("p_x_PC") ?>
<input type="hidden" data-table="pharmacy_po" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_po->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $pharmacy_po->PC->CurrentValue ?>"<?php echo $pharmacy_po->PC->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_pharmacy_po_Customercode" for="x_Customercode" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Customercode" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Customercode->caption() ?><?php echo ($pharmacy_po->Customercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customercode" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Customercode">
<input type="text" data-table="pharmacy_po" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Customercode->EditValue ?>"<?php echo $pharmacy_po->Customercode->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_pharmacy_po_Customername" for="x_Customername" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Customername" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Customername->caption() ?><?php echo ($pharmacy_po->Customername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customername" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Customername">
<input type="text" data-table="pharmacy_po" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Customername->EditValue ?>"<?php echo $pharmacy_po->Customername->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_pharmacy_po_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_pharmacy_pocol" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->pharmacy_pocol->caption() ?><?php echo ($pharmacy_po->pharmacy_pocol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_po_pharmacy_pocol" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_pharmacy_pocol">
<input type="text" data-table="pharmacy_po" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->pharmacy_pocol->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->pharmacy_pocol->EditValue ?>"<?php echo $pharmacy_po->pharmacy_pocol->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_pharmacy_po_Address1" for="x_Address1" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Address1" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Address1->caption() ?><?php echo ($pharmacy_po->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address1" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Address1">
<input type="text" data-table="pharmacy_po" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Address1->EditValue ?>"<?php echo $pharmacy_po->Address1->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_pharmacy_po_Address2" for="x_Address2" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Address2" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Address2->caption() ?><?php echo ($pharmacy_po->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address2" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Address2">
<input type="text" data-table="pharmacy_po" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Address2->EditValue ?>"<?php echo $pharmacy_po->Address2->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_pharmacy_po_Address3" for="x_Address3" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Address3" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Address3->caption() ?><?php echo ($pharmacy_po->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address3" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Address3">
<input type="text" data-table="pharmacy_po" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Address3->EditValue ?>"<?php echo $pharmacy_po->Address3->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_pharmacy_po_State" for="x_State" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_State" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->State->caption() ?><?php echo ($pharmacy_po->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->State->cellAttributes() ?>>
<script id="tpx_pharmacy_po_State" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_State">
<input type="text" data-table="pharmacy_po" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->State->EditValue ?>"<?php echo $pharmacy_po->State->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_pharmacy_po_Pincode" for="x_Pincode" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Pincode" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Pincode->caption() ?><?php echo ($pharmacy_po->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Pincode" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Pincode">
<input type="text" data-table="pharmacy_po" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Pincode->EditValue ?>"<?php echo $pharmacy_po->Pincode->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_pharmacy_po_Phone" for="x_Phone" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Phone" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Phone->caption() ?><?php echo ($pharmacy_po->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Phone" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Phone">
<input type="text" data-table="pharmacy_po" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Phone->EditValue ?>"<?php echo $pharmacy_po->Phone->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_pharmacy_po_Fax" for="x_Fax" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Fax" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->Fax->caption() ?><?php echo ($pharmacy_po->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Fax" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_Fax">
<input type="text" data-table="pharmacy_po" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->Fax->EditValue ?>"<?php echo $pharmacy_po->Fax->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_pharmacy_po_EEmail" for="x_EEmail" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_EEmail" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->EEmail->caption() ?><?php echo ($pharmacy_po->EEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_po_EEmail" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_EEmail">
<input type="text" data-table="pharmacy_po" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po->EEmail->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po->EEmail->EditValue ?>"<?php echo $pharmacy_po->EEmail->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_po->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_po_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_po_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_po_BRCODE" class="pharmacy_poedit" type="text/html"><span><?php echo $pharmacy_po->BRCODE->caption() ?><?php echo ($pharmacy_po->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_po_edit->RightColumnClass ?>"><div<?php echo $pharmacy_po->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_po_BRCODE" class="pharmacy_poedit" type="text/html">
<span id="el_pharmacy_po_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_po" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_po->BRCODE->displayValueSeparatorAttribute() ?>" id="x_BRCODE" name="x_BRCODE"<?php echo $pharmacy_po->BRCODE->editAttributes() ?>>
		<?php echo $pharmacy_po->BRCODE->selectOptionListHtml("x_BRCODE") ?>
	</select>
</div>
<?php echo $pharmacy_po->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
</script>
<?php echo $pharmacy_po->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_poedit" class="ew-custom-template"></div>
<script id="tpm_pharmacy_poedit" type="text/html">
<div id="ct_pharmacy_po_edit"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_po_ORDNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_ORDNO"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_BRCODE"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_BRCODE"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_PC"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_DT"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_YM"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_YM"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customercode"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customername"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Phone"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Phone"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address1"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address2"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Address2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address3"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_State"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Pincode"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Fax"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Fax"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<?php
	if (in_array("pharmacy_purchaseorder", explode(",", $pharmacy_po->getCurrentDetailTable())) && $pharmacy_purchaseorder->DetailEdit) {
?>
<?php if ($pharmacy_po->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_purchaseorder", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchaseordergrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_po_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_po_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_po_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_po->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_poedit", "tpm_pharmacy_poedit", "pharmacy_poedit", "<?php echo $pharmacy_po->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_poedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_po_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_po_edit->terminate();
?>