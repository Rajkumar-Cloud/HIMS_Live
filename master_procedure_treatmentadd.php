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
$master_procedure_treatment_add = new master_procedure_treatment_add();

// Run the page
$master_procedure_treatment_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_procedure_treatment_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fmaster_procedure_treatmentadd = currentForm = new ew.Form("fmaster_procedure_treatmentadd", "add");

// Validate form
fmaster_procedure_treatmentadd.validate = function() {
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
		<?php if ($master_procedure_treatment_add->Treatment->Required) { ?>
			elm = this.getElements("x" + infix + "_Treatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_procedure_treatment->Treatment->caption(), $master_procedure_treatment->Treatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($master_procedure_treatment_add->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $master_procedure_treatment->Procedure->caption(), $master_procedure_treatment->Procedure->RequiredErrorMessage)) ?>");
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
fmaster_procedure_treatmentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmaster_procedure_treatmentadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $master_procedure_treatment_add->showPageHeader(); ?>
<?php
$master_procedure_treatment_add->showMessage();
?>
<form name="fmaster_procedure_treatmentadd" id="fmaster_procedure_treatmentadd" class="<?php echo $master_procedure_treatment_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($master_procedure_treatment_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $master_procedure_treatment_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_procedure_treatment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$master_procedure_treatment_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($master_procedure_treatment->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_master_procedure_treatment_Treatment" for="x_Treatment" class="<?php echo $master_procedure_treatment_add->LeftColumnClass ?>"><?php echo $master_procedure_treatment->Treatment->caption() ?><?php echo ($master_procedure_treatment->Treatment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_procedure_treatment_add->RightColumnClass ?>"><div<?php echo $master_procedure_treatment->Treatment->cellAttributes() ?>>
<span id="el_master_procedure_treatment_Treatment">
<input type="text" data-table="master_procedure_treatment" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($master_procedure_treatment->Treatment->getPlaceHolder()) ?>" value="<?php echo $master_procedure_treatment->Treatment->EditValue ?>"<?php echo $master_procedure_treatment->Treatment->editAttributes() ?>>
</span>
<?php echo $master_procedure_treatment->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($master_procedure_treatment->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_master_procedure_treatment_Procedure" for="x_Procedure" class="<?php echo $master_procedure_treatment_add->LeftColumnClass ?>"><?php echo $master_procedure_treatment->Procedure->caption() ?><?php echo ($master_procedure_treatment->Procedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $master_procedure_treatment_add->RightColumnClass ?>"><div<?php echo $master_procedure_treatment->Procedure->cellAttributes() ?>>
<span id="el_master_procedure_treatment_Procedure">
<input type="text" data-table="master_procedure_treatment" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($master_procedure_treatment->Procedure->getPlaceHolder()) ?>" value="<?php echo $master_procedure_treatment->Procedure->EditValue ?>"<?php echo $master_procedure_treatment->Procedure->editAttributes() ?>>
</span>
<?php echo $master_procedure_treatment->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$master_procedure_treatment_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $master_procedure_treatment_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_procedure_treatment_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$master_procedure_treatment_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$master_procedure_treatment_add->terminate();
?>