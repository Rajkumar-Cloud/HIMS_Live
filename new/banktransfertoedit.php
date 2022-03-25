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
$banktransferto_edit = new banktransferto_edit();

// Run the page
$banktransferto_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbanktransfertoedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbanktransfertoedit = currentForm = new ew.Form("fbanktransfertoedit", "edit");

	// Validate form
	fbanktransfertoedit.validate = function() {
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
			<?php if ($banktransferto_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->id->caption(), $banktransferto_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->Name->caption(), $banktransferto_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->Street_Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Street_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->Street_Address->caption(), $banktransferto_edit->Street_Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->City->Required) { ?>
				elm = this.getElements("x" + infix + "_City");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->City->caption(), $banktransferto_edit->City->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->State->caption(), $banktransferto_edit->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->Zipcode->Required) { ?>
				elm = this.getElements("x" + infix + "_Zipcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->Zipcode->caption(), $banktransferto_edit->Zipcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->Mobile_Number->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile_Number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->Mobile_Number->caption(), $banktransferto_edit->Mobile_Number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($banktransferto_edit->AccountNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AccountNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $banktransferto_edit->AccountNo->caption(), $banktransferto_edit->AccountNo->RequiredErrorMessage)) ?>");
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
	fbanktransfertoedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbanktransfertoedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbanktransfertoedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $banktransferto_edit->showPageHeader(); ?>
<?php
$banktransferto_edit->showMessage();
?>
<form name="fbanktransfertoedit" id="fbanktransfertoedit" class="<?php echo $banktransferto_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$banktransferto_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($banktransferto_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_banktransferto_id" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->id->caption() ?><?php echo $banktransferto_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->id->cellAttributes() ?>>
<span id="el_banktransferto_id">
<span<?php echo $banktransferto_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($banktransferto_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="banktransferto" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($banktransferto_edit->id->CurrentValue) ?>">
<?php echo $banktransferto_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_banktransferto_Name" for="x_Name" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->Name->caption() ?><?php echo $banktransferto_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->Name->cellAttributes() ?>>
<span id="el_banktransferto_Name">
<input type="text" data-table="banktransferto" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_edit->Name->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->Name->EditValue ?>"<?php echo $banktransferto_edit->Name->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->Street_Address->Visible) { // Street_Address ?>
	<div id="r_Street_Address" class="form-group row">
		<label id="elh_banktransferto_Street_Address" for="x_Street_Address" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->Street_Address->caption() ?><?php echo $banktransferto_edit->Street_Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->Street_Address->cellAttributes() ?>>
<span id="el_banktransferto_Street_Address">
<input type="text" data-table="banktransferto" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($banktransferto_edit->Street_Address->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->Street_Address->EditValue ?>"<?php echo $banktransferto_edit->Street_Address->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->Street_Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->City->Visible) { // City ?>
	<div id="r_City" class="form-group row">
		<label id="elh_banktransferto_City" for="x_City" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->City->caption() ?><?php echo $banktransferto_edit->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->City->cellAttributes() ?>>
<span id="el_banktransferto_City">
<input type="text" data-table="banktransferto" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($banktransferto_edit->City->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->City->EditValue ?>"<?php echo $banktransferto_edit->City->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_banktransferto_State" for="x_State" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->State->caption() ?><?php echo $banktransferto_edit->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->State->cellAttributes() ?>>
<span id="el_banktransferto_State">
<input type="text" data-table="banktransferto" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_edit->State->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->State->EditValue ?>"<?php echo $banktransferto_edit->State->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->Zipcode->Visible) { // Zipcode ?>
	<div id="r_Zipcode" class="form-group row">
		<label id="elh_banktransferto_Zipcode" for="x_Zipcode" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->Zipcode->caption() ?><?php echo $banktransferto_edit->Zipcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->Zipcode->cellAttributes() ?>>
<span id="el_banktransferto_Zipcode">
<input type="text" data-table="banktransferto" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_edit->Zipcode->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->Zipcode->EditValue ?>"<?php echo $banktransferto_edit->Zipcode->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->Zipcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->Mobile_Number->Visible) { // Mobile_Number ?>
	<div id="r_Mobile_Number" class="form-group row">
		<label id="elh_banktransferto_Mobile_Number" for="x_Mobile_Number" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->Mobile_Number->caption() ?><?php echo $banktransferto_edit->Mobile_Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->Mobile_Number->cellAttributes() ?>>
<span id="el_banktransferto_Mobile_Number">
<input type="text" data-table="banktransferto" data-field="x_Mobile_Number" name="x_Mobile_Number" id="x_Mobile_Number" size="30" maxlength="12" placeholder="<?php echo HtmlEncode($banktransferto_edit->Mobile_Number->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->Mobile_Number->EditValue ?>"<?php echo $banktransferto_edit->Mobile_Number->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->Mobile_Number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($banktransferto_edit->AccountNo->Visible) { // AccountNo ?>
	<div id="r_AccountNo" class="form-group row">
		<label id="elh_banktransferto_AccountNo" for="x_AccountNo" class="<?php echo $banktransferto_edit->LeftColumnClass ?>"><?php echo $banktransferto_edit->AccountNo->caption() ?><?php echo $banktransferto_edit->AccountNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $banktransferto_edit->RightColumnClass ?>"><div <?php echo $banktransferto_edit->AccountNo->cellAttributes() ?>>
<span id="el_banktransferto_AccountNo">
<input type="text" data-table="banktransferto" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($banktransferto_edit->AccountNo->getPlaceHolder()) ?>" value="<?php echo $banktransferto_edit->AccountNo->EditValue ?>"<?php echo $banktransferto_edit->AccountNo->editAttributes() ?>>
</span>
<?php echo $banktransferto_edit->AccountNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$banktransferto_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $banktransferto_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $banktransferto_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$banktransferto_edit->showPageFooter();
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
$banktransferto_edit->terminate();
?>