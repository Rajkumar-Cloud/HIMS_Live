<?php

namespace PHPMaker2021\project3;

// Page object
$MasterProcedureTreatmentAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmaster_procedure_treatmentadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmaster_procedure_treatmentadd = currentForm = new ew.Form("fmaster_procedure_treatmentadd", "add");

    // Add fields
    var fields = ew.vars.tables.master_procedure_treatment.fields;
    fmaster_procedure_treatmentadd.addFields([
        ["Treatment", [fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["Procedure", [fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmaster_procedure_treatmentadd,
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
    fmaster_procedure_treatmentadd.validate = function () {
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
    fmaster_procedure_treatmentadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmaster_procedure_treatmentadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmaster_procedure_treatmentadd");
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
<form name="fmaster_procedure_treatmentadd" id="fmaster_procedure_treatmentadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="master_procedure_treatment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_master_procedure_treatment_Treatment" for="x_Treatment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_master_procedure_treatment_Treatment">
<input type="<?= $Page->Treatment->getInputTextType() ?>" data-table="master_procedure_treatment" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>" value="<?= $Page->Treatment->EditValue ?>"<?= $Page->Treatment->editAttributes() ?> aria-describedby="x_Treatment_help">
<?= $Page->Treatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_master_procedure_treatment_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_master_procedure_treatment_Procedure">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="master_procedure_treatment" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help">
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
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
    ew.addEventHandlers("master_procedure_treatment");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
