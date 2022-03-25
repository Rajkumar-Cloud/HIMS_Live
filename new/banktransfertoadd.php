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
$banktransferto_add = new banktransferto_add();

// Run the page
$banktransferto_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbanktransfertoadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbanktransfertoadd = currentForm = new ew.Form("fbanktransfertoadd", "add");

	// Validate form
	fbanktransfertoadd.validate = function() {
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
			<?php if ($banktransferto_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->Name->caption(), $banktransferto_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_add->Street_Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Street_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->Street_Address->caption(), $banktransferto_add->Street_Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_add->City->Required) { ?>
				elm = this.getElements("x" + infix + "_City");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->City->caption(), $banktransferto_add->City->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->State->caption(), $banktransferto_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_add->Zipcode->Required) { ?>
				elm = this.getElements("x" + infix + "_Zipcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->Zipcode->caption(), $banktransferto_add->Zipcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_add->Mobile_Number->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile_Number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->Mobile_Number->caption(), $banktransferto_add->Mobile_Number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_add->AccountNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AccountNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_add->AccountNo->caption(), $banktransferto_add->AccountNo->RequiredErrorMessage)) ?>");
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
	fbanktransfertoadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbanktransfertoadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbanktransfertoadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $banktransferto_add->showPageHeader(); ?>
<?php
$banktransferto_add->showMessage();
?>
<form name="fbanktransfertoadd" id="fbanktransfertoadd" class="<?php echo $banktransferto_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$banktransferto_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($banktransferto_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_banktransferto_Name" for="x_Name" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->Name->caption() ?><?php echo $banktransferto_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->Name->cellAttributes() ?>>
<span id="el_banktransferto_Name">
<input type="text" data-table="banktransferto" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_add->Name->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->Name->EditValue ?>"<?php echo $banktransferto_add->Name->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_add->Street_Address->Visible) { // Street_Address ?>
	<div id="r_Street_Address" class="form-group row">
		<label id="elh_banktransferto_Street_Address" for="x_Street_Address" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->Street_Address->caption() ?><?php echo $banktransferto_add->Street_Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->Street_Address->cellAttributes() ?>>
<span id="el_banktransferto_Street_Address">
<input type="text" data-table="banktransferto" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($banktransferto_add->Street_Address->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->Street_Address->EditValue ?>"<?php echo $banktransferto_add->Street_Address->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->Street_Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_add->City->Visible) { // City ?>
	<div id="r_City" class="form-group row">
		<label id="elh_banktransferto_City" for="x_City" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->City->caption() ?><?php echo $banktransferto_add->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->City->cellAttributes() ?>>
<span id="el_banktransferto_City">
<input type="text" data-table="banktransferto" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($banktransferto_add->City->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->City->EditValue ?>"<?php echo $banktransferto_add->City->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_banktransferto_State" for="x_State" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->State->caption() ?><?php echo $banktransferto_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->State->cellAttributes() ?>>
<span id="el_banktransferto_State">
<input type="text" data-table="banktransferto" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_add->State->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->State->EditValue ?>"<?php echo $banktransferto_add->State->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_add->Zipcode->Visible) { // Zipcode ?>
	<div id="r_Zipcode" class="form-group row">
		<label id="elh_banktransferto_Zipcode" for="x_Zipcode" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->Zipcode->caption() ?><?php echo $banktransferto_add->Zipcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->Zipcode->cellAttributes() ?>>
<span id="el_banktransferto_Zipcode">
<input type="text" data-table="banktransferto" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_add->Zipcode->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->Zipcode->EditValue ?>"<?php echo $banktransferto_add->Zipcode->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->Zipcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_add->Mobile_Number->Visible) { // Mobile_Number ?>
	<div id="r_Mobile_Number" class="form-group row">
		<label id="elh_banktransferto_Mobile_Number" for="x_Mobile_Number" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->Mobile_Number->caption() ?><?php echo $banktransferto_add->Mobile_Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->Mobile_Number->cellAttributes() ?>>
<span id="el_banktransferto_Mobile_Number">
<input type="text" data-table="banktransferto" data-field="x_Mobile_Number" name="x_Mobile_Number" id="x_Mobile_Number" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($banktransferto_add->Mobile_Number->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->Mobile_Number->EditValue ?>"<?php echo $banktransferto_add->Mobile_Number->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->Mobile_Number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_add->AccountNo->Visible) { // AccountNo ?>
	<div id="r_AccountNo" class="form-group row">
		<label id="elh_banktransferto_AccountNo" for="x_AccountNo" class="<?php echo $banktransferto_add->LeftColumnClass ?>"><?php echo $banktransferto_add->AccountNo->caption() ?><?php echo $banktransferto_add->AccountNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_add->RightColumnClass ?>"><div <?php echo $banktransferto_add->AccountNo->cellAttributes() ?>>
<span id="el_banktransferto_AccountNo">
<input type="text" data-table="banktransferto" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_add->AccountNo->getPlaceHolder()) ?>" value="<?php echo $banktransferto_add->AccountNo->EditValue ?>"<?php echo $banktransferto_add->AccountNo->editAttributes() ?>>
</span>
<?php echo $banktransferto_add->AccountNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$banktransferto_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $banktransferto_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $banktransferto_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$banktransferto_add->showPageFooter();
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
$banktransferto_add->terminate();
?>