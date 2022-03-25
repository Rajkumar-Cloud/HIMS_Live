<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresFrequenciesAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_frequenciesadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpres_frequenciesadd = currentForm = new ew.Form("fpres_frequenciesadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_frequencies")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_frequencies)
        ew.vars.tables.pres_frequencies = currentTable;
    fpres_frequenciesadd.addFields([
        ["Frequency", [fields.Frequency.visible && fields.Frequency.required ? ew.Validators.required(fields.Frequency.caption) : null], fields.Frequency.isInvalid],
        ["Freq_Exp", [fields.Freq_Exp.visible && fields.Freq_Exp.required ? ew.Validators.required(fields.Freq_Exp.caption) : null], fields.Freq_Exp.isInvalid],
        ["Freq_Count", [fields.Freq_Count.visible && fields.Freq_Count.required ? ew.Validators.required(fields.Freq_Count.caption) : null, ew.Validators.integer], fields.Freq_Count.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_frequenciesadd,
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
    fpres_frequenciesadd.validate = function () {
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
    fpres_frequenciesadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_frequenciesadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_frequenciesadd");
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
<form name="fpres_frequenciesadd" id="fpres_frequenciesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Frequency->Visible) { // Frequency ?>
    <div id="r_Frequency" class="form-group row">
        <label id="elh_pres_frequencies_Frequency" for="x_Frequency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Frequency->caption() ?><?= $Page->Frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Frequency->cellAttributes() ?>>
<span id="el_pres_frequencies_Frequency">
<input type="<?= $Page->Frequency->getInputTextType() ?>" data-table="pres_frequencies" data-field="x_Frequency" name="x_Frequency" id="x_Frequency" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Frequency->getPlaceHolder()) ?>" value="<?= $Page->Frequency->EditValue ?>"<?= $Page->Frequency->editAttributes() ?> aria-describedby="x_Frequency_help">
<?= $Page->Frequency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Frequency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Freq_Exp->Visible) { // Freq_Exp ?>
    <div id="r_Freq_Exp" class="form-group row">
        <label id="elh_pres_frequencies_Freq_Exp" for="x_Freq_Exp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Freq_Exp->caption() ?><?= $Page->Freq_Exp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Freq_Exp->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Exp">
<input type="<?= $Page->Freq_Exp->getInputTextType() ?>" data-table="pres_frequencies" data-field="x_Freq_Exp" name="x_Freq_Exp" id="x_Freq_Exp" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Freq_Exp->getPlaceHolder()) ?>" value="<?= $Page->Freq_Exp->EditValue ?>"<?= $Page->Freq_Exp->editAttributes() ?> aria-describedby="x_Freq_Exp_help">
<?= $Page->Freq_Exp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Freq_Exp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Freq_Count->Visible) { // Freq_Count ?>
    <div id="r_Freq_Count" class="form-group row">
        <label id="elh_pres_frequencies_Freq_Count" for="x_Freq_Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Freq_Count->caption() ?><?= $Page->Freq_Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Freq_Count->cellAttributes() ?>>
<span id="el_pres_frequencies_Freq_Count">
<input type="<?= $Page->Freq_Count->getInputTextType() ?>" data-table="pres_frequencies" data-field="x_Freq_Count" name="x_Freq_Count" id="x_Freq_Count" size="30" placeholder="<?= HtmlEncode($Page->Freq_Count->getPlaceHolder()) ?>" value="<?= $Page->Freq_Count->EditValue ?>"<?= $Page->Freq_Count->editAttributes() ?> aria-describedby="x_Freq_Count_help">
<?= $Page->Freq_Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Freq_Count->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_frequencies");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
