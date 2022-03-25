<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasEmployeeRoleJobDescriptionAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_employee_role_job_descriptionadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmas_employee_role_job_descriptionadd = currentForm = new ew.Form("fmas_employee_role_job_descriptionadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_employee_role_job_description")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_employee_role_job_description)
        ew.vars.tables.mas_employee_role_job_description = currentTable;
    fmas_employee_role_job_descriptionadd.addFields([
        ["role", [fields.role.visible && fields.role.required ? ew.Validators.required(fields.role.caption) : null], fields.role.isInvalid],
        ["job_description", [fields.job_description.visible && fields.job_description.required ? ew.Validators.required(fields.job_description.caption) : null], fields.job_description.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_employee_role_job_descriptionadd,
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
    fmas_employee_role_job_descriptionadd.validate = function () {
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
    fmas_employee_role_job_descriptionadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_employee_role_job_descriptionadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmas_employee_role_job_descriptionadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fmas_employee_role_job_descriptionadd");
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
<form name="fmas_employee_role_job_descriptionadd" id="fmas_employee_role_job_descriptionadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->role->Visible) { // role ?>
    <div id="r_role" class="form-group row">
        <label id="elh_mas_employee_role_job_description_role" for="x_role" class="<?= $Page->LeftColumnClass ?>"><?= $Page->role->caption() ?><?= $Page->role->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->role->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_role">
<input type="<?= $Page->role->getInputTextType() ?>" data-table="mas_employee_role_job_description" data-field="x_role" name="x_role" id="x_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->role->getPlaceHolder()) ?>" value="<?= $Page->role->EditValue ?>"<?= $Page->role->editAttributes() ?> aria-describedby="x_role_help">
<?= $Page->role->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->role->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job_description ?>
    <div id="r_job_description" class="form-group row">
        <label id="elh_mas_employee_role_job_description_job_description" for="x_job_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->job_description->caption() ?><?= $Page->job_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->job_description->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_job_description">
<input type="<?= $Page->job_description->getInputTextType() ?>" data-table="mas_employee_role_job_description" data-field="x_job_description" name="x_job_description" id="x_job_description" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->job_description->getPlaceHolder()) ?>" value="<?= $Page->job_description->EditValue ?>"<?= $Page->job_description->editAttributes() ?> aria-describedby="x_job_description_help">
<?= $Page->job_description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->job_description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_mas_employee_role_job_description_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_mas_employee_role_job_description_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="mas_employee_role_job_description_x_status"
        data-table="mas_employee_role_job_description"
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
    var el = document.querySelector("select[data-select2-id='mas_employee_role_job_description_x_status']"),
        options = { name: "x_status", selectId: "mas_employee_role_job_description_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_employee_role_job_description.fields.status.selectOptions);
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
    ew.addEventHandlers("mas_employee_role_job_description");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
