<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasUserTemplatePrescriptionAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_user_template_prescriptionadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmas_user_template_prescriptionadd = currentForm = new ew.Form("fmas_user_template_prescriptionadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_user_template_prescription")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_user_template_prescription)
        ew.vars.tables.mas_user_template_prescription = currentTable;
    fmas_user_template_prescriptionadd.addFields([
        ["TemplateName", [fields.TemplateName.visible && fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["Medicine", [fields.Medicine.visible && fields.Medicine.required ? ew.Validators.required(fields.Medicine.caption) : null], fields.Medicine.isInvalid],
        ["M", [fields.M.visible && fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["A", [fields.A.visible && fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["N", [fields.N.visible && fields.N.required ? ew.Validators.required(fields.N.caption) : null], fields.N.isInvalid],
        ["NoOfDays", [fields.NoOfDays.visible && fields.NoOfDays.required ? ew.Validators.required(fields.NoOfDays.caption) : null], fields.NoOfDays.isInvalid],
        ["PreRoute", [fields.PreRoute.visible && fields.PreRoute.required ? ew.Validators.required(fields.PreRoute.caption) : null], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.visible && fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [fields.CreateDateTime.visible && fields.CreateDateTime.required ? ew.Validators.required(fields.CreateDateTime.caption) : null], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_user_template_prescriptionadd,
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
    fmas_user_template_prescriptionadd.validate = function () {
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
    fmas_user_template_prescriptionadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_user_template_prescriptionadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmas_user_template_prescriptionadd.lists.TemplateName = <?= $Page->TemplateName->toClientList($Page) ?>;
    fmas_user_template_prescriptionadd.lists.Medicine = <?= $Page->Medicine->toClientList($Page) ?>;
    fmas_user_template_prescriptionadd.lists.PreRoute = <?= $Page->PreRoute->toClientList($Page) ?>;
    fmas_user_template_prescriptionadd.lists.TimeOfTaking = <?= $Page->TimeOfTaking->toClientList($Page) ?>;
    loadjs.done("fmas_user_template_prescriptionadd");
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
<form name="fmas_user_template_prescriptionadd" id="fmas_user_template_prescriptionadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <div id="r_TemplateName" class="form-group row">
        <label id="elh_mas_user_template_prescription_TemplateName" for="x_TemplateName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TemplateName->caption() ?><?= $Page->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateName"
        name="x_TemplateName"
        class="form-control ew-select<?= $Page->TemplateName->isInvalidClass() ?>"
        data-select2-id="mas_user_template_prescription_x_TemplateName"
        data-table="mas_user_template_prescription"
        data-field="x_TemplateName"
        data-value-separator="<?= $Page->TemplateName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>"
        <?= $Page->TemplateName->editAttributes() ?>>
        <?= $Page->TemplateName->selectOptionListHtml("x_TemplateName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$Page->TemplateName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateName->caption() ?>" data-title="<?= $Page->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateName',url:'<?= GetUrl("MasTemplatePrescriptionTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
<?= $Page->TemplateName->Lookup->getParamTag($Page, "p_x_TemplateName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_user_template_prescription_x_TemplateName']"),
        options = { name: "x_TemplateName", selectId: "mas_user_template_prescription_x_TemplateName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_user_template_prescription.fields.TemplateName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <div id="r_Medicine" class="form-group row">
        <label id="elh_mas_user_template_prescription_Medicine" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medicine->caption() ?><?= $Page->Medicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?> aria-describedby="x_Medicine_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$Page->Medicine->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Medicine" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Medicine->caption() ?>" data-title="<?= $Page->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Medicine',url:'<?= GetUrl("PresTradenamesNewAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_Medicine" data-input="sv_x_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Medicine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionadd"], function() {
    fmas_user_template_prescriptionadd.createAutoSuggest(Object.assign({"id":"x_Medicine","forceSelect":true}, ew.vars.tables.mas_user_template_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x_Medicine") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <div id="r_M" class="form-group row">
        <label id="elh_mas_user_template_prescription_M" for="x_M" class="<?= $Page->LeftColumnClass ?>"><?= $Page->M->caption() ?><?= $Page->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?> aria-describedby="x_M_help">
<?= $Page->M->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <div id="r_A" class="form-group row">
        <label id="elh_mas_user_template_prescription_A" for="x_A" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A->caption() ?><?= $Page->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?> aria-describedby="x_A_help">
<?= $Page->A->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <div id="r_N" class="form-group row">
        <label id="elh_mas_user_template_prescription_N" for="x_N" class="<?= $Page->LeftColumnClass ?>"><?= $Page->N->caption() ?><?= $Page->N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="3" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?> aria-describedby="x_N_help">
<?= $Page->N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <div id="r_NoOfDays" class="form-group row">
        <label id="elh_mas_user_template_prescription_NoOfDays" for="x_NoOfDays" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfDays->caption() ?><?= $Page->NoOfDays->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="10" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?> aria-describedby="x_NoOfDays_help">
<?= $Page->NoOfDays->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <div id="r_PreRoute" class="form-group row">
        <label id="elh_mas_user_template_prescription_PreRoute" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreRoute->caption() ?><?= $Page->PreRoute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?> aria-describedby="x_PreRoute_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PreRoute->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->PreRoute->ReadOnly || $Page->PreRoute->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
            <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
            <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
            <?php } ?>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-input="sv_x_PreRoute" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->PreRoute->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionadd"], function() {
    fmas_user_template_prescriptionadd.createAutoSuggest(Object.assign({"id":"x_PreRoute","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x_PreRoute") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <div id="r_TimeOfTaking" class="form-group row">
        <label id="elh_mas_user_template_prescription_TimeOfTaking" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TimeOfTaking->caption() ?><?= $Page->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?> aria-describedby="x_TimeOfTaking_help">
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-input="sv_x_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->TimeOfTaking->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmas_user_template_prescriptionadd"], function() {
    fmas_user_template_prescriptionadd.createAutoSuggest(Object.assign({"id":"x_TimeOfTaking","forceSelect":false}, ew.vars.tables.mas_user_template_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x_TimeOfTaking") ?>
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
    ew.addEventHandlers("mas_user_template_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
