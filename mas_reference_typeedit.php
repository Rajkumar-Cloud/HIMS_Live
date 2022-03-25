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
$mas_reference_type_edit = new mas_reference_type_edit();

// Run the page
$mas_reference_type_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_reference_typeedit = currentForm = new ew.Form("fmas_reference_typeedit", "edit");

// Validate form
fmas_reference_typeedit.validate = function() {
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
		<?php if ($mas_reference_type_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->id->caption(), $mas_reference_type->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_edit->reference->Required) { ?>
			elm = this.getElements("x" + infix + "_reference");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->reference->caption(), $mas_reference_type->reference->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_edit->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->ReferMobileNo->caption(), $mas_reference_type->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_edit->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->ReferClinicname->caption(), $mas_reference_type->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_edit->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->ReferCity->caption(), $mas_reference_type->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->HospID->caption(), $mas_reference_type->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_reference_type->HospID->errorMessage()) ?>");
		<?php if ($mas_reference_type_edit->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->_email->caption(), $mas_reference_type->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_reference_type_edit->whatapp->Required) { ?>
			elm = this.getElements("x" + infix + "_whatapp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_reference_type->whatapp->caption(), $mas_reference_type->whatapp->RequiredErrorMessage)) ?>");
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
fmas_reference_typeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_reference_typeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_reference_type_edit->showPageHeader(); ?>
<?php
$mas_reference_type_edit->showMessage();
?>
<form name="fmas_reference_typeedit" id="fmas_reference_typeedit" class="<?php echo $mas_reference_type_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_reference_type_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_reference_type_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_reference_type_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_reference_type->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_reference_type_id" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->id->caption() ?><?php echo ($mas_reference_type->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->id->cellAttributes() ?>>
<span id="el_mas_reference_type_id">
<span<?php echo $mas_reference_type->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_reference_type->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_reference_type" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_reference_type->id->CurrentValue) ?>">
<?php echo $mas_reference_type->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->reference->Visible) { // reference ?>
	<div id="r_reference" class="form-group row">
		<label id="elh_mas_reference_type_reference" for="x_reference" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->reference->caption() ?><?php echo ($mas_reference_type->reference->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<input type="text" data-table="mas_reference_type" data-field="x_reference" name="x_reference" id="x_reference" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->reference->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->reference->EditValue ?>"<?php echo $mas_reference_type->reference->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->reference->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_mas_reference_type_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->ReferMobileNo->caption() ?><?php echo ($mas_reference_type->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<input type="text" data-table="mas_reference_type" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->ReferMobileNo->EditValue ?>"<?php echo $mas_reference_type->ReferMobileNo->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_mas_reference_type_ReferClinicname" for="x_ReferClinicname" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->ReferClinicname->caption() ?><?php echo ($mas_reference_type->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<input type="text" data-table="mas_reference_type" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->ReferClinicname->EditValue ?>"<?php echo $mas_reference_type->ReferClinicname->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_mas_reference_type_ReferCity" for="x_ReferCity" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->ReferCity->caption() ?><?php echo ($mas_reference_type->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<input type="text" data-table="mas_reference_type" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->ReferCity->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->ReferCity->EditValue ?>"<?php echo $mas_reference_type->ReferCity->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_mas_reference_type_HospID" for="x_HospID" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->HospID->caption() ?><?php echo ($mas_reference_type->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->HospID->cellAttributes() ?>>
<span id="el_mas_reference_type_HospID">
<input type="text" data-table="mas_reference_type" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($mas_reference_type->HospID->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->HospID->EditValue ?>"<?php echo $mas_reference_type->HospID->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_mas_reference_type__email" for="x__email" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->_email->caption() ?><?php echo ($mas_reference_type->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->_email->cellAttributes() ?>>
<span id="el_mas_reference_type__email">
<input type="text" data-table="mas_reference_type" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->_email->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->_email->EditValue ?>"<?php echo $mas_reference_type->_email->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
	<div id="r_whatapp" class="form-group row">
		<label id="elh_mas_reference_type_whatapp" for="x_whatapp" class="<?php echo $mas_reference_type_edit->LeftColumnClass ?>"><?php echo $mas_reference_type->whatapp->caption() ?><?php echo ($mas_reference_type->whatapp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_reference_type_edit->RightColumnClass ?>"><div<?php echo $mas_reference_type->whatapp->cellAttributes() ?>>
<span id="el_mas_reference_type_whatapp">
<input type="text" data-table="mas_reference_type" data-field="x_whatapp" name="x_whatapp" id="x_whatapp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_reference_type->whatapp->getPlaceHolder()) ?>" value="<?php echo $mas_reference_type->whatapp->EditValue ?>"<?php echo $mas_reference_type->whatapp->editAttributes() ?>>
</span>
<?php echo $mas_reference_type->whatapp->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_reference_type_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_reference_type_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_reference_type_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_reference_type_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_reference_type_edit->terminate();
?>