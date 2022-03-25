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
$mas_reference_type_add = new mas_reference_type_add();

// Run the page
$mas_reference_type_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_reference_typeadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_reference_typeadd = currentForm = new ew.Form("fmas_reference_typeadd", "add");

	// Validate form
	fmas_reference_typeadd.validate = function() {
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
			<?php if ($mas_reference_type_add->reference->Required) { ?>
				elm = this.getElements("x" + infix + "_reference");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_add->reference->caption(), $mas_reference_type_add->reference->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_add->ReferMobileNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferMobileNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_add->ReferMobileNo->caption(), $mas_reference_type_add->ReferMobileNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_add->ReferClinicname->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferClinicname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_add->ReferClinicname->caption(), $mas_reference_type_add->ReferClinicname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_reference_type_add->ReferCity->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferCity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type_add->ReferCity->caption(), $mas_reference_type_add->ReferCity->RequiredErrorMessage)) ?>");
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
	fmas_reference_typeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_reference_typeadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_reference_typeadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_reference_type_add->showPageHeader(); ?>
<?php
$mas_reference_type_add->showMessage();
?>
<form name="fmas_reference_typeadd" id="fmas_reference_typeadd" class="<?php echo $mas_reference_type_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_reference_type_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_reference_type_add->reference->Visible) { // reference ?>
	<div id="r_reference" class="form-group row">
		<label id="elh_mas_reference_type_reference" for="x_reference" class="<?php echo $mas_reference_type_add->LeftColumnClass ?>"><?php echo $mas_reference_type_add->reference->caption() ?><?php echo $mas_reference_type_add->reference->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_add->RightColumnClass ?>"><div <?php echo $mas_reference_type_add->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<input type="text" data-table="mas_reference_type" data-field="x_reference" name="x_reference" id="x_reference" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_add->reference->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_add->reference->EditValue ?>"<?php echo $mas_reference_type_add->reference->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_add->reference->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_add->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_mas_reference_type_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $mas_reference_type_add->LeftColumnClass ?>"><?php echo $mas_reference_type_add->ReferMobileNo->caption() ?><?php echo $mas_reference_type_add->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_add->RightColumnClass ?>"><div <?php echo $mas_reference_type_add->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<input type="text" data-table="mas_reference_type" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_add->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_add->ReferMobileNo->EditValue ?>"<?php echo $mas_reference_type_add->ReferMobileNo->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_add->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_add->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_mas_reference_type_ReferClinicname" for="x_ReferClinicname" class="<?php echo $mas_reference_type_add->LeftColumnClass ?>"><?php echo $mas_reference_type_add->ReferClinicname->caption() ?><?php echo $mas_reference_type_add->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_add->RightColumnClass ?>"><div <?php echo $mas_reference_type_add->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<input type="text" data-table="mas_reference_type" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_add->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_add->ReferClinicname->EditValue ?>"<?php echo $mas_reference_type_add->ReferClinicname->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_add->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type_add->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_mas_reference_type_ReferCity" for="x_ReferCity" class="<?php echo $mas_reference_type_add->LeftColumnClass ?>"><?php echo $mas_reference_type_add->ReferCity->caption() ?><?php echo $mas_reference_type_add->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_add->RightColumnClass ?>"><div <?php echo $mas_reference_type_add->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<input type="text" data-table="mas_reference_type" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type_add->ReferCity->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type_add->ReferCity->EditValue ?>"<?php echo $mas_reference_type_add->ReferCity->editAttributes() ?>>
</span>
<?php echo $mas_reference_type_add->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_reference_type_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_reference_type_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_reference_type_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_reference_type_add->showPageFooter();
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
$mas_reference_type_add->terminate();
?>