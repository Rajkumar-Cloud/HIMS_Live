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
$lab_agerange_add = new lab_agerange_add();

// Run the page
$lab_agerange_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_agerange_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_agerangeadd = currentForm = new ew.Form("flab_agerangeadd", "add");

// Validate form
flab_agerangeadd.validate = function() {
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
		<?php if ($lab_agerange_add->testid->Required) { ?>
			elm = this.getElements("x" + infix + "_testid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->testid->caption(), $lab_agerange->testid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_testid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->testid->errorMessage()) ?>");
		<?php if ($lab_agerange_add->TestName->Required) { ?>
			elm = this.getElements("x" + infix + "_TestName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->TestName->caption(), $lab_agerange->TestName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Gender->caption(), $lab_agerange->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_add->MinAge->Required) { ?>
			elm = this.getElements("x" + infix + "_MinAge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MinAge->caption(), $lab_agerange->MinAge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinAge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->MinAge->errorMessage()) ?>");
		<?php if ($lab_agerange_add->MinAgeType->Required) { ?>
			elm = this.getElements("x" + infix + "_MinAgeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MinAgeType->caption(), $lab_agerange->MinAgeType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_add->MaxAge->Required) { ?>
			elm = this.getElements("x" + infix + "_MaxAge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MaxAge->caption(), $lab_agerange->MaxAge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MaxAge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->MaxAge->errorMessage()) ?>");
		<?php if ($lab_agerange_add->MaxAgeType->Required) { ?>
			elm = this.getElements("x" + infix + "_MaxAgeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MaxAgeType->caption(), $lab_agerange->MaxAgeType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_add->Value->Required) { ?>
			elm = this.getElements("x" + infix + "_Value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Value->caption(), $lab_agerange->Value->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_add->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Created->caption(), $lab_agerange->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_add->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->CreatedBy->caption(), $lab_agerange->CreatedBy->RequiredErrorMessage)) ?>");
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
flab_agerangeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_agerangeadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_agerangeadd.lists["x_Gender"] = <?php echo $lab_agerange_add->Gender->Lookup->toClientList() ?>;
flab_agerangeadd.lists["x_Gender"].options = <?php echo JsonEncode($lab_agerange_add->Gender->lookupOptions()) ?>;
flab_agerangeadd.lists["x_MinAgeType"] = <?php echo $lab_agerange_add->MinAgeType->Lookup->toClientList() ?>;
flab_agerangeadd.lists["x_MinAgeType"].options = <?php echo JsonEncode($lab_agerange_add->MinAgeType->options(FALSE, TRUE)) ?>;
flab_agerangeadd.lists["x_MaxAgeType"] = <?php echo $lab_agerange_add->MaxAgeType->Lookup->toClientList() ?>;
flab_agerangeadd.lists["x_MaxAgeType"].options = <?php echo JsonEncode($lab_agerange_add->MaxAgeType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_agerange_add->showPageHeader(); ?>
<?php
$lab_agerange_add->showMessage();
?>
<form name="flab_agerangeadd" id="flab_agerangeadd" class="<?php echo $lab_agerange_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_agerange_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_agerange_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_agerange">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_agerange_add->IsModal ?>">
<?php if ($lab_agerange->getCurrentMasterTable() == "lab_testname") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="lab_testname">
<input type="hidden" name="fk_id" value="<?php echo $lab_agerange->testid->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $lab_agerange->TestName->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_agerange->testid->Visible) { // testid ?>
	<div id="r_testid" class="form-group row">
		<label id="elh_lab_agerange_testid" for="x_testid" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->testid->caption() ?><?php echo ($lab_agerange->testid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->testid->cellAttributes() ?>>
<?php if ($lab_agerange->testid->getSessionValue() <> "") { ?>
<span id="el_lab_agerange_testid">
<span<?php echo $lab_agerange->testid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->testid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_testid" name="x_testid" value="<?php echo HtmlEncode($lab_agerange->testid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_lab_agerange_testid">
<input type="text" data-table="lab_agerange" data-field="x_testid" name="x_testid" id="x_testid" size="30" placeholder="<?php echo HtmlEncode($lab_agerange->testid->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->testid->EditValue ?>"<?php echo $lab_agerange->testid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $lab_agerange->testid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->TestName->Visible) { // TestName ?>
	<div id="r_TestName" class="form-group row">
		<label id="elh_lab_agerange_TestName" for="x_TestName" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->TestName->caption() ?><?php echo ($lab_agerange->TestName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->TestName->cellAttributes() ?>>
<?php if ($lab_agerange->TestName->getSessionValue() <> "") { ?>
<span id="el_lab_agerange_TestName">
<span<?php echo $lab_agerange->TestName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->TestName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_TestName" name="x_TestName" value="<?php echo HtmlEncode($lab_agerange->TestName->CurrentValue) ?>">
<?php } else { ?>
<span id="el_lab_agerange_TestName">
<input type="text" data-table="lab_agerange" data-field="x_TestName" name="x_TestName" id="x_TestName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->TestName->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->TestName->EditValue ?>"<?php echo $lab_agerange->TestName->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $lab_agerange->TestName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_lab_agerange_Gender" for="x_Gender" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->Gender->caption() ?><?php echo ($lab_agerange->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->Gender->cellAttributes() ?>>
<span id="el_lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x_Gender" name="x_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x_Gender") ?>
</span>
<?php echo $lab_agerange->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
	<div id="r_MinAge" class="form-group row">
		<label id="elh_lab_agerange_MinAge" for="x_MinAge" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->MinAge->caption() ?><?php echo ($lab_agerange->MinAge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->MinAge->cellAttributes() ?>>
<span id="el_lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x_MinAge" id="x_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<?php echo $lab_agerange->MinAge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
	<div id="r_MinAgeType" class="form-group row">
		<label id="elh_lab_agerange_MinAgeType" for="x_MinAgeType" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->MinAgeType->caption() ?><?php echo ($lab_agerange->MinAgeType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->MinAgeType->cellAttributes() ?>>
<span id="el_lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x_MinAgeType" name="x_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x_MinAgeType") ?>
	</select>
</div>
</span>
<?php echo $lab_agerange->MinAgeType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
	<div id="r_MaxAge" class="form-group row">
		<label id="elh_lab_agerange_MaxAge" for="x_MaxAge" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->MaxAge->caption() ?><?php echo ($lab_agerange->MaxAge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->MaxAge->cellAttributes() ?>>
<span id="el_lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x_MaxAge" id="x_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<?php echo $lab_agerange->MaxAge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
	<div id="r_MaxAgeType" class="form-group row">
		<label id="elh_lab_agerange_MaxAgeType" for="x_MaxAgeType" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->MaxAgeType->caption() ?><?php echo ($lab_agerange->MaxAgeType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->MaxAgeType->cellAttributes() ?>>
<span id="el_lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x_MaxAgeType" name="x_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x_MaxAgeType") ?>
	</select>
</div>
</span>
<?php echo $lab_agerange->MaxAgeType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
	<div id="r_Value" class="form-group row">
		<label id="elh_lab_agerange_Value" for="x_Value" class="<?php echo $lab_agerange_add->LeftColumnClass ?>"><?php echo $lab_agerange->Value->caption() ?><?php echo ($lab_agerange->Value->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_agerange_add->RightColumnClass ?>"><div<?php echo $lab_agerange->Value->cellAttributes() ?>>
<span id="el_lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x_Value" id="x_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<?php echo $lab_agerange->Value->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_agerange_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_agerange_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_agerange_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_agerange_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_agerange_add->terminate();
?>