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
$mas_activity_card_edit = new mas_activity_card_edit();

// Run the page
$mas_activity_card_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_activity_cardedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_activity_cardedit = currentForm = new ew.Form("fmas_activity_cardedit", "edit");

	// Validate form
	fmas_activity_cardedit.validate = function() {
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
			<?php if ($mas_activity_card_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_edit->id->caption(), $mas_activity_card_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_edit->Activity->Required) { ?>
				elm = this.getElements("x" + infix + "_Activity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_edit->Activity->caption(), $mas_activity_card_edit->Activity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_edit->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_edit->Type->caption(), $mas_activity_card_edit->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_edit->Units->Required) { ?>
				elm = this.getElements("x" + infix + "_Units");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_edit->Units->caption(), $mas_activity_card_edit->Units->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_edit->Amount->caption(), $mas_activity_card_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_activity_card_edit->Amount->errorMessage()) ?>");
			<?php if ($mas_activity_card_edit->Selected->Required) { ?>
				elm = this.getElements("x" + infix + "_Selected[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_edit->Selected->caption(), $mas_activity_card_edit->Selected->RequiredErrorMessage)) ?>");
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
	fmas_activity_cardedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_activity_cardedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_activity_cardedit.lists["x_Selected[]"] = <?php echo $mas_activity_card_edit->Selected->Lookup->toClientList($mas_activity_card_edit) ?>;
	fmas_activity_cardedit.lists["x_Selected[]"].options = <?php echo JsonEncode($mas_activity_card_edit->Selected->options(FALSE, TRUE)) ?>;
	loadjs.done("fmas_activity_cardedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_activity_card_edit->showPageHeader(); ?>
<?php
$mas_activity_card_edit->showMessage();
?>
<form name="fmas_activity_cardedit" id="fmas_activity_cardedit" class="<?php echo $mas_activity_card_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_activity_card_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_activity_card_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_activity_card_id" class="<?php echo $mas_activity_card_edit->LeftColumnClass ?>"><?php echo $mas_activity_card_edit->id->caption() ?><?php echo $mas_activity_card_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_edit->RightColumnClass ?>"><div <?php echo $mas_activity_card_edit->id->cellAttributes() ?>>
<span id="el_mas_activity_card_id">
<span<?php echo $mas_activity_card_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_activity_card_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_activity_card_edit->id->CurrentValue) ?>">
<?php echo $mas_activity_card_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_edit->Activity->Visible) { // Activity ?>
	<div id="r_Activity" class="form-group row">
		<label id="elh_mas_activity_card_Activity" for="x_Activity" class="<?php echo $mas_activity_card_edit->LeftColumnClass ?>"><?php echo $mas_activity_card_edit->Activity->caption() ?><?php echo $mas_activity_card_edit->Activity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_edit->RightColumnClass ?>"><div <?php echo $mas_activity_card_edit->Activity->cellAttributes() ?>>
<span id="el_mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x_Activity" id="x_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_edit->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_edit->Activity->EditValue ?>"<?php echo $mas_activity_card_edit->Activity->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_edit->Activity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_edit->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_mas_activity_card_Type" for="x_Type" class="<?php echo $mas_activity_card_edit->LeftColumnClass ?>"><?php echo $mas_activity_card_edit->Type->caption() ?><?php echo $mas_activity_card_edit->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_edit->RightColumnClass ?>"><div <?php echo $mas_activity_card_edit->Type->cellAttributes() ?>>
<span id="el_mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_edit->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_edit->Type->EditValue ?>"<?php echo $mas_activity_card_edit->Type->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_edit->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_edit->Units->Visible) { // Units ?>
	<div id="r_Units" class="form-group row">
		<label id="elh_mas_activity_card_Units" for="x_Units" class="<?php echo $mas_activity_card_edit->LeftColumnClass ?>"><?php echo $mas_activity_card_edit->Units->caption() ?><?php echo $mas_activity_card_edit->Units->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_edit->RightColumnClass ?>"><div <?php echo $mas_activity_card_edit->Units->cellAttributes() ?>>
<span id="el_mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x_Units" id="x_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_edit->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_edit->Units->EditValue ?>"<?php echo $mas_activity_card_edit->Units->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_edit->Units->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_mas_activity_card_Amount" for="x_Amount" class="<?php echo $mas_activity_card_edit->LeftColumnClass ?>"><?php echo $mas_activity_card_edit->Amount->caption() ?><?php echo $mas_activity_card_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_edit->RightColumnClass ?>"><div <?php echo $mas_activity_card_edit->Amount->cellAttributes() ?>>
<span id="el_mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_edit->Amount->EditValue ?>"<?php echo $mas_activity_card_edit->Amount->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_edit->Selected->Visible) { // Selected ?>
	<div id="r_Selected" class="form-group row">
		<label id="elh_mas_activity_card_Selected" class="<?php echo $mas_activity_card_edit->LeftColumnClass ?>"><?php echo $mas_activity_card_edit->Selected->caption() ?><?php echo $mas_activity_card_edit->Selected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_edit->RightColumnClass ?>"><div <?php echo $mas_activity_card_edit->Selected->cellAttributes() ?>>
<span id="el_mas_activity_card_Selected">
<div id="tp_x_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card_edit->Selected->displayValueSeparatorAttribute() ?>" name="x_Selected[]" id="x_Selected[]" value="{value}"<?php echo $mas_activity_card_edit->Selected->editAttributes() ?>></div>
<div id="dsl_x_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card_edit->Selected->checkBoxListHtml(FALSE, "x_Selected[]") ?>
</div></div>
</span>
<?php echo $mas_activity_card_edit->Selected->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_activity_card_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_activity_card_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_activity_card_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_activity_card_edit->showPageFooter();
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
$mas_activity_card_edit->terminate();
?>