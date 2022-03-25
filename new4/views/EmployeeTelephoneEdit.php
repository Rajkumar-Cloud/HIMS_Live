<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTelephoneEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_telephoneedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_telephoneedit = currentForm = new ew.Form("femployee_telephoneedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_telephone")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_telephone)
        ew.vars.tables.employee_telephone = currentTable;
    femployee_telephoneedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["tele_type", [fields.tele_type.visible && fields.tele_type.required ? ew.Validators.required(fields.tele_type.caption) : null], fields.tele_type.isInvalid],
        ["telephone", [fields.telephone.visible && fields.telephone.required ? ew.Validators.required(fields.telephone.caption) : null], fields.telephone.isInvalid],
        ["telephone_type", [fields.telephone_type.visible && fields.telephone_type.required ? ew.Validators.required(fields.telephone_type.caption) : null], fields.telephone_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_telephoneedit,
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
    femployee_telephoneedit.validate = function () {
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
    femployee_telephoneedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_telephoneedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_telephoneedit.lists.tele_type = <?= $Page->tele_type->toClientList($Page) ?>;
    femployee_telephoneedit.lists.telephone_type = <?= $Page->telephone_type->toClientList($Page) ?>;
    femployee_telephoneedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_telephoneedit");
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
<form name="femployee_telephoneedit" id="femployee_telephoneedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_telephone">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_telephone_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_telephone_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employee_telephone_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_telephone_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_employee_telephone_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tele_type->Visible) { // tele_type ?>
    <div id="r_tele_type" class="form-group row">
        <label id="elh_employee_telephone_tele_type" for="x_tele_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tele_type->caption() ?><?= $Page->tele_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tele_type->cellAttributes() ?>>
<span id="el_employee_telephone_tele_type">
<div class="input-group flex-nowrap">
    <select
        id="x_tele_type"
        name="x_tele_type"
        class="form-control ew-select<?= $Page->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Page->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tele_type->getPlaceHolder()) ?>"
        <?= $Page->tele_type->editAttributes() ?>>
        <?= $Page->tele_type->selectOptionListHtml("x_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Page->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->tele_type->caption() ?>" data-title="<?= $Page->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->tele_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tele_type->getErrorMessage() ?></div>
<?= $Page->tele_type->Lookup->getParamTag($Page, "p_x_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x_tele_type']"),
        options = { name: "x_tele_type", selectId: "employee_telephone_x_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
    <div id="r_telephone" class="form-group row">
        <label id="elh_employee_telephone_telephone" for="x_telephone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->telephone->caption() ?><?= $Page->telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->telephone->cellAttributes() ?>>
<span id="el_employee_telephone_telephone">
<input type="<?= $Page->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x_telephone" id="x_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->telephone->getPlaceHolder()) ?>" value="<?= $Page->telephone->EditValue ?>"<?= $Page->telephone->editAttributes() ?> aria-describedby="x_telephone_help">
<?= $Page->telephone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->telephone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->telephone_type->Visible) { // telephone_type ?>
    <div id="r_telephone_type" class="form-group row">
        <label id="elh_employee_telephone_telephone_type" for="x_telephone_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->telephone_type->caption() ?><?= $Page->telephone_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->telephone_type->cellAttributes() ?>>
<span id="el_employee_telephone_telephone_type">
<div class="input-group flex-nowrap">
    <select
        id="x_telephone_type"
        name="x_telephone_type"
        class="form-control ew-select<?= $Page->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Page->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->telephone_type->getPlaceHolder()) ?>"
        <?= $Page->telephone_type->editAttributes() ?>>
        <?= $Page->telephone_type->selectOptionListHtml("x_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Page->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->telephone_type->caption() ?>" data-title="<?= $Page->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->telephone_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->telephone_type->getErrorMessage() ?></div>
<?= $Page->telephone_type->Lookup->getParamTag($Page, "p_x_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x_telephone_type']"),
        options = { name: "x_telephone_type", selectId: "employee_telephone_x_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_telephone_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_telephone_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x_status"
        data-table="employee_telephone"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x_status']"),
        options = { name: "x_status", selectId: "employee_telephone_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_employee_telephone_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_employee_telephone_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
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
    ew.addEventHandlers("employee_telephone");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
