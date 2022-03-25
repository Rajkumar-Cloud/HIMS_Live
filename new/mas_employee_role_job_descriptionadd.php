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
$mas_employee_role_job_description_add = new mas_employee_role_job_description_add();

// Run the page
$mas_employee_role_job_description_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_employee_role_job_description_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_employee_role_job_descriptionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_employee_role_job_descriptionadd = currentForm = new ew.Form("fmas_employee_role_job_descriptionadd", "add");

	// Validate form
	fmas_employee_role_job_descriptionadd.validate = function() {
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
			<?php if ($mas_employee_role_job_description_add->role->Required) { ?>
				elm = this.getElements("x" + infix + "_role");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description_add->role->caption(), $mas_employee_role_job_description_add->role->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_employee_role_job_description_add->job_description->Required) { ?>
				elm = this.getElements("x" + infix + "_job_description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description_add->job_description->caption(), $mas_employee_role_job_description_add->job_description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_employee_role_job_description_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description_add->status->caption(), $mas_employee_role_job_description_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_employee_role_job_description_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description_add->createdby->caption(), $mas_employee_role_job_description_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_employee_role_job_description_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_employee_role_job_description_add->createddatetime->caption(), $mas_employee_role_job_description_add->createddatetime->RequiredErrorMessage)) ?>");
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
	fmas_employee_role_job_descriptionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_employee_role_job_descriptionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_employee_role_job_descriptionadd.lists["x_status"] = <?php echo $mas_employee_role_job_description_add->status->Lookup->toClientList($mas_employee_role_job_description_add) ?>;
	fmas_employee_role_job_descriptionadd.lists["x_status"].options = <?php echo JsonEncode($mas_employee_role_job_description_add->status->lookupOptions()) ?>;
	loadjs.done("fmas_employee_role_job_descriptionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_employee_role_job_description_add->showPageHeader(); ?>
<?php
$mas_employee_role_job_description_add->showMessage();
?>
<form name="fmas_employee_role_job_descriptionadd" id="fmas_employee_role_job_descriptionadd" class="<?php echo $mas_employee_role_job_description_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_employee_role_job_description_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_employee_role_job_description_add->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_mas_employee_role_job_description_role" for="x_role" class="<?php echo $mas_employee_role_job_description_add->LeftColumnClass ?>"><?php echo $mas_employee_role_job_description_add->role->caption() ?><?php echo $mas_employee_role_job_description_add->role->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $mas_employee_role_job_description_add->role->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_role">
<input type="text" data-table="mas_employee_role_job_description" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($mas_employee_role_job_description_add->role->getPlaceHolder()) ?>" value="<?php echo $mas_employee_role_job_description_add->role->EditValue ?>"<?php echo $mas_employee_role_job_description_add->role->editAttributes() ?>>
</span>
<?php echo $mas_employee_role_job_description_add->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_employee_role_job_description_add->job_description->Visible) { // job_description ?>
	<div id="r_job_description" class="form-group row">
		<label id="elh_mas_employee_role_job_description_job_description" for="x_job_description" class="<?php echo $mas_employee_role_job_description_add->LeftColumnClass ?>"><?php echo $mas_employee_role_job_description_add->job_description->caption() ?><?php echo $mas_employee_role_job_description_add->job_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $mas_employee_role_job_description_add->job_description->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_job_description">
<input type="text" data-table="mas_employee_role_job_description" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($mas_employee_role_job_description_add->job_description->getPlaceHolder()) ?>" value="<?php echo $mas_employee_role_job_description_add->job_description->EditValue ?>"<?php echo $mas_employee_role_job_description_add->job_description->editAttributes() ?>>
</span>
<?php echo $mas_employee_role_job_description_add->job_description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_employee_role_job_description_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_mas_employee_role_job_description_status" for="x_status" class="<?php echo $mas_employee_role_job_description_add->LeftColumnClass ?>"><?php echo $mas_employee_role_job_description_add->status->caption() ?><?php echo $mas_employee_role_job_description_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_employee_role_job_description_add->RightColumnClass ?>"><div <?php echo $mas_employee_role_job_description_add->status->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_employee_role_job_description" data-field="x_status" data-value-separator="<?php echo $mas_employee_role_job_description_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $mas_employee_role_job_description_add->status->editAttributes() ?>>
			<?php echo $mas_employee_role_job_description_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $mas_employee_role_job_description_add->status->Lookup->getParamTag($mas_employee_role_job_description_add, "p_x_status") ?>
</span>
<?php echo $mas_employee_role_job_description_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_employee_role_job_description_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_employee_role_job_description_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_employee_role_job_description_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_employee_role_job_description_add->showPageFooter();
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
$mas_employee_role_job_description_add->terminate();
?>