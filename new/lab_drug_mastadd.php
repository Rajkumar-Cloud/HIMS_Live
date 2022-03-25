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
$lab_drug_mast_add = new lab_drug_mast_add();

// Run the page
$lab_drug_mast_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_drug_mastadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flab_drug_mastadd = currentForm = new ew.Form("flab_drug_mastadd", "add");

	// Validate form
	flab_drug_mastadd.validate = function() {
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
			<?php if ($lab_drug_mast_add->DrugName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrugName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->DrugName->caption(), $lab_drug_mast_add->DrugName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_drug_mast_add->Positive->Required) { ?>
				elm = this.getElements("x" + infix + "_Positive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->Positive->caption(), $lab_drug_mast_add->Positive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_drug_mast_add->Negative->Required) { ?>
				elm = this.getElements("x" + infix + "_Negative");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->Negative->caption(), $lab_drug_mast_add->Negative->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_drug_mast_add->ShortName->Required) { ?>
				elm = this.getElements("x" + infix + "_ShortName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->ShortName->caption(), $lab_drug_mast_add->ShortName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_drug_mast_add->GroupCD->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->GroupCD->caption(), $lab_drug_mast_add->GroupCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_drug_mast_add->Content->Required) { ?>
				elm = this.getElements("x" + infix + "_Content");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->Content->caption(), $lab_drug_mast_add->Content->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_drug_mast_add->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->Order->caption(), $lab_drug_mast_add->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_drug_mast_add->Order->errorMessage()) ?>");
			<?php if ($lab_drug_mast_add->DrugCD->Required) { ?>
				elm = this.getElements("x" + infix + "_DrugCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast_add->DrugCD->caption(), $lab_drug_mast_add->DrugCD->RequiredErrorMessage)) ?>");
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
	flab_drug_mastadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_drug_mastadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_drug_mastadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_drug_mast_add->showPageHeader(); ?>
<?php
$lab_drug_mast_add->showMessage();
?>
<form name="flab_drug_mastadd" id="flab_drug_mastadd" class="<?php echo $lab_drug_mast_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_drug_mast_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_drug_mast_add->DrugName->Visible) { // DrugName ?>
	<div id="r_DrugName" class="form-group row">
		<label id="elh_lab_drug_mast_DrugName" for="x_DrugName" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->DrugName->caption() ?><?php echo $lab_drug_mast_add->DrugName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->DrugName->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugName">
<input type="text" data-table="lab_drug_mast" data-field="x_DrugName" name="x_DrugName" id="x_DrugName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->DrugName->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->DrugName->EditValue ?>"<?php echo $lab_drug_mast_add->DrugName->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->DrugName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->Positive->Visible) { // Positive ?>
	<div id="r_Positive" class="form-group row">
		<label id="elh_lab_drug_mast_Positive" for="x_Positive" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->Positive->caption() ?><?php echo $lab_drug_mast_add->Positive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->Positive->cellAttributes() ?>>
<span id="el_lab_drug_mast_Positive">
<input type="text" data-table="lab_drug_mast" data-field="x_Positive" name="x_Positive" id="x_Positive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->Positive->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->Positive->EditValue ?>"<?php echo $lab_drug_mast_add->Positive->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->Positive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->Negative->Visible) { // Negative ?>
	<div id="r_Negative" class="form-group row">
		<label id="elh_lab_drug_mast_Negative" for="x_Negative" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->Negative->caption() ?><?php echo $lab_drug_mast_add->Negative->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->Negative->cellAttributes() ?>>
<span id="el_lab_drug_mast_Negative">
<input type="text" data-table="lab_drug_mast" data-field="x_Negative" name="x_Negative" id="x_Negative" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->Negative->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->Negative->EditValue ?>"<?php echo $lab_drug_mast_add->Negative->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->Negative->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_lab_drug_mast_ShortName" for="x_ShortName" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->ShortName->caption() ?><?php echo $lab_drug_mast_add->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->ShortName->cellAttributes() ?>>
<span id="el_lab_drug_mast_ShortName">
<input type="text" data-table="lab_drug_mast" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->ShortName->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->ShortName->EditValue ?>"<?php echo $lab_drug_mast_add->ShortName->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->GroupCD->Visible) { // GroupCD ?>
	<div id="r_GroupCD" class="form-group row">
		<label id="elh_lab_drug_mast_GroupCD" for="x_GroupCD" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->GroupCD->caption() ?><?php echo $lab_drug_mast_add->GroupCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->GroupCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_GroupCD">
<input type="text" data-table="lab_drug_mast" data-field="x_GroupCD" name="x_GroupCD" id="x_GroupCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->GroupCD->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->GroupCD->EditValue ?>"<?php echo $lab_drug_mast_add->GroupCD->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->GroupCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->Content->Visible) { // Content ?>
	<div id="r_Content" class="form-group row">
		<label id="elh_lab_drug_mast_Content" for="x_Content" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->Content->caption() ?><?php echo $lab_drug_mast_add->Content->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->Content->cellAttributes() ?>>
<span id="el_lab_drug_mast_Content">
<input type="text" data-table="lab_drug_mast" data-field="x_Content" name="x_Content" id="x_Content" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->Content->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->Content->EditValue ?>"<?php echo $lab_drug_mast_add->Content->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->Content->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_lab_drug_mast_Order" for="x_Order" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->Order->caption() ?><?php echo $lab_drug_mast_add->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->Order->cellAttributes() ?>>
<span id="el_lab_drug_mast_Order">
<input type="text" data-table="lab_drug_mast" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->Order->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->Order->EditValue ?>"<?php echo $lab_drug_mast_add->Order->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast_add->DrugCD->Visible) { // DrugCD ?>
	<div id="r_DrugCD" class="form-group row">
		<label id="elh_lab_drug_mast_DrugCD" for="x_DrugCD" class="<?php echo $lab_drug_mast_add->LeftColumnClass ?>"><?php echo $lab_drug_mast_add->DrugCD->caption() ?><?php echo $lab_drug_mast_add->DrugCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_add->RightColumnClass ?>"><div <?php echo $lab_drug_mast_add->DrugCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugCD">
<input type="text" data-table="lab_drug_mast" data-field="x_DrugCD" name="x_DrugCD" id="x_DrugCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_drug_mast_add->DrugCD->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast_add->DrugCD->EditValue ?>"<?php echo $lab_drug_mast_add->DrugCD->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast_add->DrugCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_drug_mast_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_drug_mast_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_drug_mast_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_drug_mast_add->showPageFooter();
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
$lab_drug_mast_add->terminate();
?>