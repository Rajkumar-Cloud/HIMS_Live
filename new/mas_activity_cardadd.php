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
$mas_activity_card_add = new mas_activity_card_add();

// Run the page
$mas_activity_card_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_activity_cardadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_activity_cardadd = currentForm = new ew.Form("fmas_activity_cardadd", "add");

	// Validate form
	fmas_activity_cardadd.validate = function() {
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
			<?php if ($mas_activity_card_add->Activity->Required) { ?>
				elm = this.getElements("x" + infix + "_Activity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_add->Activity->caption(), $mas_activity_card_add->Activity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_add->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_add->Type->caption(), $mas_activity_card_add->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_add->Units->Required) { ?>
				elm = this.getElements("x" + infix + "_Units");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_add->Units->caption(), $mas_activity_card_add->Units->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_activity_card_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_add->Amount->caption(), $mas_activity_card_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($mas_activity_card_add->Amount->errorMessage()) ?>");
			<?php if ($mas_activity_card_add->Selected->Required) { ?>
				elm = this.getElements("x" + infix + "_Selected[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card_add->Selected->caption(), $mas_activity_card_add->Selected->RequiredErrorMessage)) ?>");
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
	fmas_activity_cardadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_activity_cardadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_activity_cardadd.lists["x_Selected[]"] = <?php echo $mas_activity_card_add->Selected->Lookup->toClientList($mas_activity_card_add) ?>;
	fmas_activity_cardadd.lists["x_Selected[]"].options = <?php echo JsonEncode($mas_activity_card_add->Selected->options(FALSE, TRUE)) ?>;
	loadjs.done("fmas_activity_cardadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_activity_card_add->showPageHeader(); ?>
<?php
$mas_activity_card_add->showMessage();
?>
<form name="fmas_activity_cardadd" id="fmas_activity_cardadd" class="<?php echo $mas_activity_card_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_activity_card_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_activity_card_add->Activity->Visible) { // Activity ?>
	<div id="r_Activity" class="form-group row">
		<label id="elh_mas_activity_card_Activity" for="x_Activity" class="<?php echo $mas_activity_card_add->LeftColumnClass ?>"><?php echo $mas_activity_card_add->Activity->caption() ?><?php echo $mas_activity_card_add->Activity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_add->RightColumnClass ?>"><div <?php echo $mas_activity_card_add->Activity->cellAttributes() ?>>
<span id="el_mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x_Activity" id="x_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_add->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_add->Activity->EditValue ?>"<?php echo $mas_activity_card_add->Activity->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_add->Activity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_add->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_mas_activity_card_Type" for="x_Type" class="<?php echo $mas_activity_card_add->LeftColumnClass ?>"><?php echo $mas_activity_card_add->Type->caption() ?><?php echo $mas_activity_card_add->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_add->RightColumnClass ?>"><div <?php echo $mas_activity_card_add->Type->cellAttributes() ?>>
<span id="el_mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_add->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_add->Type->EditValue ?>"<?php echo $mas_activity_card_add->Type->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_add->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_add->Units->Visible) { // Units ?>
	<div id="r_Units" class="form-group row">
		<label id="elh_mas_activity_card_Units" for="x_Units" class="<?php echo $mas_activity_card_add->LeftColumnClass ?>"><?php echo $mas_activity_card_add->Units->caption() ?><?php echo $mas_activity_card_add->Units->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_add->RightColumnClass ?>"><div <?php echo $mas_activity_card_add->Units->cellAttributes() ?>>
<span id="el_mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x_Units" id="x_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card_add->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_add->Units->EditValue ?>"<?php echo $mas_activity_card_add->Units->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_add->Units->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_mas_activity_card_Amount" for="x_Amount" class="<?php echo $mas_activity_card_add->LeftColumnClass ?>"><?php echo $mas_activity_card_add->Amount->caption() ?><?php echo $mas_activity_card_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_add->RightColumnClass ?>"><div <?php echo $mas_activity_card_add->Amount->cellAttributes() ?>>
<span id="el_mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card_add->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card_add->Amount->EditValue ?>"<?php echo $mas_activity_card_add->Amount->editAttributes() ?>>
</span>
<?php echo $mas_activity_card_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_activity_card_add->Selected->Visible) { // Selected ?>
	<div id="r_Selected" class="form-group row">
		<label id="elh_mas_activity_card_Selected" class="<?php echo $mas_activity_card_add->LeftColumnClass ?>"><?php echo $mas_activity_card_add->Selected->caption() ?><?php echo $mas_activity_card_add->Selected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_activity_card_add->RightColumnClass ?>"><div <?php echo $mas_activity_card_add->Selected->cellAttributes() ?>>
<span id="el_mas_activity_card_Selected">
<div id="tp_x_Selected" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card_add->Selected->displayValueSeparatorAttribute() ?>" name="x_Selected[]" id="x_Selected[]" value="{value}"<?php echo $mas_activity_card_add->Selected->editAttributes() ?>></div>
<div id="dsl_x_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card_add->Selected->checkBoxListHtml(FALSE, "x_Selected[]") ?>
</div></div>
</span>
<?php echo $mas_activity_card_add->Selected->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_activity_card_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_activity_card_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_activity_card_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_activity_card_add->showPageFooter();
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
$mas_activity_card_add->terminate();
?>