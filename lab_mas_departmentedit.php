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
$lab_mas_department_edit = new lab_mas_department_edit();

// Run the page
$lab_mas_department_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_department_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var flab_mas_departmentedit = currentForm = new ew.Form("flab_mas_departmentedit", "edit");

// Validate form
flab_mas_departmentedit.validate = function() {
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
		<?php if ($lab_mas_department_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_mas_department->id->caption(), $lab_mas_department->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_mas_department_edit->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_mas_department->Department->caption(), $lab_mas_department->Department->RequiredErrorMessage)) ?>");
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
flab_mas_departmentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_mas_departmentedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_mas_department_edit->showPageHeader(); ?>
<?php
$lab_mas_department_edit->showMessage();
?>
<form name="flab_mas_departmentedit" id="flab_mas_departmentedit" class="<?php echo $lab_mas_department_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_mas_department_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_mas_department_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_department">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_mas_department_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_mas_department->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_mas_department_id" class="<?php echo $lab_mas_department_edit->LeftColumnClass ?>"><?php echo $lab_mas_department->id->caption() ?><?php echo ($lab_mas_department->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_mas_department_edit->RightColumnClass ?>"><div<?php echo $lab_mas_department->id->cellAttributes() ?>>
<span id="el_lab_mas_department_id">
<span<?php echo $lab_mas_department->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_mas_department->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_mas_department" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_mas_department->id->CurrentValue) ?>">
<?php echo $lab_mas_department->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_mas_department->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_lab_mas_department_Department" for="x_Department" class="<?php echo $lab_mas_department_edit->LeftColumnClass ?>"><?php echo $lab_mas_department->Department->caption() ?><?php echo ($lab_mas_department->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_mas_department_edit->RightColumnClass ?>"><div<?php echo $lab_mas_department->Department->cellAttributes() ?>>
<span id="el_lab_mas_department_Department">
<input type="text" data-table="lab_mas_department" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_mas_department->Department->getPlaceHolder()) ?>" value="<?php echo $lab_mas_department->Department->EditValue ?>"<?php echo $lab_mas_department->Department->editAttributes() ?>>
</span>
<?php echo $lab_mas_department->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_mas_department_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_mas_department_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_mas_department_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_mas_department_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_mas_department_edit->terminate();
?>