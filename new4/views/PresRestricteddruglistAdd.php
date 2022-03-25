<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresRestricteddruglistAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_restricteddruglistadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpres_restricteddruglistadd = currentForm = new ew.Form("fpres_restricteddruglistadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_restricteddruglist")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_restricteddruglist)
        ew.vars.tables.pres_restricteddruglist = currentTable;
    fpres_restricteddruglistadd.addFields([
        ["Genericname", [fields.Genericname.visible && fields.Genericname.required ? ew.Validators.required(fields.Genericname.caption) : null], fields.Genericname.isInvalid],
        ["RestrictedWarning", [fields.RestrictedWarning.visible && fields.RestrictedWarning.required ? ew.Validators.required(fields.RestrictedWarning.caption) : null], fields.RestrictedWarning.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_restricteddruglistadd,
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
    fpres_restricteddruglistadd.validate = function () {
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
    fpres_restricteddruglistadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_restricteddruglistadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_restricteddruglistadd");
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
<form name="fpres_restricteddruglistadd" id="fpres_restricteddruglistadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <div id="r_Genericname" class="form-group row">
        <label id="elh_pres_restricteddruglist_Genericname" for="x_Genericname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Genericname->caption() ?><?= $Page->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_Genericname">
<input type="<?= $Page->Genericname->getInputTextType() ?>" data-table="pres_restricteddruglist" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Genericname->getPlaceHolder()) ?>" value="<?= $Page->Genericname->EditValue ?>"<?= $Page->Genericname->editAttributes() ?> aria-describedby="x_Genericname_help">
<?= $Page->Genericname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Genericname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RestrictedWarning->Visible) { // RestrictedWarning ?>
    <div id="r_RestrictedWarning" class="form-group row">
        <label id="elh_pres_restricteddruglist_RestrictedWarning" for="x_RestrictedWarning" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RestrictedWarning->caption() ?><?= $Page->RestrictedWarning->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RestrictedWarning->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_RestrictedWarning">
<textarea data-table="pres_restricteddruglist" data-field="x_RestrictedWarning" name="x_RestrictedWarning" id="x_RestrictedWarning" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RestrictedWarning->getPlaceHolder()) ?>"<?= $Page->RestrictedWarning->editAttributes() ?> aria-describedby="x_RestrictedWarning_help"><?= $Page->RestrictedWarning->EditValue ?></textarea>
<?= $Page->RestrictedWarning->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RestrictedWarning->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_restricteddruglist");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
