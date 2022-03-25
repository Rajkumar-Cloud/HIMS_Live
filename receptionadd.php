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
$reception_add = new reception_add();

// Run the page
$reception_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$reception_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var freceptionadd = currentForm = new ew.Form("freceptionadd", "add");

// Validate form
freceptionadd.validate = function() {
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
		<?php if ($reception_add->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->PatientID->caption(), $reception->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->PatientName->caption(), $reception->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->OorN->Required) { ?>
			elm = this.getElements("x" + infix + "_OorN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->OorN->caption(), $reception->OorN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->PRIMARY_CONSULTANT->Required) { ?>
			elm = this.getElements("x" + infix + "_PRIMARY_CONSULTANT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->PRIMARY_CONSULTANT->caption(), $reception->PRIMARY_CONSULTANT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->CATEGORY->Required) { ?>
			elm = this.getElements("x" + infix + "_CATEGORY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->CATEGORY->caption(), $reception->CATEGORY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->PROCEDURE->Required) { ?>
			elm = this.getElements("x" + infix + "_PROCEDURE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->PROCEDURE->caption(), $reception->PROCEDURE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->Amount->caption(), $reception->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->MODE_OF_PAYMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_MODE_OF_PAYMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->MODE_OF_PAYMENT->caption(), $reception->MODE_OF_PAYMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($reception_add->NEXT_REVIEW_DATE->Required) { ?>
			elm = this.getElements("x" + infix + "_NEXT_REVIEW_DATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->NEXT_REVIEW_DATE->caption(), $reception->NEXT_REVIEW_DATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NEXT_REVIEW_DATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($reception->NEXT_REVIEW_DATE->errorMessage()) ?>");
		<?php if ($reception_add->REMARKS->Required) { ?>
			elm = this.getElements("x" + infix + "_REMARKS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $reception->REMARKS->caption(), $reception->REMARKS->RequiredErrorMessage)) ?>");
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
freceptionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceptionadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
freceptionadd.lists["x_CATEGORY"] = <?php echo $reception_add->CATEGORY->Lookup->toClientList() ?>;
freceptionadd.lists["x_CATEGORY"].options = <?php echo JsonEncode($reception_add->CATEGORY->lookupOptions()) ?>;
freceptionadd.lists["x_PROCEDURE"] = <?php echo $reception_add->PROCEDURE->Lookup->toClientList() ?>;
freceptionadd.lists["x_PROCEDURE"].options = <?php echo JsonEncode($reception_add->PROCEDURE->lookupOptions()) ?>;
freceptionadd.lists["x_MODE_OF_PAYMENT"] = <?php echo $reception_add->MODE_OF_PAYMENT->Lookup->toClientList() ?>;
freceptionadd.lists["x_MODE_OF_PAYMENT"].options = <?php echo JsonEncode($reception_add->MODE_OF_PAYMENT->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $reception_add->showPageHeader(); ?>
<?php
$reception_add->showMessage();
?>
<form name="freceptionadd" id="freceptionadd" class="<?php echo $reception_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($reception_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $reception_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$reception_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($reception->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_reception_PatientID" for="x_PatientID" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->PatientID->caption() ?><?php echo ($reception->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->PatientID->cellAttributes() ?>>
<span id="el_reception_PatientID">
<input type="text" data-table="reception" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($reception->PatientID->getPlaceHolder()) ?>" value="<?php echo $reception->PatientID->EditValue ?>"<?php echo $reception->PatientID->editAttributes() ?>>
</span>
<?php echo $reception->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_reception_PatientName" for="x_PatientName" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->PatientName->caption() ?><?php echo ($reception->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->PatientName->cellAttributes() ?>>
<span id="el_reception_PatientName">
<input type="text" data-table="reception" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($reception->PatientName->getPlaceHolder()) ?>" value="<?php echo $reception->PatientName->EditValue ?>"<?php echo $reception->PatientName->editAttributes() ?>>
</span>
<?php echo $reception->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->OorN->Visible) { // OorN ?>
	<div id="r_OorN" class="form-group row">
		<label id="elh_reception_OorN" for="x_OorN" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->OorN->caption() ?><?php echo ($reception->OorN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->OorN->cellAttributes() ?>>
<span id="el_reception_OorN">
<input type="text" data-table="reception" data-field="x_OorN" name="x_OorN" id="x_OorN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($reception->OorN->getPlaceHolder()) ?>" value="<?php echo $reception->OorN->EditValue ?>"<?php echo $reception->OorN->editAttributes() ?>>
</span>
<?php echo $reception->OorN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
	<div id="r_PRIMARY_CONSULTANT" class="form-group row">
		<label id="elh_reception_PRIMARY_CONSULTANT" for="x_PRIMARY_CONSULTANT" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->PRIMARY_CONSULTANT->caption() ?><?php echo ($reception->PRIMARY_CONSULTANT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el_reception_PRIMARY_CONSULTANT">
<input type="text" data-table="reception" data-field="x_PRIMARY_CONSULTANT" name="x_PRIMARY_CONSULTANT" id="x_PRIMARY_CONSULTANT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($reception->PRIMARY_CONSULTANT->getPlaceHolder()) ?>" value="<?php echo $reception->PRIMARY_CONSULTANT->EditValue ?>"<?php echo $reception->PRIMARY_CONSULTANT->editAttributes() ?>>
</span>
<?php echo $reception->PRIMARY_CONSULTANT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->CATEGORY->Visible) { // CATEGORY ?>
	<div id="r_CATEGORY" class="form-group row">
		<label id="elh_reception_CATEGORY" for="x_CATEGORY" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->CATEGORY->caption() ?><?php echo ($reception->CATEGORY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->CATEGORY->cellAttributes() ?>>
<span id="el_reception_CATEGORY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="reception" data-field="x_CATEGORY" data-value-separator="<?php echo $reception->CATEGORY->displayValueSeparatorAttribute() ?>" id="x_CATEGORY" name="x_CATEGORY"<?php echo $reception->CATEGORY->editAttributes() ?>>
		<?php echo $reception->CATEGORY->selectOptionListHtml("x_CATEGORY") ?>
	</select>
</div>
<?php echo $reception->CATEGORY->Lookup->getParamTag("p_x_CATEGORY") ?>
</span>
<?php echo $reception->CATEGORY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->PROCEDURE->Visible) { // PROCEDURE ?>
	<div id="r_PROCEDURE" class="form-group row">
		<label id="elh_reception_PROCEDURE" for="x_PROCEDURE" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->PROCEDURE->caption() ?><?php echo ($reception->PROCEDURE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->PROCEDURE->cellAttributes() ?>>
<span id="el_reception_PROCEDURE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="reception" data-field="x_PROCEDURE" data-value-separator="<?php echo $reception->PROCEDURE->displayValueSeparatorAttribute() ?>" id="x_PROCEDURE" name="x_PROCEDURE"<?php echo $reception->PROCEDURE->editAttributes() ?>>
		<?php echo $reception->PROCEDURE->selectOptionListHtml("x_PROCEDURE") ?>
	</select>
</div>
<?php echo $reception->PROCEDURE->Lookup->getParamTag("p_x_PROCEDURE") ?>
</span>
<?php echo $reception->PROCEDURE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_reception_Amount" for="x_Amount" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->Amount->caption() ?><?php echo ($reception->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->Amount->cellAttributes() ?>>
<span id="el_reception_Amount">
<input type="text" data-table="reception" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($reception->Amount->getPlaceHolder()) ?>" value="<?php echo $reception->Amount->EditValue ?>"<?php echo $reception->Amount->editAttributes() ?>>
</span>
<?php echo $reception->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
	<div id="r_MODE_OF_PAYMENT" class="form-group row">
		<label id="elh_reception_MODE_OF_PAYMENT" for="x_MODE_OF_PAYMENT" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->MODE_OF_PAYMENT->caption() ?><?php echo ($reception->MODE_OF_PAYMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el_reception_MODE_OF_PAYMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="reception" data-field="x_MODE_OF_PAYMENT" data-value-separator="<?php echo $reception->MODE_OF_PAYMENT->displayValueSeparatorAttribute() ?>" id="x_MODE_OF_PAYMENT" name="x_MODE_OF_PAYMENT"<?php echo $reception->MODE_OF_PAYMENT->editAttributes() ?>>
		<?php echo $reception->MODE_OF_PAYMENT->selectOptionListHtml("x_MODE_OF_PAYMENT") ?>
	</select>
</div>
<?php echo $reception->MODE_OF_PAYMENT->Lookup->getParamTag("p_x_MODE_OF_PAYMENT") ?>
</span>
<?php echo $reception->MODE_OF_PAYMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
	<div id="r_NEXT_REVIEW_DATE" class="form-group row">
		<label id="elh_reception_NEXT_REVIEW_DATE" for="x_NEXT_REVIEW_DATE" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->NEXT_REVIEW_DATE->caption() ?><?php echo ($reception->NEXT_REVIEW_DATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el_reception_NEXT_REVIEW_DATE">
<input type="text" data-table="reception" data-field="x_NEXT_REVIEW_DATE" name="x_NEXT_REVIEW_DATE" id="x_NEXT_REVIEW_DATE" placeholder="<?php echo HtmlEncode($reception->NEXT_REVIEW_DATE->getPlaceHolder()) ?>" value="<?php echo $reception->NEXT_REVIEW_DATE->EditValue ?>"<?php echo $reception->NEXT_REVIEW_DATE->editAttributes() ?>>
<?php if (!$reception->NEXT_REVIEW_DATE->ReadOnly && !$reception->NEXT_REVIEW_DATE->Disabled && !isset($reception->NEXT_REVIEW_DATE->EditAttrs["readonly"]) && !isset($reception->NEXT_REVIEW_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("freceptionadd", "x_NEXT_REVIEW_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $reception->NEXT_REVIEW_DATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($reception->REMARKS->Visible) { // REMARKS ?>
	<div id="r_REMARKS" class="form-group row">
		<label id="elh_reception_REMARKS" for="x_REMARKS" class="<?php echo $reception_add->LeftColumnClass ?>"><?php echo $reception->REMARKS->caption() ?><?php echo ($reception->REMARKS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $reception_add->RightColumnClass ?>"><div<?php echo $reception->REMARKS->cellAttributes() ?>>
<span id="el_reception_REMARKS">
<input type="text" data-table="reception" data-field="x_REMARKS" name="x_REMARKS" id="x_REMARKS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($reception->REMARKS->getPlaceHolder()) ?>" value="<?php echo $reception->REMARKS->EditValue ?>"<?php echo $reception->REMARKS->editAttributes() ?>>
</span>
<?php echo $reception->REMARKS->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$reception_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $reception_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $reception_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$reception_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$reception_add->terminate();
?>