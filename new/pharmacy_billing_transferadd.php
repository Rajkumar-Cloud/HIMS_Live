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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_billing_transferadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_billing_transferadd = currentForm = new ew.Form("fpharmacy_billing_transferadd", "add");

	// Validate form
	fpharmacy_billing_transferadd.validate = function() {
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
			<?php if ($pharmacy_billing_transfer_add->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->PharID->caption(), $pharmacy_billing_transfer_add->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->pharmacy->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->pharmacy->caption(), $pharmacy_billing_transfer_add->pharmacy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->Details->caption(), $pharmacy_billing_transfer_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->createdby->caption(), $pharmacy_billing_transfer_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->createddatetime->caption(), $pharmacy_billing_transfer_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->HospID->caption(), $pharmacy_billing_transfer_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->RIDNO->caption(), $pharmacy_billing_transfer_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer_add->RIDNO->errorMessage()) ?>");
			<?php if ($pharmacy_billing_transfer_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->TidNo->caption(), $pharmacy_billing_transfer_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer_add->TidNo->errorMessage()) ?>");
			<?php if ($pharmacy_billing_transfer_add->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->CId->caption(), $pharmacy_billing_transfer_add->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer_add->CId->errorMessage()) ?>");
			<?php if ($pharmacy_billing_transfer_add->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->PatId->caption(), $pharmacy_billing_transfer_add->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer_add->PatId->errorMessage()) ?>");
			<?php if ($pharmacy_billing_transfer_add->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->DrID->caption(), $pharmacy_billing_transfer_add->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer_add->DrID->errorMessage()) ?>");
			<?php if ($pharmacy_billing_transfer_add->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->BillStatus->caption(), $pharmacy_billing_transfer_add->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_transfer_add->BillStatus->errorMessage()) ?>");
			<?php if ($pharmacy_billing_transfer_add->transfer->Required) { ?>
				elm = this.getElements("x" + infix + "_transfer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->transfer->caption(), $pharmacy_billing_transfer_add->transfer->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->street->caption(), $pharmacy_billing_transfer_add->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->area->Required) { ?>
				elm = this.getElements("x" + infix + "_area");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->area->caption(), $pharmacy_billing_transfer_add->area->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->town->caption(), $pharmacy_billing_transfer_add->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->province->caption(), $pharmacy_billing_transfer_add->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->postal_code->caption(), $pharmacy_billing_transfer_add->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_billing_transfer_add->phone_no->Required) { ?>
				elm = this.getElements("x" + infix + "_phone_no");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_transfer_add->phone_no->caption(), $pharmacy_billing_transfer_add->phone_no->RequiredErrorMessage)) ?>");
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
	fpharmacy_billing_transferadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_billing_transferadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_billing_transferadd.lists["x_PharID"] = <?php echo $pharmacy_billing_transfer_add->PharID->Lookup->toClientList($pharmacy_billing_transfer_add) ?>;
	fpharmacy_billing_transferadd.lists["x_PharID"].options = <?php echo JsonEncode($pharmacy_billing_transfer_add->PharID->lookupOptions()) ?>;
	fpharmacy_billing_transferadd.autoSuggests["x_PharID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_billing_transferadd.lists["x_transfer"] = <?php echo $pharmacy_billing_transfer_add->transfer->Lookup->toClientList($pharmacy_billing_transfer_add) ?>;
	fpharmacy_billing_transferadd.lists["x_transfer"].options = <?php echo JsonEncode($pharmacy_billing_transfer_add->transfer->lookupOptions()) ?>;
	loadjs.done("fpharmacy_billing_transferadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_billing_transfer_add->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_add->showMessage();
?>
<form name="fpharmacy_billing_transferadd" id="fpharmacy_billing_transferadd" class="<?php echo $pharmacy_billing_transfer_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_transfer_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_transfer_add->pharmacy->Visible) { // pharmacy ?>
	<div id="r_pharmacy" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_pharmacy" for="x_pharmacy" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_pharmacy" type="text/html"><?php echo $pharmacy_billing_transfer_add->pharmacy->caption() ?><?php echo $pharmacy_billing_transfer_add->pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->pharmacy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_pharmacy" type="text/html"><span id="el_pharmacy_billing_transfer_pharmacy">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->pharmacy->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->pharmacy->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->pharmacy->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->pharmacy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_Details" for="x_Details" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_Details" type="text/html"><?php echo $pharmacy_billing_transfer_add->Details->caption() ?><?php echo $pharmacy_billing_transfer_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_Details" type="text/html"><span id="el_pharmacy_billing_transfer_Details">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->Details->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->Details->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_RIDNO" type="text/html"><?php echo $pharmacy_billing_transfer_add->RIDNO->caption() ?><?php echo $pharmacy_billing_transfer_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_RIDNO" type="text/html"><span id="el_pharmacy_billing_transfer_RIDNO">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->RIDNO->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->RIDNO->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_TidNo" type="text/html"><?php echo $pharmacy_billing_transfer_add->TidNo->caption() ?><?php echo $pharmacy_billing_transfer_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_TidNo" type="text/html"><span id="el_pharmacy_billing_transfer_TidNo">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->TidNo->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_CId" for="x_CId" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_CId" type="text/html"><?php echo $pharmacy_billing_transfer_add->CId->caption() ?><?php echo $pharmacy_billing_transfer_add->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_CId" type="text/html"><span id="el_pharmacy_billing_transfer_CId">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->CId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->CId->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->CId->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_PatId" type="text/html"><?php echo $pharmacy_billing_transfer_add->PatId->caption() ?><?php echo $pharmacy_billing_transfer_add->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_PatId" type="text/html"><span id="el_pharmacy_billing_transfer_PatId">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->PatId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->PatId->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->PatId->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_DrID" type="text/html"><?php echo $pharmacy_billing_transfer_add->DrID->caption() ?><?php echo $pharmacy_billing_transfer_add->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_DrID" type="text/html"><span id="el_pharmacy_billing_transfer_DrID">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->DrID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->DrID->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->DrID->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_BillStatus" type="text/html"><?php echo $pharmacy_billing_transfer_add->BillStatus->caption() ?><?php echo $pharmacy_billing_transfer_add->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_BillStatus" type="text/html"><span id="el_pharmacy_billing_transfer_BillStatus">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->BillStatus->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->transfer->Visible) { // transfer ?>
	<div id="r_transfer" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_transfer" for="x_transfer" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_transfer" type="text/html"><?php echo $pharmacy_billing_transfer_add->transfer->caption() ?><?php echo $pharmacy_billing_transfer_add->transfer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->transfer->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_transfer" type="text/html"><span id="el_pharmacy_billing_transfer_transfer">
<?php $pharmacy_billing_transfer_add->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_transfer" data-field="x_transfer" data-value-separator="<?php echo $pharmacy_billing_transfer_add->transfer->displayValueSeparatorAttribute() ?>" id="x_transfer" name="x_transfer"<?php echo $pharmacy_billing_transfer_add->transfer->editAttributes() ?>>
			<?php echo $pharmacy_billing_transfer_add->transfer->selectOptionListHtml("x_transfer") ?>
		</select>
</div>
<?php echo $pharmacy_billing_transfer_add->transfer->Lookup->getParamTag($pharmacy_billing_transfer_add, "p_x_transfer") ?>
</span></script>
<?php echo $pharmacy_billing_transfer_add->transfer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_street" for="x_street" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_street" type="text/html"><?php echo $pharmacy_billing_transfer_add->street->caption() ?><?php echo $pharmacy_billing_transfer_add->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->street->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_street" type="text/html"><span id="el_pharmacy_billing_transfer_street">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->street->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->street->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->street->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->area->Visible) { // area ?>
	<div id="r_area" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_area" for="x_area" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_area" type="text/html"><?php echo $pharmacy_billing_transfer_add->area->caption() ?><?php echo $pharmacy_billing_transfer_add->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->area->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_area" type="text/html"><span id="el_pharmacy_billing_transfer_area">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->area->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->area->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->area->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->area->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_town" for="x_town" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_town" type="text/html"><?php echo $pharmacy_billing_transfer_add->town->caption() ?><?php echo $pharmacy_billing_transfer_add->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->town->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_town" type="text/html"><span id="el_pharmacy_billing_transfer_town">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_town" name="x_town" id="x_town" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->town->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->town->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->town->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_province" for="x_province" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_province" type="text/html"><?php echo $pharmacy_billing_transfer_add->province->caption() ?><?php echo $pharmacy_billing_transfer_add->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->province->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_province" type="text/html"><span id="el_pharmacy_billing_transfer_province">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->province->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->province->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->province->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_postal_code" for="x_postal_code" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_postal_code" type="text/html"><?php echo $pharmacy_billing_transfer_add->postal_code->caption() ?><?php echo $pharmacy_billing_transfer_add->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->postal_code->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_postal_code" type="text/html"><span id="el_pharmacy_billing_transfer_postal_code">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->postal_code->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->postal_code->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->postal_code->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_transfer_add->phone_no->Visible) { // phone_no ?>
	<div id="r_phone_no" class="form-group row">
		<label id="elh_pharmacy_billing_transfer_phone_no" for="x_phone_no" class="<?php echo $pharmacy_billing_transfer_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_transfer_phone_no" type="text/html"><?php echo $pharmacy_billing_transfer_add->phone_no->caption() ?><?php echo $pharmacy_billing_transfer_add->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_billing_transfer_add->RightColumnClass ?>"><div <?php echo $pharmacy_billing_transfer_add->phone_no->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_phone_no" type="text/html"><span id="el_pharmacy_billing_transfer_phone_no">
<input type="text" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_transfer_add->phone_no->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_transfer_add->phone_no->EditValue ?>"<?php echo $pharmacy_billing_transfer_add->phone_no->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_billing_transfer_add->phone_no->CustomMsg ?></div></div>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_transfer_transfer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_transfer")/}}</h3>
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
		<td>{{include tmpl="#tpc_pharmacy_billing_transfer_pharmacy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_pharmacy")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_street"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_street")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_area"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_area")/}}</td>		
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_town"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_town")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_province"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_province")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_postal_code"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_postal_code")/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_phone_no"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_phone_no")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_transfer_Details"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_billing_transfer_Details")/}}</td>
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
<?php if ($pharmacy_billing_transfer->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacytransfer", "TblCaption") ?></h4>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_transfer->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_billing_transferadd", "tpm_pharmacy_billing_transferadd", "pharmacy_billing_transferadd", "<?php echo $pharmacy_billing_transfer->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_billing_transferadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_billing_transfer_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function addtotalSum(){for(var e=0,a=1;a<40;a++)try{var t=document.getElementById("x"+a+"_DAMT");if(""!=t.value)e=parseInt(e)+parseInt(t.value),document.getElementById("x"+a+"_SiNo").value=a;document.getElementById("x"+a+"_RT");document.getElementById("x"+a+"_SiNo").value=a}catch(e){}}$("[data-name='PRC']").hide(),$("[data-name='ORDNO']").hide(),$("[data-name='BRCODE']").hide(),$("[data-name='BillDate']").hide(),$("[data-name='CurStock']").hide(),$("[data-name='PrName']").hide();
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_billing_transfer_add->terminate();
?>