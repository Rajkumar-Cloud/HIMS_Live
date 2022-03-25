<?php

namespace PHPMaker2021\project3;

// Page object
$LabProfileMasterAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_profile_masteradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    flab_profile_masteradd = currentForm = new ew.Form("flab_profile_masteradd", "add");

    // Add fields
    var fields = ew.vars.tables.lab_profile_master.fields;
    flab_profile_masteradd.addFields([
        ["ProfileCode", [fields.ProfileCode.required ? ew.Validators.required(fields.ProfileCode.caption) : null], fields.ProfileCode.isInvalid],
        ["ProfileName", [fields.ProfileName.required ? ew.Validators.required(fields.ProfileName.caption) : null], fields.ProfileName.isInvalid],
        ["ProfileAmount", [fields.ProfileAmount.required ? ew.Validators.required(fields.ProfileAmount.caption) : null, ew.Validators.float], fields.ProfileAmount.isInvalid],
        ["ProfileSpecialAmount", [fields.ProfileSpecialAmount.required ? ew.Validators.required(fields.ProfileSpecialAmount.caption) : null, ew.Validators.float], fields.ProfileSpecialAmount.isInvalid],
        ["ProfileMasterInactive", [fields.ProfileMasterInactive.required ? ew.Validators.required(fields.ProfileMasterInactive.caption) : null], fields.ProfileMasterInactive.isInvalid],
        ["ReagentAmt", [fields.ReagentAmt.required ? ew.Validators.required(fields.ReagentAmt.caption) : null, ew.Validators.float], fields.ReagentAmt.isInvalid],
        ["LabAmt", [fields.LabAmt.required ? ew.Validators.required(fields.LabAmt.caption) : null, ew.Validators.float], fields.LabAmt.isInvalid],
        ["RefAmt", [fields.RefAmt.required ? ew.Validators.required(fields.RefAmt.caption) : null, ew.Validators.float], fields.RefAmt.isInvalid],
        ["MainDeptCD", [fields.MainDeptCD.required ? ew.Validators.required(fields.MainDeptCD.caption) : null], fields.MainDeptCD.isInvalid],
        ["Individual", [fields.Individual.required ? ew.Validators.required(fields.Individual.caption) : null], fields.Individual.isInvalid],
        ["ShortName", [fields.ShortName.required ? ew.Validators.required(fields.ShortName.caption) : null], fields.ShortName.isInvalid],
        ["Note", [fields.Note.required ? ew.Validators.required(fields.Note.caption) : null], fields.Note.isInvalid],
        ["PrevAmt", [fields.PrevAmt.required ? ew.Validators.required(fields.PrevAmt.caption) : null, ew.Validators.float], fields.PrevAmt.isInvalid],
        ["BillName", [fields.BillName.required ? ew.Validators.required(fields.BillName.caption) : null], fields.BillName.isInvalid],
        ["ActualAmt", [fields.ActualAmt.required ? ew.Validators.required(fields.ActualAmt.caption) : null, ew.Validators.float], fields.ActualAmt.isInvalid],
        ["NoHeading", [fields.NoHeading.required ? ew.Validators.required(fields.NoHeading.caption) : null], fields.NoHeading.isInvalid],
        ["EditDate", [fields.EditDate.required ? ew.Validators.required(fields.EditDate.caption) : null, ew.Validators.datetime(0)], fields.EditDate.isInvalid],
        ["EditUser", [fields.EditUser.required ? ew.Validators.required(fields.EditUser.caption) : null], fields.EditUser.isInvalid],
        ["HISCD", [fields.HISCD.required ? ew.Validators.required(fields.HISCD.caption) : null], fields.HISCD.isInvalid],
        ["PriceList", [fields.PriceList.required ? ew.Validators.required(fields.PriceList.caption) : null], fields.PriceList.isInvalid],
        ["IPAmt", [fields.IPAmt.required ? ew.Validators.required(fields.IPAmt.caption) : null, ew.Validators.float], fields.IPAmt.isInvalid],
        ["IInsAmt", [fields.IInsAmt.required ? ew.Validators.required(fields.IInsAmt.caption) : null, ew.Validators.float], fields.IInsAmt.isInvalid],
        ["ManualCD", [fields.ManualCD.required ? ew.Validators.required(fields.ManualCD.caption) : null], fields.ManualCD.isInvalid],
        ["Free", [fields.Free.required ? ew.Validators.required(fields.Free.caption) : null], fields.Free.isInvalid],
        ["IIpAmt", [fields.IIpAmt.required ? ew.Validators.required(fields.IIpAmt.caption) : null, ew.Validators.float], fields.IIpAmt.isInvalid],
        ["InsAmt", [fields.InsAmt.required ? ew.Validators.required(fields.InsAmt.caption) : null, ew.Validators.float], fields.InsAmt.isInvalid],
        ["OutSource", [fields.OutSource.required ? ew.Validators.required(fields.OutSource.caption) : null], fields.OutSource.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_profile_masteradd,
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
    flab_profile_masteradd.validate = function () {
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
    flab_profile_masteradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_profile_masteradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_profile_masteradd");
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
<form name="flab_profile_masteradd" id="flab_profile_masteradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
    <div id="r_ProfileCode" class="form-group row">
        <label id="elh_lab_profile_master_ProfileCode" for="x_ProfileCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileCode->caption() ?><?= $Page->ProfileCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileCode">
<input type="<?= $Page->ProfileCode->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileCode->EditValue ?>"<?= $Page->ProfileCode->editAttributes() ?> aria-describedby="x_ProfileCode_help">
<?= $Page->ProfileCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileName->Visible) { // ProfileName ?>
    <div id="r_ProfileName" class="form-group row">
        <label id="elh_lab_profile_master_ProfileName" for="x_ProfileName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileName->caption() ?><?= $Page->ProfileName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileName->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileName">
<input type="<?= $Page->ProfileName->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ProfileName" name="x_ProfileName" id="x_ProfileName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ProfileName->getPlaceHolder()) ?>" value="<?= $Page->ProfileName->EditValue ?>"<?= $Page->ProfileName->editAttributes() ?> aria-describedby="x_ProfileName_help">
<?= $Page->ProfileName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileAmount->Visible) { // ProfileAmount ?>
    <div id="r_ProfileAmount" class="form-group row">
        <label id="elh_lab_profile_master_ProfileAmount" for="x_ProfileAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileAmount->caption() ?><?= $Page->ProfileAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileAmount">
<input type="<?= $Page->ProfileAmount->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ProfileAmount" name="x_ProfileAmount" id="x_ProfileAmount" size="30" placeholder="<?= HtmlEncode($Page->ProfileAmount->getPlaceHolder()) ?>" value="<?= $Page->ProfileAmount->EditValue ?>"<?= $Page->ProfileAmount->editAttributes() ?> aria-describedby="x_ProfileAmount_help">
<?= $Page->ProfileAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
    <div id="r_ProfileSpecialAmount" class="form-group row">
        <label id="elh_lab_profile_master_ProfileSpecialAmount" for="x_ProfileSpecialAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileSpecialAmount->caption() ?><?= $Page->ProfileSpecialAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileSpecialAmount">
<input type="<?= $Page->ProfileSpecialAmount->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ProfileSpecialAmount" name="x_ProfileSpecialAmount" id="x_ProfileSpecialAmount" size="30" placeholder="<?= HtmlEncode($Page->ProfileSpecialAmount->getPlaceHolder()) ?>" value="<?= $Page->ProfileSpecialAmount->EditValue ?>"<?= $Page->ProfileSpecialAmount->editAttributes() ?> aria-describedby="x_ProfileSpecialAmount_help">
<?= $Page->ProfileSpecialAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileSpecialAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
    <div id="r_ProfileMasterInactive" class="form-group row">
        <label id="elh_lab_profile_master_ProfileMasterInactive" for="x_ProfileMasterInactive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfileMasterInactive->caption() ?><?= $Page->ProfileMasterInactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileMasterInactive->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileMasterInactive">
<input type="<?= $Page->ProfileMasterInactive->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ProfileMasterInactive" name="x_ProfileMasterInactive" id="x_ProfileMasterInactive" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->ProfileMasterInactive->getPlaceHolder()) ?>" value="<?= $Page->ProfileMasterInactive->EditValue ?>"<?= $Page->ProfileMasterInactive->editAttributes() ?> aria-describedby="x_ProfileMasterInactive_help">
<?= $Page->ProfileMasterInactive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfileMasterInactive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
    <div id="r_ReagentAmt" class="form-group row">
        <label id="elh_lab_profile_master_ReagentAmt" for="x_ReagentAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReagentAmt->caption() ?><?= $Page->ReagentAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ReagentAmt">
<input type="<?= $Page->ReagentAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?= HtmlEncode($Page->ReagentAmt->getPlaceHolder()) ?>" value="<?= $Page->ReagentAmt->EditValue ?>"<?= $Page->ReagentAmt->editAttributes() ?> aria-describedby="x_ReagentAmt_help">
<?= $Page->ReagentAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReagentAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
    <div id="r_LabAmt" class="form-group row">
        <label id="elh_lab_profile_master_LabAmt" for="x_LabAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LabAmt->caption() ?><?= $Page->LabAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_LabAmt">
<input type="<?= $Page->LabAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?= HtmlEncode($Page->LabAmt->getPlaceHolder()) ?>" value="<?= $Page->LabAmt->EditValue ?>"<?= $Page->LabAmt->editAttributes() ?> aria-describedby="x_LabAmt_help">
<?= $Page->LabAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
    <div id="r_RefAmt" class="form-group row">
        <label id="elh_lab_profile_master_RefAmt" for="x_RefAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefAmt->caption() ?><?= $Page->RefAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_RefAmt">
<input type="<?= $Page->RefAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?= HtmlEncode($Page->RefAmt->getPlaceHolder()) ?>" value="<?= $Page->RefAmt->EditValue ?>"<?= $Page->RefAmt->editAttributes() ?> aria-describedby="x_RefAmt_help">
<?= $Page->RefAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MainDeptCD->Visible) { // MainDeptCD ?>
    <div id="r_MainDeptCD" class="form-group row">
        <label id="elh_lab_profile_master_MainDeptCD" for="x_MainDeptCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MainDeptCD->caption() ?><?= $Page->MainDeptCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MainDeptCD->cellAttributes() ?>>
<span id="el_lab_profile_master_MainDeptCD">
<input type="<?= $Page->MainDeptCD->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_MainDeptCD" name="x_MainDeptCD" id="x_MainDeptCD" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->MainDeptCD->getPlaceHolder()) ?>" value="<?= $Page->MainDeptCD->EditValue ?>"<?= $Page->MainDeptCD->editAttributes() ?> aria-describedby="x_MainDeptCD_help">
<?= $Page->MainDeptCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MainDeptCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
    <div id="r_Individual" class="form-group row">
        <label id="elh_lab_profile_master_Individual" for="x_Individual" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Individual->caption() ?><?= $Page->Individual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Individual->cellAttributes() ?>>
<span id="el_lab_profile_master_Individual">
<input type="<?= $Page->Individual->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Individual->getPlaceHolder()) ?>" value="<?= $Page->Individual->EditValue ?>"<?= $Page->Individual->editAttributes() ?> aria-describedby="x_Individual_help">
<?= $Page->Individual->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Individual->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
    <div id="r_ShortName" class="form-group row">
        <label id="elh_lab_profile_master_ShortName" for="x_ShortName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ShortName->caption() ?><?= $Page->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShortName->cellAttributes() ?>>
<span id="el_lab_profile_master_ShortName">
<input type="<?= $Page->ShortName->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->ShortName->getPlaceHolder()) ?>" value="<?= $Page->ShortName->EditValue ?>"<?= $Page->ShortName->editAttributes() ?> aria-describedby="x_ShortName_help">
<?= $Page->ShortName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShortName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Note->Visible) { // Note ?>
    <div id="r_Note" class="form-group row">
        <label id="elh_lab_profile_master_Note" for="x_Note" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Note->caption() ?><?= $Page->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Note->cellAttributes() ?>>
<span id="el_lab_profile_master_Note">
<textarea data-table="lab_profile_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Note->getPlaceHolder()) ?>"<?= $Page->Note->editAttributes() ?> aria-describedby="x_Note_help"><?= $Page->Note->EditValue ?></textarea>
<?= $Page->Note->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Note->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
    <div id="r_PrevAmt" class="form-group row">
        <label id="elh_lab_profile_master_PrevAmt" for="x_PrevAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrevAmt->caption() ?><?= $Page->PrevAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_PrevAmt">
<input type="<?= $Page->PrevAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?= HtmlEncode($Page->PrevAmt->getPlaceHolder()) ?>" value="<?= $Page->PrevAmt->EditValue ?>"<?= $Page->PrevAmt->editAttributes() ?> aria-describedby="x_PrevAmt_help">
<?= $Page->PrevAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrevAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
    <div id="r_BillName" class="form-group row">
        <label id="elh_lab_profile_master_BillName" for="x_BillName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillName->caption() ?><?= $Page->BillName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillName->cellAttributes() ?>>
<span id="el_lab_profile_master_BillName">
<input type="<?= $Page->BillName->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BillName->getPlaceHolder()) ?>" value="<?= $Page->BillName->EditValue ?>"<?= $Page->BillName->editAttributes() ?> aria-describedby="x_BillName_help">
<?= $Page->BillName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
    <div id="r_ActualAmt" class="form-group row">
        <label id="elh_lab_profile_master_ActualAmt" for="x_ActualAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ActualAmt->caption() ?><?= $Page->ActualAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ActualAmt">
<input type="<?= $Page->ActualAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?= HtmlEncode($Page->ActualAmt->getPlaceHolder()) ?>" value="<?= $Page->ActualAmt->EditValue ?>"<?= $Page->ActualAmt->editAttributes() ?> aria-describedby="x_ActualAmt_help">
<?= $Page->ActualAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ActualAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
    <div id="r_NoHeading" class="form-group row">
        <label id="elh_lab_profile_master_NoHeading" for="x_NoHeading" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoHeading->caption() ?><?= $Page->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el_lab_profile_master_NoHeading">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?> aria-describedby="x_NoHeading_help">
<?= $Page->NoHeading->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <div id="r_EditDate" class="form-group row">
        <label id="elh_lab_profile_master_EditDate" for="x_EditDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EditDate->caption() ?><?= $Page->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_lab_profile_master_EditDate">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?> aria-describedby="x_EditDate_help">
<?= $Page->EditDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage() ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_profile_masteradd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_profile_masteradd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EditUser->Visible) { // EditUser ?>
    <div id="r_EditUser" class="form-group row">
        <label id="elh_lab_profile_master_EditUser" for="x_EditUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EditUser->caption() ?><?= $Page->EditUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditUser->cellAttributes() ?>>
<span id="el_lab_profile_master_EditUser">
<input type="<?= $Page->EditUser->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_EditUser" name="x_EditUser" id="x_EditUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->EditUser->getPlaceHolder()) ?>" value="<?= $Page->EditUser->EditValue ?>"<?= $Page->EditUser->editAttributes() ?> aria-describedby="x_EditUser_help">
<?= $Page->EditUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EditUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
    <div id="r_HISCD" class="form-group row">
        <label id="elh_lab_profile_master_HISCD" for="x_HISCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HISCD->caption() ?><?= $Page->HISCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HISCD->cellAttributes() ?>>
<span id="el_lab_profile_master_HISCD">
<input type="<?= $Page->HISCD->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->HISCD->getPlaceHolder()) ?>" value="<?= $Page->HISCD->EditValue ?>"<?= $Page->HISCD->editAttributes() ?> aria-describedby="x_HISCD_help">
<?= $Page->HISCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HISCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
    <div id="r_PriceList" class="form-group row">
        <label id="elh_lab_profile_master_PriceList" for="x_PriceList" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PriceList->caption() ?><?= $Page->PriceList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PriceList->cellAttributes() ?>>
<span id="el_lab_profile_master_PriceList">
<input type="<?= $Page->PriceList->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->PriceList->getPlaceHolder()) ?>" value="<?= $Page->PriceList->EditValue ?>"<?= $Page->PriceList->editAttributes() ?> aria-describedby="x_PriceList_help">
<?= $Page->PriceList->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PriceList->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
    <div id="r_IPAmt" class="form-group row">
        <label id="elh_lab_profile_master_IPAmt" for="x_IPAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IPAmt->caption() ?><?= $Page->IPAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IPAmt">
<input type="<?= $Page->IPAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?= HtmlEncode($Page->IPAmt->getPlaceHolder()) ?>" value="<?= $Page->IPAmt->EditValue ?>"<?= $Page->IPAmt->editAttributes() ?> aria-describedby="x_IPAmt_help">
<?= $Page->IPAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IPAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IInsAmt->Visible) { // IInsAmt ?>
    <div id="r_IInsAmt" class="form-group row">
        <label id="elh_lab_profile_master_IInsAmt" for="x_IInsAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IInsAmt->caption() ?><?= $Page->IInsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IInsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IInsAmt">
<input type="<?= $Page->IInsAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_IInsAmt" name="x_IInsAmt" id="x_IInsAmt" size="30" placeholder="<?= HtmlEncode($Page->IInsAmt->getPlaceHolder()) ?>" value="<?= $Page->IInsAmt->EditValue ?>"<?= $Page->IInsAmt->editAttributes() ?> aria-describedby="x_IInsAmt_help">
<?= $Page->IInsAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IInsAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
    <div id="r_ManualCD" class="form-group row">
        <label id="elh_lab_profile_master_ManualCD" for="x_ManualCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ManualCD->caption() ?><?= $Page->ManualCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el_lab_profile_master_ManualCD">
<input type="<?= $Page->ManualCD->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->ManualCD->getPlaceHolder()) ?>" value="<?= $Page->ManualCD->EditValue ?>"<?= $Page->ManualCD->editAttributes() ?> aria-describedby="x_ManualCD_help">
<?= $Page->ManualCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ManualCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
    <div id="r_Free" class="form-group row">
        <label id="elh_lab_profile_master_Free" for="x_Free" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Free->caption() ?><?= $Page->Free->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Free->cellAttributes() ?>>
<span id="el_lab_profile_master_Free">
<input type="<?= $Page->Free->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Free->getPlaceHolder()) ?>" value="<?= $Page->Free->EditValue ?>"<?= $Page->Free->editAttributes() ?> aria-describedby="x_Free_help">
<?= $Page->Free->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Free->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IIpAmt->Visible) { // IIpAmt ?>
    <div id="r_IIpAmt" class="form-group row">
        <label id="elh_lab_profile_master_IIpAmt" for="x_IIpAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IIpAmt->caption() ?><?= $Page->IIpAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IIpAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IIpAmt">
<input type="<?= $Page->IIpAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_IIpAmt" name="x_IIpAmt" id="x_IIpAmt" size="30" placeholder="<?= HtmlEncode($Page->IIpAmt->getPlaceHolder()) ?>" value="<?= $Page->IIpAmt->EditValue ?>"<?= $Page->IIpAmt->editAttributes() ?> aria-describedby="x_IIpAmt_help">
<?= $Page->IIpAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IIpAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
    <div id="r_InsAmt" class="form-group row">
        <label id="elh_lab_profile_master_InsAmt" for="x_InsAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InsAmt->caption() ?><?= $Page->InsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_InsAmt">
<input type="<?= $Page->InsAmt->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?= HtmlEncode($Page->InsAmt->getPlaceHolder()) ?>" value="<?= $Page->InsAmt->EditValue ?>"<?= $Page->InsAmt->editAttributes() ?> aria-describedby="x_InsAmt_help">
<?= $Page->InsAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InsAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <div id="r_OutSource" class="form-group row">
        <label id="elh_lab_profile_master_OutSource" for="x_OutSource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OutSource->caption() ?><?= $Page->OutSource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutSource->cellAttributes() ?>>
<span id="el_lab_profile_master_OutSource">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="lab_profile_master" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?> aria-describedby="x_OutSource_help">
<?= $Page->OutSource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
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
    ew.addEventHandlers("lab_profile_master");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
