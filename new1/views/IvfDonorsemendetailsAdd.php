<?php

namespace PHPMaker2021\project3;

// Page object
$IvfDonorsemendetailsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_donorsemendetailsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_donorsemendetailsadd = currentForm = new ew.Form("fivf_donorsemendetailsadd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf_donorsemendetails.fields;
    fivf_donorsemendetailsadd.addFields([
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Agency", [fields.Agency.required ? ew.Validators.required(fields.Agency.caption) : null], fields.Agency.isInvalid],
        ["ReceivedOn", [fields.ReceivedOn.required ? ew.Validators.required(fields.ReceivedOn.caption) : null, ew.Validators.datetime(0)], fields.ReceivedOn.isInvalid],
        ["ReceivedBy", [fields.ReceivedBy.required ? ew.Validators.required(fields.ReceivedBy.caption) : null], fields.ReceivedBy.isInvalid],
        ["DonorNo", [fields.DonorNo.required ? ew.Validators.required(fields.DonorNo.caption) : null], fields.DonorNo.isInvalid],
        ["BatchNo", [fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["BloodGroup", [fields.BloodGroup.required ? ew.Validators.required(fields.BloodGroup.caption) : null], fields.BloodGroup.isInvalid],
        ["Height", [fields.Height.required ? ew.Validators.required(fields.Height.caption) : null], fields.Height.isInvalid],
        ["SkinColor", [fields.SkinColor.required ? ew.Validators.required(fields.SkinColor.caption) : null], fields.SkinColor.isInvalid],
        ["EyeColor", [fields.EyeColor.required ? ew.Validators.required(fields.EyeColor.caption) : null], fields.EyeColor.isInvalid],
        ["HairColor", [fields.HairColor.required ? ew.Validators.required(fields.HairColor.caption) : null], fields.HairColor.isInvalid],
        ["NoOfVials", [fields.NoOfVials.required ? ew.Validators.required(fields.NoOfVials.caption) : null], fields.NoOfVials.isInvalid],
        ["Tank", [fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Canister", [fields.Canister.required ? ew.Validators.required(fields.Canister.caption) : null], fields.Canister.isInvalid],
        ["Remarks", [fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["patientid", [fields.patientid.required ? ew.Validators.required(fields.patientid.caption) : null, ew.Validators.integer], fields.patientid.isInvalid],
        ["coupleid", [fields.coupleid.required ? ew.Validators.required(fields.coupleid.caption) : null, ew.Validators.integer], fields.coupleid.isInvalid],
        ["Usedstatus", [fields.Usedstatus.required ? ew.Validators.required(fields.Usedstatus.caption) : null, ew.Validators.integer], fields.Usedstatus.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_donorsemendetailsadd,
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
    fivf_donorsemendetailsadd.validate = function () {
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
    fivf_donorsemendetailsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_donorsemendetailsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_donorsemendetailsadd");
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
<form name="fivf_donorsemendetailsadd" id="fivf_donorsemendetailsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_donorsemendetails_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_donorsemendetails_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Agency->Visible) { // Agency ?>
    <div id="r_Agency" class="form-group row">
        <label id="elh_ivf_donorsemendetails_Agency" for="x_Agency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Agency->caption() ?><?= $Page->Agency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<input type="<?= $Page->Agency->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Agency->getPlaceHolder()) ?>" value="<?= $Page->Agency->EditValue ?>"<?= $Page->Agency->editAttributes() ?> aria-describedby="x_Agency_help">
<?= $Page->Agency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Agency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
    <div id="r_ReceivedOn" class="form-group row">
        <label id="elh_ivf_donorsemendetails_ReceivedOn" for="x_ReceivedOn" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReceivedOn->caption() ?><?= $Page->ReceivedOn->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<input type="<?= $Page->ReceivedOn->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?= HtmlEncode($Page->ReceivedOn->getPlaceHolder()) ?>" value="<?= $Page->ReceivedOn->EditValue ?>"<?= $Page->ReceivedOn->editAttributes() ?> aria-describedby="x_ReceivedOn_help">
<?= $Page->ReceivedOn->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReceivedOn->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedOn->ReadOnly && !$Page->ReceivedOn->Disabled && !isset($Page->ReceivedOn->EditAttrs["readonly"]) && !isset($Page->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_donorsemendetailsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_donorsemendetailsadd", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
    <div id="r_ReceivedBy" class="form-group row">
        <label id="elh_ivf_donorsemendetails_ReceivedBy" for="x_ReceivedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReceivedBy->caption() ?><?= $Page->ReceivedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<input type="<?= $Page->ReceivedBy->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ReceivedBy->getPlaceHolder()) ?>" value="<?= $Page->ReceivedBy->EditValue ?>"<?= $Page->ReceivedBy->editAttributes() ?> aria-describedby="x_ReceivedBy_help">
<?= $Page->ReceivedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReceivedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DonorNo->Visible) { // DonorNo ?>
    <div id="r_DonorNo" class="form-group row">
        <label id="elh_ivf_donorsemendetails_DonorNo" for="x_DonorNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DonorNo->caption() ?><?= $Page->DonorNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<input type="<?= $Page->DonorNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_DonorNo" name="x_DonorNo" id="x_DonorNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorNo->getPlaceHolder()) ?>" value="<?= $Page->DonorNo->EditValue ?>"<?= $Page->DonorNo->editAttributes() ?> aria-describedby="x_DonorNo_help">
<?= $Page->DonorNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DonorNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <div id="r_BatchNo" class="form-group row">
        <label id="elh_ivf_donorsemendetails_BatchNo" for="x_BatchNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BatchNo->caption() ?><?= $Page->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?> aria-describedby="x_BatchNo_help">
<?= $Page->BatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
    <div id="r_BloodGroup" class="form-group row">
        <label id="elh_ivf_donorsemendetails_BloodGroup" for="x_BloodGroup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BloodGroup->caption() ?><?= $Page->BloodGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<input type="<?= $Page->BloodGroup->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_BloodGroup" name="x_BloodGroup" id="x_BloodGroup" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BloodGroup->getPlaceHolder()) ?>" value="<?= $Page->BloodGroup->EditValue ?>"<?= $Page->BloodGroup->editAttributes() ?> aria-describedby="x_BloodGroup_help">
<?= $Page->BloodGroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BloodGroup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Height->Visible) { // Height ?>
    <div id="r_Height" class="form-group row">
        <label id="elh_ivf_donorsemendetails_Height" for="x_Height" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Height->caption() ?><?= $Page->Height->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<input type="<?= $Page->Height->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Height" name="x_Height" id="x_Height" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Height->getPlaceHolder()) ?>" value="<?= $Page->Height->EditValue ?>"<?= $Page->Height->editAttributes() ?> aria-describedby="x_Height_help">
<?= $Page->Height->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Height->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SkinColor->Visible) { // SkinColor ?>
    <div id="r_SkinColor" class="form-group row">
        <label id="elh_ivf_donorsemendetails_SkinColor" for="x_SkinColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SkinColor->caption() ?><?= $Page->SkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<input type="<?= $Page->SkinColor->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_SkinColor" name="x_SkinColor" id="x_SkinColor" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SkinColor->getPlaceHolder()) ?>" value="<?= $Page->SkinColor->EditValue ?>"<?= $Page->SkinColor->editAttributes() ?> aria-describedby="x_SkinColor_help">
<?= $Page->SkinColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SkinColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EyeColor->Visible) { // EyeColor ?>
    <div id="r_EyeColor" class="form-group row">
        <label id="elh_ivf_donorsemendetails_EyeColor" for="x_EyeColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EyeColor->caption() ?><?= $Page->EyeColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<input type="<?= $Page->EyeColor->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_EyeColor" name="x_EyeColor" id="x_EyeColor" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->EyeColor->getPlaceHolder()) ?>" value="<?= $Page->EyeColor->EditValue ?>"<?= $Page->EyeColor->editAttributes() ?> aria-describedby="x_EyeColor_help">
<?= $Page->EyeColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EyeColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HairColor->Visible) { // HairColor ?>
    <div id="r_HairColor" class="form-group row">
        <label id="elh_ivf_donorsemendetails_HairColor" for="x_HairColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HairColor->caption() ?><?= $Page->HairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<input type="<?= $Page->HairColor->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_HairColor" name="x_HairColor" id="x_HairColor" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->HairColor->getPlaceHolder()) ?>" value="<?= $Page->HairColor->EditValue ?>"<?= $Page->HairColor->editAttributes() ?> aria-describedby="x_HairColor_help">
<?= $Page->HairColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HairColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
    <div id="r_NoOfVials" class="form-group row">
        <label id="elh_ivf_donorsemendetails_NoOfVials" for="x_NoOfVials" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfVials->caption() ?><?= $Page->NoOfVials->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<input type="<?= $Page->NoOfVials->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_NoOfVials" name="x_NoOfVials" id="x_NoOfVials" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NoOfVials->getPlaceHolder()) ?>" value="<?= $Page->NoOfVials->EditValue ?>"<?= $Page->NoOfVials->editAttributes() ?> aria-describedby="x_NoOfVials_help">
<?= $Page->NoOfVials->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfVials->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <div id="r_Tank" class="form-group row">
        <label id="elh_ivf_donorsemendetails_Tank" for="x_Tank" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tank->caption() ?><?= $Page->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?> aria-describedby="x_Tank_help">
<?= $Page->Tank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
    <div id="r_Canister" class="form-group row">
        <label id="elh_ivf_donorsemendetails_Canister" for="x_Canister" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Canister->caption() ?><?= $Page->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<input type="<?= $Page->Canister->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Canister" name="x_Canister" id="x_Canister" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Canister->getPlaceHolder()) ?>" value="<?= $Page->Canister->EditValue ?>"<?= $Page->Canister->editAttributes() ?> aria-describedby="x_Canister_help">
<?= $Page->Canister->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Canister->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_ivf_donorsemendetails_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patientid->Visible) { // patientid ?>
    <div id="r_patientid" class="form-group row">
        <label id="elh_ivf_donorsemendetails_patientid" for="x_patientid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patientid->caption() ?><?= $Page->patientid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<input type="<?= $Page->patientid->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_patientid" name="x_patientid" id="x_patientid" size="30" placeholder="<?= HtmlEncode($Page->patientid->getPlaceHolder()) ?>" value="<?= $Page->patientid->EditValue ?>"<?= $Page->patientid->editAttributes() ?> aria-describedby="x_patientid_help">
<?= $Page->patientid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patientid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coupleid->Visible) { // coupleid ?>
    <div id="r_coupleid" class="form-group row">
        <label id="elh_ivf_donorsemendetails_coupleid" for="x_coupleid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coupleid->caption() ?><?= $Page->coupleid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<input type="<?= $Page->coupleid->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_coupleid" name="x_coupleid" id="x_coupleid" size="30" placeholder="<?= HtmlEncode($Page->coupleid->getPlaceHolder()) ?>" value="<?= $Page->coupleid->EditValue ?>"<?= $Page->coupleid->editAttributes() ?> aria-describedby="x_coupleid_help">
<?= $Page->coupleid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coupleid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Usedstatus->Visible) { // Usedstatus ?>
    <div id="r_Usedstatus" class="form-group row">
        <label id="elh_ivf_donorsemendetails_Usedstatus" for="x_Usedstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Usedstatus->caption() ?><?= $Page->Usedstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<input type="<?= $Page->Usedstatus->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_Usedstatus" name="x_Usedstatus" id="x_Usedstatus" size="30" placeholder="<?= HtmlEncode($Page->Usedstatus->getPlaceHolder()) ?>" value="<?= $Page->Usedstatus->EditValue ?>"<?= $Page->Usedstatus->editAttributes() ?> aria-describedby="x_Usedstatus_help">
<?= $Page->Usedstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Usedstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_donorsemendetails_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_donorsemendetails_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_donorsemendetails_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_donorsemendetailsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_donorsemendetailsadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_donorsemendetails_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_donorsemendetails_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf_donorsemendetails" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_donorsemendetailsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_donorsemendetailsadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
    ew.addEventHandlers("ivf_donorsemendetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
