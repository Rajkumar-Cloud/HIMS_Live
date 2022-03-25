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
$employeetrainingsessions_add = new employeetrainingsessions_add();

// Run the page
$employeetrainingsessions_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employeetrainingsessions_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var femployeetrainingsessionsadd = currentForm = new ew.Form("femployeetrainingsessionsadd", "add");

// Validate form
femployeetrainingsessionsadd.validate = function() {
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
		<?php if ($employeetrainingsessions_add->employee->Required) { ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employeetrainingsessions->employee->caption(), $employeetrainingsessions->employee->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employeetrainingsessions->employee->errorMessage()) ?>");
		<?php if ($employeetrainingsessions_add->trainingSession->Required) { ?>
			elm = this.getElements("x" + infix + "_trainingSession");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employeetrainingsessions->trainingSession->caption(), $employeetrainingsessions->trainingSession->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_trainingSession");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employeetrainingsessions->trainingSession->errorMessage()) ?>");
		<?php if ($employeetrainingsessions_add->feedBack->Required) { ?>
			elm = this.getElements("x" + infix + "_feedBack");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employeetrainingsessions->feedBack->caption(), $employeetrainingsessions->feedBack->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employeetrainingsessions_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employeetrainingsessions->status->caption(), $employeetrainingsessions->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employeetrainingsessions_add->proof->Required) { ?>
			elm = this.getElements("x" + infix + "_proof");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employeetrainingsessions->proof->caption(), $employeetrainingsessions->proof->RequiredErrorMessage)) ?>");
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
femployeetrainingsessionsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeetrainingsessionsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeetrainingsessionsadd.lists["x_status"] = <?php echo $employeetrainingsessions_add->status->Lookup->toClientList() ?>;
femployeetrainingsessionsadd.lists["x_status"].options = <?php echo JsonEncode($employeetrainingsessions_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employeetrainingsessions_add->showPageHeader(); ?>
<?php
$employeetrainingsessions_add->showMessage();
?>
<form name="femployeetrainingsessionsadd" id="femployeetrainingsessionsadd" class="<?php echo $employeetrainingsessions_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employeetrainingsessions_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employeetrainingsessions_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employeetrainingsessions_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employeetrainingsessions->employee->Visible) { // employee ?>
	<div id="r_employee" class="form-group row">
		<label id="elh_employeetrainingsessions_employee" for="x_employee" class="<?php echo $employeetrainingsessions_add->LeftColumnClass ?>"><?php echo $employeetrainingsessions->employee->caption() ?><?php echo ($employeetrainingsessions->employee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employeetrainingsessions_add->RightColumnClass ?>"><div<?php echo $employeetrainingsessions->employee->cellAttributes() ?>>
<span id="el_employeetrainingsessions_employee">
<input type="text" data-table="employeetrainingsessions" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?php echo HtmlEncode($employeetrainingsessions->employee->getPlaceHolder()) ?>" value="<?php echo $employeetrainingsessions->employee->EditValue ?>"<?php echo $employeetrainingsessions->employee->editAttributes() ?>>
</span>
<?php echo $employeetrainingsessions->employee->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employeetrainingsessions->trainingSession->Visible) { // trainingSession ?>
	<div id="r_trainingSession" class="form-group row">
		<label id="elh_employeetrainingsessions_trainingSession" for="x_trainingSession" class="<?php echo $employeetrainingsessions_add->LeftColumnClass ?>"><?php echo $employeetrainingsessions->trainingSession->caption() ?><?php echo ($employeetrainingsessions->trainingSession->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employeetrainingsessions_add->RightColumnClass ?>"><div<?php echo $employeetrainingsessions->trainingSession->cellAttributes() ?>>
<span id="el_employeetrainingsessions_trainingSession">
<input type="text" data-table="employeetrainingsessions" data-field="x_trainingSession" name="x_trainingSession" id="x_trainingSession" size="30" placeholder="<?php echo HtmlEncode($employeetrainingsessions->trainingSession->getPlaceHolder()) ?>" value="<?php echo $employeetrainingsessions->trainingSession->EditValue ?>"<?php echo $employeetrainingsessions->trainingSession->editAttributes() ?>>
</span>
<?php echo $employeetrainingsessions->trainingSession->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employeetrainingsessions->feedBack->Visible) { // feedBack ?>
	<div id="r_feedBack" class="form-group row">
		<label id="elh_employeetrainingsessions_feedBack" for="x_feedBack" class="<?php echo $employeetrainingsessions_add->LeftColumnClass ?>"><?php echo $employeetrainingsessions->feedBack->caption() ?><?php echo ($employeetrainingsessions->feedBack->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employeetrainingsessions_add->RightColumnClass ?>"><div<?php echo $employeetrainingsessions->feedBack->cellAttributes() ?>>
<span id="el_employeetrainingsessions_feedBack">
<textarea data-table="employeetrainingsessions" data-field="x_feedBack" name="x_feedBack" id="x_feedBack" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employeetrainingsessions->feedBack->getPlaceHolder()) ?>"<?php echo $employeetrainingsessions->feedBack->editAttributes() ?>><?php echo $employeetrainingsessions->feedBack->EditValue ?></textarea>
</span>
<?php echo $employeetrainingsessions->feedBack->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employeetrainingsessions->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employeetrainingsessions_status" class="<?php echo $employeetrainingsessions_add->LeftColumnClass ?>"><?php echo $employeetrainingsessions->status->caption() ?><?php echo ($employeetrainingsessions->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employeetrainingsessions_add->RightColumnClass ?>"><div<?php echo $employeetrainingsessions->status->cellAttributes() ?>>
<span id="el_employeetrainingsessions_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employeetrainingsessions" data-field="x_status" data-value-separator="<?php echo $employeetrainingsessions->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employeetrainingsessions->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employeetrainingsessions->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $employeetrainingsessions->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employeetrainingsessions->proof->Visible) { // proof ?>
	<div id="r_proof" class="form-group row">
		<label id="elh_employeetrainingsessions_proof" for="x_proof" class="<?php echo $employeetrainingsessions_add->LeftColumnClass ?>"><?php echo $employeetrainingsessions->proof->caption() ?><?php echo ($employeetrainingsessions->proof->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employeetrainingsessions_add->RightColumnClass ?>"><div<?php echo $employeetrainingsessions->proof->cellAttributes() ?>>
<span id="el_employeetrainingsessions_proof">
<textarea data-table="employeetrainingsessions" data-field="x_proof" name="x_proof" id="x_proof" cols="35" rows="4" placeholder="<?php echo HtmlEncode($employeetrainingsessions->proof->getPlaceHolder()) ?>"<?php echo $employeetrainingsessions->proof->editAttributes() ?>><?php echo $employeetrainingsessions->proof->EditValue ?></textarea>
</span>
<?php echo $employeetrainingsessions->proof->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employeetrainingsessions_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employeetrainingsessions_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employeetrainingsessions_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employeetrainingsessions_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employeetrainingsessions_add->terminate();
?>