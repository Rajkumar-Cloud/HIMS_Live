<?php

namespace PHPMaker2021\HIMS;

// Page object
$TaskManagementAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftask_managementadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    ftask_managementadd = currentForm = new ew.Form("ftask_managementadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "task_management")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.task_management)
        ew.vars.tables.task_management = currentTable;
    ftask_managementadd.addFields([
        ["TaskName", [fields.TaskName.visible && fields.TaskName.required ? ew.Validators.required(fields.TaskName.caption) : null], fields.TaskName.isInvalid],
        ["AssignTo", [fields.AssignTo.visible && fields.AssignTo.required ? ew.Validators.required(fields.AssignTo.caption) : null], fields.AssignTo.isInvalid],
        ["Description", [fields.Description.visible && fields.Description.required ? ew.Validators.required(fields.Description.caption) : null], fields.Description.isInvalid],
        ["StartDate", [fields.StartDate.visible && fields.StartDate.required ? ew.Validators.required(fields.StartDate.caption) : null, ew.Validators.datetime(7)], fields.StartDate.isInvalid],
        ["EndDate", [fields.EndDate.visible && fields.EndDate.required ? ew.Validators.required(fields.EndDate.caption) : null, ew.Validators.datetime(7)], fields.EndDate.isInvalid],
        ["StatusOfTask", [fields.StatusOfTask.visible && fields.StatusOfTask.required ? ew.Validators.required(fields.StatusOfTask.caption) : null], fields.StatusOfTask.isInvalid],
        ["ForwardTo", [fields.ForwardTo.visible && fields.ForwardTo.required ? ew.Validators.required(fields.ForwardTo.caption) : null], fields.ForwardTo.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["GetUserName", [fields.GetUserName.visible && fields.GetUserName.required ? ew.Validators.required(fields.GetUserName.caption) : null], fields.GetUserName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftask_managementadd,
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
    ftask_managementadd.validate = function () {
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
    ftask_managementadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftask_managementadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    ftask_managementadd.lists.AssignTo = <?= $Page->AssignTo->toClientList($Page) ?>;
    ftask_managementadd.lists.StatusOfTask = <?= $Page->StatusOfTask->toClientList($Page) ?>;
    ftask_managementadd.lists.ForwardTo = <?= $Page->ForwardTo->toClientList($Page) ?>;
    loadjs.done("ftask_managementadd");
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
<form name="ftask_managementadd" id="ftask_managementadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
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
    <select
        id="x_AssignTo"
        name="x_AssignTo"
        class="form-control ew-select<?= $Page->AssignTo->isInvalidClass() ?>"
        data-select2-id="task_management_x_AssignTo"
        data-table="task_management"
        data-field="x_AssignTo"
        data-value-separator="<?= $Page->AssignTo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->AssignTo->getPlaceHolder()) ?>"
        <?= $Page->AssignTo->editAttributes() ?>>
        <?= $Page->AssignTo->selectOptionListHtml("x_AssignTo") ?>
    </select>
    <?= $Page->AssignTo->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->AssignTo->getErrorMessage() ?></div>
<?= $Page->AssignTo->Lookup->getParamTag($Page, "p_x_AssignTo") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='task_management_x_AssignTo']"),
        options = { name: "x_AssignTo", selectId: "task_management_x_AssignTo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.task_management.fields.AssignTo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <div id="r_Description" class="form-group row">
        <label id="elh_task_management_Description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Description->caption() ?><?= $Page->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<?php $Page->Description->EditAttrs->appendClass("editor"); ?>
<textarea data-table="task_management" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Description->getPlaceHolder()) ?>"<?= $Page->Description->editAttributes() ?> aria-describedby="x_Description_help"><?= $Page->Description->EditValue ?></textarea>
<?= $Page->Description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Description->getErrorMessage() ?></div>
<script>
loadjs.ready(["ftask_managementadd", "editor"], function() {
	ew.createEditor("ftask_managementadd", "x_Description", 35, 4, <?= $Page->Description->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StartDate->Visible) { // StartDate ?>
    <div id="r_StartDate" class="form-group row">
        <label id="elh_task_management_StartDate" for="x_StartDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StartDate->caption() ?><?= $Page->StartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<input type="<?= $Page->StartDate->getInputTextType() ?>" data-table="task_management" data-field="x_StartDate" data-format="7" name="x_StartDate" id="x_StartDate" placeholder="<?= HtmlEncode($Page->StartDate->getPlaceHolder()) ?>" value="<?= $Page->StartDate->EditValue ?>"<?= $Page->StartDate->editAttributes() ?> aria-describedby="x_StartDate_help">
<?= $Page->StartDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StartDate->getErrorMessage() ?></div>
<?php if (!$Page->StartDate->ReadOnly && !$Page->StartDate->Disabled && !isset($Page->StartDate->EditAttrs["readonly"]) && !isset($Page->StartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementadd", "datetimepicker"], function() {
    ew.createDateTimePicker("ftask_managementadd", "x_StartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<input type="<?= $Page->EndDate->getInputTextType() ?>" data-table="task_management" data-field="x_EndDate" data-format="7" name="x_EndDate" id="x_EndDate" placeholder="<?= HtmlEncode($Page->EndDate->getPlaceHolder()) ?>" value="<?= $Page->EndDate->EditValue ?>"<?= $Page->EndDate->editAttributes() ?> aria-describedby="x_EndDate_help">
<?= $Page->EndDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EndDate->getErrorMessage() ?></div>
<?php if (!$Page->EndDate->ReadOnly && !$Page->EndDate->Disabled && !isset($Page->EndDate->EditAttrs["readonly"]) && !isset($Page->EndDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftask_managementadd", "datetimepicker"], function() {
    ew.createDateTimePicker("ftask_managementadd", "x_EndDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
    <select
        id="x_StatusOfTask"
        name="x_StatusOfTask"
        class="form-control ew-select<?= $Page->StatusOfTask->isInvalidClass() ?>"
        data-select2-id="task_management_x_StatusOfTask"
        data-table="task_management"
        data-field="x_StatusOfTask"
        data-value-separator="<?= $Page->StatusOfTask->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->StatusOfTask->getPlaceHolder()) ?>"
        <?= $Page->StatusOfTask->editAttributes() ?>>
        <?= $Page->StatusOfTask->selectOptionListHtml("x_StatusOfTask") ?>
    </select>
    <?= $Page->StatusOfTask->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->StatusOfTask->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='task_management_x_StatusOfTask']"),
        options = { name: "x_StatusOfTask", selectId: "task_management_x_StatusOfTask", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.task_management.fields.StatusOfTask.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.task_management.fields.StatusOfTask.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ForwardTo->Visible) { // ForwardTo ?>
    <div id="r_ForwardTo" class="form-group row">
        <label id="elh_task_management_ForwardTo" for="x_ForwardTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ForwardTo->caption() ?><?= $Page->ForwardTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
    <select
        id="x_ForwardTo"
        name="x_ForwardTo"
        class="form-control ew-select<?= $Page->ForwardTo->isInvalidClass() ?>"
        data-select2-id="task_management_x_ForwardTo"
        data-table="task_management"
        data-field="x_ForwardTo"
        data-value-separator="<?= $Page->ForwardTo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ForwardTo->getPlaceHolder()) ?>"
        <?= $Page->ForwardTo->editAttributes() ?>>
        <?= $Page->ForwardTo->selectOptionListHtml("x_ForwardTo") ?>
    </select>
    <?= $Page->ForwardTo->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ForwardTo->getErrorMessage() ?></div>
<?= $Page->ForwardTo->Lookup->getParamTag($Page, "p_x_ForwardTo") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='task_management_x_ForwardTo']"),
        options = { name: "x_ForwardTo", selectId: "task_management_x_ForwardTo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.task_management.fields.ForwardTo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
