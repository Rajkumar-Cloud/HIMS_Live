<?php

namespace PHPMaker2021\project3;

// Page object
$LabProfileDetailsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_profile_detailsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    flab_profile_detailsedit = currentForm = new ew.Form("flab_profile_detailsedit", "edit");

    // Add fields
    var fields = ew.vars.tables.lab_profile_details.fields;
    flab_profile_detailsedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["ProfileCode", [fields.ProfileCode.required ? ew.Validators.required(fields.ProfileCode.caption) : null], fields.ProfileCode.isInvalid],
        ["SubProfileCode", [fields.SubProfileCode.required ? ew.Validators.required(fields.SubProfileCode.caption) : null], fields.SubProfileCode.isInvalid],
        ["ProfileTestCode", [fields.ProfileTestCode.required ? ew.Validators.required(fields.ProfileTestCode.caption) : null], fields.ProfileTestCode.isInvalid],
        ["ProfileSubTestCode", [fields.ProfileSubTestCode.required ? ew.Validators.required(fields.ProfileSubTestCode.caption) : null], fields.ProfileSubTestCode.isInvalid],
        ["TestOrder", [fields.TestOrder.required ? ew.Validators.required(fields.TestOrder.caption) : null, ew.Validators.float], fields.TestOrder.isInvalid],
        ["TestAmount", [fields.TestAmount.required ? ew.Validators.required(fields.TestAmount.caption) : null, ew.Validators.float], fields.TestAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_profile_detailsedit,
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
    flab_profile_detailsedit.validate = function () {
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
    flab_profile_detailsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_profile_detailsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_profile_detailsedit");
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
<form name="flab_profile_detailsedit" id="flab_profile_detailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_lab_profile_details_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_profile_details_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
    <div id="r_ProfileCode" class="form-group row">
        <label id="elh_lab_profile_details_ProfileCode" for="x_ProfileCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileCode->caption() ?><?= $Page->ProfileCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileCode">
<input type="<?= $Page->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileCode->EditValue ?>"<?= $Page->ProfileCode->editAttributes() ?> aria-describedby="x_ProfileCode_help">
<?= $Page->ProfileCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
    <div id="r_SubProfileCode" class="form-group row">
        <label id="elh_lab_profile_details_SubProfileCode" for="x_SubProfileCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SubProfileCode->caption() ?><?= $Page->SubProfileCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_SubProfileCode">
<input type="<?= $Page->SubProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_SubProfileCode" name="x_SubProfileCode" id="x_SubProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->SubProfileCode->getPlaceHolder()) ?>" value="<?= $Page->SubProfileCode->EditValue ?>"<?= $Page->SubProfileCode->editAttributes() ?> aria-describedby="x_SubProfileCode_help">
<?= $Page->SubProfileCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SubProfileCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
    <div id="r_ProfileTestCode" class="form-group row">
        <label id="elh_lab_profile_details_ProfileTestCode" for="x_ProfileTestCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileTestCode->caption() ?><?= $Page->ProfileTestCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileTestCode">
<input type="<?= $Page->ProfileTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="x_ProfileTestCode" id="x_ProfileTestCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileTestCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileTestCode->EditValue ?>"<?= $Page->ProfileTestCode->editAttributes() ?> aria-describedby="x_ProfileTestCode_help">
<?= $Page->ProfileTestCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileTestCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
    <div id="r_ProfileSubTestCode" class="form-group row">
        <label id="elh_lab_profile_details_ProfileSubTestCode" for="x_ProfileSubTestCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileSubTestCode->caption() ?><?= $Page->ProfileSubTestCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileSubTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileSubTestCode">
<input type="<?= $Page->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x_ProfileSubTestCode" id="x_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileSubTestCode->EditValue ?>"<?= $Page->ProfileSubTestCode->editAttributes() ?> aria-describedby="x_ProfileSubTestCode_help">
<?= $Page->ProfileSubTestCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
    <div id="r_TestOrder" class="form-group row">
        <label id="elh_lab_profile_details_TestOrder" for="x_TestOrder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestOrder->caption() ?><?= $Page->TestOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestOrder->cellAttributes() ?>>
<span id="el_lab_profile_details_TestOrder">
<input type="<?= $Page->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?= HtmlEncode($Page->TestOrder->getPlaceHolder()) ?>" value="<?= $Page->TestOrder->EditValue ?>"<?= $Page->TestOrder->editAttributes() ?> aria-describedby="x_TestOrder_help">
<?= $Page->TestOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestOrder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
    <div id="r_TestAmount" class="form-group row">
        <label id="elh_lab_profile_details_TestAmount" for="x_TestAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestAmount->caption() ?><?= $Page->TestAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestAmount->cellAttributes() ?>>
<span id="el_lab_profile_details_TestAmount">
<input type="<?= $Page->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x_TestAmount" id="x_TestAmount" size="30" placeholder="<?= HtmlEncode($Page->TestAmount->getPlaceHolder()) ?>" value="<?= $Page->TestAmount->EditValue ?>"<?= $Page->TestAmount->editAttributes() ?> aria-describedby="x_TestAmount_help">
<?= $Page->TestAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("lab_profile_details");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
