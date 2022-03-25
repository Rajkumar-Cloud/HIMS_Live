<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_user_template")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_user_template)
        ew.vars.tables.mas_user_template = currentTable;
    fmas_user_templateadd.addFields([
        ["TemplateName", [fields.TemplateName.visible && fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["TemplateType", [fields.TemplateType.visible && fields.TemplateType.required ? ew.Validators.required(fields.TemplateType.caption) : null], fields.TemplateType.isInvalid],
        ["_Template", [fields._Template.visible && fields._Template.required ? ew.Validators.required(fields._Template.caption) : null], fields._Template.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null], fields.created.isInvalid],
        ["createdDatetime", [fields.createdDatetime.visible && fields.createdDatetime.required ? ew.Validators.required(fields.createdDatetime.caption) : null], fields.createdDatetime.isInvalid]
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
    fmas_user_templateadd.lists.TemplateType = <?= $Page->TemplateType->toClientList($Page) ?>;
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
<form name="fmas_user_templateadd" id="fmas_user_templateadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
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
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateType"
        name="x_TemplateType"
        class="form-control ew-select<?= $Page->TemplateType->isInvalidClass() ?>"
        data-select2-id="mas_user_template_x_TemplateType"
        data-table="mas_user_template"
        data-field="x_TemplateType"
        data-value-separator="<?= $Page->TemplateType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateType->getPlaceHolder()) ?>"
        <?= $Page->TemplateType->editAttributes() ?>>
        <?= $Page->TemplateType->selectOptionListHtml("x_TemplateType") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_template_type") && !$Page->TemplateType->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateType" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateType->caption() ?>" data-title="<?= $Page->TemplateType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateType',url:'<?= GetUrl("MasTemplateTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateType->getErrorMessage() ?></div>
<?= $Page->TemplateType->Lookup->getParamTag($Page, "p_x_TemplateType") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_user_template_x_TemplateType']"),
        options = { name: "x_TemplateType", selectId: "mas_user_template_x_TemplateType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_user_template.fields.TemplateType.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <div id="r__Template" class="form-group row">
        <label id="elh_mas_user_template__Template" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Template->caption() ?><?= $Page->_Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Template->cellAttributes() ?>>
<span id="el_mas_user_template__Template">
<?php $Page->_Template->EditAttrs->appendClass("editor"); ?>
<textarea data-table="mas_user_template" data-field="x__Template" name="x__Template" id="x__Template" cols="35" rows="25" placeholder="<?= HtmlEncode($Page->_Template->getPlaceHolder()) ?>"<?= $Page->_Template->editAttributes() ?> aria-describedby="x__Template_help"><?= $Page->_Template->EditValue ?></textarea>
<?= $Page->_Template->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Template->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_templateadd", "editor"], function() {
	ew.createEditor("fmas_user_templateadd", "x__Template", 35, 25, <?= $Page->_Template->ReadOnly || false ? "true" : "false" ?>);
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
    ew.addEventHandlers("mas_user_template");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
