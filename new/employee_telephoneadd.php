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
$employee_telephone_add = new employee_telephone_add();

// Run the page
$employee_telephone_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_telephone_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var femployee_telephoneadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	femployee_telephoneadd = currentForm = new ew.Form("femployee_telephoneadd", "add");

	// Validate form
	femployee_telephoneadd.validate = function() {
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
			<?php if ($employee_telephone_add->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->employee_id->caption(), $employee_telephone_add->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_telephone_add->tele_type->Required) { ?>
				elm = this.getElements("x" + infix + "_tele_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->tele_type->caption(), $employee_telephone_add->tele_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_telephone_add->telephone->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->telephone->caption(), $employee_telephone_add->telephone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_telephone_add->telephone_type->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->telephone_type->caption(), $employee_telephone_add->telephone_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_telephone_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->status->caption(), $employee_telephone_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_telephone_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->createdby->caption(), $employee_telephone_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_telephone_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone_add->createddatetime->caption(), $employee_telephone_add->createddatetime->RequiredErrorMessage)) ?>");
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
	femployee_telephoneadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_telephoneadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_telephoneadd.lists["x_employee_id"] = <?php echo $employee_telephone_add->employee_id->Lookup->toClientList($employee_telephone_add) ?>;
	femployee_telephoneadd.lists["x_employee_id"].options = <?php echo JsonEncode($employee_telephone_add->employee_id->lookupOptions()) ?>;
	femployee_telephoneadd.lists["x_tele_type"] = <?php echo $employee_telephone_add->tele_type->Lookup->toClientList($employee_telephone_add) ?>;
	femployee_telephoneadd.lists["x_tele_type"].options = <?php echo JsonEncode($employee_telephone_add->tele_type->lookupOptions()) ?>;
	femployee_telephoneadd.lists["x_telephone_type"] = <?php echo $employee_telephone_add->telephone_type->Lookup->toClientList($employee_telephone_add) ?>;
	femployee_telephoneadd.lists["x_telephone_type"].options = <?php echo JsonEncode($employee_telephone_add->telephone_type->lookupOptions()) ?>;
	femployee_telephoneadd.lists["x_status"] = <?php echo $employee_telephone_add->status->Lookup->toClientList($employee_telephone_add) ?>;
	femployee_telephoneadd.lists["x_status"].options = <?php echo JsonEncode($employee_telephone_add->status->lookupOptions()) ?>;
	loadjs.done("femployee_telephoneadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_telephone_add->showPageHeader(); ?>
<?php
$employee_telephone_add->showMessage();
?>
<form name="femployee_telephoneadd" id="femployee_telephoneadd" class="<?php echo $employee_telephone_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_telephone">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_telephone_add->IsModal ?>">
<?php if ($employee_telephone->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_telephone_add->employee_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_telephone_add->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_telephone_employee_id" for="x_employee_id" class="<?php echo $employee_telephone_add->LeftColumnClass ?>"><?php echo $employee_telephone_add->employee_id->caption() ?><?php echo $employee_telephone_add->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_telephone_add->RightColumnClass ?>"><div <?php echo $employee_telephone_add->employee_id->cellAttributes() ?>>
<?php if ($employee_telephone_add->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_telephone_employee_id">
<span<?php echo $employee_telephone_add->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_telephone_add->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_telephone_add->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_telephone_employee_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_employee_id" data-value-separator="<?php echo $employee_telephone_add->employee_id->displayValueSeparatorAttribute() ?>" id="x_employee_id" name="x_employee_id"<?php echo $employee_telephone_add->employee_id->editAttributes() ?>>
			<?php echo $employee_telephone_add->employee_id->selectOptionListHtml("x_employee_id") ?>
		</select>
</div>
<?php echo $employee_telephone_add->employee_id->Lookup->getParamTag($employee_telephone_add, "p_x_employee_id") ?>
</span>
<?php } ?>
<?php echo $employee_telephone_add->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_telephone_add->tele_type->Visible) { // tele_type ?>
	<div id="r_tele_type" class="form-group row">
		<label id="elh_employee_telephone_tele_type" for="x_tele_type" class="<?php echo $employee_telephone_add->LeftColumnClass ?>"><?php echo $employee_telephone_add->tele_type->caption() ?><?php echo $employee_telephone_add->tele_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_telephone_add->RightColumnClass ?>"><div <?php echo $employee_telephone_add->tele_type->cellAttributes() ?>>
<span id="el_employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone_add->tele_type->displayValueSeparatorAttribute() ?>" id="x_tele_type" name="x_tele_type"<?php echo $employee_telephone_add->tele_type->editAttributes() ?>>
			<?php echo $employee_telephone_add->tele_type->selectOptionListHtml("x_tele_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone_add->tele_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone_add->tele_type->caption() ?>" data-title="<?php echo $employee_telephone_add->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_telephone_add->tele_type->Lookup->getParamTag($employee_telephone_add, "p_x_tele_type") ?>
</span>
<?php echo $employee_telephone_add->tele_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_telephone_add->telephone->Visible) { // telephone ?>
	<div id="r_telephone" class="form-group row">
		<label id="elh_employee_telephone_telephone" for="x_telephone" class="<?php echo $employee_telephone_add->LeftColumnClass ?>"><?php echo $employee_telephone_add->telephone->caption() ?><?php echo $employee_telephone_add->telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_telephone_add->RightColumnClass ?>"><div <?php echo $employee_telephone_add->telephone->cellAttributes() ?>>
<span id="el_employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x_telephone" id="x_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone_add->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone_add->telephone->EditValue ?>"<?php echo $employee_telephone_add->telephone->editAttributes() ?>>
</span>
<?php echo $employee_telephone_add->telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_telephone_add->telephone_type->Visible) { // telephone_type ?>
	<div id="r_telephone_type" class="form-group row">
		<label id="elh_employee_telephone_telephone_type" for="x_telephone_type" class="<?php echo $employee_telephone_add->LeftColumnClass ?>"><?php echo $employee_telephone_add->telephone_type->caption() ?><?php echo $employee_telephone_add->telephone_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_telephone_add->RightColumnClass ?>"><div <?php echo $employee_telephone_add->telephone_type->cellAttributes() ?>>
<span id="el_employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone_add->telephone_type->displayValueSeparatorAttribute() ?>" id="x_telephone_type" name="x_telephone_type"<?php echo $employee_telephone_add->telephone_type->editAttributes() ?>>
			<?php echo $employee_telephone_add->telephone_type->selectOptionListHtml("x_telephone_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone_add->telephone_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone_add->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone_add->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_telephone_add->telephone_type->Lookup->getParamTag($employee_telephone_add, "p_x_telephone_type") ?>
</span>
<?php echo $employee_telephone_add->telephone_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_telephone_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_telephone_status" for="x_status" class="<?php echo $employee_telephone_add->LeftColumnClass ?>"><?php echo $employee_telephone_add->status->caption() ?><?php echo $employee_telephone_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_telephone_add->RightColumnClass ?>"><div <?php echo $employee_telephone_add->status->cellAttributes() ?>>
<span id="el_employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_telephone_add->status->editAttributes() ?>>
			<?php echo $employee_telephone_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $employee_telephone_add->status->Lookup->getParamTag($employee_telephone_add, "p_x_status") ?>
</span>
<?php echo $employee_telephone_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_telephone_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_telephone_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_telephone_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_telephone_add->showPageFooter();
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
$employee_telephone_add->terminate();
?>