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
$mas_billing_department_edit = new mas_billing_department_edit();

// Run the page
$mas_billing_department_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_billing_department_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_billing_departmentedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_billing_departmentedit = currentForm = new ew.Form("fmas_billing_departmentedit", "edit");

	// Validate form
	fmas_billing_departmentedit.validate = function() {
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
			<?php if ($mas_billing_department_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_billing_department_edit->id->caption(), $mas_billing_department_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_billing_department_edit->department->Required) { ?>
				elm = this.getElements("x" + infix + "_department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_billing_department_edit->department->caption(), $mas_billing_department_edit->department->RequiredErrorMessage)) ?>");
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
	fmas_billing_departmentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_billing_departmentedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_billing_departmentedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_billing_department_edit->showPageHeader(); ?>
<?php
$mas_billing_department_edit->showMessage();
?>
<form name="fmas_billing_departmentedit" id="fmas_billing_departmentedit" class="<?php echo $mas_billing_department_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_billing_department">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_billing_department_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_billing_department_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_billing_department_id" class="<?php echo $mas_billing_department_edit->LeftColumnClass ?>"><?php echo $mas_billing_department_edit->id->caption() ?><?php echo $mas_billing_department_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_billing_department_edit->RightColumnClass ?>"><div <?php echo $mas_billing_department_edit->id->cellAttributes() ?>>
<span id="el_mas_billing_department_id">
<span<?php echo $mas_billing_department_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_billing_department_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_billing_department" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_billing_department_edit->id->CurrentValue) ?>">
<?php echo $mas_billing_department_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_billing_department_edit->department->Visible) { // department ?>
	<div id="r_department" class="form-group row">
		<label id="elh_mas_billing_department_department" for="x_department" class="<?php echo $mas_billing_department_edit->LeftColumnClass ?>"><?php echo $mas_billing_department_edit->department->caption() ?><?php echo $mas_billing_department_edit->department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_billing_department_edit->RightColumnClass ?>"><div <?php echo $mas_billing_department_edit->department->cellAttributes() ?>>
<span id="el_mas_billing_department_department">
<input type="text" data-table="mas_billing_department" data-field="x_department" name="x_department" id="x_department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_billing_department_edit->department->getPlaceHolder()) ?>" value="<?php echo $mas_billing_department_edit->department->EditValue ?>"<?php echo $mas_billing_department_edit->department->editAttributes() ?>>
</span>
<?php echo $mas_billing_department_edit->department->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_billing_department_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_billing_department_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_billing_department_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_billing_department_edit->showPageFooter();
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
$mas_billing_department_edit->terminate();
?>