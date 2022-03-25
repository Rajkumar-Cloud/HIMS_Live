<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadstatusAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadstatusadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fcrm_leadstatusadd = currentForm = new ew.Form("fcrm_leadstatusadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_leadstatus")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_leadstatus)
        ew.vars.tables.crm_leadstatus = currentTable;
    fcrm_leadstatusadd.addFields([
        ["leadstatus", [fields.leadstatus.visible && fields.leadstatus.required ? ew.Validators.required(fields.leadstatus.caption) : null], fields.leadstatus.isInvalid],
        ["presence", [fields.presence.visible && fields.presence.required ? ew.Validators.required(fields.presence.caption) : null, ew.Validators.integer], fields.presence.isInvalid],
        ["picklist_valueid", [fields.picklist_valueid.visible && fields.picklist_valueid.required ? ew.Validators.required(fields.picklist_valueid.caption) : null, ew.Validators.integer], fields.picklist_valueid.isInvalid],
        ["sortorderid", [fields.sortorderid.visible && fields.sortorderid.required ? ew.Validators.required(fields.sortorderid.caption) : null, ew.Validators.integer], fields.sortorderid.isInvalid],
        ["color", [fields.color.visible && fields.color.required ? ew.Validators.required(fields.color.caption) : null], fields.color.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_leadstatusadd,
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
    fcrm_leadstatusadd.validate = function () {
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
    fcrm_leadstatusadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_leadstatusadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_leadstatusadd");
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
<form name="fcrm_leadstatusadd" id="fcrm_leadstatusadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadstatus">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
    <div id="r_leadstatus" class="form-group row">
        <label id="elh_crm_leadstatus_leadstatus" for="x_leadstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadstatus->caption() ?><?= $Page->leadstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el_crm_leadstatus_leadstatus">
<input type="<?= $Page->leadstatus->getInputTextType() ?>" data-table="crm_leadstatus" data-field="x_leadstatus" name="x_leadstatus" id="x_leadstatus" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->leadstatus->getPlaceHolder()) ?>" value="<?= $Page->leadstatus->EditValue ?>"<?= $Page->leadstatus->editAttributes() ?> aria-describedby="x_leadstatus_help">
<?= $Page->leadstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <div id="r_presence" class="form-group row">
        <label id="elh_crm_leadstatus_presence" for="x_presence" class="<?= $Page->LeftColumnClass ?>"><?= $Page->presence->caption() ?><?= $Page->presence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_leadstatus_presence">
<input type="<?= $Page->presence->getInputTextType() ?>" data-table="crm_leadstatus" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?= HtmlEncode($Page->presence->getPlaceHolder()) ?>" value="<?= $Page->presence->EditValue ?>"<?= $Page->presence->editAttributes() ?> aria-describedby="x_presence_help">
<?= $Page->presence->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->presence->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
    <div id="r_picklist_valueid" class="form-group row">
        <label id="elh_crm_leadstatus_picklist_valueid" for="x_picklist_valueid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->picklist_valueid->caption() ?><?= $Page->picklist_valueid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadstatus_picklist_valueid">
<input type="<?= $Page->picklist_valueid->getInputTextType() ?>" data-table="crm_leadstatus" data-field="x_picklist_valueid" name="x_picklist_valueid" id="x_picklist_valueid" size="30" placeholder="<?= HtmlEncode($Page->picklist_valueid->getPlaceHolder()) ?>" value="<?= $Page->picklist_valueid->EditValue ?>"<?= $Page->picklist_valueid->editAttributes() ?> aria-describedby="x_picklist_valueid_help">
<?= $Page->picklist_valueid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->picklist_valueid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
    <div id="r_sortorderid" class="form-group row">
        <label id="elh_crm_leadstatus_sortorderid" for="x_sortorderid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sortorderid->caption() ?><?= $Page->sortorderid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadstatus_sortorderid">
<input type="<?= $Page->sortorderid->getInputTextType() ?>" data-table="crm_leadstatus" data-field="x_sortorderid" name="x_sortorderid" id="x_sortorderid" size="30" placeholder="<?= HtmlEncode($Page->sortorderid->getPlaceHolder()) ?>" value="<?= $Page->sortorderid->EditValue ?>"<?= $Page->sortorderid->editAttributes() ?> aria-describedby="x_sortorderid_help">
<?= $Page->sortorderid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sortorderid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->color->Visible) { // color ?>
    <div id="r_color" class="form-group row">
        <label id="elh_crm_leadstatus_color" for="x_color" class="<?= $Page->LeftColumnClass ?>"><?= $Page->color->caption() ?><?= $Page->color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->color->cellAttributes() ?>>
<span id="el_crm_leadstatus_color">
<input type="<?= $Page->color->getInputTextType() ?>" data-table="crm_leadstatus" data-field="x_color" name="x_color" id="x_color" size="30" maxlength="25" placeholder="<?= HtmlEncode($Page->color->getPlaceHolder()) ?>" value="<?= $Page->color->EditValue ?>"<?= $Page->color->editAttributes() ?> aria-describedby="x_color_help">
<?= $Page->color->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->color->getErrorMessage() ?></div>
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
    ew.addEventHandlers("crm_leadstatus");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
