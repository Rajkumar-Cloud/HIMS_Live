<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradenamesAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_tradenamesadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpres_tradenamesadd = currentForm = new ew.Form("fpres_tradenamesadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_tradenames")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_tradenames)
        ew.vars.tables.pres_tradenames = currentTable;
    fpres_tradenamesadd.addFields([
        ["GENERIC_NAMES", [fields.GENERIC_NAMES.visible && fields.GENERIC_NAMES.required ? ew.Validators.required(fields.GENERIC_NAMES.caption) : null], fields.GENERIC_NAMES.isInvalid],
        ["TRADE_NAME", [fields.TRADE_NAME.visible && fields.TRADE_NAME.required ? ew.Validators.required(fields.TRADE_NAME.caption) : null], fields.TRADE_NAME.isInvalid],
        ["Drug_Name", [fields.Drug_Name.visible && fields.Drug_Name.required ? ew.Validators.required(fields.Drug_Name.caption) : null], fields.Drug_Name.isInvalid],
        ["PR_CODE", [fields.PR_CODE.visible && fields.PR_CODE.required ? ew.Validators.required(fields.PR_CODE.caption) : null], fields.PR_CODE.isInvalid],
        ["GenericNames_symbols", [fields.GenericNames_symbols.visible && fields.GenericNames_symbols.required ? ew.Validators.required(fields.GenericNames_symbols.caption) : null], fields.GenericNames_symbols.isInvalid],
        ["CONTAINER_TYPE", [fields.CONTAINER_TYPE.visible && fields.CONTAINER_TYPE.required ? ew.Validators.required(fields.CONTAINER_TYPE.caption) : null], fields.CONTAINER_TYPE.isInvalid],
        ["STRENGTH", [fields.STRENGTH.visible && fields.STRENGTH.required ? ew.Validators.required(fields.STRENGTH.caption) : null], fields.STRENGTH.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_tradenamesadd,
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
    fpres_tradenamesadd.validate = function () {
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
    fpres_tradenamesadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_tradenamesadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_tradenamesadd");
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
<form name="fpres_tradenamesadd" id="fpres_tradenamesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->GENERIC_NAMES->Visible) { // GENERIC_NAMES ?>
    <div id="r_GENERIC_NAMES" class="form-group row">
        <label id="elh_pres_tradenames_GENERIC_NAMES" for="x_GENERIC_NAMES" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENERIC_NAMES->caption() ?><?= $Page->GENERIC_NAMES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENERIC_NAMES->cellAttributes() ?>>
<span id="el_pres_tradenames_GENERIC_NAMES">
<textarea data-table="pres_tradenames" data-field="x_GENERIC_NAMES" name="x_GENERIC_NAMES" id="x_GENERIC_NAMES" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->GENERIC_NAMES->getPlaceHolder()) ?>"<?= $Page->GENERIC_NAMES->editAttributes() ?> aria-describedby="x_GENERIC_NAMES_help"><?= $Page->GENERIC_NAMES->EditValue ?></textarea>
<?= $Page->GENERIC_NAMES->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GENERIC_NAMES->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TRADE_NAME->Visible) { // TRADE_NAME ?>
    <div id="r_TRADE_NAME" class="form-group row">
        <label id="elh_pres_tradenames_TRADE_NAME" for="x_TRADE_NAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TRADE_NAME->caption() ?><?= $Page->TRADE_NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRADE_NAME->cellAttributes() ?>>
<span id="el_pres_tradenames_TRADE_NAME">
<textarea data-table="pres_tradenames" data-field="x_TRADE_NAME" name="x_TRADE_NAME" id="x_TRADE_NAME" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->TRADE_NAME->getPlaceHolder()) ?>"<?= $Page->TRADE_NAME->editAttributes() ?> aria-describedby="x_TRADE_NAME_help"><?= $Page->TRADE_NAME->EditValue ?></textarea>
<?= $Page->TRADE_NAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TRADE_NAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <div id="r_Drug_Name" class="form-group row">
        <label id="elh_pres_tradenames_Drug_Name" for="x_Drug_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Drug_Name->caption() ?><?= $Page->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_Drug_Name">
<textarea data-table="pres_tradenames" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>"<?= $Page->Drug_Name->editAttributes() ?> aria-describedby="x_Drug_Name_help"><?= $Page->Drug_Name->EditValue ?></textarea>
<?= $Page->Drug_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <div id="r_PR_CODE" class="form-group row">
        <label id="elh_pres_tradenames_PR_CODE" for="x_PR_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PR_CODE->caption() ?><?= $Page->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_PR_CODE">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_tradenames" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?> aria-describedby="x_PR_CODE_help">
<?= $Page->PR_CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GenericNames_symbols->Visible) { // GenericNames_symbols ?>
    <div id="r_GenericNames_symbols" class="form-group row">
        <label id="elh_pres_tradenames_GenericNames_symbols" for="x_GenericNames_symbols" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GenericNames_symbols->caption() ?><?= $Page->GenericNames_symbols->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GenericNames_symbols->cellAttributes() ?>>
<span id="el_pres_tradenames_GenericNames_symbols">
<textarea data-table="pres_tradenames" data-field="x_GenericNames_symbols" name="x_GenericNames_symbols" id="x_GenericNames_symbols" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->GenericNames_symbols->getPlaceHolder()) ?>"<?= $Page->GenericNames_symbols->editAttributes() ?> aria-describedby="x_GenericNames_symbols_help"><?= $Page->GenericNames_symbols->EditValue ?></textarea>
<?= $Page->GenericNames_symbols->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GenericNames_symbols->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <div id="r_CONTAINER_TYPE" class="form-group row">
        <label id="elh_pres_tradenames_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CONTAINER_TYPE->caption() ?><?= $Page->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_tradenames_CONTAINER_TYPE">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_tradenames" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?> aria-describedby="x_CONTAINER_TYPE_help">
<?= $Page->CONTAINER_TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <div id="r_STRENGTH" class="form-group row">
        <label id="elh_pres_tradenames_STRENGTH" for="x_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STRENGTH->caption() ?><?= $Page->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el_pres_tradenames_STRENGTH">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pres_tradenames" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?> aria-describedby="x_STRENGTH_help">
<?= $Page->STRENGTH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_tradenames");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
