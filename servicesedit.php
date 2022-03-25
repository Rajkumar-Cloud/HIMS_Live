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
$services_edit = new services_edit();

// Run the page
$services_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$services_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fservicesedit = currentForm = new ew.Form("fservicesedit", "edit");

// Validate form
fservicesedit.validate = function() {
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
		<?php if ($services_edit->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $services->Id->caption(), $services->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($services_edit->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $services->DEPARTMENT->caption(), $services->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($services_edit->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $services->SERVICE_TYPE->caption(), $services->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($services_edit->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $services->SERVICE->caption(), $services->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($services_edit->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $services->CODE->caption(), $services->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($services_edit->AMOUNT->Required) { ?>
			elm = this.getElements("x" + infix + "_AMOUNT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $services->AMOUNT->caption(), $services->AMOUNT->RequiredErrorMessage)) ?>");
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
fservicesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fservicesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $services_edit->showPageHeader(); ?>
<?php
$services_edit->showMessage();
?>
<form name="fservicesedit" id="fservicesedit" class="<?php echo $services_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($services_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $services_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$services_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($services->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_services_Id" class="<?php echo $services_edit->LeftColumnClass ?>"><?php echo $services->Id->caption() ?><?php echo ($services->Id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $services_edit->RightColumnClass ?>"><div<?php echo $services->Id->cellAttributes() ?>>
<span id="el_services_Id">
<span<?php echo $services->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($services->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="services" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($services->Id->CurrentValue) ?>">
<?php echo $services->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($services->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_services_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $services_edit->LeftColumnClass ?>"><?php echo $services->DEPARTMENT->caption() ?><?php echo ($services->DEPARTMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $services_edit->RightColumnClass ?>"><div<?php echo $services->DEPARTMENT->cellAttributes() ?>>
<span id="el_services_DEPARTMENT">
<input type="text" data-table="services" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($services->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $services->DEPARTMENT->EditValue ?>"<?php echo $services->DEPARTMENT->editAttributes() ?>>
</span>
<?php echo $services->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($services->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_services_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $services_edit->LeftColumnClass ?>"><?php echo $services->SERVICE_TYPE->caption() ?><?php echo ($services->SERVICE_TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $services_edit->RightColumnClass ?>"><div<?php echo $services->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_services_SERVICE_TYPE">
<input type="text" data-table="services" data-field="x_SERVICE_TYPE" name="x_SERVICE_TYPE" id="x_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($services->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $services->SERVICE_TYPE->EditValue ?>"<?php echo $services->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php echo $services->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($services->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_services_SERVICE" for="x_SERVICE" class="<?php echo $services_edit->LeftColumnClass ?>"><?php echo $services->SERVICE->caption() ?><?php echo ($services->SERVICE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $services_edit->RightColumnClass ?>"><div<?php echo $services->SERVICE->cellAttributes() ?>>
<span id="el_services_SERVICE">
<input type="text" data-table="services" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($services->SERVICE->getPlaceHolder()) ?>" value="<?php echo $services->SERVICE->EditValue ?>"<?php echo $services->SERVICE->editAttributes() ?>>
</span>
<?php echo $services->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($services->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_services_CODE" for="x_CODE" class="<?php echo $services_edit->LeftColumnClass ?>"><?php echo $services->CODE->caption() ?><?php echo ($services->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $services_edit->RightColumnClass ?>"><div<?php echo $services->CODE->cellAttributes() ?>>
<span id="el_services_CODE">
<input type="text" data-table="services" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($services->CODE->getPlaceHolder()) ?>" value="<?php echo $services->CODE->EditValue ?>"<?php echo $services->CODE->editAttributes() ?>>
</span>
<?php echo $services->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($services->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_services_AMOUNT" for="x_AMOUNT" class="<?php echo $services_edit->LeftColumnClass ?>"><?php echo $services->AMOUNT->caption() ?><?php echo ($services->AMOUNT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $services_edit->RightColumnClass ?>"><div<?php echo $services->AMOUNT->cellAttributes() ?>>
<span id="el_services_AMOUNT">
<input type="text" data-table="services" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($services->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $services->AMOUNT->EditValue ?>"<?php echo $services->AMOUNT->editAttributes() ?>>
</span>
<?php echo $services->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$services_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $services_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $services_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$services_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$services_edit->terminate();
?>