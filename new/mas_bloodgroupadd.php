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
$mas_bloodgroup_add = new mas_bloodgroup_add();

// Run the page
$mas_bloodgroup_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_bloodgroup_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_bloodgroupadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_bloodgroupadd = currentForm = new ew.Form("fmas_bloodgroupadd", "add");

	// Validate form
	fmas_bloodgroupadd.validate = function() {
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
			<?php if ($mas_bloodgroup_add->BloodGroup->Required) { ?>
				elm = this.getElements("x" + infix + "_BloodGroup");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_bloodgroup_add->BloodGroup->caption(), $mas_bloodgroup_add->BloodGroup->RequiredErrorMessage)) ?>");
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
	fmas_bloodgroupadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_bloodgroupadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fmas_bloodgroupadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_bloodgroup_add->showPageHeader(); ?>
<?php
$mas_bloodgroup_add->showMessage();
?>
<form name="fmas_bloodgroupadd" id="fmas_bloodgroupadd" class="<?php echo $mas_bloodgroup_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_bloodgroup">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_bloodgroup_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_bloodgroup_add->BloodGroup->Visible) { // BloodGroup ?>
	<div id="r_BloodGroup" class="form-group row">
		<label id="elh_mas_bloodgroup_BloodGroup" for="x_BloodGroup" class="<?php echo $mas_bloodgroup_add->LeftColumnClass ?>"><?php echo $mas_bloodgroup_add->BloodGroup->caption() ?><?php echo $mas_bloodgroup_add->BloodGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_bloodgroup_add->RightColumnClass ?>"><div <?php echo $mas_bloodgroup_add->BloodGroup->cellAttributes() ?>>
<span id="el_mas_bloodgroup_BloodGroup">
<input type="text" data-table="mas_bloodgroup" data-field="x_BloodGroup" name="x_BloodGroup" id="x_BloodGroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_bloodgroup_add->BloodGroup->getPlaceHolder()) ?>" value="<?php echo $mas_bloodgroup_add->BloodGroup->EditValue ?>"<?php echo $mas_bloodgroup_add->BloodGroup->editAttributes() ?>>
</span>
<?php echo $mas_bloodgroup_add->BloodGroup->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_bloodgroup_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_bloodgroup_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_bloodgroup_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_bloodgroup_add->showPageFooter();
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
$mas_bloodgroup_add->terminate();
?>