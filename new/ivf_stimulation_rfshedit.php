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
$ivf_stimulation_rfsh_edit = new ivf_stimulation_rfsh_edit();

// Run the page
$ivf_stimulation_rfsh_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_rfsh_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_stimulation_rfshedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_stimulation_rfshedit = currentForm = new ew.Form("fivf_stimulation_rfshedit", "edit");

	// Validate form
	fivf_stimulation_rfshedit.validate = function() {
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
			<?php if ($ivf_stimulation_rfsh_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_rfsh_edit->id->caption(), $ivf_stimulation_rfsh_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_rfsh_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_rfsh_edit->Name->caption(), $ivf_stimulation_rfsh_edit->Name->RequiredErrorMessage)) ?>");
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
	fivf_stimulation_rfshedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_stimulation_rfshedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_stimulation_rfshedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_stimulation_rfsh_edit->showPageHeader(); ?>
<?php
$ivf_stimulation_rfsh_edit->showMessage();
?>
<form name="fivf_stimulation_rfshedit" id="fivf_stimulation_rfshedit" class="<?php echo $ivf_stimulation_rfsh_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_rfsh">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_rfsh_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_stimulation_rfsh_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_stimulation_rfsh_id" class="<?php echo $ivf_stimulation_rfsh_edit->LeftColumnClass ?>"><?php echo $ivf_stimulation_rfsh_edit->id->caption() ?><?php echo $ivf_stimulation_rfsh_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_stimulation_rfsh_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_rfsh_edit->id->cellAttributes() ?>>
<span id="el_ivf_stimulation_rfsh_id">
<span<?php echo $ivf_stimulation_rfsh_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_rfsh_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_stimulation_rfsh" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_stimulation_rfsh_edit->id->CurrentValue) ?>">
<?php echo $ivf_stimulation_rfsh_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_rfsh_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_stimulation_rfsh_Name" for="x_Name" class="<?php echo $ivf_stimulation_rfsh_edit->LeftColumnClass ?>"><?php echo $ivf_stimulation_rfsh_edit->Name->caption() ?><?php echo $ivf_stimulation_rfsh_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_stimulation_rfsh_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_rfsh_edit->Name->cellAttributes() ?>>
<span id="el_ivf_stimulation_rfsh_Name">
<input type="text" data-table="ivf_stimulation_rfsh" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($ivf_stimulation_rfsh_edit->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_rfsh_edit->Name->EditValue ?>"<?php echo $ivf_stimulation_rfsh_edit->Name->editAttributes() ?>>
</span>
<?php echo $ivf_stimulation_rfsh_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_stimulation_rfsh_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_stimulation_rfsh_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_rfsh_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_stimulation_rfsh_edit->showPageFooter();
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
$ivf_stimulation_rfsh_edit->terminate();
?>