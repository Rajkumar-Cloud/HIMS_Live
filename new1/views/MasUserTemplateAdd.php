<?php

namespace PHPMaker2021\project3;

// Page object
$MasUserTemplateAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_user_templateadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmas_user_templateadd = currentForm = new ew.Form("fmas_user_templateadd", "add");

    // Add fields
    var fields = ew.vars.tables.mas_user_template.fields;
    fmas_user_templateadd.addFields([
        ["TemplateName", [fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["TemplateType", [fields.TemplateType.required ? ew.Validators.required(fields.TemplateType.caption) : null], fields.TemplateType.isInvalid],
        ["_Template", [fields._Template.required ? ew.Validators.required(fields._Template.caption) : null], fields._Template.isInvalid],
        ["created", [fields.created.required ? ew.Validators.required(fields.created.caption) : null], fields.created.isInvalid],
        ["createdDatetime", [fields.createdDatetime.required ? ew.Validators.required(fields.createdDatetime.caption) : null, ew.Validators.datetime(0)], fields.createdDatetime.isInvalid],
        ["modified", [fields.modified.required ? ew.Validators.required(fields.modified.caption) : null], fields.modified.isInvalid],
        ["modifiedDatetime", [fields.modifiedDatetime.required ? ew.Validators.required(fields.modifiedDatetime.caption) : null, ew.Validators.datetime(0)], fields.modifiedDatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_user_templateadd,
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
    fmas_user_templateadd.validate = function () {
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
    fmas_user_templateadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_user_templateadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_user_templateadd");
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
<form name="fmas_user_templateadd" id="fmas_user_templateadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <div id="r_TemplateName" class="form-group row">
        <label id="elh_mas_user_template_TemplateName" for="x_TemplateName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TemplateName->caption() ?><?= $Page->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_TemplateName">
<input type="<?= $Page->TemplateName->getInputTextType() ?>" data-table="mas_user_template" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>" value="<?= $Page->TemplateName->EditValue ?>"<?= $Page->TemplateName->editAttributes() ?> aria-describedby="x_TemplateName_help">
<?= $Page->TemplateName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
    <div id="r_TemplateType" class="form-group row">
        <label id="elh_mas_user_template_TemplateType" for="x_TemplateType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TemplateType->caption() ?><?= $Page->TemplateType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateType->cellAttributes() ?>>
<span id="el_mas_user_template_TemplateType">
<input type="<?= $Page->TemplateType->getInputTextType() ?>" data-table="mas_user_template" data-field="x_TemplateType" name="x_TemplateType" id="x_TemplateType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TemplateType->getPlaceHolder()) ?>" value="<?= $Page->TemplateType->EditValue ?>"<?= $Page->TemplateType->editAttributes() ?> aria-describedby="x_TemplateType_help">
<?= $Page->TemplateType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <div id="r__Template" class="form-group row">
        <label id="elh_mas_user_template__Template" for="x__Template" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Template->caption() ?><?= $Page->_Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Template->cellAttributes() ?>>
<span id="el_mas_user_template__Template">
<textarea data-table="mas_user_template" data-field="x__Template" name="x__Template" id="x__Template" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->_Template->getPlaceHolder()) ?>"<?= $Page->_Template->editAttributes() ?> aria-describedby="x__Template_help"><?= $Page->_Template->EditValue ?></textarea>
<?= $Page->_Template->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Template->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_mas_user_template_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_mas_user_template_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="mas_user_template" data-field="x_created" name="x_created" id="x_created" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
    <div id="r_createdDatetime" class="form-group row">
        <label id="elh_mas_user_template_createdDatetime" for="x_createdDatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdDatetime->caption() ?><?= $Page->createdDatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdDatetime->cellAttributes() ?>>
<span id="el_mas_user_template_createdDatetime">
<input type="<?= $Page->createdDatetime->getInputTextType() ?>" data-table="mas_user_template" data-field="x_createdDatetime" name="x_createdDatetime" id="x_createdDatetime" placeholder="<?= HtmlEncode($Page->createdDatetime->getPlaceHolder()) ?>" value="<?= $Page->createdDatetime->EditValue ?>"<?= $Page->createdDatetime->editAttributes() ?> aria-describedby="x_createdDatetime_help">
<?= $Page->createdDatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdDatetime->getErrorMessage() ?></div>
<?php if (!$Page->createdDatetime->ReadOnly && !$Page->createdDatetime->Disabled && !isset($Page->createdDatetime->EditAttrs["readonly"]) && !isset($Page->createdDatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmas_user_templateadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmas_user_templateadd", "x_createdDatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modified->Visible) { // modified ?>
    <div id="r_modified" class="form-group row">
        <label id="elh_mas_user_template_modified" for="x_modified" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modified->caption() ?><?= $Page->modified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modified->cellAttributes() ?>>
<span id="el_mas_user_template_modified">
<input type="<?= $Page->modified->getInputTextType() ?>" data-table="mas_user_template" data-field="x_modified" name="x_modified" id="x_modified" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modified->getPlaceHolder()) ?>" value="<?= $Page->modified->EditValue ?>"<?= $Page->modified->editAttributes() ?> aria-describedby="x_modified_help">
<?= $Page->modified->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modified->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
    <div id="r_modifiedDatetime" class="form-group row">
        <label id="elh_mas_user_template_modifiedDatetime" for="x_modifiedDatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedDatetime->caption() ?><?= $Page->modifiedDatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedDatetime->cellAttributes() ?>>
<span id="el_mas_user_template_modifiedDatetime">
<input type="<?= $Page->modifiedDatetime->getInputTextType() ?>" data-table="mas_user_template" data-field="x_modifiedDatetime" name="x_modifiedDatetime" id="x_modifiedDatetime" placeholder="<?= HtmlEncode($Page->modifiedDatetime->getPlaceHolder()) ?>" value="<?= $Page->modifiedDatetime->EditValue ?>"<?= $Page->modifiedDatetime->editAttributes() ?> aria-describedby="x_modifiedDatetime_help">
<?= $Page->modifiedDatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedDatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifiedDatetime->ReadOnly && !$Page->modifiedDatetime->Disabled && !isset($Page->modifiedDatetime->EditAttrs["readonly"]) && !isset($Page->modifiedDatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmas_user_templateadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmas_user_templateadd", "x_modifiedDatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("mas_user_template");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
