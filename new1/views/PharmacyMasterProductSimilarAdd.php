<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyMasterProductSimilarAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_master_product_similaradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_master_product_similaradd = currentForm = new ew.Form("fpharmacy_master_product_similaradd", "add");

    // Add fields
    var fields = ew.vars.tables.pharmacy_master_product_similar.fields;
    fpharmacy_master_product_similaradd.addFields([
        ["PRC", [fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["MAINPRC", [fields.MAINPRC.required ? ew.Validators.required(fields.MAINPRC.caption) : null], fields.MAINPRC.isInvalid],
        ["PRTYPE", [fields.PRTYPE.required ? ew.Validators.required(fields.PRTYPE.caption) : null], fields.PRTYPE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_master_product_similaradd,
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
    fpharmacy_master_product_similaradd.validate = function () {
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
    fpharmacy_master_product_similaradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_master_product_similaradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpharmacy_master_product_similaradd");
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
<form name="fpharmacy_master_product_similaradd" id="fpharmacy_master_product_similaradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_pharmacy_master_product_similar_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_master_product_similar" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MAINPRC->Visible) { // MAINPRC ?>
    <div id="r_MAINPRC" class="form-group row">
        <label id="elh_pharmacy_master_product_similar_MAINPRC" for="x_MAINPRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MAINPRC->caption() ?><?= $Page->MAINPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MAINPRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_MAINPRC">
<input type="<?= $Page->MAINPRC->getInputTextType() ?>" data-table="pharmacy_master_product_similar" data-field="x_MAINPRC" name="x_MAINPRC" id="x_MAINPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->MAINPRC->getPlaceHolder()) ?>" value="<?= $Page->MAINPRC->EditValue ?>"<?= $Page->MAINPRC->editAttributes() ?> aria-describedby="x_MAINPRC_help">
<?= $Page->MAINPRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MAINPRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRTYPE->Visible) { // PRTYPE ?>
    <div id="r_PRTYPE" class="form-group row">
        <label id="elh_pharmacy_master_product_similar_PRTYPE" for="x_PRTYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRTYPE->caption() ?><?= $Page->PRTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRTYPE->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRTYPE">
<input type="<?= $Page->PRTYPE->getInputTextType() ?>" data-table="pharmacy_master_product_similar" data-field="x_PRTYPE" name="x_PRTYPE" id="x_PRTYPE" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->PRTYPE->getPlaceHolder()) ?>" value="<?= $Page->PRTYPE->EditValue ?>"<?= $Page->PRTYPE->editAttributes() ?> aria-describedby="x_PRTYPE_help">
<?= $Page->PRTYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRTYPE->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pharmacy_master_product_similar");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
