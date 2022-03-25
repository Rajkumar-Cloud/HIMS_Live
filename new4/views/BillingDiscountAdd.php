<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingDiscountAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_discountadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fbilling_discountadd = currentForm = new ew.Form("fbilling_discountadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "billing_discount")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.billing_discount)
        ew.vars.tables.billing_discount = currentTable;
    fbilling_discountadd.addFields([
        ["Particulars", [fields.Particulars.visible && fields.Particulars.required ? ew.Validators.required(fields.Particulars.caption) : null], fields.Particulars.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null, ew.Validators.float], fields.Procedure.isInvalid],
        ["Pharmacy", [fields.Pharmacy.visible && fields.Pharmacy.required ? ew.Validators.required(fields.Pharmacy.caption) : null, ew.Validators.float], fields.Pharmacy.isInvalid],
        ["Investication", [fields.Investication.visible && fields.Investication.required ? ew.Validators.required(fields.Investication.caption) : null, ew.Validators.float], fields.Investication.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbilling_discountadd,
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
    fbilling_discountadd.validate = function () {
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
    fbilling_discountadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_discountadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fbilling_discountadd");
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
<form name="fbilling_discountadd" id="fbilling_discountadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Particulars->Visible) { // Particulars ?>
    <div id="r_Particulars" class="form-group row">
        <label id="elh_billing_discount_Particulars" for="x_Particulars" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Particulars->caption() ?><?= $Page->Particulars->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Particulars->cellAttributes() ?>>
<span id="el_billing_discount_Particulars">
<input type="<?= $Page->Particulars->getInputTextType() ?>" data-table="billing_discount" data-field="x_Particulars" name="x_Particulars" id="x_Particulars" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Particulars->getPlaceHolder()) ?>" value="<?= $Page->Particulars->EditValue ?>"<?= $Page->Particulars->editAttributes() ?> aria-describedby="x_Particulars_help">
<?= $Page->Particulars->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Particulars->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_billing_discount_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_billing_discount_Procedure">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="billing_discount" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help">
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
    <div id="r_Pharmacy" class="form-group row">
        <label id="elh_billing_discount_Pharmacy" for="x_Pharmacy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pharmacy->caption() ?><?= $Page->Pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pharmacy->cellAttributes() ?>>
<span id="el_billing_discount_Pharmacy">
<input type="<?= $Page->Pharmacy->getInputTextType() ?>" data-table="billing_discount" data-field="x_Pharmacy" name="x_Pharmacy" id="x_Pharmacy" size="30" placeholder="<?= HtmlEncode($Page->Pharmacy->getPlaceHolder()) ?>" value="<?= $Page->Pharmacy->EditValue ?>"<?= $Page->Pharmacy->editAttributes() ?> aria-describedby="x_Pharmacy_help">
<?= $Page->Pharmacy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pharmacy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Investication->Visible) { // Investication ?>
    <div id="r_Investication" class="form-group row">
        <label id="elh_billing_discount_Investication" for="x_Investication" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Investication->caption() ?><?= $Page->Investication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Investication->cellAttributes() ?>>
<span id="el_billing_discount_Investication">
<input type="<?= $Page->Investication->getInputTextType() ?>" data-table="billing_discount" data-field="x_Investication" name="x_Investication" id="x_Investication" size="30" placeholder="<?= HtmlEncode($Page->Investication->getPlaceHolder()) ?>" value="<?= $Page->Investication->EditValue ?>"<?= $Page->Investication->editAttributes() ?> aria-describedby="x_Investication_help">
<?= $Page->Investication->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Investication->getErrorMessage() ?></div>
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
    ew.addEventHandlers("billing_discount");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
