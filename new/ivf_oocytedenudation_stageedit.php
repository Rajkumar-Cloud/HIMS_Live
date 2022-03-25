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
$ivf_oocytedenudation_stage_edit = new ivf_oocytedenudation_stage_edit();

// Run the page
$ivf_oocytedenudation_stage_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_oocytedenudation_stageedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_oocytedenudation_stageedit = currentForm = new ew.Form("fivf_oocytedenudation_stageedit", "edit");

	// Validate form
	fivf_oocytedenudation_stageedit.validate = function() {
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
			<?php if ($ivf_oocytedenudation_stage_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->id->caption(), $ivf_oocytedenudation_stage_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->RIDNo->caption(), $ivf_oocytedenudation_stage_edit->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_edit->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->Name->caption(), $ivf_oocytedenudation_stage_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->TidNo->caption(), $ivf_oocytedenudation_stage_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_edit->TidNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_edit->OidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_OidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->OidNo->caption(), $ivf_oocytedenudation_stage_edit->OidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_edit->OidNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_edit->OocyteNo->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->OocyteNo->caption(), $ivf_oocytedenudation_stage_edit->OocyteNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_edit->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->Stage->caption(), $ivf_oocytedenudation_stage_edit->Stage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_edit->ReMarks->Required) { ?>
				elm = this.getElements("x" + infix + "_ReMarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->ReMarks->caption(), $ivf_oocytedenudation_stage_edit->ReMarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->status->caption(), $ivf_oocytedenudation_stage_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_edit->status->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->modifiedby->caption(), $ivf_oocytedenudation_stage_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_edit->modifieddatetime->caption(), $ivf_oocytedenudation_stage_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	fivf_oocytedenudation_stageedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_oocytedenudation_stageedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_oocytedenudation_stageedit.lists["x_Stage"] = <?php echo $ivf_oocytedenudation_stage_edit->Stage->Lookup->toClientList($ivf_oocytedenudation_stage_edit) ?>;
	fivf_oocytedenudation_stageedit.lists["x_Stage"].options = <?php echo JsonEncode($ivf_oocytedenudation_stage_edit->Stage->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_oocytedenudation_stageedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_oocytedenudation_stage_edit->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_edit->showMessage();
?>
<form name="fivf_oocytedenudation_stageedit" id="fivf_oocytedenudation_stageedit" class="<?php echo $ivf_oocytedenudation_stage_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_stage_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($ivf_oocytedenudation_stage_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_id" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->id->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->id->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_id">
<span<?php echo $ivf_oocytedenudation_stage_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_stage_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->id->CurrentValue) ?>">
<?php echo $ivf_oocytedenudation_stage_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_RIDNo" for="x_RIDNo" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->RIDNo->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_RIDNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_Name" for="x_Name" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->Name->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Name">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->Name->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->Name->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_TidNo" for="x_TidNo" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->TidNo->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_TidNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->TidNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->OidNo->Visible) { // OidNo ?>
	<div id="r_OidNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_OidNo" for="x_OidNo" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->OidNo->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->OidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->OidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OidNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OidNo" name="x_OidNo" id="x_OidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->OidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->OidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->OidNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->OidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->OocyteNo->Visible) { // OocyteNo ?>
	<div id="r_OocyteNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_OocyteNo" for="x_OocyteNo" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->OocyteNo->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->OocyteNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->OocyteNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->OocyteNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_Stage" for="x_Stage" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->Stage->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->Stage->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage_edit->Stage->displayValueSeparatorAttribute() ?>" id="x_Stage" name="x_Stage"<?php echo $ivf_oocytedenudation_stage_edit->Stage->editAttributes() ?>>
			<?php echo $ivf_oocytedenudation_stage_edit->Stage->selectOptionListHtml("x_Stage") ?>
		</select>
</div>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->ReMarks->Visible) { // ReMarks ?>
	<div id="r_ReMarks" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_ReMarks" for="x_ReMarks" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->ReMarks->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->ReMarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->ReMarks->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x_ReMarks" id="x_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->ReMarks->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->ReMarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_status" for="x_status" class="<?php echo $ivf_oocytedenudation_stage_edit->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_edit->status->caption() ?><?php echo $ivf_oocytedenudation_stage_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_edit->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_edit->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_status">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_edit->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_edit->status->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_edit->status->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_oocytedenudation_stage_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_oocytedenudation_stage_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_stage_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_oocytedenudation_stage_edit->showPageFooter();
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
$ivf_oocytedenudation_stage_edit->terminate();
?>