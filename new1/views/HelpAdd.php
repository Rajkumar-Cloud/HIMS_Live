<?php

namespace PHPMaker2021\project3;

// Page object
$HelpAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhelpadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fhelpadd = currentForm = new ew.Form("fhelpadd", "add");

    // Add fields
    var fields = ew.vars.tables.help.fields;
    fhelpadd.addFields([
        ["Tittle", [fields.Tittle.required ? ew.Validators.required(fields.Tittle.caption) : null], fields.Tittle.isInvalid],
        ["Description", [fields.Description.required ? ew.Validators.required(fields.Description.caption) : null], fields.Description.isInvalid],
        ["orderid", [fields.orderid.required ? ew.Validators.required(fields.orderid.caption) : null, ew.Validators.integer], fields.orderid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhelpadd,
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
    fhelpadd.validate = function () {
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
    fhelpadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhelpadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fhelpadd");
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
<form name="fhelpadd" id="fhelpadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Tittle->Visible) { // Tittle ?>
    <div id="r_Tittle" class="form-group row">
        <label id="elh_help_Tittle" for="x_Tittle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tittle->caption() ?><?= $Page->Tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tittle->cellAttributes() ?>>
<span id="el_help_Tittle">
<input type="<?= $Page->Tittle->getInputTextType() ?>" data-table="help" data-field="x_Tittle" name="x_Tittle" id="x_Tittle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tittle->getPlaceHolder()) ?>" value="<?= $Page->Tittle->EditValue ?>"<?= $Page->Tittle->editAttributes() ?> aria-describedby="x_Tittle_help">
<?= $Page->Tittle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tittle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <div id="r_Description" class="form-group row">
        <label id="elh_help_Description" for="x_Description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Description->caption() ?><?= $Page->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Description->cellAttributes() ?>>
<span id="el_help_Description">
<textarea data-table="help" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Description->getPlaceHolder()) ?>"<?= $Page->Description->editAttributes() ?> aria-describedby="x_Description_help"><?= $Page->Description->EditValue ?></textarea>
<?= $Page->Description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->orderid->Visible) { // orderid ?>
    <div id="r_orderid" class="form-group row">
        <label id="elh_help_orderid" for="x_orderid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->orderid->caption() ?><?= $Page->orderid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->orderid->cellAttributes() ?>>
<span id="el_help_orderid">
<input type="<?= $Page->orderid->getInputTextType() ?>" data-table="help" data-field="x_orderid" name="x_orderid" id="x_orderid" size="30" placeholder="<?= HtmlEncode($Page->orderid->getPlaceHolder()) ?>" value="<?= $Page->orderid->EditValue ?>"<?= $Page->orderid->editAttributes() ?> aria-describedby="x_orderid_help">
<?= $Page->orderid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->orderid->getErrorMessage() ?></div>
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
    ew.addEventHandlers("help");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
