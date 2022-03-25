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
$pharmacy_customers_add = new pharmacy_customers_add();

// Run the page
$pharmacy_customers_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_customers_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_customersadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_customersadd = currentForm = new ew.Form("fpharmacy_customersadd", "add");

	// Validate form
	fpharmacy_customersadd.validate = function() {
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
			<?php if ($pharmacy_customers_add->Customercode->Required) { ?>
				elm = this.getElements("x" + infix + "_Customercode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Customercode->caption(), $pharmacy_customers_add->Customercode->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Customercode");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_customers_add->Customercode->errorMessage()) ?>");
			<?php if ($pharmacy_customers_add->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Customername->caption(), $pharmacy_customers_add->Customername->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Address1->Required) { ?>
				elm = this.getElements("x" + infix + "_Address1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Address1->caption(), $pharmacy_customers_add->Address1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Address2->Required) { ?>
				elm = this.getElements("x" + infix + "_Address2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Address2->caption(), $pharmacy_customers_add->Address2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Address3->Required) { ?>
				elm = this.getElements("x" + infix + "_Address3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Address3->caption(), $pharmacy_customers_add->Address3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->State->caption(), $pharmacy_customers_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Pincode->Required) { ?>
				elm = this.getElements("x" + infix + "_Pincode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Pincode->caption(), $pharmacy_customers_add->Pincode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Phone->Required) { ?>
				elm = this.getElements("x" + infix + "_Phone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Phone->caption(), $pharmacy_customers_add->Phone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Fax->Required) { ?>
				elm = this.getElements("x" + infix + "_Fax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Fax->caption(), $pharmacy_customers_add->Fax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->_Email->Required) { ?>
				elm = this.getElements("x" + infix + "__Email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->_Email->caption(), $pharmacy_customers_add->_Email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Ratetype->Required) { ?>
				elm = this.getElements("x" + infix + "_Ratetype");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Ratetype->caption(), $pharmacy_customers_add->Ratetype->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->Creationdate->Required) { ?>
				elm = this.getElements("x" + infix + "_Creationdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->Creationdate->caption(), $pharmacy_customers_add->Creationdate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Creationdate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_customers_add->Creationdate->errorMessage()) ?>");
			<?php if ($pharmacy_customers_add->ContactPerson->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactPerson");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->ContactPerson->caption(), $pharmacy_customers_add->ContactPerson->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_customers_add->CPPhone->Required) { ?>
				elm = this.getElements("x" + infix + "_CPPhone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_add->CPPhone->caption(), $pharmacy_customers_add->CPPhone->RequiredErrorMessage)) ?>");
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
	fpharmacy_customersadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_customersadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_customersadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_customers_add->showPageHeader(); ?>
<?php
$pharmacy_customers_add->showMessage();
?>
<form name="fpharmacy_customersadd" id="fpharmacy_customersadd" class="<?php echo $pharmacy_customers_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_customers_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pharmacy_customers_add->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_pharmacy_customers_Customercode" for="x_Customercode" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Customercode->caption() ?><?php echo $pharmacy_customers_add->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customercode">
<input type="text" data-table="pharmacy_customers" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Customercode->EditValue ?>"<?php echo $pharmacy_customers_add->Customercode->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_pharmacy_customers_Customername" for="x_Customername" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Customername->caption() ?><?php echo $pharmacy_customers_add->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Customername->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customername">
<textarea data-table="pharmacy_customers" data-field="x_Customername" name="x_Customername" id="x_Customername" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Customername->getPlaceHolder()) ?>"<?php echo $pharmacy_customers_add->Customername->editAttributes() ?>><?php echo $pharmacy_customers_add->Customername->EditValue ?></textarea>
</span>
<?php echo $pharmacy_customers_add->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_pharmacy_customers_Address1" for="x_Address1" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Address1->caption() ?><?php echo $pharmacy_customers_add->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Address1->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address1">
<input type="text" data-table="pharmacy_customers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Address1->EditValue ?>"<?php echo $pharmacy_customers_add->Address1->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_pharmacy_customers_Address2" for="x_Address2" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Address2->caption() ?><?php echo $pharmacy_customers_add->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Address2->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address2">
<input type="text" data-table="pharmacy_customers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Address2->EditValue ?>"<?php echo $pharmacy_customers_add->Address2->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_pharmacy_customers_Address3" for="x_Address3" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Address3->caption() ?><?php echo $pharmacy_customers_add->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Address3->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address3">
<input type="text" data-table="pharmacy_customers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Address3->EditValue ?>"<?php echo $pharmacy_customers_add->Address3->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_pharmacy_customers_State" for="x_State" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->State->caption() ?><?php echo $pharmacy_customers_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->State->cellAttributes() ?>>
<span id="el_pharmacy_customers_State">
<input type="text" data-table="pharmacy_customers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->State->EditValue ?>"<?php echo $pharmacy_customers_add->State->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_pharmacy_customers_Pincode" for="x_Pincode" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Pincode->caption() ?><?php echo $pharmacy_customers_add->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Pincode">
<input type="text" data-table="pharmacy_customers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Pincode->EditValue ?>"<?php echo $pharmacy_customers_add->Pincode->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_pharmacy_customers_Phone" for="x_Phone" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Phone->caption() ?><?php echo $pharmacy_customers_add->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Phone->cellAttributes() ?>>
<span id="el_pharmacy_customers_Phone">
<input type="text" data-table="pharmacy_customers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Phone->EditValue ?>"<?php echo $pharmacy_customers_add->Phone->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_pharmacy_customers_Fax" for="x_Fax" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Fax->caption() ?><?php echo $pharmacy_customers_add->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Fax->cellAttributes() ?>>
<span id="el_pharmacy_customers_Fax">
<input type="text" data-table="pharmacy_customers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Fax->EditValue ?>"<?php echo $pharmacy_customers_add->Fax->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_pharmacy_customers__Email" for="x__Email" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->_Email->caption() ?><?php echo $pharmacy_customers_add->_Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->_Email->cellAttributes() ?>>
<span id="el_pharmacy_customers__Email">
<input type="text" data-table="pharmacy_customers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->_Email->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->_Email->EditValue ?>"<?php echo $pharmacy_customers_add->_Email->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Ratetype->Visible) { // Ratetype ?>
	<div id="r_Ratetype" class="form-group row">
		<label id="elh_pharmacy_customers_Ratetype" for="x_Ratetype" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Ratetype->caption() ?><?php echo $pharmacy_customers_add->Ratetype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Ratetype->cellAttributes() ?>>
<span id="el_pharmacy_customers_Ratetype">
<input type="text" data-table="pharmacy_customers" data-field="x_Ratetype" name="x_Ratetype" id="x_Ratetype" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Ratetype->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Ratetype->EditValue ?>"<?php echo $pharmacy_customers_add->Ratetype->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->Ratetype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->Creationdate->Visible) { // Creationdate ?>
	<div id="r_Creationdate" class="form-group row">
		<label id="elh_pharmacy_customers_Creationdate" for="x_Creationdate" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->Creationdate->caption() ?><?php echo $pharmacy_customers_add->Creationdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_customers_Creationdate">
<input type="text" data-table="pharmacy_customers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->Creationdate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->Creationdate->EditValue ?>"<?php echo $pharmacy_customers_add->Creationdate->editAttributes() ?>>
<?php if (!$pharmacy_customers_add->Creationdate->ReadOnly && !$pharmacy_customers_add->Creationdate->Disabled && !isset($pharmacy_customers_add->Creationdate->EditAttrs["readonly"]) && !isset($pharmacy_customers_add->Creationdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_customersadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_customersadd", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_customers_add->Creationdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->ContactPerson->Visible) { // ContactPerson ?>
	<div id="r_ContactPerson" class="form-group row">
		<label id="elh_pharmacy_customers_ContactPerson" for="x_ContactPerson" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->ContactPerson->caption() ?><?php echo $pharmacy_customers_add->ContactPerson->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->ContactPerson->cellAttributes() ?>>
<span id="el_pharmacy_customers_ContactPerson">
<input type="text" data-table="pharmacy_customers" data-field="x_ContactPerson" name="x_ContactPerson" id="x_ContactPerson" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->ContactPerson->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->ContactPerson->EditValue ?>"<?php echo $pharmacy_customers_add->ContactPerson->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->ContactPerson->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_add->CPPhone->Visible) { // CPPhone ?>
	<div id="r_CPPhone" class="form-group row">
		<label id="elh_pharmacy_customers_CPPhone" for="x_CPPhone" class="<?php echo $pharmacy_customers_add->LeftColumnClass ?>"><?php echo $pharmacy_customers_add->CPPhone->caption() ?><?php echo $pharmacy_customers_add->CPPhone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_customers_add->RightColumnClass ?>"><div <?php echo $pharmacy_customers_add->CPPhone->cellAttributes() ?>>
<span id="el_pharmacy_customers_CPPhone">
<input type="text" data-table="pharmacy_customers" data-field="x_CPPhone" name="x_CPPhone" id="x_CPPhone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers_add->CPPhone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_add->CPPhone->EditValue ?>"<?php echo $pharmacy_customers_add->CPPhone->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_add->CPPhone->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_customers_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_customers_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_customers_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_customers_add->showPageFooter();
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
$pharmacy_customers_add->terminate();
?>