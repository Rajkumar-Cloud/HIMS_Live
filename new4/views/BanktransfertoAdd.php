<?php

namespace PHPMaker2021\HIMS;

// Page object
$BanktransfertoAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbanktransfertoadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fbanktransfertoadd = currentForm = new ew.Form("fbanktransfertoadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "banktransferto")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.banktransferto)
        ew.vars.tables.banktransferto = currentTable;
    fbanktransfertoadd.addFields([
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Street_Address", [fields.Street_Address.visible && fields.Street_Address.required ? ew.Validators.required(fields.Street_Address.caption) : null], fields.Street_Address.isInvalid],
        ["City", [fields.City.visible && fields.City.required ? ew.Validators.required(fields.City.caption) : null], fields.City.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Zipcode", [fields.Zipcode.visible && fields.Zipcode.required ? ew.Validators.required(fields.Zipcode.caption) : null], fields.Zipcode.isInvalid],
        ["Mobile_Number", [fields.Mobile_Number.visible && fields.Mobile_Number.required ? ew.Validators.required(fields.Mobile_Number.caption) : null], fields.Mobile_Number.isInvalid],
        ["AccountNo", [fields.AccountNo.visible && fields.AccountNo.required ? ew.Validators.required(fields.AccountNo.caption) : null], fields.AccountNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbanktransfertoadd,
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
    fbanktransfertoadd.validate = function () {
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
    fbanktransfertoadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbanktransfertoadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fbanktransfertoadd");
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
<form name="fbanktransfertoadd" id="fbanktransfertoadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_banktransferto_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_banktransferto_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="banktransferto" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
    <div id="r_Street_Address" class="form-group row">
        <label id="elh_banktransferto_Street_Address" for="x_Street_Address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Street_Address->caption() ?><?= $Page->Street_Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Street_Address->cellAttributes() ?>>
<span id="el_banktransferto_Street_Address">
<input type="<?= $Page->Street_Address->getInputTextType() ?>" data-table="banktransferto" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Street_Address->getPlaceHolder()) ?>" value="<?= $Page->Street_Address->EditValue ?>"<?= $Page->Street_Address->editAttributes() ?> aria-describedby="x_Street_Address_help">
<?= $Page->Street_Address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Street_Address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
    <div id="r_City" class="form-group row">
        <label id="elh_banktransferto_City" for="x_City" class="<?= $Page->LeftColumnClass ?>"><?= $Page->City->caption() ?><?= $Page->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->City->cellAttributes() ?>>
<span id="el_banktransferto_City">
<input type="<?= $Page->City->getInputTextType() ?>" data-table="banktransferto" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?= HtmlEncode($Page->City->getPlaceHolder()) ?>" value="<?= $Page->City->EditValue ?>"<?= $Page->City->editAttributes() ?> aria-describedby="x_City_help">
<?= $Page->City->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->City->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_banktransferto_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<span id="el_banktransferto_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="banktransferto" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
    <div id="r_Zipcode" class="form-group row">
        <label id="elh_banktransferto_Zipcode" for="x_Zipcode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Zipcode->caption() ?><?= $Page->Zipcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Zipcode->cellAttributes() ?>>
<span id="el_banktransferto_Zipcode">
<input type="<?= $Page->Zipcode->getInputTextType() ?>" data-table="banktransferto" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Zipcode->getPlaceHolder()) ?>" value="<?= $Page->Zipcode->EditValue ?>"<?= $Page->Zipcode->editAttributes() ?> aria-describedby="x_Zipcode_help">
<?= $Page->Zipcode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Zipcode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile_Number->Visible) { // Mobile_Number ?>
    <div id="r_Mobile_Number" class="form-group row">
        <label id="elh_banktransferto_Mobile_Number" for="x_Mobile_Number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mobile_Number->caption() ?><?= $Page->Mobile_Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile_Number->cellAttributes() ?>>
<span id="el_banktransferto_Mobile_Number">
<input type="<?= $Page->Mobile_Number->getInputTextType() ?>" data-table="banktransferto" data-field="x_Mobile_Number" name="x_Mobile_Number" id="x_Mobile_Number" size="30" maxlength="12" placeholder="<?= HtmlEncode($Page->Mobile_Number->getPlaceHolder()) ?>" value="<?= $Page->Mobile_Number->EditValue ?>"<?= $Page->Mobile_Number->editAttributes() ?> aria-describedby="x_Mobile_Number_help">
<?= $Page->Mobile_Number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile_Number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
    <div id="r_AccountNo" class="form-group row">
        <label id="elh_banktransferto_AccountNo" for="x_AccountNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AccountNo->caption() ?><?= $Page->AccountNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AccountNo->cellAttributes() ?>>
<span id="el_banktransferto_AccountNo">
<input type="<?= $Page->AccountNo->getInputTextType() ?>" data-table="banktransferto" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AccountNo->getPlaceHolder()) ?>" value="<?= $Page->AccountNo->EditValue ?>"<?= $Page->AccountNo->editAttributes() ?> aria-describedby="x_AccountNo_help">
<?= $Page->AccountNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AccountNo->getErrorMessage() ?></div>
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
    ew.addEventHandlers("banktransferto");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
