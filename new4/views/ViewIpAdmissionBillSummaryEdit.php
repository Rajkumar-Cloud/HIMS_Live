<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAdmissionBillSummaryEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ip_admission_bill_summaryedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_ip_admission_bill_summaryedit = currentForm = new ew.Form("fview_ip_admission_bill_summaryedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ip_admission_bill_summary")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ip_admission_bill_summary)
        ew.vars.tables.view_ip_admission_bill_summary = currentTable;
    fview_ip_admission_bill_summaryedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["mrnNo", [fields.mrnNo.visible && fields.mrnNo.required ? ew.Validators.required(fields.mrnNo.caption) : null], fields.mrnNo.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["patient_name", [fields.patient_name.visible && fields.patient_name.required ? ew.Validators.required(fields.patient_name.caption) : null], fields.patient_name.isInvalid],
        ["mobileno", [fields.mobileno.visible && fields.mobileno.required ? ew.Validators.required(fields.mobileno.caption) : null], fields.mobileno.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["age", [fields.age.visible && fields.age.required ? ew.Validators.required(fields.age.caption) : null], fields.age.isInvalid],
        ["physician_id", [fields.physician_id.visible && fields.physician_id.required ? ew.Validators.required(fields.physician_id.caption) : null], fields.physician_id.isInvalid],
        ["typeRegsisteration", [fields.typeRegsisteration.visible && fields.typeRegsisteration.required ? ew.Validators.required(fields.typeRegsisteration.caption) : null], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [fields.PaymentCategory.visible && fields.PaymentCategory.required ? ew.Validators.required(fields.PaymentCategory.caption) : null], fields.PaymentCategory.isInvalid],
        ["admission_consultant_id", [fields.admission_consultant_id.visible && fields.admission_consultant_id.required ? ew.Validators.required(fields.admission_consultant_id.caption) : null], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [fields.leading_consultant_id.visible && fields.leading_consultant_id.required ? ew.Validators.required(fields.leading_consultant_id.caption) : null], fields.leading_consultant_id.isInvalid],
        ["cause", [fields.cause.visible && fields.cause.required ? ew.Validators.required(fields.cause.caption) : null], fields.cause.isInvalid],
        ["admission_date", [fields.admission_date.visible && fields.admission_date.required ? ew.Validators.required(fields.admission_date.caption) : null, ew.Validators.datetime(0)], fields.admission_date.isInvalid],
        ["release_date", [fields.release_date.visible && fields.release_date.required ? ew.Validators.required(fields.release_date.caption) : null, ew.Validators.datetime(0)], fields.release_date.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["ReferedByDr", [fields.ReferedByDr.visible && fields.ReferedByDr.required ? ew.Validators.required(fields.ReferedByDr.caption) : null], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.visible && fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.visible && fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.visible && fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.visible && fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [fields.PurposreReferredfor.visible && fields.PurposreReferredfor.required ? ew.Validators.required(fields.PurposreReferredfor.caption) : null], fields.PurposreReferredfor.isInvalid],
        ["BillClosing", [fields.BillClosing.visible && fields.BillClosing.required ? ew.Validators.required(fields.BillClosing.caption) : null], fields.BillClosing.isInvalid],
        ["BillClosingDate", [fields.BillClosingDate.visible && fields.BillClosingDate.required ? ew.Validators.required(fields.BillClosingDate.caption) : null, ew.Validators.datetime(0)], fields.BillClosingDate.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["ClosingAmount", [fields.ClosingAmount.visible && fields.ClosingAmount.required ? ew.Validators.required(fields.ClosingAmount.caption) : null], fields.ClosingAmount.isInvalid],
        ["ClosingType", [fields.ClosingType.visible && fields.ClosingType.required ? ew.Validators.required(fields.ClosingType.caption) : null], fields.ClosingType.isInvalid],
        ["BillAmount", [fields.BillAmount.visible && fields.BillAmount.required ? ew.Validators.required(fields.BillAmount.caption) : null], fields.BillAmount.isInvalid],
        ["billclosedBy", [fields.billclosedBy.visible && fields.billclosedBy.required ? ew.Validators.required(fields.billclosedBy.caption) : null], fields.billclosedBy.isInvalid],
        ["bllcloseByDate", [fields.bllcloseByDate.visible && fields.bllcloseByDate.required ? ew.Validators.required(fields.bllcloseByDate.caption) : null], fields.bllcloseByDate.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["Consultant", [fields.Consultant.visible && fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["Anesthetist", [fields.Anesthetist.visible && fields.Anesthetist.required ? ew.Validators.required(fields.Anesthetist.caption) : null], fields.Anesthetist.isInvalid],
        ["Amound", [fields.Amound.visible && fields.Amound.required ? ew.Validators.required(fields.Amound.caption) : null, ew.Validators.float], fields.Amound.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["Package", [fields.Package.visible && fields.Package.required ? ew.Validators.required(fields.Package.caption) : null], fields.Package.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ip_admission_bill_summaryedit,
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
    fview_ip_admission_bill_summaryedit.validate = function () {
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
    fview_ip_admission_bill_summaryedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ip_admission_bill_summaryedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_ip_admission_bill_summaryedit.lists.PaymentCategory = <?= $Page->PaymentCategory->toClientList($Page) ?>;
    fview_ip_admission_bill_summaryedit.lists.PaymentStatus = <?= $Page->PaymentStatus->toClientList($Page) ?>;
    fview_ip_admission_bill_summaryedit.lists.BillClosing = <?= $Page->BillClosing->toClientList($Page) ?>;
    fview_ip_admission_bill_summaryedit.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    fview_ip_admission_bill_summaryedit.lists.Procedure = <?= $Page->Procedure->toClientList($Page) ?>;
    loadjs.done("fview_ip_admission_bill_summaryedit");
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
<form name="fview_ip_admission_bill_summaryedit" id="fview_ip_admission_bill_summaryedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_id"><span id="el_view_ip_admission_bill_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_mrnNo" for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_mrnNo"><?= $Page->mrnNo->caption() ?><?= $Page->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_mrnNo"><span id="el_view_ip_admission_bill_summary_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnNo->getDisplayValue($Page->mrnNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_mrnNo" data-hidden="1" name="x_mrnNo" id="x_mrnNo" value="<?= HtmlEncode($Page->mrnNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PatientID"><span id="el_view_ip_admission_bill_summary_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientID->getDisplayValue($Page->PatientID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_PatientID" data-hidden="1" name="x_PatientID" id="x_PatientID" value="<?= HtmlEncode($Page->PatientID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_patient_name" for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_patient_name"><?= $Page->patient_name->caption() ?><?= $Page->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_patient_name"><span id="el_view_ip_admission_bill_summary_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_name->getDisplayValue($Page->patient_name->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_patient_name" data-hidden="1" name="x_patient_name" id="x_patient_name" value="<?= HtmlEncode($Page->patient_name->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <div id="r_mobileno" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_mobileno" for="x_mobileno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_mobileno"><?= $Page->mobileno->caption() ?><?= $Page->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_mobileno"><span id="el_view_ip_admission_bill_summary_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mobileno->getDisplayValue($Page->mobileno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_mobileno" data-hidden="1" name="x_mobileno" id="x_mobileno" value="<?= HtmlEncode($Page->mobileno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_profilePic"><span id="el_view_ip_admission_bill_summary_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->EditValue ?></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_profilePic" data-hidden="1" name="x_profilePic" id="x_profilePic" value="<?= HtmlEncode($Page->profilePic->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_gender"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_gender"><span id="el_view_ip_admission_bill_summary_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->gender->getDisplayValue($Page->gender->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_gender" data-hidden="1" name="x_gender" id="x_gender" value="<?= HtmlEncode($Page->gender->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_age"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_age"><span id="el_view_ip_admission_bill_summary_age">
<span<?= $Page->age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->age->getDisplayValue($Page->age->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_age" data-hidden="1" name="x_age" id="x_age" value="<?= HtmlEncode($Page->age->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_physician_id" for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_physician_id"><?= $Page->physician_id->caption() ?><?= $Page->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_physician_id"><span id="el_view_ip_admission_bill_summary_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->physician_id->getDisplayValue($Page->physician_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_physician_id" data-hidden="1" name="x_physician_id" id="x_physician_id" value="<?= HtmlEncode($Page->physician_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_typeRegsisteration" for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?><?= $Page->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_typeRegsisteration"><span id="el_view_ip_admission_bill_summary_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->typeRegsisteration->getDisplayValue($Page->typeRegsisteration->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_typeRegsisteration" data-hidden="1" name="x_typeRegsisteration" id="x_typeRegsisteration" value="<?= HtmlEncode($Page->typeRegsisteration->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_PaymentCategory" for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_PaymentCategory"><?= $Page->PaymentCategory->caption() ?><?= $Page->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PaymentCategory"><span id="el_view_ip_admission_bill_summary_PaymentCategory">
    <select
        id="x_PaymentCategory"
        name="x_PaymentCategory"
        class="form-control ew-select<?= $Page->PaymentCategory->isInvalidClass() ?>"
        data-select2-id="view_ip_admission_bill_summary_x_PaymentCategory"
        data-table="view_ip_admission_bill_summary"
        data-field="x_PaymentCategory"
        data-value-separator="<?= $Page->PaymentCategory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PaymentCategory->getPlaceHolder()) ?>"
        <?= $Page->PaymentCategory->editAttributes() ?>>
        <?= $Page->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
    </select>
    <?= $Page->PaymentCategory->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PaymentCategory->getErrorMessage() ?></div>
<?= $Page->PaymentCategory->Lookup->getParamTag($Page, "p_x_PaymentCategory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_admission_bill_summary_x_PaymentCategory']"),
        options = { name: "x_PaymentCategory", selectId: "view_ip_admission_bill_summary_x_PaymentCategory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_admission_bill_summary.fields.PaymentCategory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_admission_consultant_id" for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?><?= $Page->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_admission_consultant_id"><span id="el_view_ip_admission_bill_summary_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->admission_consultant_id->getDisplayValue($Page->admission_consultant_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_admission_consultant_id" data-hidden="1" name="x_admission_consultant_id" id="x_admission_consultant_id" value="<?= HtmlEncode($Page->admission_consultant_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_leading_consultant_id" for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?><?= $Page->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_leading_consultant_id"><span id="el_view_ip_admission_bill_summary_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->leading_consultant_id->getDisplayValue($Page->leading_consultant_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_leading_consultant_id" data-hidden="1" name="x_leading_consultant_id" id="x_leading_consultant_id" value="<?= HtmlEncode($Page->leading_consultant_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_cause" for="x_cause" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_cause"><?= $Page->cause->caption() ?><?= $Page->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_cause"><span id="el_view_ip_admission_bill_summary_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->EditValue ?></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_cause" data-hidden="1" name="x_cause" id="x_cause" value="<?= HtmlEncode($Page->cause->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_admission_date" for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_admission_date"><?= $Page->admission_date->caption() ?><?= $Page->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_admission_date"><span id="el_view_ip_admission_bill_summary_admission_date">
<input type="<?= $Page->admission_date->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" placeholder="<?= HtmlEncode($Page->admission_date->getPlaceHolder()) ?>" value="<?= $Page->admission_date->EditValue ?>"<?= $Page->admission_date->editAttributes() ?> aria-describedby="x_admission_date_help">
<?= $Page->admission_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_date->getErrorMessage() ?></div>
<?php if (!$Page->admission_date->ReadOnly && !$Page->admission_date->Disabled && !isset($Page->admission_date->EditAttrs["readonly"]) && !isset($Page->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_release_date" for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_release_date"><?= $Page->release_date->caption() ?><?= $Page->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_release_date"><span id="el_view_ip_admission_bill_summary_release_date">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_release_date" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?> aria-describedby="x_release_date_help">
<?= $Page->release_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage() ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_PaymentStatus"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PaymentStatus"><span id="el_view_ip_admission_bill_summary_PaymentStatus">
    <select
        id="x_PaymentStatus"
        name="x_PaymentStatus"
        class="form-control ew-select<?= $Page->PaymentStatus->isInvalidClass() ?>"
        data-select2-id="view_ip_admission_bill_summary_x_PaymentStatus"
        data-table="view_ip_admission_bill_summary"
        data-field="x_PaymentStatus"
        data-value-separator="<?= $Page->PaymentStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>"
        <?= $Page->PaymentStatus->editAttributes() ?>>
        <?= $Page->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
    </select>
    <?= $Page->PaymentStatus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
<?= $Page->PaymentStatus->Lookup->getParamTag($Page, "p_x_PaymentStatus") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_admission_bill_summary_x_PaymentStatus']"),
        options = { name: "x_PaymentStatus", selectId: "view_ip_admission_bill_summary_x_PaymentStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_admission_bill_summary.fields.PaymentStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_status"><span id="el_view_ip_admission_bill_summary_status">
<span<?= $Page->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->status->getDisplayValue($Page->status->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_status" data-hidden="1" name="x_status" id="x_status" value="<?= HtmlEncode($Page->status->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_createdby"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_createdby"><span id="el_view_ip_admission_bill_summary_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createdby->getDisplayValue($Page->createdby->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_createdby" data-hidden="1" name="x_createdby" id="x_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_createddatetime"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_createddatetime"><span id="el_view_ip_admission_bill_summary_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createddatetime->getDisplayValue($Page->createddatetime->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_createddatetime" data-hidden="1" name="x_createddatetime" id="x_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_modifiedby"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_modifiedby"><span id="el_view_ip_admission_bill_summary_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_modifieddatetime"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_modifieddatetime"><span id="el_view_ip_admission_bill_summary_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_HospID"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_HospID"><span id="el_view_ip_admission_bill_summary_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HospID->getDisplayValue($Page->HospID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ReferedByDr" for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ReferedByDr"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferedByDr"><span id="el_view_ip_admission_bill_summary_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferedByDr->getDisplayValue($Page->ReferedByDr->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferedByDr" data-hidden="1" name="x_ReferedByDr" id="x_ReferedByDr" value="<?= HtmlEncode($Page->ReferedByDr->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ReferClinicname"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferClinicname"><span id="el_view_ip_admission_bill_summary_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferClinicname->getDisplayValue($Page->ReferClinicname->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferClinicname" data-hidden="1" name="x_ReferClinicname" id="x_ReferClinicname" value="<?= HtmlEncode($Page->ReferClinicname->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ReferCity"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferCity"><span id="el_view_ip_admission_bill_summary_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferCity->getDisplayValue($Page->ReferCity->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferCity" data-hidden="1" name="x_ReferCity" id="x_ReferCity" value="<?= HtmlEncode($Page->ReferCity->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferMobileNo"><span id="el_view_ip_admission_bill_summary_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferMobileNo->getDisplayValue($Page->ReferMobileNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferMobileNo" data-hidden="1" name="x_ReferMobileNo" id="x_ReferMobileNo" value="<?= HtmlEncode($Page->ReferMobileNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><span id="el_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferA4TreatingConsultant->getDisplayValue($Page->ReferA4TreatingConsultant->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?= HtmlEncode($Page->ReferA4TreatingConsultant->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_PurposreReferredfor" for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PurposreReferredfor"><span id="el_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PurposreReferredfor->getDisplayValue($Page->PurposreReferredfor->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_PurposreReferredfor" data-hidden="1" name="x_PurposreReferredfor" id="x_PurposreReferredfor" value="<?= HtmlEncode($Page->PurposreReferredfor->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_BillClosing" for="x_BillClosing" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_BillClosing"><?= $Page->BillClosing->caption() ?><?= $Page->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillClosing"><span id="el_view_ip_admission_bill_summary_BillClosing">
    <select
        id="x_BillClosing"
        name="x_BillClosing"
        class="form-control ew-select<?= $Page->BillClosing->isInvalidClass() ?>"
        data-select2-id="view_ip_admission_bill_summary_x_BillClosing"
        data-table="view_ip_admission_bill_summary"
        data-field="x_BillClosing"
        data-value-separator="<?= $Page->BillClosing->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BillClosing->getPlaceHolder()) ?>"
        <?= $Page->BillClosing->editAttributes() ?>>
        <?= $Page->BillClosing->selectOptionListHtml("x_BillClosing") ?>
    </select>
    <?= $Page->BillClosing->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_admission_bill_summary_x_BillClosing']"),
        options = { name: "x_BillClosing", selectId: "view_ip_admission_bill_summary_x_BillClosing", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ip_admission_bill_summary.fields.BillClosing.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_admission_bill_summary.fields.BillClosing.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <div id="r_BillClosingDate" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_BillClosingDate" for="x_BillClosingDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_BillClosingDate"><?= $Page->BillClosingDate->caption() ?><?= $Page->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillClosingDate"><span id="el_view_ip_admission_bill_summary_BillClosingDate">
<input type="<?= $Page->BillClosingDate->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?= HtmlEncode($Page->BillClosingDate->getPlaceHolder()) ?>" value="<?= $Page->BillClosingDate->EditValue ?>"<?= $Page->BillClosingDate->editAttributes() ?> aria-describedby="x_BillClosingDate_help">
<?= $Page->BillClosingDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillClosingDate->ReadOnly && !$Page->BillClosingDate->Disabled && !isset($Page->BillClosingDate->EditAttrs["readonly"]) && !isset($Page->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_admission_bill_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_admission_bill_summaryedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillNumber"><span id="el_view_ip_admission_bill_summary_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <div id="r_ClosingAmount" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ClosingAmount" for="x_ClosingAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ClosingAmount"><?= $Page->ClosingAmount->caption() ?><?= $Page->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ClosingAmount"><span id="el_view_ip_admission_bill_summary_ClosingAmount">
<input type="<?= $Page->ClosingAmount->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingAmount->getPlaceHolder()) ?>" value="<?= $Page->ClosingAmount->EditValue ?>"<?= $Page->ClosingAmount->editAttributes() ?> aria-describedby="x_ClosingAmount_help">
<?= $Page->ClosingAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <div id="r_ClosingType" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ClosingType" for="x_ClosingType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ClosingType"><?= $Page->ClosingType->caption() ?><?= $Page->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ClosingType"><span id="el_view_ip_admission_bill_summary_ClosingType">
<input type="<?= $Page->ClosingType->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingType->getPlaceHolder()) ?>" value="<?= $Page->ClosingType->EditValue ?>"<?= $Page->ClosingType->editAttributes() ?> aria-describedby="x_ClosingType_help">
<?= $Page->ClosingType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <div id="r_BillAmount" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_BillAmount" for="x_BillAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_BillAmount"><?= $Page->BillAmount->caption() ?><?= $Page->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillAmount"><span id="el_view_ip_admission_bill_summary_BillAmount">
<input type="<?= $Page->BillAmount->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillAmount->getPlaceHolder()) ?>" value="<?= $Page->BillAmount->EditValue ?>"<?= $Page->BillAmount->editAttributes() ?> aria-describedby="x_BillAmount_help">
<?= $Page->BillAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReportHeader"><span id="el_view_ip_admission_bill_summary_ReportHeader">
<template id="tp_x_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_ip_admission_bill_summary" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ReportHeader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ReportHeader[]"
    name="x_ReportHeader[]"
    value="<?= HtmlEncode($Page->ReportHeader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ReportHeader"
    data-target="dsl_x_ReportHeader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ReportHeader->isInvalidClass() ?>"
    data-table="view_ip_admission_bill_summary"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_Procedure"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Procedure"><span id="el_view_ip_admission_bill_summary_Procedure">
<?php $Page->Procedure->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Procedure_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?= EmptyValue(strval($Page->Procedure->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Procedure->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Procedure->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Procedure->ReadOnly || $Page->Procedure->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
<?= $Page->Procedure->getCustomMessage() ?>
<?= $Page->Procedure->Lookup->getParamTag($Page, "p_x_Procedure") ?>
<input type="hidden" is="selection-list" data-table="view_ip_admission_bill_summary" data-field="x_Procedure" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?= $Page->Procedure->CurrentValue ?>"<?= $Page->Procedure->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Consultant"><span id="el_view_ip_admission_bill_summary_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Consultant->getDisplayValue($Page->Consultant->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Consultant" data-hidden="1" name="x_Consultant" id="x_Consultant" value="<?= HtmlEncode($Page->Consultant->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_Anesthetist" for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_Anesthetist"><?= $Page->Anesthetist->caption() ?><?= $Page->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Anesthetist"><span id="el_view_ip_admission_bill_summary_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Anesthetist->getDisplayValue($Page->Anesthetist->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_Anesthetist" data-hidden="1" name="x_Anesthetist" id="x_Anesthetist" value="<?= HtmlEncode($Page->Anesthetist->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <div id="r_Amound" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_Amound" for="x_Amound" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_Amound"><?= $Page->Amound->caption() ?><?= $Page->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amound->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Amound"><span id="el_view_ip_admission_bill_summary_Amound">
<input type="<?= $Page->Amound->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?= HtmlEncode($Page->Amound->getPlaceHolder()) ?>" value="<?= $Page->Amound->EditValue ?>"<?= $Page->Amound->editAttributes() ?> aria-describedby="x_Amound_help">
<?= $Page->Amound->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amound->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_patient_id"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_patient_id"><span id="el_view_ip_admission_bill_summary_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_id->getDisplayValue($Page->patient_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_admission_bill_summary" data-field="x_patient_id" data-hidden="1" name="x_patient_id" id="x_patient_id" value="<?= HtmlEncode($Page->patient_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <div id="r_Package" class="form-group row">
        <label id="elh_view_ip_admission_bill_summary_Package" for="x_Package" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_admission_bill_summary_Package"><?= $Page->Package->caption() ?><?= $Page->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Package->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Package"><span id="el_view_ip_admission_bill_summary_Package">
<input type="<?= $Page->Package->getInputTextType() ?>" data-table="view_ip_admission_bill_summary" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Package->getPlaceHolder()) ?>" value="<?= $Page->Package->EditValue ?>"<?= $Page->Package->editAttributes() ?> aria-describedby="x_Package_help">
<?= $Page->Package->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Package->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_admission_bill_summaryedit" class="ew-custom-template"></div>
<template id="tpm_view_ip_admission_bill_summaryedit">
<div id="ct_ViewIpAdmissionBillSummaryEdit"><style>
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
	<span hidden class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_profilePic"></slot></span>
	<span hidden class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_Consultant"></slot></span>
<div hidden class="row">
	<div class="col-12">
		<table style="width:100%">
			<tr>
				<td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_patient_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_patient_id"></slot></td>
				<td></td>
 			</tr>
 		</table>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Select Patient </h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_PatientID"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_patient_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_patient_name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_gender"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_age"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_age"></slot></span>
				  </div>
				   <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_DOB"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_mobileno"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_mobileno"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_mrnNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_mrnNo"></slot></span>
				  </div>
				 <div hidden class="ew-row">
					<img id="patientPropic" src=""  height="100" width="100">
				  </div>
				 <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_PartnerID"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_PartnerName"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_PartnerMobile"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
	  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ReportHeader"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ReportHeader"></slot></span>
	</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#C71585">
				<h3 class="card-title">Patient Admission Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_admission_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_admission_date"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_physician_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_physician_id"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_Anesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_Anesthetist"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_release_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_release_date"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_Procedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_Procedure"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_Amound"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_Amound"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div  class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#7D3C98">
				<h3 class="card-title">Patient Visit Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div hidden class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_IDProof"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_typeRegsisteration"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_typeRegsisteration"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_PaymentCategory"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_PaymentCategory"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_PaymentStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_PaymentStatus"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div hidden class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#1F618D">
				<h3 class="card-title">Refered By.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ReferedByDr"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ReferedByDr"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ReferClinicname"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ReferClinicname"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ReferMobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ReferMobileNo"></slot></span>
				  </div>
				<div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ReferCity"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ReferCity"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr><td></td><td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_BillClosing"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_BillClosing"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_BillClosingDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_BillClosingDate"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_BillAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_BillAmount"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ClosingAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ClosingAmount"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_ClosingType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_ClosingType"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_view_ip_admission_bill_summary_BillNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_admission_bill_summary_BillNumber"></slot></td><td></td><td></td></tr>
	</tbody>
</table>
</div>
</template>
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
    ew.applyTemplate("tpd_view_ip_admission_bill_summaryedit", "tpm_view_ip_admission_bill_summaryedit", "view_ip_admission_bill_summaryedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_ip_admission_bill_summary");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("x_BillNumber").readOnly=!0;
});
</script>
