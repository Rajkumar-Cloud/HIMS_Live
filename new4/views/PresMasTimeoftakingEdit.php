<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresMasTimeoftakingEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_mas_timeoftakingedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_mas_timeoftakingedit = currentForm = new ew.Form("fpres_mas_timeoftakingedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_mas_timeoftaking")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_mas_timeoftaking)
        ew.vars.tables.pres_mas_timeoftaking = currentTable;
    fpres_mas_timeoftakingedit.addFields([
        ["ID", [fields.ID.visible && fields.ID.required ? ew.Validators.required(fields.ID.caption) : null], fields.ID.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.visible && fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_mas_timeoftakingedit,
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
    fpres_mas_timeoftakingedit.validate = function () {
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
    fpres_mas_timeoftakingedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_mas_timeoftakingedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_mas_timeoftakingedit");
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
<form name="fpres_mas_timeoftakingedit" id="fpres_mas_timeoftakingedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->ID->Visible) { // ID ?>
    <div id="r_ID" class="form-group row">
        <label id="elh_pres_mas_timeoftaking_ID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ID->caption() ?><?= $Page->ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ID->cellAttributes() ?>>
<span id="el_pres_mas_timeoftaking_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ID->getDisplayValue($Page->ID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_mas_timeoftaking" data-field="x_ID" data-hidden="1" name="x_ID" id="x_ID" value="<?= HtmlEncode($Page->ID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // Time Of Taking ?>
    <div id="r_TimeOfTaking" class="form-group row">
        <label id="elh_pres_mas_timeoftaking_TimeOfTaking" for="x_TimeOfTaking" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TimeOfTaking->caption() ?><?= $Page->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el_pres_mas_timeoftaking_TimeOfTaking">
<input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" data-table="pres_mas_timeoftaking" data-field="x_TimeOfTaking" name="x_TimeOfTaking" id="x_TimeOfTaking" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" value="<?= $Page->TimeOfTaking->EditValue ?>"<?= $Page->TimeOfTaking->editAttributes() ?> aria-describedby="x_TimeOfTaking_help">
<?= $Page->TimeOfTaking->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_mas_timeoftaking");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
