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
$pharmacy_po_add = new pharmacy_po_add();

// Run the page
$pharmacy_po_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_po_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_poadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_poadd = currentForm = new ew.Form("fpharmacy_poadd", "add");

	// Validate form
	fpharmacy_poadd.validate = function() {
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
			<?php if ($pharmacy_po_add->ORDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_ORDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->ORDNO->caption(), $pharmacy_po_add->ORDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->DT->caption(), $pharmacy_po_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->YM->caption(), $pharmacy_po_add->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->PC->caption(), $pharmacy_po_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Customercode->Required) { ?>
				elm = this.getElements("x" + infix + "_Customercode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Customercode->caption(), $pharmacy_po_add->Customercode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Customername->caption(), $pharmacy_po_add->Customername->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->pharmacy_pocol->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy_pocol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->pharmacy_pocol->caption(), $pharmacy_po_add->pharmacy_pocol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Address1->Required) { ?>
				elm = this.getElements("x" + infix + "_Address1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Address1->caption(), $pharmacy_po_add->Address1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Address2->Required) { ?>
				elm = this.getElements("x" + infix + "_Address2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Address2->caption(), $pharmacy_po_add->Address2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Address3->Required) { ?>
				elm = this.getElements("x" + infix + "_Address3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Address3->caption(), $pharmacy_po_add->Address3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->State->caption(), $pharmacy_po_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Pincode->Required) { ?>
				elm = this.getElements("x" + infix + "_Pincode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Pincode->caption(), $pharmacy_po_add->Pincode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Phone->Required) { ?>
				elm = this.getElements("x" + infix + "_Phone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Phone->caption(), $pharmacy_po_add->Phone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->Fax->Required) { ?>
				elm = this.getElements("x" + infix + "_Fax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->Fax->caption(), $pharmacy_po_add->Fax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->EEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_EEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->EEmail->caption(), $pharmacy_po_add->EEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->HospID->caption(), $pharmacy_po_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->createdby->caption(), $pharmacy_po_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->createddatetime->caption(), $pharmacy_po_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_po_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_po_add->BRCODE->caption(), $pharmacy_po_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fpharmacy_poadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_poadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_poadd.lists["x_PC"] = <?php echo $pharmacy_po_add->PC->Lookup->toClientList($pharmacy_po_add) ?>;
	fpharmacy_poadd.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_po_add->PC->lookupOptions()) ?>;
	fpharmacy_poadd.lists["x_BRCODE"] = <?php echo $pharmacy_po_add->BRCODE->Lookup->toClientList($pharmacy_po_add) ?>;
	fpharmacy_poadd.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_po_add->BRCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_poadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_po_add->showPageHeader(); ?>
<?php
$pharmacy_po_add->showMessage();
?>
<form name="fpharmacy_poadd" id="fpharmacy_poadd" class="<?php echo $pharmacy_po_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_po_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_po_add->ORDNO->Visible) { // ORDNO ?>
	<div id="r_ORDNO" class="form-group row">
		<label id="elh_pharmacy_po_ORDNO" for="x_ORDNO" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_ORDNO" type="text/html"><?php echo $pharmacy_po_add->ORDNO->caption() ?><?php echo $pharmacy_po_add->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->ORDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_po_ORDNO" type="text/html"><span id="el_pharmacy_po_ORDNO">
<input type="text" data-table="pharmacy_po" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->ORDNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->ORDNO->EditValue ?>"<?php echo $pharmacy_po_add->ORDNO->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->ORDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_po_DT" for="x_DT" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_DT" type="text/html"><?php echo $pharmacy_po_add->DT->caption() ?><?php echo $pharmacy_po_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_po_DT" type="text/html"><span id="el_pharmacy_po_DT">
<input type="text" data-table="pharmacy_po" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->DT->EditValue ?>"<?php echo $pharmacy_po_add->DT->editAttributes() ?>>
<?php if (!$pharmacy_po_add->DT->ReadOnly && !$pharmacy_po_add->DT->Disabled && !isset($pharmacy_po_add->DT->EditAttrs["readonly"]) && !isset($pharmacy_po_add->DT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="pharmacy_poadd_js">
loadjs.ready(["fpharmacy_poadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_poadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $pharmacy_po_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_po_YM" for="x_YM" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_YM" type="text/html"><?php echo $pharmacy_po_add->YM->caption() ?><?php echo $pharmacy_po_add->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_po_YM" type="text/html"><span id="el_pharmacy_po_YM">
<input type="text" data-table="pharmacy_po" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->YM->EditValue ?>"<?php echo $pharmacy_po_add->YM->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_po_PC" for="x_PC" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_PC" type="text/html"><?php echo $pharmacy_po_add->PC->caption() ?><?php echo $pharmacy_po_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_po_PC" type="text/html"><span id="el_pharmacy_po_PC">
<?php $pharmacy_po_add->PC->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo EmptyValue(strval($pharmacy_po_add->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_po_add->PC->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_po_add->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_po_add->PC->ReadOnly || $pharmacy_po_add->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_po_add->PC->Lookup->getParamTag($pharmacy_po_add, "p_x_PC") ?>
<input type="hidden" data-table="pharmacy_po" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_po_add->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $pharmacy_po_add->PC->CurrentValue ?>"<?php echo $pharmacy_po_add->PC->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_pharmacy_po_Customercode" for="x_Customercode" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Customercode" type="text/html"><?php echo $pharmacy_po_add->Customercode->caption() ?><?php echo $pharmacy_po_add->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customercode" type="text/html"><span id="el_pharmacy_po_Customercode">
<input type="text" data-table="pharmacy_po" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Customercode->EditValue ?>"<?php echo $pharmacy_po_add->Customercode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_pharmacy_po_Customername" for="x_Customername" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Customername" type="text/html"><?php echo $pharmacy_po_add->Customername->caption() ?><?php echo $pharmacy_po_add->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customername" type="text/html"><span id="el_pharmacy_po_Customername">
<input type="text" data-table="pharmacy_po" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Customername->EditValue ?>"<?php echo $pharmacy_po_add->Customername->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_pharmacy_po_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_pharmacy_pocol" type="text/html"><?php echo $pharmacy_po_add->pharmacy_pocol->caption() ?><?php echo $pharmacy_po_add->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_po_pharmacy_pocol" type="text/html"><span id="el_pharmacy_po_pharmacy_pocol">
<input type="text" data-table="pharmacy_po" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->pharmacy_pocol->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->pharmacy_pocol->EditValue ?>"<?php echo $pharmacy_po_add->pharmacy_pocol->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_pharmacy_po_Address1" for="x_Address1" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Address1" type="text/html"><?php echo $pharmacy_po_add->Address1->caption() ?><?php echo $pharmacy_po_add->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address1" type="text/html"><span id="el_pharmacy_po_Address1">
<input type="text" data-table="pharmacy_po" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Address1->EditValue ?>"<?php echo $pharmacy_po_add->Address1->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_pharmacy_po_Address2" for="x_Address2" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Address2" type="text/html"><?php echo $pharmacy_po_add->Address2->caption() ?><?php echo $pharmacy_po_add->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address2" type="text/html"><span id="el_pharmacy_po_Address2">
<input type="text" data-table="pharmacy_po" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Address2->EditValue ?>"<?php echo $pharmacy_po_add->Address2->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_pharmacy_po_Address3" for="x_Address3" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Address3" type="text/html"><?php echo $pharmacy_po_add->Address3->caption() ?><?php echo $pharmacy_po_add->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address3" type="text/html"><span id="el_pharmacy_po_Address3">
<input type="text" data-table="pharmacy_po" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Address3->EditValue ?>"<?php echo $pharmacy_po_add->Address3->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_pharmacy_po_State" for="x_State" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_State" type="text/html"><?php echo $pharmacy_po_add->State->caption() ?><?php echo $pharmacy_po_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->State->cellAttributes() ?>>
<script id="tpx_pharmacy_po_State" type="text/html"><span id="el_pharmacy_po_State">
<input type="text" data-table="pharmacy_po" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->State->EditValue ?>"<?php echo $pharmacy_po_add->State->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_pharmacy_po_Pincode" for="x_Pincode" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Pincode" type="text/html"><?php echo $pharmacy_po_add->Pincode->caption() ?><?php echo $pharmacy_po_add->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Pincode" type="text/html"><span id="el_pharmacy_po_Pincode">
<input type="text" data-table="pharmacy_po" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Pincode->EditValue ?>"<?php echo $pharmacy_po_add->Pincode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_pharmacy_po_Phone" for="x_Phone" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Phone" type="text/html"><?php echo $pharmacy_po_add->Phone->caption() ?><?php echo $pharmacy_po_add->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Phone" type="text/html"><span id="el_pharmacy_po_Phone">
<input type="text" data-table="pharmacy_po" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Phone->EditValue ?>"<?php echo $pharmacy_po_add->Phone->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_pharmacy_po_Fax" for="x_Fax" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_Fax" type="text/html"><?php echo $pharmacy_po_add->Fax->caption() ?><?php echo $pharmacy_po_add->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Fax" type="text/html"><span id="el_pharmacy_po_Fax">
<input type="text" data-table="pharmacy_po" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->Fax->EditValue ?>"<?php echo $pharmacy_po_add->Fax->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_pharmacy_po_EEmail" for="x_EEmail" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_EEmail" type="text/html"><?php echo $pharmacy_po_add->EEmail->caption() ?><?php echo $pharmacy_po_add->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_po_EEmail" type="text/html"><span id="el_pharmacy_po_EEmail">
<input type="text" data-table="pharmacy_po" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_po_add->EEmail->getPlaceHolder()) ?>" value="<?php echo $pharmacy_po_add->EEmail->EditValue ?>"<?php echo $pharmacy_po_add->EEmail->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_po_add->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_po_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_po_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_po_add->LeftColumnClass ?>"><script id="tpc_pharmacy_po_BRCODE" type="text/html"><?php echo $pharmacy_po_add->BRCODE->caption() ?><?php echo $pharmacy_po_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_po_add->RightColumnClass ?>"><div <?php echo $pharmacy_po_add->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_po_BRCODE" type="text/html"><span id="el_pharmacy_po_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_po" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_po_add->BRCODE->displayValueSeparatorAttribute() ?>" id="x_BRCODE" name="x_BRCODE"<?php echo $pharmacy_po_add->BRCODE->editAttributes() ?>>
			<?php echo $pharmacy_po_add->BRCODE->selectOptionListHtml("x_BRCODE") ?>
		</select>
</div>
<?php echo $pharmacy_po_add->BRCODE->Lookup->getParamTag($pharmacy_po_add, "p_x_BRCODE") ?>
</span></script>
<?php echo $pharmacy_po_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_poadd" class="ew-custom-template"></div>
<script id="tpm_pharmacy_poadd" type="text/html">
<div id="ct_pharmacy_po_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_po_ORDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_ORDNO")/}}</h3>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_BRCODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_BRCODE")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_PC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_PC")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_DT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_YM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_YM")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customercode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Customercode")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customername"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Customername")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Phone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Phone")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Address1")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Address2")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Address3")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_State")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Pincode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Pincode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Fax"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Fax")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>

<?php
	if (in_array("pharmacy_purchaseorder", explode(",", $pharmacy_po->getCurrentDetailTable())) && $pharmacy_purchaseorder->DetailAdd) {
?>
<?php if ($pharmacy_po->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_purchaseorder", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchaseordergrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_po_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_po_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_po_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_po->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_poadd", "tpm_pharmacy_poadd", "pharmacy_poadd", "<?php echo $pharmacy_po->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_poadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_po_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 35em;
	}
	</style>
	<script>
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_po_add->terminate();
?>