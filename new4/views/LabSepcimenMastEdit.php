<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabSepcimenMastEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_sepcimen_mastedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    flab_sepcimen_mastedit = currentForm = new ew.Form("flab_sepcimen_mastedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_sepcimen_mast")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_sepcimen_mast)
        ew.vars.tables.lab_sepcimen_mast = currentTable;
    flab_sepcimen_mastedit.addFields([
        ["SpecimenCD", [fields.SpecimenCD.visible && fields.SpecimenCD.required ? ew.Validators.required(fields.SpecimenCD.caption) : null], fields.SpecimenCD.isInvalid],
        ["SpecimenDesc", [fields.SpecimenDesc.visible && fields.SpecimenDesc.required ? ew.Validators.required(fields.SpecimenDesc.caption) : null], fields.SpecimenDesc.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_sepcimen_mastedit,
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
    flab_sepcimen_mastedit.validate = function () {
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
    flab_sepcimen_mastedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_sepcimen_mastedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_sepcimen_mastedit");
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
<form name="flab_sepcimen_mastedit" id="flab_sepcimen_mastedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->SpecimenCD->Visible) { // SpecimenCD ?>
    <div id="r_SpecimenCD" class="form-group row">
        <label id="elh_lab_sepcimen_mast_SpecimenCD" for="x_SpecimenCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SpecimenCD->caption() ?><?= $Page->SpecimenCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<input type="<?= $Page->SpecimenCD->getInputTextType() ?>" data-table="lab_sepcimen_mast" data-field="x_SpecimenCD" name="x_SpecimenCD" id="x_SpecimenCD" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->SpecimenCD->getPlaceHolder()) ?>" value="<?= $Page->SpecimenCD->EditValue ?>"<?= $Page->SpecimenCD->editAttributes() ?> aria-describedby="x_SpecimenCD_help">
<?= $Page->SpecimenCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpecimenCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpecimenDesc->Visible) { // SpecimenDesc ?>
    <div id="r_SpecimenDesc" class="form-group row">
        <label id="elh_lab_sepcimen_mast_SpecimenDesc" for="x_SpecimenDesc" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SpecimenDesc->caption() ?><?= $Page->SpecimenDesc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<input type="<?= $Page->SpecimenDesc->getInputTextType() ?>" data-table="lab_sepcimen_mast" data-field="x_SpecimenDesc" name="x_SpecimenDesc" id="x_SpecimenDesc" size="30" maxlength="30" placeholder="<?= HtmlEncode($Page->SpecimenDesc->getPlaceHolder()) ?>" value="<?= $Page->SpecimenDesc->EditValue ?>"<?= $Page->SpecimenDesc->editAttributes() ?> aria-describedby="x_SpecimenDesc_help">
<?= $Page->SpecimenDesc->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpecimenDesc->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_lab_sepcimen_mast_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_sepcimen_mast" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
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
    ew.addEventHandlers("lab_sepcimen_mast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
