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
$ivf_agency_add = new ivf_agency_add();

// Run the page
$ivf_agency_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_agencyadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_agencyadd = currentForm = new ew.Form("fivf_agencyadd", "add");

	// Validate form
	fivf_agencyadd.validate = function() {
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
			<?php if ($ivf_agency_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_add->Name->caption(), $ivf_agency_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_add->Street->Required) { ?>
				elm = this.getElements("x" + infix + "_Street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_add->Street->caption(), $ivf_agency_add->Street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_add->Town->Required) { ?>
				elm = this.getElements("x" + infix + "_Town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_add->Town->caption(), $ivf_agency_add->Town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_add->State->caption(), $ivf_agency_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_agency_add->Pin->Required) { ?>
				elm = this.getElements("x" + infix + "_Pin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_agency_add->Pin->caption(), $ivf_agency_add->Pin->RequiredErrorMessage)) ?>");
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
	fivf_agencyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_agencyadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_agencyadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_agency_add->showPageHeader(); ?>
<?php
$ivf_agency_add->showMessage();
?>
<form name="fivf_agencyadd" id="fivf_agencyadd" class="<?php echo $ivf_agency_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_agency_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_agency_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_agency_Name" for="x_Name" class="<?php echo $ivf_agency_add->LeftColumnClass ?>"><?php echo $ivf_agency_add->Name->caption() ?><?php echo $ivf_agency_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_add->RightColumnClass ?>"><div <?php echo $ivf_agency_add->Name->cellAttributes() ?>>
<span id="el_ivf_agency_Name">
<input type="text" data-table="ivf_agency" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_add->Name->EditValue ?>"<?php echo $ivf_agency_add->Name->editAttributes() ?>>
</span>
<?php echo $ivf_agency_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency_add->Street->Visible) { // Street ?>
	<div id="r_Street" class="form-group row">
		<label id="elh_ivf_agency_Street" for="x_Street" class="<?php echo $ivf_agency_add->LeftColumnClass ?>"><?php echo $ivf_agency_add->Street->caption() ?><?php echo $ivf_agency_add->Street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_add->RightColumnClass ?>"><div <?php echo $ivf_agency_add->Street->cellAttributes() ?>>
<span id="el_ivf_agency_Street">
<input type="text" data-table="ivf_agency" data-field="x_Street" name="x_Street" id="x_Street" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_add->Street->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_add->Street->EditValue ?>"<?php echo $ivf_agency_add->Street->editAttributes() ?>>
</span>
<?php echo $ivf_agency_add->Street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency_add->Town->Visible) { // Town ?>
	<div id="r_Town" class="form-group row">
		<label id="elh_ivf_agency_Town" for="x_Town" class="<?php echo $ivf_agency_add->LeftColumnClass ?>"><?php echo $ivf_agency_add->Town->caption() ?><?php echo $ivf_agency_add->Town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_add->RightColumnClass ?>"><div <?php echo $ivf_agency_add->Town->cellAttributes() ?>>
<span id="el_ivf_agency_Town">
<input type="text" data-table="ivf_agency" data-field="x_Town" name="x_Town" id="x_Town" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_add->Town->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_add->Town->EditValue ?>"<?php echo $ivf_agency_add->Town->editAttributes() ?>>
</span>
<?php echo $ivf_agency_add->Town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_ivf_agency_State" for="x_State" class="<?php echo $ivf_agency_add->LeftColumnClass ?>"><?php echo $ivf_agency_add->State->caption() ?><?php echo $ivf_agency_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_add->RightColumnClass ?>"><div <?php echo $ivf_agency_add->State->cellAttributes() ?>>
<span id="el_ivf_agency_State">
<input type="text" data-table="ivf_agency" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_add->State->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_add->State->EditValue ?>"<?php echo $ivf_agency_add->State->editAttributes() ?>>
</span>
<?php echo $ivf_agency_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_agency_add->Pin->Visible) { // Pin ?>
	<div id="r_Pin" class="form-group row">
		<label id="elh_ivf_agency_Pin" for="x_Pin" class="<?php echo $ivf_agency_add->LeftColumnClass ?>"><?php echo $ivf_agency_add->Pin->caption() ?><?php echo $ivf_agency_add->Pin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_agency_add->RightColumnClass ?>"><div <?php echo $ivf_agency_add->Pin->cellAttributes() ?>>
<span id="el_ivf_agency_Pin">
<input type="text" data-table="ivf_agency" data-field="x_Pin" name="x_Pin" id="x_Pin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_agency_add->Pin->getPlaceHolder()) ?>" value="<?php echo $ivf_agency_add->Pin->EditValue ?>"<?php echo $ivf_agency_add->Pin->editAttributes() ?>>
</span>
<?php echo $ivf_agency_add->Pin->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_agency_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_agency_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_agency_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_agency_add->showPageFooter();
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
$ivf_agency_add->terminate();
?>