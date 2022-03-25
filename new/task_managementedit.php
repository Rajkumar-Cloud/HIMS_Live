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
$task_management_edit = new task_management_edit();

// Run the page
$task_management_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$task_management_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ftask_managementedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ftask_managementedit = currentForm = new ew.Form("ftask_managementedit", "edit");

	// Validate form
	ftask_managementedit.validate = function() {
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
			<?php if ($task_management_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->id->caption(), $task_management_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->TaskName->Required) { ?>
				elm = this.getElements("x" + infix + "_TaskName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->TaskName->caption(), $task_management_edit->TaskName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->AssignTo->Required) { ?>
				elm = this.getElements("x" + infix + "_AssignTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->AssignTo->caption(), $task_management_edit->AssignTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->Description->caption(), $task_management_edit->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->StartDate->Required) { ?>
				elm = this.getElements("x" + infix + "_StartDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->StartDate->caption(), $task_management_edit->StartDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StartDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($task_management_edit->StartDate->errorMessage()) ?>");
			<?php if ($task_management_edit->EndDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EndDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->EndDate->caption(), $task_management_edit->EndDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EndDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($task_management_edit->EndDate->errorMessage()) ?>");
			<?php if ($task_management_edit->StatusOfTask->Required) { ?>
				elm = this.getElements("x" + infix + "_StatusOfTask");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->StatusOfTask->caption(), $task_management_edit->StatusOfTask->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->ForwardTo->Required) { ?>
				elm = this.getElements("x" + infix + "_ForwardTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->ForwardTo->caption(), $task_management_edit->ForwardTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->modifiedby->caption(), $task_management_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->modifieddatetime->caption(), $task_management_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->GetModifiedName->Required) { ?>
				elm = this.getElements("x" + infix + "_GetModifiedName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->GetModifiedName->caption(), $task_management_edit->GetModifiedName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($task_management_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $task_management_edit->HospID->caption(), $task_management_edit->HospID->RequiredErrorMessage)) ?>");
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
	ftask_managementedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ftask_managementedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ftask_managementedit.lists["x_AssignTo"] = <?php echo $task_management_edit->AssignTo->Lookup->toClientList($task_management_edit) ?>;
	ftask_managementedit.lists["x_AssignTo"].options = <?php echo JsonEncode($task_management_edit->AssignTo->lookupOptions()) ?>;
	ftask_managementedit.lists["x_StatusOfTask"] = <?php echo $task_management_edit->StatusOfTask->Lookup->toClientList($task_management_edit) ?>;
	ftask_managementedit.lists["x_StatusOfTask"].options = <?php echo JsonEncode($task_management_edit->StatusOfTask->options(FALSE, TRUE)) ?>;
	ftask_managementedit.lists["x_ForwardTo"] = <?php echo $task_management_edit->ForwardTo->Lookup->toClientList($task_management_edit) ?>;
	ftask_managementedit.lists["x_ForwardTo"].options = <?php echo JsonEncode($task_management_edit->ForwardTo->lookupOptions()) ?>;
	loadjs.done("ftask_managementedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $task_management_edit->showPageHeader(); ?>
<?php
$task_management_edit->showMessage();
?>
<form name="ftask_managementedit" id="ftask_managementedit" class="<?php echo $task_management_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$task_management_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($task_management_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_task_management_id" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->id->caption() ?><?php echo $task_management_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->id->cellAttributes() ?>>
<span id="el_task_management_id">
<span<?php echo $task_management_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($task_management_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="task_management" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($task_management_edit->id->CurrentValue) ?>">
<?php echo $task_management_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->TaskName->Visible) { // TaskName ?>
	<div id="r_TaskName" class="form-group row">
		<label id="elh_task_management_TaskName" for="x_TaskName" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->TaskName->caption() ?><?php echo $task_management_edit->TaskName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->TaskName->cellAttributes() ?>>
<span id="el_task_management_TaskName">
<input type="text" data-table="task_management" data-field="x_TaskName" name="x_TaskName" id="x_TaskName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($task_management_edit->TaskName->getPlaceHolder()) ?>" value="<?php echo $task_management_edit->TaskName->EditValue ?>"<?php echo $task_management_edit->TaskName->editAttributes() ?>>
</span>
<?php echo $task_management_edit->TaskName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->AssignTo->Visible) { // AssignTo ?>
	<div id="r_AssignTo" class="form-group row">
		<label id="elh_task_management_AssignTo" for="x_AssignTo" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->AssignTo->caption() ?><?php echo $task_management_edit->AssignTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->AssignTo->cellAttributes() ?>>
<span id="el_task_management_AssignTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="task_management" data-field="x_AssignTo" data-value-separator="<?php echo $task_management_edit->AssignTo->displayValueSeparatorAttribute() ?>" id="x_AssignTo" name="x_AssignTo"<?php echo $task_management_edit->AssignTo->editAttributes() ?>>
			<?php echo $task_management_edit->AssignTo->selectOptionListHtml("x_AssignTo") ?>
		</select>
</div>
<?php echo $task_management_edit->AssignTo->Lookup->getParamTag($task_management_edit, "p_x_AssignTo") ?>
</span>
<?php echo $task_management_edit->AssignTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_task_management_Description" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->Description->caption() ?><?php echo $task_management_edit->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<?php $task_management_edit->Description->EditAttrs->appendClass("editor"); ?>
<textarea data-table="task_management" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($task_management_edit->Description->getPlaceHolder()) ?>"<?php echo $task_management_edit->Description->editAttributes() ?>><?php echo $task_management_edit->Description->EditValue ?></textarea>
<script>
loadjs.ready(["ftask_managementedit", "editor"], function() {
	ew.createEditor("ftask_managementedit", "x_Description", 35, 4, <?php echo $task_management_edit->Description->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
</span>
<?php echo $task_management_edit->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->StartDate->Visible) { // StartDate ?>
	<div id="r_StartDate" class="form-group row">
		<label id="elh_task_management_StartDate" for="x_StartDate" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->StartDate->caption() ?><?php echo $task_management_edit->StartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<input type="text" data-table="task_management" data-field="x_StartDate" data-format="7" name="x_StartDate" id="x_StartDate" placeholder="<?php echo HtmlEncode($task_management_edit->StartDate->getPlaceHolder()) ?>" value="<?php echo $task_management_edit->StartDate->EditValue ?>"<?php echo $task_management_edit->StartDate->editAttributes() ?>>
<?php if (!$task_management_edit->StartDate->ReadOnly && !$task_management_edit->StartDate->Disabled && !isset($task_management_edit->StartDate->EditAttrs["readonly"]) && !isset($task_management_edit->StartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftask_managementedit", "x_StartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $task_management_edit->StartDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->EndDate->Visible) { // EndDate ?>
	<div id="r_EndDate" class="form-group row">
		<label id="elh_task_management_EndDate" for="x_EndDate" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->EndDate->caption() ?><?php echo $task_management_edit->EndDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->EndDate->cellAttributes() ?>>
<span id="el_task_management_EndDate">
<input type="text" data-table="task_management" data-field="x_EndDate" data-format="7" name="x_EndDate" id="x_EndDate" placeholder="<?php echo HtmlEncode($task_management_edit->EndDate->getPlaceHolder()) ?>" value="<?php echo $task_management_edit->EndDate->EditValue ?>"<?php echo $task_management_edit->EndDate->editAttributes() ?>>
<?php if (!$task_management_edit->EndDate->ReadOnly && !$task_management_edit->EndDate->Disabled && !isset($task_management_edit->EndDate->EditAttrs["readonly"]) && !isset($task_management_edit->EndDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ftask_managementedit", "x_EndDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $task_management_edit->EndDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->StatusOfTask->Visible) { // StatusOfTask ?>
	<div id="r_StatusOfTask" class="form-group row">
		<label id="elh_task_management_StatusOfTask" for="x_StatusOfTask" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->StatusOfTask->caption() ?><?php echo $task_management_edit->StatusOfTask->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->StatusOfTask->cellAttributes() ?>>
<span id="el_task_management_StatusOfTask">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="task_management" data-field="x_StatusOfTask" data-value-separator="<?php echo $task_management_edit->StatusOfTask->displayValueSeparatorAttribute() ?>" id="x_StatusOfTask" name="x_StatusOfTask"<?php echo $task_management_edit->StatusOfTask->editAttributes() ?>>
			<?php echo $task_management_edit->StatusOfTask->selectOptionListHtml("x_StatusOfTask") ?>
		</select>
</div>
</span>
<?php echo $task_management_edit->StatusOfTask->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($task_management_edit->ForwardTo->Visible) { // ForwardTo ?>
	<div id="r_ForwardTo" class="form-group row">
		<label id="elh_task_management_ForwardTo" for="x_ForwardTo" class="<?php echo $task_management_edit->LeftColumnClass ?>"><?php echo $task_management_edit->ForwardTo->caption() ?><?php echo $task_management_edit->ForwardTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $task_management_edit->RightColumnClass ?>"><div <?php echo $task_management_edit->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="task_management" data-field="x_ForwardTo" data-value-separator="<?php echo $task_management_edit->ForwardTo->displayValueSeparatorAttribute() ?>" id="x_ForwardTo" name="x_ForwardTo"<?php echo $task_management_edit->ForwardTo->editAttributes() ?>>
			<?php echo $task_management_edit->ForwardTo->selectOptionListHtml("x_ForwardTo") ?>
		</select>
</div>
<?php echo $task_management_edit->ForwardTo->Lookup->getParamTag($task_management_edit, "p_x_ForwardTo") ?>
</span>
<?php echo $task_management_edit->ForwardTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$task_management_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $task_management_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $task_management_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$task_management_edit->showPageFooter();
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
$task_management_edit->terminate();
?>