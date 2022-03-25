<?php

namespace PHPMaker2021\project3;

// Page object
$TaskManagementEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftask_managementedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    ftask_managementedit = currentForm = new ew.Form("ftask_managementedit", "edit");

    // Add fields
    var fields = ew.vars.tables.task_management.fields;
    ftask_managementedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["TaskName", [fields.TaskName.required ? ew.Validators.required(fields.TaskName.caption) : null], fields.TaskName.isInvalid],
        ["AssignTo", [fields.AssignTo.required ? ew.Validators.required(fields.AssignTo.caption) : null], fields.AssignTo.isInvalid],
        ["Description", [fields.Description.required ? ew.Validators.required(fields.Description.caption) : null], fields.Description.isInvalid],
        ["StartDate", [fields.StartDate.required ? ew.Validators.required(fields.StartDate.caption) : null, ew.Validators.datetime(0)], fields.StartDate.isInvalid],
        ["EndDate", [fields.EndDate.required ? ew.Validators.required(fields.EndDate.caption) : null, ew.Validators.datetime(0)], fields.EndDate.isInvalid],
        ["StatusOfTask", [fields.StatusOfTask.required ? ew.Validators.required(fields.StatusOfTask.caption) : null], fields.StatusOfTask.isInvalid],
        ["ForwardTo", [fields.ForwardTo.required ? ew.Validators.required(fields.ForwardTo.caption) : null], fields.ForwardTo.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["GetUserName", [fields.GetUserName.required ? ew.Validators.required(fields.GetUserName.caption) : null], fields.GetUserName.isInvalid],
        ["GetModifiedName", [fields.GetModifiedName.required ? ew.Validators.required(fields.GetModifiedName.caption) : null], fields.GetModifiedName.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftask_managementedit,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    ftask_managementedit.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    ftask_managementedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftask_managementedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("ftask_managementedit");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftask_managementedit" id="ftask_managementedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_task_management_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_task_management_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="task_management" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TaskName->Visible) { // TaskName ?>
    <div id="r_TaskName" class="form-group row">
        <label id="elh_task_management_TaskName" for="x_TaskName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TaskName->caption() ?><?= $Page->TaskName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TaskName->cellAttributes() ?>>
<span id="el_task_management_TaskName">
<input type="<?= $Page->TaskName->getInputTextType() ?>" data-table="task_management" data-field="x_TaskName" name="x_TaskName" id="x_TaskName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TaskName->getPlaceHolder()) ?>" value="<?= $Page->TaskName->EditValue ?>"<?= $Page->TaskName->editAttributes() ?> aria-describedby="x_TaskName_help">
<?= $Page->TaskName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TaskName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AssignTo->Visible) { // AssignTo ?>
    <div id="r_AssignTo" class="form-group row">
        <label id="elh_task_management_AssignTo" for="x_AssignTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AssignTo->caption() ?><?= $Page->AssignTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AssignTo->cellAttributes() ?>>
<span id="el_task_management_AssignTo">
<input type="<?= $Page->AssignTo->getInputTextType() ?>" data-table="task_management" data-field="x_AssignTo" name="x_AssignTo" id="x_AssignTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AssignTo->getPlaceHolder()) ?>" value="<?= $Page->AssignTo->EditValue ?>"<?= $Page->AssignTo->editAttributes() ?> aria-describedby="x_AssignTo_help">
<?= $Page->AssignTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AssignTo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <div id="r_Description" class="form-group row">
        <label id="elh_task_management_Description" for="x_Description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Description->caption() ?><?= $Page->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<textarea data-table="task_management" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Description->getPlaceHolder()) ?>"<?= $Page->Description->editAttributes() ?> aria-describedby="x_Description_help"><?= $Page->Description->EditValue ?></textarea>
<?= $Page->Description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StartDate->Visible) { // StartDate ?>
    <div id="r_StartDate" class="form-group row">
        <label id="elh_task_management_StartDate" for="x_StartDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StartDate->caption() ?><?= $Page->StartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<input type="<?= $Page->StartDate->getInputTextType() ?>" data-table="task_management" data-field="x_StartDate" name="x_StartDate" id="x_StartDate" placeholder="<?= HtmlEncode($Page->StartDate->getPlaceHolder()) ?>" value="<?= $Page->StartDate->EditValue ?>"<?= $Page->StartDate->editAttributes() ?> aria-describedby="x_StartDate_help">
<?= $Page->StartDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StartDate->getErrorMessage() ?></div>
<?php if (!$Page->StartDate->ReadOnly && !$Page->StartDate->Disabled && !isset($Page->StartDate->EditAttrs["readonly"]) && !isset($Page->StartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementedit", "datetimepicker"], function() {
    ew.createDateTimePicker("ftask_managementedit", "x_StartDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndDate->Visible) { // EndDate ?>
    <div id="r_EndDate" class="form-group row">
        <label id="elh_task_management_EndDate" for="x_EndDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndDate->caption() ?><?= $Page->EndDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndDate->cellAttributes() ?>>
<span id="el_task_management_EndDate">
<input type="<?= $Page->EndDate->getInputTextType() ?>" data-table="task_management" data-field="x_EndDate" name="x_EndDate" id="x_EndDate" placeholder="<?= HtmlEncode($Page->EndDate->getPlaceHolder()) ?>" value="<?= $Page->EndDate->EditValue ?>"<?= $Page->EndDate->editAttributes() ?> aria-describedby="x_EndDate_help">
<?= $Page->EndDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EndDate->getErrorMessage() ?></div>
<?php if (!$Page->EndDate->ReadOnly && !$Page->EndDate->Disabled && !isset($Page->EndDate->EditAttrs["readonly"]) && !isset($Page->EndDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementedit", "datetimepicker"], function() {
    ew.createDateTimePicker("ftask_managementedit", "x_EndDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StatusOfTask->Visible) { // StatusOfTask ?>
    <div id="r_StatusOfTask" class="form-group row">
        <label id="elh_task_management_StatusOfTask" for="x_StatusOfTask" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StatusOfTask->caption() ?><?= $Page->StatusOfTask->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StatusOfTask->cellAttributes() ?>>
<span id="el_task_management_StatusOfTask">
<input type="<?= $Page->StatusOfTask->getInputTextType() ?>" data-table="task_management" data-field="x_StatusOfTask" name="x_StatusOfTask" id="x_StatusOfTask" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StatusOfTask->getPlaceHolder()) ?>" value="<?= $Page->StatusOfTask->EditValue ?>"<?= $Page->StatusOfTask->editAttributes() ?> aria-describedby="x_StatusOfTask_help">
<?= $Page->StatusOfTask->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StatusOfTask->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ForwardTo->Visible) { // ForwardTo ?>
    <div id="r_ForwardTo" class="form-group row">
        <label id="elh_task_management_ForwardTo" for="x_ForwardTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ForwardTo->caption() ?><?= $Page->ForwardTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
<input type="<?= $Page->ForwardTo->getInputTextType() ?>" data-table="task_management" data-field="x_ForwardTo" name="x_ForwardTo" id="x_ForwardTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ForwardTo->getPlaceHolder()) ?>" value="<?= $Page->ForwardTo->EditValue ?>"<?= $Page->ForwardTo->editAttributes() ?> aria-describedby="x_ForwardTo_help">
<?= $Page->ForwardTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ForwardTo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_task_management_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_task_management_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="task_management" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_task_management_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_task_management_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="task_management" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementedit", "datetimepicker"], function() {
    ew.createDateTimePicker("ftask_managementedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_task_management_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_task_management_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="task_management" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_task_management_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_task_management_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="task_management" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementedit", "datetimepicker"], function() {
    ew.createDateTimePicker("ftask_managementedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <div id="r_GetUserName" class="form-group row">
        <label id="elh_task_management_GetUserName" for="x_GetUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GetUserName->caption() ?><?= $Page->GetUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el_task_management_GetUserName">
<input type="<?= $Page->GetUserName->getInputTextType() ?>" data-table="task_management" data-field="x_GetUserName" name="x_GetUserName" id="x_GetUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GetUserName->getPlaceHolder()) ?>" value="<?= $Page->GetUserName->EditValue ?>"<?= $Page->GetUserName->editAttributes() ?> aria-describedby="x_GetUserName_help">
<?= $Page->GetUserName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GetUserName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GetModifiedName->Visible) { // GetModifiedName ?>
    <div id="r_GetModifiedName" class="form-group row">
        <label id="elh_task_management_GetModifiedName" for="x_GetModifiedName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GetModifiedName->caption() ?><?= $Page->GetModifiedName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GetModifiedName->cellAttributes() ?>>
<span id="el_task_management_GetModifiedName">
<input type="<?= $Page->GetModifiedName->getInputTextType() ?>" data-table="task_management" data-field="x_GetModifiedName" name="x_GetModifiedName" id="x_GetModifiedName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GetModifiedName->getPlaceHolder()) ?>" value="<?= $Page->GetModifiedName->EditValue ?>"<?= $Page->GetModifiedName->editAttributes() ?> aria-describedby="x_GetModifiedName_help">
<?= $Page->GetModifiedName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GetModifiedName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_task_management_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_task_management_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="task_management" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("task_management");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
