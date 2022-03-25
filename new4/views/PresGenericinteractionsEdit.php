<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresGenericinteractionsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_genericinteractionsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_genericinteractionsedit = currentForm = new ew.Form("fpres_genericinteractionsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_genericinteractions")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_genericinteractions)
        ew.vars.tables.pres_genericinteractions = currentTable;
    fpres_genericinteractionsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Genericname", [fields.Genericname.visible && fields.Genericname.required ? ew.Validators.required(fields.Genericname.caption) : null], fields.Genericname.isInvalid],
        ["Catid", [fields.Catid.visible && fields.Catid.required ? ew.Validators.required(fields.Catid.caption) : null, ew.Validators.integer], fields.Catid.isInvalid],
        ["Interactions", [fields.Interactions.visible && fields.Interactions.required ? ew.Validators.required(fields.Interactions.caption) : null], fields.Interactions.isInvalid],
        ["Intid", [fields.Intid.visible && fields.Intid.required ? ew.Validators.required(fields.Intid.caption) : null, ew.Validators.integer], fields.Intid.isInvalid],
        ["Createddt", [fields.Createddt.visible && fields.Createddt.required ? ew.Validators.required(fields.Createddt.caption) : null, ew.Validators.datetime(0)], fields.Createddt.isInvalid],
        ["Createdtm", [fields.Createdtm.visible && fields.Createdtm.required ? ew.Validators.required(fields.Createdtm.caption) : null, ew.Validators.time], fields.Createdtm.isInvalid],
        ["Statusbit", [fields.Statusbit.visible && fields.Statusbit.required ? ew.Validators.required(fields.Statusbit.caption) : null, ew.Validators.integer], fields.Statusbit.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["_Username", [fields._Username.visible && fields._Username.required ? ew.Validators.required(fields._Username.caption) : null], fields._Username.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_genericinteractionsedit,
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
    fpres_genericinteractionsedit.validate = function () {
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
    fpres_genericinteractionsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_genericinteractionsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_genericinteractionsedit");
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
<form name="fpres_genericinteractionsedit" id="fpres_genericinteractionsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pres_genericinteractions_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_genericinteractions_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_genericinteractions" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <div id="r_Genericname" class="form-group row">
        <label id="elh_pres_genericinteractions_Genericname" for="x_Genericname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Genericname->caption() ?><?= $Page->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Genericname">
<input type="<?= $Page->Genericname->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Genericname->getPlaceHolder()) ?>" value="<?= $Page->Genericname->EditValue ?>"<?= $Page->Genericname->editAttributes() ?> aria-describedby="x_Genericname_help">
<?= $Page->Genericname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Genericname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Catid->Visible) { // Catid ?>
    <div id="r_Catid" class="form-group row">
        <label id="elh_pres_genericinteractions_Catid" for="x_Catid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Catid->caption() ?><?= $Page->Catid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Catid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Catid">
<input type="<?= $Page->Catid->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Catid" name="x_Catid" id="x_Catid" size="30" placeholder="<?= HtmlEncode($Page->Catid->getPlaceHolder()) ?>" value="<?= $Page->Catid->EditValue ?>"<?= $Page->Catid->editAttributes() ?> aria-describedby="x_Catid_help">
<?= $Page->Catid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Catid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Interactions->Visible) { // Interactions ?>
    <div id="r_Interactions" class="form-group row">
        <label id="elh_pres_genericinteractions_Interactions" for="x_Interactions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Interactions->caption() ?><?= $Page->Interactions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Interactions->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Interactions">
<input type="<?= $Page->Interactions->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Interactions" name="x_Interactions" id="x_Interactions" placeholder="<?= HtmlEncode($Page->Interactions->getPlaceHolder()) ?>" value="<?= $Page->Interactions->EditValue ?>"<?= $Page->Interactions->editAttributes() ?> aria-describedby="x_Interactions_help">
<?= $Page->Interactions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Interactions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Intid->Visible) { // Intid ?>
    <div id="r_Intid" class="form-group row">
        <label id="elh_pres_genericinteractions_Intid" for="x_Intid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Intid->caption() ?><?= $Page->Intid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Intid->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Intid">
<input type="<?= $Page->Intid->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Intid" name="x_Intid" id="x_Intid" size="30" placeholder="<?= HtmlEncode($Page->Intid->getPlaceHolder()) ?>" value="<?= $Page->Intid->EditValue ?>"<?= $Page->Intid->editAttributes() ?> aria-describedby="x_Intid_help">
<?= $Page->Intid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Intid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Createddt->Visible) { // Createddt ?>
    <div id="r_Createddt" class="form-group row">
        <label id="elh_pres_genericinteractions_Createddt" for="x_Createddt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Createddt->caption() ?><?= $Page->Createddt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Createddt->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createddt">
<input type="<?= $Page->Createddt->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Createddt" name="x_Createddt" id="x_Createddt" placeholder="<?= HtmlEncode($Page->Createddt->getPlaceHolder()) ?>" value="<?= $Page->Createddt->EditValue ?>"<?= $Page->Createddt->editAttributes() ?> aria-describedby="x_Createddt_help">
<?= $Page->Createddt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Createddt->getErrorMessage() ?></div>
<?php if (!$Page->Createddt->ReadOnly && !$Page->Createddt->Disabled && !isset($Page->Createddt->EditAttrs["readonly"]) && !isset($Page->Createddt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpres_genericinteractionsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpres_genericinteractionsedit", "x_Createddt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Createdtm->Visible) { // Createdtm ?>
    <div id="r_Createdtm" class="form-group row">
        <label id="elh_pres_genericinteractions_Createdtm" for="x_Createdtm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Createdtm->caption() ?><?= $Page->Createdtm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Createdtm->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Createdtm">
<input type="<?= $Page->Createdtm->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Createdtm" name="x_Createdtm" id="x_Createdtm" placeholder="<?= HtmlEncode($Page->Createdtm->getPlaceHolder()) ?>" value="<?= $Page->Createdtm->EditValue ?>"<?= $Page->Createdtm->editAttributes() ?> aria-describedby="x_Createdtm_help">
<?= $Page->Createdtm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Createdtm->getErrorMessage() ?></div>
<?php if (!$Page->Createdtm->ReadOnly && !$Page->Createdtm->Disabled && !isset($Page->Createdtm->EditAttrs["readonly"]) && !isset($Page->Createdtm->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpres_genericinteractionsedit", "timepicker"], function() {
    ew.createTimePicker("fpres_genericinteractionsedit", "x_Createdtm", {"timeFormat":"H:i:s","step":15});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Statusbit->Visible) { // Statusbit ?>
    <div id="r_Statusbit" class="form-group row">
        <label id="elh_pres_genericinteractions_Statusbit" for="x_Statusbit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Statusbit->caption() ?><?= $Page->Statusbit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Statusbit->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Statusbit">
<input type="<?= $Page->Statusbit->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Statusbit" name="x_Statusbit" id="x_Statusbit" size="30" placeholder="<?= HtmlEncode($Page->Statusbit->getPlaceHolder()) ?>" value="<?= $Page->Statusbit->EditValue ?>"<?= $Page->Statusbit->editAttributes() ?> aria-describedby="x_Statusbit_help">
<?= $Page->Statusbit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Statusbit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_pres_genericinteractions_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pres_genericinteractions_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Username->Visible) { // Username ?>
    <div id="r__Username" class="form-group row">
        <label id="elh_pres_genericinteractions__Username" for="x__Username" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Username->caption() ?><?= $Page->_Username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Username->cellAttributes() ?>>
<span id="el_pres_genericinteractions__Username">
<input type="<?= $Page->_Username->getInputTextType() ?>" data-table="pres_genericinteractions" data-field="x__Username" name="x__Username" id="x__Username" placeholder="<?= HtmlEncode($Page->_Username->getPlaceHolder()) ?>" value="<?= $Page->_Username->EditValue ?>"<?= $Page->_Username->editAttributes() ?> aria-describedby="x__Username_help">
<?= $Page->_Username->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Username->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_genericinteractions");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
