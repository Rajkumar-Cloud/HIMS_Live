<?php

namespace PHPMaker2021\project3;

// Page object
$LabDrugMastEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_drug_mastedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    flab_drug_mastedit = currentForm = new ew.Form("flab_drug_mastedit", "edit");

    // Add fields
    var fields = ew.vars.tables.lab_drug_mast.fields;
    flab_drug_mastedit.addFields([
        ["DrugName", [fields.DrugName.required ? ew.Validators.required(fields.DrugName.caption) : null], fields.DrugName.isInvalid],
        ["Positive", [fields.Positive.required ? ew.Validators.required(fields.Positive.caption) : null], fields.Positive.isInvalid],
        ["Negative", [fields.Negative.required ? ew.Validators.required(fields.Negative.caption) : null], fields.Negative.isInvalid],
        ["ShortName", [fields.ShortName.required ? ew.Validators.required(fields.ShortName.caption) : null], fields.ShortName.isInvalid],
        ["GroupCD", [fields.GroupCD.required ? ew.Validators.required(fields.GroupCD.caption) : null], fields.GroupCD.isInvalid],
        ["_Content", [fields._Content.required ? ew.Validators.required(fields._Content.caption) : null], fields._Content.isInvalid],
        ["Order", [fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["DrugCD", [fields.DrugCD.required ? ew.Validators.required(fields.DrugCD.caption) : null], fields.DrugCD.isInvalid],
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_drug_mastedit,
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
    flab_drug_mastedit.validate = function () {
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
    flab_drug_mastedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_drug_mastedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_drug_mastedit");
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
<form name="flab_drug_mastedit" id="flab_drug_mastedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->DrugName->Visible) { // DrugName ?>
    <div id="r_DrugName" class="form-group row">
        <label id="elh_lab_drug_mast_DrugName" for="x_DrugName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrugName->caption() ?><?= $Page->DrugName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrugName->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugName">
<input type="<?= $Page->DrugName->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_DrugName" name="x_DrugName" id="x_DrugName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DrugName->getPlaceHolder()) ?>" value="<?= $Page->DrugName->EditValue ?>"<?= $Page->DrugName->editAttributes() ?> aria-describedby="x_DrugName_help">
<?= $Page->DrugName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrugName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Positive->Visible) { // Positive ?>
    <div id="r_Positive" class="form-group row">
        <label id="elh_lab_drug_mast_Positive" for="x_Positive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Positive->caption() ?><?= $Page->Positive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Positive->cellAttributes() ?>>
<span id="el_lab_drug_mast_Positive">
<input type="<?= $Page->Positive->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_Positive" name="x_Positive" id="x_Positive" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Positive->getPlaceHolder()) ?>" value="<?= $Page->Positive->EditValue ?>"<?= $Page->Positive->editAttributes() ?> aria-describedby="x_Positive_help">
<?= $Page->Positive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Positive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Negative->Visible) { // Negative ?>
    <div id="r_Negative" class="form-group row">
        <label id="elh_lab_drug_mast_Negative" for="x_Negative" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Negative->caption() ?><?= $Page->Negative->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Negative->cellAttributes() ?>>
<span id="el_lab_drug_mast_Negative">
<input type="<?= $Page->Negative->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_Negative" name="x_Negative" id="x_Negative" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Negative->getPlaceHolder()) ?>" value="<?= $Page->Negative->EditValue ?>"<?= $Page->Negative->editAttributes() ?> aria-describedby="x_Negative_help">
<?= $Page->Negative->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Negative->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
    <div id="r_ShortName" class="form-group row">
        <label id="elh_lab_drug_mast_ShortName" for="x_ShortName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ShortName->caption() ?><?= $Page->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShortName->cellAttributes() ?>>
<span id="el_lab_drug_mast_ShortName">
<input type="<?= $Page->ShortName->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->ShortName->getPlaceHolder()) ?>" value="<?= $Page->ShortName->EditValue ?>"<?= $Page->ShortName->editAttributes() ?> aria-describedby="x_ShortName_help">
<?= $Page->ShortName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShortName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupCD->Visible) { // GroupCD ?>
    <div id="r_GroupCD" class="form-group row">
        <label id="elh_lab_drug_mast_GroupCD" for="x_GroupCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GroupCD->caption() ?><?= $Page->GroupCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_GroupCD">
<input type="<?= $Page->GroupCD->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_GroupCD" name="x_GroupCD" id="x_GroupCD" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->GroupCD->getPlaceHolder()) ?>" value="<?= $Page->GroupCD->EditValue ?>"<?= $Page->GroupCD->editAttributes() ?> aria-describedby="x_GroupCD_help">
<?= $Page->GroupCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GroupCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
    <div id="r__Content" class="form-group row">
        <label id="elh_lab_drug_mast__Content" for="x__Content" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Content->caption() ?><?= $Page->_Content->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Content->cellAttributes() ?>>
<span id="el_lab_drug_mast__Content">
<input type="<?= $Page->_Content->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x__Content" name="x__Content" id="x__Content" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->_Content->getPlaceHolder()) ?>" value="<?= $Page->_Content->EditValue ?>"<?= $Page->_Content->editAttributes() ?> aria-describedby="x__Content_help">
<?= $Page->_Content->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Content->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label id="elh_lab_drug_mast_Order" for="x_Order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Order->caption() ?><?= $Page->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
<span id="el_lab_drug_mast_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?> aria-describedby="x_Order_help">
<?= $Page->Order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrugCD->Visible) { // DrugCD ?>
    <div id="r_DrugCD" class="form-group row">
        <label id="elh_lab_drug_mast_DrugCD" for="x_DrugCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrugCD->caption() ?><?= $Page->DrugCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrugCD->cellAttributes() ?>>
<span id="el_lab_drug_mast_DrugCD">
<input type="<?= $Page->DrugCD->getInputTextType() ?>" data-table="lab_drug_mast" data-field="x_DrugCD" name="x_DrugCD" id="x_DrugCD" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->DrugCD->getPlaceHolder()) ?>" value="<?= $Page->DrugCD->EditValue ?>"<?= $Page->DrugCD->editAttributes() ?> aria-describedby="x_DrugCD_help">
<?= $Page->DrugCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrugCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_lab_drug_mast_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_drug_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_drug_mast" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("lab_drug_mast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
