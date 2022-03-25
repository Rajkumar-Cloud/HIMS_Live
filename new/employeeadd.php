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
$employee_add = new employee_add();

// Run the page
$employee_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var femployeeadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	femployeeadd = currentForm = new ew.Form("femployeeadd", "add");

	// Validate form
	femployeeadd.validate = function() {
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
			<?php if ($employee_add->empNo->Required) { ?>
				elm = this.getElements("x" + infix + "_empNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->empNo->caption(), $employee_add->empNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->tittle->Required) { ?>
				elm = this.getElements("x" + infix + "_tittle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->tittle->caption(), $employee_add->tittle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->first_name->Required) { ?>
				elm = this.getElements("x" + infix + "_first_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->first_name->caption(), $employee_add->first_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->middle_name->Required) { ?>
				elm = this.getElements("x" + infix + "_middle_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->middle_name->caption(), $employee_add->middle_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->last_name->Required) { ?>
				elm = this.getElements("x" + infix + "_last_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->last_name->caption(), $employee_add->last_name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->gender->Required) { ?>
				elm = this.getElements("x" + infix + "_gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->gender->caption(), $employee_add->gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->dob->Required) { ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->dob->caption(), $employee_add->dob->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dob");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_add->dob->errorMessage()) ?>");
			<?php if ($employee_add->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->start_date->caption(), $employee_add->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_add->start_date->errorMessage()) ?>");
			<?php if ($employee_add->end_date->Required) { ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->end_date->caption(), $employee_add->end_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_add->end_date->errorMessage()) ?>");
			<?php if ($employee_add->employee_role_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_role_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->employee_role_id->caption(), $employee_add->employee_role_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->default_shift_start->Required) { ?>
				elm = this.getElements("x" + infix + "_default_shift_start");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->default_shift_start->caption(), $employee_add->default_shift_start->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_default_shift_start");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_add->default_shift_start->errorMessage()) ?>");
			<?php if ($employee_add->default_shift_end->Required) { ?>
				elm = this.getElements("x" + infix + "_default_shift_end");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->default_shift_end->caption(), $employee_add->default_shift_end->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_default_shift_end");
				if (elm && !ew.checkTime(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_add->default_shift_end->errorMessage()) ?>");
			<?php if ($employee_add->working_days->Required) { ?>
				elm = this.getElements("x" + infix + "_working_days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->working_days->caption(), $employee_add->working_days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->working_location->Required) { ?>
				elm = this.getElements("x" + infix + "_working_location");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->working_location->caption(), $employee_add->working_location->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->status->caption(), $employee_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->createdby->caption(), $employee_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->createddatetime->caption(), $employee_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->profilePic->Required) { ?>
				felm = this.getElements("x" + infix + "_profilePic");
				elm = this.getElements("fn_x" + infix + "_profilePic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_add->profilePic->caption(), $employee_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_add->HospID->caption(), $employee_add->HospID->RequiredErrorMessage)) ?>");
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
	femployeeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployeeadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployeeadd.lists["x_tittle"] = <?php echo $employee_add->tittle->Lookup->toClientList($employee_add) ?>;
	femployeeadd.lists["x_tittle"].options = <?php echo JsonEncode($employee_add->tittle->lookupOptions()) ?>;
	femployeeadd.lists["x_gender"] = <?php echo $employee_add->gender->Lookup->toClientList($employee_add) ?>;
	femployeeadd.lists["x_gender"].options = <?php echo JsonEncode($employee_add->gender->lookupOptions()) ?>;
	femployeeadd.lists["x_employee_role_id"] = <?php echo $employee_add->employee_role_id->Lookup->toClientList($employee_add) ?>;
	femployeeadd.lists["x_employee_role_id"].options = <?php echo JsonEncode($employee_add->employee_role_id->lookupOptions()) ?>;
	femployeeadd.lists["x_working_location"] = <?php echo $employee_add->working_location->Lookup->toClientList($employee_add) ?>;
	femployeeadd.lists["x_working_location"].options = <?php echo JsonEncode($employee_add->working_location->lookupOptions()) ?>;
	femployeeadd.lists["x_status"] = <?php echo $employee_add->status->Lookup->toClientList($employee_add) ?>;
	femployeeadd.lists["x_status"].options = <?php echo JsonEncode($employee_add->status->lookupOptions()) ?>;
	loadjs.done("femployeeadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_add->showPageHeader(); ?>
<?php
$employee_add->showMessage();
?>
<form name="femployeeadd" id="femployeeadd" class="<?php echo $employee_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$employee_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($employee_add->empNo->Visible) { // empNo ?>
	<div id="r_empNo" class="form-group row">
		<label id="elh_employee_empNo" for="x_empNo" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->empNo->caption() ?><?php echo $employee_add->empNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->empNo->cellAttributes() ?>>
<span id="el_employee_empNo">
<input type="text" data-table="employee" data-field="x_empNo" name="x_empNo" id="x_empNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_add->empNo->getPlaceHolder()) ?>" value="<?php echo $employee_add->empNo->EditValue ?>"<?php echo $employee_add->empNo->editAttributes() ?>>
</span>
<?php echo $employee_add->empNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->tittle->Visible) { // tittle ?>
	<div id="r_tittle" class="form-group row">
		<label id="elh_employee_tittle" for="x_tittle" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->tittle->caption() ?><?php echo $employee_add->tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->tittle->cellAttributes() ?>>
<span id="el_employee_tittle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_tittle" data-value-separator="<?php echo $employee_add->tittle->displayValueSeparatorAttribute() ?>" id="x_tittle" name="x_tittle"<?php echo $employee_add->tittle->editAttributes() ?>>
			<?php echo $employee_add->tittle->selectOptionListHtml("x_tittle") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_tittle") && !$employee_add->tittle->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tittle" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_add->tittle->caption() ?>" data-title="<?php echo $employee_add->tittle->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tittle',url:'sys_tittleaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_add->tittle->Lookup->getParamTag($employee_add, "p_x_tittle") ?>
</span>
<?php echo $employee_add->tittle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_employee_first_name" for="x_first_name" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->first_name->caption() ?><?php echo $employee_add->first_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<input type="text" data-table="employee" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_add->first_name->getPlaceHolder()) ?>" value="<?php echo $employee_add->first_name->EditValue ?>"<?php echo $employee_add->first_name->editAttributes() ?>>
</span>
<?php echo $employee_add->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label id="elh_employee_middle_name" for="x_middle_name" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->middle_name->caption() ?><?php echo $employee_add->middle_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<input type="text" data-table="employee" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($employee_add->middle_name->getPlaceHolder()) ?>" value="<?php echo $employee_add->middle_name->EditValue ?>"<?php echo $employee_add->middle_name->editAttributes() ?>>
</span>
<?php echo $employee_add->middle_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_employee_last_name" for="x_last_name" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->last_name->caption() ?><?php echo $employee_add->last_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<input type="text" data-table="employee" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_add->last_name->getPlaceHolder()) ?>" value="<?php echo $employee_add->last_name->EditValue ?>"<?php echo $employee_add->last_name->editAttributes() ?>>
</span>
<?php echo $employee_add->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_employee_gender" for="x_gender" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->gender->caption() ?><?php echo $employee_add->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_gender" data-value-separator="<?php echo $employee_add->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $employee_add->gender->editAttributes() ?>>
			<?php echo $employee_add->gender->selectOptionListHtml("x_gender") ?>
		</select>
</div>
<?php echo $employee_add->gender->Lookup->getParamTag($employee_add, "p_x_gender") ?>
</span>
<?php echo $employee_add->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label id="elh_employee_dob" for="x_dob" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->dob->caption() ?><?php echo $employee_add->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->dob->cellAttributes() ?>>
<span id="el_employee_dob">
<input type="text" data-table="employee" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($employee_add->dob->getPlaceHolder()) ?>" value="<?php echo $employee_add->dob->EditValue ?>"<?php echo $employee_add->dob->editAttributes() ?>>
<?php if (!$employee_add->dob->ReadOnly && !$employee_add->dob->Disabled && !isset($employee_add->dob->EditAttrs["readonly"]) && !isset($employee_add->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeeadd", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_add->dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_employee_start_date" for="x_start_date" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->start_date->caption() ?><?php echo $employee_add->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->start_date->cellAttributes() ?>>
<span id="el_employee_start_date">
<input type="text" data-table="employee" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($employee_add->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_add->start_date->EditValue ?>"<?php echo $employee_add->start_date->editAttributes() ?>>
<?php if (!$employee_add->start_date->ReadOnly && !$employee_add->start_date->Disabled && !isset($employee_add->start_date->EditAttrs["readonly"]) && !isset($employee_add->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeeadd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_add->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh_employee_end_date" for="x_end_date" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->end_date->caption() ?><?php echo $employee_add->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->end_date->cellAttributes() ?>>
<span id="el_employee_end_date">
<input type="text" data-table="employee" data-field="x_end_date" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($employee_add->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_add->end_date->EditValue ?>"<?php echo $employee_add->end_date->editAttributes() ?>>
<?php if (!$employee_add->end_date->ReadOnly && !$employee_add->end_date->Disabled && !isset($employee_add->end_date->EditAttrs["readonly"]) && !isset($employee_add->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("femployeeadd", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $employee_add->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->employee_role_id->Visible) { // employee_role_id ?>
	<div id="r_employee_role_id" class="form-group row">
		<label id="elh_employee_employee_role_id" for="x_employee_role_id" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->employee_role_id->caption() ?><?php echo $employee_add->employee_role_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->employee_role_id->cellAttributes() ?>>
<span id="el_employee_employee_role_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_employee_role_id" data-value-separator="<?php echo $employee_add->employee_role_id->displayValueSeparatorAttribute() ?>" id="x_employee_role_id" name="x_employee_role_id"<?php echo $employee_add->employee_role_id->editAttributes() ?>>
			<?php echo $employee_add->employee_role_id->selectOptionListHtml("x_employee_role_id") ?>
		</select>
</div>
<?php echo $employee_add->employee_role_id->Lookup->getParamTag($employee_add, "p_x_employee_role_id") ?>
</span>
<?php echo $employee_add->employee_role_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->default_shift_start->Visible) { // default_shift_start ?>
	<div id="r_default_shift_start" class="form-group row">
		<label id="elh_employee_default_shift_start" for="x_default_shift_start" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->default_shift_start->caption() ?><?php echo $employee_add->default_shift_start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->default_shift_start->cellAttributes() ?>>
<span id="el_employee_default_shift_start">
<input type="text" data-table="employee" data-field="x_default_shift_start" name="x_default_shift_start" id="x_default_shift_start" placeholder="<?php echo HtmlEncode($employee_add->default_shift_start->getPlaceHolder()) ?>" value="<?php echo $employee_add->default_shift_start->EditValue ?>"<?php echo $employee_add->default_shift_start->editAttributes() ?>>
<?php if (!$employee_add->default_shift_start->ReadOnly && !$employee_add->default_shift_start->Disabled && !isset($employee_add->default_shift_start->EditAttrs["readonly"]) && !isset($employee_add->default_shift_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "timepicker"], function() {
	ew.createTimePicker("femployeeadd", "x_default_shift_start", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $employee_add->default_shift_start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->default_shift_end->Visible) { // default_shift_end ?>
	<div id="r_default_shift_end" class="form-group row">
		<label id="elh_employee_default_shift_end" for="x_default_shift_end" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->default_shift_end->caption() ?><?php echo $employee_add->default_shift_end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->default_shift_end->cellAttributes() ?>>
<span id="el_employee_default_shift_end">
<input type="text" data-table="employee" data-field="x_default_shift_end" name="x_default_shift_end" id="x_default_shift_end" placeholder="<?php echo HtmlEncode($employee_add->default_shift_end->getPlaceHolder()) ?>" value="<?php echo $employee_add->default_shift_end->EditValue ?>"<?php echo $employee_add->default_shift_end->editAttributes() ?>>
<?php if (!$employee_add->default_shift_end->ReadOnly && !$employee_add->default_shift_end->Disabled && !isset($employee_add->default_shift_end->EditAttrs["readonly"]) && !isset($employee_add->default_shift_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployeeadd", "timepicker"], function() {
	ew.createTimePicker("femployeeadd", "x_default_shift_end", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
<?php echo $employee_add->default_shift_end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->working_days->Visible) { // working_days ?>
	<div id="r_working_days" class="form-group row">
		<label id="elh_employee_working_days" for="x_working_days" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->working_days->caption() ?><?php echo $employee_add->working_days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->working_days->cellAttributes() ?>>
<span id="el_employee_working_days">
<input type="text" data-table="employee" data-field="x_working_days" name="x_working_days" id="x_working_days" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($employee_add->working_days->getPlaceHolder()) ?>" value="<?php echo $employee_add->working_days->EditValue ?>"<?php echo $employee_add->working_days->editAttributes() ?>>
</span>
<?php echo $employee_add->working_days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->working_location->Visible) { // working_location ?>
	<div id="r_working_location" class="form-group row">
		<label id="elh_employee_working_location" for="x_working_location" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->working_location->caption() ?><?php echo $employee_add->working_location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->working_location->cellAttributes() ?>>
<span id="el_employee_working_location">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_working_location" data-value-separator="<?php echo $employee_add->working_location->displayValueSeparatorAttribute() ?>" id="x_working_location" name="x_working_location"<?php echo $employee_add->working_location->editAttributes() ?>>
			<?php echo $employee_add->working_location->selectOptionListHtml("x_working_location") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "hospital") && !$employee_add->working_location->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_working_location" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_add->working_location->caption() ?>" data-title="<?php echo $employee_add->working_location->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_working_location',url:'hospitaladdopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_add->working_location->Lookup->getParamTag($employee_add, "p_x_working_location") ?>
</span>
<?php echo $employee_add->working_location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_employee_status" for="x_status" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->status->caption() ?><?php echo $employee_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->status->cellAttributes() ?>>
<span id="el_employee_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee" data-field="x_status" data-value-separator="<?php echo $employee_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $employee_add->status->editAttributes() ?>>
			<?php echo $employee_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $employee_add->status->Lookup->getParamTag($employee_add, "p_x_status") ?>
</span>
<?php echo $employee_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($employee_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_employee_profilePic" class="<?php echo $employee_add->LeftColumnClass ?>"><?php echo $employee_add->profilePic->caption() ?><?php echo $employee_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $employee_add->RightColumnClass ?>"><div <?php echo $employee_add->profilePic->cellAttributes() ?>>
<span id="el_employee_profilePic">
<div id="fd_x_profilePic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_add->profilePic->title() ?>" data-table="employee" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $employee_add->profilePic->editAttributes() ?><?php if ($employee_add->profilePic->ReadOnly || $employee_add->profilePic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_profilePic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_profilePic" id= "fn_x_profilePic" value="<?php echo $employee_add->profilePic->Upload->FileName ?>">
<input type="hidden" name="fa_x_profilePic" id= "fa_x_profilePic" value="0">
<input type="hidden" name="fs_x_profilePic" id= "fs_x_profilePic" value="45">
<input type="hidden" name="fx_x_profilePic" id= "fx_x_profilePic" value="<?php echo $employee_add->profilePic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_profilePic" id= "fm_x_profilePic" value="<?php echo $employee_add->profilePic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_profilePic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $employee_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("employee_address", explode(",", $employee->getCurrentDetailTable())) && $employee_address->DetailAdd) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_telephone", explode(",", $employee->getCurrentDetailTable())) && $employee_telephone->DetailAdd) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_email", explode(",", $employee->getCurrentDetailTable())) && $employee_email->DetailAdd) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_degree", explode(",", $employee->getCurrentDetailTable())) && $employee_has_degree->DetailAdd) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_has_degree", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_degreegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_has_experience", explode(",", $employee->getCurrentDetailTable())) && $employee_has_experience->DetailAdd) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_has_experience", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_has_experiencegrid.php" ?>
<?php } ?>
<?php
	if (in_array("employee_document", explode(",", $employee->getCurrentDetailTable())) && $employee_document->DetailAdd) {
?>
<?php if ($employee->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("employee_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "employee_documentgrid.php" ?>
<?php } ?>
<?php if (!$employee_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $employee_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$employee_add->showPageFooter();
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
$employee_add->terminate();
?>