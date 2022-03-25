<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasReferenceTypeAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_reference_typeadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmas_reference_typeadd = currentForm = new ew.Form("fmas_reference_typeadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_reference_type")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_reference_type)
        ew.vars.tables.mas_reference_type = currentTable;
    fmas_reference_typeadd.addFields([
        ["reference", [fields.reference.visible && fields.reference.required ? ew.Validators.required(fields.reference.caption) : null], fields.reference.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.visible && fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.visible && fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.visible && fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["_email", [fields._email.visible && fields._email.required ? ew.Validators.required(fields._email.caption) : null], fields._email.isInvalid],
        ["whatapp", [fields.whatapp.visible && fields.whatapp.required ? ew.Validators.required(fields.whatapp.caption) : null], fields.whatapp.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_reference_typeadd,
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
    fmas_reference_typeadd.validate = function () {
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
    fmas_reference_typeadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_reference_typeadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_reference_typeadd");
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
<form name="fmas_reference_typeadd" id="fmas_reference_typeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->reference->Visible) { // reference ?>
    <div id="r_reference" class="form-group row">
        <label id="elh_mas_reference_type_reference" for="x_reference" class="<?= $Page->LeftColumnClass ?>"><?= $Page->reference->caption() ?><?= $Page->reference->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<input type="<?= $Page->reference->getInputTextType() ?>" data-table="mas_reference_type" data-field="x_reference" name="x_reference" id="x_reference" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->reference->getPlaceHolder()) ?>" value="<?= $Page->reference->EditValue ?>"<?= $Page->reference->editAttributes() ?> aria-describedby="x_reference_help">
<?= $Page->reference->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reference->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_mas_reference_type_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="mas_reference_type" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?> aria-describedby="x_ReferMobileNo_help">
<?= $Page->ReferMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_mas_reference_type_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="mas_reference_type" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?> aria-describedby="x_ReferClinicname_help">
<?= $Page->ReferClinicname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_mas_reference_type_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="mas_reference_type" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?> aria-describedby="x_ReferCity_help">
<?= $Page->ReferCity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_mas_reference_type_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_mas_reference_type_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="mas_reference_type" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <div id="r__email" class="form-group row">
        <label id="elh_mas_reference_type__email" for="x__email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_email->caption() ?><?= $Page->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_email->cellAttributes() ?>>
<span id="el_mas_reference_type__email">
<input type="<?= $Page->_email->getInputTextType() ?>" data-table="mas_reference_type" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_email->getPlaceHolder()) ?>" value="<?= $Page->_email->EditValue ?>"<?= $Page->_email->editAttributes() ?> aria-describedby="x__email_help">
<?= $Page->_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->whatapp->Visible) { // whatapp ?>
    <div id="r_whatapp" class="form-group row">
        <label id="elh_mas_reference_type_whatapp" for="x_whatapp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->whatapp->caption() ?><?= $Page->whatapp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->whatapp->cellAttributes() ?>>
<span id="el_mas_reference_type_whatapp">
<input type="<?= $Page->whatapp->getInputTextType() ?>" data-table="mas_reference_type" data-field="x_whatapp" name="x_whatapp" id="x_whatapp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->whatapp->getPlaceHolder()) ?>" value="<?= $Page->whatapp->EditValue ?>"<?= $Page->whatapp->editAttributes() ?> aria-describedby="x_whatapp_help">
<?= $Page->whatapp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->whatapp->getErrorMessage() ?></div>
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
    ew.addEventHandlers("mas_reference_type");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
