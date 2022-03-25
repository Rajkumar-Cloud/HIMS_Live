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
$sys_days_edit = new sys_days_edit();

// Run the page
$sys_days_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_days_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsys_daysedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fsys_daysedit = currentForm = new ew.Form("fsys_daysedit", "edit");

	// Validate form
	fsys_daysedit.validate = function() {
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
			<?php if ($sys_days_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_days_edit->id->caption(), $sys_days_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($sys_days_edit->Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sys_days_edit->Days->caption(), $sys_days_edit->Days->RequiredErrorMessage)) ?>");
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
	fsys_daysedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsys_daysedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fsys_daysedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sys_days_edit->showPageHeader(); ?>
<?php
$sys_days_edit->showMessage();
?>
<form name="fsys_daysedit" id="fsys_daysedit" class="<?php echo $sys_days_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_days">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$sys_days_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($sys_days_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_sys_days_id" class="<?php echo $sys_days_edit->LeftColumnClass ?>"><?php echo $sys_days_edit->id->caption() ?><?php echo $sys_days_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_days_edit->RightColumnClass ?>"><div <?php echo $sys_days_edit->id->cellAttributes() ?>>
<span id="el_sys_days_id">
<span<?php echo $sys_days_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($sys_days_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="sys_days" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($sys_days_edit->id->CurrentValue) ?>">
<?php echo $sys_days_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sys_days_edit->Days->Visible) { // Days ?>
	<div id="r_Days" class="form-group row">
		<label id="elh_sys_days_Days" for="x_Days" class="<?php echo $sys_days_edit->LeftColumnClass ?>"><?php echo $sys_days_edit->Days->caption() ?><?php echo $sys_days_edit->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sys_days_edit->RightColumnClass ?>"><div <?php echo $sys_days_edit->Days->cellAttributes() ?>>
<span id="el_sys_days_Days">
<input type="text" data-table="sys_days" data-field="x_Days" name="x_Days" id="x_Days" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($sys_days_edit->Days->getPlaceHolder()) ?>" value="<?php echo $sys_days_edit->Days->EditValue ?>"<?php echo $sys_days_edit->Days->editAttributes() ?>>
</span>
<?php echo $sys_days_edit->Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sys_days_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sys_days_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_days_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sys_days_edit->showPageFooter();
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
$sys_days_edit->terminate();
?>