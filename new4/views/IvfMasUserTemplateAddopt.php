<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfMasUserTemplateAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_mas_user_templateaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fivf_mas_user_templateaddopt = currentForm = new ew.Form("fivf_mas_user_templateaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_mas_user_template")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_mas_user_template)
        ew.vars.tables.ivf_mas_user_template = currentTable;
    fivf_mas_user_templateaddopt.addFields([
        ["TemplateName", [fields.TemplateName.visible && fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["TemplateType", [fields.TemplateType.visible && fields.TemplateType.required ? ew.Validators.required(fields.TemplateType.caption) : null], fields.TemplateType.isInvalid],
        ["_Template", [fields._Template.visible && fields._Template.required ? ew.Validators.required(fields._Template.caption) : null], fields._Template.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null], fields.created.isInvalid],
        ["createdDatetime", [fields.createdDatetime.visible && fields.createdDatetime.required ? ew.Validators.required(fields.createdDatetime.caption) : null], fields.createdDatetime.isInvalid],
        ["modified", [fields.modified.visible && fields.modified.required ? ew.Validators.required(fields.modified.caption) : null], fields.modified.isInvalid],
        ["modifiedDatetime", [fields.modifiedDatetime.visible && fields.modifiedDatetime.required ? ew.Validators.required(fields.modifiedDatetime.caption) : null], fields.modifiedDatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_mas_user_templateaddopt,
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
    fivf_mas_user_templateaddopt.validate = function () {
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
        return true;
    }

    // Form_CustomValidate
    fivf_mas_user_templateaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_mas_user_templateaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_mas_user_templateaddopt.lists.TemplateType = <?= $Page->TemplateType->toClientList($Page) ?>;
    loadjs.done("fivf_mas_user_templateaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fivf_mas_user_templateaddopt" id="fivf_mas_user_templateaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="ivf_mas_user_template">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TemplateName"><?= $Page->TemplateName->caption() ?><?= $Page->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->TemplateName->getInputTextType() ?>" data-table="ivf_mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>" value="<?= $Page->TemplateName->EditValue ?>"<?= $Page->TemplateName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TemplateType"><?= $Page->TemplateType->caption() ?><?= $Page->TemplateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateType"
        name="x_TemplateType"
        class="form-control ew-select<?= $Page->TemplateType->isInvalidClass() ?>"
        data-select2-id="ivf_mas_user_template_x_TemplateType"
        data-table="ivf_mas_user_template"
        data-field="x_TemplateType"
        data-value-separator="<?= $Page->TemplateType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateType->getPlaceHolder()) ?>"
        <?= $Page->TemplateType->editAttributes() ?>>
        <?= $Page->TemplateType->selectOptionListHtml("x_TemplateType") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_template_type") && !$Page->TemplateType->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateType" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateType->caption() ?>" data-title="<?= $Page->TemplateType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateType',url:'<?= GetUrl("IvfMasTemplateTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->TemplateType->getErrorMessage() ?></div>
<?= $Page->TemplateType->Lookup->getParamTag($Page, "p_x_TemplateType") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_mas_user_template_x_TemplateType']"),
        options = { name: "x_TemplateType", selectId: "ivf_mas_user_template_x_TemplateType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_mas_user_template.fields.TemplateType.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x__Template"><?= $Page->_Template->caption() ?><?= $Page->_Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<textarea data-table="ivf_mas_user_template" data-field="x__Template" name="x__Template" id="x__Template" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->_Template->getPlaceHolder()) ?>"<?= $Page->_Template->editAttributes() ?>><?= $Page->_Template->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->_Template->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <input type="hidden" data-table="ivf_mas_user_template" data-field="x_created" data-hidden="1" name="x_created" id="x_created" value="<?= HtmlEncode($Page->created->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
    <input type="hidden" data-table="ivf_mas_user_template" data-field="x_createdDatetime" data-hidden="1" name="x_createdDatetime" id="x_createdDatetime" value="<?= HtmlEncode($Page->createdDatetime->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->modified->Visible) { // modified ?>
    <input type="hidden" data-table="ivf_mas_user_template" data-field="x_modified" data-hidden="1" name="x_modified" id="x_modified" value="<?= HtmlEncode($Page->modified->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
    <input type="hidden" data-table="ivf_mas_user_template" data-field="x_modifiedDatetime" data-hidden="1" name="x_modifiedDatetime" id="x_modifiedDatetime" value="<?= HtmlEncode($Page->modifiedDatetime->CurrentValue) ?>">
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("ivf_mas_user_template");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
