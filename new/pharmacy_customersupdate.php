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
$pharmacy_customers_update = new pharmacy_customers_update();

// Run the page
$pharmacy_customers_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_customers_update->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_customersupdate, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "update";
	fpharmacy_customersupdate = currentForm = new ew.Form("fpharmacy_customersupdate", "update");

	// Validate form
	fpharmacy_customersupdate.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		if (!ew.updateSelected(fobj)) {
			ew.alert(ew.language.phrase("NoFieldSelected"));
			return false;
		}
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($pharmacy_customers_update->Customercode->Required) { ?>
				elm = this.getElements("x" + infix + "_Customercode");
				uelm = this.getElements("u" + infix + "_Customercode");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Customercode->caption(), $pharmacy_customers_update->Customercode->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
				elm = this.getElements("x" + infix + "_Customercode");
				uelm = this.getElements("u" + infix + "_Customercode");
				if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_customers_update->Customercode->errorMessage()) ?>");
			<?php if ($pharmacy_customers_update->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				uelm = this.getElements("u" + infix + "_Customername");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Customername->caption(), $pharmacy_customers_update->Customername->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Address1->Required) { ?>
				elm = this.getElements("x" + infix + "_Address1");
				uelm = this.getElements("u" + infix + "_Address1");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Address1->caption(), $pharmacy_customers_update->Address1->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Address2->Required) { ?>
				elm = this.getElements("x" + infix + "_Address2");
				uelm = this.getElements("u" + infix + "_Address2");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Address2->caption(), $pharmacy_customers_update->Address2->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Address3->Required) { ?>
				elm = this.getElements("x" + infix + "_Address3");
				uelm = this.getElements("u" + infix + "_Address3");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Address3->caption(), $pharmacy_customers_update->Address3->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				uelm = this.getElements("u" + infix + "_State");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->State->caption(), $pharmacy_customers_update->State->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Pincode->Required) { ?>
				elm = this.getElements("x" + infix + "_Pincode");
				uelm = this.getElements("u" + infix + "_Pincode");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Pincode->caption(), $pharmacy_customers_update->Pincode->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Phone->Required) { ?>
				elm = this.getElements("x" + infix + "_Phone");
				uelm = this.getElements("u" + infix + "_Phone");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Phone->caption(), $pharmacy_customers_update->Phone->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Fax->Required) { ?>
				elm = this.getElements("x" + infix + "_Fax");
				uelm = this.getElements("u" + infix + "_Fax");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Fax->caption(), $pharmacy_customers_update->Fax->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->_Email->Required) { ?>
				elm = this.getElements("x" + infix + "__Email");
				uelm = this.getElements("u" + infix + "__Email");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->_Email->caption(), $pharmacy_customers_update->_Email->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Ratetype->Required) { ?>
				elm = this.getElements("x" + infix + "_Ratetype");
				uelm = this.getElements("u" + infix + "_Ratetype");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Ratetype->caption(), $pharmacy_customers_update->Ratetype->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->Creationdate->Required) { ?>
				elm = this.getElements("x" + infix + "_Creationdate");
				uelm = this.getElements("u" + infix + "_Creationdate");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->Creationdate->caption(), $pharmacy_customers_update->Creationdate->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
				elm = this.getElements("x" + infix + "_Creationdate");
				uelm = this.getElements("u" + infix + "_Creationdate");
				if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_customers_update->Creationdate->errorMessage()) ?>");
			<?php if ($pharmacy_customers_update->ContactPerson->Required) { ?>
				elm = this.getElements("x" + infix + "_ContactPerson");
				uelm = this.getElements("u" + infix + "_ContactPerson");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->ContactPerson->caption(), $pharmacy_customers_update->ContactPerson->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($pharmacy_customers_update->CPPhone->Required) { ?>
				elm = this.getElements("x" + infix + "_CPPhone");
				uelm = this.getElements("u" + infix + "_CPPhone");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers_update->CPPhone->caption(), $pharmacy_customers_update->CPPhone->RequiredErrorMessage)) ?>");
				}
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fpharmacy_customersupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_customersupdate.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpharmacy_customersupdate");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_customers_update->showPageHeader(); ?>
<?php
$pharmacy_customers_update->showMessage();
?>
<form name="fpharmacy_customersupdate" id="fpharmacy_customersupdate" class="<?php echo $pharmacy_customers_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_customers_update->IsModal ?>">
<?php foreach ($pharmacy_customers_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_pharmacy_customersupdate" class="ew-update-div"><!-- page -->
	<div class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?php echo $Language->phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($pharmacy_customers_update->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label for="x_Customercode" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Customercode" id="u_Customercode" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Customercode->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Customercode"><?php echo $pharmacy_customers_update->Customercode->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customercode">
<input type="text" data-table="pharmacy_customers" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Customercode->EditValue ?>"<?php echo $pharmacy_customers_update->Customercode->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label for="x_Customername" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Customername" id="u_Customername" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Customername->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Customername"><?php echo $pharmacy_customers_update->Customername->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Customername->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customername">
<textarea data-table="pharmacy_customers" data-field="x_Customername" name="x_Customername" id="x_Customername" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Customername->getPlaceHolder()) ?>"<?php echo $pharmacy_customers_update->Customername->editAttributes() ?>><?php echo $pharmacy_customers_update->Customername->EditValue ?></textarea>
</span>
<?php echo $pharmacy_customers_update->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label for="x_Address1" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Address1" id="u_Address1" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Address1->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Address1"><?php echo $pharmacy_customers_update->Address1->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Address1->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address1">
<input type="text" data-table="pharmacy_customers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Address1->EditValue ?>"<?php echo $pharmacy_customers_update->Address1->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label for="x_Address2" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Address2" id="u_Address2" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Address2->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Address2"><?php echo $pharmacy_customers_update->Address2->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Address2->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address2">
<input type="text" data-table="pharmacy_customers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Address2->EditValue ?>"<?php echo $pharmacy_customers_update->Address2->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label for="x_Address3" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Address3" id="u_Address3" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Address3->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Address3"><?php echo $pharmacy_customers_update->Address3->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Address3->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address3">
<input type="text" data-table="pharmacy_customers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Address3->EditValue ?>"<?php echo $pharmacy_customers_update->Address3->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label for="x_State" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_State" id="u_State" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->State->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_State"><?php echo $pharmacy_customers_update->State->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->State->cellAttributes() ?>>
<span id="el_pharmacy_customers_State">
<input type="text" data-table="pharmacy_customers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->State->EditValue ?>"<?php echo $pharmacy_customers_update->State->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label for="x_Pincode" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Pincode" id="u_Pincode" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Pincode->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Pincode"><?php echo $pharmacy_customers_update->Pincode->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Pincode">
<input type="text" data-table="pharmacy_customers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Pincode->EditValue ?>"<?php echo $pharmacy_customers_update->Pincode->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label for="x_Phone" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Phone" id="u_Phone" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Phone->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Phone"><?php echo $pharmacy_customers_update->Phone->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Phone->cellAttributes() ?>>
<span id="el_pharmacy_customers_Phone">
<input type="text" data-table="pharmacy_customers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Phone->EditValue ?>"<?php echo $pharmacy_customers_update->Phone->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label for="x_Fax" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Fax" id="u_Fax" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Fax->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Fax"><?php echo $pharmacy_customers_update->Fax->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Fax->cellAttributes() ?>>
<span id="el_pharmacy_customers_Fax">
<input type="text" data-table="pharmacy_customers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Fax->EditValue ?>"<?php echo $pharmacy_customers_update->Fax->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label for="x__Email" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u__Email" id="u__Email" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->_Email->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u__Email"><?php echo $pharmacy_customers_update->_Email->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->_Email->cellAttributes() ?>>
<span id="el_pharmacy_customers__Email">
<input type="text" data-table="pharmacy_customers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->_Email->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->_Email->EditValue ?>"<?php echo $pharmacy_customers_update->_Email->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Ratetype->Visible) { // Ratetype ?>
	<div id="r_Ratetype" class="form-group row">
		<label for="x_Ratetype" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Ratetype" id="u_Ratetype" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Ratetype->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Ratetype"><?php echo $pharmacy_customers_update->Ratetype->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Ratetype->cellAttributes() ?>>
<span id="el_pharmacy_customers_Ratetype">
<input type="text" data-table="pharmacy_customers" data-field="x_Ratetype" name="x_Ratetype" id="x_Ratetype" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Ratetype->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Ratetype->EditValue ?>"<?php echo $pharmacy_customers_update->Ratetype->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->Ratetype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->Creationdate->Visible) { // Creationdate ?>
	<div id="r_Creationdate" class="form-group row">
		<label for="x_Creationdate" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Creationdate" id="u_Creationdate" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->Creationdate->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Creationdate"><?php echo $pharmacy_customers_update->Creationdate->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_customers_Creationdate">
<input type="text" data-table="pharmacy_customers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->Creationdate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->Creationdate->EditValue ?>"<?php echo $pharmacy_customers_update->Creationdate->editAttributes() ?>>
<?php if (!$pharmacy_customers_update->Creationdate->ReadOnly && !$pharmacy_customers_update->Creationdate->Disabled && !isset($pharmacy_customers_update->Creationdate->EditAttrs["readonly"]) && !isset($pharmacy_customers_update->Creationdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_customersupdate", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_customersupdate", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_customers_update->Creationdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->ContactPerson->Visible) { // ContactPerson ?>
	<div id="r_ContactPerson" class="form-group row">
		<label for="x_ContactPerson" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_ContactPerson" id="u_ContactPerson" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->ContactPerson->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_ContactPerson"><?php echo $pharmacy_customers_update->ContactPerson->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->ContactPerson->cellAttributes() ?>>
<span id="el_pharmacy_customers_ContactPerson">
<input type="text" data-table="pharmacy_customers" data-field="x_ContactPerson" name="x_ContactPerson" id="x_ContactPerson" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->ContactPerson->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->ContactPerson->EditValue ?>"<?php echo $pharmacy_customers_update->ContactPerson->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->ContactPerson->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers_update->CPPhone->Visible) { // CPPhone ?>
	<div id="r_CPPhone" class="form-group row">
		<label for="x_CPPhone" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_CPPhone" id="u_CPPhone" class="custom-control-input ew-multi-select" value="1"<?php echo $pharmacy_customers_update->CPPhone->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_CPPhone"><?php echo $pharmacy_customers_update->CPPhone->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div <?php echo $pharmacy_customers_update->CPPhone->cellAttributes() ?>>
<span id="el_pharmacy_customers_CPPhone">
<input type="text" data-table="pharmacy_customers" data-field="x_CPPhone" name="x_CPPhone" id="x_CPPhone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers_update->CPPhone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers_update->CPPhone->EditValue ?>"<?php echo $pharmacy_customers_update->CPPhone->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers_update->CPPhone->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$pharmacy_customers_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $pharmacy_customers_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_customers_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_customers_update->showPageFooter();
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
$pharmacy_customers_update->terminate();
?>