<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabDeptMastAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_dept_mastadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    flab_dept_mastadd = currentForm = new ew.Form("flab_dept_mastadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_dept_mast")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_dept_mast)
        ew.vars.tables.lab_dept_mast = currentTable;
    flab_dept_mastadd.addFields([
        ["MainCD", [fields.MainCD.visible && fields.MainCD.required ? ew.Validators.required(fields.MainCD.caption) : null], fields.MainCD.isInvalid],
        ["Code", [fields.Code.visible && fields.Code.required ? ew.Validators.required(fields.Code.caption) : null], fields.Code.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["SignCD", [fields.SignCD.visible && fields.SignCD.required ? ew.Validators.required(fields.SignCD.caption) : null], fields.SignCD.isInvalid],
        ["Collection", [fields.Collection.visible && fields.Collection.required ? ew.Validators.required(fields.Collection.caption) : null], fields.Collection.isInvalid],
        ["EditDate", [fields.EditDate.visible && fields.EditDate.required ? ew.Validators.required(fields.EditDate.caption) : null, ew.Validators.datetime(0)], fields.EditDate.isInvalid],
        ["SMS", [fields.SMS.visible && fields.SMS.required ? ew.Validators.required(fields.SMS.caption) : null], fields.SMS.isInvalid],
        ["Note", [fields.Note.visible && fields.Note.required ? ew.Validators.required(fields.Note.caption) : null], fields.Note.isInvalid],
        ["WorkList", [fields.WorkList.visible && fields.WorkList.required ? ew.Validators.required(fields.WorkList.caption) : null], fields.WorkList.isInvalid],
        ["_Page", [fields._Page.visible && fields._Page.required ? ew.Validators.required(fields._Page.caption) : null, ew.Validators.float], fields._Page.isInvalid],
        ["Incharge", [fields.Incharge.visible && fields.Incharge.required ? ew.Validators.required(fields.Incharge.caption) : null], fields.Incharge.isInvalid],
        ["AutoNum", [fields.AutoNum.visible && fields.AutoNum.required ? ew.Validators.required(fields.AutoNum.caption) : null], fields.AutoNum.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_dept_mastadd,
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
    flab_dept_mastadd.validate = function () {
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
    flab_dept_mastadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_dept_mastadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_dept_mastadd");
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
<form name="flab_dept_mastadd" id="flab_dept_mastadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->MainCD->Visible) { // MainCD ?>
    <div id="r_MainCD" class="form-group row">
        <label id="elh_lab_dept_mast_MainCD" for="x_MainCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MainCD->caption() ?><?= $Page->MainCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MainCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_MainCD">
<input type="<?= $Page->MainCD->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_MainCD" name="x_MainCD" id="x_MainCD" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->MainCD->getPlaceHolder()) ?>" value="<?= $Page->MainCD->EditValue ?>"<?= $Page->MainCD->editAttributes() ?> aria-describedby="x_MainCD_help">
<?= $Page->MainCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MainCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code->Visible) { // Code ?>
    <div id="r_Code" class="form-group row">
        <label id="elh_lab_dept_mast_Code" for="x_Code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code->caption() ?><?= $Page->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code->cellAttributes() ?>>
<span id="el_lab_dept_mast_Code">
<input type="<?= $Page->Code->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->Code->getPlaceHolder()) ?>" value="<?= $Page->Code->EditValue ?>"<?= $Page->Code->editAttributes() ?> aria-describedby="x_Code_help">
<?= $Page->Code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_lab_dept_mast_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_lab_dept_mast_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label id="elh_lab_dept_mast_Order" for="x_Order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Order->caption() ?><?= $Page->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
<span id="el_lab_dept_mast_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?> aria-describedby="x_Order_help">
<?= $Page->Order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SignCD->Visible) { // SignCD ?>
    <div id="r_SignCD" class="form-group row">
        <label id="elh_lab_dept_mast_SignCD" for="x_SignCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SignCD->caption() ?><?= $Page->SignCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SignCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_SignCD">
<input type="<?= $Page->SignCD->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_SignCD" name="x_SignCD" id="x_SignCD" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->SignCD->getPlaceHolder()) ?>" value="<?= $Page->SignCD->EditValue ?>"<?= $Page->SignCD->editAttributes() ?> aria-describedby="x_SignCD_help">
<?= $Page->SignCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SignCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Collection->Visible) { // Collection ?>
    <div id="r_Collection" class="form-group row">
        <label id="elh_lab_dept_mast_Collection" for="x_Collection" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Collection->caption() ?><?= $Page->Collection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Collection->cellAttributes() ?>>
<span id="el_lab_dept_mast_Collection">
<input type="<?= $Page->Collection->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_Collection" name="x_Collection" id="x_Collection" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Collection->getPlaceHolder()) ?>" value="<?= $Page->Collection->EditValue ?>"<?= $Page->Collection->editAttributes() ?> aria-describedby="x_Collection_help">
<?= $Page->Collection->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Collection->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <div id="r_EditDate" class="form-group row">
        <label id="elh_lab_dept_mast_EditDate" for="x_EditDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EditDate->caption() ?><?= $Page->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_lab_dept_mast_EditDate">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?> aria-describedby="x_EditDate_help">
<?= $Page->EditDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage() ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_dept_mastadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_dept_mastadd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SMS->Visible) { // SMS ?>
    <div id="r_SMS" class="form-group row">
        <label id="elh_lab_dept_mast_SMS" for="x_SMS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SMS->caption() ?><?= $Page->SMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SMS->cellAttributes() ?>>
<span id="el_lab_dept_mast_SMS">
<input type="<?= $Page->SMS->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_SMS" name="x_SMS" id="x_SMS" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->SMS->getPlaceHolder()) ?>" value="<?= $Page->SMS->EditValue ?>"<?= $Page->SMS->editAttributes() ?> aria-describedby="x_SMS_help">
<?= $Page->SMS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SMS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Note->Visible) { // Note ?>
    <div id="r_Note" class="form-group row">
        <label id="elh_lab_dept_mast_Note" for="x_Note" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Note->caption() ?><?= $Page->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Note->cellAttributes() ?>>
<span id="el_lab_dept_mast_Note">
<textarea data-table="lab_dept_mast" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Note->getPlaceHolder()) ?>"<?= $Page->Note->editAttributes() ?> aria-describedby="x_Note_help"><?= $Page->Note->EditValue ?></textarea>
<?= $Page->Note->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Note->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WorkList->Visible) { // WorkList ?>
    <div id="r_WorkList" class="form-group row">
        <label id="elh_lab_dept_mast_WorkList" for="x_WorkList" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WorkList->caption() ?><?= $Page->WorkList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WorkList->cellAttributes() ?>>
<span id="el_lab_dept_mast_WorkList">
<input type="<?= $Page->WorkList->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_WorkList" name="x_WorkList" id="x_WorkList" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->WorkList->getPlaceHolder()) ?>" value="<?= $Page->WorkList->EditValue ?>"<?= $Page->WorkList->editAttributes() ?> aria-describedby="x_WorkList_help">
<?= $Page->WorkList->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WorkList->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Page->Visible) { // Page ?>
    <div id="r__Page" class="form-group row">
        <label id="elh_lab_dept_mast__Page" for="x__Page" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Page->caption() ?><?= $Page->_Page->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Page->cellAttributes() ?>>
<span id="el_lab_dept_mast__Page">
<input type="<?= $Page->_Page->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x__Page" name="x__Page" id="x__Page" size="30" placeholder="<?= HtmlEncode($Page->_Page->getPlaceHolder()) ?>" value="<?= $Page->_Page->EditValue ?>"<?= $Page->_Page->editAttributes() ?> aria-describedby="x__Page_help">
<?= $Page->_Page->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Page->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Incharge->Visible) { // Incharge ?>
    <div id="r_Incharge" class="form-group row">
        <label id="elh_lab_dept_mast_Incharge" for="x_Incharge" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Incharge->caption() ?><?= $Page->Incharge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Incharge->cellAttributes() ?>>
<span id="el_lab_dept_mast_Incharge">
<input type="<?= $Page->Incharge->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_Incharge" name="x_Incharge" id="x_Incharge" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->Incharge->getPlaceHolder()) ?>" value="<?= $Page->Incharge->EditValue ?>"<?= $Page->Incharge->editAttributes() ?> aria-describedby="x_Incharge_help">
<?= $Page->Incharge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Incharge->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AutoNum->Visible) { // AutoNum ?>
    <div id="r_AutoNum" class="form-group row">
        <label id="elh_lab_dept_mast_AutoNum" for="x_AutoNum" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AutoNum->caption() ?><?= $Page->AutoNum->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AutoNum->cellAttributes() ?>>
<span id="el_lab_dept_mast_AutoNum">
<input type="<?= $Page->AutoNum->getInputTextType() ?>" data-table="lab_dept_mast" data-field="x_AutoNum" name="x_AutoNum" id="x_AutoNum" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->AutoNum->getPlaceHolder()) ?>" value="<?= $Page->AutoNum->EditValue ?>"<?= $Page->AutoNum->editAttributes() ?> aria-describedby="x_AutoNum_help">
<?= $Page->AutoNum->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AutoNum->getErrorMessage() ?></div>
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
    ew.addEventHandlers("lab_dept_mast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
