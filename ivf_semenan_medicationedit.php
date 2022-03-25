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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_semenan_medicationedit = currentForm = new ew.Form("fivf_semenan_medicationedit", "edit");

// Validate form
fivf_semenan_medicationedit.validate = function() {
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
		<?php if ($ivf_semenan_medication_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenan_medication->id->caption(), $ivf_semenan_medication->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_semenan_medication_edit->Medication->Required) { ?>
			elm = this.getElements("x" + infix + "_Medication");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_semenan_medication->Medication->caption(), $ivf_semenan_medication->Medication->RequiredErrorMessage)) ?>");
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
fivf_semenan_medicationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_semenan_medicationedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_semenan_medication_edit->showPageHeader(); ?>
<?php
$ivf_semenan_medication_edit->showMessage();
?>
<form name="fivf_semenan_medicationedit" id="fivf_semenan_medicationedit" class="<?php echo $ivf_semenan_medication_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_semenan_medication_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_semenan_medication_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenan_medication">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_semenan_medication_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_semenan_medication->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_semenan_medication_id" class="<?php echo $ivf_semenan_medication_edit->LeftColumnClass ?>"><?php echo $ivf_semenan_medication->id->caption() ?><?php echo ($ivf_semenan_medication->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_semenan_medication_edit->RightColumnClass ?>"><div<?php echo $ivf_semenan_medication->id->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_id">
<span<?php echo $ivf_semenan_medication->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_semenan_medication->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_semenan_medication" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_semenan_medication->id->CurrentValue) ?>">
<?php echo $ivf_semenan_medication->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_semenan_medication->Medication->Visible) { // Medication ?>
	<div id="r_Medication" class="form-group row">
		<label id="elh_ivf_semenan_medication_Medication" for="x_Medication" class="<?php echo $ivf_semenan_medication_edit->LeftColumnClass ?>"><?php echo $ivf_semenan_medication->Medication->caption() ?><?php echo ($ivf_semenan_medication->Medication->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_semenan_medication_edit->RightColumnClass ?>"><div<?php echo $ivf_semenan_medication->Medication->cellAttributes() ?>>
<span id="el_ivf_semenan_medication_Medication">
<input type="text" data-table="ivf_semenan_medication" data-field="x_Medication" name="x_Medication" id="x_Medication" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_semenan_medication->Medication->getPlaceHolder()) ?>" value="<?php echo $ivf_semenan_medication->Medication->EditValue ?>"<?php echo $ivf_semenan_medication->Medication->editAttributes() ?>>
</span>
<?php echo $ivf_semenan_medication->Medication->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_semenan_medication_edit->terminate();
?>