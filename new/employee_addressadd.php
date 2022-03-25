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
$employee_address_add = new employee_address_add();

// Run the page
$employee_address_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var femployee_addressadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	femployee_addressadd = currentForm = new ew.Form("femployee_addressadd", "add");

	// Validate form
	femployee_addressadd.validate = function() {
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
			<?php if ($employee_address_add->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->employee_id->caption(), $employee_address_add->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->contact_persion->Required) { ?>
				elm = this.getElements("x" + infix + "_contact_persion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->contact_persion->caption(), $employee_address_add->contact_persion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->street->caption(), $employee_address_add->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->town->caption(), $employee_address_add->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->province->caption(), $employee_address_add->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->postal_code->caption(), $employee_address_add->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->address_type->Required) { ?>
				elm = this.getElements("x" + infix + "_address_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->address_type->caption(), $employee_address_add->address_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->status->caption(), $employee_address_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->createdby->caption(), $employee_address_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_add->createddatetime->caption(), $employee_address_add->createddatetime->RequiredErrorMessage)) ?>");
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
	femployee_addressadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_addressadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_addressadd.lists["x_employee_id"] = <?php echo $employee_address_add->employee_id->Lookup->toClientList($employee_address_add) ?>;
	femployee_addressadd.lists["x_employee_id"].options = <?php echo JsonEncode($employee_address_add->employee_id->lookupOptions()) ?>;
	femployee_addressadd.lists["x_address_type"] = <?php echo $employee_address_add->address_type->Lookup->toClientList($employee_address_add) ?>;
	femployee_addressadd.lists["x_address_type"].options = <?php echo JsonEncode($employee_address_add->address_type->lookupOptions()) ?>;
	femployee_addressadd.lists["x_status"] = <?php echo $employee_address_add->status->Lookup->toClientList($employee_address_add) ?>;
	femployee_addressadd.lists["x_status"].options = <?php echo JsonEncode($employee_address_add->status->lookupOptions()) ?>;
	loadjs.done("femployee_addressadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_address_add->showPageHeader(); ?>
<?php
$employee_address_add->showMessage();
?>
<form name="femployee_addressadd" id="femployee_addressadd" class="<?php echo $employee_address_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_address_add->IsModal ?>">
<?php if ($employee_address->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_address_add->employee_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_address_add->employee_id->Visible) { // employee_id ?>
	<div id="r_employee_id" class="form-group row">
		<label id="elh_employee_address_employee_id" for="x_employee_id" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->employee_id->caption() ?><?php echo $employee_address_add->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->employee_id->cellAttributes() ?>>
<?php if ($employee_address_add->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_address_employee_id">
<span<?php echo $employee_address_add->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_add->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?php echo HtmlEncode($employee_address_add->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_employee_address_employee_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_employee_id" data-value-separator="<?php echo $employee_address_add->employee_id->displayValueSeparatorAttribute() ?>" id="x_employee_id" name="x_employee_id"<?php echo $employee_address_add->employee_id->editAttributes() ?>>
			<?php echo $employee_address_add->employee_id->selectOptionListHtml("x_employee_id") ?>
		</select>
</div>
<?php echo $employee_address_add->employee_id->Lookup->getParamTag($employee_address_add, "p_x_employee_id") ?>
</span>
<?php } ?>
<?php echo $employee_address_add->employee_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->contact_persion->Visible) { // contact_persion ?>
	<div id="r_contact_persion" class="form-group row">
		<label id="elh_employee_address_contact_persion" for="x_contact_persion" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->contact_persion->caption() ?><?php echo $employee_address_add->contact_persion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->contact_persion->cellAttributes() ?>>
<span id="el_employee_address_contact_persion">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x_contact_persion" id="x_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_add->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address_add->contact_persion->EditValue ?>"<?php echo $employee_address_add->contact_persion->editAttributes() ?>>
</span>
<?php echo $employee_address_add->contact_persion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label id="elh_employee_address_street" for="x_street" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->street->caption() ?><?php echo $employee_address_add->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->street->cellAttributes() ?>>
<span id="el_employee_address_street">
<input type="text" data-table="employee_address" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_add->street->getPlaceHolder()) ?>" value="<?php echo $employee_address_add->street->EditValue ?>"<?php echo $employee_address_add->street->editAttributes() ?>>
</span>
<?php echo $employee_address_add->street->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label id="elh_employee_address_town" for="x_town" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->town->caption() ?><?php echo $employee_address_add->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->town->cellAttributes() ?>>
<span id="el_employee_address_town">
<input type="text" data-table="employee_address" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_add->town->getPlaceHolder()) ?>" value="<?php echo $employee_address_add->town->EditValue ?>"<?php echo $employee_address_add->town->editAttributes() ?>>
</span>
<?php echo $employee_address_add->town->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_employee_address_province" for="x_province" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->province->caption() ?><?php echo $employee_address_add->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->province->cellAttributes() ?>>
<span id="el_employee_address_province">
<input type="text" data-table="employee_address" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_add->province->getPlaceHolder()) ?>" value="<?php echo $employee_address_add->province->EditValue ?>"<?php echo $employee_address_add->province->editAttributes() ?>>
</span>
<?php echo $employee_address_add->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_employee_address_postal_code" for="x_postal_code" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->postal_code->caption() ?><?php echo $employee_address_add->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->postal_code->cellAttributes() ?>>
<span id="el_employee_address_postal_code">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_add->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address_add->postal_code->EditValue ?>"<?php echo $employee_address_add->postal_code->editAttributes() ?>>
</span>
<?php echo $employee_address_add->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->address_type->Visible) { // address_type ?>
	<div id="r_address_type" class="form-group row">
		<label id="elh_employee_address_address_type" for="x_address_type" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->address_type->caption() ?><?php echo $employee_address_add->address_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->address_type->cellAttributes() ?>>
<span id="el_employee_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address_add->address_type->displayValueSeparatorAttribute() ?>" id="x_address_type" name="x_address_type"<?php echo $employee_address_add->address_type->editAttributes() ?>>
			<?php echo $employee_address_add->address_type->selectOptionListHtml("x_address_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address_add->address_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address_add->address_type->caption() ?>" data-title="<?php echo $employee_address_add->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_address_type',url:'sys_address_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_address_add->address_type->Lookup->getParamTag($employee_address_add, "p_x_address_type") ?>
</span>
<?php echo $employee_address_add->address_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_address_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_address_status" for="x_status" class="<?php echo $employee_address_add->LeftColumnClass ?>"><?php echo $employee_address_add->status->caption() ?><?php echo $employee_address_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_address_add->RightColumnClass ?>"><div <?php echo $employee_address_add->status->cellAttributes() ?>>
<span id="el_employee_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_address_add->status->editAttributes() ?>>
			<?php echo $employee_address_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $employee_address_add->status->Lookup->getParamTag($employee_address_add, "p_x_status") ?>
</span>
<?php echo $employee_address_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$employee_address_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_address_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_address_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_address_add->showPageFooter();
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
$employee_address_add->terminate();
?>