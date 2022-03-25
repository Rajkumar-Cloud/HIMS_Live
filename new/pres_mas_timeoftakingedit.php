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
$pres_mas_timeoftaking_edit = new pres_mas_timeoftaking_edit();

// Run the page
$pres_mas_timeoftaking_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_timeoftaking_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_mas_timeoftakingedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_mas_timeoftakingedit = currentForm = new ew.Form("fpres_mas_timeoftakingedit", "edit");

	// Validate form
	fpres_mas_timeoftakingedit.validate = function() {
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
			<?php if ($pres_mas_timeoftaking_edit->ID->Required) { ?>
				elm = this.getElements("x" + infix + "_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_timeoftaking_edit->ID->caption(), $pres_mas_timeoftaking_edit->ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_mas_timeoftaking_edit->Time_Of_Taking->Required) { ?>
				elm = this.getElements("x" + infix + "_Time_Of_Taking");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_mas_timeoftaking_edit->Time_Of_Taking->caption(), $pres_mas_timeoftaking_edit->Time_Of_Taking->RequiredErrorMessage)) ?>");
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
	fpres_mas_timeoftakingedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_mas_timeoftakingedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_mas_timeoftakingedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_mas_timeoftaking_edit->showPageHeader(); ?>
<?php
$pres_mas_timeoftaking_edit->showMessage();
?>
<form name="fpres_mas_timeoftakingedit" id="fpres_mas_timeoftakingedit" class="<?php echo $pres_mas_timeoftaking_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_timeoftaking_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_mas_timeoftaking_edit->ID->Visible) { // ID ?>
	<div id="r_ID" class="form-group row">
		<label id="elh_pres_mas_timeoftaking_ID" class="<?php echo $pres_mas_timeoftaking_edit->LeftColumnClass ?>"><?php echo $pres_mas_timeoftaking_edit->ID->caption() ?><?php echo $pres_mas_timeoftaking_edit->ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_timeoftaking_edit->RightColumnClass ?>"><div <?php echo $pres_mas_timeoftaking_edit->ID->cellAttributes() ?>>
<span id="el_pres_mas_timeoftaking_ID">
<span<?php echo $pres_mas_timeoftaking_edit->ID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_mas_timeoftaking_edit->ID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_mas_timeoftaking" data-field="x_ID" name="x_ID" id="x_ID" value="<?php echo HtmlEncode($pres_mas_timeoftaking_edit->ID->CurrentValue) ?>">
<?php echo $pres_mas_timeoftaking_edit->ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_mas_timeoftaking_edit->Time_Of_Taking->Visible) { // Time Of Taking ?>
	<div id="r_Time_Of_Taking" class="form-group row">
		<label id="elh_pres_mas_timeoftaking_Time_Of_Taking" for="x_Time_Of_Taking" class="<?php echo $pres_mas_timeoftaking_edit->LeftColumnClass ?>"><?php echo $pres_mas_timeoftaking_edit->Time_Of_Taking->caption() ?><?php echo $pres_mas_timeoftaking_edit->Time_Of_Taking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_mas_timeoftaking_edit->RightColumnClass ?>"><div <?php echo $pres_mas_timeoftaking_edit->Time_Of_Taking->cellAttributes() ?>>
<span id="el_pres_mas_timeoftaking_Time_Of_Taking">
<input type="text" data-table="pres_mas_timeoftaking" data-field="x_Time_Of_Taking" name="x_Time_Of_Taking" id="x_Time_Of_Taking" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_mas_timeoftaking_edit->Time_Of_Taking->getPlaceHolder()) ?>" value="<?php echo $pres_mas_timeoftaking_edit->Time_Of_Taking->EditValue ?>"<?php echo $pres_mas_timeoftaking_edit->Time_Of_Taking->editAttributes() ?>>
</span>
<?php echo $pres_mas_timeoftaking_edit->Time_Of_Taking->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_mas_timeoftaking_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_mas_timeoftaking_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_timeoftaking_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_mas_timeoftaking_edit->showPageFooter();
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
$pres_mas_timeoftaking_edit->terminate();
?>