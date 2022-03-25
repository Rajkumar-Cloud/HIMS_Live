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
$task_management_add = new task_management_add();

// Run the page
$task_management_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$task_management_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftask_managementadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ftask_managementadd = currentForm = new ew.Form("ftask_managementadd", "add");

	// Validate form
	ftask_managementadd.validate = function() {
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
			<?php if ($task_management_add->TaskName->Required) { ?>
				elm = this.getElements("x" + infix + "_TaskName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->TaskName->caption(), $task_management_add->TaskName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->AssignTo->Required) { ?>
				elm = this.getElements("x" + infix + "_AssignTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->AssignTo->caption(), $task_management_add->AssignTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->Description->caption(), $task_management_add->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->StartDate->Required) { ?>
				elm = this.getElements("x" + infix + "_StartDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->StartDate->caption(), $task_management_add->StartDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StartDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($task_management_add->StartDate->errorMessage()) ?>");
			<?php if ($task_management_add->EndDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EndDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->EndDate->caption(), $task_management_add->EndDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EndDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($task_management_add->EndDate->errorMessage()) ?>");
			<?php if ($task_management_add->StatusOfTask->Required) { ?>
				elm = this.getElements("x" + infix + "_StatusOfTask");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->StatusOfTask->caption(), $task_management_add->StatusOfTask->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->ForwardTo->Required) { ?>
				elm = this.getElements("x" + infix + "_ForwardTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->ForwardTo->caption(), $task_management_add->ForwardTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->createdby->caption(), $task_management_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->createddatetime->caption(), $task_management_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->GetUserName->Required) { ?>
				elm = this.getElements("x" + infix + "_GetUserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->GetUserName->caption(), $task_management_add->GetUserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_add->HospID->caption(), $task_management_add->HospID->RequiredErrorMessage)) ?>");
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
	ftask_managementadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftask_managementadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftask_managementadd.lists["x_AssignTo"] = <?php echo $task_management_add->AssignTo->Lookup->toClientList($task_management_add) ?>;
	ftask_managementadd.lists["x_AssignTo"].options = <?php echo JsonEncode($task_management_add->AssignTo->lookupOptions()) ?>;
	ftask_managementadd.lists["x_StatusOfTask"] = <?php echo $task_management_add->StatusOfTask->Lookup->toClientList($task_management_add) ?>;
	ftask_managementadd.lists["x_StatusOfTask"].options = <?php echo JsonEncode($task_management_add->StatusOfTask->options(FALSE, TRUE)) ?>;
	ftask_managementadd.lists["x_ForwardTo"] = <?php echo $task_management_add->ForwardTo->Lookup->toClientList($task_management_add) ?>;
	ftask_managementadd.lists["x_ForwardTo"].options = <?php echo JsonEncode($task_management_add->ForwardTo->lookupOptions()) ?>;
	loadjs.done("ftask_managementadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $task_management_add->showPageHeader(); ?>
<?php
$task_management_add->showMessage();
?>
<form name="ftask_managementadd" id="ftask_managementadd" class="<?php echo $task_management_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$task_management_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($task_management_add->TaskName->Visible) { // TaskName ?>
	<div id="r_TaskName" class="form-group row">
		<label id="elh_task_management_TaskName" for="x_TaskName" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->TaskName->caption() ?><?php echo $task_management_add->TaskName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->TaskName->cellAttributes() ?>>
<span id="el_task_management_TaskName">
<input type="text" data-table="task_management" data-field="x_TaskName" name="x_TaskName" id="x_TaskName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($task_management_add->TaskName->getPlaceHolder()) ?>" value="<?php echo $task_management_add->TaskName->EditValue ?>"<?php echo $task_management_add->TaskName->editAttributes() ?>>
</span>
<?php echo $task_management_add->TaskName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_add->AssignTo->Visible) { // AssignTo ?>
	<div id="r_AssignTo" class="form-group row">
		<label id="elh_task_management_AssignTo" for="x_AssignTo" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->AssignTo->caption() ?><?php echo $task_management_add->AssignTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->AssignTo->cellAttributes() ?>>
<span id="el_task_management_AssignTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="task_management" data-field="x_AssignTo" data-value-separator="<?php echo $task_management_add->AssignTo->displayValueSeparatorAttribute() ?>" id="x_AssignTo" name="x_AssignTo"<?php echo $task_management_add->AssignTo->editAttributes() ?>>
			<?php echo $task_management_add->AssignTo->selectOptionListHtml("x_AssignTo") ?>
		</select>
</div>
<?php echo $task_management_add->AssignTo->Lookup->getParamTag($task_management_add, "p_x_AssignTo") ?>
</span>
<?php echo $task_management_add->AssignTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_add->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_task_management_Description" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->Description->caption() ?><?php echo $task_management_add->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<?php $task_management_add->Description->EditAttrs->appendClass("editor"); ?>
<textarea data-table="task_management" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($task_management_add->Description->getPlaceHolder()) ?>"<?php echo $task_management_add->Description->editAttributes() ?>><?php echo $task_management_add->Description->EditValue ?></textarea>
<script>
loadjs.ready(["ftask_managementadd", "editor"], function() {
	ew.createEditor("ftask_managementadd", "x_Description", 35, 4, <?php echo $task_management_add->Description->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $task_management_add->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_add->StartDate->Visible) { // StartDate ?>
	<div id="r_StartDate" class="form-group row">
		<label id="elh_task_management_StartDate" for="x_StartDate" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->StartDate->caption() ?><?php echo $task_management_add->StartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<input type="text" data-table="task_management" data-field="x_StartDate" data-format="7" name="x_StartDate" id="x_StartDate" placeholder="<?php echo HtmlEncode($task_management_add->StartDate->getPlaceHolder()) ?>" value="<?php echo $task_management_add->StartDate->EditValue ?>"<?php echo $task_management_add->StartDate->editAttributes() ?>>
<?php if (!$task_management_add->StartDate->ReadOnly && !$task_management_add->StartDate->Disabled && !isset($task_management_add->StartDate->EditAttrs["readonly"]) && !isset($task_management_add->StartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftask_managementadd", "x_StartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $task_management_add->StartDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_add->EndDate->Visible) { // EndDate ?>
	<div id="r_EndDate" class="form-group row">
		<label id="elh_task_management_EndDate" for="x_EndDate" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->EndDate->caption() ?><?php echo $task_management_add->EndDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->EndDate->cellAttributes() ?>>
<span id="el_task_management_EndDate">
<input type="text" data-table="task_management" data-field="x_EndDate" data-format="7" name="x_EndDate" id="x_EndDate" placeholder="<?php echo HtmlEncode($task_management_add->EndDate->getPlaceHolder()) ?>" value="<?php echo $task_management_add->EndDate->EditValue ?>"<?php echo $task_management_add->EndDate->editAttributes() ?>>
<?php if (!$task_management_add->EndDate->ReadOnly && !$task_management_add->EndDate->Disabled && !isset($task_management_add->EndDate->EditAttrs["readonly"]) && !isset($task_management_add->EndDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ftask_managementadd", "x_EndDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $task_management_add->EndDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_add->StatusOfTask->Visible) { // StatusOfTask ?>
	<div id="r_StatusOfTask" class="form-group row">
		<label id="elh_task_management_StatusOfTask" for="x_StatusOfTask" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->StatusOfTask->caption() ?><?php echo $task_management_add->StatusOfTask->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->StatusOfTask->cellAttributes() ?>>
<span id="el_task_management_StatusOfTask">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="task_management" data-field="x_StatusOfTask" data-value-separator="<?php echo $task_management_add->StatusOfTask->displayValueSeparatorAttribute() ?>" id="x_StatusOfTask" name="x_StatusOfTask"<?php echo $task_management_add->StatusOfTask->editAttributes() ?>>
			<?php echo $task_management_add->StatusOfTask->selectOptionListHtml("x_StatusOfTask") ?>
		</select>
</div>
</span>
<?php echo $task_management_add->StatusOfTask->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_add->ForwardTo->Visible) { // ForwardTo ?>
	<div id="r_ForwardTo" class="form-group row">
		<label id="elh_task_management_ForwardTo" for="x_ForwardTo" class="<?php echo $task_management_add->LeftColumnClass ?>"><?php echo $task_management_add->ForwardTo->caption() ?><?php echo $task_management_add->ForwardTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_add->RightColumnClass ?>"><div <?php echo $task_management_add->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="task_management" data-field="x_ForwardTo" data-value-separator="<?php echo $task_management_add->ForwardTo->displayValueSeparatorAttribute() ?>" id="x_ForwardTo" name="x_ForwardTo"<?php echo $task_management_add->ForwardTo->editAttributes() ?>>
			<?php echo $task_management_add->ForwardTo->selectOptionListHtml("x_ForwardTo") ?>
		</select>
</div>
<?php echo $task_management_add->ForwardTo->Lookup->getParamTag($task_management_add, "p_x_ForwardTo") ?>
</span>
<?php echo $task_management_add->ForwardTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$task_management_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $task_management_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $task_management_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$task_management_add->showPageFooter();
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
$task_management_add->terminate();
?>