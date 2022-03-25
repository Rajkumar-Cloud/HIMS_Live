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
$pres_frequencies_add = new pres_frequencies_add();

// Run the page
$pres_frequencies_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_frequencies_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_frequenciesadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_frequenciesadd = currentForm = new ew.Form("fpres_frequenciesadd", "add");

	// Validate form
	fpres_frequenciesadd.validate = function() {
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
			<?php if ($pres_frequencies_add->Frequency->Required) { ?>
				elm = this.getElements("x" + infix + "_Frequency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_frequencies_add->Frequency->caption(), $pres_frequencies_add->Frequency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_frequencies_add->Freq_Exp->Required) { ?>
				elm = this.getElements("x" + infix + "_Freq_Exp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_frequencies_add->Freq_Exp->caption(), $pres_frequencies_add->Freq_Exp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_frequencies_add->Freq_Count->Required) { ?>
				elm = this.getElements("x" + infix + "_Freq_Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_frequencies_add->Freq_Count->caption(), $pres_frequencies_add->Freq_Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Freq_Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_frequencies_add->Freq_Count->errorMessage()) ?>");

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
	fpres_frequenciesadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_frequenciesadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_frequenciesadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_frequencies_add->showPageHeader(); ?>
<?php
$pres_frequencies_add->showMessage();
?>
<form name="fpres_frequenciesadd" id="fpres_frequenciesadd" class="<?php echo $pres_frequencies_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_frequencies_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_frequencies_add->Frequency->Visible) { // Frequency ?>
	<div id="r_Frequency" class="form-group row">
		<label id="elh_pres_frequencies_Frequency" for="x_Frequency" class="<?php echo $pres_frequencies_add->LeftColumnClass ?>"><?php echo $pres_frequencies_add->Frequency->caption() ?><?php echo $pres_frequencies_add->Frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_frequencies_add->RightColumnClass ?>"><div <?php echo $pres_frequencies_add->Frequency->cellAttributes() ?>>
<span id="el_pres_frequencies_Frequency">
<input type="text" data-table="pres_frequencies" data-field="x_Frequency" name="x_Frequency" id="x_Frequency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_frequencies_add->Frequency->getPlaceHolder()) ?>" value="<?php echo $pres_frequencies_add->Frequency->EditValue ?>"<?php echo $pres_frequencies_add->Frequency->editAttributes() ?>>
</span>
<?php echo $pres_frequencies_add->Frequency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_frequencies_add->Freq_Exp->Visible) { // Freq_Exp ?>
	<div id="r_Freq_Exp" class="form-group row">
		<label id="elh_pres_frequencies_Freq_Exp" for="x_Freq_Exp" class="<?php echo $pres_frequencies_add->LeftColumnClass ?>"><?php echo $pres_frequencies_add->Freq_Exp->caption() ?><?php echo $pres_frequencies_add->Freq_Exp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_frequencies_add->RightColumnClass ?>"><div <?php echo $pres_frequencies_add->Freq_Exp->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Exp">
<input type="text" data-table="pres_frequencies" data-field="x_Freq_Exp" name="x_Freq_Exp" id="x_Freq_Exp" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_frequencies_add->Freq_Exp->getPlaceHolder()) ?>" value="<?php echo $pres_frequencies_add->Freq_Exp->EditValue ?>"<?php echo $pres_frequencies_add->Freq_Exp->editAttributes() ?>>
</span>
<?php echo $pres_frequencies_add->Freq_Exp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_frequencies_add->Freq_Count->Visible) { // Freq_Count ?>
	<div id="r_Freq_Count" class="form-group row">
		<label id="elh_pres_frequencies_Freq_Count" for="x_Freq_Count" class="<?php echo $pres_frequencies_add->LeftColumnClass ?>"><?php echo $pres_frequencies_add->Freq_Count->caption() ?><?php echo $pres_frequencies_add->Freq_Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_frequencies_add->RightColumnClass ?>"><div <?php echo $pres_frequencies_add->Freq_Count->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Count">
<input type="text" data-table="pres_frequencies" data-field="x_Freq_Count" name="x_Freq_Count" id="x_Freq_Count" size="30" placeholder="<?php echo HtmlEncode($pres_frequencies_add->Freq_Count->getPlaceHolder()) ?>" value="<?php echo $pres_frequencies_add->Freq_Count->EditValue ?>"<?php echo $pres_frequencies_add->Freq_Count->editAttributes() ?>>
</span>
<?php echo $pres_frequencies_add->Freq_Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_frequencies_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_frequencies_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_frequencies_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_frequencies_add->showPageFooter();
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
$pres_frequencies_add->terminate();
?>