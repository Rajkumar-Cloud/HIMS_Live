<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabUnitMastAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_unit_mastadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    flab_unit_mastadd = currentForm = new ew.Form("flab_unit_mastadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_unit_mast")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_unit_mast)
        ew.vars.tables.lab_unit_mast = currentTable;
    flab_unit_mastadd.addFields([
        ["Code", [fields.Code.visible && fields.Code.required ? ew.Validators.required(fields.Code.caption) : null], fields.Code.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_unit_mastadd,
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
    flab_unit_mastadd.validate = function () {
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
    flab_unit_mastadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_unit_mastadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_unit_mastadd");
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
<form name="flab_unit_mastadd" id="flab_unit_mastadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_unit_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Code->Visible) { // Code ?>
    <div id="r_Code" class="form-group row">
        <label id="elh_lab_unit_mast_Code" for="x_Code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code->caption() ?><?= $Page->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code->cellAttributes() ?>>
<span id="el_lab_unit_mast_Code">
<input type="<?= $Page->Code->getInputTextType() ?>" data-table="lab_unit_mast" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->Code->getPlaceHolder()) ?>" value="<?= $Page->Code->EditValue ?>"<?= $Page->Code->editAttributes() ?> aria-describedby="x_Code_help">
<?= $Page->Code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_lab_unit_mast_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_lab_unit_mast_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="lab_unit_mast" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
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
    ew.addEventHandlers("lab_unit_mast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
