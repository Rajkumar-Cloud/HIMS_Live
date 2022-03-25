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
$lab_drug_mast_edit = new lab_drug_mast_edit();

// Run the page
$lab_drug_mast_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var flab_drug_mastedit = currentForm = new ew.Form("flab_drug_mastedit", "edit");

// Validate form
flab_drug_mastedit.validate = function() {
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
		<?php if ($lab_drug_mast_edit->DrugName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrugName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->DrugName->caption(), $lab_drug_mast->DrugName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->Positive->Required) { ?>
			elm = this.getElements("x" + infix + "_Positive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->Positive->caption(), $lab_drug_mast->Positive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->Negative->Required) { ?>
			elm = this.getElements("x" + infix + "_Negative");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->Negative->caption(), $lab_drug_mast->Negative->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->ShortName->Required) { ?>
			elm = this.getElements("x" + infix + "_ShortName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->ShortName->caption(), $lab_drug_mast->ShortName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->GroupCD->Required) { ?>
			elm = this.getElements("x" + infix + "_GroupCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->GroupCD->caption(), $lab_drug_mast->GroupCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->Content->Required) { ?>
			elm = this.getElements("x" + infix + "_Content");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->Content->caption(), $lab_drug_mast->Content->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->Order->caption(), $lab_drug_mast->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_drug_mast->Order->errorMessage()) ?>");
		<?php if ($lab_drug_mast_edit->DrugCD->Required) { ?>
			elm = this.getElements("x" + infix + "_DrugCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->DrugCD->caption(), $lab_drug_mast->DrugCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_drug_mast_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_drug_mast->id->caption(), $lab_drug_mast->id->RequiredErrorMessage)) ?>");
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
flab_drug_mastedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_drug_mastedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_drug_mast_edit->showPageHeader(); ?>
<?php
$lab_drug_mast_edit->showMessage();
?>
<form name="flab_drug_mastedit" id="flab_drug_mastedit" class="<?php echo $lab_drug_mast_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_drug_mast_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_drug_mast_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_drug_mast_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_drug_mast->DrugName->Visible) { // DrugName ?>
	<div id="r_DrugName" class="form-group row">
		<label id="elh_lab_drug_mast_DrugName" for="x_DrugName" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->DrugName->caption() ?><?php echo ($lab_drug_mast->DrugName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->DrugName->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugName">
<input type="text" data-table="lab_drug_mast" data-field="x_DrugName" name="x_DrugName" id="x_DrugName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_drug_mast->DrugName->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->DrugName->EditValue ?>"<?php echo $lab_drug_mast->DrugName->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->DrugName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->Positive->Visible) { // Positive ?>
	<div id="r_Positive" class="form-group row">
		<label id="elh_lab_drug_mast_Positive" for="x_Positive" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->Positive->caption() ?><?php echo ($lab_drug_mast->Positive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->Positive->cellAttributes() ?>>
<span id="el_lab_drug_mast_Positive">
<input type="text" data-table="lab_drug_mast" data-field="x_Positive" name="x_Positive" id="x_Positive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_drug_mast->Positive->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->Positive->EditValue ?>"<?php echo $lab_drug_mast->Positive->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->Positive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->Negative->Visible) { // Negative ?>
	<div id="r_Negative" class="form-group row">
		<label id="elh_lab_drug_mast_Negative" for="x_Negative" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->Negative->caption() ?><?php echo ($lab_drug_mast->Negative->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->Negative->cellAttributes() ?>>
<span id="el_lab_drug_mast_Negative">
<input type="text" data-table="lab_drug_mast" data-field="x_Negative" name="x_Negative" id="x_Negative" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_drug_mast->Negative->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->Negative->EditValue ?>"<?php echo $lab_drug_mast->Negative->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->Negative->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_lab_drug_mast_ShortName" for="x_ShortName" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->ShortName->caption() ?><?php echo ($lab_drug_mast->ShortName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->ShortName->cellAttributes() ?>>
<span id="el_lab_drug_mast_ShortName">
<input type="text" data-table="lab_drug_mast" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_drug_mast->ShortName->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->ShortName->EditValue ?>"<?php echo $lab_drug_mast->ShortName->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->GroupCD->Visible) { // GroupCD ?>
	<div id="r_GroupCD" class="form-group row">
		<label id="elh_lab_drug_mast_GroupCD" for="x_GroupCD" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->GroupCD->caption() ?><?php echo ($lab_drug_mast->GroupCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->GroupCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_GroupCD">
<input type="text" data-table="lab_drug_mast" data-field="x_GroupCD" name="x_GroupCD" id="x_GroupCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_drug_mast->GroupCD->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->GroupCD->EditValue ?>"<?php echo $lab_drug_mast->GroupCD->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->GroupCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->Content->Visible) { // Content ?>
	<div id="r_Content" class="form-group row">
		<label id="elh_lab_drug_mast_Content" for="x_Content" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->Content->caption() ?><?php echo ($lab_drug_mast->Content->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->Content->cellAttributes() ?>>
<span id="el_lab_drug_mast_Content">
<input type="text" data-table="lab_drug_mast" data-field="x_Content" name="x_Content" id="x_Content" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_drug_mast->Content->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->Content->EditValue ?>"<?php echo $lab_drug_mast->Content->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->Content->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_lab_drug_mast_Order" for="x_Order" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->Order->caption() ?><?php echo ($lab_drug_mast->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->Order->cellAttributes() ?>>
<span id="el_lab_drug_mast_Order">
<input type="text" data-table="lab_drug_mast" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($lab_drug_mast->Order->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->Order->EditValue ?>"<?php echo $lab_drug_mast->Order->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->DrugCD->Visible) { // DrugCD ?>
	<div id="r_DrugCD" class="form-group row">
		<label id="elh_lab_drug_mast_DrugCD" for="x_DrugCD" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->DrugCD->caption() ?><?php echo ($lab_drug_mast->DrugCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->DrugCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugCD">
<input type="text" data-table="lab_drug_mast" data-field="x_DrugCD" name="x_DrugCD" id="x_DrugCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_drug_mast->DrugCD->getPlaceHolder()) ?>" value="<?php echo $lab_drug_mast->DrugCD->EditValue ?>"<?php echo $lab_drug_mast->DrugCD->editAttributes() ?>>
</span>
<?php echo $lab_drug_mast->DrugCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_drug_mast->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_drug_mast_id" class="<?php echo $lab_drug_mast_edit->LeftColumnClass ?>"><?php echo $lab_drug_mast->id->caption() ?><?php echo ($lab_drug_mast->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_drug_mast_edit->RightColumnClass ?>"><div<?php echo $lab_drug_mast->id->cellAttributes() ?>>
<span id="el_lab_drug_mast_id">
<span<?php echo $lab_drug_mast->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_drug_mast->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_drug_mast" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_drug_mast->id->CurrentValue) ?>">
<?php echo $lab_drug_mast->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_drug_mast_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_drug_mast_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_drug_mast_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_drug_mast_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_drug_mast_edit->terminate();
?>