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
$ivf_semenan_medication_edit = new ivf_semenan_medication_edit();

// Run the page
$ivf_semenan_medication_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenan_medication_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_semenan_medicationedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_semenan_medicationedit = currentForm = new ew.Form("fivf_semenan_medicationedit", "edit");

	// Validate form
	fivf_semenan_medicationedit.validate = function() {
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
			<?php if ($ivf_semenan_medication_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenan_medication_edit->id->caption(), $ivf_semenan_medication_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_semenan_medication_edit->Medication->Required) { ?>
				elm = this.getElements("x" + infix + "_Medication");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenan_medication_edit->Medication->caption(), $ivf_semenan_medication_edit->Medication->RequiredErrorMessage)) ?>");
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
	fivf_semenan_medicationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_semenan_medicationedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_semenan_medicationedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_semenan_medication_edit->showPageHeader(); ?>
<?php
$ivf_semenan_medication_edit->showMessage();
?>
<form name="fivf_semenan_medicationedit" id="fivf_semenan_medicationedit" class="<?php echo $ivf_semenan_medication_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenan_medication">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenan_medication_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_semenan_medication_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_semenan_medication_id" class="<?php echo $ivf_semenan_medication_edit->LeftColumnClass ?>"><?php echo $ivf_semenan_medication_edit->id->caption() ?><?php echo $ivf_semenan_medication_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_semenan_medication_edit->RightColumnClass ?>"><div <?php echo $ivf_semenan_medication_edit->id->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_id">
<span<?php echo $ivf_semenan_medication_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_semenan_medication_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenan_medication" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_semenan_medication_edit->id->CurrentValue) ?>">
<?php echo $ivf_semenan_medication_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenan_medication_edit->Medication->Visible) { // Medication ?>
	<div id="r_Medication" class="form-group row">
		<label id="elh_ivf_semenan_medication_Medication" for="x_Medication" class="<?php echo $ivf_semenan_medication_edit->LeftColumnClass ?>"><?php echo $ivf_semenan_medication_edit->Medication->caption() ?><?php echo $ivf_semenan_medication_edit->Medication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_semenan_medication_edit->RightColumnClass ?>"><div <?php echo $ivf_semenan_medication_edit->Medication->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_Medication">
<input type="text" data-table="ivf_semenan_medication" data-field="x_Medication" name="x_Medication" id="x_Medication" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenan_medication_edit->Medication->getPlaceHolder()) ?>" value="<?php echo $ivf_semenan_medication_edit->Medication->EditValue ?>"<?php echo $ivf_semenan_medication_edit->Medication->editAttributes() ?>>
</span>
<?php echo $ivf_semenan_medication_edit->Medication->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_semenan_medication_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_semenan_medication_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_semenan_medication_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_semenan_medication_edit->showPageFooter();
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
$ivf_semenan_medication_edit->terminate();
?>