<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmCrmentityEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_crmentityedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fcrm_crmentityedit = currentForm = new ew.Form("fcrm_crmentityedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_crmentity")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_crmentity)
        ew.vars.tables.crm_crmentity = currentTable;
    fcrm_crmentityedit.addFields([
        ["crmid", [fields.crmid.visible && fields.crmid.required ? ew.Validators.required(fields.crmid.caption) : null], fields.crmid.isInvalid],
        ["smcreatorid", [fields.smcreatorid.visible && fields.smcreatorid.required ? ew.Validators.required(fields.smcreatorid.caption) : null, ew.Validators.integer], fields.smcreatorid.isInvalid],
        ["smownerid", [fields.smownerid.visible && fields.smownerid.required ? ew.Validators.required(fields.smownerid.caption) : null, ew.Validators.integer], fields.smownerid.isInvalid],
        ["shownerid", [fields.shownerid.visible && fields.shownerid.required ? ew.Validators.required(fields.shownerid.caption) : null, ew.Validators.integer], fields.shownerid.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["setype", [fields.setype.visible && fields.setype.required ? ew.Validators.required(fields.setype.caption) : null], fields.setype.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["attention", [fields.attention.visible && fields.attention.required ? ew.Validators.required(fields.attention.caption) : null], fields.attention.isInvalid],
        ["createdtime", [fields.createdtime.visible && fields.createdtime.required ? ew.Validators.required(fields.createdtime.caption) : null, ew.Validators.datetime(0)], fields.createdtime.isInvalid],
        ["modifiedtime", [fields.modifiedtime.visible && fields.modifiedtime.required ? ew.Validators.required(fields.modifiedtime.caption) : null, ew.Validators.datetime(0)], fields.modifiedtime.isInvalid],
        ["viewedtime", [fields.viewedtime.visible && fields.viewedtime.required ? ew.Validators.required(fields.viewedtime.caption) : null, ew.Validators.datetime(0)], fields.viewedtime.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["version", [fields.version.visible && fields.version.required ? ew.Validators.required(fields.version.caption) : null, ew.Validators.integer], fields.version.isInvalid],
        ["presence", [fields.presence.visible && fields.presence.required ? ew.Validators.required(fields.presence.caption) : null, ew.Validators.integer], fields.presence.isInvalid],
        ["deleted", [fields.deleted.visible && fields.deleted.required ? ew.Validators.required(fields.deleted.caption) : null, ew.Validators.integer], fields.deleted.isInvalid],
        ["was_read", [fields.was_read.visible && fields.was_read.required ? ew.Validators.required(fields.was_read.caption) : null, ew.Validators.integer], fields.was_read.isInvalid],
        ["_private", [fields._private.visible && fields._private.required ? ew.Validators.required(fields._private.caption) : null, ew.Validators.integer], fields._private.isInvalid],
        ["users", [fields.users.visible && fields.users.required ? ew.Validators.required(fields.users.caption) : null], fields.users.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_crmentityedit,
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
    fcrm_crmentityedit.validate = function () {
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
    fcrm_crmentityedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_crmentityedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_crmentityedit");
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
<form name="fcrm_crmentityedit" id="fcrm_crmentityedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->crmid->Visible) { // crmid ?>
    <div id="r_crmid" class="form-group row">
        <label id="elh_crm_crmentity_crmid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->crmid->caption() ?><?= $Page->crmid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->crmid->cellAttributes() ?>>
<span id="el_crm_crmentity_crmid">
<span<?= $Page->crmid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->crmid->getDisplayValue($Page->crmid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="crm_crmentity" data-field="x_crmid" data-hidden="1" name="x_crmid" id="x_crmid" value="<?= HtmlEncode($Page->crmid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->smcreatorid->Visible) { // smcreatorid ?>
    <div id="r_smcreatorid" class="form-group row">
        <label id="elh_crm_crmentity_smcreatorid" for="x_smcreatorid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->smcreatorid->caption() ?><?= $Page->smcreatorid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->smcreatorid->cellAttributes() ?>>
<span id="el_crm_crmentity_smcreatorid">
<input type="<?= $Page->smcreatorid->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_smcreatorid" name="x_smcreatorid" id="x_smcreatorid" size="30" placeholder="<?= HtmlEncode($Page->smcreatorid->getPlaceHolder()) ?>" value="<?= $Page->smcreatorid->EditValue ?>"<?= $Page->smcreatorid->editAttributes() ?> aria-describedby="x_smcreatorid_help">
<?= $Page->smcreatorid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->smcreatorid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->smownerid->Visible) { // smownerid ?>
    <div id="r_smownerid" class="form-group row">
        <label id="elh_crm_crmentity_smownerid" for="x_smownerid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->smownerid->caption() ?><?= $Page->smownerid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->smownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_smownerid">
<input type="<?= $Page->smownerid->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_smownerid" name="x_smownerid" id="x_smownerid" size="30" placeholder="<?= HtmlEncode($Page->smownerid->getPlaceHolder()) ?>" value="<?= $Page->smownerid->EditValue ?>"<?= $Page->smownerid->editAttributes() ?> aria-describedby="x_smownerid_help">
<?= $Page->smownerid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->smownerid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->shownerid->Visible) { // shownerid ?>
    <div id="r_shownerid" class="form-group row">
        <label id="elh_crm_crmentity_shownerid" for="x_shownerid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->shownerid->caption() ?><?= $Page->shownerid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->shownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_shownerid">
<input type="<?= $Page->shownerid->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_shownerid" name="x_shownerid" id="x_shownerid" size="30" placeholder="<?= HtmlEncode($Page->shownerid->getPlaceHolder()) ?>" value="<?= $Page->shownerid->EditValue ?>"<?= $Page->shownerid->editAttributes() ?> aria-describedby="x_shownerid_help">
<?= $Page->shownerid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->shownerid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_crm_crmentity_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->setype->Visible) { // setype ?>
    <div id="r_setype" class="form-group row">
        <label id="elh_crm_crmentity_setype" for="x_setype" class="<?= $Page->LeftColumnClass ?>"><?= $Page->setype->caption() ?><?= $Page->setype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->setype->cellAttributes() ?>>
<span id="el_crm_crmentity_setype">
<input type="<?= $Page->setype->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_setype" name="x_setype" id="x_setype" size="30" maxlength="30" placeholder="<?= HtmlEncode($Page->setype->getPlaceHolder()) ?>" value="<?= $Page->setype->EditValue ?>"<?= $Page->setype->editAttributes() ?> aria-describedby="x_setype_help">
<?= $Page->setype->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->setype->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_crm_crmentity_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_crm_crmentity_description">
<textarea data-table="crm_crmentity" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attention->Visible) { // attention ?>
    <div id="r_attention" class="form-group row">
        <label id="elh_crm_crmentity_attention" for="x_attention" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attention->caption() ?><?= $Page->attention->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attention->cellAttributes() ?>>
<span id="el_crm_crmentity_attention">
<textarea data-table="crm_crmentity" data-field="x_attention" name="x_attention" id="x_attention" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->attention->getPlaceHolder()) ?>"<?= $Page->attention->editAttributes() ?> aria-describedby="x_attention_help"><?= $Page->attention->EditValue ?></textarea>
<?= $Page->attention->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attention->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdtime->Visible) { // createdtime ?>
    <div id="r_createdtime" class="form-group row">
        <label id="elh_crm_crmentity_createdtime" for="x_createdtime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdtime->caption() ?><?= $Page->createdtime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdtime->cellAttributes() ?>>
<span id="el_crm_crmentity_createdtime">
<input type="<?= $Page->createdtime->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_createdtime" name="x_createdtime" id="x_createdtime" placeholder="<?= HtmlEncode($Page->createdtime->getPlaceHolder()) ?>" value="<?= $Page->createdtime->EditValue ?>"<?= $Page->createdtime->editAttributes() ?> aria-describedby="x_createdtime_help">
<?= $Page->createdtime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdtime->getErrorMessage() ?></div>
<?php if (!$Page->createdtime->ReadOnly && !$Page->createdtime->Disabled && !isset($Page->createdtime->EditAttrs["readonly"]) && !isset($Page->createdtime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_crmentityedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_crmentityedit", "x_createdtime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedtime->Visible) { // modifiedtime ?>
    <div id="r_modifiedtime" class="form-group row">
        <label id="elh_crm_crmentity_modifiedtime" for="x_modifiedtime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedtime->caption() ?><?= $Page->modifiedtime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedtime">
<input type="<?= $Page->modifiedtime->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_modifiedtime" name="x_modifiedtime" id="x_modifiedtime" placeholder="<?= HtmlEncode($Page->modifiedtime->getPlaceHolder()) ?>" value="<?= $Page->modifiedtime->EditValue ?>"<?= $Page->modifiedtime->editAttributes() ?> aria-describedby="x_modifiedtime_help">
<?= $Page->modifiedtime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedtime->getErrorMessage() ?></div>
<?php if (!$Page->modifiedtime->ReadOnly && !$Page->modifiedtime->Disabled && !isset($Page->modifiedtime->EditAttrs["readonly"]) && !isset($Page->modifiedtime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_crmentityedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_crmentityedit", "x_modifiedtime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->viewedtime->Visible) { // viewedtime ?>
    <div id="r_viewedtime" class="form-group row">
        <label id="elh_crm_crmentity_viewedtime" for="x_viewedtime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->viewedtime->caption() ?><?= $Page->viewedtime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->viewedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_viewedtime">
<input type="<?= $Page->viewedtime->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_viewedtime" name="x_viewedtime" id="x_viewedtime" placeholder="<?= HtmlEncode($Page->viewedtime->getPlaceHolder()) ?>" value="<?= $Page->viewedtime->EditValue ?>"<?= $Page->viewedtime->editAttributes() ?> aria-describedby="x_viewedtime_help">
<?= $Page->viewedtime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->viewedtime->getErrorMessage() ?></div>
<?php if (!$Page->viewedtime->ReadOnly && !$Page->viewedtime->Disabled && !isset($Page->viewedtime->EditAttrs["readonly"]) && !isset($Page->viewedtime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_crmentityedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_crmentityedit", "x_viewedtime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_crm_crmentity_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_crm_crmentity_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->version->Visible) { // version ?>
    <div id="r_version" class="form-group row">
        <label id="elh_crm_crmentity_version" for="x_version" class="<?= $Page->LeftColumnClass ?>"><?= $Page->version->caption() ?><?= $Page->version->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->version->cellAttributes() ?>>
<span id="el_crm_crmentity_version">
<input type="<?= $Page->version->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_version" name="x_version" id="x_version" size="30" placeholder="<?= HtmlEncode($Page->version->getPlaceHolder()) ?>" value="<?= $Page->version->EditValue ?>"<?= $Page->version->editAttributes() ?> aria-describedby="x_version_help">
<?= $Page->version->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->version->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <div id="r_presence" class="form-group row">
        <label id="elh_crm_crmentity_presence" for="x_presence" class="<?= $Page->LeftColumnClass ?>"><?= $Page->presence->caption() ?><?= $Page->presence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_crmentity_presence">
<input type="<?= $Page->presence->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?= HtmlEncode($Page->presence->getPlaceHolder()) ?>" value="<?= $Page->presence->EditValue ?>"<?= $Page->presence->editAttributes() ?> aria-describedby="x_presence_help">
<?= $Page->presence->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->presence->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->deleted->Visible) { // deleted ?>
    <div id="r_deleted" class="form-group row">
        <label id="elh_crm_crmentity_deleted" for="x_deleted" class="<?= $Page->LeftColumnClass ?>"><?= $Page->deleted->caption() ?><?= $Page->deleted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->deleted->cellAttributes() ?>>
<span id="el_crm_crmentity_deleted">
<input type="<?= $Page->deleted->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_deleted" name="x_deleted" id="x_deleted" size="30" placeholder="<?= HtmlEncode($Page->deleted->getPlaceHolder()) ?>" value="<?= $Page->deleted->EditValue ?>"<?= $Page->deleted->editAttributes() ?> aria-describedby="x_deleted_help">
<?= $Page->deleted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->deleted->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->was_read->Visible) { // was_read ?>
    <div id="r_was_read" class="form-group row">
        <label id="elh_crm_crmentity_was_read" for="x_was_read" class="<?= $Page->LeftColumnClass ?>"><?= $Page->was_read->caption() ?><?= $Page->was_read->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->was_read->cellAttributes() ?>>
<span id="el_crm_crmentity_was_read">
<input type="<?= $Page->was_read->getInputTextType() ?>" data-table="crm_crmentity" data-field="x_was_read" name="x_was_read" id="x_was_read" size="30" placeholder="<?= HtmlEncode($Page->was_read->getPlaceHolder()) ?>" value="<?= $Page->was_read->EditValue ?>"<?= $Page->was_read->editAttributes() ?> aria-describedby="x_was_read_help">
<?= $Page->was_read->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->was_read->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_private->Visible) { // private ?>
    <div id="r__private" class="form-group row">
        <label id="elh_crm_crmentity__private" for="x__private" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_private->caption() ?><?= $Page->_private->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_private->cellAttributes() ?>>
<span id="el_crm_crmentity__private">
<input type="<?= $Page->_private->getInputTextType() ?>" data-table="crm_crmentity" data-field="x__private" name="x__private" id="x__private" size="30" placeholder="<?= HtmlEncode($Page->_private->getPlaceHolder()) ?>" value="<?= $Page->_private->EditValue ?>"<?= $Page->_private->editAttributes() ?> aria-describedby="x__private_help">
<?= $Page->_private->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_private->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->users->Visible) { // users ?>
    <div id="r_users" class="form-group row">
        <label id="elh_crm_crmentity_users" for="x_users" class="<?= $Page->LeftColumnClass ?>"><?= $Page->users->caption() ?><?= $Page->users->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->users->cellAttributes() ?>>
<span id="el_crm_crmentity_users">
<textarea data-table="crm_crmentity" data-field="x_users" name="x_users" id="x_users" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->users->getPlaceHolder()) ?>"<?= $Page->users->editAttributes() ?> aria-describedby="x_users_help"><?= $Page->users->EditValue ?></textarea>
<?= $Page->users->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->users->getErrorMessage() ?></div>
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
    ew.addEventHandlers("crm_crmentity");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
