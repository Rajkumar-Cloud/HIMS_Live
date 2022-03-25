<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsourceEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadsourceedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fcrm_leadsourceedit = currentForm = new ew.Form("fcrm_leadsourceedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_leadsource")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_leadsource)
        ew.vars.tables.crm_leadsource = currentTable;
    fcrm_leadsourceedit.addFields([
        ["leadsourceid", [fields.leadsourceid.visible && fields.leadsourceid.required ? ew.Validators.required(fields.leadsourceid.caption) : null], fields.leadsourceid.isInvalid],
        ["leadsource", [fields.leadsource.visible && fields.leadsource.required ? ew.Validators.required(fields.leadsource.caption) : null], fields.leadsource.isInvalid],
        ["presence", [fields.presence.visible && fields.presence.required ? ew.Validators.required(fields.presence.caption) : null, ew.Validators.integer], fields.presence.isInvalid],
        ["picklist_valueid", [fields.picklist_valueid.visible && fields.picklist_valueid.required ? ew.Validators.required(fields.picklist_valueid.caption) : null, ew.Validators.integer], fields.picklist_valueid.isInvalid],
        ["sortorderid", [fields.sortorderid.visible && fields.sortorderid.required ? ew.Validators.required(fields.sortorderid.caption) : null, ew.Validators.integer], fields.sortorderid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_leadsourceedit,
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
    fcrm_leadsourceedit.validate = function () {
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
    fcrm_leadsourceedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_leadsourceedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_leadsourceedit");
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
<form name="fcrm_leadsourceedit" id="fcrm_leadsourceedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->leadsourceid->Visible) { // leadsourceid ?>
    <div id="r_leadsourceid" class="form-group row">
        <label id="elh_crm_leadsource_leadsourceid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadsourceid->caption() ?><?= $Page->leadsourceid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadsourceid->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsourceid">
<span<?= $Page->leadsourceid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->leadsourceid->getDisplayValue($Page->leadsourceid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="crm_leadsource" data-field="x_leadsourceid" data-hidden="1" name="x_leadsourceid" id="x_leadsourceid" value="<?= HtmlEncode($Page->leadsourceid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
    <div id="r_leadsource" class="form-group row">
        <label id="elh_crm_leadsource_leadsource" for="x_leadsource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadsource->caption() ?><?= $Page->leadsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadsource->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsource">
<input type="<?= $Page->leadsource->getInputTextType() ?>" data-table="crm_leadsource" data-field="x_leadsource" name="x_leadsource" id="x_leadsource" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->leadsource->getPlaceHolder()) ?>" value="<?= $Page->leadsource->EditValue ?>"<?= $Page->leadsource->editAttributes() ?> aria-describedby="x_leadsource_help">
<?= $Page->leadsource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadsource->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <div id="r_presence" class="form-group row">
        <label id="elh_crm_leadsource_presence" for="x_presence" class="<?= $Page->LeftColumnClass ?>"><?= $Page->presence->caption() ?><?= $Page->presence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_leadsource_presence">
<input type="<?= $Page->presence->getInputTextType() ?>" data-table="crm_leadsource" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?= HtmlEncode($Page->presence->getPlaceHolder()) ?>" value="<?= $Page->presence->EditValue ?>"<?= $Page->presence->editAttributes() ?> aria-describedby="x_presence_help">
<?= $Page->presence->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->presence->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
    <div id="r_picklist_valueid" class="form-group row">
        <label id="elh_crm_leadsource_picklist_valueid" for="x_picklist_valueid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->picklist_valueid->caption() ?><?= $Page->picklist_valueid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadsource_picklist_valueid">
<input type="<?= $Page->picklist_valueid->getInputTextType() ?>" data-table="crm_leadsource" data-field="x_picklist_valueid" name="x_picklist_valueid" id="x_picklist_valueid" size="30" placeholder="<?= HtmlEncode($Page->picklist_valueid->getPlaceHolder()) ?>" value="<?= $Page->picklist_valueid->EditValue ?>"<?= $Page->picklist_valueid->editAttributes() ?> aria-describedby="x_picklist_valueid_help">
<?= $Page->picklist_valueid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->picklist_valueid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
    <div id="r_sortorderid" class="form-group row">
        <label id="elh_crm_leadsource_sortorderid" for="x_sortorderid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sortorderid->caption() ?><?= $Page->sortorderid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadsource_sortorderid">
<input type="<?= $Page->sortorderid->getInputTextType() ?>" data-table="crm_leadsource" data-field="x_sortorderid" name="x_sortorderid" id="x_sortorderid" size="30" placeholder="<?= HtmlEncode($Page->sortorderid->getPlaceHolder()) ?>" value="<?= $Page->sortorderid->EditValue ?>"<?= $Page->sortorderid->editAttributes() ?> aria-describedby="x_sortorderid_help">
<?= $Page->sortorderid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sortorderid->getErrorMessage() ?></div>
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
    ew.addEventHandlers("crm_leadsource");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
