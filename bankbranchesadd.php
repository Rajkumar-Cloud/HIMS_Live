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
$bankbranches_add = new bankbranches_add();

// Run the page
$bankbranches_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bankbranches_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fbankbranchesadd = currentForm = new ew.Form("fbankbranchesadd", "add");

// Validate form
fbankbranchesadd.validate = function() {
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
		<?php if ($bankbranches_add->Branch_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Branch_Name->caption(), $bankbranches->Branch_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_add->Street_Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Street_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Street_Address->caption(), $bankbranches->Street_Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_add->City->Required) { ?>
			elm = this.getElements("x" + infix + "_City");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->City->caption(), $bankbranches->City->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_add->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->State->caption(), $bankbranches->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_add->Zipcode->Required) { ?>
			elm = this.getElements("x" + infix + "_Zipcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Zipcode->caption(), $bankbranches->Zipcode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_add->Phone_Number->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone_Number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->Phone_Number->caption(), $bankbranches->Phone_Number->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($bankbranches_add->AccountNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AccountNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bankbranches->AccountNo->caption(), $bankbranches->AccountNo->RequiredErrorMessage)) ?>");
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
fbankbranchesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbankbranchesadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $bankbranches_add->showPageHeader(); ?>
<?php
$bankbranches_add->showMessage();
?>
<form name="fbankbranchesadd" id="fbankbranchesadd" class="<?php echo $bankbranches_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($bankbranches_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $bankbranches_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bankbranches_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
	<div id="r_Branch_Name" class="form-group row">
		<label id="elh_bankbranches_Branch_Name" for="x_Branch_Name" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->Branch_Name->caption() ?><?php echo ($bankbranches->Branch_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->Branch_Name->cellAttributes() ?>>
<span id="el_bankbranches_Branch_Name">
<input type="text" data-table="bankbranches" data-field="x_Branch_Name" name="x_Branch_Name" id="x_Branch_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->Branch_Name->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Branch_Name->EditValue ?>"<?php echo $bankbranches->Branch_Name->editAttributes() ?>>
</span>
<?php echo $bankbranches->Branch_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
	<div id="r_Street_Address" class="form-group row">
		<label id="elh_bankbranches_Street_Address" for="x_Street_Address" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->Street_Address->caption() ?><?php echo ($bankbranches->Street_Address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->Street_Address->cellAttributes() ?>>
<span id="el_bankbranches_Street_Address">
<input type="text" data-table="bankbranches" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bankbranches->Street_Address->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Street_Address->EditValue ?>"<?php echo $bankbranches->Street_Address->editAttributes() ?>>
</span>
<?php echo $bankbranches->Street_Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bankbranches->City->Visible) { // City ?>
	<div id="r_City" class="form-group row">
		<label id="elh_bankbranches_City" for="x_City" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->City->caption() ?><?php echo ($bankbranches->City->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->City->cellAttributes() ?>>
<span id="el_bankbranches_City">
<input type="text" data-table="bankbranches" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($bankbranches->City->getPlaceHolder()) ?>" value="<?php echo $bankbranches->City->EditValue ?>"<?php echo $bankbranches->City->editAttributes() ?>>
</span>
<?php echo $bankbranches->City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bankbranches->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_bankbranches_State" for="x_State" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->State->caption() ?><?php echo ($bankbranches->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->State->cellAttributes() ?>>
<span id="el_bankbranches_State">
<input type="text" data-table="bankbranches" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->State->getPlaceHolder()) ?>" value="<?php echo $bankbranches->State->EditValue ?>"<?php echo $bankbranches->State->editAttributes() ?>>
</span>
<?php echo $bankbranches->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
	<div id="r_Zipcode" class="form-group row">
		<label id="elh_bankbranches_Zipcode" for="x_Zipcode" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->Zipcode->caption() ?><?php echo ($bankbranches->Zipcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->Zipcode->cellAttributes() ?>>
<span id="el_bankbranches_Zipcode">
<input type="text" data-table="bankbranches" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->Zipcode->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Zipcode->EditValue ?>"<?php echo $bankbranches->Zipcode->editAttributes() ?>>
</span>
<?php echo $bankbranches->Zipcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
	<div id="r_Phone_Number" class="form-group row">
		<label id="elh_bankbranches_Phone_Number" for="x_Phone_Number" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->Phone_Number->caption() ?><?php echo ($bankbranches->Phone_Number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->Phone_Number->cellAttributes() ?>>
<span id="el_bankbranches_Phone_Number">
<input type="text" data-table="bankbranches" data-field="x_Phone_Number" name="x_Phone_Number" id="x_Phone_Number" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($bankbranches->Phone_Number->getPlaceHolder()) ?>" value="<?php echo $bankbranches->Phone_Number->EditValue ?>"<?php echo $bankbranches->Phone_Number->editAttributes() ?>>
</span>
<?php echo $bankbranches->Phone_Number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
	<div id="r_AccountNo" class="form-group row">
		<label id="elh_bankbranches_AccountNo" for="x_AccountNo" class="<?php echo $bankbranches_add->LeftColumnClass ?>"><?php echo $bankbranches->AccountNo->caption() ?><?php echo ($bankbranches->AccountNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bankbranches_add->RightColumnClass ?>"><div<?php echo $bankbranches->AccountNo->cellAttributes() ?>>
<span id="el_bankbranches_AccountNo">
<input type="text" data-table="bankbranches" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($bankbranches->AccountNo->getPlaceHolder()) ?>" value="<?php echo $bankbranches->AccountNo->EditValue ?>"<?php echo $bankbranches->AccountNo->editAttributes() ?>>
</span>
<?php echo $bankbranches->AccountNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bankbranches_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bankbranches_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bankbranches_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bankbranches_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$bankbranches_add->terminate();
?>