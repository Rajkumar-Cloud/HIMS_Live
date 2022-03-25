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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "update";
var fpharmacy_customersupdate = currentForm = new ew.Form("fpharmacy_customersupdate", "update");

// Validate form
fpharmacy_customersupdate.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Customercode->caption(), $pharmacy_customers->Customercode->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Customercode");
			uelm = this.getElements("u" + infix + "_Customercode");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_customers->Customercode->errorMessage()) ?>");
		<?php if ($pharmacy_customers_update->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername");
			uelm = this.getElements("u" + infix + "_Customername");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Customername->caption(), $pharmacy_customers->Customername->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			uelm = this.getElements("u" + infix + "_Address1");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Address1->caption(), $pharmacy_customers->Address1->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			uelm = this.getElements("u" + infix + "_Address2");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Address2->caption(), $pharmacy_customers->Address2->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			uelm = this.getElements("u" + infix + "_Address3");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Address3->caption(), $pharmacy_customers->Address3->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			uelm = this.getElements("u" + infix + "_State");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->State->caption(), $pharmacy_customers->State->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			uelm = this.getElements("u" + infix + "_Pincode");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Pincode->caption(), $pharmacy_customers->Pincode->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			uelm = this.getElements("u" + infix + "_Phone");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Phone->caption(), $pharmacy_customers->Phone->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			uelm = this.getElements("u" + infix + "_Fax");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Fax->caption(), $pharmacy_customers->Fax->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->_Email->Required) { ?>
			elm = this.getElements("x" + infix + "__Email");
			uelm = this.getElements("u" + infix + "__Email");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->_Email->caption(), $pharmacy_customers->_Email->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Ratetype->Required) { ?>
			elm = this.getElements("x" + infix + "_Ratetype");
			uelm = this.getElements("u" + infix + "_Ratetype");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Ratetype->caption(), $pharmacy_customers->Ratetype->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->Creationdate->Required) { ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			uelm = this.getElements("u" + infix + "_Creationdate");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->Creationdate->caption(), $pharmacy_customers->Creationdate->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			uelm = this.getElements("u" + infix + "_Creationdate");
			if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_customers->Creationdate->errorMessage()) ?>");
		<?php if ($pharmacy_customers_update->ContactPerson->Required) { ?>
			elm = this.getElements("x" + infix + "_ContactPerson");
			uelm = this.getElements("u" + infix + "_ContactPerson");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->ContactPerson->caption(), $pharmacy_customers->ContactPerson->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($pharmacy_customers_update->CPPhone->Required) { ?>
			elm = this.getElements("x" + infix + "_CPPhone");
			uelm = this.getElements("u" + infix + "_CPPhone");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_customers->CPPhone->caption(), $pharmacy_customers->CPPhone->RequiredErrorMessage)) ?>");
			}
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpharmacy_customersupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_customersupdate.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_customers_update->showPageHeader(); ?>
<?php
$pharmacy_customers_update->showMessage();
?>
<form name="fpharmacy_customersupdate" id="fpharmacy_customersupdate" class="<?php echo $pharmacy_customers_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_customers_update->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_customers_update->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_customers_update->IsModal ?>">
<?php foreach ($pharmacy_customers_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_pharmacy_customersupdate" class="ew-update-div"><!-- page -->
	<div class="form-check">
		<input type="checkbox" class="form-check-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="form-check-label" for="u"><?php echo $Language->Phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($pharmacy_customers->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label for="x_Customercode" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Customercode" id="u_Customercode" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Customercode->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Customercode"><?php echo $pharmacy_customers->Customercode->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customercode">
<input type="text" data-table="pharmacy_customers" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_customers->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Customercode->EditValue ?>"<?php echo $pharmacy_customers->Customercode->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label for="x_Customername" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Customername" id="u_Customername" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Customername->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Customername"><?php echo $pharmacy_customers->Customername->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Customername->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customername">
<textarea data-table="pharmacy_customers" data-field="x_Customername" name="x_Customername" id="x_Customername" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_customers->Customername->getPlaceHolder()) ?>"<?php echo $pharmacy_customers->Customername->editAttributes() ?>><?php echo $pharmacy_customers->Customername->EditValue ?></textarea>
</span>
<?php echo $pharmacy_customers->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label for="x_Address1" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Address1" id="u_Address1" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Address1->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Address1"><?php echo $pharmacy_customers->Address1->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Address1->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address1">
<input type="text" data-table="pharmacy_customers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Address1->EditValue ?>"<?php echo $pharmacy_customers->Address1->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label for="x_Address2" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Address2" id="u_Address2" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Address2->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Address2"><?php echo $pharmacy_customers->Address2->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Address2->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address2">
<input type="text" data-table="pharmacy_customers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Address2->EditValue ?>"<?php echo $pharmacy_customers->Address2->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label for="x_Address3" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Address3" id="u_Address3" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Address3->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Address3"><?php echo $pharmacy_customers->Address3->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Address3->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address3">
<input type="text" data-table="pharmacy_customers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_customers->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Address3->EditValue ?>"<?php echo $pharmacy_customers->Address3->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label for="x_State" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_State" id="u_State" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->State->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_State"><?php echo $pharmacy_customers->State->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->State->cellAttributes() ?>>
<span id="el_pharmacy_customers_State">
<input type="text" data-table="pharmacy_customers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->State->EditValue ?>"<?php echo $pharmacy_customers->State->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label for="x_Pincode" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Pincode" id="u_Pincode" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Pincode->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Pincode"><?php echo $pharmacy_customers->Pincode->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Pincode">
<input type="text" data-table="pharmacy_customers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Pincode->EditValue ?>"<?php echo $pharmacy_customers->Pincode->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label for="x_Phone" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Phone" id="u_Phone" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Phone->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Phone"><?php echo $pharmacy_customers->Phone->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Phone->cellAttributes() ?>>
<span id="el_pharmacy_customers_Phone">
<input type="text" data-table="pharmacy_customers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Phone->EditValue ?>"<?php echo $pharmacy_customers->Phone->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label for="x_Fax" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Fax" id="u_Fax" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Fax->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Fax"><?php echo $pharmacy_customers->Fax->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Fax->cellAttributes() ?>>
<span id="el_pharmacy_customers_Fax">
<input type="text" data-table="pharmacy_customers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Fax->EditValue ?>"<?php echo $pharmacy_customers->Fax->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label for="x__Email" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u__Email" id="u__Email" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->_Email->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u__Email"><?php echo $pharmacy_customers->_Email->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->_Email->cellAttributes() ?>>
<span id="el_pharmacy_customers__Email">
<input type="text" data-table="pharmacy_customers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_customers->_Email->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->_Email->EditValue ?>"<?php echo $pharmacy_customers->_Email->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Ratetype->Visible) { // Ratetype ?>
	<div id="r_Ratetype" class="form-group row">
		<label for="x_Ratetype" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Ratetype" id="u_Ratetype" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Ratetype->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Ratetype"><?php echo $pharmacy_customers->Ratetype->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Ratetype->cellAttributes() ?>>
<span id="el_pharmacy_customers_Ratetype">
<input type="text" data-table="pharmacy_customers" data-field="x_Ratetype" name="x_Ratetype" id="x_Ratetype" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_customers->Ratetype->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Ratetype->EditValue ?>"<?php echo $pharmacy_customers->Ratetype->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->Ratetype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->Creationdate->Visible) { // Creationdate ?>
	<div id="r_Creationdate" class="form-group row">
		<label for="x_Creationdate" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Creationdate" id="u_Creationdate" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->Creationdate->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Creationdate"><?php echo $pharmacy_customers->Creationdate->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_customers_Creationdate">
<input type="text" data-table="pharmacy_customers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?php echo HtmlEncode($pharmacy_customers->Creationdate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->Creationdate->EditValue ?>"<?php echo $pharmacy_customers->Creationdate->editAttributes() ?>>
<?php if (!$pharmacy_customers->Creationdate->ReadOnly && !$pharmacy_customers->Creationdate->Disabled && !isset($pharmacy_customers->Creationdate->EditAttrs["readonly"]) && !isset($pharmacy_customers->Creationdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_customersupdate", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_customers->Creationdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->ContactPerson->Visible) { // ContactPerson ?>
	<div id="r_ContactPerson" class="form-group row">
		<label for="x_ContactPerson" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_ContactPerson" id="u_ContactPerson" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->ContactPerson->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_ContactPerson"><?php echo $pharmacy_customers->ContactPerson->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->ContactPerson->cellAttributes() ?>>
<span id="el_pharmacy_customers_ContactPerson">
<input type="text" data-table="pharmacy_customers" data-field="x_ContactPerson" name="x_ContactPerson" id="x_ContactPerson" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_customers->ContactPerson->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->ContactPerson->EditValue ?>"<?php echo $pharmacy_customers->ContactPerson->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->ContactPerson->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_customers->CPPhone->Visible) { // CPPhone ?>
	<div id="r_CPPhone" class="form-group row">
		<label for="x_CPPhone" class="<?php echo $pharmacy_customers_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_CPPhone" id="u_CPPhone" class="form-check-input ew-multi-select" value="1"<?php echo ($pharmacy_customers->CPPhone->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_CPPhone"><?php echo $pharmacy_customers->CPPhone->caption() ?></label></div></label>
		<div class="<?php echo $pharmacy_customers_update->RightColumnClass ?>"><div<?php echo $pharmacy_customers->CPPhone->cellAttributes() ?>>
<span id="el_pharmacy_customers_CPPhone">
<input type="text" data-table="pharmacy_customers" data-field="x_CPPhone" name="x_CPPhone" id="x_CPPhone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_customers->CPPhone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_customers->CPPhone->EditValue ?>"<?php echo $pharmacy_customers->CPPhone->editAttributes() ?>>
</span>
<?php echo $pharmacy_customers->CPPhone->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_customers_update->terminate();
?>