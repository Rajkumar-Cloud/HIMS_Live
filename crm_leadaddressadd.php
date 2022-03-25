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
$crm_leadaddress_add = new crm_leadaddress_add();

// Run the page
$crm_leadaddress_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadaddress_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcrm_leadaddressadd = currentForm = new ew.Form("fcrm_leadaddressadd", "add");

// Validate form
fcrm_leadaddressadd.validate = function() {
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
		<?php if ($crm_leadaddress_add->leadaddressid->Required) { ?>
			elm = this.getElements("x" + infix + "_leadaddressid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->leadaddressid->caption(), $crm_leadaddress->leadaddressid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leadaddressid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leadaddress->leadaddressid->errorMessage()) ?>");
		<?php if ($crm_leadaddress_add->phone->Required) { ?>
			elm = this.getElements("x" + infix + "_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->phone->caption(), $crm_leadaddress->phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->mobile->caption(), $crm_leadaddress->mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->fax->Required) { ?>
			elm = this.getElements("x" + infix + "_fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->fax->caption(), $crm_leadaddress->fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel1a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel1a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel1a->caption(), $crm_leadaddress->addresslevel1a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel2a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel2a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel2a->caption(), $crm_leadaddress->addresslevel2a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel3a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel3a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel3a->caption(), $crm_leadaddress->addresslevel3a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel4a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel4a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel4a->caption(), $crm_leadaddress->addresslevel4a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel5a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel5a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel5a->caption(), $crm_leadaddress->addresslevel5a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel6a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel6a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel6a->caption(), $crm_leadaddress->addresslevel6a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel7a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel7a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel7a->caption(), $crm_leadaddress->addresslevel7a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->addresslevel8a->Required) { ?>
			elm = this.getElements("x" + infix + "_addresslevel8a");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->addresslevel8a->caption(), $crm_leadaddress->addresslevel8a->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->buildingnumbera->Required) { ?>
			elm = this.getElements("x" + infix + "_buildingnumbera");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->buildingnumbera->caption(), $crm_leadaddress->buildingnumbera->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->localnumbera->Required) { ?>
			elm = this.getElements("x" + infix + "_localnumbera");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->localnumbera->caption(), $crm_leadaddress->localnumbera->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->poboxa->Required) { ?>
			elm = this.getElements("x" + infix + "_poboxa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->poboxa->caption(), $crm_leadaddress->poboxa->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->phone_extra->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->phone_extra->caption(), $crm_leadaddress->phone_extra->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->mobile_extra->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->mobile_extra->caption(), $crm_leadaddress->mobile_extra->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadaddress_add->fax_extra->Required) { ?>
			elm = this.getElements("x" + infix + "_fax_extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadaddress->fax_extra->caption(), $crm_leadaddress->fax_extra->RequiredErrorMessage)) ?>");
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
fcrm_leadaddressadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadaddressadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadaddress_add->showPageHeader(); ?>
<?php
$crm_leadaddress_add->showMessage();
?>
<form name="fcrm_leadaddressadd" id="fcrm_leadaddressadd" class="<?php echo $crm_leadaddress_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadaddress_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadaddress_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadaddress_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($crm_leadaddress->leadaddressid->Visible) { // leadaddressid ?>
	<div id="r_leadaddressid" class="form-group row">
		<label id="elh_crm_leadaddress_leadaddressid" for="x_leadaddressid" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->leadaddressid->caption() ?><?php echo ($crm_leadaddress->leadaddressid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->leadaddressid->cellAttributes() ?>>
<span id="el_crm_leadaddress_leadaddressid">
<input type="text" data-table="crm_leadaddress" data-field="x_leadaddressid" name="x_leadaddressid" id="x_leadaddressid" size="30" placeholder="<?php echo HtmlEncode($crm_leadaddress->leadaddressid->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->leadaddressid->EditValue ?>"<?php echo $crm_leadaddress->leadaddressid->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->leadaddressid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->phone->Visible) { // phone ?>
	<div id="r_phone" class="form-group row">
		<label id="elh_crm_leadaddress_phone" for="x_phone" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->phone->caption() ?><?php echo ($crm_leadaddress->phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->phone->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone">
<input type="text" data-table="crm_leadaddress" data-field="x_phone" name="x_phone" id="x_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leadaddress->phone->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->phone->EditValue ?>"<?php echo $crm_leadaddress->phone->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->mobile->Visible) { // mobile ?>
	<div id="r_mobile" class="form-group row">
		<label id="elh_crm_leadaddress_mobile" for="x_mobile" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->mobile->caption() ?><?php echo ($crm_leadaddress->mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->mobile->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile">
<input type="text" data-table="crm_leadaddress" data-field="x_mobile" name="x_mobile" id="x_mobile" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leadaddress->mobile->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->mobile->EditValue ?>"<?php echo $crm_leadaddress->mobile->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->fax->Visible) { // fax ?>
	<div id="r_fax" class="form-group row">
		<label id="elh_crm_leadaddress_fax" for="x_fax" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->fax->caption() ?><?php echo ($crm_leadaddress->fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->fax->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax">
<input type="text" data-table="crm_leadaddress" data-field="x_fax" name="x_fax" id="x_fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leadaddress->fax->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->fax->EditValue ?>"<?php echo $crm_leadaddress->fax->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel1a->Visible) { // addresslevel1a ?>
	<div id="r_addresslevel1a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel1a" for="x_addresslevel1a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel1a->caption() ?><?php echo ($crm_leadaddress->addresslevel1a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel1a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel1a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel1a" name="x_addresslevel1a" id="x_addresslevel1a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel1a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel1a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel1a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel1a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel2a->Visible) { // addresslevel2a ?>
	<div id="r_addresslevel2a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel2a" for="x_addresslevel2a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel2a->caption() ?><?php echo ($crm_leadaddress->addresslevel2a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel2a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel2a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel2a" name="x_addresslevel2a" id="x_addresslevel2a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel2a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel2a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel2a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel2a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel3a->Visible) { // addresslevel3a ?>
	<div id="r_addresslevel3a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel3a" for="x_addresslevel3a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel3a->caption() ?><?php echo ($crm_leadaddress->addresslevel3a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel3a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel3a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel3a" name="x_addresslevel3a" id="x_addresslevel3a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel3a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel3a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel3a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel3a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel4a->Visible) { // addresslevel4a ?>
	<div id="r_addresslevel4a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel4a" for="x_addresslevel4a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel4a->caption() ?><?php echo ($crm_leadaddress->addresslevel4a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel4a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel4a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel4a" name="x_addresslevel4a" id="x_addresslevel4a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel4a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel4a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel4a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel4a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel5a->Visible) { // addresslevel5a ?>
	<div id="r_addresslevel5a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel5a" for="x_addresslevel5a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel5a->caption() ?><?php echo ($crm_leadaddress->addresslevel5a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel5a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel5a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel5a" name="x_addresslevel5a" id="x_addresslevel5a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel5a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel5a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel5a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel5a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel6a->Visible) { // addresslevel6a ?>
	<div id="r_addresslevel6a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel6a" for="x_addresslevel6a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel6a->caption() ?><?php echo ($crm_leadaddress->addresslevel6a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel6a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel6a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel6a" name="x_addresslevel6a" id="x_addresslevel6a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel6a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel6a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel6a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel6a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel7a->Visible) { // addresslevel7a ?>
	<div id="r_addresslevel7a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel7a" for="x_addresslevel7a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel7a->caption() ?><?php echo ($crm_leadaddress->addresslevel7a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel7a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel7a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel7a" name="x_addresslevel7a" id="x_addresslevel7a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel7a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel7a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel7a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel7a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel8a->Visible) { // addresslevel8a ?>
	<div id="r_addresslevel8a" class="form-group row">
		<label id="elh_crm_leadaddress_addresslevel8a" for="x_addresslevel8a" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->addresslevel8a->caption() ?><?php echo ($crm_leadaddress->addresslevel8a->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->addresslevel8a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel8a">
<input type="text" data-table="crm_leadaddress" data-field="x_addresslevel8a" name="x_addresslevel8a" id="x_addresslevel8a" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->addresslevel8a->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->addresslevel8a->EditValue ?>"<?php echo $crm_leadaddress->addresslevel8a->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->addresslevel8a->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->buildingnumbera->Visible) { // buildingnumbera ?>
	<div id="r_buildingnumbera" class="form-group row">
		<label id="elh_crm_leadaddress_buildingnumbera" for="x_buildingnumbera" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->buildingnumbera->caption() ?><?php echo ($crm_leadaddress->buildingnumbera->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->buildingnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_buildingnumbera">
<input type="text" data-table="crm_leadaddress" data-field="x_buildingnumbera" name="x_buildingnumbera" id="x_buildingnumbera" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadaddress->buildingnumbera->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->buildingnumbera->EditValue ?>"<?php echo $crm_leadaddress->buildingnumbera->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->buildingnumbera->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->localnumbera->Visible) { // localnumbera ?>
	<div id="r_localnumbera" class="form-group row">
		<label id="elh_crm_leadaddress_localnumbera" for="x_localnumbera" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->localnumbera->caption() ?><?php echo ($crm_leadaddress->localnumbera->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->localnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_localnumbera">
<input type="text" data-table="crm_leadaddress" data-field="x_localnumbera" name="x_localnumbera" id="x_localnumbera" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leadaddress->localnumbera->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->localnumbera->EditValue ?>"<?php echo $crm_leadaddress->localnumbera->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->localnumbera->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->poboxa->Visible) { // poboxa ?>
	<div id="r_poboxa" class="form-group row">
		<label id="elh_crm_leadaddress_poboxa" for="x_poboxa" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->poboxa->caption() ?><?php echo ($crm_leadaddress->poboxa->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->poboxa->cellAttributes() ?>>
<span id="el_crm_leadaddress_poboxa">
<input type="text" data-table="crm_leadaddress" data-field="x_poboxa" name="x_poboxa" id="x_poboxa" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leadaddress->poboxa->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->poboxa->EditValue ?>"<?php echo $crm_leadaddress->poboxa->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->poboxa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->phone_extra->Visible) { // phone_extra ?>
	<div id="r_phone_extra" class="form-group row">
		<label id="elh_crm_leadaddress_phone_extra" for="x_phone_extra" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->phone_extra->caption() ?><?php echo ($crm_leadaddress->phone_extra->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->phone_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone_extra">
<input type="text" data-table="crm_leadaddress" data-field="x_phone_extra" name="x_phone_extra" id="x_phone_extra" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leadaddress->phone_extra->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->phone_extra->EditValue ?>"<?php echo $crm_leadaddress->phone_extra->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->phone_extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->mobile_extra->Visible) { // mobile_extra ?>
	<div id="r_mobile_extra" class="form-group row">
		<label id="elh_crm_leadaddress_mobile_extra" for="x_mobile_extra" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->mobile_extra->caption() ?><?php echo ($crm_leadaddress->mobile_extra->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->mobile_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile_extra">
<input type="text" data-table="crm_leadaddress" data-field="x_mobile_extra" name="x_mobile_extra" id="x_mobile_extra" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leadaddress->mobile_extra->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->mobile_extra->EditValue ?>"<?php echo $crm_leadaddress->mobile_extra->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->mobile_extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadaddress->fax_extra->Visible) { // fax_extra ?>
	<div id="r_fax_extra" class="form-group row">
		<label id="elh_crm_leadaddress_fax_extra" for="x_fax_extra" class="<?php echo $crm_leadaddress_add->LeftColumnClass ?>"><?php echo $crm_leadaddress->fax_extra->caption() ?><?php echo ($crm_leadaddress->fax_extra->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadaddress_add->RightColumnClass ?>"><div<?php echo $crm_leadaddress->fax_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax_extra">
<input type="text" data-table="crm_leadaddress" data-field="x_fax_extra" name="x_fax_extra" id="x_fax_extra" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leadaddress->fax_extra->getPlaceHolder()) ?>" value="<?php echo $crm_leadaddress->fax_extra->EditValue ?>"<?php echo $crm_leadaddress->fax_extra->editAttributes() ?>>
</span>
<?php echo $crm_leadaddress->fax_extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_leadaddress_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_leadaddress_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadaddress_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_leadaddress_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadaddress_add->terminate();
?>