<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrCompanystructuresEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_companystructuresedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhr_companystructuresedit = currentForm = new ew.Form("fhr_companystructuresedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_companystructures")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_companystructures)
        ew.vars.tables.hr_companystructures = currentTable;
    fhr_companystructuresedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["title", [fields.title.visible && fields.title.required ? ew.Validators.required(fields.title.caption) : null], fields.title.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["address", [fields.address.visible && fields.address.required ? ew.Validators.required(fields.address.caption) : null], fields.address.isInvalid],
        ["type", [fields.type.visible && fields.type.required ? ew.Validators.required(fields.type.caption) : null], fields.type.isInvalid],
        ["country", [fields.country.visible && fields.country.required ? ew.Validators.required(fields.country.caption) : null], fields.country.isInvalid],
        ["parent", [fields.parent.visible && fields.parent.required ? ew.Validators.required(fields.parent.caption) : null, ew.Validators.integer], fields.parent.isInvalid],
        ["timezone", [fields.timezone.visible && fields.timezone.required ? ew.Validators.required(fields.timezone.caption) : null], fields.timezone.isInvalid],
        ["heads", [fields.heads.visible && fields.heads.required ? ew.Validators.required(fields.heads.caption) : null], fields.heads.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_companystructuresedit,
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
    fhr_companystructuresedit.validate = function () {
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
    fhr_companystructuresedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_companystructuresedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_companystructuresedit.lists.type = <?= $Page->type->toClientList($Page) ?>;
    loadjs.done("fhr_companystructuresedit");
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
<form name="fhr_companystructuresedit" id="fhr_companystructuresedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_hr_companystructures_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_companystructures_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="hr_companystructures" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <div id="r_title" class="form-group row">
        <label id="elh_hr_companystructures_title" for="x_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->title->caption() ?><?= $Page->title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->title->cellAttributes() ?>>
<span id="el_hr_companystructures_title">
<input type="<?= $Page->title->getInputTextType() ?>" data-table="hr_companystructures" data-field="x_title" name="x_title" id="x_title" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->title->getPlaceHolder()) ?>" value="<?= $Page->title->EditValue ?>"<?= $Page->title->editAttributes() ?> aria-describedby="x_title_help">
<?= $Page->title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_hr_companystructures_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_hr_companystructures_description">
<textarea data-table="hr_companystructures" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <div id="r_address" class="form-group row">
        <label id="elh_hr_companystructures_address" for="x_address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address->caption() ?><?= $Page->address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->address->cellAttributes() ?>>
<span id="el_hr_companystructures_address">
<textarea data-table="hr_companystructures" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->address->getPlaceHolder()) ?>"<?= $Page->address->editAttributes() ?> aria-describedby="x_address_help"><?= $Page->address->EditValue ?></textarea>
<?= $Page->address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
    <div id="r_type" class="form-group row">
        <label id="elh_hr_companystructures_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->type->caption() ?><?= $Page->type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->type->cellAttributes() ?>>
<span id="el_hr_companystructures_type">
<template id="tp_x_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_companystructures" data-field="x_type" name="x_type" id="x_type"<?= $Page->type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_type"
    name="x_type"
    value="<?= HtmlEncode($Page->type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_type"
    data-target="dsl_x_type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->type->isInvalidClass() ?>"
    data-table="hr_companystructures"
    data-field="x_type"
    data-value-separator="<?= $Page->type->displayValueSeparatorAttribute() ?>"
    <?= $Page->type->editAttributes() ?>>
<?= $Page->type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <div id="r_country" class="form-group row">
        <label id="elh_hr_companystructures_country" for="x_country" class="<?= $Page->LeftColumnClass ?>"><?= $Page->country->caption() ?><?= $Page->country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->country->cellAttributes() ?>>
<span id="el_hr_companystructures_country">
<input type="<?= $Page->country->getInputTextType() ?>" data-table="hr_companystructures" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->country->getPlaceHolder()) ?>" value="<?= $Page->country->EditValue ?>"<?= $Page->country->editAttributes() ?> aria-describedby="x_country_help">
<?= $Page->country->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->country->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->parent->Visible) { // parent ?>
    <div id="r_parent" class="form-group row">
        <label id="elh_hr_companystructures_parent" for="x_parent" class="<?= $Page->LeftColumnClass ?>"><?= $Page->parent->caption() ?><?= $Page->parent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->parent->cellAttributes() ?>>
<span id="el_hr_companystructures_parent">
<input type="<?= $Page->parent->getInputTextType() ?>" data-table="hr_companystructures" data-field="x_parent" name="x_parent" id="x_parent" size="30" placeholder="<?= HtmlEncode($Page->parent->getPlaceHolder()) ?>" value="<?= $Page->parent->EditValue ?>"<?= $Page->parent->editAttributes() ?> aria-describedby="x_parent_help">
<?= $Page->parent->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->parent->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->timezone->Visible) { // timezone ?>
    <div id="r_timezone" class="form-group row">
        <label id="elh_hr_companystructures_timezone" for="x_timezone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->timezone->caption() ?><?= $Page->timezone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->timezone->cellAttributes() ?>>
<span id="el_hr_companystructures_timezone">
<input type="<?= $Page->timezone->getInputTextType() ?>" data-table="hr_companystructures" data-field="x_timezone" name="x_timezone" id="x_timezone" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->timezone->getPlaceHolder()) ?>" value="<?= $Page->timezone->EditValue ?>"<?= $Page->timezone->editAttributes() ?> aria-describedby="x_timezone_help">
<?= $Page->timezone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->timezone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->heads->Visible) { // heads ?>
    <div id="r_heads" class="form-group row">
        <label id="elh_hr_companystructures_heads" for="x_heads" class="<?= $Page->LeftColumnClass ?>"><?= $Page->heads->caption() ?><?= $Page->heads->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->heads->cellAttributes() ?>>
<span id="el_hr_companystructures_heads">
<input type="<?= $Page->heads->getInputTextType() ?>" data-table="hr_companystructures" data-field="x_heads" name="x_heads" id="x_heads" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->heads->getPlaceHolder()) ?>" value="<?= $Page->heads->EditValue ?>"<?= $Page->heads->editAttributes() ?> aria-describedby="x_heads_help">
<?= $Page->heads->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->heads->getErrorMessage() ?></div>
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
    ew.addEventHandlers("hr_companystructures");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
