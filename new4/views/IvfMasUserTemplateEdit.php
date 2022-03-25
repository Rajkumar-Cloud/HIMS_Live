<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfMasUserTemplateEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_mas_user_templateedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_mas_user_templateedit = currentForm = new ew.Form("fivf_mas_user_templateedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_mas_user_template")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_mas_user_template)
        ew.vars.tables.ivf_mas_user_template = currentTable;
    fivf_mas_user_templateedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["TemplateName", [fields.TemplateName.visible && fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["TemplateType", [fields.TemplateType.visible && fields.TemplateType.required ? ew.Validators.required(fields.TemplateType.caption) : null], fields.TemplateType.isInvalid],
        ["_Template", [fields._Template.visible && fields._Template.required ? ew.Validators.required(fields._Template.caption) : null], fields._Template.isInvalid],
        ["modified", [fields.modified.visible && fields.modified.required ? ew.Validators.required(fields.modified.caption) : null], fields.modified.isInvalid],
        ["modifiedDatetime", [fields.modifiedDatetime.visible && fields.modifiedDatetime.required ? ew.Validators.required(fields.modifiedDatetime.caption) : null], fields.modifiedDatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_mas_user_templateedit,
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
    fivf_mas_user_templateedit.validate = function () {
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
    fivf_mas_user_templateedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_mas_user_templateedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_mas_user_templateedit.lists.TemplateType = <?= $Page->TemplateType->toClientList($Page) ?>;
    loadjs.done("fivf_mas_user_templateedit");
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
<form name="fivf_mas_user_templateedit" id="fivf_mas_user_templateedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_mas_user_template_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_mas_user_template" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <div id="r_TemplateName" class="form-group row">
        <label id="elh_ivf_mas_user_template_TemplateName" for="x_TemplateName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TemplateName->caption() ?><?= $Page->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateName">
<input type="<?= $Page->TemplateName->getInputTextType() ?>" data-table="ivf_mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>" value="<?= $Page->TemplateName->EditValue ?>"<?= $Page->TemplateName->editAttributes() ?> aria-describedby="x_TemplateName_help">
<?= $Page->TemplateName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
    <div id="r_TemplateType" class="form-group row">
        <label id="elh_ivf_mas_user_template_TemplateType" for="x_TemplateType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TemplateType->caption() ?><?= $Page->TemplateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateType->cellAttributes() ?>>
<span id="el_ivf_mas_user_template_TemplateType">
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
<?= $Page->TemplateType->getCustomMessage() ?>
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <div id="r__Template" class="form-group row">
        <label id="elh_ivf_mas_user_template__Template" for="x__Template" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Template->caption() ?><?= $Page->_Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Template->cellAttributes() ?>>
<span id="el_ivf_mas_user_template__Template">
<textarea data-table="ivf_mas_user_template" data-field="x__Template" name="x__Template" id="x__Template" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->_Template->getPlaceHolder()) ?>"<?= $Page->_Template->editAttributes() ?> aria-describedby="x__Template_help"><?= $Page->_Template->EditValue ?></textarea>
<?= $Page->_Template->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Template->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_mas_user_template");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
