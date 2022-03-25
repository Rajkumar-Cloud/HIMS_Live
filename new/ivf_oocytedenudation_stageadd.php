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
$ivf_oocytedenudation_stage_add = new ivf_oocytedenudation_stage_add();

// Run the page
$ivf_oocytedenudation_stage_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_oocytedenudation_stageadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_oocytedenudation_stageadd = currentForm = new ew.Form("fivf_oocytedenudation_stageadd", "add");

	// Validate form
	fivf_oocytedenudation_stageadd.validate = function() {
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
			<?php if ($ivf_oocytedenudation_stage_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->RIDNo->caption(), $ivf_oocytedenudation_stage_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->Name->caption(), $ivf_oocytedenudation_stage_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->TidNo->caption(), $ivf_oocytedenudation_stage_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_add->OidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_OidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->OidNo->caption(), $ivf_oocytedenudation_stage_add->OidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_add->OidNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_add->OocyteNo->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->OocyteNo->caption(), $ivf_oocytedenudation_stage_add->OocyteNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_add->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->Stage->caption(), $ivf_oocytedenudation_stage_add->Stage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_add->ReMarks->Required) { ?>
				elm = this.getElements("x" + infix + "_ReMarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->ReMarks->caption(), $ivf_oocytedenudation_stage_add->ReMarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->status->caption(), $ivf_oocytedenudation_stage_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_stage_add->status->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_stage_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->createdby->caption(), $ivf_oocytedenudation_stage_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_stage_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage_add->createddatetime->caption(), $ivf_oocytedenudation_stage_add->createddatetime->RequiredErrorMessage)) ?>");
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
	fivf_oocytedenudation_stageadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_oocytedenudation_stageadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_oocytedenudation_stageadd.lists["x_Stage"] = <?php echo $ivf_oocytedenudation_stage_add->Stage->Lookup->toClientList($ivf_oocytedenudation_stage_add) ?>;
	fivf_oocytedenudation_stageadd.lists["x_Stage"].options = <?php echo JsonEncode($ivf_oocytedenudation_stage_add->Stage->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_oocytedenudation_stageadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_oocytedenudation_stage_add->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_add->showMessage();
?>
<form name="fivf_oocytedenudation_stageadd" id="fivf_oocytedenudation_stageadd" class="<?php echo $ivf_oocytedenudation_stage_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_stage_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_oocytedenudation_stage_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_RIDNo" for="x_RIDNo" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->RIDNo->caption() ?><?php echo $ivf_oocytedenudation_stage_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_RIDNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->RIDNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_Name" for="x_Name" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->Name->caption() ?><?php echo $ivf_oocytedenudation_stage_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Name">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->Name->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->Name->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_TidNo" for="x_TidNo" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->TidNo->caption() ?><?php echo $ivf_oocytedenudation_stage_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_TidNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->TidNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->OidNo->Visible) { // OidNo ?>
	<div id="r_OidNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_OidNo" for="x_OidNo" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->OidNo->caption() ?><?php echo $ivf_oocytedenudation_stage_add->OidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->OidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OidNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OidNo" name="x_OidNo" id="x_OidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->OidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->OidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->OidNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->OidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->OocyteNo->Visible) { // OocyteNo ?>
	<div id="r_OocyteNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_OocyteNo" for="x_OocyteNo" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->OocyteNo->caption() ?><?php echo $ivf_oocytedenudation_stage_add->OocyteNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->OocyteNo->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->OocyteNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_Stage" for="x_Stage" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->Stage->caption() ?><?php echo $ivf_oocytedenudation_stage_add->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->Stage->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage_add->Stage->displayValueSeparatorAttribute() ?>" id="x_Stage" name="x_Stage"<?php echo $ivf_oocytedenudation_stage_add->Stage->editAttributes() ?>>
			<?php echo $ivf_oocytedenudation_stage_add->Stage->selectOptionListHtml("x_Stage") ?>
		</select>
</div>
</span>
<?php echo $ivf_oocytedenudation_stage_add->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->ReMarks->Visible) { // ReMarks ?>
	<div id="r_ReMarks" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_ReMarks" for="x_ReMarks" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->ReMarks->caption() ?><?php echo $ivf_oocytedenudation_stage_add->ReMarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->ReMarks->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x_ReMarks" id="x_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->ReMarks->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->ReMarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_oocytedenudation_stage_status" for="x_status" class="<?php echo $ivf_oocytedenudation_stage_add->LeftColumnClass ?>"><?php echo $ivf_oocytedenudation_stage_add->status->caption() ?><?php echo $ivf_oocytedenudation_stage_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_oocytedenudation_stage_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_stage_add->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_status">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage_add->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage_add->status->EditValue ?>"<?php echo $ivf_oocytedenudation_stage_add->status->editAttributes() ?>>
</span>
<?php echo $ivf_oocytedenudation_stage_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_oocytedenudation_stage_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_oocytedenudation_stage_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_stage_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_oocytedenudation_stage_add->showPageFooter();
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
$ivf_oocytedenudation_stage_add->terminate();
?>