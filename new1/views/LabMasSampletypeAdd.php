<?php

namespace PHPMaker2021\project3;

// Page object
$LabMasSampletypeAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_mas_sampletypeadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    flab_mas_sampletypeadd = currentForm = new ew.Form("flab_mas_sampletypeadd", "add");

    // Add fields
    var fields = ew.vars.tables.lab_mas_sampletype.fields;
    flab_mas_sampletypeadd.addFields([
        ["CATEGORY", [fields.CATEGORY.required ? ew.Validators.required(fields.CATEGORY.caption) : null], fields.CATEGORY.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_mas_sampletypeadd,
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
    flab_mas_sampletypeadd.validate = function () {
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
    flab_mas_sampletypeadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_mas_sampletypeadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_mas_sampletypeadd");
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
<form name="flab_mas_sampletypeadd" id="flab_mas_sampletypeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_mas_sampletype">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
    <div id="r_CATEGORY" class="form-group row">
        <label id="elh_lab_mas_sampletype_CATEGORY" for="x_CATEGORY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CATEGORY->caption() ?><?= $Page->CATEGORY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CATEGORY->cellAttributes() ?>>
<span id="el_lab_mas_sampletype_CATEGORY">
<input type="<?= $Page->CATEGORY->getInputTextType() ?>" data-table="lab_mas_sampletype" data-field="x_CATEGORY" name="x_CATEGORY" id="x_CATEGORY" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CATEGORY->getPlaceHolder()) ?>" value="<?= $Page->CATEGORY->EditValue ?>"<?= $Page->CATEGORY->editAttributes() ?> aria-describedby="x_CATEGORY_help">
<?= $Page->CATEGORY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CATEGORY->getErrorMessage() ?></div>
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
    ew.addEventHandlers("lab_mas_sampletype");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
