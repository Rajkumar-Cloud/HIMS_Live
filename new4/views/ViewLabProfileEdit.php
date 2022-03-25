<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabProfileEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_lab_profileedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_lab_profileedit = currentForm = new ew.Form("fview_lab_profileedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_lab_profile")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_lab_profile)
        ew.vars.tables.view_lab_profile = currentTable;
    fview_lab_profileedit.addFields([
        ["Id", [fields.Id.visible && fields.Id.required ? ew.Validators.required(fields.Id.caption) : null], fields.Id.isInvalid],
        ["CODE", [fields.CODE.visible && fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["SERVICE", [fields.SERVICE.visible && fields.SERVICE.required ? ew.Validators.required(fields.SERVICE.caption) : null], fields.SERVICE.isInvalid],
        ["UNITS", [fields.UNITS.visible && fields.UNITS.required ? ew.Validators.required(fields.UNITS.caption) : null, ew.Validators.integer], fields.UNITS.isInvalid],
        ["AMOUNT", [fields.AMOUNT.visible && fields.AMOUNT.required ? ew.Validators.required(fields.AMOUNT.caption) : null], fields.AMOUNT.isInvalid],
        ["SERVICE_TYPE", [fields.SERVICE_TYPE.visible && fields.SERVICE_TYPE.required ? ew.Validators.required(fields.SERVICE_TYPE.caption) : null], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [fields.DEPARTMENT.visible && fields.DEPARTMENT.required ? ew.Validators.required(fields.DEPARTMENT.caption) : null], fields.DEPARTMENT.isInvalid],
        ["Modified", [fields.Modified.visible && fields.Modified.required ? ew.Validators.required(fields.Modified.caption) : null], fields.Modified.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid],
        ["mas_services_billingcol", [fields.mas_services_billingcol.visible && fields.mas_services_billingcol.required ? ew.Validators.required(fields.mas_services_billingcol.caption) : null], fields.mas_services_billingcol.isInvalid],
        ["DrShareAmount", [fields.DrShareAmount.visible && fields.DrShareAmount.required ? ew.Validators.required(fields.DrShareAmount.caption) : null, ew.Validators.float], fields.DrShareAmount.isInvalid],
        ["HospShareAmount", [fields.HospShareAmount.visible && fields.HospShareAmount.required ? ew.Validators.required(fields.HospShareAmount.caption) : null, ew.Validators.float], fields.HospShareAmount.isInvalid],
        ["DrSharePer", [fields.DrSharePer.visible && fields.DrSharePer.required ? ew.Validators.required(fields.DrSharePer.caption) : null, ew.Validators.integer], fields.DrSharePer.isInvalid],
        ["HospSharePer", [fields.HospSharePer.visible && fields.HospSharePer.required ? ew.Validators.required(fields.HospSharePer.caption) : null, ew.Validators.integer], fields.HospSharePer.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["ResType", [fields.ResType.visible && fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["UnitCD", [fields.UnitCD.visible && fields.UnitCD.required ? ew.Validators.required(fields.UnitCD.caption) : null], fields.UnitCD.isInvalid],
        ["RefValue", [fields.RefValue.visible && fields.RefValue.required ? ew.Validators.required(fields.RefValue.caption) : null], fields.RefValue.isInvalid],
        ["Sample", [fields.Sample.visible && fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.visible && fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.visible && fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
        ["Formula", [fields.Formula.visible && fields.Formula.required ? ew.Validators.required(fields.Formula.caption) : null], fields.Formula.isInvalid],
        ["Inactive", [fields.Inactive.visible && fields.Inactive.required ? ew.Validators.required(fields.Inactive.caption) : null], fields.Inactive.isInvalid],
        ["Outsource", [fields.Outsource.visible && fields.Outsource.required ? ew.Validators.required(fields.Outsource.caption) : null], fields.Outsource.isInvalid],
        ["CollSample", [fields.CollSample.visible && fields.CollSample.required ? ew.Validators.required(fields.CollSample.caption) : null], fields.CollSample.isInvalid],
        ["TestType", [fields.TestType.visible && fields.TestType.required ? ew.Validators.required(fields.TestType.caption) : null], fields.TestType.isInvalid],
        ["NoHeading", [fields.NoHeading.visible && fields.NoHeading.required ? ew.Validators.required(fields.NoHeading.caption) : null], fields.NoHeading.isInvalid],
        ["ChemicalCode", [fields.ChemicalCode.visible && fields.ChemicalCode.required ? ew.Validators.required(fields.ChemicalCode.caption) : null], fields.ChemicalCode.isInvalid],
        ["ChemicalName", [fields.ChemicalName.visible && fields.ChemicalName.required ? ew.Validators.required(fields.ChemicalName.caption) : null], fields.ChemicalName.isInvalid],
        ["Utilaization", [fields.Utilaization.visible && fields.Utilaization.required ? ew.Validators.required(fields.Utilaization.caption) : null], fields.Utilaization.isInvalid],
        ["Interpretation", [fields.Interpretation.visible && fields.Interpretation.required ? ew.Validators.required(fields.Interpretation.caption) : null], fields.Interpretation.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_lab_profileedit,
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
    fview_lab_profileedit.validate = function () {
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
    fview_lab_profileedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_lab_profileedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_lab_profileedit.lists.SERVICE_TYPE = <?= $Page->SERVICE_TYPE->toClientList($Page) ?>;
    fview_lab_profileedit.lists.DEPARTMENT = <?= $Page->DEPARTMENT->toClientList($Page) ?>;
    fview_lab_profileedit.lists.TestType = <?= $Page->TestType->toClientList($Page) ?>;
    loadjs.done("fview_lab_profileedit");
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
<form name="fview_lab_profileedit" id="fview_lab_profileedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->Id->Visible) { // Id ?>
    <div id="r_Id" class="form-group row">
        <label id="elh_view_lab_profile_Id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Id"><?= $Page->Id->caption() ?><?= $Page->Id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Id->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Id"><span id="el_view_lab_profile_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Id->getDisplayValue($Page->Id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_lab_profile" data-field="x_Id" data-hidden="1" name="x_Id" id="x_Id" value="<?= HtmlEncode($Page->Id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <div id="r_CODE" class="form-group row">
        <label id="elh_view_lab_profile_CODE" for="x_CODE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_CODE"><?= $Page->CODE->caption() ?><?= $Page->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CODE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CODE"><span id="el_view_lab_profile_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?> aria-describedby="x_CODE_help">
<?= $Page->CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <div id="r_SERVICE" class="form-group row">
        <label id="elh_view_lab_profile_SERVICE" for="x_SERVICE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_SERVICE"><?= $Page->SERVICE->caption() ?><?= $Page->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SERVICE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_SERVICE"><span id="el_view_lab_profile_SERVICE">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?> aria-describedby="x_SERVICE_help">
<?= $Page->SERVICE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
    <div id="r_UNITS" class="form-group row">
        <label id="elh_view_lab_profile_UNITS" for="x_UNITS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_UNITS"><?= $Page->UNITS->caption() ?><?= $Page->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UNITS->cellAttributes() ?>>
<template id="tpx_view_lab_profile_UNITS"><span id="el_view_lab_profile_UNITS">
<input type="<?= $Page->UNITS->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_UNITS" name="x_UNITS" id="x_UNITS" size="30" placeholder="<?= HtmlEncode($Page->UNITS->getPlaceHolder()) ?>" value="<?= $Page->UNITS->EditValue ?>"<?= $Page->UNITS->editAttributes() ?> aria-describedby="x_UNITS_help">
<?= $Page->UNITS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UNITS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
    <div id="r_AMOUNT" class="form-group row">
        <label id="elh_view_lab_profile_AMOUNT" for="x_AMOUNT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_AMOUNT"><?= $Page->AMOUNT->caption() ?><?= $Page->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AMOUNT->cellAttributes() ?>>
<template id="tpx_view_lab_profile_AMOUNT"><span id="el_view_lab_profile_AMOUNT">
<input type="<?= $Page->AMOUNT->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AMOUNT->getPlaceHolder()) ?>" value="<?= $Page->AMOUNT->EditValue ?>"<?= $Page->AMOUNT->editAttributes() ?> aria-describedby="x_AMOUNT_help">
<?= $Page->AMOUNT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AMOUNT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <div id="r_SERVICE_TYPE" class="form-group row">
        <label id="elh_view_lab_profile_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_SERVICE_TYPE"><?= $Page->SERVICE_TYPE->caption() ?><?= $Page->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_SERVICE_TYPE"><span id="el_view_lab_profile_SERVICE_TYPE">
<div class="input-group flex-nowrap">
    <select
        id="x_SERVICE_TYPE"
        name="x_SERVICE_TYPE"
        class="form-control ew-select<?= $Page->SERVICE_TYPE->isInvalidClass() ?>"
        data-select2-id="view_lab_profile_x_SERVICE_TYPE"
        data-table="view_lab_profile"
        data-field="x_SERVICE_TYPE"
        data-value-separator="<?= $Page->SERVICE_TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>"
        <?= $Page->SERVICE_TYPE->editAttributes() ?>>
        <?= $Page->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$Page->SERVICE_TYPE->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->SERVICE_TYPE->caption() ?>" data-title="<?= $Page->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'<?= GetUrl("MasServicesTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->SERVICE_TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage() ?></div>
<?= $Page->SERVICE_TYPE->Lookup->getParamTag($Page, "p_x_SERVICE_TYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_lab_profile_x_SERVICE_TYPE']"),
        options = { name: "x_SERVICE_TYPE", selectId: "view_lab_profile_x_SERVICE_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_lab_profile.fields.SERVICE_TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <div id="r_DEPARTMENT" class="form-group row">
        <label id="elh_view_lab_profile_DEPARTMENT" for="x_DEPARTMENT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?><?= $Page->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEPARTMENT->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DEPARTMENT"><span id="el_view_lab_profile_DEPARTMENT">
<div class="input-group flex-nowrap">
    <select
        id="x_DEPARTMENT"
        name="x_DEPARTMENT"
        class="form-control ew-select<?= $Page->DEPARTMENT->isInvalidClass() ?>"
        data-select2-id="view_lab_profile_x_DEPARTMENT"
        data-table="view_lab_profile"
        data-field="x_DEPARTMENT"
        data-value-separator="<?= $Page->DEPARTMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>"
        <?= $Page->DEPARTMENT->editAttributes() ?>>
        <?= $Page->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$Page->DEPARTMENT->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DEPARTMENT" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DEPARTMENT->caption() ?>" data-title="<?= $Page->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DEPARTMENT',url:'<?= GetUrl("MasBillingDepartmentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->DEPARTMENT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
<?= $Page->DEPARTMENT->Lookup->getParamTag($Page, "p_x_DEPARTMENT") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_lab_profile_x_DEPARTMENT']"),
        options = { name: "x_DEPARTMENT", selectId: "view_lab_profile_x_DEPARTMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_lab_profile.fields.DEPARTMENT.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
    <div id="r_mas_services_billingcol" class="form-group row">
        <label id="elh_view_lab_profile_mas_services_billingcol" for="x_mas_services_billingcol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_mas_services_billingcol"><?= $Page->mas_services_billingcol->caption() ?><?= $Page->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<template id="tpx_view_lab_profile_mas_services_billingcol"><span id="el_view_lab_profile_mas_services_billingcol">
<input type="<?= $Page->mas_services_billingcol->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mas_services_billingcol->getPlaceHolder()) ?>" value="<?= $Page->mas_services_billingcol->EditValue ?>"<?= $Page->mas_services_billingcol->editAttributes() ?> aria-describedby="x_mas_services_billingcol_help">
<?= $Page->mas_services_billingcol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mas_services_billingcol->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <div id="r_DrShareAmount" class="form-group row">
        <label id="elh_view_lab_profile_DrShareAmount" for="x_DrShareAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_DrShareAmount"><?= $Page->DrShareAmount->caption() ?><?= $Page->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareAmount->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DrShareAmount"><span id="el_view_lab_profile_DrShareAmount">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?> aria-describedby="x_DrShareAmount_help">
<?= $Page->DrShareAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <div id="r_HospShareAmount" class="form-group row">
        <label id="elh_view_lab_profile_HospShareAmount" for="x_HospShareAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_HospShareAmount"><?= $Page->HospShareAmount->caption() ?><?= $Page->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospShareAmount->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospShareAmount"><span id="el_view_lab_profile_HospShareAmount">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?> aria-describedby="x_HospShareAmount_help">
<?= $Page->HospShareAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
    <div id="r_DrSharePer" class="form-group row">
        <label id="elh_view_lab_profile_DrSharePer" for="x_DrSharePer" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_DrSharePer"><?= $Page->DrSharePer->caption() ?><?= $Page->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrSharePer->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DrSharePer"><span id="el_view_lab_profile_DrSharePer">
<input type="<?= $Page->DrSharePer->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?= HtmlEncode($Page->DrSharePer->getPlaceHolder()) ?>" value="<?= $Page->DrSharePer->EditValue ?>"<?= $Page->DrSharePer->editAttributes() ?> aria-describedby="x_DrSharePer_help">
<?= $Page->DrSharePer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrSharePer->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
    <div id="r_HospSharePer" class="form-group row">
        <label id="elh_view_lab_profile_HospSharePer" for="x_HospSharePer" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_HospSharePer"><?= $Page->HospSharePer->caption() ?><?= $Page->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospSharePer->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospSharePer"><span id="el_view_lab_profile_HospSharePer">
<input type="<?= $Page->HospSharePer->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?= HtmlEncode($Page->HospSharePer->getPlaceHolder()) ?>" value="<?= $Page->HospSharePer->EditValue ?>"<?= $Page->HospSharePer->editAttributes() ?> aria-describedby="x_HospSharePer_help">
<?= $Page->HospSharePer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospSharePer->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label id="elh_view_lab_profile_TestSubCd" for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_TestSubCd"><?= $Page->TestSubCd->caption() ?><?= $Page->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
<template id="tpx_view_lab_profile_TestSubCd"><span id="el_view_lab_profile_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?> aria-describedby="x_TestSubCd_help">
<?= $Page->TestSubCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_view_lab_profile_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Method"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Method"><span id="el_view_lab_profile_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label id="elh_view_lab_profile_Order" for="x_Order" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Order"><?= $Page->Order->caption() ?><?= $Page->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Order"><span id="el_view_lab_profile_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?> aria-describedby="x_Order_help">
<?= $Page->Order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_view_lab_profile_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Form"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Form"><span id="el_view_lab_profile_Form">
<textarea data-table="view_lab_profile" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"<?= $Page->Form->editAttributes() ?> aria-describedby="x_Form_help"><?= $Page->Form->EditValue ?></textarea>
<?= $Page->Form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <div id="r_ResType" class="form-group row">
        <label id="elh_view_lab_profile_ResType" for="x_ResType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_ResType"><?= $Page->ResType->caption() ?><?= $Page->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResType->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ResType"><span id="el_view_lab_profile_ResType">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?> aria-describedby="x_ResType_help">
<?= $Page->ResType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <div id="r_UnitCD" class="form-group row">
        <label id="elh_view_lab_profile_UnitCD" for="x_UnitCD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_UnitCD"><?= $Page->UnitCD->caption() ?><?= $Page->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UnitCD->cellAttributes() ?>>
<template id="tpx_view_lab_profile_UnitCD"><span id="el_view_lab_profile_UnitCD">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?> aria-describedby="x_UnitCD_help">
<?= $Page->UnitCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label id="elh_view_lab_profile_RefValue" for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_RefValue"><?= $Page->RefValue->caption() ?><?= $Page->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
<template id="tpx_view_lab_profile_RefValue"><span id="el_view_lab_profile_RefValue">
<textarea data-table="view_lab_profile" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?> aria-describedby="x_RefValue_help"><?= $Page->RefValue->EditValue ?></textarea>
<?= $Page->RefValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <div id="r_Sample" class="form-group row">
        <label id="elh_view_lab_profile_Sample" for="x_Sample" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Sample"><?= $Page->Sample->caption() ?><?= $Page->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sample->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Sample"><span id="el_view_lab_profile_Sample">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?> aria-describedby="x_Sample_help">
<?= $Page->Sample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <div id="r_NoD" class="form-group row">
        <label id="elh_view_lab_profile_NoD" for="x_NoD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_NoD"><?= $Page->NoD->caption() ?><?= $Page->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoD->cellAttributes() ?>>
<template id="tpx_view_lab_profile_NoD"><span id="el_view_lab_profile_NoD">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?> aria-describedby="x_NoD_help">
<?= $Page->NoD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <div id="r_BillOrder" class="form-group row">
        <label id="elh_view_lab_profile_BillOrder" for="x_BillOrder" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_BillOrder"><?= $Page->BillOrder->caption() ?><?= $Page->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillOrder->cellAttributes() ?>>
<template id="tpx_view_lab_profile_BillOrder"><span id="el_view_lab_profile_BillOrder">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?> aria-describedby="x_BillOrder_help">
<?= $Page->BillOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <div id="r_Formula" class="form-group row">
        <label id="elh_view_lab_profile_Formula" for="x_Formula" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Formula"><?= $Page->Formula->caption() ?><?= $Page->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Formula->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Formula"><span id="el_view_lab_profile_Formula">
<textarea data-table="view_lab_profile" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Formula->getPlaceHolder()) ?>"<?= $Page->Formula->editAttributes() ?> aria-describedby="x_Formula_help"><?= $Page->Formula->EditValue ?></textarea>
<?= $Page->Formula->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Formula->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <div id="r_Inactive" class="form-group row">
        <label id="elh_view_lab_profile_Inactive" for="x_Inactive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Inactive"><?= $Page->Inactive->caption() ?><?= $Page->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Inactive->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Inactive"><span id="el_view_lab_profile_Inactive">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?> aria-describedby="x_Inactive_help">
<?= $Page->Inactive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <div id="r_Outsource" class="form-group row">
        <label id="elh_view_lab_profile_Outsource" for="x_Outsource" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Outsource"><?= $Page->Outsource->caption() ?><?= $Page->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Outsource->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Outsource"><span id="el_view_lab_profile_Outsource">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?> aria-describedby="x_Outsource_help">
<?= $Page->Outsource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <div id="r_CollSample" class="form-group row">
        <label id="elh_view_lab_profile_CollSample" for="x_CollSample" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_CollSample"><?= $Page->CollSample->caption() ?><?= $Page->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollSample->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CollSample"><span id="el_view_lab_profile_CollSample">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?> aria-describedby="x_CollSample_help">
<?= $Page->CollSample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <div id="r_TestType" class="form-group row">
        <label id="elh_view_lab_profile_TestType" for="x_TestType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_TestType"><?= $Page->TestType->caption() ?><?= $Page->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestType->cellAttributes() ?>>
<template id="tpx_view_lab_profile_TestType"><span id="el_view_lab_profile_TestType">
    <select
        id="x_TestType"
        name="x_TestType"
        class="form-control ew-select<?= $Page->TestType->isInvalidClass() ?>"
        data-select2-id="view_lab_profile_x_TestType"
        data-table="view_lab_profile"
        data-field="x_TestType"
        data-value-separator="<?= $Page->TestType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>"
        <?= $Page->TestType->editAttributes() ?>>
        <?= $Page->TestType->selectOptionListHtml("x_TestType") ?>
    </select>
    <?= $Page->TestType->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_lab_profile_x_TestType']"),
        options = { name: "x_TestType", selectId: "view_lab_profile_x_TestType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_lab_profile.fields.TestType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_lab_profile.fields.TestType.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
    <div id="r_NoHeading" class="form-group row">
        <label id="elh_view_lab_profile_NoHeading" for="x_NoHeading" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_NoHeading"><?= $Page->NoHeading->caption() ?><?= $Page->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoHeading->cellAttributes() ?>>
<template id="tpx_view_lab_profile_NoHeading"><span id="el_view_lab_profile_NoHeading">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?> aria-describedby="x_NoHeading_help">
<?= $Page->NoHeading->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
    <div id="r_ChemicalCode" class="form-group row">
        <label id="elh_view_lab_profile_ChemicalCode" for="x_ChemicalCode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_ChemicalCode"><?= $Page->ChemicalCode->caption() ?><?= $Page->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChemicalCode->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ChemicalCode"><span id="el_view_lab_profile_ChemicalCode">
<input type="<?= $Page->ChemicalCode->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalCode->getPlaceHolder()) ?>" value="<?= $Page->ChemicalCode->EditValue ?>"<?= $Page->ChemicalCode->editAttributes() ?> aria-describedby="x_ChemicalCode_help">
<?= $Page->ChemicalCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChemicalCode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
    <div id="r_ChemicalName" class="form-group row">
        <label id="elh_view_lab_profile_ChemicalName" for="x_ChemicalName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_ChemicalName"><?= $Page->ChemicalName->caption() ?><?= $Page->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChemicalName->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ChemicalName"><span id="el_view_lab_profile_ChemicalName">
<input type="<?= $Page->ChemicalName->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalName->getPlaceHolder()) ?>" value="<?= $Page->ChemicalName->EditValue ?>"<?= $Page->ChemicalName->editAttributes() ?> aria-describedby="x_ChemicalName_help">
<?= $Page->ChemicalName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChemicalName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
    <div id="r_Utilaization" class="form-group row">
        <label id="elh_view_lab_profile_Utilaization" for="x_Utilaization" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Utilaization"><?= $Page->Utilaization->caption() ?><?= $Page->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Utilaization->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Utilaization"><span id="el_view_lab_profile_Utilaization">
<input type="<?= $Page->Utilaization->getInputTextType() ?>" data-table="view_lab_profile" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Utilaization->getPlaceHolder()) ?>" value="<?= $Page->Utilaization->EditValue ?>"<?= $Page->Utilaization->editAttributes() ?> aria-describedby="x_Utilaization_help">
<?= $Page->Utilaization->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Utilaization->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Interpretation->Visible) { // Interpretation ?>
    <div id="r_Interpretation" class="form-group row">
        <label id="elh_view_lab_profile_Interpretation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_lab_profile_Interpretation"><?= $Page->Interpretation->caption() ?><?= $Page->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Interpretation->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Interpretation"><span id="el_view_lab_profile_Interpretation">
<?php $Page->Interpretation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_lab_profile" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Interpretation->getPlaceHolder()) ?>"<?= $Page->Interpretation->editAttributes() ?> aria-describedby="x_Interpretation_help"><?= $Page->Interpretation->EditValue ?></textarea>
<?= $Page->Interpretation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Interpretation->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_profileedit", "editor"], function() {
	ew.createEditor("fview_lab_profileedit", "x_Interpretation", 35, 4, <?= $Page->Interpretation->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_lab_profileedit" class="ew-custom-template"></div>
<template id="tpm_view_lab_profileedit">
<div id="ct_ViewLabProfileEdit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Service Details</h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_CODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_CODE"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_SERVICE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_SERVICE"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_UNITS"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_UNITS"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_AMOUNT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_AMOUNT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_SERVICE_TYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_SERVICE_TYPE"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DEPARTMENT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DEPARTMENT"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_mas_services_billingcol"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_mas_services_billingcol"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DrShareAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DrShareAmount"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_HospShareAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_HospShareAmount"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DrSharePer"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DrSharePer"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_HospSharePer"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_HospSharePer"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Lab Details</h3>
			</div>
			<div class="card-body">
			<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_TestSubCd"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_TestSubCd"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Method"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Method"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Order"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Order"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Form"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Form"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_ResType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_ResType"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_UnitCD"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_UnitCD"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Inactive"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Inactive"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Outsource"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Outsource"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_CollSample"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_CollSample"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_RefValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_RefValue"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Sample"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Sample"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_NoD"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_NoD"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_BillOrder"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_BillOrder"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Formula"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Formula"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_TestType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_TestType"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_NoHeading"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_NoHeading"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_ChemicalCode"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_ChemicalCode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_ChemicalName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_ChemicalName"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Utilaization"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Utilaization"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
		</div>
		</div>
	</div>				
</div>
</div>
<div class="row">
<slot class="ew-slot" name="tpc_view_lab_profile_Interpretation"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Interpretation"></slot>
</div>
</div>
</template>
<?php
    if (in_array("lab_profile_details", explode(",", $Page->getCurrentDetailTable())) && $lab_profile_details->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("lab_profile_details", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "LabProfileDetailsGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_lab_profileedit", "tpm_view_lab_profileedit", "view_lab_profileedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_lab_profile");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
